<script type="text/javascript">
{literal}
function getchild(red)
				{
	{/literal}			
				var myArray = new Array({foreach from=$nyore item=child name=myarray}
				{if $smarty.foreach.myarray.last}"{$child.name}"
								{else}"{$child.name}",{/if}{/foreach});
				var myArray2 = new Array({foreach from=$jsore item=child name=myarray}
				{if $smarty.foreach.myarray.last}"{$child.name}"
								{else}"{$child.name}",{/if}{/foreach});
				var myArray3 = new Array({foreach from=$fjsore item=child name=myarray}
				{if $smarty.foreach.myarray.last}"{$child.name}"
								{else}"{$child.name}",{/if}{/foreach});
				var myArray4 = new Array({foreach from=$meiore item=child name=myarray}
				{if $smarty.foreach.myarray.last}"{$child.name}"
								{else}"{$child.name}",{/if}{/foreach});	
							
								
				var myArray5 = new Array({foreach from=$nyore2 item=child name=myarray}
				{if $smarty.foreach.myarray.last}"{$child[50]}"
								{else}"{$child[50]}",{/if}{/foreach});
				var myArray6 = new Array({foreach from=$jsore2 item=child name=myarray}
				{if $smarty.foreach.myarray.last}"{$child[50]}"
								{else}"{$child[50]}",{/if}{/foreach});
				var myArray7 = new Array({foreach from=$fjsore2 item=child name=myarray}
				{if $smarty.foreach.myarray.last}"{$child[50]}"
								{else}"{$child[50]}",{/if}{/foreach});
				var myArray8 = new Array({foreach from=$meiore2 item=child name=myarray}
				{if $smarty.foreach.myarray.last}"{$child[50]}"
								{else}"{$child[50]}",{/if}{/foreach});	


				{literal}
				var str1 = "#child"+red;
				var str2;var str3;var str4;var str5;
				for(var i=0;i<myArray.length;i++)
				{
				 str2=str2+"<option value='"+myArray[i]+"'>"+myArray[i]+",已有"+myArray5[i]+"个</option>";
				}
				for(var i=0;i<myArray2.length;i++)
				{
				 str3=str3+"<option value='"+myArray2[i]+"'>"+myArray2[i]+",已有"+myArray6[i]+"个</option>";
				}
				for(var i=0;i<myArray3.length;i++)
				{
				 str4=str4+"<option value='"+myArray3[i]+"'>"+myArray3[i]+",已有"+myArray7[i]+"个</option>";
				}
				for(var i=0;i<myArray4.length;i++)
				{
				 str5=str5+"<option value='"+myArray4[i]+"'>"+myArray4[i]+",已有"+myArray8[i]+"个</option>";
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
		{/literal}		
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
							<option value="{$o[0]}">{$o[0]}</option>
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
							<option value="{$o[0]}">{$o[0]}</option>
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
					<option value="嘉峪关市">嘉峪关市，已有{$r[0][4]}个</option>
					<option value="金昌市">金昌市，已有{$r[1][4]}个</option>
					<option value="白银市">白银市，已有{$r[2][4]}个</option>
					<option value="天水市">天水市，已有{$r[3][4]}个</option>
					<option value="武威市">武威市，已有{$r[4][4]}个</option>
					<option value="张掖市">张掖市，已有{$r[5][4]}个</option>
					<option value="平凉市">平凉市，已有{$r[6][4]}个</option>
					<option value="酒泉市">酒泉市，已有{$r[7][4]}个</option>
					<option value="庆阳市">庆阳市，已有{$r[8][4]}个</option>
					<option value="定西市">定西市，已有{$r[9][4]}个</option>
					<option value="陇南市">陇南市，已有{$r[10][4]}个</option>
					<option value="临夏回族自治州">临夏回族自治州，已有{$r[11][4]}个</option>
					<option value="甘南藏族自治州">甘南藏族自治州，已有{$r[12][4]}个</option>
					<option value="兰州市">兰州市，已有{$r[13][4]}个</option>
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
			<td width="20%" class='tdhead'>甘肃省矿山总数</td><td><input name="mineAll" value="{$mArray[0]->mineAll}">个</td>
			<td width="20%" class='tdhead'>甘肃省绿色矿山数</td><td>{$totalnumber}个</td>
		</tr>
		<tr>
			<td width="20%" class='tdhead'>甘肃省矿山环境恢复治理率</td>
			<td>
			<!-- <input name="environment"  value="{$mArray[0]->environment}">%, -->
			目前已有{$environment}%</td>
			<td width="20%" class='tdhead'>甘肃省土地复垦率</td><td>目前已有{$landrate}%</td>
			<!-- <td width="20%" class='tdhead'>甘肃省土地复垦面积</td><td><input name="land" value="{$mArray[0]->land}">平方公里</td> -->
		</tr>
		<!-- <tr>
			<td width="20%" class='tdhead'>甘肃省土地复垦率</td><td><input name="landrate" value="{$mArray[0]->landrate}">%,目前已有{$landrate}%</td>
		</tr> -->
		
	</table>

	<input type="submit" value="修改" />
	<!--<input type="button" onclick="location.href='/ZB/ListTruckPlanZB'" value="返回" />-->

</form>
		   
      
