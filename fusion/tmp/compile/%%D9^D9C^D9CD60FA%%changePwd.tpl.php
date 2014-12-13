<?php /* Smarty version 2.6.26, created on 2014-05-24 17:04:25
         compiled from system/changePwd.tpl */ ?>
<form action="/system/saveUser" method="post">
<div class='tablebox'>
    <table class="formView" align="center">
        <tr>
            <td class='tdhead'>原密码</td>
            <td><input type="password" name="oldPassword" /></td>
        </tr>
        <tr>
            <td class='tdhead'>新密码</td>
            <td><input type="password" name="password" /></td>
        </tr>
        <tr>
            <td class='tdhead'>密码确认</td>
            <td><input type="password" name="confirm" /></td>
        </tr>
    </table>
</div>
<input type="hidden" name="state" value="changePwd" />
<input type="submit" value="提交" />
<input type="reset" value="重填" />
<input type="button" onclick="location.href='/start'" value="返回" />
</form>