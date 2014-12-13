<script language="javascript" type="text/javascript">
{literal}
function myFun()
{
{/literal}
	var x = document.getElementsByName("picinumber")[0].value;
	// alert(x);
	document.getElementById("form").action="/predata/UploadeExcelData/"+x;

{literal}
}
{/literal}
</script>
<div class='tablebox'>
<form name="form" action="/gragh/origin/" method="post">
	
		<tr>
			<th>批次</th><td><input type="text" name="picinumber" /></td>
		</tr>
		<tr><td><input type="submit" value="查询" /></td></tr>
	
</form>
<form name="form" action="/predata/UpdatePreData/" method="post">
	<!-- <tr><td><input type="submit" value="更改" /></td></tr> -->
	<table style="width:100%;" cellpadding="2" cellspacing="0" border="1" bordercolor="#000000">
	<thead>
		<tr>
			<th rowspan="2">培训机构</th>
			<th rowspan="2">总人数</th>
			<th rowspan="2">雷同卷人数<br></th>
			<th colspan="4">卷面成绩</th>
			<th colspan="4">最终成绩</th>
		</tr>
		<tr>
			<th><span>及格人数</span><br></th>
			<th>通过率</th>
			<th>58-59分人数</th>
			<th>0分人数</th>
			<th>及格人数</th>
			<th>通过率</th>
			<th>58-59分人数</th>
			<th>0分人数</th>
		</tr>
	</thead>
	<tbody>
		{foreach from=$SMArray item=data}
		<tr>
			<td>{$data[0]}</td>
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
		</tr>
		{/foreach}
	</tbody>
</table>	
<br>
<br>

<table style="width:100%;" cellpadding="2" cellspacing="0" border="1" bordercolor="#000000">
	<thead>
		<tr>
			<th rowspan="2">考点</th>
			<th rowspan="2">总人数</th>
			<th rowspan="2">雷同卷人数<br></th>
			<th colspan="4">卷面成绩</th>
			<th colspan="4">最终成绩</th>
		</tr>
		<tr>
			<th><span>及格人数</span><br></th>
			<th>通过率</th>
			<th>58-59分人数</th>
			<th>0分人数</th>
			<th>及格人数</th>
			<th>通过率</th>
			<th>58-59分人数</th>
			<th>0分人数</th>
		</tr>
	</thead>
	<tbody>
		{foreach from=$KDMArray item=data}
		<tr>
			<td>{$data[0]}</td>
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
		</tr>
		{/foreach}
	</tbody>
</table>		
</div>
</form>