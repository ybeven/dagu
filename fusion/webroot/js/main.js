// JavaScript Document
$(document).ready(function() {
	/*表格行颜色交替样式设置
    $('#infoList tr:odd').addClass('odd');
    $('#infoList tr:even').addClass('even');
	表格行颜色交替样式设置
    $('#infoList1 tr:odd').addClass('odd');
    $('#infoList1 tr:even').addClass('even');*/
	
  //$("#menu_CASM").hover(   
  //       function () {   
  //           //show its submenu   
  //           $('ul',this).slideDown(100);   
  // 
  //       },    
  //       function () {   
  //           //hide its submenu   
  //           $('ul', this).slideUp(100);            
  //      }   
  //  );
  /*$(".div_menu").slideUp();
  $("#menu_CASM").click(function(){
	$("#div_CASM").slideDown(200);
  });
  
  $("#menu_PM").click(function(){
	$("#div_PM").slideDown(200);
  });
  
  $("#menu_MPM").click(function(){
	$("#div_MPM").slideDown(200);
  });
  
  $("#menu_WH").click(function(){
	$("#div_WH").slideDown(200);
  });
  
  $("#menu_MDM").click(function(){
	$("#div_MDM").slideDown(200);
  });
  
  $("#menu_system").click(function(){
	$("#div_system").slideDown(200);
  });*/
});

function confirmAndJump(msg, uri) {
	if(confirm(msg)) location.href=uri;
}