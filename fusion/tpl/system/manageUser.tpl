
<div class="tablebox">
	 <form id="saveUser" method="post" action="/system/saveUser">
			<table class="formView" align="center">
				<tr>
					<td class='tdhead'>用户名</td>
					<td><input type="text" name="name" /></td>
					<td class='tdhead'>角色</td>
					<td><select name="roleId">
			{foreach from=$roleArray item=role}
			  <option value="{$role.id}">{$role.name}</option>
			{/foreach}
		  </select>
					</td>
					<td>&nbsp;&nbsp;<input type="submit" value="添加" /></td>
				</tr>
				
			</table>
			 <input type="hidden" name="state" value="addUser" />
			
	 </form>
		</div>
		<hr>

<div class='tablebox'>
<table class="listView" align="center">
    <thead>
	<th>用户名</th>
	<th>角色</th>
	<th>变更</th>
	<th>删除</th>
					
    </thead>
    {foreach from=$userArr item=user}
				<tr>
	 <form action="/system/saveUser" method="post">
	<td><input type="text" name="name" value="{$user.name}" />
	<input type="hidden" name="id" value="{$user.id}" />
	<input type="hidden" name="state" value="updateUser" /></td>
					<td>
					     <select name="roleId">
						      {html_options options=$roleSelect selected=$user.role.id}</select></td>
					
					
	<td><input type="submit" value="保存修改" /></td>
	 </form>
	 <form action="/system/deleteUser/{$user.id}" method="post">
	<td><input type="submit" value="删除" /></td>
	
	</form>
				</tr>
				{/foreach}
</table>
{compager info=$compager linkPrefix='/system/manageUser/'}
<p><input type="button" onclick="location.href='/start'" value="返回" />
</div>