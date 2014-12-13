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

<form name="form" id="form" action="/alterdata/UploadeExcelData" method="post" enctype="multipart/form-data">
	<input type="hidden" name="leadExcel" value="true">
	<table align = "center" >
		<tr>
			<td align="left">请输入考试批次：</td>
			<td><input type="text" name="picinumber" id="pici"/></td>
		</tr>
		<tr>
			<td align="left">请输入导入标识：</td>
			<td><input type="text" name="tag" id="tag"/></td>
		</tr>
		<tr>
			<td align="left">请选择文件：</td>
			<td><input type="text" name="trucknumber"  id="f_file"/></td>
			<td><input type="button" value="浏览" class="file" onClick="t_file.click()"><input type="file" id="t_file" name="inputExcel"  style="display:none" onchange="f_file.value=this.value"></td>
			<td><input type="submit" value="导入"></td>
		</tr>
		<!--
		<tr>
			<td><input type="button" onclick="hideandshow1();" value="基本信息"/></td>
			<td><input type="button" onclick="hideandshow2();" value="专家信息"/></td>
			<td><input type="button" onclick="hideandshow3();" value="审核意见"/></td>
		</tr>
		-->
	</table>
</form>

		   
      
