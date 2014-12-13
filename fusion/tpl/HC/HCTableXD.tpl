
<div class='tablebox'>
		<table class="formView" align="center" id="plan_list" width = "960px">
				    {foreach from=$detailApplyArray item=i}
				<tr><td>				
				       <table class="formView" align="center">
				       <tr>
				           <td class='tdhead'>结算单位</td><td colspan= 7>{$i.company}</td>
					  
				       </tr>
				        <tr>
                                               
						 <td class='tdhead'>品名</td>
						 <td>
							 {$i.oilModel.oilType}{$i.oilModel.oilModel}
						 </td>
						
						 
						 <td class='tdhead'>数量(吨)</td><td>{$i.weight}</td>
						 <td class='tdhead' >车数</td><td>{$i.trainNumber}</td>
						 
						 <td class='tdhead' >到站</td><td>{$i.station}</td>
				    </tr>
					<tr>
						 <td class='tdhead' >专用线</td><td>{$i.specialline}</td>
						 <td class='tdhead' >收货人</td><td>{$i.consignee}</td>
						 <td class='tdhead' >备注</td><td colspan= 3>{$i.remarks}</td>
				      </tr>
					<tr>
					     <td colspan= 8><input type="button" onclick="location.href='/HC/HCTableCH/{$i.id}'" value="车号单" />
						      <input type="button" onclick="location.href='/HC/HCTableJL/{$i.id}'" value="计量单" />
						     
					     </td>
				      </tr>

				     
				       </table>
				       </td>
					</tr>
				{/foreach}
				</table>
		  <table class="formView" align="center" width="90%">
			   <tr>
					<td>日期</td>
					<td>{$applyTime}</td>
			   </tr>
			   <tr>
					<td>经办人</td>
					<td>{$applyAnnt}</td>
			   </tr>
			   <tr>
					<td>销售部副经理</td>
					<td>{$salesvicemanager}</td>
			   </tr>
			   <tr>
					<td>销售部经理</td>
					<td>{$salesmanager}</td>
			   </tr>
			   <tr>
					<td>能源公司总经理</td>
					<td>{$energymanager}</td>
			   </tr>
                  </table>
		  <p>
		   <input type="submit" onclick="javascript:history.back(-1);"  value="返回" />
                    </div>