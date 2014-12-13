/***************************************************************************
  Copyright (c)2013 Baidu.com, Inc. All Rights Reserved
  author zhangwei18@baidu.com
  change by chenjin add url 
 **************************************************************************/
function Query(parameters,url)
{
    if(typeof(url) == 'undefined')
    {
        url='/query';
    }

	var parameter='{';
	for(var key in parameters){
	    parameter += '"'+key+'":"'+parameters[key]+'",';
	}
	parameter=parameter.substr(0,parameter.length-1);
	parameter += '}';
	var parameter_json=eval('('+parameter+')'); 
	/*发起异步请求，成功后调用callback	*/
	this.getdata=function(callback){
		jQuery.post(url, parameter_json, function(data, textStatus, xhr) {
		  //optional stuff to do after success
		 callback(data);
		});
	}

	this.set_case_name=function(item){
		parameter_json.case_name = item;
	}
	this.set_project=function(item){
		parameter_json.project = item;
	}
	this.set_start_time=function(time){
		parameter_json.start_time = time;
	}
	this.set_end_time=function(time){
		parameter_json.end_time = time;
	}
}
