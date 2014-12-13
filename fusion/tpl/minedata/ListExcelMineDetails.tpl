<script type="text/javascript">
{literal}	
$(document).ready(function(){
    loadchecktime1();
	loadchecktime2();
	loadchecktime3();
	loadchecktime4();
	loadchecktime5();
	loadchecktime6();
	loadchecktime7();
	loadchecktime8();
	loadchecktime10();
	loadchecktime11();
	loadchecktime12();
	loadchecktime13();
	loadchecktime14();
	loadchecktime15();
	loadchecktime16();
	loadchecktime17();
	loadchecktime18();
	loadchecktime19();
	loadchecktime20();
	loadchecktime21();
	loadchecktime22();
	changeyears();
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
	$("#button_complexProrate").click(function(){
	      $('#bef3_pre5_complexProrate').toggle();
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
	//综合利用的详情
	$(".button_xiangqing").click(function(){
		$(this).parents("table").next("table").toggle("slow");
	});

	$(".button_xiangqing1").click(function(){
		$(this).parents("table").next("table").next("table").toggle("slow");
	});
	//下面是跟矿种有关的按钮，需要动态添加
{/literal}
								
	{foreach from=$ores item=o}
	$("#button_orehuishou{$o._o22}").click(function(){literal}{{/literal}$('#bef3_pre5_orehuishou{$o._o22}').toggle();{literal}}){/literal};
	$("#button_oreGoback{$o._o22}").click(function(){literal}{{/literal}$('#bef3_pre5_oreGoback{$o._o22}').toggle();{literal}}){/literal};
	$("#button_basedataorelevelh{$o._o22}").click(function(){literal}{{/literal}$('#oreLevelhs{$o._o22}').toggle();{literal}}{/literal});
	$("#button_basedataorelevela{$o._o22}").click(function(){literal}{{/literal}$('#oreLevelas{$o._o22}').toggle();{literal}}{/literal});
	{/foreach}
{literal}
});
//	for(var i=0;i<{$flag_j};i++)

//	{
//		var j=i;
//		String(j);
//		var sid='#bef3_pre5_orehuishou'+j;
//		$("#button_orehuishou"+j).click(function(){$(sid).toggle();	});
//	}
//}); 
	// function testajax()
		//{
			//alert("/minedata/SaveMineData/"+{/literal}{$mineid}{literal});
		//	$.ajax({type:"POST",url:"/minedata/UpdateMineData/"+{/literal}{$mineid}{literal},data:$("#testform").serializeArray(),success:function(msg){alert("保存成功");}});
			
	//	} 
function loadchecktime1()
	{
	  var x=document.getElementById("legal1Deadlinend");
	  if(x.value == "") return ;
	  var arys1 = x.value.split('-');
      var sdate=new Date(arys1[0],arys1[1]-1,arys1[2]); 
	  var myDate = new Date();
	  var old = sdate.getTime();
	  var now = myDate.getTime();
	  if(old < now)
	  {
	  x.style.background="yellow";
	  }
	  else
	  {
	  x.style.background="white";
	  }
	}
	function loadchecktime2()
	{
	  var x=document.getElementById("legal2Deadlinend");
	   if(x.value == "") return ;
	  var arys1 = x.value.split('-');
      var sdate=new Date(arys1[0],arys1[1]-1,arys1[2]); 
	  var myDate = new Date();
	  var old = sdate.getTime();
	  var now = myDate.getTime();
	  if(old < now)
	  {
	  x.style.background="yellow";
	  }
	  else
	  {
	  x.style.background="white";
	  }
	}
	function loadchecktime3()
	{
	  var x=document.getElementById("legal3Deadlinend");
	   if(x.value == "") return ;
	  var arys1 = x.value.split('-');
      var sdate=new Date(arys1[0],arys1[1]-1,arys1[2]); 
	  var myDate = new Date();
	  var old = sdate.getTime();
	  var now = myDate.getTime();
	  if(old < now)
	  {
	  x.style.background="yellow";
	  }
	  else
	  {
	  x.style.background="white";
	  }
	}
	function loadchecktime4()
	{
	  var x=document.getElementById("legal4Deadlinend");
	   if(x.value == "") return ;
	  var arys1 = x.value.split('-');
      var sdate=new Date(arys1[0],arys1[1]-1,arys1[2]); 
	  var myDate = new Date();
	  var old = sdate.getTime();
	  var now = myDate.getTime();
	  if(old < now)
	  {
	  x.style.background="yellow";
	  }
	  else
	  {
	  x.style.background="white";
	  }
	}
	function loadchecktime5()
	{
	  var x=document.getElementById("legal5Deadlinend");
	   if(x.value == "") return ;
	  var arys1 = x.value.split('-');
      var sdate=new Date(arys1[0],arys1[1]-1,arys1[2]); 
	  var myDate = new Date();
	  var old = sdate.getTime();
	  var now = myDate.getTime();
	  if(old < now)
	  {
	  x.style.background="yellow";
	  }
	  else
	  {
	  x.style.background="white";
	  }
	}
	function loadchecktime6()
	{
	  var x=document.getElementById("legal6Deadlinend");
	   if(x.value == "") return ;
	  var arys1 = x.value.split('-');
      var sdate=new Date(arys1[0],arys1[1]-1,arys1[2]); 
	  var myDate = new Date();
	  var old = sdate.getTime();
	  var now = myDate.getTime();
	  if(old < now)
	  {
	  x.style.background="yellow";
	  }
	  else
	  {
	  x.style.background="white";
	  }
	}
	function loadchecktime7()
	{
	  var x=document.getElementById("legal7Deadlinend");
	   if(x.value == "") return ;
	  var arys1 = x.value.split('-');
      var sdate=new Date(arys1[0],arys1[1]-1,arys1[2]); 
	  var myDate = new Date();
	  var old = sdate.getTime();
	  var now = myDate.getTime();
	  if(old < now)
	  {
	  x.style.background="yellow";
	  }
	  else
	  {
	  x.style.background="white";
	  }
	}
	function loadchecktime8()
	{
	  var x=document.getElementById("legal8Deadlinend");
	   if(x.value == "") return ;
	  var arys1 = x.value.split('-');
      var sdate=new Date(arys1[0],arys1[1]-1,arys1[2]); 
	  var myDate = new Date();
	  var old = sdate.getTime();
	  var now = myDate.getTime();
	  if(old < now)
	  {
	  x.style.background="yellow";
	  }
	  else
	  {
	  x.style.background="white";
	  }
	}function loadchecktime10()
	{
	  var x=document.getElementById("legal10Deadlinend");
	   if(x.value == "") return ;
	  var arys1 = x.value.split('-');
      var sdate=new Date(arys1[0],arys1[1]-1,arys1[2]); 
	  var myDate = new Date();
	  var old = sdate.getTime();
	  var now = myDate.getTime();
	  if(old < now)
	  {
	  x.style.background="yellow";
	  }
	  else
	  {
	  x.style.background="white";
	  }
	}
	function loadchecktime11()
	{
	  var x=document.getElementById("legal11Deadlinend");
	   if(x.value == "") return ;
	  var arys1 = x.value.split('-');
      var sdate=new Date(arys1[0],arys1[1]-1,arys1[2]); 
	  var myDate = new Date();
	  var old = sdate.getTime();
	  var now = myDate.getTime();
	  if(old < now)
	  {
	  x.style.background="yellow";
	  }
	  else
	  {
	  x.style.background="white";
	  }
	}
	function loadchecktime12()
	{
	  var x=document.getElementById("legal12Deadlinend");
	   if(x.value == "") return ;
	  var arys1 = x.value.split('-');
      var sdate=new Date(arys1[0],arys1[1]-1,arys1[2]); 
	  var myDate = new Date();
	  var old = sdate.getTime();
	  var now = myDate.getTime();
	  if(old < now)
	  {
	  x.style.background="yellow";
	  }
	  else
	  {
	  x.style.background="white";
	  }
	}
	function loadchecktime13()
	{
	  var x=document.getElementById("legal13Deadlinend");
	   if(x.value == "") return ;
	  var arys1 = x.value.split('-');
      var sdate=new Date(arys1[0],arys1[1]-1,arys1[2]); 
	  var myDate = new Date();
	  var old = sdate.getTime();
	  var now = myDate.getTime();
	  if(old < now)
	  {
	  x.style.background="yellow";
	  }
	  else
	  {
	  x.style.background="white";
	  }
	}
	function loadchecktime14()
	{
	  var x=document.getElementById("legal4Deadlinend");
	   if(x.value == "") return ;
	  var arys1 = x.value.split('-');
      var sdate=new Date(arys1[0],arys1[1]-1,arys1[2]); 
	  var myDate = new Date();
	  var old = sdate.getTime();
	  var now = myDate.getTime();
	  if(old < now)
	  {
	  x.style.background="yellow";
	  }
	  else
	  {
	  x.style.background="white";
	  }
	}
	function loadchecktime15()
	{
	  var x=document.getElementById("legal15Deadlinend");
	   if(x.value == "") return ;
	  var arys1 = x.value.split('-');
      var sdate=new Date(arys1[0],arys1[1]-1,arys1[2]); 
	  var myDate = new Date();
	  var old = sdate.getTime();
	  var now = myDate.getTime();
	  if(old < now)
	  {
	  x.style.background="yellow";
	  }
	  else
	  {
	  x.style.background="white";
	  }
	}
	function loadchecktime16()
	{
	  var x=document.getElementById("legal16Deadlinend");
	   if(x.value == "") return ;
	  var arys1 = x.value.split('-');
      var sdate=new Date(arys1[0],arys1[1]-1,arys1[2]); 
	  var myDate = new Date();
	  var old = sdate.getTime();
	  var now = myDate.getTime();
	  if(old < now)
	  {
	  x.style.background="yellow";
	  }
	  else
	  {
	  x.style.background="white";
	  }
	}
	function loadchecktime17()
	{
	  var x=document.getElementById("legalSafeDeadlinend");
	   if(x.value == "") return ;
	  var arys1 = x.value.split('-');
      var sdate=new Date(arys1[0],arys1[1]-1,arys1[2]); 
	  var myDate = new Date();
	  var old = sdate.getTime();
	  var now = myDate.getTime();
	  if(old < now)
	  {
	  x.style.background="yellow";
	  }
	  else
	  {
	  x.style.background="white";
	  }
	}
	function loadchecktime18()
	{
	  var x=document.getElementById("legalWaterDeadlinend");
	   if(x.value == "") return ;
	  var arys1 = x.value.split('-');
      var sdate=new Date(arys1[0],arys1[1]-1,arys1[2]); 
	  var myDate = new Date();
	  var old = sdate.getTime();
	  var now = myDate.getTime();
	  if(old < now)
	  {
	  x.style.background="yellow";
	  }
	  else
	  {
	  x.style.background="white";
	  }
	}
	function loadchecktime19()
	{
	  var x=document.getElementById("legalLandDeadlinend");
	   if(x.value == "") return ;
	  var arys1 = x.value.split('-');
      var sdate=new Date(arys1[0],arys1[1]-1,arys1[2]); 
	  var myDate = new Date();
	  var old = sdate.getTime();
	  var now = myDate.getTime();
	  if(old < now)
	  {
	  x.style.background="yellow";
	  }
	  else
	  {
	  x.style.background="white";
	  }
	}
	function loadchecktime20()
	{
	  var x=document.getElementById("legalHuanjingpifuDeadlinend");
	   if(x.value == "") return ;
	  var arys1 = x.value.split('-');
      var sdate=new Date(arys1[0],arys1[1]-1,arys1[2]); 
	  var myDate = new Date();
	  var old = sdate.getTime();
	  var now = myDate.getTime();
	  if(old < now)
	  {
	  x.style.background="yellow";
	  }
	  else
	  {
	  x.style.background="white";
	  }
	}
	function loadchecktime21()
	{
	  var x=document.getElementById("legalDizhipifuDeadlinend");
	   if(x.value == "") return ;
	  var arys1 = x.value.split('-');
      var sdate=new Date(arys1[0],arys1[1]-1,arys1[2]); 
	  var myDate = new Date();
	  var old = sdate.getTime();
	  var now = myDate.getTime();
	  if(old < now)
	  {
	  x.style.background="yellow";
	  }
	  else
	  {
	  x.style.background="white";
	  }
	}
	function loadchecktime22()
	{
	  var x=document.getElementById("legalZaihaipifuDeadlinend");
	   if(x.value == "") return ;
	  var arys1 = x.value.split('-');
      var sdate=new Date(arys1[0],arys1[1]-1,arys1[2]); 
	  var myDate = new Date();
	  var old = sdate.getTime();
	  var now = myDate.getTime();
	  if(old < now)
	  {
	  x.style.background="yellow";
	  }
	  else
	  {
	  x.style.background="white";
	  }
	}
    function loadchecktime(x)
	{
	  if(x.value == "") return ;
	  var arys1 = x.value.split('-');
      var sdate=new Date(arys1[0],arys1[1]-1,arys1[2]); 
	  var myDate = new Date();
	  var old = sdate.getTime();
	  var now = myDate.getTime();
	  if(old < now)
	  {
	  x.style.background="yellow";
	  }
	  else
	  {
	  x.style.background="white";
	  }
	  }
		function add()
		{                
			var str="<tr><td><table width='100%' class='formView' align='center'><tr><td width='50%' colspan=4>专家</td></tr>"
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
		function removeExpert(red)
		{
			$(red).parent().parent().parent().parent().parent().remove();	
		}
//重点工程添加删除函数
		function addProject()
		{        
			var str1="<tr><td><table calss='formViem' align='center' id='projectDetails'><tr><td colspan=6>重点工程信息</td></tr>"
			    +"<tr><td class='tdhead'>项目编号</td>"
				+"<td><input type='text' name='projectNum[]'></td>"
				+"<td class='tdhead'>工程名称</td>"
				+"<td><input type='text' name='projectName[]'></td>"
				+"<td class='tdhead'>工程类型</td>"
				+"<td><select name='projectType[]'><option value='依法办矿工程'>依法办矿工程</option><option value='规范管理工程'>规范管理工程</option><option value='资源开发与综合利用工程'>资源开发与综合利用工程</option><option value='技术创新工程'>技术创新工程</option><option value='节能减排工程'>节能减排工程</option><option value='矿山环境恢复治理类工程'>矿山环境恢复治理类工程</option><option value='土地复垦工程'>土地复垦工程</option><option value='和谐社区建设类工程'>和谐社区建设类工程</option><option value='企业文化工程'>企业文化工程</option></select></td></tr>"
				+"<tr><td class='tdhead'>工程内容</td>"
				+"<td colspan=5><textarea cols='60' rows='3' name='projectDetail[]'></textarea></td></tr>"
				+"<tr><td class='tdhead'>开始年份</td>"
				+"<td><input type='text' name='projectlWorktime[]'></td>"
				+"<td class='tdhead'>结束年份</td>"
				+"<td><input type='text' name='projectStarttime[]'></td>"  					
				+"<td class='tdhead'>工程投资</td>"
				+"<td><input type='text' name='projectCost[]'></td></tr>"  //之前都是好的
				+"<tr><td class='tdhead'>资金筹措</td>"
				+"<td><input type='text' name='projectMoney[]'></td>"   								
				+"<td class='tdhead'>负责部门</td>"     
				+"<td><input type='text' name='projectOrgan[]'></td>"
				+"</tr><tr><td class='tdhead'>预期效益</td><td colspan=5><textarea cols='60' rows='3' name='projectEffect[]'></textarea></td></tr>"
				+"<tr><td class='tdhead'>完成情况</td><td colspan=5><textarea cols='60' rows='3' name='projectFinish1[]'></textarea></td></tr>"
				+"<tr><td class='tdhead'>完成情况</td><td colspan=5><textarea cols='60' rows='3' name='projectFinish2[]'></textarea></td></tr>"
				+"<tr><td class='tdhead'>完成情况</td><td colspan=5><textarea cols='60' rows='3' name='projectFinish3[]'></textarea></td></tr>"
				+"<tr><td class='tdhead'>完成情况</td><td colspan=5><textarea cols='60' rows='3' name='projectFinish4[]'></textarea></td></tr>"
				+"<tr><td class='tdhead'>完成情况</td><td colspan=5><textarea cols='60' rows='3' name='projectFinish5[]'></textarea></td></tr>"
				+"<tr><td class='tdhead' colspan=6><input type='button' onclick='removeProject(this);' value='删除该重点工程'/></td></tr></table></td></tr>";
				//+"<tr align='right'><td align='right' class='tdhead'><input type='button' onclick='addProject();' value='添加重点工程'/></td></tr>";  
			$("#project").append(str1);                                                                                                                                                                                                                          
		}
		function removeProject(red1)
		{ 
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
				function ramoveminerate(red2)
				{
					$(red2).parent().parent().parent().parent().parent().remove();
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
<form id="testform" name="form" action="/minedata/SaveMineData/{$mineid}" enctype="multipart/form-data" method="post">

<div id="tabs">
   <ul>
       <li><a href="#tabs-1">基本信息</a></li>
	   <li><a href="#tabs-2">依法办矿</a></li>
	   <li><a href="#tabs-3">规范管理</a></li>
	   <li><a href="#tabs-4">综合利用</a></li>
	   <li><a href="#tabs-5">科技创新</a></li>
	   <li><a href="#tabs-6">节能减排</a></li>
	   <li><a href="#tabs-7">环境保护</a></li>
	   <li><a href="#tabs-8">土地复垦</a></li>
	   <li><a href="#tabs-9">社区和谐</a></li>
	   <li><a href="#tabs-10">企业文化</a></li>
	   <li><a href="#tabs-11">重点工程</a></li>
	   <li><a href="#tabs-12">审核意见</a></li>
	   <li><a href="#tabs-13">专家信息</a></li>
	</ul>
   
	<div id="tabs-1"><!--基本信息-->
	<table class="formView" align="center" id="basedata" width='100%'>
		<tr>
		        <td class='tdtitle' colspan=4 algin='center'>基本信息</td>
		</tr>
		<tr>
			<td class="tdhead">规划报告名称</td><td ><textarea cols="30" rows="2" name="basedataBgname" >{$declaredata[1]}</textarea></td>
			<td class="tdhead">绿色矿山级别</td><td ><select  name="basedataGreenlvl">
					<option value="{$declaredata[9999]}">{$declaredata[9999]}</option>
					<option value="国家级">国家级</option>
					<option value="省级">省级</option>
					<option value="市（州）级">市（州）级</option>
					<option value="县级">县级</option>
			</td>
		</tr>
		<tr>
			<td class="tdhead">规划期限</td><td><input value="{$declaredata[2]}" name="basedataLimit"></td>
			<td class="tdhead">规划基期(年份)</td><td><input value="{$declaredata[3]}"  id="basedataJiqizhi" name="basedataJiqizhi" onchange="changeyears()"></td>
		</tr>
		<tr>
			<td class="tdhead">组织单位</td><td><input  value="{$declaredata[4]}"  name="basedataOrgan"></td>
			<td class="tdhead">编制单位</td><td><input value="{$declaredata[5]}" name="basedataEstablish"></td>
		</tr>
		<tr>
			<td class="tdhead">报告出具日期</td><td><input class="datepicker" value="{$declaredata[7]}" name="basedataBgdate"></td>
			<td class="tdhead">矿山名称</td><td><input value="{$declaredata[6]}" name="basedataMinename"></td>
		</tr>
		<tr>
			<td class="tdhead">矿山成立时间</td><td><input  class="datepicker" value="{$declaredata[8]}" name="basedataBuildtime"></td>
			<td class="tdhead">企业名称</td><td><input value="{$declaredata[9]}" name="basedataCompanyname"></td>
		</tr>
		<tr>
		<td class="tdhead">企业性质</td><td><select  name="basedataEnterpriseproperty">
					<option value="{$declaredata[10]}">{$declaredata[10]}</option>
					<option value="国有企业">国有企业</option>
					<option value="集体企业">集体企业</option>
					<option value="联营企业">联营企业</option>
					<option value="股份合作制企业">股份合作制企业</option>
					<option value="个体户">个体户</option>
					<option value="私营企业">私营企业</option>
					<option value="合伙企业">合伙企业</option>
					<option value="有限责任公司">有限责任公司</option>
					<option value="股份有限公司">股份有限公司</option>
				</select></td>
		<td class="tdhead">所属企业名称</td><td><input value="{$declaredata[11]}" name="basedataOwedname"></td>
		</tr>		
		<tr>
			<td class="tdtitle" colspan=4 algin='center'>矿山行政区划</td>
		</tr>
		<tr>
			<td class="tdhead">省（自治区、直辖市）</td><td><input   value="{$declaredata[12]}" name="basedataDivisionsSheng"></td>
			<td class="tdhead">市</td><td><input value="{$declaredata[13]}" name="basedataDivisionsShi"></td>
		</tr>
		<tr>
			<td class="tdhead">县</td><td><input value="{$declaredata[14]}" name="basedataDivisionsXian"></td>
			<td class="tdhead">镇</td><td><input value="{$declaredata[15]}" name="basedataDivisionsZhen"></td>
		</tr>
		<tr>
			<td class="tdhead">行政区代码</td><td><input   value="{$declaredata[16]}" name="basedataDivisions"></td>
			<td class="tdhead">矿山面积(平方千米)</td><td><input   value="{$declaredata[19]}" name="basedataArea"></td>
		</tr>
		<!-- <tr>
			<td class="tdtitle" colspan=4 algin='center'>规划范围</td>
		</tr> -->
		<!-- <tr>
		<td class="tdhead">经度</td><td><input   value="{$declaredata[17]}" name="basedataAreaLongitude"></td>
		<td class="tdhead">纬度</td><td><input   value="{$declaredata[18]}" name="basedataAreaLatitude"></td>
		</tr> -->
		<tr>
		
		</tr>
		<tr>
			<td class="tdtitle" colspan=4 algin='center'>矿业权类型 <input value="{$declaredata[20]}" name="basedataAuthority"></td>
		</tr>
		<tr>
		<td class="tdhead">采矿权</td><td><textarea cols="60" rows="3"  name="basedataAuthDig">{$declaredata[21]}</textarea></td>
		<td class="tdhead">探矿权</td><td><textarea cols="60" rows="3"  name="basedataAuthFind">{$declaredata[22]}</textarea></td>
		</tr>
                <tr>
		<td class="tdhead">划定矿区范围(平方千米)</td><td><input   value="{$declaredata[23]}" name="basedataAuthArea"></td>
		<td class="tdhead">采矿标高(米)</td><td><input   value="{$declaredata[24]}" name="basedataAuthHeight"></td>
		</tr>
                <tr>
		<td class="tdhead">矿业权证号</td><td><input   value="{$declaredata[25]}" name="basedataAuthNum"></td>
		<td class="tdhead">单位地址</td><td><input   value="{$declaredata[26]}" name="basedataAuthAddress"></td>
		</tr>
		<tr>
		<td class="tdhead">有效期限</td><td><input   value="{$declaredata[27]}" name="basedataAuthDeadline"></td>
		<td class="tdhead">发证时间</td><td><input   class="datepicker" value="{$declaredata[28]}" name="basedataAuthGetime"></td>
		</tr>
		<tr>
		<td class="tdhead">发证机关</td><td colspan=3><textarea cols="60" rows="3"  name="basedataAuthOrgan">{$declaredata[29]}</textarea></td> 
		</tr>
		<tr>
			<td class="tdtitle" colspan=4>矿区地理坐标</td>
		</tr>
		<tr>
		<td class="tdhead">经度</td><td><input value="{$declaredata[30]}" name="basedataPointLongitude"></td>
		<td class="tdhead">纬度</td><td><input value="{$declaredata[31]}" name="basedataPointLatitude"></td>
		</tr>
		{foreach from=$jingWei item=o}
		<tr>
			<td class="tdhead">经度</td><td><input value="{$o[0]}" name="basedataZuobiaoJing[]"></td>
			<td class="tdhead">纬度</td><td><input value="{$o[1]}" name="basedataZuobiaoWei[]"></td>
		</tr>
		{/foreach}
		<tr>
			<td class="tdtitle" colspan=4>矿种</td>
		</tr>
	</table>
	<table class="formView" align="center" id="ore" width="100%">
		{foreach from=$ores item=o}
		<tr>
			<td>
				<table class="formView" align="center" width="100%">
					<tr><td colspan=4 class='tdtitle'>矿种{$o._o22+1}</td></tr>
					<tr>
						<td class="tdhead">矿种名称</td>
						<td width="30%"><!-- <input type="text" name="orename[]" width="90%">-->
						<select id="1"  onchange="getchild(this.id)" width="90%" name="oreNametype[]">
							<option value="{$o[21]}">{$o[21]}</option>
							<option value="能源矿产">能源矿产</option>
							<option value="金属矿产">金属矿产</option>
							<option value="非金属矿产">非金属矿产</option>
						</select>
						<select id="child1"  name="orename[]" width="90%">
							<option value="{$o[0]}">{$o[0]}</option>
						
						
						</select></td>  
						<td class="tdhead">矿种类别</td>
						<td width="30%">
							<select name="oretype[]">
								<option value="{$o[1]}">{$o[1]}</option>
								<option value="主矿种">主矿种</option>
								<option value="伴生矿种">伴生矿种</option>
							</select>
						</td>
					</tr>
					<tr><td colspan=4 class='tdtitle'>储量级别</td></tr>
						<tr>
						<td class="tdhead">保有储量</td>
						<td width="30%"><input type="text" name="oreLevelh[]" value="{$o[39]}" width="90%"/><input type="button" id="button_basedataorelevelh{$o._o22}" value="详情"/></td>
						<td class="tdhead">可采储量</td>
						<td width="30%"><input type="text" name="oreLevela[]" value="{$o[40]}" width="90%"/><input type="button" id="button_basedataorelevela{$o._o22}" value="详情"/></td>
						<tr><td colspan=4 style="border:none">
						<table align="center" style="display:none;" class="formView" id="oreLevelhs{$o._o22}">
							<tr>
								<td id="oreLevelh111" class="tdhead">保有储量111级</td><td><input value="{$o[41]}" name="oreLevelh111[]"></td>
								<td id="oreLevelh121122" class="tdhead">保有储量121/122级</td><td><input value="{$o[42]}" name="oreLevelh121122[]"></td>
							</tr>
							<tr>
								<td id="oreLevelh111b" class="tdhead">保有储量111b级</td><td><input value="{$o[43]}" name="oreLevelh111b[]"></td>
							</tr>
							<tr>
								<td id="oreLevelh121b"class="tdhead">保有储量121b级</td><td><input value="{$o[44]}" name="oreLevelh121b[]"></td>
								<td id="oreLevelh122b" class="tdhead">保有储量122b级</td><td><input value="{$o[45]}" name="oreLevelh122b[]"></td>
							</tr>
							<tr>
								<td id="oreLevelh2m111" class="tdhead">保有储量2m11级</td><td><input value="{$o[46]}" name="oreLevelh2m111[]"></td>
								<td id="oreLevelh2m21" class="tdhead">保有储量2m21级</td><td><input value="{$o[47]}" name="oreLevelh2m21[]"></td>
							</tr>
							<tr>
								<td id="oreLevelh2m22" class="tdhead">保有储量2m22级</td><td><input value="{$o[48]}" name="oreLevelh2m22[]"></td>
								<td id="oreLevelh2s11" class="tdhead">保有储量2s11级</td><td><input value="{$o[49]}" name="oreLevelh2s11[]"></td>
							</tr>
							<tr>
								<td id="oreLevelh2s21" class="tdhead">保有储量2s21级</td><td><input value="{$o[50]}" name="oreLevelh2s21[]"></td>
								<td id="oreLevelh2s22" class="tdhead">保有储量2s22级</td><td><input value="{$o[51]}" name="oreLevelh2s22[]"></td>
							</tr>
							<tr>
								<td id="oreLevelh331"class="tdhead">保有储量331级</td><td><input value="{$o[52]}" name="oreLevelh331[]"></td>
								<td id="oreLevelh332"class="tdhead">保有储量332级</td><td><input value="{$o[53]}" name="oreLevelh332[]"></td>	  
							</tr>
							<tr>
								<td id="oreLevelh333"class="tdhead">保有储量333级</td><td><input value="{$o[54]}" name="oreLevelh333[]"></td>
								<td id="oreLevelh334"class="tdhead">保有储量334级</td><td><input value="{$o[55]}" name="oreLevelh334[]"></td>	  
							</tr>
						</table></td></tr>
						<tr><td colspan=4 style="border:none"><table align="center" style="display:none;" class="formView" id="oreLevelas{$o._o22}">
							<tr>
								<td id="oreLevela111" class="tdhead">可采储量111级</td><td><input value="{$o[56]}" name="oreLevela111[]"></td>
								<td id="oreLevela121122" class="tdhead">可采储量121/122级</td><td><input value="{$o[57]}" name="oreLevela121122[]"></td>
							</tr>
							<tr>
								<td id="oreLevela111b" class="tdhead">可采储量111b级</td><td><input value="{$o[58]}" name="oreLevela111b[]"></td>
							</tr>
							<tr>
								<td id="oreLevela121b"class="tdhead">可采储量121b级</td><td><input value="{$o[59]}" name="oreLevela121b[]"></td>
								<td id="oreLevela122b" class="tdhead">可采储量122b级</td><td><input value="{$o[60]}" name="oreLevela122b[]"></td>
							</tr>
							<tr>
								<td id="oreLevela2m111" class="tdhead">可采储量2m11级</td><td><input value="{$o[61]}" name="oreLevela2m111[]"></td>
								<td id="oreLevela2m21" class="tdhead">可采储量2m21级</td><td><input value="{$o[62]}" name="oreLevela2m21[]"></td>
							</tr>
							<tr>
								<td id="oreLevela2m22" class="tdhead">可采储量2m22级</td><td><input value="{$o[63]}" name="oreLevela2m22[]"></td>
								<td id="oreLevela2s11" class="tdhead">可采储量2s11级</td><td><input value="{$o[64]}" name="oreLevela2s11[]"></td>
							</tr>
							<tr>
								<td id="oreLevela2s21" class="tdhead">可采储量2s21级</td><td><input value="{$o[65]}" name="oreLevela2s21[]"></td>
								<td id="oreLevela2s22" class="tdhead">可采储量2s22级</td><td><input value="{$o[66]}" name="oreLevela2s22[]"></td>
							</tr>
							<tr>
								<td id="oreLevela331"class="tdhead">可采储量331级</td><td><input value="{$o[67]}" name="oreLevela331[]"></td>
								<td id="oreLevela332"class="tdhead">可采储量332级</td><td><input value="{$o[68]}" name="oreLevela332[]"></td>	  
							</tr>
							<tr>
								<td id="oreLevela333"class="tdhead">可采储量333级</td><td><input value="{$o[69]}" name="oreLevela333[]"></td>
								<td id="oreLevela334"class="tdhead">可采储量334级</td><td><input value="{$o[70]}" name="oreLevela334[]"></td>	  
							</tr>
						</table></td>
						</tr>
					</tr>
					<tr>
						<td class='tdhead' colspan=4>
							<input type='button' value='添加矿种' onclick='addminerate();'><input type='button' value='删除此矿种' onclick='ramoveminerate(this);'>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		{foreachelse}
		<tr>
			<td align="center">没有记录
				<input type='button' value='添加矿种' onclick='addminerate();'>
			</td>
		</tr>
		{/foreach}
	</table>
	<table class="formView" align="center"  width="100%">
	<tr>
			<td class="tdhead">原矿化学组分</td><td colspan=3><textarea cols="60" rows="3" name="basedataYuanHua">{$declaredata[10000]}</textarea></td>
			<td class="tdhead">尾矿化学组分</td><td colspan=3><textarea cols="60" rows="3" name="basedataWeiHua">{$declaredata[10001]}</textarea></td>
	</tr>
	</table>
	<table class="formView" align="center" width='100%'>
		<tr>
			<td class="tdtitle" width="20%">矿山资源储量(吨)</td><td class="tdtitle" width="30%"><input value="{$declaredata[35]}" name="basedataResourcesTotal"></td>
			<td class="tdtitle" width="20%">储量规模</td>
			<td class="tdtitle">
				<select name="basedataMinescale">
					<option value="{$declaredata[36]}">{$declaredata[36]}</option>
					<option value="超大型">超大型</option>
					<option value="大型">大型</option>
					<option value="中型">中型</option>
					<option value="小型">小型</option>
				</select>
			</td>
		</tr>
		<tr>
			<td class="tdtitle" colspan=4>矿山开采情况</td>
		</tr>
                <tr>
		<td class="tdhead">矿山开采方式</td><td><select  name="basedataDigtype">
					<option value="{$declaredata[39]}">{$declaredata[39]}</option>
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
		<td class="tdhead">矿山开采回采率(%)</td><td><input   value="{$declaredata[40]}" name="basedataDigreturnrate"><input type="button" id="button_basedataDigreturnrate" value="详情"/></td>
		</tr>
	</table>
	<table align="center" style="display:none;" class="formView" id="bef3_pre5_basedataDigreturnrate">
		<tr>
			<td id="t_basedataDigreturnrate_bef3" class="tdhead">{$declaredata[3]-2}年实际值</td><td><input value="{$data_35_kaicaihuicailv[0]}" name="basedataDigreturnrate_bef3"></td>
			<td id="t_basedataDigreturnrate_bef2" class="tdhead">{$declaredata[3]-1}年实际值</td><td><input value="{$data_35_kaicaihuicailv[1]}" name="basedataDigreturnrate_bef2"></td>
		</tr>
		<tr>
			<td id="t_basedataDigreturnrate_bef1" class="tdhead">{$declaredata[3]}年实际值</td><td><input value="{$data_35_kaicaihuicailv[2]}" name="basedataDigreturnrate_bef1"></td>
		</tr>
		<tr>
			<td id="t_basedataDigreturnrate_pre1"class="tdhead">{$declaredata[3]+1}年规划值</td><td><input value="{$data_35_kaicaihuicailv[3]}" name="basedataDigreturnrate_pre1"></td>
			<td id="t_basedataDigreturnrate_pre1real" class="tdhead">{$declaredata[3]+1}年实际值</td><td><input value="{$data_35_kaicaihuicailv[4]}" name="basedataDigreturnrate_pre1real"></td>
		</tr>
		<tr>
			<td id="t_basedataDigreturnrate_pre2"class="tdhead">{$declaredata[3]+2}年规划值</td><td><input value="{$data_35_kaicaihuicailv[5]}" name="basedataDigreturnrate_pre2"></td>
			<td id="t_basedataDigreturnrate_pre2real" class="tdhead">{$declaredata[3]+2}年实际值</td><td><input value="{$data_35_kaicaihuicailv[6]}" name="basedataDigreturnrate_pre2real"></td>
		</tr>
		<tr>
			<td id="t_basedataDigreturnrate_pre3" class="tdhead">{$declaredata[3]+3}年规划值</td><td><input value="{$data_35_kaicaihuicailv[7]}" name="basedataDigreturnrate_pre3"></td>
			<td id="t_basedataDigreturnrate_pre3real" class="tdhead">{$declaredata[3]+3}年实际值</td><td><input value="{$data_35_kaicaihuicailv[8]}" name="basedataDigreturnrate_pre3real"></td>
		</tr>
		<tr>
			<td id="t_basedataDigreturnrate_pre4" class="tdhead">{$declaredata[3]+4}年规划值</td><td><input value="{$data_35_kaicaihuicailv[9]}" name="basedataDigreturnrate_pre4"></td>
			<td id="t_basedataDigreturnrate_pre4real" class="tdhead">{$declaredata[3]+4}年实际值</td><td><input value="{$data_35_kaicaihuicailv[10]}" name="basedataDigreturnrate_pre4real"></td>
		</tr>
		<tr>
			<td id="t_basedataDigreturnrate_pre5"class="tdhead">{$declaredata[3]+5}年规划值</td><td><input value="{$data_35_kaicaihuicailv[11]}" name="basedataDigreturnrate_pre5"></td>
			<td id="t_basedataDigreturnrate_pre5real"class="tdhead">{$declaredata[3]+5}年实际值</td><td><input value="{$data_35_kaicaihuicailv[12]}" name="basedataDigreturnrate_pre5real"></td>	  
		</tr>
	</table>
	<table class="formView" align="center" width='100%'>
                <tr>
		<td class="tdhead">矿山选矿回收率(%)</td><td width="30%"><input   value="{$declaredata[41]}" name="basedataSepareturnrate"><input type="button" id="button_basedataSepareturnrate" value="详情"/></td>	
		<td class="tdhead">矿山矿床类型</td><td><input   value="{$declaredata[42]}" name="basedataMinertype"></td>
		</tr>
	</table>
	<table align="center" style="display:none;" class="formView" id="bef3_pre5_basedataSepareturnrate">
		<tr>
			<td id="t_basedataSepareturnrate_bef3"class="tdhead">{$declaredata[3]-2}年实际值</td><td><input value="{$data_35_kaicaihuicailv[0]}" name="basedataSepareturnrate_bef3"></td>
			<td id="t_basedataSepareturnrate_bef2" class="tdhead">{$declaredata[3]-1}年实际值</td><td><input value="{$data_35_kaicaihuicailv[1]}" name="basedataSepareturnrate_bef2"></td>
		</tr>
		<tr>
			<td id="t_basedataSepareturnrate_bef1" class="tdhead">{$declaredata[3]}年实际值</td><td><input value="{$data_35_kaicaihuicailv[2]}" name="basedataSepareturnrate_bef1"></td>
		</tr>
		<tr>
			<td id="t_basedataSepareturnrate_pre1" class="tdhead">{$declaredata[3]+1}年规划值</td><td><input value="{$data_35_kaicaihuicailv[3]}" name="basedataSepareturnrate_pre1"></td>
			<td id="t_basedataSepareturnrate_pre1real" class="tdhead">{$declaredata[3]+1}年实际值</td><td><input value="{$data_35_kaicaihuicailv[4]}" name="basedataSepareturnrate_pre1real"></td>
		</tr>
		<tr>
			<td id="t_basedataSepareturnrate_pre2" class="tdhead">{$declaredata[3]+2}年规划值</td><td><input value="{$data_35_kaicaihuicailv[5]}" name="basedataSepareturnrate_pre2"></td>
			<td id="t_basedataSepareturnrate_pre2real"class="tdhead">{$declaredata[3]+2}年实际值</td><td><input value="{$data_35_kaicaihuicailv[6]}" name="basedataSepareturnrate_pre2real"></td>
		</tr>
		<tr>
			<td id="t_basedataSepareturnrate_pre3" class="tdhead">{$declaredata[3]+3}年规划值</td><td><input value="{$data_35_kaicaihuicailv[7]}" name="basedataSepareturnrate_pre3"></td>
			<td id="t_basedataSepareturnrate_pre3real" class="tdhead">{$declaredata[3]+3}年实际值</td><td><input value="{$data_35_kaicaihuicailv[8]}" name="basedataSepareturnrate_pre3real"></td>
		</tr>
		<tr>
			<td id="t_basedataSepareturnrate_pre4" class="tdhead">{$declaredata[3]+4}年规划值</td><td><input value="{$data_35_kaicaihuicailv[9]}" name="basedataSepareturnrate_pre4"></td>
			<td id="t_basedataSepareturnrate_pre4real" class="tdhead">{$declaredata[3]+4}年实际值</td><td><input value="{$data_35_kaicaihuicailv[10]}" name="basedataSepareturnrate_pre4real"></td>
		</tr>
		<tr>
			<td id="t_basedataSepareturnrate_pre5" class="tdhead">{$declaredata[3]+5}年规划值</td><td><input value="{$data_35_kaicaihuicailv[11]}" name="basedataSepareturnrate_pre5"></td>
			<td id="t_basedataSepareturnrate_pre5real" class="tdhead">{$declaredata[3]+5}年实际值</td><td><input value="{$data_35_kaicaihuicailv[12]}" name="basedataSepareturnrate_pre5real"></td>	  
		</tr>
	</table>
	<table class="formView" align="center" width='100%'>
		<tr>
		<td class="tdhead">选矿方法</td>
		<td colspan=3>
			{if $Mining_methodsdata[1] == '1'}
				<input type="checkbox" name="basedataSepaCixuan" value ="1" checked>磁选
			{else}
				<input type="checkbox" name="basedataSepaCixuan" value ="1" >磁选
			{/if}
			{if $Mining_methodsdata[2] == '1'}
				<input type="checkbox" name="basedataSepaZhongxuan" value ="1" checked>重选
			{else}
				<input type="checkbox" name="basedataSepaZhongxuan" value ="1" >重选
			{/if}
			{if $Mining_methodsdata[3] == '1'}
				<input type="checkbox" name="basedataSepaFuxuan" value ="1" checked>浮选
			{else}
				<input type="checkbox" name="basedataSepaFuxuan" value ="1" >浮选
			{/if}
			{if $Mining_methodsdata[4] == '1'}
				<input type="checkbox" name="basedataSepaDianxuan" value ="1" checked>电选
			{else}
				<input type="checkbox" name="basedataSepaDianxuan" value ="1" >电选
			{/if}
				<input type="checkbox">其他
				<input type="text" value="{$Mining_methodsdata[5]}" name="basedataSepa" >
		</td>
		</tr>
		<tr>
			<td class="tdtitle" colspan=4>实际生产规模<input value="{$declaredata[44]}" name="basedataProduceScale"><input type="button" id="button_basedataProduceScale" value="详情"/></td>
		</tr>
	</table>
	<table align="center" style="display:none;" class="formView" id="bef3_pre5_basedataProduceScale">
		<tr>
			<td id="t_basedataProduceScale_bef3" class="tdhead">{$declaredata[3]-2}年实际值</td><td><input value="{$data_35_shijishengchanguimo[0]}" name="basedataProduceScale_bef3"></td>
			<td id="t_basedataProduceScale_bef2" class="tdhead">{$declaredata[3]-1}年实际值</td><td><input value="{$data_35_shijishengchanguimo[1]}" name="basedataProduceScale_bef2"></td>
		</tr>
		<tr>
			<td id="t_basedataProduceScale_bef1" class="tdhead">{$declaredata[3]}年实际值</td><td><input value="{$data_35_shijishengchanguimo[2]}" name="basedataProduceScale_bef1"></td>
		</tr>
		<tr>
			<td id="t_basedataProduceScale_pre1" class="tdhead">{$declaredata[3]+1}年规划值</td><td><input value="{$data_35_shijishengchanguimo[3]}" name="basedataProduceScale_pre1"></td>
			<td id="t_basedataProduceScale_pre1real" class="tdhead">{$declaredata[3]+1}年实际值</td><td><input value="{$data_35_shijishengchanguimo[4]}" name="basedataProduceScale_pre1real"></td>
		</tr>
		<tr>
			<td id="t_basedataProduceScale_pre2" class="tdhead">{$declaredata[3]+2}年规划值</td><td><input value="{$data_35_shijishengchanguimo[5]}" name="basedataProduceScale_pre2"></td>
			<td id="t_basedataProduceScale_pre2real" class="tdhead">{$declaredata[3]+2}年实际值</td><td><input value="{$data_35_shijishengchanguimo[6]}" name="basedataProduceScale_pre2real"></td>
		</tr>
		<tr>
			<td id="t_basedataProduceScale_pre3" class="tdhead">{$declaredata[3]+3}年规划值</td><td><input value="{$data_35_shijishengchanguimo[7]}" name="basedataProduceScale_pre3"></td>
			<td id="t_basedataProduceScale_pre3real" class="tdhead">{$declaredata[3]+3}年实际值</td><td><input value="{$data_35_shijishengchanguimo[8]}" name="basedataProduceScale_pre3real"></td>
		</tr>
		<tr>
			<td id="t_basedataProduceScale_pre4" class="tdhead">{$declaredata[3]+4}年规划值</td><td><input value="{$data_35_shijishengchanguimo[9]}" name="basedataProduceScale_pre4"></td>
			<td id="t_basedataProduceScale_pre4real" class="tdhead">{$declaredata[3]+4}年实际值</td><td><input value="{$data_35_shijishengchanguimo[10]}" name="basedataProduceScale_pre4real"></td>
		</tr>
		<tr>
			<td id="t_basedataProduceScale_pre5" class="tdhead">{$declaredata[3]+5}年规划值</td><td><input value="{$data_35_shijishengchanguimo[11]}" name="basedataProduceScale_pre5"></td>
			<td id="t_basedataProduceScale_pre5real" class="tdhead">{$declaredata[3]+5}年实际值</td><td><input value="{$data_35_shijishengchanguimo[12]}" name="basedataProduceScale_pre5real"></td>	  
		</tr>
	</table>
	<table class="formView" align="center" width='100%'>
		<tr>
			<td class="tdhead">开采规模</td><td><input value="{$declaredata[45]}" name="basedataProduceDig"><select name="basedataProduceDigUnit">
					<option value="{$declaredata[46]}">{$declaredata[46]}</option>
					<option value="吨/年">吨/年</option>
					<option value="吨/天">吨/天</option>
					</select></td>
			<td class="tdhead">选矿厂规模</td><td><input value="{$declaredata[47]}" name="basedataProduceFactory"><select name="basedataProduceFactoryUnit">
					<option value="{$declaredata[48]}">{$declaredata[48]}</option>
					<option value="吨/年">吨/年</option>
					<option value="吨/天">吨/天</option>
					</select></td>
		</tr>
		<tr>
			<td class="tdtitle" colspan=4>产品方案</td>
		</tr>
		<tr>
		<td class="tdhead">金属类</td><td colspan=3><textarea cols="60" rows="3"  name="basedataPlanMetal">{$declaredata[49]}</textarea></td>
		</tr>
		<tr>
		<td class="tdhead">能源类</td><td colspan=3><textarea cols="60" rows="3"  name="basedataPlanEnergy">{$declaredata[50]}</textarea></td>
		</tr>
		<tr>
		<td class="tdhead">非金属类</td><td colspan=3><textarea cols="60" rows="3"  name="basedataPlanNot">{$declaredata[51]}</textarea></td>
		</tr>
		<tr>
			<td class="tdtitle" colspan=4>矿山效益</td>
		</tr>
		<tr>
		<td class="tdhead">矿山企业总产值(万元)</td><td><input   value="{$declaredata[52]}" name="basedataValue"><input type="button" id="button_basedataValue" value="详情"/></td>
		<td class="tdhead">矿山企业利税(万元)</td><td><input   value="{$declaredata[53]}" name="basedataFee"><input type="button" id="button_basedataFee" value="详情"/></td>
		</tr>
	</table>
	<table align="center" style="display:none;" class="formView" id="bef3_pre5_basedataValue">
		<tr>
			<td id="t_basedataValue_bef3" class="tdhead">{$declaredata[3]-2}年实际值</td><td><input value="{$data_35_zongchanzhi[0]}" name="basedataValue_bef3"></td>
			<td id="t_basedataValue_bef2" class="tdhead">{$declaredata[3]-1}年实际值</td><td><input value="{$data_35_zongchanzhi[1]}" name="basedataValue_bef2"></td>
		</tr>
		<tr>
			<td id="t_basedataValue_bef1" class="tdhead">{$declaredata[3]}年实际值</td><td><input value="{$data_35_zongchanzhi[2]}" name="basedataValue_bef1"></td>
		</tr>
		<tr>
			<td id="t_basedataValue_pre1" class="tdhead">{$declaredata[3]+1}年规划值</td><td><input value="{$data_35_zongchanzhi[3]}" name="basedataValue_pre1"></td>
			<td id="t_basedataValue_pre1real" class="tdhead">{$declaredata[3]+1}年实际值</td><td><input value="{$data_35_zongchanzhi[4]}" name="basedataValue_pre1real"></td>
		</tr>
		<tr>
			<td id="t_basedataValue_pre2" class="tdhead">{$declaredata[3]+2}年规划值</td><td><input value="{$data_35_zongchanzhi[5]}" name="basedataValue_pre2"></td>
			<td id="t_basedataValue_pre2real" class="tdhead">{$declaredata[3]+2}年实际值</td><td><input value="{$data_35_zongchanzhi[6]}" name="basedataValue_pre2real"></td>
		</tr>
		<tr>
			<td id="t_basedataValue_pre3" class="tdhead">{$declaredata[3]+3}年规划值</td><td><input value="{$data_35_zongchanzhi[7]}" name="basedataValue_pre3"></td>
			<td id="t_basedataValue_pre3real" class="tdhead">{$declaredata[3]+3}年实际值</td><td><input value="{$data_35_zongchanzhi[8]}" name="basedataValue_pre3real"></td>
		</tr>
		<tr>
			<td id="t_basedataValue_pre4" class="tdhead">{$declaredata[3]+4}年规划值</td><td><input value="{$data_35_zongchanzhi[9]}" name="basedataValue_pre4"></td>
			<td id="t_basedataValue_pre4real" class="tdhead">{$declaredata[3]+4}年实际值</td><td><input value="{$data_35_zongchanzhi[10]}" name="basedataValue_pre4real"></td>
		</tr>
		<tr>
			<td id="t_basedataValue_pre5" class="tdhead">{$declaredata[3]+5}年规划值</td><td><input value="{$data_35_zongchanzhi[11]}" name="basedataValue_pre5"></td>
			<td id="t_basedataValue_pre5real" class="tdhead">{$declaredata[3]+5}年实际值</td><td><input value="{$data_35_zongchanzhi[12]}" name="basedataValue_pre5real"></td>	  
		</tr>
	</table>
	<table align="center" style="display:none;" class="formView" id="bef3_pre5_basedataFee">
		<tr>
			<td id="t_basedataFee_bef3" class="tdhead">{$declaredata[3]-2}年实际值</td><td><input value="{$data_35_zonglishui[0]}" name="basedataFee_bef3"></td>
			<td id="t_basedataFee_bef2" class="tdhead">{$declaredata[3]-1}年实际值</td><td><input value="{$data_35_zonglishui[1]}" name="basedataFee_bef2"></td>
		</tr>
		<tr>
			<td id="t_basedataFee_bef1" class="tdhead">{$declaredata[3]}年实际值</td><td><input value="{$data_35_zonglishui[2]}" name="basedataFee_bef1"></td>
		</tr>
		<tr>
			<td id="t_basedataFee_pre1" class="tdhead">{$declaredata[3]+1}年规划值</td><td><input value="{$data_35_zonglishui[3]}" name="basedataFee_pre1"></td>
			<td id="t_basedataFee_pre1real" class="tdhead">{$declaredata[3]+1}年实际值</td><td><input value="{$data_35_zonglishui[4]}" name="basedataFee_pre1real"></td>
		</tr>
		<tr>
			<td id="t_basedataFee_pre2" class="tdhead">{$declaredata[3]+2}年规划值</td><td><input value="{$data_35_zonglishui[5]}" name="basedataFee_pre2"></td>
			<td id="t_basedataFee_pre2real" class="tdhead">{$declaredata[3]+2}年实际值</td><td><input value="{$data_35_zonglishui[6]}" name="basedataFee_pre2real"></td>
		</tr>
		<tr>
			<td id="t_basedataFee_pre3" class="tdhead">{$declaredata[3]+3}年规划值</td><td><input value="{$data_35_zonglishui[7]}" name="basedataFee_pre3"></td>
			<td id="t_basedataFee_pre3real" class="tdhead">{$declaredata[3]+3}年实际值</td><td><input value="{$data_35_zonglishui[8]}" name="basedataFee_pre3real"></td>
		</tr>
		<tr>
			<td id="t_basedataFee_pre4" class="tdhead">{$declaredata[3]+4}年规划值</td><td><input value="{$data_35_zonglishui[9]}" name="basedataFee_pre4"></td>
			<td id="t_basedataFee_pre4real" class="tdhead">{$declaredata[3]+4}年实际值</td><td><input value="{$data_35_zonglishui[10]}" name="basedataFee_pre4real"></td>
		</tr>
		<tr>
			<td id="t_basedataFee_pre5" class="tdhead">{$declaredata[3]+5}年规划值</td><td><input value="{$data_35_zonglishui[11]}" name="basedataFee_pre5"></td>
			<td id="t_basedataFee_pre5real" class="tdhead">{$declaredata[3]+5}年实际值</td><td><input value="{$data_35_zonglishui[12]}" name="basedataFee_pre5real"></td>	  
		</tr>
	</table>
	<table class="formView" align="center" width='100%'>
		<tr>
		<td class="tdhead">矿山企业利润(万元)</td><td width="30%"><input   value="{$declaredata[54]}" name="basedataProfit"><input type="button" id="button_basedataProfit" value="详情"/></td>
		<td class="tdhead">矿山企业人数(人)</td><td><input   value="{$declaredata[55]}" name="basedataWorker"></td>
		</tr>
	</table>
	<table align="center" style="display:none;" class="formView" id="bef3_pre5_basedataProfit">
		<tr>
			<td id="t_basedataProfit_bef3" class="tdhead">{$declaredata[3]-2}年实际值</td><td><input value="{$data_35_qiyelirun[0]}" name="basedataProfit_bef3"></td>
			<td id="t_basedataProfit_bef2" class="tdhead">{$declaredata[3]-1}年实际值</td><td><input value="{$data_35_qiyelirun[1]}" name="basedataProfit_bef2"></td>
		</tr>
		<tr>
			<td id="t_basedataProfit_bef1"class="tdhead">{$declaredata[3]}年实际值</td><td><input value="{$data_35_qiyelirun[2]}" name="basedataProfit_bef1"></td>
		</tr>
		<tr>
			<td id="t_basedataProfit_pre1" class="tdhead">{$declaredata[3]+1}年规划值</td><td><input value="{$data_35_qiyelirun[3]}" name="basedataProfit_pre1"></td>
			<td id="t_basedataProfit_pre1real" class="tdhead">{$declaredata[3]+1}年实际值</td><td><input value="{$data_35_qiyelirun[4]}" name="basedataProfit_pre1real"></td>
		</tr>
		<tr>
			<td id="t_basedataProfit_pre2" class="tdhead">{$declaredata[3]+2}年规划值</td><td><input value="{$data_35_qiyelirun[5]}" name="basedataProfit_pre2"></td>
			<td id="t_basedataProfit_pre2real" class="tdhead">{$declaredata[3]+2}年实际值</td><td><input value="{$data_35_qiyelirun[6]}" name="basedataProfit_pre2real"></td>
		</tr>
		<tr>
			<td id="t_basedataProfit_pre3" class="tdhead">{$declaredata[3]+3}年规划值</td><td><input value="{$data_35_qiyelirun[7]}" name="basedataProfit_pre3"></td>
			<td id="t_basedataProfit_pre3real" class="tdhead">{$declaredata[3]+3}年实际值</td><td><input value="{$data_35_qiyelirun[8]}" name="basedataProfit_pre3real"></td>
		</tr>
		<tr>
			<td id="t_basedataProfit_pre4" class="tdhead">{$declaredata[3]+4}年规划值</td><td><input value="{$data_35_qiyelirun[9]}" name="basedataProfit_pre4"></td>
			<td id="t_basedataProfit_pre4real" class="tdhead">{$declaredata[3]+4}年实际值</td><td><input value="{$data_35_qiyelirun[10]}" name="basedataProfit_pre4real"></td>
		</tr>
		<tr>
			<td id="t_basedataProfit_pre5" class="tdhead">{$declaredata[3]+5}年规划值</td><td><input value="{$data_35_qiyelirun[11]}" name="basedataProfit_pre5"></td>
			<td id="t_basedataProfit_pre5real" class="tdhead">{$declaredata[3]+5}年实际值</td><td><input value="{$data_35_qiyelirun[12]}" name="basedataProfit_pre5real"></td>	  
		</tr>
	</table>
	<table class="formView" align="center" width='100%'>
		<tr>
			<td class="tdtitle" colspan=4>企业荣誉</td>
		</tr>
		<tr>
			<td class="tdhead">描述</td><td colspan=3><textarea cols="60" rows="3"  name="basedataReward">{$declaredata[56]}</textarea></td>
		</tr>
		<!-- <tr>
			<td class="tdhead>">相关附件</td><td><input id="tmpfile" type="file" size="45" name="tmpfile" class="input">
            <input type="button" value="提交"/></td>
			<td colspan=2><textarea cols="60" rows="3" ></textarea></td><td><input type="button" value="添加附件"><input type="button" value="删除附件"></td>
			
		</tr> -->
	</table>
	</div>
	<div id="tabs-2"><!--依法办矿-->
		<table id="legal" class="listView" width="100%">
			<tr>
				<td class="tdtitle" colspan=6>相关证照</td>
			</tr>
			<tr>
				<th width="20%">证照名称</th>
				<th>证号</th>
				<th>是否年检</th>
				<th>有效期起始</th>
				<th>有效期至</th>
				<th width="10%">备注</th>
			</tr>
			<tr>
				<td>《营业执照》</td>
				<td><input type="text"  value="{$credentialsData[2][1]}" name="legal6Num" ></td>
				{if $credentialsData[2][2] == '是'}
				<td>		
					<input type="radio"  name="legal6Ischeck"  value="1" checked >是
					<input type="radio"  name="legal6Ischeck"  value="0" >否
				</td>
				
				{else}
				<td>		
					<input type="radio" name="legal6Ischeck"  value="1" >是
					<input type="radio" name="legal6Ischeck"  value="0" checked >否
				</td>
				{/if}
				<td><input type="text"  value="{$credentialsData[2][3]}" id ="legal6Deadline" class="datepicker" name="legal6Deadline" ></td>
				<td><input type="text"  value="{$credentialsData[2][4]}" id="legal6Deadlinend" name="legal6Deadlinend" class="datepicker" onchange="loadchecktime(this)"></td>
				<td><textarea cols="30" rows="2"  id ="legal6Comm" name="legal6Comm">{$credentialsData[2][5]}</textarea></td>
			</tr>
			<tr>
				<td>《采矿许可证》</td>
				<td><input type="text"  value="{$credentialsData[3][1]}" name="legal1Num" ></td>
				{if $credentialsData[3][2] == '是'}
				<td>		
					<input type="radio" name="legal1Ischeck"  value="1" checked >是
					<input type="radio" name="legal1Ischeck"  value="0" >否
				</td>
				{else}
				<td>		
					<input type="radio" name="legal1Ischeck"  value="1" >是
					<input type="radio" name="legal1Ischeck"  value="0" checked >否
				</td>
				{/if}
				<td><input type="text"  value="{$credentialsData[3][3]}" class="datepicker" id="legal1Deadline" name="legal1Deadline" ></td>
				<td><input type="text"  value="{$credentialsData[3][4]}" class="datepicker" id="legal1Deadlinend" name="legal1Deadlinend" onchange="loadchecktime(this)"></td>
				<td><textarea cols="30" rows="2"  id="legal1Comm" name="legal1Comm">{$credentialsData[3][5]}</textarea></td>
			</tr>
			<tr>
				<td>《矿山生产许可证》</td>
				<td><input type="text"  value="{$credentialsData[4][1]}" name="legal2Num" ></td>
				{if $credentialsData[4][2] == '是'}
				<td>		
					<input type="radio" name="legal2Ischeck"  value="1" checked >是
					<input type="radio" name="legal2Ischeck"  value="0" >否
				</td>
				{else}
				<td>		
					<input type="radio" name="legal2Ischeck"  value="1" >是
					<input type="radio" name="legal2Ischeck"  value="0" checked >否
				</td>
				{/if}
				<td><input type="text"  value="{$credentialsData[4][3]}" class="datepicker" id="legal2Deadline" name="legal2Deadline" ></td>
				<td><input type="text"  value="{$credentialsData[4][4]}" class="datepicker" id="legal2Deadlinend" name="legal2Deadlinend" onchange="loadchecktime(this)"></td>
				<td><textarea cols="30" rows="2"  id="legal2Comm" name="legal2Comm">{$credentialsData[4][5]}</textarea></td>
			</tr>
			<tr>
				<td>《矿山安全生产许可证》</td>
				<td><input type="text"  value="{$credentialsData[5][1]}" name="legal3Num" ></td>
				{if $credentialsData[5][2] == '是'}
				<td>		
					<input type="radio" name="legal3Ischeck"  value="1" checked >是
					<input type="radio" name="legal3Ischeck"  value="0" >否
				</td>
				{else}
				<td>		
					<input type="radio" name="legal3Ischeck"  value="1" >是
					<input type="radio" name="legal3Ischeck"  value="0" checked >否
				</td>
				{/if}
				<td><input type="text"  value="{$credentialsData[5][3]}" class="datepicker" id="legal3Deadline" name="legal3Deadline" ></td>
				<td><input type="text"  value="{$credentialsData[5][4]}" class="datepicker" id="legal3Deadlinend" name="legal3Deadlinend" onchange="loadchecktime(this)"></td>
				<td><textarea cols="30" rows="2"  id="legal3Comm" name="legal3Comm">{$credentialsData[5][5]}</textarea></td>
			</tr>
			<tr>
				<td>《矿长安全生产许可证》</td>
				<td><input type="text"  value="{$credentialsData[6][1]}" name="legal4Num" ></td>
				{if $credentialsData[6][2] == '是'}
				<td>		
					<input type="radio" name="legal4Ischeck"  value="1" checked >是
					<input type="radio" name="legal4Ischeck"  value="0" >否
				</td>
				{else}
				<td>		
					<input type="radio" name="legal4Ischeck"  value="1" >是
					<input type="radio" name="legal4Ischeck"  value="0" checked >否
				</td>
				{/if}
				<td><input type="text"  value="{$credentialsData[6][3]}" class="datepicker" id="legal4Deadline" name="legal4Deadline" ></td>
				<td><input type="text"  value="{$credentialsData[6][4]}" class="datepicker" id = "legal4Deadlinend" name="legal4Deadlinend" onchange="loadchecktime(this)" ></td>
				<td><textarea cols="30" rows="2"  id="legal4Comm" name="legal4Comm">{$credentialsData[6][5]}</textarea></td>
			</tr>		
			<tr>
				<td>《矿长资格证》</td>
				<td><input type="text"  value="{$credentialsData[7][1]}" name="legal5Num" ></td>
				{if $credentialsData[7][2] == '是'}
				<td>		
					<input type="radio" name="legal5Ischeck"  value="1" checked >是
					<input type="radio" name="legal5Ischeck"  value="0" >否
				</td>
				{else}
				<td>		
					<input type="radio" name="legal5Ischeck"  value="1" >是
					<input type="radio" name="legal5Ischeck"  value="0" checked >否
				</td>
				{/if}
				<td><input type="text"  value="{$credentialsData[7][3]}" class="datepicker" id="legal5Deadline" name="legal5Deadline" ></td>
				<td><input type="text"  value="{$credentialsData[7][4]}" class="datepicker" id = "legal5Deadlinend" name="legal5Deadlinend" onchange="loadchecktime(this)"></td>
				<td><textarea cols="30" rows="2"  id="legal5Comm" name="legal5Comm">{$credentialsData[7][5]}</textarea></td>
			</tr>				
			<tr>
				<td>《民用爆炸物品使用许可证》</td>
				<td><input type="text"  value="{$credentialsData[8][1]}" name="legal7Num" ></td>
				{if $credentialsData[8][2] == '是'}
				<td>		
					<input type="radio" name="legal7Ischeck"  value="1" checked >是
					<input type="radio" name="legal7Ischeck"  value="0" >否
				</td>
				{else}
				<td>		
					<input type="radio" name="legal7Ischeck"  value="1" >是
					<input type="radio" name="legal7Ischeck"  value="0" checked>否
				</td>
				{/if}
				<td><input type="text"  value="{$credentialsData[8][3]}" class="datepicker" id="legal7Deadline" name="legal7Deadline" ></td>
				<td><input type="text"  value="{$credentialsData[8][4]}" class="datepicker" id = "legal7Deadlinend" name="legal7Deadlinend" onchange="loadchecktime(this)" ></td>
				<td><textarea cols="30" rows="2"  id="legal7Comm" name="legal7Comm">{$credentialsData[8][5]}</textarea></td>
			</tr>		
			<tr>
				<td>《爆破物品存储证》</td>
				<td><input type="text"  value="{$credentialsData[9][1]}" name="legal8Num" ></td>
				{if $credentialsData[9][2] == '是'}
				<td>		
					<input type="radio" name="legal8Ischeck"  value="1" checked >是
					<input type="radio" name="legal8Ischeck"  value="0" >否
				</td>
				{else}
				<td>		
					<input type="radio" name="legal8Ischeck"  value="1" >是
					<input type="radio" name="legal8Ischeck"  value="0" checked >否
				</td>
				{/if}
				<td><input type="text"  value="{$credentialsData[9][3]}" class="datepicker" id="legal8Deadline" name="legal8Deadline" ></td>
				<td><input type="text"  value="{$credentialsData[9][4]}" class="datepicker" id ="legal8Deadlinend" name="legal8Deadlinend" onchange="loadchecktime(this)"></td>
				<td><textarea cols="30" rows="2"  id="legal8Comm" name="legal8Comm">{$credentialsData[9][5]}</textarea></td>
			</tr>
			<tr>
				<td>《爆破人员安全资格证》</td>
				<td><input type="text"  value="{$credentialsData[10][1]}" name="legal10Num" ></td>
				{if $credentialsData[10][2] == '是'}
				<td>		
					<input type="radio" name="legal10Ischeck"  value="1" checked >是
					<input type="radio" name="legal10Ischeck"  value="0" >否
				</td>
				{else}
				<td>		
					<input type="radio" name="legal10Ischeck"  value="1" >是
					<input type="radio" name="legal10Ischeck"  value="0" checked >否
				</td>
				{/if}
				<td><input type="text"  value="{$credentialsData[10][3]}" class="datepicker" id="legal10Deadline" name="legal10Deadline" ></td>
				<td><input type="text"  value="{$credentialsData[10][4]}" class="datepicker" id="legal10Deadlinend" name="legal10Deadlinend" onchange="loadchecktime(this)" ></td>
				<td><textarea cols="30" rows="2"  id="legal10Comm" name="legal10Comm">{$credentialsData[10][5]}</textarea></td>
			</tr>
			<tr>
				<td>《排污许可证》</td>
				<td><input type="text"  value="{$credentialsData[11][1]}" name="legal11Num" ></td>
				{if $credentialsData[11][2] == '是'}
				<td>		
					<input type="radio" name="legal11Ischeck"  value="1" checked >是
					<input type="radio" name="legal11Ischeck"  value="0" >否
				</td>
				{else}
				<td>		
					<input type="radio" name="legal11Ischeck"  value="1" >是
					<input type="radio" name="legal11Ischeck"  value="0" checked >否
				</td>
				{/if}
				<td><input type="text"  value="{$credentialsData[11][3]}" class="datepicker" id="legal11Deadline" name="legal11Deadline" ></td>
				<td><input type="text"  value="{$credentialsData[11][4]}" class="datepicker" id="legal11Deadlinend" name="legal11Deadlinend" onchange="loadchecktime(this)"></td>
				<td><textarea cols="30" rows="2"  id="legal11Comm" name="legal11Comm">{$credentialsData[11][5]}</textarea></td>
			</tr>
			<tr>
				<td>《取水许可证》</td>
				<td><input type="text"  value="{$credentialsData[12][1]}" name="legal12Num" ></td>
				{if $credentialsData[12][2] == '是'}
				<td>		
					<input type="radio" name="legal12Ischeck"  value="1" checked >是
					<input type="radio" name="legal12Ischeck"  value="0" >否
				</td>
				{else}
				<td>		
					<input type="radio" name="legal12Ischeck"  value="1" >是
					<input type="radio" name="legal12Ischeck"  value="0" checked >否
				</td>
				{/if}
				<td><input type="text"  value="{$credentialsData[12][3]}" class="datepicker" id="legal12Deadline" name="legal12Deadline" ></td>
				<td><input type="text"  value="{$credentialsData[12][4]}" class="datepicker" id="legal12Deadlinend" name="legal12Deadlinend" onchange="loadchecktime(this)"></td>
				<td><textarea cols="30" rows="2"  id="legal12Comm" name="legal12Comm">{$credentialsData[12][5]}</textarea></td>
			</tr>
			<tr>
				<td>《税务登记证》</td>
				<td><input type="text"  value="{$credentialsData[13][1]}" name="legal13Num" ></td>
				{if $credentialsData[13][2] == '是'}
				<td>		
					<input type="radio" name="legal13Ischeck"  value="1" checked >是
					<input type="radio" name="legal13Ischeck"  value="0" >否
				</td>
				{else}
				<td>		
					<input type="radio" name="legal13Ischeck"  value="1" >是
					<input type="radio" name="legal13Ischeck"  value="0" checked >否
				</td>
				{/if}
				<td><input type="text"  value="{$credentialsData[13][3]}" class="datepicker" id ="legal13Deadline" name="legal13Deadline" ></td>
				<td><input type="text"  value="{$credentialsData[13][4]}" class="datepicker" id="legal13Deadlinend" name="legal13Deadlinend" onchange="loadchecktime(this)"></td>
				<td><textarea cols="30" rows="2"  id="legal13Comm" name="legal13Comm">{$credentialsData[13][5]}</textarea></td>
			</tr>
			<tr>
				<td>《组织机构代码证》</td>
				<td><input type="text"  value="{$credentialsData[14][1]}" name="legal14Num" ></td>
				{if $credentialsData[14][2] == '是'}
				<td>		
					<input type="radio" name="legal14Ischeck"  value="1" checked >是
					<input type="radio" name="legal14Ischeck"  value="0" >否
				</td>
				{else}
				<td>		
					<input type="radio" name="legal14Ischeck"  value="1" >是
					<input type="radio" name="legal14Ischeck"  value="0" checked >否
				</td>
				{/if}
				<td><input type="text"  value="{$credentialsData[14][3]}" class="datepicker"  id = "legal14Deadline" name="legal14Deadline" ></td>
				<td><input type="text"  value="{$credentialsData[14][4]}" class="datepicker" id="legal14Deadlinend" name="legal14Deadlinend" onchange="loadchecktime(this)"></td>
				<td><textarea cols="30" rows="2"  id="legal14Comm" name="legal14Comm">{$credentialsData[14][5]}</textarea></td>
			</tr>
			<tr>
				<td>《土地使用权证》</td>
				<td><input type="text"  value="{$credentialsData[15][1]}" name="legal15Num" ></td>
				{if $credentialsData[15][2] == '是'}
				<td>		
					<input type="radio" name="legal15Ischeck"  value="1" checked >是
					<input type="radio" name="legal15Ischeck"  value="0" >否
				</td>
				{else}
				<td>		
					<input type="radio" name="legal15Ischeck"  value="1" >是
					<input type="radio" name="legal15Ischeck"  value="0" checked >否
				</td>
				{/if}
				<td><input type="text"  value="{$credentialsData[15][3]}" class="datepicker" id="legal15Deadline" name="legal15Deadline" ></td>
				<td><input type="text"  value="{$credentialsData[15][4]}" class="datepicker" id="legal15Deadlinend" name="legal15Deadlinend" onchange="loadchecktime(this)"></td>
				<td><textarea cols="30" rows="2"  id="legal15Comm" name="legal15Comm">{$credentialsData[15][5]}</textarea></td>
			</tr>
			<tr>
				<td>《黄金生产批准书》</td>
				<td><input type="text"  value="{$credentialsData[16][1]}" name="legal16Num" ></td>
				{if $credentialsData[16][2] == '是'}
				<td>
					<input type="radio" name="legal16Ischeck"  value="1" checked >是
					<input type="radio" name="legal16Ischeck"  value="0" >否
				</td>
				{else}
				<td>
					<input type="radio" name="legal16Ischeck"  value="1" >是
					<input type="radio" name="legal16Ischeck"  value="0" checked>否
				</td>
				{/if}
				<td><input type="text" value="{$credentialsData[16][3]}" id="legal16Deadline" name="legal16Deadline" ></td>
				<td><input type="text" value="{$credentialsData[16][4]}" id="legal16Deadlinend" name="legal16Deadlinend" ></td>
				<td><textarea cols="30" rows="2"  id="legal16Comm" name="legal16Comm">{$credentialsData[16][5]}</textarea></td>
			</tr>
		</table>
		<table class="formView" width="100%">
			<tr>
				<td class="tdtitle" colspan=4>相关批复</td>
			</tr>
			<tr>
				<td class="tdtitle" colspan=4>《安全评价报告》批复
			{if $documentData[1] == '是'}	
					<input type="radio" name="legalSafeIshave"  value="1" checked onclick="document.getElementById('legalSafeName').removeAttribute('disabled');document.getElementById('legalSafeNum').removeAttribute('disabled');document.getElementById('legalSafeOrgan').removeAttribute('disabled');document.getElementById('legalSafeTime').removeAttribute('disabled');document.getElementById('legalSafeDeadline').removeAttribute('disabled');document.getElementById('legalSafeDeadlinend').removeAttribute('disabled');">有
					<input type="radio" name="legalSafeIshave"  value="0" onclick="document.getElementById('legalSafeName').disabled='disabled';document.getElementById('legalSafeNum').disabled='disabled';document.getElementById('legalSafeOrgan').disabled='disabled';document.getElementById('legalSafeTime').disabled='disabled';document.getElementById('legalSafeDeadline').disabled='disabled';document.getElementById('legalSafeDeadlinend').disabled='disabled';">无
						</td>
			</tr>
			<tr>
				<td class="tdhead">文件名</td><td><input type="text" value="{$documentData[2]}" id="legalSafeName" name="legalSafeName"></td>
				<td class="tdhead">批复号</td><td><input type="text" value="{$documentData[3]}" id="legalSafeNum" name="legalSafeNum"></td>
			</tr>
			<tr>
				<td class="tdhead">批复单位</td><td><input type="text" value="{$documentData[4]}" id="legalSafeOrgan" name="legalSafeOrgan"></td>
				<td class="tdhead">批复时间</td><td><input type="text" class="datepicker" value="{$documentData[5]}" id="legalSafeTime" name="legalSafeTime"></td>
			</tr>
			<tr>
				<td class="tdhead">有效期起始</td><td><input type="text" class="datepicker" value="{$documentData[6]}" id="legalSafeDeadline" name="legalSafeDeadline"></td>
				<td class="tdhead">有效期至</td><td><input type="text" id="legalSafeDeadlinend" class="datepicker" onchange= "loadchecktime(this)" value="{$documentData[7]}" name="legalSafeDeadlinend"></td>
			</tr>
					{else}	
					<input type="radio" name="legalSafeIshave"  value="1" onclick="document.getElementById('legalSafeName').removeAttribute('disabled');document.getElementById('legalSafeNum').removeAttribute('disabled');document.getElementById('legalSafeOrgan').removeAttribute('disabled');document.getElementById('legalSafeTime').removeAttribute('disabled');document.getElementById('legalSafeDeadline').removeAttribute('disabled');document.getElementById('legalSafeDeadlinend').removeAttribute('disabled');">有
					<input type="radio" name="legalSafeIshave"  value="0" checked onclick="document.getElementById('legalSafeName').disabled='disabled';document.getElementById('legalSafeNum').disabled='disabled';document.getElementById('legalSafeOrgan').disabled='disabled';document.getElementById('legalSafeTime').disabled='disabled';document.getElementById('legalSafeDeadline').disabled='disabled';document.getElementById('legalSafeDeadlinend').disabled='disabled';">无
						</td>
			</tr>
			<tr>
				<td class="tdhead">文件名</td><td><input type="text" value="{$documentData[2]}" id="legalSafeName" name="legalSafeName" disabled="disabled"></td>
				<td class="tdhead">批复号</td><td><input type="text" value="{$documentData[3]}" id="legalSafeNum" name="legalSafeNum" disabled="disabled"></td>
			</tr>
			<tr>
				<td class="tdhead">批复单位</td><td><input type="text" value="{$documentData[4]}" id="legalSafeOrgan" name="legalSafeOrgan"disabled="disabled"></td>
				<td class="tdhead">批复时间</td><td><input type="text" class="datepicker" value="{$documentData[5]}" id="legalSafeTime" name="legalSafeTime" disabled="disabled"></td>
			</tr>
			<tr>
				<td class="tdhead">有效期起始</td><td><input type="text" class="datepicker" value="{$documentData[6]}" id="legalSafeDeadline" name="legalSafeDeadline" disabled="disabled"></td>
				<td class="tdhead">有效期至</td><td><input type="text" id="legalSafeDeadlinend" class="datepicker" onchange= "loadchecktime(this)" value="{$documentData[7]}" name="legalSafeDeadlinend" disabled="disabled"></td>
			</tr>
			{/if}	
			<tr>
				<td class="tdtitle" colspan=4>《水土保持方案》批复
					{if $documentData[8] == '是'}		
					<input type="radio" name="legalWaterIshave"  value="1" checked onclick="document.getElementById('legalWaterName').removeAttribute('disabled');document.getElementById('legalWaterNum').removeAttribute('disabled');document.getElementById('legalWaterOrgan').removeAttribute('disabled');document.getElementById('legalWaterTime').removeAttribute('disabled');document.getElementById('legalWaterDeadline').removeAttribute('disabled');document.getElementById('legalWaterDeadlinend').removeAttribute('disabled');">有
					<input type="radio" name="legalWaterIshave"  value="0" onclick="document.getElementById('legalWaterName').disabled='disabled';document.getElementById('legalWaterNum').disabled='disabled';document.getElementById('legalWaterOrgan').disabled='disabled';document.getElementById('legalWaterTime').disabled='disabled';document.getElementById('legalWaterDeadline').disabled='disabled';document.getElementById('legalWaterDeadlinend').disabled='disabled';">无
					</td>
			</tr>
			<tr>
				<td class="tdhead">文件名</td><td><input type="text" value="{$documentData[9]}" id="legalWaterName" name="legalWaterName"></td>
				<td class="tdhead">批复号</td><td><input type="text" value="{$documentData[10]}" id="legalWaterNum" name="legalWaterNum"></td>
			</tr>
			<tr>
				<td class="tdhead">批复单位</td><td><input type="text" value="{$documentData[11]}" id="legalWaterOrgan" name="legalWaterOrgan"></td>
				<td class="tdhead">批复时间</td><td><input type="text" class="datepicker" value="{$documentData[12]}" id="legalWaterTime" name="legalWaterTime"></td>
			</tr>
			<tr>
				<td class="tdhead">有效期起始</td><td><input type="text" class="datepicker" value="{$documentData[13]}" id="legalWaterDeadline" name="legalWaterDeadline"></td>
				<td class="tdhead">有效期至</td><td><input type="text" id="legalWaterDeadlinend" class="datepicker" onchange= "loadchecktime(this)" value="{$documentData[14]}" name="legalWaterDeadlinend"></td>
			</tr>
					{else}		
					<input type="radio" name="legalWaterIshave"  value="1" onclick="document.getElementById('legalWaterName').removeAttribute('disabled');document.getElementById('legalWaterNum').removeAttribute('disabled');document.getElementById('legalWaterOrgan').removeAttribute('disabled');document.getElementById('legalWaterTime').removeAttribute('disabled');document.getElementById('legalWaterDeadline').removeAttribute('disabled');document.getElementById('legalWaterDeadlinend').removeAttribute('disabled');">有
					<input type="radio" name="legalWaterIshave"  value="0" checked onclick="document.getElementById('legalWaterName').disabled='disabled';document.getElementById('legalWaterNum').disabled='disabled';document.getElementById('legalWaterOrgan').disabled='disabled';document.getElementById('legalWaterTime').disabled='disabled';document.getElementById('legalWaterDeadline').disabled='disabled';document.getElementById('legalWaterDeadlinend').disabled='disabled';">无
					</td>
			</tr>
			<tr>
				<td class="tdhead">文件名</td><td><input type="text" value="{$documentData[9]}" id="legalWaterName" name="legalWaterName"disabled="disabled"></td>
				<td class="tdhead">批复号</td><td><input type="text" value="{$documentData[10]}" id="legalWaterNum" name="legalWaterNum" disabled="disabled"></td>
			</tr>
			<tr>
				<td class="tdhead">批复单位</td><td><input type="text" value="{$documentData[11]}" id="legalWaterOrgan" name="legalWaterOrgan" disabled="disabled"></td>
				<td class="tdhead">批复时间</td><td><input type="text" class="datepicker" value="{$documentData[12]}" id="legalWaterTime" name="legalWaterTime" disabled="disabled"></td>
			</tr>
			<tr>
				<td class="tdhead">有效期起始</td><td><input type="text" class="datepicker" value="{$documentData[13]}" id="legalWaterDeadline" name="legalWaterDeadline" disabled="disabled"></td>
				<td class="tdhead">有效期至</td><td><input type="text" id="legalWaterDeadlinend" class="datepicker" onchange= "loadchecktime(this)" value="{$documentData[14]}" name="legalWaterDeadlinend" disabled="disabled"></td>
			</tr>
			{/if}			
			<tr>
				<td class="tdtitle" colspan=4>《土地复垦方案》批复
				{if $documentData[15]== '是'}		
					<input type="radio" name="legalLandIshave"  value="1" checked onclick="document.getElementById('legalLandName').removeAttribute('disabled');document.getElementById('legalLandNum').removeAttribute('disabled');document.getElementById('legalLandOrgan').removeAttribute('disabled');document.getElementById('legalLandTime').removeAttribute('disabled');document.getElementById('legalLandDeadline').removeAttribute('disabled');document.getElementById('legalLandDeadlinend').removeAttribute('disabled');">有
					<input type="radio" name="legalLandIshave"  value="0" onclick="document.getElementById('legalLandName').disabled='disabled';document.getElementById('legalLandNum').disabled='disabled';document.getElementById('legalLandOrgan').disabled='disabled';document.getElementById('legalLandTime').disabled='disabled';document.getElementById('legalLandDeadline').disabled='disabled';document.getElementById('legalLandDeadlinend').disabled='disabled';">无
					</td>
			</tr>
			<tr>
				<td class="tdhead">文件名</td><td><input type="text" value="{$documentData[16]}" id="legalLandName" name="legalLandName"></td>
				<td class="tdhead">批复号</td><td><input type="text" value="{$documentData[17]}" id="legalLandNum" name="legalLandNum"></td>
			</tr>
			<tr>
				<td class="tdhead">批复单位</td><td><input type="text" value="{$documentData[18]}" id="legalLandOrgan" name="legalLandOrgan"></td>
				<td class="tdhead">批复时间</td><td><input type="text" class="datepicker" value="{$documentData[19]}" id="legalLandTime" name="legalLandTime"></td>
			</tr>
			<tr>
				<td class="tdhead">有效期起始</td><td><input type="text" class="datepicker" value="{$documentData[20]}" id="legalLandDeadline" name="legalLandDeadline"></td>
				<td class="tdhead">有效期至</td><td><input type="text" id="legalLandDeadlinend" class="datepicker" onchange= "loadchecktime(this)" value="{$documentData[21]}" name="legalLandDeadlinend"></td>
			</tr>
				{else}		
					<input type="radio" name="legalLandIshave"  value="1" onclick="document.getElementById('legalLandName').removeAttribute('disabled');document.getElementById('legalLandNum').removeAttribute('disabled');document.getElementById('legalLandOrgan').removeAttribute('disabled');document.getElementById('legalLandTime').removeAttribute('disabled');document.getElementById('legalLandDeadline').removeAttribute('disabled');document.getElementById('legalLandDeadlinend').removeAttribute('disabled');">有
					<input type="radio" name="legalLandIshave"  value="0" checked onclick="document.getElementById('legalLandName').disabled='disabled';document.getElementById('legalLandNum').disabled='disabled';document.getElementById('legalLandOrgan').disabled='disabled';document.getElementById('legalLandTime').disabled='disabled';document.getElementById('legalLandDeadline').disabled='disabled';document.getElementById('legalLandDeadlinend').disabled='disabled';">无
					</td>
			</tr>
			<tr>
				<td class="tdhead">文件名</td><td><input type="text" value="{$documentData[16]}" id="legalLandName" name="legalLandName" disabled="disabled"></td>
				<td class="tdhead">批复号</td><td><input type="text" value="{$documentData[17]}" id="legalLandNum" name="legalLandNum" disabled="disabled"></td>
			</tr>
			<tr>
				<td class="tdhead">批复单位</td><td><input type="text" value="{$documentData[18]}" id="legalLandOrgan" name="legalLandOrgan"disabled="disabled"></td>
				<td class="tdhead">批复时间</td><td><input type="text" class="datepicker" value="{$documentData[19]}" id="legalLandTime" name="legalLandTime" disabled="disabled"></td>
			</tr>
			<tr>
				<td class="tdhead">有效期起始</td><td><input type="text" class="datepicker" value="{$documentData[20]}" id="legalLandDeadline" name="legalLandDeadline" disabled="disabled"></td>
				<td class="tdhead">有效期至</td><td><input type="text" id="legalLandDeadlinend" class="datepicker" onchange= "loadchecktime(this)" value="{$documentData[21]}" name="legalLandDeadlinend" disabled="disabled"></td>
			</tr>
				{/if}
			<tr>
				<td class="tdtitle" colspan=4>《环境影响评价报告》批复
				{if $documentData[22] == '是'}	
					<input type="radio" name="legalHuanjingpifu" value="1" checked onclick="document.getElementById('legalHuanjingpifuName').removeAttribute('disabled');document.getElementById('legalHuanjingpifuNum').removeAttribute('disabled');document.getElementById('legalHuanjingpifuOrgan').removeAttribute('disabled');document.getElementById('legalHuanjingpifuTime').removeAttribute('disabled');document.getElementById('legalHuanjingpifuDeadline').removeAttribute('disabled');document.getElementById('legalHuanjingpifuDeadlinend').removeAttribute('disabled');">有
					<input type="radio" name="legalHuanjingpifu" value="0" onclick="document.getElementById('legalHuanjingpifuName').disabled='disabled';document.getElementById('legalHuanjingpifuNum').disabled='disabled';document.getElementById('legalHuanjingpifuOrgan').disabled='disabled';document.getElementById('legalHuanjingpifuTime').disabled='disabled';document.getElementById('legalHuanjingpifuDeadline').disabled='disabled';document.getElementById('legalHuanjingpifuDeadlinend').disabled='disabled';">无
					</td>
			</tr>
			<tr>
				<td class="tdhead">文件名</td><td><input type="text" value="{$documentData[23]}" id="legalHuanjingpifuName" name="legalHuanjingpifuName"></td>
				<td class="tdhead">批复号</td><td><input type="text" value="{$documentData[24]}" id="legalHuanjingpifuNum" name="legalHuanjingpifuNum"></td>
			</tr>
			<tr>
				<td class="tdhead">批复单位</td><td><input type="text" value="{$documentData[25]}" id="legalHuanjingpifuOrgan" name="legalHuanjingpifuOrgan"></td>
				<td class="tdhead">批复时间</td><td><input type="text" class="datepicker" value="{$documentData[26]}" id="legalHuanjingpifuTime" name="legalHuanjingpifuTime"></td>
			</tr>
			<tr>
				<td class="tdhead">有效期起始</td><td><input type="text" class="datepicker" value="{$documentData[27]}" id="legalHuanjingpifuDeadline" name="legalHuanjingpifuDeadline"></td>
				<td class="tdhead">有效期至</td><td><input type="text"  id= "legalHuanjingpifuDeadlinend" class="datepicker" onchange= "loadchecktime(this)" value="{$documentData[28]}" name="legalHuanjingpifuDeadlinend"></td>
			</tr>
				{else}
					<input type="radio" name="legalHuanjingpifu" value="1" onclick="document.getElementById('legalHuanjingpifuName').removeAttribute('disabled');document.getElementById('legalHuanjingpifuNum').removeAttribute('disabled');document.getElementById('legalHuanjingpifuOrgan').removeAttribute('disabled');document.getElementById('legalHuanjingpifuTime').removeAttribute('disabled');document.getElementById('legalHuanjingpifuDeadline').removeAttribute('disabled');document.getElementById('legalHuanjingpifuDeadlinend').removeAttribute('disabled');">有
					<input type="radio" name="legalHuanjingpifu" value="0" checked onclick="document.getElementById('legalHuanjingpifuName').disabled='disabled';document.getElementById('legalHuanjingpifuNum').disabled='disabled';document.getElementById('legalHuanjingpifuOrgan').disabled='disabled';document.getElementById('legalHuanjingpifuTime').disabled='disabled';document.getElementById('legalHuanjingpifuDeadline').disabled='disabled';document.getElementById('legalHuanjingpifuDeadlinend').disabled='disabled';">无
					</td>
			</tr>
			<tr>
				<td class="tdhead">文件名</td><td><input type="text" value="{$documentData[23]}" id="legalHuanjingpifuName" name="legalHuanjingpifuName" disabled="disabled"></td>
				<td class="tdhead">批复号</td><td><input type="text" value="{$documentData[24]}" id="legalHuanjingpifuNum" name="legalHuanjingpifuNum" disabled="disabled"></td>
			</tr>
			<tr>
				<td class="tdhead">批复单位</td><td><input type="text" value="{$documentData[25]}" id="legalHuanjingpifuOrgan" name="legalHuanjingpifuOrgan" disabled="disabled"></td>
				<td class="tdhead">批复时间</td><td><input type="text" class="datepicker" value="{$documentData[26]}" id="legalHuanjingpifuTime" name="legalHuanjingpifuTime" disabled="disabled"></td>
			</tr>
			<tr>
				<td class="tdhead">有效期起始</td><td><input type="text" class="datepicker" value="{$documentData[27]}" id="legalHuanjingpifuDeadline" name="legalHuanjingpifuDeadline" disabled="disabled"></td>
				<td class="tdhead">有效期至</td><td><input type="text"  id= "legalHuanjingpifuDeadlinend" class="datepicker" onchange= "loadchecktime(this)" value="{$documentData[28]}" name="legalHuanjingpifuDeadlinend" disabled="disabled"></td>
			</tr>
				{/if}	
			<tr>
				<td class="tdtitle" colspan=4>《矿山地质环境保护与恢复治理方案》批复
				{if $documentData[29] == '是'}	
					<input type="radio" name="legalDizhipifu" value="1" checked onclick="document.getElementById('legalDizhipifuName').removeAttribute('disabled');document.getElementById('legalDizhipifuNum').removeAttribute('disabled');document.getElementById('legalDizhipifuOrgan').removeAttribute('disabled');document.getElementById('legalDizhipifuTime').removeAttribute('disabled');document.getElementById('legalDizhipifuDeadline').removeAttribute('disabled');document.getElementById('legalDizhipifuDeadlinend').removeAttribute('disabled');">有
					<input type="radio" name="legalDizhipifu" value="0" onclick="document.getElementById('legalDizhipifuName').disabled='disabled';document.getElementById('legalDizhipifuNum').disabled='disabled';document.getElementById('legalDizhipifuOrgan').disabled='disabled';document.getElementById('legalDizhipifuTime').disabled='disabled';document.getElementById('legalDizhipifuDeadline').disabled='disabled';document.getElementById('legalDizhipifuDeadlinend').disabled='disabled';">无
					</td>
			</tr>
			<tr>
				<td class="tdhead">文件名</td><td><input type="text" value="{$documentData[30]}" id="legalDizhipifuName" name="legalDizhipifuName"></td>
				<td class="tdhead">批复号</td><td><input type="text" value="{$documentData[31]}" id="legalDizhipifuNum" name="legalDizhipifuNum"></td>
			</tr>
			<tr>
				<td class="tdhead">批复单位</td><td><input type="text" value="{$documentData[32]}" id="legalDizhipifuOrgan" name="legalDizhipifuOrgan"></td>
				<td class="tdhead">批复时间</td><td><input type="text" class="datepicker" value="{$documentData[33]}" id="legalDizhipifuTime" name="legalDizhipifuTime"></td>
			</tr>
			<tr>
				<td class="tdhead">有效期起始</td><td><input type="text" class="datepicker" value="{$documentData[34]}" id="legalDizhipifuDeadline" name="legalDizhipifuDeadline"></td>
				<td class="tdhead">有效期至</td><td><input type="text" id = "legalDizhipifuDeadlinend" class="datepicker" onchange= "loadchecktime(this)" value="{$documentData[35]}" name="legalDizhipifuDeadlinend"></td>
			</tr>
				{else}
					<input type="radio" name="legalDizhipifu" value="1" onclick="document.getElementById('legalDizhipifuName').removeAttribute('disabled');document.getElementById('legalDizhipifuNum').removeAttribute('disabled');document.getElementById('legalDizhipifuOrgan').removeAttribute('disabled');document.getElementById('legalDizhipifuTime').removeAttribute('disabled');document.getElementById('legalDizhipifuDeadline').removeAttribute('disabled');document.getElementById('legalDizhipifuDeadlinend').removeAttribute('disabled');">有
					<input type="radio" name="legalDizhipifu" value="0" checked onclick="document.getElementById('legalDizhipifuName').disabled='disabled';document.getElementById('legalDizhipifuNum').disabled='disabled';document.getElementById('legalDizhipifuOrgan').disabled='disabled';document.getElementById('legalDizhipifuTime').disabled='disabled';document.getElementById('legalDizhipifuDeadline').disabled='disabled';document.getElementById('legalDizhipifuDeadlinend').disabled='disabled';">无
					</td>
			</tr>
			<tr>
				<td class="tdhead">文件名</td><td><input type="text" value="{$documentData[30]}" id="legalDizhipifuName" name="legalDizhipifuName" disabled="disabled"></td>
				<td class="tdhead">批复号</td><td><input type="text" value="{$documentData[31]}" id="legalDizhipifuNum" name="legalDizhipifuNum" disabled="disabled"></td>
			</tr>
			<tr>
				<td class="tdhead">批复单位</td><td><input type="text" value="{$documentData[32]}" id="legalDizhipifuOrgan" name="legalDizhipifuOrgan" disabled="disabled"></td>
				<td class="tdhead">批复时间</td><td><input type="text" class="datepicker" value="{$documentData[33]}" id="legalDizhipifuTime" name="legalDizhipifuTime" disabled="disabled"></td>
			</tr>
			<tr>
				<td class="tdhead">有效期起始</td><td><input type="text" class="datepicker" value="{$documentData[34]}" id="legalDizhipifuDeadline" name="legalDizhipifuDeadline" disabled="disabled"></td>
				<td class="tdhead">有效期至</td><td><input type="text" id = "legalDizhipifuDeadlinend" class="datepicker" onchange= "loadchecktime(this)" value="{$documentData[35]}" name="legalDizhipifuDeadlinend" disabled="disabled"></td>
			</tr>
			{/if}	
			<tr>
				<td class="tdtitle" colspan=4>《矿山地质灾害评估报告》批复
				{if $documentData[36] == '是'}	
					<input type="radio" name="legalZaihaipifu" value="1" checked onclick="document.getElementById('legalZaihaipifuName').removeAttribute('disabled');document.getElementById('legalZaihaipifuNum').removeAttribute('disabled');document.getElementById('legalZaihaipifuOrgan').removeAttribute('disabled');document.getElementById('legalZaihaipifuTime').removeAttribute('disabled');document.getElementById('legalZaihaipifuDeadline').removeAttribute('disabled');document.getElementById('legalZaihaipifuDeadlinend').removeAttribute('disabled');">有
					<input type="radio" name="legalZaihaipifu" value="0" onclick="document.getElementById('legalZaihaipifuName').disabled='disabled';document.getElementById('legalZaihaipifuNum').disabled='disabled';document.getElementById('legalZaihaipifuOrgan').disabled='disabled';document.getElementById('legalZaihaipifuTime').disabled='disabled';document.getElementById('legalZaihaipifuDeadline').disabled='disabled';document.getElementById('legalZaihaipifuDeadlinend').disabled='disabled';">无
					</td>
			</tr>
			<tr>
				<td class="tdhead">文件名</td><td><input type="text" value="{$documentData[37]}" id="legalZaihaipifuName" name="legalZaihaipifuName"></td>
				<td class="tdhead">批复号</td><td><input type="text" value="{$documentData[38]}" id="legalZaihaipifuNum" name="legalZaihaipifuNum"></td>
			</tr>
			<tr>
				<td class="tdhead">批复单位</td><td><input type="text" value="{$documentData[39]}" id="legalZaihaipifuOrgan" name="legalZaihaipifuOrgan"></td>
				<td class="tdhead">批复时间</td><td><input type="text" class="datepicker" value="{$documentData[40]}" id="legalZaihaipifuTime" name="legalZaihaipifuTime"></td>
			</tr>
			<tr>
				<td class="tdhead">有效期起始</td><td><input type="text" class="datepicker" value="{$documentData[41]}" id="legalZaihaipifuDeadline" name="legalZaihaipifuDeadline"></td>
				<td class="tdhead">有效期至</td><td><input type="text" id = "legalZaihaipifuDeadlinend" class="datepicker" onchange= "loadchecktime(this)" value="{$documentData[42]}" name="legalZaihaipifuDeadlinend"></td>
			</tr>
				{else}
					<input type="radio" name="legalZaihaipifu" value="1" onclick="document.getElementById('legalZaihaipifuName').removeAttribute('disabled');document.getElementById('legalZaihaipifuNum').removeAttribute('disabled');document.getElementById('legalZaihaipifuOrgan').removeAttribute('disabled');document.getElementById('legalZaihaipifuTime').removeAttribute('disabled');document.getElementById('legalZaihaipifuDeadline').removeAttribute('disabled');document.getElementById('legalZaihaipifuDeadlinend').removeAttribute('disabled');">有
					<input type="radio" name="legalZaihaipifu" value="0" checked onclick="document.getElementById('legalZaihaipifuName').disabled='disabled';document.getElementById('legalZaihaipifuNum').disabled='disabled';document.getElementById('legalZaihaipifuOrgan').disabled='disabled';document.getElementById('legalZaihaipifuTime').disabled='disabled';document.getElementById('legalZaihaipifuDeadline').disabled='disabled';document.getElementById('legalZaihaipifuDeadlinend').disabled='disabled';">无
					</td>
			</tr>
			<tr>
				<td class="tdhead">文件名</td><td><input type="text" value="{$documentData[37]}" id="legalZaihaipifuName" name="legalZaihaipifuName" disabled="disabled"></td>
				<td class="tdhead">批复号</td><td><input type="text" value="{$documentData[38]}" id="legalZaihaipifuNum" name="legalZaihaipifuNum" disabled="disabled"></td>
			</tr>
			<tr>
				<td class="tdhead">批复单位</td><td><input type="text" value="{$documentData[39]}" id="legalZaihaipifuOrgan" name="legalZaihaipifuOrgan" disabled="disabled"></td>
				<td class="tdhead">批复时间</td><td><input type="text" class="datepicker" value="{$documentData[40]}" id="legalZaihaipifuTime" name="legalZaihaipifuTime" disabled="disabled"></td>
			</tr>
			<tr>
				<td class="tdhead">有效期起始</td><td><input type="text" class="datepicker" value="{$documentData[41]}" id="legalZaihaipifuDeadline" name="legalZaihaipifuDeadline" disabled="disabled"></td>
				<td class="tdhead">有效期至</td><td><input type="text" id = "legalZaihaipifuDeadlinend" class="datepicker" onchange= "loadchecktime(this)" value="{$documentData[42]}" name="legalZaihaipifuDeadlinend" disabled="disabled"></td>
			</tr>
				{/if}
				
		</table>
		<table class="formView" width="100%">
			<tr>
				<td class="tdtitle" colspan=4>依法纳税和矿山环境恢复治理保证金缴纳情况</td>
			</tr>
			<tr>
				<td class="tdhead">矿产资源补偿费</td>
				<td width="30%"><input type="text"  value="{$taxData[1]}" name="legalFeeRecom" ></td>
				<td class="tdhead">已缴税金总额</td>
				<td width="30%"><input type="text"  value="{$taxData[2]}" name="legalFeeOver" ></td>
			</tr>
			<tr>
				<td class="tdhead">已缴资源税</td>
				<td ><input type="text"  value="{$taxData[3]}" name="legalFeeResource" ></td>
				<td class="tdhead">已缴增值税</td>
				<td ><input type="text"  value="{$taxData[4]}" name="legalFeeValueadd" ></td>	
			</tr>	
			<tr>
				<td class="tdhead">已缴企业所得税</td>
				<td ><input type="text"  value="{$taxData[5]}" name="legalFeeCompany" ></td>
				<td class="tdhead">应缴税金</td>
				<td ><input type="text"  value="{$taxData[6]}" name="legalFeeTopay" ></td>
			</tr>	
			<tr>  
				<td class="tdhead">欠缴税金</td>
				<td ><input type="text"  value="{$taxData[7]}" name="legalFeeNotpay" ></td>
				<td class="tdhead">保证金</td>
				<td ><input type="text"  value="{$taxData[8]}" name="legalFeeEnsure" ></td>
			</tr>		
			<tr>
				<td class="tdhead">矿山环境治理保证金</td>
				<td ><input type="text"  value="{$taxData[9]}" name="legalFeeEnvironment"></td>
				<td class="tdhead">土地复垦保证金</td>
				<td ><input type="text"  value="{$taxData[10]}" name="legalFeeLand" ></td>
			</tr>
			<tr>
				<td class="tdtitle" colspan=4>矿业权价款缴纳情况</td>
			</tr>
			<tr>
				<td class="tdhead">应缴价款额度</td>
				<td ><input type="text"  value="{$priceData[1]}" name="legalPriceTopay"  ></td>
				<td class="tdhead">已缴价款额度</td>
				<td ><input type="text"  value="{$priceData[2]}" name="legalPricePayed"  ></td>
			</tr>
			<tr>
				<td class="tdhead">欠缴价款额度</td>
				<td ><input type="text"  value="{$priceData[3]}" name="legalPriceNopay"  ></td>
				<td class="tdhead">应缴款时间</td>
				<td ><input type="text"  value="{$priceData[4]}" name="legalPriceTime"  ></td>
			</tr>
			<tr>	
				<td class='tdhead'>两年内无安全生产责任事故</td>
				<td colspan=3><textarea cols="60" rows="2" name="legalAccident">{$priceData[5]}</textarea></td>
			</tr>
			<tr>	
				<td class='tdtitle' colspan=4>安全生产责任事故情况</td>
			</tr>
			<tr>
				<td class='tdhead'>是否有安全事故</td>
				{if $accidentData[1] == '是'}
				<td>		
					<input type="radio" name="legalAccidentIshave"  value="1" checked onclick="document.getElementById('legalAccidentPlace').removeAttribute('disabled');document.getElementById('legalAccidentTime').removeAttribute('disabled');document.getElementById('legalAccidentDeal').removeAttribute('disabled');">是
					<input type="radio" name="legalAccidentIshave"  value="0" onclick="document.getElementById('legalAccidentPlace').disabled='disabled';document.getElementById('legalAccidentTime').disabled='disabled';document.getElementById('legalAccidentDeal').disabled='disabled';">否
				</td>
				<td class="tdhead">事故地点</td>
				<td ><input type="text"  value="{$accidentData[2]}" id="legalAccidentPlace" name="legalAccidentPlace" width="100%"></td>
			</tr>
			<tr>
				<td class="tdhead">发生时间</td>
				<td ><input type="text"  value="{$accidentData[3]}" id="legalAccidentTime" name="legalAccidentTime"  ></td>
				<td class="tdhead">处理情况</td>
				<td ><input type="text"  value="{$accidentData[4]}" id="legalAccidentDeal" name="legalAccidentDeal"  ></td>
			</tr>
				{else}
				<td>		
					<input type="radio" name="legalAccidentIshave"  value="1" onclick="document.getElementById('legalAccidentPlace').removeAttribute('disabled');document.getElementById('legalAccidentTime').removeAttribute('disabled');document.getElementById('legalAccidentDeal').removeAttribute('disabled');">是
					<input type="radio" name="legalAccidentIshave"  value="0" checked onclick="document.getElementById('legalAccidentPlace').disabled='disabled';document.getElementById('legalAccidentTime').disabled='disabled';document.getElementById('legalAccidentDeal').disabled='disabled';">否
				</td>
				<td class="tdhead">事故地点</td>
				<td ><input type="text"  value="{$accidentData[2]}" id="legalAccidentPlace" name="legalAccidentPlace" width="100%" disabled="disabled"></td>
			</tr>
			<tr>
				<td class="tdhead">发生时间</td>
				<td ><input type="text"  value="{$accidentData[3]}" id="legalAccidentTime" name="legalAccidentTime" disabled="disabled"></td>
				<td class="tdhead">处理情况</td>
				<td ><input type="text"  value="{$accidentData[4]}" id="legalAccidentDeal" name="legalAccidentDeal" disabled="disabled" ></td>
			</tr>
				{/if}
				
			<tr>	
				<td class='tdtitle' colspan=4>环境污染事故情况</td>
			</tr>
			<tr>
				<td class='tdhead'>是否有安全事故</td>
				{if $accidentData[5] == '是'}
				<td>		
					<input type="radio" name="legalPolluteIshave"  value="1" checked onclick="document.getElementById('legalPollutePlace').removeAttribute('disabled');document.getElementById('legalPolluteTime').removeAttribute('disabled');document.getElementById('legalPolluteDeal').removeAttribute('disabled');">是
					<input type="radio" name="legalPolluteIshave"  value="0" onclick="document.getElementById('legalPollutePlace').disabled='disabled';document.getElementById('legalPolluteTime').disabled='disabled';document.getElementById('legalPolluteDeal').disabled='disabled';">否
				</td>
				<td class="tdhead">事故地点</td>
				<td ><input type="text"  value="{$accidentData[6]}" id="legalPollutePlace" name="legalPollutePlace" width="100%"></td>
			</tr>
			<tr>
				<td class="tdhead">发生时间</td>
				<td ><input type="text"  value="{$accidentData[7]}" id="legalPolluteTime" name="legalPolluteTime"  ></td>
				<td class="tdhead">处理情况</td>
				<td ><input type="text"  value="{$accidentData[8]}" id="legalPolluteDeal" name="legalPolluteDeal"  ></td>
			</tr>
				{else}
				<td>		
					<input type="radio" name="legalPolluteIshave"  value="1" onclick="document.getElementById('legalPollutePlace').removeAttribute('disabled');document.getElementById('legalPolluteTime').removeAttribute('disabled');document.getElementById('legalPolluteDeal').removeAttribute('disabled');">是
					<input type="radio" name="legalPolluteIshave"  value="0" checked onclick="document.getElementById('legalPollutePlace').disabled='disabled';document.getElementById('legalPolluteTime').disabled='disabled';document.getElementById('legalPolluteDeal').disabled='disabled';">否
				</td>
				<td class="tdhead">事故地点</td>
				<td ><input type="text"  value="{$accidentData[6]}" id="legalPollutePlace" name="legalPollutePlace" width="100%" disabled="disabled"></td>
			</tr>
			<tr>
				<td class="tdhead">发生时间</td>
				<td ><input type="text"  value="{$accidentData[7]}" id="legalPolluteTime" name="legalPolluteTime"  disabled="disabled"></td>
				<td class="tdhead">处理情况</td>
				<td ><input type="text"  value="{$accidentData[8]}" id="legalPolluteDeal" name="legalPolluteDeal" disabled="disabled" ></td>
			</tr>
				{/if}
				
			<tr>	
				<td class='tdtitle' colspan=4>3年内行政处罚情况</td>
			</tr>
			<tr>
				<td class='tdhead'>是否受处罚</td>
				{if $accidentData[9] == '是'}
				<td>		
					<input type="radio" name="legalPunishIshave"  value="1" checked onclick="document.getElementById('legalPunishReson').removeAttribute('disabled');document.getElementById('legalPunishTime').removeAttribute('disabled');document.getElementById('legalPunishPerson').removeAttribute('disabled');">是
					<input type="radio" name="legalPunishIshave"  value="0" onclick="document.getElementById('legalPunishReson').disabled='disabled';document.getElementById('legalPunishTime').disabled='disabled';document.getElementById('legalPunishPerson').disabled='disabled';">否
				</td>
				<td class="tdhead">处罚原因</td>
				<td><textarea cols="30" rows="2" id="legalPunishReson" name="legalPunishReson" width="100%">{$accidentData[10]}</textarea></td>
			</tr>
			<tr>
				<td class="tdhead">处罚时间</td>
				<td ><input type="text"  value="{$accidentData[11]}" id="legalPunishTime" name="legalPunishTime"  ></td>
				<td class="tdhead">责任人</td>
				<td ><input type="text"  value="{$accidentData[12]}" id="legalPunishPerson" name="legalPunishPerson"  ></td>
			</tr>
				{else}
				<td>		
					<input type="radio" name="legalPunishIshave"  value="1" onclick="document.getElementById('legalPunishReson').removeAttribute('disabled');document.getElementById('legalPunishTime').removeAttribute('disabled');document.getElementById('legalPunishPerson').removeAttribute('disabled');">是
					<input type="radio" name="legalPunishIshave"  value="0" checked onclick="document.getElementById('legalPunishReson').disabled='disabled';document.getElementById('legalPunishTime').disabled='disabled';document.getElementById('legalPunishPerson').disabled='disabled';">否
				</td>
				<td class="tdhead">处罚原因</td>
				<td><textarea cols="30" rows="2" id="legalPunishReson" name="legalPunishReson" width="100%" disabled="disabled">{$accidentData[10]}</textarea></td>
			</tr>
			<tr>
				<td class="tdhead">处罚时间</td>
				<td ><input type="text"  value="{$accidentData[11]}" id="legalPunishTime" name="legalPunishTime" disabled="disabled" ></td>
				<td class="tdhead">责任人</td>
				<td ><input type="text"  value="{$accidentData[12]}" id="legalPunishPerson" name="legalPunishPerson" disabled="disabled" ></td>
			</tr>
				{/if}
				
			<tr>
				<td class='tdtitle'>是否符合矿产资源规划的要求</td>
				{if $safetyData[1] == '是'}
				<td class='tdtitle'>		
					<input type="radio" name="legalIsaccplan"  value="1" checked>是
					<input type="radio" name="legalIsaccplan"  value="0" >否
				</td>
				{else}
				<td class='tdtitle'>		
					<input type="radio" name="legalIsaccplan"  value="1" >是
					<input type="radio" name="legalIsaccplan"  value="0" checked>否
				</td>
				{/if}
				<td class='tdtitle' >是否有通过审查的资源开发利用方案</td>
				{if $safetyData[2] == '是'}
				<td class='tdtitle'>		
					<input type="radio" name="legalHaveplan"  value="1" checked>是
					<input type="radio" name="legalHaveplan"  value="0" >否
				</td>
				{else}
				<td class='tdtitle'>		
					<input type="radio" name="legalHaveplan"  value="1" >是
					<input type="radio" name="legalHaveplan"  value="0" checked>否
				</td>
				{/if}
			</tr>
			<tr>
				<td class='tdtitle' colspan=4>安全设施完备度</td>
			</tr>
			<tr>
				<td class='tdhead'>是否有监测监控系统</td>
				{if $safetyData[3] == '是'}
				<td>		
					<input type="radio" name="legalSecureMonitor"  value="1" checked>是
					<input type="radio" name="legalSecureMonitor"  value="0" >否
				</td>
				{else}
				<td>		
					<input type="radio" name="legalSecureMonitor"  value="1" >是
					<input type="radio" name="legalSecureMonitor"  value="0" checked>否
				</td>
				{/if}
				<td class='tdhead'>是否有人员定位系统</td>
				{if $safetyData[4] == '是'}
				<td>		
					<input type="radio" name="legalSecurePerson"  value="1" checked>是
					<input type="radio" name="legalSecurePerson"  value="0" >否
				</td>
				{else}
				<td>		
					<input type="radio" name="legalSecurePerson"  value="1" >是
					<input type="radio" name="legalSecurePerson"  value="0" checked>否
				</td>
				{/if}
			</tr>
			<tr>
				<td class='tdhead'>是否有紧急避灾系统</td>
				{if $safetyData[5] == '是'}
				<td>		
					<input type="radio" name="legalSecureEmergency"  value="1" checked>是
					<input type="radio" name="legalSecureEmergency"  value="0" >否
				</td>
				{else}
				<td>		
					<input type="radio" name="legalSecureEmergency"  value="1" >是
					<input type="radio" name="legalSecureEmergency"  value="0" checked>否
				</td>
				{/if}
				<td class='tdhead'>是否有压风自救系统</td>
				{if $safetyData[6] == '是'}
				<td>		
					<input type="radio" name="legalSecureWind"  value="1" checked>是
					<input type="radio" name="legalSecureWind"  value="0" >否
				</td>
				{else}
				<td>		
					<input type="radio" name="legalSecureWind"  value="1" >是
					<input type="radio" name="legalSecureWind"  value="0" checked>否
				</td>
				{/if}
			</tr>
			<tr>
				<td class='tdhead' >是否有供水施救系统</td>
				{if $safetyData[7] == '是'}
				<td>		
					<input type="radio" name="legalSecureWater"  value="1" checked>是
					<input type="radio" name="legalSecureWater"  value="0" >否
				</td>
				{else}
				<td>		
					<input type="radio" name="legalSecureWater"  value="1" >是
					<input type="radio" name="legalSecureWater"  value="0" checked>否
				</td>
				{/if}
				<td class='tdhead' >是否有通讯联络系统</td>
				{if $safetyData[8] == '是'}
				<td>		
					<input type="radio" name="legalSecureCommunicate"  value="1" checked>是
					<input type="radio" name="legalSecureCommunicate"  value="0" >否
				</td>
				{else}
				<td>		
					<input type="radio" name="legalSecureCommunicate"  value="1" >是
					<input type="radio" name="legalSecureCommunicate"  value="0" checked>否
				</td>
				{/if}
			</tr>					
		</table>
	</div>
	<div id="tabs-3"><!--规范管理-->
	<table class="formView" align="center" id="standard">
		<tr>
			<td class="tdtitle" colspan=4>绿色矿山发展制度建设情况</td>
		</tr>
		<tr>
			<td class="tdhead">整体情况</td>
			<td colspan=3>
				<textarea cols="60" rows="4"  name="standardGrow">{$Institution_building[1]}</textarea>
			</td>
		</tr>
		<tr>
			<td class='tdhead'>是否有为绿色矿山修改生产管理制度</td>
			{if $Institution_building[2] == '是'}
				<td>		
					<input type="radio" name="standardGrowIsgreen"  value="1" checked onclick="document.getElementById('standardGrowTime').removeAttribute('disabled');">是
					<input type="radio" name="standardGrowIsgreen"  value="0" onclick="document.getElementById('standardGrowTime').disabled='disabled';">否
				</td>
				<td class="tdhead">修改时间</td>
				<td><input type="text"  value="{$Institution_building[3]}" class="datepicker" id="standardGrowTime" name="standardGrowTime" ></td>
			{else}
				<td>		
					<input type="radio" name="standardGrowIsgreen"  value="1" onclick="document.getElementById('standardGrowTime').removeAttribute('disabled');">是
					<input type="radio" name="standardGrowIsgreen"  value="0" checked nclick="document.getElementById('standardGrowTime').disabled='disabled';">否
				</td>
				<td class="tdhead">修改时间</td>
				<td><input type="text"  value="{$Institution_building[3]}" class="datepicker" id="standardGrowTime" name="standardGrowTime" disabled="disabled"></td>
			{/if}
			
			
		</tr>
		<tr>
			<td class="tdhead">修改条目</td>
			<td colspan=3>
				<textarea cols="60" rows="4"  name="standardGrowChange">{$Institution_building[4]}</textarea>
			</td>
		</tr>
		<tr>
			<td class="tdhead">备注</td>
			<td colspan=3>
				<textarea cols="60" rows="4"  name="standardGrowComment">{$Institution_building[5]}</textarea>
			</td>
		</tr>
	</table>
	<table class="formView" width="100%">
		<tr>
			<td class="tdtitle" colspan=4>规章制度完善情况</td>
		</tr>
		<tr>
			<td class='tdhead'>是否加入《绿色矿业公约》</td>
			{if $System_improvement[1] == '是'}
				<td width="10%">		
					<input type="radio" name="standardIsConv"  value="1" checked>是
					<input type="radio" name="standardIsConv"  value="0" >否
				</td>
			{else}
				<td width="10%">		
					<input type="radio" name="standardIsConv"  value="1" >是
					<input type="radio" name="standardIsConv"  value="0" checked>否
				</td>
			{/if}
			<td class='tdhead'>是否有矿山安全生产责任制</td>
			{if $System_improvement[2] == '是'}
				<td width="10%">		
					<input type="radio" name="standardIsDuty"  value="1" checked>是
					<input type="radio" name="standardIsDuty"  value="0" >否
				</td>
			{else}
				<td width="10%">		
					<input type="radio" name="standardIsDuty"  value="1" >是
					<input type="radio" name="standardIsDuty"  value="0" checked>否
				</td>
			{/if}
		</tr>
		<tr>
			<td class='tdhead'>是否有矿山安全生产综合管理制度</td>
			{if $System_improvement[3] == '是'}
				<td>		
					<input type="radio" name="standardIsSafecom"  value="1" checked>是
					<input type="radio" name="standardIsSafecom"  value="0" >否
				</td>
			{else}
				<td>		
					<input type="radio" name="standardIsSafecom"  value="1" >是
					<input type="radio" name="standardIsSafecom"  value="0" checked>否
				</td>
			{/if}
			<td class='tdhead'>是否有矿山安全生产现场管理制度</td>
			{if $System_improvement[4] == '是'}
				<td>		
					<input type="radio" name="standardIsSafesite"  value="1" checked>是
					<input type="radio" name="standardIsSafesite"  value="0" >否
				</td>
			{else}
				<td>		
					<input type="radio" name="standardIsSafesite"  value="1" >是
					<input type="radio" name="standardIsSafesite"  value="0" checked>否
				</td>
			{/if}
		</tr>		
		<tr>
			<td class='tdhead'>是否有矿山安全生产监督检查管理制度</td>
			{if $System_improvement[5] == '是'}
				<td>		
					<input type="radio" name="standardIsSafecontrol"  value="1" checked>是
					<input type="radio" name="standardIsSafecontrol"  value="0" >否
				</td>
			{else}
				<td>		
					<input type="radio" name="standardIsSafecontrol"  value="1" >是
					<input type="radio" name="standardIsSafecontrol"  value="0" checked>否
				</td>
			{/if}
			<td class='tdhead'>是否有矿山安全事故救护及处理制度</td>
			{if $System_improvement[6] == '是'}
				<td>		
					<input type="radio" name="standardIsSafeacid"  value="1" checked>是
					<input type="radio" name="standardIsSafeacid"  value="0" >否
				</td>
			{else}
				<td>		
					<input type="radio" name="standardIsSafeacid"  value="1" >是
					<input type="radio" name="standardIsSafeacid"  value="0" checked>否
				</td>
			{/if}
		</tr>		
		<tr>
			<td class='tdhead'>是否有矿山安全生产操作规程</td>
			{if $System_improvement[7] == '是'}
				<td>		
					<input type="radio" name="standardIsSafeoper"  value="1" checked>是
					<input type="radio" name="standardIsSafeoper"  value="0" >否
				</td>
			{else}
				<td>		
					<input type="radio" name="standardIsSafeoper"  value="1" >是
					<input type="radio" name="standardIsSafeoper"  value="0" checked>否
				</td>
			{/if}
			<td class='tdhead'>是否落实安全生产责任制</td>
			{if $System_improvement[8] == '是'}
				<td>		
					<input type="radio" name="standardIsDutyok"  value="1" checked>是
					<input type="radio" name="standardIsDutyok"  value="0" >否
				</td>
			{else}
				<td>		
					<input type="radio" name="standardIsDutyok"  value="1" >是
					<input type="radio" name="standardIsDutyok"  value="0" checked>否
				</td>
			{/if}
		</tr>		
		<tr>
			<td class='tdhead'>安全生产专业人员是否持证上岗</td>
			{if $System_improvement[9] == '是'}
				<td>		
					<input type="radio" name="standardIsCard"  value="1" checked>是
					<input type="radio" name="standardIsCard"  value="0" >否
				</td>
			{else}
				<td>		
					<input type="radio" name="standardIsCard"  value="1" >是
					<input type="radio" name="standardIsCard"  value="0" checked>否
				</td>
			{/if}
			<td class='tdhead'>是否有档案管理制度</td>
			{if $System_improvement[10] == '是'}
				<td>		
					<input type="radio" name="standardIsFile"  value="1" checked>是
					<input type="radio" name="standardIsFile"  value="0" >否
				</td>
			{else}
				<td>		
					<input type="radio" name="standardIsFile"  value="1" >是
					<input type="radio" name="standardIsFile"  value="0" checked>否
				</td>
			{/if}
		</tr>
		<tr>
			<td class='tdhead'>绿色矿山建设是否实行法定代表人负责制</td>
			{if $System_improvement[11] == '是'}
				<td>		
					<input type="radio" name="standardIsLegalman"  value="1" checked>是
					<input type="radio" name="standardIsLegalman"  value="0" >否
				</td>
			{else}
				<td>		
					<input type="radio" name="standardIsLegalman"  value="1" >是
					<input type="radio" name="standardIsLegalman"  value="0" checked>否
				</td>
			{/if}
		</tr>		
		<tr>
			<td class="tdhead">其他录入项</td>
			<td colspan=3><textarea cols="60" rows="2" name="standardOther" width="100%">{$System_improvement[12]}</textarea></td>
		</tr>
		<tr>
			<td class="tdtitle" colspan=4>职工技术培训体系</td>
		</tr>
		<tr>
			<td class="tdhead">整体情况</td>
			<td colspan=3><textarea cols="60" rows="4" name="standardWorker" width="100%">{$Training_system[1]}</textarea></td>
		</tr>	
		<tr>
			<td class="tdhead">每年组织培训次数</td>
			<td colspan=3><input type="text"  value="{$Training_system[2]}" name="standardWorkerCount"  ><input type="button" id="button_standardWorkerCount" value="详情"/></td>
		</tr>
	</table>
	<table align="center" style="display:none;" class="formView" id="bef3_pre5_standardWorkerCount">
		<tr>
			<td class="tdhead">{$declaredata[3]-2}年实际值</td><td><input value="{$Number_training[1]}" name="standardWorkerCount_bef3"></td>
			<td class="tdhead">{$declaredata[3]-1}年实际值</td><td><input value="{$Number_training[2]}" name="standardWorkerCount_bef2"></td>
		</tr>
		<tr>
			<td class="tdhead">{$declaredata[3]}年实际值</td><td><input value="{$Number_training[3]}" name="standardWorkerCount_bef1"></td>
		</tr>
		<tr>
			<td class="tdhead">{$declaredata[3]+1}年规划值</td><td><input value="{$Number_training[4]}" name="standardWorkerCount_pre1"></td>
			<td class="tdhead">{$declaredata[3]+1}年实际值</td><td><input value="{$Number_training[5]}" name="standardWorkerCount_pre1real"></td>
		</tr>
		<tr>
			<td class="tdhead">{$declaredata[3]+2}年规划值</td><td><input value="{$Number_training[6]}" name="standardWorkerCount_pre2"></td>
			<td class="tdhead">{$declaredata[3]+2}年实际值</td><td><input value="{$Number_training[7]}" name="standardWorkerCount_pre2real"></td>
		</tr>
		<tr>
			<td class="tdhead">{$declaredata[3]+3}年规划值</td><td><input value="{$Number_training[8]}" name="standardWorkerCount_pre3"></td>
			<td class="tdhead">{$declaredata[3]+3}年实际值</td><td><input value="{$Number_training[9]}" name="standardWorkerCount_pre3real"></td>
		</tr>
		<tr>
			<td class="tdhead">{$declaredata[3]+4}年规划值</td><td><input value="{$Number_training[10]}" name="standardWorkerCount_pre4"></td>
			<td class="tdhead">{$declaredata[3]+4}年实际值</td><td><input value="{$Number_training[11]}" name="standardWorkerCount_pre4real"></td>
		</tr>
		<tr>
			<td class="tdhead">{$declaredata[3]+5}年规划值</td><td><input value="{$Number_training[12]}" name="standardWorkerCount_pre5"></td>
			<td class="tdhead">{$declaredata[3]+5}年实际值</td><td><input value="{$Number_training[13]}" name="standardWorkerCount_pre5real"></td>	  
		</tr>
	</table>
	<table class="formView" align="center" width='100%'>
		<tr>
			<td class="tdhead" >平均每年培训投入经费</td>
			<td width="40%"><input type="text"  value="{$Training_system[3]}" name="standardWorkerCost"  ><input type="button" id="button_standardWorkerCost" value="详情"/></td>
		</tr>
	</table>
	<table align="center" style="display:none;" class="formView" id="bef3_pre5_standardWorkerCost">
		<tr>
			<td class="tdhead">{$declaredata[3]-2}年实际值</td><td><input value="{$Training_funds[1]}" name="standardWorkerCost_bef3"></td>
			<td class="tdhead">{$declaredata[3]-1}年实际值</td><td><input value="{$Training_funds[2]}" name="standardWorkerCost_bef2"></td>
		</tr>
		<tr>
			<td class="tdhead">{$declaredata[3]}年实际值</td><td><input value="{$Training_funds[3]}" name="standardWorkerCost_bef1"></td>
		</tr>
		<tr>
			<td class="tdhead">{$declaredata[3]+1}年规划值</td><td><input value="{$Training_funds[4]}" name="standardWorkerCost_pre1"></td>
			<td class="tdhead">{$declaredata[3]+1}年实际值</td><td><input value="{$Training_funds[5]}" name="standardWorkerCost_pre1real"></td>
		</tr>
		<tr>
			<td class="tdhead">{$declaredata[3]+2}年规划值</td><td><input value="{$Training_funds[6]}" name="standardWorkerCost_pre2"></td>
			<td class="tdhead">{$declaredata[3]+2}年实际值</td><td><input value="{$Training_funds[7]}" name="standardWorkerCost_pre2real"></td>
		</tr>
		<tr>
			<td class="tdhead">{$declaredata[3]+3}年规划值</td><td><input value="{$Training_funds[8]}" name="standardWorkerCost_pre3"></td>
			<td class="tdhead">{$declaredata[3]+3}年实际值</td><td><input value="{$Training_funds[9]}" name="standardWorkerCost_pre3real"></td>
		</tr>
		<tr>
			<td class="tdhead">{$declaredata[3]+4}年规划值</td><td><input value="{$Training_funds[10]}" name="standardWorkerCost_pre4"></td>
			<td class="tdhead">{$declaredata[3]+4}年实际值</td><td><input value="{$Training_funds[11]}" name="standardWorkerCost_pre4real"></td>
		</tr>
		<tr>
			<td class="tdhead">{$declaredata[3]+5}年规划值</td><td><input value="{$Training_funds[12]}" name="standardWorkerCost_pre5"></td>
			<td class="tdhead">{$declaredata[3]+5}年实际值</td><td><input value="{$Training_funds[13]}" name="standardWorkerCost_pre5real"></td>	  
		</tr>
	</table>
	<table class="formView" width="100%">
		<tr>
			<td class='tdtitle' colspan=6>IS014001：2004环境管理体系认证
			{if $Environmental_certification[1] == '是'}	
					<input type="radio" name="standardIso4001"  value="1" checked onclick="document.getElementById('standardIso4001Organ').removeAttribute('disabled');document.getElementById('standardIso4001Time').removeAttribute('disabled');document.getElementById('standardIso4001Deadline').removeAttribute('disabled');">是
					<input type="radio" name="standardIso4001"  value="0" onclick="document.getElementById('standardIso4001Organ').disabled='disabled';document.getElementById('standardIso4001Time').disabled='disabled';document.getElementById('standardIso4001Deadline').disabled='disabled';">否
					</td>
		</tr>		
		<tr>
			<td class="tdhead">认证单位</td>
			<td><input type="text"  value="{$Environmental_certification[2]}" id="standardIso4001Organ" name="standardIso4001Organ"  ></td>
			<td class="tdhead">认证时间</td>
			<td><input type="text"  value="{$Environmental_certification[3]}" id="standardIso4001Time" name="standardIso4001Time" class="datepicker"  ></td>
			<td class="tdhead">有效期</td>
			<td><input type="text"  value="{$Environmental_certification[4]}" id="standardIso4001Deadline" name="standardIso4001Deadline"  ></td>
		</tr>
			{else}		
					<input type="radio" name="standardIso4001"  value="1" onclick="document.getElementById('standardIso4001Organ').removeAttribute('disabled');document.getElementById('standardIso4001Time').removeAttribute('disabled');document.getElementById('standardIso4001Deadline').removeAttribute('disabled');">是
					<input type="radio" name="standardIso4001"  value="0" checked onclick="document.getElementById('standardIso4001Organ').disabled='disabled';document.getElementById('standardIso4001Time').disabled='disabled';document.getElementById('standardIso4001Deadline').disabled='disabled';">否
					</td>
		</tr>		
		<tr>
			<td class="tdhead">认证单位</td>
			<td><input type="text"  value="{$Environmental_certification[2]}" id="standardIso4001Organ" name="standardIso4001Organ" disabled="disabled" ></td>
			<td class="tdhead">认证时间</td>
			<td><input type="text"  value="{$Environmental_certification[3]}" id="standardIso4001Time" name="standardIso4001Time" class="datepicker"  disabled="disabled"></td>
			<td class="tdhead">有效期</td>
			<td><input type="text"  value="{$Environmental_certification[4]}" id="standardIso4001Deadline" name="standardIso4001Deadline"  disabled="disabled"></td>
		</tr>
			{/if}
			
		<tr>
			<td class='tdtitle' colspan=6>ISO9001：2008质量管理体系认证
			{if $Quality_certification[1] == '是'}		
					<input type="radio" name="standardIso9001"  value="1" checked onclick="document.getElementById('standardIso9001Organ').removeAttribute('disabled');document.getElementById('standardIso9001Time').removeAttribute('disabled');document.getElementById('standardIso9001Deadline').removeAttribute('disabled');">是
					<input type="radio" name="standardIso9001"  value="0" onclick="document.getElementById('standardIso9001Organ').disabled='disabled';document.getElementById('standardIso9001Time').disabled='disabled';document.getElementById('standardIso9001Deadline').disabled='disabled';">否
					</td>
		</tr>		
		<tr>
			<td class="tdhead">认证单位</td>
			<td><input type="text"  value="{$Quality_certification[2]}" id="standardIso9001Organ" name="standardIso9001Organ"  ></td>
			<td class="tdhead">认证时间</td>
			<td><input type="text"  value="{$Quality_certification[3]}" id="standardIso9001Time" name="standardIso9001Time" class="datepicker"  ></td>
			<td class="tdhead">有效期</td>
			<td><input type="text"  value="{$Quality_certification[4]}" id="standardIso9001Deadline" name="standardIso9001Deadline"  ></td>
		</tr>
			{else}		
					<input type="radio" name="standardIso9001"  value="1" onclick="document.getElementById('standardIso9001Organ').removeAttribute('disabled');document.getElementById('standardIso9001Time').removeAttribute('disabled');document.getElementById('standardIso9001Deadline').removeAttribute('disabled');">是
					<input type="radio" name="standardIso9001"  value="0" checked onclick="document.getElementById('standardIso9001Organ').disabled='disabled';document.getElementById('standardIso9001Time').disabled='disabled';document.getElementById('standardIso9001Deadline').disabled='disabled';">否
					</td>
		</tr>		
		<tr>
			<td class="tdhead">认证单位</td>
			<td><input type="text"  value="{$Quality_certification[2]}" id="standardIso9001Organ" name="standardIso9001Organ"  disabled="disabled"></td>
			<td class="tdhead">认证时间</td>
			<td><input type="text"  value="{$Quality_certification[3]}" id="standardIso9001Time" name="standardIso9001Time" class="datepicker"  disabled="disabled" ></td>
			<td class="tdhead">有效期</td>
			<td><input type="text"  value="{$Quality_certification[4]}" id="standardIso9001Deadline" name="standardIso9001Deadline"  disabled="disabled"></td>
		</tr>
			{/if}
								
    </table>
    </div>
	
	<div id="tabs-4"><!--综合利用-->
	{foreach from=$oredataand35Array item=o}
	
	{if $o._2=='煤矿'&& $o._3=='主矿种'}
	<table class="formView" align="center" id="complex" width="100%">
		<tr>
			<td class="tdtitle" colspan=4 style="background:#CCFFFF">主矿种：{$o._2}</td>
		</tr>
		<tr>
			<td class="tdhead">采区回采率(%)</td>
			<td width="30%">
				<input type="text"  value="{$o._4}" name="meiCqhc[]" style="width:80px">
				<input type="button" class="button_xiangqing" value="详情" style="width:50px"/>
			</td>
			<td class="tdhead">原煤入选率(%)</td>
			<td width="30%">
				<input type="text"  value="{$o._18}" name="meiYmrx[]" style="width:80px">
				<input type="button" class="button_xiangqing1" value="详情" style="width:50px"/>
			</td>
		</tr>
	</table>

	<table align="center" style="display:none;" class="formView" id="ore53xkhs">
		<tr>
			<td class="tdhead">{$basedataArray[0]->basedataJiqizhi-2}年实际值</td><td><input value="{$o._5}" name="meiCqhc3qiansj[]"></td>
			<td class="tdhead">{$basedataArray[0]->basedataJiqizhi-1}年实际值</td><td><input value="{$o._6}" name="meiCqhc2qiansj[]"></td>
		</tr>
		<tr>
			<td class="tdhead">{$basedataArray[0]->basedataJiqizhi}年实际值</td><td><input value="{$o._7}" name="meiCqhc1qiansj[]"></td>
		</tr>
		<tr>
			<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+1}年规划值</td><td><input value="{$o._8}" name="meiCqhc1houjh[]"></td>
			<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+1}年实际值</td><td><input value="{$o._9}" name="meiCqhc1housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+2}年规划值</td><td><input value="{$o._10}" name="meiCqhc2houjh[]"></td>
			<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+2}年实际值</td><td><input value="{$o._11}" name="meiCqhc2housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+3}年规划值</td><td><input value="{$o._12}" name="meiCqhc3houjh[]"></td>
			<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+3}年实际值</td><td><input value="{$o._13}" name="meiCqhc3housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+4}年规划值</td><td><input value="{$o._14}" name="meiCqhc4houjh[]"></td>
			<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+4}年实际值</td><td><input value="{$o._15}" name="meiCqhc4housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+5}年规划值</td><td><input value="{$o._16}" name="meiCqhc5houjh[]"></td>
			<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+5}年实际值</td><td><input value="{$o._17}" name="meiCqhc5housj[]"></td>	  
		</tr>
	</table> <!-- 5-3 -->
	<table align="center" style="display:none;" class="formView" id="ore53xkhs">
		<tr>
			<td class="tdhead">{$basedataArray[0]->basedataJiqizhi-2}年实际值</td><td><input value="{$o._19}" name="meiYmrx3qiansj[]"></td>
			<td class="tdhead">{$basedataArray[0]->basedataJiqizhi-1}年实际值</td><td><input value="{$o._20}" name="meiYmrx2qiansj[]"></td>
		</tr>
		<tr>
			<td class="tdhead">{$basedataArray[0]->basedataJiqizhi}年实际值</td><td><input value="{$o._21}" name="meiYmrx1qiansj[]"></td>
		</tr>
		<tr>
			<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+1}年规划值</td><td><input value="{$o._22}" name="meiYmrx1houjh[]"></td>
			<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+1}年实际值</td><td><input value="{$o._23}" name="meiYmrx1housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+2}年规划值</td><td><input value="{$o._24}" name="meiYmrx2houjh[]"></td>
			<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+2}年实际值</td><td><input value="{$o._25}" name="meiYmrx2housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+3}年规划值</td><td><input value="{$o._26}" name="meiYmrx3houjh[]"></td>
			<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+3}年实际值</td><td><input value="{$o._27}" name="meiYmrx3housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+4}年规划值</td><td><input value="{$o._28}" name="meiYmrx4houjh[]"></td>
			<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+4}年实际值</td><td><input value="{$o._29}" name="meiYmrx4housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+5}年规划值</td><td><input value="{$o._30}" name="meiYmrx5houjh[]"></td>
			<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+5}年实际值</td><td><input value="{$o._31}" name="meiYmrx5housj[]"></td>	  
		</tr>
	</table> <!-- 5-3 -->
	<!-- <div>
		
	</div> -->
	<table class="formView" align="center" width="100%">
		<tr>
			<td class="tdhead" colspan=4>煤矸石与共伴生资源综合利用率(%)
				<input type="text"value="{$o._32}"  name="meiMgsgbs[]"><input type="button" class="button_xiangqing" value="详情"/>
		</tr>
	</table><!-- 煤矸石与共伴生资源综合利用率 -->
	<table align="center" style="display:none;" class="formView" id="ore53xkhs">
		<tr>
			<td class="tdhead">{$basedataArray[0]->basedataJiqizhi-2}年实际值</td><td><input value="{$o._33}" name="meiMgsgbs3qiansj[]"></td>
			<td class="tdhead">{$basedataArray[0]->basedataJiqizhi-1}年实际值</td><td><input value="{$o._34}" name="meiMgsgbs2qiansj[]"></td>
		</tr>
		<tr>
			<td class="tdhead">{$basedataArray[0]->basedataJiqizhi}年实际值</td><td><input value="{$o._35}" name="meiMgsgbs1qiansj[]"></td>
		</tr>
		<tr>
			<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+1}年规划值</td><td><input value="{$o._36}" name="meiMgsgbs1houjh[]"></td>
			<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+1}年实际值</td><td><input value="{$o._37}" name="meiMgsgbs1housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+2}年规划值</td><td><input value="{$o._38}" name="meiMgsgbs2houjh[]"></td>
			<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+2}年实际值</td><td><input value="{$o._39}" name="meiMgsgbs2housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+3}年规划值</td><td><input value="{$o._40}" name="meiMgsgbs3houjh[]"></td>
			<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+3}年实际值</td><td><input value="{$o._41}" name="meiMgsgbs3housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+4}年规划值</td><td><input value="{$o._42}" name="meiMgsgbs4houjh[]"></td>
			<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+4}年实际值</td><td><input value="{$o._43}" name="meiMgsgbs4housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+5}年规划值</td><td><input value="{$o._44}" name="meiMgsgbs5houjh[]"></td>
			<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+5}年实际值</td><td><input value="{$o._45}" name="meiMgsgbs5housj[]"></td>	  
		</tr>
	</table> <!-- 5-3 -->
	<table class="formView" align="center" width="100%">
		<tr>
			<td class="tdhead">矿井水综合利用率(%)</td>
			<td width="30%">
				<input type="text"  value="{$o._46}" name="meiKjs[]" style="width:80px">
				<input type="button" class="button_xiangqing" value="详情" style="width:50px"/>
			</td>
			<td class="tdhead">煤矸石综合利用率(%)</td>
			<td width="30%">
				<input type="text"  value="{$o._60}" name="meiMgszhly[]" style="width:80px">
				<input type="button" class="button_xiangqing1" value="详情" style="width:50px"/>
			</td>
		</tr>
	</table><!-- 矿井水综合利用率 -->
	<table align="center" style="display:none;" class="formView" id="ore53xkhs">
		<tr>
			<td class="tdhead">{$basedataArray[0]->basedataJiqizhi-2}年实际值</td><td><input value="{$o._47}" name="meiKjs3qiansj[]"></td>
			<td class="tdhead">{$basedataArray[0]->basedataJiqizhi-1}年实际值</td><td><input value="{$o._48}" name="meiKjs2qiansj[]"></td>
		</tr>
		<tr>
			<td class="tdhead">{$basedataArray[0]->basedataJiqizhi}年实际值</td><td><input value="{$o._49}" name="meiKjs1qiansj[]"></td>
		</tr>
		<tr>
			<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+1}年规划值</td><td><input value="{$o._50}" name="meiKjs1houjh[]"></td>
			<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+1}年实际值</td><td><input value="{$o._51}" name="meiKjs1housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+2}年规划值</td><td><input value="{$o._52}" name="meiKjs2houjh[]"></td>
			<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+2}年实际值</td><td><input value="{$o._53}" name="meiKjs2housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+3}年规划值</td><td><input value="{$o._54}" name="meiKjs3houjh[]"></td>
			<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+3}年实际值</td><td><input value="{$o._55}" name="meiKjs3housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+4}年规划值</td><td><input value="{$o._56}" name="meiKjs4houjh[]"></td>
			<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+4}年实际值</td><td><input value="{$o._57}" name="meiKjs4housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+5}年规划值</td><td><input value="{$o._58}" name="meiKjs5houjh[]"></td>
			<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+5}年实际值</td><td><input value="{$o._59}" name="meiKjs5housj[]"></td>	  
		</tr>
	</table>  <!-- 5-3 -->
	<table align="center" style="display:none;" class="formView" id="ore53xkhs">
		<tr>
			<td class="tdhead">{$basedataArray[0]->basedataJiqizhi-2}年实际值</td><td><input value="{$o._61}" name="meiMgszhly3qiansj[]"></td>
			<td class="tdhead">{$basedataArray[0]->basedataJiqizhi-1}年实际值</td><td><input value="{$o._62}" name="meiMgszhly2qiansj[]"></td>
		</tr>
		<tr>
			<td class="tdhead">{$basedataArray[0]->basedataJiqizhi}年实际值</td><td><input value="{$o._63}" name="meiMgszhly1qiansj[]"></td>
		</tr>
		<tr>
			<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+1}年规划值</td><td><input value="{$o._64}" name="meiMgszhly1houjh[]"></td>
			<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+1}年实际值</td><td><input value="{$o._65}" name="meiMgszhly1housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+2}年规划值</td><td><input value="{$o._66}" name="meiMgszhly2houjh[]"></td>
			<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+2}年实际值</td><td><input value="{$o._67}" name="meiMgszhly2housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+3}年规划值</td><td><input value="{$o._68}" name="meiMgszhly3houjh[]"></td>
			<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+3}年实际值</td><td><input value="{$o._69}" name="meiMgszhly3housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+4}年规划值</td><td><input value="{$o._70}" name="meiMgszhly4houjh[]"></td>
			<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+4}年实际值</td><td><input value="{$o._71}" name="meiMgszhly4housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+5}年规划值</td><td><input value="{$o._72}" name="meiMgszhly5houjh[]"></td>
			<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+5}年实际值</td><td><input value="{$o._73}" name="meiMgszhly5housj[]"></td>	  
		</tr>
	</table> <!-- 5-3 -->



{elseif $o._2!='煤矿'&& $o._3=='主矿种'}
<table class="formView" align="center" width="100%">
	<tr>
		<td class="tdtitle" colspan=4 style="background:#CCFFFF">主矿种：{$o[0]}</td>
	</tr>
	<tr>
		<td class="tdhead">开采回采率(%)</td>
		<td width="30%">
			<input type="text"  value="{$o._74}" name="kaicaihuicai[]" style="width:80px">
			<input type="button" class="button_xiangqing" value="详情" style="width:50px"/>
		</td>
		<td class="tdhead">选矿回收率(%)</td>
		<td width="30%">
			<input type="text"  value="{$o._88}" name="xkhs[]" style="width:80px">
			<input type="button" class="button_xiangqing1" value="详情" style="width:50px"/>
		</td>
	</tr>
</table><!-- 开采回采率 -->
<table align="center" style="display:none;" class="formView" id="ore53xkhs">
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi-2}年实际值</td><td><input value="{$o._75}" name="kaicaihuicai3qiansj[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi-1}年实际值</td><td><input value="{$o._76}" name="kaicaihuicai2qiansj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi}年实际值</td><td><input value="{$o._77}" name="kaicaihuicai1qiansj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+1}年规划值</td><td><input value="{$o._78}" name="kaicaihuicai1houjh[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+1}年实际值</td><td><input value="{$o._79}" name="kaicaihuicai1housj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+2}年规划值</td><td><input value="{$o._80}" name="kaicaihuicai2houjh[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+2}年实际值</td><td><input value="{$o._81}" name="kaicaihuicai2housj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+3}年规划值</td><td><input value="{$o._82}" name="kaicaihuicai3houjh[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+3}年实际值</td><td><input value="{$o._83}" name="kaicaihuicai3housj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+4}年规划值</td><td><input value="{$o._84}" name="kaicaihuicai4houjh[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+4}年实际值</td><td><input value="{$o._85}" name="kaicaihuicai4housj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+5}年规划值</td><td><input value="{$o._86}" name="kaicaihuicai5houjh[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+5}年实际值</td><td><input value="{$o._87}" name="kaicaihuicai5housj[]"></td>	  
	</tr>
</table><!-- 5-3 -->
<table align="center" style="display:none;" class="formView" id="ore53xkhs">
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi-2}年实际值</td><td><input value="{$o._89}" name="xkhs3qiansj[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi-1}年实际值</td><td><input value="{$o._90}" name="xkhs2qiansj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi}年实际值</td><td><input value="{$o._91}" name="xkhs1qiansj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+1}年规划值</td><td><input value="{$o._92}" name="xkhs1houjh[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+1}年实际值</td><td><input value="{$o._93}" name="xkhs1housj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+2}年规划值</td><td><input value="{$o._94}" name="xkhs2houjh[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+2}年实际值</td><td><input value="{$o._95}" name="xkhs2housj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+3}年规划值</td><td><input value="{$o._96}" name="xkhs3houjh[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+3}年实际值</td><td><input value="{$o._97}" name="xkhs3housj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+4}年规划值</td><td><input value="{$o._98}" name="xkhs4houjh[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+4}年实际值</td><td><input value="{$o._99}" name="xkhs4housj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+5}年规划值</td><td><input value="{$o._100}" name="xkhs5houjh[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+5}年实际值</td><td><input value="{$o._101}" name="xkhs5housj[]"></td>	  
	</tr>
</table><!-- 5-3 -->

<table class="formView" align="center" width="100%">
	<tr>
		<td class="tdhead">采选综合回收率(%)</td>
		<td width="30%">
			<input type="text"  value="{$o._102}" name="caixuanzh[]" style="width:80px">
			<input type="button" class="button_xiangqing" value="详情" style="width:50px"/>
		</td>
		<td class="tdhead">综合利用率(%)</td>
		<td width="30%">
			<input type="text"  value="{$o._116}" name="zhly[]" style="width:80px">
			<input type="button" class="button_xiangqing1" value="详情" style="width:50px"/>
		</td>
	</tr>
</table><!-- 采选综合回收率 -->
<table align="center" style="display:none;" class="formView" id="ore53xkhs">
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi-2}年实际值</td><td><input value="{$o._103}" name="caixuanzh3qiansj[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi-1}年实际值</td><td><input value="{$o._104}" name="caixuanzh2qiansj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi}年实际值</td><td><input value="{$o._105}" name="caixuanzh1qiansj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+1}年规划值</td><td><input value="{$o._106}" name="caixuanzh1houjh[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+1}年实际值</td><td><input value="{$o._107}" name="caixuanzh1housj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+2}年规划值</td><td><input value="{$o._108}" name="caixuanzh2houjh[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+2}年实际值</td><td><input value="{$o._109}" name="caixuanzh2housj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+3}年规划值</td><td><input value="{$o._110}" name="caixuanzh3houjh[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+3}年实际值</td><td><input value="{$o._111}" name="caixuanzh3housj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+4}年规划值</td><td><input value="{$o._112}" name="caixuanzh4houjh[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+4}年实际值</td><td><input value="{$o._113}" name="caixuanzh4housj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+5}年规划值</td><td><input value="{$o._114}" name="caixuanzh5houjh[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+5}年实际值</td><td><input value="{$o._115}" name="caixuanzh5housj[]"></td>	  
	</tr>
</table><!-- 5-3 -->
<table align="center" style="display:none;" class="formView" id="ore53xkhs">
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi-2}年实际值</td><td><input value="{$o._117}" name="zhly3qiansj[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi-1}年实际值</td><td><input value="{$o._118}" name="zhly2qiansj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi}年实际值</td><td><input value="{$o._119}" name="zhly1qiansj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+1}年规划值</td><td><input value="{$o._120}" name="zhly1houjh[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+1}年实际值</td><td><input value="{$o._121}" name="zhly1housj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+2}年规划值</td><td><input value="{$o._122}" name="zhly2houjh[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+2}年实际值</td><td><input value="{$o._123}" name="zhly2housj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+3}年规划值</td><td><input value="{$o._124}" name="zhly3houjh[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+3}年实际值</td><td><input value="{$o._125}" name="zhly3housj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+4}年规划值</td><td><input value="{$o._126}" name="zhly4houjh[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+4}年实际值</td><td><input value="{$o._127}" name="zhly4housj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+5}年规划值</td><td><input value="{$o._128}" name="zhly5houjh[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+5}年实际值</td><td><input value="{$o._129}" name="zhly5housj[]"></td>	  
	</tr>
</table><!-- 5-3 -->

<table class="formView" align="center" width="100%">
	<tr>
		<td class="tdhead">矿产资源综合利用率(%)</td>
		<td width="30%">
			<input type="text"  value="{$o._130}" name="kczyzhly[]" style="width:80px">
			<input type="button" class="button_xiangqing" value="详情" style="width:50px"/>
		</td>
		<td class="tdhead">矿产资源总回收率(%)</td>
		<td width="30%">
			<input type="text"  value="{$o._144}" name="kczyzongzhly[]" style="width:80px">
			<input type="button" class="button_xiangqing1" value="详情" style="width:50px"/>
		</td>
	</tr>
</table><!-- 矿产资源综合利用率 -->
<table align="center" style="display:none;" class="formView" id="ore53xkhs">
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi-2}年实际值</td><td><input value="{$o._131}" name="kczyzhly3qiansj[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi-1}年实际值</td><td><input value="{$o._132}" name="kczyzhly2qiansj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi}年实际值</td><td><input value="{$o._133}" name="kczyzhly1qiansj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+1}年规划值</td><td><input value="{$o._134}" name="kczyzhly1houjh[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+1}年实际值</td><td><input value="{$o._135}" name="kczyzhly1housj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+2}年规划值</td><td><input value="{$o._136}" name="kczyzhly2houjh[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+2}年实际值</td><td><input value="{$o._137}" name="kczyzhly2housj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+3}年规划值</td><td><input value="{$o._138}" name="kczyzhly3houjh[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+3}年实际值</td><td><input value="{$o._139}" name="kczyzhly3housj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+4}年规划值</td><td><input value="{$o._140}" name="kczyzhly4houjh[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+4}年实际值</td><td><input value="{$o._141}" name="kczyzhly4housj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+5}年规划值</td><td><input value="{$o._142}" name="kczyzhly5houjh[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+5}年实际值</td><td><input value="{$o._143}" name="kczyzhly5housj[]"></td>	  
	</tr>
</table><!-- 5-3 -->
<table align="center" style="display:none;" class="formView" id="ore53xkhs">
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi-2}年实际值</td><td><input value="{$o._145}" name="kczyzongzhly3qiansj[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi-1}年实际值</td><td><input value="{$o._146}" name="kczyzongzhly2qiansj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi}年实际值</td><td><input value="{$o._147}" name="kczyzongzhly1qiansj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+1}年规划值</td><td><input value="{$o._148}" name="kczyzongzhly1houjh[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+1}年实际值</td><td><input value="{$o._149}" name="kczyzongzhly1housj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+2}年规划值</td><td><input value="{$o._150}" name="kczyzongzhly2houjh[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+2}年实际值</td><td><input value="{$o._151}" name="kczyzongzhly2housj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+3}年规划值</td><td><input value="{$o._152}" name="kczyzongzhly3houjh[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+3}年实际值</td><td><input value="{$o._153}" name="kczyzongzhly3housj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+4}年规划值</td><td><input value="{$o._154}" name="kczyzongzhly4houjh[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+4}年实际值</td><td><input value="{$o._155}" name="kczyzongzhly4housj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+5}年规划值</td><td><input value="{$o._156}" name="kczyzongzhly5houjh[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+5}年实际值</td><td><input value="{$o._157}" name="kczyzongzhly5housj[]"></td>	  
	</tr>
</table><!-- 5-3 -->

<table class="formView" align="center" width="100%">
	<tr>
		<td class="tdhead">冶炼回收率(%)</td>
		<td width="30%">
			<input type="text"  value="{$o._158}" name="ylhs[]" style="width:80px">
			<input type="button" class="button_xiangqing" value="详情" style="width:50px"/>
		</td>
		<td class="tdhead">共伴生矿资源综合利用率(%)</td>
		<td width="30%">
			<input type="text"  value="{$o._172}" name="gongbansheng[]" style="width:80px">
			<input type="button" class="button_xiangqing1" value="详情" style="width:50px"/>
		</td>
	</tr>
</table><!-- 冶炼回收率 -->
<table align="center" style="display:none;" class="formView" id="ore53xkhs">
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi-2}年实际值</td><td><input value="{$o._159}" name="ylhs3qiansj[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi-1}年实际值</td><td><input value="{$o._160}" name="ylhs2qiansj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi}年实际值</td><td><input value="{$o._161}" name="ylhs1qiansj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+1}年规划值</td><td><input value="{$o._162}" name="ylhs1houjh[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+1}年实际值</td><td><input value="{$o._163}" name="ylhs1housj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+2}年规划值</td><td><input value="{$o._164}" name="ylhs2houjh[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+2}年实际值</td><td><input value="{$o._165}" name="ylhs2housj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+3}年规划值</td><td><input value="{$o._166}" name="ylhs3houjh[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+3}年实际值</td><td><input value="{$o._167}" name="ylhs3housj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+4}年规划值</td><td><input value="{$o._168}" name="ylhs4houjh[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+4}年实际值</td><td><input value="{$o._169}" name="ylhs4housj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+5}年规划值</td><td><input value="{$o._170}" name="ylhs5houjh[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+5}年实际值</td><td><input value="{$o._171}" name="ylhs5housj[]"></td>	  
	</tr>
</table>	<!-- 5-3 -->
<table align="center" style="display:none;" class="formView" id="ore53xkhs">
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi-2}年实际值</td><td><input value="{$o._173}" name="gongbansheng3qiansj[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi-1}年实际值</td><td><input value="{$o._174}" name="gongbansheng2qiansj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi}年实际值</td><td><input value="{$o._175}" name="gongbansheng1qiansj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+1}年规划值</td><td><input value="{$o._176}" name="gongbansheng1houjh[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+1}年实际值</td><td><input value="{$o._177}" name="gongbansheng1housj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+2}年规划值</td><td><input value="{$o._178}" name="gongbansheng2houjh[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+2}年实际值</td><td><input value="{$o._179}" name="gongbansheng2housj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+3}年规划值</td><td><input value="{$o._180}" name="gongbansheng3houjh[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+3}年实际值</td><td><input value="{$o._181}" name="gongbansheng3housj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+4}年规划值</td><td><input value="{$o._182}" name="gongbansheng4houjh[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+4}年实际值</td><td><input value="{$o._183}" name="gongbansheng4housj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+5}年规划值</td><td><input value="{$o._184}" name="gongbansheng5houjh[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+5}年实际值</td><td><input value="{$o._185}" name="gongbansheng5housj[]"></td>	  
	</tr>
</table>	<!-- 5-3 -->

<table class="formView" align="center" width="100%">
	<tr>
		<td class="tdhead">矿井水综合利用率(%)</td>
		<td width="30%">
			<input type="text"  value="{$o._186}" name="jingshui[]" style="width:80px">
			<input type="button" class="button_xiangqing" value="详情" style="width:50px"/>
		</td>
		<td class="tdhead">尾矿综合利用率(%)</td>
		<td width="30%">
			<input type="text"  value="{$o._200}" name="weikuang[]" style="width:80px">
			<input type="button" class="button_xiangqing1" value="详情" style="width:50px"/>
		</td>
	</tr>
</table><!-- 矿井水综合利用率 -->
<table align="center" style="display:none;" class="formView" id="ore53xkhs">
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi-2}年实际值</td><td><input value="{$o._187}" name="jingshui3qiansj[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi-1}年实际值</td><td><input value="{$o._188}" name="jingshui2qiansj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi}年实际值</td><td><input value="{$o._189}" name="jingshui1qiansj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+1}年规划值</td><td><input value="{$o._190}" name="jingshui1houjh[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+1}年实际值</td><td><input value="{$o._191}" name="jingshui1housj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+2}年规划值</td><td><input value="{$o._192}" name="jingshui2houjh[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+2}年实际值</td><td><input value="{$o._193}" name="jingshui2housj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+3}年规划值</td><td><input value="{$o._194}" name="jingshui3houjh[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+3}年实际值</td><td><input value="{$o._195}" name="jingshui3housj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+4}年规划值</td><td><input value="{$o._196}" name="jingshui4houjh[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+4}年实际值</td><td><input value="{$o._197}" name="jingshui4housj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+5}年规划值</td><td><input value="{$o._198}" name="jingshui5houjh[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+5}年实际值</td><td><input value="{$o._199}" name="jingshui5housj[]"></td>	  
	</tr>
</table>	<!-- 5-3 -->
<table align="center" style="display:none;" class="formView" id="ore53xkhs">
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi-2}年实际值</td><td><input value="{$o._201}" name="weikuang3qiansj[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi-1}年实际值</td><td><input value="{$o._202}" name="weikuang2qiansj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi}年实际值</td><td><input value="{$o._203}" name="weikuang1qiansj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+1}年规划值</td><td><input value="{$o._204}" name="weikuang1houjh[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+1}年实际值</td><td><input value="{$o._205}" name="weikuang1housj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+2}年规划值</td><td><input value="{$o._206}" name="weikuang2houjh[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+2}年实际值</td><td><input value="{$o._207}" name="weikuang2housj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+3}年规划值</td><td><input value="{$o._208}" name="weikuang3houjh[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+3}年实际值</td><td><input value="{$o._209}" name="weikuang3housj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+4}年规划值</td><td><input value="{$o._210}" name="weikuang4houjh[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+4}年实际值</td><td><input value="{$o._211}" name="weikuang4housj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+5}年规划值</td><td><input value="{$o._212}" name="weikuang5houjh[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+5}年实际值</td><td><input value="{$o._213}" name="weikuang5housj[]"></td>	  
	</tr>
</table>	<!-- 5-3 -->

<table class="formView" align="center" width="100%">
	<tr>
		<td class="tdhead">废气综合利用率(%)</td>
		<td width="30%">
			<input type="text"  value="{$o._214}" name="feiqi[]" style="width:80px">
			<input type="button" class="button_xiangqing" value="详情" style="width:50px"/>
		</td>
		<td class="tdhead">废渣综合利用率(%)</td>
		<td width="30%">
			<input type="text"  value="{$o._228}" name="feizha[]" style="width:80px">
			<input type="button" class="button_xiangqing1" value="详情" style="width:50px"/>

		</td>
	</tr>
</table>	<!-- 废气综合利用率 -->
<table align="center" style="display:none;" class="formView" id="ore53xkhs">
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi-2}年实际值</td><td><input value="{$o._215}" name="feiqi3qiansj[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi-1}年实际值</td><td><input value="{$o._216}" name="feiqi2qiansj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi}年实际值</td><td><input value="{$o._217}" name="feiqi1qiansj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+1}年规划值</td><td><input value="{$o._218}" name="feiqi1houjh[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+1}年实际值</td><td><input value="{$o._219}" name="feiqi1housj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+2}年规划值</td><td><input value="{$o._220}" name="feiqi2houjh[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+2}年实际值</td><td><input value="{$o._221}" name="feiqi2housj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+3}年规划值</td><td><input value="{$o._222}" name="feiqi3houjh[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+3}年实际值</td><td><input value="{$o._223}" name="feiqi3housj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+4}年规划值</td><td><input value="{$o._224}" name="feiqi4houjh[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+4}年实际值</td><td><input value="{$o._225}" name="feiqi4housj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+5}年规划值</td><td><input value="{$o._226}" name="feiqi5houjh[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+5}年实际值</td><td><input value="{$o._227}" name="feiqi5housj[]"></td>	  
	</tr>
</table>	<!-- 5-3 -->
<table align="center" style="display:none;" class="formView" id="ore53xkhs">
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi-2}年实际值</td><td><input value="{$o._229}" name="feizha3qiansj[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi-1}年实际值</td><td><input value="{$o._230}" name="feizha2qiansj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi}年实际值</td><td><input value="{$o._231}" name="feizha1qiansj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+1}年规划值</td><td><input value="{$o._232}" name="feizha1houjh[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+1}年实际值</td><td><input value="{$o._233}" name="feizha1housj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+2}年规划值</td><td><input value="{$o._234}" name="feizha2houjh[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+2}年实际值</td><td><input value="{$o._235}" name="feizha2housj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+3}年规划值</td><td><input value="{$o._236}" name="feizha3houjh[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+3}年实际值</td><td><input value="{$o._237}" name="feizha3housj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+4}年规划值</td><td><input value="{$o._238}" name="feizha4houjh[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+4}年实际值</td><td><input value="{$o._239}" name="feizha4housj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+5}年规划值</td><td><input value="{$o._240}" name="feizha5houjh[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+5}年实际值</td><td><input value="{$o._241}" name="feizha5housj[]"></td>	  
	</tr>
</table>	<!-- 5-3 -->

<table class="formView" align="center" width="100%">
	<tr>
		<td class="tdhead">贫化率(%)</td>
		<td width="30%">
			<input type="text"  value="{$o._242}" name="pinhua[]" style="width:80px">
			<input type="button" class="button_xiangqing" value="详情" style="width:50px"/>
		</td>
		<td class="tdhead">产率(%)</td>
		<td width="30%">
			<input type="text"  value="{$o._256}" name="chanlv[]" style="width:80px">
			<input type="button" class="button_xiangqing1" value="详情" style="width:50px"/>
		</td>
	</tr>
</table><!-- 贫化率 -->
<table align="center" style="display:none;" class="formView" id="ore53xkhs">
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi-2}年实际值</td><td><input value="{$o._243}" name="pinhua3qiansj[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi-1}年实际值</td><td><input value="{$o._244}" name="pinhua2qiansj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi}年实际值</td><td><input value="{$o._245}" name="pinhua1qiansj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+1}年规划值</td><td><input value="{$o._246}" name="pinhua1houjh[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+1}年实际值</td><td><input value="{$o._247}" name="pinhua1housj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+2}年规划值</td><td><input value="{$o._248}" name="pinhua2houjh[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+2}年实际值</td><td><input value="{$o._249}" name="pinhua2housj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+3}年规划值</td><td><input value="{$o._250}" name="pinhua3houjh[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+3}年实际值</td><td><input value="{$o._251}" name="pinhua3housj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+4}年规划值</td><td><input value="{$o._252}" name="pinhua4houjh[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+4}年实际值</td><td><input value="{$o._253}" name="pinhua4housj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+5}年规划值</td><td><input value="{$o._254}" name="pinhua5houjh[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+5}年实际值</td><td><input value="{$o._255}" name="pinhua5housj[]"></td>	  
	</tr>
</table>	<!-- 5-3 -->
<table align="center" style="display:none;" class="formView" id="ore53xkhs">
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi-2}年实际值</td><td><input value="{$o._257}" name="chanlv3qiansj[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi-1}年实际值</td><td><input value="{$o._258}" name="chanlv2qiansj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi}年实际值</td><td><input value="{$o._259}" name="chanlv1qiansj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+1}年规划值</td><td><input value="{$o._260}" name="chanlv1houjh[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+1}年实际值</td><td><input value="{$o._261}" name="chanlv1housj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+2}年规划值</td><td><input value="{$o._262}" name="chanlv2houjh[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+2}年实际值</td><td><input value="{$o._263}" name="chanlv2housj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+3}年规划值</td><td><input value="{$o._264}" name="chanlv3houjh[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+3}年实际值</td><td><input value="{$o._265}" name="chanlv3housj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+4}年规划值</td><td><input value="{$o._266}" name="chanlv4houjh[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+4}年实际值</td><td><input value="{$o._267}" name="chanlv4housj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+5}年规划值</td><td><input value="{$o._268}" name="chanlv5houjh[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+5}年实际值</td><td><input value="{$o._269}" name="chanlv5housj[]"></td>	  
	</tr>
</table>	<!-- 5-3 -->

{/if}
{/foreach}

{foreach from=$oredataand35Array item=o}

{if $o._3=='伴生矿种'}
<table class="formView" align="center" width="100%">
	<tr>
		<tr>
			<td class="tdtitle" colspan=4 style="background:#CCFFFF">共伴生矿种：{$o._2}</td>
		</tr>
		<td class="tdhead">选矿回收率(%)</td>
		<td width="30%">
			<input type="text"  value="{$o._88}" name="gbsXkhs[]" style="width:80px">
			<input type="button" class="button_xiangqing" value="详情" style="width:50px"/>
		</td>
		<td class="tdhead">冶炼回收率(%)</td>
		<td width="30%">
			<input type="text"  value="{$o._158}" name="gbsYlhs[]" style="width:80px">
			<input type="button" class="button_xiangqing1" value="详情" style="width:50px"/>
		</td>
	</tr>
</table>
<table align="center" style="display:none;" class="formView" id="ore53xkhs">
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi-2}年实际值</td><td><input value="{$o._89}" name="gbsXkhs3qiansj[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi-1}年实际值</td><td><input value="{$o._90}" name="gbsXkhs2qiansj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi}年实际值</td><td><input value="{$o._91}" name="gbsXkhs1qiansj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+1}年规划值</td><td><input value="{$o._92}" name="gbsXkhs1houjh[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+1}年实际值</td><td><input value="{$o._93}" name="gbsXkhs1housj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+2}年规划值</td><td><input value="{$o._94}" name="gbsXkhs2houjh[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+2}年实际值</td><td><input value="{$o._95}" name="gbsXkhs2housj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+3}年规划值</td><td><input value="{$o._96}" name="gbsXkhs3houjh[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+3}年实际值</td><td><input value="{$o._97}" name="gbsXkhs3houjs[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+4}年规划值</td><td><input value="{$o._98}" name="gbsXkhs4houjh[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+4}年实际值</td><td><input value="{$o._99}" name="gbsXkhs4housj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+5}年规划值</td><td><input value="{$o._100}" name="gbsXkhs5houjh[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+5}年实际值</td><td><input value="{$o._101}" name="gbsXkhs5housj[]"></td>	  
	</tr>
</table>
<table align="center" style="display:none;" class="formView" id="ore53xkhs">
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi-2}年实际值</td><td><input value="{$o._159}" name="gbsXkhs3qiansj[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi-1}年实际值</td><td><input value="{$o._160}" name="gbsXkhs2qiansj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi}年实际值</td><td><input value="{$o._161}" name="gbsXkhs1qiansj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+1}年规划值</td><td><input value="{$o._162}" name="gbsXkhs1houjh[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+1}年实际值</td><td><input value="{$o._163}" name="gbsXkhs1housj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+2}年规划值</td><td><input value="{$o._164}" name="gbsXkhs2houjh[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+2}年实际值</td><td><input value="{$o._165}" name="gbsXkhs2housj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+3}年规划值</td><td><input value="{$o._166}" name="gbsXkhs3houjh[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+3}年实际值</td><td><input value="{$o._167}" name="gbsXkhs3housj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+4}年规划值</td><td><input value="{$o._168}" name="gbsXkhs4houjh[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+4}年实际值</td><td><input value="{$o._169}" name="gbsXkhs4housj[]"></td>
	</tr>
	<tr>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+5}年规划值</td><td><input value="{$o._170}" name="gbsXkhs5houjh[]"></td>
		<td class="tdhead">{$basedataArray[0]->basedataJiqizhi+5}年实际值</td><td><input value="{$o._171}" name="gbsXkhs5housj[]"></td>	  
	</tr>
</table>
{/if}
{/foreach}
<table class="formView" align="center" width="100%">
	<tr>
		<td class="tdtitle" style="background:#FFCC99" colspan=4>矿山三率指标条件</td>
	</tr>
	{foreach from=$oredataand35Array item=o}
	<tr>
		<td class='tdtitle' colspan=4> {$o._3}:{$o._2}</td>
	</tr>
	<td colspan=4>
		<table class="formView" align="center" width="90%">
			<tr>
				<td class="tdtitle" style="font:bold 14px" colspan=4>
					{if $o._2=='煤矿'}
						原煤入选率(%){else}选矿回收率(%)
					{/if}
					<input type="button" onclick="addxkhslv(this.id,'{$o._o22}','{$o[107]}','{$o[108]}','{$o[109]}','{$o[110]}','{$o[111]}','{$o[112]}');" id='xkhsbtn{$o._o22}' value="添加"/>
				</td>
			</tr>
		</table>

		<table class="formView" align="center" id="orexkhsbtn{$o._o22}" width="90%">	

			<tr>	
				<td class="tdhead" width="20%">{$o._292}</td>
				<td width="10%">
					<input type="text"  value="{$o._271}" name="orexuankuanghuishou1[{$o._o22}][]" id="orexuankuanghuishou1{$l[30]}" >
				</td>
				<td class="tdhead" width="20%">{$o._293}</td>
				<td width="10%">
					<input type="text"  value="{$o._272}" name="orexuankuanghuishou2[{$o._o22}][]" id="orexuankuanghuishou2{$l[30]}"  >
				</td>
			</tr>
			<tr>
				<td class="tdhead" width="20%">{$o._294}</td>
				<td width="10%">
					<input type="text"  value="{$o._273}" name="orexuankuanghuishou3[{$o._o22}][]" id="orexuankuanghuishou3{$l[30]}">
				</td>
				<td class="tdhead" width="20%">{$o._295}</td>
				<td width="10%">
					<input type="text"  value="{$o._274}" name="orexuankuanghuishou4[{$o._o22}][]" id="orexuankuanghuishou4{$l[30]}">
				</td>
			</tr>
			<tr>	
				<td class="tdhead" width="20%">{$o._296}</td>
				<td width="10%">
					<input type="text"  value="{$o._275}" name="orexuankuanghuishou5[{$o._o22}][]" id="orexuankuanghuishou5{$l[30]}">
				</td>

				<td class="tdhead" width="20%">{$o._297}</td>
				<td width="10%">
					<input type="text"  value="{$o._276}" name="orexuankuanghuishou6[{$o._o22}][]" id="orexuankuanghuishou6{$l[30]}">
				</td>
			</tr>

			<tr>
				<td class="tdhead" colspan=4 width="90%">
					{if $o._2=='煤矿'}原煤入选率(%){else}选矿回收率(%){/if}
					<input type="text" value="{$o._270}" name="orexuankuanghuishouvalue[{$o._o22}][]" id="orexuankuanghuishouvalue{$o[30]}">
				</td>
			</tr>
		</table>
		<!-- 
		<script  type="text/javascript">
		$('#button_orexkhslv{$l[30]}').click(function() {literal} { {/literal}
			$('#ore53xkhs{$l[30]}').toggle();
			{literal} } {/literal});
		</script>
 -->

		<div id="orexkhsdiv{$o._o22}">

		</div>

		<table class="formView" align="center" width="90%">
			<tr>
				<td class="tdtitle" colspan=4 style="font:bold 14px">
					{if $o[0]=='煤矿'}采区回采率(%){else}开采回采率(%){/if}<input type="button" onclick="addkchclv(this.id, {$o._o22},'{$o[101]}','{$o[102]}','{$o[103]}','{$o[104]}','{$o[105]}','{$o[106]}');" id="kchcbtn{$o._o22}" value="添加"/>
				</td>
			</tr>
		</table>
		<table class="formView" align="center" id="orekchcbtn{$o._o22}" width="90%">
			<tr>	
				<td class="tdhead" width="20%">{$o._299}</td>
				<td width="10%">
					<input type="text"  value="{$o._278}" name="orekaicaihuicai1[{$o._o22}][]" id="orekaicaihuicai1{$k[30]}">
				</td>
				<td class="tdhead" width="20%">{$o._300}</td>
				<td width="10%">
					<input type="text"  value="{$o._279}" name="orekaicaihuicai2[{$o._o22}][]" id="orekaicaihuicai2{$k[30]}" >
				</td>
			</tr>
			<tr>	
				<td class="tdhead" width="20%">{$o._301}</td>
				<td width="10%">
					<input type="text"  value="{$o._280}" name="orekaicaihuicai3[{$o._o22}][]" id="orekaicaihuicai3{$k[30]}">
				</td>
				<td class="tdhead" width="20%">{$o._302}</td>
				<td width="10%">
					<input type="text"  value="{$o._281}" name="orekaicaihuicai4[{$o._o22}][]" id="orekaicaihuicai4{$k[30]}">
				</td>
			</tr>
			<tr>	
				<td class="tdhead" width="20%">{$o._303}</td>
				<td width="10%">
					<input type="text"  value="{$o._282}" name="orekaicaihuicai5[{$o._o22}][]" id="orekaicaihuicai5{$k[30]}">
				</td>

				<td class="tdhead" width="20%">{$o._304}</td>
				<td width="10%">
					<input type="text"  value="{$o._283}" name="orekaicaihuicai6[{$o._o22}][]" id="orekaicaihuicai6{$k[30]}">
				</td>
			</tr>
			<tr>
				<td class="tdhead" colspan=4 width="90%" >
					{if $o._2=='煤矿'}采区回采率(%){else}开采回采率(%){/if}
					<input type="text" value="{$o._277}" name="orekaicaihuicaivalue[{$o._o22}][]" id="orekaicaihuicaivalue{$o[30]}">
				</td>
			</tr>
		</table>
		<div id="orekchcdiv{$o._o22}">

		</div>

		<table class="formView" align="center" width="90%">
			<tr><td colspan=4 class="tdtitle" style="font:bold 14px">综合利用率(%)<input type="button" onclick="addzhlylv(this.id, {$o._o22},'{$o[113]}','{$o[114]}','{$o[115]}','{$o[116]}','{$o[117]}','{$o[118]}');" id="zhlybtn{$o._o22}" value="添加"/></td></tr>						
		</table>
		<table class="formView" align="center" id="orezhlybtn{$o._o22}" width="90%">

			<tr>	
				<td class="tdhead" width="20%">{$o._306}</td>
				<td width="10%">
					<input type="text"  value="{$o._285}" name="orezhly1[{$o._o22}][]" id="orekaicaihuicai1{$y[30]}">
				</td>
				<td class="tdhead" width="20%">{$o._307}</td>
				<td width="10%">
					<input type="text"  value="{$o._286}" name="orezhly2[{$o._o22}][]" id="orekaicaihuicai2{$y[30]}" >
				</td>
			</tr>
			<tr>	
				<td class="tdhead" width="20%">{$o._308}</td>
				<td width="10%">
					<input type="text"  value="{$o._287}" name="orezhly3[{$o._o22}][]" id="orekaicaihuicai3{$y[30]}">
				</td>
				<td class="tdhead" width="20%">{$o._309}</td>
				<td width="10%">
					<input type="text"  value="{$o._288}" name="orezhly4[{$o._o22}][]" id="orekaicaihuicai4{$y[30]}">
				</td>
			</tr>
			<tr>	
				<td class="tdhead" width="20%">{$o._310}</td>
				<td width="10%">
					<input type="text"  value="{$o._289}" name="orezhly5[{$o._o22}][]" id="orekaicaihuicai5{$y[30]}">
				</td>

				<td class="tdhead" width="20%">{$o._311}</td>
				<td width="10%">
					<input type="text"  value="{$o._290}" name="orezhly6[{$o._o22}][]" id="orekaicaihuicai6{$y[30]}">
				</td>
			</tr>
			<tr>
				<td class="tdhead" colspan=4 width="20%">综合利用率 
					<input type="text"  value="{$o._284}" name="complexUserate[{$o._o22}][]"  >
				</td>
			</tr>
		</table>
		<div id="orezhlydiv{$o._o22}">

		</div>
	</td>
</tr>
</tr>
{foreachelse}
<tr>
	<td align="center">无矿种信息，请转到基本信息栏添加矿种
	</td>
</tr>
{/foreach}	
</table>
</table>

</div>

	<div id="tabs-5"><!--科技创新-->
	<table class="formView" align="center" id="science" width="100%">
		<tr>
			<td class = 'tdtitle' colspan=4>科技创新投入占矿山企业总产值比重(%)<input   value="{$invested_proportion[1]}" name="scienceRate"><input type="button" id="button_scienceRate" value="详情"/></td>
		</tr>
	</table>
	<table align="center" style="display:none;" class="formView" id="bef3_pre5_scienceRate">
		<tr>
			<td class="tdhead">{$declaredata[3]-2}年实际值</td><td><input value="{$invested_proportion_35[1]}" name="scienceRate_bef3"></td>
			<td class="tdhead">{$declaredata[3]-1}年实际值</td><td><input value="{$invested_proportion_35[2]}" name="scienceRate_bef2"></td>
		</tr>
		<tr>
			<td class="tdhead">{$declaredata[3]}年实际值</td><td><input value="{$invested_proportion_35[3]}" name="scienceRate_bef1"></td>
		</tr>
		<tr>
			<td class="tdhead">{$declaredata[3]+1}年规划值</td><td><input value="{$invested_proportion_35[4]}" name="scienceRate_pre1"></td>
			<td class="tdhead">{$declaredata[3]+1}年实际值</td><td><input value="{$invested_proportion_35[5]}" name="scienceRate_pre1real"></td>
		</tr>
		<tr>
			<td class="tdhead">{$declaredata[3]+2}年规划值</td><td><input value="{$invested_proportion_35[6]}" name="scienceRate_pre2"></td>
			<td class="tdhead">{$declaredata[3]+2}年实际值</td><td><input value="{$invested_proportion_35[7]}" name="scienceRate_pre2real"></td>
		</tr>
		<tr>
			<td class="tdhead">{$declaredata[3]+3}年规划值</td><td><input value="{$invested_proportion_35[8]}" name="scienceRate_pre3"></td>
			<td class="tdhead">{$declaredata[3]+3}年实际值</td><td><input value="{$invested_proportion_35[9]}" name="scienceRate_pre3real"></td>
		</tr>
		<tr>
			<td class="tdhead">{$declaredata[3]+4}年规划值</td><td><input value="{$invested_proportion_35[10]}" name="scienceRate_pre4"></td>
			<td class="tdhead">{$declaredata[3]+4}年实际值</td><td><input value="{$invested_proportion_35[11]}" name="scienceRate_pre4real"></td>
		</tr>
		<tr>
			<td class="tdhead">{$declaredata[3]+5}年规划值</td><td><input value="{$invested_proportion_35[12]}" name="scienceRate_pre5"></td>
			<td class="tdhead">{$declaredata[3]+5}年实际值</td><td><input value="{$invested_proportion_35[13]}" name="scienceRate_pre5real"></td>	  
		</tr>
	</table>
	<table class="formView" align="center" width='100%'>
		<tr>
			<td class = 'tdhead'>科技投入资金(万元)</td><td><input   value="{$invested_proportion[2]}" name="scienceRateScimoney"></td>	
			<td class = 'tdhead'>总投资(万元)</td><td><input   value="{$invested_proportion[3]}" name="scienceRateAllmoney"></td>	
		</tr>
		<!-- <tr>
			<td class = 'tdhead'>比重是否小于1%</td><td><input   value="{$invested_proportion[4]}" name="scienceRateIsone"></td>
		</tr> -->
		<tr>
			<td class = 'tdtitle' colspan=4>专利技术</td>
		</tr>
		<tr>
			<td class = 'tdhead'>发明专利数量</td><td><input   value="{$patent[1]}" name="sciencePatentCreat"></td>	
			<td class = 'tdhead'>实用新型专利数量</td><td><input   value="{$patent[2]}" name="sciencePatentNewuse"></td>
		</tr>
		<tr>
			<td class = 'tdtitle' colspan=4>技术人员比重</td>
		</tr>
		<tr>
			<td class = 'tdhead'>初级职称人员及比重(%)</td><td><input   value="{$technical_staff[1]}" name="scienceManrateLow"></td>	
			<td class = 'tdhead'>中级职称人员及比重(%)</td><td><input   value="{$technical_staff[2]}" name="scienceManrateMid"></td>
		</tr>
		<tr>
			<td class = 'tdhead'>高级职称人员及比重(%)</td><td><input   value="{$technical_staff[3]}" name="scienceManrateHigh"></td>
			<!-- <td class = 'tdhead'>总职工人数</td><td><input   value="{$technical_staff[4]}" name="scienceManrateAll"></td> -->
		</tr>
	</table>
	</div>	 

	<div id="tabs-6"><!--节能减排-->
	<table class="formView" align="center" id="save_energy" width="100%">
		<tr>
			<td class = 'tdtitle' colspan=4>单位工业总产值电耗(千瓦时/（万元*年）)<input   value="{$power_consumption[1]}" name="energyElect"><input type="button" id="button_energyElect" value="详情"/></td>
		</tr>
	</table>
	<table align="center" style="display:none;" class="formView" id="bef3_pre5_energyElect">
		<tr>
			<td class="tdhead">{$declaredata[3]-2}年实际值</td><td><input value="{$power_consumption_35[1]}" name="energyElect_bef3"></td>
			<td class="tdhead">{$declaredata[3]-1}年实际值</td><td><input value="{$power_consumption_35[2]}" name="energyElect_bef2"></td>
		</tr>
		<tr>
			<td class="tdhead">{$declaredata[3]}年实际值</td><td><input value="{$power_consumption_35[3]}" name="energyElect_bef1"></td>
		</tr>
		<tr>
			<td class="tdhead">{$declaredata[3]+1}年规划值</td><td><input value="{$power_consumption_35[4]}" name="energyElect_pre1"></td>
			<td class="tdhead">{$declaredata[3]+1}年实际值</td><td><input value="{$power_consumption_35[5]}" name="energyElect_pre1real"></td>
		</tr>
		<tr>
			<td class="tdhead">{$declaredata[3]+2}年规划值</td><td><input value="{$power_consumption_35[6]}" name="energyElect_pre2"></td>
			<td class="tdhead">{$declaredata[3]+2}年实际值</td><td><input value="{$power_consumption_35[7]}" name="energyElect_pre2real"></td>
		</tr>
		<tr>
			<td class="tdhead">{$declaredata[3]+3}年规划值</td><td><input value="{$power_consumption_35[8]}" name="energyElect_pre3"></td>
			<td class="tdhead">{$declaredata[3]+3}年实际值</td><td><input value="{$power_consumption_35[9]}" name="energyElect_pre3real"></td>
		</tr>
		<tr>
			<td class="tdhead">{$declaredata[3]+4}年规划值</td><td><input value="{$power_consumption_35[10]}" name="energyElect_pre4"></td>
			<td class="tdhead">{$declaredata[3]+4}年实际值</td><td><input value="{$power_consumption_35[11]}" name="energyElect_pre4real"></td>
		</tr>
		<tr>
			<td class="tdhead">{$declaredata[3]+5}年规划值</td><td><input value="{$power_consumption_35[12]}" name="energyElect_pre5"></td>
			<td class="tdhead">{$declaredata[3]+5}年实际值</td><td><input value="{$power_consumption_35[13]}" name="energyElect_pre5real"></td>	  
		</tr>
	</table>
	<table class="formView" align="center" width='100%'>
		<tr>
			<td class = 'tdhead'>年工业用电总量(千瓦时)</td><td><input   value="{$power_consumption[2]}" name="energyElectUse"></td>
			<td class = 'tdhead'>年工业总产值(万元)</td><td><input   value="{$power_consumption[3]}" name="energyElectProduct"></td>
		</tr>
		<tr>
			<td class = 'tdtitle' colspan=4>单位工业总产值水耗(立方米/万元)<input   value="{$water_consumption[1]}" name="energyWater"><input type="button" id="button_energyWater" value="详情"/></td>
		</tr>
	</table>
	<table align="center" style="display:none;" class="formView" id="bef3_pre5_energyWater">
		<tr>
			<td class="tdhead">{$declaredata[3]-2}年实际值</td><td><input value="{$water_consumption_35[1]}" name="energyWater_bef3"></td>
			<td class="tdhead">{$declaredata[3]-1}年实际值</td><td><input value="{$water_consumption_35[2]}" name="energyWater_bef2"></td>
		</tr>
		<tr>
			<td class="tdhead">{$declaredata[3]}年实际值</td><td><input value="{$water_consumption_35[3]}" name="energyWater_bef1"></td>
		</tr>
		<tr>
			<td class="tdhead">{$declaredata[3]+1}年规划值</td><td><input value="{$water_consumption_35[4]}" name="energyWater_pre1"></td>
			<td class="tdhead">{$declaredata[3]+1}年实际值</td><td><input value="{$water_consumption_35[5]}" name="energyWater_pre1real"></td>
		</tr>
		<tr>
			<td class="tdhead">{$declaredata[3]+2}年规划值</td><td><input value="{$water_consumption_35[6]}" name="energyWater_pre2"></td>
			<td class="tdhead">{$declaredata[3]+2}年实际值</td><td><input value="{$water_consumption_35[7]}" name="energyWater_pre2real"></td>
		</tr>
		<tr>
			<td class="tdhead">{$declaredata[3]+3}年规划值</td><td><input value="{$water_consumption_35[8]}" name="energyWater_pre3"></td>
			<td class="tdhead">{$declaredata[3]+3}年实际值</td><td><input value="{$water_consumption_35[9]}" name="energyWater_pre3real"></td>
		</tr>
		<tr>
			<td class="tdhead">{$declaredata[3]+4}年规划值</td><td><input value="{$water_consumption_35[10]}" name="energyWater_pre4"></td>
			<td class="tdhead">{$declaredata[3]+4}年实际值</td><td><input value="{$water_consumption_35[11]}" name="energyWater_pre4real"></td>
		</tr>
		<tr>
			<td class="tdhead">{$declaredata[3]+5}年规划值</td><td><input value="{$water_consumption_35[12]}" name="energyWater_pre5"></td>
			<td class="tdhead">{$declaredata[3]+5}年实际值</td><td><input value="{$water_consumption_35[13]}" name="energyWater_pre5real"></td>	  
		</tr>
	</table>
	<table class="formView" align="center" width='100%'>
		<tr>
			<td class = 'tdhead'>年工业取水总量(立方米)</td><td><input   value="{$water_consumption[2]}" name="energyWaterUse"></td>
			<td class = 'tdhead'>年工业总产值(万元)</td><td><input   value="{$water_consumption[3]}" name="energyWaterProduct"></td>
		</tr>
		<tr>
			<td class = 'tdtitle' colspan=4>单位万元工业总产值能耗(吨/万元)<input   value="{$energy_consumption[1]}" name="energyEnergy"><input type="button" id="button_energyEnergy" value="详情"/></td>
		</tr>
	</table>
	<table align="center" style="display:none;" class="formView" id="bef3_pre5_energyEnergy">
		<tr>
			<td class="tdhead">{$declaredata[3]-2}年实际值</td><td><input value="{$energy_consumption_35[1]}" name="energyEnergy_bef3"></td>
			<td class="tdhead">{$declaredata[3]-1}年实际值</td><td><input value="{$energy_consumption_35[2]}" name="energyEnergy_bef2"></td>
		</tr>
		<tr>
			<td class="tdhead">{$declaredata[3]}年实际值</td><td><input value="{$energy_consumption_35[3]}" name="energyEnergy_bef1"></td>
		</tr>
		<tr>
			<td class="tdhead">{$declaredata[3]+1}年规划值</td><td><input value="{$energy_consumption_35[4]}" name="energyEnergy_pre1"></td>
			<td class="tdhead">{$declaredata[3]+1}年实际值</td><td><input value="{$energy_consumption_35[5]}" name="energyEnergy_pre1real"></td>
		</tr>
		<tr>
			<td class="tdhead">{$declaredata[3]+2}年规划值</td><td><input value="{$energy_consumption_35[6]}" name="energyEnergy_pre2"></td>
			<td class="tdhead">{$declaredata[3]+2}年实际值</td><td><input value="{$energy_consumption_35[7]}" name="energyEnergy_pre2real"></td>
		</tr>
		<tr>
			<td class="tdhead">{$declaredata[3]+3}年规划值</td><td><input value="{$energy_consumption_35[8]}" name="energyEnergy_pre3"></td>
			<td class="tdhead">{$declaredata[3]+3}年实际值</td><td><input value="{$energy_consumption_35[9]}" name="energyEnergy_pre3real"></td>
		</tr>
		<tr>
			<td class="tdhead">{$declaredata[3]+4}年规划值</td><td><input value="{$energy_consumption_35[10]}" name="energyEnergy_pre4"></td>
			<td class="tdhead">{$declaredata[3]+4}年实际值</td><td><input value="{$energy_consumption_35[11]}" name="energyEnergy_pre4real"></td>
		</tr>
		<tr>
			<td class="tdhead">{$declaredata[3]+5}年规划值</td><td><input value="{$energy_consumption_35[12]}" name="energyEnergy_pre5"></td>
			<td class="tdhead">{$declaredata[3]+5}年实际值</td><td><input value="{$energy_consumption_35[13]}" name="energyEnergy_pre5real"></td>	  
		</tr>
	</table>
	<table class="formView" align="center" width='100%'>
		<tr>
			<td class = 'tdhead'>年工业能源消费量(吨)</td><td><input   value="{$energy_consumption[2]}" name="energyEnergyUse"></td>
			<td class = 'tdhead'>年工业总产值(万元)</td><td><input   value="{$energy_consumption[3]}" name="energyEnergyProduct"></td>
		</tr>
		<tr>
			<td class = 'tdtitle' colspan=4>矿山选矿废水重复利用率(%)<input   value="{$wastewater_use[1]}" name="energyWaste"><input type="button" id="button_energyWaste" value="详情"/></td>
		</tr>
	</table>
	<table align="center" style="display:none;" class="formView" id="bef3_pre5_energyWaste">
		<tr>
			<td class="tdhead">{$declaredata[3]-2}年实际值</td><td><input value="{$wastewater_use_35[1]}" name="energyWaste_bef3"></td>
			<td class="tdhead">{$declaredata[3]-1}年实际值</td><td><input value="{$wastewater_use_35[2]}" name="energyWaste_bef2"></td>
		</tr>
		<tr>
			<td class="tdhead">{$declaredata[3]}年实际值</td><td><input value="{$wastewater_use_35[3]}" name="energyWaste_bef1"></td>
		</tr>
		<tr>
			<td class="tdhead">{$declaredata[3]+1}年规划值</td><td><input value="{$wastewater_use_35[4]}" name="energyWaste_pre1"></td>
			<td class="tdhead">{$declaredata[3]+1}年实际值</td><td><input value="{$wastewater_use_35[5]}" name="energyWaste_pre1real"></td>
		</tr>
		<tr>
			<td class="tdhead">{$declaredata[3]+2}年规划值</td><td><input value="{$wastewater_use_35[6]}" name="energyWaste_pre2"></td>
			<td class="tdhead">{$declaredata[3]+2}年实际值</td><td><input value="{$wastewater_use_35[7]}" name="energyWaste_pre2real"></td>
		</tr>
		<tr>
			<td class="tdhead">{$declaredata[3]+3}年规划值</td><td><input value="{$wastewater_use_35[8]}" name="energyWaste_pre3"></td>
			<td class="tdhead">{$declaredata[3]+3}年实际值</td><td><input value="{$wastewater_use_35[9]}" name="energyWaste_pre3real"></td>
		</tr>
		<tr>
			<td class="tdhead">{$declaredata[3]+4}年规划值</td><td><input value="{$wastewater_use_35[10]}" name="energyWaste_pre4"></td>
			<td class="tdhead">{$declaredata[3]+4}年实际值</td><td><input value="{$wastewater_use_35[11]}" name="energyWaste_pre4real"></td>
		</tr>
		<tr>
			<td class="tdhead">{$declaredata[3]+5}年规划值</td><td><input value="{$wastewater_use_35[12]}" name="energyWaste_pre5"></td>
			<td class="tdhead">{$declaredata[3]+5}年实际值</td><td><input value="{$wastewater_use_35[13]}" name="energyWaste_pre5real"></td>	  
		</tr>
	</table>
	<table class="formView" align="center" width='100%'>
		<tr>
			<td class = 'tdhead'>重复利用废水量(立方米)</td><td><input   value="{$wastewater_use[2]}" name="energyWasteUse"></td>
			<td class = 'tdhead'>生产中取用的新水量(立方米)</td><td><input   value="{$wastewater_use[3]}" name="energyWasteNew"></td>
		</tr>
		<tr>
			<td class = 'tdtitle' colspan=4>矿山固体废弃物综合利用率(%)<input   value="{$waste_utilization[1]}" name="energyRubbish"><input type="button" id="button_energyRubbish" value="详情"/></td>
		</tr>
	</table>
	<table align="center" style="display:none;" class="formView" id="bef3_pre5_energyRubbish">
		<tr>
			<td class="tdhead">{$declaredata[3]-2}年实际值</td><td><input value="{$waste_utilization_35[1]}" name="energyRubbish_bef3"></td>
			<td class="tdhead">{$declaredata[3]-1}年实际值</td><td><input value="{$waste_utilization_35[2]}" name="energyRubbish_bef2"></td>
		</tr>
		<tr>
			<td class="tdhead">{$declaredata[3]}年实际值</td><td><input value="{$waste_utilization_35[3]}" name="energyRubbish_bef1"></td>
		</tr>
		<tr>
			<td class="tdhead">{$declaredata[3]+1}年规划值</td><td><input value="{$waste_utilization_35[4]}" name="energyRubbish_pre1"></td>
			<td class="tdhead">{$declaredata[3]+1}年实际值</td><td><input value="{$waste_utilization_35[5]}" name="energyRubbish_pre1real"></td>
		</tr>
		<tr>
			<td class="tdhead">{$declaredata[3]+2}年规划值</td><td><input value="{$waste_utilization_35[6]}" name="energyRubbish_pre2"></td>
			<td class="tdhead">{$declaredata[3]+2}年实际值</td><td><input value="{$waste_utilization_35[7]}" name="energyRubbish_pre2real"></td>
		</tr>
		<tr>
			<td class="tdhead">{$declaredata[3]+3}年规划值</td><td><input value="{$waste_utilization_35[8]}" name="energyRubbish_pre3"></td>
			<td class="tdhead">{$declaredata[3]+3}年实际值</td><td><input value="{$waste_utilization_35[9]}" name="energyRubbish_pre3real"></td>
		</tr>
		<tr>
			<td class="tdhead">{$declaredata[3]+4}年规划值</td><td><input value="{$waste_utilization_35[10]}" name="energyRubbish_pre4"></td>
			<td class="tdhead">{$declaredata[3]+4}年实际值</td><td><input value="{$waste_utilization_35[11]}" name="energyRubbish_pre4real"></td>
		</tr>
		<tr>
			<td class="tdhead">{$declaredata[3]+5}年规划值</td><td><input value="{$waste_utilization_35[12]}" name="energyRubbish_pre5"></td>
			<td class="tdhead">{$declaredata[3]+5}年实际值</td><td><input value="{$waste_utilization_35[13]}" name="energyRubbish_pre5real"></td>	  
		</tr>
	</table>
	<table class="formView" align="center" width='100%'>
		<tr>
			<td class = 'tdhead'>当年综合利用固体废弃物总量(吨)</td><td><input   value="{$waste_utilization[2]}" name="energyRubbishUse"></td>
			<td class = 'tdhead'>当年固体废弃物产生量(吨)</td><td><input   value="{$waste_utilization[3]}" name="energyRubbishProduct"></td>
		</tr>
		<tr>
			<td class = 'tdhead'>往年贮存量总和(吨)</td><td ><input   value="{$waste_utilization[4]}" name="energyRubbishAll"></td>
		</tr>
		<tr>
			<td class = 'tdtitle' colspan=4>单位工业总产值SO2排放量(10^4 吨/万元)<input   value="{$sulfur_emissions[1]}" name="energySo2"><input type="button" id="button_energySo2" value="详情"/></td>
		</tr>
	</table>
	<table align="center" style="display:none;" class="formView" id="bef3_pre5_energySo2">
		<tr>
			<td class="tdhead">{$declaredata[3]-2}年实际值</td><td><input value="{$sulfur_emissions_35[1]}" name="energySo2_bef3"></td>
			<td class="tdhead">{$declaredata[3]-1}年实际值</td><td><input value="{$sulfur_emissions_35[2]}" name="energySo2_bef2"></td>
		</tr>
		<tr>
			<td class="tdhead">{$declaredata[3]}年实际值</td><td><input value="{$sulfur_emissions_35[3]}" name="energySo2_bef1"></td>
		</tr>
		<tr>
			<td class="tdhead">{$declaredata[3]+1}年规划值</td><td><input value="{$sulfur_emissions_35[4]}" name="energySo2_pre1"></td>
			<td class="tdhead">{$declaredata[3]+1}年实际值</td><td><input value="{$sulfur_emissions_35[5]}" name="energySo2_pre1real"></td>
		</tr>
		<tr>
			<td class="tdhead">{$declaredata[3]+2}年规划值</td><td><input value="{$sulfur_emissions_35[6]}" name="energySo2_pre2"></td>
			<td class="tdhead">{$declaredata[3]+2}年实际值</td><td><input value="{$sulfur_emissions_35[7]}" name="energySo2_pre2real"></td>
		</tr>
		<tr>
			<td class="tdhead">{$declaredata[3]+3}年规划值</td><td><input value="{$sulfur_emissions_35[8]}" name="energySo2_pre3"></td>
			<td class="tdhead">{$declaredata[3]+3}年实际值</td><td><input value="{$sulfur_emissions_35[9]}" name="energySo2_pre3real"></td>
		</tr>
		<tr>
			<td class="tdhead">{$declaredata[3]+4}年规划值</td><td><input value="{$sulfur_emissions_35[10]}" name="energySo2_pre4"></td>
			<td class="tdhead">{$declaredata[3]+4}年实际值</td><td><input value="{$sulfur_emissions_35[11]}" name="energySo2_pre4real"></td>
		</tr>
		<tr>
			<td class="tdhead">{$declaredata[3]+5}年规划值</td><td><input value="{$sulfur_emissions_35[12]}" name="energySo2_pre5"></td>
			<td class="tdhead">{$declaredata[3]+5}年实际值</td><td><input value="{$sulfur_emissions_35[13]}" name="energySo2_pre5real"></td>	  
		</tr>
	</table>
	<table class="formView" align="center" width='100%'>
		<tr>
			<td class = 'tdhead'>年度矿区工业SO2排放量(10^4 吨)</td><td><input   value="{$sulfur_emissions[2]}" name="energySo2Product"></td>
			<td class = 'tdhead'>年度矿区工业总产值指标(万元)</td><td ><input   value="{$sulfur_emissions[3]}" name="energySo2Target"></td>
		</tr>
	</table>
	</div>
	<div id="tabs-7"><!--环境保护-->
	<table class="formView" align="center" id="envi_protect" width="100%">	
		<tr>
			<td class="tdtitle" colspan=4>绿化覆盖率(%)<input   value="{$coverage[1]}" name="environmentRate"><input type="button" id="button_environmentRate" value="详情"/></td>
		</tr>
	</table>
	<table align="center" style="display:none;" class="formView" id="bef3_pre5_environmentRate">
		<tr>
			<td class="tdhead">{$declaredata[3]-2}年实际值</td><td><input value="{$coverage_35[1]}" name="environmentRate_bef3"></td>
			<td class="tdhead">{$declaredata[3]-1}年实际值</td><td><input value="{$coverage_35[2]}" name="environmentRate_bef2"></td>
		</tr>
		<tr>
			<td class="tdhead">{$declaredata[3]}年实际值</td><td><input value="{$coverage_35[3]}" name="environmentRate_bef1"></td>
		</tr>
		<tr>
			<td class="tdhead">{$declaredata[3]+1}年规划值</td><td><input value="{$coverage_35[4]}" name="environmentRate_pre1"></td>
			<td class="tdhead">{$declaredata[3]+1}年实际值</td><td><input value="{$coverage_35[5]}" name="environmentRate_pre1real"></td>
		</tr>
		<tr>
			<td class="tdhead">{$declaredata[3]+2}年规划值</td><td><input value="{$coverage_35[6]}" name="environmentRate_pre2"></td>
			<td class="tdhead">{$declaredata[3]+2}年实际值</td><td><input value="{$coverage_35[7]}" name="environmentRate_pre2real"></td>
		</tr>
		<tr>
			<td class="tdhead">{$declaredata[3]+3}年规划值</td><td><input value="{$coverage_35[8]}" name="environmentRate_pre3"></td>
			<td class="tdhead">{$declaredata[3]+3}年实际值</td><td><input value="{$coverage_35[9]}" name="environmentRate_pre3real"></td>
		</tr>
		<tr>
			<td class="tdhead">{$declaredata[3]+4}年规划值</td><td><input value="{$coverage_35[10]}" name="environmentRate_pre4"></td>
			<td class="tdhead">{$declaredata[3]+4}年实际值</td><td><input value="{$coverage_35[11]}" name="environmentRate_pre4real"></td>
		</tr>
		<tr>
			<td class="tdhead">{$declaredata[3]+5}年规划值</td><td><input value="{$coverage_35[12]}" name="environmentRate_pre5"></td>
			<td class="tdhead">{$declaredata[3]+5}年实际值</td><td><input value="{$coverage_35[13]}" name="environmentRate_pre5real"></td>	  
		</tr>
	</table>
	<table class="formView" align="center" width='100%'>
		<tr>
			<td class="tdhead">矿区内全部绿化种植垂直投影面积(平方千米)</td><td><input   value="{$coverage[2]}" name="environmentRateGreen"></td>
			<td class="tdhead">矿区面积(平方千米)</td><td><input   value="{$coverage[3]}" name="environmentRateArea"></td>
		</tr>
		<tr>
			<td class="tdtitle" colspan=4>其他指标</td>
		</tr>
		<tr>
			<td class="tdhead">是否执行环境保护"三同时"制度</td>
			{if $standards[1] == '是'}
				<td width="15%">		
					<input type="radio" name="environmentIsThree"  value="1" checked>是
					<input type="radio" name="environmentIsThree"  value="0" >否
				</td>
			{else}
				<td width="15%">		
					<input type="radio" name="environmentIsThree"  value="1" >是
					<input type="radio" name="environmentIsThree"  value="0" checked>否
				</td>
			{/if}
			<td class = 'tdhead'>矿区大气环境质量是否达到"环境空气质量标准"二级以上</td>
			{if $standards[2] == '是'}
				<td width="15%">		
					<input type="radio" name="environmentIsAir"  value="1" checked>是
					<input type="radio" name="environmentIsAir"  value="0" >否
				</td>
			{else}
				<td width="15%">		
					<input type="radio" name="environmentIsAir"  value="1" >是
					<input type="radio" name="environmentIsAir"  value="0" checked>否
				</td>
			{/if}
		</tr>
                <tr>
			<td class = 'tdhead'>是否达到《地表水环境质量标准》</td>
			{if $standards[3] == '是'}
				<td width="15%">		
					<input type="radio" name="environmentIsWater"  value="1" checked>是
					<input type="radio" name="environmentIsWater"  value="0" >否
				</td>
			{else}
				<td width="15%">		
					<input type="radio" name="environmentIsWater"  value="1" >是
					<input type="radio" name="environmentIsWater"  value="0" checked>否
				</td>
			{/if}
			<td class = 'tdhead'>是否达到《工业企业厂界噪声标准》</td>
			{if $standards[4]== '是'}
				<td width="15%">		
					<input type="radio" name="environmentIsSound"  value="1" checked>是
					<input type="radio" name="environmentIsSound"  value="0" >否
				</td>
			{else}
				<td width="15%">		
					<input type="radio" name="environmentIsSound"  value="1" >是
					<input type="radio" name="environmentIsSound"  value="0" checked>否
				</td>
			{/if}
		</tr>
		<tr>
			<td class="tdhead">三年内有无发生重大地质灾害</td>
			<td colspan=3>
				<textarea cols="60" rows="3" name="environmentIsDisaster">{$standards[5]}</textarea>
			</td>
		</tr>
	</table>
	</div>
	<div id="tabs-8"><!--土地复垦-->
	<table class="formView" align="center" id="land_recovery" width='100%'>
		<tr>
			<td class="tdtitle" colspan=4>土地复垦率(%)<input   value="{$reclamation_rate[1]}" name="reclamationRate"><input type="button" id="button_reclamationRate" value="详情"/></td>
		</tr>
	</table>
	<table align="center" style="display:none;" class="formView" id="bef3_pre5_reclamationRate">
		<tr>
			<td class="tdhead">{$declaredata[3]-2}年实际值</td><td><input value="{$reclamation_rate_35[1]}" name="reclamationRate_bef3"></td>
			<td class="tdhead">{$declaredata[3]-1}年实际值</td><td><input value="{$reclamation_rate_35[2]}" name="reclamationRate_bef2"></td>
		</tr>
		<tr>
			<td class="tdhead">{$declaredata[3]}年实际值</td><td><input value="{$reclamation_rate_35[3]}" name="reclamationRate_bef1"></td>
		</tr>
		<tr>
			<td class="tdhead">{$declaredata[3]+1}年规划值</td><td><input value="{$reclamation_rate_35[4]}" name="reclamationRate_pre1"></td>
			<td class="tdhead">{$declaredata[3]+1}年实际值</td><td><input value="{$reclamation_rate_35[5]}" name="reclamationRate_pre1real"></td>
		</tr>
		<tr>
			<td class="tdhead">{$declaredata[3]+2}年规划值</td><td><input value="{$reclamation_rate_35[6]}" name="reclamationRate_pre2"></td>
			<td class="tdhead">{$declaredata[3]+2}年实际值</td><td><input value="{$reclamation_rate_35[7]}" name="reclamationRate_pre2real"></td>
		</tr>
		<tr>
			<td class="tdhead">{$declaredata[3]+3}年规划值</td><td><input value="{$reclamation_rate_35[8]}" name="reclamationRate_pre3"></td>
			<td class="tdhead">{$declaredata[3]+3}年实际值</td><td><input value="{$reclamation_rate_35[9]}" name="reclamationRate_pre3real"></td>
		</tr>
		<tr>
			<td class="tdhead">{$declaredata[3]+4}年规划值</td><td><input value="{$reclamation_rate_35[10]}" name="reclamationRate_pre4"></td>
			<td class="tdhead">{$declaredata[3]+4}年实际值</td><td><input value="{$reclamation_rate_35[11]}" name="reclamationRate_pre4real"></td>
		</tr>
		<tr>
			<td class="tdhead">{$declaredata[3]+5}年规划值</td><td><input value="{$reclamation_rate_35[12]}" name="reclamationRate_pre5"></td>
			<td class="tdhead">{$declaredata[3]+5}年实际值</td><td><input value="{$reclamation_rate_35[13]}" name="reclamationRate_pre5real"></td>	  
		</tr>
	</table>
	<table class="formView" align="center" width='100%'>
		<tr>
			<td class="tdhead" >已复垦土地面积(平方千米)</td><td><input   value="{$reclamation_rate[2]}" name="reclamationRateHave"></td>
			<td class="tdhead" >可复垦土地面积(平方千米)</td><td><input   value="{$reclamation_rate[3]}" name="reclamationRateCan"></td>
		</tr>
		<tr>
			<td class="tdtitle" colspan=4>其他</td>
		</tr>
		<tr>
			<td class="tdhead">土地复垦每亩经济效益(万元)</td><td><input   value="{$income[1]}" name="reclamationMoney"><input type="button" id="button_reclamationMoney" value="详情"/></td>
			<td class="tdhead">土地复垦每亩平均投资(万元)</td><td><input   value="{$investment[1]}" name="reclamationPrice"><input type="button" id="button_reclamationPrice" value="详情"/></td>
		</tr>
	</table>
	<table align="center" style="display:none;" class="formView" id="bef3_pre5_reclamationMoney">
		<tr>
			<td class="tdhead">{$declaredata[3]-2}年实际值</td><td><input value="{$income_35[1]}" name="reclamationMoney_bef3"></td>
			<td class="tdhead">{$declaredata[3]-1}年实际值</td><td><input value="{$income_35[2]}" name="reclamationMoney_bef2"></td>
		</tr>
		<tr>
			<td class="tdhead">{$declaredata[3]}年实际值</td><td><input value="{$income_35[3]}" name="reclamationMoney_bef1"></td>
		</tr>
		<tr>
			<td class="tdhead">{$declaredata[3]+1}年规划值</td><td><input value="{$income_35[4]}" name="reclamationMoney_pre1"></td>
			<td class="tdhead">{$declaredata[3]+1}年实际值</td><td><input value="{$income_35[5]}" name="reclamationMoney_pre1real"></td>
		</tr>
		<tr>
			<td class="tdhead">{$declaredata[3]+2}年规划值</td><td><input value="{$income_35[6]}" name="reclamationMoney_pre2"></td>
			<td class="tdhead">{$declaredata[3]+2}年实际值</td><td><input value="{$income_35[7]}" name="reclamationMoney_pre2real"></td>
		</tr>
		<tr>
			<td class="tdhead">{$declaredata[3]+3}年规划值</td><td><input value="{$income_35[8]}" name="reclamationMoney_pre3"></td>
			<td class="tdhead">{$declaredata[3]+3}年实际值</td><td><input value="{$income_35[9]}" name="reclamationMoney_pre3real"></td>
		</tr>
		<tr>
			<td class="tdhead">{$declaredata[3]+4}年规划值</td><td><input value="{$income_35[10]}" name="reclamationMoney_pre4"></td>
			<td class="tdhead">{$declaredata[3]+4}年实际值</td><td><input value="{$income_35[11]}" name="reclamationMoney_pre4real"></td>
		</tr>
		<tr>
			<td class="tdhead">{$declaredata[3]+5}年规划值</td><td><input value="{$income_35[12]}" name="reclamationMoney_pre5"></td>
			<td class="tdhead">{$declaredata[3]+5}年实际值</td><td><input value="{$income_35[13]}" name="reclamationMoney_pre5real"></td>	  
		</tr>
	</table>			
	<table align="center" style="display:none;" class="formView" id="bef3_pre5_reclamationPrice">
		<tr>
			<td class="tdhead">{$declaredata[3]-2}年实际值</td><td><input value="{$investment_35[1]}" name="reclamationPrice_bef3"></td>
			<td class="tdhead">{$declaredata[3]-1}年实际值</td><td><input value="{$investment_35[2]}" name="reclamationPrice_bef2"></td>
		</tr>
		<tr>
			<td class="tdhead">{$declaredata[3]}年实际值</td><td><input value="{$investment_35[3]}" name="reclamationPrice_bef1"></td>
		</tr>
		<tr>
			<td class="tdhead">{$declaredata[3]+1}年规划值</td><td><input value="{$investment_35[4]}" name="reclamationPrice_pre1"></td>
			<td class="tdhead">{$declaredata[3]+1}年实际值</td><td><input value="{$investment_35[5]}" name="reclamationPrice_pre1real"></td>
		</tr>
		<tr>
			<td class="tdhead">{$declaredata[3]+2}年规划值</td><td><input value="{$investment_35[6]}" name="reclamationPrice_pre2"></td>
			<td class="tdhead">{$declaredata[3]+2}年实际值</td><td><input value="{$investment_35[7]}" name="reclamationPrice_pre2real"></td>
		</tr>
		<tr>
			<td class="tdhead">{$declaredata[3]+3}年规划值</td><td><input value="{$investment_35[8]}" name="reclamationPrice_pre3"></td>
			<td class="tdhead">{$declaredata[3]+3}年实际值</td><td><input value="{$investment_35[9]}" name="reclamationPrice_pre3real"></td>
		</tr>
		<tr>
			<td class="tdhead">{$declaredata[3]+4}年规划值</td><td><input value="{$investment_35[10]}" name="reclamationPrice_pre4"></td>
			<td class="tdhead">{$declaredata[3]+4}年实际值</td><td><input value="{$investment_35[11]}" name="reclamationPrice_pre4real"></td>
		</tr>
		<tr>
			<td class="tdhead">{$declaredata[3]+5}年规划值</td><td><input value="{$investment_35[12]}" name="reclamationPrice_pre5"></td>
			<td class="tdhead">{$declaredata[3]+5}年实际值</td><td><input value="{$investment_35[13]}" name="reclamationPrice_pre5real"></td>	  
		</tr>
	</table>
	</div>
	<div id="tabs-9"><!--社区和谐-->
	<table class="formView" align="center" id="public_info">
		<tr>
			<td class = 'tdtitle' colspan=4>公共捐赠(万元)<input   value="{$donation[1]}" name="communityDonate"></td>
		</tr>
		<tr>	
			<td class = 'tdhead'>基础设施(万元)</td><td><input   value="{$donation[2]}" name="communityDonateBase"></td>
			<td class = 'tdhead'>教育(万元)</td><td><input   value="{$donation[3]}" name="communityDonateStudy"></td>
			
		</tr>
		<tr>
			<td class = 'tdhead'>渠道修建(万元)</td><td><input   value="{$donation[4]}" name="communityDonateChannel"></td>
			<td class = 'tdhead'>路面拓宽硬化(万元)</td><td><input   value="{$donation[5]}" name="communityDonateRoad"></td>
		</tr>
		<tr>
			<td class = 'tdhead'>备注(万元)</td><td><input   value="{$donation[6]}" name="communityDonateComment"></td>
			
		</tr>
		<tr>
			<td class = 'tdtitle' colspan=4>地区与企业之间的契合度</td>
		</tr>
		
		<tr>
			<td class = 'tdhead'>支农</td><td colspan=3><textarea cols="60" rows="3"  name="communityTacitFarm">{$support[1]}</textarea></td>
		</tr>
		<tr>
			<td class = 'tdhead'>支教</td><td colspan=3><textarea cols="60" rows="3"  name="communityTacitTeach">{$support[2]}</textarea></td>
		</tr>
		<tr>
			<td class = 'tdhead'>抗灾</td><td colspan=3><textarea cols="60" rows="3"  name="communityTacitDefeat">{$support[3]}</textarea></td>
		</tr>
		<tr>
			<td class = 'tdhead'>赈灾</td><td colspan=3><textarea cols="60" rows="3"  name="communityTacitHelp">{$support[4]}</textarea></td>	
		</tr>
		<tr>
			<td class = 'tdhead'>备注</td><td colspan=3><textarea cols="60" rows="3"  name="communityTacitComment">{$support[5]}</textarea></td>
		</tr>
		<tr>
			<td class = 'tdtitle' colspan=4>职工情况</td>
		</tr>
		
		<tr>
			<td class = 'tdhead'>地区群众就业占矿山职工人数比重(%)</td><td colspan=3><input   value="{$employee[1]}" name="communityManrate"></td>
		</tr>
		<tr>
			<td class = 'tdhead'>职工福利</td><td colspan=3><textarea cols="60" rows="3"  name="communityWelfare">{$employee[2]}</textarea></td>
		</tr>
	</table>
	</div>	   
	<div id="tabs-10"><!--企业文化-->
	<table class="formView" align="center" id="enterprise_cul">
		<tr>
			<td class = 'tdhead'>企业宗旨</td><td colspan=2><textarea cols="60" rows="3"  name="cultureAim">{$corporate_culture[1]}</textarea></td>
		</tr>
		<tr>	
			<td class = 'tdhead'>经营理念</td><td colspan=2><textarea cols="60" rows="3"  name="cultureIdea">{$corporate_culture[2]}</textarea></td>
			
		</tr>
		<tr>
			<td class = 'tdhead'>企业信条</td><td colspan=2><textarea cols="60" rows="3"  name="cultureBelief">{$corporate_culture[3]}</textarea></td> 
		</tr>
<!-- 		<tr>
			<td class = 'tdhead'>企业识别系统</td><td colspan=2><input type="varchar(20)" name="cultureRecogImage" value=""/><input type="button" onclick="add();" value="浏览"/></td>
		</tr> -->
		<tr>
			<td class = 'tdhead'>组织形式</td><td colspan=2><textarea cols="60" rows="3"  name="cultureOrgan">{$corporate_culture[5]}</textarea></td>
		</tr>
		<tr>
			<td class = 'tdhead'>企业之歌</td> <td colspan=2><textarea cols="60" rows="3"  name="cultureOrganMusic">{$corporate_culture[6]}</textarea></td>
		</tr>
		<tr>
			<td class = 'tdhead'>歌词</td><td colspan=2><textarea cols="60" rows="3"  name="cultureOrganMusicLrc">{$corporate_culture[7]}</textarea></td>
		</tr>
		<!-- <tr>
			<td class = 'tdhead'>音频</td> <td colspan=2><input type="varchar(20)" name="cultureOrganMusicFile" value=""/><input type="button" onclick="add();" value="浏览"/></td>
		</tr> -->
		<tr>
			<td class = 'tdhead'>文体活动次数</td><td colspan=2><textarea cols="60" rows="3"  name="cultureOrganActive">{$corporate_culture[9]}</textarea></td>
		</tr>
		<tr>
			<td class = 'tdhead'>企业内部刊物或报纸</td> <td colspan=2><textarea cols="60" rows="3"  name="cultureOrganPaper">{$corporate_culture[10]}</textarea></td>
		</tr>
		<!-- <tr>
			<td class = 'tdhead'>企业宣传视频</td><td colspan=2><input type="varchar(20)" name="cultureVideo" value=""/><input type="button" onclick="add();" value="浏览"/></td>
		</tr> -->
		<tr>
			<td class = 'tdhead'>其他</td><td colspan=2><textarea cols="60" rows="3"  name="cultureOther">{$corporate_culture[12]}</textarea></td>
		</tr>
	</table>
	</div>
	<div id="tabs-11"><!--重点工程-->
	<table width="100%" align="center" id="project" class="formView">
		{foreach from=$project item=p}
		<tr>
			<td>
				<table calss="formView" align="center" id="project_details">
					<tr>                                   
						<td class="tdtitle" colspan=6>重点工程信息</td>
					</tr>
					<tr>
						<td class="tdhead">项目编号</td>
						<td><input type="text"  value="{$p[1]}" name="projectNum[]"></td>
						<td class="tdhead">工程名称</td>
						<td><input type="text"  value="{$p[2]}" name="projectName[]"></td>
						<td class="tdhead">工程类型</td>
						<td>
							<select name="projectType[]">
								<option value="{$p[3]}">{$p[3]}</option>
								<option value="依法办矿工程">依法办矿工程</option>
								<option value="规范管理工程">规范管理工程</option>
								<option value="资源开发与综合利用工程">资源开发与综合利用工程</option>
								<option value="技术创新工程">技术创新工程</option>
								<option value="节能减排工程">节能减排工程</option>
								<option value="矿山环境恢复治理类工程">矿山环境恢复治理类工程</option>
								<option value="土地复垦工程">土地复垦工程</option>
								<option value="和谐社区建设类工程">和谐社区建设类工程</option>
								<option value="企业文化工程">企业文化工程</option>	
							</select>
						</td>
					</tr>
					<tr>
						<td class='tdhead'>工程内容</td>
						<td colspan=5>
							<textarea cols="60" rows="3" name="projectDetail[]">{$p[4]}</textarea>
						</td>
					</tr>
					<tr>
						<td class="tdhead">开始年份</td>
						<td><input type="text"  value="{$p[5]}" name="projectlWorktime[]"></td>
						<td class="tdhead">结束年份</td>
						<td><input type="text"  value="{$p[6]}" name="projectStarttime[]"></td>
						<td class="tdhead">工程投资(万元)</td>
						<td><input type="text"  value="{$p[7]}" name="projectCost[]"></td>
					</tr>					
					<tr>
						<td class="tdhead">资金筹措</td>
						<td><input type="text"  value="{$p[8]}" name="projectMoney[]"></td>
						<td class="tdhead">负责部门</td>
						<td><input type="text"  value="{$p[9]}" name="projectOrgan[]"></td>
					</tr>					
					<tr>
						<td class="tdhead">预期效益</td>
						<td colspan=5><textarea cols="60" rows="3" name="projectEffect[]">{$p[10]}</textarea></td>
					</tr>
					<tr>
						<td class='tdhead'>{$p->projectlWorktime+1}年完成情况</td>
						<td colspan=5>
							<textarea cols="60" rows="3" name="projectFinish1[]">{$p[11]}</textarea>
						</td>
					</tr>
					<tr>
						<td class='tdhead'>{$p->projectlWorktime+2}年完成情况</td>
						<td colspan=5>
							<textarea cols="60" rows="3" name="projectFinish2[]">{$p[12]}</textarea>
						</td>
					</tr>
					<tr>
						<td class='tdhead'>{$p->projectlWorktime+3}年完成情况</td>
						<td colspan=5>
							<textarea cols="60" rows="3" name="projectFinish3[]">{$p[13]}</textarea>
						</td>
					</tr>
					<tr>
						<td class='tdhead'>{$p->projectlWorktime+4}年完成情况</td>
						<td colspan=5>
							<textarea cols="60" rows="3" name="projectFinish4[]">{$p[14]}</textarea>
						</td>
					</tr>
					<tr>
						<td class='tdhead'>{$p->projectlWorktime+5}年完成情况</td>
						<td colspan=5>
							<textarea cols="60" rows="3" name="projectFinish5[]">{$p[15]}</textarea>
						</td>
					</tr>
					
				</table>
			</td>
		</tr>
		{/foreach}
	</table>
	<tr align="right">
		<td align="right">
				<input type="button" onclick="addProject();" value="添加工程"/>
		</td>                       
	</tr>
	</div>
	<div id="tabs-12"><!--审核意见-->
	 <table class="formView" align="center" id="audit_info" width='100%'>
		<tr>
			<td class = 'tdhead'>国土资源部审核意见</td><td colspan=3><textarea cols="60" rows="3"  name="auditNation">{$auditdataArray[0]->auditNation}</textarea></td>
			<td class = 'tdhead'>审核时间</td><td><input class="datepicker" value="{$auditdataArray[0]->auditNationTime}"   name="auditNationTime"></td>
		</tr>
                <tr>
			<td class = 'tdhead'>省级国土资源主管部门审核意见</td><td colspan=3 ><textarea cols="60" rows="3"  name="auditPlace">{$auditdataArray[0]->auditPlace}</textarea></td>
			<td class = 'tdhead'>审核时间</td><td><input class="datepicker" value="{$auditdataArray[0]->auditPlaceTime}"   name="auditPlaceTime"></td>
		</tr>
		<tr>
			<td class = 'tdhead'>行业协会审核意见</td><td colspan=3 ><textarea cols="60" rows="3"  name="auditIndustry">{$auditdataArray[0]->auditIndustry}</textarea></td>
			<td class = 'tdhead'>审核时间</td><td><input class="datepicker" value="{$auditdataArray[0]->auditIndustryTime}"   name="auditIndustryTime"></td>
		</tr>
		<tr>
			<td class = 'tdhead'>市级国土资源主管部门审核意见</td><td colspan=3 ><textarea cols="60" rows="3"  name="auditShi">{$auditdataArray[0]->auditShi}</textarea></td>
			<td class = 'tdhead'>审核时间</td><td><input class="datepicker" width="90%" name="auditShiTime"></td>
		</tr>
		<tr>
			<td class = 'tdhead'>县级国土资源主管部门审核意见</td><td colspan=3 ><textarea cols="60" rows="3"  name="auditXian">{$auditdataArray[0]->auditXian}</textarea></td>
			<td class = 'tdhead'>审核时间</td><td><input class="datepicker" width="90%" name="auditXianTime"></td>
		</tr>
	 </table>
	 </div>

    
	<div id="tabs-13"><!--专家意见-->
		<table width="100%" align="center" id="expert_info">
			<tr>
				<td>
					<table width="100%" class="formView" align="center">
						<tr>
							<td class="tdtitle" colspan=4>
								专家
							</td>
						</tr>
						<tr>
							<td width="20%" class='tdhead'>姓名</td><td><input   value="{$e->expertName}" name="expertName[]"></td>
							<td width="20%" class='tdhead'>性别</td>
							<td width="30%">
								<select  name="expertSex[]">
									<option value="0">男</option>
									<option value="0">男</option>
									<option value="1">女</option>
								</select>
							</td>
						</tr>
						<tr>
							<td class='tdhead'>年龄</td><td><input   value="" name="expertAge[]"></td>
							<td class='tdhead'>单位</td><td><input   value="" name="expertCompany[]"></td>
						</tr>
						<tr>						
							<td class='tdhead'>职称</td><td><input   value="" name="expertTitles[]"></td>
							<td class='tdhead'>职务</td><td><input   value="" name="expertWork[]"></td>
						</tr>
						<tr>
							<td class='tdhead'>专业</td><td><input   value="" name="expertSubject[]"></td>
							<td class='tdhead'>手机</td><td><input   value="" name="expertCellphone[]"></td>
						</tr>
						<tr>					
							<td class='tdhead'>固话</td><td><input   value="" name="expertLandhone[]"></td>
							<td class='tdhead'>邮箱</td><td><input   value="" name="expertEmail[]"></td>
						</tr>
						<tr>
							<td class='tdhead'>传真</td><td><input   value="" name="expertFax[]"></td>
							<td class='tdhead'>地址</td><td><input   value="" name="expertAddress[]"></td>
						</tr>
						<tr>
							<td class='tdhead'>专家意见</td><td colspan=3><textarea cols="60" rows="3" name="expertIdea[]"></textarea></td>
						</tr>
						<tr>
							<td class='tdhead'>时间</td><td><input class="datepicker" value=""   name="expertTime[]"></td>
							<td class='tdhead' colspan=2>
								<input type="button" onclick="add();" value="添加专家"/>
								<input type="button" onclick="removeExpert();" value="删除专家"/>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</div>
</div>

	<input type="submit" value="下一步" />
	<input type="button" onclick="location.href='/minedata/ListMineData'" value="返回" />
</form>

