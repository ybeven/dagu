/**
* 信息点
*/
package zdims.control
{
	import flash.events.Event;
	import flash.events.MouseEvent;
	import flash.geom.Point;
	
	import zdims.event.IMSMapMoveEvent;
	import zdims.map.OverlayObject;

	/**
	 * 信息点类
	 * @author shiyanting
	 */
	public class IMSPoint extends OverlayObject
	{
		/**
		 * 透明度
		 * @default 
		 */
		public var fillAlpha:Number  = 0.5;
        /**
         * 轮廓颜色
         * @default 
         */
        public var borderColor:uint  = 0xff0000;
        /**
		 * 填充颜色
		 */		
		public var fillColor:uint=0xff0000;
        /**
         * 大小
         * @default 
         */
        public var borderSize:uint   = 2;
        /**
         * 半径
         * @default 
         */
        public var radius:Number 	 =5;
        /**
         * 每次更新图形时是否重新计算半径，如果该值为TRUE,则radius属性应为固定的某一逻辑长度。
         */        
        public var enableUpadateRadius:Boolean=false;
        /**
         * 父节点样式类型
         * @default 
         */
        public var parentGeoType:String;
        /**
         * 能否移动
         * @default 
         */
        public var enableDrag:Boolean = true;
        /**
         * 是否按下
         * @default 
         */
        public var mouseDown:Boolean  = false;
		/**
		 * 离左边偏移量
		 * @default 
		 */
		public var lastLeft:int       =0;
		/**
		 * 离上边偏移量
		 * @default 
		 */
		public var lastTop:int		  =0;
		private var mouseDX:int		  =0;
		private var mouseDY:int		  =0;
		
		/**
		 * 构造函数
		 * @param map
		 */
		public function IMSPoint()
		{
			super();
			this.addEventListener(MouseEvent.MOUSE_DOWN,onMouseDown);
			this.addEventListener(MouseEvent.MOUSE_UP,onMouseUp);
			this.useHandCursor = true;
		}
		protected override function initializationComplete():void
		{
			super.initializationComplete();
			this.imsmap.addEventListener(MouseEvent.MOUSE_MOVE,onMouseMove);
		}
		
		/**
		 * 鼠标按下回调函数
		 * @param e
		 */
		public function onMouseDown(e:MouseEvent):void
		{
			if(!this.enableDrag)return;
			mouseDown = true;
			this.lastLeft = this.x;
			this.lastTop = this.y;
			this.mouseDX = this.imsmap.contentMouseX;
			this.mouseDY = this.imsmap.contentMouseY;
			e.stopPropagation();
		}
		
		/**
		 * 鼠标移动回调函数
		 * @param e
		 */
		public function onMouseMove(e:MouseEvent):void
		{
			if(!this.enableDrag)return;
			if(!mouseDown)return;
			var xlen:int = this.imsmap.contentMouseX - this.mouseDX;
			var ylen:int = this.imsmap.contentMouseY - this.mouseDY;
			this.x = this.lastLeft+xlen;
			this.y = this.lastTop+ylen;
		}
		
		/**
		 * 鼠标弹起回调函数
		 * @param e
		 */
		public function onMouseUp(e:MouseEvent):void
		{
			if(!this.enableDrag)return;
			if(!mouseDown) return;
			var tmpPnt:Point = this.imsmap.screenToLogic(this.imsmap.contentMouseX,this.imsmap.contentMouseY);
			this.logicX = tmpPnt.x;
			this.logicY = tmpPnt.y;
			mouseDown = false;
		}
		
		/**
		 * 鼠标移出回调函数
		 * @param e
		 */
		public function onMouseOut(e:MouseEvent):void
		{
			onMouseUp(e);
			mouseDown = false;
		}
		
		/**
		 * 更新坐标函数
		 */
		public override function updatePosition(e:Event=null):void
		{
			if(!enableUpdatePosition)
				return;
			if(this.imsmap == null)
				return;
			if(e!=null&&e.type==IMSMapMoveEvent.MOVE_STEP)
			{
				var xLen:int=this.imsmap.mouseMoveScrPnt.x - this.imsmap.mouseDownScrPnt.x;
            	var yLen:int=this.imsmap.mouseMoveScrPnt.y - this.imsmap.mouseDownScrPnt.y;
            	this.x =this.oldx+xLen;
                this.y = this.oldy+yLen;
				return;
			}
			this.x = 0;
			this.y = 0;
			this.graphics.clear();
			this.graphics.beginFill(fillColor,fillAlpha);
            this.graphics.lineStyle(borderSize, borderColor);
            var winxy:Point = this.imsmap.logicToScreen(this.logicX,this.logicY);
            if(enableUpadateRadius)
            {
            	var tmpRadius:Number=this.radius/this.imsmap.getBuffer(1);
            	if(tmpRadius<2)
            		tmpRadius=2;
        		this.graphics.drawCircle(winxy.x,winxy.y,tmpRadius);
            }
            else
            	this.graphics.drawCircle(winxy.x,winxy.y,this.radius);
            this.graphics.endFill(); 
		}
		
	}
}