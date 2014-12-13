$(function() {
$( "#tabs" ).tabs();
});

 function isjson(obj){
    var isjson = typeof(obj) == "object" && Object.prototype.toString.call(obj).toLowerCase() == "[object object]" && !obj.length;    
    return isjson;
}
function objectinfo(url)
{
    var bucket = document.getElementById("bucket").value;
    var object = document.getElementById("object").value;
    var version_key = document.getElementById("version_key").value;
    if(bucket==null || bucket == "")
    {
        alert("invalid bucket");
        return 0;
    }
    if(object == null || object == "")
    {
        alert("invalid object");
        return 0;
    }
    var patrn = /^\//;
    if (!patrn.exec(object)) 
    {
        alert("你脑残啊");
        return 0;
    } 
    var data = "bucket="+bucket+"&object="+object+"&version_key="+version_key;
    var patrn_json = /^{/;
    var resp = loadXMLDoc(url,data);
    var info = formatJson(resp);
    document.getElementById('A1').innerHTML=info;
}

function userinfo_uid(url)
{
    var uid = document.getElementById("uid").value;
    if(uid == "")
    {
        alert("你逗我呢?");
        return 0;
    }
    var data = "";
    data = "uid="+uid;
    var resp = loadXMLDoc(url,data);
    var info = formatJson(resp);
    document.getElementById('A1').innerHTML=info;
}

function userinfo_bucket(url)
{
    var bucket = document.getElementById("bucket_user").value;
    if(bucket == "")
    {
        alert("你逗我呢?");
        return 0;
    }
    var data = "";
    data = "bucket="+bucket;
    var resp = loadXMLDoc(url,data);
    var info = formatJson(resp);
    document.getElementById('A1').innerHTML=info;
}

var xmlhttp;
function loadXMLDoc(url,data)
{
        xmlhttp=null;
        if (window.XMLHttpRequest)
          {// code for IE7, Firefox, Opera, etc.
          xmlhttp=new XMLHttpRequest();
          }
        else if (window.ActiveXObject)
          {
          // code for IE6, IE5
          xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
          }
        if(xmlhttp!=null && data != null)
        {
          xmlhttp.open("POST",url,false);
       //   xmlhttp.setRequestHeader("Content-Length",data.lenght);
          xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded;");
          xmlhttp.send(data);
        }
        else if (xmlhttp!=null)
        {
          xmlhttp.open("GET",url,false);
          xmlhttp.send(null);
        }
        else
        {
           alert("Your browser does not support XMLHTTP.");
        }
    return xmlhttp.responseText;
}

function state_Change()
{
if (xmlhttp.readyState==4)
  {// 4 = "loaded"
  if (xmlhttp.status==200)
    {// 200 = "OK"
     document.getElementById('A1').innerHTML=xmlhttp.responseText;
    }
  else
    {
      alert("Problem retrieving XML data:" + xmlhttp.statusText);
    }
  }
}
$(function() {
// run the currently selected effect
    function runEffect() {
        $( "#effect" ).hide();
        // get effect type from
        var selectedEffect = $( "#effectTypes" ).val();
        // most effect types need no options passed by default
        var options = {};
        // some effects have required parameters
        if ( selectedEffect === "scale" ) {
            options = { percent: 100 };
         } else if ( selectedEffect === "size" ) {
            options = { to: { width: 280, height: 185 } };
            }
        // run the effect
        $( "#effect" ).show( "blind", options, 500 );
    };
    //callback function to bring a hidden box back
    function callback() {
        setTimeout(function() {
        $( "#effect:visible" ).removeAttr( "style" ).fadeOut();
        }, 100000 );
    };
    //callback function to bring a hidden box back
    function callback01() {
        setTimeout(function() {
        $( "#effect01:visible" ).removeAttr( "style" ).fadeOut();
        }, 100000 );
    };

    // set effect from select menu value
    $( "#button" ).click(function() {
        runEffect();
        return false;
    });

    $( "#button_bucket" ).click(function() {
        $( "#effect01" ).hide();
        var options = {};
        $( "#effect01" ).show( "blind", options, 500);
        return false;
    });
    
   $( "#button_uid" ).click(function() {
        $( "#effect01" ).hide();
        var options = {};
        $( "#effect01" ).show( "blind", options, 500);
        return false;
    });

   $( "#button" ).click(function() {
        $( "#effect01" ).hide();
        var options = {};
        $( "#effect01" ).show( "blind", options, 500);
        return false;
    });

    $( "#effect01" ).hide();
    $( "#effect" ).hide();
});
    //初始化手风琴
    function initAccordion(){
    $( "#accordion" ).accordion({
        collapsible: true
    });
    }
    
    $(document).ready(function() {
           //手风琴
        initAccordion();
        });

