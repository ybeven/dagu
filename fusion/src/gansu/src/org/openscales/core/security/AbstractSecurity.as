package org.openscales.core.security
{
	import org.openscales.core.Map;
	import org.openscales.core.security.events.SecurityEvent;


	/**
	 * Base abstract class for all securities
	 */
	public class AbstractSecurity implements ISecurity
	{
		/**
		 * Map used to dispatch events
		 */
		private var _map:Map = null;
		
		protected var _initialized:Boolean = false;
		
		/**
		 * Proxy eventually used to auhtenticate
		 */ 
		private var _proxy:String = null;

		public function AbstractSecurity(map:Map)
		{
			this._map = map;
			this._map.addSecurity(this);
			this.initialize();
		}

		public function initialize():void {
			this._initialized = true;
			map.dispatchEvent(new SecurityEvent(SecurityEvent.SECURITY_INITIALIZED, this));
		}

		public function update():void {
			map.dispatchEvent(new SecurityEvent(SecurityEvent.SECURITY_UPDATED, this));
		}
		
		public function logout():void {
			map.dispatchEvent(new SecurityEvent(SecurityEvent.SECURITY_LOGOUT, this));
		}

		public function get securityParameter():String
		{
			return null;
		}

		public function get map():Map {
			return this._map;
		}

		public function set map(value:Map):void {
			this._map = value;
		}
		
		/**
		 * Proxy used for security authentication
		 *  
		 * There is 3 cases :
		 *  - proxy is explicitly defined
		 *  - proxy is explicitly defined to "" => no proxy will be used
		 *  - proxy is null => use the proxy of the map
		 */
		public function get proxy():String {
			var p:String = this._proxy;
			if(!p && map && map.proxy)
				p = map.proxy;
			return p;
		}
		
		public function set proxy(value:String):void {
			this._proxy = value;
		}

		public function get initialized():Boolean {
			return this._initialized;
		}

	}
}

