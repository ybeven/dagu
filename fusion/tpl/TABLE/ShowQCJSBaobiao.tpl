<div id='detail'>
		    
		    	    订单信息
                    <table class="formView" align="center">
		        <tr>
                            <td class="tdhead">提单号</td><td>{$task.planKey}</td>	
                            <td class="tdhead">客户名称</td><td colspan=3>{$task.customer.name}</td>
                        </tr>
		        <tr>
                            <td class="tdhead">车牌号</td> <td>{$plan.truckNumber}</td>
                            <td class="tdhead">油品</td><td>{$task.oilType.oilType}{$task.oilModel.oilModel}</td>
			    <td class="tdhead">付款方式</td><td>{$task.payType}</td>
		        </tr>
			<tr>
                            <td class="tdhead">单价(元)</td><td>{$task.unitPrice}</td>
                            <td class="tdhead">计划净重(吨)</td><td>{$task.planWeight}</td>
                            <td class="tdhead">计划金额(元)</td><td>{$money}</td>
                        </tr>
			
		        <tr>
		            <td class="tdhead">磅重(吨)</td><td>{$weight1}</td>
                            <td class="tdhead">流量计(吨)</td><td>{$task.flowWeight}</td>
			    <td class="tdhead">质量差(吨)</td><td>{$weight2}</td>
		        </tr>
			<tr>
		            <td class="tdhead">批控仪(吨)</td><td>{$task.kgRecord}</td>
                            <td class="tdhead">计算方式</td><td>{$task.calculateMethod}</td>
			     <td class="tdhead">实际净重(吨)</td><td>{$task.realWeight}</td>
		        </tr>
			<tr>
		            <td class="tdhead">实际金额(元)</td><td>{$task.money}</td>
		            <td class="tdhead">预付金额(元)</td><td>{$task.advancePay}</td>
                            <td class="tdhead">差额(元)：</td><td>{$money}</td>
			</tr>
			<tr>
		            <td class="tdhead">计划备注</td><td colspan= 5>{$task.planRemarks}</td>
                        </tr>
                        <tr>
                            <td class="tdhead">分配备注</td><td colspan= 5>{$task.cardRemarks}</td>
		        </tr>
			<tr>
		            <td class="tdhead">结算备注：</td><td colspan= 5>{$task.moneyRemarks}</td>
		        </tr>
		    </table>
		     
		     <p>
                        操作信息
                        </p>
                    <table class="formView" align="center">
		        <tr>
		            <td class="tdhead">计划制定操作员</td>
                            <td>{$plan.operator.name}</td>
                            <td class="tdhead">制定时间</td>
                            <td>{$plan.operateTime}</td>
		        </tr>
			<tr>
		            <td class="tdhead">分配门卡操作员</td>
                            <td>{$task.operator.name}</td>
                            <td class="tdhead">分配时间</td>
                            <td>{$task.operateTime}</td>
		        </tr>
                        <tr>
		            <td class="tdhead">预交费操作员</td>
                            <td>{$task.advanceOperator.name}</td>
                            <td class="tdhead">预交费时间</td>
                            <td>{$task.advanceTime}</td>
		        </tr>
			<tr>
		            <td class="tdhead">结算操作员</td>
                            <td>{$task.finalOperator.name}</td>
                            <td class="tdhead">结算时间</td>
                            <td>{$task.finalOperateTime}</td>
		        </tr>
		        
			
				
		    </table>
		    <input type="submit" onclick="javascript:history.back(-1);"  value="返回" />
</div>