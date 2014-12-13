


                	<div class='tablebox'>
		<form name="form" action="/QC/QCShoudongSearchOver" method="post">
                      车牌号：<input type="text" name="trucknumber" value = "{$trucknumber}"/>
		      日期：<input type="text" name="plandate" class="datepicker" value = "{$plandate}"/>
                       <input type="submit" value="查询" />
		</form>
		<p>
			<table class="listView" align="center">
                            <thead>
                            	<tr>
                                <th>车牌号</th>
			        <th>卡号</th>
                                <th>客户名称</th>
				<th>客户类型</th>
                                <th>油品</th>
				<th>联系人</th>
				<th>联系方式</th>
				<th>状态</th>
                                <th>查看</th>
                                </tr>
                            </thead>
                            {foreach from=$taskArray item=plan}
			        {foreach from = $plan[1] item = task}
                                <tr>
                                 <td>{$plan[0]}</td>
			        <td>{$task.cardId}</td>
                                <td>{$task.customer.name}</td>
				<td>{$task.customer.type}</td>
                                <td>{$task.oilModel.oilType}{$task.oilModel.oilModel}</td>
				<td>{$task.customer.contactPerson}</td>
				<td>{$task.customer.contact}</td>
				<td>{$task.state}</td>
				<td><a href="/QC/QCShoudongAllOver/{$task.id}"  title="查看销售计划">查看</a></td>
                                </tr>
                                 {/foreach}
			      {foreachelse}
				<tr>
				<td align="center" colspan="9">没有记录</td>
				</tr>
			     {/foreach}
                        </table>	
		
		 
		   
                    </div>