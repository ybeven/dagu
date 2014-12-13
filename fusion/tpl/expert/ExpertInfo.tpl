
<div class='tablebox'>
<form name="form" action="/expert/SearchExpertInfo" method="post">
	<tr>
		<td class='thead'>评审专家姓名</td><td><input name="expertName"></td>
		<td class="thead">所在单位</td><td><input type="text" name="expertCompany" /></td>
		<td class="thead">专业</td><td><input type="text" name="expertSubject" /></td>
		<td class='thead'>评审日期</td><td><input class="datepicker" name="expertTime"></td>
		<td class="thead"><input type="submit" value="查询" /></td>
	</tr>
</form>
    <table class="formView" align="center">
        <thead>
		<tr>
				<th>专家姓名</th>
				<th>性别</th>
				<th>年龄</th>
				<th>所在单位</th>
				<th>职称</th>
                <!-- <th>职务</th> -->
				<th>专业</th>
				<th>评审矿山</th>
				<th>评审类型</th>
		</tr>
		</thead>
        {foreach from=$MArray item=data}
		{if $data[8] eq '1'}
		<tr>
            <td>{$data[0]}</td>
			{if $data[1] eq '0'}
			<td>男</td>
			{else}
			<td>女</td>
			{/if}
			<td>{$data[2]}</td>
			<td>{$data[3]}</td>
			<td>{$data[4]}</td>
			<!-- <td>{$data[5]}</td> -->
			<td>{$data[6]}</td>
			<td>{$data[7]}</td>
			<!-- {if $data[8] eq '1'} -->
			<td><a href="/predata/ListPreDetails/{$data[9]}">申报信息</td>
			<!-- {else if $data[8] eq '0' }
			<td><a href="/minedata/ListMineDetails/{$data[9]}">规划信息</td>
			{/if} -->
        </tr>   
        {/if}        
		
        {/foreach}
        {foreach from=$MArray item=data}
		{if $data[8] eq '0' }
		<tr>
            <td>{$data[0]}</td>
			{if $data[1] eq '0'}
			<td>男</td>
			{else}
			<td>女</td>
			{/if}
			<td>{$data[2]}</td>
			<td>{$data[3]}</td>
			<td>{$data[4]}</td>
			<!-- <td>{$data[5]}</td> -->
			<td>{$data[6]}</td>
			<td>{$data[7]}</td>
			<!-- {if $data[8] eq '1'} -->
			<!-- <td><a href="/predata/ListPreDetails/{$data[9]}">申报信息</td> -->
			<!-- {else if $data[8] eq '0' } -->
			<td><a href="/minedata/ListMineDetails/{$data[9]}">规划信息</td>
			<!-- {/if} -->
        </tr>
        {/if}           
		
        {/foreach}
     </table>			
</div>