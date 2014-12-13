function login_animate() {
	$("#login_anim").animate({
		opacity: 0,
		left: '+=40'
	}, 500, function(){
		$("#login_anim").attr("style", "");
	});
}

function login_click() {
	$("input[name='password']")[0].value = hex_md5($("input[name='password']")[0].value);
	$('#login_form')[0].submit();
}