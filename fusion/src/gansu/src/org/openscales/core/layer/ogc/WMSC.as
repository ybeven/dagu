
package org.openscales.core.layer.ogc
{
	import org.openscales.core.layer.params.ogc.WMSParams;

	/**
	 * Instances of WMSC are used to display data from OGC Web Mapping Services requested as tiles.
	 *
	 * @author Bouiaw
	 */	

	public class WMSC extends WMS
	{
		public function WMSC(name:String = "", url:String = "", layers:String = "", isBaseLayer:Boolean = false, 
			visible:Boolean = true, projection:String = null, proxy:String = null)
		{
			super(name, url, layers, isBaseLayer, visible, projection, proxy);

			this.singleTile = false;

			(this.params as WMSParams).tiled= true;				
		}

	}
}

