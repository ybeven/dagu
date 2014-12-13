package zdims.control
{
	public class CMapDocLayerNode
	{
		public var layerName:String;
		public var layerIndex :int;
		public var OriLayerStatus:String;
		public function CMapDocLayerNode(layerName:String,layerIdx:int,oriLayerStatus:String)
		{
			this.layerName = layerName;
			this.layerIndex = layerIdx;
			this.OriLayerStatus = oriLayerStatus;
		}

	}
}