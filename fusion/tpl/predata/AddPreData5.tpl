<script language="javascript" type="text/javascript">
{literal}
function myFun()
{
{/literal}
	var x = document.getElementsByName("picinumber")[0].value;
	// alert(x);
	document.getElementById("form").action="/predata/UploadeExcelData5/"+x;

{literal}
}
{/literal}
	// {literal}

// function getchild(red)
// 				{
// 	{/literal}			
// 				var myArray = new Array({foreach from=$nyore item=child name=myarray}
// 				{if $smarty.foreach.myarray.last}"{$child.name}"
// 								{else}"{$child.name}",{/if}{/foreach});
// 				var myArray2 = new Array({foreach from=$jsore item=child name=myarray}
// 				{if $smarty.foreach.myarray.last}"{$child.name}"
// 								{else}"{$child.name}",{/if}{/foreach});
// 				var myArray3 = new Array({foreach from=$fjsore item=child name=myarray}
// 				{if $smarty.foreach.myarray.last}"{$child.name}"
// 								{else}"{$child.name}",{/if}{/foreach});
// 				var myArray4 = new Array({foreach from=$meiore item=child name=myarray}
// 				{if $smarty.foreach.myarray.last}"{$child.name}"
// 								{else}"{$child.name}",{/if}{/foreach});			
// 	{literal}
// 				var str1 = "#child"+red;
// 				var str2;var str3;var str4;var str5;var str6;
// 				for(var i=0;i<myArray.length;i++)
// 				{
// 				 str2=str2+"<option value='"+myArray[i]+"'>"+myArray[i]+"</option>";
// 				}
// 				for(var i=0;i<myArray2.length;i++)
// 				{
// 				 str3=str3+"<option value='"+myArray2[i]+"'>"+myArray2[i]+"</option>";
// 				}
// 				for(var i=0;i<myArray3.length;i++)
// 				{
// 				 str4=str4+"<option value='"+myArray3[i]+"'>"+myArray3[i]+"</option>";
// 				}
				
// 				 str5="<option value='煤矿'>煤矿</option>";
// 				  str6="<option value=''>请选择</option>";
// 					//alert(str2);
					
// 					if($("#"+red).val()=="能源矿产")
// 						{$("#child"+red).html(" ");
// 						$("#child"+red).append(str2);}
						
// 					if($("#"+red).val()=="金属矿产")
// 						{$("#child"+red).html(" ");
// 						$("#child"+red).append(str3);}
// 					if($("#"+red).val()=="非金属矿产")
// 						{$("#child"+red).html(" ");
// 						$("#child"+red).append(str4);}
// 					if($("#"+red).val()=="煤矿")
// 						{$("#child"+red).html(" ");
// 						$("#child"+red).append(str5);
// 						}
// 					if($("#"+red).val()=="")
// 						{$("#child"+red).html(" ");
// 						$("#child"+red).append(str6);
// 						}	
// 				}			


		// function judge(applytype)
		// {
		// 	if(applytype=="非中央所属的矿山企业")
		// 	{
		// 		var checktype1="<td class='tdhead' id='check1'>矿山所在地市（县）级国土资源主管部门审核意见</td>";
		// 		var checktype2="<td class='tdhead' id='check2'>矿山所在地省级国土资源主管部门审核意见</td>";
		// 	}
		// 	if(applytype=="归口中央企业管理的矿山企业")
		// 	{
		// 		var checktype1="<td class='tdhead' id='check1'>矿山所在地省级国土资源主管部门审核意见</td>";
		// 		var checktype2="<td class='tdhead' id='check2'>归口中央企业的审核意见</td>";
		// 	}
		// 	if(applytype=="行业协会推荐的矿山企业")
		// 	{
		// 		var checktype1="<td class='tdhead' id='check1'>矿山所在地省级国土资源主管部门审核意见</td>";
		// 		var checktype2="<td class='tdhead' id='check2'>行业协会的审核意见</td>";
		// 	}
		// 	$("#check1").replaceWith(checktype1);
		// 	$("#check2").replaceWith(checktype2);
		// }
		// var mark = 1;
		// function add()
		// {
		// 	mark=mark+1; 	                
		// 	var str="<tr><td><table width='100%' class='formView' align='center'><tr><td width='50%' colspan=4>专家"+mark+"</td></tr>"
		// 		+"<tr><td width='20%' class='tdhead'>姓名</td width='30%'><td><input width='90%' name='expertName[]'></td>"
		// 		+"<td width='20%' class='tdhead'>性别</td><td width='30%'><select name='expertSex[]'><option value='1'>男</option><option value='2'>女</option></select></td></tr>"
		// 		+"<tr><td class='tdhead'>年龄</td><td><input width='90%' name='expertAge[]'></td>"
		// 		+"<td class='tdhead'>单位</td><td><input width='90%' name='expertCompany[]'></td></tr>"
		// 		+"<tr><td class='tdhead'>职称</td><td><input width='90%' name='expertTitles[]'></td>"
		// 		+"<td class='tdhead'>职务</td><td><input width='90%' name='expertWork[]'></td></tr>"
		// 		+"<tr><td class='tdhead'>专业</td><td><input width='90%' name='expertSubject[]'></td>"
		// 		+"<td class='tdhead'>手机</td><td><input width='90%' name='expertCellphone[]'></td></tr>"
		// 		+"<tr><td class='tdhead'>固话</td><td><input width='90%' name='expertLandhone[]'></td>"
		// 		+"<td class='tdhead'>邮箱</td><td><input width='90%' name='customer[]'></td></tr>"
		// 		+"<tr><td class='tdhead'>传真</td><td><input width='90%' name='expertFax[]'></td>"
		// 		+"<td class='tdhead'>地址</td><td><input width='90%' name='expertAddress[]'></td></tr>"
		// 		+"<tr><td class='tdhead'>专家意见</td><td colspan=3><textarea cols='60' rows='3' name='mineExpertIdeaContent[]'></textarea></td></tr>"
		// 		+"<tr><td class='tdhead'>时间</td><td><input class='datepicker' width='90%' name='mineExpertIdeaTime[]'></td>"
		// 		+"<td class='tdhead' colspan=2><input type='button' onclick='add();' value='添加专家'/><input type='button' onclick='removeExpert(this);' value='删除该专家'/></td></tr></table></td></tr>";			      
		// 	$("#expert_info").append(str);
		// }
		// function removeExpert(red)
		// {
		// 	mark=mark-1;
		// 	$(red).parent().parent().parent().parent().parent().remove();
		// }
		// function testajax()
		// {
		// 	var str=$.ajax({url:"localhost/admin2.php"});
		// 	alert("ddd");
		// 	alert(str);
		// }
		// {/literal}
</script>
<!-- <div>
	<table align = "left" >
		<tr>
			<td align="left">请输入考试批次：</td>
			<td><input type="text" name="picinumber"  id="pici"/></td>
		</tr>
	</table>
</div> -->
<form name="form" id="form" action="/predata/UploadeExcelData5" method="post" enctype="multipart/form-data">
	<input type="hidden" name="leadExcel" value="true">
	<table align = "center" >
		<tr>
			<td align="left">请输入考试批次：</td>
			<td><input type="text" name="picinumber" onblur="myFun()" id="pici"/></td>
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

		   
      
