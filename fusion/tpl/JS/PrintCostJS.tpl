
<html>
       <head>
	       <script language=javascript type="text/javascript">
	      {literal}
                     function doPrint() {
                            bdhtml=window.document.body.innerHTML;
                            sprnstr="<!--startprint"+"-->";
                            eprnstr="<!--endprint"+"-->";
                            prnhtml=bdhtml.substr(bdhtml.indexOf(sprnstr)+17);
                            prnhtml=prnhtml.substring(0,prnhtml.indexOf(eprnstr));
                            window.document.body.innerHTML=prnhtml;
                            window.print();
                            }
			    {/literal}
			    
//-->
</script>
       </head>
<body>
       <div class='tablebox'>
	     
		<!--startprint-->
		     <table  align="center"  width="750">
		        <tr>
			     <td align="center" colspan= 2>
                                 <a><font size="5px" >成品油({$task.oilType.oilType}{$task.oilModel.oilModel})结算单</font></a>
			     </td>
			</tr>
			<tr>
			     <td align="left">过磅单位：宁夏灵武宝塔大古储运有限公司</td>
			     <td align="right">票号：{$task.planKey}</td>
			</tr>
	             </table>
			
                        </p>
                        <table  align="center" border=1 width="750" style="border-collapse:collapse">
		        <tr>
		            <td >购货单位：</td>
                            <td colspan= 2>{$task.customer.name}</td>
                            <td >车号</td>
                            <td colspan= 2>{$plan.truckNumber}</td>
		        </tr>
			<tr>
		            <td >毛重(吨)</td>
                            <td >{$task.finalWeight}</td>
			    <td>毛重司磅员</td>
                            <td >{$task.finalStaff}</td>
			    <td >过磅时间</td>
                            <td >{$task.finalTime}</td>
		        </tr>
			<tr>
		            <td >皮重(吨)</td>
                            <td>{$task.emptyWeight}</td>
			    <td >皮重司磅员</td>
                            <td>{$task.emptyStaff}</td>
			    <td >过磅时间</td>
                            <td>{$task.emptyTime}</td>
		        </tr>
			<tr>
		            <td >净重(吨)</td>
                            <td>{$task.realWeight}</td>
			    <td >单价</td>
                            <td>{$task.unitPrice}</td>
			    <td>罐号</td>
                            <td>{$task.potNumber}</td>
		        </tr>
			<tr>
		            <td >金额</td>
                            <td colspan= 3>{$daxie}</td>
                            <td >小写:</td>
                            <td >{$task.money}</td>
		        </tr>
	                <tr>
		            <td >备注</td>
                            <td colspan= 5></td>
                            
		        </tr>
		        </table>
			<p>
			<table  align="center"  width="750">
			<tr>
			    <td>监磅：</td><td>司机：</td><td>结算员：</td>
			</tr>
	             </table>
			
			<div id=shuaxin style="display:none; width:100%; text-align:center; height:50px; padding-top:10px;">
			    <input type=button value=点击返回 onclick="location.href='/JS/LastCostJS'"></div>
			<!--endprint-->
                        <table  align="center"  width="750">
		        <tr>
			     <td align="center">
				    <a href="javascript:;" id="dy" onClick="doPrint();shuaxin.style.display='block';dy.style.display='none';" style="color:#FF0000;" align="center">[打印三联单]</a>

		   	<input type="button" onclick="location.href='/JS/LastCostJS'" value="返回" />
			     </td>
			</tr>
	             </table>
			 	

                    </div>
</body>
</html>