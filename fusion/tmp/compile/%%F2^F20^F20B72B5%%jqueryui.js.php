<?php /* Smarty version 2.6.26, created on 2014-05-18 01:41:05
         compiled from ../webroot/js/jqueryui.js */ ?>
<?php echo '
document.ready = function(){
// Accordion
$("#accordion").accordion({header: "h3", event: "mouseover", active : '; ?>
<?php echo $this->_tpl_vars['act']; ?>
<?php echo '});

// Datepicker
$(\'.datepicker\').datepicker({
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
'; ?>