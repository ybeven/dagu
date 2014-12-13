<script language="javascript" type="text/javascript">
</script>

<div class='tablebox'>
		<div align=center>
			   车牌号：{$plan.truckNumber}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;行驶证号：{$plan.drivingNumber}
			   <p>
			<table class="formView" align="center">
                    <tr>
                        <th>客户名称</th>
                        <th>油品</th>
                        <th>单价(元)</th>
                        <th>净重(吨)</th>
                        <th>罐号</th>
                        <th>卡号</th> 
                    </tr>
		    
                    <tr>
                        <td>{$task.customer.name}</td>
                        <td>{$task.oilType.oilType}{$task.oilModel.oilModel}</td>	      
                        <td>{$task.unitPrice}</td>
                        <td>{$task.planWeight}</td>
			
                        <td>{$task.potNumber}</td>
                        <td>{$task.cardId}</td></tr>
		    <tr>
				<td>任务备注：</td>
				<td colspan= 2>{$task.planRemarks}</td>
				<td>分配备注：</td>
				<td colspan= 2>{$task.cardRemarks}</td>
		    </tr>
		 
		</table>
			
		    <input type="submit" onclick="javascript:history.back(-1);"  value="返回" />
            </div>