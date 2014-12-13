<?php
interface IEventDispatcher {
	function addEventListener($eventType, $callback, $state=null); //returns listenerId. callback should be function($event, $state)
	function removeEventListener($listenerId);
	function dispatch($event);
}
?>