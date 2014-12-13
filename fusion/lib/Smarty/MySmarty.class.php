<?php
class MySmarty extends Smarty {
	public function displayWith($motherTpl, $childTpl, $cacheId=null, $compileId=null) {
		$this->assign('childTpl', $childTpl);
		$this->display($motherTpl, $cacheId, $compileId);
	}
	public function displayMother($childTpl, $cacheId=null, $compileId=null) {
		$this->assign('__time',date("Y年m月d日",time()));
		$this->assign('childTpl', $childTpl);
		$this->display('mother.tpl', $cacheId, $compileId);
	}
	public function setTitle($title) {
		$this->assign('__htmlTitle', '路通产销存管理系统-'.$title);
		$this->assign('__subTitle', $title);		
	}
	private $cssDef = null;
	public function addCssDef($cssDef) {
		$this->cssDef .= $cssDef;
		$this->assign('__css', $this->cssDef);
	}
	private $scriptDef = null;
	public function addScriptDef($scriptDef) {
		$this->scriptDef .= $scriptDef;
		$this->assign('__script', $this->scriptDef);
	}
}
?>