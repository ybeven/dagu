/**
* 图层结点 
*/
package zdims.control
{
	public class CVectorLayerNode
	{
		public var layerName:String;
		public var layerIndex :int;
		public var OriLayerStatus:String;
		public function CVectorLayerNode(layerName:String,layerIdx:int,oriLayerStatus:String)
		{
			this.layerName = layerName;
			this.layerIndex = layerIdx;
			this.OriLayerStatus = oriLayerStatus;
		}

	}
}