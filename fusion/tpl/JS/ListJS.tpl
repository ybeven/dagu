


                	<div class='tablebox'>
		<form name="form" action="/JS/SearchJS" method="post">
                      车牌号：<input type="text" name="trucknumber" value = "{$trucknumber}"/>
		      任务状态：<select  name="state">
		                    <option value="1">全部</option>
				    <option value="2">正在执行</option>
				    <option value="3">已完成</option>
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
				
                                <th>油品</th>
				<th>付款方式</th>
				<th>状态</th>
                                <th>查看</th>
                                </tr>
                            </thead>
                            {foreach from=$taskArray item=plan}
			        {foreach from = $plan[1] item = task}
                                <tr>
                                 <td>{$plan[0]}</a></td>
			        <td>{$task.planKey}</a></td>
                                <td>{$task.customer.name}</a></td>
				<td>{$task.oilModel.oilType}{$task.oilModel.oilModel}</td>
				<td>{$task.payType}</td>
				<td>{$task.state}</a></td>
				<td><a href="/JS/QCShowAll/{$task.id}"  title="查看销售计划">查看</a></td>
                                </tr>
                                 {/foreach}
				{foreachelse}
				<tr>
				<td align="center" colspan="7">没有记录</td>
				</tr>
			     {/foreach}
                        </table>	
		
		 
		   
                    </div>