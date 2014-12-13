<div id="l-map" style="height:100%;width:78%;float:left;border-right:2px solid #bcbcbc;"></div>
<div id="r-result" style="height:100%;width:20%;float:right;">
    <input id="type1" type="radio" name="type" value="single" /><label for="type1">精准查找</label>
    <input id="type2" type="radio" name="type" value="more" checked="checked" /><label for="type2">模糊查找</label><br />
    <input id="show1" type="radio" name="show" value="" checked="checked" /><label for="show1">仅查找到的内容</label>
    <input id="show2" type="radio" name="show" value="all"/><label for="show2">显示所有内容</label><br />
    <input id="keyword" type="text" style="width:150px;" value="矿山"/> 
    <input type="button" value="搜索" onclick="search('type','show','keyword')"/>
</div>
