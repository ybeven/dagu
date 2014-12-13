<?php /* Smarty version 2.6.26, created on 2014-05-24 17:04:24
         compiled from system/manageRole.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'acquire', 'system/manageRole.tpl', 1, false),array('function', 'compager', 'system/manageRole.tpl', 32, false),)), $this); ?>
<?php $this->_tag_stack[] = array('acquire', array('action' => '系统管理','visitor' => $this->_tpl_vars['curUser'])); $_block_repeat=true;smarty_block_acquire($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
<div class="tablebox">
   <form action="/system/saveRole" method="post">
			    <table class="formView" align="center">
				    <tr>
					    <td class="tdhead">新角色名</td>
					    <td><input type="text" name="name" /></td>
					    <td><input type="submit" value="添加" /></td>
				    </tr>
			    </table>
   </form>
		    </div>
		    <hr>
		      <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_acquire($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
    <div class='tablebox'>
    <table class="listView" align="center">
	<thead>
	    <th>角色名</th>
	    <?php $this->_tag_stack[] = array('acquire', array('action' => '系统管理','visitor' => $this->_tpl_vars['curUser'])); $_block_repeat=true;smarty_block_acquire($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><th>操作</th><?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_acquire($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
	</thead>
	<?php $_from = $this->_tpl_vars['roleArr']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['role']):
?>
				    <tr>
	    <td><?php echo $this->_tpl_vars['role']['name']; ?>
</td>
	    <?php $this->_tag_stack[] = array('acquire', array('action' => '系统管理','visitor' => $this->_tpl_vars['curUser'])); $_block_repeat=true;smarty_block_acquire($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
	    <td><input type="button" onclick="location.href='/system/showPrivilege/<?php echo $this->_tpl_vars['role']['id']; ?>
'" value="授权" />
		  <!--<input type="button" value="更名" onclick="location.href='/system/renameRole/<?php echo $this->_tpl_vars['role']['id']; ?>
, '<?php echo $this->_tpl_vars['role']['name']; ?>
'" />-->
		  <input type="button" value="删除" onclick="location.href='/system/removeRole/<?php echo $this->_tpl_vars['role']['id']; ?>
'" />
	    </td><?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_acquire($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
	</tr>
	<?php endforeach; endif; unset($_from); ?>
    </table>
    <?php echo smarty_function_compager(array('info' => $this->_tpl_vars['compager'],'linkPrefix' => '/system/manageRole/'), $this);?>

    <p><input type="button" onclick="location.href='/start'" value="返回" />
</div>