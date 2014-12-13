<!-- 新代码Include some javascript tools about multiple choose of checkbox. -->
<script language="javaScript" src="/js/PopupDiv.js" type="text/javascript"></script>
<script language="javaScript" src="/js/checkboxgroup.js" type="text/javascript"></script>
<!--<script language="javaScript" src="/js/jquery.min.js" type="text/javascript"></script>-->




{literal}
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
	for(var i=0;i<elements.length;i++){//set select value to a string like 'A+B+C', add '+' between each checked value.
		if(elements[i].checked==true){
			k++;
			if(k!=j){
				str+=elements[i].value+"+";
			}else{
				str+=elements[i].value;
			}				
		}
	}	
	if(j!=0){//set select value to a string like 'A+B+C', add '+' between each checked value.
		document.getElementById(select).options[0].value=str;
		document.getElementById(select).options[0].text=str.substring(0,5)+'...';
	}	
}


function checkedtime(a)  //为了多选的隐藏
{
	$('#kuangzhong').toggle();
	positionxGroup.check(a);
}
var j=0;
function checkedore(a)
{
	if( j==0)
	$('#shijian').toggle();
	if( a.checked==true )
	j++;
	else
	j--;
	if( j==0)
	$('#shijian').toggle();
	
	positionxGroup.check(a);
}


</script>
{/literal}





<!-- This Div tab defines the appeared 'window' when click the 'SubPriority' list,using PopupDiv tool to realize the effect. -->
<div id="positionx_div" style="position:absolute;top:230px;left:280px;width:250px;height:460px;border:1px solid black; background-color:#ffffff; padding:25px; font-size:110%; text-align:left; display:none;">
	请选择X轴坐标<br><br>
	{literal}
	<script type="text/javascript">
		var positionxGroup = new CheckBoxGroup();
		positionxGroup.addToGroup("s");
		positionxGroup.setControlBox("s_all");
		positionxGroup.setMasterBehavior("all");
		</script>	
	{/literal}		
	<form >
	    <div id="shijian">	
        时间：<br>
		<input name="s" type="checkbox" value="时间" onclick="checkedtime(this)"/>时间<br>	
		---------------------------------------
		</div>
	
	    <div id="kuangzhong">	
	    行政区划：<br>
		<!--<span><input name="s_all" type="checkbox" value="ALL" onclick="positionxGroup.check(this)" style="vertical-align:middle" /><b>&nbsp;ALL</b><br><br></span>	
        <input name="s" type="checkbox" value="甘肃全省" onclick="positionxGroup.check(this)"  />甘肃全省<br>-->
		<input name="s" type="checkbox" value="兰州市" onclick="checkedore(this)"  />兰州市<br>
		<input name="s" type="checkbox" value="嘉峪关市" onclick="checkedore(this)"  />嘉峪关市<br>
		<input name="s" type="checkbox" value="金昌市" onclick="checkedore(this)"  />金昌市<br>
		<input name="s" type="checkbox" value="白银市" onclick="checkedore(this)"   />白银市<br>
		<input name="s" type="checkbox" value="天水市" onclick="checkedore(this)"   />天水市<br>
		<input name="s" type="checkbox" value="武威市" onclick="checkedore(this)"   />武威市<br>
		<input name="s" type="checkbox" value="张掖市" onclick="checkedore(this)"   />张掖市<br>
		<input name="s" type="checkbox" value="酒泉市" onclick="checkedore(this)"   />酒泉市<br>
		<input name="s" type="checkbox" value="平凉市" onclick="checkedore(this)"  />平凉市<br>
		<input name="s" type="checkbox" value="庆阳市" onclick="checkedore(this)"   />庆阳市<br>
		<input name="s" type="checkbox" value="定西市" onclick="checkedore(this)"   />定西市<br>
		<input name="s" type="checkbox" value="陇南市" onclick="checkedore(this)"  />陇南市<br>
		<input name="s" type="checkbox" value="临夏回族自治州" onclick="checkedore(this)"   />临夏回族自治州<br>
		<input name="s" type="checkbox" value="甘南藏族自治州" onclick="checkedore(this)"   />甘南藏族自治州<br>
		</div>
		
		
	</form>		
	<br>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button value="OK" onClick="Popup.hide('positionx_div');setValue('s','positionx');" style="height:25px">&nbsp;&nbsp;提交&nbsp;&nbsp;</button>&nbsp;&nbsp;
	<button value="Cancel" onClick="Popup.hide('positionx_div');" style="height:25px">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>	
</div>




<!-- x轴坐标   This Div tab defines the appeared 'window' when click the 'SubPriority' list,using PopupDiv tool to realize the effect. -->
<div id="mineral_div" style="position:absolute;top:230px;left:280px;width:250px;height:630px;border:1px solid black; background-color:#ffffff; padding:25px; font-size:110%; text-align:left; display:none;">
	请选择矿种<br>
	{literal}
	<script type="text/javascript">
		var mineralGroup = new CheckBoxGroup();
		mineralGroup.addToGroup("sx");
		mineralGroup.setControlBox("sx_all");
		mineralGroup.setMasterBehavior("all");
		</script>	
	{/literal}		
	<form >
	
	<!--时间：<br>
		<input name="sx" type="checkbox" value="时间" onclick="positionxGroup.check(this)"/>时间<br>-->

		
		
	矿种：<br>
	
	    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 金属类：<br>
		    <input name="sx" type="checkbox" value="铝矿" onclick="mineralGroup.check(this)"/>铝矿<br>
			<input name="sx" type="checkbox" value="铁矿" onclick="mineralGroup.check(this)"/>铁矿<br>
			<input name="sx" type="checkbox" value="金矿" onclick="mineralGroup.check(this)"/>金矿<br>
			<input name="sx" type="checkbox" value="锰矿" onclick="mineralGroup.check(this)"/>锰矿<br>
			<input name="sx" type="checkbox" value="钛矿" onclick="mineralGroup.check(this)"/>钛矿<br>
			<input name="sx" type="checkbox" value="铜矿" onclick="mineralGroup.check(this)"/>铜矿<br>
			<input name="sx" type="checkbox" value="镍矿" onclick="mineralGroup.check(this)"/>镍矿<br>
			<input name="sx" type="checkbox" value="银矿" onclick="mineralGroup.check(this)"/>银矿<br>
			<input name="sx" type="checkbox" value="钼矿" onclick="mineralGroup.check(this)"/>钼矿<br>
			<input name="sx" type="checkbox" value="钨矿" onclick="mineralGroup.check(this)"/>钨矿<br>
			<input name="sx" type="checkbox" value="钛矿" onclick="mineralGroup.check(this)"/>钛矿<br>
			<input name="sx" type="checkbox" value="锡矿" onclick="mineralGroup.check(this)"/>锡矿<br>
		 
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 非金属类：<br>
    		 <input name="sx" type="checkbox" value="金刚石" onclick="mineralGroup.check(this)"/>金刚石<br>
			<input name="sx" type="checkbox" value="石墨" onclick="mineralGroup.check(this)"/>石墨<br>
			<input name="sx" type="checkbox" value="自然硫" onclick="mineralGroup.check(this)"/>自然硫<br>
			<input name="sx" type="checkbox" value="硫铁矿" onclick="mineralGroup.check(this)"/>硫铁矿<br>
			<input name="sx" type="checkbox" value="刚玉" onclick="mineralGroup.check(this)"/>刚玉<br>
			<input name="sx" type="checkbox" value="水晶" onclick="mineralGroup.check(this)"/>水晶<br>
			
		 
		 
		 
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  能源类：<br>
		    <input name="sx" type="checkbox" value="石油" onclick="mineralGroup.check(this)"/>石油<br>
			<input name="sx" type="checkbox" value="煤矿" onclick="mineralGroup.check(this)"/>煤矿<br>
			<input name="sx" type="checkbox" value="地热" onclick="mineralGroup.check(this)"/>地热<br>
			<input name="sx" type="checkbox" value="铀钍" onclick="mineralGroup.check(this)"/>铀钍<br>
			<input name="sx" type="checkbox" value="石煤" onclick="mineralGroup.check(this)"/>石煤<br>
			<input name="sx" type="checkbox" value="天然气" onclick="mineralGroup.check(this)"/>天然气<br>
		 
		  
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
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button value="OK" onClick="Popup.hide('mineral_div');setValue('sx','mineral');" style="height:25px">&nbsp;&nbsp;提交&nbsp;&nbsp;</button>&nbsp;&nbsp;
	<button value="Cancel" onClick="Popup.hide('mineral_div');" style="height:25px">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>	
</div>




	 <form id="picture" method="post" action="minerals">
			<table class="formView" align="center">
				<tr>
					<td  nowrap>矿种选择</td>   <!--<php>写php代码</php>  还是利用-->
					<td>
					   <select   name="mineral"  id="mineral" onfocus="Popup.showModal('mineral_div');return false;" >
							<option value={$mineral} id="positionx_text">{$mineral|truncate:10:""}</option>
						</select>          

					
					
						<!--<select name="basedata_divisions_shi">
						<option value="0" {$selected0}>兰州市</option>
						<option value="1" {$selected1}>嘉峪关市</option>
						<option value="2" {$selected2}>金昌市</option>
						<option value="3" {$selected3}>白银市</option>
						<option value="4" {$selected4}>天水市</option>
						<option value="5" {$selected5}>武威市</option>
					    <option value="6" {$selected6}>张掖市</option>
						<option value="7" {$selected7}>酒泉市</option>
						<option value="8" {$selected8}>平凉市</option>
						<option value="9" {$selected9}>庆阳市</option>
						<option value="10" {$selected10}>定西市</option>
						<option value="11" {$selected11}>陇南市</option> ﻿
						<option value="12" {$selected12}>临夏回族自治州</option>
						<option value="13" {$selected13}>甘南藏族自治州</option>
						</select>-->
						
						
					</td>
					<td nowrap>统计指标</td>
					<td>
					    <select name="index">						  
						<!--  <option value="0" {$iselected0}>矿山储量</option>	-->					 						  
						  <option value="2" {$iselected2}>绿色矿山数量</option>
						  <option value="1" {$iselected1}>矿区面积</option>						  
						  <option value="3" {$iselected3}>工业总产值</option>
						  <option value="4" {$iselected4}>矿山企业利税</option>
						  <!--<option value="5" {$iselected5}>生产规模</option>-->
						  <option value="6" {$iselected6}>单位工业总产值能耗</option>
						  <option value="7" {$iselected7}>复垦面积</option>
						   <!--<option value="8" {$iselected8}>矿区绿化率</option>-->	
						  <option value="9" {$iselected9}>创新投入资金</option>
						   <!--<option value="10" {$iselected10}>“三率”</option>-->	
						  <option value="10" {$iselected10}>重点工程总投资</option>
		 				 </select>
					</td>
					<td nowrap>X轴坐标</td>
					<td>					
					   	<select   name="positionx"  id="positionx" onfocus="Popup.showModal('positionx_div');return false;" >
							<option value={$positionx} id="positionx_text">{$positionx|truncate:9:""}</option>
						</select>		
					    <!--<select name="xposition">						  
						  <option value="time" {$tselected0}>时间</option>						 						  
						  <!--<option value="minerals" {$tselected1}>矿种</option>
						  <option value="nergymineral" {$tselected3}>能源矿种</option>
						  <option value="metalmineral" {$tselected2}>金属矿种</option>
						  <option value="umetalmineral" {$tselected4}>非金属矿种</option>
		 				 </select>-->
					</td>
					<td nowrap>生成图形</td>
					<td>
					    <select name="chart">						  
						  <option value="histogram" {$charselect1}>柱状图</option>						 						  
						  <option value="piechart" {$charselect3}>饼状图</option>
						  <option value="linechart" {$charselect2}>折线图</option>
		 				 </select>
					</td>
					<td>&nbsp;&nbsp;<input type="submit" value="查询" /></td>
				</tr>
			</table>
	 </form>

	<hr>		


	

<form id="picture" method="post" action="region">
<table class="listView" align="center" width="750" >
<caption>{$mineral}{$indexname}统计</caption>
{if $disapearTable==1}
 <tr>
	{if $tselected0=="selected"}
		<th>{$year-5}年</th> <th>{$year-4}年</th> <th>{$year-3}年</th> <th>{$year-2}年</th> <th>{$year-1}年</th> <th>{$year-0}年</th>
	{else}
		<th>{$m0}</th> <th>{$m1}</th> <th>{$m2}</th> <th>{$m3}</th> <th>{$m4}</th> <th>{$m5}</th>
	{/if}
 </tr>
 <tr>	
	{foreach from=$datay item=data}
		<td width="90" align="center">{$data}{$un}</td>
	{/foreach}	
 </tr>
 {/if}
</table>
</form>

<hr>
	

<form id="picture" method="post" action="region">
<table class="listView" align="center">

 <tr>
 	<td>
 		<img src="{$picture}">
 	</td>       
 </tr>
</table>
</form>











<!--老代码
<div class="tablebox">
	 <form id="picture" method="post" action="minerals">
			<table class="formView" align="center">
				<tr>
					<td nowrap>矿种选择</td>
					<td>
						<select name="roleId">
						<option value="0">煤矿</option>
						<option value="1">金矿</option>
						<option value="2">铝矿</option>
						<option value="2">铁矿</option>
						<option value="2">锰矿</option>
						<option value="2">钛矿</option>
						<option value="5">铜矿</option>
						<option value="2">石油</option>
						<option value="2">天然气</option>
						<option value="2">地热</option>
						<option value="2">铀钍</option>
						<option value="2">石煤</option>
						<option value="2">金刚石</option>
						<option value="2">石墨</option>
						<option value="2">自然硫</option>
						<option value="2">硫铁矿</option>
						<option value="2">芒硝矿</option>
						<option value="3">镍矿</option>
						<option value="4">铅锌矿</option>
						<!--<option value="4">水晶</option>
						<option value="4">刚玉</option>-->
						<!--
						</select>
					</td>


					<td nowrap>统计指标</td>
					<td>
					    <select name="index">						  
						  <option value="2" {$iselected2}>绿色矿山数量</option>
						  <option value="1" {$iselected1}>矿区面积</option>						  
						  <option value="3" {$iselected3}>工业总产值</option>
						  <!--<option value="4" {$iselected4}>生产利润</option>-->	
						  <!--<option value="5" {$iselected5}>生产规模</option>-->
						  <!--<option value="6" {$iselected6}>单位工业总产值能耗</option>
						  <option value="7" {$iselected7}>复垦面积</option>
						   <!--<option value="8" {$iselected8}>矿区绿化率</option>-->	
						  <!--<option value="9" {$iselected9}>创新投入资金</option>
						   <!--<option value="10" {$iselected10}>“三率”</option>-->	
						  <!--<option value="10" {$iselected10}>重点工程总投资</option>
		 				 </select>
					</td>
					
					<td nowrap>X轴坐标</td>
					<td>
					    <select name="xposition">						  
						  <option value="time" {$tselected0}>时间</option>						 						  
						  <option value="minerals" {$tselected1}>行政区划</option>
		 				 </select>
					</td>
					
					<td nowrap>生成图形</td>
					<td>
					    <select name="chart">						  
						  <option value="histogram">柱状图</option>						 						  
						  <option value="piechart">饼状图</option>
						  <option value="linechart">折线图</option>
		 				 </select>
					</td>
					<td>&nbsp;&nbsp;<input type="submit" value="查询" /></td>
				</tr>
				
			</table>
			 <input type="hidden" name="state" value="addUser" />
			
	 </form>
		</div>
		<hr>
	
<div class='tablebox'>
<table class="listView" align="center">
<caption>以矿种为基准,时间为X坐标</caption>
<br/>
 <tr>
 	<td>
 		<img src="{$picture}">
 	</td>       
 </tr>
 <tr>
 	<td>   
 	</td>
 </tr>
</table>
-->