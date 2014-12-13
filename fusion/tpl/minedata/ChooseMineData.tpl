
<div class='tablebox'>
<!-- {literal}
<style type="text/css">
	.listView input {
		width: 8em;
	}
	.listView td a {
		padding-right: 1em;
		/*background-color: hsla(120,100%,50%,0.8)*/
	}
</style>
{/literal} -->

<!-- <form name="form" action="/minedata/SearchMineData_noguihua" method="post">
	<tr>
		<td class="thead">矿山名称：</td><td><input type="text" name="mineName" /></td>
		<td class="thead">所属企业名称：</td><td><input type="text" name="enterpriseName" /></td>
		<td class='thead'>评审专家姓名：</td><td><input name="expertName"></td>
		<td class='thead'>评审日期：</td><td><input class="datepicker" name="expertTime"></td>
		<td class="thead"><input type="submit" value="查询" /></td>
	</tr>
</form> -->
    <table class="listView" align="center" width="100%">
        <thead>
		<tr>
				<th >矿山名称</th>
				<th >所属企业名称</th>
				<th>企业性质</th>
				<th>开采规模</th>
				<!-- <th>申报评审专家</th> -->
				<th>评审时间</th>
				<th >状态</th>
				<th >操作</th>
		</tr>
		</thead>
        {foreach from=$MArray item=data}
        {if $data[9]=='通过'}
		<tr>
            <td>{$data[0]}</td>
			<td>{$data[1]}</td>
			<td>{$data[2]}</td>
			<td>{$data[3]}</td>
			<!-- <td>{$data[4]}</td> -->
			<td>{$data[5]}</td>
			<td>{$data[8]}</td>
			<td>
				<a href="/minedata/AddMineData/{$data[6]}">添加规划项目</a>
			</td>
        </tr>  
        {/if}         
		{foreachelse}
        <tr>
			<td align="center" colspan="7">没有记录</td>
		</tr>
        {/foreach}
     </table>	 
</div>