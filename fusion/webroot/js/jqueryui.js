{literal}
document.ready = function(){
// Accordion
$("#accordion").accordion({header: "h3", event: "mouseover", active : {/literal}{$act}{literal}});

// Datepicker
$('.datepicker').datepicker({
	showAnim: "slideDown",
	duration: "fast",
	changeMonth: true,
	changeYear: true,
	showOtherMonths: true,
	selectOtherMonths: true
});

//Button
$("input:button, input:submit, input:reset").button();
$(".radio").buttonset();
};
{/literal}