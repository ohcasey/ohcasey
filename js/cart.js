$(document).on("click",".checkbox_prev_input",function(){
	$(this).parent().find("input").click();
});

function preparing_html() {
	//$("body").css("min-height","768px");
	var html_width = $("body").width();
	var html_height = $(document).height();
	$(".main_container").css("height", html_height+"px");
	$(".main_container, #header").css("width", html_width+"px");
	$(".header_menu__item").css({"width": ((html_width - $("#header-logo").width() - 20*5)/6) +"px", "visibility": "visible"});
	
	$(".center-cart_block").css("margin-left", ($("#left").width() + 50)+"px");
	//$(".right_cart").css("width",  (html_width - $("#left").width() - $(".center-cart_block").width() - 70) +"px" );
	to_down_of_page();

	if (html_width>1979) {
		$("#order_form").css("height",(html_height-70-130-60)+"px");
	}else{
		$("#order_form").css("height",(html_height-70-70-60)+"px");
	}
	

	var count = $(".cart_item_block").length;
	
	$('.overflow_form').perfectScrollbar({wheelSpeed: 30, wheelPropagation: false, minScrollbarLength: 1, suppressScrollX: false});

	if (((count>1) && (html_width<1200))||((count>1) && (html_width>=1200))) {
		$('.cart_items_block').perfectScrollbar({wheelSpeed: 30, wheelPropagation: false, minScrollbarLength: 1, suppressScrollX: false});
	}else{
		$(".ps-scrollbar-y-rail").remove();
		$(".ps-container").removeClass("ps-container");
	}

	if (count==0){
		$(".empty_cart").addClass("active");
	}

	$(".ps-container .ps-scrollbar-x-rail").remove();
}

$(window).resize(function(){
	preparing_html();

})

$(window).scroll(function(){
	preparing_html();
})


$(document).on('click','.checkbox_item input.disabled', function(event){
	event.preventDefault();
});

$(document).on('change','.checkbox_item input.disabled', function(event){
	event.preventDefault();
});


$(document).on('click',".checkbox_item input", function(){
	$(this).parent().parent().find("input").removeClass("error");
});

$(document).on('click',".checkbox_item span", function(){
	$(this).parent().find("input").click();
});

$(document).on("focus", ".item_important", function(){
	$(this).removeClass("error");
});


$(document).on('click',".result_city span", function(){
	$(".city").val($(this).text());
	$(".result_city").find("span").remove();
	
	reset_city_depend();
});




$(document).on('input','.city', function(){
	$(".result_city").find("span").remove();
	$.ajax({ 
		type: "POST", 
		url: "cart/get_city",
		dataType: 'text',
		data: {
			string : $(".city").val()
		},
		success: function(data)
			{		
					
				if (data!=false){
					var result = JSON.parse(data);
					console.log(result);
					for (var i = 0; i < result.length; i++) {

   						 $(".result_city").append("<span>"+result[i][0]+"</span>");
   						 $('.result_city').perfectScrollbar({wheelSpeed: 30, wheelPropagation: false, minScrollbarLength: 1, suppressScrollX: false});
					}

				}
				
			},
		fail: function(data){
					
					}
	});
	reset_city_depend();
	
});




var breakpoint_delete = true;

$(document).on('click',".cart_item_block__close", function(){

	if (breakpoint_delete==false) return;

	var id = $(this).parent().attr("id");
			breakpoint_delete==false;
			$.ajax({ 
					type: "POST", 
					url: "cart/remove_item",
					dataType: 'text',
					data: {
						item : id 
					},
					success: function(data){

							console.log(data);

							$("#"+id).remove();
							
							reset_cost_total();
							preparing_html();
							breakpoint_delete==true;
						
					},
					fail: function(data){
						sweetAlert("Ошибка", data, "error");
						breakpoint_delete==true;
					}
				});



});




$(document).on('change','input[name="deliver"]', function(){

	var delivery_cost = $(this).data("delivery");
	$(".delivery_cost").text(delivery_cost+" рублей").attr("data-delivery",delivery_cost);

	$('input[name="payment"]').removeClass("disabled");
	$('input[name="payment"]').prop({"disabled": false, "readonly": false });


	$(".cart_item.adress")
			.addClass("item_important")
			.attr("placeholder","* Адрес");
	

	var radio_val = $('input[name="deliver"]:checked').val();

	if (radio_val=="self") {
		$(".cart_item.adress")
			.removeClass("error")
			.removeClass("item_important")
			.attr("placeholder","Адрес");
	}
	if (radio_val=="kur_mos") {
	
	}
	if ((radio_val=="kur_rus") || (radio_val=="mail_ru")) {
		var radio_vs = $('input[name="payment"]:checked').val();

		if (radio_vs === "cash") {
			$('input[name="payment"]:checked').prop("checked",false);

		}

		$(".checkbox_item.cash input").addClass("disabled");
		$('.checkbox_item.cash').prop({"disabled": true, "readonly": true });
	}

	reset_cost_total();
});



$(document).on('keydown',".phone", function(){
        // Разрешаем: backspace, delete, tab и escape
        if ( event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27 || 
             // Разрешаем: Ctrl+A
            (event.keyCode == 65 && event.ctrlKey === true) || 
             // Разрешаем: home, end, влево, вправо
            (event.keyCode >= 35 && event.keyCode <= 39)) {
                 // Ничего не делаем
                 return;
        }
        else {
            // Обеждаемся, что это цифра, и останавливаем событие keypress
            if ((event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) {
                event.preventDefault(); 
            }   
        }
 });



$(document).on('click',"#steps_controller-next_but div", function(){
	var breakpoint = true;

	$(".item_important").each(function(){
		if ($(this).val() == "") {
			breakpoint=false;
			$(this).addClass("error");
		}
	});

	if (validateEmail($(".email").val())==false) {
		$(".email").addClass("error");
		breakpoint=false;
	}

	var radio_val = $('input[name="deliver"]:checked').val();

	if (( radio_val=="") || (radio_val===undefined) || (radio_val===null)|| (radio_val===NaN)) {
		$('input[name="deliver"]').addClass("error");
		breakpoint=false;
	}

	var radio_val = $('input[name="payment"]:checked').val();

	if (( radio_val=="") || (radio_val===undefined) || (radio_val===null)|| (radio_val===NaN)) {
		$('input[name="payment"]').addClass("error");
		breakpoint=false;
	}


	if ((breakpoint==true) && ($(".cart_item_block").length>0)) {
		$("input,textarea").removeClass("error");

		reset_cost_total();

		$(".main_container").after('<div id = "foo"></div>');

		var target = document.getElementById('foo');
		var spinner = new Spinner(opts).spin(target);

		document.order_form.submit();


	}
	
});


$(document).ready(function(){
	reset_cost_total();
	reset_city_depend();
	
	preparing_html();
	

	$(".ps-container .ps-scrollbar-x-rail").remove();
	$("#phone_model").append("Итого");
	$('.phone').mask('+7 (999) 999-99-99');

	$('input,textarea').focus(function(){
	   $(this).data('placeholder',$(this).attr('placeholder'))
	   $(this).attr('placeholder','');
 	});
	 $('input,textarea').blur(function(){
	   $(this).attr('placeholder',$(this).data('placeholder'));
	 });
});

function reset_cost_total() {

	var count=$(".cart_item_block").length;
							
							var text;
							if (count==0) {
								text = "Товаров";
							}
							if (count==1) {
								text = "Товар";
							}


							if ((count>=2) &&(count<5)) {
								text = "Товара";
							}
							if (count>=5) {
								text = "Товаров";
							}

							

							$("#cart").html("<span><span class='cart_count'>"+count+"</span> "+text+"</span>");

	
	var cost =0;
	$(".cart_item_block").each(function(){
		cost+=$(this).data("cost");
	});

	$(".cost_item").text(cost +" рублей");
	cost+=parseInt($(".delivery_cost").attr("data-delivery"));
	$("#price_total").text(cost+ " р");
	$(".result").text("Итого: "+cost+ " рублей");
}

function validateEmail(email) {
    var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    return re.test(email);
}

function reset_city_depend(){
	var city = $(".cart_item.city").val();
	
	var radio_val = $('input[name="deliver"]:checked').val();

	if ((radio_val=="kur_mos") || (radio_val=="self")) { 

		var delivery_cost = 0;
		$(".delivery_cost").text(delivery_cost+" рублей").attr("data-delivery",delivery_cost);
			reset_cost_total();


		$('input[name="deliver"]:checked').prop("checked",false);
		var radio_vs = $('input[name="payment"]:checked').val();

		

		if (radio_vs === "cash") {
			$('input[name="payment"]:checked').prop("checked",false);

		}

		$(".checkbox_item.cash input").addClass("disabled");
		$('.checkbox_item.cash input').prop({"disabled": true, "readonly": true });
	}

	if ((city=="Москва") || (city=="москва")) {
		$('input[name="deliver"]').removeClass("disabled");
		$('input[name="deliver"]').prop({"disabled": false, "readonly": false });
	}else{
		$('#self, #kur_mos').addClass("disabled");
		$('#self, #kur_mos').prop({"disabled": true, "readonly": true });		
	}
}	


jQuery(function($){
	$(document).mouseup(function (e){ // событие клика по веб-документу
		var div = $(".result_city"); // тут указываем ID элемента
		if (!div.is(e.target) // если клик был не по нашему блоку
		   && (div.has(e.target).length === 0)
			) {
			$(".result_city").find("span").remove();
			
		}
	});
});


function to_down_of_page() {
	var browser_height = $(window).height();
	$("#steps_controller").css("width", $("#right").width());	
	$("#steps_controller").css({"top":  (browser_height- 2- $("#steps_controller").height() + $(window).scrollTop()), "visibility": "visible" });
}


jQuery(function($){
	$(document).mouseup(function (event){ // событие клика по веб-документу
		var div = $(".payment_message"); // тут указываем ID элемента
		if (!div.is(event.target) // если клик был не по нашему блоку
		    && (div.has(event.target).length === 0)) { // и не по его дочерним элементам
				$(".payment_message").removeClass("active");
		}
	});
});

