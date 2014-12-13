<div align=center width="1000px">
			    
			    
			     <table class="formView" align="center" width = "960px">
			          <tr>
			             {if $task.state == "未执行"}
				     <td><font color = "red">任务制定</font></td>
				     {else}
				     <td>任务制定</td>
				     {/if}
				     {if $sharedtruck == 1 }
				     <td><font color = "red">分配门卡</font></td>
				     {else}
				      <td>分配门卡</td>
				     {/if}
				     {if $sharedtruck == 2 }
				     <td><font color = "red">预交费</font></td>
				     {else}
				     <td>预交费</td>
				     {/if}
				     
				     {if ($sharedtruck >= 3) && ($sharedtruck.cardState <= 6)}
				     <td><font color = "red">装油</font></td>
				     {else}
				     <td>装油</td>
				     {/if}
				     
				     {if $task.state == "已完成" && $sharedtruck >= 7}
				     <td><font color = "red">结算完成</font></td>
				     {else}
				     <td>结算完成</td>
				     {/if}
				     
				    
                                
				  </tr>
			       </table>
			       <table  align="center" width = "960px">
			          <tr>
			             <td>车牌号：{$plan.truckNumber}</td>
				     <td>行驶证号：{$plan.drivingNumber}</td>
				     <td>罐号：{if $task.operatorId <> 0}{$task.potNumber}{/if}</td>
                                
				  </tr>
			       </table>
				<table class="formView" align="center"  width = "960px">
				       <tr><td class='tdhead'>提单号</td><td>{$task.planKey}</td>
				           <td class='tdhead'>客户名称</td><td colspan= 5>{$task.customer.name}</td>
				       </tr>
				       <tr><td class='tdhead'>联系人</td><td>{$task.customer.contactPerson}</td>
					   <td class='tdhead'>联系方式</td><td>{$task.customer.contact}</td>
					   <td class='tdhead'>客户类型</td><td>{$task.customer.type}</td>
					   <td class='tdhead'>付款方式</td><td>{$task.payType}</td>
				       </tr>
				       <tr><td class='tdhead'>油品类型</td><td>{$task.oilType.oilType}</td>
				            <td class='tdhead'>油品型号</td><td>{$task.oilModel.oilModel}</td>
				            <td class='tdhead' >单价(元)</td><td>{$task.unitPrice}</td>
				            <td class='tdhead'>净重(吨)</td><td>{$task.planWeight}</td>
				       </tr>
				        <tr>
                                            <td class='tdhead'>计划备注</td><td colspan=3>{$task.planRemarks}</td>
					    <td class='tdhead'>操作员</td><td>{$plan.operator.name}</td>
				            <td class='tdhead' >操作时间</td><td>{$plan.operateTime}</td>
				      </tr>
					<tr>
                                            <td class='tdhead'>分配备注</td><td colspan=3>{if $task.operatorId <> 0}{$task.cardRemarks}{/if}</td>
					    <td class='tdhead'>操作员</td><td>{if $task.operatorId <> 0}{$task.operator.name}{/if}</td>
				            <td class='tdhead' >操作时间</td><td>{if $task.operateTime<> 0}{$task.operateTime}{/if}</td>
				      </tr>
				</table>
			    <table class="formView" align="center"  width = "960px">
			    <tr>
			          <td class="tdhead">皮重(吨)</td><td>{if $task.emptyWeight<> 0}{$task.emptyWeight}{/if}</td>
		                  <td class="tdhead">皮重司磅员</td><td colspan=2>{if $task.emptyStaff<> 0}{$task.emptyStaff}{/if}</td>
                                  <td class="tdhead">过磅时间</td><td colspan=2>{if $task.emptyTime<> 0}{$task.emptyTime}{/if}</td>
		            </tr>
			    <tr>
				  <td class="tdhead">毛重(吨)</td><td>{if $task.finalWeight<> 0}{$task.finalWeight}{/if}</td>
		                  <td class="tdhead">毛重司磅员</td><td colspan=2>{if $task.finalStaff<> 0}{$task.finalStaff}{/if}</td>
                                  <td class="tdhead">过磅时间</td><td colspan=2>{if $task.finalTime<> 0}{$task.finalTime}{/if}</td>
		            </tr>
			     <tr>
		                  <td class="tdhead">磅重(吨)</td><td>{if $weight1 <> 0}{$weight1}{/if}</td>
                                  <td class="tdhead">流量计(吨)</td><td>{if $task.flowWeight <> 0}{$task.flowWeight}{/if}</td>
				  <td class="tdhead">质量差(吨)</td><td>{if $weight1 <> 0}{$weight2}{/if}</td>
				   <td class="tdhead">批控仪(吨)</td><td>{if $task.kgRecord <> 0}{$task.kgRecord}{/if}</td>
			    </tr>
			    <tr>
                                  <td class="tdhead">计算方式</td><td>{$task.calculateMethod}</td>
			          <td class="tdhead">净重(吨)</td><td>{if $task.realWeight<> 0}{$task.realWeight}{/if}</td>
				  <td class="tdhead">金额(元)</td><td>{if $task.money<> 0}{$task.money}{/if}</td>
                                  <td class="tdhead">差额(元)</td><td>{$task.advancePay-$task.money}</td>
		            </tr>
			    <tr>
		                  <td class="tdhead">预交费操作员</td><td>{if $task.advanceOperatorId <> 0}{$task.advanceOperator.name}{/if}</td>
                                  <td class="tdhead">操作时间</td><td>{if $task.advanceTime <> 0}{$task.advanceTime}{/if}</td>
				  <td class="tdhead">结算操作员</td><td>{if $task.finalOperatorId <> 0}{$task.finalOperator.name}{/if}</td>
                                  <td class="tdhead">操作时间</td><td>{if $task.finalOperateTime <> 0}{$task.finalOperateTime}{/if}</td>
			    </tr>
			    
		                  
				</table>
				
					
		 <input type="button" onclick="javascript:history.back(-1);"  value="返回" />
		
                    </div>