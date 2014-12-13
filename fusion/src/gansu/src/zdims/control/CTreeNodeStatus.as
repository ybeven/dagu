/**
* 树目录 
*/
package zdims.control
{
	import zdims.map.IMSMap;
	import zdims.map.TileLayer;
	import zdims.map.VectorLayer;
	import zdims.map.VectorMapDoc;
	
	public class CTreeNodeStatus
	{
		/**
		 * 属性：树目录的文档列表
		 */		
		public var _treeVectorDocs:Array = new Array();
		/**
		 * 属性：树目录的栅格图层列表
		 */		
		public var _treeTileLayers:Array = new Array();
		/**
		 * 属性：树目录的矢量图层列表
		 */
		public var _treeVectorLayers:Array = new Array();
		/**
		 * 属性：选择的树结点
		 */		
		private var _selectedNode :XML;
		/**
		 * 属性：地图容器
		 */		
		private var _map:IMSMap;
		/**
		 * 设置选择结点
		 * @param value
		 * 
		 */		
		public function set selectedNode(value:XML):void
		{
			_selectedNode = value;
		}
		/**
		 * 获取选择结点
		 * @return 
		 * 
		 */		
		public function get selectedNode():XML
		{
			return this._selectedNode;
		}
		/**
		 * 设置文档列表
		 * @param vectorMap
		 * 
		 */		
		public function vectorDocsPush(vectorMap:VectorMapDoc):void
		{
			_treeVectorDocs.push(vectorMap);
		}
		/**
		 * 设置栅格图层列表
		 * @param tileLayer
		 * 
		 */		
		public function tileLayersPush(tileLayer:TileLayer):void
		{
			_treeTileLayers.push(tileLayer);
		}
		/**
		 * 设置矢量图层列表
		 * @param vectorLayer
		 */
		public function vectorLayersPush(vectorLayer:VectorLayer):void
		{
			this._treeVectorLayers.push(vectorLayer);
		}
		/**
		 * 设置地图容器
		 * @param Value
		 * 
		 */		
		public function set imsmap(Value:IMSMap):void
		{
			this._map = Value;
		}
		/**
		 * 获取地图容器
		 * @return 
		 * 
		 */		
		public function get imsmap():IMSMap
		{
			return this._map;
		}
		/**
		 * 构造函数
		 * 
		 */		
		public function CTreeNodeStatus()
		{
		}
	}
}