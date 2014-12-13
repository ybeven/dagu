package com.outsmart.dock.core {

	/**
	 * The IDockItemRenderer is the interface used in association with a <code>Dock</code>
	 * component that renders the items on the dock.
	 */
	 	
	public interface IDockItemRenderer {

		/**
		 * The data for the render of the given item.
		 */
		function get data():Object;
		function set data(value:Object):void;
		
		/**
		 * Whether or not the mouse is over the current renderer.
		 */
		function get over():Boolean;
		function set over(value:Boolean):void;
		
		/**
		 * The dock that the dock item renderer belongs to.
		 */
		function get dock():Dock;
		function set dock(value:Dock):void;
	}
}