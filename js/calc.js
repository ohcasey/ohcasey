
$('div.title-close-button').on('click', function(){
    $('div.calculator-main').hide();
});

$(document).on('input','input.city-input', function(){
  
    if ($(this).val().length<3){
        return;
    }
    
	//get_kur_cost(false);

	//$(".result_city").find("span").remove();
    
	$.ajax({ 
		type: "POST", 
		url: "cart/get_city",
		dataType: 'text',
		data: {
			string : $("input.city-input").val()
		},
		success: function(data){		
            if (data!=false){
				var result = JSON.parse(data);
				console.log(result);
                $('div.suggestion-element').remove();
				for (var i = 0; i < result.length; i++) {
   					 $("div.suggest-city-list").append("<div class='suggestion-element'><span class='city-suggestion'>"+result[i][0]+"</span></div>");
				}
			}				
		},
		fail: function(data){
		    console.log("AJAX REQUEST FAILED");			
	    }
	});
});


$('div.delivery-method-row > div.col').on('click', function(){
    $('div.delivery-method-row > div.col').removeClass('active');
    $(this).addClass('active');
    
    //Отобразить соответствующий текст
});


$(document).on('click', 'div.suggestion-element' , function(){
    $("input.city-input").val($(this).text());
    $("div.suggest-city-list").find("div.suggestion-element").remove();
    // Отобразить способы доставки
});
