<script language="JavaScript" type="text/javaScript">
                                {literal}
                                function firm() 
                                {
                                     if(confirm("确认删除？")) 
                                     {
					{/literal}	
                                           location.href="/ZB/DeleteTruckPlanZB/{$plan.id}";
				        {literal}
                                     } 
                                }
				{/literal}
                                </script>
					<script language="javascript" type="text/javascript">
					var mark = 1;
					{literal}
					function getchild(red) {
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
		
		{literal}
$(document).ready(function(){
  
  $('#superTable').toSuperTable({
	width: "900px",
	height:"300px",
	//fixedCols: 1,
	headerRows: 1
  });

});
{/literal}
</script>
<div class='tablebox'>
    
   
	
   
     <form name="form" action="/ZB/UpdateTruckPlanZB/{$plan.id}" method="post" width="1000px">
				<table >
				<tr>
						<td width="400px">车牌号：<input type="varchar(20)" name="trucknumber" value="{$plan.truckNumber}"/></td>
						<td width="400px">状态：{$plan.state}</td>
						{if $plan.state <> "正在执行"}
						
						{/if}
				</tr>
				</table>
				
				<table align="center" id="plan_list">
			        {foreach from=$task item=i}
				<tr>
                    <td>				
				       <table class="formView" align="center">
				       <tr><td colspan = 8>任务</td>
						</tr>
				       <tr>
						<td class='tdhead'>提单号</td><td><textarea cols="15" rows="1"  name="plankey[]" >{$i.planKey}</textarea></td>
				           <td class='tdhead'>客户名称</td><td colspan= 5><textarea cols="50" rows="1"  name="customer[]" >{$i.customer.name}</textarea></td>
				       </tr>
                                
				       <tr>
				
                                                <td class='tdhead'>联系人</td><td><input name="contect[]" value="{$i.customer.contactPerson}"/></td>
						 <td class='tdhead'>联系方式</td><td><input name="contectway[]" value="{$i.customer.contact}"/></td>
						  <td class='tdhead'>客户类型</td>
						<td><select name="customerstyle[]"><option>{$i.customer.type}</option><option>大客户</option><option>散户</option>	</select>
						</td>
						<td class='tdhead'>付款方式</td>
						<td>
								<select name="paystyle[]">
									<option>{$i.payType}</option>
										<option>现金</option>
										<option>刷卡</option>
                                                                                <option>打款</option>
										<option>顶账</option>
										<option>挂账</option>
										<option>顶油款</option>
										<option>其他</option>
								</select>
						</td>
				       </tr>
				
				        <tr>
                                               
						 <td class='tdhead'>油品</td>
						<td colspan= 3>
					        <select id="1" name="sortID[]" onchange="getchild(this.id)">
						        <option value="{$i.oilType.id}">{$i.oilType.oilType}</option>
							{foreach from=$sortID item=sort name=sortID}
						        <option value="{$sort.id}">{$sort.oilType}</option>
						        {/foreach}  
						</select>
						
                                                <select id="child1" name="childID[]">
				                        <option value="{$i.oilModel.id}">{$i.oilModel.oilModel}</option>
						        {foreach from=$childID item=child}
						        {if $child.oilType.id eq $sortID[0].id}
							<option value="{$child.id}">{$child.oilModel}</option>{/if}
							{/foreach}								

		
						</select>
						</td>
						 <td class='tdhead' >单价(元)</td><td><textarea cols="15" rows="1"  name="price[]" >{$i.unitPrice}</textarea></td>
						 <td class='tdhead'>净重(吨)</td><td><textarea cols="15" rows="1"  name="weight[]" >{$i.planWeight}</textarea></td>
						
				      </tr>

				      <tr>
                                                <td class='tdhead'>备注</td>
						<td colspan=7>
								<textarea cols="50" rows="1"  name="remarks[]">{$i.planRemarks}</textarea>
						</td>
				      </tr>
				       </table>
                    </td>
                </tr>
				{/foreach}
				</table>
					
				<p>
				
			
				<input type="submit" value="修改计划"  /><input name = "" type="text" id="" value="{$weight1}"  readonly = true style="background-color:transparent;"/>
				
				<input type="button" value="删除计划" onclick="firm()" />
				
				
				
				
				
				
				
		
		     </form>
                   
                    	
			
</div>