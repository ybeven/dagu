function showtime()
{
var today,hour,second,minute,year,month,date;
today=new Date();
year = today.getFullYear();
month = today.getMonth()+1;
date = today.getDate();
hour = today.getHours();
if (hour < 10)
{
	hour = "0" + hour;
}
minute =today.getMinutes();
if (minute < 10)
{
	minute = "0" + minute;
}
second = today.getSeconds();
if (second < 10)
{
	second = "0" + second;
}
document.getElementById('time').innerHTML = "<div class='time1'>今天是" + year + "年"+ month+ "月" + date +"日" + "</div>" + "<div class='time2'>" + hour + ":" + minute + ":" + second +"</div>"; //显示时间
setTimeout("showtime();", 1000); //设定函数自动执行时间为 1000 ms(1 s)
}