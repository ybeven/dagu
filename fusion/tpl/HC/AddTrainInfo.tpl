<div class='tablebox'>
	 <!--<script>
		  {literal}
			   function getchild()
			   {
		  {/literal}
			   var myArray = new Array({foreach from=$childID item=child name=myarray}
					{if $smarty.foreach.myarray.last}"{$child.id}","{$child.oilModel}","{$child.oilTypeId}"
					{else}"{$child.id}","{$child.oilModel}","{$child.oilTypeId}",{/if}{/foreach});
		  {literal}
			   $("#childID").html(" ");
			   for(var i=0;i<myArray.length;i+=3)
			   {
					if(myArray[i+2]==$("#sortID").val())
					{
						 var stg="<option value='"+myArray[i]+"'>"+myArray[i+1]+"</option>";
						 $("#childID").append(stg);
					}
			   }
			   }
		  {/literal}
	 </script>-->
     <form name="form" action="/HC/SaveTrainInfo/{$detailApplyId}" method="post">
		  车号单		  
          <table class="formView" align="center" width="90%">
			   <tr>
                        <td class='tdhead'>车数</td>
                        <td>{$trainNumber}</td>
                        <td class='tdhead'>到站</td>
                        <td>{$station}</td>
                        <td class='tdhead'>油品</td>                      
                        <td>{$oilModel}{$oilType}</td>
               </tr>
		  </table>
		  <table class="listView" align="center" width="90%">
			   <thead>
					<tr>
                        <th>车号</th>
                        <th>罐型</th>
                        <th>载重</th>
                        <th>预装量</th>
                        <th>站台</th>                      
                        
                    </tr>
			   </thead>
			   {foreach from=$trainNumberArray item=i}
               <tr>
					<td><input type="text" name="trainsign[]" value="{$train[$i].trainsign}" /></td>
					<td><input type="text" name="potType[]"value="{$train[$i].potType}" /></td>
					<td><input type="text" name="load[]" value="{$train[$i].load}" /></td>
					<td><input type="text" name="planWeight[]" value="{$train[$i].planWeight}" /></td>
					<td><input type="text" name="platform[]" value="{$train[$i].platform}" /></td>
					
			   </tr>
			   {/foreach}
          </table>
		  <p>
			   <input type="submit" value="保存" />
			   <input type="button" onclick="location.href='/HC/ListTrainInfo/'" value="返回" />
	 </form>
</div>
