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
	public class GeoRSSFormat extends Format
	{
		private namespace georss="http://www.georss.org/georss";
		private namespace atom="http://www.w3.org/2005/Atom";
		public var name:String;
		
		public function GeoRSSFormat() {
			
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
			use namespace georss;
			use namespace atom;
			var placemarks:XMLList = dataXML..item;
			if(placemarks.length()==0)
				placemarks=dataXML.entry;

			for each(var placemark:XML in placemarks) {
				var htmlContent:String = "";
				var attributes:Object = {};
				if(placemark.title != undefined) {
					attributes["name"] = placemark.title.text();
					htmlContent = htmlContent + "<b>" + placemark.title.text() + "</b><br />";   
				}
				if(placemark.description != undefined) {
					attributes["description"] = placemark.description.text();
					htmlContent = htmlContent + placemark.description.text() + "<br />";
				}
				if(placemark.summary != undefined)
				{
					attributes["description"] = placemark.summary.text();
					htmlContent = htmlContent + placemark.summary.text() + "<br />";
				}
				if (placemark.link)
				{
					htmlContent += '<a class="link" href="'+placemark.link.text()+'" target="_blank">';
	                htmlContent += attributes["name"];
	                htmlContent += '</a>';
				} 
				
				for each(var extendedData:XML in placemark.ExtendedData.Data) {
					if(extendedData.value)
						attributes[extendedData.@name] = extendedData.value.text();
						htmlContent = htmlContent + "<b>" + extendedData.@name + "</b> : " + extendedData.value.text() + "<br />";
				}
						
				var pntStyle:Style=new Style();
				var styleID:String="";
//				if(placemark.styleUrl)
//				{
//					styleID=placemark.styleUrl.text();
//					styleID=styleID.substr(1);
////					attributes["style"]=featureStyles[styleID];
//				}
				attributes["popupContentHTML"] = htmlContent;
				
				var coordinates:Array=new Array();
				if(placemark.*::point.length()>0)
				{
					var pointItem:XML=placemark.*::point[0];
					if(placemark.icon!=undefined)
					{
						pntStyle=Style.getDefaultCircleStyle();
						pntStyle.rules[0].symbolizers[0].graphic.url=placemark.icon.text();
						attributes["isIcon"]=true;
					}
				
					coordinates = pointItem.text().split(" ");
					var point:Point = new Point(coordinates[0], coordinates[1]);
					if (this._internalProj != null, this._externalProj != null) {
							point.transform(this.externalProj, this.internalProj);
					}
					var feature:PointFeature = new PointFeature(point, attributes, pntStyle);
					features.push(feature);
				}
				else if(placemark.*::line.length()>0)
				{
					var lineItem:XML=placemark.*::line[0];
					var pntArray:Array = lineItem.text().split(" ");
					for(var i:int=0;i<pntArray.length/2;i++)
					{
						coordinates.push(new Point(pntArray[i*2], pntArray[i*2+1]));
					}
					if (this._internalProj != null, this._externalProj != null) {
							point.transform(this.externalProj, this.internalProj);
					}
					var linestr:LineString=new LineString(coordinates);
					var line:LineStringFeature = new LineStringFeature(linestr, attributes, null);
					features.push(line);
				}
				else if(placemark.*::polygon.length()>0)
				{
					var polygonItem:XML=placemark.*::polygon[0];
					var lineRingArr:Array=new Array();
					//get outer ring
					pntArray=polygonItem.text().split(" ");
					for(var i:int=0;i<pntArray.length/2;i++)
					{
						coordinates.push(new Point(pntArray[i*2], pntArray[i*2+1]));
					}
					lineRingArr[lineRingArr.length]=new LinearRing(coordinates);
					if (this._internalProj != null, this._externalProj != null) {
							point.transform(this.externalProj, this.internalProj);
					}
					var styleobj:Object=new Object();
					styleobj.color="ff0000";
					styleobj.fill=1;
					attributes["style"]=styleobj;
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


