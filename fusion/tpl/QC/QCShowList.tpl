
<script language="javascript" type="text/javascript">
					
					
				
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
</script>

                	<div class='tablebox'>
		<form name="form" action="/QC/QCShowSearch" method="post">
                         日期：<input type="text" name="date1" class="datepicker" value = "{$date1}"/>
			 到<input type="text" name="date2" class="datepicker" value = "{$date2}"/>
	                 客户名称：<input type="text" name="company"  value = "{$company}"/>
			 <p>
			   车牌号：<input type="text" name="truck"  value = "{$truck}"/>
			 任务状态：<select  name="state">
		                    <option value="1">全部</option>
				    <option value="2">未执行</option>
				    <option value="3">正在执行</option>
				    <option value="4">已完成</option>
			            </select>
			油品： <select id="1" name="sortID" onchange="getchild(this.id)">
						        <option value=""></option>
							{foreach from=$sortID item=sort name=sortID}
						        <option value="{$sort.id}">{$sort.oilType}</option>
						        {/foreach}  
						</select>
						
                                                <select id="child1" name="childID">
				                        <option value=""></option>
						        {foreach from=$childID item=child}
						        {if $child.oilType.id eq $sortID[0].id}
							<option value="{$child.id}">{$child.oilModel}</option>{/if}
							{/foreach}								

		
						</select>
			
                       <input type="submit" value="查询" />
		</form>
		<p>
				<table class="listView" align="center">
                            <thead>
                            	<tr>
				<th>车牌号</th>
			        <th>提单号</th>
                                <th>客户名称</th>
				<th>客户类型</th>
                                <th>油品</th>
				
				<th>状态</th>
                                <th>查看</th>
                                </tr>
                            </thead>
                            {foreach from=$taskArray item=task}
                                <tr>
			        <td>{$task.plan.truckNumber}</td>
			        <td>{$task.planKey}</a></td>
                                <td>{$task.customer.name}</a></td>
				<td>{$task.customer.type}</a></td>
                                <td>{$task.oilModel.oilType}{$task.oilModel.oilModel}</td>
				<td>{$task.state}</a></td>
				
				<td><a href="/QC/QCShowAll/{$task.id}"  title="查看销售计划">查看</a></td>
                                </tr>
                           
				{foreachelse}
				<tr>
				<td align="center" colspan="7">没有记录</td>
				</tr>
			     {/foreach}
                        </table>	
		
		 <input type="button" onclick="location.href='{$downloadFile}'" value="导出报表" />
		   
                    </div>