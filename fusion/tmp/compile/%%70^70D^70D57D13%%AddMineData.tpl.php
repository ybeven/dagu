<?php /* Smarty version 2.6.26, created on 2014-10-27 16:40:51
         compiled from minedata/AddMineData.tpl */ ?>
﻿<script type="text/javascript">
	<?php echo '
	

$(document).ready(function(){
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
  $("#button_complexAllback").click(function(){
	$(\'#bef3_pre5_complexAllback\').toggle();
  });
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
});
var mark = 1;
		function add()
		{
			mark=mark+1; 	                
			var str="<tr><td><table width=\'100%\' class=\'formView\' align=\'center\'><tr><td class=\'tdtitle\' colspan=4>专家"+mark+"</td></tr>"
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

		//function testajax()
		//{
			//alert("/minedata/SaveMineData/"+'; ?>
<?php echo $this->_tpl_vars['mineid']; ?>
<?php echo ');
		//	$.ajax({type:"POST",url:"/minedata/SaveMineData/"+'; ?>
<?php echo $this->_tpl_vars['mineid']; ?>
<?php echo ',data:$("#testform).serializeArray(),success:function(msg){alert(msg);}});
			
	//	}
		
		function removeExpert(red)
		{
			mark=mark-1;
			$(red).parent().parent().parent().parent().parent().remove();
			
		}
//添加矿种坐标
function addweidu()
		{
			var str20="<tr><td class=\'tdhead\'>经度</td><td><input type=\'text\' name=\'basedataZuobiaoJing[]\'></td><td class=\'tdhead\'>纬度</td><td><input type=\'text\' name=\'basedataZuobiaoWei[]\'><input type=\'button\' onclick=\'deleteweidu(this);\'  value=\'删除\'></td></tr>";
			$("#weidu").append(str20); 
		}
//删除添加矿种
function deleteweidu(red10)
		{
			$(red10).parent().parent().remove();
		}

//重点工程添加删除函数
var project_mark = 1;
		function addProject()
		{        
			project_mark=project_mark+1; 
			var str1="<tr><td><table calss=\'formViem\' align=\'center\' id=\'projectDetails\'><tr><td class=\'tdtitle\' colspan=6>重点工程信息"+project_mark+"</td></tr>"
			    +"<tr><td class=\'tdhead\'>项目编号</td>"
				+"<td><input type=\'text\' name=\'projectNum[]\'></td>"
				+"<td class=\'tdhead\'>工程名称</td>"
				+"<td><input type=\'text\' name=\'projectName[]\'></td>"
				+"<td class=\'tdhead\'>工程类型</td>"
				+"<td><select name=\'projectType[]\'><option value=\'依法办矿工程\'>依法办矿工程</option><option value=\'规范管理工程\'>规范管理工程</option><option value=\'资源开发与综合利用工程\'>资源开发与综合利用工程</option><option value=\'技术创新工程\'>技术创新工程</option><option value=\'节能减排工程\'>节能减排工程</option><option value=\'矿山环境恢复治理类工程\'>矿山环境恢复治理类工程</option><option value=\'土地复垦工程\'>土地复垦工程</option><option value=\'和谐社区建设类工程\'>和谐社区建设类工程</option><option value=\'企业文化工程\'>企业文化工程</option></select></td></tr>"
				+"<tr><td class=\'tdhead\'>工程内容</td>"
				+"<td colspan=5><textarea cols=\'60\' rows=\'3\' name=\'projectDetail[]\'></textarea></td></tr>"
				+"<tr><td class=\'tdhead\'>实施时间</td>"
				+"<td><input type=\'text\' name=\'projectlWorktime[]\'></td>"
				+"<td class=\'tdhead\'>起止时间</td>"
				+"<td><input type=\'text\' name=\'projectStarttime[]\'></td>"  					
				+"<td class=\'tdhead\'>工程投资</td>"
				+"<td><input type=\'text\' name=\'projectCost[]\'></td></tr>"  //之前都是好的
				+"<tr><td class=\'tdhead\'>资金筹措</td>"
				+"<td><input type=\'text\' name=\'projectMoney[]\'></td>"   								
				+"<td class=\'tdhead\'>负责部门</td>"     
				+"<td><input type=\'text\' name=\'projectOrgan[]\'></td>"
				+"<td class=\'tdhead\'>预期效益</td>"
				+"<td><input type=\'text\' name=\'projectEffect[]\'></td></tr>"
				+"<tr><td class=\'tdhead\' colspan=6><input type=\'button\' onclick=\'removeProject(this);\' value=\'删除该重点工程\'/></td></tr></table></td></tr>";
				//+"<tr align=\'right\'><td align=\'right\' class=\'tdhead\'><input type=\'button\' onclick=\'addProject();\' value=\'添加重点工程\'/></td></tr>";  
			$("#project").append(str1);                                                                                                                                                                                                                          
		}
		function removeProject(red1)
		{
			project_mark=project_mark-1; 
			$(red1).parent().parent().parent().parent().parent().remove();
			
		}
//添加其他矿种选矿回收率
var rate_mark = 0;//矿种id标记
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
					var str2="<tr><td><table class=\'formView\' align=\'center\' width=\'100%\'><tr><td colspan=4 class=\'tdhead\'>矿种"+rate_mark+"</td></tr>"
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
						+"<tr><td colspan=4 class=\'tdhead\'>储量级别</td></tr>"
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
						// <td width="30%" style="padding:0">

						// <select name="oreLevelaType[]" >
						// 	<option value="{$o[37]}">{$o[37]}</option>
						// 	<option value="矿石量">矿石量</option>
						// 	<option value="金属量">金属量</option>
						// </select>
						// <input type="text" name="oreLevela[]" value="{$o[38]}" replace="数值" style="width:50px" />
						// <select name="oreLevelaUnit[]"  style="width:50px">
						// 	<option value="{$o[39]}">{$o[39]}</option>
						// 	<option value="万吨">万吨</option>
						// 	<option value="吨">吨</option>
						// 	<option value="百万吨">百万吨</option>
						// 	<option value="千克">千克</option>
						// 	<option value="克">克</option>
						// 	<option value="立方">立方</option>
						// 	<option value="立方米">立方米</option>
						// 	<option value="百立方米">百立方米</option>
						// 	<option value="克拉">克拉</option>
						// 	<option value="磅">磅</option>
						// </select>
						// <!-- <input type="text" name="oreLevela[]" value="{$o[40]}" width="90%"/> -->

						// <input type="button" id="button_basedataorelevela{$o[22]}" value="详情"  style="width:50px"/></td>
						+"<input type=\'button\' id=\'button_basedataorelevela"+rate_mark+"\' value=\'详情\' onclick=\'basedataorelevela("+rate_mark+");\' style=\'width:50px\'/>"
						+"</td>"
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
						+"<tr><td class=\'tdhead\' colspan=4><input type=\'button\' value=\'添加矿种\' onclick=\'addminerate();\'><input type=\'button\' value=\'删除此矿种\' onclick=\'ramoveminerate(this);\'></td></tr></table></td></tr>";                                                                                                                      
					$("#ored").append(str2);                                                                                                                                                                                                                      
				}
				function ramoveminerate(red2)
				{
					
					rate_mark=rate_mark-1; 
					$(red2).parent().parent().parent().parent().parent().remove();
				}
				//var childval;
				//var childval2;
				
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

<form name="form" action="/minedata/UploadeExcelMineData/<?php echo $this->_tpl_vars['mineid']; ?>
" method="post" enctype="multipart/form-data">
	<input type="hidden" name="leadExcel" value="true">
	<table align = "center" >
		<tr>
			<td align="left">请选择规划文件：</td>
			<td><input type="text" name="trucknumber"  id="f_file"/></td>
			<td><input type="button" value="浏览" class="file" onClick="t_file.click()"><input type="file" id="t_file" name="inputExcel"  style="display:none" onchange="f_file.value=this.value"></td>
			<td><input type="submit" value="导入Excel" /></td>
			<td><input type="button" value="附件管理" onclick="window.location.href='/minedata/AddFiles/<?php echo $this->_tpl_vars['mineid']; ?>
'"/></td>
		</tr>
	</table>
</form>
<form id="testform"   name="form" action="/minedata/SaveMineData/<?php echo $this->_tpl_vars['mineid']; ?>
" method="post" enctype="multipart/form-data">
<div id="tabs">
   <ul>
       <li><a href="#tabs-1">基本信息</a></li>
	   <!-- <li><a href="#tabs-2">依法办矿</a></li>
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
	   <li><a href="#tabs-13">专家信息</a></li> -->
	</ul>
   
	<div id="tabs-1"><!--基本信息-->
	<table class="formView" align="center" id="basedata" width='100%'>
   			<tr>
		        <td class='tdtitle' colspan=4 algin='center' style="background:#CCFFFF">矿山企业基本信息</td>
			</tr>
			<tr>
				<td class="tdhead">规划报告名称</td><td><textarea cols="30" rows="2" name="basedataBgname"></textarea></td>
				
				<!--  value="<?php echo $this->_tpl_vars['basedataArray'][0]->basedataBgname; ?>
" -->
				<td class="tdhead">绿色矿山级别</td><td ><select  name="basedataGreenlvl">
					<!-- <option value="<?php echo $this->_tpl_vars['basedataArray'][0]->basedataGreenlvl; ?>
"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataGreenlvl; ?>
</option> -->
					<option value="国家级">国家级</option>
					<option value="省级">省级</option>
					<option value="市（州）级">市（州）级</option>
					<option value="县级">县级</option>
				</td>
			</tr>
			<tr>
				<td class="tdhead">规划期限</td><td><input name="basedataLimit"></td>
				<td class="tdhead">规划基期(年份)</td><td><input  id="basedataJiqizhi" name="basedataJiqizhi" onchange="changeyears()"></td>
				<!--  value="<?php echo $this->_tpl_vars['basedataArray'][0]->basedataLimit; ?>
"
				value="<?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi; ?>
" -->
			</tr>
			<tr>
				<!--<td class="tdhead">组织单位</td><td><input  value="<?php echo $this->_tpl_vars['basedataArray'][0]->basedataOrgan; ?>
"  name="basedataOrgan"></td>-->
				<td class="tdhead">编制单位</td><td><input name="basedataEstablish"></td>
				<td class="tdhead">报告出具日期</td><td><input class="datepicker" name="basedataBgdate"></td>
				 <!-- value="<?php echo $this->_tpl_vars['basedataArray'][0]->basedataEstablish; ?>
"
value="<?php echo $this->_tpl_vars['basedataArray'][0]->basedataBgdate; ?>
"  -->
			</tr>
			<tr>
				<td class="tdhead">矿山名称</td><td><input name="basedataMinename"></td>
				<td class="tdhead">矿山成立时间</td><td><input  class="datepicker" name="basedataBuildtime"></td>
				<!--  value="<?php echo $this->_tpl_vars['basedataArray'][0]->basedataMinename; ?>
"
 value="<?php echo $this->_tpl_vars['basedataArray'][0]->basedataBuildtime; ?>
" -->
			</tr>
			<tr>
				<td class="tdhead">企业名称</td><td><input name="basedataCompanyname"></td>
				<!--  value="<?php echo $this->_tpl_vars['basedataArray'][0]->basedataCompanyname; ?>
" -->
				<td class="tdhead">企业性质</td><td><select  name="basedataEnterpriseproperty">
					<!-- <option value="<?php echo $this->_tpl_vars['basedataArray'][0]->basedataEnterpriseproperty; ?>
"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataEnterpriseproperty; ?>
</option> -->
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
				<td class="tdhead">所属企业名称</td><td><input name="basedataOwedname"></td>
				<td class="tdhead">规划范围(平方千米)</td><td><input name="basedataArea"></td>
				<!-- value="<?php echo $this->_tpl_vars['basedataArray'][0]->basedataOwedname; ?>
" 
value="<?php echo $this->_tpl_vars['basedataArray'][0]->basedataArea; ?>
"  -->
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
				<td class="tdhead">企业荣誉描述</td><td colspan=3><textarea cols="60" rows="3"  name="basedataReward"></textarea></td>
				<!-- <?php echo $this->_tpl_vars['basedataArray'][0]->basedataReward; ?>
</textarea> -->
			</tr>
			<tr>
				<!--矿山效益-->
				<td class="tdhead">矿山企业总产值(万元)</td><td width="30%"><input name="basedataValue"><input type="button" id="button_basedataValue" value="详情"/></td>
				<td class="tdhead">矿山企业利税(万元)</td><td><input name="basedataFee"><input type="button" id="button_basedataFee" value="详情"/></td>
				<!--  value="<?php echo $this->_tpl_vars['basedataArray'][0]->basedataValue; ?>
"
value="<?php echo $this->_tpl_vars['basedataArray'][0]->basedataFee; ?>
"  -->
			</tr>
   		</table>
   		<table align="center" style="display:none;" class="formView" id="bef3_pre5_basedataValue">
			<tr>
				<td id="t_basedataValue_bef3" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-2; ?>
年实际值</td><td><input type="text" name="basedataValue_bef3"></td>
				<td id="t_basedataValue_bef2" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-1; ?>
年实际值</td><td><input name="basedataValue_bef2"></td>
				<!--  value="<?php echo $this->_tpl_vars['basedata35Array'][3][0]; ?>
"
value="<?php echo $this->_tpl_vars['basedata35Array'][3][1]; ?>
"  -->
		</tr>
		<tr>
				<td id="t_basedataValue_bef1" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi; ?>
年实际值</td><td><input name="basedataValue_bef1"></td>
		</tr>
		<tr>
				<td id="t_basedataValue_pre1" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年规划值</td><td><input name="basedataValue_pre1"></td>
				<td id="t_basedataValue_pre1real" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年实际值</td><td><input name="basedataValue_pre1real"></td>
		</tr>
		<tr>
				<td id="t_basedataValue_pre2" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年规划值</td><td><input name="basedataValue_pre2"></td>
				<td id="t_basedataValue_pre2real" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年实际值</td><td><input name="basedataValue_pre2real"></td>
		</tr>
		<tr>
				<td id="t_basedataValue_pre3" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年规划值</td><td><input name="basedataValue_pre3"></td>
				<td id="t_basedataValue_pre3real" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年实际值</td><td><input name="basedataValue_pre3real"></td>
		</tr>
		<tr>
				<td id="t_basedataValue_pre4" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年规划值</td><td><input name="basedataValue_pre4"></td>
				<td id="t_basedataValue_pre4real" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年实际值</td><td><input name="basedataValue_pre4real"></td>
		</tr>
		<tr>
				<td id="t_basedataValue_pre5" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年规划值</td><td><input name="basedataValue_pre5"></td>
				<td id="t_basedataValue_pre5real" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年实际值</td><td><input name="basedataValue_pre5real"></td>	  
		</tr>
		<!-- value="<?php echo $this->_tpl_vars['basedata35Array'][3][2]; ?>
" 
value="<?php echo $this->_tpl_vars['basedata35Array'][3][3]; ?>
" 
value="<?php echo $this->_tpl_vars['basedata35Array'][3][4]; ?>
" 
value="<?php echo $this->_tpl_vars['basedata35Array'][3][5]; ?>
" 
value="<?php echo $this->_tpl_vars['basedata35Array'][3][6]; ?>
" 
value="<?php echo $this->_tpl_vars['basedata35Array'][3][7]; ?>
" 
value="<?php echo $this->_tpl_vars['basedata35Array'][3][8]; ?>
" 
 value="<?php echo $this->_tpl_vars['basedata35Array'][3][9]; ?>
"
value="<?php echo $this->_tpl_vars['basedata35Array'][3][10]; ?>
" 
value="<?php echo $this->_tpl_vars['basedata35Array'][3][11]; ?>
" 
value="<?php echo $this->_tpl_vars['basedata35Array'][3][12]; ?>
"  -->
	</table>
	<table align="center" style="display:none;" class="formView" id="bef3_pre5_basedataFee">
		<tr>
				<td id="t_basedataFee_bef3" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-2; ?>
年实际值</td><td><input name="basedataFee_bef3"></td>
				<td id="t_basedataFee_bef2" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-1; ?>
年实际值</td><td><input name="basedataFee_bef2"></td>
		</tr>
		<tr>
				<td id="t_basedataFee_bef1" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi; ?>
年实际值</td><td><input name="basedataFee_bef1"></td>
		</tr>
		<tr>
				<td id="t_basedataFee_pre1" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年规划值</td><td><input name="basedataFee_pre1"></td>
				<td id="t_basedataFee_pre1real" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年实际值</td><td><input name="basedataFee_pre1real"></td>
		</tr>
		<tr>
				<td id="t_basedataFee_pre2" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年规划值</td><td><input name="basedataFee_pre2"></td>
				<td id="t_basedataFee_pre2real" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年实际值</td><td><input name="basedataFee_pre2real"></td>
		</tr>
		<tr>
				<td id="t_basedataFee_pre3" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年规划值</td><td><input name="basedataFee_pre3"></td>
				<td id="t_basedataFee_pre3real" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年实际值</td><td><input name="basedataFee_pre3real"></td>
		</tr>
		<tr>
				<td id="t_basedataFee_pre4" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年规划值</td><td><input name="basedataFee_pre4"></td>
				<td id="t_basedataFee_pre4real" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年实际值</td><td><input name="basedataFee_pre4real"></td>
		</tr>
		<tr>
				<td id="t_basedataFee_pre5" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年规划值</td><td><input name="basedataFee_pre5"></td>
				<td id="t_basedataFee_pre5real" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年实际值</td><td><input name="basedataFee_pre5real"></td>	  
		</tr>
		<!-- value="<?php echo $this->_tpl_vars['basedata35Array'][4][0]; ?>
" 
value="<?php echo $this->_tpl_vars['basedata35Array'][4][1]; ?>
" 
 value="<?php echo $this->_tpl_vars['basedata35Array'][4][2]; ?>
"
value="<?php echo $this->_tpl_vars['basedata35Array'][4][3]; ?>
" 
 value="<?php echo $this->_tpl_vars['basedata35Array'][4][4]; ?>
"
 value="<?php echo $this->_tpl_vars['basedata35Array'][4][5]; ?>
"
 value="<?php echo $this->_tpl_vars['basedata35Array'][4][6]; ?>
"
 value="<?php echo $this->_tpl_vars['basedata35Array'][4][7]; ?>
"
 value="<?php echo $this->_tpl_vars['basedata35Array'][4][8]; ?>
"
 value="<?php echo $this->_tpl_vars['basedata35Array'][4][9]; ?>
"
 value="<?php echo $this->_tpl_vars['basedata35Array'][4][10]; ?>
"
 value="<?php echo $this->_tpl_vars['basedata35Array'][4][11]; ?>
"
 value="<?php echo $this->_tpl_vars['basedata35Array'][4][12]; ?>
" -->
	</table>
	<table class="formView" align="center" width='100%'>
		<tr>
			<td class="tdhead">矿山企业利润(万元)</td><td width="30%"><input   name="basedataProfit"><input type="button" id="button_basedataProfit" value="详情"/></td>
			<td class="tdhead">矿山企业人数(人)</td><td><input name="basedataWorker"></td>
			<!--  value="<?php echo $this->_tpl_vars['basedataArray'][0]->basedataProfit; ?>
"
   value="<?php echo $this->_tpl_vars['basedataArray'][0]->basedataWorker; ?>
" -->
		</tr>
	</table>
	<table align="center" style="display:none;" class="formView" id="bef3_pre5_basedataProfit">
		<tr>
			<td id="t_basedataProfit_bef3" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-2; ?>
年实际值</td><td><input name="basedataProfit_bef3"></td>
			<td id="t_basedataProfit_bef2" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-1; ?>
年实际值</td><td><input name="basedataProfit_bef2"></td>
		</tr>
		<tr>
			<td id="t_basedataProfit_bef1"class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi; ?>
年实际值</td><td><input name="basedataProfit_bef1"></td>
		</tr>
		<tr>
			<td id="t_basedataProfit_pre1" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年规划值</td><td><input name="basedataProfit_pre1"></td>
			<td id="t_basedataProfit_pre1real" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年实际值</td><td><input name="basedataProfit_pre1real"></td>
		</tr>
		<tr>
			<td id="t_basedataProfit_pre2" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年规划值</td><td><input name="basedataProfit_pre2"></td>
			<td id="t_basedataProfit_pre2real" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年实际值</td><td><input name="basedataProfit_pre2real"></td>
		</tr>
		<tr>
			<td id="t_basedataProfit_pre3" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年规划值</td><td><input name="basedataProfit_pre3"></td>
			<td id="t_basedataProfit_pre3real" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年实际值</td><td><input name="basedataProfit_pre3real"></td>
		</tr>
		<tr>
			<td id="t_basedataProfit_pre4" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年规划值</td><td><input name="basedataProfit_pre4"></td>
			<td id="t_basedataProfit_pre4real" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年实际值</td><td><input name="basedataProfit_pre4real"></td>
		</tr>
		<tr>
			<td id="t_basedataProfit_pre5" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年规划值</td><td><input name="basedataProfit_pre5"></td>
			<td id="t_basedataProfit_pre5real" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年实际值</td><td><input name="basedataProfit_pre5real"></td>	  
		</tr>
		<!--value="<?php echo $this->_tpl_vars['basedata35Array'][5][0]; ?>
" 
value="<?php echo $this->_tpl_vars['basedata35Array'][5][1]; ?>
" 
value="<?php echo $this->_tpl_vars['basedata35Array'][5][2]; ?>
" 
value="<?php echo $this->_tpl_vars['basedata35Array'][5][3]; ?>
" 
value="<?php echo $this->_tpl_vars['basedata35Array'][5][4]; ?>
" 
value="<?php echo $this->_tpl_vars['basedata35Array'][5][5]; ?>
" 
value="<?php echo $this->_tpl_vars['basedata35Array'][5][6]; ?>
" 
 value="<?php echo $this->_tpl_vars['basedata35Array'][5][7]; ?>
"
 value="<?php echo $this->_tpl_vars['basedata35Array'][5][8]; ?>
"
value="<?php echo $this->_tpl_vars['basedata35Array'][5][9]; ?>
" 
value="<?php echo $this->_tpl_vars['basedata35Array'][5][10]; ?>
" 
 value="<?php echo $this->_tpl_vars['basedata35Array'][5][11]; ?>
"
value="<?php echo $this->_tpl_vars['basedata35Array'][5][12]; ?>
"   -->
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
					<!-- <option value="<?php echo $this->_tpl_vars['basedataArray'][0]->basedataEnterpriseproperty; ?>
"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataEnterpriseproperty; ?>
</option> -->
					<option value="采矿权">采矿权</option>
					<option value="探矿权">探矿权</option>
					<!-- <option value="划定矿区范围">划定矿区范围</option> -->
				</select>
			</td>
			<td class="tdhead">储量规模</td>
			<td>
				<select name="basedataMinescale">
					<!-- <option value="<?php echo $this->_tpl_vars['basedataArray'][0]->basedataMinescale; ?>
"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataMinescale; ?>
</option> -->
					<option value="超大型">超大型</option>
					<option value="大型">大型</option>
					<option value="中型">中型</option>
					<option value="小型">小型</option>

				</select>
			</td>
		</tr>
		<table class="formView" align="center" width="100%" id="weidu">
		<tr>
			<td class="tdhead">经度</td><td width="30%"><input name="basedataPointLongitude"></td>
			<td class="tdhead">纬度</td><td><input name="basedataPointLatitude"><input type="button" onclick="addweidu();"  value="添加" ></td>
			<!-- value="<?php echo $this->_tpl_vars['basedataArray'][0]->basedataPointLongitude; ?>
" 
value="<?php echo $this->_tpl_vars['basedataArray'][0]->basedataPointLatitude; ?>
"  -->
		</tr>
	    </table>
	    <?php $_from = $this->_tpl_vars['minezuobiaoArray']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['z']):
?>
	    <table class="formView" align="center" width="100%">
	    <tr>
	    	<td class="tdhead">经度</td><td><input name="basedataZuobiaoJing[]"></td>
	    	<td class="tdhead">纬度</td><td><input name="basedataZuobiaoWei[]"></td>
	    </tr>
	    <!-- value="<?php echo $this->_tpl_vars['z'][0]; ?>
" 
 value="<?php echo $this->_tpl_vars['z'][1]; ?>
" -->
		</table>
	    <?php endforeach; endif; unset($_from); ?>
		<?php $_from = $this->_tpl_vars['oredataand35Array']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['o']):
?>
		
		<table class="formView" align="center" width="100%">
			<tr><td colspan=4 class='tdhead'>矿种<?php echo $this->_tpl_vars['o'][22]+1; ?>
</td></tr>
			<tr>
				<td class="tdhead">矿种名称</td>
				<td width="30%" style="padding:0">
					<select id="1"  onchange="getchild(this.id)" width="90%" name="oreNametype[]">
						<!-- <option value="<?php echo $this->_tpl_vars['o'][21]; ?>
"><?php echo $this->_tpl_vars['o'][21]; ?>
</option> -->
						<option value="能源矿产">能源矿产</option>
						<option value="金属矿产">金属矿产</option>
						<option value="非金属矿产">非金属矿产</option>
						<option value="煤矿">煤矿</option>
					</select>
					<select id="child1"  name="orename[]" width="90%">
						<option>请选择</option>
						<!-- value="<?php echo $this->_tpl_vars['o'][0]; ?>
" -->
					</select>
				</td>  
				<td class="tdhead">矿种类别</td>
				<td width="30%">
					<select name="oretype[]">
						<!-- <option value="<?php echo $this->_tpl_vars['o'][1]; ?>
"><?php echo $this->_tpl_vars['o'][1]; ?>
</option> -->
						<option value="主矿种">主矿种</option>
						<option value="伴生矿种">伴生矿种</option>
					</select>
				</td>
				<tr>
					<td class="tdhead">保有储量</td>
					<td width="30%" style="padding:0">
						<select name="oreLevelhType[]" >
							<option value="矿石量">矿石量</option>
							<option value="金属量">金属量</option>
						</select>
						<input type="text" name="oreLevelh[]" replace="数值" style="width:50px" />
						<!--  value="<?php echo $this->_tpl_vars['o'][39]; ?>
" -->
						<select name="oreLevelhUnit[]"  style="width:50px">
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
							<option value="矿石量">矿石量</option>
							<option value="金属量">金属量</option>
						</select>
						<input type="text" name="oreLevela[]" replace="数值" style="width:50px" />
						<!--  value="<?php echo $this->_tpl_vars['o'][40]; ?>
" -->
						<select name="oreLevelaUnit[]"  style="width:50px">
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
					 <table align="center" style="display:none;" class="formView" >
					 	<!-- id="oreLevelhs<?php echo $this->_tpl_vars['o'][22]; ?>
" -->
						<tr>
							<td id="oreLevelh111" class="tdhead">保有储量111级</td><td><input  name="oreLevelh111[]"></td>
							<td id="oreLevelh121122" class="tdhead">保有储量121/122级</td><td><input name="oreLevelh121122[]"></td>
						</tr>
						<tr>
							<td id="oreLevelh111b" class="tdhead">保有储量111b级</td><td><input name="oreLevelh111b[]"></td>
						</tr>
						<tr>
							<td id="oreLevelh121b"class="tdhead">保有储量121b级</td><td><input name="oreLevelh121b[]"></td>
							<td id="oreLevelh122b" class="tdhead">保有储量122b级</td><td><input name="oreLevelh122b[]"></td>
						</tr>
						<tr>
							<td id="oreLevelh2m111" class="tdhead">保有储量2m11级</td><td><input name="oreLevelh2m111[]"></td>
							<td id="oreLevelh2m21" class="tdhead">保有储量2m21级</td><td><input  name="oreLevelh2m21[]"></td>
						</tr>
						<tr>
							<td id="oreLevelh2m22" class="tdhead">保有储量2m22级</td><td><input  name="oreLevelh2m22[]"></td>
							<td id="oreLevelh2s11" class="tdhead">保有储量2s11级</td><td><input  name="oreLevelh2s11[]"></td>
						</tr>
						<tr>
							<td id="oreLevelh2s21" class="tdhead">保有储量2s21级</td><td><input  name="oreLevelh2s21[]"></td>
							<td id="oreLevelh2s22" class="tdhead">保有储量2s22级</td><td><input  name="oreLevelh2s22[]"></td>
						</tr>
						<tr>
							<td id="oreLevelh331"class="tdhead">保有储量331级</td><td><input  name="oreLevelh331[]"></td>
							<td id="oreLevelh332"class="tdhead">保有储量332级</td><td><input  name="oreLevelh332[]"></td>	  
						</tr>
						<tr>
							<td id="oreLevelh333"class="tdhead">保有储量333级</td><td><input  name="oreLevelh333[]"></td>
							<td id="oreLevelh334"class="tdhead">保有储量334级</td><td><input  name="oreLevelh334[]"></td>	  
						</tr>
					</table>
					<!-- value="<?php echo $this->_tpl_vars['o'][41]; ?>
"
value="<?php echo $this->_tpl_vars['o'][42]; ?>
" 
value="<?php echo $this->_tpl_vars['o'][43]; ?>
" 
value="<?php echo $this->_tpl_vars['o'][44]; ?>
" 
value="<?php echo $this->_tpl_vars['o'][45]; ?>
" 
value="<?php echo $this->_tpl_vars['o'][46]; ?>
" 
value="<?php echo $this->_tpl_vars['o'][47]; ?>
"
value="<?php echo $this->_tpl_vars['o'][48]; ?>
"
value="<?php echo $this->_tpl_vars['o'][49]; ?>
"
value="<?php echo $this->_tpl_vars['o'][50]; ?>
"
value="<?php echo $this->_tpl_vars['o'][51]; ?>
"
value="<?php echo $this->_tpl_vars['o'][52]; ?>
"
value="<?php echo $this->_tpl_vars['o'][53]; ?>
"
value="<?php echo $this->_tpl_vars['o'][54]; ?>
"
value="<?php echo $this->_tpl_vars['o'][55]; ?>
" -->
					<tr><td colspan=4 style="border:none"><table align="center" style="display:none;" class="formView" >
						<!-- id="oreLevelas<?php echo $this->_tpl_vars['o'][22]; ?>
" -->
						<tr>
							<td id="oreLevela111" class="tdhead">可采储量111级</td><td><input  name="oreLevela111[]"></td>
							<td id="oreLevela121122" class="tdhead">可采储量121/122级</td><td><input  name="oreLevela121122[]"></td>
						</tr>
						<tr>
							<td id="oreLevela111b" class="tdhead">可采储量111b级</td><td><input  name="oreLevela111b[]"></td>
						</tr>
						<tr>
							<td id="oreLevela121b"class="tdhead">可采储量121b级</td><td><input  name="oreLevela121b[]"></td>
							<td id="oreLevela122b" class="tdhead">可采储量122b级</td><td><input  name="oreLevela122b[]"></td>
						</tr>
						<tr>
							<td id="oreLevela2m111" class="tdhead">可采储量2m11级</td><td><input  name="oreLevela2m111[]"></td>
							<td id="oreLevela2m21" class="tdhead">可采储量2m21级</td><td><input  name="oreLevela2m21[]"></td>
						</tr>
						<tr>
							<td id="oreLevela2m22" class="tdhead">可采储量2m22级</td><td><input  name="oreLevela2m22[]"></td>
							<!-- value="<?php echo $this->_tpl_vars['o'][56]; ?>
"
value="<?php echo $this->_tpl_vars['o'][57]; ?>
"
value="<?php echo $this->_tpl_vars['o'][58]; ?>
"
value="<?php echo $this->_tpl_vars['o'][59]; ?>
"
value="<?php echo $this->_tpl_vars['o'][60]; ?>
"
value="<?php echo $this->_tpl_vars['o'][61]; ?>
"
value="<?php echo $this->_tpl_vars['o'][62]; ?>
"
value="<?php echo $this->_tpl_vars['o'][63]; ?>
" -->
							<td id="oreLevela2s11" class="tdhead">可采储量2s11级</td><td><input  name="oreLevela2s11[]"></td>
						</tr>
						<tr>
							<td id="oreLevela2s21" class="tdhead">可采储量2s21级</td><td><input  name="oreLevela2s21[]"></td>
							<td id="oreLevela2s22" class="tdhead">可采储量2s22级</td><td><input  name="oreLevela2s22[]"></td>
						</tr>
						<tr>
							<td id="oreLevela331"class="tdhead">可采储量331级</td><td><input  name="oreLevela331[]"></td>
							<td id="oreLevela332"class="tdhead">可采储量332级</td><td><input  name="oreLevela332[]"></td>	  
						</tr>
						<tr>
							<td id="oreLevela333"class="tdhead">可采储量333级</td><td><input  name="oreLevela333[]"></td>
							<td id="oreLevela334"class="tdhead">可采储量334级</td><td><input  name="oreLevela334[]"></td>	  
						</tr>
						<!-- value="<?php echo $this->_tpl_vars['o'][64]; ?>
"
value="<?php echo $this->_tpl_vars['o'][65]; ?>
"
value="<?php echo $this->_tpl_vars['o'][66]; ?>
"
value="<?php echo $this->_tpl_vars['o'][67]; ?>
"
value="<?php echo $this->_tpl_vars['o'][68]; ?>
"
value="<?php echo $this->_tpl_vars['o'][69]; ?>
"
value="<?php echo $this->_tpl_vars['o'][70]; ?>
" -->
					</table></td>
				</tr>
			</tr>
			<tr>
				<td class='tdhead' colspan=4>
					<input type='button' value='添加矿种' onclick='addminerate();'/><input type='button' value='删除此矿种' onclick='ramoveminerate(this);'/>
				</td>
			</tr>
		</table>
		
		<?php endforeach; else: ?>
		<table class="formView" align="center"  width="100%" id="ored">
		<tr>
			<td align="center">没有记录
				<input type='button' value='添加矿种' onclick='addminerate();'>
			</td>
		</tr>
		</table>
		<?php endif; unset($_from); ?>
	</table>

	<table class="formView" align="center"  width="100%">
	
	</table>
	<table class="formView" align="center" width='100%'>
		<tr>
			<td class='tdtitle' colspan=4 algin='center' style="background:#CCFFFF">矿山生产经营信息</td>
		</tr>
		<tr>
		<td class="tdhead">矿山开采方式</td><td width="30%"><select  name="basedataDigtype">
					<!-- <option value="<?php echo $this->_tpl_vars['basedataArray'][0]->basedataDigtype; ?>
"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataDigtype; ?>
</option> -->
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
		<td class="tdhead">矿山开采回采率(%)</td><td><input name="basedataDigreturnrate"><input type="button" id="button_basedataDigreturnrate" value="详情"/></td>
		<!--    value="<?php echo $this->_tpl_vars['basedataArray'][0]->basedataDigreturnrate; ?>
" -->
		</tr>
	</table>
	<table align="center" style="display:none;" class="formView" id="bef3_pre5_basedataDigreturnrate">
		<tr>
			<td id="t_basedataDigreturnrate_bef3" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-2; ?>
年实际值</td><td><input  name="basedataDigreturnrate_bef3"></td>
			<td id="t_basedataDigreturnrate_bef2" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-1; ?>
年实际值</td><td><input  name="basedataDigreturnrate_bef2"></td>
		</tr>
		<tr>
			<td id="t_basedataDigreturnrate_bef1" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi; ?>
年实际值</td><td><input  name="basedataDigreturnrate_bef1"></td>
		</tr>
		<tr>
			<td id="t_basedataDigreturnrate_pre1"class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年规划值</td><td><input  name="basedataDigreturnrate_pre1"></td>
			<td id="t_basedataDigreturnrate_pre1real" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年实际值</td><td><input  name="basedataDigreturnrate_pre1real"></td>
		</tr>
		<tr>
			<td id="t_basedataDigreturnrate_pre2"class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年规划值</td><td><input  name="basedataDigreturnrate_pre2"></td>
			<td id="t_basedataDigreturnrate_pre2real" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年实际值</td><td><input  name="basedataDigreturnrate_pre2real"></td>
		</tr>
		<tr>
			<td id="t_basedataDigreturnrate_pre3" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年规划值</td><td><input  name="basedataDigreturnrate_pre3"></td>
			<td id="t_basedataDigreturnrate_pre3real" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年实际值</td><td><input  name="basedataDigreturnrate_pre3real"></td>
		</tr>
		<!-- value="<?php echo $this->_tpl_vars['basedata35Array'][0][0]; ?>
"
value="<?php echo $this->_tpl_vars['basedata35Array'][0][1]; ?>
"
value="<?php echo $this->_tpl_vars['basedata35Array'][0][2]; ?>
"
value="<?php echo $this->_tpl_vars['basedata35Array'][0][3]; ?>
"
value="<?php echo $this->_tpl_vars['basedata35Array'][0][4]; ?>
"
value="<?php echo $this->_tpl_vars['basedata35Array'][0][5]; ?>
"
value="<?php echo $this->_tpl_vars['basedata35Array'][0][6]; ?>
"
value="<?php echo $this->_tpl_vars['basedata35Array'][0][7]; ?>
"
value="<?php echo $this->_tpl_vars['basedata35Array'][0][8]; ?>
" -->
		<tr>
			<td id="t_basedataDigreturnrate_pre4" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年规划值</td><td><input  name="basedataDigreturnrate_pre4"></td>
			<td id="t_basedataDigreturnrate_pre4real" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年实际值</td><td><input  name="basedataDigreturnrate_pre4real"></td>
		</tr>
		<tr>
			<td id="t_basedataDigreturnrate_pre5"class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年规划值</td><td><input  name="basedataDigreturnrate_pre5"></td>
			<td id="t_basedataDigreturnrate_pre5real"class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年实际值</td><td><input  name="basedataDigreturnrate_pre5real"></td>	  
			<!-- value="<?php echo $this->_tpl_vars['basedata35Array'][0][9]; ?>
"
value="<?php echo $this->_tpl_vars['basedata35Array'][0][10]; ?>
"
value="<?php echo $this->_tpl_vars['basedata35Array'][0][11]; ?>
"
value="<?php echo $this->_tpl_vars['basedata35Array'][0][12]; ?>
" -->
		</tr>
	</table>
	<table class="formView" align="center" width='100%'>
                <tr>
		<td class="tdhead">矿山选矿回收率(%)</td><td width="30%"><input   name="basedataSepareturnrate"><input type="button" id="button_basedataSepareturnrate" value="详情"/></td>	
		<td class="tdhead">矿山矿床类型</td><td><input   name="basedataMinertype"></td>
		<!--  value="<?php echo $this->_tpl_vars['basedataArray'][0]->basedataSepareturnrate; ?>
"
 value="<?php echo $this->_tpl_vars['basedataArray'][0]->basedataMinertype; ?>
" -->
		</tr>
	</table>
<table align="center" style="display:none;" class="formView" id="bef3_pre5_basedataSepareturnrate">
		<tr>
			<td id="t_basedataSepareturnrate_bef3"class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-2; ?>
年实际值</td><td><input name="basedataSepareturnrate_bef3"></td>
			<td id="t_basedataSepareturnrate_bef2" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-1; ?>
年实际值</td><td><input  name="basedataSepareturnrate_bef2"></td>
		</tr>
		<tr>
			<td id="t_basedataSepareturnrate_bef1" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi; ?>
年实际值</td><td><input  name="basedataSepareturnrate_bef1"></td>
		</tr>
		<tr>
			<td id="t_basedataSepareturnrate_pre1" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年规划值</td><td><input  name="basedataSepareturnrate_pre1"></td>
			<td id="t_basedataSepareturnrate_pre1real" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年实际值</td><td><input  name="basedataSepareturnrate_pre1real"></td>
		</tr>
		<tr>
			<td id="t_basedataSepareturnrate_pre2" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年规划值</td><td><input  name="basedataSepareturnrate_pre2"></td>
			<td id="t_basedataSepareturnrate_pre2real"class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年实际值</td><td><input  name="basedataSepareturnrate_pre2real"></td>
		</tr>
		<tr>
			<td id="t_basedataSepareturnrate_pre3" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年规划值</td><td><input  name="basedataSepareturnrate_pre3"></td>
			<td id="t_basedataSepareturnrate_pre3real" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年实际值</td><td><input  name="basedataSepareturnrate_pre3real"></td>
		</tr>
		<tr>
			<td id="t_basedataSepareturnrate_pre4" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年规划值</td><td><input  name="basedataSepareturnrate_pre4"></td>
			<td id="t_basedataSepareturnrate_pre4real" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年实际值</td><td><input  name="basedataSepareturnrate_pre4real"></td>
		</tr>
		<tr>
			<td id="t_basedataSepareturnrate_pre5" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年规划值</td><td><input  name="basedataSepareturnrate_pre5"></td>
			<td id="t_basedataSepareturnrate_pre5real" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年实际值</td><td><input  name="basedataSepareturnrate_pre5real"></td>	  
		</tr>
		<!-- value="<?php echo $this->_tpl_vars['basedata35Array'][1][0]; ?>
" 
value="<?php echo $this->_tpl_vars['basedata35Array'][1][1]; ?>
"
value="<?php echo $this->_tpl_vars['basedata35Array'][1][2]; ?>
"
value="<?php echo $this->_tpl_vars['basedata35Array'][1][3]; ?>
"
value="<?php echo $this->_tpl_vars['basedata35Array'][1][4]; ?>
"
value="<?php echo $this->_tpl_vars['basedata35Array'][1][5]; ?>
"
value="<?php echo $this->_tpl_vars['basedata35Array'][1][6]; ?>
"
value="<?php echo $this->_tpl_vars['basedata35Array'][1][7]; ?>
"
value="<?php echo $this->_tpl_vars['basedata35Array'][1][8]; ?>
"
value="<?php echo $this->_tpl_vars['basedata35Array'][1][9]; ?>
"
value="<?php echo $this->_tpl_vars['basedata35Array'][1][10]; ?>
"
value="<?php echo $this->_tpl_vars['basedata35Array'][1][11]; ?>
"
value="<?php echo $this->_tpl_vars['basedata35Array'][1][12]; ?>
" -->
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
				<input type="text"  name="basedataSepa" >
				<!-- value="<?php echo $this->_tpl_vars['basedataArray'][0]->basedataSepa; ?>
" -->
		</td>
		</tr>
	</table>
	<table class="formView" align="center" width='100%'>
		
		<tr>
			<td class="tdhead">实际生产规模</td><td width="30%"><input  name="basedataProduceScale"><input type="button" id="button_basedataProduceScale" value="详情"/></td>
			<td class="tdhead">产品方案</td><td width="30%"><input  name="basedataOrgan"></td>
		</tr>
	</table>
	<table align="center" style="display:none;" class="formView" id="bef3_pre5_basedataProduceScale">
		<tr>
			<td id="t_basedataProduceScale_bef3" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-2; ?>
年实际值</td><td><input  name="basedataProduceScale_bef3"></td>
			<td id="t_basedataProduceScale_bef2" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi-1; ?>
年实际值</td><td><input  name="basedataProduceScale_bef2"></td>
		</tr>
		<tr>
			<td id="t_basedataProduceScale_bef1" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi; ?>
年实际值</td><td><input  name="basedataProduceScale_bef1"></td>
		</tr>
		<tr>
			<td id="t_basedataProduceScale_pre1" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年规划值</td><td><input  name="basedataProduceScale_pre1"></td>
			<td id="t_basedataProduceScale_pre1real" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+1; ?>
年实际值</td><td><input  name="basedataProduceScale_pre1real"></td>
		</tr>
		<tr>
			<td id="t_basedataProduceScale_pre2" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年规划值</td><td><input  name="basedataProduceScale_pre2"></td>
			<td id="t_basedataProduceScale_pre2real" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+2; ?>
年实际值</td><td><input  name="basedataProduceScale_pre2real"></td>
		</tr>
		<tr>
			<td id="t_basedataProduceScale_pre3" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年规划值</td><td><input  name="basedataProduceScale_pre3"></td>
			<td id="t_basedataProduceScale_pre3real" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+3; ?>
年实际值</td><td><input  name="basedataProduceScale_pre3real"></td>
		</tr>
		<tr>
			<td id="t_basedataProduceScale_pre4" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年规划值</td><td><input  name="basedataProduceScale_pre4"></td>
			<td id="t_basedataProduceScale_pre4real" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+4; ?>
年实际值</td><td><input  name="basedataProduceScale_pre4real"></td>
		</tr>
		<tr>
			<td id="t_basedataProduceScale_pre5" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年规划值</td><td><input  name="basedataProduceScale_pre5"></td>
			<td id="t_basedataProduceScale_pre5real" class="tdhead"><?php echo $this->_tpl_vars['basedataArray'][0]->basedataJiqizhi+5; ?>
年实际值</td><td><input  name="basedataProduceScale_pre5real"></td>	  
		</tr>
		<!-- value="<?php echo $this->_tpl_vars['basedataArray'][0]->basedataProduceScale; ?>
"
value="<?php echo $this->_tpl_vars['basedataArray'][0]->basedataOrgan; ?>
"
value="<?php echo $this->_tpl_vars['basedata35Array'][2][0]; ?>
"
value="<?php echo $this->_tpl_vars['basedata35Array'][2][1]; ?>
"
value="<?php echo $this->_tpl_vars['basedata35Array'][2][2]; ?>
"
value="<?php echo $this->_tpl_vars['basedata35Array'][2][3]; ?>
"
value="<?php echo $this->_tpl_vars['basedata35Array'][2][4]; ?>
"
value="<?php echo $this->_tpl_vars['basedata35Array'][2][5]; ?>
"
value="<?php echo $this->_tpl_vars['basedata35Array'][2][6]; ?>
"
value="<?php echo $this->_tpl_vars['basedata35Array'][2][7]; ?>
"
value="<?php echo $this->_tpl_vars['basedata35Array'][2][8]; ?>
"
value="<?php echo $this->_tpl_vars['basedata35Array'][2][9]; ?>
"
value="<?php echo $this->_tpl_vars['basedata35Array'][2][10]; ?>
"
value="<?php echo $this->_tpl_vars['basedata35Array'][2][11]; ?>
"
value="<?php echo $this->_tpl_vars['basedata35Array'][2][12]; ?>
" -->
	</table>

	<table class="formView" align="center"  width="100%">
		<tr>
			<td class="tdhead">原矿石品位</td><td colspan=3><input type="text" name="basedataYuanHua" ></td>
			<td class="tdhead">贫化率</td><td colspan=3><input type="text" name="basedataWeiHua" ></td>
			<!-- value="<?php echo $this->_tpl_vars['basedataArray'][0]->basedataYuanHua; ?>
"
value="<?php echo $this->_tpl_vars['basedataArray'][0]->basedataWeiHua; ?>
" -->
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

        
	
	
</div>
	<input type="submit" value="下一步" />
	<input type="button" onclick="location.href='/minedata/ChooseMineData'" value="返回" />
	<!-- <input type="button" onclick="testajax();" value="测试" /> -->
</form>