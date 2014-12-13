
<div id='detail'>
		    <form name="form" action="/measure/saveValue" method="post">
		    <table class="formView" align="center">
			<tr>
                            <td class="tdhead">阈值：</td>
                            <td><input type="text" name="measure" value = "{$measure.difference}" /></td>	
                        </tr>
		    </table>
		    <p>
                    <input type="submit" value="修改阈值" />
		    <input type="button" onclick="location.href='/start'" value="返回" />
		    <p>
		    </form>
                </div>