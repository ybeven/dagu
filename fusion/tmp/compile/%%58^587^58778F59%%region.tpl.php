<?php /* Smarty version 2.6.26, created on 2014-11-12 17:45:04
         compiled from gragh/region.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', 'gragh/region.tpl', 196, false),)), $this); ?>
<!-- Include some javascript tools about multiple choose of checkbox. -->
<script language="javaScript" src="/js/PopupDiv.js" type="text/javascript"></script>
<script language="javaScript" src="/js/checkboxgroup.js" type="text/javascript"></script>
<!--<script language="javaScript" src="/js/jquery.min.js" type="text/javascript"></script>-->




<?php echo '
<script type="text/javascript">
function setValue(checkbox,select){//set select value by checkbox you check 
	var str="";
	var elements=document.getElementsByName(checkbox);
	var j=0;//counts of checks element
	for(var i=0;i<elements.length;i++){
		if(elements[i].checked==true){
		
			j++;							
		}
	}
	if(j==elements.length){//set select value to "ALL" when all checkboxes are checked.
		document.getElementById(select).options[0].value="ALL";
		document.getElementById(select).options[0].text="ALL";
		return;
	};	
	var k=0;
	for(var i=0;i<elements.length;i++){//set select value to a string like \'A+B+C\', add \'+\' between each checked value.
		if(elements[i].checked==true){
			k++;
			if(k!=j){
				str+=elements[i].value+"+";
			}else{
				str+=elements[i].value;
			}				
		}
	}	
	if(j!=0){//set select value to a string like \'A+B+C\', add \'+\' between each checked value.	
		document.getElementById(select).options[0].value=str;
		document.getElementById(select).options[0].text=str.substring(0,5)+\'...\';
	}	
}
function checkedtime(a)
{
	$(\'#kuangzhong\').toggle();
	positionxGroup.check(a);
}
var j=0;
function checkedore(a)
{
	if( j==0)
	$(\'#shijian\').toggle();
	if( a.checked==true )
	j++;
	else
	j--;
	if( j==0)
	$(\'#shijian\').toggle();
	
	positionxGroup.check(a);
}
</script>
'; ?>






<!-- This Div tab defines the appeared 'window' when click the 'SubPriority' list,using PopupDiv tool to realize the effect. -->
<div id="subpriority_div" style="position:absolute;top:230px;left:280px;width:250px;height:380px;border:1px solid black; background-color:#ffffff; padding:25px; font-size:110%; text-align:left; display:none;">
	请选择行政区划<br><br>
	<?php echo '
	<script type="text/javascript">
		var subpriorityGroup = new CheckBoxGroup();
		subpriorityGroup.addToGroup("s");
		subpriorityGroup.setControlBox("s_all");
		subpriorityGroup.setMasterBehavior("all");
		</script>	
	'; ?>
		
	<form >
		<!--<span><input name="s_all" type="checkbox" value="ALL" onclick="subpriorityGroup.check(this)" style="vertical-align:middle" /><b>&nbsp;ALL</b><br><br></span>	-->	
        <input name="s" type="checkbox" value="甘肃全省" onclick="subpriorityGroup.check(this)"  />甘肃全省<br>
		<input name="s" type="checkbox" value="兰州市" onclick="subpriorityGroup.check(this)"  />兰州市<br>
		<input name="s" type="checkbox" value="嘉峪关市" onclick="subpriorityGroup.check(this)"  />嘉峪关市<br>
		<input name="s" type="checkbox" value="金昌市" onclick="subpriorityGroup.check(this)"  />金昌市<br>
		<input name="s" type="checkbox" value="白银市" onclick="subpriorityGroup.check(this)"   />白银市<br>
		<input name="s" type="checkbox" value="天水市" onclick="subpriorityGroup.check(this)"   />天水市<br>
		<input name="s" type="checkbox" value="武威市" onclick="subpriorityGroup.check(this)"   />武威市<br>
		<input name="s" type="checkbox" value="张掖市" onclick="subpriorityGroup.check(this)"   />张掖市<br>
		<input name="s" type="checkbox" value="酒泉市" onclick="subpriorityGroup.check(this)"   />酒泉市<br>
		<input name="s" type="checkbox" value="平凉市" onclick="subpriorityGroup.check(this)"  />平凉市<br>
		<input name="s" type="checkbox" value="庆阳市" onclick="subpriorityGroup.check(this)"   />庆阳市<br>
		<input name="s" type="checkbox" value="定西市" onclick="subpriorityGroup.check(this)"   />定西市<br>
		<input name="s" type="checkbox" value="陇南市" onclick="subpriorityGroup.check(this)"  />陇南市<br>
		<input name="s" type="checkbox" value="临夏回族自治州" onclick="subpriorityGroup.check(this)"   />临夏回族自治州<br>
		<input name="s" type="checkbox" value="甘南藏族自治州" onclick="subpriorityGroup.check(this)"   />甘南藏族自治州<br>
		
		
		
	</form>		
	<br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button value="OK" onClick="Popup.hide('subpriority_div');setValue('s','subpriority');" style="height:25px">&nbsp;&nbsp;提交&nbsp;&nbsp;</button>&nbsp;&nbsp;
	<button value="Cancel" onClick="Popup.hide('subpriority_div');" style="height:25px">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>	
</div>




<!-- x轴坐标   This Div tab defines the appeared 'window' when click the 'SubPriority' list,using PopupDiv tool to realize the effect. -->
<div id="positionx_div" style="position:absolute;top:230px;left:280px;width:250px;height:680px;border:1px solid black; background-color:#ffffff; padding:25px; font-size:110%; text-align:left; display:none;">
	请选择X轴坐标<br>
	<?php echo '
	<script type="text/javascript">
		var positionxGroup = new CheckBoxGroup();
		positionxGroup.addToGroup("sx");
		positionxGroup.setControlBox("sx_all");
		positionxGroup.setMasterBehavior("all");
		</script>	
	'; ?>
		
	<form >
	<div id="shijian">	
	时间：<br>
		<input name="sx" type="checkbox" value="时间" onclick="checkedtime(this)"/>时间<br>
---------------------------------------
	</div>
	<div id="kuangzhong">	
	矿种：<br>
	
	    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 金属类：<br>
		    <input name="sx" type="checkbox" value="铝矿" onclick="checkedore(this)"/>铝矿<br>
			<input name="sx" type="checkbox" value="铁矿" onclick="checkedore(this)"/>铁矿<br>
			<input name="sx" type="checkbox" value="金矿" onclick="checkedore(this)"/>金矿<br>
			<input name="sx" type="checkbox" value="锰矿" onclick="checkedore(this)"/>锰矿<br>
			<input name="sx" type="checkbox" value="钛矿" onclick="checkedore(this)"/>钛矿<br>
			<input name="sx" type="checkbox" value="铜矿" onclick="checkedore(this)"/>铜矿<br>
			<input name="sx" type="checkbox" value="镍矿" onclick="checkedore(this)"/>镍矿<br>
			<input name="sx" type="checkbox" value="银矿" onclick="checkedore(this)"/>银矿<br>
			<input name="sx" type="checkbox" value="钼矿" onclick="checkedore(this)"/>钼矿<br>
			<input name="sx" type="checkbox" value="钨矿" onclick="checkedore(this)"/>钨矿<br>
			<input name="sx" type="checkbox" value="钛矿" onclick="checkedore(this)"/>钛矿<br>
			<input name="sx" type="checkbox" value="锡矿" onclick="checkedore(this)"/>锡矿<br>
		 
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 非金属类：<br>
    		 <input name="sx" type="checkbox" value="金刚石" onclick="checkedore(this)"/>金刚石<br>
			<input name="sx" type="checkbox" value="石墨" onclick="checkedore(this)"/>石墨<br>
			<input name="sx" type="checkbox" value="自然硫" onclick="checkedore(this)"/>自然硫<br>
			<input name="sx" type="checkbox" value="硫铁矿" onclick="checkedore(this)"/>硫铁矿<br>
			<input name="sx" type="checkbox" value="刚玉" onclick="checkedore(this)"/>刚玉<br>
			<input name="sx" type="checkbox" value="水晶" onclick="checkedore(this)"/>水晶<br>
			
		 
		 
		 
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  能源类：<br>
		    <input name="sx" type="checkbox" value="石油" onclick="checkedore(this)"/>石油<br>
			<input name="sx" type="checkbox" value="煤矿" onclick="checkedore(this)"/>煤矿<br>
			<input name="sx" type="checkbox" value="地热" onclick="checkedore(this)"/>地热<br>
			<input name="sx" type="checkbox" value="铀钍" onclick="checkedore(this)"/>铀钍<br>
			<input name="sx" type="checkbox" value="石煤" onclick="checkedore(this)"/>石煤<br>
			<input name="sx" type="checkbox" value="天然气" onclick="checkedore(this)"/>天然气<br>
	</div>	 
		  
		<!--<span><input name="s_all" type="checkbox" value="ALL" onclick="subpriorityGroup.check(this)" style="vertical-align:middle" /><b>&nbsp;ALL</b><br><br></span>	
        <input name="sx" type="checkbox" value="甘肃全省" onclick="subpriorityGroup.check(this)"  />甘肃全省<br>
		<input name="s" type="checkbox" value="兰州市" onclick="subpriorityGroup.check(this)"  />兰州市<br>
		<input name="s" type="checkbox" value="嘉峪关市" onclick="subpriorityGroup.check(this)"  />嘉峪关市<br>
		<input name="s" type="checkbox" value="金昌市" onclick="subpriorityGroup.check(this)"  />金昌市<br>
		<input name="s" type="checkbox" value="白银市" onclick="subpriorityGroup.check(this)"   />白银市<br>
		<input name="s" type="checkbox" value="天水市" onclick="subpriorityGroup.check(this)"   />天水市<br>
		<input name="s" type="checkbox" value="武威市" onclick="subpriorityGroup.check(this)"   />武威市<br>
		<input name="s" type="checkbox" value="张掖市" onclick="subpriorityGroup.check(this)"   />张掖市<br>
		<input name="s" type="checkbox" value="酒泉市" onclick="subpriorityGroup.check(this)"   />酒泉市<br>
		<input name="s" type="checkbox" value="平凉市" onclick="subpriorityGroup.check(this)"  />平凉市<br>
		<input name="s" type="checkbox" value="庆阳市" onclick="subpriorityGroup.check(this)"   />庆阳市<br>
		<input name="s" type="checkbox" value="定西市" onclick="subpriorityGroup.check(this)"   />定西市<br>
		<input name="s" type="checkbox" value="陇南市" onclick="subpriorityGroup.check(this)"  />陇南市<br>
		<input name="s" type="checkbox" value="临夏回族自治州" onclick="subpriorityGroup.check(this)"   />临夏回族自治州<br>
		<input name="s" type="checkbox" value="甘南藏族自治州" onclick="subpriorityGroup.check(this)"   />甘南藏族自治州<br>-->	
		
		
		
	</form>		
	<br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button value="OK" onClick="Popup.hide('positionx_div');setValue('sx','positionx');" style="height:25px">&nbsp;&nbsp;提交&nbsp;&nbsp;</button>&nbsp;&nbsp;
	<button value="Cancel" onClick="Popup.hide('positionx_div');" style="height:25px">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>	
</div>




	 <form id="picture" method="post" action="region">
			<table class="formView" align="center">
				<tr>
					<td  nowrap>行政区划</td>   <!--<php>写php代码</php>-->
					<td>
					   	<select   name="subpriority"  id="subpriority" onfocus="Popup.showModal('subpriority_div');return false;" >
							<option value=<?php echo $this->_tpl_vars['subpriority']; ?>
 id="subpriority_text"><?php echo ((is_array($_tmp=$this->_tpl_vars['subpriority'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 9, "") : smarty_modifier_truncate($_tmp, 9, "")); ?>
</option>
						</select>	
					
					
						<!--<select name="basedata_divisions_shi">
						<option value="0" <?php echo $this->_tpl_vars['selected0']; ?>
>兰州市</option>
						<option value="1" <?php echo $this->_tpl_vars['selected1']; ?>
>嘉峪关市</option>
						<option value="2" <?php echo $this->_tpl_vars['selected2']; ?>
>金昌市</option>
						<option value="3" <?php echo $this->_tpl_vars['selected3']; ?>
>白银市</option>
						<option value="4" <?php echo $this->_tpl_vars['selected4']; ?>
>天水市</option>
						<option value="5" <?php echo $this->_tpl_vars['selected5']; ?>
>武威市</option>
					    <option value="6" <?php echo $this->_tpl_vars['selected6']; ?>
>张掖市</option>
						<option value="7" <?php echo $this->_tpl_vars['selected7']; ?>
>酒泉市</option>
						<option value="8" <?php echo $this->_tpl_vars['selected8']; ?>
>平凉市</option>
						<option value="9" <?php echo $this->_tpl_vars['selected9']; ?>
>庆阳市</option>
						<option value="10" <?php echo $this->_tpl_vars['selected10']; ?>
>定西市</option>
						<option value="11" <?php echo $this->_tpl_vars['selected11']; ?>
>陇南市</option> ﻿
						<option value="12" <?php echo $this->_tpl_vars['selected12']; ?>
>临夏回族自治州</option>
						<option value="13" <?php echo $this->_tpl_vars['selected13']; ?>
>甘南藏族自治州</option>
						</select>-->
						
						
					</td>
					<td nowrap>统计指标</td>
					<td>
					    <select name="index">						  
						<!--  <option value="0" <?php echo $this->_tpl_vars['iselected0']; ?>
>矿山储量</option>	-->					 						  
						  <option value="2" <?php echo $this->_tpl_vars['iselected2']; ?>
>绿色矿山数量</option>
						  <option value="1" <?php echo $this->_tpl_vars['iselected1']; ?>
>矿区面积</option>						  
						  <option value="3" <?php echo $this->_tpl_vars['iselected3']; ?>
>工业总产值</option>
						  <option value="4" <?php echo $this->_tpl_vars['iselected4']; ?>
>矿山企业利税</option>
						  <!--<option value="5" <?php echo $this->_tpl_vars['iselected5']; ?>
>生产规模</option>-->
						  <option value="6" <?php echo $this->_tpl_vars['iselected6']; ?>
>单位工业总产值能耗</option>
						  <option value="7" <?php echo $this->_tpl_vars['iselected7']; ?>
>复垦面积</option>
						   <!--<option value="8" <?php echo $this->_tpl_vars['iselected8']; ?>
>矿区绿化率</option>-->	
						  <option value="9" <?php echo $this->_tpl_vars['iselected9']; ?>
>创新投入资金</option>
						   <!--<option value="10" <?php echo $this->_tpl_vars['iselected10']; ?>
>“三率”</option>-->	
						  <option value="10" <?php echo $this->_tpl_vars['iselected10']; ?>
>重点工程总投资</option>
		 				 </select>
					</td>
					<td nowrap>X轴坐标</td>
					<td>					
				    	<select   name="positionx"  id="positionx" onfocus="Popup.showModal('positionx_div');return false;" >
							<option value=<?php echo $this->_tpl_vars['positionx']; ?>
 id="positionx_text"><?php echo ((is_array($_tmp=$this->_tpl_vars['positionx'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 10, "") : smarty_modifier_truncate($_tmp, 10, "")); ?>
</option>
						</select>	
					    <!--<select name="xposition">						  
						  <option value="time" <?php echo $this->_tpl_vars['tselected0']; ?>
>时间</option>						 						  
						  <!--<option value="minerals" <?php echo $this->_tpl_vars['tselected1']; ?>
>矿种</option>
						  <option value="nergymineral" <?php echo $this->_tpl_vars['tselected3']; ?>
>能源矿种</option>
						  <option value="metalmineral" <?php echo $this->_tpl_vars['tselected2']; ?>
>金属矿种</option>
						  <option value="umetalmineral" <?php echo $this->_tpl_vars['tselected4']; ?>
>非金属矿种</option>
		 				 </select>-->
					</td>
					<td nowrap>生成图形</td>
					<td>
					    <select name="chart">						  
						  <option value="histogram" <?php echo $this->_tpl_vars['charselect1']; ?>
>柱状图</option>						 						  
						  <option value="piechart" <?php echo $this->_tpl_vars['charselect3']; ?>
>饼状图</option>
						  <option value="linechart" <?php echo $this->_tpl_vars['charselect2']; ?>
>折线图</option>
		 				 </select>
					</td>
					<td>&nbsp;&nbsp;<input type="submit" value="查询" /></td>
				</tr>
			</table>
	 </form>

	<hr>		


	

<form id="picture" method="post" action="region">
<table class="listView" align="center" width="750" >
<caption><?php echo $this->_tpl_vars['city']; ?>
<?php echo $this->_tpl_vars['indexname']; ?>
统计</caption>
<?php if ($this->_tpl_vars['disapearTable'] == 1): ?>
 <tr>
	<?php if ($this->_tpl_vars['tselected0'] == 'selected'): ?>
		<th><?php echo $this->_tpl_vars['year']-5; ?>
年</th> <th><?php echo $this->_tpl_vars['year']-4; ?>
年</th> <th><?php echo $this->_tpl_vars['year']-3; ?>
年</th> <th><?php echo $this->_tpl_vars['year']-2; ?>
年</th> <th><?php echo $this->_tpl_vars['year']-1; ?>
年</th> <th><?php echo $this->_tpl_vars['year']-0; ?>
年</th>
	<?php else: ?>
		<th><?php echo $this->_tpl_vars['m0']; ?>
</th> <th><?php echo $this->_tpl_vars['m1']; ?>
</th> <th><?php echo $this->_tpl_vars['m2']; ?>
</th> <th><?php echo $this->_tpl_vars['m3']; ?>
</th> <th><?php echo $this->_tpl_vars['m4']; ?>
</th> <th><?php echo $this->_tpl_vars['m5']; ?>
</th>
	<?php endif; ?>
 </tr>
 <tr>	
	<?php $_from = $this->_tpl_vars['datay']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['data']):
?>
		<td width="90" align="center"><?php echo $this->_tpl_vars['data']; ?>
<?php echo $this->_tpl_vars['un']; ?>
</td>
	<?php endforeach; endif; unset($_from); ?>	
 </tr>
 <?php endif; ?>
</table>
</form>

<hr>
	

<form id="picture" method="post" action="region">
<table class="listView" align="center">

 <tr>
 	<td>
 		<img src="<?php echo $this->_tpl_vars['picture']; ?>
">
 	</td>       
 </tr>
</table>
</form>







