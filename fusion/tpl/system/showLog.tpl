<div class='tablebox'>
  <table class="formView" align="center">
    <tr>
      <td class="tdhead">分类</td>
      <td>
          <select id="logName">
                {foreach from=$logTables item=logTable}
                  <option {if $logTable eq $curLogName}selected="selected"{/if}>{$logTable}</option>
                {/foreach}
          </select>
      </td>
    </tr>
    <tr>
      <td class="tdhead">记录时间</td>
      <td><p>从&nbsp;<input id="fromDate" value="{$fromDate}" type="text" class="datepicker" /></p>
      <p>到&nbsp;<input id="toDate" value="{$toDate}" type="text" class="datepicker" /></p></td>
    </tr>
  </table>
  <p><input type="button" value="显示" onclick="showLog()" /></p>
  <hr>
  <p>查看日志</p>
  <table class="listView" align="center">
    <thead>
      <th>记录时间</th>
      <th>执行动作</th>
    </thead>
    {foreach from=$logArr item=log}
    <tr>
      <td>{$log.time}</td>
      <td>{$log.message}</td>
    </tr>
    {foreachelse}
    <tr>
      <td colspan="2">没有记录</td>
    </tr>
    {/foreach}
  </table>
  {compager info=$compager linkPrefix='/system/showLog/' linkPostfix=$linkPostfix}
</div>