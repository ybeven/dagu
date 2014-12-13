<?php /* Smarty version 2.6.26, created on 2014-05-18 01:41:15
         compiled from minedata/ListMineDetails.tpl */ ?>
﻿<script type="text/javascript">
<?php echo '	
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
	      $(\'#bef3_pre5_reclamationRate\').toggle();
	});
	$("#button_reclamationMoney").click(function(){
	      $(\'#bef3_pre5_reclamationMoney\').toggle();
	});
	$("#button_reclamationPrice").click(function(){
	      $(\'#bef3_pre5_reclamationPrice\').toggle();
	});
	$("#button_environmentRate").click(function(){
	      $(\'#bef3_pre5_environmentRate\').toggle();
	});
	$("#button_energyElect").click(function(){
	      $(\'#bef3_pre5_energyElect\').toggle();
	});
       $("#button_energyWater").click(function(){
	      $(\'#bef3_pre5_energyWater\').toggle();
	});
	$("#button_energyEnergy").click(function(){
	      $(\'#bef3_pre5_energyEnergy\').toggle();
	});  
	$("#button_energyWaste").click(function(){
	      $(\'#bef3_pre5_energyWaste\').toggle();
	}); 
	$("#button_energyRubbish").click(function(){
	      $(\'#bef3_pre5_energyRubbish\').toggle();
	}); 
	$("#button_energySo2").click(function(){
	      $(\'#bef3_pre5_energySo2\').toggle();
	});
       $("#button_scienceRate").click(function(){
	      $(\'#bef3_pre5_scienceRate\').toggle();
	});
	$("#button_complexGoback").click(function(){
	      $(\'#bef3_pre5_complexGoback\').toggle();
	});


	$(".button_xiangqing").click(function(){
		$(this).parents("table").next("table").toggle("slow");
	});

	$(".button_xiangqing1").click(function(){
		$(this).parents("table").next("table").next("table").toggle("slow");
	});

	$(".button_gongshi").click(function(){
		var data = $(this).attr(\'data\');
		console.log(data);
		var isImgExist = $(this).attr(\'isImgExist\');
		//添加图片
		if(!isImgExist || isImgExist == \'0\')
		{
			var imgTag = $(\'<img class="\'+ data +\'" src="/images/\'+data+\'.png" />\');
			$(this).after(imgTag);
			$(this).attr(\'isImgExist\', 1)
		} else {
			// alert(isImgExist);
			// var cl = \'img.\'+data;
			$(this).next().remove();
			$(this).attr(\'isImgExist\', 0);
		}
		// if($(this).parents("table").next(".image").length == 0)
		// {
		// 	//创建标准节点
		// 	var imgTag = $(\'<img class="image" src="/images/kchc.png" />\');
		// 	$(this).parents("table").next("table").next("table").after(imgTag);
		// }
	});
	// $(".button_xiangqing").click(function(){
	//       // $(\'#ore53xkhs\').toggle();
	//       $(this).parents("table").siblings("table").toggle("slow");
	// });
	// $(".button_xiangqing1").click(function(){
	//       // $(\'#ore53xkhs\').toggle();
	//       $(this).parents("table").siblings("table").siblings("table").toggle("slow");
	// });

	

	$("#button_complexDilut").click(function(){
	      $(\'#bef3_pre5_complexDilut\').toggle();
	});
	$("#button_complexUserate").click(function(){
	      $(\'#bef3_pre5_complexUserate\').toggle();
	});
       $("#button_complexRecover").click(function(){
	      $(\'#bef3_pre5_complexRecover\').toggle();
	});
	$("#button_complexEfficiency").click(function(){
	      $(\'#bef3_pre5_complexEfficiency\').toggle();
	});
	$("#button_complexProrate").click(function(){
	      $(\'#bef3_pre5_complexProrate\').toggle();
	});	
	$("#button_complexCoalBack").click(function(){
	      $(\'#bef3_pre5_complexCoalBack\').toggle();
	});
	$("#button_complexCoalIn").click(function(){
	      $(\'#bef3_pre5_complexCoalIn\').toggle();
	});
	$("#button_complexCoalAll").click(function(){
	      $(\'#bef3_pre5_complexCoalAll\').toggle();
	});
	$("#button_standardWorkerCount").click(function(){
	      $(\'#bef3_pre5_standardWorkerCount\').toggle();
	});
	$("#button_standardWorkerCost").click(function(){
	      $(\'#bef3_pre5_standardWorkerCost\').toggle();
	}); 
	$("#button_basedataDigreturnrate").click(function(){
	      $(\'#bef3_pre5_basedataDigreturnrate\').toggle();
	});
	$("#button_basedataSepareturnrate").click(function(){
	      $(\'#bef3_pre5_basedataSepareturnrate\').toggle();
	});
	$("#button_basedataProduceScale").click(function(){
	      $(\'#bef3_pre5_basedataProduceScale\').toggle();
	});
	$("#button_basedataValue").click(function(){
	      $(\'#bef3_pre5_basedataValue\').toggle();
	});
	$("#button_basedataFee").click(function(){
	      $(\'#bef3_pre5_basedataFee\').toggle();
	});
	$("#button_basedataProfit").click(function(){
	      $(\'#bef3_pre5_basedataProfit\').toggle();
	});
	$("#button_basedataorelevelh").click(function(){$(\'#oreLevelhs\').toggle();});
	$("#button_basedataorelevela").click(function(){$(\'#oreLevelas\').toggle();});
	$("#button_orexkhslv").click(function(){$(\'#ore53xkhs\').toggle();});
	$("#button_orekchclv").click(function(){$(\'#ore53kchc\').toggle();});
	$("#button_orezhlylv").click(function(){$(\'#ore53zhly\').toggle();});

	
	//选矿回收率
	//$("#button_orexkhslv").click(function(){$(\'#ore53xkhs\').toggle();});
	
	//三率53下拉框
	

	//开采回采率

	//综合利用率
//*****************************************************************************************
//选矿回收率

//******************************************************************************************
	
	
	//下面是跟矿种有关的按钮，需要动态添加
'; ?>

				
	<?php $_from = $this->_tpl_vars['whatisxk']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['ll']):
?>
	$("#button_orexkhslv<?php echo $this->_tpl_vars['ll']; ?>
").click(function()<?php echo '{'; ?>
$('#ore53xkhs<?php echo $this->_tpl_vars['ll']; ?>
').toggle();<?php echo '})'; ?>
;
	<?php endforeach; endif; unset($_from); ?>
	<?php $_from = $this->_tpl_vars['whatiskc']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['kk']):
?>
	$("#button_orekchclv<?php echo $this->_tpl_vars['kk']; ?>
").click(function()<?php echo '{'; ?>
$('#ore53kchc<?php echo $this->_tpl_vars['kk']; ?>
').toggle();<?php echo '})'; ?>
;
	<?php endforeach; endif; unset($_from); ?>
	<?php $_from = $this->_tpl_vars['whatiszh']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['yy']):
?>
	$("#button_orezhlylv<?php echo $this->_tpl_vars['yy']; ?>
").click(function()<?php echo '{'; ?>
$('#ore53zhly<?php echo $this->_tpl_vars['yy']; ?>
').toggle();<?php echo '})'; ?>
;
	<?php endforeach; endif; unset($_from); ?>
	<?php $_from = $this->_tpl_vars['whatis']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['haha']):
?>
	$("#button_orehuishou<?php echo $this->_tpl_vars['haha']; ?>
").click(function()<?php echo '{'; ?>
$('#bef3_pre5_orehuishou<?php echo $this->_tpl_vars['haha']; ?>
').toggle();<?php echo '})'; ?>
;
	$("#button_oreGoback<?php echo $this->_tpl_vars['haha']; ?>
").click(function()<?php echo '{'; ?>
$('#bef3_pre5_oreGoback<?php echo $this->_tpl_vars['haha']; ?>
').toggle();<?php echo '})'; ?>
;
	$("#button_basedataorelevelh<?php echo $this->_tpl_vars['haha']; ?>
").click(function()<?php echo '{'; ?>
$('#oreLevelhs<?php echo $this->_tpl_vars['haha']; ?>
').toggle();<?php echo '}'; ?>
);
	$("#button_basedataorelevela<?php echo $this->_tpl_vars['haha']; ?>
").click(function()<?php echo '{'; ?>
$('#oreLevelas<?php echo $this->_tpl_vars['haha']; ?>
').toggle();<?php echo '}'; ?>
);
	<?php endforeach; endif; unset($_from); ?>
<?php echo '
});
//	for(var i=0;i<{$flag_j};i++)

//	{
//		var j=i;
//		String(j);
//		var sid=\'#bef3_pre5_orehuishou\'+j;
//		$("#button_orehuishou"+j).click(function(){$(sid).toggle();	});
//	}
//}); 
	function testajax()
		{
			var x=document.getElementById("jingdu2").value;
			var y=document.getElementById("weidu2").value;
			//alert("/minedata/SaveMineData/"+'; ?>
<?php echo $this->_tpl_vars['mineid']; ?>
<?php echo ');
			var patrn=/^\\d+\\.\\d+\\.\\d+$/;
			if((!patrn.exec(x))||!(patrn.exec(y))){alert( "经纬度输入不合法，请检查" );}
			
			else
			{
			//$.ajax({type:"POST",url:"/minedata/UpdateMineData/"+'; ?>
<?php echo $this->_tpl_vars['mineid']; ?>
<?php echo ',data:$("#testform").serializeArray(),success:function(msg){alert(msg);}});
			$("#testform").submit();
			}
			
		}
function loadchecktime1()
	{
	  var x=document.getElementById("legal1Deadlinend");
	  if(x.value == "") return ;
	  var arys1 = x.value.split(\'-\');
      var sdate=new Date(arys1[0],arys1[1]-1,arys1[2]); 
	  var myDate = new Date();
	  var old = sdate.getTime();
	  var now = myDate.getTime();
	  if(old-2592000000<now&&old>now)
	  {
	  x.style.background="yellow";
	  }
	  else if(old < now)
	  {
	  x.style.background="red";
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
	  var arys1 = x.value.split(\'-\');
      var sdate=new Date(arys1[0],arys1[1]-1,arys1[2]); 
	  var myDate = new Date();
	  var old = sdate.getTime();
	  var now = myDate.getTime();
	 if(old-2592000000<now&&old>now)
	  {
	  x.style.background="yellow";
	  }
	  else if(old < now)
	  {
	  x.style.background="red";
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
	  var arys1 = x.value.split(\'-\');
      var sdate=new Date(arys1[0],arys1[1]-1,arys1[2]); 
	  var myDate = new Date();
	  var old = sdate.getTime();
	  var now = myDate.getTime();
	  if(old-2592000000<now&&old>now)
	  {
	  x.style.background="yellow";
	  }
	  else if(old < now)
	  {
	  x.style.background="red";
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
	  var arys1 = x.value.split(\'-\');
      var sdate=new Date(arys1[0],arys1[1]-1,arys1[2]); 
	  var myDate = new Date();
	  var old = sdate.getTime();
	  var now = myDate.getTime();
	  if(old-2592000000<now&&old>now)
	  {
	  x.style.background="yellow";
	  }
	  else if(old < now)
	  {
	  x.style.background="red";
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
	  var arys1 = x.value.split(\'-\');
      var sdate=new Date(arys1[0],arys1[1]-1,arys1[2]); 
	  var myDate = new Date();
	  var old = sdate.getTime();
	  var now = myDate.getTime();
	  if(old-2592000000<now&&old>now)
	  {
	  x.style.background="yellow";
	  }
	  else if(old < now)
	  {
	  x.style.background="red";
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
	  var arys1 = x.value.split(\'-\');
      var sdate=new Date(arys1[0],arys1[1]-1,arys1[2]); 
	  var myDate = new Date();
	  var old = sdate.getTime();
	  var now = myDate.getTime();
	  if(old-2592000000<now&&old>now)
	  {
	  x.style.background="yellow";
	  }
	  else if(old < now)
	  {
	  x.style.background="red";
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
	  var arys1 = x.value.split(\'-\');
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
	  var arys1 = x.value.split(\'-\');
      var sdate=new Date(arys1[0],arys1[1]-1,arys1[2]); 
	  var myDate = new Date();
	  var old = sdate.getTime();
	  var now = myDate.getTime();
	 if(old-2592000000<now&&old>now)
	  {
	  x.style.background="yellow";
	  }
	  else if(old < now)
	  {
	  x.style.background="red";
	  }
	  else
	  {
	  x.style.background="white";
	  }
	}function loadchecktime10()
	{
	  var x=document.getElementById("legal10Deadlinend");
	   if(x.value == "") return ;
	  var arys1 = x.value.split(\'-\');
      var sdate=new Date(arys1[0],arys1[1]-1,arys1[2]); 
	  var myDate = new Date();
	  var old = sdate.getTime();
	  var now = myDate.getTime();
	  if(old-2592000000<now&&old>now)
	  {
	  x.style.background="yellow";
	  }
	  else if(old < now)
	  {
	  x.style.background="red";
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
	  var arys1 = x.value.split(\'-\');
      var sdate=new Date(arys1[0],arys1[1]-1,arys1[2]); 
	  var myDate = new Date();
	  var old = sdate.getTime();
	  var now = myDate.getTime();
	  if(old-2592000000<now&&old>now)
	  {
	  x.style.background="yellow";
	  }
	  else if(old < now)
	  {
	  x.style.background="red";
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
	  var arys1 = x.value.split(\'-\');
      var sdate=new Date(arys1[0],arys1[1]-1,arys1[2]); 
	  var myDate = new Date();
	  var old = sdate.getTime();
	  var now = myDate.getTime();
	  if(old-2592000000<now&&old>now)
	  {
	  x.style.background="yellow";
	  }
	  else if(old < now)
	  {
	  x.style.background="red";
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
	  var arys1 = x.value.split(\'-\');
      var sdate=new Date(arys1[0],arys1[1]-1,arys1[2]); 
	  var myDate = new Date();
	  var old = sdate.getTime();
	  var now = myDate.getTime();
	  if(old-2592000000<now&&old>now)
	  {
	  x.style.background="yellow";
	  }
	  else if(old < now)
	  {
	  x.style.background="red";
	  }
	  else
	  {
	  x.style.background="white";
	  }
	}
	function loadchecktime14()
	{
	  var x=document.getElementById("legal14Deadlinend");
	   if(x.value == "") return ;
	  var arys1 = x.value.split(\'-\');
      var sdate=new Date(arys1[0],arys1[1]-1,arys1[2]); 
	  var myDate = new Date();
	  var old = sdate.getTime();
	  var now = myDate.getTime();
	  if(old-2592000000<now&&old>now)
	  {
	  x.style.background="yellow";
	  }
	  else if(old < now)
	  {
	  x.style.background="red";
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
	  var arys1 = x.value.split(\'-\');
      var sdate=new Date(arys1[0],arys1[1]-1,arys1[2]); 
	  var myDate = new Date();
	  var old = sdate.getTime();
	  var now = myDate.getTime();
	  if(old-2592000000<now&&old>now)
	  {
	  x.style.background="yellow";
	  }
	  else if(old < now)
	  {
	  x.style.background="red";
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
	  var arys1 = x.value.split(\'-\');
      var sdate=new Date(arys1[0],arys1[1]-1,arys1[2]); 
	  var myDate = new Date();
	  var old = sdate.getTime();
	  var now = myDate.getTime();
	  if(old-2592000000<now&&old>now)
	  {
	  x.style.background="yellow";
	  }
	  else if(old < now)
	  {
	  x.style.background="red";
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
	  var arys1 = x.value.split(\'-\');
      var sdate=new Date(arys1[0],arys1[1]-1,arys1[2]); 
	  var myDate = new Date();
	  var old = sdate.getTime();
	  var now = myDate.getTime();
	  if(old-2592000000<now&&old>now)
	  {
	  x.style.background="yellow";
	  }
	  else if(old < now)
	  {
	  x.style.background="red";
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
	  var arys1 = x.value.split(\'-\');
      var sdate=new Date(arys1[0],arys1[1]-1,arys1[2]); 
	  var myDate = new Date();
	  var old = sdate.getTime();
	  var now = myDate.getTime();
	  if(old-2592000000<now&&old>now)
	  {
	  x.style.background="yellow";
	  }
	  else if(old < now)
	  {
	  x.style.background="red";
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
	  var arys1 = x.value.split(\'-\');
      var sdate=new Date(arys1[0],arys1[1]-1,arys1[2]); 
	  var myDate = new Date();
	  var old = sdate.getTime();
	  var now = myDate.getTime();
	 if(old-2592000000<now&&old>now)
	  {
	  x.style.background="yellow";
	  }
	  else if(old < now)
	  {
	  x.style.background="red";
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
	  var arys1 = x.value.split(\'-\');
      var sdate=new Date(arys1[0],arys1[1]-1,arys1[2]); 
	  var myDate = new Date();
	  var old = sdate.getTime();
	  var now = myDate.getTime();
	  if(old-2592000000<now&&old>now)
	  {
	  x.style.background="yellow";
	  }
	  else if(old < now)
	  {
	  x.style.background="red";
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
	  var arys1 = x.value.split(\'-\');
      var sdate=new Date(arys1[0],arys1[1]-1,arys1[2]); 
	  var myDate = new Date();
	  var old = sdate.getTime();
	  var now = myDate.getTime();
	  if(old-2592000000<now&&old>now)
	  {
	  x.style.background="yellow";
	  }
	  else if(old < now)
	  {
	  x.style.background="red";
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
	  var arys1 = x.value.split(\'-\');
      var sdate=new Date(arys1[0],arys1[1]-1,arys1[2]); 
	  var myDate = new Date();
	  var old = sdate.getTime();
	  var now = myDate.getTime();
	 if(old-2592000000<now&&old>now)
	  {
	  x.style.background="yellow";
	  }
	  else if(old < now)
	  {
	  x.style.background="red";
	  }
	  else
	  {
	  x.style.background="white";
	  }
	}
    function loadchecktime(x)
	{
	  if(x.value == "") return ;
	  var arys1 = x.value.split(\'-\');
      var sdate=new Date(arys1[0],arys1[1]-1,arys1[2]); 
	  var myDate = new Date();
	  var old = sdate.getTime();
	  var now = myDate.getTime();
	 if(old-2592000000<now&&old>now)
	  {
	  x.style.background="yellow";
	  }
	  else if(old < now)
	  {
	  x.style.background="red";
	  }
	  else
	  {
	  x.style.background="white";
	  }
	  }
		function add()
		{                
			var str="<tr><td><table width=\'100%\' class=\'formView\' align=\'center\'><tr><td width=\'50%\' colspan=4>专家</td></tr>"
				+"<tr><td width=\'20%\' class=\'tdhead\'>姓名</td width=\'30%\'><td><input width=\'90%\' name=\'expertName[]\'></td>"
				+"<td width=\'20%\' class=\'tdhead\'>性别</td><td width=\'30%\'><select name=\'expertSex[]\'><option value=\'1\'>男</option><option value=\'2\'>女</option></select></td></tr>"
				+"<tr><td class=\'tdhead\'>年龄</td><td><input width=\'90%\' name=\'expertAge[]\'></td>"
				+"<td class=\'tdhead\'>单位</td><td><input width=\'90%\' name=\'expertCompany[]\'></td></tr>"
				+"<tr><td class=\'tdhead\'>职称</td><td><input width=\'90%\' name=\'expertTitles[]\'></td>"
				+"<td class=\'tdhead\'>职务</td><td><input width=\'90%\' name=\'expertWork[]\'></td></tr>"
				+"<tr><td class=\'tdhead\'>专业</td><td><input width=\'90%\' name=\'expertSubject[]\'></td>"
				+"<td class=\'tdhead\'>手机</td><td><input width=\'90%\' name=\'expertCellphone[]\'></td></tr>"
				+"<tr><td class=\'tdhead\'>固话</td><td><input width=\'90%\' name=\'expertLandhone[]\'></td>"
				+"<td class=\'tdhead\'>邮箱</td><td><input width=\'90%\' name=\'customer[]\'></td></tr>"
				+"<tr><td class=\'tdhead\'>传真</td><td><input width=\'90%\' name=\'expertFax[]\'></td>"
				+"<td class=\'tdhead\'>地址</td><td><input width=\'90%\' name=\'expertAddress[]\'></td></tr>"
				+"<tr><td class=\'tdhead\'>专家意见</td><td colspan=3><textarea cols=\'60\' rows=\'3\' name=\'expertIdea[]\'></textarea></td></tr>"
				+"<tr><td class=\'tdhead\'>时间</td><td><input class=\'datepicker\' width=\'90%\' name=\'expertTime[]\'></td>"
				+"<td class=\'tdhead\' colspan=2><input type=\'button\' onclick=\'add();\' value=\'添加专家\'/><input type=\'button\' onclick=\'removeExpert(this);\' value=\'删除该专家\'/></td></tr></table></td></tr>";			      
			$("#expert_info").append(str);
        }
        // function gongshi(red)
        // {
        // 	var i = 1
        // 	if(i==1)
        // 	{
        		
        // 	}
        // 	else
        // 	{
        // 		$(red).remove();
        // 	}

        // }
		function removeExpert(red)
		{
			$(red).parent().parent().parent().parent().parent().parent().remove();	
		}
		function removeExperted(red)
		{
			$(red).parents("table").next().remove();	
		}
		
//添加矿种坐标
		function addweidu()
		{
			var str20="<tr><td class=\'tdhead\'>经度</td><td><input type=\'text\' name=\'basedataZuobiaoJing[]\'></td><td class=\'tdhead\'>纬度</td><td><input type=\'text\' name=\'basedataZuobiaoWei[]\'><input type=\'button\' onclick=\'deleteweidu(this);\'  value=\'删除\'></td></tr>";
			$("#weidu").append(str20); 
		}
//删除添加的坐标
function deleteweidu(red10)
		{
			$(red10).parent().parent().remove();
		}
//重点工程添加删除函数
		function addProject()
		{        
			var str1="<tr><td><table calss=\'formViem\' align=\'center\' id=\'projectDetails\'><tr><td colspan=6>重点工程信息</td></tr>"
			    +"<tr><td class=\'tdhead\'>项目编号</td>"
				+"<td><input type=\'text\' name=\'projectNum[]\'></td>"
				+"<td class=\'tdhead\'>工程名称</td>"
				+"<td><input type=\'text\' name=\'projectName[]\'></td>"
				+"<td class=\'tdhead\'>工程类型</td>"
				+"<td><select name=\'projectType[]\'><option value=\'依法办矿工程\'>依法办矿工程</option><option value=\'规范管理工程\'>规范管理工程</option><option value=\'资源开发与综合利用工程\'>资源开发与综合利用工程</option><option value=\'技术创新工程\'>技术创新工程</option><option value=\'节能减排工程\'>节能减排工程</option><option value=\'矿山环境恢复治理类工程\'>矿山环境恢复治理类工程</option><option value=\'土地复垦工程\'>土地复垦工程</option><option value=\'和谐社区建设类工程\'>和谐社区建设类工程</option><option value=\'企业文化工程\'>企业文化工程</option></select></td></tr>"
				+"<tr><td class=\'tdhead\'>工程内容</td>"
				+"<td colspan=5><textarea cols=\'60\' rows=\'3\' name=\'projectDetail[]\'></textarea></td></tr>"
				+"<tr><td class=\'tdhead\'>开始年份</td>"
				+"<td><input type=\'text\' name=\'projectlWorktime[]\'></td>"
				+"<td class=\'tdhead\'>结束年份</td>"
				+"<td><input type=\'text\' name=\'projectStarttime[]\'></td>"  					
				+"<td class=\'tdhead\'>工程投资</td>"
				+"<td><input type=\'text\' name=\'projectCost[]\'></td></tr>"  //之前都是好的
				+"<tr><td class=\'tdhead\'>资金筹措</td>"
				+"<td><input type=\'text\' name=\'projectMoney[]\'></td>"   								
				+"<td class=\'tdhead\'>负责部门</td>"     
				+"<td><input type=\'text\' name=\'projectOrgan[]\'></td>"
				+"</tr><tr><td class=\'tdhead\'>预期效益</td><td colspan=5><textarea cols=\'60\' rows=\'3\' name=\'projectEffect[]\'></textarea></td></tr>"
				+"<tr><td class=\'tdhead\'>完成情况</td><td colspan=5><textarea cols=\'60\' rows=\'3\' name=\'projectFinish1[]\'></textarea></td></tr>"
				+"<tr><td class=\'tdhead\'>完成情况</td><td colspan=5><textarea cols=\'60\' rows=\'3\' name=\'projectFinish2[]\'></textarea></td></tr>"
				+"<tr><td class=\'tdhead\'>完成情况</td><td colspan=5><textarea cols=\'60\' rows=\'3\' name=\'projectFinish3[]\'></textarea></td></tr>"
				+"<tr><td class=\'tdhead\'>完成情况</td><td colspan=5><textarea cols=\'60\' rows=\'3\' name=\'projectFinish4[]\'></textarea></td></tr>"
				+"<tr><td class=\'tdhead\'>完成情况</td><td colspan=5><textarea cols=\'60\' rows=\'3\' name=\'projectFinish5[]\'></textarea></td></tr>"
				+"<tr><td class=\'tdhead\' colspan=6><input type=\'button\' onclick=\'removeProject(this);\' value=\'删除该重点工程\'/></td></tr></table></td></tr>";
				//+"<tr align=\'right\'><td align=\'right\' class=\'tdhead\'><input type=\'button\' onclick=\'addProject();\' value=\'添加重点工程\'/></td></tr>";  
			$("#project").append(str1);                                                                                                                                                                                                                          
		}
		function removeProject(red1)
		{ 
			$(red1).parent().parent().parent().parent().parent().remove();	
		}

//添加选矿回收率
'; ?>


function add53xkhs(x)
<?php echo '{'; ?>

	$("#ore"+x).toggle();
<?php echo '}'; ?>

var rate_mark1 = <?php echo $this->_tpl_vars['flag_l']; ?>
-1;
<?php echo '
	function addxkhslv(x, num, y, z, a, b, c, d)
	{ 
'; ?>

	    rate_mark1=rate_mark1+1;
		var str10="<table class='formView' align='center'><tr><td class='tdhead' >"+y+"</td><td ><input type='text' name='orexuankuanghuishou1["+num+"][]'></td>"
		+"<td class='tdhead' >"+z+"</td><td ><input type='text' name='orexuankuanghuishou2["+num+"][]'></td></tr>"
		+"<tr><td class='tdhead' >"+a+"</td><td ><input type='text' name='orexuankuanghuishou3["+num+"][]'></td>"
		+"<td class='tdhead' >"+b+"</td><td ><input type='text' name='orexuankuanghuishou4["+num+"][]'></td></tr>"
		+"<tr><td class='tdhead' >"+c+"</td><td ><input type='text' name='orexuankuanghuishou5["+num+"][]'></td>"
		+"<td class='tdhead' >"+d+"</td><td ><input type='text' name='orexuankuanghuishou6["+num+"][]'></td></tr>"
		// +"<tr><td class='tdhead' >原矿品位</td><td ><input type='text' name='orepinweiYuan["+num+"][]'></td>"
		// +"<td class='tdhead' >精矿品位</td><td ><input type='text' name='orepinweiJing["+num+"][]'></td></tr>"
		// +"<tr><td class='tdhead' >产率</td><td ><input type='text' name='orechanlv["+num+"][]'></td>"
		// +"<td class='tdhead' >精矿中有用组分质量</td><td ><input type='text' name='orezufenJing["+num+"][]'></td></tr>"
		// +"<tr><td class='tdhead' >原矿中有用组分质量</td><td ><input type='text' name='orezufenYuan["+num+"][]'></td></tr>"
		+"<tr><td class='tdhead' colspan=4 >选矿回收率(%)(煤矿为采区回采率)<input type='text' name='orexuankuanghuishouvalue["+num+"][]'/></td></tr>"
		//<input type='button' id='btnxkhslv"+rate_mark1+"' onclick='add53xkhs(this.id);' value='详情' />
		// +"<table align='center' style='display:none;' class='formView' id='orebtnxkhslv"+rate_mark1+"'>"
		// +"				<tr>"
		// +"					<td class='tdhead'><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-2; ?>
年实际值</td><td><input type='text' name='orehuishou_bef3["+num+"][]'></td>"
		// +"					<td class='tdhead'><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-1; ?>
年实际值</td><td><input type='text' name='orehuishou_bef2["+num+"][]'></td>"
		// +"				</tr>"
		// +"				<tr>"
		// +"					<td class='tdhead'><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi; ?>
年实际值</td><td><input type='text' name='orehuishou_bef1["+num+"][]'></td>"
		// +"				</tr>"
		// +"				<tr>"
		// +"					<td class='tdhead'><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年规划值</td><td><input type='text' name='orehuishou_pre1["+num+"][]'></td>"
		// +"					<td class='tdhead'><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年实际值</td><td><input type='text' name='orehuishou_pre1real["+num+"][]'></td>"
		// +"				</tr>"
		// +"				<tr>"
		// +"					<td class='tdhead'><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年规划值</td><td><input type='text' name='orehuishou_pre2["+num+"][]'></td>"
		// +"					<td class='tdhead'><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年实际值</td><td><input type='text' name='orehuishou_pre2real["+num+"][]'></td>"
		// +"				</tr>"
		// +"				<tr>"
		// +"					<td class='tdhead'><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年规划值</td><td><input type='text' name='orehuishou_pre3["+num+"][]'></td>"
		// +"					<td class='tdhead'><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年实际值</td><td><input type='text' name='orehuishou_pre3real["+num+"][]'></td>"
		// +"				</tr>"
		// +"				<tr>"
		// +"					<td class='tdhead'><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年规划值</td><td><input type='text' name='orehuishou_pre4["+num+"][]'></td>"
		// +"					<td class='tdhead'><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年实际值</td><td><input type='text' name='orehuishou_pre4real["+num+"][]'></td>"
		// +"				</tr>"
		// +"				<tr>"
		// +"					<td class='tdhead'><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年规划值</td><td><input type='text' name='orehuishou_pre5["+num+"][]'></td>"
		// +"					<td class='tdhead'><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年实际值</td><td><input type='text' name='orehuishou_pre5real["+num+"][]'></td>"	  
		// +"				</tr>"
		// +"			</table>"
		 +"</table>";

		// 添加到新的div中
		$("#orexkhsdiv"+num).append(str10);
		// console.log(num);
	<?php echo '
	}
	'; ?>
	

function add53kchc(x)
<?php echo '{'; ?>

	$("#ore"+x).toggle();
<?php echo '}'; ?>

var rate_mark2 = <?php echo $this->_tpl_vars['flag_k']; ?>
-1;
<?php echo '
	function addkchclv(x, num, y, z, a, b, c, d)
	{'; ?>

		rate_mark2=rate_mark2+1;
		var str9="<table class='formView' align='center'  width='90%'>"
		+"<tr><td class='tdhead' width='20%'>"+y+"</td><td width='10%'><input type='text' name='orekaicaihuicai1["+num+"][]'></td>"
		+"<td class='tdhead' width='20%'>"+z+"</td><td width='10%'><input type='text' name='orekaicaihuicai2["+num+"][]'></td></tr>"
		+"<tr><td class='tdhead' width='20%'>"+a+"</td><td width='10%'><input type='text' name='orekaicaihuicai3["+num+"][]'></td>"
		+"<td class='tdhead' width='20%'>"+b+"</td><td width='10%'><input type='text' name='orekaicaihuicai4["+num+"][]'></td></tr>"
		+"<tr><td class='tdhead' width='20%'>"+c+"</td><td width='10%'><input type='text' name='orekaicaihuicai5["+num+"][]'></td>"
		+"<td class='tdhead' width='20%'>"+d+"</td><td width='10%'><input type='text' name='orekaicaihuicai6["+num+"][]'></td></tr>"
		// +"<td class='tdhead' width='20%'>采出资源量</td><td width='10%'><input type='text' name='orekaicaihuicaichu["+num+"][]'></td>"
		// +"<td class='tdhead' width='20%'>动用资源储量</td><td width='10%'><input type='text' name='orekaicaihuicaiyong["+num+"][]'></td></tr>"
		+"<tr><td class='tdhead' colspan=4 width='90%'>开采回采率(%)(煤矿为原煤入选率)<input type='text' name='orekaicaihuicaivalue["+num+"][]' /></td></tr>"
		//<input type='button' id='btnkchclv"+rate_mark2+"' onclick='add53kchc(this.id);' value='详情'/>
		// +"<table align='center' style='display:none;' class='formView' id='orebtnkchclv"+rate_mark2+"'>"
		// +"<tr>"
		// +"<td class='tdhead'><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-2; ?>
年实际值</td><td><input name='oreGoback_bef3["+num+"][]'></td>"
		// +"<td class='tdhead'><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-1; ?>
年实际值</td><td><input name='oreGoback_bef2["+num+"][]'></td>"
		// +"</tr>"
		// +"<tr>"
		// +"<td class='tdhead'><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi; ?>
年实际值</td><td><input name='oreGoback_bef1["+num+"][]'></td>"
		// +"</tr>"
		// +"<tr>"
		// +"<td class='tdhead'><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年规划值</td><td><input name='oreGoback_pre1["+num+"][]'></td>"
		// +"<td class='tdhead'><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年实际值</td><td><input name='oreGoback_pre1real["+num+"][]'></td>"
		// +"</tr>"
		// +"<tr>"
		// +"<td class='tdhead'><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年规划值</td><td><input name='oreGoback_pre2["+num+"][]'></td>"
		// +"<td class='tdhead'><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年实际值</td><td><input name='oreGoback_pre2real["+num+"][]'></td>"
		// +"</tr>"
		// +"<tr>"
		// +"<td class='tdhead'><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年规划值</td><td><input name='oreGoback_pre3["+num+"][]'></td>"
		// +"<td class='tdhead'><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年实际值</td><td><input name='oreGoback_pre3real["+num+"][]'></td>"
		// +"</tr>"
		// +"<tr>"
		// +"<td class='tdhead'><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年规划值</td><td><input name='oreGoback_pre4["+num+"][]'></td>"
		// +"<td class='tdhead'><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年实际值</td><td><input name='oreGoback_pre4real["+num+"][]'></td>"
		// +"</tr>"
		// +"<tr>"
		// +"<td class='tdhead'><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年规划值</td><td><input name='oreGoback_pre5["+num+"][]'></td>"
		// +"<td class='tdhead'><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年实际值</td><td><input name='oreGoback_pre5real["+num+"][]'></td>"
		// +"</tr></table>"
		 +"</table>";				  
		// 添加到新的div中
		$("#orekchcdiv"+num).append(str9);	
   <?php echo ' }

//添加综合利用率
	'; ?>


function add53zhly(x)
<?php echo '{'; ?>

	$("#ore"+x).toggle();
<?php echo '}'; ?>


var rate_mark3 = <?php echo $this->_tpl_vars['flag_y']; ?>
;
<?php echo '
	function addzhlylv(x, num, y, z, a, b, c, d)
	{
	'; ?>

		rate_mark3=rate_mark3+1;
		var str8="<table class='formView' align='center' id='orezhlylv' width='90%'>"
		+"<tr><td class='tdhead' width='20%'>"+y+"</td><td width='10%'><input type='text' name='orezhly1["+num+"][]' ></td>"
		+"<td class='tdhead' width='20%'>"+z+"</td><td width='10%'><input type='text' name='orezhly2["+num+"][]' ></td></tr>"
		+"<tr><td class='tdhead' width='20%'>"+a+"</td><td width='10%'><input type='text' name='orezhly3["+num+"][]'></td>"
		+"<td class='tdhead' width='20%'>"+b+"</td><td width='10%'><input type='text' name='orezhly4["+num+"][]'></td></tr>"
		+"<tr><td class='tdhead' width='20%'>"+c+"</td><td width='10%'><input type='text' name='orezhly5["+num+"][]' ></td>"
		+"<td class='tdhead' width='20%'>"+d+"</td><td width='10%'><input type='text' name='orezhly6["+num+"][]' ></td></tr>"
		// +"<tr><td class='tdhead'>共伴生有用组分的质量</td><td width='10%'><input type='text' name='complexUserateUsequality["+num+"][]'></td>"
		// +"<td class='tdhead'>动用资源储量中（主）共伴生有用组分质量</td><td width='10%'><input type='text' name='complexUserateSavequality["+num+"][]'></td></tr>"
		// +"<tr><td class='tdhead'>开采回采率(%)</td><td width='10%'><input type='text' name='complexUserateGoback["+num+"][]'></td>"
		// +"<td class='tdhead'>选矿回收率(%)</td><td width='10%'><input type='text' name='complexUserateFindback["+num+"][]'></td></tr>"
		// +"<tr><td class='tdhead'>当量品位</td><td width='10%'><input type='text' name='complexUserateTaste["+num+"][]'></td></tr>"
		+"<tr><td class='tdhead' colspan=4 width='20%'>综合利用率<input type='text' name='complexUserate["+num+"][]'/></td></tr>"
		//<input type='button' id='btnzhlylv"+rate_mark3+"' onclick='add53zhly(this.id);' value='详情'/>
		// +"<table align='center' style='display:none;' class='formView' id='orebtnzhlylv"+rate_mark3+"'>"
		// +"<tr>"
		// +"<td class='tdhead'><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-2; ?>
年实际值</td><td><input name='complexUserate_bef3["+num+"][]'></td>"
		// +"<td class='tdhead'><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-1; ?>
年实际值</td><td><input name='complexUserate_bef2["+num+"][]'></td>"
		// +"</tr>"
		// +"<tr>"
		// +"<td class='tdhead'><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi; ?>
年实际值</td><td><input name='complexUserate_bef1["+num+"][]'></td>"
		// +"</tr>"
		// +"<tr>"
		// +"<td class='tdhead'><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年规划值</td><td><input name='complexUserate_pre1["+num+"][]'></td>"
		// +"<td class='tdhead'><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年实际值</td><td><input name='complexUserate_pre1real["+num+"][]'></td>"
		// +"</tr>"
		// +"<tr>"
		// +"<td class='tdhead'><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年规划值</td><td><input name='complexUserate_pre2["+num+"][]'></td>"
		// +"<td class='tdhead'><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年实际值</td><td><input name='complexUserate_pre2real["+num+"][]'></td>"
		// +"</tr>"
		// +"<tr>"
		// +"<td class='tdhead'><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年规划值</td><td><input name='complexUserate_pre3["+num+"][]'></td>"
		// +"<td class='tdhead'><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年实际值</td><td><input name='complexUserate_pre3real["+num+"][]'></td>"
		// +"</tr>"
		// +"<tr>"
		// +"<td class='tdhead'><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年规划值</td><td><input name='complexUserate_pre4["+num+"][]'></td>"
		// +"<td class='tdhead'><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年实际值</td><td><input name='complexUserate_pre4real["+num+"][]'></td>"
		// +"</tr>"
		// +"<tr>"
		// +"<td class='tdhead'><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年规划值</td><td><input name='complexUserate_pre5["+num+"][]'></td>"
		// +"<td class='tdhead'><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年实际值</td><td><input name='complexUserate_pre5real["+num+"][]'></td>"
		// +"</tr>"
		// +"</table>"
		+"</table>";
		// $("#ore"+x).append(str8);
		// 添加到新的div中
		$('#orezhlydiv'+num).append(str8);
		console.log($('#orezhlydiv'+num));
    <?php echo '
	}
	'; ?>
	
	

//添加其他矿种选矿回收率

var rate_mark = <?php echo $this->_tpl_vars['flag_j']; ?>
;
<?php echo '
function basedataorelevelh(num)
		{
			$("#oreLevelhs"+num+"").toggle();
		}
		function basedataorelevela(num)
		{
			$("#oreLevelas"+num+"").toggle();
		}
			function addminerate()
				{       
					rate_mark=rate_mark+1; 
					var str2="<table class=\'formView\' align=\'center\' width=\'100%\'><tr><td colspan=4 class=\'tdhead\'>矿种"+rate_mark+"</td></tr>"
						+"<tr><td class=\'tdhead\'>矿种名称</td>"
						+"<td><select id=\'"+rate_mark+"\'  onchange=\'getchild(this.id)\' width=\'90%\' name=\'oreNametype[]\'>"
						+	"<option >请选择</option>"
						+	"<option value=\'能源矿产\'>能源矿产</option>"
						+	"<option value=\'金属矿产\'>金属矿产</option>"
						+	"<option value=\'非金属矿产\'>非金属矿产</option>"
						+   "<option value=\'煤矿\'>煤矿</option>"
						+"</select>" 
						+"<select id=\'child"+rate_mark+"\'  name=\'orename[]\' width=\'90%\'>"
						+"	<option >请选择</option>"
						+"</select></td> " 
						
						//+"<td><input type=\'text\' name=\'orename[]\'></td>"
						+"<td class=\'tdhead\'>矿种选择</td>"
						+"<td><select name=\'oretype[]\'><option value=\'主矿种\'>主矿种</option><option value=\'伴生矿种\'>伴生矿种</option></select></td></tr>"
						+"<td class=\'tdhead\'>保有储量</td>"
						+"<td width=\'30%\' style=\'padding:0\'>"
						+"<select name=\'oreLevelhType[]\'>"
						+"<option value=\'矿石量\'>矿石量</option>"
						+"<option value=\'金属量\'>金属量</option>"
						+"</select>"
						+"<input type=\'text\' name=\'oreLevelh[]\' replace=\'数值\' style=\'width:50px\' />"
						+"<select name=\'oreLevelhUnit[]\'  style=\'width:50px\'>"
						+"<option value=\'万吨\'>万吨</option>"
						+"<option value=\'吨\'>吨</option>"
						+"<option value=\'百万吨\'>百万吨</option>"
						+"<option value=\'千克\'>千克</option>"
						+"<option value=\'克\'>克</option>"
						+"<option value=\'立方\'>立方</option>"
						+"<option value=\'立方米\'>立方米</option>"
						+"<option value=\'百立方米\'>百立方米</option>"
						+"<option value=\'克拉\'>克拉</option>"
						+"<option value=\'磅\'>磅</option>"
						+"</select>"
					// 	<td width="30%" style="padding:0">
					// 	<select name="oreLevelhType[]" >
					// 		<option value="{$o[34]}">{$o[34]}</option>}
					// 		<option value="矿石量">矿石量</option>
					// 		<option value="金属量">金属量</option>
					// 	</select>
					// 	<input type="text" name="oreLevelh[]" value="{$o[35]}" replace="数值" style="width:50px" />
					// 	<select name="oreLevelhUnit[]"  style="width:50px">
					// 		<option value="{$o[36]}">{$o[36]}</option>
					// 		<option value="万吨">万吨</option>
					// 		<option value="吨">吨</option>
					// 		<option value="百万吨">百万吨</option>
					// 		<option value="千克">千克</option>
					// 		<option value="克">克</option>
					// 		<option value="立方">立方</option>
					// 		<option value="立方米">立方米</option>
					// 		<option value="百立方米">百立方米</option>
					// 		<option value="克拉">克拉</option>
					// 		<option value="磅">磅</option>
					// 	</select>	
					// 	<input type="button" id="button_basedataorelevelh{$o[22]}" value="详情"  style="width:50px"/>
					// </td>
						+"<input type=\'button\' id=\'button_basedataorelevelh"+rate_mark+"\' value=\'详情\' onclick=\'basedataorelevelh("+rate_mark+");\' style=\'width:50px\'/>"
						+"</td>"
						+"<td class=\'tdhead\'>可采储量</td>"
						+"<td width=\'30%\' style=\'padding:0\'>"
						+"<select name=\'oreLevelaType[]\'>"
						+"<option value=\'矿石量\'>矿石量</option>"
						+"<option value=\'金属量\'>金属量</option>"
						+"</select>"
						+"<input type=\'text\' name=\'oreLevela[]\' replace=\'数值\' style=\'width:50px\' />"
						+"<select name=\'oreLevelaUnit[]\'  style=\'width:50px\'>"
						+"<option value=\'万吨\'>万吨</option>"
						+"<option value=\'吨\'>吨</option>"
						+"<option value=\'百万吨\'>百万吨</option>"
						+"<option value=\'千克\'>千克</option>"
						+"<option value=\'克\'>克</option>"
						+"<option value=\'立方\'>立方</option>"
						+"<option value=\'立方米\'>立方米</option>"
						+"<option value=\'百立方米\'>百立方米</option>"
						+"<option value=\'克拉\'>克拉</option>"
						+"<option value=\'磅\'>磅</option>"
						+"</select>"
						+"<input type=\'button\' id=\'button_basedataorelevela"+rate_mark+"\' value=\'详情\' onclick=\'basedataorelevela("+rate_mark+");\' style=\'width:50px\'/></td>"
						+"<tr><td colspan=4 style=\'border:none\'><table align=\'center\' style=\'display:none;\' class=\'formView\' id=\'oreLevelhs"+rate_mark+"\'>"
						+"	<tr>"
						+"		<td id=\'oreLevelh111\' class=\'tdhead\'>保有储量111级</td><td><input  name=\'oreLevelh111[]\'></td>"
						+"		<td id=\'oreLevelh121122\' class=\'tdhead\'>保有储量121/122级</td><td><input  name=\'oreLevelh121122[]\'></td>"
						+"	</tr>"
						+"	<tr>"
						+"		<td id=\'oreLevelh111b\' class=\'tdhead\'>保有储量111b级</td><td><input  name=\'oreLevelh111b[]\'></td>"
						+"	</tr>"
						+"	<tr>"
						+"		<td id=\'oreLevelh121b\'class=\'tdhead\'>保有储量121b级</td><td><input  name=\'oreLevelh121b[]\'></td>"
						+"		<td id=\'oreLevelh122b\' class=\'tdhead\'>保有储量122b级</td><td><input  name=\'oreLevelh122b[]\'></td>"
						+"	</tr>"
						+"	<tr>"
						+"		<td id=\'oreLevelh2m111\' class=\'tdhead\'>保有储量2m11级</td><td><input  name=\'oreLevelh2m111[]\'></td>"
						+"		<td id=\'oreLevelh2m21\' class=\'tdhead\'>保有储量2m21级</td><td><input  name=\'oreLevelh2m21[]\'></td>"
						+"	</tr>"
						+"	<tr>"
						+"		<td id=\'oreLevelh2m22\' class=\'tdhead\'>保有储量2m22级</td><td><input  name=\'oreLevelh2m22[]\'></td>"
						+"		<td id=\'oreLevelh2s11\' class=\'tdhead\'>保有储量2s11级</td><td><input  name=\'oreLevelh2s11[]\'></td>"
						+"	</tr>"
						+"	<tr>"
						+"		<td id=\'oreLevelh2s21\' class=\'tdhead\'>保有储量2s21级</td><td><input  name=\'oreLevelh2s21[]\'></td>"
						+"		<td id=\'oreLevelh2s22\' class=\'tdhead\'>保有储量2s22级</td><td><input name=\'oreLevelh2s22[]\'></td>"
						+"	</tr>"
						+"	<tr>"
						+"		<td id=\'oreLevelh331\'class=\'tdhead\'>保有储量331级</td><td><input  name=\'oreLevelh331[]\'></td>"
						+"		<td id=\'oreLevelh332\'class=\'tdhead\'>保有储量332级</td><td><input  name=\'oreLevelh332[]\'></td>	"  
						+"	</tr>"
						+"	<tr>"
						+"		<td id=\'oreLevelh333\'class=\'tdhead\'>保有储量333级</td><td><input  name=\'oreLevelh333[]\'></td>"
						+"		<td id=\'oreLevelh334\'class=\'tdhead\'>保有储量334级</td><td><input  name=\'oreLevelh334[]\'></td>	"  
						+"	</tr>"
						+"</table></td></tr>"
						+"<tr><td colspan=4 style=\'border:none\'><table align=\'center\' style=\'display:none;\' class=\'formView\' id=\'oreLevelas"+rate_mark+"\'>"
						+"	<tr>"
						+"		<td id=\'oreLevela111\' class=\'tdhead\'>可采储量111级</td><td><input  name=\'oreLevela111[]\'></td>"
						+"		<td id=\'oreLevela121122\' class=\'tdhead\'>可采储量121/122级</td><td><input name=\'oreLevela121122[]\'></td>"
						+"	</tr>"
						+"	<tr>"
						+"		<td id=\'oreLevela111b\' class=\'tdhead\'>可采储量111b级</td><td><input  name=\'oreLevela111b[]\'></td>"
						+"	</tr>"
						+"	<tr>"
						+"		<td id=\'oreLevela121b\'class=\'tdhead\'>可采储量121b级</td><td><input  name=\'oreLevela121b[]\'></td>"
						+"		<td id=\'oreLevela122b\' class=\'tdhead\'>可采储量122b级</td><td><input name=\'oreLevela122b[]\'></td>"
						+"	</tr>"
						+"	<tr>"
						+"		<td id=\'oreLevela2m111\' class=\'tdhead\'>可采储量2m11级</td><td><input name=\'oreLevela2m111[]\'></td>"
						+"		<td id=\'oreLevela2m21\' class=\'tdhead\'>可采储量2m21级</td><td><input name=\'oreLevela2m21[]\'></td>"
						+"	</tr>"
						+"	<tr>"
						+"		<td id=\'oreLevela2m22\' class=\'tdhead\'>可采储量2m22级</td><td><input name=\'oreLevela2m22[]\'></td>"
						+"		<td id=\'oreLevela2s11\' class=\'tdhead\'>可采储量2s11级</td><td><input name=\'oreLevela2s11[]\'></td>"
						+"	</tr>"
						+"	<tr>"
						+"		<td id=\'oreLevela2s21\' class=\'tdhead\'>可采储量2s21级</td><td><input name=\'oreLevela2s21[]\'></td>"
						+"		<td id=\'oreLevela2s22\' class=\'tdhead\'>可采储量2s22级</td><td><input name=\'oreLevela2s22[]\'></td>"
						+"	</tr>"
						+"	<tr>"
						+"		<td id=\'oreLevela331\'class=\'tdhead\'>可采储量331级</td><td><input name=\'oreLevela331[]\'></td>"
						+"		<td id=\'oreLevela332\'class=\'tdhead\'>可采储量332级</td><td><input name=\'oreLevela332[]\'></td>	 " 
						+"	</tr>"
						+"	<tr>"
						+"		<td id=\'oreLevela333\'class=\'tdhead\'>可采储量333级</td><td><input name=\'oreLevela333[]\'></td>"
						+"		<td id=\'oreLevela334\'class=\'tdhead\'>可采储量334级</td><td><input name=\'oreLevela334[]\'></td>"	  
						+"	</tr>"
						+"</table></td></tr>"	
						+"<tr><td class=\'tdhead\' colspan=4><input type=\'button\' value=\'删除此矿种\' onclick=\'ramoveminerate(this);\'></td></tr></table>";                                                                                                                      
					$("#ored").append(str2);                                                                                                                                                                                                                      
				}
				function getchild(red)
				{'; ?>

				
				var myArray = new Array(<?php $_from = $this->_tpl_vars['nyore']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['myarray'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['myarray']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['child']):
        $this->_foreach['myarray']['iteration']++;
?>
				<?php if (($this->_foreach['myarray']['iteration'] == $this->_foreach['myarray']['total'])): ?>"<?php echo $this->_tpl_vars['child']['name']; ?>
"
								<?php else: ?>"<?php echo $this->_tpl_vars['child']['name']; ?>
",<?php endif; ?><?php endforeach; endif; unset($_from); ?>);
				var myArray2 = new Array(<?php $_from = $this->_tpl_vars['jsore']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['myarray'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['myarray']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['child']):
        $this->_foreach['myarray']['iteration']++;
?>
				<?php if (($this->_foreach['myarray']['iteration'] == $this->_foreach['myarray']['total'])): ?>"<?php echo $this->_tpl_vars['child']['name']; ?>
"
								<?php else: ?>"<?php echo $this->_tpl_vars['child']['name']; ?>
",<?php endif; ?><?php endforeach; endif; unset($_from); ?>);
				var myArray3 = new Array(<?php $_from = $this->_tpl_vars['fjsore']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['myarray'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['myarray']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['child']):
        $this->_foreach['myarray']['iteration']++;
?>
				<?php if (($this->_foreach['myarray']['iteration'] == $this->_foreach['myarray']['total'])): ?>"<?php echo $this->_tpl_vars['child']['name']; ?>
"
								<?php else: ?>"<?php echo $this->_tpl_vars['child']['name']; ?>
",<?php endif; ?><?php endforeach; endif; unset($_from); ?>);
				var myArray4 = new Array(<?php $_from = $this->_tpl_vars['meiore']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['myarray'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['myarray']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['child']):
        $this->_foreach['myarray']['iteration']++;
?>
				<?php if (($this->_foreach['myarray']['iteration'] == $this->_foreach['myarray']['total'])): ?>"<?php echo $this->_tpl_vars['child']['name']; ?>
"
								<?php else: ?>"<?php echo $this->_tpl_vars['child']['name']; ?>
",<?php endif; ?><?php endforeach; endif; unset($_from); ?>);
				
				<?php echo '
				var str1 = "#child"+red;
				var str2;var str3;var str4;var str5;
				for(var i=0;i<myArray.length;i++)
				{
				 str2=str2+"<option value=\'"+myArray[i]+"\'>"+myArray[i]+"</option>";
				}
				for(var i=0;i<myArray2.length;i++)
				{
				 str3=str3+"<option value=\'"+myArray2[i]+"\'>"+myArray2[i]+"</option>";
				}
				for(var i=0;i<myArray3.length;i++)
				{
				 str4=str4+"<option value=\'"+myArray3[i]+"\'>"+myArray3[i]+"</option>";
				}
				for(var i=0;i<myArray4.length;i++)
				{
				 str5=str5+"<option value=\'"+myArray4[i]+"\'>"+myArray4[i]+"</option>";
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
					if($("#"+red).val()=="煤矿")
						{$("#child"+red).html(" ");
						$("#child"+red).append(str5);}
				}
				function ramoveminerate(red2)
				{
					//$(red2).parent().parent().parent().parent().parent().remove();
					$(red2).parent().parent().parent().parent().remove();
					// $(red2).parents("table").parents("table").parents("table").remove();
					//$(red2).parents(".formView").remove();
				}
				function ramoveminerated(red3)
				{
					//$(red3).next().remove();
					$(red3).parents("table").remove();
					//$(red2).parent().parent().parent().parent().remove();
					// $(red2).parents("table").parents("table").parents("table").remove();
					//$(red2).parents(".formView").remove();
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
'; ?>

</script>

<form id="testform" name="form" action="/minedata/UpdateMineData/<?php echo $this->_tpl_vars['mineid']; ?>
" enctype="multipart/form-data" method="post">
	<table align = "center" >
		<tr>
			<td align="left">请选择规划文件：</td>
			<td><input type="varchar(20)" name="trucknumber" value=""/></td>
			<td align="right"><input type="button" onclick="" value="浏览"/></td>
			<td><input type="button" value="附件管理" onclick="window.location.href='/minedata/AddFiles/<?php echo $this->_tpl_vars['mineid']; ?>
'"/></td>
		</tr>
	</table>
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
		        <td class='tdtitle' colspan=4 algin='center' style="background:#CCFFFF">矿山企业基本信息</td>
			</tr>
			<tr>
				<td class="tdhead">规划报告名称</td><td><textarea cols="30" rows="2" name="basedataBgname"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataBgname; ?>
</textarea></td>
				<td class="tdhead">绿色矿山级别</td><td ><select  name="basedataGreenlvl">
					<option value="<?php echo $this->_tpl_vars['basedataArray'][0]->basedataGreenlvl; ?>
"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataGreenlvl; ?>
</option>
					<option value="国家级">国家级</option>
					<option value="省级">省级</option>
					<option value="市（州）级">市（州）级</option>
					<option value="县级">县级</option>
				</td>
			</tr>
			<tr>
				<td class="tdhead">规划期限</td><td><input value="<?php echo $this->_tpl_vars['basedataArray'][0]->basedataLimit; ?>
" name="basedataLimit"></td>
				<td class="tdhead">规划基期(年份)</td><td><input value="<?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi; ?>
"  id="basedataJiqizhi" name="basedataJiqizhi" onchange="changeyears()"></td>
			</tr>
			<tr>
				<!--<td class="tdhead">组织单位</td><td><input  value="<?php echo $this->_tpl_vars['basedataArray'][0]->basedataOrgan; ?>
"  name="basedataOrgan"></td>-->
				<td class="tdhead">编制单位</td><td><input value="<?php echo $this->_tpl_vars['basedataArray'][0]->basedataEstablish; ?>
" name="basedataEstablish"></td>
				<td class="tdhead">报告出具日期</td><td><input class="datepicker" value="<?php echo $this->_tpl_vars['basedataArray'][0]->basedataBgdate; ?>
" name="basedataBgdate"></td>
			</tr>
			<tr>
				<td class="tdhead">矿山名称</td><td><input value="<?php echo $this->_tpl_vars['basedataArray'][0]->basedataMinename; ?>
" name="basedataMinename"></td>
				<td class="tdhead">矿山成立时间</td><td><input  class="datepicker" value="<?php echo $this->_tpl_vars['basedataArray'][0]->basedataBuildtime; ?>
" name="basedataBuildtime"></td>
			</tr>
			<tr>
				<td class="tdhead">企业名称</td><td><input value="<?php echo $this->_tpl_vars['basedataArray'][0]->basedataCompanyname; ?>
" name="basedataCompanyname"></td>
				<td class="tdhead">企业性质</td><td><select  name="basedataEnterpriseproperty">
					<option value="<?php echo $this->_tpl_vars['basedataArray'][0]->basedataEnterpriseproperty; ?>
"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataEnterpriseproperty; ?>
</option>
					<option value="国有企业">国有企业</option>
					<option value="集体企业">集体企业</option>
					<option value="联营企业">联营企业</option>
					<option value="股份合作制企业">股份合作制企业</option>
					<option value="个体户">个体户</option>
					<option value="私营企业">私营企业</option>
					<option value="合伙企业">合伙企业</option>
					<option value="有限责任公司">有限责任公司</option>
					<option value="股份有限公司">股份有限公司</option>
				</select>
				</td>
			</tr>
			<tr>
				<td class="tdhead">所属企业名称</td><td><input value="<?php echo $this->_tpl_vars['basedataArray'][0]->basedataOwedname; ?>
" name="basedataOwedname"></td>
				<td class="tdhead">规划范围(平方千米)</td><td><input value="<?php echo $this->_tpl_vars['basedataArray'][0]->basedataArea; ?>
" name="basedataArea"></td>
			</tr>

			<tr>
				<td class="tdhead">市级行政区划</td>
				<td>
					<select name="basedataDivisionsShi" id="shi">
						<option value="兰州市">兰州市</option>
						<option value="嘉峪关市">嘉峪关市</option>
						<option value="金昌市">金昌市</option>
						<option value="白银市">白银市</option>
						<option value="天水市">天水市</option>
						<option value="武威市">武威市</option>
						<option value="张掖市">张掖市</option>
						<option value="平凉市">平凉市</option>
						<option value="酒泉市">酒泉市</option>
						<option value="庆阳市">庆阳市</option>
						<option value="定西市">定西市</option>
						<option value="陇南市">陇南市</option>
						<option value="临夏回族自治州">临夏回族自治州</option>
						<option value="甘南藏族自治州">甘南藏族自治州</option>
					</select>
				</td>
				<td class="tdhead">县级行政区划</td>
				<td>
					<select name="basedataDivisionsXian" id="xian">
						<option value="城关区">城关区</option>
						<option value="七里河区">七里河区</option>
						<option value="西固区">西固区</option>
						<option value="安宁区">安宁区</option>
						<option value="红古区">红古区</option>
						<option value="永登县">永登县</option>
						<option value="皋兰县">皋兰县</option>
						<option value="榆中县">榆中县</option>
					</select>
				</td>
			</tr>
			<?php echo '
			<script src="/js/gansu.js" type="text/javascript" charset="utf-8"></script>
			<script type="text/javascript">
				$(\'#shi\').val("'; ?>
<?php echo $this->_tpl_vars['basedataArray'][0]->basedataDivisionsShi; ?>
<?php echo '");
				changexz();
				$(\'#xian\').val("'; ?>
<?php echo $this->_tpl_vars['basedataArray'][0]->basedataDivisionsXian; ?>
<?php echo '");
			</script>
			'; ?>

			<tr>
				<td class="tdhead">企业荣誉描述</td><td colspan=3><textarea cols="60" rows="3"  name="basedataReward"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataReward; ?>
</textarea></td>
			</tr>
			<tr>
				<!--矿山效益-->
				<td class="tdhead">矿山企业总产值(万元)</td><td width="30%"><input value="<?php echo $this->_tpl_vars['basedataArray'][0]->basedataValue; ?>
" name="basedataValue"><input type="button" id="button_basedataValue" value="详情"/></td>
				<td class="tdhead">矿山企业利税(万元)</td><td><input value="<?php echo $this->_tpl_vars['basedataArray'][0]->basedataFee; ?>
" name="basedataFee"><input type="button" id="button_basedataFee" value="详情"/></td>
			</tr>
   		</table>
   		<table align="center" style="display:none;" class="formView" id="bef3_pre5_basedataValue">
			<tr>
				<td id="t_basedataValue_bef3" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-2; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['basedata35Array'][3][0]; ?>
" name="basedataValue_bef3"></td>
				<td id="t_basedataValue_bef2" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-1; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['basedata35Array'][3][1]; ?>
" name="basedataValue_bef2"></td>
		</tr>
		<tr>
				<td id="t_basedataValue_bef1" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['basedata35Array'][3][2]; ?>
" name="basedataValue_bef1"></td>
		</tr>
		<tr>
				<td id="t_basedataValue_pre1" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['basedata35Array'][3][3]; ?>
" name="basedataValue_pre1"></td>
				<td id="t_basedataValue_pre1real" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['basedata35Array'][3][4]; ?>
" name="basedataValue_pre1real"></td>
		</tr>
		<tr>
				<td id="t_basedataValue_pre2" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['basedata35Array'][3][5]; ?>
" name="basedataValue_pre2"></td>
				<td id="t_basedataValue_pre2real" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['basedata35Array'][3][6]; ?>
" name="basedataValue_pre2real"></td>
		</tr>
		<tr>
				<td id="t_basedataValue_pre3" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['basedata35Array'][3][7]; ?>
" name="basedataValue_pre3"></td>
				<td id="t_basedataValue_pre3real" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['basedata35Array'][3][8]; ?>
" name="basedataValue_pre3real"></td>
		</tr>
		<tr>
				<td id="t_basedataValue_pre4" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['basedata35Array'][3][9]; ?>
" name="basedataValue_pre4"></td>
				<td id="t_basedataValue_pre4real" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['basedata35Array'][3][10]; ?>
" name="basedataValue_pre4real"></td>
		</tr>
		<tr>
				<td id="t_basedataValue_pre5" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['basedata35Array'][3][11]; ?>
" name="basedataValue_pre5"></td>
				<td id="t_basedataValue_pre5real" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['basedata35Array'][3][12]; ?>
" name="basedataValue_pre5real"></td>	  
		</tr>
	</table>
	<table align="center" style="display:none;" class="formView" id="bef3_pre5_basedataFee">
		<tr>
				<td id="t_basedataFee_bef3" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-2; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['basedata35Array'][4][0]; ?>
" name="basedataFee_bef3"></td>
				<td id="t_basedataFee_bef2" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-1; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['basedata35Array'][4][1]; ?>
" name="basedataFee_bef2"></td>
		</tr>
		<tr>
				<td id="t_basedataFee_bef1" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['basedata35Array'][4][2]; ?>
" name="basedataFee_bef1"></td>
		</tr>
		<tr>
				<td id="t_basedataFee_pre1" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['basedata35Array'][4][3]; ?>
" name="basedataFee_pre1"></td>
				<td id="t_basedataFee_pre1real" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['basedata35Array'][4][4]; ?>
" name="basedataFee_pre1real"></td>
		</tr>
		<tr>
				<td id="t_basedataFee_pre2" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['basedata35Array'][4][5]; ?>
" name="basedataFee_pre2"></td>
				<td id="t_basedataFee_pre2real" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['basedata35Array'][4][6]; ?>
" name="basedataFee_pre2real"></td>
		</tr>
		<tr>
				<td id="t_basedataFee_pre3" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['basedata35Array'][4][7]; ?>
" name="basedataFee_pre3"></td>
				<td id="t_basedataFee_pre3real" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['basedata35Array'][4][8]; ?>
" name="basedataFee_pre3real"></td>
		</tr>
		<tr>
				<td id="t_basedataFee_pre4" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['basedata35Array'][4][9]; ?>
" name="basedataFee_pre4"></td>
				<td id="t_basedataFee_pre4real" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['basedata35Array'][4][10]; ?>
" name="basedataFee_pre4real"></td>
		</tr>
		<tr>
				<td id="t_basedataFee_pre5" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['basedata35Array'][4][11]; ?>
" name="basedataFee_pre5"></td>
				<td id="t_basedataFee_pre5real" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['basedata35Array'][4][12]; ?>
" name="basedataFee_pre5real"></td>	  
		</tr>
	</table>
	<table class="formView" align="center" width='100%'>
		<tr>
			<td class="tdhead">矿山企业利润(万元)</td><td width="30%"><input   value="<?php echo $this->_tpl_vars['basedataArray'][0]->basedataProfit; ?>
" name="basedataProfit"><input type="button" id="button_basedataProfit" value="详情"/></td>
			<td class="tdhead">矿山企业人数(人)</td><td><input   value="<?php echo $this->_tpl_vars['basedataArray'][0]->basedataWorker; ?>
" name="basedataWorker"></td>
		</tr>
	</table>
	<table align="center" style="display:none;" class="formView" id="bef3_pre5_basedataProfit">
		<tr>
			<td id="t_basedataProfit_bef3" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-2; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['basedata35Array'][5][0]; ?>
" name="basedataProfit_bef3"></td>
			<td id="t_basedataProfit_bef2" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-1; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['basedata35Array'][5][1]; ?>
" name="basedataProfit_bef2"></td>
		</tr>
		<tr>
			<td id="t_basedataProfit_bef1"class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['basedata35Array'][5][2]; ?>
" name="basedataProfit_bef1"></td>
		</tr>
		<tr>
			<td id="t_basedataProfit_pre1" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['basedata35Array'][5][3]; ?>
" name="basedataProfit_pre1"></td>
			<td id="t_basedataProfit_pre1real" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['basedata35Array'][5][4]; ?>
" name="basedataProfit_pre1real"></td>
		</tr>
		<tr>
			<td id="t_basedataProfit_pre2" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['basedata35Array'][5][5]; ?>
" name="basedataProfit_pre2"></td>
			<td id="t_basedataProfit_pre2real" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['basedata35Array'][5][6]; ?>
" name="basedataProfit_pre2real"></td>
		</tr>
		<tr>
			<td id="t_basedataProfit_pre3" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['basedata35Array'][5][7]; ?>
" name="basedataProfit_pre3"></td>
			<td id="t_basedataProfit_pre3real" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['basedata35Array'][5][8]; ?>
" name="basedataProfit_pre3real"></td>
		</tr>
		<tr>
			<td id="t_basedataProfit_pre4" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['basedata35Array'][5][9]; ?>
" name="basedataProfit_pre4"></td>
			<td id="t_basedataProfit_pre4real" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['basedata35Array'][5][10]; ?>
" name="basedataProfit_pre4real"></td>
		</tr>
		<tr>
			<td id="t_basedataProfit_pre5" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['basedata35Array'][5][11]; ?>
" name="basedataProfit_pre5"></td>
			<td id="t_basedataProfit_pre5real" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['basedata35Array'][5][12]; ?>
" name="basedataProfit_pre5real"></td>	  
		</tr>
	</table>
	<table class="formView" align="center" width='100%'>
	<tr>
		<td class='tdtitle' colspan=4 algin='center' style="background:#CCFFFF">矿业权信息</td>
	</tr>
	</table>
	<table class="formView" align="center" id="ore" width='100%'>
		<tr>
			<td class="tdhead">矿业权类型</td>
			<td width="30%">
				<select name="basedataAuthority">
					<option value="<?php echo $this->_tpl_vars['basedataArray'][0]->basedataAuthority; ?>
"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataAuthority; ?>
</option>
					<option value="采矿权">采矿权</option>
					<option value="探矿权">探矿权</option>
					<!-- <option value="划定矿区范围">划定矿区范围</option> -->
				</select>
			</td>
			<td class="tdhead">储量规模</td>
			<td>
				<select name="basedataMinescale">
					<option value="<?php echo $this->_tpl_vars['basedataArray'][0]->basedataMinescale; ?>
"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataMinescale; ?>
</option>
					<option value="超大型">超大型</option>
					<option value="大型">大型</option>
					<option value="中型">中型</option>
					<option value="小型">小型</option>

				</select>
			</td>
		</tr>
		<table class="formView" align="center" width="100%" id="weidu">
		<tr>
			<td class="tdhead">经度</td><td width="30%"><input id="jingdu2" value="<?php echo $this->_tpl_vars['basedataArray'][0]->basedataPointLongitude; ?>
" name="basedataPointLongitude" ></td>
			<td class="tdhead">纬度</td><td><input id="weidu2" value="<?php echo $this->_tpl_vars['basedataArray'][0]->basedataPointLatitude; ?>
" name="basedataPointLatitude" ><input type="button" onclick="addweidu();"  value="添加" ></td>
		</tr>
	    </table>
	    <?php $_from = $this->_tpl_vars['minezuobiaoArray']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['z']):
?>
	    <table class="formView" align="center" width="100%">
	    <tr>
	    	<td class="tdhead">经度</td><td width="30%"><input value="<?php echo $this->_tpl_vars['z'][0]; ?>
" name="basedataZuobiaoJing[]"></td>
	    	<td class="tdhead">纬度</td><td><input value="<?php echo $this->_tpl_vars['z'][1]; ?>
" name="basedataZuobiaoWei[]"><input type="button" onclick="deleteweidu(this);"  value="删除" ></td>
	    </tr>
		</table>
	    <?php endforeach; endif; unset($_from); ?>
		<?php $_from = $this->_tpl_vars['oredataand35Array']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['o']):
?>
		
		<table class="formView" align="center" width="100%">
			<tr><td colspan=4 class='tdhead'>矿种<?php echo $this->_tpl_vars['o'][22]+1; ?>
<input type="button" value="删除此矿种" onclick='ramoveminerated(this);' style="height:25px" background="#CC9999"/></td></tr>
			<tr>
				<td class="tdhead">矿种名称</td>
				<td width="30%" style="padding:0">
					<select id="1"  onchange="getchild(this.id)" width="90%" name="oreNametype[]">
						<option value="<?php echo $this->_tpl_vars['o'][21]; ?>
"><?php echo $this->_tpl_vars['o'][21]; ?>
</option>
						<option value="能源矿产">能源矿产</option>
						<option value="金属矿产">金属矿产</option>
						<option value="非金属矿产">非金属矿产</option>
						<option value="煤矿">煤矿</option>
					</select>
					<select id="child1"  name="orename[]" width="90%">
						<option value="<?php echo $this->_tpl_vars['o'][0]; ?>
"><?php echo $this->_tpl_vars['o'][0]; ?>
</option>
					</select>
				</td>  
				<td class="tdhead">矿种类别</td>
				<td width="30%">
					<select name="oretype[]">
						<option value="<?php echo $this->_tpl_vars['o'][1]; ?>
"><?php echo $this->_tpl_vars['o'][1]; ?>
</option>
						<option value="主矿种">主矿种</option>
						<option value="伴生矿种">伴生矿种</option>
					</select>
				</td>
				<tr>
					<td class="tdhead">保有储量</td>
					<td width="30%" style="padding:0">
						<select name="oreLevelhType[]" >
							<option value="<?php echo $this->_tpl_vars['o'][34]; ?>
"><?php echo $this->_tpl_vars['o'][34]; ?>
</option>}
							<option value="矿石量">矿石量</option>
							<option value="金属量">金属量</option>
						</select>
						<input type="text" name="oreLevelh[]" value="<?php echo $this->_tpl_vars['o'][35]; ?>
" replace="数值" style="width:50px" />
						<select name="oreLevelhUnit[]"  style="width:50px">
							<option value="<?php echo $this->_tpl_vars['o'][36]; ?>
"><?php echo $this->_tpl_vars['o'][36]; ?>
</option>
							<option value="万吨">万吨</option>
							<option value="吨">吨</option>
							<option value="百万吨">百万吨</option>
							<option value="千克">千克</option>
							<option value="克">克</option>
							<option value="立方">立方</option>
							<option value="立方米">立方米</option>
							<option value="百立方米">百立方米</option>
							<option value="克拉">克拉</option>
							<option value="磅">磅</option>
						</select>	
						<input type="button" id="button_basedataorelevelh<?php echo $this->_tpl_vars['o'][22]; ?>
" value="详情"  style="width:50px"/>
					</td>
					<td class="tdhead">可采储量</td>
					<td width="30%" style="padding:0">

						<select name="oreLevelaType[]" >
							<option value="<?php echo $this->_tpl_vars['o'][37]; ?>
"><?php echo $this->_tpl_vars['o'][37]; ?>
</option>
							<option value="矿石量">矿石量</option>
							<option value="金属量">金属量</option>
						</select>
						<input type="text" name="oreLevela[]" value="<?php echo $this->_tpl_vars['o'][38]; ?>
" replace="数值" style="width:50px" />
						<select name="oreLevelaUnit[]"  style="width:50px">
							<option value="<?php echo $this->_tpl_vars['o'][39]; ?>
"><?php echo $this->_tpl_vars['o'][39]; ?>
</option>
							<option value="万吨">万吨</option>
							<option value="吨">吨</option>
							<option value="百万吨">百万吨</option>
							<option value="千克">千克</option>
							<option value="克">克</option>
							<option value="立方">立方</option>
							<option value="立方米">立方米</option>
							<option value="百立方米">百立方米</option>
							<option value="克拉">克拉</option>
							<option value="磅">磅</option>
						</select>
						<!-- <input type="text" name="oreLevela[]" value="<?php echo $this->_tpl_vars['o'][40]; ?>
" width="90%"/> -->

						<input type="button" id="button_basedataorelevela<?php echo $this->_tpl_vars['o'][22]; ?>
" value="详情"  style="width:50px"/></td>
					</tr>
<!-- 
					<script type="text/javascript">

					</script>
					 -->
					 <table align="center" style="display:none;" class="formView" id="oreLevelhs<?php echo $this->_tpl_vars['o'][22]; ?>
">
						<tr>
							<td id="oreLevelh111" class="tdhead">保有储量111级</td><td><input value="<?php echo $this->_tpl_vars['o'][41]; ?>
" name="oreLevelh111[]"></td>
							<td id="oreLevelh121122" class="tdhead">保有储量121/122级</td><td><input value="<?php echo $this->_tpl_vars['o'][42]; ?>
" name="oreLevelh121122[]"></td>
						</tr>
						<tr>
							<td id="oreLevelh111b" class="tdhead">保有储量111b级</td><td><input value="<?php echo $this->_tpl_vars['o'][43]; ?>
" name="oreLevelh111b[]"></td>
						</tr>
						<tr>
							<td id="oreLevelh121b"class="tdhead">保有储量121b级</td><td><input value="<?php echo $this->_tpl_vars['o'][44]; ?>
" name="oreLevelh121b[]"></td>
							<td id="oreLevelh122b" class="tdhead">保有储量122b级</td><td><input value="<?php echo $this->_tpl_vars['o'][45]; ?>
" name="oreLevelh122b[]"></td>
						</tr>
						<tr>
							<td id="oreLevelh2m111" class="tdhead">保有储量2m11级</td><td><input value="<?php echo $this->_tpl_vars['o'][46]; ?>
" name="oreLevelh2m111[]"></td>
							<td id="oreLevelh2m21" class="tdhead">保有储量2m21级</td><td><input value="<?php echo $this->_tpl_vars['o'][47]; ?>
" name="oreLevelh2m21[]"></td>
						</tr>
						<tr>
							<td id="oreLevelh2m22" class="tdhead">保有储量2m22级</td><td><input value="<?php echo $this->_tpl_vars['o'][48]; ?>
" name="oreLevelh2m22[]"></td>
							<td id="oreLevelh2s11" class="tdhead">保有储量2s11级</td><td><input value="<?php echo $this->_tpl_vars['o'][49]; ?>
" name="oreLevelh2s11[]"></td>
						</tr>
						<tr>
							<td id="oreLevelh2s21" class="tdhead">保有储量2s21级</td><td><input value="<?php echo $this->_tpl_vars['o'][50]; ?>
" name="oreLevelh2s21[]"></td>
							<td id="oreLevelh2s22" class="tdhead">保有储量2s22级</td><td><input value="<?php echo $this->_tpl_vars['o'][51]; ?>
" name="oreLevelh2s22[]"></td>
						</tr>
						<tr>
							<td id="oreLevelh331"class="tdhead">保有储量331级</td><td><input value="<?php echo $this->_tpl_vars['o'][52]; ?>
" name="oreLevelh331[]"></td>
							<td id="oreLevelh332"class="tdhead">保有储量332级</td><td><input value="<?php echo $this->_tpl_vars['o'][53]; ?>
" name="oreLevelh332[]"></td>	  
						</tr>
						<tr>
							<td id="oreLevelh333"class="tdhead">保有储量333级</td><td><input value="<?php echo $this->_tpl_vars['o'][54]; ?>
" name="oreLevelh333[]"></td>
							<td id="oreLevelh334"class="tdhead">保有储量334级</td><td><input value="<?php echo $this->_tpl_vars['o'][55]; ?>
" name="oreLevelh334[]"></td>	  
						</tr>
					</table>
					<tr><td colspan=4 style="border:none"><table align="center" style="display:none;" class="formView" id="oreLevelas<?php echo $this->_tpl_vars['o'][22]; ?>
">
						<tr>
							<td id="oreLevela111" class="tdhead">可采储量111级</td><td><input value="<?php echo $this->_tpl_vars['o'][56]; ?>
" name="oreLevela111[]"></td>
							<td id="oreLevela121122" class="tdhead">可采储量121/122级</td><td><input value="<?php echo $this->_tpl_vars['o'][57]; ?>
" name="oreLevela121122[]"></td>
						</tr>
						<tr>
							<td id="oreLevela111b" class="tdhead">可采储量111b级</td><td><input value="<?php echo $this->_tpl_vars['o'][58]; ?>
" name="oreLevela111b[]"></td>
						</tr>
						<tr>
							<td id="oreLevela121b"class="tdhead">可采储量121b级</td><td><input value="<?php echo $this->_tpl_vars['o'][59]; ?>
" name="oreLevela121b[]"></td>
							<td id="oreLevela122b" class="tdhead">可采储量122b级</td><td><input value="<?php echo $this->_tpl_vars['o'][60]; ?>
" name="oreLevela122b[]"></td>
						</tr>
						<tr>
							<td id="oreLevela2m111" class="tdhead">可采储量2m11级</td><td><input value="<?php echo $this->_tpl_vars['o'][61]; ?>
" name="oreLevela2m111[]"></td>
							<td id="oreLevela2m21" class="tdhead">可采储量2m21级</td><td><input value="<?php echo $this->_tpl_vars['o'][62]; ?>
" name="oreLevela2m21[]"></td>
						</tr>
						<tr>
							<td id="oreLevela2m22" class="tdhead">可采储量2m22级</td><td><input value="<?php echo $this->_tpl_vars['o'][63]; ?>
" name="oreLevela2m22[]"></td>
							<td id="oreLevela2s11" class="tdhead">可采储量2s11级</td><td><input value="<?php echo $this->_tpl_vars['o'][64]; ?>
" name="oreLevela2s11[]"></td>
						</tr>
						<tr>
							<td id="oreLevela2s21" class="tdhead">可采储量2s21级</td><td><input value="<?php echo $this->_tpl_vars['o'][65]; ?>
" name="oreLevela2s21[]"></td>
							<td id="oreLevela2s22" class="tdhead">可采储量2s22级</td><td><input value="<?php echo $this->_tpl_vars['o'][66]; ?>
" name="oreLevela2s22[]"></td>
						</tr>
						<tr>
							<td id="oreLevela331"class="tdhead">可采储量331级</td><td><input value="<?php echo $this->_tpl_vars['o'][67]; ?>
" name="oreLevela331[]"></td>
							<td id="oreLevela332"class="tdhead">可采储量332级</td><td><input value="<?php echo $this->_tpl_vars['o'][68]; ?>
" name="oreLevela332[]"></td>	  
						</tr>
						<tr>
							<td id="oreLevela333"class="tdhead">可采储量333级</td><td><input value="<?php echo $this->_tpl_vars['o'][69]; ?>
" name="oreLevela333[]"></td>
							<td id="oreLevela334"class="tdhead">可采储量334级</td><td><input value="<?php echo $this->_tpl_vars['o'][70]; ?>
" name="oreLevela334[]"></td>	  
						</tr>
					</table></td>
				</tr>

			</tr>
			
		</table>
		
		<?php endforeach; else: ?>

		<tr>
			<td align="center">没有记录
				<input type='button' value='添加矿种' onclick='addminerate();' >
			</td>
		</tr>

		<?php endif; unset($_from); ?>
		<table class="formView" align="center"  width="100%" id="ored">
			</table>
		<tr>
				<td class='tdhead' colspan=4 align=center>
					<input type='button' value='添加矿种' onclick='addminerate();'/>
					<!-- <input type='button' value='删除此矿种' onclick='ramoveminerated(this);'/> -->
				</td>
			</tr>
		</table>
	</table>

	<table class="formView" align="center"  width="100%">
	
	</table>
	<table class="formView" align="center" width='100%'>
		<tr>
			<td class='tdtitle' colspan=4 algin='center' style="background:#CCFFFF">矿山生产经营信息</td>
		</tr>
		<tr>
		<td class="tdhead">矿山开采方式</td><td width="30%"><select  name="basedataDigtype">
					<option value="<?php echo $this->_tpl_vars['basedataArray'][0]->basedataDigtype; ?>
"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataDigtype; ?>
</option>
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
		<td class="tdhead">矿山开采回采率(%)</td><td><input   value="<?php echo $this->_tpl_vars['basedataArray'][0]->basedataDigreturnrate; ?>
" name="basedataDigreturnrate"><input type="button" id="button_basedataDigreturnrate" value="详情"/></td>
		</tr>
	</table>
	<table align="center" style="display:none;" class="formView" id="bef3_pre5_basedataDigreturnrate">
		<tr>
			<td id="t_basedataDigreturnrate_bef3" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-2; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['basedata35Array'][0][0]; ?>
" name="basedataDigreturnrate_bef3"></td>
			<td id="t_basedataDigreturnrate_bef2" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-1; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['basedata35Array'][0][1]; ?>
" name="basedataDigreturnrate_bef2"></td>
		</tr>
		<tr>
			<td id="t_basedataDigreturnrate_bef1" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['basedata35Array'][0][2]; ?>
" name="basedataDigreturnrate_bef1"></td>
		</tr>
		<tr>
			<td id="t_basedataDigreturnrate_pre1"class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['basedata35Array'][0][3]; ?>
" name="basedataDigreturnrate_pre1"></td>
			<td id="t_basedataDigreturnrate_pre1real" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['basedata35Array'][0][4]; ?>
" name="basedataDigreturnrate_pre1real"></td>
		</tr>
		<tr>
			<td id="t_basedataDigreturnrate_pre2"class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['basedata35Array'][0][5]; ?>
" name="basedataDigreturnrate_pre2"></td>
			<td id="t_basedataDigreturnrate_pre2real" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['basedata35Array'][0][6]; ?>
" name="basedataDigreturnrate_pre2real"></td>
		</tr>
		<tr>
			<td id="t_basedataDigreturnrate_pre3" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['basedata35Array'][0][7]; ?>
" name="basedataDigreturnrate_pre3"></td>
			<td id="t_basedataDigreturnrate_pre3real" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['basedata35Array'][0][8]; ?>
" name="basedataDigreturnrate_pre3real"></td>
		</tr>
		<tr>
			<td id="t_basedataDigreturnrate_pre4" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['basedata35Array'][0][9]; ?>
" name="basedataDigreturnrate_pre4"></td>
			<td id="t_basedataDigreturnrate_pre4real" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['basedata35Array'][0][10]; ?>
" name="basedataDigreturnrate_pre4real"></td>
		</tr>
		<tr>
			<td id="t_basedataDigreturnrate_pre5"class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['basedata35Array'][0][11]; ?>
" name="basedataDigreturnrate_pre5"></td>
			<td id="t_basedataDigreturnrate_pre5real"class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['basedata35Array'][0][12]; ?>
" name="basedataDigreturnrate_pre5real"></td>	  
		</tr>
	</table>
	<table class="formView" align="center" width='100%'>
                <tr>
		<td class="tdhead">矿山选矿回收率(%)</td><td width="30%"><input   value="<?php echo $this->_tpl_vars['basedataArray'][0]->basedataSepareturnrate; ?>
" name="basedataSepareturnrate"><input type="button" id="button_basedataSepareturnrate" value="详情"/></td>	
		<td class="tdhead">矿山矿床类型</td><td><input   value="<?php echo $this->_tpl_vars['basedataArray'][0]->basedataMinertype; ?>
" name="basedataMinertype"></td>
		</tr>
	</table>
<table align="center" style="display:none;" class="formView" id="bef3_pre5_basedataSepareturnrate">
		<tr>
			<td id="t_basedataSepareturnrate_bef3"class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-2; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['basedata35Array'][1][0]; ?>
" name="basedataSepareturnrate_bef3"></td>
			<td id="t_basedataSepareturnrate_bef2" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-1; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['basedata35Array'][1][1]; ?>
" name="basedataSepareturnrate_bef2"></td>
		</tr>
		<tr>
			<td id="t_basedataSepareturnrate_bef1" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['basedata35Array'][1][2]; ?>
" name="basedataSepareturnrate_bef1"></td>
		</tr>
		<tr>
			<td id="t_basedataSepareturnrate_pre1" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['basedata35Array'][1][3]; ?>
" name="basedataSepareturnrate_pre1"></td>
			<td id="t_basedataSepareturnrate_pre1real" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['basedata35Array'][1][4]; ?>
" name="basedataSepareturnrate_pre1real"></td>
		</tr>
		<tr>
			<td id="t_basedataSepareturnrate_pre2" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['basedata35Array'][1][5]; ?>
" name="basedataSepareturnrate_pre2"></td>
			<td id="t_basedataSepareturnrate_pre2real"class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['basedata35Array'][1][6]; ?>
" name="basedataSepareturnrate_pre2real"></td>
		</tr>
		<tr>
			<td id="t_basedataSepareturnrate_pre3" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['basedata35Array'][1][7]; ?>
" name="basedataSepareturnrate_pre3"></td>
			<td id="t_basedataSepareturnrate_pre3real" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['basedata35Array'][1][8]; ?>
" name="basedataSepareturnrate_pre3real"></td>
		</tr>
		<tr>
			<td id="t_basedataSepareturnrate_pre4" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['basedata35Array'][1][9]; ?>
" name="basedataSepareturnrate_pre4"></td>
			<td id="t_basedataSepareturnrate_pre4real" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['basedata35Array'][1][10]; ?>
" name="basedataSepareturnrate_pre4real"></td>
		</tr>
		<tr>
			<td id="t_basedataSepareturnrate_pre5" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['basedata35Array'][1][11]; ?>
" name="basedataSepareturnrate_pre5"></td>
			<td id="t_basedataSepareturnrate_pre5real" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['basedata35Array'][1][12]; ?>
" name="basedataSepareturnrate_pre5real"></td>	  
		</tr>
	</table>
	<table class="formView" align="center" width='100%'>
	<tr>
		<td class="tdhead">选矿方法</td>
		<td colspan=5>
			<?php if ($this->_tpl_vars['basedataArray'][0]->basedataSepaCixuan == '1'): ?>
				<input type="checkbox" name="basedataSepaCixuan" value ="1" checked>磁选
			<?php else: ?>
				<input type="checkbox" name="basedataSepaCixuan" value ="1" >磁选
			<?php endif; ?>
			<?php if ($this->_tpl_vars['basedataArray'][0]->basedataSepaZhongxuan == '1'): ?>
				<input type="checkbox" name="basedataSepaZhongxuan" value ="1" checked>重选
			<?php else: ?>
				<input type="checkbox" name="basedataSepaZhongxuan" value ="1" >重选
			<?php endif; ?>
			<?php if ($this->_tpl_vars['basedataArray'][0]->basedataSepaFuxuan == '1'): ?>
				<input type="checkbox" name="basedataSepaFuxuan" value ="1" checked>浮选
			<?php else: ?>
				<input type="checkbox" name="basedataSepaFuxuan" value ="1" >浮选
			<?php endif; ?>
			<?php if ($this->_tpl_vars['basedataArray'][0]->basedataSepaDianxuan == '1'): ?>
				<input type="checkbox" name="basedataSepaDianxuan" value ="1" checked>电选
			<?php else: ?>
				<input type="checkbox" name="basedataSepaDianxuan" value ="1" >电选
			<?php endif; ?>
				<input type="checkbox">其他
				<input type="text" value="<?php echo $this->_tpl_vars['basedataArray'][0]->basedataSepa; ?>
" name="basedataSepa" >
		</td>
		</tr>
	</table>
	<table class="formView" align="center" width='100%'>
		
		<tr>
			<td class="tdhead">实际生产规模</td><td width="30%"><input value="<?php echo $this->_tpl_vars['basedataArray'][0]->basedataProduceScale; ?>
" name="basedataProduceScale"><input type="button" id="button_basedataProduceScale" value="详情"/></td>
			<td class="tdhead">产品方案</td><td width="30%"><input value="<?php echo $this->_tpl_vars['basedataArray'][0]->basedataOrgan; ?>
" name="basedataOrgan"></td>
		</tr>
	</table>
	<table align="center" style="display:none;" class="formView" id="bef3_pre5_basedataProduceScale">
		<tr>
			<td id="t_basedataProduceScale_bef3" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-2; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['basedata35Array'][2][0]; ?>
" name="basedataProduceScale_bef3"></td>
			<td id="t_basedataProduceScale_bef2" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-1; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['basedata35Array'][2][1]; ?>
" name="basedataProduceScale_bef2"></td>
		</tr>
		<tr>
			<td id="t_basedataProduceScale_bef1" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['basedata35Array'][2][2]; ?>
" name="basedataProduceScale_bef1"></td>
		</tr>
		<tr>
			<td id="t_basedataProduceScale_pre1" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['basedata35Array'][2][3]; ?>
" name="basedataProduceScale_pre1"></td>
			<td id="t_basedataProduceScale_pre1real" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['basedata35Array'][2][4]; ?>
" name="basedataProduceScale_pre1real"></td>
		</tr>
		<tr>
			<td id="t_basedataProduceScale_pre2" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['basedata35Array'][2][5]; ?>
" name="basedataProduceScale_pre2"></td>
			<td id="t_basedataProduceScale_pre2real" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['basedata35Array'][2][6]; ?>
" name="basedataProduceScale_pre2real"></td>
		</tr>
		<tr>
			<td id="t_basedataProduceScale_pre3" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['basedata35Array'][2][7]; ?>
" name="basedataProduceScale_pre3"></td>
			<td id="t_basedataProduceScale_pre3real" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['basedata35Array'][2][8]; ?>
" name="basedataProduceScale_pre3real"></td>
		</tr>
		<tr>
			<td id="t_basedataProduceScale_pre4" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['basedata35Array'][2][9]; ?>
" name="basedataProduceScale_pre4"></td>
			<td id="t_basedataProduceScale_pre4real" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['basedata35Array'][2][10]; ?>
" name="basedataProduceScale_pre4real"></td>
		</tr>
		<tr>
			<td id="t_basedataProduceScale_pre5" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['basedata35Array'][2][11]; ?>
" name="basedataProduceScale_pre5"></td>
			<td id="t_basedataProduceScale_pre5real" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['basedata35Array'][2][12]; ?>
" name="basedataProduceScale_pre5real"></td>	  
		</tr>
	</table>

	<table class="formView" align="center"  width="100%">
		<tr>
			<td class="tdhead">原矿石品位</td><td colspan=3><input type="text" name="basedataYuanHua" value="<?php echo $this->_tpl_vars['basedataArray'][0]->basedataYuanHua; ?>
"></td>
			<td class="tdhead">贫化率</td><td colspan=3><input type="text" name="basedataWeiHua" value="<?php echo $this->_tpl_vars['basedataArray'][0]->basedataWeiHua; ?>
"></td>
		</tr>
	</table>

	<!-- <tr>
			<td class="tdhead>">相关附件</td>
			<td>
				<div id="content">   	
					<table class="listView" align="center" width="100%">
						<thead>
						<tr>
							<th>文件名</th>
							<th>所属矿山</th>
							<th>文件类型</th>
							<th colspan=2 width="8%">操作</th>
						</tr>
						</thead>
					<?php $_from = $this->_tpl_vars['MArray']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['data']):
?>
					<?php if ($this->_tpl_vars['data'][2] == '1'): ?>
						<tr>
							<td><?php if ($this->_tpl_vars['data'][5] == "image/pjpeg"): ?><img src="http://localhost/uploadDir/<?php echo $this->_tpl_vars['data'][1]; ?>
/<?php echo $this->_tpl_vars['data'][0]; ?>
" width="20%"><?php endif; ?><?php echo $this->_tpl_vars['data'][0]; ?>
</td>
							<td><?php echo $this->_tpl_vars['data'][1]; ?>
</td>
							<td><?php echo $this->_tpl_vars['data'][5]; ?>
</td>
							<?php if ($this->_tpl_vars['QuanXian'] != 1): ?><td><a href="/minedata/DownloadFile/<?php echo $this->_tpl_vars['data'][3]; ?>
">下载</a></td>
							<td><a href="/minedata/DeleteFile/<?php echo $this->_tpl_vars['data'][3]; ?>
">删除</a></td><?php endif; ?>
						 </tr>           	
					<?php endif; ?>
					<?php endforeach; endif; unset($_from); ?>
					</table> 
				</div>
			</td>
		</tr> -->

   </div>

	
	<div id="tabs-2"><!--依法办矿-->
		<table class="listView" width="100%">
		<tr>
				<td class="tdtitle" colspan=6>相关证照<input type="button" id="button_zhengzhao" value="详情"/><input type="button" id="button_zhengzhao1" value="隐藏"/></td>
		</tr>
	</table>
		<script  type="text/javascript">
						$('#button_zhengzhao').click(function() <?php echo ' { '; ?>

							$('#legal').toggle();
						<?php echo ' } '; ?>
);
		</script>
		<script  type="text/javascript">
						$('#button_zhengzhao1').click(function() <?php echo ' { '; ?>

							$('#legal').toggle();
						<?php echo ' } '; ?>
);
		</script>
		<table id="legal" class="listView" width="100%">
			
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
				<td><input type="text"  value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legal6Num; ?>
" name="legal6Num" ></td>
				<?php if ($this->_tpl_vars['legaldataArray'][0]->legal6Ischeck == '1'): ?>
				<td>		
					<input type="radio"  name="legal6Ischeck"  value="1" checked >是
					<input type="radio"  name="legal6Ischeck"  value="0" >否
				</td>
				
				<?php else: ?>
				<td>		
					<input type="radio" name="legal6Ischeck"  value="1" >是
					<input type="radio" name="legal6Ischeck"  value="0" checked >否
				</td>
				<?php endif; ?>
				<td><input type="text"  value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legal6Deadline; ?>
" id ="legal6Deadline" class="datepicker" name="legal6Deadline" ></td>
				<td><input type="text"  value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legal6Deadlinend; ?>
" id="legal6Deadlinend" name="legal6Deadlinend" class="datepicker" onchange="loadchecktime(this)"></td>
				<td><textarea cols="30" rows="2"  id ="legal6Comm" name="legal6Comm"><?php echo $this->_tpl_vars['legaldataArray'][0]->legal6Comm; ?>
</textarea></td>
			</tr>
			<tr>
				<td>《采矿许可证》</td>
				<td><input type="text"  value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legal1Num; ?>
" name="legal1Num" ></td>
				<?php if ($this->_tpl_vars['legaldataArray'][0]->legal1Ischeck == '1'): ?>
				<td>		
					<input type="radio" name="legal1Ischeck"  value="1" checked >是
					<input type="radio" name="legal1Ischeck"  value="0" >否
				</td>
				<?php else: ?>
				<td>		
					<input type="radio" name="legal1Ischeck"  value="1" >是
					<input type="radio" name="legal1Ischeck"  value="0" checked >否
				</td>
				<?php endif; ?>
				<td><input type="text"  value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legal1Deadline; ?>
" class="datepicker" id="legal1Deadline" name="legal1Deadline" ></td>
				<td><input type="text"  value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legal1Deadlinend; ?>
" class="datepicker" id="legal1Deadlinend" name="legal1Deadlinend" onchange="loadchecktime(this)"></td>
				<td><textarea cols="30" rows="2"  id="legal1Comm" name="legal1Comm"><?php echo $this->_tpl_vars['legaldataArray'][0]->legal1Comm; ?>
</textarea></td>
			</tr>
			<tr>
				<td>《矿山生产许可证》</td>
				<td><input type="text"  value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legal2Num; ?>
" name="legal2Num" ></td>
				<?php if ($this->_tpl_vars['legaldataArray'][0]->legal2Ischeck == '1'): ?>
				<td>		
					<input type="radio" name="legal2Ischeck"  value="1" checked >是
					<input type="radio" name="legal2Ischeck"  value="0" >否
				</td>
				<?php else: ?>
				<td>		
					<input type="radio" name="legal2Ischeck"  value="1" >是
					<input type="radio" name="legal2Ischeck"  value="0" checked >否
				</td>
				<?php endif; ?>
				<td><input type="text"  value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legal2Deadline; ?>
" class="datepicker" id="legal2Deadline" name="legal2Deadline" ></td>
				<td><input type="text"  value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legal2Deadlinend; ?>
" class="datepicker" id="legal2Deadlinend" name="legal2Deadlinend" onchange="loadchecktime(this)"></td>
				<td><textarea cols="30" rows="2"  id="legal2Comm" name="legal2Comm"><?php echo $this->_tpl_vars['legaldataArray'][0]->legal2Comm; ?>
</textarea></td>
			</tr>
			<tr>
				<td>《矿山安全生产许可证》</td>
				<td><input type="text"  value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legal3Num; ?>
" name="legal3Num" ></td>
				<?php if ($this->_tpl_vars['legaldataArray'][0]->legal3Ischeck == '1'): ?>
				<td>		
					<input type="radio" name="legal3Ischeck"  value="1" checked >是
					<input type="radio" name="legal3Ischeck"  value="0" >否
				</td>
				<?php else: ?>
				<td>		
					<input type="radio" name="legal3Ischeck"  value="1" >是
					<input type="radio" name="legal3Ischeck"  value="0" checked >否
				</td>
				<?php endif; ?>
				<td><input type="text"  value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legal3Deadline; ?>
" class="datepicker" id="legal3Deadline" name="legal3Deadline" ></td>
				<td><input type="text"  value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legal3Deadlinend; ?>
" class="datepicker" id="legal3Deadlinend" name="legal3Deadlinend" onchange="loadchecktime(this)"></td>
				<td><textarea cols="30" rows="2"  id="legal3Comm" name="legal3Comm"><?php echo $this->_tpl_vars['legaldataArray'][0]->legal3Comm; ?>
</textarea></td>
			</tr>
			<tr>
				<td>《矿长安全生产许可证》</td>
				<td><input type="text"  value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legal4Num; ?>
" name="legal4Num" ></td>
				<?php if ($this->_tpl_vars['legaldataArray'][0]->legal4Ischeck == '1'): ?>
				<td>		
					<input type="radio" name="legal4Ischeck"  value="1" checked >是
					<input type="radio" name="legal4Ischeck"  value="0" >否
				</td>
				<?php else: ?>
				<td>		
					<input type="radio" name="legal4Ischeck"  value="1" >是
					<input type="radio" name="legal4Ischeck"  value="0" checked >否
				</td>
				<?php endif; ?>
				<td><input type="text"  value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legal4Deadline; ?>
" class="datepicker" id="legal4Deadline" name="legal4Deadline" ></td>
				<td><input type="text"  value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legal4Deadlinend; ?>
" class="datepicker" id = "legal4Deadlinend" name="legal4Deadlinend" onchange="loadchecktime(this)" ></td>
				<td><textarea cols="30" rows="2"  id="legal4Comm" name="legal4Comm"><?php echo $this->_tpl_vars['legaldataArray'][0]->legal4Comm; ?>
</textarea></td>
			</tr>		
			<tr>
				<td>《矿长资格证》</td>
				<td><input type="text"  value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legal5Num; ?>
" name="legal5Num" ></td>
				<?php if ($this->_tpl_vars['legaldataArray'][0]->legal5Ischeck == '1'): ?>
				<td>		
					<input type="radio" name="legal5Ischeck"  value="1" checked >是
					<input type="radio" name="legal5Ischeck"  value="0" >否
				</td>
				<?php else: ?>
				<td>		
					<input type="radio" name="legal5Ischeck"  value="1" >是
					<input type="radio" name="legal5Ischeck"  value="0" checked >否
				</td>
				<?php endif; ?>
				<td><input type="text"  value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legal5Deadline; ?>
" class="datepicker" id="legal5Deadline" name="legal5Deadline" ></td>
				<td><input type="text"  value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legal5Deadlinend; ?>
" class="datepicker" id = "legal5Deadlinend" name="legal5Deadlinend" onchange="loadchecktime(this)"></td>
				<td><textarea cols="30" rows="2"  id="legal5Comm" name="legal5Comm"><?php echo $this->_tpl_vars['legaldataArray'][0]->legal5Comm; ?>
</textarea></td>
			</tr>				
			<tr>
				<td>《民用爆炸物品使用许可证》</td>
				<td><input type="text"  value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legal7Num; ?>
" name="legal7Num" ></td>
				<?php if ($this->_tpl_vars['legaldataArray'][0]->legal7Ischeck == '1'): ?>
				<td>		
					<input type="radio" name="legal7Ischeck"  value="1" checked >是
					<input type="radio" name="legal7Ischeck"  value="0" >否
				</td>
				<?php else: ?>
				<td>		
					<input type="radio" name="legal7Ischeck"  value="1" >是
					<input type="radio" name="legal7Ischeck"  value="0" checked>否
				</td>
				<?php endif; ?>
				<td><input type="text"  value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legal7Deadline; ?>
" class="datepicker" id="legal7Deadline" name="legal7Deadline" ></td>
				<td><input type="text"  value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legal7Deadlinend; ?>
" class="datepicker" id = "legal7Deadlinend" name="legal7Deadlinend" onchange="loadchecktime(this)" ></td>
				<td><textarea cols="30" rows="2"  id="legal7Comm" name="legal7Comm"><?php echo $this->_tpl_vars['legaldataArray'][0]->legal7Comm; ?>
</textarea></td>
			</tr>		
			<tr>
				<td>《爆破物品存储证》</td>
				<td><input type="text"  value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legal8Num; ?>
" name="legal8Num" ></td>
				<?php if ($this->_tpl_vars['legaldataArray'][0]->legal8Ischeck == '1'): ?>
				<td>		
					<input type="radio" name="legal8Ischeck"  value="1" checked >是
					<input type="radio" name="legal8Ischeck"  value="0" >否
				</td>
				<?php else: ?>
				<td>		
					<input type="radio" name="legal8Ischeck"  value="1" >是
					<input type="radio" name="legal8Ischeck"  value="0" checked >否
				</td>
				<?php endif; ?>
				<td><input type="text"  value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legal8Deadline; ?>
" class="datepicker" id="legal8Deadline" name="legal8Deadline" ></td>
				<td><input type="text"  value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legal8Deadlinend; ?>
" class="datepicker" id ="legal8Deadlinend" name="legal8Deadlinend" onchange="loadchecktime(this)"></td>
				<td><textarea cols="30" rows="2"  id="legal8Comm" name="legal8Comm"><?php echo $this->_tpl_vars['legaldataArray'][0]->legal8Comm; ?>
</textarea></td>
			</tr>
			<tr>
				<td>《爆破人员安全资格证》</td>
				<td><input type="text"  value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legal10Num; ?>
" name="legal10Num" ></td>
				<?php if ($this->_tpl_vars['legaldataArray'][0]->legal10Ischeck == '1'): ?>
				<td>		
					<input type="radio" name="legal10Ischeck"  value="1" checked >是
					<input type="radio" name="legal10Ischeck"  value="0" >否
				</td>
				<?php else: ?>
				<td>		
					<input type="radio" name="legal10Ischeck"  value="1" >是
					<input type="radio" name="legal10Ischeck"  value="0" checked >否
				</td>
				<?php endif; ?>
				<td><input type="text"  value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legal10Deadline; ?>
" class="datepicker" id="legal10Deadline" name="legal10Deadline" ></td>
				<td><input type="text"  value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legal10Deadlinend; ?>
" class="datepicker" id="legal10Deadlinend" name="legal10Deadlinend" onchange="loadchecktime(this)" ></td>
				<td><textarea cols="30" rows="2"  id="legal10Comm" name="legal10Comm"><?php echo $this->_tpl_vars['legaldataArray'][0]->legal10Comm; ?>
</textarea></td>
			</tr>
			<tr>
				<td>《排污许可证》</td>
				<td><input type="text"  value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legal11Num; ?>
" name="legal11Num" ></td>
				<?php if ($this->_tpl_vars['legaldataArray'][0]->legal11Ischeck == '1'): ?>
				<td>		
					<input type="radio" name="legal11Ischeck"  value="1" checked >是
					<input type="radio" name="legal11Ischeck"  value="0" >否
				</td>
				<?php else: ?>
				<td>		
					<input type="radio" name="legal11Ischeck"  value="1" >是
					<input type="radio" name="legal11Ischeck"  value="0" checked >否
				</td>
				<?php endif; ?>
				<td><input type="text"  value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legal11Deadline; ?>
" class="datepicker" id="legal11Deadline" name="legal11Deadline" ></td>
				<td><input type="text"  value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legal11Deadlinend; ?>
" class="datepicker" id="legal11Deadlinend" name="legal11Deadlinend" onchange="loadchecktime(this)"></td>
				<td><textarea cols="30" rows="2"  id="legal11Comm" name="legal11Comm"><?php echo $this->_tpl_vars['legaldataArray'][0]->legal11Comm; ?>
</textarea></td>
			</tr>
			<tr>
				<td>《取水许可证》</td>
				<td><input type="text"  value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legal12Num; ?>
" name="legal12Num" ></td>
				<?php if ($this->_tpl_vars['legaldataArray'][0]->legal12Ischeck == '1'): ?>
				<td>		
					<input type="radio" name="legal12Ischeck"  value="1" checked >是
					<input type="radio" name="legal12Ischeck"  value="0" >否
				</td>
				<?php else: ?>
				<td>		
					<input type="radio" name="legal12Ischeck"  value="1" >是
					<input type="radio" name="legal12Ischeck"  value="0" checked >否
				</td>
				<?php endif; ?>
				<td><input type="text"  value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legal12Deadline; ?>
" class="datepicker" id="legal12Deadline" name="legal12Deadline" ></td>
				<td><input type="text"  value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legal12Deadlinend; ?>
" class="datepicker" id="legal12Deadlinend" name="legal12Deadlinend" onchange="loadchecktime(this)"></td>
				<td><textarea cols="30" rows="2"  id="legal12Comm" name="legal12Comm"><?php echo $this->_tpl_vars['legaldataArray'][0]->legal12Comm; ?>
</textarea></td>
			</tr>
			<tr>
				<td>《税务登记证》</td>
				<td><input type="text"  value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legal13Num; ?>
" name="legal13Num" ></td>
				<?php if ($this->_tpl_vars['legaldataArray'][0]->legal13Ischeck == '1'): ?>
				<td>		
					<input type="radio" name="legal13Ischeck"  value="1" checked >是
					<input type="radio" name="legal13Ischeck"  value="0" >否
				</td>
				<?php else: ?>
				<td>		
					<input type="radio" name="legal13Ischeck"  value="1" >是
					<input type="radio" name="legal13Ischeck"  value="0" checked >否
				</td>
				<?php endif; ?>
				<td><input type="text"  value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legal13Deadline; ?>
" class="datepicker" id ="legal13Deadline" name="legal13Deadline" ></td>
				<td><input type="text"  value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legal13Deadlinend; ?>
" class="datepicker" id="legal13Deadlinend" name="legal13Deadlinend" onchange="loadchecktime(this)"></td>
				<td><textarea cols="30" rows="2"  id="legal13Comm" name="legal13Comm"><?php echo $this->_tpl_vars['legaldataArray'][0]->legal13Comm; ?>
</textarea></td>
			</tr>
			<tr>
				<td>《组织机构代码证》</td>
				<td><input type="text"  value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legal14Num; ?>
" name="legal14Num" ></td>
				<?php if ($this->_tpl_vars['legaldataArray'][0]->legal14Ischeck == '1'): ?>
				<td>		
					<input type="radio" name="legal14Ischeck"  value="1" checked >是
					<input type="radio" name="legal14Ischeck"  value="0" >否
				</td>
				<?php else: ?>
				<td>		
					<input type="radio" name="legal14Ischeck"  value="1" >是
					<input type="radio" name="legal14Ischeck"  value="0" checked >否
				</td>
				<?php endif; ?>
				<td><input type="text"  value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legal14Deadline; ?>
" class="datepicker"  id = "legal14Deadline" name="legal14Deadline" ></td>
				<td><input type="text"  value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legal14Deadlinend; ?>
" class="datepicker" id="legal14Deadlinend" name="legal14Deadlinend" onchange="loadchecktime(this)"></td>
				<td><textarea cols="30" rows="2"  id="legal14Comm" name="legal14Comm"><?php echo $this->_tpl_vars['legaldataArray'][0]->legal14Comm; ?>
</textarea></td>
			</tr>
			<tr>
				<td>《土地使用权证》</td>
				<td><input type="text"  value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legal15Num; ?>
" name="legal15Num" ></td>
				<?php if ($this->_tpl_vars['legaldataArray'][0]->legal15Ischeck == '1'): ?>
				<td>		
					<input type="radio" name="legal15Ischeck"  value="1" checked >是
					<input type="radio" name="legal15Ischeck"  value="0" >否
				</td>
				<?php else: ?>
				<td>		
					<input type="radio" name="legal15Ischeck"  value="1" >是
					<input type="radio" name="legal15Ischeck"  value="0" checked >否
				</td>
				<?php endif; ?>
				<td><input type="text"  value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legal15Deadline; ?>
" class="datepicker" id="legal15Deadline" name="legal15Deadline" ></td>
				<td><input type="text"  value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legal15Deadlinend; ?>
" class="datepicker" id="legal15Deadlinend" name="legal15Deadlinend" onchange="loadchecktime(this)"></td>
				<td><textarea cols="30" rows="2"  id="legal15Comm" name="legal15Comm"><?php echo $this->_tpl_vars['legaldataArray'][0]->legal15Comm; ?>
</textarea></td>
			</tr>
			<tr>
				<td>《黄金生产批准书》</td>
				<td><input type="text"  value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legal16Num; ?>
" name="legal16Num" ></td>
				<?php if ($this->_tpl_vars['legaldataArray'][0]->legal16Ischeck == '1'): ?>
				<td>
					<input type="radio" name="legal16Ischeck"  value="1" checked >是
					<input type="radio" name="legal16Ischeck"  value="0" >否
				</td>
				<?php else: ?>
				<td>
					<input type="radio" name="legal16Ischeck"  value="1" >是
					<input type="radio" name="legal16Ischeck"  value="0" checked>否
				</td>
				<?php endif; ?>
				<td><input type="text" value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legal16Deadline; ?>
" id="legal16Deadline" name="legal16Deadline" class="datepicker"></td>
				<td><input type="text" value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legal16Deadlinend; ?>
" id="legal16Deadlinend" name="legal16Deadlinend" class="datepicker"onchange="loadchecktime(this)"></td>
				<td><textarea cols="30" rows="2"  id="legal16Comm" name="legal16Comm"><?php echo $this->_tpl_vars['legaldataArray'][0]->legal16Comm; ?>
</textarea></td>
			</tr>
		</table>
		<table class="formView" width="100%">
			<tr>
				<td class="tdtitle" colspan=4>相关批复</td>
			</tr>
			<tr>
				<td class="tdtitle" colspan=4>《安全评价报告》批复
			<?php if ($this->_tpl_vars['legaldataArray'][0]->legalSafeIshave == '1'): ?>	
					<input type="radio" name="legalSafeIshave"  value="1" checked onclick="document.getElementById('legalSafeName').removeAttribute('disabled');document.getElementById('legalSafeNum').removeAttribute('disabled');document.getElementById('legalSafeOrgan').removeAttribute('disabled');document.getElementById('legalSafeTime').removeAttribute('disabled');document.getElementById('legalSafeDeadline').removeAttribute('disabled');document.getElementById('legalSafeDeadlinend').removeAttribute('disabled');">有
					<input type="radio" name="legalSafeIshave"  value="0" onclick="document.getElementById('legalSafeName').disabled='disabled';document.getElementById('legalSafeNum').disabled='disabled';document.getElementById('legalSafeOrgan').disabled='disabled';document.getElementById('legalSafeTime').disabled='disabled';document.getElementById('legalSafeDeadline').disabled='disabled';document.getElementById('legalSafeDeadlinend').disabled='disabled';">无
						</td>
			</tr>
			<tr>
				<td class="tdhead">文件名</td><td><input type="text" value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalSafeName; ?>
" id="legalSafeName" name="legalSafeName"></td>
				<td class="tdhead">批复号</td><td><input type="text" value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalSafeNum; ?>
" id="legalSafeNum" name="legalSafeNum"></td>
			</tr>
			<tr>
				<td class="tdhead">批复单位</td><td><input type="text" value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalSafeOrgan; ?>
" id="legalSafeOrgan" name="legalSafeOrgan"></td>
				<td class="tdhead">批复时间</td><td><input type="text" class="datepicker" value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalSafeTime; ?>
" id="legalSafeTime" name="legalSafeTime"></td>
			</tr>
			<tr>
				<td class="tdhead">有效期起始</td><td><input type="text" class="datepicker" value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalSafeDeadline; ?>
" id="legalSafeDeadline" name="legalSafeDeadline"></td>
				<td class="tdhead">有效期至</td><td><input type="text" id="legalSafeDeadlinend" class="datepicker" onchange= "loadchecktime(this)" value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalSafeDeadlinend; ?>
" name="legalSafeDeadlinend"></td>
			</tr>
					<?php else: ?>	
					<input type="radio" name="legalSafeIshave"  value="1" onclick="document.getElementById('legalSafeName').removeAttribute('disabled');document.getElementById('legalSafeNum').removeAttribute('disabled');document.getElementById('legalSafeOrgan').removeAttribute('disabled');document.getElementById('legalSafeTime').removeAttribute('disabled');document.getElementById('legalSafeDeadline').removeAttribute('disabled');document.getElementById('legalSafeDeadlinend').removeAttribute('disabled');">有
					<input type="radio" name="legalSafeIshave"  value="0" checked onclick="document.getElementById('legalSafeName').disabled='disabled';document.getElementById('legalSafeNum').disabled='disabled';document.getElementById('legalSafeOrgan').disabled='disabled';document.getElementById('legalSafeTime').disabled='disabled';document.getElementById('legalSafeDeadline').disabled='disabled';document.getElementById('legalSafeDeadlinend').disabled='disabled';">无
						</td>
			</tr>
			<tr>
				<td class="tdhead">文件名</td><td><input type="text" value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalSafeName; ?>
" id="legalSafeName" name="legalSafeName" disabled="disabled"></td>
				<td class="tdhead">批复号</td><td><input type="text" value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalSafeNum; ?>
" id="legalSafeNum" name="legalSafeNum" disabled="disabled"></td>
			</tr>
			<tr>
				<td class="tdhead">批复单位</td><td><input type="text" value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalSafeOrgan; ?>
" id="legalSafeOrgan" name="legalSafeOrgan"disabled="disabled"></td>
				<td class="tdhead">批复时间</td><td><input type="text" class="datepicker" value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalSafeTime; ?>
" id="legalSafeTime" name="legalSafeTime" disabled="disabled"></td>
			</tr>
			<tr>
				<td class="tdhead">有效期起始</td><td><input type="text" class="datepicker" value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalSafeDeadline; ?>
" id="legalSafeDeadline" name="legalSafeDeadline" disabled="disabled"></td>
				<td class="tdhead">有效期至</td><td><input type="text" id="legalSafeDeadlinend" class="datepicker" onchange= "loadchecktime(this)" value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalSafeDeadlinend; ?>
" name="legalSafeDeadlinend" disabled="disabled"></td>
			</tr>
			<?php endif; ?>	
			<tr>
				<td class="tdtitle" colspan=4>《水土保持方案》批复
					<?php if ($this->_tpl_vars['legaldataArray'][0]->legalWaterIshave == '1'): ?>		
					<input type="radio" name="legalWaterIshave"  value="1" checked onclick="document.getElementById('legalWaterName').removeAttribute('disabled');document.getElementById('legalWaterNum').removeAttribute('disabled');document.getElementById('legalWaterOrgan').removeAttribute('disabled');document.getElementById('legalWaterTime').removeAttribute('disabled');document.getElementById('legalWaterDeadline').removeAttribute('disabled');document.getElementById('legalWaterDeadlinend').removeAttribute('disabled');">有
					<input type="radio" name="legalWaterIshave"  value="0" onclick="document.getElementById('legalWaterName').disabled='disabled';document.getElementById('legalWaterNum').disabled='disabled';document.getElementById('legalWaterOrgan').disabled='disabled';document.getElementById('legalWaterTime').disabled='disabled';document.getElementById('legalWaterDeadline').disabled='disabled';document.getElementById('legalWaterDeadlinend').disabled='disabled';">无
					</td>
			</tr>
			<tr>
				<td class="tdhead">文件名</td><td><input type="text" value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalWaterName; ?>
" id="legalWaterName" name="legalWaterName"></td>
				<td class="tdhead">批复号</td><td><input type="text" value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalWaterNum; ?>
" id="legalWaterNum" name="legalWaterNum"></td>
			</tr>
			<tr>
				<td class="tdhead">批复单位</td><td><input type="text" value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalWaterOrgan; ?>
" id="legalWaterOrgan" name="legalWaterOrgan"></td>
				<td class="tdhead">批复时间</td><td><input type="text" class="datepicker" value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalWaterTime; ?>
" id="legalWaterTime" name="legalWaterTime"></td>
			</tr>
			<tr>
				<td class="tdhead">有效期起始</td><td><input type="text" class="datepicker" value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalWaterDeadline; ?>
" id="legalWaterDeadline" name="legalWaterDeadline"></td>
				<td class="tdhead">有效期至</td><td><input type="text" id="legalWaterDeadlinend" class="datepicker" onchange= "loadchecktime(this)" value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalWaterDeadlinend; ?>
" name="legalWaterDeadlinend"></td>
			</tr>
					<?php else: ?>		
					<input type="radio" name="legalWaterIshave"  value="1" onclick="document.getElementById('legalWaterName').removeAttribute('disabled');document.getElementById('legalWaterNum').removeAttribute('disabled');document.getElementById('legalWaterOrgan').removeAttribute('disabled');document.getElementById('legalWaterTime').removeAttribute('disabled');document.getElementById('legalWaterDeadline').removeAttribute('disabled');document.getElementById('legalWaterDeadlinend').removeAttribute('disabled');">有
					<input type="radio" name="legalWaterIshave"  value="0" checked onclick="document.getElementById('legalWaterName').disabled='disabled';document.getElementById('legalWaterNum').disabled='disabled';document.getElementById('legalWaterOrgan').disabled='disabled';document.getElementById('legalWaterTime').disabled='disabled';document.getElementById('legalWaterDeadline').disabled='disabled';document.getElementById('legalWaterDeadlinend').disabled='disabled';">无
					</td>
			</tr>
			<tr>
				<td class="tdhead">文件名</td><td><input type="text" value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalWaterName; ?>
" id="legalWaterName" name="legalWaterName"disabled="disabled"></td>
				<td class="tdhead">批复号</td><td><input type="text" value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalWaterNum; ?>
" id="legalWaterNum" name="legalWaterNum" disabled="disabled"></td>
			</tr>
			<tr>
				<td class="tdhead">批复单位</td><td><input type="text" value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalWaterOrgan; ?>
" id="legalWaterOrgan" name="legalWaterOrgan" disabled="disabled"></td>
				<td class="tdhead">批复时间</td><td><input type="text" class="datepicker" value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalWaterTime; ?>
" id="legalWaterTime" name="legalWaterTime" disabled="disabled"></td>
			</tr>
			<tr>
				<td class="tdhead">有效期起始</td><td><input type="text" class="datepicker" value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalWaterDeadline; ?>
" id="legalWaterDeadline" name="legalWaterDeadline" disabled="disabled"></td>
				<td class="tdhead">有效期至</td><td><input type="text" id="legalWaterDeadlinend" class="datepicker" onchange= "loadchecktime(this)" value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalWaterDeadlinend; ?>
" name="legalWaterDeadlinend" disabled="disabled"></td>
			</tr>
			<?php endif; ?>			
			<tr>
				<td class="tdtitle" colspan=4>《土地复垦方案》批复
				<?php if ($this->_tpl_vars['legaldataArray'][0]->legalLandIshave == '1'): ?>		
					<input type="radio" name="legalLandIshave"  value="1" checked onclick="document.getElementById('legalLandName').removeAttribute('disabled');document.getElementById('legalLandNum').removeAttribute('disabled');document.getElementById('legalLandOrgan').removeAttribute('disabled');document.getElementById('legalLandTime').removeAttribute('disabled');document.getElementById('legalLandDeadline').removeAttribute('disabled');document.getElementById('legalLandDeadlinend').removeAttribute('disabled');">有
					<input type="radio" name="legalLandIshave"  value="0" onclick="document.getElementById('legalLandName').disabled='disabled';document.getElementById('legalLandNum').disabled='disabled';document.getElementById('legalLandOrgan').disabled='disabled';document.getElementById('legalLandTime').disabled='disabled';document.getElementById('legalLandDeadline').disabled='disabled';document.getElementById('legalLandDeadlinend').disabled='disabled';">无
					</td>
			</tr>
			<tr>
				<td class="tdhead">文件名</td><td><input type="text" value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalLandName; ?>
" id="legalLandName" name="legalLandName"></td>
				<td class="tdhead">批复号</td><td><input type="text" value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalLandNum; ?>
" id="legalLandNum" name="legalLandNum"></td>
			</tr>
			<tr>
				<td class="tdhead">批复单位</td><td><input type="text" value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalLandOrgan; ?>
" id="legalLandOrgan" name="legalLandOrgan"></td>
				<td class="tdhead">批复时间</td><td><input type="text" class="datepicker" value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalLandTime; ?>
" id="legalLandTime" name="legalLandTime"></td>
			</tr>
			<tr>
				<td class="tdhead">有效期起始</td><td><input type="text" class="datepicker" value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalLandDeadline; ?>
" id="legalLandDeadline" name="legalLandDeadline"></td>
				<td class="tdhead">有效期至</td><td><input type="text" id="legalLandDeadlinend" class="datepicker" onchange= "loadchecktime(this)" value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalLandDeadlinend; ?>
" name="legalLandDeadlinend"></td>
			</tr>
				<?php else: ?>
					<input type="radio" name="legalLandIshave"  value="1" onclick="document.getElementById('legalLandName').removeAttribute('disabled');document.getElementById('legalLandNum').removeAttribute('disabled');document.getElementById('legalLandOrgan').removeAttribute('disabled');document.getElementById('legalLandTime').removeAttribute('disabled');document.getElementById('legalLandDeadline').removeAttribute('disabled');document.getElementById('legalLandDeadlinend').removeAttribute('disabled');">有
					<input type="radio" name="legalLandIshave"  value="0" checked onclick="document.getElementById('legalLandName').disabled='disabled';document.getElementById('legalLandNum').disabled='disabled';document.getElementById('legalLandOrgan').disabled='disabled';document.getElementById('legalLandTime').disabled='disabled';document.getElementById('legalLandDeadline').disabled='disabled';document.getElementById('legalLandDeadlinend').disabled='disabled';">无
					</td>
			</tr>
			<tr>
				<td class="tdhead">文件名</td><td><input type="text" value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalLandName; ?>
" id="legalLandName" name="legalLandName" disabled="disabled"></td>
				<td class="tdhead">批复号</td><td><input type="text" value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalLandNum; ?>
" id="legalLandNum" name="legalLandNum" disabled="disabled"></td>
			</tr>
			<tr>
				<td class="tdhead">批复单位</td><td><input type="text" value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalLandOrgan; ?>
" id="legalLandOrgan" name="legalLandOrgan"disabled="disabled"></td>
				<td class="tdhead">批复时间</td><td><input type="text" class="datepicker" value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalLandTime; ?>
" id="legalLandTime" name="legalLandTime" disabled="disabled"></td>
			</tr>
			<tr>
				<td class="tdhead">有效期起始</td><td><input type="text" class="datepicker" value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalLandDeadline; ?>
" id="legalLandDeadline" name="legalLandDeadline" disabled="disabled"></td>
				<td class="tdhead">有效期至</td><td><input type="text" id="legalLandDeadlinend" class="datepicker" onchange= "loadchecktime(this)" value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalLandDeadlinend; ?>
" name="legalLandDeadlinend" disabled="disabled"></td>
			</tr>
				<?php endif; ?>
			<tr>
				<td class="tdtitle" colspan=4>《环境影响评价报告》批复
				<?php if ($this->_tpl_vars['legaldataArray'][0]->legalHuanjingpifu == '1'): ?>	
					<input type="radio" name="legalHuanjingpifu" value="1" checked onclick="document.getElementById('legalHuanjingpifuName').removeAttribute('disabled');document.getElementById('legalHuanjingpifuNum').removeAttribute('disabled');document.getElementById('legalHuanjingpifuOrgan').removeAttribute('disabled');document.getElementById('legalHuanjingpifuTime').removeAttribute('disabled');document.getElementById('legalHuanjingpifuDeadline').removeAttribute('disabled');document.getElementById('legalHuanjingpifuDeadlinend').removeAttribute('disabled');">有
					<input type="radio" name="legalHuanjingpifu" value="0" onclick="document.getElementById('legalHuanjingpifuName').disabled='disabled';document.getElementById('legalHuanjingpifuNum').disabled='disabled';document.getElementById('legalHuanjingpifuOrgan').disabled='disabled';document.getElementById('legalHuanjingpifuTime').disabled='disabled';document.getElementById('legalHuanjingpifuDeadline').disabled='disabled';document.getElementById('legalHuanjingpifuDeadlinend').disabled='disabled';">无
					</td>
			</tr>
			<tr>
				<td class="tdhead">文件名</td><td><input type="text" value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalHuanjingpifuName; ?>
" id="legalHuanjingpifuName" name="legalHuanjingpifuName"></td>
				<td class="tdhead">批复号</td><td><input type="text" value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalHuanjingpifuNum; ?>
" id="legalHuanjingpifuNum" name="legalHuanjingpifuNum"></td>
			</tr>
			<tr>
				<td class="tdhead">批复单位</td><td><input type="text" value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalHuanjingpifuOrgan; ?>
" id="legalHuanjingpifuOrgan" name="legalHuanjingpifuOrgan"></td>
				<td class="tdhead">批复时间</td><td><input type="text" class="datepicker" value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalHuanjingpifuTime; ?>
" id="legalHuanjingpifuTime" name="legalHuanjingpifuTime"></td>
			</tr>
			<tr>
				<td class="tdhead">有效期起始</td><td><input type="text" class="datepicker" value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalHuanjingpifuDeadline; ?>
" id="legalHuanjingpifuDeadline" name="legalHuanjingpifuDeadline"></td>
				<td class="tdhead">有效期至</td><td><input type="text"  id= "legalHuanjingpifuDeadlinend" class="datepicker" onchange= "loadchecktime(this)" value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalHuanjingpifuDeadlinend; ?>
" name="legalHuanjingpifuDeadlinend"></td>
			</tr>
				<?php else: ?>
					<input type="radio" name="legalHuanjingpifu" value="1" onclick="document.getElementById('legalHuanjingpifuName').removeAttribute('disabled');document.getElementById('legalHuanjingpifuNum').removeAttribute('disabled');document.getElementById('legalHuanjingpifuOrgan').removeAttribute('disabled');document.getElementById('legalHuanjingpifuTime').removeAttribute('disabled');document.getElementById('legalHuanjingpifuDeadline').removeAttribute('disabled');document.getElementById('legalHuanjingpifuDeadlinend').removeAttribute('disabled');">有
					<input type="radio" name="legalHuanjingpifu" value="0" checked onclick="document.getElementById('legalHuanjingpifuName').disabled='disabled';document.getElementById('legalHuanjingpifuNum').disabled='disabled';document.getElementById('legalHuanjingpifuOrgan').disabled='disabled';document.getElementById('legalHuanjingpifuTime').disabled='disabled';document.getElementById('legalHuanjingpifuDeadline').disabled='disabled';document.getElementById('legalHuanjingpifuDeadlinend').disabled='disabled';">无
					</td>
			</tr>
			<tr>
				<td class="tdhead">文件名</td><td><input type="text" value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalHuanjingpifuName; ?>
" id="legalHuanjingpifuName" name="legalHuanjingpifuName" disabled="disabled"></td>
				<td class="tdhead">批复号</td><td><input type="text" value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalHuanjingpifuNum; ?>
" id="legalHuanjingpifuNum" name="legalHuanjingpifuNum" disabled="disabled"></td>
			</tr>
			<tr>
				<td class="tdhead">批复单位</td><td><input type="text" value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalHuanjingpifuOrgan; ?>
" id="legalHuanjingpifuOrgan" name="legalHuanjingpifuOrgan" disabled="disabled"></td>
				<td class="tdhead">批复时间</td><td><input type="text" class="datepicker" value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalHuanjingpifuTime; ?>
" id="legalHuanjingpifuTime" name="legalHuanjingpifuTime" disabled="disabled"></td>
			</tr>
			<tr>
				<td class="tdhead">有效期起始</td><td><input type="text" class="datepicker" value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalHuanjingpifuDeadline; ?>
" id="legalHuanjingpifuDeadline" name="legalHuanjingpifuDeadline" disabled="disabled"></td>
				<td class="tdhead">有效期至</td><td><input type="text"  id= "legalHuanjingpifuDeadlinend" class="datepicker" onchange= "loadchecktime(this)" value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalHuanjingpifuDeadlinend; ?>
" name="legalHuanjingpifuDeadlinend" disabled="disabled"></td>
			</tr>
				<?php endif; ?>	
			<tr>
				<td class="tdtitle" colspan=4>《矿山地质环境保护与恢复治理方案》批复
				<?php if ($this->_tpl_vars['legaldataArray'][0]->legalDizhipifu == '1'): ?>	
					<input type="radio" name="legalDizhipifu" value="1" checked onclick="document.getElementById('legalDizhipifuName').removeAttribute('disabled');document.getElementById('legalDizhipifuNum').removeAttribute('disabled');document.getElementById('legalDizhipifuOrgan').removeAttribute('disabled');document.getElementById('legalDizhipifuTime').removeAttribute('disabled');document.getElementById('legalDizhipifuDeadline').removeAttribute('disabled');document.getElementById('legalDizhipifuDeadlinend').removeAttribute('disabled');">有
					<input type="radio" name="legalDizhipifu" value="0" onclick="document.getElementById('legalDizhipifuName').disabled='disabled';document.getElementById('legalDizhipifuNum').disabled='disabled';document.getElementById('legalDizhipifuOrgan').disabled='disabled';document.getElementById('legalDizhipifuTime').disabled='disabled';document.getElementById('legalDizhipifuDeadline').disabled='disabled';document.getElementById('legalDizhipifuDeadlinend').disabled='disabled';">无
					</td>
			</tr>
			<tr>
				<td class="tdhead">文件名</td><td><input type="text" value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalDizhipifuName; ?>
" id="legalDizhipifuName" name="legalDizhipifuName"></td>
				<td class="tdhead">批复号</td><td><input type="text" value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalDizhipifuNum; ?>
" id="legalDizhipifuNum" name="legalDizhipifuNum"></td>
			</tr>
			<tr>
				<td class="tdhead">批复单位</td><td><input type="text" value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalDizhipifuOrgan; ?>
" id="legalDizhipifuOrgan" name="legalDizhipifuOrgan"></td>
				<td class="tdhead">批复时间</td><td><input type="text" class="datepicker" value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalDizhipifuTime; ?>
" id="legalDizhipifuTime" name="legalDizhipifuTime"></td>
			</tr>
			<tr>
				<td class="tdhead">有效期起始</td><td><input type="text" class="datepicker" value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalDizhipifuDeadline; ?>
" id="legalDizhipifuDeadline" name="legalDizhipifuDeadline"></td>
				<td class="tdhead">有效期至</td><td><input type="text" id = "legalDizhipifuDeadlinend" class="datepicker" onchange= "loadchecktime(this)" value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalDizhipifuDeadlinend; ?>
" name="legalDizhipifuDeadlinend"></td>
			</tr>
				<?php else: ?>
					<input type="radio" name="legalDizhipifu" value="1" onclick="document.getElementById('legalDizhipifuName').removeAttribute('disabled');document.getElementById('legalDizhipifuNum').removeAttribute('disabled');document.getElementById('legalDizhipifuOrgan').removeAttribute('disabled');document.getElementById('legalDizhipifuTime').removeAttribute('disabled');document.getElementById('legalDizhipifuDeadline').removeAttribute('disabled');document.getElementById('legalDizhipifuDeadlinend').removeAttribute('disabled');">有
					<input type="radio" name="legalDizhipifu" value="0" checked onclick="document.getElementById('legalDizhipifuName').disabled='disabled';document.getElementById('legalDizhipifuNum').disabled='disabled';document.getElementById('legalDizhipifuOrgan').disabled='disabled';document.getElementById('legalDizhipifuTime').disabled='disabled';document.getElementById('legalDizhipifuDeadline').disabled='disabled';document.getElementById('legalDizhipifuDeadlinend').disabled='disabled';">无
					</td>
			</tr>
			<tr>
				<td class="tdhead">文件名</td><td><input type="text" value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalDizhipifuName; ?>
" id="legalDizhipifuName" name="legalDizhipifuName" disabled="disabled"></td>
				<td class="tdhead">批复号</td><td><input type="text" value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalDizhipifuNum; ?>
" id="legalDizhipifuNum" name="legalDizhipifuNum" disabled="disabled"></td>
			</tr>
			<tr>
				<td class="tdhead">批复单位</td><td><input type="text" value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalDizhipifuOrgan; ?>
" id="legalDizhipifuOrgan" name="legalDizhipifuOrgan" disabled="disabled"></td>
				<td class="tdhead">批复时间</td><td><input type="text" class="datepicker" value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalDizhipifuTime; ?>
" id="legalDizhipifuTime" name="legalDizhipifuTime" disabled="disabled"></td>
			</tr>
			<tr>
				<td class="tdhead">有效期起始</td><td><input type="text" class="datepicker" value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalDizhipifuDeadline; ?>
" id="legalDizhipifuDeadline" name="legalDizhipifuDeadline" disabled="disabled"></td>
				<td class="tdhead">有效期至</td><td><input type="text" id = "legalDizhipifuDeadlinend" class="datepicker" onchange= "loadchecktime(this)" value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalDizhipifuDeadlinend; ?>
" name="legalDizhipifuDeadlinend" disabled="disabled"></td>
			</tr>
			<?php endif; ?>	
			<tr>
				<td class="tdtitle" colspan=4>《矿山地质灾害评估报告》批复
				<?php if ($this->_tpl_vars['legaldataArray'][0]->legalZaihaipifu == '1'): ?>	
					<input type="radio" name="legalZaihaipifu" value="1" checked onclick="document.getElementById('legalZaihaipifuName').removeAttribute('disabled');document.getElementById('legalZaihaipifuNum').removeAttribute('disabled');document.getElementById('legalZaihaipifuOrgan').removeAttribute('disabled');document.getElementById('legalZaihaipifuTime').removeAttribute('disabled');document.getElementById('legalZaihaipifuDeadline').removeAttribute('disabled');document.getElementById('legalZaihaipifuDeadlinend').removeAttribute('disabled');">有
					<input type="radio" name="legalZaihaipifu" value="0" onclick="document.getElementById('legalZaihaipifuName').disabled='disabled';document.getElementById('legalZaihaipifuNum').disabled='disabled';document.getElementById('legalZaihaipifuOrgan').disabled='disabled';document.getElementById('legalZaihaipifuTime').disabled='disabled';document.getElementById('legalZaihaipifuDeadline').disabled='disabled';document.getElementById('legalZaihaipifuDeadlinend').disabled='disabled';">无
					</td>
			</tr>
			<tr>
				<td class="tdhead">文件名</td><td><input type="text" value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalZaihaipifuName; ?>
" id="legalZaihaipifuName" name="legalZaihaipifuName"></td>
				<td class="tdhead">批复号</td><td><input type="text" value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalZaihaipifuNum; ?>
" id="legalZaihaipifuNum" name="legalZaihaipifuNum"></td>
			</tr>
			<tr>
				<td class="tdhead">批复单位</td><td><input type="text" value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalZaihaipifuOrgan; ?>
" id="legalZaihaipifuOrgan" name="legalZaihaipifuOrgan"></td>
				<td class="tdhead">批复时间</td><td><input type="text" class="datepicker" value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalZaihaipifuTime; ?>
" id="legalZaihaipifuTime" name="legalZaihaipifuTime"></td>
			</tr>
			<tr>
				<td class="tdhead">有效期起始</td><td><input type="text" class="datepicker" value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalZaihaipifuDeadline; ?>
" id="legalZaihaipifuDeadline" name="legalZaihaipifuDeadline"></td>
				<td class="tdhead">有效期至</td><td><input type="text" id = "legalZaihaipifuDeadlinend" class="datepicker" onchange= "loadchecktime(this)" value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalZaihaipifuDeadlinend; ?>
" name="legalZaihaipifuDeadlinend"></td>
			</tr>
				<?php else: ?>
					<input type="radio" name="legalZaihaipifu" value="1" onclick="document.getElementById('legalZaihaipifuName').removeAttribute('disabled');document.getElementById('legalZaihaipifuNum').removeAttribute('disabled');document.getElementById('legalZaihaipifuOrgan').removeAttribute('disabled');document.getElementById('legalZaihaipifuTime').removeAttribute('disabled');document.getElementById('legalZaihaipifuDeadline').removeAttribute('disabled');document.getElementById('legalZaihaipifuDeadlinend').removeAttribute('disabled');">有
					<input type="radio" name="legalZaihaipifu" value="0" checked onclick="document.getElementById('legalZaihaipifuName').disabled='disabled';document.getElementById('legalZaihaipifuNum').disabled='disabled';document.getElementById('legalZaihaipifuOrgan').disabled='disabled';document.getElementById('legalZaihaipifuTime').disabled='disabled';document.getElementById('legalZaihaipifuDeadline').disabled='disabled';document.getElementById('legalZaihaipifuDeadlinend').disabled='disabled';">无
					</td>
			</tr>
			<tr>
				<td class="tdhead">文件名</td><td><input type="text" value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalZaihaipifuName; ?>
" id="legalZaihaipifuName" name="legalZaihaipifuName" disabled="disabled"></td>
				<td class="tdhead">批复号</td><td><input type="text" value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalZaihaipifuNum; ?>
" id="legalZaihaipifuNum" name="legalZaihaipifuNum" disabled="disabled"></td>
			</tr>
			<tr>
				<td class="tdhead">批复单位</td><td><input type="text" value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalZaihaipifuOrgan; ?>
" id="legalZaihaipifuOrgan" name="legalZaihaipifuOrgan" disabled="disabled"></td>
				<td class="tdhead">批复时间</td><td><input type="text" class="datepicker" value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalZaihaipifuTime; ?>
" id="legalZaihaipifuTime" name="legalZaihaipifuTime" disabled="disabled"></td>
			</tr>
			<tr>
				<td class="tdhead">有效期起始</td><td><input type="text" class="datepicker" value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalZaihaipifuDeadline; ?>
" id="legalZaihaipifuDeadline" name="legalZaihaipifuDeadline" disabled="disabled"></td>
				<td class="tdhead">有效期至</td><td><input type="text" id = "legalZaihaipifuDeadlinend" class="datepicker" onchange= "loadchecktime(this)" value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalZaihaipifuDeadlinend; ?>
" name="legalZaihaipifuDeadlinend" disabled="disabled"></td>
			</tr>
				<?php endif; ?>
				
		</table>
		<table class="formView" width="100%">
			<tr>
				<td class="tdtitle" colspan=4>依法纳税和矿山环境恢复治理保证金缴纳情况</td>
			</tr>
			<tr>
				<td class="tdhead">矿产资源补偿费</td>
				<td width="30%"><input type="text"  value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalFeeRecom; ?>
" name="legalFeeRecom" ></td>
				<td class="tdhead">已缴税金总额</td>
				<td width="30%"><input type="text"  value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalFeeOver; ?>
" name="legalFeeOver" ></td>
			</tr>
			<tr>
				<td class="tdhead">已缴资源税</td>
				<td ><input type="text"  value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalFeeResource; ?>
" name="legalFeeResource" ></td>
				<td class="tdhead">已缴增值税</td>
				<td ><input type="text"  value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalFeeValueadd; ?>
" name="legalFeeValueadd" ></td>	
			</tr>	
			<tr>
				<td class="tdhead">已缴企业所得税</td>
				<td ><input type="text"  value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalFeeCompany; ?>
" name="legalFeeCompany" ></td>
				<td class="tdhead">应缴税金</td>
				<td ><input type="text"  value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalFeeTopay; ?>
" name="legalFeeTopay" ></td>
			</tr>	
			<tr>  
				<td class="tdhead">欠缴税金</td>
				<td ><input type="text"  value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalFeeNotpay; ?>
" name="legalFeeNotpay" ></td>
				<td class="tdhead">保证金</td>
				<td ><input type="text"  value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalFeeEnsure; ?>
" name="legalFeeEnsure" ></td>
			</tr>		
			<tr>
				<td class="tdhead">矿山环境治理保证金</td>
				<td ><input type="text"  value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalFeeEnvironment; ?>
" name="legalFeeEnvironment"></td>
				<td class="tdhead">土地复垦保证金</td>
				<td ><input type="text"  value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalFeeLand; ?>
" name="legalFeeLand" ></td>
			</tr>
			<tr>
				<td class="tdtitle" colspan=4>矿业权价款缴纳情况</td>
			</tr>
			<tr>
				<td class="tdhead">应缴价款额度</td>
				<td ><input type="text"  value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalPriceTopay; ?>
" name="legalPriceTopay"  ></td>
				<td class="tdhead">已缴价款额度</td>
				<td ><input type="text"  value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalPricePayed; ?>
" name="legalPricePayed"  ></td>
			</tr>
			<tr>
				<td class="tdhead">欠缴价款额度</td>
				<td ><input type="text"  value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalPriceNopay; ?>
" name="legalPriceNopay"  ></td>
				<td class="tdhead">应缴款时间</td>
				<td ><input type="text"  value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalPriceTime; ?>
" name="legalPriceTime"  ></td>
			</tr>
			
			<tr>	
				<td class='tdtitle' colspan=4>安全生产责任事故情况</td>
			</tr>
			<tr>
				<td class='tdhead'>是否有安全事故</td>
				<?php if ($this->_tpl_vars['legaldataArray'][0]->legalAccidentIshave == '1'): ?>
				<td>		
					<input type="radio" name="legalAccidentIshave"  value="1" checked onclick="document.getElementById('legalAccidentPlace').removeAttribute('disabled');document.getElementById('legalAccidentTime').removeAttribute('disabled');document.getElementById('legalAccidentDeal').removeAttribute('disabled');">是
					<input type="radio" name="legalAccidentIshave"  value="0" onclick="document.getElementById('legalAccidentPlace').disabled='disabled';document.getElementById('legalAccidentTime').disabled='disabled';document.getElementById('legalAccidentDeal').disabled='disabled';">否
				</td>
				<td class="tdhead">事故地点</td>
				<td ><input type="text"  value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalAccidentPlace; ?>
" id="legalAccidentPlace" name="legalAccidentPlace" width="100%"></td>
			</tr>
			<tr>
				<td class="tdhead">发生时间</td>
				<td ><input type="text"  value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalAccidentTime; ?>
" id="legalAccidentTime" name="legalAccidentTime"  ></td>
				<td class="tdhead">处理情况</td>
				<td ><input type="text"  value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalAccidentDeal; ?>
" id="legalAccidentDeal" name="legalAccidentDeal"  ></td>
			</tr>
				<?php else: ?>
				<td>		
					<input type="radio" name="legalAccidentIshave"  value="1" onclick="document.getElementById('legalAccidentPlace').removeAttribute('disabled');document.getElementById('legalAccidentTime').removeAttribute('disabled');document.getElementById('legalAccidentDeal').removeAttribute('disabled');">是
					<input type="radio" name="legalAccidentIshave"  value="0" checked onclick="document.getElementById('legalAccidentPlace').disabled='disabled';document.getElementById('legalAccidentTime').disabled='disabled';document.getElementById('legalAccidentDeal').disabled='disabled';">否
				</td>
				<td class="tdhead">事故地点</td>
				<td ><input type="text"  value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalAccidentPlace; ?>
" id="legalAccidentPlace" name="legalAccidentPlace" width="100%" disabled="disabled"></td>
			</tr>
			<tr>
				<td class="tdhead">发生时间</td>
				<td ><input type="text"  value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalAccidentTime; ?>
" id="legalAccidentTime" name="legalAccidentTime" disabled="disabled"></td>
				<td class="tdhead">处理情况</td>
				<td ><input type="text"  value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalAccidentDeal; ?>
" id="legalAccidentDeal" name="legalAccidentDeal" disabled="disabled" ></td>
			</tr>
				<?php endif; ?>
			<tr>	
				<td class='tdhead'>两年内无安全生产责任事故</td>
				<td colspan=3><textarea cols="60" rows="2" name="legalAccident"><?php echo $this->_tpl_vars['legaldataArray'][0]->legalAccident; ?>
</textarea></td>
			</tr>
			<tr>	
				<td class='tdtitle' colspan=4>环境污染事故情况</td>
			</tr>
			<tr>
				<td class='tdhead'>是否有安全事故</td>
				<?php if ($this->_tpl_vars['legaldataArray'][0]->legalPolluteIshave == '1'): ?>
				<td>		
					<input type="radio" name="legalPolluteIshave"  value="1" checked onclick="document.getElementById('legalPollutePlace').removeAttribute('disabled');document.getElementById('legalPolluteTime').removeAttribute('disabled');document.getElementById('legalPolluteDeal').removeAttribute('disabled');">是
					<input type="radio" name="legalPolluteIshave"  value="0" onclick="document.getElementById('legalPollutePlace').disabled='disabled';document.getElementById('legalPolluteTime').disabled='disabled';document.getElementById('legalPolluteDeal').disabled='disabled';">否
				</td>
				<td class="tdhead">事故地点</td>
				<td ><input type="text"  value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalPollutePlace; ?>
" id="legalPollutePlace" name="legalPollutePlace" width="100%"></td>
			</tr>
			<tr>
				<td class="tdhead">发生时间</td>
				<td ><input type="text"  value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalPolluteTime; ?>
" id="legalPolluteTime" name="legalPolluteTime"  ></td>
				<td class="tdhead">处理情况</td>
				<td ><input type="text"  value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalPolluteDeal; ?>
" id="legalPolluteDeal" name="legalPolluteDeal"  ></td>
			</tr>
				<?php else: ?>
				<td>		
					<input type="radio" name="legalPolluteIshave"  value="1" onclick="document.getElementById('legalPollutePlace').removeAttribute('disabled');document.getElementById('legalPolluteTime').removeAttribute('disabled');document.getElementById('legalPolluteDeal').removeAttribute('disabled');">是
					<input type="radio" name="legalPolluteIshave"  value="0" checked onclick="document.getElementById('legalPollutePlace').disabled='disabled';document.getElementById('legalPolluteTime').disabled='disabled';document.getElementById('legalPolluteDeal').disabled='disabled';">否
				</td>
				<td class="tdhead">事故地点</td>
				<td ><input type="text"  value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalPollutePlace; ?>
" id="legalPollutePlace" name="legalPollutePlace" width="100%" disabled="disabled"></td>
			</tr>
			<tr>
				<td class="tdhead">发生时间</td>
				<td ><input type="text"  value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalPolluteTime; ?>
" id="legalPolluteTime" name="legalPolluteTime"  disabled="disabled"></td>
				<td class="tdhead">处理情况</td>
				<td ><input type="text"  value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalPolluteDeal; ?>
" id="legalPolluteDeal" name="legalPolluteDeal" disabled="disabled" ></td>
			</tr>
				<?php endif; ?>
				
			<tr>	
				<td class='tdtitle' colspan=4>3年内行政处罚情况</td>
			</tr>
			<tr>
				<td class='tdhead'>是否受处罚</td>
				<?php if ($this->_tpl_vars['legaldataArray'][0]->legalPunishIshave == '1'): ?>
				<td>		
					<input type="radio" name="legalPunishIshave"  value="1" checked onclick="document.getElementById('legalPunishReson').removeAttribute('disabled');document.getElementById('legalPunishTime').removeAttribute('disabled');document.getElementById('legalPunishPerson').removeAttribute('disabled');">是
					<input type="radio" name="legalPunishIshave"  value="0" onclick="document.getElementById('legalPunishReson').disabled='disabled';document.getElementById('legalPunishTime').disabled='disabled';document.getElementById('legalPunishPerson').disabled='disabled';">否
				</td>
				<td class="tdhead">处罚原因</td>
				<td><textarea cols="30" rows="2" id="legalPunishReson" name="legalPunishReson" width="100%"><?php echo $this->_tpl_vars['legaldataArray'][0]->legalPunishReson; ?>
</textarea></td>
			</tr>
			<tr>
				<td class="tdhead">处罚时间</td>
				<td ><input type="text"  value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalPunishTime; ?>
" id="legalPunishTime" name="legalPunishTime"  ></td>
				<td class="tdhead">责任人</td>
				<td ><input type="text"  value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalPunishPerson; ?>
" id="legalPunishPerson" name="legalPunishPerson"  ></td>
			</tr>
				<?php else: ?>
				<td>		
					<input type="radio" name="legalPunishIshave"  value="1" onclick="document.getElementById('legalPunishReson').removeAttribute('disabled');document.getElementById('legalPunishTime').removeAttribute('disabled');document.getElementById('legalPunishPerson').removeAttribute('disabled');">是
					<input type="radio" name="legalPunishIshave"  value="0" checked onclick="document.getElementById('legalPunishReson').disabled='disabled';document.getElementById('legalPunishTime').disabled='disabled';document.getElementById('legalPunishPerson').disabled='disabled';">否
				</td>
				<td class="tdhead">处罚原因</td>
				<td><textarea cols="30" rows="2" id="legalPunishReson" name="legalPunishReson" width="100%" disabled="disabled"><?php echo $this->_tpl_vars['legaldataArray'][0]->legalPunishReson; ?>
</textarea></td>
			</tr>
			<tr>
				<td class="tdhead">处罚时间</td>
				<td ><input type="text"  value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalPunishTime; ?>
" id="legalPunishTime" name="legalPunishTime" disabled="disabled" ></td>
				<td class="tdhead">责任人</td>
				<td ><input type="text"  value="<?php echo $this->_tpl_vars['legaldataArray'][0]->legalPunishPerson; ?>
" id="legalPunishPerson" name="legalPunishPerson" disabled="disabled" ></td>
			</tr>
				<?php endif; ?>
				
			<tr>
				<td class='tdtitle'>是否符合矿产资源规划的要求</td>
				<?php if ($this->_tpl_vars['legaldataArray'][0]->legalIsaccplan == '1'): ?>
				<td class='tdtitle'>		
					<input type="radio" name="legalIsaccplan"  value="1" checked>是
					<input type="radio" name="legalIsaccplan"  value="0" >否
				</td>
				<?php else: ?>
				<td class='tdtitle'>		
					<input type="radio" name="legalIsaccplan"  value="1" >是
					<input type="radio" name="legalIsaccplan"  value="0" checked>否
				</td>
				<?php endif; ?>
				<td class='tdtitle' >是否有通过审查的资源开发利用方案</td>
				<?php if ($this->_tpl_vars['legaldataArray'][0]->legalHaveplan == '1'): ?>
				<td class='tdtitle'>		
					<input type="radio" name="legalHaveplan"  value="1" checked>是
					<input type="radio" name="legalHaveplan"  value="0" >否
				</td>
				<?php else: ?>
				<td class='tdtitle'>		
					<input type="radio" name="legalHaveplan"  value="1" >是
					<input type="radio" name="legalHaveplan"  value="0" checked>否
				</td>
				<?php endif; ?>
			</tr>
			<tr>
				<td class='tdtitle' colspan=4>安全设施完备度</td>
			</tr>
			<tr>
				<td class='tdhead'>是否有监测监控系统</td>
				<?php if ($this->_tpl_vars['legaldataArray'][0]->legalSecureMonitor == '1'): ?>
				<td>		
					<input type="radio" name="legalSecureMonitor"  value="1" checked>是
					<input type="radio" name="legalSecureMonitor"  value="0" >否
				</td>
				<?php else: ?>
				<td>		
					<input type="radio" name="legalSecureMonitor"  value="1" >是
					<input type="radio" name="legalSecureMonitor"  value="0" checked>否
				</td>
				<?php endif; ?>
				<td class='tdhead'>是否有人员定位系统</td>
				<?php if ($this->_tpl_vars['legaldataArray'][0]->legalSecurePerson == '1'): ?>
				<td>		
					<input type="radio" name="legalSecurePerson"  value="1" checked>是
					<input type="radio" name="legalSecurePerson"  value="0" >否
				</td>
				<?php else: ?>
				<td>		
					<input type="radio" name="legalSecurePerson"  value="1" >是
					<input type="radio" name="legalSecurePerson"  value="0" checked>否
				</td>
				<?php endif; ?>
			</tr>
			<tr>
				<td class='tdhead'>是否有紧急避灾系统</td>
				<?php if ($this->_tpl_vars['legaldataArray'][0]->legalSecureEmergency == '1'): ?>
				<td>		
					<input type="radio" name="legalSecureEmergency"  value="1" checked>是
					<input type="radio" name="legalSecureEmergency"  value="0" >否
				</td>
				<?php else: ?>
				<td>		
					<input type="radio" name="legalSecureEmergency"  value="1" >是
					<input type="radio" name="legalSecureEmergency"  value="0" checked>否
				</td>
				<?php endif; ?>
				<td class='tdhead'>是否有压风自救系统</td>
				<?php if ($this->_tpl_vars['legaldataArray'][0]->legalSecureWind == '1'): ?>
				<td>		
					<input type="radio" name="legalSecureWind"  value="1" checked>是
					<input type="radio" name="legalSecureWind"  value="0" >否
				</td>
				<?php else: ?>
				<td>		
					<input type="radio" name="legalSecureWind"  value="1" >是
					<input type="radio" name="legalSecureWind"  value="0" checked>否
				</td>
				<?php endif; ?>
			</tr>
			<tr>
				<td class='tdhead' >是否有供水施救系统</td>
				<?php if ($this->_tpl_vars['legaldataArray'][0]->legalSecureWater == '1'): ?>
				<td>		
					<input type="radio" name="legalSecureWater"  value="1" checked>是
					<input type="radio" name="legalSecureWater"  value="0" >否
				</td>
				<?php else: ?>
				<td>		
					<input type="radio" name="legalSecureWater"  value="1" >是
					<input type="radio" name="legalSecureWater"  value="0" checked>否
				</td>
				<?php endif; ?>
				<td class='tdhead' >是否有通讯联络系统</td>
				<?php if ($this->_tpl_vars['legaldataArray'][0]->legalSecureCommunicate == '1'): ?>
				<td>		
					<input type="radio" name="legalSecureCommunicate"  value="1" checked>是
					<input type="radio" name="legalSecureCommunicate"  value="0" >否
				</td>
				<?php else: ?>
				<td>		
					<input type="radio" name="legalSecureCommunicate"  value="1" >是
					<input type="radio" name="legalSecureCommunicate"  value="0" checked>否
				</td>
				<?php endif; ?>
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
				<textarea cols="60" rows="4"  name="standardGrow"><?php echo $this->_tpl_vars['standarddataArray'][0]->standardGrow; ?>
</textarea>
			</td>
		</tr>
		<tr>
			<td class='tdhead'>是否有为绿色矿山修改生产管理制度</td>
			<?php if ($this->_tpl_vars['standarddataArray'][0]->standardGrowIsgreen == '1'): ?>
				<td>		
					<input type="radio" name="standardGrowIsgreen"  value="1" checked onclick="document.getElementById('standardGrowTime').removeAttribute('disabled');">是
					<input type="radio" name="standardGrowIsgreen"  value="0" onclick="document.getElementById('standardGrowTime').disabled='disabled';">否
				</td>
				<td class="tdhead">修改时间</td>
				<td><input type="text"  value="<?php echo $this->_tpl_vars['standarddataArray'][0]->standardGrowTime; ?>
" class="datepicker" id="standardGrowTime" name="standardGrowTime" ></td>
			<?php else: ?>
				<td>		
					<input type="radio" name="standardGrowIsgreen"  value="1" onclick="document.getElementById('standardGrowTime').removeAttribute('disabled');">是
					<input type="radio" name="standardGrowIsgreen"  value="0" checked nclick="document.getElementById('standardGrowTime').disabled='disabled';">否
				</td>
				<td class="tdhead">修改时间</td>
				<td><input type="text"  value="<?php echo $this->_tpl_vars['standarddataArray'][0]->standardGrowTime; ?>
" class="datepicker" id="standardGrowTime" name="standardGrowTime" disabled="disabled"></td>
			<?php endif; ?>
			
			
		</tr>
		<tr>
			<td class="tdhead">修改条目</td>
			<td colspan=3>
				<textarea cols="60" rows="4"  name="standardGrowChange"><?php echo $this->_tpl_vars['standarddataArray'][0]->standardGrowChange; ?>
</textarea>
			</td>
		</tr>
		<tr>
			<td class="tdhead">备注</td>
			<td colspan=3>
				<textarea cols="60" rows="4"  name="standardGrowComment"><?php echo $this->_tpl_vars['standarddataArray'][0]->standardGrowComment; ?>
</textarea>
			</td>
		</tr>
	</table>
	<table class="formView" width="100%">
		<tr>
			<td class="tdtitle" colspan=4>规章制度完善情况</td>
		</tr>
		<tr>
			<td class='tdhead'>是否加入《绿色矿业公约》</td>
			<?php if ($this->_tpl_vars['standarddataArray'][0]->standardIsConv == '1'): ?>
				<td width="10%">		
					<input type="radio" name="standardIsConv"  value="1" checked>是
					<input type="radio" name="standardIsConv"  value="0" >否
				</td>
			<?php else: ?>
				<td width="10%">		
					<input type="radio" name="standardIsConv"  value="1" >是
					<input type="radio" name="standardIsConv"  value="0" checked>否
				</td>
			<?php endif; ?>
			<td class='tdhead'>是否有矿山安全生产责任制</td>
			<?php if ($this->_tpl_vars['standarddataArray'][0]->standardIsDuty == '1'): ?>
				<td width="10%">		
					<input type="radio" name="standardIsDuty"  value="1" checked>是
					<input type="radio" name="standardIsDuty"  value="0" >否
				</td>
			<?php else: ?>
				<td width="10%">		
					<input type="radio" name="standardIsDuty"  value="1" >是
					<input type="radio" name="standardIsDuty"  value="0" checked>否
				</td>
			<?php endif; ?>
		</tr>
		<tr>
			<td class='tdhead'>是否有矿山安全生产综合管理制度</td>
			<?php if ($this->_tpl_vars['standarddataArray'][0]->standardIsSafecom == '1'): ?>
				<td>		
					<input type="radio" name="standardIsSafecom"  value="1" checked>是
					<input type="radio" name="standardIsSafecom"  value="0" >否
				</td>
			<?php else: ?>
				<td>		
					<input type="radio" name="standardIsSafecom"  value="1" >是
					<input type="radio" name="standardIsSafecom"  value="0" checked>否
				</td>
			<?php endif; ?>
			<td class='tdhead'>是否有矿山安全生产现场管理制度</td>
			<?php if ($this->_tpl_vars['standarddataArray'][0]->standardIsSafesite == '1'): ?>
				<td>		
					<input type="radio" name="standardIsSafesite"  value="1" checked>是
					<input type="radio" name="standardIsSafesite"  value="0" >否
				</td>
			<?php else: ?>
				<td>		
					<input type="radio" name="standardIsSafesite"  value="1" >是
					<input type="radio" name="standardIsSafesite"  value="0" checked>否
				</td>
			<?php endif; ?>
		</tr>		
		<tr>
			<td class='tdhead'>是否有矿山安全生产监督检查管理制度</td>
			<?php if ($this->_tpl_vars['standarddataArray'][0]->standardIsSafecontrol == '1'): ?>
				<td>		
					<input type="radio" name="standardIsSafecontrol"  value="1" checked>是
					<input type="radio" name="standardIsSafecontrol"  value="0" >否
				</td>
			<?php else: ?>
				<td>		
					<input type="radio" name="standardIsSafecontrol"  value="1" >是
					<input type="radio" name="standardIsSafecontrol"  value="0" checked>否
				</td>
			<?php endif; ?>
			<td class='tdhead'>是否有矿山安全事故救护及处理制度</td>
			<?php if ($this->_tpl_vars['standarddataArray'][0]->standardIsSafeacid == '1'): ?>
				<td>		
					<input type="radio" name="standardIsSafeacid"  value="1" checked>是
					<input type="radio" name="standardIsSafeacid"  value="0" >否
				</td>
			<?php else: ?>
				<td>		
					<input type="radio" name="standardIsSafeacid"  value="1" >是
					<input type="radio" name="standardIsSafeacid"  value="0" checked>否
				</td>
			<?php endif; ?>
		</tr>		
		<tr>
			<td class='tdhead'>是否有矿山安全生产操作规程</td>
			<?php if ($this->_tpl_vars['standarddataArray'][0]->standardIsSafeoper == '1'): ?>
				<td>		
					<input type="radio" name="standardIsSafeoper"  value="1" checked>是
					<input type="radio" name="standardIsSafeoper"  value="0" >否
				</td>
			<?php else: ?>
				<td>		
					<input type="radio" name="standardIsSafeoper"  value="1" >是
					<input type="radio" name="standardIsSafeoper"  value="0" checked>否
				</td>
			<?php endif; ?>
			<td class='tdhead'>是否落实安全生产责任制</td>
			<?php if ($this->_tpl_vars['standarddataArray'][0]->standardIsDutyok == '1'): ?>
				<td>		
					<input type="radio" name="standardIsDutyok"  value="1" checked>是
					<input type="radio" name="standardIsDutyok"  value="0" >否
				</td>
			<?php else: ?>
				<td>		
					<input type="radio" name="standardIsDutyok"  value="1" >是
					<input type="radio" name="standardIsDutyok"  value="0" checked>否
				</td>
			<?php endif; ?>
		</tr>		
		<tr>
			<td class='tdhead'>安全生产专业人员是否持证上岗</td>
			<?php if ($this->_tpl_vars['standarddataArray'][0]->standardIsCard == '1'): ?>
				<td>		
					<input type="radio" name="standardIsCard"  value="1" checked>是
					<input type="radio" name="standardIsCard"  value="0" >否
				</td>
			<?php else: ?>
				<td>		
					<input type="radio" name="standardIsCard"  value="1" >是
					<input type="radio" name="standardIsCard"  value="0" checked>否
				</td>
			<?php endif; ?>
			<td class='tdhead'>是否有档案管理制度</td>
			<?php if ($this->_tpl_vars['standarddataArray'][0]->standardIsFile == '1'): ?>
				<td>		
					<input type="radio" name="standardIsFile"  value="1" checked>是
					<input type="radio" name="standardIsFile"  value="0" >否
				</td>
			<?php else: ?>
				<td>		
					<input type="radio" name="standardIsFile"  value="1" >是
					<input type="radio" name="standardIsFile"  value="0" checked>否
				</td>
			<?php endif; ?>
		</tr>
		<tr>
			<td class='tdhead'>绿色矿山建设是否实行法定代表人负责制</td>
			<?php if ($this->_tpl_vars['standarddataArray'][0]->standardIsLegalman == '1'): ?>
				<td>		
					<input type="radio" name="standardIsLegalman"  value="1" checked>是
					<input type="radio" name="standardIsLegalman"  value="0" >否
				</td>
			<?php else: ?>
				<td>		
					<input type="radio" name="standardIsLegalman"  value="1" >是
					<input type="radio" name="standardIsLegalman"  value="0" checked>否
				</td>
			<?php endif; ?>
		</tr>		
		<tr>
			<td class="tdhead">其他补充制度</td>
			<td colspan=3><textarea cols="60" rows="2" name="standardOther" width="100%"><?php echo $this->_tpl_vars['standarddataArray'][0]->standardOther; ?>
</textarea></td>
		</tr>
		<tr>
			<td class="tdtitle" colspan=4>职工技术培训体系</td>
		</tr>
		<tr>
			<td class="tdhead">整体情况</td>
			<td colspan=3><textarea cols="60" rows="4" name="standardWorker" width="100%"><?php echo $this->_tpl_vars['standarddataArray'][0]->standardWorker; ?>
</textarea></td>
		</tr>	
		<tr>
			<td class="tdhead">每年组织培训次数</td>
			<td colspan=3><input type="text"  value="<?php echo $this->_tpl_vars['standarddataArray'][0]->standardWorkerCount; ?>
" name="standardWorkerCount"  ><input type="button" id="button_standardWorkerCount" value="详情"/></td>
		</tr>
	</table>
	<table align="center" style="display:none;" class="formView" id="bef3_pre5_standardWorkerCount">
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-2; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['standarddata35Array'][0][0]; ?>
" name="standardWorkerCount_bef3"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-1; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['standarddata35Array'][0][1]; ?>
" name="standardWorkerCount_bef2"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['standarddata35Array'][0][2]; ?>
" name="standardWorkerCount_bef1"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['standarddata35Array'][0][3]; ?>
" name="standardWorkerCount_pre1"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['standarddata35Array'][0][4]; ?>
" name="standardWorkerCount_pre1real"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['standarddata35Array'][0][5]; ?>
" name="standardWorkerCount_pre2"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['standarddata35Array'][0][6]; ?>
" name="standardWorkerCount_pre2real"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['standarddata35Array'][0][7]; ?>
" name="standardWorkerCount_pre3"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['standarddata35Array'][0][8]; ?>
" name="standardWorkerCount_pre3real"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['standarddata35Array'][0][9]; ?>
" name="standardWorkerCount_pre4"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['standarddata35Array'][0][10]; ?>
" name="standardWorkerCount_pre4real"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['standarddata35Array'][0][11]; ?>
" name="standardWorkerCount_pre5"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['standarddata35Array'][0][12]; ?>
" name="standardWorkerCount_pre5real"></td>	  
		</tr>
	</table>
	<table class="formView" align="center" width='100%'>
		<tr>
			<td class="tdhead" >平均每年培训投入经费</td>
			<td width="40%"><input type="text"  value="<?php echo $this->_tpl_vars['standarddataArray'][0]->standardWorkerCost; ?>
" name="standardWorkerCost"  ><input type="button" id="button_standardWorkerCost" value="详情"/></td>
		</tr>
	</table>
	<table align="center" style="display:none;" class="formView" id="bef3_pre5_standardWorkerCost">
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-2; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['standarddata35Array'][1][0]; ?>
" name="standardWorkerCost_bef3"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-1; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['standarddata35Array'][1][1]; ?>
" name="standardWorkerCost_bef2"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['standarddata35Array'][1][2]; ?>
" name="standardWorkerCost_bef1"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['standarddata35Array'][1][3]; ?>
" name="standardWorkerCost_pre1"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['standarddata35Array'][1][4]; ?>
" name="standardWorkerCost_pre1real"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['standarddata35Array'][1][5]; ?>
" name="standardWorkerCost_pre2"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['standarddata35Array'][1][6]; ?>
" name="standardWorkerCost_pre2real"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['standarddata35Array'][1][7]; ?>
" name="standardWorkerCost_pre3"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['standarddata35Array'][1][8]; ?>
" name="standardWorkerCost_pre3real"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['standarddata35Array'][1][9]; ?>
" name="standardWorkerCost_pre4"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['standarddata35Array'][1][10]; ?>
" name="standardWorkerCost_pre4real"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['standarddata35Array'][1][11]; ?>
" name="standardWorkerCost_pre5"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['standarddata35Array'][1][12]; ?>
" name="standardWorkerCost_pre5real"></td>	  
		</tr>
	</table>
	<table class="formView" width="100%">
		<tr>
			<td class='tdtitle' colspan=6>IS014001：2004环境管理体系认证
			<?php if ($this->_tpl_vars['standarddataArray'][0]->standardIso4001 == '1'): ?>	
					<input type="radio" name="standardIso4001"  value="1" checked onclick="document.getElementById('standardIso4001Organ').removeAttribute('disabled');document.getElementById('standardIso4001Time').removeAttribute('disabled');document.getElementById('standardIso4001Deadline').removeAttribute('disabled');">是
					<input type="radio" name="standardIso4001"  value="0" onclick="document.getElementById('standardIso4001Organ').disabled='disabled';document.getElementById('standardIso4001Time').disabled='disabled';document.getElementById('standardIso4001Deadline').disabled='disabled';">否
					</td>
		</tr>		
		<tr>
			<td class="tdhead">认证单位</td>
			<td><input type="text"  value="<?php echo $this->_tpl_vars['standarddataArray'][0]->standardIso4001Organ; ?>
" id="standardIso4001Organ" name="standardIso4001Organ"  ></td>
			<td class="tdhead">认证时间</td>
			<td><input type="text"  value="<?php echo $this->_tpl_vars['standarddataArray'][0]->standardIso4001Time; ?>
" id="standardIso4001Time" name="standardIso4001Time" class="datepicker"  ></td>
			<td class="tdhead">有效期</td>
			<td><input type="text"  value="<?php echo $this->_tpl_vars['standarddataArray'][0]->standardIso4001Deadline; ?>
" id="standardIso4001Deadline" name="standardIso4001Deadline"  ></td>
		</tr>
			<?php else: ?>		
					<input type="radio" name="standardIso4001"  value="1" onclick="document.getElementById('standardIso4001Organ').removeAttribute('disabled');document.getElementById('standardIso4001Time').removeAttribute('disabled');document.getElementById('standardIso4001Deadline').removeAttribute('disabled');">是
					<input type="radio" name="standardIso4001"  value="0" checked onclick="document.getElementById('standardIso4001Organ').disabled='disabled';document.getElementById('standardIso4001Time').disabled='disabled';document.getElementById('standardIso4001Deadline').disabled='disabled';">否
					</td>
		</tr>		
		<tr>
			<td class="tdhead">认证单位</td>
			<td><input type="text"  value="<?php echo $this->_tpl_vars['standarddataArray'][0]->standardIso4001Organ; ?>
" id="standardIso4001Organ" name="standardIso4001Organ" disabled="disabled" ></td>
			<td class="tdhead">认证时间</td>
			<td><input type="text"  value="<?php echo $this->_tpl_vars['standarddataArray'][0]->standardIso4001Time; ?>
" id="standardIso4001Time" name="standardIso4001Time" class="datepicker"  disabled="disabled"></td>
			<td class="tdhead">有效期</td>
			<td><input type="text"  value="<?php echo $this->_tpl_vars['standarddataArray'][0]->standardIso4001Deadline; ?>
" id="standardIso4001Deadline" name="standardIso4001Deadline"  disabled="disabled"></td>
		</tr>
			<?php endif; ?>
			
		<tr>
			<td class='tdtitle' colspan=6>ISO9001：2008质量管理体系认证
			<?php if ($this->_tpl_vars['standarddataArray'][0]->standardIso9001 == '1'): ?>		
					<input type="radio" name="standardIso9001"  value="1" checked onclick="document.getElementById('standardIso9001Organ').removeAttribute('disabled');document.getElementById('standardIso9001Time').removeAttribute('disabled');document.getElementById('standardIso9001Deadline').removeAttribute('disabled');">是
					<input type="radio" name="standardIso9001"  value="0" onclick="document.getElementById('standardIso9001Organ').disabled='disabled';document.getElementById('standardIso9001Time').disabled='disabled';document.getElementById('standardIso9001Deadline').disabled='disabled';">否
					</td>
		</tr>		
		<tr>
			<td class="tdhead">认证单位</td>
			<td><input type="text"  value="<?php echo $this->_tpl_vars['standarddataArray'][0]->standardIso9001Organ; ?>
" id="standardIso9001Organ" name="standardIso9001Organ"  ></td>
			<td class="tdhead">认证时间</td>
			<td><input type="text"  value="<?php echo $this->_tpl_vars['standarddataArray'][0]->standardIso9001Time; ?>
" id="standardIso9001Time" name="standardIso9001Time" class="datepicker"  ></td>
			<td class="tdhead">有效期</td>
			<td><input type="text"  value="<?php echo $this->_tpl_vars['standarddataArray'][0]->standardIso9001Deadline; ?>
" id="standardIso9001Deadline" name="standardIso9001Deadline"  ></td>
		</tr>
			<?php else: ?>		
					<input type="radio" name="standardIso9001"  value="1" onclick="document.getElementById('standardIso9001Organ').removeAttribute('disabled');document.getElementById('standardIso9001Time').removeAttribute('disabled');document.getElementById('standardIso9001Deadline').removeAttribute('disabled');">是
					<input type="radio" name="standardIso9001"  value="0" checked onclick="document.getElementById('standardIso9001Organ').disabled='disabled';document.getElementById('standardIso9001Time').disabled='disabled';document.getElementById('standardIso9001Deadline').disabled='disabled';">否
					</td>
		</tr>		
		<tr>
			<td class="tdhead">认证单位</td>
			<td><input type="text"  value="<?php echo $this->_tpl_vars['standarddataArray'][0]->standardIso9001Organ; ?>
" id="standardIso9001Organ" name="standardIso9001Organ"  disabled="disabled"></td>
			<td class="tdhead">认证时间</td>
			<td><input type="text"  value="<?php echo $this->_tpl_vars['standarddataArray'][0]->standardIso9001Time; ?>
" id="standardIso9001Time" name="standardIso9001Time" class="datepicker"  disabled="disabled" ></td>
			<td class="tdhead">有效期</td>
			<td><input type="text"  value="<?php echo $this->_tpl_vars['standarddataArray'][0]->standardIso9001Deadline; ?>
" id="standardIso9001Deadline" name="standardIso9001Deadline"  disabled="disabled"></td>
		</tr>
			<?php endif; ?>
								
    </table>
    </div>

	<div id="tabs-4"><!--综合利用-->
<?php $_from = $this->_tpl_vars['oredataand35Array']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['o']):
?>
	
	<?php if ($this->_tpl_vars['o'][0] == '煤矿' && $this->_tpl_vars['o'][1] == '主矿种'): ?>
	    <table class="formView" align="center" id="complex" width="100%">
		
		<!-- <tr>	
			<td class="tdhead" width="20%">采出资源量</td><td width="10%"><input type="text"  value="<?php echo $this->_tpl_vars['complexdataArray'][0]->complexGobackDig; ?>
" name="complexGobackDig"  ></td>
			<td class="tdhead" width="20%">动用资源储量</td><td width="10%"><input type="text"  value="<?php echo $this->_tpl_vars['complexdataArray'][0]->complexGobackUse; ?>
" name="complexGobackUse"  ></td>
		</tr> -->
		<tr>
			<td class="tdtitle" colspan=4 style="background:#CCFFFF">主矿种：<?php echo $this->_tpl_vars['o'][0]; ?>
</td>
		</tr>
		<tr>
			<td class="tdhead">采区回采率(%)</td>
			<td width="30%">
				<input type="text"  value="<?php echo $this->_tpl_vars['o'][315]; ?>
" name="meiCqhc[]" style="width:80px">
				<input type="button" class="button_xiangqing" value="详情" style="width:50px"/>
				<input type="button" class="button_gongshi" value="公式" data="kchc" style="width:50px"/>
			</td>
			<td class="tdhead">原煤入选率(%)</td>
			<td width="30%">
				<input type="text"  value="<?php echo $this->_tpl_vars['o'][329]; ?>
" name="meiYmrx[]" style="width:80px"><input type="button" class="button_xiangqing1" value="详情" style="width:50px"/>
				<input type="button" class="button_gongshi" value="公式" data="xkhs"  style="width:50px"/>
			</td>
		</tr>
	</table>

	<table align="center" style="display:none;" class="formView" id="ore53xkhs">
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-2; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][316]; ?>
" name="meiCqhc3qiansj[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-1; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][317]; ?>
" name="meiCqhc2qiansj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][318]; ?>
" name="meiCqhc1qiansj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][319]; ?>
" name="meiCqhc1houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][320]; ?>
" name="meiCqhc1housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][321]; ?>
" name="meiCqhc2houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][322]; ?>
" name="meiCqhc2housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][323]; ?>
" name="meiCqhc3houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][324]; ?>
" name="meiCqhc3housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][325]; ?>
" name="meiCqhc4houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][326]; ?>
" name="meiCqhc4housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][327]; ?>
" name="meiCqhc5houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][328]; ?>
" name="meiCqhc5housj[]"></td>	  
		</tr>
	</table>
	<table align="center" style="display:none;" class="formView" id="ore53xkhs">
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-2; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][330]; ?>
" name="meiYmrx3qiansj[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-1; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][331]; ?>
" name="meiYmrx2qiansj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][332]; ?>
" name="meiYmrx1qiansj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][333]; ?>
" name="meiYmrx1houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][334]; ?>
" name="meiYmrx1housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][335]; ?>
" name="meiYmrx2houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][336]; ?>
" name="meiYmrx2housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][337]; ?>
" name="meiYmrx3houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][338]; ?>
" name="meiYmrx3housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][339]; ?>
" name="meiYmrx4houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][340]; ?>
" name="meiYmrx4housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][341]; ?>
" name="meiYmrx5houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][342]; ?>
" name="meiYmrx5housj[]"></td>	  
		</tr>
	</table>
	<!-- <div>
		
	</div> -->
	<table class="formView" align="center" width="100%">
		<tr>
				<td class="tdhead" colspan=4>煤矸石与共伴生资源综合利用率(%)<input type="text"value="<?php echo $this->_tpl_vars['o'][343]; ?>
"  name="meiMgsgbs[]"><input type="button" class="button_xiangqing" value="详情"/><input type="button" class="button_gongshi" value="公式" data="cxzh" style="width:50px"/></td>
		</tr>
	</table><!-- 煤矸石与共伴生资源综合利用率 -->
	<table align="center" style="display:none;" class="formView" id="ore53xkhs">
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-2; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][344]; ?>
" name="meiMgsgbs3qiansj[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-1; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][345]; ?>
" name="meiMgsgbs2qiansj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][346]; ?>
" name="meiMgsgbs1qiansj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][347]; ?>
" name="meiMgsgbs1houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][348]; ?>
" name="meiMgsgbs1housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][349]; ?>
" name="meiMgsgbs2houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][350]; ?>
" name="meiMgsgbs2housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][351]; ?>
" name="meiMgsgbs3houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][352]; ?>
" name="meiMgsgbs3housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][353]; ?>
" name="meiMgsgbs4houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][354]; ?>
" name="meiMgsgbs4housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][355]; ?>
" name="meiMgsgbs5houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][356]; ?>
" name="meiMgsgbs5housj[]"></td>	  
		</tr>
	</table> <!-- 5-3 -->
	<table class="formView" align="center" width="100%">
		<tr>
			<td class="tdhead">矿井水综合利用率(%)</td><td width="30%"><input type="text"  value="<?php echo $this->_tpl_vars['o'][357]; ?>
" name="meiKjs[]" style="width:80px"><input type="button" class="button_xiangqing" value="详情" style="width:50px"/><input type="button" class="button_complexAllback" value="公式" style="width:50px"/></td>
			<td class="tdhead">煤矸石综合利用率(%)</td><td width="30%"><input type="text"  value="<?php echo $this->_tpl_vars['o'][371]; ?>
" name="meiMgszhly[]" style="width:80px"><input type="button" class="button_xiangqing1" value="详情" style="width:50px"/><input type="button" class="button_complexAllback" value="公式" style="width:50px"/></td>
		</tr>
	</table><!-- 矿井水综合利用率 -->
	<table align="center" style="display:none;" class="formView" id="ore53xkhs">
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-2; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][358]; ?>
" name="meiKjs3qiansj[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-1; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][359]; ?>
" name="meiKjs2qiansj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][360]; ?>
" name="meiKjs1qiansj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][361]; ?>
" name="meiKjs1houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][362]; ?>
" name="meiKjs1housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][363]; ?>
" name="meiKjs2houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][364]; ?>
" name="meiKjs2housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][365]; ?>
" name="meiKjs3houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][366]; ?>
" name="meiKjs3housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][367]; ?>
" name="meiKjs4houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][368]; ?>
" name="meiKjs4housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][369]; ?>
" name="meiKjs5houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][370]; ?>
" name="meiKjs5housj[]"></td>	  
		</tr>
	</table>  <!-- 5-3 -->

	<table align="center" style="display:none;" class="formView" id="ore53xkhs">
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-2; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][372]; ?>
" name="meiMgszhly3qiansj[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-1; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][373]; ?>
" name="meiMgszhly2qiansj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][374]; ?>
" name="meiMgszhly1qiansj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][375]; ?>
" name="meiMgszhly1houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][376]; ?>
" name="meiMgszhly1housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][377]; ?>
" name="meiMgszhly2houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][378]; ?>
" name="meiMgszhly2housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][379]; ?>
" name="meiMgszhly3houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][380]; ?>
" name="meiMgszhly3housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][381]; ?>
" name="meiMgszhly4houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][382]; ?>
" name="meiMgszhly4housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][383]; ?>
" name="meiMgszhly5houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][384]; ?>
" name="meiMgszhly5housj[]"></td>	  
		</tr>
	</table>



	<?php elseif ($this->_tpl_vars['o'][1] == '主矿种'): ?>
	<table class="formView" align="center" width="100%">
		<tr>
			<td class="tdtitle" colspan=4 style="background:#CCFFFF">主矿种：<?php echo $this->_tpl_vars['o'][0]; ?>
</td>
		</tr>
		<tr>
			<td class="tdhead">开采回采率(%)</td><td width="30%"><input type="text"  value="<?php echo $this->_tpl_vars['o'][119]; ?>
" name="kaicaihuicai[]" style="width:80px"><input type="button" class="button_xiangqing" value="详情" style="width:50px"/><input type="button" class="button_gongshi" value="公式" data="kchc" style="width:50px"/></td>
			<td class="tdhead">选矿回收率(%)</td><td width="30%"><input type="text"  value="<?php echo $this->_tpl_vars['o'][133]; ?>
" name="xkhs[]" style="width:80px"><input type="button" class="button_xiangqing1" value="详情" style="width:50px"/><input type="button" class="button_gongshi" value="公式" data="xkhs" style="width:50px"/></td>
		</tr>
	</table><!-- 开采回采率 -->
	<table align="center" style="display:none;" class="formView" id="ore53xkhs">
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-2; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][120]; ?>
" name="kaicaihuicai3qiansj[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-1; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][121]; ?>
" name="kaicaihuicai2qiansj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][122]; ?>
" name="kaicaihuicai1qiansj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][123]; ?>
" name="kaicaihuicai1houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][124]; ?>
" name="kaicaihuicai1housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][125]; ?>
" name="kaicaihuicai2houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][126]; ?>
" name="kaicaihuicai2housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][127]; ?>
" name="kaicaihuicai3houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][128]; ?>
" name="kaicaihuicai3housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][129]; ?>
" name="kaicaihuicai4houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][130]; ?>
" name="kaicaihuicai4housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][131]; ?>
" name="kaicaihuicai5houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][132]; ?>
" name="kaicaihuicai5housj[]"></td>	  
		</tr>
	</table><!-- 5-3 -->
	<table align="center" style="display:none;" class="formView" id="ore53xkhs">
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-2; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][134]; ?>
" name="xkhs3qiansj[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-1; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][135]; ?>
" name="xkhs2qiansj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][136]; ?>
" name="xkhs1qiansj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][137]; ?>
" name="xkhs1houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][138]; ?>
" name="xkhs1housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][139]; ?>
" name="xkhs2houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][140]; ?>
" name="xkhs2housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][141]; ?>
" name="xkhs3houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][142]; ?>
" name="xkhs3housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][143]; ?>
" name="xkhs4houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][144]; ?>
" name="xkhs4housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][145]; ?>
" name="xkhs5houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][146]; ?>
" name="xkhs5housj[]"></td>	  
		</tr>
	</table><!-- 5-3 -->
	
	<table class="formView" align="center" width="100%">
		<tr>
			<td class="tdhead">采选综合回收率(%)</td><td width="30%"><input type="text"  value="<?php echo $this->_tpl_vars['o'][147]; ?>
" name="caixuanzh[]" style="width:80px"><input type="button" class="button_xiangqing" value="详情" style="width:50px"/><input type="button" class="button_gongshi" value="公式" data="cxzh" style="width:50px"/></td>
			<td class="tdhead">综合利用率(%)</td><td width="30%"><input type="text"  value="<?php echo $this->_tpl_vars['o'][161]; ?>
" name="zhly[]" style="width:80px"><input type="button" class="button_xiangqing1" value="详情" style="width:50px"/><input type="button" class="button_gongshi" value="公式" data="zhly" style="width:50px"/></td>
		</tr>
	</table><!-- 采选综合回收率 -->
	<table align="center" style="display:none;" class="formView" id="ore53xkhs">
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-2; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][148]; ?>
" name="caixuanzh3qiansj[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-1; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][149]; ?>
" name="caixuanzh2qiansj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][150]; ?>
" name="caixuanzh1qiansj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][151]; ?>
" name="caixuanzh1houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][152]; ?>
" name="caixuanzh1housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][153]; ?>
" name="caixuanzh2houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][154]; ?>
" name="caixuanzh2housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][155]; ?>
" name="caixuanzh3houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][156]; ?>
" name="caixuanzh3housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][157]; ?>
" name="caixuanzh4houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][158]; ?>
" name="caixuanzh4housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][159]; ?>
" name="caixuanzh5houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][160]; ?>
" name="caixuanzh5housj[]"></td>	  
		</tr>
	</table><!-- 5-3 -->
	<table align="center" style="display:none;" class="formView" id="ore53xkhs">
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-2; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][162]; ?>
" name="zhly3qiansj[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-1; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][163]; ?>
" name="zhly2qiansj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][164]; ?>
" name="zhly1qiansj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][165]; ?>
" name="zhly1houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][166]; ?>
" name="zhly1housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][167]; ?>
" name="zhly2houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][168]; ?>
" name="zhly2housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][169]; ?>
" name="zhly3houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][170]; ?>
" name="zhly3housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][171]; ?>
" name="zhly4houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][172]; ?>
" name="zhly4housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][173]; ?>
" name="zhly5houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][174]; ?>
" name="zhly5housj[]"></td>	  
		</tr>
	</table><!-- 5-3 -->

	<table class="formView" align="center" width="100%">
		<tr>
			<td class="tdhead">矿产资源综合利用率(%)</td><td width="30%"><input type="text"  value="<?php echo $this->_tpl_vars['o'][175]; ?>
" name="kczyzhly[]" style="width:80px"><input type="button" class="button_xiangqing" value="详情" style="width:50px"/><input type="button" class="button_gongshi" value="公式" data="kczyzhly" style="width:50px"/></td>
			<td class="tdhead">矿产资源总回收率(%)</td><td width="30%"><input type="text"  value="<?php echo $this->_tpl_vars['o'][189]; ?>
" name="kczyzongzhly[]" style="width:80px"><input type="button" class="button_xiangqing1" value="详情" style="width:50px"/><input type="button" class="button_gongshi" value="公式" data="kczyzhs" style="width:50px"/></td>
		</tr>
	</table><!-- 矿产资源综合利用率 -->
	<table align="center" style="display:none;" class="formView" id="ore53xkhs">
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-2; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][176]; ?>
" name="kczyzhly3qiansj[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-1; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][177]; ?>
" name="kczyzhly2qiansj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][178]; ?>
" name="kczyzhly1qiansj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][179]; ?>
" name="kczyzhly1houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][180]; ?>
" name="kczyzhly1housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][181]; ?>
" name="kczyzhly2houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][182]; ?>
" name="kczyzhly2housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][183]; ?>
" name="kczyzhly3houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][184]; ?>
" name="kczyzhly3housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][185]; ?>
" name="kczyzhly4houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][186]; ?>
" name="kczyzhly4housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][187]; ?>
" name="kczyzhly5houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][188]; ?>
" name="kczyzhly5housj[]"></td>	  
		</tr>
	</table><!-- 5-3 -->
	<table align="center" style="display:none;" class="formView" id="ore53xkhs">
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-2; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][190]; ?>
" name="kczyzongzhly3qiansj[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-1; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][191]; ?>
" name="kczyzongzhly2qiansj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][192]; ?>
" name="kczyzongzhly1qiansj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][193]; ?>
" name="kczyzongzhly1houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][194]; ?>
" name="kczyzongzhly1housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][195]; ?>
" name="kczyzongzhly2houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][196]; ?>
" name="kczyzongzhly2housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][197]; ?>
" name="kczyzongzhly3houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][198]; ?>
" name="kczyzongzhly3housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][199]; ?>
" name="kczyzongzhly4houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][200]; ?>
" name="kczyzongzhly4housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][201]; ?>
" name="kczyzongzhly5houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][202]; ?>
" name="kczyzongzhly5housj[]"></td>	  
		</tr>
	</table><!-- 5-3 -->

	<table class="formView" align="center" width="100%">
		<tr>
			<td class="tdhead">冶炼回收率(%)</td><td width="30%"><input type="text"  value="<?php echo $this->_tpl_vars['o'][203]; ?>
" name="ylhs[]" style="width:80px"><input type="button" class="button_xiangqing" value="详情" style="width:50px"/><input type="button" class="button_gongshi" value="公式" style="width:50px"/></td>
			<td class="tdhead">共伴生矿资源综合利用率(%)</td><td width="30%"><input type="text"  value="<?php echo $this->_tpl_vars['o'][217]; ?>
" name="gongbansheng[]" style="width:80px"><input type="button" class="button_xiangqing1" value="详情" style="width:50px"/><input type="button" class="button_gongshi" value="公式" style="width:50px"/></td>
		</tr>
	</table><!-- 冶炼回收率 -->
	<table align="center" style="display:none;" class="formView" id="ore53xkhs">
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-2; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][204]; ?>
" name="ylhs3qiansj[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-1; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][205]; ?>
" name="ylhs2qiansj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][206]; ?>
" name="ylhs1qiansj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][207]; ?>
" name="ylhs1houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][208]; ?>
" name="ylhs1housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][209]; ?>
" name="ylhs2houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][210]; ?>
" name="ylhs2housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][211]; ?>
" name="ylhs3houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][212]; ?>
" name="ylhs3housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][213]; ?>
" name="ylhs4houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][214]; ?>
" name="ylhs4housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][215]; ?>
" name="ylhs5houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][216]; ?>
" name="ylhs5housj[]"></td>	  
		</tr>
	</table>	<!-- 5-3 -->
	<table align="center" style="display:none;" class="formView" id="ore53xkhs">
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-2; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][218]; ?>
" name="gongbansheng3qiansj[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-1; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][219]; ?>
" name="gongbansheng2qiansj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][220]; ?>
" name="gongbansheng1qiansj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][221]; ?>
" name="gongbansheng1houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][222]; ?>
" name="gongbansheng1housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][223]; ?>
" name="gongbansheng2houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][224]; ?>
" name="gongbansheng2housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][225]; ?>
" name="gongbansheng3houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][226]; ?>
" name="gongbansheng3housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][227]; ?>
" name="gongbansheng4houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][228]; ?>
" name="gongbansheng4housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][229]; ?>
" name="gongbansheng5houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][230]; ?>
" name="gongbansheng5housj[]"></td>	  
		</tr>
	</table>	<!-- 5-3 -->

	<table class="formView" align="center" width="100%">
		<tr>
			<td class="tdhead">矿井水综合利用率(%)</td><td width="30%"><input type="text"  value="<?php echo $this->_tpl_vars['o'][231]; ?>
" name="jingshui[]" style="width:80px"><input type="button" class="button_xiangqing" value="详情" style="width:50px"/><input type="button" class="button_complexAllback" value="公式" style="width:50px"/></td>
			<td class="tdhead">尾矿综合利用率(%)</td><td width="30%"><input type="text"  value="<?php echo $this->_tpl_vars['o'][245]; ?>
" name="weikuang[]" style="width:80px"><input type="button" class="button_xiangqing1" value="详情" style="width:50px"/><input type="button" class="button_gongshi1" value="公式" style="width:50px"/></td>
		</tr>
	</table><!-- 矿井水综合利用率 -->
	<table align="center" style="display:none;" class="formView" id="ore53xkhs">
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-2; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][232]; ?>
" name="jingshui3qiansj[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-1; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][233]; ?>
" name="jingshui2qiansj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][234]; ?>
" name="jingshui1qiansj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][235]; ?>
" name="jingshui1houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][236]; ?>
" name="jingshui1housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][237]; ?>
" name="jingshui2houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][238]; ?>
" name="jingshui2housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][239]; ?>
" name="jingshui3houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][240]; ?>
" name="jingshui3housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][241]; ?>
" name="jingshui4houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][242]; ?>
" name="jingshui4housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][243]; ?>
" name="jingshui5houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][244]; ?>
" name="jingshui5housj[]"></td>	  
		</tr>
	</table>	<!-- 5-3 -->
	<table align="center" style="display:none;" class="formView" id="ore53xkhs">
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-2; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][246]; ?>
" name="weikuang3qiansj[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-1; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][247]; ?>
" name="weikuang2qiansj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][248]; ?>
" name="weikuang1qiansj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][249]; ?>
" name="weikuang1houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][250]; ?>
" name="weikuang1housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][251]; ?>
" name="weikuang2houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][252]; ?>
" name="weikuang2housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][253]; ?>
" name="weikuang3houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][254]; ?>
" name="weikuang3housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][255]; ?>
" name="weikuang4houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][256]; ?>
" name="weikuang4housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][257]; ?>
" name="weikuang5houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][258]; ?>
" name="weikuang5housj[]"></td>	  
		</tr>
	</table>	<!-- 5-3 -->

	<table class="formView" align="center" width="100%">
		<tr>
			<td class="tdhead">废气综合利用率(%)</td><td width="30%"><input type="text"  value="<?php echo $this->_tpl_vars['o'][259]; ?>
" name="feiqi[]" style="width:80px"><input type="button" class="button_xiangqing" value="详情" style="width:50px"/><input type="button" class="button_complexAllback" value="公式" style="width:50px"/></td>
			<td class="tdhead">废渣综合利用率(%)</td><td width="30%"><input type="text"  value="<?php echo $this->_tpl_vars['o'][273]; ?>
" name="feizha[]" style="width:80px"><input type="button" class="button_xiangqing1" value="详情" style="width:50px"/><input type="button" class="button_complexAllback" value="公式" style="width:50px"/></td>
		</tr>
	</table>	<!-- 废气综合利用率 -->
	<table align="center" style="display:none;" class="formView" id="ore53xkhs">
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-2; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][260]; ?>
" name="feiqi3qiansj[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-1; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][261]; ?>
" name="feiqi2qiansj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][262]; ?>
" name="feiqi1qiansj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][263]; ?>
" name="feiqi1houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][264]; ?>
" name="feiqi1housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][265]; ?>
" name="feiqi2houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][266]; ?>
" name="feiqi2housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][267]; ?>
" name="feiqi3houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][268]; ?>
" name="feiqi3housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][269]; ?>
" name="feiqi4houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][270]; ?>
" name="feiqi4housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][271]; ?>
" name="feiqi5houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][272]; ?>
" name="feiqi5housj[]"></td>	  
		</tr>
	</table>	<!-- 5-3 -->
	<table align="center" style="display:none;" class="formView" id="ore53xkhs">
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-2; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][274]; ?>
" name="feizha3qiansj[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-1; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][275]; ?>
" name="feizha2qiansj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][276]; ?>
" name="feizha1qiansj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][277]; ?>
" name="feizha1houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][278]; ?>
" name="feizha1housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][279]; ?>
" name="feizha2houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][280]; ?>
" name="feizha2housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][281]; ?>
" name="feizha3houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][282]; ?>
" name="feizha3housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][283]; ?>
" name="feizha4houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][284]; ?>
" name="feizha4housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][285]; ?>
" name="feizha5houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][286]; ?>
" name="feizha5housj[]"></td>	  
		</tr>
	</table>	<!-- 5-3 -->

	<table class="formView" align="center" width="100%">
		<tr>
			<td class="tdhead">贫化率(%)</td><td width="30%"><input type="text"  value="<?php echo $this->_tpl_vars['o'][287]; ?>
" name="pinhua[]" style="width:80px"><input type="button" class="button_xiangqing" value="详情" style="width:50px"/><input type="button" class="button_complexAllback" value="公式" style="width:50px"/></td>
			<td class="tdhead">产率(%)</td><td width="30%"><input type="text"  value="<?php echo $this->_tpl_vars['o'][301]; ?>
" name="chanlv[]" style="width:80px"><input type="button" class="button_xiangqing1" value="详情" style="width:50px"/><input type="button" class="button_complexAllback" value="公式" style="width:50px"/></td>
		</tr>
	</table><!-- 贫化率 -->
	<table align="center" style="display:none;" class="formView" id="ore53xkhs">
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-2; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][288]; ?>
" name="pinhua3qiansj[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-1; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][289]; ?>
" name="pinhua2qiansj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][290]; ?>
" name="pinhua1qiansj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][291]; ?>
" name="pinhua1houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][292]; ?>
" name="pinhua1housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][293]; ?>
" name="pinhua2houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][294]; ?>
" name="pinhua2housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][295]; ?>
" name="pinhua3houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][296]; ?>
" name="pinhua3housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][297]; ?>
" name="pinhua4houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][298]; ?>
" name="pinhua4housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][299]; ?>
" name="pinhua5houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][300]; ?>
" name="pinhua5housj[]"></td>	  
		</tr>
	</table>	<!-- 5-3 -->
	<table align="center" style="display:none;" class="formView" id="ore53xkhs">
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-2; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][302]; ?>
" name="chanlv3qiansj[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-1; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][303]; ?>
" name="chanlv2qiansj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][304]; ?>
" name="chanlv1qiansj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][305]; ?>
" name="chanlv1houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][306]; ?>
" name="chanlv1housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][307]; ?>
" name="chanlv2houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][308]; ?>
" name="chanlv2housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][309]; ?>
" name="chanlv3houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][310]; ?>
" name="chanlv3housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][311]; ?>
" name="chanlv4houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][312]; ?>
" name="chanlv4housj[]"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][313]; ?>
" name="chanlv5houjh[]"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][314]; ?>
" name="chanlv5housj[]"></td>	  
		</tr>
	</table>	<!-- 5-3 -->

<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>

<?php $_from = $this->_tpl_vars['oredataand35Array']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['o']):
?>

<?php if ($this->_tpl_vars['o'][1] == '伴生矿种'): ?>
	<table class="formView" align="center" width="100%">
		<tr>
			<tr>
			<td class="tdtitle" colspan=4 style="background:#CCFFFF">共伴生矿种：<?php echo $this->_tpl_vars['o'][0]; ?>
</td>
			</tr>
				<td class="tdhead">选矿回收率(%)</td><td width="30%"><input type="text"  value="<?php echo $this->_tpl_vars['o'][385]; ?>
" name="gbsXkhs[]" style="width:80px"><input type="button" class="button_xiangqing" value="详情" style="width:50px"/><input type="button" class="button_complexAllback" value="公式" style="width:50px"/></td>
				<td class="tdhead">冶炼回收率(%)</td><td width="30%"><input type="text"  value="<?php echo $this->_tpl_vars['o'][399]; ?>
" name="gbsYlhs[]" style="width:80px"><input type="button" class="button_xiangqing1" value="详情" style="width:50px"/><input type="button" class="button_complexAllback" value="公式" style="width:50px"/></td>
		</tr>
	</table>
	<table align="center" style="display:none;" class="formView" id="ore53xkhs">
						<tr>
							<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-2; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][386]; ?>
" name="gbsXkhs3qiansj[]"></td>
							<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-1; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][387]; ?>
" name="gbsXkhs2qiansj[]"></td>
						</tr>
						<tr>
							<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][388]; ?>
" name="gbsXkhs1qiansj[]"></td>
						</tr>
						<tr>
							<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][389]; ?>
" name="gbsXkhs1houjh[]"></td>
							<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][390]; ?>
" name="gbsXkhs1housj[]"></td>
						</tr>
						<tr>
							<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][391]; ?>
" name="gbsXkhs2houjh[]"></td>
							<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][392]; ?>
" name="gbsXkhs2housj[]"></td>
						</tr>
						<tr>
							<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][393]; ?>
" name="gbsXkhs3houjh[]"></td>
							<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][394]; ?>
" name="gbsXkhs3houjs[]"></td>
						</tr>
						<tr>
							<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][395]; ?>
" name="gbsXkhs4houjh[]"></td>
							<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][396]; ?>
" name="gbsXkhs4housj[]"></td>
						</tr>
						<tr>
							<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][397]; ?>
" name="gbsXkhs5houjh[]"></td>
							<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][398]; ?>
" name="gbsXkhs5housj[]"></td>	  
						</tr>
			</table>
	<table align="center" style="display:none;" class="formView" id="ore53xkhs">
						<tr>
							<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-2; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][400]; ?>
" name="gbsXkhs3qiansj[]"></td>
							<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-1; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][401]; ?>
" name="gbsXkhs2qiansj[]"></td>
						</tr>
						<tr>
							<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][402]; ?>
" name="gbsXkhs1qiansj[]"></td>
						</tr>
						<tr>
							<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][403]; ?>
" name="gbsXkhs1houjh[]"></td>
							<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][404]; ?>
" name="gbsXkhs1housj[]"></td>
						</tr>
						<tr>
							<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][405]; ?>
" name="gbsXkhs2houjh[]"></td>
							<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][406]; ?>
" name="gbsXkhs2housj[]"></td>
						</tr>
						<tr>
							<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][407]; ?>
" name="gbsXkhs3houjh[]"></td>
							<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][408]; ?>
" name="gbsXkhs3housj[]"></td>
						</tr>
						<tr>
							<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][409]; ?>
" name="gbsXkhs4houjh[]"></td>
							<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][410]; ?>
" name="gbsXkhs4housj[<?php echo $this->_tpl_vars['o'][22]; ?>
][]"></td>
						</tr>
						<tr>
							<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['o'][411]; ?>
" name="gbsXkhs5houjh[]"></td>
							<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['o'][412]; ?>
" name="gbsXkhs5housj[]"></td>	  
						</tr>
			</table>
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
	<table class="formView" align="center" width="100%">
		<tr>
			<td class="tdtitle" style="background:#FFCC99" colspan=4>矿山三率指标条件</td>
		</tr>
		<?php $_from = $this->_tpl_vars['oredataand35Array']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['o']):
?>
		<tr>
			<td class='tdtitle' colspan=4> <?php echo $this->_tpl_vars['o'][1]; ?>
:<?php echo $this->_tpl_vars['o'][0]; ?>
</td>
		</tr>
				<td colspan=4>
				<table class="formView" align="center" width="90%">
					<tr>
						<td class="tdtitle" style="font:bold 14px" colspan=4>

							<?php if ($this->_tpl_vars['o'][0] == '煤矿'): ?>原煤入选率指标条件<?php else: ?>选矿回收率指标条件<?php endif; ?><input type="button" onclick="addxkhslv(this.id,'<?php echo $this->_tpl_vars['o'][22]; ?>
','<?php echo $this->_tpl_vars['o'][107]; ?>
','<?php echo $this->_tpl_vars['o'][108]; ?>
','<?php echo $this->_tpl_vars['o'][109]; ?>
','<?php echo $this->_tpl_vars['o'][110]; ?>
','<?php echo $this->_tpl_vars['o'][111]; ?>
','<?php echo $this->_tpl_vars['o'][112]; ?>
');" id='xkhsbtn<?php echo $this->_tpl_vars['o'][22]; ?>
' value="添加"/>
						</td>
					</tr>
				</table>

			  	<?php $_from = $this->_tpl_vars['xkhsdataArray']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['l']):
?>
					<?php if ($this->_tpl_vars['l'][0] == $this->_tpl_vars['o'][100]): ?>	
				<table class="formView" align="center" id="orexkhsbtn<?php echo $this->_tpl_vars['o'][22]; ?>
" width="90%">	
							
					<tr>	
						<td class="tdhead" width="20%"><?php echo $this->_tpl_vars['o'][107]; ?>
</td><td width="10%"><input type="text"  value="<?php echo $this->_tpl_vars['l'][1]; ?>
" name="orexuankuanghuishou1[<?php echo $this->_tpl_vars['o'][22]; ?>
][]" id="orexuankuanghuishou1<?php echo $this->_tpl_vars['l'][30]; ?>
" ></td>
						<td class="tdhead" width="20%"><?php echo $this->_tpl_vars['o'][108]; ?>
</td><td width="10%"><input type="text"  value="<?php echo $this->_tpl_vars['l'][2]; ?>
" name="orexuankuanghuishou2[<?php echo $this->_tpl_vars['o'][22]; ?>
][]" id="orexuankuanghuishou2<?php echo $this->_tpl_vars['l'][30]; ?>
"  ></td>
					</tr>
					<tr>
						<td class="tdhead" width="20%"><?php echo $this->_tpl_vars['o'][109]; ?>
</td><td width="10%"><input type="text"  value="<?php echo $this->_tpl_vars['l'][3]; ?>
" name="orexuankuanghuishou3[<?php echo $this->_tpl_vars['o'][22]; ?>
][]" id="orexuankuanghuishou3<?php echo $this->_tpl_vars['l'][30]; ?>
"></td>
						<td class="tdhead" width="20%"><?php echo $this->_tpl_vars['o'][110]; ?>
</td><td width="10%"><input type="text"  value="<?php echo $this->_tpl_vars['l'][4]; ?>
" name="orexuankuanghuishou4[<?php echo $this->_tpl_vars['o'][22]; ?>
][]" id="orexuankuanghuishou4<?php echo $this->_tpl_vars['l'][30]; ?>
"></td>
					</tr>
					<tr>	
						<td class="tdhead" width="20%"><?php echo $this->_tpl_vars['o'][111]; ?>
</td><td width="10%"><input type="text"  value="<?php echo $this->_tpl_vars['l'][5]; ?>
" name="orexuankuanghuishou5[<?php echo $this->_tpl_vars['o'][22]; ?>
][]" id="orexuankuanghuishou5<?php echo $this->_tpl_vars['l'][30]; ?>
"></td>
						
						<td class="tdhead" width="20%"><?php echo $this->_tpl_vars['o'][112]; ?>
</td><td width="10%"><input type="text"  value="<?php echo $this->_tpl_vars['l'][6]; ?>
" name="orexuankuanghuishou6[<?php echo $this->_tpl_vars['o'][22]; ?>
][]" id="orexuankuanghuishou6<?php echo $this->_tpl_vars['l'][30]; ?>
"></td>
					</tr>
				
					<tr>
						<td class="tdhead" colspan=4 width="90%"><?php if ($this->_tpl_vars['o'][0] == '煤矿'): ?>原煤入选率(%)<?php else: ?>选矿回收率(%)<?php endif; ?><?php if ($this->_tpl_vars['l'][7] < $this->_tpl_vars['l'][23]): ?><input type="text" value="<?php echo $this->_tpl_vars['l'][7]; ?>
" style="background:red" name="orexuankuanghuishouvalue[<?php echo $this->_tpl_vars['o'][22]; ?>
][]" id="orexuankuanghuishouvalue<?php echo $this->_tpl_vars['l'][30]; ?>
"><?php else: ?><input type="text" value="<?php echo $this->_tpl_vars['l'][7]; ?>
" name="orexuankuanghuishouvalue[<?php echo $this->_tpl_vars['o'][22]; ?>
][]" id="orexuankuanghuishouvalue<?php echo $this->_tpl_vars['l'][30]; ?>
"><?php endif; ?></td>
					</tr>
				</table>
				 <script  type="text/javascript">
					$('#button_orexkhslv<?php echo $this->_tpl_vars['l'][30]; ?>
').click(function() <?php echo ' { '; ?>

						$('#ore53xkhs<?php echo $this->_tpl_vars['l'][30]; ?>
').toggle();
					<?php echo ' } '; ?>
);
				</script>

					<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?>
				<div id="orexkhsdiv<?php echo $this->_tpl_vars['o'][22]; ?>
">
					
				</div>
				
				<table class="formView" align="center" width="90%">
						<tr><td class="tdtitle" colspan=4 style="font:bold 14px">
						<?php if ($this->_tpl_vars['o'][0] == '煤矿'): ?>采区回采率指标条件<?php else: ?>开采回采率指标条件<?php endif; ?><input type="button" onclick="addkchclv(this.id, <?php echo $this->_tpl_vars['o'][22]; ?>
,'<?php echo $this->_tpl_vars['o'][101]; ?>
','<?php echo $this->_tpl_vars['o'][102]; ?>
','<?php echo $this->_tpl_vars['o'][103]; ?>
','<?php echo $this->_tpl_vars['o'][104]; ?>
','<?php echo $this->_tpl_vars['o'][105]; ?>
','<?php echo $this->_tpl_vars['o'][106]; ?>
');" id="kchcbtn<?php echo $this->_tpl_vars['o'][22]; ?>
" value="添加"/></td></tr>
				</table>
				<table class="formView" align="center" id="orekchcbtn<?php echo $this->_tpl_vars['o'][22]; ?>
" width="90%">
				<?php $_from = $this->_tpl_vars['kchcdataArray']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k']):
?>
					<?php if ($this->_tpl_vars['k'][0] == $this->_tpl_vars['o'][100]): ?>
				
					<tr>	
						<td class="tdhead" width="20%"><?php echo $this->_tpl_vars['o'][101]; ?>
</td><td width="10%"><input type="text"  value="<?php echo $this->_tpl_vars['k'][1]; ?>
" name="orekaicaihuicai1[<?php echo $this->_tpl_vars['o'][22]; ?>
][]" id="orekaicaihuicai1<?php echo $this->_tpl_vars['k'][30]; ?>
"></td>
						<td class="tdhead" width="20%"><?php echo $this->_tpl_vars['o'][102]; ?>
</td><td width="10%"><input type="text"  value="<?php echo $this->_tpl_vars['k'][2]; ?>
" name="orekaicaihuicai2[<?php echo $this->_tpl_vars['o'][22]; ?>
][]" id="orekaicaihuicai2<?php echo $this->_tpl_vars['k'][30]; ?>
" ></td>
					</tr>
					<tr>	
						<td class="tdhead" width="20%"><?php echo $this->_tpl_vars['o'][103]; ?>
</td><td width="10%"><input type="text"  value="<?php echo $this->_tpl_vars['k'][3]; ?>
" name="orekaicaihuicai3[<?php echo $this->_tpl_vars['o'][22]; ?>
][]" id="orekaicaihuicai3<?php echo $this->_tpl_vars['k'][30]; ?>
"></td>
						<td class="tdhead" width="20%"><?php echo $this->_tpl_vars['o'][104]; ?>
</td><td width="10%"><input type="text"  value="<?php echo $this->_tpl_vars['k'][4]; ?>
" name="orekaicaihuicai4[<?php echo $this->_tpl_vars['o'][22]; ?>
][]" id="orekaicaihuicai4<?php echo $this->_tpl_vars['k'][30]; ?>
"></td>
					</tr>
					<tr>	
						<td class="tdhead" width="20%"><?php echo $this->_tpl_vars['o'][105]; ?>
</td><td width="10%"><input type="text"  value="<?php echo $this->_tpl_vars['k'][5]; ?>
" name="orekaicaihuicai5[<?php echo $this->_tpl_vars['o'][22]; ?>
][]" id="orekaicaihuicai5<?php echo $this->_tpl_vars['k'][30]; ?>
"></td>
						
						<td class="tdhead" width="20%"><?php echo $this->_tpl_vars['o'][106]; ?>
</td><td width="10%"><input type="text"  value="<?php echo $this->_tpl_vars['k'][6]; ?>
" name="orekaicaihuicai6[<?php echo $this->_tpl_vars['o'][22]; ?>
][]" id="orekaicaihuicai6<?php echo $this->_tpl_vars['k'][30]; ?>
"></td>
					</tr>
					<!-- <tr>	
						<td class="tdhead" width="20%">采出资源量</td><td width="10%"><input type="text"  value="<?php echo $this->_tpl_vars['k'][8]; ?>
" name="orekaicaihuicaichu[<?php echo $this->_tpl_vars['o'][22]; ?>
][]"  ></td>
						<td class="tdhead" width="20%">动用资源储量</td><td width="10%"><input type="text"  value="<?php echo $this->_tpl_vars['k'][9]; ?>
" name="orekaicaihuicaiyong[<?php echo $this->_tpl_vars['o'][22]; ?>
][]"  ></td>
					</tr> -->
					<tr>
						<td class="tdhead" colspan=4 width="90%" ><?php if ($this->_tpl_vars['o'][0] == '煤矿'): ?>采区回采率(%)<?php else: ?>开采回采率(%)<?php endif; ?><?php if ($this->_tpl_vars['k'][7] < $this->_tpl_vars['k'][23]): ?><input type="text"  style="background:red" value="<?php echo $this->_tpl_vars['k'][7]; ?>
" name="orekaicaihuicaivalue[<?php echo $this->_tpl_vars['o'][22]; ?>
][]" id="orekaicaihuicaivalue<?php echo $this->_tpl_vars['k'][30]; ?>
"><?php else: ?><input type="text" value="<?php echo $this->_tpl_vars['k'][7]; ?>
" name="orekaicaihuicaivalue[<?php echo $this->_tpl_vars['o'][22]; ?>
][]" id="orekaicaihuicaivalue<?php echo $this->_tpl_vars['k'][30]; ?>
"><?php endif; ?><!-- <input type="button" id="button_orekchclv<?php echo $this->_tpl_vars['k'][30]; ?>
" value="详情"/> --></td>
					</tr>
				</table>
				<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?>

				<div id="orekchcdiv<?php echo $this->_tpl_vars['o'][22]; ?>
">

				</div>

				<table class="formView" align="center" width="90%">
					<tr><td colspan=4 class="tdtitle" style="font:bold 14px">综合利用率指标条件<input type="button" onclick="addzhlylv(this.id, <?php echo $this->_tpl_vars['o'][22]; ?>
,'<?php echo $this->_tpl_vars['o'][113]; ?>
','<?php echo $this->_tpl_vars['o'][114]; ?>
','<?php echo $this->_tpl_vars['o'][115]; ?>
','<?php echo $this->_tpl_vars['o'][116]; ?>
','<?php echo $this->_tpl_vars['o'][117]; ?>
','<?php echo $this->_tpl_vars['o'][118]; ?>
');" id="zhlybtn<?php echo $this->_tpl_vars['o'][22]; ?>
" value="添加"/></td></tr>
				</table>
				
				<?php $_from = $this->_tpl_vars['zhlydataArray']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['y']):
?>
				<?php if ($this->_tpl_vars['y'][0] == $this->_tpl_vars['o'][100]): ?>
				<table class="formView" align="center" id="orezhlybtn<?php echo $this->_tpl_vars['o'][22]; ?>
" width="90%">

					<tr>	
						<td class="tdhead" width="20%"><?php echo $this->_tpl_vars['o'][113]; ?>
</td><td width="10%"><input type="text"  value="<?php echo $this->_tpl_vars['y'][1]; ?>
" name="orezhly1[<?php echo $this->_tpl_vars['o'][22]; ?>
][]" id="orekaicaihuicai1<?php echo $this->_tpl_vars['y'][30]; ?>
"></td>
						<td class="tdhead" width="20%"><?php echo $this->_tpl_vars['o'][114]; ?>
</td><td width="10%"><input type="text"  value="<?php echo $this->_tpl_vars['y'][2]; ?>
" name="orezhly2[<?php echo $this->_tpl_vars['o'][22]; ?>
][]" id="orekaicaihuicai2<?php echo $this->_tpl_vars['y'][30]; ?>
" ></td>
					</tr>
					<tr>	
						<td class="tdhead" width="20%"><?php echo $this->_tpl_vars['o'][115]; ?>
</td><td width="10%"><input type="text"  value="<?php echo $this->_tpl_vars['y'][3]; ?>
" name="orezhly3[<?php echo $this->_tpl_vars['o'][22]; ?>
][]" id="orekaicaihuicai3<?php echo $this->_tpl_vars['y'][30]; ?>
"></td>
						<td class="tdhead" width="20%"><?php echo $this->_tpl_vars['o'][116]; ?>
</td><td width="10%"><input type="text"  value="<?php echo $this->_tpl_vars['y'][4]; ?>
" name="orezhly4[<?php echo $this->_tpl_vars['o'][22]; ?>
][]" id="orekaicaihuicai4<?php echo $this->_tpl_vars['y'][30]; ?>
"></td>
					</tr>
					<tr>	
						<td class="tdhead" width="20%"><?php echo $this->_tpl_vars['o'][117]; ?>
</td><td width="10%"><input type="text"  value="<?php echo $this->_tpl_vars['y'][5]; ?>
" name="orezhly5[<?php echo $this->_tpl_vars['o'][22]; ?>
][]" id="orekaicaihuicai5<?php echo $this->_tpl_vars['y'][30]; ?>
"></td>
						
						<td class="tdhead" width="20%"><?php echo $this->_tpl_vars['o'][118]; ?>
</td><td width="10%"><input type="text"  value="<?php echo $this->_tpl_vars['y'][6]; ?>
" name="orezhly6[<?php echo $this->_tpl_vars['o'][22]; ?>
][]" id="orekaicaihuicai6<?php echo $this->_tpl_vars['y'][30]; ?>
"></td>
					</tr>
					<tr>
						<td class="tdhead" colspan=4 width="20%">综合利用率(%) <?php if ($this->_tpl_vars['y'][7] < $this->_tpl_vars['y'][23]): ?><input type="text"  value="<?php echo $this->_tpl_vars['y'][7]; ?>
" style="background:red" name="complexUserate[<?php echo $this->_tpl_vars['o'][22]; ?>
][]"  ><?php else: ?><input type="text"  value="<?php echo $this->_tpl_vars['y'][7]; ?>
" name="complexUserate[<?php echo $this->_tpl_vars['o'][22]; ?>
][]"  ><?php endif; ?><!-- <input type="button" id="button_orezhlylv<?php echo $this->_tpl_vars['y'][30]; ?>
" value="详情"/> --></td>
					</tr>
				</table>						
				
				<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?>
				<div id="orezhlydiv<?php echo $this->_tpl_vars['o'][22]; ?>
">

				</div>
			</td>
		</tr>
		</tr>
		<?php endforeach; else: ?>
		<tr>
			<td align="center">无矿种信息，请转到基本信息栏添加矿种
			</td>
		</tr>
		<?php endif; unset($_from); ?>	
	    </table>
		</table>
		
	</div>


	<div id="tabs-5"><!--科技创新-->
	<table class="formView" align="center" id="science" width="100%">
		<tr>
			<td class = 'tdtitle' colspan=4>技术创新投入占工业总产值(%)<input   value="<?php echo $this->_tpl_vars['sciencedataArray'][0]->scienceRate; ?>
" name="scienceRate"><input type="button" id="button_scienceRate" value="详情"/></td>
		</tr>
	</table>
	<table align="center" style="display:none;" class="formView" id="bef3_pre5_scienceRate">
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-2; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['science35Array'][0][0]; ?>
" name="scienceRate_bef3"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-1; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['science35Array'][0][1]; ?>
" name="scienceRate_bef2"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['science35Array'][0][2]; ?>
" name="scienceRate_bef1"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['science35Array'][0][3]; ?>
" name="scienceRate_pre1"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['science35Array'][0][4]; ?>
" name="scienceRate_pre1real"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['science35Array'][0][5]; ?>
" name="scienceRate_pre2"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['science35Array'][0][6]; ?>
" name="scienceRate_pre2real"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['science35Array'][0][7]; ?>
" name="scienceRate_pre3"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['science35Array'][0][8]; ?>
" name="scienceRate_pre3real"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['science35Array'][0][9]; ?>
" name="scienceRate_pre4"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['science35Array'][0][10]; ?>
" name="scienceRate_pre4real"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['science35Array'][0][11]; ?>
" name="scienceRate_pre5"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['science35Array'][0][12]; ?>
" name="scienceRate_pre5real"></td>	  
		</tr>
	</table>
	<table class="formView" align="center" width='100%'>
		<tr>
			<td class = 'tdhead'>技术投入资金(万元)</td><td><input   value="<?php echo $this->_tpl_vars['sciencedataArray'][0]->scienceRateScimoney; ?>
" name="scienceRateScimoney"></td>	
			<td class = 'tdhead'>工业总产值(万元)</td><td><input   value="<?php echo $this->_tpl_vars['sciencedataArray'][0]->scienceRateAllmoney; ?>
" name="scienceRateAllmoney"></td>	
		</tr>
<!-- 		<tr>
			<td class = 'tdhead'>比重是否小于1%</td><td><input   value="<?php echo $this->_tpl_vars['sciencedataArray'][0]->scienceRateIsone; ?>
" name="scienceRateIsone"></td>
		</tr> -->
		<tr>
			<td class = 'tdtitle' colspan=4>专利技术</td>
		</tr>
		<tr>
			<td class = 'tdhead'>发明专利数量</td><td><input   value="<?php echo $this->_tpl_vars['sciencedataArray'][0]->sciencePatentCreat; ?>
" name="sciencePatentCreat"></td>	
			<td class = 'tdhead'>实用新型专利数量</td><td><input   value="<?php echo $this->_tpl_vars['sciencedataArray'][0]->sciencePatentNewuse; ?>
" name="sciencePatentNewuse"></td>
		</tr>
		<tr>
			<td class = 'tdtitle' colspan=4>技术人员比重</td>
		</tr>
		<tr>
			<td class = 'tdhead'>初级职称人员及比重(%)</td><td><input   value="<?php echo $this->_tpl_vars['sciencedataArray'][0]->scienceManrateLow; ?>
" name="scienceManrateLow"></td>	
			<td class = 'tdhead'>中级职称人员及比重(%)</td><td><input   value="<?php echo $this->_tpl_vars['sciencedataArray'][0]->scienceManrateMid; ?>
" name="scienceManrateMid"></td>
		</tr>
		<tr>
			<td class = 'tdhead'>高级职称人员及比重(%)</td><td><input   value="<?php echo $this->_tpl_vars['sciencedataArray'][0]->scienceManrateHigh; ?>
" name="scienceManrateHigh"></td>
			<!-- <td class = 'tdhead'>总职工人数</td><td><input   value="<?php echo $this->_tpl_vars['sciencedataArray'][0]->scienceManrateAll; ?>
" name="scienceManrateAll"></td> -->
		</tr>
	</table>
	</div>	 
	<div id="tabs-6"><!--节能减排-->
	<table class="formView" align="center" id="save_energy" width="100%">
		<tr>
			<td class = 'tdtitle' colspan=4>单位年工业总产值电耗(千瓦时/（万元*年）)<input   value="<?php echo $this->_tpl_vars['energydataArray'][0]->energyElect; ?>
" name="energyElect"><input type="button" id="button_energyElect" value="详情"/></td>
		</tr>
	</table>
	<table align="center" style="display:none;" class="formView" id="bef3_pre5_energyElect">
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-2; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['energy35Array'][0][0]; ?>
" name="energyElect_bef3"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-1; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['energy35Array'][0][1]; ?>
" name="energyElect_bef2"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['energy35Array'][0][2]; ?>
" name="energyElect_bef1"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['energy35Array'][0][3]; ?>
" name="energyElect_pre1"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['energy35Array'][0][4]; ?>
" name="energyElect_pre1real"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['energy35Array'][0][5]; ?>
" name="energyElect_pre2"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['energy35Array'][0][6]; ?>
" name="energyElect_pre2real"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['energy35Array'][0][7]; ?>
" name="energyElect_pre3"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['energy35Array'][0][8]; ?>
" name="energyElect_pre3real"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['energy35Array'][0][9]; ?>
" name="energyElect_pre4"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['energy35Array'][0][10]; ?>
" name="energyElect_pre4real"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['energy35Array'][0][11]; ?>
" name="energyElect_pre5"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['energy35Array'][0][12]; ?>
" name="energyElect_pre5real"></td>	  
		</tr>
	</table>
	<table class="formView" align="center" width='100%'>
		<tr>
			<td class = 'tdhead'>年工业用电总量(千瓦时)</td><td><input   value="<?php echo $this->_tpl_vars['energydataArray'][0]->energyElectUse; ?>
" name="energyElectUse"></td>
			<td class = 'tdhead'>年工业总产值(万元)</td><td><input   value="<?php echo $this->_tpl_vars['energydataArray'][0]->energyElectProduct; ?>
" name="energyElectProduct"></td>
		</tr>
		<tr>
			<td class = 'tdtitle' colspan=4>单位年工业总产值水耗(立方米/万元)<input   value="<?php echo $this->_tpl_vars['energydataArray'][0]->energyWater; ?>
" name="energyWater"><input type="button" id="button_energyWater" value="详情"/></td>
		</tr>
	</table>
	<table align="center" style="display:none;" class="formView" id="bef3_pre5_energyWater">
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-2; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['energy35Array'][1][0]; ?>
" name="energyWater_bef3"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-1; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['energy35Array'][1][1]; ?>
" name="energyWater_bef2"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['energy35Array'][1][2]; ?>
" name="energyWater_bef1"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['energy35Array'][1][3]; ?>
" name="energyWater_pre1"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['energy35Array'][1][4]; ?>
" name="energyWater_pre1real"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['energy35Array'][1][5]; ?>
" name="energyWater_pre2"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['energy35Array'][1][6]; ?>
" name="energyWater_pre2real"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['energy35Array'][1][7]; ?>
" name="energyWater_pre3"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['energy35Array'][1][8]; ?>
" name="energyWater_pre3real"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['energy35Array'][1][9]; ?>
" name="energyWater_pre4"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['energy35Array'][1][10]; ?>
" name="energyWater_pre4real"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['energy35Array'][1][11]; ?>
" name="energyWater_pre5"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['energy35Array'][1][12]; ?>
" name="energyWater_pre5real"></td>	  
		</tr>
	</table>
	<table class="formView" align="center" width='100%'>
		<tr>
			<td class = 'tdhead'>年工业取水总量(立方米)</td><td><input   value="<?php echo $this->_tpl_vars['energydataArray'][0]->energyWaterUse; ?>
" name="energyWaterUse"></td>
			<td class = 'tdhead'>年工业总产值(万元)</td><td><input   value="<?php echo $this->_tpl_vars['energydataArray'][0]->energyWaterProduct; ?>
" name="energyWaterProduct"></td>
		</tr>
		<tr>
			<td class = 'tdtitle' colspan=4>单位年万元工业总产值能耗(吨/万元)<input   value="<?php echo $this->_tpl_vars['energydataArray'][0]->energyEnergy; ?>
" name="energyEnergy"><input type="button" id="button_energyEnergy" value="详情"/></td>
		</tr>
	</table>
	<table align="center" style="display:none;" class="formView" id="bef3_pre5_energyEnergy">
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-2; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['energy35Array'][2][0]; ?>
" name="energyEnergy_bef3"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-1; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['energy35Array'][2][1]; ?>
" name="energyEnergy_bef2"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['energy35Array'][2][2]; ?>
" name="energyEnergy_bef1"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['energy35Array'][2][3]; ?>
" name="energyEnergy_pre1"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['energy35Array'][2][4]; ?>
" name="energyEnergy_pre1real"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['energy35Array'][2][5]; ?>
" name="energyEnergy_pre2"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['energy35Array'][2][6]; ?>
" name="energyEnergy_pre2real"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['energy35Array'][2][7]; ?>
" name="energyEnergy_pre3"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['energy35Array'][2][8]; ?>
" name="energyEnergy_pre3real"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['energy35Array'][2][9]; ?>
" name="energyEnergy_pre4"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['energy35Array'][2][10]; ?>
" name="energyEnergy_pre4real"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['energy35Array'][2][11]; ?>
" name="energyEnergy_pre5"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['energy35Array'][2][12]; ?>
" name="energyEnergy_pre5real"></td>	  
		</tr>
	</table>
	<table class="formView" align="center" width='100%'>
		<tr>
			<td class = 'tdhead'>年工业能源消费量(吨)</td><td><input   value="<?php echo $this->_tpl_vars['energydataArray'][0]->energyEnergyUse; ?>
" name="energyEnergyUse"></td>
			<td class = 'tdhead'>年工业总产值(万元)</td><td><input   value="<?php echo $this->_tpl_vars['energydataArray'][0]->energyEnergyProduct; ?>
" name="energyEnergyProduct"></td>
		</tr>
		<tr>
			<td class = 'tdtitle' colspan=4>矿山选矿废水重复利用率(%)<input   value="<?php echo $this->_tpl_vars['energydataArray'][0]->energyWaste; ?>
" name="energyWaste"><input type="button" id="button_energyWaste" value="详情"/></td>
		</tr>
	</table>
	<table align="center" style="display:none;" class="formView" id="bef3_pre5_energyWaste">
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-2; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['energy35Array'][3][0]; ?>
" name="energyWaste_bef3"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-1; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['energy35Array'][3][1]; ?>
" name="energyWaste_bef2"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['energy35Array'][3][2]; ?>
" name="energyWaste_bef1"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['energy35Array'][3][3]; ?>
" name="energyWaste_pre1"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['energy35Array'][3][4]; ?>
" name="energyWaste_pre1real"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['energy35Array'][3][5]; ?>
" name="energyWaste_pre2"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['energy35Array'][3][6]; ?>
" name="energyWaste_pre2real"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['energy35Array'][3][7]; ?>
" name="energyWaste_pre3"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['energy35Array'][3][8]; ?>
" name="energyWaste_pre3real"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['energy35Array'][3][9]; ?>
" name="energyWaste_pre4"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['energy35Array'][3][10]; ?>
" name="energyWaste_pre4real"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['energy35Array'][3][11]; ?>
" name="energyWaste_pre5"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['energy35Array'][3][12]; ?>
" name="energyWaste_pre5real"></td>	  
		</tr>
	</table>
	<table class="formView" align="center" width='100%'>
		<tr>
			<td class = 'tdhead'>重复利用废水量(立方米)</td><td><input   value="<?php echo $this->_tpl_vars['energydataArray'][0]->energyWasteUse; ?>
" name="energyWasteUse"></td>
			<td class = 'tdhead'>生产中取用的新水量(立方米)</td><td><input   value="<?php echo $this->_tpl_vars['energydataArray'][0]->energyWasteNew; ?>
" name="energyWasteNew"></td>
		</tr>
		<tr>
			<td class = 'tdtitle' colspan=4>矿山固体废弃物综合利用率(%)<input   value="<?php echo $this->_tpl_vars['energydataArray'][0]->energyRubbish; ?>
" name="energyRubbish"><input type="button" id="button_energyRubbish" value="详情"/></td>
		</tr>
	</table>
	<table align="center" style="display:none;" class="formView" id="bef3_pre5_energyRubbish">
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-2; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['energy35Array'][4][0]; ?>
" name="energyRubbish_bef3"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-1; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['energy35Array'][4][1]; ?>
" name="energyRubbish_bef2"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['energy35Array'][4][2]; ?>
" name="energyRubbish_bef1"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['energy35Array'][4][3]; ?>
" name="energyRubbish_pre1"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['energy35Array'][4][4]; ?>
" name="energyRubbish_pre1real"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['energy35Array'][4][5]; ?>
" name="energyRubbish_pre2"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['energy35Array'][4][6]; ?>
" name="energyRubbish_pre2real"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['energy35Array'][4][7]; ?>
" name="energyRubbish_pre3"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['energy35Array'][4][8]; ?>
" name="energyRubbish_pre3real"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['energy35Array'][4][9]; ?>
" name="energyRubbish_pre4"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['energy35Array'][4][10]; ?>
" name="energyRubbish_pre4real"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['energy35Array'][4][11]; ?>
" name="energyRubbish_pre5"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['energy35Array'][4][12]; ?>
" name="energyRubbish_pre5real"></td>	  
		</tr>
	</table>
	<table class="formView" align="center" width='100%'>
		<tr>
			<td class = 'tdhead'>当年综合利用固体废弃物总量(吨)</td><td><input   value="<?php echo $this->_tpl_vars['energydataArray'][0]->energyRubbishUse; ?>
" name="energyRubbishUse"></td>
			<td class = 'tdhead'>当年固体废弃物产生量(吨)</td><td><input   value="<?php echo $this->_tpl_vars['energydataArray'][0]->energyRubbishProduct; ?>
" name="energyRubbishProduct"></td>
		</tr>
		<tr>
			<td class = 'tdhead'>往年贮存量总和(吨)</td><td ><input   value="<?php echo $this->_tpl_vars['energydataArray'][0]->energyRubbishAll; ?>
" name="energyRubbishAll"></td>
		</tr>
		<tr>
			<td class = 'tdtitle' colspan=4>单位工业总产值SO2排放量(10^4 吨/万元)<input   value="<?php echo $this->_tpl_vars['energydataArray'][0]->energySo2; ?>
" name="energySo2"><input type="button" id="button_energySo2" value="详情"/></td>
		</tr>
	</table>
	<table align="center" style="display:none;" class="formView" id="bef3_pre5_energySo2">
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-2; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['energy35Array'][5][0]; ?>
" name="energySo2_bef3"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-1; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['energy35Array'][5][1]; ?>
" name="energySo2_bef2"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['energy35Array'][5][2]; ?>
" name="energySo2_bef1"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['energy35Array'][5][3]; ?>
" name="energySo2_pre1"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['energy35Array'][5][4]; ?>
" name="energySo2_pre1real"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['energy35Array'][5][5]; ?>
" name="energySo2_pre2"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['energy35Array'][5][6]; ?>
" name="energySo2_pre2real"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['energy35Array'][5][7]; ?>
" name="energySo2_pre3"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['energy35Array'][5][8]; ?>
" name="energySo2_pre3real"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['energy35Array'][5][9]; ?>
" name="energySo2_pre4"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['energy35Array'][5][10]; ?>
" name="energySo2_pre4real"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['energy35Array'][5][11]; ?>
" name="energySo2_pre5"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['energy35Array'][5][12]; ?>
" name="energySo2_pre5real"></td>	  
		</tr>
	</table>
	<table class="formView" align="center" width='100%'>
		<tr>
			<td class = 'tdhead'>年度矿区工业SO2排放量(10^4 吨)</td><td><input   value="<?php echo $this->_tpl_vars['energydataArray'][0]->energySo2Product; ?>
" name="energySo2Product"></td>
			<td class = 'tdhead'>年度矿区工业总产值指标(万元)</td><td ><input   value="<?php echo $this->_tpl_vars['energydataArray'][0]->energySo2Target; ?>
" name="energySo2Target"></td>
		</tr>
	</table>
	</div>
	<div id="tabs-7"><!--环境保护-->
	<table class="formView" align="center" id="envi_protect" width="100%">	
		<tr>
			<td class="tdtitle" colspan=4>绿化覆盖率(%)<input   value="<?php echo $this->_tpl_vars['environmentdataArray'][0]->environmentRate; ?>
" name="environmentRate"><input type="button" id="button_environmentRate" value="详情"/></td>
		</tr>
	</table>
	<table align="center" style="display:none;" class="formView" id="bef3_pre5_environmentRate">
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-2; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['environment35Array'][0][0]; ?>
" name="environmentRate_bef3"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-1; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['environment35Array'][0][1]; ?>
" name="environmentRate_bef2"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['environment35Array'][0][2]; ?>
" name="environmentRate_bef1"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['environment35Array'][0][3]; ?>
" name="environmentRate_pre1"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['environment35Array'][0][4]; ?>
" name="environmentRate_pre1real"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['environment35Array'][0][5]; ?>
" name="environmentRate_pre2"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['environment35Array'][0][6]; ?>
" name="environmentRate_pre2real"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['environment35Array'][0][7]; ?>
" name="environmentRate_pre3"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['environment35Array'][0][8]; ?>
" name="environmentRate_pre3real"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['environment35Array'][0][9]; ?>
" name="environmentRate_pre4"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['environment35Array'][0][10]; ?>
" name="environmentRate_pre4real"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['environment35Array'][0][11]; ?>
" name="environmentRate_pre5"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['environment35Array'][0][12]; ?>
" name="environmentRate_pre5real"></td>	  
		</tr>
	</table>
	<table class="formView" align="center" width='100%'>
		<tr>
			<td class="tdhead">矿区内全部绿化种植垂直投影面积(平方千米)</td><td><input   value="<?php echo $this->_tpl_vars['environmentdataArray'][0]->environmentRateGreen; ?>
" name="environmentRateGreen"></td>
			<td class="tdhead">矿区面积(平方千米)</td><td><input   value="<?php echo $this->_tpl_vars['environmentdataArray'][0]->environmentRateArea; ?>
" name="environmentRateArea"></td>
		</tr>
		<tr>
			<td class="tdtitle" colspan=4>其他指标</td>
		</tr>
		<tr>
			<td class="tdhead">是否执行环境保护"三同时"制度</td>
			<?php if ($this->_tpl_vars['environmentdataArray'][0]->environmentIsThree == '1'): ?>
				<td width="15%">		
					<input type="radio" name="environmentIsThree"  value="1" checked>是
					<input type="radio" name="environmentIsThree"  value="0" >否
				</td>
			<?php else: ?>
				<td width="15%">		
					<input type="radio" name="environmentIsThree"  value="1" >是
					<input type="radio" name="environmentIsThree"  value="0" checked>否
				</td>
			<?php endif; ?>
			<td class = 'tdhead'>矿区大气环境质量是否达到"环境空气质量标准"二级以上</td>
			<?php if ($this->_tpl_vars['environmentdataArray'][0]->environmentIsAir == '1'): ?>
				<td width="15%">		
					<input type="radio" name="environmentIsAir"  value="1" checked>是
					<input type="radio" name="environmentIsAir"  value="0" >否
				</td>
			<?php else: ?>
				<td width="15%">		
					<input type="radio" name="environmentIsAir"  value="1" >是
					<input type="radio" name="environmentIsAir"  value="0" checked>否
				</td>
			<?php endif; ?>
		</tr>
                <tr>
			<td class = 'tdhead'>是否达到《地表水环境质量标准》</td>
			<?php if ($this->_tpl_vars['environmentdataArray'][0]->environmentIsWater == '1'): ?>
				<td width="15%">		
					<input type="radio" name="environmentIsWater"  value="1" checked>是
					<input type="radio" name="environmentIsWater"  value="0" >否
				</td>
			<?php else: ?>
				<td width="15%">		
					<input type="radio" name="environmentIsWater"  value="1" >是
					<input type="radio" name="environmentIsWater"  value="0" checked>否
				</td>
			<?php endif; ?>
			<td class = 'tdhead'>是否达到《工业企业厂界噪声标准》</td>
			<?php if ($this->_tpl_vars['environmentdataArray'][0]->environmentIsSound == '1'): ?>
				<td width="15%">		
					<input type="radio" name="environmentIsSound"  value="1" checked>是
					<input type="radio" name="environmentIsSound"  value="0" >否
				</td>
			<?php else: ?>
				<td width="15%">		
					<input type="radio" name="environmentIsSound"  value="1" >是
					<input type="radio" name="environmentIsSound"  value="0" checked>否
				</td>
			<?php endif; ?>
		</tr>
		<tr>
			<td class="tdhead">三年内重大地质灾害发生情况描述</td>
			<td colspan=3>
				<textarea cols="60" rows="3" name="environmentIsDisaster"><?php echo $this->_tpl_vars['environmentdataArray'][0]->environmentIsDisaster; ?>
</textarea>
			</td>
		</tr>
	</table>
	</div>
	<div id="tabs-8"><!--土地复垦-->
	<table class="formView" align="center" id="land_recovery" width='100%'>
		<tr>
			<td class="tdtitle" colspan=4>土地复垦率(%)<input   value="<?php echo $this->_tpl_vars['reclamationdataArray'][0]->reclamationRate; ?>
" name="reclamationRate"><input type="button" id="button_reclamationRate" value="详情"/></td>
		</tr>
	</table>
	<table align="center" style="display:none;" class="formView" id="bef3_pre5_reclamationRate">
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-2; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['reclamation35Array'][0][0]; ?>
" name="reclamationRate_bef3"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-1; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['reclamation35Array'][0][1]; ?>
" name="reclamationRate_bef2"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['reclamation35Array'][0][2]; ?>
" name="reclamationRate_bef1"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['reclamation35Array'][0][3]; ?>
" name="reclamationRate_pre1"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['reclamation35Array'][0][4]; ?>
" name="reclamationRate_pre1real"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['reclamation35Array'][0][5]; ?>
" name="reclamationRate_pre2"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['reclamation35Array'][0][6]; ?>
" name="reclamationRate_pre2real"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['reclamation35Array'][0][7]; ?>
" name="reclamationRate_pre3"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['reclamation35Array'][0][8]; ?>
" name="reclamationRate_pre3real"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['reclamation35Array'][0][9]; ?>
" name="reclamationRate_pre4"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['reclamation35Array'][0][10]; ?>
" name="reclamationRate_pre4real"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['reclamation35Array'][0][11]; ?>
" name="reclamationRate_pre5"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['reclamation35Array'][0][12]; ?>
" name="reclamationRate_pre5real"></td>	  
		</tr>
	</table>
	<table class="formView" align="center" width='100%'>
		<tr>
			<td class="tdhead" >已复垦土地面积(平方千米)</td><td><input   value="<?php echo $this->_tpl_vars['reclamationdataArray'][0]->reclamationRateHave; ?>
" name="reclamationRateHave"></td>
			<td class="tdhead" >可复垦土地面积(平方千米)</td><td><input   value="<?php echo $this->_tpl_vars['reclamationdataArray'][0]->reclamationRateCan; ?>
" name="reclamationRateCan"></td>
		</tr>
		<tr>
			<td class="tdtitle" colspan=4>其他</td>
		</tr>
		<tr>
			<td class="tdhead">土地复垦每亩经济效益(万元)</td><td><input   value="<?php echo $this->_tpl_vars['reclamationdataArray'][0]->reclamationMoney; ?>
" name="reclamationMoney"><input type="button" id="button_reclamationMoney" value="详情"/></td>
			<td class="tdhead">土地复垦每亩平均投资(万元)</td><td><input   value="<?php echo $this->_tpl_vars['reclamationdataArray'][0]->reclamationPrice; ?>
" name="reclamationPrice"><input type="button" id="button_reclamationPrice" value="详情"/></td>
		</tr>
	</table>
	<table align="center" style="display:none;" class="formView" id="bef3_pre5_reclamationMoney">
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-2; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['reclamation35Array'][1][0]; ?>
" name="reclamationMoney_bef3"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-1; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['reclamation35Array'][1][1]; ?>
" name="reclamationMoney_bef2"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['reclamation35Array'][1][2]; ?>
" name="reclamationMoney_bef1"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['reclamation35Array'][1][3]; ?>
" name="reclamationMoney_pre1"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['reclamation35Array'][1][4]; ?>
" name="reclamationMoney_pre1real"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['reclamation35Array'][1][5]; ?>
" name="reclamationMoney_pre2"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['reclamation35Array'][1][6]; ?>
" name="reclamationMoney_pre2real"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['reclamation35Array'][1][7]; ?>
" name="reclamationMoney_pre3"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['reclamation35Array'][1][8]; ?>
" name="reclamationMoney_pre3real"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['reclamation35Array'][1][9]; ?>
" name="reclamationMoney_pre4"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['reclamation35Array'][1][10]; ?>
" name="reclamationMoney_pre4real"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['reclamation35Array'][1][11]; ?>
" name="reclamationMoney_pre5"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['reclamation35Array'][1][12]; ?>
" name="reclamationMoney_pre5real"></td>	  
		</tr>
	</table>			
	<table align="center" style="display:none;" class="formView" id="bef3_pre5_reclamationPrice">
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-2; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['reclamation35Array'][2][0]; ?>
" name="reclamationPrice_bef3"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-1; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['reclamation35Array'][2][1]; ?>
" name="reclamationPrice_bef2"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['reclamation35Array'][2][2]; ?>
" name="reclamationPrice_bef1"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['reclamation35Array'][2][3]; ?>
" name="reclamationPrice_pre1"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['reclamation35Array'][2][4]; ?>
" name="reclamationPrice_pre1real"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['reclamation35Array'][2][5]; ?>
" name="reclamationPrice_pre2"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['reclamation35Array'][2][6]; ?>
" name="reclamationPrice_pre2real"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['reclamation35Array'][2][7]; ?>
" name="reclamationPrice_pre3"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['reclamation35Array'][2][8]; ?>
" name="reclamationPrice_pre3real"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['reclamation35Array'][2][9]; ?>
" name="reclamationPrice_pre4"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['reclamation35Array'][2][10]; ?>
" name="reclamationPrice_pre4real"></td>
		</tr>
		<tr>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年规划值</td><td><input value="<?php echo $this->_tpl_vars['reclamation35Array'][2][11]; ?>
" name="reclamationPrice_pre5"></td>
			<td class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年实际值</td><td><input value="<?php echo $this->_tpl_vars['reclamation35Array'][2][12]; ?>
" name="reclamationPrice_pre5real"></td>	  
		</tr>
	</table>
	</div>
	<div id="tabs-9"><!--社区和谐-->
	<table class="formView" align="center" id="public_info">
		<tr>
			<td class = 'tdtitle' colspan=4>公共捐赠(万元)<input   value="<?php echo $this->_tpl_vars['communitydataArray'][0]->communityDonate; ?>
" name="communityDonate"></td>
		</tr>
		<tr>	
			<td class = 'tdhead'>基础设施(万元)</td><td><input   value="<?php echo $this->_tpl_vars['communitydataArray'][0]->communityDonateBase; ?>
" name="communityDonateBase"></td>
			<td class = 'tdhead'>教育(万元)</td><td><input   value="<?php echo $this->_tpl_vars['communitydataArray'][0]->communityDonateStudy; ?>
" name="communityDonateStudy"></td>
			
		</tr>
		<tr>
			<td class = 'tdhead'>渠道修建(万元)</td><td><input   value="<?php echo $this->_tpl_vars['communitydataArray'][0]->communityDonateChannel; ?>
" name="communityDonateChannel"></td>
			<td class = 'tdhead'>路面拓宽硬化(万元)</td><td><input   value="<?php echo $this->_tpl_vars['communitydataArray'][0]->communityDonateRoad; ?>
" name="communityDonateRoad"></td>
		</tr>
		<tr>
			<td class = 'tdhead'>备注(万元)</td><td><input   value="<?php echo $this->_tpl_vars['communitydataArray'][0]->communityDonateComment; ?>
" name="communityDonateComment"></td>
			
		</tr>
		<tr>
			<td class = 'tdtitle' colspan=4>地区与企业之间的契合度</td>
		</tr>
		
		<tr>
			<td class = 'tdhead'>支农</td><td colspan=3><textarea cols="60" rows="3"  name="communityTacitFarm"><?php echo $this->_tpl_vars['communitydataArray'][0]->communityTacitFarm; ?>
</textarea></td>
		</tr>
		<tr>
			<td class = 'tdhead'>支教</td><td colspan=3><textarea cols="60" rows="3"  name="communityTacitTeach"><?php echo $this->_tpl_vars['communitydataArray'][0]->communityTacitTeach; ?>
</textarea></td>
		</tr>
		<tr>
			<td class = 'tdhead'>抗灾</td><td colspan=3><textarea cols="60" rows="3"  name="communityTacitDefeat"><?php echo $this->_tpl_vars['communitydataArray'][0]->communityTacitDefeat; ?>
</textarea></td>
		</tr>
		<tr>
			<td class = 'tdhead'>赈灾</td><td colspan=3><textarea cols="60" rows="3"  name="communityTacitHelp"><?php echo $this->_tpl_vars['communitydataArray'][0]->communityTacitHelp; ?>
</textarea></td>	
		</tr>
		<tr>
			<td class = 'tdhead'>备注</td><td colspan=3><textarea cols="60" rows="3"  name="communityTacitComment"><?php echo $this->_tpl_vars['communitydataArray'][0]->communityTacitComment; ?>
</textarea></td>
		</tr>
		<tr>
			<td class = 'tdtitle' colspan=4>职工情况</td>
		</tr>
		
		<tr>
			<td class = 'tdhead'>地区群众就业占矿山职工人数比重(%)</td><td colspan=3><input   value="<?php echo $this->_tpl_vars['communitydataArray'][0]->communityManrate; ?>
" name="communityManrate"></td>
		</tr>
		<tr>
			<td class = 'tdhead'>职工福利</td><td colspan=3><textarea cols="60" rows="3"  name="communityWelfare"><?php echo $this->_tpl_vars['communitydataArray'][0]->communityWelfare; ?>
</textarea></td>
		</tr>
	</table>
	</div>	   
	<div id="tabs-10"><!--企业文化-->
	<table class="formView" align="center" id="enterprise_cul">
		<tr>
			<td class = 'tdhead'>企业宗旨</td><td colspan=2><textarea cols="60" rows="3"  name="cultureAim"><?php echo $this->_tpl_vars['culturedataArray'][0]->cultureAim; ?>
</textarea></td>
		</tr>
		<tr>	
			<td class = 'tdhead'>经营理念</td><td colspan=2><textarea cols="60" rows="3"  name="cultureIdea"><?php echo $this->_tpl_vars['culturedataArray'][0]->cultureIdea; ?>
</textarea></td>
			
		</tr>
		<tr>
			<td class = 'tdhead'>企业信条</td><td colspan=2><textarea cols="60" rows="3"  name="cultureBelief"><?php echo $this->_tpl_vars['culturedataArray'][0]->cultureBelief; ?>
</textarea></td> 
		</tr>
		<tr>
			<td class = 'tdhead'>组织形式</td><td colspan=2><textarea cols="60" rows="3"  name="cultureOrgan"><?php echo $this->_tpl_vars['culturedataArray'][0]->cultureOrgan; ?>
</textarea></td>
		</tr>
		<tr>
			<td class = 'tdhead'>企业之歌</td> <td colspan=2><textarea cols="60" rows="3"  name="cultureOrganMusic"><?php echo $this->_tpl_vars['culturedataArray'][0]->cultureOrganMusic; ?>
</textarea></td>
		</tr>
		<tr>
			<td class = 'tdhead'>歌词</td><td colspan=2><textarea cols="60" rows="3"  name="cultureOrganMusicLrc"><?php echo $this->_tpl_vars['culturedataArray'][0]->cultureOrganMusicLrc; ?>
</textarea></td>
		</tr>
		<tr>
			<td class = 'tdhead'>文体活动次数</td><td colspan=2><textarea cols="60" rows="3"  name="cultureOrganActive"><?php echo $this->_tpl_vars['culturedataArray'][0]->cultureOrganActive; ?>
</textarea></td>
		</tr>
		<tr>
			<td class = 'tdhead'>企业内部刊物或报纸</td> <td colspan=2><textarea cols="60" rows="3"  name="cultureOrganPaper"><?php echo $this->_tpl_vars['culturedataArray'][0]->cultureOrganPaper; ?>
</textarea></td>
		</tr>
		<tr>
			<td class = 'tdhead'>其他</td><td colspan=2><textarea cols="60" rows="3"  name="cultureOther"><?php echo $this->_tpl_vars['culturedataArray'][0]->cultureOther; ?>
</textarea></td>
		</tr>
		<!-- <tr>
			<td class="tdhead>">相关附件</td><td>
                <div id="content">   	
	 <table class="listView" align="center" width="100%">
        <thead>
		<tr>
				<th>文件名</th>
				<th>所属矿山</th>
				<th>文件类型</th>
				<th colspan=2 width="8%">操作</th>
		</tr>
		</thead>
        <?php $_from = $this->_tpl_vars['MArray']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['data']):
?>
		<?php if ($this->_tpl_vars['data'][2] == '2'): ?>
		<tr>
            <td><?php if ($this->_tpl_vars['data'][5] == "image/pjpeg"): ?><img src="http://localhost/uploadDir/<?php echo $this->_tpl_vars['data'][1]; ?>
/<?php echo $this->_tpl_vars['data'][0]; ?>
" width="20%"><?php endif; ?><?php echo $this->_tpl_vars['data'][0]; ?>
</td>
			<td><?php echo $this->_tpl_vars['data'][1]; ?>
</td>
			<td><?php echo $this->_tpl_vars['data'][5]; ?>
</td>
			<td><a href="/minedata/DownloadFile/<?php echo $this->_tpl_vars['data'][3]; ?>
">下载</a></td>
			<td><a href="/minedata/DeleteFile/<?php echo $this->_tpl_vars['data'][3]; ?>
">删除</a></td>
        </tr>           
		
		<?php endif; ?>
        <?php endforeach; endif; unset($_from); ?>
     </table> 
	
	</div>
		</tr> -->
	</table>
	</div>
	<div id="tabs-11"><!--重点工程-->
	<table width="100%" align="center" id="project" class="formView">
		<?php $_from = $this->_tpl_vars['projectdataArray']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['p']):
?>
		<tr>
			<td>
				<table calss="formView" align="center" id="project_details">
					<tr>                                   
						<td class="tdtitle" colspan=6>重点工程信息</td>
					</tr>
					<tr>
						<td class="tdhead">项目编号</td>
						<td><input type="text"  value="<?php echo $this->_tpl_vars['p']->projectNum; ?>
" name="projectNum[]"></td>
						<td class="tdhead">工程名称</td>
						<td><input type="text"  value="<?php echo $this->_tpl_vars['p']->projectName; ?>
" name="projectName[]"></td>
						<td class="tdhead">工程类型</td>
						<td>
							<select name="projectType[]">
								<option value="<?php echo $this->_tpl_vars['p']->projectType; ?>
"><?php echo $this->_tpl_vars['p']->projectType; ?>
</option>
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
							<textarea cols="60" rows="3" name="projectDetail[]"><?php echo $this->_tpl_vars['p']->projectDetail; ?>
</textarea>
						</td>
					</tr>
					<tr>
						<td class="tdhead">开始年份</td>
						<td><input type="text"  value="<?php echo $this->_tpl_vars['p']->projectlWorktime; ?>
" name="projectlWorktime[]"></td>
						<td class="tdhead">结束年份</td>
						<td><input type="text"  value="<?php echo $this->_tpl_vars['p']->projectStarttime; ?>
" name="projectStarttime[]"></td>
						<td class="tdhead">工程投资(万元)</td>
						<td><input type="text"  value="<?php echo $this->_tpl_vars['p']->projectCost; ?>
" name="projectCost[]"></td>
					</tr>					
					<tr>
						<td class="tdhead">资金筹措</td>
						<td><input type="text"  value="<?php echo $this->_tpl_vars['p']->projectMoney; ?>
" name="projectMoney[]"></td>
						<td class="tdhead">负责部门</td>
						<td><input type="text"  value="<?php echo $this->_tpl_vars['p']->projectOrgan; ?>
" name="projectOrgan[]"></td>
					</tr>					
					<tr>
						<td class="tdhead">预期效益</td>
						<td colspan=5><textarea cols="60" rows="3" name="projectEffect[]"><?php echo $this->_tpl_vars['p']->projectEffect; ?>
</textarea></td>
					</tr>
					<tr>
						<td class='tdhead'><?php echo $this->_tpl_vars['p']->projectlWorktime+1; ?>
年完成情况</td>
						<td colspan=5>
							<textarea cols="60" rows="3" name="projectFinish1[]">提示：资金投入情况、工程完成情况、补充说明等<?php echo $this->_tpl_vars['p']->projectFinish1; ?>
</textarea>
						</td>
					</tr>
					<tr>
						<td class='tdhead'><?php echo $this->_tpl_vars['p']->projectlWorktime+2; ?>
年完成情况</td>
						<td colspan=5>
							<textarea cols="60" rows="3" name="projectFinish2[]">提示：资金投入情况、工程完成情况、补充说明等<?php echo $this->_tpl_vars['p']->projectFinish2; ?>
</textarea>
						</td>
					</tr>
					<tr>
						<td class='tdhead'><?php echo $this->_tpl_vars['p']->projectlWorktime+3; ?>
年完成情况</td>
						<td colspan=5>
							<textarea cols="60" rows="3" name="projectFinish3[]"><?php echo $this->_tpl_vars['p']->projectFinish3; ?>
</textarea>
						</td>
					</tr>
					<tr>
						<td class='tdhead'><?php echo $this->_tpl_vars['p']->projectlWorktime+4; ?>
年完成情况</td>
						<td colspan=5>
							<textarea cols="60" rows="3" name="projectFinish4[]"><?php echo $this->_tpl_vars['p']->projectFinish4; ?>
</textarea>
						</td>
					</tr>
					<tr>
						<td class='tdhead'><?php echo $this->_tpl_vars['p']->projectlWorktime+5; ?>
年完成情况</td>
						<td colspan=5>
							<textarea cols="60" rows="3" name="projectFinish5[]"><?php echo $this->_tpl_vars['p']->projectFinish5; ?>
</textarea>
						</td>
					</tr>
					
				</table>
			</td>
		</tr>
		<?php endforeach; endif; unset($_from); ?>
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
			<td class = 'tdhead'>国土资源部审核意见</td><td colspan=3><?php $_from = $this->_tpl_vars['MArray']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['data']):
?><?php if ($this->_tpl_vars['data'][2] == '3'): ?><img src="http://localhost/uploadDir/<?php echo $this->_tpl_vars['data'][1]; ?>
/<?php echo $this->_tpl_vars['data'][0]; ?>
" width="80%"><?php endif; ?><?php endforeach; endif; unset($_from); ?><textarea cols="60" rows="3"  name="auditNation"><?php echo $this->_tpl_vars['auditdataArray'][0]->auditIndustry; ?>
</textarea></td>
			<td class = 'tdhead'>审核时间</td><td><input class="datepicker" value="<?php echo $this->_tpl_vars['auditdataArray'][0]->auditNationTime; ?>
"   name="auditNationTime"></td>
		</tr>
                <tr>
			<td class = 'tdhead'>省级国土资源主管部门审核意见</td><td colspan=3 ><?php $_from = $this->_tpl_vars['MArray']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['data']):
?><?php if ($this->_tpl_vars['data'][2] == '4'): ?><img src="http://localhost/uploadDir/<?php echo $this->_tpl_vars['data'][1]; ?>
/<?php echo $this->_tpl_vars['data'][0]; ?>
" width="80%"><?php endif; ?><?php endforeach; endif; unset($_from); ?><textarea cols="60" rows="3"  name="auditPlace"><?php echo $this->_tpl_vars['auditdataArray'][0]->auditPlace; ?>
</textarea></td>
			<td class = 'tdhead'>审核时间</td><td><input class="datepicker" value="<?php echo $this->_tpl_vars['auditdataArray'][0]->auditPlaceTime; ?>
"   name="auditPlaceTime"></td>
		</tr>
		<tr>
			<td class = 'tdhead'>行业协会审核意见</td><td colspan=3 ><?php $_from = $this->_tpl_vars['MArray']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['data']):
?><?php if ($this->_tpl_vars['data'][2] == '5'): ?><img src="http://localhost/uploadDir/<?php echo $this->_tpl_vars['data'][1]; ?>
/<?php echo $this->_tpl_vars['data'][0]; ?>
" width="80%"><?php endif; ?><?php endforeach; endif; unset($_from); ?><textarea cols="60" rows="3"  name="auditIndustry"><?php echo $this->_tpl_vars['auditdataArray'][0]->auditIndustry; ?>
</textarea></td>
			<td class = 'tdhead'>审核时间</td><td><input class="datepicker" value="<?php echo $this->_tpl_vars['auditdataArray'][0]->auditIndustryTime; ?>
"   name="auditIndustryTime"></td>
		</tr>
		<tr>
			<td class = 'tdhead'>市级国土资源主管部门审核意见</td><td colspan=3 ><?php $_from = $this->_tpl_vars['MArray']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['data']):
?><?php if ($this->_tpl_vars['data'][2] == '6'): ?><img src="http://localhost/uploadDir/<?php echo $this->_tpl_vars['data'][1]; ?>
/<?php echo $this->_tpl_vars['data'][0]; ?>
" width="80%"><?php endif; ?><?php endforeach; endif; unset($_from); ?><textarea cols="60" rows="3"  name="auditShi"><?php echo $this->_tpl_vars['auditdataArray'][0]->auditShi; ?>
</textarea></td>
			<td class = 'tdhead'>审核时间</td><td><input class="datepicker" value="<?php echo $this->_tpl_vars['auditdataArray'][0]->auditShiTime; ?>
" width="90%" name="auditShiTime"></td>
		</tr>
		<tr>
			<td class = 'tdhead'>县级国土资源主管部门审核意见</td><td colspan=3 ><?php $_from = $this->_tpl_vars['MArray']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['data']):
?><?php if ($this->_tpl_vars['data'][2] == '7'): ?><img src="http://localhost/uploadDir/<?php echo $this->_tpl_vars['data'][1]; ?>
/<?php echo $this->_tpl_vars['data'][0]; ?>
" width="80%"><?php endif; ?><?php endforeach; endif; unset($_from); ?><textarea cols="60" rows="3"  name="auditXian"><?php echo $this->_tpl_vars['auditdataArray'][0]->auditXian; ?>
</textarea></td>
			<td class = 'tdhead'>审核时间</td><td><input class="datepicker" value="<?php echo $this->_tpl_vars['auditdataArray'][0]->auditXianTime; ?>
" width="90%" name="auditXianTime"></td>
		</tr>
	 </table>
	 </div>

    
	<div id="tabs-13"> <!--专家意见-->
		<table width="100%" align="center" id="expert_info">
			<?php if ($this->_tpl_vars['flag'] == 0): ?>
				<tr>
				<td>
					<table width="100%" class="formView" align="center">
						<tr>
							<td class="tdtitle" colspan=4>
								专家
							</td>
						</tr>
						<tr>
							<td width="20%" class='tdhead'>姓名</td><td><input  name="expertName[]"></td>
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
							<td class='tdhead'>年龄</td><td><input name="expertAge[]"></td>
							<td class='tdhead'>单位</td><td><input name="expertCompany[]"></td>
						</tr>
						<tr>						
							<td class='tdhead'>职称</td><td><input  name="expertTitles[]"></td>
							<td class='tdhead'>职务</td><td><input  name="expertWork[]"></td>
						</tr>
						<tr>
							<td class='tdhead'>专业</td><td><input  name="expertSubject[]"></td>
							<td class='tdhead'>手机</td><td><input   name="expertCellphone[]"></td>
						</tr>
						<tr>					
							<td class='tdhead'>固话</td><td><input    name="expertLandhone[]"></td>
							<td class='tdhead'>邮箱</td><td><input   name="expertEmail[]"></td>
						</tr>
						<tr>
							<td class='tdhead'>传真</td><td><input   name="expertFax[]"></td>
							<td class='tdhead'>地址</td><td><input    name="expertAddress[]"></td>
						</tr>
						<tr>
							<td class='tdhead'>专家意见</td><td colspan=3><textarea cols="60" rows="3" name="expertIdea[]"></textarea></td>
						</tr>
						<tr>
							<td class='tdhead'>时间</td><td><input class="datepicker"  name="expertTime[]"></td>
							<td class='tdhead' colspan=2>
								<input type="button" onclick="add();" value="添加专家"/>
								<input type="button" onclick="removeExpert(this);" value="删除专家"/>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<?php endif; ?>
			
			<?php $_from = $this->_tpl_vars['expertdataArray']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['e']):
?>
			<tr>
				<td>
					<table width="100%" class="formView" align="center">
						<tr>
							<td class="tdtitle" colspan=4>
								专家
							</td>
						</tr>
						<tr>
							<td width="20%" class='tdhead'>姓名</td><td><input   value="<?php echo $this->_tpl_vars['e']->expertName; ?>
" name="expertName[]"></td>
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
							<td class='tdhead'>年龄</td><td><input   value="<?php echo $this->_tpl_vars['e']->expertAge; ?>
" name="expertAge[]"></td>
							<td class='tdhead'>单位</td><td><input   value="<?php echo $this->_tpl_vars['e']->expertCompany; ?>
" name="expertCompany[]"></td>
						</tr>
						<tr>						
							<td class='tdhead'>职称</td><td><input   value="<?php echo $this->_tpl_vars['e']->expertTitles; ?>
" name="expertTitles[]"></td>
							<td class='tdhead'>职务</td><td><input   value="<?php echo $this->_tpl_vars['e']->expertWork; ?>
" name="expertWork[]"></td>
						</tr>
						<tr>
							<td class='tdhead'>专业</td><td><input   value="<?php echo $this->_tpl_vars['e']->expertSubject; ?>
" name="expertSubject[]"></td>
							<td class='tdhead'>手机</td><td><input   value="<?php echo $this->_tpl_vars['e']->expertCellphone; ?>
" name="expertCellphone[]"></td>
						</tr>
						<tr>					
							<td class='tdhead'>固话</td><td><input   value="<?php echo $this->_tpl_vars['e']->expertLandhone; ?>
" name="expertLandhone[]"></td>
							<td class='tdhead'>邮箱</td><td><input   value="<?php echo $this->_tpl_vars['e']->expertEmail; ?>
" name="expertEmail[]"></td>
						</tr>
						<tr>
							<td class='tdhead'>传真</td><td><input   value="<?php echo $this->_tpl_vars['e']->expertFax; ?>
" name="expertFax[]"></td>
							<td class='tdhead'>地址</td><td><input   value="<?php echo $this->_tpl_vars['e']->expertAddress; ?>
" name="expertAddress[]"></td>
						</tr>
						<tr>
							<td class='tdhead'>专家意见</td><td colspan=3><textarea cols="60" rows="3" name="expertIdea[]"><?php echo $this->_tpl_vars['e']->expertIdea; ?>
</textarea></td>
						</tr>
						<tr>
							<td class='tdhead'>时间</td><td><input class="datepicker" value="<?php echo $this->_tpl_vars['e']->expertTime; ?>
"   name="expertTime[]"></td>
							<td class='tdhead' colspan=2>
								<input type="button" onclick="add();" value="添加专家"/>
								<input type="button" onclick="removeExpert(this);" value="删除专家"/>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<?php endforeach; endif; unset($_from); ?>
		</table>
	</div>
</div>

	
	<?php if ($this->_tpl_vars['QuanXian'] != 1): ?><input type="button" onclick="testajax()" value="保存修改" />
	
	
	<?php endif; ?>
	<input type="button" onclick="location.href='/minedata/ListMineData'" value="返回" />
</form>
