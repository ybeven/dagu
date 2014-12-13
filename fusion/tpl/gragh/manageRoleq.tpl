{acquire action='系统管理' visitor=$curUser}
<div class="tablebox">
   <form action="/system/saveRole" method="post">
			    <table class="formView" align="center">
				    <tr>
					    <td class="tdhead">新角色名</td>
					    <td><input type="text" name="name" /></td>
					    <td><input type="submit" value="添加" /></td>
				    </tr>
			    </table>
   </form>
		    </div>
		    <hr>
		      {/acquire}
    <div class='tablebox'>
    <table class="listView" align="center">
	<thead>
	    <th>角色名</th>
	    {acquire action='系统管理' visitor=$curUser}<th>操作</th>{/acquire}
	</thead>
	{foreach from=$roleArr item=role}
				    <tr>
	    <td>{$role.name}</td>
	    {acquire action='系统管理' visitor=$curUser}
	    <td><input type="button" onclick="location.href='/system/showPrivilege/{$role.id}'" value="授权" />
		  <!--<input type="button" value="更名" onclick="location.href='/system/renameRole/{$role.id}, '{$role.name}'" />-->
		  <input type="button" value="删除" onclick="location.href='/system/removeRole/{$role.id}'" />
	    </td>{/acquire}
	</tr>
	{/foreach}
    </table>
    {compager info=$compager linkPrefix='/system/manageRoleq/'}
    <p><input type="button" onclick="location.href='/start'" value="返回" />
</div>