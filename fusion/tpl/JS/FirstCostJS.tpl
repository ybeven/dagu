<div id='detail'>
<OBJECT 
	id="card" 
	classid="CLSID:1C532A0A-7611-420C-A7BE-D53C793D7628" 
	codebase="/RF-35LT.cab#version=1.0.0.0">
</OBJECT>
<script language="javascript" type="text/javascript">
{literal}
	function getcard()
	{
		var carddemo = document.getElementById("card");
		var aaa = carddemo.getCardNum();
		document.getElementById("num").value=aaa;
		{/literal}
                location.href="/JS/FirstReadCardJS/"+document.getElementById("num").value;
		{literal}
	}
{/literal}
</script>
		    <p>
		    <input type="button" onclick="getcard()" value="刷卡" />
		    卡号:<input name = "num"type="text" id="num" value="{$cardId}"  readonly = true style="background-color:transparent;" />
		    
		    <p>
		       {$notice}
		    <p>
		    <form name="form" action="/JS/SaveFirstCostJS/{$task.id}" method="post">
		    <table class="formView" align="center">
		        <tr>
					<td class="tdhead">提单号：</td>
                            <td>{$task.planKey}</td>
                            <td class="tdhead">客户名称：</td>
                            <td colspan=3>{$task.customer.name}</td>
			</tr>
			<tr>	
			    <td class="tdhead">车牌号：</td>
                            <td>{$plan.truckNumber}</td>
			    <td class="tdhead">油品：</td>
                            <td>{$task.oilType.oilType}{$task.oilModel.oilModel}</td>
			    <td class="tdhead">单价（元）：</td>
                            <td>{$task.unitPrice}</td>
                            
                        </tr>
			<tr>
                            <td class="tdhead">计划净重（吨）：</td>
                            <td>{$task.planWeight}</td>
			    <td class="tdhead">计划金额（元）：</td>
                            <td>{$money}</td>
                            <td class="tdhead">付款方式：</td>
                            <td>{$task.payType}</td>
                        </tr>
			 <tr>
			    <td class="tdhead">预付金额(元)：</td>
                            <td><textarea cols="50" rows="1"  name="firstpay" >{$task.advancePay}</textarea></td>
                            <td class="tdhead">备注：</td>
                            <td colspan=3>{$task.planRemarks}{$task.cardRemarks}</td>
                        </tr>
			
		    </table>
		    <p>
                    <input type="submit" value="缴预付款" />
		    <p>
		    </form>
		    
                </div>