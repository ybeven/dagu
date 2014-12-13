<?php /* Smarty version 2.6.26, created on 2014-05-18 02:35:03
         compiled from expert/ExpertInfo.tpl */ ?>

<div class='tablebox'>
<form name="form" action="/expert/SearchExpertInfo" method="post">
	<tr>
		<td class='thead'>评审专家姓名</td><td><input name="expertName"></td>
		<td class="thead">所在单位</td><td><input type="text" name="expertCompany" /></td>
		<td class="thead">专业</td><td><input type="text" name="expertSubject" /></td>
		<td class='thead'>评审日期</td><td><input class="datepicker" name="expertTime"></td>
		<td class="thead"><input type="submit" value="查询" /></td>
	</tr>
</form>
    <table class="formView" align="center">
        <thead>
		<tr>
				<th>专家姓名</th>
				<th>性别</th>
				<th>年龄</th>
				<th>所在单位</th>
				<th>职称</th>
                <!-- <th>职务</th> -->
				<th>专业</th>
				<th>评审矿山</th>
				<th>评审类型</th>
		</tr>
		</thead>
        <?php $_from = $this->_tpl_vars['MArray']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['data']):
?>
		<?php if ($this->_tpl_vars['data'][8] == '1'): ?>
		<tr>
            <td><?php echo $this->_tpl_vars['data'][0]; ?>
</td>
			<?php if ($this->_tpl_vars['data'][1] == '0'): ?>
			<td>男</td>
			<?php else: ?>
			<td>女</td>
			<?php endif; ?>
			<td><?php echo $this->_tpl_vars['data'][2]; ?>
</td>
			<td><?php echo $this->_tpl_vars['data'][3]; ?>
</td>
			<td><?php echo $this->_tpl_vars['data'][4]; ?>
</td>
			<!-- <td><?php echo $this->_tpl_vars['data'][5]; ?>
</td> -->
			<td><?php echo $this->_tpl_vars['data'][6]; ?>
</td>
			<td><?php echo $this->_tpl_vars['data'][7]; ?>
</td>
			<!-- <?php if ($this->_tpl_vars['data'][8] == '1'): ?> -->
			<td><a href="/predata/ListPreDetails/<?php echo $this->_tpl_vars['data'][9]; ?>
">申报信息</td>
			<!-- <?php else: ?>
			<td><a href="/minedata/ListMineDetails/<?php echo $this->_tpl_vars['data'][9]; ?>
">规划信息</td>
			<?php endif; ?> -->
        </tr>   
        <?php endif; ?>        
		
        <?php endforeach; endif; unset($_from); ?>
        <?php $_from = $this->_tpl_vars['MArray']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['data']):
?>
		<?php if ($this->_tpl_vars['data'][8] == '0'): ?>
		<tr>
            <td><?php echo $this->_tpl_vars['data'][0]; ?>
</td>
			<?php if ($this->_tpl_vars['data'][1] == '0'): ?>
			<td>男</td>
			<?php else: ?>
			<td>女</td>
			<?php endif; ?>
			<td><?php echo $this->_tpl_vars['data'][2]; ?>
</td>
			<td><?php echo $this->_tpl_vars['data'][3]; ?>
</td>
			<td><?php echo $this->_tpl_vars['data'][4]; ?>
</td>
			<!-- <td><?php echo $this->_tpl_vars['data'][5]; ?>
</td> -->
			<td><?php echo $this->_tpl_vars['data'][6]; ?>
</td>
			<td><?php echo $this->_tpl_vars['data'][7]; ?>
</td>
			<!-- <?php if ($this->_tpl_vars['data'][8] == '1'): ?> -->
			<!-- <td><a href="/predata/ListPreDetails/<?php echo $this->_tpl_vars['data'][9]; ?>
">申报信息</td> -->
			<!-- <?php else: ?> -->
			<td><a href="/minedata/ListMineDetails/<?php echo $this->_tpl_vars['data'][9]; ?>
">规划信息</td>
			<!-- <?php endif; ?> -->
        </tr>
        <?php endif; ?>           
		
        <?php endforeach; endif; unset($_from); ?>
     </table>			
</div>