<div class='tablebox'>
<!-- <form name="form" action="/minedata/SearchMineData" method="post">
	<table class="formView" align="center">
	<tr>
	<td class="thead" >行政区号</td><td><input name="basedataDivisions"></td>
			<td class="thead">矿山名称</td><td><input type="text" name="mineName" /></td>
			<td class="thead">所属企业名称</td><td><input type="text" name="basedataOwedname" /></td>
			</tr>
			<tr>
			<td class="thead">矿业权类型</td><td><input name="basedataAuthority">

			</td>
			<td class="thead">矿业权证号</td><td><input type="text" name="basedataAuthNum" /></td>
			<td class="thead">主矿种</td><td><input name="basedataMineralMain"></td>
			</tr>
			<tr>
		    <td class="thead">伴生矿种</td><td><input name="basedataMineralAsso"></td>
			<td class="thead">矿山开采方式</td><td>
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
				<td class="thead">重点工程名称</td><td><input name="projectName"></td>
				</tr>
				<tr>
				<td class='thead'>申报评审专家</td><td><input name="expertName"></td>
				<td class='thead'>评审日期</td><td><input class="datepicker" name="expertTime"></td>
				<td class="thead" colspan=2><input type="submit" value="矿山规划信息查询" /></td>
				</tr>
	</table>
</form> -->
  
    <table class="listView" align="center" width="100%">
        <thead>
		<tr>
				<th>序号</th>
				<th width="15%">矿山名称</th>
				<th width="15%">所属企业名称</th>
				<th width="15%">企业性质</th>
				<th width="10%">开采规模</th>
				<!-- <th width="10%">规划评审专家</th> -->
				<th width="10%">评审时间</th>
				<th colspan=4 width="20%">操作</th>
				
		</tr>
		</thead>
        {foreach from=$MArray item=data}
		<tr>
			<td>{$data[7]+1}</td>
            <td>{$data[0]}</td>
			<td>{$data[1]}</td>
			<td>{$data[2]}</td>
			<td>{$data[3]}</td>
			<!-- <td>{$data[4]}</td> -->
			<td>{$data[5]}</td>
			<td><a href="/minedata/ListMineDetails/{$data[6]}">查看</a></td>
			{if $QuanXian !=1}<td><a href="/minedata/DeleteMineData/{$data[6]}" onclick="return confirm('确定将此记录删除?删除后将无法恢复')">拒绝</a></td>
			<td><a href="/minedata/DownloadExcelMineDetails/{$data[6]}">导出</a></td>
			<td><a href="/minedata/DownloadAllFiles/{$data[6]}">导出全部附件</a></td>{/if}
        </tr>           
		{foreachelse}
        <tr>
			<td align="center" colspan="7">没有记录</td>
		</tr>
        {/foreach}
     </table>			
</div>