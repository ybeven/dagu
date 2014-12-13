package zdims.map
{
	import flash.display.Sprite;
	import flash.events.Event;
	import flash.events.MouseEvent;
	import flash.utils.getQualifiedClassName;
	
	import mx.controls.Alert;
	import mx.events.FlexEvent;
	
	import org.openscales.core.events.FeatureEvent;
	import org.openscales.core.feature.Feature;
	import org.openscales.core.feature.LineStringFeature;
	import org.openscales.core.feature.PointFeature;
	import org.openscales.core.feature.PolygonFeature;
	import org.openscales.core.style.Style;
	
	import zdims.control.IMSPoint;
	import zdims.control.IMSPolygon;
	import zdims.control.IMSRoad;
	import zdims.control.Marker;
	import zdims.event.IMSMapMoveEvent;
	import zdims.interfaces.control.IOverlayObject;
	
	public class FeatureLayer extends VectorLayerBase
	{
		private var _style:Style = null;
		private var _geometryType:String = null;
		private var _features:Array=null;
		static var count:int=0;
		public function FeatureLayer()
		{
			super();
		}
		public function addFeatures(features:Array):void {
			this._features=features;
			var fevt:FeatureEvent = null;
			
			// Dispatch an event before the features are added
			if(this.map){
				fevt = new FeatureEvent(FeatureEvent.FEATURE_PRE_INSERT, null);
				fevt.features = features;
				this.map.dispatchEvent(fevt);
			}
			
			for (var i:int = 0; i < features.length; i++) {
				this.addFeature(features[i], false);
			}

			// Dispatch an event with all the features added
			if (this.map) {
				fevt = new FeatureEvent(FeatureEvent.FEATURE_INSERT, null);
				fevt.features = features;
				this.map.dispatchEvent(fevt);
			}
		}
		public function addFeature(feature:Feature, dispatchFeatureEvent:Boolean=true):void {
			var fevt:FeatureEvent = null;
			// Check if the feature may be added to this layer
			var vectorfeature:Feature = (feature as Feature);
			if (this.geometryType &&
				(getQualifiedClassName(vectorfeature.geometry) != this.geometryType)) {
				var throwStr:String = "addFeatures : component should be an " + 
					getQualifiedClassName(this.geometryType);
				throw throwStr;
			}
			
			// If needed dispatch a PRE_INSERT event before the feature is added
			if (dispatchFeatureEvent && this.map) {
				fevt = new FeatureEvent(FeatureEvent.FEATURE_PRE_INSERT, feature);
				this.map.dispatchEvent(fevt);
			}
			
			// Add the feature to the layer
			//comment by gmq ,not use feature ,use imspoint
			//feature.layer = this;
			//this.addChild(feature);
			if(feature is PointFeature)
			{
				this.imsmap.setChildIndex(this,this.imsmap.layerLenth+2);
				if(feature.attributes["isIcon"])
				{
					var mark:Marker=new Marker();
					mark.addEventListener(FlexEvent.CREATION_COMPLETE,onMarkerCreateComplete);
					mark.imsmap=this.imsmap;
					mark.width=30;
					mark.height=35;
					mark.setIconSrc(feature.style.rules[0].symbolizers[0].graphic.url)
					mark.logicX=feature.lonlat.lon;
					mark.logicY=feature.lonlat.lat;
					mark.toolTip=feature.attributes["name"]+"\n"+feature.attributes["description"];
					mark.setMarkerContent(feature.attributes["name"],feature.attributes["description"]);
					this.addChild(mark);
					mark.updatePosition();
				}
				else
				{
					var pnt:IMSPoint=new IMSPoint();
					pnt.addEventListener(FlexEvent.CREATION_COMPLETE,onIMSPointCreateComplete);
					pnt.imsmap=this.imsmap;
					pnt.logicX=feature.lonlat.lon;
					pnt.logicY=feature.lonlat.lat;
					pnt.enableDrag=false;
					pnt.enableMouseInteract=true;
					this.addChild(pnt);
					if(pnt.data==null) pnt.data=new Object();
					pnt.data["attributes"]=feature.attributes;
					pnt.toolTip=feature.attributes["name"]+feature.attributes["description"];
					pnt.addEventListener(MouseEvent.CLICK,onFeatureClick);
				}
			}
			else if(feature is LineStringFeature)
			{
				var lineFeature:LineStringFeature= feature as LineStringFeature;
				var line:IMSRoad=new IMSRoad();
				line.addEventListener(FlexEvent.CREATION_COMPLETE,onIMSPointCreateComplete);
				line.imsmap=this.imsmap;
				line._roadCoorArr=lineFeature.lineString.componentsString;
				if(lineFeature.attributes["style"]!=undefined)
				{
					line.borderColor=parseInt( lineFeature.attributes["style"].color,16);
					line.borderSize=lineFeature.attributes["style"].width;
				}
				this.addChild(line);
			}
			else if(feature is PolygonFeature)
			{
				var polyFeature:PolygonFeature= feature as PolygonFeature;
				var poly:IMSPolygon=new IMSPolygon();
				poly.addEventListener(FlexEvent.CREATION_COMPLETE,onIMSPointCreateComplete);
				poly.imsmap=this.imsmap;
				poly._lineDots=polyFeature.polygon.componentsString;
				if(polyFeature.attributes["style"]!=undefined)
				{
					poly.borderColor=poly.fillColor=parseInt( polyFeature.attributes["style"].color,16);
					poly.enableFill=parseInt(polyFeature.attributes["style"].fill)==1?true:false;
				}
				this.addChild(poly);
			}
			// If needed, dispatch an event with the feature added
			if (dispatchFeatureEvent && this.map) {
				fevt = new FeatureEvent(FeatureEvent.FEATURE_INSERT, feature);
				this.map.dispatchEvent(fevt);
			}
		}
		public function onMarkerCreateComplete(e:FlexEvent):void
		{
			var mark:Marker=e.target as Marker;
			if(mark)
				mark.imsmap.removeEventListener(IMSMapMoveEvent.MOVE_STEP,mark.updatePosition);
		}
		public function onIMSPointCreateComplete(e:FlexEvent):void
		{
			var mark:OverlayObject=e.target as OverlayObject;
			if(mark)
			{
				mark.imsmap.removeEventListener(IMSMapMoveEvent.MOVE_STEP,mark.updatePosition);
				mark.updatePosition();
			}
		}
		public function onMapChange(e:Event):void
		{
		}
		public function onFeatureClick(e:Event):void
		{
			var pnt:IMSPoint=e.target as IMSPoint;
			Alert.show((pnt.data["attributes"] as Object)["name"]);
		}
		override public function clear():void 
		{
			this.graphics.clear();
			var child:Sprite = null;
			var child2:Sprite = null;
			for(var i:int=0; i<this.numChildren;i++) {
				child = this.getChildAt(i) as Sprite;
				if(child) {
					child.graphics.clear();
					//for clear maker
					for(var j:int=0; j<child.numChildren;j++){
						child2 = child.getChildAt(j) as Sprite;
					    if(child2) {
						  child2.graphics.clear();
					  }
					}
				}
			}
		}
		override public function refresh():void
		{
			super.refresh();
			for(var i:int=0;i<this.numChildren;i++)
			{
				var obj:IOverlayObject=this.getChildAt(i) as IOverlayObject;
				if(obj)
					obj.updatePosition();
			}
		}
		override public function restore():void
		{
			super.restore();
			for(var i:int=0;i<this.numChildren;i++)
			{
				var obj:IOverlayObject=this.getChildAt(i) as IOverlayObject;
				if(obj)
					obj.updatePosition();
			}
		}
		protected function draw():void {
//			this.cacheAsBitmap = false;
//			for each (var feature:IMSPoint in this.features){
//				feature.draw();
//			}
//			this.cacheAsBitmap = true;
		}
		public function get style():Style {
			return this._style;
		}
		
		public function set style(value:Style):void {
			this._style = value;
		}
		//Getters and setters
		public function get features():Array {
			var featureArray:Array = new Array();
			for(var i:int = 0;i<this.numChildren;i++) {
				if(this.getChildAt(i) is IMSPoint) {
					featureArray.push(this.getChildAt(i));
				}
			}
			return featureArray;
		}
		public function get geometryType():String {
			return this._geometryType;
		}
		
		public function set geometryType(value:String):void {
			this._geometryType = value;
		}
	}
}