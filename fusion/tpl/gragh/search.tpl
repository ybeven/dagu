<script language="javascript" type="text/javascript">
{literal}
function myFun()
{
{/literal}
	var x = document.getElementsByName("picinumber")[0].value;
	// alert(x);
	document.getElementById("form").action="/gragh/origin/"+x;

{literal}
}
{/literal}
</script>
<div class='tablebox'>
<form name="form" action="/gragh/origin/" method="post">
	
		<tr>
			<th>批次</th><td><input type="text" name="picinumber"  id="pici"/></td>
		</tr>
		<tr><td><input type="submit" value="查询" /></td></tr>
	
</form>
