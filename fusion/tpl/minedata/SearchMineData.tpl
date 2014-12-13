
<div class='tablebox'>

<form name="form" action="/minedata/SearchMineData/0" method="post">
	<table class="listView" align="center">
	    <tr>
	        <th class="thead" >市级行政区</th><td><input name="basedataDivisionsshi"></td>
	        <th class="thead" >县级级行政区</th><td><input name="basedataDivisionsxian"></td>
			<th class="thead">矿山名称</th><td><input type="text" name="mineName" /></td>
			<th class="thead">所属企业名称</th><td><input type="text" name="basedataOwedname" /></td>
	    </tr>
		<tr>
			<th class="thead">矿业权类型</th><td><input name="basedataAuthority"></td>
			<th class="thead">矿业权证号</th><td><input type="text" name="basedataAuthNum" /></td>
			<th class="thead">主矿种</th><th><input name="basedataMineralMain"></td>
			<th class="thead">伴生矿种</th><td><input name="basedataMineralAsso"></td>
		</tr>
		<tr>
			<th class="thead">矿山开采方式</th><td>
			<select  name="basedataDigtype">
					<option value="露天开采">露天开采</option>
					<option value="全境界开采法">全境界开采法</option>
					<option value="陡帮开采法">陡帮开采法</option>
					<option value="地下开采">地下开采</option>
					<option value="崩落法">崩落法</option>
					<option value="充填法">充填法</option>
					<option value="空场法">空场法</option>
					<option value="其他">其他</option>
				</select>
			</td>
			<th class="thead">重点工程名称</th><td><input name="projectName"></td>

			<th class='thead'>申报评审专家</th><td><input name="expertName"></td>
			<th class='thead'>评审日期</th><td><input class="datepicker" name="expertTime"></td>
			
		</tr>
		<tr>
		    <td class="thead" colspan=8><input type="submit" value="矿山规划信息查询" /></td>
	    </tr>
	</table>
</form>
    <table class="listView" align="center" width="100%">
        <thead>
		<tr>
			    <th>市级行政区</th>
			    <th>县级行政区</th>
				<th>矿山名称</th>
				<th>所属企业</th>
				<th>矿业权类型</th>
				<th>产权证号</th>
				<th>主矿种</th>
				<th>伴生矿种</th>
				<th>开采方式</th>
				<th>重点工程</th>
				<th>规划评审专家</th>
				<th>审核时间</th>
				<th colspan=2 width="8%">操作</th>
		</tr>
		</thead>
		{if $tag!=1}
        {foreach from=$MArray item=data}
		<tr>
			<td>{$data[12]}</td>
			<td>{$data[13]}</td>
			<td>{$data[1]}</td>
			<td>{$data[2]}</td>
			<td>{$data[3]}</td>
			<td>{$data[4]}</td>
			<td>{$data[5]}</td>
			<td>{$data[6]}</td>
			<td>{$data[7]}</td>
			<td>{$data[8]}</td>
			<td>{$data[9]}</td>
			<td>{$data[10]}</td>
			<td><a href="/minedata/ListMineDetails/{$data[11]}">查看</a></td>
			<td><a href="/minedata/DeleteMineData/{$data[11]}">删除</a></td>
        </tr>           
		{foreachelse}
        <tr>
			<td align="center" colspan="12">没有记录</td>
		</tr>
        {/foreach}
        {/if}
     </table>				
</div>
