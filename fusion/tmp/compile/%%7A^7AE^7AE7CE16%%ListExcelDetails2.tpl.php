<?php /* Smarty version 2.6.26, created on 2014-11-12 06:44:48
         compiled from predata/ListExcelDetails2.tpl */ ?>
<script src="/js/gansu.js" type="text/javascript" charset="utf-8"></script>

<script language="javascript" type="text/javascript">
	// <?php echo '
	// 	function judge(applytype)
	// 	{
	// 		if(applytype=="非中央所属的矿山企业")
	// 		{
	// 			var checktype1="<td class=\'tdhead\' id=\'check1\'>矿山所在地市（县）级国土资源主管部门审核意见</td>";
	// 			var checktype2="<td class=\'tdhead\' id=\'check2\'>矿山所在地省级国土资源主管部门审核意见</td>";
	// 		}
	// 		if(applytype=="归口中央企业管理的矿山企业")
	// 		{
	// 			var checktype1="<td class=\'tdhead\' id=\'check1\'>矿山所在地省级国土资源主管部门审核意见</td>";
	// 			var checktype2="<td class=\'tdhead\' id=\'check2\'>归口中央企业的审核意见</td>";
	// 		}
	// 		if(applytype=="行业协会推荐的矿山企业")
	// 		{
	// 			var checktype1="<td class=\'tdhead\' id=\'check1\'>矿山所在地省级国土资源主管部门审核意见</td>";
	// 			var checktype2="<td class=\'tdhead\' id=\'check2\'>行业协会的审核意见</td>";
	// 		}
	// 		$("#check1").replaceWith(checktype1);
	// 		$("#check2").replaceWith(checktype2);
	// 	}
	// 	var mark = 1;
	// 	function add()
	// 	{
	// 		mark=mark+1; 	                
	// 		var str="<tr><td><table width=\'100%\' class=\'formView\' align=\'center\'><tr><td width=\'50%\' colspan=4>专家"+mark+"</td></tr>"
	// 			+"<tr><td width=\'20%\' class=\'tdhead\'>姓名</td width=\'30%\'><td><input width=\'90%\' name=\'expertName[]\'></td>"
	// 			+"<td width=\'20%\' class=\'tdhead\'>性别</td><td width=\'30%\'><select name=\'expertSex[]\'><option value=\'1\'>男</option><option value=\'2\'>女</option></select></td></tr>"
	// 			+"<tr><td class=\'tdhead\'>年龄</td><td><input width=\'90%\' name=\'expertAge[]\'></td>"
	// 			+"<td class=\'tdhead\'>单位</td><td><input width=\'90%\' name=\'expertCompany[]\'></td></tr>"
	// 			+"<tr><td class=\'tdhead\'>职称</td><td><input width=\'90%\' name=\'expertTitles[]\'></td>"
	// 			+"<td class=\'tdhead\'>职务</td><td><input width=\'90%\' name=\'expertWork[]\'></td></tr>"
	// 			+"<tr><td class=\'tdhead\'>专业</td><td><input width=\'90%\' name=\'expertSubject[]\'></td>"
	// 			+"<td class=\'tdhead\'>手机</td><td><input width=\'90%\' name=\'expertCellphone[]\'></td></tr>"
	// 			+"<tr><td class=\'tdhead\'>固话</td><td><input width=\'90%\' name=\'expertLandhone[]\'></td>"
	// 			+"<td class=\'tdhead\'>邮箱</td><td><input width=\'90%\' name=\'customer[]\'></td></tr>"
	// 			+"<tr><td class=\'tdhead\'>传真</td><td><input width=\'90%\' name=\'expertFax[]\'></td>"
	// 			+"<td class=\'tdhead\'>地址</td><td><input width=\'90%\' name=\'expertAddress[]\'></td></tr>"
	// 			+"<tr><td class=\'tdhead\'>专家意见</td><td colspan=3><textarea cols=\'60\' rows=\'3\' name=\'mineExpertIdeaContent[]\'></textarea></td></tr>"
	// 			+"<tr><td class=\'tdhead\'>时间</td><td><input class=\'datepicker\' width=\'90%\' name=\'mineExpertIdeaTime[]\'></td>"
	// 			+"<td class=\'tdhead\' colspan=2><input type=\'button\' onclick=\'add();\' value=\'添加专家\'/><input type=\'button\' onclick=\'remove(this);\' value=\'删除该专家\'/></td></tr></table></td></tr>";			      
	// 		$("#expert_info").append(str);
	// 	}
	// 	function remove(red)
	// 	{
	// 		$(red).parent().parent().parent().parent().remove();
	// 	}
	// 		'; ?>

</script>

<form name="form" action="/predata/SavePreData/" method="post">
	<table  id="view"  >
		<thead>
			<tr>
			<th>批次</th>
			<th>培训机构</th>
			<th>准考证号</th>
			<th>座位号</th>
			<th>姓名</th>
			<th>性别</th>
			<th>考试科目</th>
			<th>身份证号</th>
			<th>考试场次</th>
			<th>考场</th>
			<th>卷面成绩</th>
			<th>雷同分数</th>
		</tr>
		</thead>
	<?php $_from = $this->_tpl_vars['declaredata']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['o']):
?>
		<tr>
			<td><input value="<?php echo $this->_tpl_vars['o'][0]; ?>
" name="pici[]" ></td>
			<td><input value="<?php echo $this->_tpl_vars['o'][1]; ?>
" name="jigou[]" ></td>
			<td><input value="<?php echo $this->_tpl_vars['o'][2]; ?>
" name="zhunkaozheng[]" ></td>
			<td><input value="<?php echo $this->_tpl_vars['o'][3]; ?>
" name="zuoweihao[]" ></td>
			<td><input value="<?php echo $this->_tpl_vars['o'][4]; ?>
" name="xingming[]" ></td>
			<td><input value="<?php echo $this->_tpl_vars['o'][5]; ?>
" name="xingbie[]" ></td>
			<td><input value="<?php echo $this->_tpl_vars['o'][6]; ?>
" name="kaoshikemu[]" ></td>
			<td><input value="<?php echo $this->_tpl_vars['o'][7]; ?>
" name="shenfenzhenghao[]" ></td>
			<td><input value="<?php echo $this->_tpl_vars['o'][8]; ?>
" name="kaoshichangci[]" ></td>
			<td><input value="<?php echo $this->_tpl_vars['o'][9]; ?>
" name="kaochang[]" ></td>
			<td><input value="<?php echo $this->_tpl_vars['o'][10]; ?>
" name="fenshu[]" ></td>
			<td><input value="<?php echo $this->_tpl_vars['o'][11]; ?>
" name="leitong[]" ></td>
		</tr>	
	<?php endforeach; endif; unset($_from); ?>
	</table>
	<input type="submit" value="下一步" />
	<input type="button" onclick="window.location='/predata/AddPreData'" value="返回" />
</form>

<!-- 
<script type="text/javascript">
	judge("<?php echo $this->_tpl_vars['mArray'][0]->audittype; ?>
");
</script>
 -->