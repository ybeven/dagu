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

<form name="form" id="form" action="/alterdata/SearchAlterData" method="post" enctype="multipart/form-data">
	<input type="hidden" name="leadExcel" value="true">
	<table align = "center" >
		<tr>
			<td align="left">请输入考试批次：</td>
			<td><input width="50px" type="text" name="picinumber" id="pici"/></td>
		</tr>
		<tr>
			<td align="left">请输入导入标识：</td>
			<td><input type="text" name="tag" id="tag"/></td>
		</tr>
		<tr>
			<td><input type="submit" value="查询"></td>
		</tr>
	</table>
</form>
<form name="form2" id="form2" method="post">
	<tr>
		<td><input type="button" onclick="location.href='/alterdata/AlterData/1'" value="全部更改为及格" ></td>
		<td><input type="button" onclick="location.href='/alterdata/AlterData/2'" value="除0分外都修改" /></td>
		<td><input type="button" onclick="location.href='/alterdata/AlterData/3'" value="序号在该号之前都修改：" /></td>
		<td><input type="text" name="alter" id="alter"/></td>
		<!-- <td><input type="button" onclick="location.href='/minedata/ListMineData'" value="返回" /></td>
		<td><input type="button" onclick="location.href='/minedata/ListMineData'" value="返回" /></td> -->
    </tr>
</form>

		   
      
