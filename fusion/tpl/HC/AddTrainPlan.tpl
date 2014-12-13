<!--<div class='tablebox'>
	 <script>
		  var mark=1;
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
		  {literal}
			   function add()
			   {
					mark=mark+1;
		  {/literal}
					
				        var str="<tr><td><table class='formView' align='center'>"
					       +"<tr><td class='tdhead'>结算单位</td><td colspan= 6><textarea cols='50' rows='1' name='company[]' ></textarea></td>"
					       +"<td><input type='button' onclick='remove(this);' value='删除该任务'/></td></tr>"
					       +"<tr><td class='tdhead'>品名</td><td><select id='"+mark+"' name='sortID[]' onchange='getchild(this.id)'>"
					       +"<option value='1'></option>{foreach from=$sortID item=sort name=sortID}<option value='{$sort.id}'>{$sort.oilType}</option>{/foreach}</select>"
					       +"<select id='child"+mark+"' name='childID[]'><option value='1'></option>"
					       +"{foreach from=$childID item=child}{if $child.oilType.id eq $sortID[0].id}<option value='{$child.id}'>{$child.oilModel}</option>{/if}{/foreach}</td>"
					       +"<td class='tdhead'>数量(吨)</td><td><textarea cols='15' rows='1' name='weight[]' ></textarea></td>"
					       +"<td class='tdhead' >车数</td><td><textarea cols='15' rows='1'  name='train_number[]' ></textarea></td>"
					       +"<td class='tdhead' >到站</td><td><textarea cols='15' rows='1'  name='station[]' ></textarea></td></tr>"
					       +"<tr><td class='tdhead' >专用线</td><td><textarea cols='15' rows='1'  name='specialline[]'></textarea></td>"
					       +"<td class='tdhead' >收货人</td><td><textarea cols='15' rows='1' name='consignee[]' ></textarea></td>"
					       +"<td class='tdhead' >备注</td><td colspan= 3><textarea cols='15' rows='1'  name='remarks[]' ></textarea></td></tr></table></td></tr>";
					$("#plan_list").append(str);
					UpdateJqueryUI();
		  {literal}
			   }
			   function remove(red)
			   {
			   $(red).parent().parent().parent().remove();
			   }
		  {/literal}
	 </script>
    

         
		<input type="button" onclick="add();" value="添加任务项" />
                      <p>
	  <form name="form" action="/HC/SaveTrainPlan" method="post" >
				<table  align="center" id="plan_list">
				<tr><td>				
				       <table class="formView" align="center">
				       <tr>
				           <td class='tdhead'>结算单位</td><td colspan= 6><textarea cols="50" rows="1"  name="company[]" ></textarea></td>
					   <td><input type="button" onclick="remove(this);" value="删除该任务"/></td>
				       </tr>
				        <tr>
                                               
						 <td class='tdhead'>品名</td>
						 <td>
							  <select id="1" name="sortID[]" onchange="getchild(this.id)">
							       <option value="1"></option>
								   {foreach from=$sortID item=sort name=sortID}
										<option value="{$sort.id}">{$sort.oilType}</option>
								   {/foreach}	   
							  </select>
							  <select id="child1" name="childID[]">
							       <option value="1"></option>
							       {foreach from=$childID item=child}
										{if $child.oilType.id eq $sortID[0].id}
											 <option value="{$child.id}">{$child.oilModel}</option>
										{/if}
								   {/foreach}
							  </select>
						 </td>
						
						 
						 <td class='tdhead'>数量(吨)</td><td><textarea cols="15" rows="1"  name="weight[]" ></textarea></td>
						 <td class='tdhead' >车数</td><td><textarea cols="15" rows="1"  name="train_number[]" ></textarea></td>
						 
						 <td class='tdhead' >到站</td><td><textarea cols="15" rows="1"  name="station[]" ></textarea></td>
				    </tr>
					<tr>
						 <td class='tdhead' >专用线</td><td><textarea cols="15" rows="1"  name="specialline[]" ></textarea></td>
						 <td class='tdhead' >收货人</td><td><textarea cols="15" rows="1"  name="consignee[]" ></textarea></td>
						 <td class='tdhead' >备注</td><td colspan= 3><textarea cols="15" rows="1"  name="remarks[]" ></textarea></td>
				      </tr>

				     
				       </table>
				       </td>
					</tr>
				</table>
		  <table class="formView" align="center" width="90%">
			   <tr>
					<td class='tdhead'>订单号</td>
					<td><input type="text" class="datepicker" name="MainapplyId" value="{$MainapplyId}"/></td>
			   </tr>
			   <tr>
					<td class='tdhead'>日期</td>
					<td><input type="text" class="datepicker" name="applyTime" value="{$date}"/></td>
			   </tr>
			   <tr>
					<td class='tdhead'>经办人</td>
					<td><input type="text" name="applyAnnt"/></td>
			   </tr>
			   <tr>
					<td class='tdhead'>销售部副经理</td>
					<td><input type="text" name="salesvicemanager"/></td>
			   </tr>
			   <tr>
					<td class='tdhead'>销售部经理</td>
					<td><input type="text" name="salesmanager"/></td>
			   </tr>
			   <tr>
					<td class='tdhead'>能源公司总经理</td>
					<td><input type="text" name="energymanager"/></td>
			   </tr>
          </table>
		  <p>
			   <input type="submit" value="保存"/>
			   <input type="button" onclick="location.href='/HC/ListTrainMainApply'" value="返回" />
	 </form>
	 
</div>-->

        <!-- END Browser History required section -->  
		    
		<iframe src="/bin-debug/gansu.html" frameBorder="0" width="950" scrolling="no" height="1000"></iframe>