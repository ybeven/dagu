package com.outsmart.fixeddrawer.core {
	
	import flash.events.Event;
	import flash.events.MouseEvent;
	import flash.events.TimerEvent;
	import flash.utils.Timer;
	import flash.geom.Rectangle;
	import flash.geom.Point;
	import mx.containers.Box;
	import mx.events.FlexEvent;
	import mx.core.Application;
	import mx.events.EffectEvent;
	import mx.effects.Fade;

	/* ========================================
	 =
	 = events
	 =
	 * ======================================= */

	/**
	 * Dispatched when the drawer is closed.
	 */
	[Event(name="close", type="flash.events.Event")]

	/**
	 * Dispatched when the drawer is opened.
	 */
	[Event(name="open", type="flash.events.Event")]

	/* ========================================
	 =
	 = effects
	 =
	 * ======================================= */

	/**
	 * Played when the component is closed.
	 */
	[Effect(name="closeEffect", event="close")]

	/**
	 * Played when the component is opened.
	 */
	[Effect(name="openEffect", event="open")]

	/* ========================================
	 =
	 = class implementation
	 =
	 * ======================================= */

	/**
	 * The FixedDrawer is a component that is designed to be a sliding drawer placed on the edges of an application.
	 * When the drawer is closed, mouse events around the region where the drawer should appear will open the drawer, and
	 * mouse events off the drawer once the drawer is open will close and hide the drawer.
	 * 
	 * <p>The drawer in this implementation will not slide the drawer but fade as a default implementation for simplicity, 
	 * sliding effects can be performed by setting the <code>closeEffect</code> and <code>openEffect</code> respectively.</p>
	 */

	public class FixedDrawer extends Box {

		/* ========================================
		 = private properties
		 * ======================================= */

		private var openTimer:Timer;
		private var closeTimer:Timer;

		/* ========================================
		 = constants
		 * ======================================= */

		public static const DOCK_SIDE_LEFT:String = "left";
		public static const DOCK_SIDE_RIGHT:String = "right";
		public static const DOCK_SIDE_TOP:String = "top";
		public static const DOCK_SIDE_BOTTOM:String = "bottom";
		
		protected static const MINIMUM_TIMER_DELAY:Number = 1;
		
		/* ========================================
		 = public properties
		 * ======================================= */
		
		/**
		 * The fixed value defines whether or not the drawer is fixed in
		 * its current position, fixed on or off the screen.
		 */
		public var fixed:Boolean = false;
		
		/**
		 * The width of the area the protrudes from the sides, top or bottom of the 
		 * screen that when moved over will show the drawer. Default value is 40.
		 */
		public var openProximityDistance:Number = 40;
		
		/**
		 * A default transition value of true means that the drawer plays fade effects when 
		 * opening and closing.
		 */
		public var defaultTransitions:Boolean = true;
		
		/**
		 * Get the length of time (in milliseconds) before the drawer opens after the first 
		 * mouse movement is detected inside the proximity distance of the drawer when it is closed.
		 * Default value is 1.
		 */
		public function get openDelay():Number {
			return this._openDelay;
		}
		
		/**
		 * Set the open delay of the drawer.
		 */
		public function set openDelay(value:Number):void {
			if (value < MINIMUM_TIMER_DELAY) value = MINIMUM_TIMER_DELAY;
			this._openDelay = value;
			this.openTimer.delay = value;
		}
		
		/**
		 * Get the length of time (in milliseconds) before the drawer closes after the first 
		 * mouse movement is detected outside the drawer when it is open.
		 * Default value is 2000.
		 */
		public function get closeDelay():Number {
			return this._closeDelay;
		}
		
		/**
		 * Set the close delay of the drawer.
		 */
		public function set closeDelay(value:Number):void {
			if (value < MINIMUM_TIMER_DELAY) value = MINIMUM_TIMER_DELAY;
			this._closeDelay = value;
			this.closeTimer.delay = value;
		}
		
		/**
		 * Get whether or not the drawer is open.
		 */
		public function get opened():Boolean {
			return this._opened;
		}
		
		/**
		 * Set whether or not the drawer is open.
		 */
		public function set opened(value:Boolean):void {
			if (this.opened == value) return;
			this._opened = value;
			if (this.opened) this.dispatchEvent(new Event("open"));
			else this.dispatchEvent(new Event("close"));
		}
		
		/**
		 * Get whether or not the drawer is closed.
		 */
		public function get closed():Boolean {
			return !this._opened;
		}
		
		/**
		 * Set whether or not the drawer is closed.
		 */
		public function set closed(value:Boolean):void {
			this.opened = !value;
		}
		
		/** 
		 * Get the side of the parent container that the drawer will reside.
		 */
		public function get dockSide():String {
			return this._dockSide;
		}

		/** 
		 * Specifies the side of the parent container that the drawer will reside. 
		 * Valid values are: "left", "right", "top" or "bottom". Default is "bottom"
		 */
		public function set dockSide(value:String):void {
			if (this.dockSide == value) return;
			this._dockSide = value;
		}		
		
		/* ========================================
		 = protected properties
		 * ======================================= */
		
		/**
		 * Whether or not the drawer is open.
		 */
		protected var _opened:Boolean = true;
		
		/**
		 * The side of the parent the dock is fixed on.
		 */
		protected var _dockSide:String = DOCK_SIDE_BOTTOM;
		
		/**
		 * The time before the drawer is opened after the initial mouse event is heard.
		 */
		protected var _openDelay:Number = MINIMUM_TIMER_DELAY;
		
		/**
		 * The time before the drawer is closed after the initial mouse event is heard.
		 */
		protected var _closeDelay:Number = 2000;
		
		/* ========================================
		 = constructor
		 * ======================================= */
		
		/**
		 * FixedDrawer constructor.
		 */
		public function FixedDrawer() {
			this.addEventListener(FlexEvent.CREATION_COMPLETE, onComplete);
			
			this.openTimer = new Timer(openDelay, 1);
			this.closeTimer = new Timer(closeDelay, 1);
			
			this.openTimer.addEventListener(TimerEvent.TIMER_COMPLETE, onOpenTimer);
			this.closeTimer.addEventListener(TimerEvent.TIMER_COMPLETE, onCloseTimer);
		}

		/* ========================================
		 = event handlers
		 * ======================================= */

		/**
		 * Executed once the drawer has been created.
		 */		
		protected function onComplete(event:Event):void {
			this.removeEventListener(FlexEvent.CREATION_COMPLETE, onComplete);
			Application(this.parentApplication).addEventListener(MouseEvent.MOUSE_MOVE, onMouseMove);
		}
		
		/**
		 * Executed when the mouse is moved on the parent of the drawer (used to open or close the drawer).
		 */
		protected function onMouseMove(event:MouseEvent):void {
			if (this.fixed) return;

			// get the mouse position in local coordinates relative to the parent
			var point:Point = new Point(this.mouseX, this.mouseY);
			point = this.localToGlobal(point);
			point = parent.globalToLocal(point);
			
			// get the hit detect region for the drawer to appear
			var rect:Rectangle;

			switch(dockSide) {
			case DOCK_SIDE_LEFT:
				rect = new Rectangle(0, this.y, openProximityDistance, this.height);
				break;
			case DOCK_SIDE_TOP:
				rect = new Rectangle(this.x, 0, this.width, openProximityDistance);
				break;
			case DOCK_SIDE_RIGHT:
				rect = new Rectangle(parent.width-openProximityDistance, this.y, openProximityDistance, this.height);
				break;
			case DOCK_SIDE_BOTTOM:
				rect = new Rectangle(this.x, parent.height-openProximityDistance, this.width, openProximityDistance);
				break;
			}

			// add the rectangle of the drawer if the drawer is open
			if (this.opened) {
				var boundsRect:Rectangle = new Rectangle(x, y, width, height);
				rect = rect.union(boundsRect);
			}
			
			// if the mouse is over the rectangle, open the drawer (after the timer) otherwise close the it (after the timer)
			if (rect.contains(point.x, point.y)) {
				this.closeTimer.stop();
				if (this.closed && !this.openTimer.running) {
					this.openTimer.reset();
					this.openTimer.start();
				}
			} else {
				this.openTimer.stop();
				if (this.opened && !this.closeTimer.running) {
					this.closeTimer.reset();
					this.closeTimer.start();
				}
			}
		}

		/**
		 * Executed on the timer event when the drawer is due to open.
		 */
		protected function onOpenTimer(event:TimerEvent):void {
			if (this.fixed || this.opened) return;
			this.opened = true;

			if (defaultTransitions) {
				this.visible = true;
				var openEffect:Fade = new Fade();
				openEffect.alphaFrom = 0.0;
				openEffect.alphaTo = 1.0;
				openEffect.play([this]);
			}
		}
		
		/**
		 * Executed on the timer event when the drawer is due to close.
		 */
		protected function onCloseTimer(event:TimerEvent):void {
			if (this.fixed || this.closed) return;
			this.closed = true;
			
			if (this.defaultTransitions) {
				var closeEffect:Fade = new Fade();
				closeEffect.alphaFrom = 1.0;
				closeEffect.alphaTo = 0.0;
				closeEffect.addEventListener(EffectEvent.EFFECT_END, onDefaultCloseEffect);
				closeEffect.play([this]);
			}
		}

		/**
		 * Executed when the default open effect has finished playing and the 
		 */
		protected function onDefaultCloseEffect(event:EffectEvent):void {
			this.visible = false;
		}

	}
}
