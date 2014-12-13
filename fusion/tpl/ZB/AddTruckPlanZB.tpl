
               
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
								//var stg="<option value='"+myArray[i]+"'>"+red+"</option>";
								var stg="<option value='"+myArray[i]+"'>"+myArray[i+1]+"</option>";
								$(str1).append(stg);
							}
					}
					}
					{/literal}
		{literal}
			   function add()
			   {
				mark=mark+1; 
		{/literal}
		                
				var str="<tr><td><table class='formView' align='center'><tr><td colspan = 7>任务"+mark+"</td>"
				        +"<td><input type='button' onclick='remove(this);' value='删除该任务'/></td></tr>"
				        +"<tr><td class='tdhead'>提单号</td><td><textarea cols='15' rows='1'  name='plankey[]'></textarea></td>"
				        +"<td class='tdhead'>客户名称</td><td colspan= 5><textarea cols='50' rows='1'  name='customer[]'></textarea></td></tr>"
                                        +"<tr><td class='tdhead'>联系人</td><td><input name='contect[]'/></textarea></td>"
					+"<td class='tdhead'>联系方式</td><td><input name='contectway[]'/></td>"
					+"<td class='tdhead'>客户类型</td><td><select name='customerstyle[]'><option>大客户</option><option>散户</option></select></td>"
					+"<td class='tdhead'>付款方式</td><td><select name='paystyle[]'><option>现金</option><option>刷卡</option><option>打款</option>"
					+"<option>顶账</option><option>挂账</option><option>顶油款</option><option>其他</option></select></td></tr>"
					+"<tr><td class='tdhead'>油品</td><td  colspan= 3><select id='"+mark+"' name='sortID[]' onchange='getchild(this.id)'><option value='1'></option>"
					+"{foreach from=$sortID item=sort name=sortID}<option value='{$sort.id}'>{$sort.oilType}</option>{/foreach}</select>"
					+"<select id='child"+mark+"' name='childID[]'><option value='1'></option>"
					+"{foreach from=$childID item=child}{if $child.oilType.id eq $sortID[0].id}<option value='{$child.id}'>{$child.oilModel}</option>{/if}{/foreach}</td>"
					+" <td class='tdhead' >单价(元)</td><td><textarea cols='15' rows='1'  name='price[]'></textarea></td>"
					+"<td class='tdhead'>净重(吨)</td><td><textarea cols='15' rows='1'  name='weight[]'></textarea></td></tr>"
                                        +"<tr><td class='tdhead'>备注</td><td colspan=7><textarea cols='50' rows='1'  name='remarks[]'></textarea></td></tr></table></td></tr>";
					      
		{literal}
					$("#plan_list").append(str);
					//UpdateJqueryUI();
					
		
			   }
			   function remove(red)
			   {
			   $(red).parent().parent().parent().remove();
			   }
			   {/literal}
			   {literal}
$(document).ready(function(){
  
  $('#superTable').toSuperTable({
	width: "900px",
	height:"50px",
	//fixedCols: 1,
	headerRows: 1
  });

});
{/literal}
					</script>
                    <form name="form" action="/ZB/AddTruckPlanZBTJ" method="post">
				<table align  = "center" id="abc">
				<tr>
						<td align="left">车牌号：<input type="varchar(20)" name="trucknumber" value=""/></td>
						<td align="right"><input type="button" onclick="add();" value="增加任务项"/></td>
				</tr>
				</table>
				
				<table  align="center" id="plan_list">
				<tr><td>				
				       <table class="formView" align="center">
				       <tr><td colspan = 7>任务1</td>
						<td><input type="button" onclick="remove(this);" value="删除该任务"/></td></tr>
				       <tr>
						<td class='tdhead'>提单号</td><td><textarea cols="15" rows="1"  name="plankey[]">{$MainapplyId}</textarea></td>
				           <td class='tdhead'>客户名称</td><td colspan= 5><textarea cols="50" rows="1"  name="customer[]"></textarea></td>
				       </tr>
                                
				       <tr>
				
                                                <td class='tdhead'>联系人</td><td><input name="contect[]"/></td>
						 <td class='tdhead'>联系方式</td><td><input name="contectway[]"/></td>
						  <td class='tdhead'>客户类型</td>
						<td><select name="customerstyle[]"><option>大客户</option><option>散户</option>	</select>
						</td>
						<td class='tdhead'>付款方式</td>
						<td>
								<select name="paystyle[]">
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
						<td  colspan= 3>
					        <select id="1" name="sortID[]" onchange="getchild(this.id)">
						        <option value="{$oilType}"></option>
							{foreach from=$sortID item=sort name=sortID}
						        <option value="{$sort.id}">{$sort.oilType}</option>
						        {/foreach}  
						</select>
						
                                                <select id="child1" name="childID[]">
				                        <option value="1"></option>
						        {foreach from=$childID item=child}
						        {if $child.oilType.id eq $sortID[0].id}
							<option value="{$child.id}">{$child.oilModel}</option>{/if}
							{/foreach}								

		
						</select>
						</td>
						 <td class='tdhead' >单价(元)</td><td><textarea cols="15" rows="1"  name="price[]"></textarea></td>
						 <td class='tdhead'>净重(吨)</td><td><textarea cols="15" rows="1"  name="weight[]"></textarea></td>
						
				      </tr>

				      <tr>
                                                <td class='tdhead'>备注</td>
						<td colspan=7>
								<textarea cols="60" rows="1"  name="remarks[]"></textarea>
						</td>
				      </tr>
				       </table>
				       </td>
					</tr>
				
				</table>
				

				
				<input type="submit" value="提交" />
				 <input type="button" onclick="location.href='/ZB/ListTruckPlanZB'" value="返回" />
		     </form>
		   
      
