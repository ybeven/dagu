<?php /* Smarty version 2.6.26, created on 2014-11-10 17:00:59
         compiled from system/showPrivilege.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'jqueryui_radios', 'system/showPrivilege.tpl', 12, false),)), $this); ?>
<p>为角色"<?php echo $this->_tpl_vars['role']['name']; ?>
"授权</p>
<div class='tablebox'>
  <form action="/system/savePrivilege" method="post">
    <table class="formView" align="center">
        <tr>
            <td class="tdhead">权限名称</th>
                                            <td>操作</th>
        </tr>
        <?php unset($this->_sections['curAction']);
$this->_sections['curAction']['name'] = 'curAction';
$this->_sections['curAction']['loop'] = is_array($_loop=$this->_tpl_vars['actionArray']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['curAction']['show'] = true;
$this->_sections['curAction']['max'] = $this->_sections['curAction']['loop'];
$this->_sections['curAction']['step'] = 1;
$this->_sections['curAction']['start'] = $this->_sections['curAction']['step'] > 0 ? 0 : $this->_sections['curAction']['loop']-1;
if ($this->_sections['curAction']['show']) {
    $this->_sections['curAction']['total'] = $this->_sections['curAction']['loop'];
    if ($this->_sections['curAction']['total'] == 0)
        $this->_sections['curAction']['show'] = false;
} else
    $this->_sections['curAction']['total'] = 0;
if ($this->_sections['curAction']['show']):

            for ($this->_sections['curAction']['index'] = $this->_sections['curAction']['start'], $this->_sections['curAction']['iteration'] = 1;
                 $this->_sections['curAction']['iteration'] <= $this->_sections['curAction']['total'];
                 $this->_sections['curAction']['index'] += $this->_sections['curAction']['step'], $this->_sections['curAction']['iteration']++):
$this->_sections['curAction']['rownum'] = $this->_sections['curAction']['iteration'];
$this->_sections['curAction']['index_prev'] = $this->_sections['curAction']['index'] - $this->_sections['curAction']['step'];
$this->_sections['curAction']['index_next'] = $this->_sections['curAction']['index'] + $this->_sections['curAction']['step'];
$this->_sections['curAction']['first']      = ($this->_sections['curAction']['iteration'] == 1);
$this->_sections['curAction']['last']       = ($this->_sections['curAction']['iteration'] == $this->_sections['curAction']['total']);
?>
    <tr>
      <td class="tdhead"><?php echo $this->_tpl_vars['actionArray'][$this->_sections['curAction']['index']]; ?>
</td>
      <td class="radio"> <?php echo smarty_function_jqueryui_radios(array('name' => "approval[".($this->_sections['curAction']['index'])."]",'options' => $this->_tpl_vars['approvals'],'checked' => $this->_tpl_vars['actionAcl'][$this->_sections['curAction']['index']]), $this);?>
 </td>
     
    </tr>
    <?php endfor; else: ?> 
    <tr>
      <td colspan="2" class="tdhead">尚未添加权限</td>
    </tr>
    <?php endif; ?>
    </table>
     <input type="hidden" id="roleId" name="roleId" value=<?php echo $this->_tpl_vars['role']['id']; ?>
 />
    <input type="submit" value="保存修改" />
    <input type="button" onclick="location.href='/system/manageRole'" value="返回" />
  </form>
</div>