

查看报表
                	<div class='tablebox'>
		<form name="form" action="/TABLE/QCTableJSsearchBaobiao" method="post">
                         日期：<input type="text" name="date" class="datepicker" value = "{$date}"/>
	              
                       <input type="submit" value="查询" />
		</form>
		<p>
				<table class="listView" align="center">
                            <thead>
                            	<tr>
                                <th>提单号</th>
                                <th>客户名称</th>
				<th>客户类型</th>
                                <th>油品</th>
				<th>联系人</th>
				<th>联系方式</th>
                                <th>查看</th>
                                </tr>
                            </thead>
                            {foreach from=$defArray item=devDef}
                            
                                <tr>
                                <td>{$devDef.planKey}</a></td>
                                <td>{$devDef.customer.name}</a></td>
				<td>{$devDef.customer.type}</a></td>
                                <td>{$devDef.oilModel.oilType}{$devDef.oilModel.oilModel}</td>
				<td>{$devDef.customer.contactPerson}</a></td>
				<td>{$devDef.customer.contact}</a></td>
				<td><a href="/TABLE/ShowQCJS/{$devDef.id}"  title="查看销售计划">查看</a></td>
                                </tr>
                           
				{foreachelse}
				<tr>
				<td align="center" colspan="7">没有记录</td>
				</tr>
				{/foreach}
                        </table>	
					<input type="button" onclick="location.href='{$downloadFile}'" value="导出报表" />
		<!--
		                        <a href="/ZB/DeleteTruckPlanZB/{$plan.id}"><input type="submit" value="删除计划" /></a>
					<a href="/ZB/ListTruckPlanZB"><input type="reset" value="返回" /></a>
		  -->
		 
		   
                    </div>