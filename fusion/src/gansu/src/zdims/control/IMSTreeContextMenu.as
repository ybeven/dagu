/**
* 树控件右键菜单类 
*/
package zdims.control
{
	import Mapgis7.WebService.BasLib.CLayerAccessInfo;
	import Mapgis7.WebService.BasLib.CMapLayerInfo;
	import Mapgis7.WebService.BasLib.CSetAllEnumLayerStatusONFlex;
	import Mapgis7.WebService.BasLib.CSetEnumLayerStatusByIdxONFlex;
	import Mapgis7.WebService.BasLib.CSetEnumLayerStatusONFlex;
	import Mapgis7.WebService.BasLib.CSetSingleLayerStatusONFlex;
	import Mapgis7.WebService.BasLib.CUpdateLayerIndex;
	import Mapgis7.WebService.BasLib.EnumLayerStatus;
	
	import flash.display.Sprite;
	import flash.events.ContextMenuEvent;
	import flash.ui.ContextMenu;
	import flash.ui.ContextMenuItem;
	
	import mx.controls.Alert;
	import mx.controls.Tree;
	import mx.controls.listClasses.IListItemRenderer;
	
	import zdims.map.IMSMap;
	import zdims.map.TileLayer;
	import zdims.map.VectorLayer;
	import zdims.map.VectorMapDoc;

	/**
	 * 树控件右键弹出菜单类
	 * @author shiyanting
	 */
	public class IMSTreeContextMenu extends Sprite
	{

		/**
		 * 构造函数
		 * @param treeStatus
		 * @param tree
		 */
		public function IMSTreeContextMenu(treeStatus:CTreeNodeStatus, tree:Tree)
		{
			myContextMenu = new ContextMenu();
			this.treeNodeStatus = treeStatus;
			this._tree = tree;
			removeDefaultItems();
			myContextMenu.addEventListener(ContextMenuEvent.MENU_SELECT, menuSelectHandler);
		}
		/**
		 * 右键菜单
		 * @default
		 */
		public var myContextMenu:ContextMenu;
		private var _activateItem:XML;
		private var _layerActivateItem:XML;
		private var _mulitiSelected:Boolean; //标示用户是否多选右键菜单
		private var _tree:Tree = new Tree(); //与contextMenu相关联的树
		private var menuLabel1:String = "可见";
		private var menuLabel2:String = "不可见";
		private var menuLabel3:String = "编辑";
		private var menuLabel4:String = "可查询";
		private var menuLabel5:String = "激活";
		private var menuLabel6:String = "更新";
		private var menuLabel7:String = "更新图层排列顺序";
		private var treeNodeStatus:CTreeNodeStatus;
		/**
		 * 获取或设置文档中的激活的图层结点XML
		 * @return 获取或设置文档中的激活的图层结点XML
		 * 
		 */		
		public function get activeDocLayer():XML
		{
			return this._activateItem;
		}
		/**
		 * 获取或设置文档中的激活的图层结点XML
		 * @param value 获取或设置文档中的激活的图层结点XML
		 * 
		 */		
		public function set activeDocLayer(value:XML):void
		{
			this._activateItem=value;
		}
		/**
		 * 获取或设激活的图层结点XML
		 * @return 获取或设激活的图层结点XML
		 * 
		 */		
		public function get activeLayer():XML
		{
			return this._layerActivateItem;
		}
		/**
		 * 获取或设激活的图层结点XML
		 * @param value 获取或设激活的图层结点XML
		 * 
		 */		
		public function set activeLayer(value:XML):void
		{
			this._layerActivateItem=value;
		}
		/**
		 * 设置图层的状态
		 */ 
		private function InputLayerStatus():void
		{
			var docNum:Number = this.treeNodeStatus._treeVectorDocs.length;
			for (var i:int = 0; i < docNum; i++)
			{
				VectorMapDoc(this.treeNodeStatus._treeVectorDocs[i]).updateAllLayerInfo();
			}
		}
		/**
		 * 更新文档排列顺序
		 */ 
		private function RenewMapDocIndex():void
		{
			var selNode:XML = this._tree.selectedItem as XML;
			var renewMapType:String = selNode.attribute("type");
			var index:int = selNode.attribute("index");
			var mapDocIndexArry:Array=new Array();
			var updateLayer:CUpdateLayerIndex=new CUpdateLayerIndex();
			for each (var child:XML in selNode.child("*"))
			{
				mapDocIndexArry.push(parseInt(child.attribute("index")));
			}
			switch (renewMapType)
			{
				case "1":
					VectorMapDoc(this.treeNodeStatus._treeVectorDocs[index]).setLayerOrder(mapDocIndexArry);
					break;
				case "7":
					updateLayer.GdbIndex=selNode.attribute("listIndex");
					updateLayer.NewLayerIndex=mapDocIndexArry;
					VectorLayer(this.treeNodeStatus._treeVectorLayers[index]).updateLayerIndex(updateLayer,null);
					break;
			}
			trace(mapDocIndexArry.length);
		}
		/**
		 * 添加用户菜单的选项
		 */ 
		private function addCustomMenuItems(type:String):void
		{
			myContextMenu.customItems = new Array();
			var item1:ContextMenuItem = new ContextMenuItem(menuLabel1);
			myContextMenu.customItems.push(item1);
			var item2:ContextMenuItem = new ContextMenuItem(menuLabel2);
			myContextMenu.customItems.push(item2);
			var item3:ContextMenuItem = new ContextMenuItem(menuLabel3);
			myContextMenu.customItems.push(item3);
			var item4:ContextMenuItem = new ContextMenuItem(menuLabel4);
			myContextMenu.customItems.push(item4);
			var item5:ContextMenuItem = new ContextMenuItem(menuLabel5);
			myContextMenu.customItems.push(item5);
			var item6:ContextMenuItem = new ContextMenuItem(menuLabel6);
			myContextMenu.customItems.push(item6);
			item6.separatorBefore = true;
			var item7:ContextMenuItem = new ContextMenuItem(menuLabel7);
			myContextMenu.customItems.push(item7);
			item1.addEventListener(ContextMenuEvent.MENU_ITEM_SELECT, menuItemSelectHandler);
			item2.addEventListener(ContextMenuEvent.MENU_ITEM_SELECT, menuItemSelectHandler);
			item3.addEventListener(ContextMenuEvent.MENU_ITEM_SELECT, menuItemSelectHandler);
			item4.addEventListener(ContextMenuEvent.MENU_ITEM_SELECT, menuItemSelectHandler);
			item5.addEventListener(ContextMenuEvent.MENU_ITEM_SELECT, menuItemSelectHandler);
			item6.addEventListener(ContextMenuEvent.MENU_ITEM_SELECT, menuItemSelectHandler);
			item7.addEventListener(ContextMenuEvent.MENU_ITEM_SELECT, menuItemSelectHandler);
			switch (type)
			{
				case "0":
					myContextMenu.customItems.splice(6, 1);
					break;
				case "2":
					myContextMenu.customItems.splice(2, 3);
					break;
				case "1":
					myContextMenu.customItems.splice(2, 2);
					break;
				case "3":
					myContextMenu.customItems.splice(0, 6);
					break;
				case "4":
					myContextMenu.customItems.splice(0, 7);
					break;
				case "5":
					myContextMenu.customItems.splice(0, 6);
					break;
				case "6":
					myContextMenu.customItems.splice(2, 2);
					break;
				case "7":
					myContextMenu.customItems.splice(4, 1);
					break;
				case "8":
					myContextMenu.customItems.splice(6,1);
					break;
			}
		}

		/**
		 * 检查用户是不是在同一种类型节点既同一个父节点下多选
		 */ 
		private function checkUserMulitiSelect(nodeArray:Array):Boolean
		{
			var priviousNodeType:String;
			var nextNodeType:String;
			var isLegal:Boolean = true;
			if (nodeArray.length > 0)
				priviousNodeType = XML(nodeArray[0]).attribute("type");
			else
			{
				return false;
			}
			for each (var nodeXML:XML in nodeArray)
			{
				nextNodeType = nodeXML.attribute("type");
				if (priviousNodeType == nextNodeType)
				{
					priviousNodeType = nextNodeType;
				}
				else
				{
					isLegal=false;
				}
			}
			return isLegal;
		}
		/**
		 * 添加选定的状态
		 */ 
		private function makeUpContextMenu():void
		{
			var selNode:XML = this.treeNodeStatus.selectedNode;
			var selNodeType:String = selNode.attribute("type");
			addCustomMenuItems(selNodeType);
		}
		/**
		 * 获取选定的行
		 */ 
		private function menuItemSelectHandler(event:ContextMenuEvent):void
		{
			var selNodeNum:Number = this._tree.selectedItems.length;
			this._mulitiSelected = selNodeNum>1?true:false;
			var selStatus:String = ContextMenuItem(event.target).caption;
			switch (selStatus)
			{
				case "可见":
					selStatus = EnumLayerStatus.Visiable;
					break;
				case "不可见":
					selStatus = EnumLayerStatus.Invisiable;
					break;
				case "编辑":
					selStatus = EnumLayerStatus.Editable;
					break;
				case "可查询":
					selStatus = EnumLayerStatus.Selectable;
					break;
				case "更新":
					selStatus = null;
					InputLayerStatus();
					break;
				case "激活":
					selStatus = "Activate";
					break;
				case "更新图层排列顺序":
					selStatus = null;
					RenewMapDocIndex()
					break;
				default:
					selStatus = null;
			}

			var selNodeType:String;
			if (this._mulitiSelected)
			{
				var isLegal:Boolean = checkUserMulitiSelect(this._tree.selectedItems);
				if (isLegal)
				{
					selNodeType = XML(this._tree.selectedItems[0]).attribute("type");
				}
				else
				{
					Alert.okLabel = "确定";
					Alert.show("不允许选择多个不同类型的图层！");
				}
				if (selStatus == "Activate")
				{
					Alert.okLabel = "确定";
					Alert.show("不允许同时激活多个图层！");
					return;
				}
			}
			else
			{
				selNodeType = this.treeNodeStatus.selectedNode.attribute("type");
			}
			//var selNodeNum:Number =this._tree.selectedItems.length;
			if (selNodeType != null && selStatus != null)
			{
				switch (selNodeType)
				{
					case "0":
						if (this._mulitiSelected)
						{
							var selNodeXML:XML = this._tree.selectedItems[0] as XML;
							var activeMapDoc:VectorMapDoc = this.getSelVectorMapDoc(selNodeXML,0);
							this.treeNodeStatus.imsmap.activeMapDoc = activeMapDoc;
							var selNodesArray :Array = new Array();
							for each (var selNode:XML in this._tree.selectedItems)
							{
								var selIdx:Number = parseInt(selNode.attribute("index"));
								selNodesArray.push(selIdx);
								setVectorLayerStatusMulti(selIdx, selStatus, selNode);
							}
							this.treeNodeStatus.imsmap.activeMapDoc.updateMapLayerInfoList(selNodesArray,null);
						}
						else
						{
							var selNodeXML:XML = this.treeNodeStatus.selectedNode;
							var selNodeIdx:Number = parseInt(selNodeXML.attribute("index"));
							var activeMapDoc:VectorMapDoc = this.getSelVectorMapDoc(selNodeXML,0);
							this.treeNodeStatus.imsmap.activeMapDoc = activeMapDoc;
							setVectorLayerStatus(activeMapDoc,selNodeIdx, selStatus, selNodeXML);
						}
						break;
					case "2":
						if (this._mulitiSelected)
						{
							for each (var selectedNode:XML in this._tree.selectedItems)
							{
								var selIndex:Number = parseInt(selectedNode.attribute("index"));
								setTileLayerStatus(selIndex, selStatus);
								selectedNode.@status = selStatus;
							}
						}
						else
						{
							var selNodeXML:XML = this.treeNodeStatus.selectedNode;
							var selNodeIdx:Number = parseInt(selNodeXML.attribute("index"));
							setTileLayerStatus(selNodeIdx, selStatus);
							selNodeXML.@status = selStatus;
						}
						break;
					case "1":
						if (this._mulitiSelected)
						{
							for each (var selectedNode:XML in this._tree.selectedItems)
							{
								var selIndex:Number = parseInt(selectedNode.attribute("index"));
								if (selStatus != "Activate")
								{
									selectedNode.@status=selStatus;
								}
								setVectorDocStatus(selIndex, selStatus);
							}
						}
						else
						{
							var selNodeXML:XML = this.treeNodeStatus.selectedNode;
							if (selStatus != "Activate")
							{
								selNodeXML.@status=selStatus;
							}
							var selNodeIdx:Number = parseInt(selNodeXML.attribute("index"));
							setVectorDocStatus(selNodeIdx, selStatus);
						}

						break;
					case "6":
						if (this._mulitiSelected)
						{
							for each (var selectedNode:XML in this._tree.selectedItems)
							{
								var selIndex:Number = parseInt(selectedNode.attribute("listIndex"));
								if (selStatus != "Activate")
								{
									selectedNode.@status=selStatus;
								}
								setVectorLayerNodeStatus(selIndex, selStatus);
							}
						}
						else
						{
							var selNodeXML:XML = this.treeNodeStatus.selectedNode;
							if (selStatus != "Activate")
							{
								selNodeXML.@status=selStatus;
							}
							var selNodeIdx:Number = parseInt(selNodeXML.attribute("listIndex"));
							setVectorLayerNodeStatus(selNodeIdx, selStatus);
						}

						break;
					case "7":
						if (this._mulitiSelected)
						{
							for each (var selectedNode:XML in this._tree.selectedItems)
							{
								var selNodeVectorLayer:VectorLayer = this.getSelVectorLayer(selectedNode,7);
								this.treeNodeStatus.imsmap.activeLayerObj = selNodeVectorLayer;
								this.setLayerAcessNodeStatus(selectedNode,selStatus);
							}
						}
						else
						{
							var selNode:XML=this.treeNodeStatus.selectedNode;
							var selNodeVectorLayer:VectorLayer = this.getSelVectorLayer(selNode,7);
							this.treeNodeStatus.imsmap.activeLayerObj = selNodeVectorLayer;
							this.setLayerAcessNodeStatus(selNode,selStatus);
						}
						break;
					case "8":
						if(this._mulitiSelected)
						{
							var selNodeXML:XML = this._tree.selectedItems[0] as XML;
							var selNodeVectorLayer:VectorLayer = this.getSelVectorLayer(selNodeXML,8);
							this.treeNodeStatus.imsmap.activeLayerObj=selNodeVectorLayer;
							var selNodeParent:XML=XML(selNodeXML.parent());
							var selNodesArray :Array = new Array();
							var selNodesIdxArray :Array = new Array();
							if(selStatus=="Activate")
							{
								this._tree.selectedItems[0].@status=selStatus;
								this._tree.selectedItems[0].@oriStatus=EnumLayerStatus.Editable;
								var selNodeItem:XML=this._tree.selectedItems[0];
								var selNodeVectorLayer:VectorLayer = this.getSelVectorLayer(selNodeItem,8);
								this.treeNodeStatus.imsmap.activeLayerObj = selNodeVectorLayer;
								this.setSingleLayer(selNodeItem,selStatus);
							}
							else
							{
								for each (var selNode:XML in selNodeParent.children())
								{
									var isEqule:XML=null;
									for(var j:int=0;j<this._tree.selectedItems.length;j++)
									{
										var selNodeXML:XML=this._tree.selectedItems[j] as XML;
										if(selNodeXML.attribute("index")==selNode.attribute("index"))
										{
											isEqule=selNodeXML;
										}
									}
									if(isEqule==null)
									{
										var stu:String=selNode.@oriStatus;
										selNodesArray.push(stu);
									}
									else
									{
										isEqule.@status=selStatus;
										isEqule.@oriStatus=selStatus;
										selNodesArray.push(selStatus);
									}
									var tmpLayerindex:Number = parseInt(selNode.attribute("index"));
									if(tmpLayerindex==this.treeNodeStatus.imsmap.activeLayerObj.activeLayerIndex&&
									this.treeNodeStatus.imsmap.activeLayerObj.activeGdbIndex==parseInt(selNodeParent.attribute("listIndex")))
										this.treeNodeStatus.imsmap.activeLayerObj.activeLayerIndex=-1;
										
									selNodesIdxArray.push(parseInt(selNode.attribute("index")));
								}
							
								if(selNodesArray.length==this._tree.selectedItems.length)
								{
									selNodeParent.@status=selStatus;
								}
							
								var setEnumStatus:CSetEnumLayerStatusByIdxONFlex=new CSetEnumLayerStatusByIdxONFlex();
								setEnumStatus.GdbIndex=selNodeParent.attribute("listIndex");
								setEnumStatus.LayerStatus=selNodesArray;
								setEnumStatus.LayerIndex=selNodesIdxArray;
								this.treeNodeStatus.imsmap.activeLayerObj.setEnumLayerStatusByIdx(setEnumStatus,null);
							}
						}
						else
						{
							var selNode:XML=this.treeNodeStatus.selectedNode;
							var selNodeVectorLayer:VectorLayer = this.getSelVectorLayer(selNode,8);
							this.treeNodeStatus.imsmap.activeLayerObj = selNodeVectorLayer;
							this.setSingleLayer(selNode,selStatus);
						}
						break;	
				}
			}
		}
		private function setLayerAcessNodeStatus(selLayerNode:XML,status:String):void
		{
			var selLayerAccessNode:XML= selLayerNode.parent();
			var cSetEnumStatus:CSetAllEnumLayerStatusONFlex = new CSetAllEnumLayerStatusONFlex();
			var selLayerIdx:int= -1;
			var selLayerStatus:String=status;
			selLayerIdx=selLayerNode.attribute("listIndex");
			if(status!="Activate")
			{
				selLayerNode.@status = status;  
				changeChildNodeStatus(selLayerNode,status);
			}
			else
				return;
			cSetEnumStatus.GdbIndex = selLayerIdx;
			cSetEnumStatus.LayerStatus = selLayerStatus;

			this.treeNodeStatus.imsmap.activeLayerObj.setAllEnumLayerStatus(cSetEnumStatus,null);
		}
		private function changeChildNodeStatus(selLayerNode:XML,status:String):void
		{
			var selLayerAccessNode:XMLList= selLayerNode.children();
			for(var i:int;i<selLayerAccessNode.length();i++)
			{
				XML(selLayerAccessNode[i]).@status=status;
				XML(selLayerAccessNode[i]).@oriStatus=status;
			}
		}
		/**
		 * 设置矢量图层节点的状态
		 */ 
		private function setVectorLayerNodeStatus(selNodeIdx:Number, status:String):void
		{
			var map:IMSMap = this.treeNodeStatus.imsmap;
			if (status != "Activate")
			{
				var vectorLayerNodeArry:Array = this.treeNodeStatus._treeVectorLayers;
				var selVectorLayer:VectorLayer = vectorLayerNodeArry[selNodeIdx];
				var isVisible:Boolean;
				if (status == EnumLayerStatus.Visiable)
				{
					isVisible = true;
				}
				else
				{
					isVisible = false;
				}
				selVectorLayer.display = isVisible;
				if (!isVisible)
				{
					if(map.activeLayerObj==this.treeNodeStatus._treeVectorLayers[selNodeIdx])
						map.activeLayerObj = null;
				}
			}
			else
			{
				map.activeLayerObj = this.treeNodeStatus._treeVectorLayers[selNodeIdx];
			}
		}
		private function setSingleLayer(selLayerNode:XML,status:String):void
		{
			var selLayerAccessNode:XML= selLayerNode.parent();
			selLayerNode.@status = status;
			var cSetEnumStatus:CSetSingleLayerStatusONFlex = new CSetSingleLayerStatusONFlex();
			var selLayerIdx:int= -1;
			var selLayerAccessIdx:int = selLayerAccessNode.attribute("listIndex");
			var selLayerStatus:String=status;
			selLayerIdx=selLayerNode.attribute("index");
			if(status=="Activate")
			{
				if(selLayerAccessNode.@status==EnumLayerStatus.Invisiable)
					selLayerAccessNode.@status = EnumLayerStatus.Visiable;
				selLayerStatus=EnumLayerStatus.Editable;
				if (this._layerActivateItem == null)
				{
					this._layerActivateItem = selLayerNode;
				}
				else
				{
					if (selLayerNode != this._layerActivateItem)
					{
						var activateNode:XML= this._layerActivateItem.parent();
						var activateGDBIdx:int = activateNode.attribute("listIndex");
						this._layerActivateItem.@status = this._layerActivateItem.@oriStatus;
						
						cSetEnumStatus.GdbIndex = activateGDBIdx;
						cSetEnumStatus.LayerIndex = this._layerActivateItem.@index;
						cSetEnumStatus.LayerStatus = this._layerActivateItem.@oriStatus;
						this.treeNodeStatus.imsmap.activeLayerObj.setSingleLayerStatusONFlex(cSetEnumStatus,null);
						this._layerActivateItem = selLayerNode;
					}
				}
				this.treeNodeStatus.imsmap.activeLayerObj.activeGdbIndex=selLayerAccessIdx;
				this.treeNodeStatus.imsmap.activeLayerObj.activeLayerIndex=selLayerIdx;
			}
			else
			{
				if(this.treeNodeStatus.imsmap.activeLayerObj.activeLayerIndex==selLayerIdx)
					this.treeNodeStatus.imsmap.activeLayerObj.activeLayerIndex=-1;
				selLayerNode.@oriStatus = status; 
				if(selLayerAccessNode.@status==EnumLayerStatus.Invisiable)
				{
					if(status!=EnumLayerStatus.Invisiable) 
						selLayerAccessNode.@status = EnumLayerStatus.Visiable;
				}
				else if(selLayerAccessNode.@status==EnumLayerStatus.Visiable)
				{
					if(status!=EnumLayerStatus.Visiable) 
					{
						var num:int=0;
						var layerNodeArr:XMLList=selLayerAccessNode.children();
						for(var i:int=0;i<layerNodeArr.length();i++)
						{
							if(XML(layerNodeArr[i]).@oriStatus==status)
								num++;
						}
						if(num==layerNodeArr.length())
							selLayerAccessNode.@status = status;
					}
				}
				else
				{
					var num:int=0;
					var layerNodeArr:XMLList=selLayerAccessNode.children();
					for(var i:int=0;i<layerNodeArr.length();i++)
					{
						if(XML(layerNodeArr[i]).@oriStatus==status)
							num++;
					}
					if(num==layerNodeArr.length())
						selLayerAccessNode.@status = status;
				}
			}
			cSetEnumStatus.GdbIndex = selLayerAccessIdx;
			cSetEnumStatus.LayerIndex = selLayerIdx;
			cSetEnumStatus.LayerStatus = selLayerStatus;

			this.treeNodeStatus.imsmap.activeLayerObj.setSingleLayerStatusONFlex(cSetEnumStatus,null);
		}
		
		private function setMultiLayers(selLayerNodesAry:Array,status:String):void
		{
			var selLayerNode1:XML = selLayerNodesAry[0] as XML;
			var selLayerAccessNode:XML= selLayerNode1.parent();
			var statusArray :Array = new Array();
			var selLayerAccessInfo:CLayerAccessInfo = this.getSelCLayerAccessInfo(selLayerNode1,8);
			for each (var layer:XML in selLayerNodesAry)
			{
				layer.@status=status;
			}
			for each (var childLayer:XML in selLayerAccessNode.children())
			{
				var layerStatus:String = childLayer.attribute("status").toString();
				statusArray.push(layerStatus);
			}
			var selLayerAccessIdx:int = selLayerAccessNode.attribute("listIndex");
			var cSetEnumStatus:CSetEnumLayerStatusONFlex = new CSetEnumLayerStatusONFlex();
			cSetEnumStatus.GdbIndex  = selLayerAccessIdx;
			cSetEnumStatus.LayerStatus = statusArray;
			this.treeNodeStatus.imsmap.activeLayerObj.setEnumLayerStatus(cSetEnumStatus,null);
			//selLayerNode.@status = status;
		}
		
		//private function 
		
		/**
		 * 获取右键单击的行
		 */ 
		private function menuSelectHandler(event:ContextMenuEvent):void
		{
			var selNodeNum:Number = this._tree.selectedItems.length;
			var tree:Tree = this._tree;
			var rightClickItemRender:IListItemRenderer;
			var rightClickIndex:int;
			if (event.mouseTarget is IListItemRenderer)
			{
				rightClickItemRender = IListItemRenderer(event.mouseTarget);
			}
			else if (event.mouseTarget.parent is IListItemRenderer)
			{
				rightClickItemRender = IListItemRenderer(event.mouseTarget.parent);
			}
			if (rightClickItemRender != null)
			{
				rightClickIndex = tree.itemRendererToIndex(rightClickItemRender);
				if (tree.selectedIndex != rightClickIndex)
				{
					tree.selectedIndex = rightClickIndex;
				}
				trace("通过右键单击获得选定的行: " + tree.selectedIndex);
				var selectedNode:XML = tree.selectedItem as XML;
				this.treeNodeStatus.selectedNode = selectedNode;
				trace(selectedNode.attribute("text"));
			}

			if (selNodeNum <= 1)
			{
				this._mulitiSelected = false;
			}
			else
			{
				this._mulitiSelected = true;
			}
			makeUpContextMenu();
		}
		/**
		 * 移除默认选项
		 */ 
		private function removeDefaultItems():void
		{
			myContextMenu.hideBuiltInItems();
		}
		/**
		 * 设置瓦片图层的状态
		 */ 
		private function setTileLayerStatus(selNodeIdx:Number, status:String):void
		{
			var tileLayerArry:Array = this.treeNodeStatus._treeTileLayers;
			var selTileLayer:TileLayer = tileLayerArry[selNodeIdx];
			var isVisible:Boolean;
			if (status == EnumLayerStatus.Visiable)
			{
				isVisible = true;
			}
			else
			{
				isVisible = false;
			}
			selTileLayer.display = isVisible;
		}
		/**
		 * 设置文档的状态
		 */ 
		private function setVectorDocStatus(selNodeIdx:Number, status:String):void
		{
			var map:IMSMap = this.treeNodeStatus.imsmap;
			if (status != "Activate")
			{
				var vectorDocArry:Array = this.treeNodeStatus._treeVectorDocs;
				var selVectorDoc:VectorMapDoc = vectorDocArry[selNodeIdx];
//				var selVectorLayerInfo:Array = selVectorDoc.loadMapResult.MapLayerInfo;
				var isVisible:Boolean;
				if (status == EnumLayerStatus.Visiable)
				{
					isVisible = true;
				}
				else
				{
					isVisible = false;
				}
				selVectorDoc.display = isVisible;
//				var selNodesArray :Array = new Array();
//				var selNodeXML:XML = this.treeNodeStatus.selectedNode;
//				for each (var childLayer:XML in selNodeXML.children())
//				{
//					if (isVisible)
//						childLayer.@status=childLayer.@oriStatus;
//					else
//						childLayer.@status=EnumLayerStatus.Invisiable;
//					var selIndex:Number = parseInt(childLayer.attribute("index"));
//					CMapLayerInfo(selVectorLayerInfo[selIndex]).LayerStatus=childLayer.@status;
//					selNodesArray.push(selIndex);
//				}
//				this.treeNodeStatus.imsmap.activeMapDoc.updateMapLayerInfoList(selNodesArray,null);
				if (isVisible)
				{
					if(this.treeNodeStatus._treeVectorDocs.length==1)
						map.activeMapDoc=this.treeNodeStatus._treeVectorDocs[selNodeIdx];
				}
				else
				{
					
					if(map.activeMapDoc == this.treeNodeStatus._treeVectorDocs[selNodeIdx])
						map.activeMapDoc=null;
				}
			}
			else
			{
				map.activeMapDoc = this.treeNodeStatus._treeVectorDocs[selNodeIdx];
			}
		}
		
		private function setVectorLayerStatusMulti(selNodeIdx:int,status:String,selNodeXML:XML):void
		{
			var selNodeParent:XML = selNodeXML.parent();
			var selNodeParentIdx:Number = parseInt(selNodeParent.attribute("index"));
			selNodeXML.@status = status; //设置节点的状态以便更新图标
			var vectorDocArry:Array = this.treeNodeStatus._treeVectorDocs;
			var selVectorDoc:VectorMapDoc = vectorDocArry[selNodeParentIdx];
			var selVectorLayerInfo:CMapLayerInfo = selVectorDoc.loadMapResult.MapLayerInfo[selNodeIdx];
			if (status != "Activate")
			{
				selVectorLayerInfo.LayerStatus = status;
				selNodeXML.@oriStatus = selNodeXML.@status;
				if(selVectorDoc.activeLayerIndex==selNodeIdx)    
					selVectorDoc.activeLayerIndex=-1;
			}
			else
			{
				var map:IMSMap = this.treeNodeStatus.imsmap;
				map.activeMapDoc = selVectorDoc;
				map.activeMapDoc.activeLayerIndex = selNodeIdx;
				selVectorLayerInfo.LayerStatus = EnumLayerStatus.Editable;
				if (this._activateItem == null)
				{
					this._activateItem = selNodeXML;
				}
				else
				{
					if (selNodeXML != this._activateItem)
					{
						this._activateItem.@status = this._activateItem.@oriStatus;
						selVectorLayerInfo = selVectorDoc.loadMapResult.MapLayerInfo[this._activateItem.@index];
						selVectorLayerInfo.LayerStatus = this._activateItem.@oriStatus;
						selVectorDoc.updateLayerInfo(this._activateItem.@index);
						this._activateItem = selNodeXML;
					}
				}
			}
		}
		
		private function getSelCLayerAccessInfo(selNodeXML:XML,selNodeType:int):CLayerAccessInfo
		{
			var selLayerAccess:CLayerAccessInfo;
			switch (selNodeType)
			{
				case 8:
					var selNodeVectorLayer:VectorLayer = this.getSelVectorLayer(selNodeXML,8);
					var clayerAccessNode:XML = selNodeXML.parent() as XML;
					var clayerAccessIdx:int = clayerAccessNode.attribute("listIndex");
					selLayerAccess = selNodeVectorLayer.layerObj.LayerAccessInfo[clayerAccessIdx] as CLayerAccessInfo;
			}
			return selLayerAccess;
		}
		
		private function getSelVectorLayer(selNodeXML:XML,selNodeType:int):VectorLayer
		{
			var activeVectorLayer:VectorLayer;
			switch (selNodeType)
			{
				case 8:
					var selNodeLayerAccess:XML = selNodeXML.parent();
					var selNodeVectorLayer:XML = selNodeLayerAccess.parent();
					var selNodeVectorLayerIdx:Number = parseInt(selNodeVectorLayer.attribute("listIndex"));
					var vectorLayerArry:Array = this.treeNodeStatus._treeVectorLayers;
					var selVectorLayer:VectorLayer = vectorLayerArry[selNodeVectorLayerIdx];
					activeVectorLayer = selVectorLayer;
					break;
				case 7:
					var selLayerAccessNode:XML = selNodeXML.parent();
					//var selNodeVectorLayer:XML = selNodeLayerAccess.parent();
					var selNodeVectorLayerIdx:Number = parseInt(selLayerAccessNode.attribute("listIndex"));
					var vectorLayerArry:Array = this.treeNodeStatus._treeVectorLayers;
					var selVectorLayer:VectorLayer = vectorLayerArry[selNodeVectorLayerIdx];
					activeVectorLayer = selVectorLayer;
					break;
			}
			return activeVectorLayer;
		}
		
		private function getSelVectorMapDoc(selNodeXML:XML,selNodeType:int):VectorMapDoc
		{
			var activeMapDoc:VectorMapDoc;
			switch (selNodeType)
			{
				case 0:
					var selNodeParent:XML = selNodeXML.parent();
					var selNodeParentIdx:Number = parseInt(selNodeParent.attribute("index"));
					var vectorDocArry:Array = this.treeNodeStatus._treeVectorDocs;
					var selVectorDoc:VectorMapDoc = vectorDocArry[selNodeParentIdx];
					activeMapDoc =selVectorDoc;
					break;
			}
			return activeMapDoc;
		}
		
		/**
		 * 设置图层状态
		 */ 
		private function setVectorLayerStatus(selVectorDoc:VectorMapDoc,selNodeIdx:Number, status:String, selNodeXML:XML):void
		{
			selNodeXML.@status = status; //设置节点的状态以便更新图标
			var selVectorLayerInfo:CMapLayerInfo = selVectorDoc.loadMapResult.MapLayerInfo[selNodeIdx];
			var map:IMSMap = this.treeNodeStatus.imsmap;
			if (status != "Activate")
			{
				selVectorLayerInfo.LayerStatus = status;
				selNodeXML.@oriStatus = selNodeXML.@status;    
				if(map.activeMapDoc.activeLayerIndex==selNodeIdx)
					map.activeMapDoc.activeLayerIndex=-1;
			}
			else
			{
				map.activeMapDoc.activeLayerIndex = selNodeIdx;
				selVectorLayerInfo.LayerStatus = EnumLayerStatus.Editable;
				if (this._activateItem == null)
				{
					this._activateItem = selNodeXML;
				}
				else
				{
					if (selNodeXML != this._activateItem)
					{
						this._activateItem.@status = this._activateItem.@oriStatus;
						selVectorLayerInfo = selVectorDoc.loadMapResult.MapLayerInfo[this._activateItem.@index];
						selVectorLayerInfo.LayerStatus = this._activateItem.@oriStatus;
						selVectorDoc.updateLayerInfo(this._activateItem.@index);
						this._activateItem = selNodeXML;
					}
				}
			}
			selVectorDoc.updateLayerInfo(selNodeIdx);
		}
	}
}