//fgnass.github.com/spin.js#v2.0.1
!function(a,b){"object"==typeof exports?module.exports=b():"function"==typeof define&&define.amd?define(b):a.Spinner=b()}(this,function(){"use strict";function a(a,b){var c,d=document.createElement(a||"div");for(c in b)d[c]=b[c];return d}function b(a){for(var b=1,c=arguments.length;c>b;b++)a.appendChild(arguments[b]);return a}function c(a,b,c,d){var e=["opacity",b,~~(100*a),c,d].join("-"),f=.01+c/d*100,g=Math.max(1-(1-a)/b*(100-f),a),h=j.substring(0,j.indexOf("Animation")).toLowerCase(),i=h&&"-"+h+"-"||"";return l[e]||(m.insertRule("@"+i+"keyframes "+e+"{0%{opacity:"+g+"}"+f+"%{opacity:"+a+"}"+(f+.01)+"%{opacity:1}"+(f+b)%100+"%{opacity:"+a+"}100%{opacity:"+g+"}}",m.cssRules.length),l[e]=1),e}function d(a,b){var c,d,e=a.style;for(b=b.charAt(0).toUpperCase()+b.slice(1),d=0;d<k.length;d++)if(c=k[d]+b,void 0!==e[c])return c;return void 0!==e[b]?b:void 0}function e(a,b){for(var c in b)a.style[d(a,c)||c]=b[c];return a}function f(a){for(var b=1;b<arguments.length;b++){var c=arguments[b];for(var d in c)void 0===a[d]&&(a[d]=c[d])}return a}function g(a,b){return"string"==typeof a?a:a[b%a.length]}function h(a){this.opts=f(a||{},h.defaults,n)}function i(){function c(b,c){return a("<"+b+' xmlns="urn:schemas-microsoft.com:vml" class="spin-vml">',c)}m.addRule(".spin-vml","behavior:url(#default#VML)"),h.prototype.lines=function(a,d){function f(){return e(c("group",{coordsize:k+" "+k,coordorigin:-j+" "+-j}),{width:k,height:k})}function h(a,h,i){b(m,b(e(f(),{rotation:360/d.lines*a+"deg",left:~~h}),b(e(c("roundrect",{arcsize:d.corners}),{width:j,height:d.width,left:d.radius,top:-d.width>>1,filter:i}),c("fill",{color:g(d.color,a),opacity:d.opacity}),c("stroke",{opacity:0}))))}var i,j=d.length+d.width,k=2*j,l=2*-(d.width+d.length)+"px",m=e(f(),{position:"absolute",top:l,left:l});if(d.shadow)for(i=1;i<=d.lines;i++)h(i,-2,"progid:DXImageTransform.Microsoft.Blur(pixelradius=2,makeshadow=1,shadowopacity=.3)");for(i=1;i<=d.lines;i++)h(i);return b(a,m)},h.prototype.opacity=function(a,b,c,d){var e=a.firstChild;d=d.shadow&&d.lines||0,e&&b+d<e.childNodes.length&&(e=e.childNodes[b+d],e=e&&e.firstChild,e=e&&e.firstChild,e&&(e.opacity=c))}}var j,k=["webkit","Moz","ms","O"],l={},m=function(){var c=a("style",{type:"text/css"});return b(document.getElementsByTagName("head")[0],c),c.sheet||c.styleSheet}(),n={lines:12,length:7,width:5,radius:10,rotate:0,corners:1,color:"#000",direction:1,speed:1,trail:100,opacity:.25,fps:20,zIndex:2e9,className:"spinner",top:"50%",left:"50%",position:"absolute"};h.defaults={},f(h.prototype,{spin:function(b){this.stop();{var c=this,d=c.opts,f=c.el=e(a(0,{className:d.className}),{position:d.position,width:0,zIndex:d.zIndex});d.radius+d.length+d.width}if(e(f,{left:d.left,top:d.top}),b&&b.insertBefore(f,b.firstChild||null),f.setAttribute("role","progressbar"),c.lines(f,c.opts),!j){var g,h=0,i=(d.lines-1)*(1-d.direction)/2,k=d.fps,l=k/d.speed,m=(1-d.opacity)/(l*d.trail/100),n=l/d.lines;!function o(){h++;for(var a=0;a<d.lines;a++)g=Math.max(1-(h+(d.lines-a)*n)%l*m,d.opacity),c.opacity(f,a*d.direction+i,g,d);c.timeout=c.el&&setTimeout(o,~~(1e3/k))}()}return c},stop:function(){var a=this.el;return a&&(clearTimeout(this.timeout),a.parentNode&&a.parentNode.removeChild(a),this.el=void 0),this},lines:function(d,f){function h(b,c){return e(a(),{position:"absolute",width:f.length+f.width+"px",height:f.width+"px",background:b,boxShadow:c,transformOrigin:"left",transform:"rotate("+~~(360/f.lines*k+f.rotate)+"deg) translate("+f.radius+"px,0)",borderRadius:(f.corners*f.width>>1)+"px"})}for(var i,k=0,l=(f.lines-1)*(1-f.direction)/2;k<f.lines;k++)i=e(a(),{position:"absolute",top:1+~(f.width/2)+"px",transform:f.hwaccel?"translate3d(0,0,0)":"",opacity:f.opacity,animation:j&&c(f.opacity,f.trail,l+k*f.direction,f.lines)+" "+1/f.speed+"s linear infinite"}),f.shadow&&b(i,e(h("#000","0 0 4px #000"),{top:"2px"})),b(d,b(i,h(g(f.color,k),"0 0 1px rgba(0,0,0,.1)")));return d},opacity:function(a,b,c){b<a.childNodes.length&&(a.childNodes[b].style.opacity=c)}});var o=e(a("group"),{behavior:"url(#default#VML)"});return!d(o,"transform")&&o.adj?i():j=d(o,"animation"),h});




//превью
var opts = {
  lines: 13, // The number of lines to draw
  length: 20, // The length of each line
  width: 10, // The line thickness
  radius: 30, // The radius of the inner circle
  corners: 1, // Corner roundness (0..1)
  rotate: 0, // The rotation offset
  direction: 1, // 1: clockwise, -1: counterclockwise
  color: '#EA281F', // #rgb or #rrggbb or array of colors
  speed: 1, // Rounds per second
  trail: 60, // Afterglow percentage
  shadow: false, // Whether to render a shadow
  hwaccel: false, // Whether to use hardware acceleration
  className: 'spinner', // The CSS class to assign to the spinner
  zIndex: 2e9, // The z-index (defaults to 2000000000)
  top: '45%', // Top position relative to parent
  left: '50%' // Left position relative to parent
};

function preparing_html() {
	var html_width = $("body").width();
	var html_height = $(document).height();
	$(".main_container").css("height", html_height+"px");
	$(".main_container").css("width", html_width+"px");
	$(".header_menu__item").css({"width": ((html_width - $("#header-logo").width() - 20*5)/6) +"px", "visibility": "visible"});
	
	to_down_of_page();


	var count = $(".cart_item_block").length;

	if (((count>2) && (html_width<1200))||((count>1) && (html_width>=1200))) {
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

		$(".cart_item_block").remove();
		reset_cost_total();

		$("body").after('<div id = "foo"></div>');

		var target = document.getElementById('foo');
		var spinner = new Spinner(opts).spin(target);

		document.order_form.submit();


		/*
		$.ajax({
		  type: "POST",
		  dataType: "json",
		  url: "cart/confirm_order",
		  data: {
		  	fio : $(".fio").val(),
		  	email : $(".email").val(),
		  	phone : $(".phone").val(),
		  	city : $(".city").val(),
		  	adress : $(".adress").val(),
		  	comments : $(".comments").val(),
		  	deliver: $('input[name="deliver"]:checked').attr("id"),
		  	payment : $('input[name="payment"]:checked').attr("id")
		  },
		  success: function(data){
		  	sweetAlert("Успешно", data, "success");
		  },
		  fail: function(data){
		  	sweetAlert("Ошибка", data, "error");
		  }
	  	});

	*/
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

