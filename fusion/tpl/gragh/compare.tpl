<form id="picture" method="post" action="compare">
<table class="formView" align="center">
	<tr>
		<td class="thead">矿山名称</td>
		<td><input type="text" name="mineName" value="{$mineName}" /></td>
		<td>
			<label for="province">信息分类</label> 
			<select id="province" name="province">
				<option {$tselected2}>基本信息</option>
				<option {$tselected3}>综合利用</option>
				<option {$tselected4}>节能减排</option>
				<option {$tselected1}>其他指标</option>
				
				
				<!--<option >基本信息</option>
				<option selected>综合利用</option>
				<option >节能减排</option>
				<option >其他指标</option>-->


				
			</select> 
			<label for="index">查询数据</label> 
			<select id="index" name="index">
              {$filter}
			</select>
		</td>
	    <td>&nbsp;&nbsp;<input type="submit" value="查询" /></td>
	</tr>
</table>
</form>

<h3>{$title}</h3>



<form id="picture" method="post" action="region">
<table class="listView" align="center">

 <tr>
 	<td>
 		<img src="{$picture}">
 	</td>       
 </tr>
</table>
</form>


<script type="text/javascript">
{literal}               //province, "change", selected.selectArray, false
DOMhelp = {           //这个函数是做什么用的   window, "load", selected.init, false
	addEvent:function(elem, evType, fn, useCapture){
		if(elem.attachEvent){
			var r = elem.attachEvent("on"+ evType, fn);
			return r;
		}else if(elem.addEventListener){
			elem.addEventListener(evType,fn, useCapture);
			return true;
		}else{
			elem["on"+evType] = fn;	
		}
	}
}
{/literal}
</script>


<script type="text/javascript">  //这里面的js代码是自动执行的
{literal}
selected = {
	arrayHB0 : ["实际生产规模","矿山企业总产值","矿山企业利税","矿山企业利润"],
	arrayHLJ1 : ["矿山选矿回收率","矿山开采回采率"],
	arrayLN2 :["单位工业总产值电耗","单位工业总产值水耗","单位万元工业总产值能耗","矿山选矿废水重复利用率","矿山固体废弃物综合利用率","单位工业总产值SO2排放量"],
	arrayLN3 :["每年组织培训次数","平均每年培训投入经费","科技创新投入占矿山企业总产值比重","绿化覆盖率","土地复垦率","土地复垦每亩经济效益","土地复垦每亩平均投资"],
	init:function(){
		if(!document.getElementById || !document.createTextNode){return;};
		var province = document.getElementById("province");  //取了省份的结果
		if(!province){return;};
		//province_index=3;
		if(province.selectedIndex==0) province_index=0;
		if(province.selectedIndex==1) province_index=1;
		if(province.selectedIndex==2) province_index=2;
		if(province.selectedIndex==3) province_index=3;
		

		province.options[province_index].selected = true;
		DOMhelp.addEvent(province, "change", selected.selectArray, false);  //传递四个参数,干什么用？
	},
	selectArray:function(){  //这里获取了省份，然后selected.changeArra对应的详细
		var province = document.getElementById("province");
		var choice = province.selectedIndex;  
		switch(choice){
			case 0 :selected.changeArray(selected.arrayHB0);
			break;
			case 1: selected.changeArray(selected.arrayHLJ1);
			break;
			case 2 :selected.changeArray(selected.arrayLN2);
			break;
			case 3 :selected.changeArray(selected.arrayLN3);
			break;
		}
	},
	changeArray:function(array){  //应该是输出第二及的值
		var index = document.getElementById("index");  //这里获取指标值  index是查询指标
		var OL = index.options.length;            //目前在页面中的index选项
		var AL = array.length;                    //写在函数里面的index选项
		if(OL > AL){
			for(var i = 0; i < AL; i++){
				index.options[i].text = array[i];
				index.options[i].value = array[i];
			}
			var Length = OL - AL;
			for(var i = 0; i < Length; i++){
				index.options[array.length] = null;
			}
			//var Length = OL - AL;
		}else{
			for(var i =0; i < OL; i++){
				index.options[i].text = array[i];
				index.options[i].value = array[i];
			}
			var Length = AL - OL;
			while(OL < AL){
				var extraOption = new Option(array[OL], array[OL],0, 0);
				index.options[OL] = extraOption;
				OL++;
			}
		}
		index.options[0].selected = true;   //每次选择第二个filter的默认第三额filter
	}
}
DOMhelp.addEvent(window, "load", selected.init, false); //为什么又要调用这个函数呢,这个函数是现在第三个filter用的。
{/literal}
</script>