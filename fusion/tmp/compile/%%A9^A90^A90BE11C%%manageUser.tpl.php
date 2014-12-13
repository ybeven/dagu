<?php /* Smarty version 2.6.26, created on 2014-05-18 01:59:44
         compiled from system/manageUser.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', 'system/manageUser.tpl', 42, false),array('function', 'compager', 'system/manageUser.tpl', 54, false),)), $this); ?>

<div class="tablebox">
	 <form id="saveUser" method="post" action="/system/saveUser">
			<table class="formView" align="center">
				<tr>
					<td class='tdhead'>用户名</td>
					<td><input type="text" name="name" /></td>
					<td class='tdhead'>角色</td>
					<td><select name="roleId">
			<?php $_from = $this->_tpl_vars['roleArray']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['role']):
?>
			  <option value="<?php echo $this->_tpl_vars['role']['id']; ?>
"><?php echo $this->_tpl_vars['role']['name']; ?>
</option>
			<?php endforeach; endif; unset($_from); ?>
		  </select>
					</td>
					<td>&nbsp;&nbsp;<input type="submit" value="添加" /></td>
				</tr>
				
			</table>
			 <input type="hidden" name="state" value="addUser" />
			
	 </form>
		</div>
		<hr>

<div class='tablebox'>
<table class="listView" align="center">
    <thead>
	<th>用户名</th>
	<th>角色</th>
	<th>变更</th>
	<th>删除</th>
					
    </thead>
    <?php $_from = $this->_tpl_vars['userArr']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['user']):
?>
				<tr>
	 <form action="/system/saveUser" method="post">
	<td><input type="text" name="name" value="<?php echo $this->_tpl_vars['user']['name']; ?>
" />
	<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['user']['id']; ?>
" />
	<input type="hidden" name="state" value="updateUser" /></td>
					<td>
					     <select name="roleId">
						      <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['roleSelect'],'selected' => $this->_tpl_vars['user']['role']['id']), $this);?>
</select></td>
					
					
	<td><input type="submit" value="保存修改" /></td>
	 </form>
	 <form action="/system/deleteUser/<?php echo $this->_tpl_vars['user']['id']; ?>
" method="post">
	<td><input type="submit" value="删除" /></td>
	
	</form>
				</tr>
				<?php endforeach; endif; unset($_from); ?>
</table>
<?php echo smarty_function_compager(array('info' => $this->_tpl_vars['compager'],'linkPrefix' => '/system/manageUser/'), $this);?>

<p><input type="button" onclick="location.href='/start'" value="返回" />
</div>