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
                location.href="/JS/LastReadCardJS/"+document.getElementById("num").value;
		{literal}
	}
{/literal}
</script>
		    <script language="javascript" type="text/javascript">
		    
		    {literal}
		    function moneychange(red) {
					var value = red.value;
					if(value== "1")
					{
					
							    {/literal}
					    document.getElementById("weight").value="{$weight1}";
					    document.getElementById("money").value="{$money1}";
					    document.getElementById("defmoney").value="{$defmoney1}";
					     {literal}
					}
					else if(value== "2")
					{
					
							    {/literal}
					    document.getElementById("weight").value="{$shared.flowWeight}";
					    document.getElementById("money").value="{$money2}";
					     document.getElementById("defmoney").value="{$defmoney2}";
					     {literal}
					}
					
		    }	
		    {/literal}
		    </script>
		    <p>
		    <input type="button" onclick="getcard()" value="刷卡" />
		    卡号:<input name = "num"type="text" id="num" value="{$cardId}"  readonly = true style="background-color:transparent;"/>
		    <p>
		    
		    <form name="form" action="/JS/SaveLastCostJS/{$task.id}" method="post">
					{$notice}
					<p>
					    订单信息
                    <table class="formView" align="center" width="850px">
		        <tr>
                            <td class="tdhead">提单号</td>
                            <td>{$task.planKey}</td>	
                            <td class="tdhead">客户名称</td>
                            <td colspan=3>{$task.customer.name}</td>
                        </tr>
		        <tr>
                            <td class="tdhead">车牌号</td>
                            <td>{$plan.truckNumber}</td>
                            <td class="tdhead">油品</td>
                            <td>{$task.oilType.oilType}{$task.oilModel.oilModel}</td>
			    <td class="tdhead">付款方式</td>
                            <td>{$task.payType}</td>
		        </tr>
			<tr>
                            <td class="tdhead">单价(元)</td>
                            <td>{$task.unitPrice}</td>
                            <td class="tdhead">计划净重(吨)</td>
                            <td>{$task.planWeight}</td>
                            <td class="tdhead">计划金额(元)</td>
                            <td>{$money}</td>
                        </tr>
			
		        <tr>
		            <td class="tdhead">磅重(吨)</td>
                            <td>{$weight1}</td>
                            <td class="tdhead">流量计(吨)</td>
                            <td>{$shared.flowWeight}</td>
			    <td class="tdhead">质量差(吨)</td>
			    {if $weight2 <= $sign.difference}
                            <td>{$weight2}</td>
			    {else}
			    <td><font color="#FF0000">{$weight2}</font></td>
			    {/if}
		        </tr>
			<tr>
		            <td class="tdhead">批控仪(吨)</td>
                            <td>{$shared.kgRecord}</td>
                            <td class="tdhead">计算方式</td>
                            <td>{$calculate}</td>
			     <td class="tdhead">实际净重(吨)</td>
                            <td>{$weight1}</td>
		        </tr>
		           
                           
			<tr>
		            <td class="tdhead">实际金额(元)</td>
                            <td>{$money1}</td>
		    
		            <td class="tdhead">预付金额(元)</td>
                            <td>{$task.advancePay}</td>
                            <td class="tdhead">差额(元)</td>
                            <td>{$defmoney1}</td>
			</tr>
			<tr>
		            <td class="tdhead">结算备注</td>
                            <td colspan= 5><textarea cols="50" rows="1"  name="remarks" >{$task.moneyRemarks}</textarea>
		            </td>
		        </tr>
		    </table>
		    <p>
		       <input type="submit" value="下一步" />
		       <p>此单打印后不可做任何修改                        
		    </form>
		     <p>
                    
                    
                    <p>            
		                           
		     
</div>