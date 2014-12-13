package com.outsmart.dock.core {

	import mx.core.UIComponent;
	
	/**
	 * The IDockLabelRenderer is the interface used in association with a <code>Dock</code>
	 * component that renders the labels of the items in the dock.
	 */
	
	public interface IDockLabelRenderer {
		
		/**
		 * The text of the label to show.
		 */
		function get text():String;
		function set text(value:String):void;
		
	}
}