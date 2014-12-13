<div class='tablebox'>
	 <script>
	 {literal}
                                function firm() 
                                {
                                     if(confirm("确认删除？")) 
                                     {
					{/literal}	
                                           location.href="/HC/DeleteTrainPlan/{$mainApplyId}";
				        {literal}
                                     } 
                                }
				{/literal}
		  {literal}
			   function getchild(red)
			   {
		  {/literal}
			   var myArray = new Array({foreach from=$childID item=child name=myarray}
					{if $smarty.foreach.myarray.last}"{$child.id}","{$child.oilModel}","{$child.oilTypeId}"
					{else}"{$child.id}","{$child.oilModel}","{$child.oilTypeId}",{/if}{/foreach});
			   var str2 ="#"+red;
			   var str1 = "#child"+red;
		  {literal}
			   $(str1).html(" ");
			   for(var i=0;i<myArray.length;i+=3)
			   {
					if(myArray[i+2]==$(str2).val())
					{
						 var stg="<option value='"+myArray[i]+"'>"+myArray[i+1]+"</option>";
						 $(str1).append(stg);
					}
			   }
			   }
		  {/literal}
		 
		 
	 </script>
	 铁路货运请车申请表
     <form name="form" action="/HC/UpdateTrainPlan/{$mainApplyId}" method="post">
		  
          
				<table class="listView" align="center" id="plan_list">
				    {foreach from=$detailApplyArray item=i}
				<tr><td>				
				       <table class="formView" align="center">
				       <tr>
				           <td class='tdhead'>结算单位</td><td colspan= 6><textarea cols="50" rows="1"  name="company[]" >{$i.company}</textarea></td>
					   <td><input type="button" onclick="remove(this);" value="删除该任务"/></td>
				       </tr>
				        <tr>
                                               
						 <td class='tdhead'>品名</td>
						 <td>
							  <select id="{$i}" name="sortID[]" onchange="getchild(this.id)">
							       <option value="{$i.oilModel.oilTypeId}">{$i.oilModel.oilType}</option>
								   {foreach from=$sortID item=sort name=sortID}
										<option value="{$sort.id}">{$sort.oilType}</option>
								   {/foreach}	   
							  </select>
							  <select id="child{$i}" name="childID[]">
							        <option value="{$i.oilModel.id}">{$i.oilModel.oilModel}</option>
							       {foreach from=$childID item=child}
										{if $child.oilType.id eq $sortID[0].id}
											 <option value="{$child.id}">{$child.oilModel}</option>
										{/if}
								   {/foreach}
							  </select>
						 </td>
						
						 
						 <td class='tdhead'>数量(吨)</td><td><textarea cols="15" rows="1"  name="weight[]" >{$i.weight}</textarea></td>
						 <td class='tdhead' >车数</td><td><textarea cols="15" rows="1"  name="train_number[]" >{$i.trainNumber}</textarea></td>
						 
						 <td class='tdhead' >到站</td><td><textarea cols="15" rows="1"  name="station[]" >{$i.station}</textarea></td>
				    </tr>
					<tr>
						 <td class='tdhead' >专用线</td><td><textarea cols="15" rows="1"  name="specialline[]" >{$i.specialline}</textarea></td>
						 <td class='tdhead' >收货人</td><td><textarea cols="15" rows="1"  name="consignee[]" >{$i.consignee}</textarea></td>
						 <td class='tdhead' >备注</td><td colspan= 3><textarea cols="15" rows="1"  name="remarks[]" >{$i.remarks}</textarea></td>
				      </tr>
					<tr>
					     <td colspan= 8><input type="button" onclick="location.href='/HC/AddTrainInfo/{$i.id}'" value="车号单" />
						      <input type="button" onclick="location.href='/HC/AddTrainDetails/{$i.id}'" value="计量单" />
						      <input type="button" onclick="location.href='/HC/WriteCardInfo/{$i.id}'" value="分配卡" />
					     </td>
				      </tr>

				     
				       </table>
				       </td>
					</tr>
				{/foreach}
				</table>
		  <table class="formView" align="center" width="90%">
			   <tr>
					<td class='tdhead'>订单号</td>
					<td><input type="text" value="{$RecordId}" name="RecordId"/></td>
			   </tr>
			   <tr>
					<td class='tdhead'>日期</td>
					<td><input type="text" value="{$applyTime}" name="applyTime"/></td>
			   </tr>
			   <tr>
					<td class='tdhead'>经办人</td>
					<td><input type="text" value="{$applyAnnt}" name="applyAnnt"/></td>
			   </tr>
			   <tr>
					<td class='tdhead'>销售部副经理</td>
					<td><input type="text" value="{$salesvicemanager}" name="salesvicemanager"/></td>
			   </tr>
			   <tr>
					<td class='tdhead'>销售部经理</td>
					<td><input type="text" value="{$salesmanager}" name="salesmanager"/></td>
			   </tr>
			   <tr>
					<td class='tdhead'>能源公司总经理</td>
					<td><input type="text" value="{$energymanager}" name="energymanager"/></td>
			   </tr>
                  </table>
		  <p>
			   <input type="submit" value="修改" />
			     <input type="button"  value="删除" onclick="firm()"/>
		  <input type="button" onclick="location.href='/HC/ListTrainMainApply'" value="返回" />
			   
	 </form>
		
</div>
