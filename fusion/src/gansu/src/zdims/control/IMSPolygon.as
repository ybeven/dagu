/**
* 路径类
*/
package zdims.control
{
	import flash.display.DisplayObject;
	import flash.events.Event;
	import flash.geom.Point;
	
	import mx.controls.Alert;
	import mx.core.UIComponent;
	
	import zdims.event.IMSMapEvent;
	import zdims.event.IMSMapMoveEvent;
	import zdims.map.OverlayObject;
	import zdims.util.IMSOperType;

	/**
	 * 路径类
	 * @author shiyanting
	 */
	public class IMSPolygon extends OverlayObject
	{
		/**
		 * 构造函数
		 * @param container
		 */
		public function IMSPolygon()
		{
			this._stopIcon = new Array();
		}
		/**
		 * 多边形线上的坐标点,形式:(x,y,x,y...),(x,y,x,y...),(x,y,x,y...)
		 * @default
		 */
		public var _lineDots:String = "";
		/**
		 * 公交站点图片数组
		 * @default
		 */
		public var _stopIcon:Array;
		/**
		 * 颜色值
		 * @default
		 */
		public var borderColor:uint = 0xff0000;
		/**
		 * 大小
		 * @default
		 */
		public var borderSize:uint = 4;
		/**
		 * 透明度
		 * @default
		 */
		public var fillAlpha:Number = 0.5;
		/**
		 * 是否允许填充颜色，如果该值为TRUE,则将绘制带填充颜色的多边形。
		 */		
		public var enableFill:Boolean=true;
		/**
		 * 填充颜色
		 */		
		public var fillColor:uint=0xff0000;


		/**
		 * 添加路径点
		 * @param name
		 * @param logicX
		 * @param logicY
		 * @param seq
		 * @param iconSrc
		 * @param showName
		 */
		public function addNode(name:String, logicX:Number, logicY:Number, seq:Number, iconSrc:String, showName:Boolean=true):void
		{
			var stopNode:Marker = new Marker();
			stopNode.name = name;
			stopNode.toolTip = name;
			stopNode.logicX = logicX;
			stopNode.logicY = logicY;
			stopNode.setIconSrc(iconSrc);
			stopNode.visible = false;
			stopNode.enableShowName = showName;
			stopNode.imsmap=this.imsmap;
			stopNode.updatePosition();
			this._stopIcon[this._stopIcon.length] = this.imsmap.addChildAt(stopNode,this.imsmap.layerLenth+2);
		}

		/**
		 * 清除绘制路径点
		 */
		public function clear():void
		{
			this.graphics.clear();
			this.visible = false;
			//set the stop icon visible
			for (var i:int = 0; i < this._stopIcon.length; i++)
			{
				UIComponent(this._stopIcon[i]).visible = false;
			}
		}

		/**
		 * 重置路径点
		 */
		public function dispose():void
		{
			this.graphics.clear();
			this.visible = false;
			for (var i:int = 0; i < this._stopIcon.length; i++)
			{
				this.imsmap.removeChild(this._stopIcon[i]);
			}
		}

		/**
		 * 绘制路径点
		 */
		public function drawRoad():void
		{
			if (this.imsmap == null)
			{
				Alert.show("地图容器属性为空，请赋值！", "提示");
				return;
			}
			this.graphics.clear();
			if (!this.imsmap.contains(this as DisplayObject))
				this.imsmap.addChildAt(this, this.imsmap.layerLenth+2);
			this.graphics.lineStyle(borderSize, borderColor);
			if(this.enableFill)
				this.graphics.beginFill(this.fillColor,this.fillAlpha);
				
			var lines:Array=this._lineDots.split("),(");
			for each( var curLine:String in lines)
			{	
				curLine=curLine.replace("(","");
				curLine=curLine.replace(")","");
				var dotArr:Array = curLine.split(",");
				var dotNum:Number = dotArr.length;
				for (var i:int = 0; i < dotNum - 1; i+=2)
				{
					if (dotArr[i] == "" || dotArr[i] == "undefined")
						continue;
					var wxy:Point = this.imsmap.logicToScreen(dotArr[i], dotArr[i + 1]);
					if (i == 0)
						this.graphics.moveTo(wxy.x, wxy.y);
					else
						this.graphics.lineTo(wxy.x, wxy.y);
				}
			}
			
			if(this.enableFill)
				this.graphics.endFill();
			this.visible = true;
			//set the stop icon visible
			for (i = 0; i < this._stopIcon.length; i++)
			{
				UIComponent(this._stopIcon[i]).visible = true;
			}
		}

		/**
		 * 更新位置信息
		 */
		public override function updatePosition(e:Event=null):void
		{
			if(!enableUpdatePosition)
				return;
			if(e is IMSMapMoveEvent)
			{
				if(this.imsmap.operType==IMSOperType.Drag)
				{
					var xLen:int=this.imsmap.mouseMoveScrPnt.x - this.imsmap.mouseDownScrPnt.x;
                	var yLen:int=this.imsmap.mouseMoveScrPnt.y - this.imsmap.mouseDownScrPnt.y;
                	this.x =this.oldx+xLen;
                    this.y = this.oldy+yLen;
				}
				return;
			}
			this.oldx=this.x = 0;
			this.oldy=this.y = 0;
			
			if (this.visible)
			{
				this.drawRoad();
				if(e is IMSMapEvent)
				{
				}
			}
		}
	}
}