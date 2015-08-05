//some css checkers 
var scale_coof = 7;
var baseurl = window.location.host+window.location.pathname;
var device_width_svg;
var device_height_svg;
var text_error =0;


function preparing_html() {
	var html_width = $("body").width();
	var html_height = $(document).height();
	$(".header_menu__item").css({"width": ((html_width - $("#header-logo").width() - 20*5)/6) +"px", "visibility": "visible"});
	$(".main_container").css("height", html_height+"px");
	$(".main_container").css("width", html_width+"px");
	to_down_of_page();
	
	if ($(window).height()<650) {
		$("#center_in").css({
			"top": "0px",
			"margin-top": "45px"
		});
	}else{
		$("#center_in").css({
			"top": "50%",
			"margin-top": "-240px"
		});
	}
}

$(window).resize(function(){
	preparing_html();
	to_down_of_page();
});
$(window).scroll(function(){
	to_down_of_page();
})

preparing_html();


var canvas, devices_desctop_img_obj, desctop_text, devices_desctop_bg_obj;

var default_devices_id="";

//var this_object = randomHash(10);


var newx, prevx;
var newy, prevy;

current_smile = "";

//d3 global
var g_texts , g_smiles, svg, svg_mask_container, svg_device, svg_material_body, svg_background, svg_text, svg_smiles ,svg_mask_body,  svg_camera, svg_text_svg, svg_second_svg;


/*FROM DIMA*/
var result_url; //Result link to picture
var back_canvas; //Back of phone


var text_width_constant=10;
var text_height_constant=10;

var desctop = {

		image_size_width: "",
		image_size_height: "",

		device_id: "",
		material_id: "",
		text: "",
		font_pattern_id: "",
		lib_img: "",
		/*new*/

		device_name: "",
		device_color: "",


		case_id: "",
		name_case_1:"",
		name_case_2:"",

		bg_case: "",

		font_size: "",
		font_color: "",
		font_family: "",
		font_pattern: "",

		font_x: "",
		font_y: "",
		font_width: "",
		font_height: "",

		font_rotate: "",

		preview_url:"",
		
		smiles: {

		}
};


var steps = [];
var cur_step=1;

var config = {}; //Return config

$(document).on('click','#gallery_but', function(event){
	var path = config["inspire_path"];
	$(".overlay-inspire").addClass("active");
	if (($("#pict1").prop("src") != "") || ($("#pict1").prop("src") !=(path+config["inspire"]["pict1"])) || ($("#pict1").prop("src") == null) || ($("#pict1").prop("src") == undefined) || ($("#pict1").prop("src") == window.location.href)) {
		
		 
	for (var i = 1; i <= Object.keys(config["inspire"]).length; i++) {
		$("#pict"+i).prop("src",path+config["inspire"]["pict"+i] );
		
	};

	}
});

$(document).on('click','.back_block', function(event){
	$(".overlay-inspire").removeClass("active");
});



$(document).on("click", "#steps_controller-checkout_but" , function(){

	if ($(this).hasClass("active")) {
		$(".alert_save").addClass("active");
	}
});

$(document).on("click", ".no_write" , function(){
		$(".alert_write").removeClass("active");
});



$(document).on("keydown", ".input_write" , function(event){
	if (event.keyCode==13) {
		$(".ok_write").click();
	}

});

$(document).on("click", ".ok_write" , function(){
	$(".alert_write").removeClass("active");
	svg_text.select("text")
		.text($(".input_write").val());
	var text_width = $(".svg_text text").width()+text_width_constant;
	var text_height = $(".svg_text text").height()+text_height_constant;
	desctop.text = $(".input_write").val();
	restart_depend();
});




$(document).on("click",".yes_save", function(){
	$(".alert_block").removeClass("active");
	save_image();
});

$(document).on("click",".no_button", function(){
	$(".alert_block").removeClass("active");
});

$(document).on("click",".yes_device", function(){
	$(".alert_block").removeClass("active");
	$(".svg_device").css("display","block");
	remove_setting(); 
	set_step($("#header-menu-item-1"), 1);
});

$(document).on("click","#change_color_but", function(){
	click_text();
});

$(document).on("click", ".library-color_row" , function(){
	set_font_color($(this).data('color_id'),$(this).data('color'));
});

$(document).on("click", "#steps_controller-next_but" , function(){
	if ($(this).hasClass("active")) {
		var id = parseInt($(".header-menu-selected").attr("data-menu-id"))+1;
		change_step($("#header-menu-item-"+id));	
	}
	
});


$(document).on("click", ".library-device_row" , function(){
	set_device($(this).data('deviceId'));
	change_step($("#header-menu-item-2"));
});

$(document).on("click", ".chech_colors div" , function(){
	set_material_color($(this).data('material_id'), $(this).data('material_color'),$(this).data('cost'));
});


$(document).on("click", ".library-background_row" , function() {
	set_bg($(this).data('bgId'));
});



$(document).on("click", ".library-pattern_row" , function(){
	set_font_pattern($(this).data('fontPatternId'));
});

$(document).on("click", ".library-case_row" , function(){
	set_material($(this).data('materialId'));
});

$(document).on("click", "#right-6 .library_tab_but" , function(){
		var id = $(this).data('tabId');
		$('#right-6 .library_tab_but').removeClass('library_tab_but-selected');
		$(this).addClass('library_tab_but-selected');
		$('.library-smiles').hide();
		$('#library_smiles-' + id).show();
});


$(document).on("click", ".library-smile_row" , function() {
		set_smile($(this).attr('data-smile-id'));
});


$(document).on("click", ".library-font_row" , function(){
		set_font($(this).data('fontId'));
});

$(document).on("click", "#right-5 .library_tab_but" , function(){
		var id = $(this).data('tabId');
		$('#right-5 .library_tab_but').removeClass('library_tab_but-selected');
		$(this).addClass('library_tab_but-selected');
		$('.library-backgrouds').hide();
		$('#library_backgrouds-' + id).show();
});

$(document).on("click", ".icon-close" , function(){
	svg_background.selectAll("image").remove();
	desctop.bg_case = "";
	$(".library-background_row").removeClass("library-background_row-selected");
	$(".icon-close").css("display","none");
});



$(document).ready(function() {
	preparing_html();
	preparing_data();

	
	$('.library, .library_2, .library_3, .library_4, .library_5, .library_6').perfectScrollbar({wheelSpeed: 30, wheelPropagation: false, minScrollbarLength: 1});

	$('#header-menu li.header_menu__item').on("click", function() {
		change_step($(this));
	});

	$('.icon-question').on("click", function() {

		var id = $(this).data('answerId');
	
		if ($('#answer_block-' + id).css('display') == 'block') {

			$('#answer_block-' + id).hide();

		} else {
			$('#answer_block-' + id).show();
		}
	});

});

var object_id;
function preparing_data(){

	

	$.ajax({
	  type: "POST",
	  dataType: "json",
	  url: "main/get_data",
	  success: function(data){
	  	config=data;
		prepare_devices();
	  }
  	});



  
	
	//svg_generation
	
	svg = d3.select(".center_device_svg");

	svg_controls_svg = d3.select(".controls_device_svg");


	svg_text_svg = d3.select(".svg_text_svg");


	svg_second_svg = d3.select(".svg_second_svg");




	svg_mask_container = svg_second_svg.append("defs")
							.classed("svg_mask_container", true);


	svg_fonts_container = svg_text_svg.append("defs")
							.classed("svg_fonts_container", true);

	
	
	svg_device = svg.append("g")
			.classed("svg_device", true);
	svg_material_body = svg.append("g")
			.classed("svg_material_body", true);

	svg_background = svg.append("g")
			.classed("svg_background", true);

	svg_text = svg_text_svg.append("g")
			.classed("svg_text", true);
	svg_smiles = svg_second_svg.append("g")
			.classed("svg_smiles", true);
	svg_mask_body = svg_second_svg.append("g")
			.classed("svg_mask_body", true);
	svg_camera = svg_second_svg.append("g")
			.classed("svg_camera", true);


	svg_controls  = svg_controls_svg .append("g")
			.classed("svg_controls", true);

	
	g_texts = svg_controls
				.append("g")
					.classed("g_texts", true);

	g_smiles = svg_controls
				.append("g")
					.classed("g_smiles", true);

	
	
	steps.push(cur_step);
	object_id = randomHash(10);
	
}

function setup_patterns() {
	
	for(value in config.paterns) {	
			var small = config.patterns_path_small+config.paterns[value].small;
			var big = config.patterns_path_big+config.paterns[value].big;
	
			if (value == 0) {
				var html_text="";
				 html_text+='<div class="library-pattern_row library-pattern_row-first" style="background: url('+small+');" data-url="'+big+'" data-font-pattern-id="'+value+'" id="library-pattern_row-'+value+'"></div>';
			}else{
				if(((value) % 5) == 0) {
				
					html_text="";
					html_text+='<div class="library-pattern_row library-pattern_row-first" style="background: url('+small+');" data-url="'+big+'" data-font-pattern-id="'+value+'" id="library-pattern_row-'+value+'"></div>';
				}else{
					if(((value) % 5) == 4) {
					
						html_text="";
						html_text+='<div class="library-pattern_row library-pattern_row-last" style="background: url('+small+');" data-url="'+big+'" data-font-pattern-id="'+value+'" id="library-pattern_row-'+value+'"></div>';
					}else{
					
						html_text="";
						html_text+='<div class="library-pattern_row " style="background: url('+small+');" data-url="'+big+'" data-font-pattern-id="'+value+'" id="library-pattern_row-'+value+'"></div>';
					}
					
				}
			}
		$(".library_pattern").append(html_text);
	}
	$('.library, .library_2, .library_3, .library_4, .library_5, .library_6').perfectScrollbar({wheelSpeed: 30, wheelPropagation: false, minScrollbarLength: 1});	
}


function setup_font() {
		
	var path = config.desctop_font_path;
	for (value in config.fonts) {
		var html_text = "";
		if (config.fonts[value].default == true){               
			desctop.font_family = config.fonts[value].name;
		
			html_text+='<div class="library-font_row library-font_row-selected"  data-font_url = "'+config.fonts[value].filename+'" data-font="'+config.fonts[value].name+'" style="font-family: '+config.fonts[value].name+';" data-font-id="'+value+'" id="library-font_row-'+value+'">'+config.fonts[value].name+'</div>';
		}else{
			html_text+='<div class="library-font_row"  data-font_url = "'+config.fonts[value].filename+'" data-font="'+config.fonts[value].name+'" style="font-family: '+config.fonts[value].name+';" data-font-id="'+value+'" id="library-font_row-'+value+'">'+config.fonts[value].name+'</div>';
		}
	
		$(".library_font").append(html_text);


			/*	 <font-face font-family="Waltograph">
							  <font-face-src>
								<font-face-url></font-face-url>
							  </font-face-src>
    					</font-face> */
	}
	$('.library, .library_2, .library_3, .library_4, .library_5, .library_6').perfectScrollbar({wheelSpeed: 30, wheelPropagation: false, minScrollbarLength: 1});
}





function setup_smiles(){
	var smiles = config.smiles;	
	var desctop_bg_path = config.smiles_path;
	
	for (value in smiles) {	
			
		
			var html_text="";

			var path = desctop_bg_path + smiles[value].link;

			category = smiles[value]["images"];
		
			
		
			if (value==0) {
			
				html_text+='<div class="library_6  library-smiles" id="library_smiles-'+value+'">';
				
			}else{
				html_text="";
				html_text+='<div class="library_6  library-smiles" id="library_smiles-'+value+'" style="display: none;">';	
			}
			
			html_text+='<div class="library_in">';
		
		
			for(value1 in category) {
			
				var hash = randomHash(4);
				if (value1 == 0) {
					html_text+='<div class="library-smile_row library-smile_row-first" style="background-image: url('+path+category[value1].small+');" data-url="'+path+category[value1].big+'" id="library-smile_row-'+value1+hash+'" data-smile-id="'+value1+hash+'"></div>';
				}else{
					if((value1 % 5) == 0) {
						html_text+='<div class="library-smile_row library-smile_row-first" style="background-image: url('+path+category[value1].small+');" data-url="'+path+category[value1].big+'" id="library-smile_row-'+value1+hash+'" data-smile-id="'+value1+hash+'"></div>';
					}else{
						if((value1 % 5) == 4) {
							html_text+='<div class="library-smile_row library-background_row-last" style="background-image: url('+path+category[value1].small+');" data-url="'+path+category[value1].big+'" id="library-smile_row-'+value1+hash+'" data-smile-id="'+value1+hash+'"></div>';
						}else{
							html_text+='<div class="library-smile_row " style="background-image: url('+path+category[value1].small+');" data-url="'+path+category[value1].big+'" id="library-smile_row-'+value1+hash+'" data-smile-id="'+value1+hash+'"></div>';
						}
					}
				}
			}
		
			html_text+="</div></div>";
		$("#right-6").append(html_text);
		
		if (value==0) {
			 html_text ="";
			html_text = '<div class="library_tab_but library_tab_but-selected" data-tab-id="'+value+'">'+smiles[value].name+'</div>';
			
		}else{
			html_text ="";
			html_text = '<div class="library_tab_but" data-tab-id="'+value+'">'+smiles[value].name+'</div>';
			
		}
		$("#right-6 .category_buttons").append(html_text);
	}
	
	if ($("body").width()<1980) {
		$(".library-smiles").css("top", 65+$("#right-6 .category_buttons").height()+"px");
	}else{
		$(".library-smiles").css("top", 105+$("#right-6 .category_buttons").height()+"px");
	}

	



	$('.library, .library_2, .library_3, .library_4, .library_5, .library_6').perfectScrollbar({wheelSpeed: 30, wheelPropagation: false, minScrollbarLength: 1});

	
}



function setup_backgrounds() {
	
	var backgrounds = config.backgrounds;
	
	var desctop_bg_path = config.desctop_bg_path;
	
	
	for (value in backgrounds) {	
			
		
			var html_text="";

			var path = desctop_bg_path + backgrounds[value].link;

			category = backgrounds[value][0];
		
		
			if (value==0) {
				
				html_text+='<div class="library_5  library-backgrouds" id="library_backgrouds-'+value+'">';
				
			}else{
				html_text="";
				html_text+='<div class="library_5  library-backgrouds" id="library_backgrouds-'+value+'" style="display: none;">';	
			}
			
			html_text+='<div class="library_in">';
		
		
			for(value1 in category) {
				
				var hash = randomHash(4);
				if (value1 == 0) {
					html_text+='<div class="library-background_row library-background_row-first" style="background-image: url('+path+category[value1].small+');" data-url="'+path+category[value1].big+'" id="library-background_row-'+value1+hash+'" data-bg-id="'+value1+hash+'"></div>';
				}else{
					if((value1 % 4) == 0) {
						html_text+='<div class="library-background_row library-background_row-first" style="background-image: url('+path+category[value1].small+');" data-url="'+path+category[value1].big+'" id="library-background_row-'+value1+hash+'" data-bg-id="'+value1+hash+'"></div>';
					}else{
						if((value1 % 4) == 3) {
							html_text+='<div class="library-background_row library-background_row-last" style="background-image: url('+path+category[value1].small+');" data-url="'+path+category[value1].big+'" id="library-background_row-'+value1+hash+'" data-bg-id="'+value1+hash+'"></div>';
						}else{
							html_text+='<div class="library-background_row " style="background-image: url('+path+category[value1].small+');" data-url="'+path+category[value1].big+'" id="library-background_row-'+value1+hash+'" data-bg-id="'+value1+hash+'"></div>';
						}
					}
				}
			}
		
	
		
			html_text+="</div></div>";
		$("#right-5").append(html_text);
		
		if (value==0) {
			 html_text ="";
			html_text = '<div class="library_tab_but library_tab_but-selected" data-tab-id="'+value+'">'+backgrounds[value].name+'</div>';
			
		}else{
			html_text ="";
			html_text = '<div class="library_tab_but" data-tab-id="'+value+'">'+backgrounds[value].name+'</div>';
			
		}
		$("#right-5 .category_buttons").append(html_text);
	}
	
	if ($("body").width()<1980) {
		$(".library-backgrouds").css("top", 50+$("#right-5 .category_buttons").height()+"px");
	}else{
		$(".library-backgrouds").css("top", 85+$("#right-5 .category_buttons").height()+"px");	
	}
	
	$('.library, .library_2, .library_3, .library_4, .library_5, .library_6').perfectScrollbar({wheelSpeed: 30, wheelPropagation: false, minScrollbarLength: 1});

}

function setup_colors() {
	
	for( value in config.colors) {	
			
		var html_text="";

		if (value == 0) {
			html_text="";
			 html_text+='<div class="library-color_row library-color_row-first" data-color="'+config.colors[value][0]+'" data-color_id="'+value+'" style="background: '+config.colors[value][0]+';" id="library-color_row-'+value+'"></div>';
		
		}else{
				if((value % 10) == 9) {
				
					html_text="";
					html_text+='<div class="library-color_row library-color_row-last" data-color_id="'+value+'" data-color="'+config.colors[value][0]+'" style="background: '+config.colors[value][0]+';" id="library-color_row-'+value+'"></div>';
				}else{
					if((value % 10) == 0) {
						
						html_text="";
						 html_text+='<div class="library-color_row library-color_row-first" data-color_id="'+value+'" data-color="'+config.colors[value][0]+'" style="background: '+config.colors[value][0]+';" id="library-color_row-'+value+'"></div>';
					}else{
						
						html_text="";
						 html_text+='<div class="library-color_row" data-color_id="'+value+'" data-color="'+config.colors[value][0]+'" style="background: '+config.colors[value][0]+';" id="library-color_row-'+value+'"></div>';				
					}
				}
		}
			
		$(".library_color").append(html_text);
	}
	
}
var fonts="";

function prepare_devices(){


	for(value in config.devices) {	
		var html_text = "";
		if (config.devices[value].default == true) {
			if (default_devices_id!="") {
				console.log("Несколько устройств по дефолту, возможно "+config.devices[value].name+", неверный");
			}
			html_text+='<div class="library-device_row library-device_row-selected" id="library-device_row-'+value+'" data-device-id="'+value+'">';
			default_devices_id = value;

		}else{
			html_text+='<div class="library-device_row" id="library-device_row-'+value+'" data-device-id="'+value+'">';
		}
		
		html_text+=config.devices[value].name;
		
		var path = config["devices_library_path"];

		html_text+='<div style="background: url('+path+config.devices[value].lib_img+') bottom center no-repeat;"></div>';
		
		
		$(".library_of_devices").append(html_text);	
	}	

	if ($("body").width()>1979) {
  		for(value in config.devices) {	
  			config.devices[value].width=config.devices[value].width*1.5; 
  			config.devices[value].height=config.devices[value].height*1.5; 
  		}

  		config.desctop_font_size = parseInt(config.desctop_font_size)*1.5;
  	}
	
	set_device(default_devices_id);

	$('.library, .library_2, .library_3, .library_4, .library_5, .library_6').perfectScrollbar({wheelSpeed: 30, wheelPropagation: false, minScrollbarLength: 1});
}

function set_default_text(){
	desctop.text= config.default_text;
	desctop.font_color = config.default_font_color;
	svg_text.append("text")
								.text(desctop.text)
								.style("text-anchor", "middle")
								.style("alignment-baseline", "middle")
								.style("font-family", desctop.font_family)
								.style("fill", desctop.font_color)
								.style("font-size",config.desctop_font_size+"px")
								.attr("x",config.devices[desctop.device_id].width/2)
								.attr("y", config.devices[desctop.device_id].height/2)
								.on("click", click_text_control);


	desctop.font_size = config.desctop_font_size;
		

	var el = document.getElementsByTagName('text')[0];

    bbox = el.getBBox();




	var text_width = bbox.width+text_width_constant;
	var text_height = bbox.height+text_height_constant;


	var svg_width_point = scale_coof * config.devices[desctop.device_id].width/2;
	var svg_height_point = scale_coof * config.devices[desctop.device_id].height/2;


	
	if ($(window).height()<1980) {
		text_error = (($("#center_in").width()-config.devices[desctop.device_id].width)/2);
	}

	
	
	g_texts.append("rect")
		.classed("control_text", true)
		.classed("work", true)
		.attr("id", "control_text_rect")
		.attr("width", text_width)
		.attr("height", text_height)
		
		.attr("x", svg_width_point-text_width/2 + text_error)
		.attr("y", svg_height_point-text_height/2-5)
		.call(drag_rect)
		.on('click', click_text_control)
		.on("dblclick", click_text);

	g_texts.append("rect")
		.classed("control_text", true)
		.classed("doubled_rect", true)
		.classed("work", true)
		.attr("id", "control_text_rect_appered")
		.attr("width", text_width-6)
		.attr("height", text_height-6)
		.attr("x", svg_width_point-text_width/2+3 + text_error)
		.attr("y", svg_height_point-text_height/2-5+3)
		.call(drag_rect)
		.on('click', click_text_control)
		.on("dblclick", click_text);


	
	//Растяжение
	g_texts.append("circle")
		.classed("control_text", true)
		.classed("stretch_button",true)
		.call(drag_stretch)
		.style("fill", "url(#stretch)")
		.classed("work",true)
		.attr("r", 12.5)
		.attr("cx", svg_width_point-text_width/2+text_error)
		.attr("cy",  svg_height_point-text_height/2-5);
	
	g_texts.append("circle")
		.classed("control_text", true)
		.classed("rotate_button",true)
		.style("fill", "url(#rotate)")
		.attr("data-rotate", 0)
		.classed("work",true)
		.attr("r", 12.5)
		.call(rotate_text)
		.attr("cx", svg_width_point+text_width/2+text_error)
		.attr("cy",  svg_height_point-text_height/2-5);
	
	g_texts.append("circle")
		.classed("control_text", true)
		.classed("move_button",true)
		.style("fill", "url(#move)")
		.classed("work",true)
		.attr("r", 12.5)
		.call(drag_text)
		.attr("cx", svg_width_point+text_error)
		.attr("cy",  svg_height_point-text_height/2-5);
	
	
	
	$("#header-menu-item-3").addClass("header-menu-active");
	$('.library, .library_2, .library_3, .library_4, .library_5, .library_6').perfectScrollbar({wheelSpeed: 30, wheelPropagation: false, minScrollbarLength: 1});

	//svg_controls.append("image").
}


function set_smiles_image(url) {
		
	object_id = randomHash(10);

	svg_smiles.append("image")
								.attr("preserveAspectRatio", "xMidYMid slice")
								.classed("image_smile", true)
								.attr("data-object_id", object_id)
								.attr("data-url", url)
								.classed(object_id, true)
								.attr("id",object_id )
								.attr("width", 62)
								.attr("height", 62)
								.attr("x",config.devices[desctop.device_id].width/2-31)
								.attr("y", config.devices[desctop.device_id].height/2-31);
	



	getImageBase64( url, function (data) {
		d3.selectAll(".image_smile."+object_id)
      		.attr("xlink:href", "data:image/png;base64," + data); // replace link by data URI
		$("#header-menu-item-6").addClass("header-menu-active");
	});
	
	d3.selectAll('.control_smile').classed("work",false);



	var svg_width_point = scale_coof * config.devices[desctop.device_id].width/2;
	var svg_height_point = scale_coof * config.devices[desctop.device_id].height/2;


	
	if ($(window).height()<1980) {
		text_error = (($("#center_in").width()-config.devices[desctop.device_id].width)/2);
	}
	
	var text_width = parseFloat($(".image_smile."+object_id).attr("width"));
	var text_height = parseFloat($(".image_smile."+object_id).attr("height"));
	
	g_smiles.append("rect")
		.classed("control_smile", true)
		.classed("control_smile_main", true)
		.attr("data-object_id", object_id)
		.classed(object_id, true)
		.classed("work", true)
		.attr("id", "control_smile_rect")
		.attr("width", text_width)
		.attr("height", text_height)
		.attr("x", svg_width_point-text_width/2+text_error)
		.attr("y", svg_height_point-text_height/2)
		.on("click", control_smile_click)
		.call(drag_smile_rect);

	g_smiles.append("rect")
		.classed("control_smile", true)
		.classed("control_smile_back", true)
		.attr("data-object_id", object_id)
		.classed(object_id, true)
		.classed("work", true)
		.attr("id", "control_smile_rect")
		.attr("width", text_width-6)
		.attr("height", text_height-6)
		.attr("x", svg_width_point-text_width/2+3+text_error)
		.attr("y", svg_height_point-text_height/2+3)
		.on("click", control_smile_click)
		.call(drag_smile_rect);
	//	.on("dblclick", click_text);
	
	
	
	//Растяжение

	
	g_smiles.append("circle")
		.classed("control_smile", true)
		.attr("data-object_id", object_id)
		.classed(object_id, true)
		.style("fill", "url(#rotate)")
		.classed("rotate_button",true)
		.attr("data-rotate", 0)
		.classed("work",true)
		.attr("r", 12.5)
		.call(rotate_smile)
		.attr("cx", svg_width_point+text_width/2+text_error)
		.attr("cy",  svg_height_point-text_height/2);
	
	g_smiles.append("circle")
		.classed("control_smile", true)
		.classed("stretch_button",true)
		.style("fill", "url(#stretch)")
		.attr("data-object_id", object_id)
		.classed(object_id, true)
		.call(drag_stretch_smile)
		.classed("work",true)
		.attr("r", 12.5)
		.attr("cx", svg_width_point+text_width/2+text_error)
		.attr("cy",  svg_height_point+text_height/2);
	
	
	g_smiles.append("circle")
		.classed("control_smile", true)
		.style("fill", "url(#move)")
		.attr("data-object_id", object_id)
		.classed(object_id, true)
		.classed("move_button",true)
		.classed("work",true)
		.attr("r", 12.5)
		.call(drag_smile)
		.attr("cx", svg_width_point-text_width/2+text_error)
		.attr("cy",  svg_height_point-text_height/2);
	
	//REMOVE BUTTON
	g_smiles.append("circle")
		.classed("control_smile", true)
		.classed("delete_button",true)
		.style("fill", "url(#delete)")
		.attr("data-object_id", object_id)
		.classed(object_id, true)
		.on("click", delete_smile)
		.classed("work",true)
		.attr("r", 12.5)
		.attr("cx", svg_width_point-text_width/2+text_error)
		.attr("cy",  svg_height_point+text_height/2);
	$('.library, .library_2, .library_3, .library_4, .library_5, .library_6').perfectScrollbar({wheelSpeed: 30, wheelPropagation: false, minScrollbarLength: 1});

}

function click_text_control(){
	d3.selectAll(".control_text").classed("work", true);
}

function control_smile_click(){
	d3.selectAll(".control_smile").classed("work", false);
	var current_smile = d3.select(this).attr("data-object_id");
	console.log(current_smile);
	d3.selectAll(".control_smile."+current_smile).classed("work", true);
}


function click_text(){
	$(".alert_write").addClass("active");
	$(".input_write").val(svg_text.select("text").text());
	setTimeout(function() { 
		$(".input_write").select();
	 }, 100);
}

function change_step(obj) {
	if ($(obj).hasClass('header-menu-selected')) {
		return;
	}
	$("#steps_controller-next_but").addClass("active");

	var id = $(obj).data('menuId');

	$(".g_texts").css("display", "none");
	$(".g_smiles").css("display", "none");
	
	
	
	d3.selectAll(".control_text").classed("work", false);
	d3.selectAll(".control_smile").classed("work", false);
	
	if (id =="1") {

		$(".alert_device").addClass("active");

		
	} else {
				
		set_step(obj, id);

		$(".svg_device").css("display","none");
		if (id=="2") {
			if (!($(".library_check div").length>0)) {
				set_check();
				return;
			}
		}
		$("#steps_controller-checkout_but").addClass("active");
		if (id=="3") {
			
			if ($(".library_font div").length==0) setup_font();
			
			if ($(".svg_camera").find('image').length==0) set_check();
			
			if ($(".svg_text text").length==0) {
					set_default_text();	
			}
			$(".g_smiles").css("display", "block");
			$(".g_texts").css("display", "block");
			d3.selectAll(".control_text").classed("work", true);
		}
		if (id=="4") {
			if ($(".library_font div").length==0) setup_font();
			if ($(".svg_camera").find('image').length==0) set_check();
			if (!($(".library_color div").length>0)) {
				setup_colors();
				setup_patterns();
			}
			if ($(".svg_text text").length==0) {
				set_default_text();				
			}
			$(".g_smiles").css("display", "block");
			$(".g_texts").css("display", "block");
			d3.selectAll(".control_text").classed("work", true);
		}

		if (id=="5"){
			if (!($(".library-backgrouds div").length>0)) {
				setup_backgrounds();
			}
			$(".g_texts").css("display", "block");
			if ($(".svg_camera").find('image').length==0) set_check();
				
		}
		if (id=="6"){
			$("#steps_controller-next_but").removeClass("active");
			if ($(".svg_camera").find('image').length==0) set_check();
			if (!($("#right-6 .category_buttons div").length>0)) {
				setup_smiles();
			}
			$(".g_texts").css("display", "block");
			$(".g_smiles").css("display", "block");

		}
	}
}


function set_step(obj, id) {

	//if ($(".alert_out_svg").hasClass("active")) return;

	$('.header-menu-selected').removeClass('header-menu-selected');
		$(obj).addClass('header-menu-selected');
		$('.right_content_block').hide();
		$('#right-' + id).show();
		$('.info_block').hide();
		$('#info_block-' + id).show();
		$('.device_colors').hide();
		$('#device_colors-' + id).show();
		$('.library, .library_2, .library_3, .library_4, .library_5, .library_6').perfectScrollbar({wheelSpeed: 30, wheelPropagation: false, minScrollbarLength: 1});

}

function remove_setting() {
	$("#price_total").text("");
	$("#steps_controller-checkout_but").removeClass("active");
	$("#header-menu li").removeClass("header-menu-active");
	$("#header-menu-item-1").addClass("header-menu-active");
	$("#header-menu-item-1").addClass("header-menu-selected");
	
	desctop.lib_img = "";
	desctop.image_size_width ="";
	desctop.image_size_height ="";
	desctop.material_id="";
	desctop.text= "";
	desctop.font_pattern_id="";
	desctop.device_id=default_devices_id;
	desctop.material_id="";
	desctop.text="";
	desctop.font_pattern_id="";
	desctop.device_name="";
	desctop.device_color="";
	desctop.device_id_case = "";
	desctop.case_id="";
	desctop.name_case_1="";
	desctop.name_case_2="";
	desctop.bg_case="";
	desctop.bg_id = "";
	desctop.font_size="";
	desctop.font_color="";
	desctop.font_family="";
	desctop.font_pattern="";
	desctop.font_x="";
	desctop.font_y="";
	desctop.font_width = "";
	desctop.font_height = "";
	desctop.font_rotate="";
	desctop.preview_url="";
	desctop.smiles = {
		};

	//Remove
	svg_text.selectAll("text").remove();
	svg_controls.selectAll('rect').remove();
	svg_controls.selectAll('circle').remove();
	svg_background.selectAll("image").remove();
	svg_mask_body.selectAll("rect").remove();
	svg_mask_body.selectAll("image").remove();
	svg_material_body.selectAll("image").remove();
	svg_camera.selectAll("image").remove();
	svg_smiles.selectAll("image").remove();
	//Удаление параметров
	$(".library-background_row").removeClass("library-background_row-selected");
	$(".library-smile_row").removeClass("library-smile_row-selected");
	$(".library-color_row").removeClass("library-color_row-selected");
	$('.library-pattern_row').removeClass('library-pattern_row-selected');
	$(" .icon-close").css("display", "none");
	
	$(".library_check").find("div").remove();
	$(".chech_colors").find("div").remove();
}


function set_material(material_id) {	
	$("#header-menu-item-2").addClass("header-menu-active");
	var id_device = config.devices[desctop.device_id].id;
	desctop.material_id = material_id;		

	set_material_color_default(material_id);

	$(".library-case_row").removeClass("library-case_row-selected");
	$("#library-case_row-"+material_id).addClass("library-case_row-selected");

	desctop.name_case_1 = $("#library-case_row-"+material_id).find(".library-case_row-block-1").text();
	desctop.name_case_2 = $("#library-case_row-"+material_id).find(".library-case_row-block-2").text();
	
	$('.library, .library_2, .library_3, .library_4, .library_5, .library_6').perfectScrollbar({wheelSpeed: 30, wheelPropagation: false, minScrollbarLength: 1});
}


function set_material_default() {
	console.log("Ставлю дефолтный чехол");	
	var id_device = config.devices[desctop.device_id].id;
	if (config.materials[id_device].length>1) {
		var breakpoint = true;
		for (value in config.materials[id_device]) {
	
			if (config.materials[id_device][value].default==true) {
				if (breakpoint==false) {
					console.log("Ошибка, несколько дефолтных чехлов при телефоне" + id_device);
				}else{
					 set_material(value);
					
					 breakpoint = false;
				}
			}
		}
	}else{
		set_material(0);
	}
}


function set_material_color_default(material_id) {
	console.log("Cтавлю дефолтный цвет");
	$(".device_colors").find("div").remove();
	var id_device = config.devices[desctop.device_id].id;
	
	if (config.materials[id_device][material_id].colors.length>1) {
			var breakpoint = true;
			for (value in config.materials[id_device][material_id].colors) {
				var color = config.materials[id_device][material_id].colors[value].color;
				var cost = config.materials[id_device][material_id].colors[value].cost;
				var html_text = '<div data-material_id="'+material_id+'" data-cost="'+cost+'" data-material_color="'+value+'" id ="button_material_color-'+value+'" style="background:'+color+'" data-color="'+color+'"></div>';
				$(".device_colors").append(html_text);
				
				if (config.materials[id_device][material_id].colors[value].default==true) {
					if (breakpoint==false) {
						console.log("Ошибка, несколько дефолтных чехлов при телефоне" + id_device);
					}else{
					   set_material_color(material_id, value, cost);
					  
					   breakpoint = false;
					}
				}
			}
	}else{
		
		var color = config.materials[id_device][material_id].colors[0].color;
		var cost = config.materials[id_device][material_id].colors[0].cost;
		//var html_text = '<div  data-material_id="'+material_id+'" data-material_color="'+0+'" style="background:'+color+'" id ="button_material_color-'+0+'"></div>';
		//$(".device_colors").append(html_text);
		set_material_color(material_id ,0, cost);
	}
	$('.library, .library_2, .library_3, .library_4, .library_5, .library_6').perfectScrollbar({wheelSpeed: 30, wheelPropagation: false, minScrollbarLength: 1});

}

function set_material_color(material_id, material_color, cost) {


	var id_device = config.devices[desctop.device_id].id;


	var color_object = config.materials[id_device][material_id].colors[material_color];


	desctop.case_id = color_object.id;



	$(".chech_colors").find("div").removeClass("device_colors-selected");

	
	svg_mask_container.selectAll("mask").remove();
	svg_material_body.selectAll("image").remove();
	svg_camera.selectAll("image").remove();
	svg_mask_body.selectAll("rect").remove();
	svg_mask_body.selectAll("image").remove();
	
	

	svg_material_body
		.append("image")
			.attr("preserveAspectRatio", "xMidYMid slice")
			.attr("width", config.devices[desctop.device_id].width+"px")
			.attr("height", config.devices[desctop.device_id].height+"px")
			//.attr("xlink:href", path + config.devices[desctop.device_id].desctop_img)
			.classed("material_body", true);

	var path = config.chech_material_path;
		
	
	
	getImageBase64( path+color_object.desctop_img, function (data) {
		d3.select(".material_body")
      		.attr("xlink:href", "data:image/png;base64," + data); // replace link by data URI
	});



	
	
	



	
	svg_mask_container
			.append("mask")
			.attr("id", "mask1")
			.attr("x", "0")
			.attr("y", "0")
			.attr("width", "100%")
			.attr("height", "100%")
				.append("image")
				.classed("mask_image", true)
				.attr("x", "0")
				.attr("y", "0")
				.attr("width", "100%")
				.attr("height", "100%")
				.attr("preserveAspectRatio", "xMidYMid slice");

	
	
	
	var path = config.material_mask_path;
	
	getImageBase64(path+color_object.desctop_mask, function (data) {
		d3.select(".mask_image")
      		.attr("xlink:href", "data:image/png;base64," + data); // replace link by data URI
	});
	
	svg_mask_body
		.append("rect")
			.attr("width", config.devices[desctop.device_id].width+"px")
			.attr("height", config.devices[desctop.device_id].height+"px")
			.classed("mask_body", true)
			.style("fill","#E8E8E8")
			.style("mask","url(#mask1)");



	if ((config.materials[id_device][material_id]["desctop_mask_2"]!= undefined) && (config.materials[id_device][material_id]["desctop_mask_2"]!= 'undefined')) {
		
		var path = config.material_mask_path;

		svg_mask_container
			.append("mask")
			.attr("id", "mask2")
			.attr("x", "0")
			.attr("y", "0")
			.attr("width", "100%")
			.attr("height", "100%")
				.append("image")
				.classed("mask_image_2", true)
				.attr("x", "0")
				.attr("y", "0")
				.attr("xlink:href", path+config.materials[id_device][material_id]["desctop_mask_2"])
				.attr("width", "100%")
				.attr("height", "100%")
				.attr("preserveAspectRatio", "xMidYMid slice");


		getImageBase64( path+config.materials[id_device][material_id]["desctop_mask_2"], function (data) {
			d3.select(".mask_image_2")
	      		.attr("xlink:href", "data:image/png;base64," + data); // replace link by data URI
		});
	
		
		path = config.chech_material_path;


	
		svg_mask_body
			.append("rect")
			.attr("width", config.devices[desctop.device_id].width+"px")
			.attr("height", config.devices[desctop.device_id].height+"px")
			.classed("mask_body", true)
			.style("fill","#E8E8E8")
			.style("mask","url(#mask2)");
			
		
		svg_mask_body
			.append("image")
				.attr("width", config.devices[desctop.device_id].width+"px")
				.attr("height", config.devices[desctop.device_id].height+"px")
				.attr("xlink:href", path + color_object.desctop_img)
				.classed("mask_body_2", true)
				.attr("preserveAspectRatio", "xMidYMid slice")
				.style("mask","url(#mask2)");


		getImageBase64( path + color_object.desctop_img, function (data) {
			d3.select(".mask_body_2")
	      		.attr("xlink:href", "data:image/png;base64," + data); // replace link by data URI
		});
			
	}
	



	var path = config.material_mask_camera;
	
	svg_camera
		.append("image")
			.attr("preserveAspectRatio", "xMidYMid slice")
			.attr("width", config.devices[desctop.device_id].width+"px")
			.attr("height", config.devices[desctop.device_id].height+"px")
			.classed("camera", true);
	
	getImageBase64( path+color_object.desctop_camera, function (data) {
		d3.select(".camera")
      		.attr("xlink:href", "data:image/png;base64," + data); // replace link by data URI
	});


	$("#price_total").text(cost+" Р")
	$('.library, .library_2, .library_3, .library_4, .library_5, .library_6').perfectScrollbar({wheelSpeed: 30, wheelPropagation: false, minScrollbarLength: 1});
	
	$("#button_material_color-"+material_color).addClass("device_colors-selected");

	desctop.device_color = $("#button_material_color-"+material_color).data("color");
}

function set_check() {
	var id_device = config.devices[desctop.device_id].id;
	var lib_path =  config.desctop_material_path;

	for (value in config.materials[id_device]) {	
		
		var html_text = "";
		
		html_text+='<div class="library-case_row"  id="library-case_row-'+value+'" data-material-id="'+value+'" style="background-image: url('+lib_path+config.materials[id_device][value].lib_img+');">';
		html_text+='<div class="library-case_row-block-1">'+config.materials[id_device][value].name+'</div>';	
		html_text+='<div class="library-case_row-block-2">'+config.materials[id_device][value].descr_1+'</div>';	
		html_text+='<div class="library-case_row-block-3">'+config.materials[id_device][value].descr_2+'</div>';	
		

		html_text+='</div>';


		$(".library_check").append(html_text);	
	}	
	set_material_default();

	$('.library, .library_2, .library_3, .library_4, .library_5, .library_6').perfectScrollbar({wheelSpeed: 30, wheelPropagation: false, minScrollbarLength: 1});
}

function set_device(device_id) {

	$("#header-menu-item-1").addClass("header-menu-active");
	remove_setting();
	desctop.device_id = parseInt(device_id);

	desctop.device_id_case = config.devices[device_id].id;
	desctop.device_name = config.devices[device_id].name;

	desctop.lib_img = config.devices[device_id].lib_img;

	svg_device.selectAll("image").remove();
	
	
	var path = config.devices_desctop_path;
	
	d3.selectAll("svg")
		.attr("width", config.devices[desctop.device_id].width+"px")
		.attr("height", config.devices[desctop.device_id].height+"px");
	
	d3.selectAll("svg")
		.selectAll("g")
			.attr("width", config.devices[desctop.device_id].width+"px")
			.attr("height", config.devices[desctop.device_id].height+"px");
	svg_device
		.append("image")

			.attr("width", config.devices[desctop.device_id].width+"px")
			.attr("height", config.devices[desctop.device_id].height+"px")
			.attr("preserveAspectRatio", "xMidYMid slice")
			.attr("xlink:href", path + config.devices[desctop.device_id].desctop_img)
			.classed("device_image", true);
	

	svg_text_svg.style("margin-top", "-"+config.devices[desctop.device_id].height+"px");
	svg_second_svg.style("margin-top", "-"+config.devices[desctop.device_id].height+"px" );




	svg_controls_svg.style({
		"margin-top": "-"+ ((scale_coof-1)/2+1)*config.devices[desctop.device_id].height+"px",
		"margin-left": "-"+ ((scale_coof-1)/2)*config.devices[desctop.device_id].width+"px"})
	.attr({
		"width": scale_coof * config.devices[desctop.device_id].width +"px",
		"height": scale_coof *config.devices[desctop.device_id].height +"px"

	});

	svg_controls_svg.selectAll("g").attr({
		"width": scale_coof * config.devices[desctop.device_id].width +"px",
		"height": scale_coof *config.devices[desctop.device_id].height +"px"
	});

	device_width_svg = config.devices[desctop.device_id].width;
	device_height_svg = config.devices[desctop.device_id].height;



	//Магия в base64
	getImageBase64(path + config.devices[desctop.device_id].desctop_img, function (data) {
		d3.select(".device_image")
      		.attr("xlink:href", "data:image/png;base64," + data); // replace link by data URI
	});

	$('.library-device_row').removeClass('library-device_row-selected');
	$('#library-device_row-' + device_id).addClass('library-device_row-selected');

	$("#phone_model").text($(".library-device_row-selected").text());
	$("#price_total").text("");
	
	$('.library, .library_2, .library_3, .library_4, .library_5, .library_6').perfectScrollbar({wheelSpeed: 30, wheelPropagation: false, minScrollbarLength: 1});

	//$('#device').css('background-image', 'url(' + config.devices_desctop_path + config.devices[device_id].desctop_img + ')');
}


function set_smile(smile_id) {
	var url = d3.select("#library-smile_row-"+smile_id).attr("data-url");
	
	set_smiles_image(url)
	
	$(".library-smile_row").removeClass("library-smile_row-selected");
	$("#library-smile_row-"+smile_id).addClass("library-smile_row-selected");
	$('.library, .library_2, .library_3, .library_4, .library_5, .library_6').perfectScrollbar({wheelSpeed: 30, wheelPropagation: false, minScrollbarLength: 1});

}


function set_bg(bg_id) {

	desctop.bg_id = bg_id;
	var url = d3.select("#library-background_row-"+bg_id).attr("data-url");

	desctop.bg_case = url;

	svg_background.selectAll("image").remove();

	svg_background
		.append("image")
			.attr("preserveAspectRatio", "xMidYMid slice")
			.attr("width", config.devices[desctop.device_id].width+"px")
			.attr("height", config.devices[desctop.device_id].height+"px")
			//.attr("xlink:href", path + config.devices[desctop.device_id].desctop_img)
			.classed("device_background", true);
	
	getImageBase64( url, function (data) {
		d3.select(".device_background")
			.attr("preserveAspectRatio", "xMidYMid slice")
      		.attr("xlink:href", "data:image/png;base64," + data); // replace link by data URI
	});
	$(".library-background_row").removeClass("library-background_row-selected");
	$("#library-background_row-"+bg_id).addClass("library-background_row-selected");
	$(".icon-close").css("display", "block");
	
	//Append mask and camera
	//required data
	$("#header-menu-item-5").addClass("header-menu-active");
	$('.library, .library_2, .library_3, .library_4, .library_5, .library_6').perfectScrollbar({wheelSpeed: 30, wheelPropagation: false, minScrollbarLength: 1});

		
}



function set_font(font_family) {

	desctop.font_family = d3.select("#library-font_row-"+font_family).attr("data-font");
	
	var url = d3.select("#library-font_row-"+font_family).attr("data-font_url");
	svg_fonts_container.selectAll("style").remove();

	
	$("#header-menu-item-6").addClass("header-menu-active");
	
	
	
	svg_text.select("text")
		.style("font-family", desctop.font_family);

	$('.library-font_row').removeClass('library-font_row-selected');
	$('#library-font_row-' + font_family).addClass('library-font_row-selected');
	restart_depend();
	$('.library, .library_2, .library_3, .library_4, .library_5, .library_6').perfectScrollbar({wheelSpeed: 30, wheelPropagation: false, minScrollbarLength: 1});

}



function set_font_color(color_id,color) {
	$("#header-menu-item-4").addClass("header-menu-active");
	svg_text.selectAll("text").style("fill",color);
	$(".library-color_row").removeClass("library-color_row-selected");
	$('.library-pattern_row').removeClass('library-pattern_row-selected');
	$("#library-color_row-"+color_id).addClass("library-color_row-selected");

	desctop.font_pattern = "";
	desctop.font_color = color;
}

function set_font_pattern(font_pattern_id) {

	$("#header-menu-item-4").addClass("header-menu-active");

	desctop.font_pattern_id = font_pattern_id;

	
	var url = d3.select('#library-pattern_row-' + font_pattern_id).attr("data-url");

	desctop.font_pattern = url;
	desctop.font_color = "";
	
	svg_fonts_container.selectAll("pattern").remove();

	rotate = parseFloat(d3.select(".control_text.rotate_button").attr("data-rotate"));
	console.log(rotate);
	
	center = {
							x: parseFloat(d3.select(".svg_text text").attr("x")),
							y: parseFloat(d3.select(".svg_text text").attr("y"))
	};

	svg_fonts_container.append("pattern")
			.attr("id", "wood")
			.attr("patternUnits", "userSpaceOnUse")
			.attr("width", config.devices[desctop.device_id].width)
			.attr("height",config.devices[desctop.device_id].height)
			.attr("patternTransform", "rotate("+(-rotate)+","+center.x+","+center.y+")translate("+(-center.x*(icon_scale-1))+", "+(-center.y*(icon_scale-1))+")scale("+icon_scale+")") 
				.append("image")
					.attr("width", config.devices[desctop.device_id].width)
					.attr("height", config.devices[desctop.device_id].height)
					.classed("pattern_image", true)
					.attr("x",0)
					.attr("y", 0)
					.attr("preserveAspectRatio", "xMidYMid slice");
					
	
	getImageBase64(url, function (data) {
		d3.select(".pattern_image")
      		.attr("xlink:href", "data:image/png;base64," + data); // replace link by data URI
	});
	
	svg_text.selectAll("text").style("fill","url(#wood)");
	
	$('.library-color_row').removeClass('library-color_row-selected');

	
	$(".library-color_row").removeClass("library-color_row-selected");
	$('.library-pattern_row').removeClass('library-pattern_row-selected');
	$('#library-pattern_row-' + font_pattern_id).addClass('library-pattern_row-selected');
	$('.library, .library_2, .library_3, .library_4, .library_5, .library_6').perfectScrollbar({wheelSpeed: 30, wheelPropagation: false, minScrollbarLength: 1});

}




// это в base 64

var converterEngine = function (input) { // fn BLOB => Binary => Base64 ?
    var uInt8Array = new Uint8Array(input),
        i = uInt8Array.length;
    var biStr = []; //new Array(i);
    while (i--) {
        biStr[i] = String.fromCharCode(uInt8Array[i]);
    }
    var base64 = window.btoa(biStr.join(''));
   
    return base64;
};

var getImageBase64 = function (url, callback) {
    // 1. Loading file from url:
    var xhr = new XMLHttpRequest(url);
    xhr.open('GET', url, true); // url is the url of a PNG image.
    xhr.responseType = 'arraybuffer';
    xhr.callback = callback;
    xhr.onload = function (e) {
        if (this.status == 200) { // 2. When loaded, do:
            var imgBase64 = converterEngine(this.response); // convert BLOB to base64
            this.callback(imgBase64); //execute callback function with data
        }
    };
    xhr.send();
};




function save_image() {
	$(".main_container").after('<div id = "foo"></div>');

	var target = document.getElementById('foo');
	var spinner = new Spinner(opts).spin(target);

	var markup = (new XMLSerializer()).serializeToString(document.getElementsByClassName("center_device_svg")[0]);
	markup = markup.replace(/NS\d+:href/g, "xmlns:xlink='http://www.w3.org/1999/xlink' xlink:href");
	markup = markup.replace(/a\d+:href/g, "xmlns:xlink='http://www.w3.org/1999/xlink' xlink:href");

	var markup1 = (new XMLSerializer()).serializeToString(document.getElementsByClassName("svg_second_svg")[0]);
	markup1 = markup1.replace(/NS\d+:href/g, "xmlns:xlink='http://www.w3.org/1999/xlink' xlink:href");
	markup1 = markup1.replace(/a\d+:href/g, "xmlns:xlink='http://www.w3.org/1999/xlink' xlink:href");

	$.ajax({ 
		type: "POST", 
		url: "main/save_png2",
		dataType: 'text',
		data: {
			image : markup,
			image1 : markup1
		},

	success: function(data){
		var links = JSON.parse(data);


		svg_text_svg.style("margin-top", "0px");

		var svgData = new XMLSerializer().serializeToString(document.getElementsByClassName("svg_text_svg")[0]);



		svg_text_svg.style("margin-top", "-" + $("#device").height() + "px");

		console.log(svgData);

		var canvas = document.createElement("canvas");

		canvas.width = $("#device").width();
		canvas.height = $("#device").height();

		var ctx = canvas.getContext("2d");

		var img = new Image();
		img.setAttribute( "src", "data:image/svg+xml;base64," + btoa(unescape(encodeURIComponent(svgData))));

		var img0 = new Image();
		img0.setAttribute( "src", links[0]["image"] );

		var img1 = new Image();
		img1.setAttribute( "src", links[1]["image1"] );


		console.log(links);
		console.log(img0);
		console.log(img1);

		

		
	

		img0.onload = function() {

			
			ctx.drawImage(img0, 0, 0 );

			ctx.drawImage(img, 0, 0 );

			ctx.drawImage(img1, 0, 0 );
		
			
			$.ajax({ 
			type: "POST", 
			url: "main/save_img",
			dataType: 'text',
			data: {
				image : canvas.toDataURL("image/png" )
			},
			success: function(data){
				$(".main_container").append(img);
				response_to_server(data);
				
				
			},
			fail: function(data){
				sweetAlert("Ошибка", data, "error");
			}
		});


	};

	},
	fail: function(data){
		sweetAlert("Ошибка", data, "error");
		}
	});
	
}

function response_to_server(url) {
				desctop.preview_url = url;

				desctop.image_size_width = $("#device").width();
				desctop.image_size_height = $("#device").height();

				var text_width = $(".svg_text text").width();
				var text_height = $(".svg_text text").height();
				var text_x = parseFloat($(".svg_text text").attr("x"));
				var text_y = parseFloat($(".svg_text text").attr("y"));

				desctop.font_x = text_x-text_width/2;
				desctop.font_y = text_y-text_height/2;
				desctop.font_width = text_width;
				desctop.font_height = text_height;
				desctop.font_rotate = parseInt($(".control_text.rotate_button").data("rotate"));

				$(".svg_smiles image").each(function(){
					var id = $(this).attr("id");

					var element = {
						smile_width: d3.select(this).attr("width"),
						smile_height: d3.select(this).attr("height"),
						smile_x: $(this).attr("x"),
						smile_y: $(this).attr("y"),
						smile_rotate: parseInt($(".control_smile.rotate_button."+id).attr("data-rotate")),
						smile_url: $(this).data("url")
					}

					desctop.smiles[id]= element;

				

				});

				
				$.ajax({ 
					type: "POST", 
					url: "main/add_to_cart",
					dataType: 'text',
					data: {
						desctop : JSON.stringify(desctop)
					},
					success: function(data){
						
						document.location = "/cart";

					},
					fail: function(data){
						sweetAlert("Ошибка", data, "error");
					}
				});
}


function get_angle(center, point){ 
	var x = point.x - center.x; 
	var y = point.y - center.y; 
	if(x==0) return (y>0) ? 180 : 0; 
	var a = Math.atan(y/x)*180/Math.PI; 
	a = (x > 0) ? a+90 : a+270; 
	return a; 
}

var rotate, prev_rotate, center;

var smile_width, smile_height;

var rotate_smile = d3.behavior.drag() 					
					.on('dragstart', function() {
						d3.event.sourceEvent.stopPropagation();

						current_smile = d3.select(this).attr("data-object_id");

						d3.selectAll(".control_smile."+current_smile).classed("work", true);	

						newx = parseFloat(d3.select(this).attr("cx") -((scale_coof-1)/2)*device_width_svg-text_error);
						newy = parseFloat(d3.select(this).attr("cy")-((scale_coof-1)/2)*device_height_svg);

						smile_width =  parseFloat($(".image_smile."+current_smile).attr("width"));
						smile_height =  parseFloat($(".image_smile."+current_smile).attr("height"));

				

						rotate = d3.select(this).attr("data-rotate");
						
						icon_scale = 1;

						var M = d3.mouse(svg_smiles.node());

						prevx = M[0]- ((scale_coof-1)/2)*device_width_svg-text_error;
						prevy = M[1]-((scale_coof-1)/2)*device_height_svg;

						var point = {
							x: newx,
							y: newy
						};

						center = {
							x: (parseFloat(d3.select("image.image_smile."+current_smile).attr("x")) + smile_width/2) ,
							y: (parseFloat(d3.select("image.image_smile."+current_smile).attr("y")) + smile_height/2)
						};

						prev_rotate = get_angle(center, point);


					})
					.on('drag', function() {

						svg_width = config.devices[desctop.device_id].width;
						svg_height = config.devices[desctop.device_id].width;

						var M = d3.mouse(svg_controls.node());

						newx = parseFloat(d3.select(this).attr("cx"));
						newy = parseFloat(d3.select(this).attr("cy"));
						
						var point = {
							x: M[0]-((scale_coof-1)/2)*device_width_svg-text_error,
							y: M[1]-((scale_coof-1)/2)*device_height_svg
						};
						

						var rotate_angle = get_angle(center, point);
						
						rotate = (rotate_angle-prev_rotate);
							
						d3.select(this).attr("data-rotate", rotate);
									
						d3.selectAll("image.image_smile."+current_smile)
							.attr("transform", "rotate("+rotate+","+center.x+","+center.y+")translate("+(-center.x*(icon_scale-1))+", "+(-center.y*(icon_scale-1))+")scale("+icon_scale+")"); 


						 var cpx=center.x+((scale_coof-1)/2)*device_width_svg+text_error;
                        var cpy=center.y+((scale_coof-1)/2)*device_height_svg;

						d3.selectAll(".svg_controls .control_smile."+current_smile)
                                         .attr("transform", "rotate("+rotate+","+cpx+","+cpy+")translate("+(-cpx*(icon_scale-1))+", "+(-cpy*(icon_scale-1))+")scale("+icon_scale+")"); 

					})
					.on('dragend', function() {
						setTimeout(function() { 
							d3.selectAll(".control_smile."+current_smile).classed("work", true);
						 }, 50);
					});


var rotate_text =  d3.behavior.drag() 					
					.on('dragstart', function() {	
						d3.event.sourceEvent.stopPropagation();
						
						newx = parseFloat(d3.select(this).attr("cx") -((scale_coof-1)/2)*device_width_svg-text_error);
						newy = parseFloat(d3.select(this).attr("cy")-((scale_coof-1)/2)*device_height_svg);
						
						rotate = d3.select(this).attr("data-rotate");
						
						icon_scale = 1;
						
						

						var M = d3.mouse(svg_text.node());
								prevx = M[0]- ((scale_coof-1)/2)*device_width_svg-text_error;
								prevy = M[1]-((scale_coof-1)/2)*device_height_svg;
						
						var point = {
							x: newx,
							y: newy
						};

						//var dx = (newx+((d3.event.x-((scale_coof-1)/2)*device_width_svg-text_error)-prevx));
						//var dy = (newy+((d3.event.y -((scale_coof-1)/2)*device_height_svg)-prevy));
						
						center = {
							x: parseFloat(d3.select(".svg_text text").attr("x")),
							y: parseFloat(d3.select(".svg_text text").attr("y"))
						};
						
						
						prev_rotate = get_angle(center, point);
						
					
					
					})
					.on('drag', function() {	


						svg_width = config.devices[desctop.device_id].width;
						svg_height = config.devices[desctop.device_id].width;

						var M = d3.mouse(svg_controls.node());

						newx = parseFloat(d3.select(this).attr("cx"));
						newy = parseFloat(d3.select(this).attr("cy"));
						
						var point = {
							x: M[0]-((scale_coof-1)/2)*device_width_svg-text_error,
							y: M[1]-((scale_coof-1)/2)*device_height_svg
						};
						

						var rotate_angle = get_angle(center, point);
						
						rotate = (rotate_angle-prev_rotate);
							
						d3.select(this).attr("data-rotate", rotate);
			
						
						check_alert();

						
						

						d3.selectAll(".svg_text text")
                                         .attr("transform", "rotate("+rotate+","+center.x+","+center.y+")translate("+(-center.x*(icon_scale-1))+", "+(-center.y*(icon_scale-1))+")scale("+icon_scale+")"); 


                        var cpx=center.x+((scale_coof-1)/2)*device_width_svg+text_error;
                        var cpy=center.y+((scale_coof-1)/2)*device_height_svg;

                        /*new coords*/
						d3.selectAll(".svg_controls .control_text")
                                         .attr("transform", "rotate("+rotate+","+cpx+","+cpy+")translate("+(-cpx*(icon_scale-1))+", "+(-cpy*(icon_scale-1))+")scale("+icon_scale+")"); 



                        /**/

						d3.select(this).attr("data-rotate", rotate);
					
						d3.select("#wood")
							   .attr("patternTransform", "rotate("+(-rotate)+","+center.x+","+center.y+")translate("+(-center.x*(icon_scale-1))+", "+(-center.y*(icon_scale-1))+")scale("+icon_scale+")"); 
					

					})
					.on('dragend', function() {
						click_text_control();
					});

var icon_scale = 1;
var rotate_x;
var rotate_y;


var drag_smile =  d3.behavior.drag() 					
					.on('dragstart', function() {
						d3.event.sourceEvent.stopPropagation();
						


						d3.selectAll(".control_smile").classed("work", false);
						d3.selectAll(".control_text").classed("work", false);
						current_smile = d3.select(this).attr("data-object_id");
						d3.selectAll(".control_smile."+current_smile).classed("work", true);
				
						newx = parseFloat(d3.select(this).attr("cx"));
						newy = parseFloat(d3.select(this).attr("cy"));
						d3.event.sourceEvent.stopPropagation();
						rotate = d3.select(".control_smile.rotate_button."+current_smile).attr("data-rotate");

						d3.selectAll("image.image_smile."+current_smile+", .svg_controls rect.control_smile."+current_smile).each(function (d) {
   							 d3.select(this)
								 .attr("data-prevx", parseFloat(d3.select(this).attr("x")))
							 	 .attr("data-prevy", parseFloat(d3.select(this).attr("y")));
 						});
					
						d3.selectAll("circle.control_smile."+current_smile).each(function (d) {
							d3.select(this)
								 .attr("data-prevx", parseFloat(d3.select(this).attr("cx")))
							 	 .attr("data-prevy", parseFloat(d3.select(this).attr("cy")));	
						});
						var M = d3.mouse(svg_text.node());
						prevx = M[0];
						prevy = M[1];
					})
					.on('drag', function() {
						var coord_x, coord_y;

						var dx = (newx+((d3.event.x-((scale_coof-1)/2)*device_width_svg-text_error)-prevx));
						var dy = (newy+((d3.event.y -((scale_coof-1)/2)*device_height_svg)-prevy));
						
						var deltax = dx - newx;
							
						var deltay = dy - newy;
						
						
						d3.selectAll("image.image_smile."+current_smile).each(function (d) {
							d3.select(this)
								 .attr("x", parseFloat(d3.select(this).attr("data-prevx"))+deltax)
							 	 .attr("y", parseFloat(d3.select(this).attr("data-prevy"))+deltay);
								
							coord_x = parseFloat(d3.select(this).attr("data-prevx"))+deltax;
							coord_y = parseFloat(d3.select(this).attr("data-prevy"))+deltay;

							
							smile_width =  parseFloat($(".image_smile."+current_smile).attr("width"));
							smile_height =  parseFloat($(".image_smile."+current_smile).attr("height"));

							rotate_x=coord_x+smile_width/2;
							rotate_y=coord_y+smile_height/2;
							
							d3.select(this)
								.attr("transform", "rotate("+rotate+","+rotate_x+","+rotate_y+")translate("+(-rotate_x*(icon_scale-1))+", "+(-rotate_y*(icon_scale-1))+")scale("+icon_scale+")"); 
 						});


						d3.selectAll("image.image_smile."+current_smile)
							 .attr("data-prevx_check", coord_x)
						 	 .attr("data-prevy_check", coord_y)
							 .attr("transform", "rotate("+rotate+","+rotate_x+","+rotate_y+")translate("+(-rotate_x*(icon_scale-1))+", "+(-rotate_y*(icon_scale-1))+")scale("+icon_scale+")"); ;

						rotate_x=rotate_x+((scale_coof-1)/2)*device_width_svg+text_error;
						rotate_y=rotate_y+((scale_coof-1)/2)*device_height_svg;
						
						d3.selectAll(".svg_controls rect.control_smile."+current_smile).each(function (d) {
   							 d3.select(this)
							 	 .attr("transform", "rotate("+rotate+","+rotate_x+","+rotate_y+")translate("+(-rotate_x*(icon_scale-1))+", "+(-rotate_y*(icon_scale-1))+")scale("+icon_scale+")")
								 .attr("x", parseFloat(d3.select(this).attr("data-prevx"))+deltax)
							 	 .attr("y", parseFloat(d3.select(this).attr("data-prevy"))+deltay);
 						});
					
						
						d3.selectAll("circle.control_smile."+current_smile).each(function (d) {
							d3.select(this)
								 .attr("transform", "rotate("+rotate+","+rotate_x+","+rotate_y+")translate("+(-rotate_x*(icon_scale-1))+", "+(-rotate_y*(icon_scale-1))+")scale("+icon_scale+")")
								 .attr("cx", parseFloat(d3.select(this).attr("data-prevx"))+deltax)
							 	 .attr("cy", parseFloat(d3.select(this).attr("data-prevy"))+deltay);	
						});



					})
					.on('dragend', function() {
						
					});

var drag_text =  d3.behavior.drag() 					
					.on('dragstart', function() {	
						d3.event.sourceEvent.stopPropagation();

						d3.selectAll(".control_smile").classed("work",false);
				
						newx = parseFloat(d3.select(this).attr("cx"));
						newy = parseFloat(d3.select(this).attr("cy"));
						
						d3.selectAll(".control_smile").classed("work", false);
						
						d3.event.sourceEvent.stopPropagation();
						rotate = d3.select(".control_text.rotate_button").attr("data-rotate");
						
						d3.selectAll(".svg_text text, .svg_controls rect.control_text").each(function (d) {
   							 d3.select(this)
								 .attr("data-prevx", parseFloat(d3.select(this).attr("x")))
							 	 .attr("data-prevy", parseFloat(d3.select(this).attr("y")));
 						});
					
						d3.selectAll("circle.control_text").each(function (d) {
							d3.select(this)
								 .attr("data-prevx", parseFloat(d3.select(this).attr("cx")))
							 	 .attr("data-prevy", parseFloat(d3.select(this).attr("cy")));	
						});
						var M = d3.mouse(svg_text.node());
						prevx = M[0];
						prevy = M[1];
						
					})
					.on('drag', function() {
											
						var dx = (newx+((d3.event.x-((scale_coof-1)/2)*device_width_svg-text_error)-prevx));
						var dy = (newy+((d3.event.y -((scale_coof-1)/2)*device_height_svg)-prevy));
						
						var deltax = dx - newx;
							
						var deltay = dy - newy;
						
						
						d3.selectAll(".svg_text text").each(function (d) {
							d3.select(this)
								 .attr("x", parseFloat(d3.select(this).attr("data-prevx"))+deltax)
							 	 .attr("y", parseFloat(d3.select(this).attr("data-prevy"))+deltay);
								
							rotate_x = parseFloat(d3.select(this).attr("data-prevx"))+deltax;
							rotate_y = parseFloat(d3.select(this).attr("data-prevy"))+deltay;
							
							d3.select(this)
								.attr("transform", "rotate("+rotate+","+rotate_x+","+rotate_y+")translate("+(-rotate_x*(icon_scale-1))+", "+(-rotate_y*(icon_scale-1))+")scale("+icon_scale+")"); 
 						});

						d3.select("#wood")
							   .attr("patternTransform", "rotate("+(-rotate)+","+rotate_x+","+rotate_y+")translate("+(-rotate_x*(icon_scale-1))+", "+(-rotate_y*(icon_scale-1))+")scale("+icon_scale+")"); 

						check_alert();


						d3.selectAll(".svg_text text")
							 .attr("data-prevx_check", rotate_x)
						 	 .attr("data-prevy_check", rotate_y)
							 .attr("transform", "rotate("+rotate+","+rotate_x+","+rotate_y+")translate("+(-rotate_x*(icon_scale-1))+", "+(-rotate_y*(icon_scale-1))+")scale("+icon_scale+")"); ;

						

						
					
						
						rotate_x=rotate_x+((scale_coof-1)/2)*device_width_svg+text_error;
						rotate_y=rotate_y+((scale_coof-1)/2)*device_height_svg;
						
						console.log(rotate_x);

						
						d3.selectAll(".svg_controls rect.control_text").each(function (d) {
   							 d3.select(this)
							 	 .attr("transform", "rotate("+rotate+","+rotate_x+","+rotate_y+")translate("+(-rotate_x*(icon_scale-1))+", "+(-rotate_y*(icon_scale-1))+")scale("+icon_scale+")")
								 .attr("x", parseFloat(d3.select(this).attr("data-prevx"))+deltax)
							 	 .attr("y", parseFloat(d3.select(this).attr("data-prevy"))+deltay);
 						});
					
						
						d3.selectAll("circle.control_text").each(function (d) {
							d3.select(this)
								 .attr("transform", "rotate("+rotate+","+rotate_x+","+rotate_y+")translate("+(-rotate_x*(icon_scale-1))+", "+(-rotate_y*(icon_scale-1))+")scale("+icon_scale+")")
								 .attr("cx", parseFloat(d3.select(this).attr("data-prevx"))+deltax)
							 	 .attr("cy", parseFloat(d3.select(this).attr("data-prevy"))+deltay);	
						});
						
					
					
					})
					.on('dragend', function() {
						
					});



var drag_smile_rect = d3.behavior.drag() 					
					 .on('dragstart', function() {
						d3.event.sourceEvent.stopPropagation();

						d3.selectAll(".control_smile").classed("work", false);

						current_smile = d3.select(this).attr("data-object_id");
						d3.selectAll(".control_smile."+current_smile).classed("work", true);

						
						d3.selectAll(".control_text").classed("work",false);
						rotate = d3.select(".control_smile.rotate_button."+current_smile).attr("data-rotate");

						d3.selectAll("image.image_smile."+current_smile+", .svg_controls rect.control_smile."+current_smile).each(function (d) {
   							 d3.select(this)
								 .attr("data-prevx", parseFloat(d3.select(this).attr("x")))
							 	 .attr("data-prevy", parseFloat(d3.select(this).attr("y")));
 						});

 						d3.selectAll("circle.control_smile."+current_smile).each(function (d) {
							d3.select(this)
								 .attr("data-prevx", parseFloat(d3.select(this).attr("cx")))
							 	 .attr("data-prevy", parseFloat(d3.select(this).attr("cy")));	
						});


						var M = d3.mouse(svg_controls.node());

						newx = parseFloat(d3.select(this).attr("x"));
						newy = parseFloat(d3.select(this).attr("y"));

						prevx = M[0];
						prevy = M[1];


					})
					.on('drag', function() {

						var dx = (newx+(d3.event.x-prevx));
						var dy = (newy+(d3.event.y-prevy));
						
						var deltax = dx - newx;
							
						var deltay = dy - newy;

					

						d3.selectAll(".svg_smiles image.image_smile."+current_smile).each(function (d) {
							d3.select(this)
								 .attr("x", parseFloat(d3.select(this).attr("data-prevx"))+deltax)
							 	 .attr("y", parseFloat(d3.select(this).attr("data-prevy"))+deltay);
								
							coord_x = parseFloat(d3.select(this).attr("data-prevx"))+deltax;
							coord_y = parseFloat(d3.select(this).attr("data-prevy"))+deltay;

							
							smile_width =  parseFloat($(".image_smile."+current_smile).attr("width"));
							smile_height =  parseFloat($(".image_smile."+current_smile).attr("height"));

							rotate_x=coord_x+smile_width/2;
							rotate_y=coord_y+smile_height/2;
							
							d3.select(this)
								.attr("transform", "rotate("+rotate+","+rotate_x+","+rotate_y+")translate("+(-rotate_x*(icon_scale-1))+", "+(-rotate_y*(icon_scale-1))+")scale("+icon_scale+")"); 
 						});

 						d3.selectAll(".svg_smiles image.image_smile."+current_smile)
							 .attr("data-prevx_check", coord_x)
						 	 .attr("data-prevy_check", coord_y)
							 .attr("transform", "rotate("+rotate+","+rotate_x+","+rotate_y+")translate("+(-rotate_x*(icon_scale-1))+", "+(-rotate_y*(icon_scale-1))+")scale("+icon_scale+")"); ;

						
						rotate_x=rotate_x+((scale_coof-1)/2)*device_width_svg+text_error;
						rotate_y=rotate_y+((scale_coof-1)/2)*device_height_svg;


						d3.selectAll(".svg_controls rect.control_smile."+current_smile).each(function (d) {
   							 d3.select(this)
							 	 .attr("transform", "rotate("+rotate+","+rotate_x+","+rotate_y+")translate("+(-rotate_x*(icon_scale-1))+", "+(-rotate_y*(icon_scale-1))+")scale("+icon_scale+")")
								 .attr("x", parseFloat(d3.select(this).attr("data-prevx"))+deltax)
							 	 .attr("y", parseFloat(d3.select(this).attr("data-prevy"))+deltay);
 						});
					
						
						d3.selectAll("circle.control_smile."+current_smile).each(function (d) {
							d3.select(this)
								 .attr("transform", "rotate("+rotate+","+rotate_x+","+rotate_y+")translate("+(-rotate_x*(icon_scale-1))+", "+(-rotate_y*(icon_scale-1))+")scale("+icon_scale+")")
								 .attr("cx", parseFloat(d3.select(this).attr("data-prevx"))+deltax)
							 	 .attr("cy", parseFloat(d3.select(this).attr("data-prevy"))+deltay);	
						});
					})
					.on('dragend', function() {

					});


var drag_rect =  d3.behavior.drag() 					
					.on('dragstart', function() {	

						d3.selectAll(".control_smile").classed("work", false);

						d3.event.sourceEvent.stopPropagation();

						click_text_control();
				
						newx = parseFloat(d3.select(this).attr("x"));
						newy = parseFloat(d3.select(this).attr("y"));	

						d3.event.sourceEvent.stopPropagation();
						rotate = d3.select(".control_text.rotate_button").attr("data-rotate");
						
						d3.selectAll(".svg_text text, .svg_controls rect.control_text").each(function (d) {
   							 d3.select(this)
								 .attr("data-prevx", parseFloat(d3.select(this).attr("x")))
							 	 .attr("data-prevy", parseFloat(d3.select(this).attr("y")));
 						});
					
						d3.selectAll("circle.control_text").each(function (d) {
							d3.select(this)
								 .attr("data-prevx", parseFloat(d3.select(this).attr("cx")))
							 	 .attr("data-prevy", parseFloat(d3.select(this).attr("cy")));	
						});


						var M = d3.mouse(svg.node());

						prevx = M[0];
						prevy = M[1];
	
					})
					.on('drag', function() {
											
						var dx = (newx+((d3.event.x-((scale_coof-1)/2)*device_width_svg-text_error)-prevx));
						var dy = (newy+((d3.event.y -((scale_coof-1)/2)*device_height_svg)-prevy));


						
						
						console.log(newx+"  "+d3.event.x+" "+prevy);
						console.log(dx);



						var deltax = dx - newx;
							
						var deltay = dy - newy;
						

						
						d3.selectAll(".svg_text text").each(function (d) {
							d3.select(this)
								 .attr("x", parseFloat(d3.select(this).attr("data-prevx"))+deltax)
							 	 .attr("y", parseFloat(d3.select(this).attr("data-prevy"))+deltay);
								
							rotate_x = parseFloat(d3.select(this).attr("data-prevx"))+deltax;
							rotate_y = parseFloat(d3.select(this).attr("data-prevy"))+deltay;
							
							d3.select(this)
								.attr("transform", "rotate("+rotate+","+rotate_x+","+rotate_y+")translate("+(-rotate_x*(icon_scale-1))+", "+(-rotate_y*(icon_scale-1))+")scale("+icon_scale+")"); 
 						});
					
						
					
						check_alert();


						d3.selectAll(".svg_text text")
							 .attr("data-prevx_check", rotate_x)
						 	 .attr("data-prevy_check", rotate_y)
							 .attr("transform", "rotate("+rotate+","+rotate_x+","+rotate_y+")translate("+(-rotate_x*(icon_scale-1))+", "+(-rotate_y*(icon_scale-1))+")scale("+icon_scale+")"); ;


						d3.select("#wood")
							   .attr("patternTransform", "rotate("+(-rotate)+","+rotate_x+","+rotate_y+")translate("+(-rotate_x*(icon_scale-1))+", "+(-rotate_y*(icon_scale-1))+")scale("+icon_scale+")"); 

						rotate_x=rotate_x+((scale_coof-1)/2)*device_width_svg+text_error;
						rotate_y=rotate_y+((scale_coof-1)/2)*device_height_svg;

						
						d3.selectAll(".svg_controls rect.control_text").each(function (d) {
   							 d3.select(this)
							 	 .attr("transform", "rotate("+rotate+","+rotate_x+","+rotate_y+")translate("+(-rotate_x*(icon_scale-1))+", "+(-rotate_y*(icon_scale-1))+")scale("+icon_scale+")")
								 .attr("x", parseFloat(d3.select(this).attr("data-prevx"))+deltax)
							 	 .attr("y", parseFloat(d3.select(this).attr("data-prevy"))+deltay);
 						});
					
						
						d3.selectAll("circle.control_text").each(function (d) {
							d3.select(this)
								 .attr("transform", "rotate("+rotate+","+rotate_x+","+rotate_y+")translate("+(-rotate_x*(icon_scale-1))+", "+(-rotate_y*(icon_scale-1))+")scale("+icon_scale+")")
								 .attr("cx", parseFloat(d3.select(this).attr("data-prevx"))+deltax)
							 	 .attr("cy", parseFloat(d3.select(this).attr("data-prevy"))+deltay);	
						});
						
						
					})
					.on('dragend', function() {
						
					});

var delete_smile = function(){
	var current_smile  = d3.select(this).attr("data-object_id");
	d3.selectAll("."+current_smile).remove();

	if ($(".svg_smiles image").length==0) {
		$("#header-menu-item-6").removeClass("header-menu-active");
	}
	current_smile = "";
};




function check_alert(event) {
	if ($(".alert_out_svg").hasClass("active")) return;
	if (check_coords()===false) {
		$(".alert_out_svg").addClass("active");

		setTimeout(function() { 
			$(".alert_out_svg").removeClass("active");
		}, 1500);
	}else{
		$(".alert_out_svg").removeClass("active");
	}
}


function get_center(id){
	var center = new Array();
	var coords = screenCoordsForRect(document.getElementById(id));	
	var coord_screen = document.getElementById("device").getBoundingClientRect();
	coords.nw.x-=coord_screen.left;
	coords.ne.x-=coord_screen.left;
	coords.se.x-=coord_screen.left;
	coords.sw.x-=coord_screen.left;
	
	coords.nw.y-=coord_screen.top;
	coords.ne.y-=coord_screen.top;
	coords.se.y-=coord_screen.top;
	coords.sw.y-=coord_screen.top;


	return;
}

function check_coords(){
	var coords = screenCoordsForRect(document.getElementById("control_text_rect_appered"));	

	var coord_screen = document.getElementById("device").getBoundingClientRect();
	
	coords.nw.x-=coord_screen.left;
	coords.ne.x-=coord_screen.left;
	coords.se.x-=coord_screen.left;
	coords.sw.x-=coord_screen.left;
	
	coords.nw.y-=coord_screen.top;
	coords.ne.y-=coord_screen.top;
	coords.se.y-=coord_screen.top;
	coords.sw.y-=coord_screen.top;
	


	//nw
	if (((coords.nw.x-0)<0) || ((coords.nw.y-0)<0) || ((coords.nw.x+0)>config.devices[desctop.device_id].width)  || ((coords.nw.y+0)>config.devices[desctop.device_id].height)) {  return false;}
	//ne

	if (((coords.ne.x+0)>config.devices[desctop.device_id].width) || ((coords.ne.y-0)<0)) {  return false;}
	if (((coords.ne.x-0)<0) || ((coords.ne.y+0)>config.devices[desctop.device_id].height)) {  return false;}

	//sw	
	if (((coords.sw.x-0)<0) || ((coords.sw.y+0)>config.devices[desctop.device_id].height)) {  return false;}

	if (((coords.sw.x+0)>config.devices[desctop.device_id].width) || ((coords.sw.y+0)>config.devices[desctop.device_id].height)) {  return false;}



	//se	
	if (((coords.se.x+0)>config.devices[desctop.device_id].width) || ((coords.se.y+0)>config.devices[desctop.device_id].height)) {  return false;}

	if (((coords.se.x-0)<0) || ((coords.se.y-0)<0)) {  return false;}
	
	return true;
}

var svg = document.querySelector('svg');
var pt  = svg.createSVGPoint();


function screenCoordsForRect(rect){
  var corners = {};
  var matrix  = rect.getScreenCTM();
	

  pt.x = rect.x.animVal.value;
  pt.y = rect.y.animVal.value;

  corners.nw = pt.matrixTransform(matrix);
  pt.x += rect.width.animVal.value;
  corners.ne = pt.matrixTransform(matrix);
  pt.y += rect.height.animVal.value;
  corners.se = pt.matrixTransform(matrix);
  pt.x -= rect.width.animVal.value;
  corners.sw = pt.matrixTransform(matrix);
  return corners;
}

var drag_stretch =  d3.behavior.drag() 					
					.on('dragstart', function() {	

						d3.event.sourceEvent.stopPropagation();
						click_text_control();
						newx = parseFloat(d3.select(this).attr("cx"));
						newy = parseFloat(d3.select(this).attr("cy"));
						d3.event.sourceEvent.stopPropagation();
						d3.selectAll(".svg_text text")
							.attr("data-font_size", parseInt(d3.selectAll(".svg_text text").style("font-size")));
						//	.style("font-size", config.desctop_font_size)
						rotate = d3.select(".control_text.rotate_button").attr("data-rotate");
						
						var M = d3.mouse(svg_text.node());
						prevx = M[0];
						prevy = M[1];
						
					})
					.on('drag', function() {
						
						var dx = (newx+((d3.event.x-((scale_coof-1)/2)*device_width_svg-text_error)-prevx));
						var dy = (newy+((d3.event.y -((scale_coof-1)/2)*device_height_svg)-prevy));
						
						var rotate = parseInt(d3.select(".control_text.rotate_button").attr("data-rotate"));
						var deltax = dx - newx;
							
						var deltay = dy - newy;
						
						if ((rotate>150) || (rotate<-30)) {
							deltay = deltay*(-1);
						}
				
						
						if ((parseInt(d3.select(".svg_text text").attr("data-font_size"))-deltay)<10) return;
						d3.selectAll(".svg_text text")
							.style("font-size", (parseInt(d3.select(".svg_text text").attr("data-font_size"))-deltay)+"px");
						desctop.font_size = parseFloat(d3.select(".svg_text text").attr("data-font_size"));
						restart_depend();

					})
					.on('dragend', function() {
						setTimeout(function() { 
							d3.selectAll(".control_text").classed("work", true);
						}, 50);
					});

var smile_height_stretch, smile_width_stretch;



var drag_stretch_smile =  d3.behavior.drag() 					
					.on('dragstart', function() {	
						d3.event.sourceEvent.stopPropagation();

						current_smile = d3.select(this).attr("data-object_id");
						d3.selectAll(".control_smile."+current_smile).classed("work", true);						
						newx = parseFloat(d3.select(this).attr("cx"));
						newy = parseFloat(d3.select(this).attr("cy"));
						d3.event.sourceEvent.stopPropagation();
						
						rotate = d3.select(".control_smile.rotate_button."+current_smile).attr("data-rotate");
						
						var M = d3.mouse(svg_text.node());
						prevx = M[0];
						prevy = M[1];
						smile_width_stretch =  parseFloat($("image."+current_smile).attr("width"));

						smile_height_stretch =  parseFloat($("image."+current_smile).attr("height"));
						
					})
					.on('drag', function() {
						
						var dx = (newx+((d3.event.x-((scale_coof-1)/2)*device_width_svg-text_error)-prevx));
						var dy = (newy+((d3.event.y -((scale_coof-1)/2)*device_height_svg)-prevy));
						
						

						var width_smile = parseFloat(d3.select(".image_smile."+current_smile).attr("width"));
						var height_smile = parseFloat(d3.select(".image_smile."+current_smile).attr("height"));


						var constant = height_smile/width_smile; 
						
						var deltax = dx - newx;
							
						var deltay = dy - newy;

						var rotate = parseInt(d3.select(".control_smile.rotate_button."+current_smile).attr("data-rotate"));

						if ((rotate>40) && (rotate<220)) {
							deltax = deltax*(-1);
						}
				


							
						if (
							(parseInt(d3.select("image."+current_smile).attr("height"))+deltay)<10		
						) return;

						if (
							(parseInt(d3.select("image."+current_smile).attr("height"))+deltax)<10		
						) return;

						d3.select(".image_smile."+current_smile).attr("width", smile_width_stretch + deltax);
						d3.select(".image_smile."+current_smile).attr("height", smile_height_stretch + deltax*constant);


						restart_depend_smile();
					})
					.on('dragend', function() {
						setTimeout(function() { 
							d3.selectAll(".control_smile."+current_smile).classed("work", true);
						}, 50);
						
					});


function restart_depend_smile() {
	var text_width = parseFloat(d3.select(".image_smile."+current_smile).attr("width"));
	var text_height =  parseFloat(d3.select(".image_smile."+current_smile).attr("height"));


	var center = {
		x: parseFloat(d3.select(".image_smile."+current_smile).attr("x"))+((scale_coof-1)/2)*device_width_svg+text_error,
		y:  parseFloat(d3.select(".image_smile."+current_smile).attr("y"))+((scale_coof-1)/2)*device_height_svg
	};


	svg_controls.select("rect.control_smile_main."+current_smile)
		.attr("x", center.x)
		.attr("y", center.y)
		.attr("width", text_width)
		.attr("height", text_height);
		

	svg_controls.select("rect.control_smile_back."+current_smile)
		.attr("x", center.x+3)
		.attr("y", center.y+3)
		.attr("width", text_width-6)
		.attr("height", text_height-6);
		
	svg_controls.select(".move_button."+current_smile)
		.attr("cx", center.x)
		.attr("cy", center.y);

	svg_controls.select(".rotate_button."+current_smile)
		.attr("cx", center.x+text_width)
		.attr("cy", center.y);

	svg_controls.select(".stretch_button."+current_smile)
		.attr("cx", center.x+text_width)
		.attr("cy", center.y+text_height);

	svg_controls.select(".delete_button."+current_smile)
		.attr("cx", center.x)
		.attr("cy", center.y+text_height);
	
}


function restart_depend() {
	
	var el = document.getElementsByTagName('text')[0];
    bbox = el.getBBox();

	var text_width = bbox.width+text_width_constant;
	var text_height = bbox.height+text_height_constant;
	
	var text_x = parseFloat(d3.select(".svg_text text").attr("x"))+((scale_coof-1)/2)*device_width_svg+text_error;
	var text_y =parseFloat(d3.select(".svg_text text").attr("y"))+((scale_coof-1)/2)*device_height_svg;

	svg_controls.select("rect#control_text_rect")
		.attr("width", text_width)
		.attr("height", text_height)
		.attr("x", text_x-text_width/2)
		.attr("y",text_y-text_height/2-5);
		

	svg_controls.select("rect.control_text.doubled_rect")
		.attr("width", text_width-6)
		.attr("height", text_height-6)
		.attr("x", text_x-text_width/2+3)
		.attr("y", text_y-text_height/2-5+3)

	d3.select(".control_text.stretch_button")
		.attr("cx", text_x-text_width/2)
		.attr("cy",  text_y-text_height/2-5);
	
	
	d3.select(".control_text.rotate_button")
		.attr("cx", text_x+text_width/2)
		.attr("cy",  text_y-text_height/2-5);
	
	
	d3.select(".control_text.move_button")
		.attr("cx", text_x)
		.attr("cy",  text_y-text_height/2-5);

	check_alert();
	
}



var randomHash = (function () {
    var letters = 'qwertyuiopasdfghk';
    return function (len) {
        var result = '';
        for (var i=0; i <  len; i++) {
            result += letters[Math.floor(Math.random() * letters.length)];
        };
        return result;
    };
})();



//SVG DOM injection
jQuery(function($){
	$(document).mouseup(function (event){ // событие клика по веб-документу
		var div = $(".control_text"); // тут указываем ID элемента

		if (!div.is(event.target) // если клик был не по нашему блоку
		    && (div.has(event.target).length === 0)
		    && ($(event.target).closest("svg")!==null)) { // и не по его дочерним элементам
			d3.selectAll(".control_text").classed("work", false); // скрываем его
		}
	});
});

jQuery(function($){
	$(document).mouseup(function (event){ // событие клика по веб-документу
		var div = $(".control_smile"); // тут указываем ID элемента
		if (!div.is(event.target) // если клик был не по нашему блоку
		    && (div.has(event.target).length === 0)
		    && ($(event.target).closest("svg")!==null)) { // и не по его дочерним элементам
			d3.selectAll(".control_smile").classed("work", false); // скрываем его
		}
	});
});

jQuery(function($){
	$(document).mouseup(function (event){ // событие клика по веб-документу
		var div = $(".alert_block_item"); // тут указываем ID элемента
		if (!div.is(event.target) // если клик был не по нашему блоку
		   && (div.has(event.target).length === 0)
			) {
			$(".alert_block").removeClass("active");
			
		}
	});
});




function to_down_of_page() {
	var browser_height = $(window).height();
	$("#steps_controller").css("width", $("#right").width());
	$("#gallery_but").css({"top": (browser_height - 2- $("#gallery_but").height() + $(window).scrollTop()), "visibility":"visible" });
	$("#steps_controller").css({"top":  (browser_height- 2- $("#steps_controller").height() + $(window).scrollTop()), "visibility": "visible" });
}

