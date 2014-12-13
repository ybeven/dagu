package zdims.map
{
	import flash.events.Event;
	import flash.net.URLLoader;
	import flash.net.URLRequestMethod;
	
	import org.openscales.core.format.GeoRSSFormat;
	import org.openscales.core.request.XMLRequest;
	import org.openscales.core.security.ISecurity;
	
	import zdims.util.RectBound;
	
	public class GeoRSS extends FeatureLayer
	{
		private var _url:String = "";
		private var _request:XMLRequest = null;
		private var _geoRSSFormat:GeoRSSFormat = null;
		private var _xml:XML = null;
		private var _loading:Boolean = false;
		private var _security:ISecurity = null;
		private var _proxy:String = null;
		public function GeoRSS()
		{
			this._geoRSSFormat = new GeoRSSFormat();
			super();
		}
		public override function initLayer():void
		{
			redraw();
		}
		public override function getImage(rectView:RectBound,width:int,height:int):void
	    { 
	    	redraw();
	    }
		public function destroy():void 
		{
	        if (this._request) {
	            this._request.destroy();
	            this._request = null;
	        }
	        this._loading = false;
	    } 
	    public function redraw(fullRedraw:Boolean = true):void 
	    {
	    	this.percentWidth=100;
			this.percentHeight=100;
			this.x=this.y=0;
			var curShowScale:Number=this.imsmap.width/this.imsmap.getBuffer(this.imsmap.width);
			trace("currentscale:"+curShowScale)
        	if(curShowScale<this.minShowScale||curShowScale>this.maxShowScale)
        		this.visible=false;
        	else
        		this.visible=this.display;
			if (!this.display) {
//				this.clear();
				return;
			}
			
	        if (! this._request&&url!="") {
	        	this.loading = true;
				this._request = new XMLRequest(url, onSuccess, this.proxy, URLRequestMethod.GET, this.security, onFailure);
			} else {
//				this.clear();
//				this.draw();
			}
			
		}
		
		public function onSuccess(event:Event):void
		{
			this._loadComplete=true;
			this.loadSucc=true;
			this.loading = false;
			var loader:URLLoader = event.target as URLLoader;
			
			// To avoid errors if the server is dead
			try {
				this._xml = new XML(loader.data);
//				if (this.map.baseLayer.projection != null && this.projection != null && this.projection.srsCode != this.map.baseLayer.projection.srsCode) {
//					this._kmlFormat.externalProj = this.projection;
//					this._kmlFormat.internalProj = this.map.baseLayer.projection;
//				}
			
				var features:Array = this._geoRSSFormat.read(this._xml) as Array;
				this.addFeatures(features);
				
				this.clear();
				this.draw();
			}
			catch(error:Error) {
				if(!this.map)
					map.setErrorText(error.message);
			}
		}
		
		protected function onFailure(event:Event):void {
			this.loading = false;
			this.map.setErrorText("Error when loading kml " + this._url);			
		}

				
		public function get url():String {
			return this._url;
		}
		
		public function set url(value:String):void {
			if(this._url!=value)
				this.destroy();
			this._url = value;
			if(!this._request&&!this._loading&&this.imsmap!=null)
				redraw();
		}
		public function get security():ISecurity {
			return this._security;
		}

		public function set security(value:ISecurity):void {
			this._security = value;
		}
		/**
		 * Used to set loading status of layer
		 */
		protected function set loading(value:Boolean):void {
			if (value == true && this._loading == false && this.map != null) {
				_loading = value;
				//this.map.dispatchEvent(new LayerEvent(LayerEvent.LAYER_LOAD_START, this));
			}

			if (value == false && this._loading == true && this.map != null) {
				_loading = value;
				//this.map.dispatchEvent(new LayerEvent(LayerEvent.LAYER_LOAD_END, this));
			}
		}
		public function get proxy():String {
			var p:String = this._proxy;
//			if(!p && map && map.proxy)
//				p = map.proxy;
			return p;
		}

		public function set proxy(value:String):void {
			this._proxy = value;
		}
	}
}