<script src="/js/gansu.js" type="text/javascript" charset="utf-8"></script>

<script language="javascript" type="text/javascript">
	{literal}
		function judge(applytype)
		{
			if(applytype=="非中央所属的矿山企业")
			{
				var checktype1="<td class='tdhead' id='check1'>矿山所在地市（县）级国土资源主管部门审核意见</td>";
				var checktype2="<td class='tdhead' id='check2'>矿山所在地省级国土资源主管部门审核意见</td>";
			}
			if(applytype=="归口中央企业管理的矿山企业")
			{
				var checktype1="<td class='tdhead' id='check1'>矿山所在地省级国土资源主管部门审核意见</td>";
				var checktype2="<td class='tdhead' id='check2'>归口中央企业的审核意见</td>";
			}
			if(applytype=="行业协会推荐的矿山企业")
			{
				var checktype1="<td class='tdhead' id='check1'>矿山所在地省级国土资源主管部门审核意见</td>";
				var checktype2="<td class='tdhead' id='check2'>行业协会的审核意见</td>";
			}
			$("#check1").replaceWith(checktype1);
			$("#check2").replaceWith(checktype2);
		}
		var mark = 1;
		function add()
		{
			mark=mark+1; 	                
			var str="<tr><td><table width='100%' class='formView' align='center'><tr><td width='50%' colspan=4>专家"+mark+"</td></tr>"
				+"<tr><td width='20%' class='tdhead'>姓名</td width='30%'><td><input width='90%' name='expertName[]'></td>"
				+"<td width='20%' class='tdhead'>性别</td><td width='30%'><select name='expertSex[]'><option value='1'>男</option><option value='2'>女</option></select></td></tr>"
				+"<tr><td class='tdhead'>年龄</td><td><input width='90%' name='expertAge[]'></td>"
				+"<td class='tdhead'>单位</td><td><input width='90%' name='expertCompany[]'></td></tr>"
				+"<tr><td class='tdhead'>职称</td><td><input width='90%' name='expertTitles[]'></td>"
				+"<td class='tdhead'>职务</td><td><input width='90%' name='expertWork[]'></td></tr>"
				+"<tr><td class='tdhead'>专业</td><td><input width='90%' name='expertSubject[]'></td>"
				+"<td class='tdhead'>手机</td><td><input width='90%' name='expertCellphone[]'></td></tr>"
				+"<tr><td class='tdhead'>固话</td><td><input width='90%' name='expertLandhone[]'></td>"
				+"<td class='tdhead'>邮箱</td><td><input width='90%' name='customer[]'></td></tr>"
				+"<tr><td class='tdhead'>传真</td><td><input width='90%' name='expertFax[]'></td>"
				+"<td class='tdhead'>地址</td><td><input width='90%' name='expertAddress[]'></td></tr>"
				+"<tr><td class='tdhead'>专家意见</td><td colspan=3><textarea cols='60' rows='3' name='mineExpertIdeaContent[]'></textarea></td></tr>"
				+"<tr><td class='tdhead'>时间</td><td><input class='datepicker' width='90%' name='mineExpertIdeaTime[]'></td>"
				+"<td class='tdhead' colspan=2><input type='button' onclick='add();' value='添加专家'/><input type='button' onclick='remove(this);' value='删除该专家'/></td></tr></table></td></tr>";			      
			$("#expert_info").append(str);
		}
		function remove(red)
		{
			$(red).parent().parent().parent().parent().remove();
		}
			{/literal}
</script>
<form name="form" action="/predata/UploadeExcelData" method="post" enctype="multipart/form-data">
	<input type="hidden" name="leadExcel" value="true">
	<table align = "center" >
		<tr>
			<td><input type="button" value="附件管理" onclick="window.location.href='/predata/AddFile/{$mineid}'"/></td>
		</tr>
		<!--
		<tr>
			<td><input type="button" onclick="hideandshow1();" value="基本信息"/></td>
			<td><input type="button" onclick="hideandshow2();" value="专家信息"/></td>
			<td><input type="button" onclick="hideandshow3();" value="审核意见"/></td>
		</tr>
		-->
	</table>
</form>
<form name="form" action="/predata/UpdatePreData/{$mineid}" method="post">
	<div id="tabs">
	<ul><li><a href="#tabs-1">基本信息</a></li>
	    <li><a href="#tabs-2">专家信息</a></li>
	    <li><a href="#tabs-3">审核意见</a></li>
	    </ul>
	<div id="tabs-1">
	<table class="formView" align="center" id="basic_info">
		<tr>
			<td width="20%" class='tdhead'>申报矿山名称</td><td width="30%" colspan=3><textarea cols="60" rows="1"  name="mineName">{$mArray[0]->mineName}</textarea></td>
		</tr>
		<tr>
			<td width="20%" class='tdhead'>所属企业名称</td>
			<td width="30%">
				<input cols="60" rows="1"  name="enterpriseName" value="{$mArray[0]->enterpriseName}">
			</td>
			<td width="20%" class='tdhead'>开采方式</td>
			<td colspan=3>
				<input cols="60" rows="3" width="90%" name="fangshi" value="{$mArray[0]->fangshi}">
			</td>
		</tr>
		<tr>
			<td class='tdhead'>企业性质</td>
			<td>
				<select name="enterpriseproperty">
					<option value="{$mArray[0]->enterpriseproperty}">{$mArray[0]->enterpriseproperty}</option>
					<option value="国有企业">国有企业</option>
					<option value="集体企业">集体企业</option>
					<option value="联营企业">联营企业</option>
					<option value="股份合作制企业">股份合作制企业</option>
					<option value="个体户">个体户</option>
					<option value="私营企业">私营企业</option>
					<option value="合伙企业">合伙企业</option>
					<option value="有限责任公司">有限责任公司</option>
					<option value="股份有限公司">股份有限公司</option>
				</select>
			</td>
			<td width="20%" class='tdhead'>成立时间</td>
			<td width="30%"><input value="{$mArray[0]->time}" width="90%" name="time"></td>
		</tr>

		<tr>
			<td class="tdhead">市级行政区划</td>
			<td>
				<select name="shijiquhua" id="shi">
					<option value="兰州市">兰州市</option>
					<option value="嘉峪关市">嘉峪关市</option>
					<option value="金昌市">金昌市</option>
					<option value="白银市">白银市</option>
					<option value="天水市">天水市</option>
					<option value="武威市">武威市</option>
					<option value="张掖市">张掖市</option>
					<option value="平凉市">平凉市</option>
					<option value="酒泉市">酒泉市</option>
					<option value="庆阳市">庆阳市</option>
					<option value="定西市">定西市</option>
					<option value="陇南市">陇南市</option>
					<option value="临夏回族自治州">临夏回族自治州</option>
					<option value="甘南藏族自治州">甘南藏族自治州</option>
				</select>
			</td>
			<td class="tdhead">县级行政区划</td>
			<td>
				<select name="xianjiquhua" id="xian">
					<option value="城关区">城关区</option>
					<option value="七里河区">七里河区</option>
					<option value="西固区">西固区</option>
					<option value="安宁区">安宁区</option>
					<option value="红古区">红古区</option>
					<option value="永登县">永登县</option>
					<option value="皋兰县">皋兰县</option>
					<option value="榆中县">榆中县</option>
				</select>
			</td>
		</tr>
        {literal}
        <script src="/js/gansu.js" type="text/javascript" charset="utf-8"></script>

        <script type="text/javascript">
                $('#shi').val("{/literal}{$mArray[0]->shijiquhua}{literal}");
                changexz();
                $('#xian').val("{/literal}{$mArray[0]->xianjiquhua}{literal}");
                </script>
                {/literal}
		<tr>
			<td width="20%" class='tdhead'>乡镇行政区划</td><td width="30%"><input value="{$mArray[0]->diliweizhi}" width="90%" name="diliweizhi"></td>
			<td width="20%" class='tdhead'>矿区面积</td><td width="30%"><input value="{$mArray[0]->kuangqumianji}" width="90%" name="kuangqumianji"></td>
		</tr>
		<tr>
			<td width="20%" class='tdhead'>矿山职工数</td><td width="30%"><input value="{$mArray[0]->zhigongshu}" width="90%" name="zhigongshu"></td>
			<td width="20%" class='tdhead'>采矿许可证有效期限</td><td width="30%"><input value="{$mArray[0]->youxiaoqixian}" width="90%" name="youxiaoqixian"></td>
		</tr>
		<!-- 改动 -->
		<tr>
			<td width="20%" class='tdhead'>矿种类别</td><td width="30%"><input value="{$mArray[0]->orenametype}" width="90%" name="orenametype"></td>
			<td width="20%" class='tdhead'>开采矿种</td><td width="30%"><input value="{$mArray[0]->orename}" width="90%" name="orename"></td>
		</tr>
		
		<tr>
			<td width="20%" class='tdhead'>保有资源储量</td><td width="30%"><input value="{$mArray[0]->ziyuanchuliang}" width="90%" name="ziyuanchuliang"></td>
			<td class='tdhead'>开采规模</td>
			<td><input value="{$mArray[0]->minescale}" name="minescale"/></td>
		</tr>
		<!-- 改动 -->
		<!-- <tr> -->
			
		<!-- </tr> -->
		<tr>                     
			<td class='tdhead'>采选工艺设备</td>
			<td colspan=3><textarea cols="60" rows="3"  name="gongyishebei">{$mArray[0]->gongyishebei}</textarea></td>
		</tr>
		<tr>                     
			<td class='tdhead'>综合利用情况</td>
			<td colspan=3><textarea cols="60" rows="3"  name="zongheliyong">{$mArray[0]->zongheliyong}</textarea></td>
		</tr>
		<tr>                     
			<td class='tdhead'>矿业权有偿处置情况</td>
			<td colspan=3><textarea cols="60" rows="3"  name="youchangchuzhi">{$mArray[0]->youchangchuzhi}</textarea></td>
		</tr>
		<tr>                     
			<td class='tdhead'>矿山地质环境恢复治理情况</td>
			<td colspan=3><textarea cols="60" rows="3" name="environmentrecovery">{$mArray[0]->environmentrecovery}</textarea></td>
		</tr>
		<tr>                     
			<td class='tdhead'>土地复垦情况</td>
			<td colspan=3><textarea cols="60" rows="3" name="landreclamation">{$mArray[0]->landreclamation}</textarea></td>
		</tr>
		<tr>
			<td class='tdhead'>联系人姓名</td><td><input width="90%" value="{$cArray[0]->contactmanName}" name="contactmanName"></td>
			<td class='tdhead'>电子邮件</td><td><input width="90%" value="{$cArray[0]->contactmanEmail}" name="contactmanEmail"></td>	
		</tr>
		<tr>
			<td class='tdhead'>固定电话</td><td><input width="90%" value="{$cArray[0]->contactmanLandphone}" name="contactmanLandphone"></td>
			<td class='tdhead'>传真</td><td><input width="90%" value="{$cArray[0]->contactmanFax}" name="contactmanFax"></td>
		</tr>
		<tr>
			<td class='tdhead'>手机</td><td><input width="90%" value="{$cArray[0]->contactmanCellphone}" name="contactmanCellphone"></td>
			<td class='tdhead'>邮编</td><td><input width="90%" value="{$mArray[0]->mailcode}" name="mailcode"></td>
		</tr>
		<tr>                     
			<td class='tdhead'>通讯地址</td>
			<td colspan=3><textarea cols="60" rows="1"  name="address">{$mArray[0]->address}</textarea></td>
		</tr>
	</table>
	</div>
	<div id="tabs-2">
	<table width="100%" align="center" id="expert_info">
		{foreach from=$EArray item=e}
		<tr>
			<td>
				<table width="100%" class="formView" align="center">
					<tr>
						<td width="50%" colspan=4>
							专家
						</td>
					</tr>
					<tr>
						<td width="20%" class='tdhead'>姓名</td width="30%"><td><input width="90%" value="{$e[0]}" name="expertName[]"></td>
						<td width="20%" class='tdhead'>性别</td>
						<td width="30%">
							<select name="expertSex[]">
								<option value="{$e[1]}">{$e[1]}</option>
								<option value="0">男</option>
								<option value="1">女</option>
							</select>
						</td>
					</tr>
					<tr>
						<td class='tdhead'>年龄</td><td><input width="90%" value="{$e[2]}" name="expertAge[]"></td>
						<td class='tdhead'>单位</td><td><input width="90%" value="{$e[3]}" name="expertCompany[]"></td>
					</tr>
					<tr>						
						<td class='tdhead'>职称</td><td><input width="90%" value="{$e[4]}" name="expertTitles[]"></td>
						<td class='tdhead'>职务</td><td><input width="90%" value="{$e[5]}" name="expertWork[]"></td>
					</tr>
					<tr>
						<td class='tdhead'>专业</td><td><input width="90%" value="{$e[6]}" name="expertSubject[]"></td>
						<td class='tdhead'>手机</td><td><input width="90%" value="{$e[7]}" name="expertCellphone[]"></td>
					</tr>
					<tr>					
						<td class='tdhead'>固话</td><td><input width="90%" value="{$e[8]}" name="expertLandhone[]"></td>
						<td class='tdhead'>邮箱</td><td><input width="90%" value="{$e[9]}" name="expertEmail[]"></td>
					</tr>
					<tr>
						<td class='tdhead'>传真</td><td><input width="90%" value="{$e[10]}" name="expertFax[]"></td>
						<td class='tdhead'>地址</td><td><input width="90%" value="{$e[11]}" name="expertAddress[]"></td>
					</tr>
					<tr>
						<td class='tdhead'>专家意见</td><td colspan=3><textarea cols="60" rows="3" name="mineExpertIdeaContent[]">{$e[12]}</textarea></td>
					</tr>
					<tr>
						<td class='tdhead'>时间</td><td><input class="datepicker" width="90%" value="{$e[13]}" name="mineExpertIdeaTime[]"></td>
						<td class='tdhead' colspan=2>
							<input type="button" onclick="add();" value="添加专家"/>
							<input type="button" onclick="remove();" value="删除专家"/>
						</td>
					</tr>
				</table>
			</td>
		</tr>
		{/foreach}
	</table>
	</div>

	<div id="tabs-3">

	<table class="formView" align="center" id="check_info">
		<tr>
			<td class='tdhead'>企业申报类型</td>
			<td width="80%" colspan=2 >
				<select onchange="judge(this.options[this.options.selectedIndex].value);" name="audittype" id="applytype">
					<option value="{$mArray[0]->audittype}">{$mArray[0]->audittype}</option>
					<option value="非中央所属的矿山企业">非中央所属的矿山企业</option>
					<option value="归口中央企业管理的矿山企业">归口中央企业管理的矿山企业</option>
					<option value="行业协会推荐的矿山企业">行业协会推荐的矿山企业</option>	
				</select>
			</td>
		</tr>

		<tr>                     
			<td class='tdhead'>国土资源部审核（备案）意见</td>
			<td><textarea cols="10" rows="3" name="yijian1">{$mArray[0]->audittypeMX1}</textarea></td>
			{foreach from=$MArray item=data}{if $data[2]=="10" }
			<td><img src="http://localhost/uploadDir/{$data[1]}/{$data[0]}" width="80%" style="height:60px;width:80px"></td>
			{/if}{/foreach}
		</tr>
		<tr>
			<td class='tdhead'>审核(备案)时间</td>
			<td colspan=2><input class="datepicker" width="90%" value="{$mArray[0]->audittime3}" name="audittime3"></td>
		</tr>
		
		<tr>                     
			<td class='tdhead' id="check1">矿山所在地市（县）级国土资源主管部门审核意见</td>
			<td><textarea cols="60" rows="3" name="yijian2">{$mArray[0]->audittypeMX2}</textarea></td>
			{foreach from=$MArray item=data}{if $data[2]=="8" }
			<td><img src="http://localhost/uploadDir/{$data[1]}/{$data[0]}" width="80%" style="height:60px;width:80px"></td>
			{/if}{/foreach}
		</tr>
		<tr>
			<td class='tdhead'>审核时间</td>
			<td colspan=2><input class="datepicker" width="90%" value="{$mArray[0]->audittime1}" name="audittime1"></td>
		</tr>
		<tr>                     
			<td class='tdhead' id="check2">矿山所在省级国土资源主管部门审核意见</td>
			<td><textarea cols="60" rows="3" name="yijian3">{$mArray[0]->audittypeMX3}</textarea></td>
			{foreach from=$MArray item=data}{if $data[2]=="9" }
			<td><img src="http://localhost/uploadDir/{$data[1]}/{$data[0]}" width="80%" style="height:60px;width:80px"></td>
			{/if}{/foreach}
		</tr>
		<tr>
			<td class='tdhead'>审核时间</td>
			<td colspan=2><input class="datepicker" width="90%" value="{$mArray[0]->audittime2}" name="audittime2"></td>
		</tr>
		
	</table>
	</div>
	</div>
	{if $QuanXian !=1}
	<input type="submit" value="保存修改" />{/if}
	<input type="button" onclick="window.location='/predata/ListPreData'" value="返回" />

</form>

<script type="text/javascript">
	judge("{$mArray[0]->audittype}");
</script>

      
