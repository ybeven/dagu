<?php /* Smarty version 2.6.26, created on 2014-11-10 19:16:34
         compiled from predata/AddFile.tpl */ ?>
﻿<form name="form" action="/predata/files1/<?php echo $this->_tpl_vars['mineid']; ?>
" method="post" enctype="multipart/form-data">
<div id="tabs">
   <ul>
       <li><a href="#tabs-1">评审意见</a></li>
	   <li><a href="#tabs-2">其他附件</a></li>
	   <!-- <li><a href="#tabs-3">国土资源部审核（备案）意见</a></li> -->
	</ul>
   
	<div id="tabs-1"><!--审核意见-->
	<table class="formView" align="center" id="basedata" width='100%'>
		<tr>
		        <td class='tdtitle' colspan=4 algin='center' style="background:#CCFFFF">矿山所在地市（县）级国土资源主管部门审核意见</td>
		</tr>
		</table>
	<table align = "center" >
		<?php if ($this->_tpl_vars['QuanXian'] != 1): ?>
		<tr>
			<td align="left">请选择文件：</td>
			<td><input type="file" name="file1" id="file1"  style="width:400px"/></td>
			<td><input type="submit" name="submit" height="50%" width="50%" value="导入文件"></td>
		</tr>
		<?php endif; ?>
	</table>

<table class="listView" align="center" width="100%">
        <thead>
		<tr>
				<th>文件名</th>
				<th colspan=3>申报矿山名称</th>
				<th>文件类型</th>
				<th colspan=2 width="8%">操作</th>
		</tr>
		</thead>
        <?php $_from = $this->_tpl_vars['MArray']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['data']):
?>
	<?php if ($this->_tpl_vars['data'][2] == '8'): ?>
		<tr>
            <td><img src="http://localhost/uploadDir/<?php echo $this->_tpl_vars['data'][1]; ?>
/<?php echo $this->_tpl_vars['data'][0]; ?>
" width="80%" style="height:60px;width:80px"><?php echo $this->_tpl_vars['data'][0]; ?>
</td>
			<td colspan=3><?php echo $this->_tpl_vars['data'][1]; ?>
</td>
			<td><?php echo $this->_tpl_vars['data'][5]; ?>
</td>
			<td><a href="/predata/DownloadFile/<?php echo $this->_tpl_vars['data'][3]; ?>
">下载</a></td>
			<?php if ($this->_tpl_vars['QuanXian'] != 1): ?><td><a href="/predata/DeleteFile/<?php echo $this->_tpl_vars['data'][3]; ?>
">删除</a></td><?php endif; ?>
        </tr>           
		<?php endif; ?>
        <?php endforeach; endif; unset($_from); ?>
     </table>

     <table class="formView" align="center" id="basedata" width='100%'>
		<tr>
		        <td class='tdtitle' colspan=4 algin='center' style="background:#FFCC99">矿山所在省级国土资源主管部门审核意见</td>
		</tr>
		</table>
	<table align = "center" >
		<?php if ($this->_tpl_vars['QuanXian'] != 1): ?>
		<tr>
			<td align="left">请选择文件：</td>
			<td><input type="file" name="file2" id="file2"  style="width:400px"/></td>
			<td><input type="submit" name="submit" height="50%" width="50%" value="导入文件"></td>
		</tr><?php endif; ?>
	</table>

<table class="listView" align="center" width="100%">
        <thead>
		<tr>
				<th>文件名</th>
				<th colspan=3>申报矿山名称</th>
				<th>文件类型</th>
				<th colspan=2 width="8%">操作</th>
		</tr>
		</thead>
        <?php $_from = $this->_tpl_vars['MArray']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['data']):
?>
	<?php if ($this->_tpl_vars['data'][2] == '9'): ?>
		<tr>
            <td><img src="http://localhost/uploadDir/<?php echo $this->_tpl_vars['data'][1]; ?>
/<?php echo $this->_tpl_vars['data'][0]; ?>
" width="80%" style="height:60px;width:80px"><?php echo $this->_tpl_vars['data'][0]; ?>
</td>
			<td colspan=3><?php echo $this->_tpl_vars['data'][1]; ?>
</td>
			<td><?php echo $this->_tpl_vars['data'][5]; ?>
</td>
			<td><a href="/predata/DownloadFile/<?php echo $this->_tpl_vars['data'][3]; ?>
">下载</a></td>
			<?php if ($this->_tpl_vars['QuanXian'] != 1): ?><td><a href="/predata/DeleteFile/<?php echo $this->_tpl_vars['data'][3]; ?>
">删除</a></td><?php endif; ?>
        </tr>           
		<?php endif; ?>
        <?php endforeach; endif; unset($_from); ?>
     </table>

     <table class="formView" align="center" id="basedata" width='100%'>
		<tr>
		        <td class='tdtitle' colspan=4 algin='center' style="background:#FFCCCC">国土资源部审核（备案）意见</td>
		</tr>
		</table>
	<table align = "center" >
		<?php if ($this->_tpl_vars['QuanXian'] != 1): ?>
		<tr>
			<td align="left">请选择文件：</td>
			<td><input type="file" name="file3" id="file3"  style="width:400px"/></td>
			<td><input type="submit" name="submit" height="50%" width="50%" value="导入文件"></td>
		</tr><?php endif; ?>
	</table>

<table class="listView" align="center" width="100%">
        <thead>
		<tr>
				<th>文件名</th>
				<th colspan=3>申报矿山名称</th>
				<th>文件类型</th>
				<th colspan=2 width="8%">操作</th>
		</tr>
		</thead>
        <?php $_from = $this->_tpl_vars['MArray']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['data']):
?>
	<?php if ($this->_tpl_vars['data'][2] == '10'): ?>
		<tr>
            <td><img src="http://localhost/uploadDir/<?php echo $this->_tpl_vars['data'][1]; ?>
/<?php echo $this->_tpl_vars['data'][0]; ?>
" width="80%" style="height:60px;width:80px"><?php echo $this->_tpl_vars['data'][0]; ?>
</td>
			<td colspan=3><?php echo $this->_tpl_vars['data'][1]; ?>
</td>
			<td><?php echo $this->_tpl_vars['data'][5]; ?>
</td>
			<td><a href="/predata/DownloadFile/<?php echo $this->_tpl_vars['data'][3]; ?>
">下载</a></td>
			<?php if ($this->_tpl_vars['QuanXian'] != 1): ?><td><a href="/predata/DeleteFile/<?php echo $this->_tpl_vars['data'][3]; ?>
">删除</a></td><?php endif; ?>
        </tr>           
		<?php endif; ?>
        <?php endforeach; endif; unset($_from); ?>
     </table>

     
     </div>

<div id="tabs-2"><!--审核意见-->
	<table class="formView" align="center" id="basedata" width='100%'>
		<tr>
		        <td class='tdtitle' colspan=4 algin='center'>其他附件</td>
		</tr>
		</table>
	<table align = "center" >
		<?php if ($this->_tpl_vars['QuanXian'] != 1): ?>
		<tr>
			<td align="left">请选择文件：</td>
			<td><input type="file" name="file4" id="file4"  style="width:400px"/></td>
			<td><input type="submit" name="submit" height="50%" width="50%" value="导入文件"></td>
		</tr><?php endif; ?>
	</table>

<table class="listView" align="center" width="100%">
        <thead>
		<tr>
				<th>文件名</th>
				<th>申报矿山名称</th>
				<th>文件类型</th>
				<th colspan=2 width="8%">操作</th>
		</tr>
		</thead>
        <?php $_from = $this->_tpl_vars['MArray']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['data']):
?>
	<?php if ($this->_tpl_vars['data'][2] == '50'): ?>
		<tr>
            <td><img src="http://localhost/uploadDir/<?php echo $this->_tpl_vars['data'][1]; ?>
/<?php echo $this->_tpl_vars['data'][0]; ?>
" width="80%" style="height:60px;width:80px"><?php echo $this->_tpl_vars['data'][0]; ?>
</td>
			<td><?php echo $this->_tpl_vars['data'][1]; ?>
</td>
			<td><?php echo $this->_tpl_vars['data'][5]; ?>
</td>
			<td><a href="/predata/DownloadFile/<?php echo $this->_tpl_vars['data'][3]; ?>
">下载</a></td>
			<?php if ($this->_tpl_vars['QuanXian'] != 1): ?><td><a href="/predata/DeleteFile/<?php echo $this->_tpl_vars['data'][3]; ?>
">删除</a></td><?php endif; ?>
        </tr>           
		<?php endif; ?>
        <?php endforeach; endif; unset($_from); ?>
     </table>
     </div>

    <!--  <div id="tabs-3"> --><!--审核意见-->
	<!-- <table class="formView" align="center" id="basedata" width='100%'>
		<tr>
		        <td class='tdtitle' colspan=4 algin='center'>国土资源部审核（备案）意见</td>
		</tr>
		</table>
	<table align = "center" >
		<tr>
			<td align="left">请选择文件：</td>
			<td><input type="file" name="file3" id="file3"  style="width:400px"/></td>
		</tr>
	</table>

<table class="listView" align="center" width="100%">
        <thead>
		<tr>
				<th>文件名</th>
				<th>申报矿山名称</th>
				<th>文件类型</th>
				<th colspan=2 width="8%">操作</th>
		</tr>
		</thead>
        <?php $_from = $this->_tpl_vars['MArray']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['data']):
?>
	<?php if ($this->_tpl_vars['data'][2] == '10'): ?>
		<tr>
            <td><img src="http://localhost/uploadDir/<?php echo $this->_tpl_vars['data'][1]; ?>
/<?php echo $this->_tpl_vars['data'][0]; ?>
" width="20%"><?php echo $this->_tpl_vars['data'][0]; ?>
</td>
			<td><?php echo $this->_tpl_vars['data'][1]; ?>
</td>
			<td><?php echo $this->_tpl_vars['data'][5]; ?>
</td>
			<td><a href="/predata/DownloadFile/<?php echo $this->_tpl_vars['data'][3]; ?>
">下载</a></td>
			<td><a href="/predata/DeleteFile/<?php echo $this->_tpl_vars['data'][3]; ?>
">删除</a></td>
        </tr>           
		<?php endif; ?>
        <?php endforeach; endif; unset($_from); ?>
     </table>
     </div> -->
    <!--  <input type="submit" name="submit" value="导入文件">
     </div> -->
     <input type="button" onclick="click1();" value="完成"/>
    
</form>
<script type="text/javascript">
function click1()
<?php echo '{'; ?>

	alert("保存成功");
	window.location="/predata/ListPreDetails/<?php echo $this->_tpl_vars['mineid']; ?>
";

<?php echo '}'; ?>

</script>