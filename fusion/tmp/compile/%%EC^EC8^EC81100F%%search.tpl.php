<?php /* Smarty version 2.6.26, created on 2014-12-01 16:07:12
         compiled from gragh/search.tpl */ ?>
<script language="javascript" type="text/javascript">
<?php echo '
function myFun()
{
'; ?>

	var x = document.getElementsByName("picinumber")[0].value;
	// alert(x);
	document.getElementById("form").action="/gragh/origin/"+x;

<?php echo '
}
'; ?>

</script>
<div class='tablebox'>
<form name="form" action="/gragh/origin/" method="post">
	
		<tr>
			<th>批次</th><td><input type="text" name="picinumber"  id="pici"/></td>
		</tr>
		<tr><td><input type="submit" value="查询" /></td></tr>
	
</form>