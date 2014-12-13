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
			$(red).parent().parent().parent().remove();
		}
			{/literal}
</script>
<form name="form" action="/minedata/SavePreData/{$fileId}" method="post">
	<div id="tabs">
	<ul><li><a href="#tabs-1">基本信息</a></li>
	    <li><a href="#tabs-2">专家信息</a></li>
	    <li><a href="#tabs-3">审核意见</a></li>
	    </ul>
	<div id="tabs-1">
	<table class="formView" align="center" id="basic_info">
		<tr>
			<td name="fileId" style="display:none">{$fileId}</td>
			<td width="20%" class='tdhead'>申报矿山名称</td><td width="30%" colspan=3><textarea cols="60" rows="1"  name="mineName">{$declaredata[1]}</textarea></td>
		</tr>
		<tr>
			<td width="20%" class='tdhead'>所属企业名称</td><td width="30%" colspan=3><textarea cols="60" rows="1"  name="enterpriseName">{$declaredata[2]}</textarea></td>
		</tr>
		<tr>
			<td class='tdhead'>企业性质</td>
			<td>
				<select name="enterpriseproperty">
					<option value="{$declaredata[3]}">{$declaredata[3]}</option>
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
				<td width="20%" class='tdhead'>成立时间</td><td width="30%"><input value="{$declaredata[4]}" width="90%" name="time"></td>
		</tr>
		<tr>
			<td width="20%" class='tdhead'>地理位置</td><td width="30%"><input value="{$declaredata[5]}" width="90%" name="diliweizhi"></td>
			<td width="20%" class='tdhead'>矿区面积</td><td width="30%"><input value="{$declaredata[6]}" width="90%" name="kuangqumianji"></td>
		</tr>
		<tr>
			<td width="20%" class='tdhead'>矿山职工数</td><td width="30%"><input value="{$declaredata[7]}" width="90%" name="zhigongshu"></td>
			<td width="20%" class='tdhead'>采矿许可证有效期限</td><td width="30%"><input value="{$declaredata[8]}" width="90%" name="youxiaoqixian"></td>
		</tr>
		<tr>
			<td width="20%" class='tdhead'>开采矿种</td><td width="30%"><input value="{$declaredata[9]}" width="90%" name="kuangzhong"></td>
			<td width="20%" class='tdhead'>开采方式</td><td width="30%"><input value="{$declaredata[10]}" width="90%" name="fangshi"></td>
		</tr>
		<tr>
			<td width="20%" class='tdhead'>保有资源储量</td><td width="30%"><input value="{$declaredata[11]}" width="90%" name="ziyuanchuliang"></td>
			<td class='tdhead'>开采规模</td>
			<td><input value="{$declaredata[12]}" name="minescale"/></td>
		</tr>
		<tr>                     
			<td class='tdhead'>采选工艺设备</td>
			<td colspan=3><textarea cols="60" rows="3"  name="gongyishebei">{$declaredata[13]}</textarea></td>
		</tr>
		<tr>                     
			<td class='tdhead'>综合利用情况</td>
			<td colspan=3><textarea cols="60" rows="3"  name="zongheliyong">{$declaredata[14]}</textarea></td>
		</tr>
		<tr>                     
			<td class='tdhead'>矿业权有偿处置情况</td>
			<td colspan=3><textarea cols="60" rows="3"  name="youchangchuzhi">{$declaredata[15]}</textarea></td>
		</tr>
		<tr>                     
			<td class='tdhead'>矿山地质环境恢复治理情况</td>
			<td colspan=3><textarea cols="60" rows="3" name="environmentrecovery">{$declaredata[16]}</textarea></td>
		</tr>
		<tr>                     
			<td class='tdhead'>土地复垦情况</td>
			<td colspan=3><textarea cols="60" rows="3" name="landreclamation">{$declaredata[17]}</textarea></td>
		</tr>
		<tr>
			<td class='tdhead'>联系人姓名</td><td><input width="90%" value="{$declaredata[18]}" name="contactmanName"></td>
			<td class='tdhead'>电子邮件</td><td><input width="90%" value="{$declaredata[19]}" name="contactmanEmail"></td>	
		</tr>
		<tr>
			<td class='tdhead'>固定电话</td><td><input width="90%" value="{$declaredata[20]}" name="contactmanLandphone"></td>
			<td class='tdhead'>传真</td><td><input width="90%" value="{$declaredata[21]}" name="contactmanFax"></td>
		</tr>
		<tr>
			<td class='tdhead'>手机</td><td><input width="90%" value="{$declaredata[22]}" name="contactmanCellphone"></td>
			<td class='tdhead'>邮编</td><td><input width="90%" value="{$declaredata[23]}" name="mailcode"></td>
		</tr>
		<tr>                     
			<td class='tdhead'>通讯地址</td>
			<td colspan=3><textarea cols="60" rows="1"  name="address">{$declaredata[24]}</textarea></td>
		</tr>
	</table>
	</div>
	<div id="tabs-2">
	<table width="100%" align="center" id="expert_info">
		<tr>
			<td>
				<table width="100%" class="formView" align="center">
					<tr>
						<td width="50%" colspan=4>
							专家1
						</td>
					</tr>
					<tr>
						<td width="20%" class='tdhead'>姓名</td width="30%"><td><input width="90%" name="expertName[]"></td>
						<td width="20%" class='tdhead'>性别</td>
						<td width="30%">
							<select  name="expertSex[]">
								<option value="0">男</option>
								<option value="1">女</option>
							</select>
						</td>
					</tr>
					<tr>
						<td class='tdhead'>年龄</td><td><input width="90%" name="expertAge[]"></td>
						<td class='tdhead'>单位</td><td><input width="90%" name="expertCompany[]"></td>
					</tr>
					<tr>						
						<td class='tdhead'>职称</td><td><input width="90%" name="expertTitles[]"></td>
						<td class='tdhead'>职务</td><td><input width="90%" name="expertWork[]"></td>
					</tr>
					<tr>
						<td class='tdhead'>专业</td><td><input width="90%" name="expertSubject[]"></td>
						<td class='tdhead'>手机</td><td><input width="90%" name="expertCellphone[]"></td>
					</tr>
					<tr>					
						<td class='tdhead'>固话</td><td><input width="90%" name="expertLandhone[]"></td>
						<td class='tdhead'>邮箱</td><td><input width="90%" name="expertEmail[]"></td>
					</tr>
					<tr>
						<td class='tdhead'>传真</td><td><input width="90%" name="expertFax[]"></td>
						<td class='tdhead'>地址</td><td><input width="90%" name="expertAddress[]"></td>
					</tr>
					<tr>
						<td class='tdhead'>专家意见</td><td colspan=3><textarea cols="60" rows="3" name="mineExpertIdeaContent[]"></textarea></td>
					</tr>
					<tr>
						<td class='tdhead'>时间</td><td><input class="datepicker" width="90%" name="mineExpertIdeaTime[]"></td>
						<td class='tdhead' colspan=2>
							<input type="button" onclick="add();" value="添加专家"/>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	</div>

	<div id="tabs-3">
	<table class="formView" align="center" id="check_info">
		<tr>
			<td class='tdhead'>企业申报类型</td>
			<td width="80%">
				<select onchange="judge(this.options[this.options.selectedIndex].value);"  name="audittype" id="applytype">
					<option value="非中央所属的矿山企业">非中央所属的矿山企业</option>
					<option value="归口中央企业管理的矿山企业">归口中央企业管理的矿山企业</option>
					<option value="行业协会推荐的矿山企业">行业协会推荐的矿山企业</option>	
				</select>
			</td>
		</tr>
		<tr>                     
			<td class='tdhead' id="check1">矿山所在地市（县）级国土资源主管部门审核意见</td>
			<td><textarea cols="60" rows="3" name="auditopinion1"></textarea></td>
		</tr>
		<tr>
			<td class='tdhead'>审核时间</td>
			<td><input class="datepicker" width="90%" name="audittime1"></td>
		</tr>
		<tr>                     
			<td class='tdhead' id="check2">矿山所在省级国土资源主管部门审核意见</td>
			<td><textarea cols="60" rows="3" name="auditopinion2"></textarea></td>
		</tr>
		<tr>
			<td class='tdhead'>审核时间</td>
			<td><input class="datepicker" width="90%" name="audittime2"></td>
		</tr>
		<tr>                     
			<td class='tdhead'>国土资源部审核（备案）意见</td>
			<td><textarea cols="60" rows="3" name="auditopinion3"></textarea></td>
		</tr>
		<tr>
			<td class='tdhead'>审核(备案)时间</td>
			<td><input class="datepicker" width="90%" name="audittime3"></td>
		</tr>
	</table>
	</div>
	</div>
	<input type="submit" value="保存修改" />
	<input type="button" onclick="location.href='/minedata/ListPreData'" value="返回" />
</form>
		   
      
