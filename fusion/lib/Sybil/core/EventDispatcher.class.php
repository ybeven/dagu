<?php
/**
 * EventDispatcher
 * @ver 0.1@r7886 09/04/2009 check in
 * @version 0.2 09/11/2009 add callable checker in addEventListener
 * @author GuangXiN <rek@rek.me>
 */
class EventDispatcher implements IEventDispatcher {
	protected $eventsHandle;
	/**
	 * Add an event listener
	 * @param string $eventType the name of the event to listen
	 * @param callback $callback the callback handler
	 * @param mixed $state the parameters to pass to callback
	 * @return string returns the listener id for removing it
	 */
	public function addEventListener($eventType, $callback, $state=null) {
		if(!is_callable($callback)) {
			throw new ArgumentException('$callback');
		}
		$listenerId = hash('md4', microtime());
		$this->eventsHandle[$eventType][$listenerId] = array($callback, $state);
		return $listenerId;
	}
	/**
	 * Remove the specified event listener
	 * @param string $listenerId the listener id returned by method addEventListener
	 */
	public function removeEventListener($listenerId) {
		foreach($this->eventsHandle as $eventHandles) {
			if(array_key_exists($listenerId, $eventHandles)) {
				unset($eventHandles[$listenerId]);
			}
		}
	}
	/**
	 * Dispatch an event
	 * @param Event $event An instance of the event to dispatch
	 */
	public function dispatch($event) {
		$eventStr = $event->__toString();
		if(!empty($this->eventsHandle[$eventStr])) {
			foreach($this->eventsHandle[$eventStr] as $eventHandle) {
				call_user_func_array($eventHandle[0], array($event, $eventHandle[1]));
			}
		}
	}
	public function __sleep() {
		return array(); // No things in this class should be serialized
	}
}
?>