<script type="text/javascript">
	{literal}
	

$(document).ready(function(){
  $("#button_reclamationRate").click(function(){
	$('#bef3_pre5_reclamationRate').toggle();
  });
  $("#button_reclamationMoney").click(function(){
	$('#bef3_pre5_reclamationMoney').toggle();
  });
  $("#button_reclamationPrice").click(function(){
	$('#bef3_pre5_reclamationPrice').toggle();
  });
  $("#button_environmentRate").click(function(){
	$('#bef3_pre5_environmentRate').toggle();
  });
  $("#button_energyElect").click(function(){
	$('#bef3_pre5_energyElect').toggle();
  });
 $("#button_energyWater").click(function(){
	$('#bef3_pre5_energyWater').toggle();
  });
  $("#button_energyEnergy").click(function(){
	$('#bef3_pre5_energyEnergy').toggle();
  });  
  $("#button_energyWaste").click(function(){
	$('#bef3_pre5_energyWaste').toggle();
  }); 
  $("#button_energyRubbish").click(function(){
	$('#bef3_pre5_energyRubbish').toggle();
  }); 
  $("#button_energySo2").click(function(){
	$('#bef3_pre5_energySo2').toggle();
  });
 $("#button_scienceRate").click(function(){
	$('#bef3_pre5_scienceRate').toggle();
  });
  $("#button_complexGoback").click(function(){
	$('#bef3_pre5_complexGoback').toggle();
  });
  $("#button_complexAllback").click(function(){
	$('#bef3_pre5_complexAllback').toggle();
  });
  $("#button_complexDilut").click(function(){
	$('#bef3_pre5_complexDilut').toggle();
  });
  $("#button_complexUserate").click(function(){
	$('#bef3_pre5_complexUserate').toggle();
  });
 $("#button_complexRecover").click(function(){
	$('#bef3_pre5_complexRecover').toggle();
  });
  $("#button_complexEfficiency").click(function(){
	$('#bef3_pre5_complexEfficiency').toggle();
  });
  $("#button_complexCoalBack").click(function(){
	$('#bef3_pre5_complexCoalBack').toggle();
  });
  $("#button_complexCoalIn").click(function(){
	$('#bef3_pre5_complexCoalIn').toggle();
  });
  $("#button_complexCoalAll").click(function(){
	$('#bef3_pre5_complexCoalAll').toggle();
  });
  $("#button_standardWorkerCount").click(function(){
	$('#bef3_pre5_standardWorkerCount').toggle();
  });
  $("#button_standardWorkerCost").click(function(){
	$('#bef3_pre5_standardWorkerCost').toggle();
  }); 
  $("#button_basedataDigreturnrate").click(function(){
	$('#bef3_pre5_basedataDigreturnrate').toggle();
  });
  $("#button_basedataSepareturnrate").click(function(){
	$('#bef3_pre5_basedataSepareturnrate').toggle();
  });
  $("#button_basedataProduceScale").click(function(){
	$('#bef3_pre5_basedataProduceScale').toggle();
  });
  $("#button_basedataValue").click(function(){
	$('#bef3_pre5_basedataValue').toggle();
  });
  $("#button_basedataFee").click(function(){
	$('#bef3_pre5_basedataFee').toggle();
  });
  $("#button_basedataProfit").click(function(){
	$('#bef3_pre5_basedataProfit').toggle();
  });
});
var mark = 1;
		function add()
		{
			mark=mark+1; 	                
			var str="<tr><td><table width='100%' class='formView' align='center'><tr><td class='tdtitle' colspan=4>专家"+mark+"</td></tr>"
				+"<tr><td width='20%' class='tdhead'>姓名</td width='30%'><td><input width='90%' name='expertName[]'></td>"
				+"<td width='20%' class='tdhead'>性别</td><td width='30%'><select name='expertSex[]'><option value='1'>男</option><option value='2'>女</option></select></td></tr>"
				+"<tr><td class='tdhead'>年龄</td><td><input width='90%' name='expertAge[]'></td>"
				+"<td class='tdhead'>单位</td><td><input width='90%' name='expertCompany[]'></td></tr>"
				+"<tr><td class='tdhead'>职称</td><td><input width='90%' name='expertTitles[]'></td>"
				+"<td class='tdhead'>职务</td><td><input width='90%' name='expertWork[]'></td></tr>"
				+"<tr><td class='tdhead'>专业</td><td><input width='90%' name='expertSubject[]'></td>"
				+"<td class='tdhead'>手机</td><td><input width='90%' name='expertCellphone[]'></td></tr>"
				+"<tr><td class='tdhead'>固话</td><td><input width='90%' name='expertLandhone[]'></td>"
				+"<td class='tdhead'>邮箱</td><td><input width='90%' name='customer[]'></td></tr>"
				+"<tr><td class='tdhead'>传真</td><td><input width='90%' name='expertFax[]'></td>"
				+"<td class='tdhead'>地址</td><td><input width='90%' name='expertAddress[]'></td></tr>"
				+"<tr><td class='tdhead'>专家意见</td><td colspan=3><textarea cols='60' rows='3' name='expertIdea[]'></textarea></td></tr>"
				+"<tr><td class='tdhead'>时间</td><td><input class='datepicker' width='90%' name='expertTime[]'></td>"
				+"<td class='tdhead' colspan=2><input type='button' onclick='add();' value='添加专家'/><input type='button' onclick='removeExpert(this);' value='删除该专家'/></td></tr></table></td></tr>";			      
			$("#expert_info").append(str);
		}

		//function testajax()
		//{
			//alert("/minedata/SaveMineData/"+{/literal}{$mineid}{literal});
		//	$.ajax({type:"POST",url:"/minedata/SaveMineData/"+{/literal}{$mineid}{literal},data:$("#testform).serializeArray(),success:function(msg){alert(msg);}});
			
	//	}
		
		function removeExpert(red)
		{
			mark=mark-1;
			$(red).parent().parent().parent().parent().parent().remove();
			
		}

//重点工程添加删除函数
var project_mark = 1;
		function addProject()
		{        
			project_mark=project_mark+1; 
			var str1="<tr><td><table calss='formViem' align='center' id='projectDetails'><tr><td class='tdtitle' colspan=6>重点工程信息"+project_mark+"</td></tr>"
			    +"<tr><td class='tdhead'>项目编号</td>"
				+"<td><input type='text' name='projectNum[]'></td>"
				+"<td class='tdhead'>工程名称</td>"
				+"<td><input type='text' name='projectName[]'></td>"
				+"<td class='tdhead'>工程类型</td>"
				+"<td><select name='projectType[]'><option value='依法办矿工程'>依法办矿工程</option><option value='规范管理工程'>规范管理工程</option><option value='资源开发与综合利用工程'>资源开发与综合利用工程</option><option value='技术创新工程'>技术创新工程</option><option value='节能减排工程'>节能减排工程</option><option value='矿山环境恢复治理类工程'>矿山环境恢复治理类工程</option><option value='土地复垦工程'>土地复垦工程</option><option value='和谐社区建设类工程'>和谐社区建设类工程</option><option value='企业文化工程'>企业文化工程</option></select></td></tr>"
				+"<tr><td class='tdhead'>工程内容</td>"
				+"<td colspan=5><textarea cols='60' rows='3' name='projectDetail[]'></textarea></td></tr>"
				+"<tr><td class='tdhead'>实施时间</td>"
				+"<td><input type='text' name='projectlWorktime[]'></td>"
				+"<td class='tdhead'>起止时间</td>"
				+"<td><input type='text' name='projectStarttime[]'></td>"  					
				+"<td class='tdhead'>工程投资</td>"
				+"<td><input type='text' name='projectCost[]'></td></tr>"  //之前都是好的
				+"<tr><td class='tdhead'>资金筹措</td>"
				+"<td><input type='text' name='projectMoney[]'></td>"   								
				+"<td class='tdhead'>负责部门</td>"     
				+"<td><input type='text' name='projectOrgan[]'></td>"
				+"<td class='tdhead'>预期效益</td>"
				+"<td><input type='text' name='projectEffect[]'></td></tr>"
				+"<tr><td class='tdhead' colspan=6><input type='button' onclick='removeProject(this);' value='删除该重点工程'/></td></tr></table></td></tr>";
				//+"<tr align='right'><td align='right' class='tdhead'><input type='button' onclick='addProject();' value='添加重点工程'/></td></tr>";  
			$("#project").append(str1);                                                                                                                                                                                                                          
		}
		function removeProject(red1)
		{
			project_mark=project_mark-1; 
			$(red1).parent().parent().parent().parent().parent().remove();
			
		}
//添加其他矿种选矿回收率
var rate_mark = 1;
				function addminerate()
				{       
					rate_mark=rate_mark+1; 
					var str2="<tr><td><table class='formView' align='center' width='100%'><tr><td colspan=4 class='tdtitle'>矿种"+rate_mark+"</td></tr>"
						+"<tr><td class='tdhead'>矿种名称</td>"
						
						+"<td><select id='"+rate_mark+"'  onchange='getchild(this.id)' width='90%' name='oreNametype[]'>"
						+	"<option >请选择</option>"
						+	"<option value='能源矿产'>能源矿产</option>"
						+	"<option value='金属矿产'>金属矿产</option>"
						+	"<option value='非金属矿产'>非金属矿产</option>"
						+"</select>" 
						+"<select id='child"+rate_mark+"'  name='orename[]' width='90%'>"
						+"	<option >请选择</option>"
						+"</select></td> " 
						
						//+"<td><input type='text' name='orename[]'></td>"
						+"<td class='tdhead'>矿种选择</td>"
						+"<td><select name='oretype[]'><option value='主矿种'>主矿种</option><option value='伴生矿种'>伴生矿种</option></select></td></tr>"
						+"<tr><td class='tdhead' colspan=4><input type='button' value='添加矿种' onclick='addminerate();'><input type='button' value='删除此矿种' onclick='ramoveminerate(this);'></td></tr></table></td></tr>";                                                                                                                      
					$("#ore").append(str2);                                                                                                                                                                                                                      
				}
				function ramoveminerate(red2)
				{
					
					rate_mark=rate_mark-1; 
					$(red2).parent().parent().parent().parent().parent().remove();
				}
				//var childval;
				//var childval2;
				
				function getchild(red)
				{{/literal}
				
				var myArray = new Array({foreach from=$nyore item=child name=myarray}
				{if $smarty.foreach.myarray.last}"{$child.name}"
								{else}"{$child.name}",{/if}{/foreach});
				var myArray2 = new Array({foreach from=$jsore item=child name=myarray}
				{if $smarty.foreach.myarray.last}"{$child.name}"
								{else}"{$child.name}",{/if}{/foreach});
				var myArray3 = new Array({foreach from=$fjsore item=child name=myarray}
				{if $smarty.foreach.myarray.last}"{$child.name}"
								{else}"{$child.name}",{/if}{/foreach});
				
				{literal}
				var str1 = "#child"+red;
				var str2;var str3;var str4;
				for(var i=0;i<myArray.length;i++)
				{
				 str2=str2+"<option value='"+myArray[i]+"'>"+myArray[i]+"</option>";
				}
				for(var i=0;i<myArray2.length;i++)
				{
				 str3=str3+"<option value='"+myArray2[i]+"'>"+myArray2[i]+"</option>";
				}
				for(var i=0;i<myArray3.length;i++)
				{
				 str4=str4+"<option value='"+myArray3[i]+"'>"+myArray3[i]+"</option>";
				}
					//alert(str2);
					
					if($("#"+red).val()=="能源矿产")
						{$("#child"+red).html(" ");
						$("#child"+red).append(str2);}
						
					if($("#"+red).val()=="金属矿产")
						{$("#child"+red).html(" ");
						$("#child"+red).append(str3);}
					if($("#"+red).val()=="非金属矿产")
						{$("#child"+red).html(" ");
						$("#child"+red).append(str4);}
				}
				function changeyears()
        {
        var x=document.getElementById("basedataJiqizhi").value;
		if(x=="") return;
		var x1=parseInt(x)+parseInt(1);
		var x2=parseInt(x)+parseInt(2);
		var x3=parseInt(x)+parseInt(3);
		var x4=parseInt(x)+parseInt(4);
		var x5=parseInt(x)+parseInt(5);

		//矿山开采回收率
        document.getElementById("t_basedataDigreturnrate_bef3").innerHTML=x-2+"年实际值";
		document.getElementById("t_basedataDigreturnrate_bef2").innerHTML=x-1+"年实际值";
		document.getElementById("t_basedataDigreturnrate_bef1").innerHTML=x+"年实际值";
		document.getElementById("t_basedataDigreturnrate_pre1").innerHTML=x1+"年规划值";
		document.getElementById("t_basedataDigreturnrate_pre2").innerHTML=x2+"年规划值";
		document.getElementById("t_basedataDigreturnrate_pre3").innerHTML=x3+"年规划值";
		document.getElementById("t_basedataDigreturnrate_pre4").innerHTML=x4+"年规划值";
		document.getElementById("t_basedataDigreturnrate_pre5").innerHTML=x5+"年规划值";
		document.getElementById("t_basedataDigreturnrate_pre1real").innerHTML=x1+"年实际值";
		document.getElementById("t_basedataDigreturnrate_pre2real").innerHTML=x2+"年实际值";
		document.getElementById("t_basedataDigreturnrate_pre3real").innerHTML=x3+"年实际值";
		document.getElementById("t_basedataDigreturnrate_pre4real").innerHTML=x4+"年实际值";
		document.getElementById("t_basedataDigreturnrate_pre5real").innerHTML=x5+"年实际值";
		//矿山选矿回收率
		document.getElementById("t_basedataSepareturnrate_bef3").innerHTML=x-2+"年实际值";
		document.getElementById("t_basedataSepareturnrate_bef2").innerHTML=x-1+"年实际值";
		document.getElementById("t_basedataSepareturnrate_bef1").innerHTML=x+"年实际值";
		document.getElementById("t_basedataSepareturnrate_pre1").innerHTML=x1+"年规划值";
		document.getElementById("t_basedataSepareturnrate_pre2").innerHTML=x2+"年规划值";
		document.getElementById("t_basedataSepareturnrate_pre3").innerHTML=x3+"年规划值";
		document.getElementById("t_basedataSepareturnrate_pre4").innerHTML=x4+"年规划值";
		document.getElementById("t_basedataSepareturnrate_pre5").innerHTML=x5+"年规划值";
		document.getElementById("t_basedataSepareturnrate_pre1real").innerHTML=x1+"年实际值";
		document.getElementById("t_basedataSepareturnrate_pre2real").innerHTML=x2+"年实际值";
		document.getElementById("t_basedataSepareturnrate_pre3real").innerHTML=x3+"年实际值";
		document.getElementById("t_basedataSepareturnrate_pre4real").innerHTML=x4+"年实际值";
		document.getElementById("t_basedataSepareturnrate_pre5real").innerHTML=x5+"年实际值";
		//实际生产规模
		document.getElementById("t_basedataProduceScale_bef3").innerHTML=x-2+"年实际值";
		document.getElementById("t_basedataProduceScale_bef2").innerHTML=x-1+"年实际值";
		document.getElementById("t_basedataProduceScale_bef1").innerHTML=x+"年实际值";
		document.getElementById("t_basedataProduceScale_pre1").innerHTML=x1+"年规划值";
		document.getElementById("t_basedataProduceScale_pre2").innerHTML=x2+"年规划值";
		document.getElementById("t_basedataProduceScale_pre3").innerHTML=x3+"年规划值";
		document.getElementById("t_basedataProduceScale_pre4").innerHTML=x4+"年规划值";
		document.getElementById("t_basedataProduceScale_pre5").innerHTML=x5+"年规划值";
		document.getElementById("t_basedataProduceScale_pre1real").innerHTML=x1+"年实际值";
		document.getElementById("t_basedataProduceScale_pre2real").innerHTML=x2+"年实际值";
		document.getElementById("t_basedataProduceScale_pre3real").innerHTML=x3+"年实际值";
		document.getElementById("t_basedataProduceScale_pre4real").innerHTML=x4+"年实际值";
		document.getElementById("t_basedataProduceScale_pre5real").innerHTML=x5+"年实际值";
		//矿山总产值
		document.getElementById("t_basedataValue_bef3").innerHTML=x-2+"年实际值";
		document.getElementById("t_basedataValue_bef2").innerHTML=x-1+"年实际值";
		document.getElementById("t_basedataValue_bef1").innerHTML=x+"年实际值";
		document.getElementById("t_basedataValue_pre1").innerHTML=x1+"年规划值";
		document.getElementById("t_basedataValue_pre2").innerHTML=x2+"年规划值";
		document.getElementById("t_basedataValue_pre3").innerHTML=x3+"年规划值";
		document.getElementById("t_basedataValue_pre4").innerHTML=x4+"年规划值";
		document.getElementById("t_basedataValue_pre5").innerHTML=x5+"年规划值";
		document.getElementById("t_basedataValue_pre1real").innerHTML=x1+"年实际值";
		document.getElementById("t_basedataValue_pre2real").innerHTML=x2+"年实际值";
		document.getElementById("t_basedataValue_pre3real").innerHTML=x3+"年实际值";
		document.getElementById("t_basedataValue_pre4real").innerHTML=x4+"年实际值";
		document.getElementById("t_basedataValue_pre5real").innerHTML=x5+"年实际值";
		//矿山企业利税 basedataFee
		document.getElementById("t_basedataFee_bef3").innerHTML=x-2+"年实际值";
		document.getElementById("t_basedataFee_bef2").innerHTML=x-1+"年实际值";
		document.getElementById("t_basedataFee_bef1").innerHTML=x+"年实际值";
		document.getElementById("t_basedataFee_pre1").innerHTML=x1+"年规划值";
		document.getElementById("t_basedataFee_pre2").innerHTML=x2+"年规划值";
		document.getElementById("t_basedataFee_pre3").innerHTML=x3+"年规划值";
		document.getElementById("t_basedataFee_pre4").innerHTML=x4+"年规划值";
		document.getElementById("t_basedataFee_pre5").innerHTML=x5+"年规划值";
		document.getElementById("t_basedataFee_pre1real").innerHTML=x1+"年实际值";
		document.getElementById("t_basedataFee_pre2real").innerHTML=x2+"年实际值";
		document.getElementById("t_basedataFee_pre3real").innerHTML=x3+"年实际值";
		document.getElementById("t_basedataFee_pre4real").innerHTML=x4+"年实际值";
		document.getElementById("t_basedataFee_pre5real").innerHTML=x5+"年实际值";
		//basedataProfit
	    document.getElementById("t_basedataProfit_bef3").innerHTML=x-2+"年实际值";
		document.getElementById("t_basedataProfit_bef2").innerHTML=x-1+"年实际值";
		document.getElementById("t_basedataProfit_bef1").innerHTML=x+"年实际值";
		document.getElementById("t_basedataProfit_pre1").innerHTML=x1+"年规划值";
		document.getElementById("t_basedataProfit_pre2").innerHTML=x2+"年规划值";
		document.getElementById("t_basedataProfit_pre3").innerHTML=x3+"年规划值";
		document.getElementById("t_basedataProfit_pre4").innerHTML=x4+"年规划值";
		document.getElementById("t_basedataProfit_pre5").innerHTML=x5+"年规划值";
		document.getElementById("t_basedataProfit_pre1real").innerHTML=x1+"年实际值";
		document.getElementById("t_basedataProfit_pre2real").innerHTML=x2+"年实际值";
		document.getElementById("t_basedataProfit_pre3real").innerHTML=x3+"年实际值";
		document.getElementById("t_basedataProfit_pre4real").innerHTML=x4+"年实际值";
		document.getElementById("t_basedataProfit_pre5real").innerHTML=x5+"年实际值";
        }
{/literal}
</script>
<form name="form" action="/minedata/files/{$mineid}" method="post" enctype="multipart/form-data">
<div id="tabs">
   <ul>
       <li><a href="#tabs-1">基本信息</a></li>
	   <li><a href="#tabs-2">企业文化</a></li>
	   <li><a href="#tabs-3">国土审核意见</a></li>
	   <li><a href="#tabs-4">省级审核意见</a></li>
	   <li><a href="#tabs-5">行业意见</a></li>
	   <li><a href="#tabs-6">市级审核意见</a></li>
	   <li><a href="#tabs-7">县级审核意见</a></li>
	</ul>
   
	<div id="tabs-1"><!--基本信息-->
	<table class="formView" align="center" id="basedata" width='100%'>
		<tr>
		        <td class='tdtitle' colspan=4 algin='center'>基本信息</td>
		</tr>
		</table>
	<table align = "center" >
		{if $QuanXian !=1}
		<tr>
			<td align="left">请选择文件：</td>
			<td><input type="file" name="file1" id="file1" style="width:400px"/></td>
		</tr>{/if}
	</table>

<table class="listView" align="center" width="100%">
        <thead>
		<tr>
				<th>文件名</th>
				<th>所属矿山</th>
				<th>文件类型</th>
				<th colspan=2 width="8%">操作</th>
		</tr>
		</thead>
        {foreach from=$MArray item=data}
	{if $data[2]=="1" }
		<tr>
            <td><img src="http://localhost/uploadDir/{$data[1]}/{$data[0]}" width="80%" style="height:60px;width:80px"></td>
			<td>{$data[1]}</td>
			<td>{$data[5]}</td>
			<td><a href="/predata/DownloadFile/{$data[3]}">下载</a></td>
			{if $QuanXian !=1}<td><a href="/minedata/DeleteFiles/{$data[3]}">删除</a></td>{/if}
        </tr>           
		
		{/if}
        {/foreach}
     </table>
     
</div>


     <div id="tabs-2"><!--企业文化-->
	<table class="formView" align="center" id="enterprise_cul" width='100%'>
		<tr>
		        <td class='tdtitle' colspan=4 algin='center'>企业文化</td>
		</tr>
		</table>
		
	<table align = "center" >
		{if $QuanXian !=1}
		<tr>
			<td align="left">请选择文件：</td>
			<td><input type="file" name="file2" id="file2" style="width:400px"/></td>
		</tr>{/if}
	</table>

<table class="listView" align="center" width="100%">
        <thead>
		<tr>
				<th>文件名</th>
				<th>所属矿山</th>
				<th>文件类型</th>
				<th colspan=2 width="8%">操作</th>
		</tr>
		</thead>
        {foreach from=$MArray item=data}
	{if $data[2]=="2" }
		<tr>
            <td>{if $data[5]=="image/jpeg" }<img src="http://localhost/uploadDir/{$data[1]}/{$data[0]}" width="80%" style="height:60px;width:80px">{/if}{$data[0]}</td>
			<td>{$data[1]}</td>
			<td>{$data[5]}</td>
			<td><a href="/predata/DownloadFile/{$data[3]}">下载</a></td>
			{if $QuanXian !=1}<td><a href="/minedata/DeleteFiles/{$data[3]}">删除</a></td>{/if}
        </tr>           
		
		{/if}
        {/foreach}
     </table>
     </div>

  
     <div id="tabs-3"><!--国土审核意见-->
	<table class="formView" align="center" id="audit_info" width='100%'>
		<tr>
		        <td class='tdtitle' colspan=4 algin='center'>审核意见</td>
		</tr>
		</table>
		
	<table align = "center" >
		{if $QuanXian !=1}
		<tr>
			<td align="left">请选择文件：</td>
			<td><input type="file" name="file3" id="file3" style="width:400px"/></td>
		</tr>{/if}
	</table>

<table class="listView" align="center" width="100%">
        <thead>
		<tr>
				<th>文件名</th>
				<th>所属矿山</th>
				<th>文件类型</th>
				<th colspan=2 width="8%">操作</th>
		</tr>
		</thead>
        {foreach from=$MArray item=data}
	{if $data[2]=="3" }
		<tr>
            <td><img src="http://localhost/uploadDir/{$data[1]}/{$data[0]}" width="80%" style="height:60px;width:80px"></td>
			<td>{$data[1]}</td>
			<td>{$data[5]}</td>
			<td><a href="/predata/DownloadFile/{$data[3]}">下载</a></td>
			{if $QuanXian !=1}<td><a href="/minedata/DeleteFiles/{$data[3]}">删除</a></td>{/if}
        </tr>           
		
		{/if}
        {/foreach}
     </table>
   </div>
 
 <div id="tabs-4"><!--省级审核意见-->
	<table class="formView" align="center" id="audit_info" width='100%'>
		<tr>
		        <td class='tdtitle' colspan=4 algin='center'>审核意见</td>
		</tr>
		</table>
		
	<table align = "center" >
		{if $QuanXian !=1}
		<tr>
			<td align="left">请选择文件：</td>
			<td><input type="file" name="file4" id="file4" style="width:400px"/></td>
		</tr>{/if}
	</table>

<table class="listView" align="center" width="100%">
        <thead>
		<tr>
				<th>文件名</th>
				<th>所属矿山</th>
				<th>文件类型</th>
				<th colspan=2 width="8%">操作</th>
		</tr>
		</thead>
        {foreach from=$MArray item=data}
	{if $data[2]=="4" }
		<tr>
            <td><img src="http://localhost/uploadDir/{$data[1]}/{$data[0]}" width="80%" style="height:60px;width:80px"></td>
			<td>{$data[1]}</td>
			<td>{$data[5]}</td>
			<td><a href="/predata/DownloadFile/{$data[3]}">下载</a></td>
			{if $QuanXian !=1}<td><a href="/minedata/DeleteFiles/{$data[3]}">删除</a></td>{/if}
        </tr>           
		
		{/if}
        {/foreach}
     </table>
   </div>

   <div id="tabs-5"><!--行业审核意见-->
	<table class="formView" align="center" id="audit_info" width='100%'>
		<tr>
		        <td class='tdtitle' colspan=4 algin='center'>审核意见</td>
		</tr>
		</table>
		
	<table align = "center" >
		{if $QuanXian !=1}
		<tr>
			<td align="left">请选择文件：</td>
			<td><input type="file" name="file5" id="file5" style="width:400px"/></td>
		</tr>{/if}
	</table>

<table class="listView" align="center" width="100%">
        <thead>
		<tr>
				<th>文件名</th>
				<th>所属矿山</th>
				<th>文件类型</th>
				<th colspan=2 width="8%">操作</th>
		</tr>
		</thead>
        {foreach from=$MArray item=data}
	{if $data[2]=="5" }
		<tr>
            <td><img src="http://localhost/uploadDir/{$data[1]}/{$data[0]}" width="80%" style="height:60px;width:80px"></td>
			<td>{$data[1]}</td>
			<td>{$data[5]}</td>
			<td><a href="/predata/DownloadFile/{$data[3]}">下载</a></td>
			{if $QuanXian !=1}<td><a href="/minedata/DeleteFiles/{$data[3]}">删除</a></td>{/if}
        </tr>           
		
		{/if}
        {/foreach}
     </table>
   </div>

<div id="tabs-6"><!--市级审核意见-->
	<table class="formView" align="center" id="audit_info" width='100%'>
		<tr>
		        <td class='tdtitle' colspan=4 algin='center'>审核意见</td>
		</tr>
		</table>
		
	<table align = "center" >
		{if $QuanXian !=1}
		<tr>
			<td align="left">请选择文件：</td>
			<td><input type="file" name="file6" id="file6" style="width:400px"/></td>
		</tr>{/if}
	</table>

<table class="listView" align="center" width="100%">
        <thead>
		<tr>
				<th>文件名</th>
				<th>所属矿山</th>
				<th>文件类型</th>
				<th colspan=2 width="8%">操作</th>
		</tr>
		</thead>
        {foreach from=$MArray item=data}
	{if $data[2]=="6" }
		<tr>
            <td><img src="http://localhost/uploadDir/{$data[1]}/{$data[0]}" width="80%" style="height:60px;width:80px"></td>
			<td>{$data[1]}</td>
			<td>{$data[5]}</td>
			<td><a href="/predata/DownloadFile/{$data[3]}">下载</a></td>
			{if $QuanXian !=1}<td><a href="/minedata/DeleteFiles/{$data[3]}">删除</a></td>{/if}
        </tr>           
		
		{/if}
        {/foreach}
     </table>
   </div>

   <div id="tabs-7"><!--县级审核意见-->
	<table class="formView" align="center" id="audit_info" width='100%'>
		<tr>
		        <td class='tdtitle' colspan=4 algin='center'>审核意见</td>
		</tr>
		</table>
		
	<table align = "center" >
		{if $QuanXian !=1}
		<tr>
			<td align="left">请选择文件：</td>
			<td><input type="file" name="file7" id="file7" style="width:400px"/></td>
		</tr>{/if}
	</table>

<table class="listView" align="center" width="100%">
        <thead>
		<tr>
				<th>文件名</th>
				<th>所属矿山</th>
				<th>文件类型</th>
				<th colspan=2 width="8%">操作</th>
		</tr>
		</thead>
        {foreach from=$MArray item=data}
	{if $data[2]=="7" }
		<tr>
            <td><img src="http://localhost/uploadDir/{$data[1]}/{$data[0]}" width="80%" style="height:60px;width:80px"></td>
			<td>{$data[1]}</td>
			<td>{$data[5]}</td>
			<td><a href="/predata/DownloadFile/{$data[3]}">下载</a></td>
			{if $QuanXian !=1}<td><a href="/minedata/DeleteFiles/{$data[3]}">删除</a></td>{/if}
        </tr>           
		
		{/if}
        {/foreach}
     </table>
   </div>
{if $QuanXian !=1}<input type="submit" name="submit" value="导入文件">{/if}
<input type="button" onclick="location.href='/minedata/ListMineData'" value="返回" />
</div>
</form>