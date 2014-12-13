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
     <form name="form" method="post">
		  请车单列表		  
		  <table class="listView" align="center" width="90%">
			   <thead>
					<tr>
                        <th class='tdhead'>日期</th>
                        <th class='tdhead'>经办人</th>
                        <th class='tdhead'>结算单位</th>
			<th class='tdhead'>状态</th>
		        <th class='tdhead'>操作</th>
                    </tr>
			   </thead>
			   {foreach from=$mainApplyArray item=i}
               <tr>
					<td>{$i[1]}</td>
					<td>{$i[2]}</td>
					<td>{$i[3]}</td>
					{if $i[4] == 1}
					<td>未执行</td>
					{else}
					<td>正在执行</td>
					{/if}
					<td>
						 <a href="/HC/ListTrainDetailApply/{$i[0]}" />查看详单</a>
						 
					</td>

			   </tr>
			   {foreachelse}
					<tr>
						 <td align="center" colspan="4">没有记录</td>
					</tr>
			   {/foreach}
          </table>
		
	 </form>
</div>
