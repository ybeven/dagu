<?php /* Smarty version 2.6.26, created on 2014-12-01 16:44:28
         compiled from gragh/origin.tpl */ ?>
<script language="javascript" type="text/javascript">
<?php echo '
function myFun()
{
'; ?>

	var x = document.getElementsByName("picinumber")[0].value;
	// alert(x);
	document.getElementById("form").action="/predata/UploadeExcelData/"+x;

<?php echo '
}
'; ?>

</script>
<div class='tablebox'>
<form name="form" action="/gragh/origin/" method="post">
	
		<tr>
			<th>批次</th><td><input type="text" name="picinumber" /></td>
		</tr>
		<tr><td><input type="submit" value="查询" /></td></tr>
	
</form>
<form name="form" action="/predata/UpdatePreData/" method="post">
	<!-- <tr><td><input type="submit" value="更改" /></td></tr> -->
	<table style="width:100%;" cellpadding="2" cellspacing="0" border="1" bordercolor="#000000">
	<thead>
		<tr>
			<th rowspan="2">培训机构</th>
			<th rowspan="2">总人数</th>
			<th rowspan="2">雷同卷人数<br></th>
			<th colspan="4">卷面成绩</th>
			<th colspan="4">最终成绩</th>
		</tr>
		<tr>
			<th><span>及格人数</span><br></th>
			<th>通过率</th>
			<th>58-59分人数</th>
			<th>0分人数</th>
			<th>及格人数</th>
			<th>通过率</th>
			<th>58-59分人数</th>
			<th>0分人数</th>
		</tr>
	</thead>
	<tbody>
		<?php $_from = $this->_tpl_vars['SMArray']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['data']):
?>
		<tr>
			<td><?php echo $this->_tpl_vars['data'][0]; ?>
</td>
			<td><?php echo $this->_tpl_vars['data'][1]; ?>
</td>
			<td><?php echo $this->_tpl_vars['data'][2]; ?>
</td>
			<td><?php echo $this->_tpl_vars['data'][3]; ?>
</td>
			<td><?php echo $this->_tpl_vars['data'][4]; ?>
</td>
			<td><?php echo $this->_tpl_vars['data'][5]; ?>
</td>
			<td><?php echo $this->_tpl_vars['data'][6]; ?>
</td>
			<td><?php echo $this->_tpl_vars['data'][7]; ?>
</td>
			<td><?php echo $this->_tpl_vars['data'][8]; ?>
</td>
			<td><?php echo $this->_tpl_vars['data'][9]; ?>
</td>
			<td><?php echo $this->_tpl_vars['data'][10]; ?>
</td>
		</tr>
		<?php endforeach; endif; unset($_from); ?>
	</tbody>
</table>	
<br>
<br>

<table style="width:100%;" cellpadding="2" cellspacing="0" border="1" bordercolor="#000000">
	<thead>
		<tr>
			<th rowspan="2">考点</th>
			<th rowspan="2">总人数</th>
			<th rowspan="2">雷同卷人数<br></th>
			<th colspan="4">卷面成绩</th>
			<th colspan="4">最终成绩</th>
		</tr>
		<tr>
			<th><span>及格人数</span><br></th>
			<th>通过率</th>
			<th>58-59分人数</th>
			<th>0分人数</th>
			<th>及格人数</th>
			<th>通过率</th>
			<th>58-59分人数</th>
			<th>0分人数</th>
		</tr>
	</thead>
	<tbody>
		<?php $_from = $this->_tpl_vars['KDMArray']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['data']):
?>
		<tr>
			<td><?php echo $this->_tpl_vars['data'][0]; ?>
</td>
			<td><?php echo $this->_tpl_vars['data'][1]; ?>
</td>
			<td><?php echo $this->_tpl_vars['data'][2]; ?>
</td>
			<td><?php echo $this->_tpl_vars['data'][3]; ?>
</td>
			<td><?php echo $this->_tpl_vars['data'][4]; ?>
</td>
			<td><?php echo $this->_tpl_vars['data'][5]; ?>
</td>
			<td><?php echo $this->_tpl_vars['data'][6]; ?>
</td>
			<td><?php echo $this->_tpl_vars['data'][7]; ?>
</td>
			<td><?php echo $this->_tpl_vars['data'][8]; ?>
</td>
			<td><?php echo $this->_tpl_vars['data'][9]; ?>
</td>
			<td><?php echo $this->_tpl_vars['data'][10]; ?>
</td>
		</tr>
		<?php endforeach; endif; unset($_from); ?>
	</tbody>
</table>		
</div>
</form>