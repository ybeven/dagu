package org.openscales.core
{
	import flash.display.Bitmap;
	
	import org.openscales.core.basetypes.Bounds;
	import org.openscales.core.basetypes.LonLat;
	import org.openscales.core.basetypes.Pixel;
	import org.openscales.core.basetypes.Size;
	import org.openscales.core.popup.Popup;
	
	public class MarkerEX extends Icon
	{

	    private var _lonlat:LonLat = null;
	    
	    private var _map:Map = null;
	    
	    private var _drawn:Boolean = false;
	    
	    private var _data:Object = null;
	    
	    private var _popup:Popup;
	    
	    //[Embed(source="/org/openscales/core/img/markerArbre.gif")]
	  	[Embed(source="/org/openscales/core/img/marker-blue.png")]
        private var _markerImg:Class;
	    
	    /**
	    * Marker constructor
	    * 
	    * @param url
	    * @param size size of the marker
	    * @param offset offset of the marker
	    * @param calculateOffset
	    */
	    public function MarkerEX(url:String = null, size:Size = null, offset:Pixel = null, calculateOffset:Function = null):void {
	    	super(url, size, offset, calculateOffset);
	    	this.lonlat = lonlat;
	        
	        this.data = new Object();
	               
	    }
	    
	    override public function destroy():void {
	    	super.destroy();
	    	this.map = null;	        
	    }
	    
	  	/**
	  	 * Set a new position to the marker
	  	 * 
	  	 * @param px
	  	 */    
	    override public function set position(px:Pixel):void {
	        super.position = px;        
	        if ( this.map )
	        {      
	        	this.lonlat = this.map.getLonLatFromLayerPx(px);
	        }
     	}
     	
     	/**
     	 * Visibility of the marker
     	 * 
     	 * @return Boolean
     	 */
     	public function onScreen():Boolean {
	     	var onScreen:Boolean = false;
	        if (this.map) {
	            var screenBounds:Bounds = this.map.extent;
	            onScreen = screenBounds.containsLonLat(this.lonlat);
	        }    
	        return onScreen;
     	}
     	
     	/**
     	 * Change the marker size
     	 * 
     	 * @param inflate inflate of the marker
     	 */
     	public function inflate(inflate:Number):void {
     	
	       var newSize:Size = new Size(this.size.w * inflate, this.size.h * inflate);
	       this.size = newSize;

     	}
     	
     	/**
     	 * Draw the marker
     	 * 
     	 * @param px
     	 */
     	override public function draw(px:Pixel = null):void {
 	        
 	        if(url == null) {
 	        	var defaultMarker:Bitmap = new this._markerImg();
 	        	if(px != null) {
 	        		defaultMarker.x = px.x-defaultMarker.width/2;
 	        		defaultMarker.y = px.y-defaultMarker.height;
 	        	}
 	        	if(this.numChildren==1) {
 	        		this.removeChildAt(0);
 	        	}
 	        	this.addChild(defaultMarker);
 	        }
 	        else {
 	        	super.draw(px);
 	        }
     	}
     	
     	/**
     	 * Getters and setters
     	 */
     	public function get lonlat():LonLat {
        	return this._lonlat;
        }
        
        public function set lonlat(value:LonLat):void {
        	this._lonlat = value;
        }
        
        public function get map():Map {
        	return this._map;
        }
        
        public function set map(value:Map):void {
        	this._map = value;
        }
        
        public function get drawn():Boolean {
        	return this._drawn;
        }
        
        public function set drawn(value:Boolean):void {
        	this._drawn = value;
        } 
        
        public function get data():Object {
        	return this._data;
        }
        
        public function set data(value:Object):void {
        	this._data = value;
        }
        
        public function get popup():Popup {
        	return this._popup;
        }
        
        public function set popup(value:Popup):void {
        	this._popup = value;
        }     	
	}
}