package org.openscales.core.format
{
	import org.openscales.core.feature.LineStringFeature;
	import org.openscales.core.feature.PointFeature;
	import org.openscales.core.feature.PolygonFeature;
	import org.openscales.core.geometry.LineString;
	import org.openscales.core.geometry.LinearRing;
	import org.openscales.core.geometry.Point;
	import org.openscales.core.geometry.Polygon;
	import org.openscales.core.style.Style;
	import org.openscales.proj4as.ProjProjection;
	

	/**
	 * Read KML xml files
	 * 
	 * alpha support
	 */
	public class KMLFormat extends Format
	{
		private namespace opengis="http://www.opengis.net/kml/2.2";
		private namespace opengis2="http://www.opengis.net/kml/2.0";
		private namespace google="http://earth.google.com/kml/2.0";
		
		public function KMLFormat() {
			
		}

		/**
		 * Read data
		 *
		 * @param data data to read/parse.
		 *
		 * @return array of features.
		 */
		override public function read(data:Object):Object {
			var features:Array = new Array();
			var dataXML:XML = data as XML;
			
			use namespace google;
			use namespace opengis;
			use namespace opengis2;
			//get the style
			var featureStyles:Object=new Object();
			var styles:XMLList = dataXML..Style;
			for each(var style:XML in styles) 
			{	
				if(style.IconStyle!=undefined)
				{
					var iconStyle:XML=style.IconStyle[0];
					var curStyle:Style=Style.getDefaultPointStyle();
					curStyle.rules[0].symbolizers[0].graphic.url=iconStyle.Icon.href.text();
					var obj:Object=new Object();
					obj["iconStyle"]=curStyle;
					featureStyles[style.@id]=obj;
				}
				if(style.LineStyle!=undefined)
				{
					var lineStyle:XML=style.LineStyle[0];
					var lineStyleObj:Object=new Object();
					lineStyleObj["color"]=lineStyle.color.text();
					lineStyleObj["width"]=lineStyle.width.text();
					featureStyles[style.@id]=lineStyleObj;
				}
				if(style.PolyStyle!=undefined)
				{
					var polyStyle:XML=style.PolyStyle[0];
					var polyStyleObj:Object=new Object();
					polyStyleObj["color"]=polyStyle.color.text();
					polyStyleObj["fill"]=polyStyle.fill.text();
					featureStyles[style.@id]=polyStyleObj;
				}
			}
			//======================
			var placemarks:XMLList = dataXML..Placemark;

			for each(var placemark:XML in placemarks) {
				var htmlContent:String = "";
				var attributes:Object = {};
				if(placemark.name != undefined) {
					attributes["name"] = placemark.name.text();
					htmlContent = htmlContent + "<b>" + placemark.name.text() + "</b><br />";   
				}
				if(placemark.description != undefined) {
					attributes["description"] = placemark.description.text();
					htmlContent = htmlContent + placemark.description.text() + "<br />";
				}
				
				
				for each(var extendedData:XML in placemark.ExtendedData.Data) {
					if(extendedData.value)
						attributes[extendedData.@name] = extendedData.value.text();
						htmlContent = htmlContent + "<b>" + extendedData.@name + "</b> : " + extendedData.value.text() + "<br />";
				}
						
				var pntStyle:Style=new Style();
				var styleID:String="";
				if(placemark.styleUrl)
				{
					styleID=placemark.styleUrl.text();
					styleID=styleID.substr(1);
					attributes["style"]=featureStyles[styleID];
				}
					
				attributes["popupContentHTML"] = htmlContent;
				var coordinates:Array=new Array();
				if(placemark.Point!=undefined)
				{
					var pntStyle:Style=new Style();
					if(styleID!="")
					{
						pntStyle=featureStyles[styleID]["iconStyle"];
						attributes["isIcon"]=true;
					}
				
					coordinates = placemark.Point.coordinates.text().split(",");
					var point:Point = new Point(coordinates[0], coordinates[1]);
					if (this._internalProj != null, this._externalProj != null) {
							point.transform(this.externalProj, this.internalProj);
					}
					var feature:PointFeature = new PointFeature(point, attributes, pntStyle);
					features.push(feature);
				}
				else if(placemark.LineString!=undefined)
				{
					var pntArray:Array = placemark.LineString.coordinates.text().split(" ");
					for each(var pnt:String in pntArray)
					{
						var pntCoor:Array=pnt.split(",");
						if(pntCoor.length<2)
								continue;
						coordinates.push(new Point(pntCoor[0], pntCoor[1]));
					}
					
					if (this._internalProj != null, this._externalProj != null) {
							point.transform(this.externalProj, this.internalProj);
					}
					var linestr:LineString=new LineString(coordinates);
					var line:LineStringFeature = new LineStringFeature(linestr, attributes, null);
					features.push(line);
				}
				else if(placemark.Polygon!=undefined)
				{
					var lineRingArr:Array=new Array();
					//get outer ring
					pntArray=placemark.Polygon.outerBoundaryIs.LinearRing.coordinates.text().split(" ")
					for each(pnt in pntArray)
					{
						pntCoor=pnt.split(",");
						if(pntCoor.length<2)
							continue;
						coordinates.push(new Point(pntCoor[0], pntCoor[1]));
					}
					lineRingArr[lineRingArr.length]=new LinearRing(coordinates);
					//get inner ring
					coordinates=new Array();
					for each(var innerRingXml:XML in placemark.Polygon.innerBoundaryIs)
					{
						pntArray=innerRingXml.LinearRing.coordinates.text().split(" ")
						for each(pnt in pntArray)
						{
							pntCoor=pnt.split(",");
							if(pntCoor.length<2)
								continue;
							coordinates.push(new Point(pntCoor[0], pntCoor[1]));
						}
						lineRingArr[lineRingArr.length]=new LinearRing(coordinates);
					}
					if (this._internalProj != null, this._externalProj != null) {
							point.transform(this.externalProj, this.internalProj);
					}
					var poly:Polygon=new Polygon(lineRingArr);
					var polygon:PolygonFeature=new PolygonFeature(poly,attributes,null);
					features.push(polygon);
				}
				
								
			} 
			
			return features;
		}
		
		public function get internalProj():ProjProjection {
			return this._internalProj;
		}

		public function set internalProj(value:ProjProjection):void {
			this._internalProj = value;
		}

		public function get externalProj():ProjProjection {
			return this._externalProj;
		}

		public function set externalProj(value:ProjProjection):void {
			this._externalProj = value;
		}


	}
}

