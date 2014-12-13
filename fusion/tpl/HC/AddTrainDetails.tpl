
<script type="text/javascript">
{literal}
$(document).ready(function(){
  
  $('#superTable').toSuperTable({
	width: "900px",
	height:"300px",
	//fixedCols: 1,
	headerRows: 1
  });

});
{/literal}
</script>
     <form name="form" action="/HC/SaveTrainDetails/{$detailApplyId}" method="post">
		  铁路罐车计量单（发货）
		  <table class="formView" align="center">
			   <tr>
					<td class='tdhead'>发货单位</td>
					<td><input type="text" value="{$detailApply.sendCompany}" name="sendCompany"/></td>
					<td class='tdhead'>发站</td>
					<td><input type="text" value="{$detailApply.sendStation}" name="sendStation"/></td>
					<td class='tdhead'>产品名称</td>
					<td>{$oilModel}{$oilType}</td>
			   </tr>
			   <tr>
					<td class='tdhead'>收货单位</td>
					<td>{$detailApply.company}</td>
					<td class='tdhead'>到站</td>
					<td>{$station}</td>
					<td class='tdhead'>计量单号</td>
					<td><input type="text" value="{$detailApply.measurekey}" name="measurekey"/></td>
			   </tr>
		  </table>
	<table id="superTable"  class="listView" width="95%">
               
		    <tr>
                           <th>车号</th>
			   <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;车型&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
			   <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;鹤位&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                           <th>标记载重(t)</th>
			   <th>流量计发出质量</th>
                           <th>标记容积(m3)</th>
			   <th>&nbsp;&nbsp;&nbsp;&nbsp;容积表号&nbsp;&nbsp;&nbsp;&nbsp;</th>
			   <th>&nbsp;&nbsp;油高(mm)&nbsp;&nbsp;</th>
			   <th>&nbsp;&nbsp;水高(mm)&nbsp;&nbsp;</th>
			   <th>&nbsp;&nbsp;计量温度(C)&nbsp;&nbsp;</th>
			   <th>&nbsp;&nbsp;试验温度(C)&nbsp;&nbsp;</th>
		           <th>视密度(kg/m^3)</th>
			   <th>标准密度(kg/m^3)</th>
			   <th>&nbsp;&nbsp;&nbsp;&nbsp;实测体积(L)&nbsp;&nbsp;&nbsp;&nbsp;</th>
			   <th>人工检尺发出质量(kg)</th>
			   <th>&nbsp;&nbsp;铅封号或标志&nbsp;&nbsp;</th>
			   <th>&nbsp;&nbsp;&nbsp;&nbsp;立式罐号&nbsp;&nbsp;&nbsp;&nbsp;</th>
                    </tr>
			   {foreach from=$trainArray item=t}
                    <tr>
				  <td>{$t.trainsign}</td>
						 
                                  <td><textarea cols="15" rows="1"  name="traintype[]">{$t.trainType}</textarea></td>
    				  <td><textarea cols="15" rows="1"  name="position[]">{$t.position}</textarea></td>
				  <td>{$t.load}</td>
						 <td>{$t.flowWeight}</td>
						 <td><textarea cols="15" rows="1"  name="volumeSign[]">{$t.volumeSign}</textarea></td>
						 <td><textarea cols="15" rows="1"  name="volumeNumber[]">{$t.volumeNumber}</textarea></td>
						 <td><textarea cols="15" rows="1"  name="oilHeight[]">{$t.oilHeight}</textarea></td>
						 <td><textarea cols="15" rows="1"  name="waterHeight[]">{$t.waterHeight}</textarea></td>
						 <td><textarea cols="15" rows="1"  name="temperature[]">{$t.temperature}</textarea></td>
						 <td><textarea cols="15" rows="1"  name="tryTemperature[]">{$t.tryTemperature}</textarea></td>
						 <td><textarea cols="15" rows="1"  name="watchDensity[]">{$t.watchDensity}</textarea></td>
						 <td><textarea cols="15" rows="1"  name="standardDensity[]">{$t.standardDensity}</textarea></td>
						 <td><textarea cols="15" rows="1"  name="trueVolume[]">{$t.trueVolume}</textarea></td>
						 <td><textarea cols="15" rows="1"  name="manMeasure[]">{$t.manMeasure}</textarea></td>
						 <td><textarea cols="15" rows="1"  name="sign[]">{$t.sign}</textarea></td>
						 
						 <td><textarea cols="15" rows="1"  name="potNumber[]">{$t.potNumber}</textarea></td>
					</tr>        
			   {/foreach}
			 
          </table>
		  <table class="formView" align="center">
			   <tr>
					<td class='tdhead'>计量人员</td>
					<td><input type="text" name="measureman" value="{$detailApply.measureman}" /></td>
					<td class='tdhead'>计算人员</td>
					<td><input type="text" name="calculateman" value="{$detailApply.calculateman}" /></td>
					<td class='tdhead'>负责人员</td>
					<td><input type="text" name="responsibleman" value="{$detailApply.responsibleman}" /></td>
			   </tr>
		  </table>
		  <p>
			   <input type="submit" value="保存" />
			   <input type="button" onclick="location.href='/HC/ListTrainDetail/}'" value="返回" />
	 </form>

