

查看报表
                	<div class='tablebox'>
		<form name="form" action="/HC/HCTablesearch" method="post">
                         日期：<input type="text" name="date" class="datepicker" value = "{$date}"/>
                       <input type="submit" value="查询" />
		</form>
		<p>
				<table class="listView" align="center" width="90%">
			   <thead>
					<tr>
                        <th class='tdhead'>日期</th>
                        <th class='tdhead'>经办人</th>
                        <th class='tdhead'>结算单位</th>
		        <th class='tdhead'>操作</th>
                    </tr>
			   </thead>
			   {foreach from=$mainApplyArray item=i}
               <tr>
					<td>{$i[1]}</td>
					<td>{$i[2]}</td>
					<td>{$i[3]}</td>
					<td>
						 <a href="/HC/HCTableXD/{$i[0]}" />查看详单</a>
						 <a href="/HC/HCTableTZ/{$i[0]}" />查看通知单</a>
						 
					</td>

			   </tr>
			   {foreachelse}
					<tr>
						 <td align="center" colspan="4">没有记录</td>
					</tr>
			   {/foreach}
          </table>
		<!--
		                        <a href="/ZB/DeleteTruckPlanZB/{$plan.id}"><input type="submit" value="删除计划" /></a>
					<a href="/ZB/ListTruckPlanZB"><input type="reset" value="返回" /></a>
		  -->
		 
		   
                    </div>