Date.prototype.getMonthName = function() {
    var month = ['января','февраля','марта','апреля','мая','июня',
    'июля','августа','сентября','октября','ноября','декабря'];
    return month[this.getMonth()];
}

var date_sdec_max = 7;
var date_sdec_kur_max = 7; 

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
	coordY: "",
	cost: ""
};

$(document).on("click",".checkbox_prev_input",function(){
	$(this).parent().find("input").click();
});

function preparing_html() {
	var html_width = $("body").width();
	var html_height = $(document).height();
	$(".main_container").css("height", html_height+"px");
	$(".main_container, #header").css("width", html_width+"px");
	$(".header_menu__item").css({"width": ((html_width - $("#header-logo").width() - 20*5)/6) +"px", "visibility": "visible"});
	
	$(".center-cart_block").css("margin-left", ($("#left").width() + 50)+"px");
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


$(document).on('input','.select-city__main-input__sdec', function(){
	$(".city").val($(this).val());
	get_city_list_sdec();
	get_kur_cost(false);
});

$(document).on("click", ".container_yandex_close", function(){
	$(".alert_block.alert_cart").removeClass("active");

});

$(document).on('input','.city', function(){
  
    if ($(this).val().length<3){
        return;
    }
    
	$(".select-city__main-input__sdec").val($(this).val());
	get_kur_cost(false);

	$(".result_city").find("span").remove();
	$.ajax({ 
		type: "POST", 
		url: "cart/get_city",
		dataType: 'text',
		data: {
			string : $(".city").val()
		},
		success: function(data){		
            if (data!=false){
				var result = JSON.parse(data);
				console.log(result);
                $('div.suggestion-element').remove();
				for (var i = 0; i < result.length; i++) {
   					 $(".result_city").append("<div class='suggestion-element'><span class='city-suggestion'>"+result[i][0]+"</span></div>");
				}
			}				
		},
		fail: function(data){
					
	    }
	});
});




// Удаление элемента из корзины:
var breakpoint_delete = true;
$(document).on('click',".cart_item_block__close", function(){

	if (breakpoint_delete==false) return;

	var id = $(this).parent().attr("id");
			breakpoint_delete=false;
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
							breakpoint_delete=true;
						
					},
					fail: function(data){
						sweetAlert("Ошибка", data, "error");
						breakpoint_delete=true;
					}
				});
});


$(document).on('change','input[name="deliver"]', function(){
    
    var delivery_cost = $(this).data("delivery");
    $(".delivery_cost").text(delivery_cost+" рублей").attr("data-delivery",delivery_cost);
    
    var radio_val = $('input[name="deliver"]:checked').val();
    
    show_details_block();
    show_payment_block();
    
    
    switch(radio_val){
        case 'self':{
            reset_inputs_to_default();
            $('input#calendar_self').addClass('active');
            $('span#info_span_self').addClass('active');
            $('div.cash').removeClass('hidden-element');
            break;
        }
        case 'sdec':{
            reset_inputs_to_default();
            $('input#calendar_sdec').addClass('active');
            $('span#info_span_sdec').addClass('active');
            show_sdec();
            break;
        }
        case 'kur_mos':{
            reset_inputs_to_default();
            $('input#calendar_moscow').addClass('active');
            $('.cart_item.adress').removeClass('hidden-element');
            $('div.cash').removeClass('hidden-element');
            break;
        }
        case 'kur_rus':{
            reset_inputs_to_default();
            $('input#calendar_russia').addClass('active');
            $('.cart_item.adress').removeClass('hidden-element');
            get_kur_cost();
            break;
        }
        case 'mail_ru':{
            reset_inputs_to_default();
            $('.cart_item.adress').removeClass('hidden-element');
            $('.cart_item.index').removeClass('hidden-element');
            break;
        }
    }
    
    reset_cost_total();
});

function reset_inputs_to_default(){
    $('.cart_item').removeClass('error');
    $('input.error').removeClass('error');
    
    $('.cart_item.adress').addClass('hidden-element');
    $('.cart_item.index').addClass('hidden-element');
    
    $('div.cash').addClass('hidden-element');
    
    $('input[name="payment"]:checked').prop("checked",false);
    
    hide_all_date_inputs_and_additional_spans();
};

function hide_all_delivery_methods(){
    $('div.delivery_block div.checkbox_item').addClass('hidden-element');
}
function hide_delivery_block(){
    $('div.delivery_block').addClass('hidden-element');
}
function hide_details_block(){
    $('div.details_block').addClass('hidden-element');
}
function hide_payment_block(){
    $('div.payment_block').addClass('hidden-element');
}
function hide_order_form(){
    hide_delivery_block();
    hide_details_block();
    hide_payment_block();
}
function hide_all_date_inputs_and_additional_spans(){
    $('input#calendar_self').removeClass('active');
    $('span#info_span_self').removeClass('active');
    $('input#calendar_sdec').removeClass('active');
    $('span#info_span_sdec').removeClass('active');
    $('input#calendar_moscow').removeClass('active');
    $('input#calendar_russia').removeClass('active');
}


function show_delivery_block(){
    $('div.delivery_block').removeClass('hidden-element');
}
function show_details_block(){
    $('div.details_block').removeClass('hidden-element');
}
function show_payment_block(){
    $('div.payment_block').removeClass('hidden-element');
}
function show_delivery_methods_for_Moscow(){
    hide_all_delivery_methods();
    $('div.checkbox_item.person').removeClass('hidden-element');
    $('div.checkbox_item.moscow').removeClass('hidden-element');
    $('div.checkbox_item.sdec').removeClass('hidden-element');
}
function show_delivery_methods_for_other_cities(){
    hide_all_delivery_methods();
    $('div.checkbox_item.sdec').removeClass('hidden-element');
    $('div.checkbox_item.russia').removeClass('hidden-element');
    $('div.checkbox_item.mail').removeClass('hidden-element');
}


function set_city_value_to_sdec_window(){
    $(".select-city__main-input__sdec").val($('input.city').val());
}



/* Когда выбрали город вверху формы, показываем доступные способы доставки и оплаты */

$(document).ready(function(){
     alert('1');
     if($("input.city").val()!=""&&$("input.city").val()!=null){
         set_city_value_to_sdec_window();
         displayAvailableDelivery();
     }
});

$(document).on('keydown', 'input.city', function(){
    //alert('KEYDOWN EVENT');
    if(event.keyCode == 13 || event.keyCode == 9){
        $(".result_city").find("span").remove();
        set_city_value_to_sdec_window();
        displayAvailableDelivery();   
    }
});
$(document).on('click', 'div.suggestion-element' , function(){
    //alert("CLICK SUGGESTION EVENT");
    $(".city").val($(this).text());
    $(".result_city").find("span").remove();
    set_city_value_to_sdec_window();
    displayAvailableDelivery();
});
$(document).on('focusout', 'input.city', function(){
    //alert('FOCUS OUT EVENT');
    set_city_value_to_sdec_window();
    displayAvailableDelivery();
});
/*--------------------------------------------------------------------------------------------------*/


function displayAvailableDelivery(){
    
    alert('func was called');
    
    var city_name = $('input.city').val();
    
    if (city_name == 'Москва' || city_name == 'москва'){
        $('input.city').removeClass('error');
        show_delivery_block();
        show_delivery_methods_for_Moscow();
    }
    else{
        //Проверить правильность введенного города 
        alert('Ajax Start');
        $.ajax({ 
            type: "POST", 
            url: "cart/get_city",
            dataType: 'text',
            data: {
                string : city_name
            },
            success: function(data){	
                alert("Succen START");
                alert(data);
                var result = JSON.parse(data);
                for (var iter = 0; iter<result.length; iter++){
                    var city_exists = false;
                    if(result[iter].name == city_name){
                        city_exists = true;
                    }
                }
                
                if(city_exists){
                    $('input.city').removeClass('error');
                    show_delivery_block();
                    show_delivery_methods_for_other_cities();
                }
                else{
                    $('input.city').addClass('error');
                    hide_order_form();
                }
                alert('success_end');
            },
            fail: function(data){
                console.log("ERROR: AJAX request to check city exists FAILED");
            } 
        });   
    }
}

               

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


// Метод получает стоимость доставки курьеров по России через СДЭК
// И устанавливает допустимые даты в календарях для способа доставки
// "Курьером по Росии"
// 
// TODO: Разделить логику интерфейса 
function get_kur_cost(params) {
    $(".russia_cost").text("-");
	$("#kur_rus").attr("data-delivery", 0);																
	$("#russia_cost").val("0");
	
	$.ajax({
        url : "http://api.cdek.ru/city/getListByTerm/jsonp.php?callback=?",
		dataType : "jsonp",
		data : {
		    q : function() {
			    return $(".city").val();
			},
			name_startsWith : function() {
                return $(".city").val();
			}
		},
		success : function(data) {
		    console.log(data);
			$(".city_list-sdec").find("span").remove();
               
            if (data.geonames == null){
                return;
            }
                
			for (var i = 0; i<data.geonames.length; i++) {
			    if (data.geonames[i].cityName.toLowerCase() === $(".city").val().toLowerCase()) {
					$.ajax({ 
					    type: "POST", 
					    url: "cart/get_cost_sdec",
					    dataType: 'text',
						data: {
						    idcity : data.geonames[i].id,
							kur: true
						},
						success: function(data){			
						    if (data!=false){
							    var result = JSON.parse(data);
								console.log(result);
        						$(".russia_cost").text(result.price+"p");
                                $("#kur_rus").attr("data-delivery", result.price);
								if (params==true) {												
								    $(".delivery_cost").attr("data-delivery", result.price);
								}
                                else{
								    $(".select_city").addClass("active");
									var date_start = new Date(Date.parse(result.deliveryDateMax));
									console.log(date_start);
    								$(".select_city").html("с "+date_start.getDate()+"<br>"+date_start.getMonthName());
									var russiaDate =  new Date(Date.parse(result.deliveryDateMax));
									russiaDate.setDate(russiaDate.getDate() + date_sdec_kur_max);
									$("#calendar_russia").datepicker('option',
                                    {
									    minDate: date_start,
										maxDate: russiaDate
									});						
								}
								$("#russia_cost").val(result.price);
								reset_cost_total();
												
							}
                            else{
							    $('input[name="deliver"]:checked').prop("checked",false);
								if (params==true) {						
                                    $("input").removeClass("error");
                                    $(".city").addClass("error");
                                }
                                else {
                                    $(".select_city").removeClass("active");	
                                    $(".select_city").html("Введите<br>город");	
                                }
                            }
                        },
                        fail: function(data){
                            $('input[name="deliver"]:checked').prop("checked",false);
                            if (params==true) {	
                                $("input").removeClass("error");
                                $(".city").addClass("error");
                            }
                            else{
                                $(".select_city").removeClass("active");
                                $(".select_city").html("Введите<br>город");		
                            }
                        }
                    });
                    if (params==true) {	
                        $(".checkbox_item.russia").find(".checkbox_hided").addClass("active");
                    }
                    return;
			    }
			}
            $('input[name="deliver"]:checked').prop("checked",false);
            if (params==true) {	
                if ($(".adress").val() == "") {
                    $(".adress").addClass("error");
                } 
                $("input").removeClass("error");
                $(".city").addClass("error");
            }
        }
    });
	reset_cost_total();
}


function show_sdec() {
	$(".alert_cart").addClass("active");
	get_city_list_sdec();
}

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


// Обработка нажатия на кнопку "Оформить"
$(document).on('click',"#steps_controller-next_but div", function(){
	var breakpoint = true;
    
	$(".item_important:visible").each(function(){
		if ($(this).val() == "") {
			breakpoint=false;
			$(this).addClass("error");
		}
	});
    if (validatePhone($('input.phone').val())==false){
        $('input.phone').addClass('error');
        breakpoint=false;
    }
	if (validateEmail($(".email").val())==false) {
		$("input.email").addClass("error");
		breakpoint=false;
	}
	var radio_val = $('input[name="deliver"]:checked').val();
	if (( radio_val=="") || (radio_val===undefined) || (radio_val===null)|| (radio_val===NaN)) {
		$('input[name="deliver"]').addClass("error");
		breakpoint=false;
	}
	if (radio_val=="self") {
		if ($("#calendar_self").val()=="") {
			$("#calendar_self").addClass("error");
			breakpoint=false;
		}
	} 

	if (radio_val=="sdec") {
		if ($("#calendar_sdec").val()=="") {
			$("#calendar_sdec").addClass("error");
			breakpoint=false;
		}
		if ($("#sdec_code").val()=="") {
			
			$(".sdec_address").addClass("error");
			breakpoint=false;
		}
	}
	if (radio_val=="kur_rus") {
		if ($("#calendar_russia").val()=="") {
			$("#calendar_russia").addClass("error");
			breakpoint=false;
		}
		if ($("#kur_rus").attr("data-delivery") == 0 ) {
			$('input[name="deliver"]:checked').prop("checked",false);
			$("#kur_rus").addClass("error");
			breakpoint=false;
		}
	}
	if (radio_val=="kur_mos") {
		if ($("#calendar_moscow").val()=="") {
			$("#calendar_moscow").addClass("error");
			breakpoint=false;
        }
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

$.datepicker.setDefaults($.datepicker.regional['ru']);

$(document).ready(function(){
	if (device.mobile() || device.tablet()) {
		if (device.portrait()) {
			$(".alert_block.alert_mobile").addClass("active");
		}
		if (device.landscape()) {
			$(".alert_block.alert_tablet").addClass("active");
		}
	}
	get_kur_cost(false);
	
	var dates1 = $(".calendar").datepicker({
		 firstDay: 1,
		monthNames:
		["Январь","Февраль","Март","Апрель","Май","Июнь","Июль","Август", 
		"Сентябрь","Октябрь","Ноябрь","Декабрь"],
		dayNamesMin: 
		["Вс","Пн", "Вт", "Ср", "Чт", "Пт", "Сб"],
		changeMonth: false,
		changeYear: false,
		dateFormat: 'dd.mm.yy',
		beforeShow: function() {
	        setTimeout(function(){
	            $('.ui-datepicker').css('z-index', 99999999999999);
	        }, 0);
	    }
	});
	/*на разные даты*/
	var selfDate = new Date();

	selfDate.setDate(selfDate.getDate() + 1);

	$("#calendar_self").datepicker('option', 
		{
			minDate: selfDate
		}
	);	
	var moscowDate = new Date();
	moscowDate.setDate(moscowDate.getDate() + 2);
	$("#calendar_moscow").datepicker('option', 
		{
			minDate: moscowDate
		}
	);
	var russiaDate = new Date();
	russiaDate.setDate(russiaDate.getDate() + 4);
	$("#calendar_russia").datepicker('option', 
		{
			minDate: russiaDate
		}
	);
	$(".calendar").change(function(){
		$(this).val($(this).val().replace('Январь', 'Января'));
		$(this).val($(this).val().replace('Февраль', ' Февраля '));
		$(this).val($(this).val().replace('Март', ' Марта '));
		$(this).val($(this).val().replace('Апрель', 'Апреля'));
		$(this).val($(this).val().replace('Май', 'Мая'));
		$(this).val($(this).val().replace('Июнь', 'Июня'));
		$(this).val($(this).val().replace('Июль', 'Июля'));	
		$(this).val($(this).val().replace('Август', 'Августа'));
		$(this).val($(this).val().replace('Сентябрь', 'Сентября'));
		$(this).val($(this).val().replace('Октябрь', 'Октября'));
		$(this).val($(this).val().replace('Ноябрь', 'Ноября'));
		$(this).val($(this).val().replace('Декабрь', 'Декабря'));
	});
});

$(document).ready(function(){
	reset_cost_total();
	preparing_html();
	$(".ps-container .ps-scrollbar-x-rail").remove();
	$("#phone_model").append("Итого");
    
	$('.phone').mask('+7 (999) 999 99 99?9', {placeholder: " ", autoclear: false}); 
    
    $('input.phone').on('focusout', function(){ 
        if (validatePhone($(this).val())==false){ 
            $(this).addClass('error'); 
        } 
        if($(this).val()==""){
            $(this).removeClass('error');
        }
    });
    
	$('input,textarea').focus(function(){
	   $(this).data('placeholder',$(this).attr('placeholder'));
	   $(this).attr('placeholder','');
 	});
	 $('input,textarea').blur(function(){
	   $(this).attr('placeholder',$(this).data('placeholder'));
	 });
});


function validateEmail(email) {
    var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    return re.test(email);
}
function validatePhone(phone) {
    var re = /\+7\s\([\d]{3}\)\s[\d]{3}\s[\d]{2}\s[\d]{2,3}/i;
    return re.test(phone);
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

$(document).on("click", ".city_list-sdec span", function(){
	var idcity = $(this).attr("data-CityCode");
	get_city_sdec(idcity);
});

function get_city_list_sdec() {
    $.ajax({
	    url : "http://api.cdek.ru/city/getListByTerm/jsonp.php?callback=?",
		dataType : "jsonp",
		data : {
		    q : function() {
		        return $(".select-city__main-input__sdec").val()
		    },
		    name_startsWith : function() {
		        return $(".select-city__main-input__sdec").val()
		    }
		},
		success : function(data) {
		    console.log(data);
		    $(".city_list-sdec").find("span").remove();
		    for (var i = 0; i<data.geonames.length; i++) {
                if (data.geonames[i].cityName.toLowerCase() === $(".select-city__main-input__sdec").val().toLowerCase()) {
		            get_city_sdec(data.geonames[i].id);
		            console.log("ok");
		        }
                console.log(data.geonames[i]);
		        var text = "<span";
                text+= " data-CityCode='"+data.geonames[i].id+"'" ;
                text+=">"+data.geonames[i].cityName+"</span>";
                $(".city_list-sdec").append(text);
		    }
        }
	});
}


function get_city_sdec(idcity) {
    $.ajax({
        type: "POST",
        data: {
            "idcity": idcity
        },
        url: "cart/get_city_sdec",
        success: function(data){
            sdec_points=JSON.parse(data);
            myGeoObjects = [];
            myMap.geoObjects.removeAll();
            console.log(sdec_points);

	  	    if (sdec_points.length>1) {
	  		    for (var i = 0; i < sdec_points.length; i++) {
                    var table = '<table><tbody>';
                    table += '<tr><td>Адрес:</td><td>'+ucfirst(sdec_points[i]["@attributes"]["Address"].toLowerCase())+'</td><tr>';
                    if ((sdec_points[i]["@attributes"]["WorkTime"]!=undefined) && (sdec_points[i]["@attributes"]["WorkTime"]!="")) {
                        table += '<tr><td>Рабочее время</td><td>'+ucfirst(sdec_points[i]["@attributes"]["WorkTime"].toLowerCase())+'</td><tr>';
                    }
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
            else{
                var table = '<table><tbody>';
                table += '<tr><td>Адрес:</td><td>'+ucfirst(sdec_points["@attributes"]["Address"].toLowerCase())+'</td><tr>';
                if ((sdec_points["@attributes"]["WorkTime"]!=undefined) && (sdec_points["@attributes"]["WorkTime"]!="")) {
                    table += '<tr><td>Рабочее время</td><td>'+ucfirst(sdec_points["@attributes"]["WorkTime"].toLowerCase())+'</td><tr>';
                }
                if ((sdec_points["@attributes"]["Phone"]!=undefined) && (sdec_points["@attributes"]["Phone"]!="")) {
                    table += '<tr><td>Телефон</td><td>'+sdec_points["@attributes"]["Phone"]+'</td><tr>';	
                }

                if ((sdec_points["@attributes"]["Note"]!=undefined) && (sdec_points["@attributes"]["Note"]!="")) {
                    table += '<tr><td>Примечание</td><td>'+sdec_points["@attributes"]["Note"]+'</td><tr>';	
                }
                   table += '</tbody></table>';

                table += "<button ";

                if ((sdec_points["@attributes"]["Address"]!=undefined) && (sdec_points["@attributes"]["Address"]!="")) {
                        table += "data-Address='"+sdec_points["@attributes"]["Address"]+"' ";
                }

                if ((sdec_points["@attributes"]["City"]!=undefined) && (sdec_points["@attributes"]["City"]!="")) {
                    table += "data-City='"+sdec_points["@attributes"]["City"]+"' ";
                }

                if ((sdec_points["@attributes"]["CityCode"]!=undefined) && (sdec_points["@attributes"]["CityCode"]!="")) {
                    table += "data-CityCode='"+sdec_points["@attributes"]["CityCode"]+"' ";
                }

                if ((sdec_points["@attributes"]["Code"]!=undefined) && (sdec_points["@attributes"]["Code"]!="")) {
                    table += "data-Code='"+sdec_points["@attributes"]["Code"]+"' ";
                }

                if ((sdec_points["@attributes"]["Name"]!=undefined) && (sdec_points["@attributes"]["Name"]!="")) {
                    table += "data-Name='"+sdec_points["@attributes"]["Name"]+"' ";
                }

                if ((sdec_points["@attributes"]["Note"]!=undefined) && (sdec_points["@attributes"]["Note"]!="")) {
                    table += "data-Note='"+sdec_points["@attributes"]["Note"]+"' ";
                }

                if ((sdec_points["@attributes"]["Phone"]!=undefined) && (sdec_points["@attributes"]["Phone"]!="")) {
                    table += "data-Phone='"+sdec_points["@attributes"]["Phone"]+"' ";
                }

                if ((sdec_points["@attributes"]["WorkTime"]!=undefined) && (sdec_points["@attributes"]["WorkTime"]!="")) {
                    table += "data-WorkTime='"+sdec_points["@attributes"]["WorkTime"]+"' ";
                }

                if ((sdec_points["@attributes"]["coordX"]!=undefined) && (sdec_points["@attributes"]["coordX"]!="")) {
                    table += "data-coordX='"+sdec_points["@attributes"]["WorkTime"]+"' ";
                }

                if ((sdec_points["@attributes"]["coordY"]!=undefined) && (sdec_points["@attributes"]["coordY"]!="")) {
                    table += "data-coordY='"+sdec_points["@attributes"]["WorkTime"]+"' ";
                }
                table += " >Выбрать</button>";

                var object =  new ymaps.Placemark(
                        [sdec_points["@attributes"]["coordY"], sdec_points["@attributes"]["coordX"]], {
                             balloonContentHeader: sdec_points["@attributes"]["Name"],
                             balloonContent: table
                        }
                    );
                myMap.setCenter([sdec_points["@attributes"]["coordY"], sdec_points["@attributes"]["coordX"]]);
                myMap.geoObjects.add(object);		
            }	
	    }
    });
}

$(document).on("click",".sdec_address", function(){
	show_sdec();
});

$(document).on("click", "ymaps button" ,function(){
	$(".sdec_address").removeClass("error");

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

	$("#sdec_adress").val(sdec_data.Address);
	$("#sdec_code").val(sdec_data.Code);
	$("#sdec_name").val(sdec_data.Name);
	$("#sdec_worktime").val(sdec_data.WorkTime);

	/*получить цену d*/
	$(".sdec_address").html(sdec_data.City+", "+sdec_data.Name+"<br>"+sdec_data.Address);

	$.ajax({ 
		type: "POST", 
		url: "cart/get_cost_sdec",
		dataType: 'text',
		data: {
			idcity : sdec_data.CityCode
		},
		success: function(data){						
            if (data!=false){
                var result = JSON.parse(data);
                console.log(result);

                $(".sdec_cost").text(result.price+"p");
                $("#sdec").attr("data-delivery", result.price);
                $(".delivery_cost").attr("data-delivery", result.price);
                $("#sdec_cost").val(result.price);

                $(".select_sdec").addClass("active");

                var start_date = new Date(Date.parse(result.deliveryDateMax));
                console.log(start_date);
                $(".select_sdec").html("с "+start_date.getDate()+"<br>"+start_date.getMonthName());

                var russiaDate =  new Date(Date.parse(result.deliveryDateMax));

                russiaDate.setDate(russiaDate.getDate() + date_sdec_max);

                $("#calendar_sdec").datepicker('option', 
                                               {
                    minDate: start_date,
                    maxDate: russiaDate
                }
                                              );
                reset_cost_total();					
            }				
		},
		fail: function(data){}
	});
	/*получаем цену, и даты*/
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
    }, {});
    myMap.controls.add(
   		new ymaps.control.ZoomControl()
	);
    get_city_list_sdec();
}

function ucfirst(str) 
{
    var first = str.charAt(0).toUpperCase();
    return first + str.substr(1);
}