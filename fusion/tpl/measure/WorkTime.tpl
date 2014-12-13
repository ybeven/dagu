销售班次
					<div class='tablebox'>
			
			<form name="form" action="/measure/saveWorkTime" method="post">
                    	<table class="listView" align="center">
                            <thead>
                            	<tr>
                                <th>班次</th>
                                <th>开始时间</th>
                                <th>结束时间</th>
                                </tr>
                            </thead>
                                <tr>
                                <td>{$time1.name}</td>
                                <td><input type="text" name="startTime1" value="{$time1.startTime}" /></td>
				<td><input type="text" name="overTime1" value="{$time1.overTime}" /></td>
				
                                </tr>
				<tr>
                                <td>{$time2.name}</td>
                                <td><input type="text" name="startTime2" value="{$time2.startTime}" /></td>
				<td><input type="text" name="overTime2" value="{$time2.overTime}" /></td>
				
                                </tr>
				<tr>
                                <td>{$time3.name}</td>
                                <td><input type="text" name="startTime3" value="{$time3.startTime}" /></td>
				<td><input type="text" name="overTime3" value="{$time3.overTime}" /></td>
                                </tr>
                           
				
                        </table>
			<input type="submit" value="保存修改" />
			<input type="button" onclick="location.href='/start'" value="返回" />
			</form>
                    </div>