<?php
	/**
	 *Smarty plugin	
	 *------------------------------------------------------------------
	 *File:      block.acquire.php
	 *Type:		 block
	 *Name:		 acquire
	 *Purpose:	 validate the permission of visitor to perform an action
	 *------------------------------------------------------------------
	 */
	 
	 function smarty_block_acquire($params , $content , &$smarty , &$repeat){
		 if(!$repeat){
			 $contentArray = explode("{acquireelse}" , $content);
			 $accController = new AccessController();
			 if($accController->can($params['action'] , $params['visitor']))
			 	echo $contentArray[0];
			 else
			 	echo $contentArray[1];
		 }		 
	 }
?>