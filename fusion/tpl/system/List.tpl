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
				{literal}
				var str1 = "#child"+red;
				var str2;var str3;var str4;var str5;var str6;
				for(var i=0;i<myArray.length;i++)
				{
				 str2=str2+"<option value='"+myArray[i]+"'>"+myArray[i]+"</option>";
				}
				for(var i=0;i<myArray2.length;i++)
				{
				 str3=str3+"<option value='"+myArray2[i]+"'>"+myArray2[i]+"</option>";
				}
				for(var i=0;i<myArray3.length;i++)
				{
				 str4=str4+"<option value='"+myArray3[i]+"'>"+myArray3[i]+"</option>";
				}

				 str5=str5+"<option value='煤矿'>煤矿</option>";
				srt6="<option value=''>请选择</option><option value='选矿回收率'>原煤入选率</option><option value='开采回采率'>采区回采率</option><option value='综合利用率'>综合利用率</option>";
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
							$("#lv").append("<option value=''>请选择</option><option value='选矿回收率'>原煤入选率</option><option value='开采回采率'>采区回采率</option><option value='综合利用率'>综合利用率</option>");
						}
						
						
					
				}
				
		{/literal}		
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
<form name="form" action="/system/Save/{$orename}/{$lvtype}" method="post" width="100%">
	<table class="formView formView_3lv" align="center" width="100%">
	     <tr>
		 <td colspan=7> {$orename}{if $orename=='煤矿'}{if $lvtype=='开采回采率'}采区回采率{/if}{if $lvtype=='选矿回收率'}原煤入选率{/if}{else} {$lvtype}{/if} <input type="submit"  value="保存修改" /></td>
		 </tr>
		 {if $biaotouArray[0]!=""}
         <tr>
			 <td class='tdhead'> <input style="background-color:#c9d7fc" value="{$biaotouArray[1]}" name="subclass_name1"></td>
		     <td class='tdhead'> <input style="background-color:#c9d7fc" value="{$biaotouArray[2]}" name="subclass_name2"></td>
		     <td class='tdhead'> <input style="background-color:#c9d7fc" value="{$biaotouArray[3]}" name="subclass_name3"></td>
		     <td class='tdhead'> <input style="background-color:#c9d7fc" value="{$biaotouArray[4]}" name="subclass_name4"></td>
			 <td class='tdhead'> <input style="background-color:#c9d7fc" value="{$biaotouArray[5]}" name="subclass_name5"></td>
			 <td class='tdhead'> <input style="background-color:#c9d7fc" value="{$biaotouArray[6]}" name="subclass_name6"></td>
			 <td class='tdhead'> 标准值(%)</td>
		 </tr>
		 {/if}
		 {foreach from=$neirongArray item=e}
         <tr>
		     <td style="display:none"><input value="{$e[0]}" name="id[]"></td>
			 <td class='tdhead'> <input value="{$e[1]}" name="subclass1[]"></td>
		     <td class='tdhead'> <input value="{$e[2]}" name="subclass2[]"></td>
		     <td class='tdhead'> <input value="{$e[3]}" name="subclass3[]"></td>
		     <td class='tdhead'> <input value="{$e[4]}" name="subclass4[]"></td>
			 <td class='tdhead'> <input value="{$e[5]}" name="subclass5[]"></td>
			 <td class='tdhead'> <input value="{$e[6]}" name="subclass6[]"></td>
			 <td class='tdhead'> <input value="{$e[7]}" name="standardvalues[]"></td>
		 </tr>
		 {/foreach}
		 </table>
	</form>
	<form name="form" action="/system/Add/{$orename}/{$lvtype}" method="post" width="100%">
	<table class="formView formView_3lv" align="center" width="100%">
		 {if $orename !=""}
		 <tr>
		 <td colspan=7> 新增 {$orename} {if $orename=='煤矿'}{if $lvtype=='开采回采率'}采区回采率{/if}{if $lvtype=='选矿回收率'}原煤入选率{/if}{else} {$lvtype}{/if}标准值<input type="submit"  value="新增" /></td>
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
		 {/if}
	</table>
	
</form>
</div>
