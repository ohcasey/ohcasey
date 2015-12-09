var current_city_id;
var sdecPointsMap;
var showRoomMap;
var ymap_requested = false;
var sdec_points;

$(document).ready(function(){
	//$('select').selectpicker(); //хз что это
    $(".loader_spin").hide();
    //$("div.delivery-description").hide();
    $(".city-input").show();
    show_zaglushki();

    
});


Date.prototype.getMonthName = function() {
    var month = ['января','февраля','марта','апреля','мая','июня',
    'июля','августа','сентября','октября','ноября','декабря'];
    return month[this.getMonth()];
}

/* Когда выбрали город вверху формы, показываем доступные способы доставки и оплаты */

$(document).ready(function(){
    
     if($("input.city-input").val()!=""&&$("input.city-input").val()!=null){         
         displayAvailableDelivery();
     }
});

$(document).on('keydown', 'input.city-input', function(){
    if(event.keyCode == 13 || event.keyCode == 9){
        displayAvailableDelivery();  
    }
});
$(document).on('click', 'div.suggestion-element' , function(){
    $(".city-input").val($(this).text());
    displayAvailableDelivery();
});
$(document).on('focusout', 'input.city-input', function(){
    displayAvailableDelivery();
});
/*--------------------------------------------------------------------------------------------------*/

function displayAvailableDelivery(){
    
    var city_name = $('input.city-input').val();
    console.log("введен город "+city_name);
    if (city_name == 'Москва' || city_name == 'москва'){
        $('input.city-input').removeClass('error');
        removeSuggestionElements();
        show_delivery_methods_for_Moscow();
        
    }
    else{
        console.log ("будем проверять город");
        //Проверить правильность введенного города 
        $.ajax({ 
            type: "POST", 
            url: "/cart/get_city",
            dataType: 'text',
            data: {
                string : city_name
            },
            success: function(data){	
                var result = JSON.parse(data);
                for (var iter = 0; iter<result.length; iter++){
                    var city_exists = false;
                    if(result[iter].name == city_name){
                        city_exists = true;
                    }
                }
                
                if(city_exists){
                    $('input.city-input').removeClass('error');
                    removeSuggestionElements();
                    show_delivery_methods_for_not_Moscow();
                }
                else{
                    $('input.city-input').addClass('error');
                    show_zaglushki();
                }
            },
            fail: function(data){
                console.log("ERROR: AJAX request to check city exists FAILED");
            } 
        });   
    }
}



$(document).on('input','.city-input', function(){
  
    if ($(this).val().length<3){
        return;
    }
    
	$(".select-city__main-input__sdec").val($(this).val());

	$(".suggestion-list").find("span").remove();
	$.ajax({ 
		type: "POST", 
		url: "/cart/get_city",
		dataType: 'text',
		data: {
			string : $(".city-input").val()
		},
		success: function(data){		
            if (data!=false){
				var result = JSON.parse(data);
				console.log(result);
                $('div.suggestion-element').remove();
				for (var i = 0; i < result.length; i++) {
   					 $(".suggestions-list").append("<div class='suggestion-element'><span class='city-suggestion'>"+result[i][0]+"</span></div>");
				}
			}				
		},
		fail: function(data){
					
	    }
	});
});


function GetCostAndDateUsingSDEKGeoNameID(params) {
    
    $.ajax({ 
        type: "POST", 
        url: "/cart/get_cost_sdec",
        dataType: 'text',
        data: {
            idcity : params["city_id"],
            kur: true
        },
        success: function(data){			
            console.log(data);
            if (data!=false){
                var result = JSON.parse(data);
                
                if(result["error"]){
                    hideSdecCourierDeliveryOption();
                    console.log("Нет доставки CDEK в выбранный город");

                }
                else{
                    setSdecPriceAndTimeToTheDivs(result);
                }                
            }
            else{
                console.log("AJAX request to SDEC API returned an empty array\n");
                return false;
            }
        },
        fail: function(data){
            console.log("AJAX request to SDEC API failed\n");
            return false;
        }
    });
}


//TODO: Решить что делать, когда 2 города с абсолютно одинаковыми названиями
//Посмотреть в документации как конкретизировать регион
function GetSDEKCourierDeliveryCostAndDate(city_name){
    
    var req = $.ajax({
        url : "http://api.cdek.ru/city/getListByTerm/jsonp.php?callback=?",
        dataType : "jsonp",
        data : {
            q : function(){
                return city_name;
            },
            name_startsWith : function(){
                return city_name;
            }
        },
        success : function(data) {      
                        
            if (data.geonames == null || data.geonames == undefined){
                hideSdecCourierDeliveryOption();
            }
            else{
                if (data.geonames.length == 0){
                    hideSdecCourierDeliveryOption();
                }
                else{
                    for (var i = 0; i<data.geonames.length; i++) {
			            if (data.geonames[i].cityName.toLowerCase() == city_name.toLowerCase()) {
                            GetCostAndDateUsingSDEKGeoNameID({"city_id": data.geonames[i].id});
                            getPointsSdec(data.geonames[i].id);
                            break;
                        }
                    } 
                }
            }       
        },
        fail: function(data){
            console.log("AJAX request to SDEC API failed\n");
            hideSdecCourierDeliveryOption();
        }        
    });
        
}

/*
var sdecPointsMap;
var showRoomMap;

// Дождёмся загрузки API и готовности DOM.
ymaps.ready(init);
*/
function init () {
    // Создание экземпляра карты и его привязка к контейнеру с
    // заданным id ("map").
    sdecPointsMap = new ymaps.Map('map', {
        // При инициализации карты обязательно нужно указать
        // её центр и коэффициент масштабирования.
        center: [55.76, 37.64], // Москва
        zoom: 10,
    }, {});
    sdecPointsMap.controls.add(
   		new ymaps.control.ZoomControl()
	);
    
    var showroom_coord_x = 55.739275;
    var showroom_coord_y = 37.661221;
    
    showRoomMap = new ymaps.Map('map-showroom',
        {
            center: [showroom_coord_x, showroom_coord_y],
            zoom: 17
        },
        {}
    );
    
    
    var adress = 'Москва, м. Таганская ул. Таганская д. 24 стр. 1';
    var worktime = "С 10:00 до 22:00";
    var phone = "8 (800) 555 35 35";
    
    var showroom_info = "<table><tbody>";
    showroom_info+="<tr><td>Адрес</td><td>"+adress+"</td></tr>";
    showroom_info+="<tr><td>Время работы</td><td>"+worktime+"</td></tr>";
    showroom_info+="<tr><td>Телефон</td><td>"+phone+"</td></tr>";
    showroom_info+="</tbody></table>";
    
    var showroom = new ymaps.Placemark(
        [showroom_coord_x, showroom_coord_y],
        {
            balloonContentHeader: "Шоурум OhCasey",
            balloonContent: showroom_info
        }
    );
    showRoomMap.geoObjects.add(showroom);
    console.log("убираем спин с карты шоурума");
}


function getPointsSdec(idcity) {
    $.ajax({
        type: "POST",
        data: {
            "idcity": idcity
        },
        url: "/cart/get_city_sdec",
        success: function(data){
            if (data == "PVZ_NOT_FOUND") {
                console.log("В этом городе нет пунктов самовывоза");
                hideSdecPointsDeliveryOption();
            }
            else {
                sdec_points = "";
                sdec_points=JSON.parse(data);
                $('.sdec-point-list .spin').hide();
                
                if (sdec_points.length < 1){
                    $('div.sdec-point-list').val('В выбранном населенном пункте нет пунктов самовывоза');
                    $('.map-row').hide();
                    console.log("В выбранном городе нет пунктов самовывоза");
                    hideSdecPointsDeliveryOption();
                }
                else {
                    console.log("SDEC POINTS!!!");
                    console.log(sdec_points);
                    $("div.sdec-point").show();
                    $('div.sdec-point-list ul').empty();
                    if (sdec_points.length>1) {
                        for (var i = 0; i < sdec_points.length; i++) {
                            $('div.sdec-point-list ul').append('<li><b>'+ucfirst(sdec_points[i]["@attributes"]["Name"].toLowerCase())+"</b> - "+ucfirst(sdec_points[i]["@attributes"]["Address"].toLowerCase())+'</li>');                
                        }
                    }
                    else{
                        $('div.sdec-point-list ul').append('<li><b>'+ucfirst(sdec_points["@attributes"]["Name"].toLowerCase())+"</b> - "+ucfirst(sdec_points["@attributes"]["Address"].toLowerCase())+'</li>');
                     }

                    ymaps.ready(function () {
                        myGeoObjects = [];
                        sdecPointsMap.geoObjects.removeAll();
                        console.log("карта готова. убираем spin с карты сдэк");

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
                            sdecPointsMap.geoObjects.add(clusterer);
                            sdecPointsMap.setBounds(clusterer.getBounds());
                            
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

                            var object =  new ymaps.Placemark(
                                    [sdec_points["@attributes"]["coordY"], sdec_points["@attributes"]["coordX"]], {
                                         balloonContentHeader: sdec_points["@attributes"]["Name"],
                                         balloonContent: table
                                    }
                                );
                            sdecPointsMap.setCenter([sdec_points["@attributes"]["coordY"], sdec_points["@attributes"]["coordX"]]);
                            sdecPointsMap.geoObjects.add(object);   
                        }
                    });
                }
            }
            

   
        }
    });
}

function show_delivery_methods_for_Moscow(){
    $(".zaglushki").hide();
    $(".not-moscow").hide();
    $(".moscow").show();
    $(".delivery-method").removeClass("active");
    $(".moscow .delivery-method:first").addClass("active");
    $("div.delivery-description").hide();
    $("div.delivery-description[delivery-description-to="+$(".moscow .delivery-method:first").attr("delivery-name")+"]").show();
    
    $('div.map-row').hide();
    $('div.sdec-point-list').hide();
    $("div.map-row-showroom").hide();
    
    GetSDEKCourierDeliveryCostAndDate($("input.city-input").val());
    
    add_yndex_map();
     
    if($(".moscow .delivery-method:first").attr("delivery-name")=="sdec-point"){
        $("div.map-row").show();
        $('div.sdec-point-list').show();
  
    }
    
    if($(".moscow .delivery-method:first").attr("delivery-name")=="showroom"){
        $("div.map-row-showroom").show();
    }
    
}


// TODO
// Проверить работоспособность отрисовки доставки курьером СДЭК
// Доделать отрисовку цены, даты и списка пунктов выдачи для самовывоза из пункта СДЭК
// 
function show_delivery_methods_for_not_Moscow(){
    $(".zaglushki").hide();
    $(".moscow").hide();
    $(".not-moscow").show();
    $(".delivery-method").removeClass("active");
    $(".not-moscow .delivery-method:first").addClass("active");
    $("div.delivery-description").hide();
    $("div.delivery-description[delivery-description-to="+$(".not-moscow .delivery-method:first").attr("delivery-name")+"]").show();
    
    $('div.map-row').hide();
    $('div.sdec-point-list').hide();
    $("div.map-row-showroom").hide();
    
    if($(".not-moscow .delivery-method:first").attr("delivery-name")=="sdec-point"){
        $("div.map-row").show();
        $('div.sdec-point-list').show();
        add_yndex_map();
    }
    
    GetSDEKCourierDeliveryCostAndDate($("input.city-input").val());
    
    
}

function add_yndex_map(){
    // Скачиваем файл js яндекс-карт
    // Дождёмся загрузки API и готовности DOM.
    if (ymap_requested == false) {
        ymap_requested = true;
        console.log("скачиваем js яндекс-карт");
        $.getScript( "//api-maps.yandex.ru/2.1/?lang=ru_RU", function( data, textStatus, jqxhr ) {
            console.log( data ); // Data returned
            console.log( textStatus ); // Success
            console.log( jqxhr.status ); // 200
            console.log( "Load was performed." );
            // после того как яндекс-карты скачали себя, добавляем в верстку 2 карты (шоурума с точкой шоурума и пустую карту москвы для точек СДЭК)
            ymaps.ready(init);
        });
    }
}

function show_zaglushki(){
    $(".moscow").hide();
    $(".not-moscow").hide();
    $(".zaglushki").show();
    $('div.map-row').hide();
    $("div.map-row-showroom").hide();
    $('div.sdec-point-list').hide();
    $("div.delivery-description").hide();
    $('div.delivery-description[delivery-description-to="zaglushki-description"]').show();

}

function setSdecPriceAndTimeToTheDivs(sdec_delivery_data){
    $("div.courier_sdec").show();
    $("div.courier_sdec span.cost").text(sdec_delivery_data.price+" p.");
        
    var date_start = new Date(Date.parse(sdec_delivery_data.deliveryDateMax));
        
    $("div.courier_sdec span.text").html("<span class='glyphicon glyphicon-time'></span> с <strong>"+date_start.getDate()+"</strong> "+date_start.getMonthName());
}

function hideSdecCourierDeliveryOption(){
    $("div.courier_sdec").hide();
}
function hideSdecPointsDeliveryOption(){
    $("div.sdec-point").hide();
    $(".sdec-point-list").hide();
    $(".map-row").hide();
}

function removeSuggestionElements(){
    $("div.suggestion-element").remove();
}

function changeActiveMethod(available_methods){

    console.log("самовывоз сдэк: "+available_methods['sdec-points']+"; доставка СДЭК: "+available_methods['courier_sdec']+"; почта россии"+available_methods['russian-post']);
}

$(".delivery-method").on("click", function(){
    $(".delivery-method").removeClass("active");
    $(this).addClass("active");
    $("div.delivery-description").hide();
    $("div.delivery-description[delivery-description-to="+$(this).attr("delivery-name")+"]").show();
    
    $('div.map-row').hide();
    $('div.sdec-point-list').hide();
    $("div.map-row-showroom").hide();
    
    if($(this).attr("delivery-name")=="sdec-point"){
        $('div.map-row').show();
        $('div.sdec-point-list').show();
    }
    if($(this).attr('delivery-name')=="showroom"){
        $("div.map-row-showroom").show();
    }
});


function dump(obj) {
    var out = "";
    if(obj && typeof(obj) == "object"){
        for (var i in obj) {
            out += i + ": " + obj[i] + "\n";
        }
    } else {
        out = obj;
    }
    console.log(out);
}

function ucfirst(str) 
{
    var first = str.charAt(0).toUpperCase();
    return first + str.substr(1);
}