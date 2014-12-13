
<div class='tablebox'>
<form name="form" action="/predata/SearchPreData/0" method="post">
	<table class="listView" align="center">
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
		    <td class="thead" colspan=2><input type="submit" value="查询" /></td>
		</tr>
	    <!-- <tr>
	    	<th>市级行政区划</th><td><input type="text" name="shijiquhua" /></td>
	    	<th>县级行政区划</th><td><input type="text" name="xianjiquhua" /></td>
	    	<th>开采矿种</th><td><input type="text" name="orename" /></td>
		    <th class="thead">矿山名称：</th><td><input type="text" name="mineName" /></td>
		</tr>
		<tr>
		    <th class="thead">所属企业名称：</th><td><input type="text" name="enterpriseName" /></td>
		    <th class='thead'>评审专家姓名：</th><td><input name="expertName"></td>
		    <th class='thead'>评审日期：</th><td><input class="datepicker" name="expertTime"></td>
		    <td class="thead" colspan=2><input type="submit" value="查询" /></td>
	    </tr> -->
	</table>
</form>
    <table class="listView" align="center" width="100%">
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
			<!-- <th colspan=2  width="10%">操作</th> -->
		</tr>
		</thead>
		{if $tag!=1}
        {foreach from=$MArray item=data}
		<tr>
			<td>{$data[14]}</td>
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
			<td>{$data[11]}</td>
			<td>{$data[12]}</td>
			<td>{$data[13]}</td>
			<!-- <td><a href="/predata/ListPreDetails/{$data[6]}">查看</a></td>
			<td><a href="/predata/DeleteMineData/{$data[6]}">删除</a></td> -->
        </tr>           
		{foreachelse}
        <tr>
			<td align="center" colspan="14">没有记录</td>
		</tr>
        {/foreach}
        {/if}
     </table>			
</div>