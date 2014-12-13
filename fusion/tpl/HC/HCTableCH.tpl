<div class='tablebox'>
	
     
		  车号单		  
          <table class="formView" align="center" width="90%">
			   <tr>
                        <td>车数</td>
                        <td>{$trainNumber}</td>
                        <td>到站</td>
                        <td>{$station}</td>
                        <td>油品</td>                      
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
					<td>{$train[$i].trainsign}</td>
					<td>{$train[$i].potType}</td>
					<td>{$train[$i].load}</td>
					<td>{$train[$i].planWeight}</td>
					<td>{$train[$i].platform}</td>
					
			   </tr>
			   {/foreach}
          </table>
		  <p>
			  <input type="submit" onclick="javascript:history.back(-1);"  value="返回" />

</div>
