<div class='tablebox'>
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
	}
{/literal}
</script>
<form name="form" action="/HC/SaveCardInfo/{$detailapply.id}" method="post">
<table class="formView" align="center" width="90%">
			   <tr>
                        <td class='tdhead'>卡号</td>
                        <td> 
		    <input name = "num" type="text" id="num" value="{$card[0].cardId}"  readonly = true style="background-color:transparent;"/>
			<input type="button" onclick="getcard()" value="刷卡" /></td>
                        <td class='tdhead'>油品</td>
                        <td>{$detailapply.oilModel.oilType}{$detailapply.oilModel.oilModel}</td>
                        
               </tr>
		  </table>
	
     
		  	  
          
		  <table class="listView" align="center" width="90%">
			   <thead>
		  <tr>
                        <th>车号</th>
                        <th>站号</th>                    
                        <th>鹤位号</th>
                        <th>预装量</th>  
                    </tr>
		  </thead>
			   {foreach from=$train item=i}
               <tr>
					<td>{$i.trainsign}</td>
					<td>{$i.platform}</td>
					<td>{$i.position}</td>
					<td>{$i.planWeight}</td>
			   </tr>
			   {/foreach}
          </table>
		  <p>
			   <input type="submit" value="分配" />
			   <input type="button" onclick="location.href='/HC/ListTrainCardInfo'" value="返回" />
	 </form>
</div>
