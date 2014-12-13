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
<form name="form" action="/predata/SearchPreData/0" method="post">
	
		<tr>
			<th>批次</th><td><input type="text" name="pici" /></td>
			<th>考试科目</th><td><input type="text" name="kemu" /></td>
			<th>考点</th>
			<td>
			<select name="kaodian">
				<option value ="12">全部</option>
				<option value ="0">未标记考点</option>
  				<option value ="1">西安</option>
  				<option value="2">咸阳</option>
  				<option value="3">宝鸡</option>
  				<option value ="4">铜川</option>
  				<option value ="5">延安</option>
  				<option value="6">榆林</option>
  				<option value="7">商洛</option>
  				<option value ="8">渭南</option>
  				<option value ="9">安康</option>
  				<option value="10">汉中</option>
  				<option value="11">杨凌</option>
			</select>
		    </td>
		    <td ><input type="submit" value="查询" /></td>
		</tr>
	
</form>
<form name="form" action="/predata/UpdatePreData/" method="post">
	<tr><td><input type="submit" value="更改" /></td></tr>
    <table >
        <thead>
		<tr>
			<th>考点</th>
			<th>批次</th>
			<th>培训机构</th>
			<th>准考证号</th>
			<th>座位号</th>
			<th>姓名</th>
			<th>性别</th>
			<th>考试科目</th>
			<th>身份证号</th>
			<th>考试场次</th>
			<th>考场</th>
			<th>卷面成绩</th>
			<th>雷同分数</th>
			<th>最终得分</th>
			<!-- <th colspan=2>操作</th> -->
			<!-- <th colspan=2  width="10%">操作</th> -->
		</tr>
		</thead>
		{if $tag!=1}
        {foreach from=$MArray item=data}
		<tr>
			<td><input value="{$data[14]}" name="kaodiansearch[]"/></td>
			<td><input value="{$data[1]}" name="picisearch[]"/></td>
            <td><input value="{$data[2]}" name="peixunjigou[]"/></td>
			<td><input value="{$data[3]}" name="zhunkaozhenghao[]"/></td>
			<td><input value="{$data[4]}" name="zuoweihao[]"/></td>
			<td><input value="{$data[5]}" name="xingming[]"/></td>
			<td><input value="{$data[6]}" name="xingbie[]"/></td>
			<td><input value="{$data[7]}" name="kaoshikemu[]"/></td>
			<td><input value="{$data[8]}" name="shenfenzhenghao[]"/></td>
			<td><input value="{$data[9]}" name="kaoshichangci[]"/></td>
			<td><input value="{$data[10]}" name="kaochang[]"/></td>
			<td><input value="{$data[11]}" name="juanmianchengji[]"/></td>
			<td><input value="{$data[12]}" name="leitong[]"/></td>
			<td><input value="{$data[13]}" name="zuizhongdefen[]"/></td>
			<!-- <td><a href="/predata/ListPreDetails/{$data[6]}">查看</a></td> -->
			<!-- <td width="59px"><a href="/predata/UpdatePreData/{$data[0]}">更改</a></td> -->
			
			<td style="display:none"><input value="{$data[0]}" name="id[]"/></td>
        </tr>           
		{foreachelse}
        <tr>
			<td align="center" colspan="14">没有记录</td>
		</tr>
        {/foreach}
        {/if}
     </table>			
</div>
</form>