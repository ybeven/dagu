<div class='tablebox'>
     <form name="form" action="/HC/SaveTrainNotice/{$mainApplyArray[0].id}" method="post">
		  {if $mainApplyArray[0].noticeTime == null}
					火车装车通知单（添加）
		  {else}
					火车装车通知单（已有）
		  {/if}	  
          <table class="formView" align="center">
			   <tr>
					<td class='tdhead'>通知单位</td>
					<td><input type="text" value="{$mainApplyArray[0].company}" name="company"/></td>
					<td class='tdhead'>日期</td>
					<td><input type="text" class="datepicker" name="noticeTime" value="{$mainApplyArray[0].noticeTime}" /></td>
			   <!--{if $mainApplyArray[0].noticeTime == null}
					<td><input type="text" class="datepicker" name="noticeTime"/></td>
			   {else}
					<td><input type="text" value="{$mainApplyArray[0].noticeTime}" name="noticeTime"/></td>
			   {/if}-->
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
					<td class='tdhead'>质量要求</td>
					<td colspan="3"><input type="text" value="{$mainApplyArray[0].qualityrequire}" name="qualityrequire"/></td>
			   </tr>
			   <tr>
					<td class='tdhead'>车号</td>
					<td colspan="3"><textarea value="{$mainApplyArray[0].mainTrainsign}" name="trainsign"></textarea></td>
			   </tr>
			   <tr>
					<td class='tdhead'>经办人（盖章）</td>
					<td><input type="text" value="{$mainApplyArray[0].noticeAnnt}" name="noticeAnnt"/></td>
					<td class='tdhead'>铁运工段经办人（盖章）</td>
					<td><input type="text" value="{$mainApplyArray[0].trainAnnt}" name="trainAnnt"/></td>
			   </tr>
          </table>
		  {if $mainApplyArray[0].noticeTime == null}
			   <input type="submit" value="保存"  />
		  {else}
			   <input type="submit" value="保存修改" />
		  {/if}
			   <input type="button" onclick="location.href='/HC/ListTrainNotice'" value="返回" />
	 </form>
</div>
