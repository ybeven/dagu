<div class='tablebox'>
      
          <table class="listView" align="center">
			   <tr>
					<td>通知单位</td>
					<td>{$mainApplyArray[0].company}</td>
					<td>日期</td>
					<td>{$mainApplyArray[0].noticeTime}</td>
			  
			   </tr>
               <tr>
                    <th>品名</th>
                    <th>节数</th>
                    <th>到站</th>
                    <th>单位</th>
               </tr>
			   {foreach from=$detailApplyArray item=detailApply}
                    <tr>   
                         <td>{$detailApply.oilModelId}</td>
                         <td>{$detailApply.trainNumber}</td>
						 <td>{$detailApply.station}</td>
                         <td>{$detailApply.company}</td>
                    </tr>           
			   {foreachelse}
					<tr>
						 <td align="center" colspan="7">没有记录</td>
					</tr>
			   {/foreach}
			   <tr>
					<td>质量要求</td>
					<td colspan="3">{$mainApplyArray[0].qualityrequire}</td>
			   </tr>
			   <tr>
					<td>车号</td>
					<td colspan="3">{$mainApplyArray[0].mainTrainsign}</td>
			   </tr>
			   <tr>
					<td>经办人（盖章）</td>
					<td>{$mainApplyArray[0].noticeAnnt}</td>
					<td>铁运工段经办人（盖章）</td>
					<td>{$mainApplyArray[0].trainAnnt}</td>
			   </tr>
          </table>
<input type="submit" onclick="javascript:history.back(-1);"  value="返回" />
</div>
