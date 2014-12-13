/**
* 树目录
*/
package zdims.control
{
	import Mapgis7.WebService.BasLib.CLayerAccessInfo;
	import Mapgis7.WebService.BasLib.CLayerInfo;
	import Mapgis7.WebService.BasLib.CMapLayerInfo;
	import Mapgis7.WebService.BasLib.EnumLayerStatus;
	
	import flash.events.Event;
	
	import mx.controls.Tree;
	import mx.events.DragEvent;
	
	import zdims.interfaces.control.ICatalog;
	import zdims.map.IMSMap;
	import zdims.map.TileLayer;
	import zdims.map.VectorLayer;
	import zdims.map.VectorMapDoc;
	/**
	 * 树目录类
	 * @author shiyanting
	 */
	public class IMSTree extends Tree implements ICatalog
	{  
 
		/**
		 * 构造函数
		 */
		public function IMSTree()
		{
			super();
			initMapTree();
		}
		[Bindable]
		/**
		 * 基类结构
		 * @default 
		 */
		public var baseStruct:XML;
		[Bindable]
		[Embed(source="/image/tree/data.gif")]
		private var _folderCloseImg:Class;

		[Bindable]
		[Embed(source="/image/tree/v4.gif")]
		private var _leafActi:Class;

		[Bindable]
		[Embed(source="/image/tree/v3.gif")]
		private var _leafEdi:Class;

		[Bindable]
		[Embed(source="/image/tree/v0.gif")]
		private var _leafInVis:Class;

		[Bindable]
		[Embed(source="/image/tree/v2.gif")]
		private var _leafSel:Class;

		[Bindable]
		[Embed(source="/image/tree/v1.gif")]
		private var _leafVis:Class;
		private var _map:IMSMap;
		private var tileNode:XML;
		private var treeNodeStatus:CTreeNodeStatus;
		private var _treeContextMenu:IMSTreeContextMenu;

		private var vectorNode:XML;

		/**
		 * 添加地图文档结点
		 * @param vectorMap
		 * @param mapDocIdx
		 */
		public function addMapDocNode(vectorMap:VectorMapDoc, mapDocIdx:int=0):void
		{
			var vectorParentNode:XML = getNodeByName(this.baseStruct, "VectorMapParent");
			var vectorMapName:String;
			var layerNodeCount:int;
			var layerNodeArray:Array=new Array();
			if (vectorMap == null)
				return;
			else
			{
				vectorMapName = vectorMap.mapDocName;
				if(vectorMap.loadMapResult!=null)
				{
					layerNodeCount = vectorMap.loadMapResult.LayerCount;
					layerNodeArray = new Array(layerNodeCount);
					var layerAccessArry:Array = new Array(layerNodeCount);
					layerAccessArry = vectorMap.loadMapResult.LayerAccessInfo.LayerAccessInfo;
					var mapLayerInfoArry:Array = vectorMap.loadMapResult.MapLayerInfo;
					for (var i:int = 0; i < layerNodeCount; i++)
					{
						var layerName:String;
						var layerAccess:CLayerAccessInfo = layerAccessArry[i] as CLayerAccessInfo;
						var layerInfo:CLayerInfo = layerAccess.LayerInfoList[0] as CLayerInfo;
						layerName = layerInfo.LayerDataName;
						var layerOriStatus:String = CMapLayerInfo(mapLayerInfoArry[i]).LayerStatus;
						var vectorLayerNode:CMapDocLayerNode= new CMapDocLayerNode(layerName, i, layerOriStatus);
						layerNodeArray[i] = vectorLayerNode;
					}
				}
				var listIndex:int = this.treeNodeStatus._treeVectorDocs.length+1;
				var vectorMapDocStr:String = "<VectorMapDoc type='1' listIndex='"+listIndex+"' text='" + vectorMapName + "' index='" + mapDocIdx + "'></VectorMapDoc>";
				var vectorMapDocXML:XML = new XML(vectorMapDocStr);
				vectorParentNode.appendChild(vectorMapDocXML);
				this.addVectorMapDocs(layerNodeArray, vectorMapDocXML);
				this.treeNodeStatus.vectorDocsPush(vectorMap); // 将矢量文档对象保存在一个全局变量里
			}
		}
		/**
		 * 根据某个地图文档节点信息
		 * @param oldMapDocName 要更新地图文档节点的地图文档名称
		 * @param newMapdoc 新的地图文档对象
		 * 
		 */		
		public function updateMapDocNode(oldMapDocName:String,newMapdoc:VectorMapDoc):void
		{
			var vectorParentNode:XML = getNodeByName(this.baseStruct, "VectorMapParent");
			var docList:XMLList=vectorParentNode.children();
			for(var d:int=0;d<docList.length();d++)
			{
				var docNode:XML=docList[d];
				if(docNode.@text==oldMapDocName)
				{
					docNode.@text=newMapdoc.mapDocName;
					var layerNodeCount:int;
					var layerNodeArray:Array;
					layerNodeCount = newMapdoc.loadMapResult.LayerCount;
					layerNodeArray = new Array(layerNodeCount);
					var layerAccessArry:Array = new Array(layerNodeCount);
					layerAccessArry = newMapdoc.loadMapResult.LayerAccessInfo.LayerAccessInfo;
					var mapLayerInfoArry:Array = newMapdoc.loadMapResult.MapLayerInfo;
					for (var i:int = 0; i < layerNodeCount; i++)
					{
						var layerName:String;
						var layerAccess:CLayerAccessInfo = layerAccessArry[i] as CLayerAccessInfo;
						var layerInfo:CLayerInfo = layerAccess.LayerInfoList[0] as CLayerInfo;
						layerName = layerInfo.LayerDataName;
						var layerOriStatus:String = CMapLayerInfo(mapLayerInfoArry[i]).LayerStatus;
						var vectorLayerNode:CMapDocLayerNode= new CMapDocLayerNode(layerName, i, layerOriStatus);
						layerNodeArray[i] = vectorLayerNode;
					}
					var newxml:XML=new XML("<obj/>");
					this.addVectorMapDocs(layerNodeArray, newxml);
					docNode.setChildren(newxml.children());
					this.treeNodeStatus._treeVectorDocs[docNode.@index]=newMapdoc; 
				}
			}
		}

		/**
		 * 添加瓦片结点
		 * @param tileLayer
		 * @param index
		 */
		public function addTileLayerNode(tileLayer:TileLayer, index:int=0):void
		{
			if(!tileLayer.enableFillImg) return;
			var tileParentNode:XML = this.getNodeByName(this.baseStruct, "TileMapParent");
			var tileLayerName:String;
			var tileLayerIndex:int;
			var listIndex:int = this.treeNodeStatus._treeTileLayers.length+1;
			tileLayerName = tileLayer.hdfName;
			tileLayerIndex = index;
			var tileLayerOriStatus:String = tileLayer.visible == true ? "Visiable" : "Invisiable";
			var tileNodeStr:String = "<TileLayer status='" + tileLayerOriStatus + "' oriStatus='" + tileLayerOriStatus + "' type='2' text='" + tileLayerName + "' index='" + tileLayerIndex + "'/>";
			var tileNodeXML:XML = new XML(tileNodeStr);
			tileParentNode.appendChild(tileNodeXML);
			this.treeNodeStatus.tileLayersPush(tileLayer);
		}
		/**
		 * 添加矢量图（图层）
		*/
		public function addVectorLayerNode(vectorLayer:VectorLayer,index:int=0):void
		{
			if(index==0)
				index=this.treeNodeStatus._treeVectorLayers.length;
			var layerAccessInfoArray:Array = vectorLayer.layerObj.LayerAccessInfo;
			var parentNode:XML = this.getNodeByName(this.baseStruct,"VectorLayerParent");
			var vectorLayerName:String ="位于"+vectorLayer.serverAddress+"-";
			var listIndex:int = this.treeNodeStatus._treeVectorLayers.length;
			var vectorLayerNodeStr:String ="<VectorLayer text='"+vectorLayerName+"' type='6' listIndex='"+listIndex+"'/>";
			var vectorLayerNode:XML = new XML(vectorLayerNodeStr);
			parentNode.appendChild(vectorLayerNode);
			this.treeNodeStatus.vectorLayersPush(vectorLayer);
			var layerStatus:String =EnumLayerStatus.Visiable;
			for(var i:int=0;i<layerAccessInfoArray.length;i++)
			{
				var layerAccessInfo :CLayerAccessInfo = layerAccessInfoArray[i] as CLayerAccessInfo;
				var layerAccessInfoName:String= layerAccessInfo.GdbInfo.GDBName;
				var accessInfoNodeStr:String ="<CLayerAccessInfo text='"+layerAccessInfoName+"' type='7'  status='"+layerStatus+"' listIndex='"+i+"'/>";
				var layerAccessInfoNode:XML = new XML(accessInfoNodeStr);
				vectorLayerNode.appendChild(layerAccessInfoNode);
				for(var j:int=0;j<layerAccessInfo.LayerInfoList.length;j++)
				{
					var index:int = j;
					var layerInfo:CLayerInfo = layerAccessInfo.LayerInfoList[j] as CLayerInfo;
					var layerName:String = layerInfo.LayerDataName;
					var curLayerState:String=EnumLayerStatus.Visiable;
					var isActive:Boolean=i==vectorLayer.activeGdbIndex&&j==vectorLayer.activeLayerIndex?true:false;
					if(isActive)
					{
						curLayerState="Activate";
						if(this._treeContextMenu!=null&&this._treeContextMenu.activeLayer!=null)
							this._treeContextMenu.activeLayer.@status=this._treeContextMenu.activeLayer.@oriStatus;
					}
					var layerNodeStr:String = "<Layer text='"+layerName+"' index='"+index+"' status='"+curLayerState+"' oriStatus='"+layerStatus+"' type='8'/>";
					var layerNode:XML= new XML(layerNodeStr);
					layerAccessInfoNode.appendChild(layerNode);
					if(isActive)
					{
						this._treeContextMenu.activeLayer=layerNode;
					}
				}
			}
		}

		/**
		 * 
		 * @return 
		 */
		public function get imsmap():IMSMap
		{
			return this._map;
		}

		[Inspectable(category="MapGisIMS")]
		/**
		 * 
		 * @param m
		 */
		public function set imsmap(m:IMSMap):void
		{
			this._map = m;
			this.treeNodeStatus.imsmap = this._map;
		}

		/**
		 * 初始化树目录,类型数字，0:矢量文档图层，1：矢量文档子节点，2：瓦片子节点，3：矢量文档父节点，4：瓦片父节点，5：矢量图层父节点，6：矢量图层子节点,7:矢量图层CLayerAccessInfo节点，8：矢量图层LayerInfo节点
		 */
		public function initMapTree():void
		{
			if (baseStruct == null)
			{
				var xmlStr:String="<?xml version='1.0' encoding='utf-8'?>" + "<Root text='地图集'><TileMapParent text='瓦片集' type='4'></TileMapParent>" + "<VectorMapParent text='矢量图(文档)' type='3'></VectorMapParent>" +"<VectorLayerParent text='矢量图(图层)' type='5'></VectorLayerParent>"+ "</Root>";
				this.baseStruct = new XML(xmlStr);
			}
			this.dataProvider = this.baseStruct;
			this.showRoot = false;
			this.labelField = "@text";
			this.addEventListener(Event.CHANGE, treeChange);
			//传递给右键菜单的一些信息
			this.treeNodeStatus = new CTreeNodeStatus();
			//右键菜单		
			_treeContextMenu = new IMSTreeContextMenu(this.treeNodeStatus, this);
			this.contextMenu = _treeContextMenu.myContextMenu;
			//设置tree图标
			this.iconFunction = treeIconFun;
			//this.setStyle("alternatingItemColors",["#FFFFFF","#EEEEEE"]);
			//拖拽			
			this.dragEnabled = true;
			this.dragMoveEnabled = true;
			this.dropEnabled = true;
			this.allowMultipleSelection = true;

		}
		/**
		 * 获取树目录的自定义右键菜单对象
		 * @return 获取树目录的自定义右键菜单对象
		 * 
		 */		
		public function get treeContextMenu():IMSTreeContextMenu
		{
			return this._treeContextMenu;
		}

		/**
		 * 设置结点信息
		 * @param map
		 */
		public function setNodesByMap(map:IMSMap):void
		{
			var i:int=0;
			var j:int=0;
			var k:int=0;
			for (i = 0; i < map.titleLayerLength; i++)
			{
				var tileLayer:TileLayer = map.titleLayerList.getItemByIndex(i) as TileLayer;
				if(tileLayer!=null)
					this.addTileLayerNode(tileLayer,i);
			}
			for (i=0,j=0,k=0; i < map.vectorLayerLenth; i++)
			{
				var vLayer:VectorMapDoc = map.vectorLayerList.getItemByIndex(i) as VectorMapDoc;
				if(vLayer!=null)
					this.addMapDocNode(vLayer,j++);
				else
				{
					var layer:VectorLayer=map.vectorLayerList.getItemByIndex(i) as VectorLayer;
					if(layer!=null)
						this.addVectorLayerNode(layer,k++);
				}
			}
		}

		override protected function dragDropHandler(event:DragEvent):void
		{
			var dragNode:XML = this.selectedItem as XML;
			var r:int=this.calculateDropIndex(event);
			var oldIndex:int = this.selectedIndex;
			this.selectedIndex = r;
			var dropNode:XML = this.selectedItem as XML;
			if (dragNode.parent() == dropNode.parent())
			{
				this.selectedIndex = oldIndex;
				super.dragDropHandler(event);
				var pNode:XML = dragNode.parent() as XML;
				var pNodeType:String = pNode.attribute("type") as String;
				switch (pNodeType)
				{
					case "3":
						this.ExchangeMapZIndex(dragNode,dropNode);
						break;
					case "4":
						this.ExchangeMapZIndex(dragNode,dropNode);
						break;
					case "5" :
						this.ExchangeMapZIndex(dragNode,dropNode);
						break;	 	
				}
			}
			else
				return;
		}
		
		private function ExchangeMapZIndex(dragNode:XML,dropNode:XML):void
		{
			var listIndexDrag:int = dragNode.attribute("listIndex") as int;
			var listIndexDrop:int = dropNode.attribute("listIndex") as int;
			var vectorLayerDrag:VectorLayer = this.treeNodeStatus._treeVectorLayers[listIndexDrag];
			var vectorLayerDrop:VectorLayer = this.treeNodeStatus._treeVectorLayers[listIndexDrop];
			var dragNodeIndex:int= this._map.getChildIndex(vectorLayerDrag);
			var dropNodeIndex:int= this._map.getChildIndex(vectorLayerDrop);
			this._map.setChildIndex(vectorLayerDrag,dropNodeIndex);
		}
		/**
		 * 添加图层结点
		 */ 
		private function addVectorMapDocs(layerNodeInfoArry:Array, vectorDocNode:XML):void
		{                                    
			for each (var layerNode:CMapDocLayerNode in layerNodeInfoArry)
			{
				var layerText:String = layerNode.layerName;
				var layerIndex:int = layerNode.layerIndex;
				var childNodeString:String = "<VectorLayer status='" + layerNode.OriLayerStatus + "' oriStatus='" + layerNode.OriLayerStatus + "' type='0' text='" + layerText + "' index='" + layerIndex + "'/>";
				var childNode:XML = new XML(childNodeString);
				vectorDocNode.appendChild(childNode);
			}
		}
		/**
		 * 根据名称获取结点信息
		 */ 
		private function getNodeByName(baseStruct:XML, nodeName:String):XML
		{
			var nodeXML:XML = new XML();
			nodeXML = baseStruct.descendants(nodeName)[0];
			return nodeXML;
		}
		/**
		 * 移动树目录回调函数
		 */ 
		private function onDragOver(event:DragEvent):void
		{
			var imsTree:Tree = Tree(event.currentTarget);
			var overNodeIdx:Number = imsTree.calculateDropIndex(event);
			imsTree.selectedIndex = overNodeIdx;
			var overNode:XML = imsTree.selectedItem as XML;
		}
		/**
		 * 修改树结点触发函数
		 */ 
		private function treeChange(event:Event):void
		{
			var selNodeXML:XML = Tree(event.target).selectedItem as XML;
		}
		/**
		 * 设置图层状态显示不同图片
		 */ 
		private function treeIconFun(item:Object):*
		{
			var nodeXML:XML = item as XML;
			var nodeStatus:String = nodeXML.attribute("status").toString();
			var rtnValue:Class;
			switch (nodeStatus)
			{
				case "Visiable":
					rtnValue = this._leafVis;
					break;
				case "Invisiable":
					rtnValue = this._leafInVis;
					break;
				case "Editable":
					rtnValue = this._leafEdi;
					break;
				case "Selectable":
					rtnValue = this._leafSel;
					break;
				case "Activate":
					rtnValue = this._leafActi;
					break;
				default:
					rtnValue = this._folderCloseImg;
					break;
			}
			return rtnValue;
		}
	}
}