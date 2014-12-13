
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
    
		  铁路罐车计量单（发货）
		  <table class="formView" align="center">
			   <tr>
					<td>发货单位</td>
					<td>{$detailApply.sendCompany}</td>
					<td>发站</td>
					<td>{$detailApply.sendStation}</td>
					<td>产品名称</td>
					<td>{$oilModel}{$oilType}</td>
			   </tr>
			   <tr>
					<td>收货单位</td>
					<td>{$detailApply.company}</td>
					<td>到站</td>
					<td>{$station}</td>
					<td>计量单号</td>
					<td>{$detailApply.measurekey}</td>
			   </tr>
		  </table>
	<table id="superTable"  class="formView" width="95%">
               
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
						 
                                  <td>{$t.trainType}</td>
    				  <td>{$t.position}</td>
				  <td>{$t.load}</td>
						 <td>{$t.flowWeight}</td>
						 <td>{$t.volumeSign}</td>
						 <td>{$t.volumeNumber}</td>
						 <td>{$t.oilHeight}</td>
						 <td>{$t.waterHeight}</td>
						 <td>{$t.temperature}</td>
						 <td>{$t.tryTemperature}</td>
						 <td>{$t.watchDensity}</td>
						 <td>{$t.standardDensity}</td>
						 <td>{$t.trueVolume}</td>
						 <td>{$t.manMeasure}</td>
						 <td>{$t.sign}</td>
						 
						 <td>{$t.potNumber}</td>
					</tr>        
			   {/foreach}
			 
          </table>
		  <table class="formView" align="center">
			   <tr>
					<td>计量人员</td>
					<td>{$detailApply.measureman}</td>
					<td>计算人员</td>
					<td>{$detailApply.calculateman}</td>
					<td>负责人员</td>
					<td>{$detailApply.responsibleman}</td>
			   </tr>
		  </table>
		  <p>
			   <input type="submit" onclick="javascript:history.back(-1);"  value="返回" />

