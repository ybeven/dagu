package com.outsmart.dock.events {
	
	import flash.events.Event;
	import mx.core.UIComponent;

	/**
	 * The DockItemEvent is the event fired to indicate mouse interaction has happened with an
	 * item in the dock. Interaction comes in the form of clicking an individual item or having the
	 * mouse move over or leave an item.
	 */

	public class DockItemEvent extends Event {
		private var _render:UIComponent;		/* the physical item clicked */
		private var _index:int;					/* the index in the data provider of the selected item */
		
		public static const DOCK_ITEM_CLICK:String = "dockItemClick";
		public static const DOCK_ITEM_OVER:String = "dockItemOver";
		public static const DOCK_ITEM_OUT:String = "dockItemOut";
		
		/**
		 * DockItemEvent constructor.
		 */
		public function DockItemEvent(type:String, render:UIComponent, index:int) {
			super(type);
			this._render = render;
			this._index = index;
		}
		
		/**
		 * Get the render (the physical UIComponent) of the event.
		 */
		public function get render():UIComponent {
			return this._render;
		}
		
		/**
		 * Get the index of the item (in the data provider) of the event.
		 */
		public function get index():int {
			return this._index;
		}
		
	}
}