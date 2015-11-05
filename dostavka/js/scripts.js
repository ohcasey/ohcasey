$(document).ready(function(){
	$('select').selectpicker();
});





/* Когда выбрали город вверху формы, показываем доступные способы доставки и оплаты */

$(document).ready(function(){
     show_zaglushki();
     if($("input.city-input").val()!=""&&$("input.city-input").val()!=null){
         //set_city_value_to_sdec_window();
         
         displayAvailableDelivery();
     }
});

$(document).on('keydown', 'input.city-input', function(){
    //alert('KEYDOWN EVENT');
    if(event.keyCode == 13 || event.keyCode == 9){
        $(".suggestions-list").find("span").remove();
        //set_city_value_to_sdec_window();
        displayAvailableDelivery();   
    }
});
$(document).on('click', 'div.suggestion-element' , function(){
    //alert("CLICK SUGGESTION EVENT");
    $(".city-input").val($(this).text());
    $(".suggestions-list").find("span").remove();
    //set_city_value_to_sdec_window();
    displayAvailableDelivery();
});
$(document).on('focusout', 'input.city-input', function(){
    //alert('FOCUS OUT EVENT');
    //set_city_value_to_sdec_window();
    displayAvailableDelivery();
});
/*--------------------------------------------------------------------------------------------------*/

function displayAvailableDelivery(){
    
    var city_name = $('input.city-input').val();
    
    if (city_name == 'Москва' || city_name == 'москва'){
        $('input.city-input').removeClass('error');
        show_delivery_methods_for_Moscow();
    }
    else{
        //Проверить правильность введенного города 
        $.ajax({ 
            type: "POST", 
            url: "cart/get_city",
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
                
                
                alert("Ave!!!" + city_exists);
                
                if(city_exists){
                    $('input.city-input').removeClass('error');
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
	//get_kur_cost(false);

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


function show_delivery_methods_for_Moscow(){
    $(".zaglushki").hide();
    $(".not-moscow").hide();
    $(".moscow").show();
}

function show_delivery_methods_for_not_Moscow(){
    $(".zaglushki").hide();
    $(".moscow").hide();
    $(".not-moscow").show();
}

function show_zaglushki(){
    $(".moscow").hide();
    $(".not-moscow").hide();
    $(".zaglushki").show();
}
