<?php /* Smarty version 2.6.26, created on 2014-05-18 01:59:00
         compiled from predata/ListPreData.tpl */ ?>

<div class='tablebox'>
<!-- <form name="form" action="/predata/SearchPreData" method="post">
	<tr>
		<td class="thead">矿山名称：</td><td><input type="text" name="mineName" /></td>
		<td class="thead">所属企业名称：</td><td><input type="text" name="enterpriseName" /></td>
		<td class='thead'>评审专家姓名：</td><td><input name="expertName"></td>
		<td class='thead'>评审日期：</td><td><input class="datepicker" name="expertTime"></td>
		<td class="thead"><input type="submit" value="查询" /></td>
	</tr>
</form> -->
<!--
<form name="form" action="/minedata/SearchPreData/" method="post">
		<tr>
			<td class="thead">矿山名称</td><td><input type="text" name="mineName" /></td>
			<td class="thead">企业名称</td><td><input type="text" name="enterpriseName" /></td>
			<td class="thead">企业性质</td>
			<td>
				<select  name="enterpriseproperty">
					<option value="国有企业">国有企业</option>
					<option value="集体企业">集体企业</option>
					<option value="联营企业">联营企业</option>
					<option value="股份合作制企业">股份合作制企业</option>
					<option value="个体户">个体户</option>
					<option value="私营企业">私营企业</option>
					<option value="合伙企业">合伙企业</option>
					<option value="有限责任公司">有限责任公司</option>
					<option value="股份有限公司">股份有限公司</option>
				</select>
			</td>
			<td class="thead"><input type="submit" value="查询" /></td>
		<tr>
	</table>
</form>
-->
  
    <table class="listView" align="center" width="100%">
        <thead>
		<tr>
				<th>序号</th>
				<th width="15%">矿山名称</th>
				<th width="15%">所属企业名称</th>
				<th width="15%">企业性质</th>
				<!-- <th width="10%">开采规模</th>
				<th width="10%">申报评审专家</th> -->
				<th width="10%">评审时间</th>
				<th colspan=1 width="10%">状态</th>
				<th colspan=6 width="30%">操作</th>
				
		</tr>
		</thead>
        <?php $_from = $this->_tpl_vars['MArray']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['data']):
?>
		<tr>
            <td><?php echo $this->_tpl_vars['data'][7]+1; ?>
</td>
            <td><?php echo $this->_tpl_vars['data'][0]; ?>
</td>
			<td><?php echo $this->_tpl_vars['data'][1]; ?>
</td>
			<td><?php echo $this->_tpl_vars['data'][2]; ?>
</td>
			<!-- <td><?php echo $this->_tpl_vars['data'][3]; ?>
</td>
			<td><?php echo $this->_tpl_vars['data'][4]; ?>
</td> -->
			<td><?php echo $this->_tpl_vars['data'][5]; ?>
</td>
			<td><?php echo $this->_tpl_vars['data'][8]; ?>
</td>
			<?php if ($this->_tpl_vars['QuanXian1'] != 1): ?>
			<td><a href="/predata/PassPreData/<?php echo $this->_tpl_vars['data'][6]; ?>
">通过</a></td>
			<td><a href="/predata/RejectPreData/<?php echo $this->_tpl_vars['data'][6]; ?>
">拒绝</a></td>
			<?php endif; ?>
			<td><a href="/predata/ListPreDetails/<?php echo $this->_tpl_vars['data'][6]; ?>
">查看</a></td>
			<?php if ($this->_tpl_vars['QuanXian1'] != 1): ?>
			<td><a href="/predata/DeletePreData/<?php echo $this->_tpl_vars['data'][6]; ?>
" onclick="return confirm('确定将此记录删除?删除后将无法恢复')">删除</a></td>
			<td><a href="/predata/DownloadExcelPreDetails/<?php echo $this->_tpl_vars['data'][6]; ?>
">导出</a></td>
			<td><a href="/predata/DownloadAllFile/<?php echo $this->_tpl_vars['data'][6]; ?>
">导出全部附件</a></td>
			<?php endif; ?>
        </tr>           
		<?php endforeach; else: ?>
        <tr>
			<td align="center" colspan="7">没有记录</td>
		</tr>
        <?php endif; unset($_from); ?>
     </table>			
</div>