$(document).ready(function(){
	$('select').selectpicker();

	 $('.carousel').carousel({
	    pause: true,
	    interval: 3000,
	  });

	set_slider_height();
	
});

function set_slider_height() {
	var slider_height = $(".slider_cases").width()+"px";
	$(".slider_cases").css("height", slider_height);
}

$(document).on("click",".select_cases", function(){
	if ($(this).hasClass("active")) return;

	var id_block = $(this).data("block");

	$(".body_block").removeClass("active");
	$(".body_block_"+id_block).addClass("active");

	$(".select_cases").removeClass("active");
	$(".select_cases[data-block="+id_block+"]").addClass("active");
});	

$(window).resize(function(){
	set_slider_height();
});