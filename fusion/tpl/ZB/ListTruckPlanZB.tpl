
<div class='tablebox'>

<form name="form" action="/ZB/ListSearchZB" method="post">
                         日期：<input type="text" name="date1" class="datepicker" value = "{$date1}"/>
			   车牌号：<input type="text" name="trucknumber"  value = "{$trucknumber}"/>
			 任务状态：<select  name="state">
		                    <option value="1">全部</option>
				    <option value="2">未执行</option>
				    <option value="3">正在执行</option>
				    <option value="4">已完成</option>
			            </select>
                       <input type="submit" value="查询" />
		</form>
  
    <table class="listView" align="center">
                            <thead>
                            	<tr>
			        <th>车牌号</th>
				<th>任务数</th>
				<th>状态</th>
				<th>班次</th>
				<th>添加时间</th>
                                <th>查看</th>
                                </tr>
                            </thead>
                            {foreach from=$defArray item=task}
                                <tr>
			        <td>{$task.truckNumber}</td>
                                <td>{$task.cardCount}</td>
				<td>{$task.state}</td>
				<td>{$task.work.name}</td>
				<td>{$task.operateTime}</td>
                                
				<td><a href="/ZB/ShowTruckPlanZB/{$task.id}"  title="查看销售计划">查看</a></td>
                                </tr>
                           
				{foreachelse}
				<tr>
				<td align="center" colspan="7">没有记录</td>
				</tr>
			     {/foreach}
                        </table>			
			
				
		
		  
                    	
			
</div>