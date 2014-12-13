function showLog() {
    var logName = document.getElementById('logName').value;
    var fromDate = document.getElementById('fromDate').value;
    var toDate = document.getElementById('toDate').value;
    var uri = "/system/showLog/auto/"+logName+"/"+fromDate;
    if(toDate != '')
      uri += "/"+toDate;
    location.href= uri;
}