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
	
	$('.overflow_form, .city_list-sdec').perfectScrollbar({wheelSpeed: 30, wheelPropagation: false, minScrollbarLength: 1, suppressScrollX: false});
	if (((count>1) && (html_width<1200))||((count>1) && (html_width>=1200))) {
		$('.cart_items_block').perfectScrollbar({wheelSpeed: 30, wheelPropagation: false, minScrollbarLength: 1, suppressScrollX: false});
	}else{
		$(".cart_items_block .ps-scrollbar-y-rail").remove();
		$(".cart_items_block .ps-container").removeClass("ps-container");
	}

	if (count==0){
		$(".empty_cart").addClass("active");
	}

	$(".cart_items_block .ps-container .ps-scrollbar-x-rail").remove();
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

$(document).on("click", ".cart_help_button", function(){

	if (!($(this).find(".help_block").hasClass("active"))) {
		$(".help_block").removeClass("active");
		$(this).find(".help_block").addClass("active");
	}
});




$(document).on('click',".result_city span", function(){
	$(".city").val($(this).text());
	$(".result_city").find("span").remove();
	
	reset_city_depend();
});


$(document).on('input','.select-city__main-input__sdec', function(){
	$(".city").val($(this).val());

});

$(document).on("click", ".container_yandex_close", function(){
	$(".alert_block.alert_cart").removeClass("active");
});


$(document).on('input','.city', function(){

	$(".select-city__main-input__sdec").val($(this).val());


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

$(document).on("click", ".container_mobile button, .container_tablet button, .container_old button", function(){
	$(".alert_block.alert_mobile, .alert_block.alert_tablet, .alert_block.alert_old ").removeClass("active");
});

$(document).load(function(){





	if (device.mobile() || device.tablet()) {
		alert("ok");
		if (device.portrait()) {
			$(".alert_block.alert_mobile").addClass("active");
		}

		if (device.landscape()) {
			$(".alert_block.alert_tablet").addClass("active");
		}
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

jQuery(function($){
	$(document).mouseup(function (e){ // событие клика по веб-документу
		var div = $(".cart_help_button"); // тут указываем ID элемента
		if (!div.is(e.target) // если клик был не по нашему блоку
		   && (div.has(e.target).length === 0)
			) {
			$(".help_block").removeClass("active");
			
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



function get_city_list_sdec() {

}



function get_city_sdec() {
	$.ajax({
	  type: "POST",
	  dataType: "json",
	  url: "cart/get_city_sdec",
	  success: function(data){
	  	sdec_points=data;
	  	myGeoObjects = [];
	  	myMap.geoObjects.removeAll();
		for (var i = 0; i < sdec_points.length; i++) {
			console.log(sdec_points[i]);

			var table = '<table><tbody>';

			table += '<tr><td>Адрес:</td><td>'+ucfirst(sdec_points[i]["@attributes"]["Address"].toLowerCase())+'</td><tr>';
			table += '<tr><td>Рабочее время</td><td>'+ucfirst(sdec_points[i]["@attributes"]["WorkTime"].toLowerCase())+'</td><tr>';

			if ((sdec_points[i]["@attributes"]["Phone"]!=undefined) && (sdec_points[i]["@attributes"]["Phone"]!="")) {
				table += '<tr><td>Телефон</td><td>'+sdec_points[i]["@attributes"]["Phone"]+'</td><tr>';	
			}


			if ((sdec_points[i]["@attributes"]["Note"]!=undefined) && (sdec_points[i]["@attributes"]["Note"]!="")) {
				table += '<tr><td>Примечание</td><td>'+sdec_points[i]["@attributes"]["Note"]+'</td><tr>';	
			}
			   table += '</tbody></table>';

			
			table += "<button ";

			if ((sdec_points[i]["@attributes"]["Address"]!=undefined) && (sdec_points[i]["@attributes"]["Address"]!="")) {
					table += "data-Address='"+sdec_points[i]["@attributes"]["Address"]+"' ";
			}

			if ((sdec_points[i]["@attributes"]["City"]!=undefined) && (sdec_points[i]["@attributes"]["City"]!="")) {
				table += "data-City='"+sdec_points[i]["@attributes"]["City"]+"' ";
			}

			if ((sdec_points[i]["@attributes"]["CityCode"]!=undefined) && (sdec_points[i]["@attributes"]["CityCode"]!="")) {
				table += "data-CityCode='"+sdec_points[i]["@attributes"]["CityCode"]+"' ";
			}

			if ((sdec_points[i]["@attributes"]["Code"]!=undefined) && (sdec_points[i]["@attributes"]["Code"]!="")) {
				table += "data-Code='"+sdec_points[i]["@attributes"]["Code"]+"' ";
			}

			if ((sdec_points[i]["@attributes"]["Name"]!=undefined) && (sdec_points[i]["@attributes"]["Name"]!="")) {
				table += "data-Name='"+sdec_points[i]["@attributes"]["Name"]+"' ";
			}

			if ((sdec_points[i]["@attributes"]["Note"]!=undefined) && (sdec_points[i]["@attributes"]["Note"]!="")) {
				table += "data-Note='"+sdec_points[i]["@attributes"]["Note"]+"' ";
			}

			if ((sdec_points[i]["@attributes"]["Phone"]!=undefined) && (sdec_points[i]["@attributes"]["Phone"]!="")) {
				table += "data-Phone='"+sdec_points[i]["@attributes"]["Phone"]+"' ";
			}

			if ((sdec_points[i]["@attributes"]["WorkTime"]!=undefined) && (sdec_points[i]["@attributes"]["WorkTime"]!="")) {
				table += "data-WorkTime='"+sdec_points[i]["@attributes"]["WorkTime"]+"' ";
			}

			if ((sdec_points[i]["@attributes"]["coordX"]!=undefined) && (sdec_points[i]["@attributes"]["coordX"]!="")) {
				table += "data-coordX='"+sdec_points[i]["@attributes"]["WorkTime"]+"' ";
			}

			if ((sdec_points[i]["@attributes"]["coordY"]!=undefined) && (sdec_points[i]["@attributes"]["coordY"]!="")) {
				table += "data-coordY='"+sdec_points[i]["@attributes"]["WorkTime"]+"' ";
			}


			table += " >Выбрать</button>";


         
			var object =  new ymaps.Placemark(
					[sdec_points[i]["@attributes"]["coordY"], sdec_points[i]["@attributes"]["coordX"]], {
						 balloonContentHeader: sdec_points[i]["@attributes"]["Name"],
               			 balloonContent: table

					}
				);

			myGeoObjects.push(object);
			
		};


		clusterer = new ymaps.Clusterer();
		clusterer.add(myGeoObjects);
		myMap.geoObjects.add(clusterer);
		myMap.setBounds(clusterer.getBounds());
	  }
  	});
}

var sdec_data = {
	Address: "",
	City: "",
	CityCode: "",
	Code: "",
	Name: "",
	Note: "",
	Phone: "",
	WorkTime: "",
	coordX: "",
	coordY: ""
}


$(document).on("click", "ymaps button" ,function(){
	sdec_data.Address = $(this).data("address");
	sdec_data.City = $(this).data("city");
	sdec_data.CityCode = $(this).data("citycode");
	sdec_data.Code = $(this).data("code");
	sdec_data.Name = $(this).data("name");
	sdec_data.Note = $(this).data("note");
	sdec_data.Phone = $(this).data("phone");
	sdec_data.WorkTime = $(this).data("worktime");
	sdec_data.coordX = $(this).data("coordx");
	sdec_data.coordY = $(this).data("coordy");

	$(".alert_block.alert_cart").removeClass("active");
});


/*map*/

var myMap;

// Дождёмся загрузки API и готовности DOM.
ymaps.ready(init);

function init () {
    // Создание экземпляра карты и его привязка к контейнеру с
    // заданным id ("map").
    myMap = new ymaps.Map('map', {
        // При инициализации карты обязательно нужно указать
        // её центр и коэффициент масштабирования.
        center: [55.76, 37.64], // Москва
        zoom: 10,
    }, {
        
    });

    myMap.controls.add(
   		new ymaps.control.ZoomControl()
	);
}

function ucfirst(str) 
{
    var first = str.charAt(0).toUpperCase();
    return first + str.substr(1);
}

$(window).load(function(){
	get_city_sdec();
});