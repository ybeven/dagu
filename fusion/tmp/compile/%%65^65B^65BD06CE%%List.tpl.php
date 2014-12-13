<?php /* Smarty version 2.6.26, created on 2014-11-12 06:16:16
         compiled from system/List.tpl */ ?>
﻿<script type="text/javascript">
<?php echo '
function getchild(red)
				{
	'; ?>
			
				var myArray = new Array(<?php $_from = $this->_tpl_vars['nyore']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['myarray'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['myarray']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['child']):
        $this->_foreach['myarray']['iteration']++;
?>
				<?php if (($this->_foreach['myarray']['iteration'] == $this->_foreach['myarray']['total'])): ?>"<?php echo $this->_tpl_vars['child']['name']; ?>
"
								<?php else: ?>"<?php echo $this->_tpl_vars['child']['name']; ?>
",<?php endif; ?><?php endforeach; endif; unset($_from); ?>);
				var myArray2 = new Array(<?php $_from = $this->_tpl_vars['jsore']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['myarray'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['myarray']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['child']):
        $this->_foreach['myarray']['iteration']++;
?>
				<?php if (($this->_foreach['myarray']['iteration'] == $this->_foreach['myarray']['total'])): ?>"<?php echo $this->_tpl_vars['child']['name']; ?>
"
								<?php else: ?>"<?php echo $this->_tpl_vars['child']['name']; ?>
",<?php endif; ?><?php endforeach; endif; unset($_from); ?>);
				var myArray3 = new Array(<?php $_from = $this->_tpl_vars['fjsore']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['myarray'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['myarray']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['child']):
        $this->_foreach['myarray']['iteration']++;
?>
				<?php if (($this->_foreach['myarray']['iteration'] == $this->_foreach['myarray']['total'])): ?>"<?php echo $this->_tpl_vars['child']['name']; ?>
"
								<?php else: ?>"<?php echo $this->_tpl_vars['child']['name']; ?>
",<?php endif; ?><?php endforeach; endif; unset($_from); ?>);
				var myArray4 = new Array(<?php $_from = $this->_tpl_vars['meiore']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['myarray'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['myarray']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['child']):
        $this->_foreach['myarray']['iteration']++;
?>
				<?php if (($this->_foreach['myarray']['iteration'] == $this->_foreach['myarray']['total'])): ?>"<?php echo $this->_tpl_vars['child']['name']; ?>
"
								<?php else: ?>"<?php echo $this->_tpl_vars['child']['name']; ?>
",<?php endif; ?><?php endforeach; endif; unset($_from); ?>);			
				<?php echo '
				var str1 = "#child"+red;
				var str2;var str3;var str4;var str5;var str6;
				for(var i=0;i<myArray.length;i++)
				{
				 str2=str2+"<option value=\'"+myArray[i]+"\'>"+myArray[i]+"</option>";
				}
				for(var i=0;i<myArray2.length;i++)
				{
				 str3=str3+"<option value=\'"+myArray2[i]+"\'>"+myArray2[i]+"</option>";
				}
				for(var i=0;i<myArray3.length;i++)
				{
				 str4=str4+"<option value=\'"+myArray3[i]+"\'>"+myArray3[i]+"</option>";
				}

				 str5=str5+"<option value=\'煤矿\'>煤矿</option>";
				srt6="<option value=\'\'>请选择</option><option value=\'选矿回收率\'>原煤入选率</option><option value=\'开采回采率\'>采区回采率</option><option value=\'综合利用率\'>综合利用率</option>";
					//alert(str2);
					
					if($("#"+red).val()=="能源矿产")
						{$("#child"+red).html(" ");
						$("#child"+red).append(str2);}
						
					if($("#"+red).val()=="金属矿产")
						{$("#child"+red).html(" ");
						$("#child"+red).append(str3);}
					if($("#"+red).val()=="非金属矿产")
						{$("#child"+red).html(" ");
						$("#child"+red).append(str4);}
					if($("#"+red).val()=="煤矿")
						{
							$("#child"+red).html(" ");
							$("#child"+red).append(str5);
							$("#lv").html(" ");
							$("#lv").append("<option value=\'\'>请选择</option><option value=\'选矿回收率\'>原煤入选率</option><option value=\'开采回采率\'>采区回采率</option><option value=\'综合利用率\'>综合利用率</option>");
						}
						
						
					
				}
				
		'; ?>
		
</script>			
				
<div class='tablebox'>
<form name="form" action="/system/Searchthreepersent" method="post">
	<table class="formView" align="center" width="100%">
	     <tr>
		 <td width=200> 矿种类型</td>
		 <td width=200> 矿种名称</td>
		 <td width=200> 查询类型</td>
		  <td width=200> 操作</td>
		 </tr>
          <tr>	
				
				<td width=200>
						<select id="1"  onchange="getchild(this.id)" width="100%" name="oreNametype">
							<option value="">请选择</option>
							<option value="能源矿产">能源矿产</option>
							<option value="金属矿产">金属矿产</option>
							<option value="非金属矿产">非金属矿产</option>
							<option value="煤矿">煤矿</option>
						</select>
						</td>
						<td width=300>
						<select id="child1" width=250 name="orename">
						    <option value="">请选择</option>
						</select>
				</td>  
				<td width=200>
						<select id="lv" width=100 name="lvtype" >
							<option value="">请选择</option>
							<option value="选矿回收率">选矿回收率</option>
							<option value="开采回采率">开采回采率</option>
							<option value="综合利用率">综合利用率</option>
						</select>
				</td> 
				<td class="tdhead" width=200><input type="submit" id="" value="查询"/></td>
		 </tr>
	</table>
</form>
<form name="form" action="/system/Save/<?php echo $this->_tpl_vars['orename']; ?>
/<?php echo $this->_tpl_vars['lvtype']; ?>
" method="post" width="100%">
	<table class="formView formView_3lv" align="center" width="100%">
	     <tr>
		 <td colspan=7> <?php echo $this->_tpl_vars['orename']; ?>
<?php if ($this->_tpl_vars['orename'] == '煤矿'): ?><?php if ($this->_tpl_vars['lvtype'] == '开采回采率'): ?>采区回采率<?php endif; ?><?php if ($this->_tpl_vars['lvtype'] == '选矿回收率'): ?>原煤入选率<?php endif; ?><?php else: ?> <?php echo $this->_tpl_vars['lvtype']; ?>
<?php endif; ?> <input type="submit"  value="保存修改" /></td>
		 </tr>
		 <?php if ($this->_tpl_vars['biaotouArray'][0] != ""): ?>
         <tr>
			 <td class='tdhead'> <input style="background-color:#c9d7fc" value="<?php echo $this->_tpl_vars['biaotouArray'][1]; ?>
" name="subclass_name1"></td>
		     <td class='tdhead'> <input style="background-color:#c9d7fc" value="<?php echo $this->_tpl_vars['biaotouArray'][2]; ?>
" name="subclass_name2"></td>
		     <td class='tdhead'> <input style="background-color:#c9d7fc" value="<?php echo $this->_tpl_vars['biaotouArray'][3]; ?>
" name="subclass_name3"></td>
		     <td class='tdhead'> <input style="background-color:#c9d7fc" value="<?php echo $this->_tpl_vars['biaotouArray'][4]; ?>
" name="subclass_name4"></td>
			 <td class='tdhead'> <input style="background-color:#c9d7fc" value="<?php echo $this->_tpl_vars['biaotouArray'][5]; ?>
" name="subclass_name5"></td>
			 <td class='tdhead'> <input style="background-color:#c9d7fc" value="<?php echo $this->_tpl_vars['biaotouArray'][6]; ?>
" name="subclass_name6"></td>
			 <td class='tdhead'> 标准值(%)</td>
		 </tr>
		 <?php endif; ?>
		 <?php $_from = $this->_tpl_vars['neirongArray']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['e']):
?>
         <tr>
		     <td style="display:none"><input value="<?php echo $this->_tpl_vars['e'][0]; ?>
" name="id[]"></td>
			 <td class='tdhead'> <input value="<?php echo $this->_tpl_vars['e'][1]; ?>
" name="subclass1[]"></td>
		     <td class='tdhead'> <input value="<?php echo $this->_tpl_vars['e'][2]; ?>
" name="subclass2[]"></td>
		     <td class='tdhead'> <input value="<?php echo $this->_tpl_vars['e'][3]; ?>
" name="subclass3[]"></td>
		     <td class='tdhead'> <input value="<?php echo $this->_tpl_vars['e'][4]; ?>
" name="subclass4[]"></td>
			 <td class='tdhead'> <input value="<?php echo $this->_tpl_vars['e'][5]; ?>
" name="subclass5[]"></td>
			 <td class='tdhead'> <input value="<?php echo $this->_tpl_vars['e'][6]; ?>
" name="subclass6[]"></td>
			 <td class='tdhead'> <input value="<?php echo $this->_tpl_vars['e'][7]; ?>
" name="standardvalues[]"></td>
		 </tr>
		 <?php endforeach; endif; unset($_from); ?>
		 </table>
	</form>
	<form name="form" action="/system/Add/<?php echo $this->_tpl_vars['orename']; ?>
/<?php echo $this->_tpl_vars['lvtype']; ?>
" method="post" width="100%">
	<table class="formView formView_3lv" align="center" width="100%">
		 <?php if ($this->_tpl_vars['orename'] != ""): ?>
		 <tr>
		 <td colspan=7> 新增 <?php echo $this->_tpl_vars['orename']; ?>
 <?php if ($this->_tpl_vars['orename'] == '煤矿'): ?><?php if ($this->_tpl_vars['lvtype'] == '开采回采率'): ?>采区回采率<?php endif; ?><?php if ($this->_tpl_vars['lvtype'] == '选矿回收率'): ?>原煤入选率<?php endif; ?><?php else: ?> <?php echo $this->_tpl_vars['lvtype']; ?>
<?php endif; ?>标准值<input type="submit"  value="新增" /></td>
		 </tr>		 
		  <tr>
			 <td class='tdhead'> <input name="newsubclass1"></td>
		     <td class='tdhead'> <input name="newsubclass2"></td>
		     <td class='tdhead'> <input name="newsubclass3"></td>
		     <td class='tdhead'> <input name="newsubclass4"></td>
			 <td class='tdhead'> <input name="newsubclass5"></td>
			 <td class='tdhead'> <input name="newsubclass6"></td>
			 <td class='tdhead'> <input name="newstandardvalues"></td>
		 </tr>
		 <?php endif; ?>
	</table>
	
</form>
</div>