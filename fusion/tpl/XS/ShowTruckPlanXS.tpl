<OBJECT 
	id="card" 
	classid="CLSID:1C532A0A-7611-420C-A7BE-D53C793D7628" 
	codebase="/RF-35LT.cab#version=1.0.0.0">
</OBJECT>
<script language="javascript" type="text/javascript">
{literal}
	function getcard(id)
	{
		var carddemo = document.getElementById("card");
		var aaa = carddemo.getCardNum();
		document.getElementById(id).value=aaa;
	}
{/literal}
{literal}
$(document).ready(function(){
  
  $('#superTable').toSuperTable({
	width: "950px",
	height:"300px",
	//fixedCols: 1,
	headerRows: 1
  });

});
{/literal}
</script>


		
		 <form name="form" action="/XS/SaveDriveNumberXS/{$plan.id}" method="post">
			   <table class="formView" align="center">
			    
                            <tr>
                                <td class='tdhead'>车牌号</td>
                                <td>{$plan.truckNumber}</td>
				<!--
				<td class='tdhead'>行驶证号</td>
                                <td><input type="text" name="drivenumber" value = "{$plan.drivingNumber}"/></td>
				<td><input type="submit" value="保存行驶证号" /></td>
				-->
                            </tr>			
				</table>
			
			   </form>
		    	   
                <table class="listView" width="95%">
               
		 
			{foreach from=$task item=i}
			<tr><td>
			<p>
			<table class="formView" align="center"  width="100%">
                    <tr>
                        <td class='tdhead'>客户名称</td>
						<td>{$i.customer.name}</td>
                        <td class='tdhead'>油品</td>
						<td>{$i.oilType.oilType}{$i.oilModel.oilModel}</td>
					</tr>
					<tr>
                        <td class='tdhead'>单价(元)</td>
						<td>{$i.unitPrice}</td>
                        <td class='tdhead'>净重(吨)</td>
						<td>{$i.planWeight}</td>
					</tr>                   
			<form name="form" action="/XS/AddCardXS/{$i.id}" method="post">
					<tr>
                        <td class='tdhead'>罐号</td>
						<td><input type="text" name="potnumber" value="{$i.potNumber}" />请填写数字</td>
                        <td class='tdhead'>卡号</td>
						<td><input name = "num2"type="text" id="{$i.id}" value="{$i.cardId}"  readonly = true style="background-color:transparent;"/><input type="button" value="刷卡" onclick="getcard({$i.id})"/></td>  
                    </tr>

		    <tr>
				<td class='tdhead'>任务备注</td>
				<td >{$i.planRemarks}</td>
				<td class='tdhead'>分配备注</td>
				<td ><textarea cols="30" rows="1"  name="remarks">{$i.cardRemarks}</textarea></td>
		    </tr>
			<tr>
						<td class='tdhead'>操作</td>
                        <td colspan="3" align="center"><input type="submit" value="分配"/></td>
            </tr>
		    </form>
			</table>
			</td>
			</tr>
			{/foreach}
			
                   
                 </table>
         

