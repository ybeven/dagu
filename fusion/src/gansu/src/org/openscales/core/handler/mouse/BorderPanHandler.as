package org.openscales.core.handler.mouse {

	import flash.events.Event;
	import flash.events.MouseEvent;

	import org.openscales.core.Map;
	import org.openscales.core.handler.Handler;

	/**
	 * Handler that pan the map when the mouse cursor is close of the borders
	 */
	public class BorderPanHandler extends Handler {

		private var _ratio:int;

		private var _deltaX:int = 0;

		private var _deltaY:int = 0;

		public function BorderPanHandler(map:Map=null,active:Boolean=true, ratio:int = 20){
			super(map, active);
			this.ratio = ratio;
		}

		public function get ratio():int {
			return this._ratio;
		}

		public function set ratio(value:int):void {
			this._ratio = value;
		}

		override protected function registerListeners():void {
			if (this.map) {
				this.map.addEventListener(MouseEvent.MOUSE_MOVE,this.onMouseMove);
				this.map.addEventListener(MouseEvent.MOUSE_OVER,this.onMouseOver);
				this.map.addEventListener(MouseEvent.MOUSE_OUT,this.onMouseOut);
			}
		}

		override protected function unregisterListeners():void {
			if (this.map) {
				this.map.removeEventListener(MouseEvent.MOUSE_MOVE,this.onMouseMove);
				this.map.removeEventListener(MouseEvent.MOUSE_OVER,this.onMouseOver);
				this.map.removeEventListener(MouseEvent.MOUSE_OUT,this.onMouseOut);
				this.map.removeEventListener(Event.ENTER_FRAME,this.onEnterFrame);
			}
		}

		private function onMouseMove(event:MouseEvent):void{
			this.updateDelta(event);
		}

		private function onMouseOut(event:MouseEvent):void{
			this.map.removeEventListener(Event.ENTER_FRAME,this.onEnterFrame);
		}

		private function onMouseOver(event:MouseEvent):void{
			this.updateDelta(event);
			this.map.addEventListener(Event.ENTER_FRAME,this.onEnterFrame);
		}

		private function onEnterFrame(event:Event):void{
			this.map.pan(this._deltaX,this._deltaY);
		}

		private function updateDelta(event:MouseEvent):void {
			this._deltaX = (map.mouseX - (this.map.size.w/2)) / this.ratio;
			this._deltaY = (map.mouseY - (this.map.size.h/2)) / this.ratio;
		}

	}
}

