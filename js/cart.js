function preparing_html() {
	var html_width = $("body").width();
	var html_height = $(document).height();
	$(".header_menu__item").css({"width": ((html_width - $("#header-logo").width() - 20*5)/6) +"px", "visibility": "visible"});
}

$(window).resize(function(){
	preparing_html();
})

preparing_html();




$(document).ready(function(){
	$("#phone_model").append("Итого");
});