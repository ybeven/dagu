<?php /* Smarty version 2.6.26, created on 2014-05-18 01:59:49
         compiled from system/dataCount.tpl */ ?>
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
							
								
				var myArray5 = new Array(<?php $_from = $this->_tpl_vars['nyore2']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['myarray'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['myarray']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['child']):
        $this->_foreach['myarray']['iteration']++;
?>
				<?php if (($this->_foreach['myarray']['iteration'] == $this->_foreach['myarray']['total'])): ?>"<?php echo $this->_tpl_vars['child'][50]; ?>
"
								<?php else: ?>"<?php echo $this->_tpl_vars['child'][50]; ?>
",<?php endif; ?><?php endforeach; endif; unset($_from); ?>);
				var myArray6 = new Array(<?php $_from = $this->_tpl_vars['jsore2']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['myarray'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['myarray']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['child']):
        $this->_foreach['myarray']['iteration']++;
?>
				<?php if (($this->_foreach['myarray']['iteration'] == $this->_foreach['myarray']['total'])): ?>"<?php echo $this->_tpl_vars['child'][50]; ?>
"
								<?php else: ?>"<?php echo $this->_tpl_vars['child'][50]; ?>
",<?php endif; ?><?php endforeach; endif; unset($_from); ?>);
				var myArray7 = new Array(<?php $_from = $this->_tpl_vars['fjsore2']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['myarray'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['myarray']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['child']):
        $this->_foreach['myarray']['iteration']++;
?>
				<?php if (($this->_foreach['myarray']['iteration'] == $this->_foreach['myarray']['total'])): ?>"<?php echo $this->_tpl_vars['child'][50]; ?>
"
								<?php else: ?>"<?php echo $this->_tpl_vars['child'][50]; ?>
",<?php endif; ?><?php endforeach; endif; unset($_from); ?>);
				var myArray8 = new Array(<?php $_from = $this->_tpl_vars['meiore2']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['myarray'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['myarray']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['child']):
        $this->_foreach['myarray']['iteration']++;
?>
				<?php if (($this->_foreach['myarray']['iteration'] == $this->_foreach['myarray']['total'])): ?>"<?php echo $this->_tpl_vars['child'][50]; ?>
"
								<?php else: ?>"<?php echo $this->_tpl_vars['child'][50]; ?>
",<?php endif; ?><?php endforeach; endif; unset($_from); ?>);	


				<?php echo '
				var str1 = "#child"+red;
				var str2;var str3;var str4;var str5;
				for(var i=0;i<myArray.length;i++)
				{
				 str2=str2+"<option value=\'"+myArray[i]+"\'>"+myArray[i]+",已有"+myArray5[i]+"个</option>";
				}
				for(var i=0;i<myArray2.length;i++)
				{
				 str3=str3+"<option value=\'"+myArray2[i]+"\'>"+myArray2[i]+",已有"+myArray6[i]+"个</option>";
				}
				for(var i=0;i<myArray3.length;i++)
				{
				 str4=str4+"<option value=\'"+myArray3[i]+"\'>"+myArray3[i]+",已有"+myArray7[i]+"个</option>";
				}
				for(var i=0;i<myArray4.length;i++)
				{
				 str5=str5+"<option value=\'"+myArray4[i]+"\'>"+myArray4[i]+",已有"+myArray8[i]+"个</option>";
				}
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
						{$("#child"+red).html(" ");
						$("#child"+red).append(str5);}
				}
				function ramoveminerate(red2)
				{
					$(red2).parent().parent().parent().parent().parent().remove();
				}
		'; ?>
		
</script>			

<!-- <form name="form1" action="/system/UpdateData1" method="post" enctype="multipart/form-data">

	
	<table class="formView" align="center" id="basic_info1">
		<table class="formView" align="center" width="100%">
					
		<tr>	
				<td class="tdhead" width=300>每个矿种矿山数</td>
						<td width=500>
						<select id="1"  onchange="getchild(this.id)" width="90%" name="oreNametype[]">
							<option value="请选择"}">请选择</option>
							<option value="能源矿产">能源矿产</option>
							<option value="金属矿产">金属矿产</option>
							<option value="非金属矿产">非金属矿产</option>
							<option value="煤矿">煤矿</option>
						</select>
						
						
						<select id="child1" width="90%" name="orename[]" >
							<option value="请选择"}">请选择</option>
							<option value="<?php echo $this->_tpl_vars['o'][0]; ?>
"><?php echo $this->_tpl_vars['o'][0]; ?>
</option>
						</select>
						</td>
						<td width=300>
						<input width="90%" name="cityMine">个</td>
				</td>  
		 </tr>

		 <tr>	
				<td class="tdhead" width=300>每个矿种绿色矿山数</td>
						<td width=500>
						<select id="1"  onchange="getchild(this.id)" width="90%" name="oreNametype[]">
							<option value="请选择"}">请选择</option>
							<option value="能源矿产">能源矿产</option>
							<option value="金属矿产">金属矿产</option>
							<option value="非金属矿产">非金属矿产</option>
							<option value="煤矿">煤矿</option>
						</select>
						
						
						<select id="child1" width="90%" name="orename[]" >
							<option value="请选择"}">请选择</option>
							<option value="<?php echo $this->_tpl_vars['o'][0]; ?>
"><?php echo $this->_tpl_vars['o'][0]; ?>
</option>
						</select>
						</td>
						<td width=300>
						<input width="90%" name="cityMine">个</td>
				</td>  
		 </tr>

		<tr>
			<td class='tdhead'  width=100>每个地(州)矿山数</td>
			<td  width=500>
				<select  name="mineral1">
					<option value="嘉峪关市">嘉峪关市</option>
					<option value="金昌市">金昌市</option>
					<option value="白银市">白银市</option>
					<option value="天水市">天水市</option>
					<option value="武威市">武威市</option>
					<option value="张掖市">张掖市</option>
					<option value="平凉市">平凉市</option>
					<option value="酒泉市">酒泉市</option>
					<option value="庆阳市">庆阳市</option>
					<option value="定西市">定西市</option>
					<option value="陇南市">陇南市</option>
					<option value="临夏回族自治州">临夏回族自治州</option>
					<option value="甘南藏族自治州">甘南藏族自治州</option>
					<option value="兰州市">兰州市</option>
				</select>
				</td>
				<td width=300>
				<input width="90%" name="cityMine">个</td>
	        </tr>
		<tr>
			<td class='tdhead'  width=100>每个地(州)绿色矿山数</td>
			<td  width=500>
				<select  name="mineral">
					<option value="嘉峪关市">嘉峪关市，已有<?php echo $this->_tpl_vars['r'][0][4]; ?>
个</option>
					<option value="金昌市">金昌市，已有<?php echo $this->_tpl_vars['r'][1][4]; ?>
个</option>
					<option value="白银市">白银市，已有<?php echo $this->_tpl_vars['r'][2][4]; ?>
个</option>
					<option value="天水市">天水市，已有<?php echo $this->_tpl_vars['r'][3][4]; ?>
个</option>
					<option value="武威市">武威市，已有<?php echo $this->_tpl_vars['r'][4][4]; ?>
个</option>
					<option value="张掖市">张掖市，已有<?php echo $this->_tpl_vars['r'][5][4]; ?>
个</option>
					<option value="平凉市">平凉市，已有<?php echo $this->_tpl_vars['r'][6][4]; ?>
个</option>
					<option value="酒泉市">酒泉市，已有<?php echo $this->_tpl_vars['r'][7][4]; ?>
个</option>
					<option value="庆阳市">庆阳市，已有<?php echo $this->_tpl_vars['r'][8][4]; ?>
个</option>
					<option value="定西市">定西市，已有<?php echo $this->_tpl_vars['r'][9][4]; ?>
个</option>
					<option value="陇南市">陇南市，已有<?php echo $this->_tpl_vars['r'][10][4]; ?>
个</option>
					<option value="临夏回族自治州">临夏回族自治州，已有<?php echo $this->_tpl_vars['r'][11][4]; ?>
个</option>
					<option value="甘南藏族自治州">甘南藏族自治州，已有<?php echo $this->_tpl_vars['r'][12][4]; ?>
个</option>
					<option value="兰州市">兰州市，已有<?php echo $this->_tpl_vars['r'][13][4]; ?>
个</option>
				</select>
				</td>
				<td width=300>
				<input width="90%" name="cityGreenMine">个</td>
	        </tr>
		
	</table>
  </form>
	<input type="submit" value="修改" />
	<!--<input type="button" onclick="location.href='/ZB/ListTruckPlanZB'" value="返回" />-->



<form name="form2" action="/system/UpdateData" method="post" enctype="multipart/form-data">

	
	<table class="formView" align="center" id="basic_info2">
		<tr>
			<td width="20%" class='tdhead'>甘肃省矿山总数</td><td><input name="mineAll" value="<?php echo $this->_tpl_vars['mArray'][0]->mineAll; ?>
">个</td>
			<td width="20%" class='tdhead'>甘肃省绿色矿山数</td><td><?php echo $this->_tpl_vars['totalnumber']; ?>
个</td>
		</tr>
		<tr>
			<td width="20%" class='tdhead'>甘肃省矿山环境恢复治理率</td>
			<td>
			<!-- <input name="environment"  value="<?php echo $this->_tpl_vars['mArray'][0]->environment; ?>
">%, -->
			目前已有<?php echo $this->_tpl_vars['environment']; ?>
%</td>
			<td width="20%" class='tdhead'>甘肃省土地复垦率</td><td>目前已有<?php echo $this->_tpl_vars['landrate']; ?>
%</td>
			<!-- <td width="20%" class='tdhead'>甘肃省土地复垦面积</td><td><input name="land" value="<?php echo $this->_tpl_vars['mArray'][0]->land; ?>
">平方公里</td> -->
		</tr>
		<!-- <tr>
			<td width="20%" class='tdhead'>甘肃省土地复垦率</td><td><input name="landrate" value="<?php echo $this->_tpl_vars['mArray'][0]->landrate; ?>
">%,目前已有<?php echo $this->_tpl_vars['landrate']; ?>
%</td>
		</tr> -->
		
	</table>

	<input type="submit" value="修改" />
	<!--<input type="button" onclick="location.href='/ZB/ListTruckPlanZB'" value="返回" />-->

</form>
		   
      