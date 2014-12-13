
<div class="tablebox">
	 <form id="saveOil" method="post" action="/measure/saveOil">
			<table class="formView" align="center">
				<tr>
					<td class='tdhead'>油品类型</td>
					<td><input type="text" name="type" /></td>
					<td class='tdhead'>油品型号</td>
					<td><input type="text" name="model" /></td>
					<td><input type="submit" value="添加" /></td>
				</tr>
			</table>
			
			
	 </form>
		</div>
		<hr>

<div class='tablebox'>
<table class="listView" align="center">
    <thead>
	<th>油品类型</th>
	<th>油品型号</th>
	<th>操作</th>
    </thead>
    {foreach from=$modelArr item=model}
   <tr>
   
	<td>{$model.oilType}</td>
	<td>{$model.oilModel}</td>
        <td><input type="button" onclick="location.href='/measure/removeOil/{$model.id}'" value="删除" /></td>
				</tr>
				{/foreach}
</table>
{compager info=$compager linkPrefix='/measure/manageOil/'}
<p><input type="button" onclick="location.href='/start'" value="返回" />
</div>