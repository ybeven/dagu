<p>为角色"{$role.name}"授权</p>
<div class='tablebox'>
  <form action="/system/savePrivilege" method="post">
    <table class="formView" align="center">
        <tr>
            <td class="tdhead">权限名称</th>
                                            <td>操作</th>
        </tr>
        {section name=curAction loop=$actionArray}
    <tr>
      <td class="tdhead">{$actionArray[curAction]}</td>
      <td class="radio"> {jqueryui_radios name="approval[`$smarty.section.curAction.index`]" options=$approvals checked=$actionAcl[curAction]} </td>
     
    </tr>
    {sectionelse} 
    <tr>
      <td colspan="2" class="tdhead">尚未添加权限</td>
    </tr>
    {/section}
    </table>
     <input type="hidden" id="roleId" name="roleId" value={$role.id} />
    <input type="submit" value="保存修改" />
    <input type="button" onclick="location.href='/system/manageRoleq'" value="返回" />
  </form>
</div>