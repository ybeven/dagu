<div align=center width="1000px">
			    
			    
			     <form name="form" action="/QC/QCShoudongSave/{$task.id}" method="post">
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
				       <tr><td class='tdhead'>油品</td><td>{$task.oilType.oilType}{$task.oilModel.oilModel}</td>
				            
				            <td class='tdhead' >单价(元)</td><td>{$task.unitPrice}</td>
				            <td class='tdhead'>净重(吨)</td><td>{$task.planWeight}</td>
					    <td class="tdhead">预交费(元)</td><td>{$task.advancePay}</td>
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
			          <td class="tdhead">皮重(吨)</td><td><input type="text" name="emptyWeight" value = "{$task.emptyWeight}"/></td>
		                  <td class="tdhead">皮重司磅员</td><td ><input type="text" name="emptyStaff" value = "{$task.emptyStaff}"/></td>
				   <td class="tdhead">称重时间</td><td ><input type="text" name="emptyTime"  value = "{$task.emptyTime}"/></td>
				    <td class="tdhead">流量计(吨)</td><td ><input type="text" name="flowWeight" value = "{$task.flowWeight}"/></td>
                               
                                 
		            </tr>
			    <tr>
			       <td class="tdhead">毛重(吨)</td><td ><input type="text" name="finalWeight" value = "{$task.finalWeight}"/></td>
		                  <td class="tdhead">毛重司磅员</td><td ><input type="text" name="finalStaff" value = "{$task.finalStaff}"/></td>
				  <td class="tdhead">称重时间</td><td ><input type="text" name="finalTime" value = "{$task.finalTime}"/></td>
				  <td class="tdhead">批控仪(吨)</td><td ><input type="text" name="kgRecord" value = "{$task.kgRecord}"/></td>
			     </tr>
			    
			     <tr>
		                  <td class="tdhead">磅重(吨)</td><td >{if $weight1 <> 0}{$weight1}{/if}</td>
                                 
				  <td class="tdhead">质量差(吨)</td><td>{if $weight1 <> 0}{$weight2}{/if}</td>
				   <td class="tdhead">计算方式</td>
				  <td><select  name="calculateMethod">
		           
			   {if $task.calculateMethod =="质量流量计"}
			            <option value="1" >重车-空车</option>
				    <option value="2" selected="selected">质量流量计</option>
				   
			   {else}
			            <option value="1" selected="selected">重车-空车</option>
				    <option value="2" >质量流量计</option>
				    
			   {/if}
						</select></td>
			          <td class="tdhead">净重(吨)</td><td >{if $task.realWeight<> 0}{$task.realWeight}{/if}</td>
				   
			    </tr>
			    <tr>
                                 
				  <td class="tdhead">金额(元)</td><td colspan=3>{if $task.money<> 0}{$task.money}{/if}</td>
                                  <td class="tdhead">差额(元)</td><td colspan=3>{$task.advancePay-$task.money}</td>
		            </tr>
			   
			    
		                  
				</table>
				<p></p>
				<a><font color = "red">注：手动添加任务数据并打印三联单后，若汽车已进门，请到汽车操作站删除该卡数据</font></a>
			        <p></p>
		 <input type="submit"   value="结算" />
			     </form>
			     <p></p>
                     <form name="form" action="/QC/QCShoudongPrint/{$task.id}" method="post">
			     <input type="submit"   value="保存" />
		     </form>
                    </div>