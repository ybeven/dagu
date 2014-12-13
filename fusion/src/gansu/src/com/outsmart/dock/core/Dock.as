package com.outsmart.dock.core {

	import mx.containers.BoxDirection;	
	import mx.collections.IList;

	import mx.core.Application;	
	import mx.core.Container;
	import mx.core.IFactory;
	import mx.core.UIComponent;
	
	import mx.events.CollectionEvent;
	import mx.events.FlexEvent;
	import mx.events.ResizeEvent;

	import mx.styles.CSSStyleDeclaration;
	import mx.styles.StyleManager;

	import flash.utils.Dictionary;	
	import flash.events.MouseEvent;
	import flash.geom.Point;
	import flash.geom.Rectangle;

	import flash.events.Event;
	import flash.events.TimerEvent;
	
	import flash.utils.Timer;

	import com.outsmart.fixeddrawer.core.FixedDrawer;	
	import com.outsmart.dock.events.DockItemEvent;

	/* ========================================
	 =
	 = events
	 =
	 * ======================================= */

	/**
	 * Dispatched when an item is selected in the drawer.
	 */
	[Event(name="dockItemClick", type="com.outsmart.dock.events.DockItemEvent")]

	/**
	 * Dispatched when an the mouse initially moves over an item in the drawer.
	 */
	[Event(name="dockItemOver", type="com.outsmart.dock.events.DockItemEvent")]

	/**
	 * Dispatched when an the mouse initially moves out of an item in the drawer.
	 */
	[Event(name="dockItemOut", type="com.outsmart.dock.events.DockItemEvent")]

	/* ========================================
	 =
	 = styles
	 =
	 * ======================================= */

	/** 
	 * The minimum size of the items in the dock when no zoom is applied.
	 */
	[Style(name="minimumSize", type="Number", inherit="no")]
	
	/** 
	 * The maximum size of the items in the dock when a full zoom in applied.
	 */
	[Style(name="maximumSize", type="Number", inherit="no")]
	
	/** 
	 * The distance across the dock the items are scaled when the mouse is over an individual item.
	 */
	[Style(name="scaleRange", type="Number", inherit="no")]

	/** 
	 * The position of the label relative to its correlating item.
	 */
	[Style(name="labelPosition", type="String", enumeration="top,left,bottom,right", inherit="no")]

	/**
	 * The distance between the edge of the label and the label's correlating item.
	 */
	[Style(name="labelGap", type="Number", inherit="no")]

	/**
	 * The position of the label relative to the item when the dock is layed out horizontally.
	 */
	[Style(name="horizontalLabelAlign", type="String", enumeration="left,center,right", inherit="no")]
	
	/**
	 * The position of the label relative to the item when the dock is layed out vertically.
	 */
	[Style(name="verticalLabelAlign", type="String", enumeration="top,middle,bottom", inherit="no")]

	/**
	 * The length of time (in milliseconds) when the mouse is over the item before the label is shown.
	 */
	[Style(name="labelAppearanceDelay", type="Number", inherit="no")]


	/* ========================================
	 =
	 = class implementation
	 =
	 * ======================================= */

	/**
	 * The Dock is an implementation of the graphical dock menu from the Apple OSX operating system.
	 */	
	 
	[DefaultProperty("dataProvider")]
	public class Dock extends FixedDrawer {

		/* ========================================
		 = private properties
		 * ======================================= */

		private var _dataProvider:IList;		/* the data provider of the dock */
		private var _itemRenderer:IFactory;		/* the item renderer of the dock */
		
		private var itemToRenderMap:Dictionary;		/* the mapping of items (in the data provider) to the renders (UIComponent instances) */
		private var renderToItemMap:Dictionary;		/* the mapping of the renders to the items */
		private var renderToLabelMap:Dictionary;	/* the mapping of the renders to their labels */

		private var labelAppearanceTimer:Timer;		/* the timer responsible for showing labels after the label appearance delay */
		private var labelToAppear:UIComponent;		/* the label to show after the label appearance delay */

		private var _classStylesSet:Boolean = setClassStyles();		/* the value to ensure the class styles are set */

		/* ========================================
		 = protected constants
		 * ======================================= */

		protected var MINIMUM_MEASURED_WIDTH:Number = 10;
		protected var MINIMUM_MEASURED_HEIGHT:Number = 10;

		protected var DEFAULT_MINIMUM_SIZE:Number = 64;
		protected var DEFAULT_MAXIMUM_SIZE:Number = 128;
		protected var DEFAULT_SCALE_RANGE:Number = 128;
		protected var DEFAULT_LABEL_POSITION:String = "top";
		protected var DEFAULT_LABEL_GAP:Number = 20;
		protected var DEFAULT_HORIZONTAL_LABEL_ALIGN:String = "center";
		protected var DEFAULT_VERTICAL_LABEL_ALIGN:String = "middle";
		protected var DEFAULT_LABEL_APPEARANCE_DELAY:Number = 0;

		/* ========================================
		 = public properties
		 * ======================================= */

		/**
		 * The field within the item of the data provider to display as the label to the item.
		 */
		public var labelField:String;

		/**
		 * The renderer to use when rendering item labels.
		 */
		public var labelRenderer:IFactory;

		/**
		 * Set the data provider for the items in the dock.
		 */
		public function set dataProvider(value:IList):void {
			if (this._dataProvider == value) return;
			if (this._dataProvider != null) this._dataProvider.removeEventListener(CollectionEvent.COLLECTION_CHANGE, dataProviderListChangeHandler);
			this._dataProvider = value;
			this._dataProvider.addEventListener(CollectionEvent.COLLECTION_CHANGE, dataProviderListChangeHandler);
			this.invalidateProperties();
		}
		
		/**
		 * Get the data provider of the list.
		 */
		public function get dataProvider():IList {
			return this._dataProvider;
		}
		
		/**
		 * Set the item renderer for the dock. Remove all renderers and invalidate the
		 * dock to be refreshed at a later stage.
		 */
		public function set itemRenderer(value:IFactory):void {
			if (this._itemRenderer == value) return;
			this._itemRenderer = value;
			for (var item:Object in itemToRenderMap) removeItem(item);
			this.invalidateProperties();
		}

		/**
		 * Get the item renderer of the dock.
		 */
		public function get itemRenderer():IFactory {
			return this._itemRenderer;
		}

		/* ========================================
		 = constructor
		 * ======================================= */

		/**
		 * Dock constructor.
		 */
		public function Dock() {
			this.itemToRenderMap = new Dictionary();
			this.renderToItemMap = new Dictionary();
			this.renderToLabelMap = new Dictionary();
			this.dockSide = DOCK_SIDE_BOTTOM;
		}

		/* ========================================
		 = class styles
		 * ======================================= */

		private function setClassStyles():Boolean {
			var styleDeclaration:CSSStyleDeclaration = StyleManager.getStyleDeclaration("Dock");
			if (styleDeclaration == null) styleDeclaration = new CSSStyleDeclaration("Dock");
			
			if (!StyleManager.isValidStyleValue(styleDeclaration.getStyle("minimumSize"))) styleDeclaration.setStyle("minimumSize", DEFAULT_MINIMUM_SIZE);
			if (!StyleManager.isValidStyleValue(styleDeclaration.getStyle("maximumSize"))) styleDeclaration.setStyle("maximumSize", DEFAULT_MAXIMUM_SIZE);
			if (!StyleManager.isValidStyleValue(styleDeclaration.getStyle("scaleRange"))) styleDeclaration.setStyle("scaleRange", DEFAULT_SCALE_RANGE);
			if (!StyleManager.isValidStyleValue(styleDeclaration.getStyle("labelPosition"))) styleDeclaration.setStyle("labelPosition", DEFAULT_LABEL_POSITION);
			if (!StyleManager.isValidStyleValue(styleDeclaration.getStyle("labelGap"))) styleDeclaration.setStyle("labelGap", DEFAULT_LABEL_GAP);
			if (!StyleManager.isValidStyleValue(styleDeclaration.getStyle("horizontalLabelAlign"))) styleDeclaration.setStyle("horizontalLabelAlign", DEFAULT_HORIZONTAL_LABEL_ALIGN);
			if (!StyleManager.isValidStyleValue(styleDeclaration.getStyle("verticalLabelAlign"))) styleDeclaration.setStyle("verticalLabelAlign", DEFAULT_VERTICAL_LABEL_ALIGN);
			if (!StyleManager.isValidStyleValue(styleDeclaration.getStyle("labelAppearanceDelay"))) styleDeclaration.setStyle("labelAppearanceDelay", DEFAULT_LABEL_APPEARANCE_DELAY);
						
			StyleManager.setStyleDeclaration("Dock", styleDeclaration, true);
			return true;
		}

		/* ========================================
		 = overridden functions
		 * ======================================= */

		/**
		 * @inherited
		 * Overridden to ensure that the direction of the box matches the dock side of the drawer.
		 */
		public override function set dockSide(value:String):void {
			super.dockSide = value;
			if (value == DOCK_SIDE_LEFT || value == DOCK_SIDE_RIGHT) this.direction = BoxDirection.VERTICAL;
			else this.direction = BoxDirection.HORIZONTAL;
		}

		/**
		 * resize the items in the dock to match the scale.
		 */
		protected override function onMouseMove(event:MouseEvent):void {
			super.onMouseMove(event);
			if (this.closed) return;
			
			var point:Point = this.globalToLocal(new Point(event.stageX, event.stageY));
			var minimumSize:Number = this.getStyle("minimumSize");
			var maximumSize:Number = this.getStyle("maximumSize");
			var scaleRange:Number = this.getStyle("scaleRange");

			/* the distance the mouse must be in to make the item full size */
			var insideDistance:Number = maximumSize / Math.SQRT2;
			
			// set the width and height of the icons appropriately based on their distance from the mouse
			for each (var render:UIComponent in itemToRenderMap) {
				if (render == null) continue;
				var renderPoint:Point = new Point(render.x + render.width/2, render.y + render.height/2);
				var distance:Number = Math.sqrt( Math.pow(renderPoint.x - point.x, 2) + Math.pow(renderPoint.y - point.y, 2) );

				/* the radius the of smallest circle to totally encompass the current item */
				var outerDistance:Number = render.width / Math.SQRT2;

				// make it the largest size if the mouse inside the inside distance
				if (distance < insideDistance) {
					render.width = render.height = maximumSize;
					continue;
				}			

				// make is the smallest size if it's outside the scale range				
				if (distance > scaleRange + outerDistance) {
					render.width = render.height = minimumSize;
					continue;
				}

				// scale it proportionally in the scale region
				var scale:Number = 1 - ( (distance-outerDistance) / scaleRange);
				var size:Number = minimumSize + (maximumSize - minimumSize) * scale;
				render.width = render.height = size;
			}
		}

		/* ========================================
		 = protected functions
		 * ======================================= */

		/**
		 * Remove the item from the dock, removing its rendered instance and mapping
		 * from the <code>itemToRenderMap</code> and <code>renderToItemMap</code>.
		 */
		protected function removeItem(item:Object):void {
			var render:UIComponent = UIComponent(itemToRenderMap[item]);
			if (render == null) return;
			itemToRenderMap[item] = null;
			renderToItemMap[render] = null;
			renderToLabelMap[render] = null;
			this.removeChild(render);
		}
		
		/**
		 * Create an instance of the render for the given item.
		 */
		protected function createInstance(item:Object):UIComponent {

			// create the render instance
			var instance:UIComponent = UIComponent(itemRenderer.newInstance());
			if (instance is IDockItemRenderer) IDockItemRenderer(instance).data = item;
			if (instance is IDockItemRenderer) IDockItemRenderer(instance).dock = this;
			instance.width = instance.height = this.getStyle("minimumSize");
			instance.addEventListener(MouseEvent.MOUSE_DOWN, itemMousDown);
			instance.addEventListener(MouseEvent.CLICK, itemClickHandler);
			instance.addEventListener(MouseEvent.MOUSE_OVER, itemOverHandler);
			instance.addEventListener(MouseEvent.MOUSE_OUT, itemOutHandler);
			instance.addEventListener("xChanged", renderPositionChangeHandler);
			instance.addEventListener("yChanged", renderPositionChangeHandler);

			// create the label instance
			if (this.labelField == "" || this.labelRenderer == null) return instance;
			var label:UIComponent = UIComponent(labelRenderer.newInstance());
			if (label is IDockLabelRenderer) IDockLabelRenderer(label).text = item[this.labelField];
			renderToLabelMap[instance] = label;
			label.visible = false;
			Application(Application.application).addChild(label);

			return instance;
		}
		/**
		 * 屏蔽每个按钮上鼠标按下事件传递 
		 * @param e 事件数据源
		 * 
		 */		
		protected function itemMousDown(e:MouseEvent):void
		{
			e.stopPropagation();
		}
		/**
		 * Commit the properties by laying out, creating and removing necessary.
		 */
		protected override function commitProperties():void {
		
			// remove any currently mapped items not in the data provider
			for (var mappedItem:Object in itemToRenderMap) {
				if (this.dataProvider.getItemIndex(mappedItem) == -1) this.removeItem(mappedItem);
			}
			
			// add any unmapped items in the data provider (in the correct place)
			for (var i:int = 0; i < this.dataProvider.length; i++) {
				var unmappedItem:Object = this.dataProvider.getItemAt(i);
				if (itemToRenderMap[unmappedItem] != null) continue;
				var render:UIComponent = this.createInstance(unmappedItem);
				this.addChildAt(render, Math.max(i, this.numChildren));
				itemToRenderMap[unmappedItem] = render;
				renderToItemMap[render] = unmappedItem;
			}

			// move any items currently in the wrong place
			for each (var misplacedItem:Object in this.dataProvider) {
				var misplacedRender:UIComponent = itemToRenderMap[misplacedItem];
				if (misplacedRender == null) return;
				var currentChildIndex:int = this.getChildIndex(misplacedRender);
				var realItemIndex:int = this.dataProvider.getItemIndex(misplacedItem);
				if (currentChildIndex != realItemIndex) {
					this.setChildIndex(misplacedRender, realItemIndex);
				}
			}

			// invalidate to trigger an update due to a change in size
			invalidateSize();
			invalidateDisplayList();
		}
	
		/* ========================================
		 = event handlers
		 * ======================================= */
	
		/**
		 * Invalidate the properties when the list of the data provider is changed.
		 */
		protected function dataProviderListChangeHandler(event:CollectionEvent):void {
			this.invalidateProperties();
		}
		
		/**
		 * Event handler for item clicks on the items in the dock.
		 */
		protected function itemClickHandler(event:MouseEvent):void {
			var render:UIComponent = event.currentTarget as UIComponent;
			if (render == null) return;
			var item:Object = renderToItemMap[render];
			if (item == null) return;
			this.dispatchEvent(new DockItemEvent(DockItemEvent.DOCK_ITEM_CLICK, render, dataProvider.getItemIndex(item)));
		}
		
		/**
		 * Event handler for item over events on the dock.
		 */
		protected function itemOverHandler(event:MouseEvent):void {
			
			// dispatch an event and notify the item itself
			var render:UIComponent = event.currentTarget as UIComponent;
			if (render == null) return;
			var item:Object = renderToItemMap[render];
			if (item == null) return;
			this.dispatchEvent(new DockItemEvent(DockItemEvent.DOCK_ITEM_OVER, render, dataProvider.getItemIndex(item)));
			if (render is IDockItemRenderer) IDockItemRenderer(render).over = true;
			
			// make the label visible if any is applied (taking into account the delay)
			var label:UIComponent = UIComponent(renderToLabelMap[render]);
			if (label == null) return;
			var labelAppearanceDelay:Number = this.getStyle("labelAppearanceDelay");
			if (labelAppearanceDelay <= 0) {
				label.visible = true;
				return;
			} else {
				this.labelAppearanceTimer = new Timer(this.getStyle("labelAppearanceDelay"), 1);
				this.labelAppearanceTimer.addEventListener(TimerEvent.TIMER_COMPLETE, labelAppearanceHandler);
				this.labelToAppear = label;
				this.labelAppearanceTimer.start();
			}
		}

		/**
		 * Event handler for item over events on the dock.
		 */
		protected function itemOutHandler(event:MouseEvent):void {
			
			// dispatch an event and notify the item itself
			var render:UIComponent = event.currentTarget as UIComponent;
			if (render == null) return;
			var item:Object = renderToItemMap[render];
			if (item == null) return;
			this.dispatchEvent(new DockItemEvent(DockItemEvent.DOCK_ITEM_OUT, render, dataProvider.getItemIndex(item)));
			if (render is IDockItemRenderer) IDockItemRenderer(render).over = false;
			
			// make the label invisible if any is applied
			var label:UIComponent = UIComponent(renderToLabelMap[render]);
			if (label != null) label.visible = false;
			
			// stop the label appearance timer
			if (labelAppearanceTimer != null && labelAppearanceTimer.running) this.labelAppearanceTimer.stop();
		}
		
		/**
		 * Event handler called when the position of the render changes. Used to update the position
		 * of the label relative to the render.
		 */
		protected function renderPositionChangeHandler(event:Event):void {
			var render:UIComponent = event.target as UIComponent;
			if (render == null) return;
			var label:UIComponent = renderToLabelMap[event.target] as UIComponent;
			if (label == null) return;
			
			// prepare some variables for the calculations
			var midPoint:Point = this.localToGlobal(new Point(render.x + render.width/2, render.y + render.height/2));
			var labelPosition:String = this.getStyle("labelPosition");
			var labelGap:Number = this.getStyle("labelGap");
			var horizontalLabelAlign:String = this.getStyle("horizontalLabelAlign");
			var verticalLabelAlign:String = this.getStyle("verticalLabelAlign");

			// calculate the vertical and horizontal offsets to align the labels
			var horizontalOffset:Number = (horizontalLabelAlign == "center") ? -label.width/2 :
				(horizontalLabelAlign == "left") ? -render.width/2 : (render.width/2 - label.width);
			var verticalOffset:Number = (verticalLabelAlign == "middle") ? -label.height/2 :
				(verticalLabelAlign == "top") ? -render.height/2 : (render.height/2 - label.height);

			// set the position of the label accordingly
			if (labelPosition == "top") {
				label.x = midPoint.x + horizontalOffset;
				label.y = midPoint.y - render.width/2 - label.height - labelGap;
			} else if (labelPosition == "left") {
				label.x = midPoint.x - render.width/2 - label.width - labelGap;
				label.y = midPoint.y + verticalOffset;
			} else if (labelPosition == "right") {
				label.x = midPoint.x + render.width/2 + labelGap;
				label.y = midPoint.y + verticalOffset;
			} else {
				label.x = midPoint.x + horizontalOffset;
				label.y = midPoint.y + render.width/2 + labelGap;
			}

		}

		/**
		 * Event handler for showing the label after the label appearance delay.
		 */
		protected function labelAppearanceHandler(event:TimerEvent):void {
			if (labelToAppear == null) return;
			labelToAppear.visible = true;
		}

	}
}