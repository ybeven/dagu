<?php /* Smarty version 2.6.26, created on 2014-05-24 17:04:00
         compiled from minedata/ChooseMineData.tpl */ ?>

<div class='tablebox'>
<!-- <?php echo '
<style type="text/css">
	.listView input {
		width: 8em;
	}
	.listView td a {
		padding-right: 1em;
		/*background-color: hsla(120,100%,50%,0.8)*/
	}
</style>
'; ?>
 -->

<!-- <form name="form" action="/minedata/SearchMineData_noguihua" method="post">
	<tr>
		<td class="thead">矿山名称：</td><td><input type="text" name="mineName" /></td>
		<td class="thead">所属企业名称：</td><td><input type="text" name="enterpriseName" /></td>
		<td class='thead'>评审专家姓名：</td><td><input name="expertName"></td>
		<td class='thead'>评审日期：</td><td><input class="datepicker" name="expertTime"></td>
		<td class="thead"><input type="submit" value="查询" /></td>
	</tr>
</form> -->
    <table class="listView" align="center" width="100%">
        <thead>
		<tr>
				<th >矿山名称</th>
				<th >所属企业名称</th>
				<th>企业性质</th>
				<th>开采规模</th>
				<!-- <th>申报评审专家</th> -->
				<th>评审时间</th>
				<th >状态</th>
				<th >操作</th>
		</tr>
		</thead>
        <?php $_from = $this->_tpl_vars['MArray']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['data']):
?>
        <?php if ($this->_tpl_vars['data'][9] == '通过'): ?>
		<tr>
            <td><?php echo $this->_tpl_vars['data'][0]; ?>
</td>
			<td><?php echo $this->_tpl_vars['data'][1]; ?>
</td>
			<td><?php echo $this->_tpl_vars['data'][2]; ?>
</td>
			<td><?php echo $this->_tpl_vars['data'][3]; ?>
</td>
			<!-- <td><?php echo $this->_tpl_vars['data'][4]; ?>
</td> -->
			<td><?php echo $this->_tpl_vars['data'][5]; ?>
</td>
			<td><?php echo $this->_tpl_vars['data'][8]; ?>
</td>
			<td>
				<a href="/minedata/AddMineData/<?php echo $this->_tpl_vars['data'][6]; ?>
">添加规划项目</a>
			</td>
        </tr>  
        <?php endif; ?>         
		<?php endforeach; else: ?>
        <tr>
			<td align="center" colspan="7">没有记录</td>
		</tr>
        <?php endif; unset($_from); ?>
     </table>	 
</div>