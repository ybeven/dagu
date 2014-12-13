package org.openscales.core.layer.mapgis
{
	import flash.display.DisplayObject;
	import flash.display.Loader;
	import flash.display.LoaderInfo;
	import flash.events.Event;
	
	import org.openscales.core.basetypes.LonLat;
	import org.openscales.core.basetypes.Pixel;
	import org.openscales.core.layer.Layer;
	import org.openscales.core.request.DataRequest;
	import org.openscales.core.security.ISecurity;
	/**
	 * used to display the *.map file of mapgis
	 * @author gmqandhy
	 * 
	 */
	public class MapDoc extends Layer
	{
		private var _mapDocName:String="wh.map";
		private var _request:DataRequest = null;
		override public function destroy(setNewBaseLayer:Boolean = true):void {
	        if (this._request) {
	            this._request.destroy();
	            this._request = null;
	        }
	        //super.destroy(setNewBaseLayer);
	    } 
	    override public function clear():void
	    {
	    	if(this.numChildren>0)
	    		this.removeChildAt(0);
	    }
		/**
		 * MapDoc Layer for MapGIS
		 * @param name
		 * @param isBaseLayer
		 * @param visible
		 * @param srsCode
		 * @param proxy
		 * @param security
		 * 
		 */		
		public function MapDoc(name:String, isBaseLayer:Boolean=true, visible:Boolean=true, srsCode:String=null, proxy:String=null, security:ISecurity=null)
		{
			//TODO: implement function
			super(name, isBaseLayer, visible, srsCode, proxy, security);
		}
		override public function redraw(fullRedraw:Boolean=true):void
		{
			this.destroy(true);

			var leftbottom:LonLat=this.map.getLonLatFromLayerPx(new Pixel(0,this.map.height));
			var topright:LonLat=this.map.getLonLatFromLayerPx(new Pixel(this.map.width,0));
			trace("get mapdoc");
			var box:String=leftbottom.lon+","+leftbottom.lat+","+topright.lon+","+topright.lat;
			var url="http://localhost:5141/vectormap/0/?methodName=getMapDocImage&path="+escape(this.mapDocName)+"&svcType=MMDS&width="+this.map.width+"&height="+this.map.height+"&box="+box;
			
			this._request=new DataRequest(url,onGetMap);
			
		}
		private function onGetMap(event:Event):void
		{
			this.clear();
			var loaderInfo:LoaderInfo = event.target as LoaderInfo;
			var loader:Loader = loaderInfo.loader as Loader;
			
			// Store image size
//			this._size = new Size(loader.width, loader.height);
			this.addChild(loader);
//			this.draw();
			
			if(numChildren != 0) {
				var image:DisplayObject = this.getChildAt(0);
//				image.width = this.maxExtent.width/this.map.resolution;
//				image.height = this.maxExtent.height/this.map.resolution;
//				var ul:LonLat = new LonLat(this.maxExtent.left, this.maxExtent.top);
//				var ulPx:Pixel = this.map.getLayerPxFromLonLat(ul);
//				image.x = ulPx.x;
//				image.y = ulPx.y;
				image.width=this.map.width;
				image.height=this.map.height;
				image.x=0;
				image.y=0;
			}
		}
		/**
		 * get or set filename of the map
		 * @param value
		 * 
		 */		
		public function set mapDocName(value:String):void
		{
			this._mapDocName=value;
		}
		/**
		 * get or set filename of the map
		 * @return 
		 * 
		 */		
		public function get mapDocName():String
		{
			return this._mapDocName;
		}
		
		
	}
}