var current_city_id;

$(document).ready(function(){
	$('select').selectpicker();
});


Date.prototype.getMonthName = function() {
    var month = ['января','февраля','марта','апреля','мая','июня',
    'июля','августа','сентября','октября','ноября','декабря'];
    return month[this.getMonth()];
}

/* Когда выбрали город вверху формы, показываем доступные способы доставки и оплаты */

$(document).ready(function(){
    $("div.delivery-description").hide();
     show_zaglushki();
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
    
    if (city_name == 'Москва' || city_name == 'москва'){
        $('input.city-input').removeClass('error');
        removeSuggestionElements();
        show_delivery_methods_for_Moscow();
        
    }
    else{
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


//Функция, получающая список пунктов самовывоза в городе
//

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
    //get_city_list_sdec();
}


function getPointsSdec(idcity) {
    $.ajax({
        type: "POST",
        data: {
            "idcity": idcity
        },
        url: "/cart/get_city_sdec",
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



function show_delivery_methods_for_Moscow(){
    $(".zaglushki").hide();
    $(".not-moscow").hide();
    $(".moscow").show();
    $(".delivery-method").removeClass("active");
    $(".moscow .delivery-method:first").addClass("active");
    $("div.delivery-description").hide();
    $("div.delivery-description[delivery-description-to="+$(".moscow .delivery-method:first").attr("delivery-name")+"]").show();
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
    
    GetSDEKCourierDeliveryCostAndDate($("input.city-input").val());
    
    //getPointsSdec(current_city_id);
    //Возвращаем из GetPointSdec массив пунктов свамовывоза и на его основе формируем таблицу
    
}

function show_zaglushki(){
    $(".moscow").hide();
    $(".not-moscow").hide();
    $(".zaglushki").show();
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

function removeSuggestionElements(){
    $("div.suggestion-element").remove();
}

$(".delivery-method").on("click", function(){
    $(".delivery-method").removeClass("active");
    $(this).addClass("active");
    $("div.delivery-description").hide();
    $("div.delivery-description[delivery-description-to="+$(this).attr("delivery-name")+"]").show();
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