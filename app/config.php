<?php
global $mail_controls;
$mail_controls = array(
	
	"Host" => 'smtp.yandex.ru',
    "Port" => "25",
    "Username" => 'wisethetwice@yandex.ru',              
    "Password" => '2glvPRO100'                  
  	
);
global $bd_controls; 

$bd_controls = array(
	"dbhost" => "mysql.server",
        // Имя пользователя базы данных 
     "dbuser" => "u11014_ohcasey", 
            // и его пароль 
     "dbpass" => "ohcasey",
            // Имя базы данных, на хостинге или локальной машине 
     "dbname" => "u11014_ohcasey" 
);
//страницы
global $pages; 
$pages= array("main","cart","success");
global $subfunctions;
$subfunctions= array(
	"main" =>array("get_data", "save_img", "add_to_cart", "save_png", "save_svg", "save_png2"),
	"success"=>array() , 
	"cart" =>array("remove_item", "confirm_order", "get_city", "robo_success","robo_fail","robo_result")
 );
//конфиги девайсов
global $config;
$config = array(
		"deliver_cost" => array(
			"self" =>  0, //самовывоз
			"kur_mos" =>  350,
			"kur_rus" =>  650,
			"mail_ru" => 200,  //самовывоз
		),
		//Конфигурации
			"default_text"=>"Введите текст",
			"devices_desctop_path"=>"img/devices/desctop/",
			"devices_library_path"=>"img/devices/library/",
			"patterns_path_big"=>"img/patterns/big/",
			"patterns_path_small"=>"img/patterns/small/",
			"desctop_font_size"=>"25",
			"default_font_color"=>"black",
			"desctop_font_path"=>"fonts/",
			"desctop_bg_path"=>'img/backgrounds/',
			"smiles_path"=>'img/smiles/',
			"desctop_material_path"=>'img/materials/library/',
			"chech_material_path" =>'img/materials/chech/',
			"material_mask_path"=>"img/materials/mask/"	,
			"material_mask_camera"=>"img/materials/camera/",
			"inspire_path"=>"img/inspire/",
		//Картинки inspire
		"inspire" => array(
			"pict1" => "1.png",
			"pict2" => "3.png",
			"pict3" => "10.png",
			"pict4" => "11.png",
			"pict5" => "7.png",
			"pict6" => "8.png",
			"pict7" => "2.png",
			"pict8" => "5.png",
			"pict9" => "6.png",
			"pict10" => "4.png",
			"pict11" => "9.png",
		),
		//Девайсы (номер => девайс)
		"devices"=>array(
			array(
					 "id"=>"iphone6plus", //id важен, так как по нему идет выбор чехла
					 "name"=>"iPhone 6 Plus",
					 "lib_img"=>"device-1.png",
					 "desctop_img"=>"iphone-6-6.png",
					 "width"=>240,
					 "height"=>472,	 
				),
			array(
					   "id"=>"iphone6",	
					   "name"=>"iPhone 6",
					   "lib_img"=>"device-2.png",
					   "desctop_img"=>"iphone-6-6.png",
					   "width"=>240,
					   "height"=>472,
					   "default"=>true
				),
			array(
					   "id"=>"iphone5s",	
					   "name"=>"iPhone 5s",
					   "lib_img"=>"device-3.png",
					   "desctop_img"=>"iphone-5s.png",
					   "width"=>240,
					   "height"=>472,
					   //"default"=>true
				),
			array(
					   "id"=>"iphone5c",		
					   "name"=>"iPhone 5c",
					   "lib_img"=>"device-4.png",
					   "desctop_img"=>"iphone-5c.png",
					   "width"=>240,
					   "height"=>472,
					   //"default"=>true
				),
			array(
					   "id"=>"iphone5",	
					   "name"=>"iPhone 5",
					   "lib_img"=>"device-3.png",
					   "desctop_img"=>"iphone-5s.png",
					   "width"=>240,
					   "height"=>472,
					   //"default"=>true
				),
			
			array(
						"id"=>"iphone4s",		
						"name" => "iPhone 4s",
						"lib_img" => "device-6.png",
						"desctop_img" => "iphone-4s.png",
						"width"=>240,
					    "height"=>472,
					   
        		),
			array(
						 "id"=>"iphone4",		
						 "name" => "iPhone 4",
						 "lib_img" => "device-7.png",
						 "desctop_img" => "iphone-4.png",
						 "width"=>240,
					   	 "height"=>472
				),
		
		),
		/*Материалы*/
		"materials" => array(
			//id device
			"iphone6plus"=>array(
				array(
					"name" => "Crystal clear",
					"descr_1" => "Прозрачный",
					"desctop_mask_2"=>"iphone_6_mask_2.png",
					"descr_2" => "Полностью прозрачный",
					"lib_img" => "iphone6_crystal_icon.png",
					"default"=>true,
					"colors"=> array(
									array(		
										//золотой прозрачный
											"id"=>0,
											"color"=>"#CF9657",
											"desctop_img" => "iphone6_gold_crystal_case.png",
											"desctop_mask" => "iphone6-6+.png", //обрезка
											"desctop_camera" => "iphone6_gold_camera.png",
											"cost"=>1500,
											"default"=>true
									),
									array(	
										//серебристый прозрачный
											"id"=>1,
											"color"=>"#BBBBBB",
											"desctop_img" => "iphone6_silver_crystal_case.png",
											"desctop_mask" => "iphone6-6+.png",
											"desctop_camera" => "iphone6_silver_camera.png",
											"cost"=>1500
									),
									array(	
										//серый прозрачный прозрачный
											"id"=>2,
											"color"=>"#888888",
											"desctop_img" => "iphone6_gray_crystal_case.png",
											"desctop_mask" => "iphone6-6+.png",
											"desctop_camera" => "iphone6_gray_camera.png",
											"cost"=>1500
									),
										
								)
				),
				
				array(
					"name" => "White crystal",
					"descr_1" => "Матовый",
					"descr_2" => "Полупрозрачный чехол",
					"desctop_mask_2"=>"iphone_6_mask_2.png",
					"lib_img" => "iphone6_white_crystal_icon.png",
					"colors"=> array(
									array(		
										//золотой прозрачный
											"id"=>3,
											"color"=>"#CF9657",
											"desctop_img" => "iphone6_gold_whitecrystal_case.png",
											"desctop_mask" => "iphone6-6+.png", //обрезка
											"desctop_camera" => "iphone6_gold_camera.png",
											"cost"=>1500,
											"default"=>true
									),
									array(	
										//серебристый прозрачный
											"id"=>4,
											"color"=>"#BBBBBB",
											"desctop_img" => "iphone6_silver_whitecrystal_case.png",
											"desctop_mask" => "iphone6-6+.png",
											"desctop_camera" => "iphone6_silver_camera.png",
											"cost"=>1500
									),
									array(	
										//серый прозрачный прозрачный
											"id"=>5,
											"color"=>"#888888",
											"desctop_img" => "iphone6_gray_whitecrystal_case.png",
											"desctop_mask" => "iphone6-6+.png",
											"desctop_camera" => "iphone6_gray_camera.png",
											"cost"=>1500
									),
										
								)
				),
				array(
					"name" => "Soft Touch",
					"descr_1" => "матовый белый",
					"descr_2" => "Бархатистый, приятный на ощупь чехол. Аккуратно! Сильно пачкается.",
					"desctop_mask_2"=>"iphone_6_mask_2.png",
					"lib_img" => "iphone6_white_icon.png",
					"colors"=> array(
									//цвет - вид (hex, rgb, transparent или название цвета)
										array(		
											"id"=>6,
											"color"=>"transparent",
											"desctop_img" => "iphone6_white_softtouch_case.png",
											"desctop_mask" => "iphone6-6+.png", //обрезка
											"desctop_camera" => "iphone6_silver_camera.png",
											"cost"=>1500
										)
									
									)
				),
				array(
					"name" => "Soft Touch",
					"descr_1" => "матовый черный",
					"descr_2" => "Бархатистый, приятный на ощупь чехол.",
					"desctop_mask_2"=>"iphone_6_mask_2.png",
					"lib_img" => "iphone6_black_icon.png",
					"default_color"=>"white",
					"colors"=> array(
									//цвет - вид (hex, rgb, transparent или название цвета)
										array(		
											"id"=>7,
											"color"=>"transparent",
											"desctop_img" => "iphone6_black_softtouch_case.png",
											"desctop_mask" => "iphone6-6+.png", //обрезка
											"desctop_camera" => "iphone6_gray_camera.png",
											"cost"=>1500
										)
									
									)
				)
			),
			//id device
			"iphone6"=>array(
								array(
					"name" => "Crystal clear",
					"descr_1" => "Прозрачный",
					"desctop_mask_2"=>"iphone_6_mask_2.png",
					"descr_2" => "Полностью прозрачный",
					"lib_img" => "iphone6_crystal_icon.png",
					"default"=>true,
					"colors"=> array(
									array(		
										//золотой прозрачный
											"id"=>8,
											"color"=>"#CF9657",
											"desctop_img" => "iphone6_gold_crystal_case.png",
											"desctop_mask" => "iphone6-6+.png", //обрезка
											"desctop_camera" => "iphone6_gold_camera.png",
											"cost"=>1500,
											"default"=>true
									),
									array(	
										//серебристый прозрачный
											"id"=>9,
											"color"=>"#BBBBBB",
											"desctop_img" => "iphone6_silver_crystal_case.png",
											"desctop_mask" => "iphone6-6+.png",
											"desctop_camera" => "iphone6_silver_camera.png",
											"cost"=>1500
									),
									array(	
										//серый прозрачный прозрачный
											"id"=>10,
											"color"=>"#888888",
											"desctop_img" => "iphone6_gray_crystal_case.png",
											"desctop_mask" => "iphone6-6+.png",
											"desctop_camera" => "iphone6_gray_camera.png",
											"cost"=>1500
									),
										
								)
				),
				
				array(
					"name" => "White crystal",
					"descr_1" => "Матовый",
					"descr_2" => "Полупрозрачный чехол",
					"desctop_mask_2"=>"iphone_6_mask_2.png",
					"lib_img" => "iphone6_white_crystal_icon.png",
					"colors"=> array(
									array(		
										//золотой прозрачный
											"id"=>11,
											"color"=>"#CF9657",
											"desctop_img" => "iphone6_gold_whitecrystal_case.png",
											"desctop_mask" => "iphone6-6+.png", //обрезка
											"desctop_camera" => "iphone6_gold_camera.png",
											"cost"=>1500,
											"default"=>true
									),
									array(	
										//серебристый прозрачный
											"id"=>12,
											"color"=>"#BBBBBB",
											"desctop_img" => "iphone6_silver_whitecrystal_case.png",
											"desctop_mask" => "iphone6-6+.png",
											"desctop_camera" => "iphone6_silver_camera.png",
											"cost"=>1500
									),
									array(	
										//серый прозрачный прозрачный
											"id"=>13,
											"color"=>"#888888",
											"desctop_img" => "iphone6_gray_whitecrystal_case.png",
											"desctop_mask" => "iphone6-6+.png",
											"desctop_camera" => "iphone6_gray_camera.png",
											"cost"=>1500
									),
										
								)
				),
				array(
					"name" => "Soft Touch",
					"descr_1" => "матовый белый",
					"descr_2" => "Бархатистый, приятный на ощупь чехол. Аккуратно! Сильно пачкается.",
					"desctop_mask_2"=>"iphone_6_mask_2.png",
					"lib_img" => "iphone6_white_icon.png",
					"colors"=> array(
									//цвет - вид (hex, rgb, transparent или название цвета)
										array(		
											"id"=>14,
											"color"=>"transparent",
											"desctop_img" => "iphone6_white_softtouch_case.png",
											"desctop_mask" => "iphone6-6+.png", //обрезка
											"desctop_camera" => "iphone6_silver_camera.png",
											"cost"=>1500
										)
									
									)
				),
				array(
					"name" => "Soft Touch",
					"descr_1" => "матовый черный",
					"descr_2" => "Бархатистый, приятный на ощупь чехол.",
					"desctop_mask_2"=>"iphone_6_mask_2.png",
					"lib_img" => "iphone6_black_icon.png",
					"default_color"=>"white",
					"colors"=> array(
									//цвет - вид (hex, rgb, transparent или название цвета)
										array(		
											"id"=>15,
											"color"=>"transparent",
											"desctop_img" => "iphone6_black_softtouch_case.png",
											"desctop_mask" => "iphone6-6+.png", //обрезка
											"desctop_camera" => "iphone6_gray_camera.png",
											"cost"=>1500
										)
									
									)
				)
			),
			
		
		"iphone5s"=>array(
				/*
				array(
					"name" => "Soft Touch",
					"descr_1" => "Прозрачный",
					"descr_2" => "Полностью прозрачный",
					"lib_img" => "iphone5_5s_crystal_icon.png",
					//"desctop_mask_2"=>"iphone_6_mask_2.png",
					"default"=>true,
					"colors"=> array(
									array(		
											"id"=>8,
											"color"=>"#CF9657",   
											"desctop_img" => "iphone5s_gold_crystal_case.png",
											"desctop_mask" => "iphone5-5s.png", //обрезка
											"desctop_camera" => "iphone5s_gold_camera.png",
											"cost"=>1500,
											"default"=>true
									),
										array(	
											"id"=>9,
											"color"=>"#BBBBBB",
											"desctop_img" => "iphone5s_silver_crystal_case.png",
											"desctop_mask" => "iphone5-5s.png",
											"desctop_camera" => "iphone5s_silver_camera.png",
											"cost"=>1500
										),
										 array(
										 	"id"=>10,
											"color"=>"#888888",
											"desctop_img" => "iphone5s_gray_crystal_case.png",
											"desctop_mask" => "iphone5-5s.png",
											"desctop_camera" => "iphone5s_gray_camera.png",
											"cost"=>1500
										),
									array(		
											"id"=>8,
											"color"=>"#FFFFFF",   
											"desctop_img" => "iphone5_white_crystal_case.png",
											"desctop_mask" => "iphone5-5s.png", //обрезка
											"desctop_camera" => "iphone5_white_camera.png",
											"cost"=>1500,
											"default"=>true
									),
										array(	
											"id"=>9,
											"color"=>"#000000",
											"desctop_img" => "iphone5_black_crystal_case.png",
											"desctop_mask" => "iphone5-5s.png",
											"desctop_camera" => "iphone5_black_camera.png",
											"cost"=>1500
										),
									
								)
				),
				*/
				/* матовый полупрозрачный*/
				array(
					"name" => "Soft Touch",
					"descr_1" => "Полупрозрачный",
					"descr_2" => "Полупрозрачный чехол",
					"lib_img" => "iphone5_5s_white_crystal_icon.png",
					//"desctop_mask_2"=>"iphone_6_mask_2.png",
					"default"=>true,
					"colors"=> array(
									array(		
											"id"=>16,
											"color"=>"#CF9657",   
											"desctop_img" => "iphone5-5s_gold_whitecrystal_case.png",
											"desctop_mask" => "iphone5-5s.png", //обрезка
											"desctop_camera" => "iphone5s_gold_camera.png",
											"cost"=>1500,
											"default"=>true
									),
										array(	
											"id"=>17,
											"color"=>"#BBBBBB",
											"desctop_img" => "iphone5-5s_light_whitecrystal_case.png",
											"desctop_mask" => "iphone5-5s.png",
											"desctop_camera" => "iphone5s_silver_camera.png",
											"cost"=>1500
										),
										 array(
										 	"id"=>18,
											"color"=>"#888888",
											"desctop_img" => "iphone5-5s_dark_whitecrystal_case.png",
											"desctop_mask" => "iphone5-5s.png",
											"desctop_camera" => "iphone5s_gray_camera.png",
											"cost"=>1500
										),
									
									
								)
				),
				array(
					"name" => "Soft Touch",
					"descr_1" => "Матовый белый",
					"descr_2" => "Бархатистый, приятный на ощупь чехол. Аккуратно! Сильно пачкается.",
					"lib_img" => "iphone5_5s_white_icon.png",
					"colors"=> array(
									//цвет - вид (hex, rgb, transparent или название цвета)
										array(	
											"id"=>19,	
											"color"=>"transparent",
											"desctop_img" => "iphone5-5s_white_softtouch_case.png",
											"desctop_mask" => "iphone5-5s.png", //обрезка
											"desctop_camera" => "iphone5_white_camera.png",
											"cost"=>1500
										)
									)
				),
				array(
					"name" => "Soft Touch",
					"descr_1" => "Матовый черный",
					"descr_2" => "Бархатистый, приятный на ощупь чехол..",
					"lib_img" => "iphone5_5s_black_icon.png",
					"default_color"=>"white",
					"colors"=> array(
									//цвет - вид (hex, rgb, transparent или название цвета)
										array(	
											"id"=>20,	
											"color"=>"transparent",
											"desctop_img" => "iphone5-5s_black_softtouch_case.png",
											"desctop_mask" => "iphone5-5s.png", //обрезка
											"desctop_camera" => "iphone5_black_camera.png",
											"cost"=>1500
										)
									)
				),
			
			),
		"iphone5"=>array(
				/*
				array(
					"name" => "Soft Touch",
					"descr_1" => "Прозрачный",
					"descr_2" => "Полностью прозрачный",
					"lib_img" => "iphone5_5s_crystal_icon.png",
					//"desctop_mask_2"=>"iphone_6_mask_2.png",
					"default"=>true,
					"colors"=> array(
									array(		
											"id"=>8,
											"color"=>"#CF9657",   
											"desctop_img" => "iphone5s_gold_crystal_case.png",
											"desctop_mask" => "iphone5-5s.png", //обрезка
											"desctop_camera" => "iphone5s_gold_camera.png",
											"cost"=>1500,
											"default"=>true
									),
										array(	
											"id"=>9,
											"color"=>"#BBBBBB",
											"desctop_img" => "iphone5s_silver_crystal_case.png",
											"desctop_mask" => "iphone5-5s.png",
											"desctop_camera" => "iphone5s_silver_camera.png",
											"cost"=>1500
										),
										 array(
										 	"id"=>10,
											"color"=>"#888888",
											"desctop_img" => "iphone5s_gray_crystal_case.png",
											"desctop_mask" => "iphone5-5s.png",
											"desctop_camera" => "iphone5s_gray_camera.png",
											"cost"=>1500
										),
									array(		
											"id"=>8,
											"color"=>"#FFFFFF",   
											"desctop_img" => "iphone5_white_crystal_case.png",
											"desctop_mask" => "iphone5-5s.png", //обрезка
											"desctop_camera" => "iphone5_white_camera.png",
											"cost"=>1500,
											"default"=>true
									),
										array(	
											"id"=>9,
											"color"=>"#000000",
											"desctop_img" => "iphone5_black_crystal_case.png",
											"desctop_mask" => "iphone5-5s.png",
											"desctop_camera" => "iphone5_black_camera.png",
											"cost"=>1500
										),
									
								)
				),
				*/
				/* матовый полупрозрачный*/
				array(
					"name" => "Soft Touch",
					"descr_1" => "Полупрозрачный",
					"descr_2" => "Полупрозрачный чехол",
					"lib_img" => "iphone5_5s_white_crystal_icon.png",
					//"desctop_mask_2"=>"iphone_6_mask_2.png",
					"default"=>true,
					"colors"=> array(
									array(		
											"id"=>21,
											"color"=>"#CF9657",   
											"desctop_img" => "iphone5-5s_gold_whitecrystal_case.png",
											"desctop_mask" => "iphone5-5s.png", //обрезка
											"desctop_camera" => "iphone5s_gold_camera.png",
											"cost"=>1500,
											"default"=>true
									),
										array(	
											"id"=>22,
											"color"=>"#BBBBBB",
											"desctop_img" => "iphone5-5s_light_whitecrystal_case.png",
											"desctop_mask" => "iphone5-5s.png",
											"desctop_camera" => "iphone5s_silver_camera.png",
											"cost"=>1500
										),
										 array(
										 	"id"=>23,
											"color"=>"#888888",
											"desctop_img" => "iphone5-5s_dark_whitecrystal_case.png",
											"desctop_mask" => "iphone5-5s.png",
											"desctop_camera" => "iphone5s_gray_camera.png",
											"cost"=>1500
										),
									
									
								)
				),
				array(
					"name" => "Soft Touch",
					"descr_1" => "Матовый белый",
					"descr_2" => "Бархатистый, приятный на ощупь чехол. Аккуратно! Сильно пачкается.",
					"lib_img" => "iphone5_5s_white_icon.png",
					"colors"=> array(
									//цвет - вид (hex, rgb, transparent или название цвета)
										array(	
											"id"=>24,	
											"color"=>"transparent",
											"desctop_img" => "iphone5-5s_white_softtouch_case.png",
											"desctop_mask" => "iphone5-5s.png", //обрезка
											"desctop_camera" => "iphone5_white_camera.png",
											"cost"=>1500
										)
									)
				),
				array(
					"name" => "Soft Touch",
					"descr_1" => "Матовый черный",
					"descr_2" => "Бархатистый, приятный на ощупь чехол..",
					"lib_img" => "iphone5_5s_black_icon.png",
					"default_color"=>"white",
					"colors"=> array(
									//цвет - вид (hex, rgb, transparent или название цвета)
										array(	
											"id"=>25,	
											"color"=>"transparent",
											"desctop_img" => "iphone5-5s_black_softtouch_case.png",
											"desctop_mask" => "iphone5-5s.png", //обрезка
											"desctop_camera" => "iphone5_black_camera.png",
											"cost"=>1500
										)
									)
				),
			
			),
		"iphone5c"=>array(
				/*
				array(
					"name" => "Soft Touch",
					"descr_1" => "Прозрачный",
					"descr_2" => "Полностью прозрачный",
					"lib_img" => "iphone5c_crystal_icon.png",
					//"desctop_mask_2"=>"iphone_6_mask_2.png",
					"default"=>true,
					"colors"=> array(
									array(		
											"id"=>8,
											"color"=>"#0000FF",   
											"desctop_img" => "iphone5c_blue_crystal_case.png",
											"desctop_mask" => "iphone5c.png", //обрезка
											"desctop_camera" => "iphone5c_blue_camera.png",
											"cost"=>1500,
											"default"=>true
									),
										array(	
											"id"=>9,
											"color"=>"#00FF00",   
											"desctop_img" => "iphone5c_green_crystal_case.png",
											"desctop_mask" => "iphone5c.png", //обрезка
											"desctop_camera" => "iphone5c_green_camera.png",
											"cost"=>1500,
											"default"=>true
										),
										 array(
										 	"id"=>10,
											"color"=>"#FF0011",
											"desctop_img" => "iphone5c_red_crystal_case.png",
											"desctop_mask" => "iphone5c.png", //обрезка
											"desctop_camera" => "iphone5c_red_camera.png",
											"cost"=>1500
										),
									array(		
											"id"=>8,
											"color"=>"yellow",   
											"desctop_img" => "iphone5c_yellow_crystal_case.png",
											"desctop_mask" => "iphone5c.png", //обрезка
											"desctop_camera" => "iphone5c_yellow_camera.png",
											"cost"=>1500,
											"default"=>true
									),
										array(	
											"id"=>9,
											"color"=>"#FFFFFF",
											"desctop_img" => "iphone5c_white_crystal_case.png",
											"desctop_mask" => "iphone5c.png", //обрезка
											"desctop_camera" => "iphone5c_white_camera.png",
											"cost"=>1500
										),
									
								)
				),
				/* матовый полупрозрачный*/
				/*
				array(
					"name" => "Soft Touch",
					"descr_1" => "Полупрозрачный",
					"descr_2" => "Полупрозрачный чехол",
					"lib_img" => "iphone5c_white_crystal_icon.png",
					//"desctop_mask_2"=>"iphone_6_mask_2.png",
					"default"=>true,
					"colors"=> array(
									array(		
											"id"=>8,
											"color"=>"#0000FF",   
											"desctop_img" => "iphone5c_blue_whitecrystal_case.png",
											"desctop_mask" => "iphone5c.png", //обрезка
											"desctop_camera" => "iphone5c_blue_camera.png",
											"cost"=>1500,
											"default"=>true
									),
										array(	
											"id"=>9,
											"color"=>"#00FF00",   
											"desctop_img" => "iphone5c_green_whitecrystal_case.png",
											"desctop_mask" => "iphone5c.png", //обрезка
											"desctop_camera" => "iphone5c_green_camera.png",
											"cost"=>1500,
											"default"=>true
										),
										 array(
										 	"id"=>10,
											"color"=>"#FF0011",
											"desctop_img" => "iphone5c_red_whitecrystal_case.png",
											"desctop_mask" => "iphone5c.png", //обрезка
											"desctop_camera" => "iphone5c_red_camera.png",
											"cost"=>1500
										),
									array(		
											"id"=>8,
											"color"=>"yellow",   
											"desctop_img" => "iphone5c_yellow_whitecrystal_case.png",
											"desctop_mask" => "iphone5c.png", //обрезка
											"desctop_camera" => "iphone5c_yellow_camera.png",
											"cost"=>1500,
											"default"=>true
									),
										array(	
											"id"=>9,
											"color"=>"#FFFFFF",
											"desctop_img" => "iphone5c_white_crystal_case.png",
											"desctop_mask" => "iphone5c.png", //обрезка
											"desctop_camera" => "iphone5c_white_camera.png",
											"cost"=>1500
										),
									
									
								)
				),
				array(
					"name" => "Soft Touch",
					"descr_1" => "Матовый белый",
					"descr_2" => "Бархатистый, приятный на ощупь чехол. Аккуратно! Сильно пачкается.",
					"lib_img" => "iphone5c_white_icon.png",
					"colors"=> array(
									//цвет - вид (hex, rgb, transparent или название цвета)
										array(	
											"id"=>11,	
											"color"=>"transparent",
											"desctop_img" => "iphone5c_white_softtouch_case.png",
											"desctop_mask" => "iphone5c.png", //обрезка
											"desctop_camera" => "iphone5c_white_camera.png",
											"cost"=>1500
										)
									)
				),
				*/
				array(
					"name" => "Soft Touch",
					"descr_1" => "Матовый черный",
					"descr_2" => "Бархатистый, приятный на ощупь чехол..",
					"lib_img" => "iphone5c_black_icon.png",
					"default_color"=>"white",
					"colors"=> array(
									array(		
											"id"=>26,
											"color"=>"#0000FF",   
											"desctop_img" => "iphone5c_black_softtouch_case.png",
											"desctop_mask" => "iphone5c.png", //обрезка
											"desctop_camera" => "iphone5c_blue_camera.png",
											"cost"=>1500,
											"default"=>true
									),
										array(	
											"id"=>27,
											"color"=>"#00FF00",   
											"desctop_img" => "iphone5c_black_softtouch_case.png",
											"desctop_mask" => "iphone5c.png", //обрезка
											"desctop_camera" => "iphone5c_green_camera.png",
											"cost"=>1500,
											"default"=>true
										),
										 array(
										 	"id"=>28,
											"color"=>"#FF0011",
											"desctop_img" => "iphone5c_black_softtouch_case.png",
											"desctop_mask" => "iphone5c.png", //обрезка
											"desctop_camera" => "iphone5c_red_camera.png",
											"cost"=>1500
										),
									array(		
											"id"=>29,
											"color"=>"yellow",   
											"desctop_img" => "iphone5c_black_softtouch_case.png",
											"desctop_mask" => "iphone5c.png", //обрезка
											"desctop_camera" => "iphone5c_yellow_camera.png",
											"cost"=>1500,
											"default"=>true
									),
										array(	
											"id"=>30,
											"color"=>"#FFFFFF",
											"desctop_img" => "iphone5c_black_softtouch_case.png",
											"desctop_mask" => "iphone5c.png", //обрезка
											"desctop_camera" => "iphone5c_white_camera.png",
											"cost"=>1500
										),
									
									
								)
				),
			),
/*
iphone4s_white_crystal_case.png
iphone4s_black_crystal_case.png
iphone4-4s_white_whitecrystal_case.png
iphone4-4s_black_whitecrystal_case.png
iphone4-4s_white_softtouch_case.png
iphone4-4s_black_softtouch_case.png
iphone4_white_crystal_case.png
iphone4_black_crystal_case.png
*/
		"iphone4s"=>array(
				/* прозрачный */
				/*
				array(
					"name" => "Soft Touch",
					"descr_1" => "Прозрачный",
					"descr_2" => "Полностью прозрачный",
					"lib_img" => "iphone4_4s_crystal_icon.png",
					//"desctop_mask_2"=>"iphone_6_mask_2.png",
					"default"=>true,
					"colors"=> array(
							array(		
								"id"=>8,
								"color"=>"#FFFFFF",   
								"desctop_img" => "iphone4s_white_crystal_case.png",
								"desctop_mask" => "iphone4-4s.png", //обрезка
								"desctop_camera" => "iphone4s_white_camera.png",
								"cost"=>1500,
								"default"=>true
							),
							array(	
								"id"=>9,
								"color"=>"#000000",
								"desctop_img" => "iphone4s_black_crystal_case.png",
								"desctop_mask" => "iphone4-4s.png", //обрезка
								"desctop_camera" => "iphone4s_black_camera.png",
								"cost"=>1500
							)
						)
					),
				*/	
				/* матовый полупрозрачный*/
				/*
				array(
					"name" => "Soft Touch",
					"descr_1" => "Полупрозрачный",
					"descr_2" => "Полупрозрачный чехол",
					"lib_img" => "iphone4_4s_white_crystal_icon.png",
					//"desctop_mask_2"=>"iphone_6_mask_2.png",
					"default"=>true,
					"colors"=> array(
							array(		
								"id"=>8,
								"color"=>"#FFFFFF",   
								"desctop_img" => "iphone4-4s_white_whitecrystal_case.png",
								"desctop_mask" => "iphone4-4s.png", //обрезка
								"desctop_camera" => "iphone4s_white_camera.png",
								"cost"=>1500,
								"default"=>true
							),
							array(	
								"id"=>9,
								"color"=>"#000000",
								"desctop_img" => "iphone4-4s_black_whitecrystal_case.png",
								"desctop_mask" => "iphone4-4s.png", //обрезка
								"desctop_camera" => "iphone4s_black_camera.png",
								"cost"=>1500
							)
						)
					),
				*/
				array(
					"name" => "Soft Touch",
					"descr_1" => "Матовый белый",
					"descr_2" => "Бархатистый, приятный на ощупь чехол. Аккуратно! Сильно пачкается.",
					"lib_img" => "iphone4_4s_white_icon.png",
					"default"=>true,
					"colors"=> array(
						//цвет - вид (hex, rgb, transparent или название цвета)
							array(	
								"id"=>31,	
								"color"=>"transparent",
								"desctop_img" => "iphone4-4s_white_softtouch_case.png",
								"desctop_mask" => "iphone4-4s.png", //обрезка
								"desctop_camera" => "iphone4s_white_camera.png",
								"cost"=>1500,
								"default"=>true
							)
						)
				),
				array(
					"name" => "Soft Touch",
					"descr_1" => "Матовый черный",
					"descr_2" => "Бархатистый, приятный на ощупь чехол..",
					"lib_img" => "iphone4_4s_black_icon.png",
					"default_color"=>"white",
					"colors"=> array(
						//цвет - вид (hex, rgb, transparent или название цвета)
							array(	
								"id"=>32,	
								"color"=>"transparent",
								"desctop_img" => "iphone4-4s_black_softtouch_case.png",
								"desctop_mask" => "iphone4-4s.png", //обрезка
								"desctop_camera" => "iphone4s_black_camera.png",
								"cost"=>1500
							)
						)
				),
			),
		"iphone4"=>array(
				/* прозрачный */
				/*
				array(
					"name" => "Soft Touch",
					"descr_1" => "Прозрачный",
					"descr_2" => "Полностью прозрачный",
					"lib_img" => "iphone4_4s_crystal_icon.png",
					//"desctop_mask_2"=>"iphone_6_mask_2.png",
					"default"=>true,
					"colors"=> array(
							array(		
								"id"=>8,
								"color"=>"#FFFFFF",   
								"desctop_img" => "iphone4_white_crystal_case.png",
								"desctop_mask" => "iphone4-4s.png", //обрезка
								"desctop_camera" => "iphone4s_white_camera.png",
								"cost"=>1500,
								"default"=>true
							),
							array(	
								"id"=>9,
								"color"=>"#000000",
								"desctop_img" => "iphone4_black_crystal_case.png",
								"desctop_mask" => "iphone4-4s.png", //обрезка
								"desctop_camera" => "iphone4s_black_camera.png",
								"cost"=>1500
							)
						)
					),
				*/
				/* матовый полупрозрачный*/
				/*
				array(
					"name" => "Soft Touch",
					"descr_1" => "Полупрозрачный",
					"descr_2" => "Полупрозрачный чехол",
					"lib_img" => "iphone4_4s_white_crystal_icon.png",
					//"desctop_mask_2"=>"iphone_6_mask_2.png",
					"default"=>true,
					"colors"=> array(
							array(		
								"id"=>8,
								"color"=>"#FFFFFF",   
								"desctop_img" => "iphone4-4s_white_whitecrystal_case.png",
								"desctop_mask" => "iphone4-4s.png", //обрезка
								"desctop_camera" => "iphone4s_white_camera.png",
								"cost"=>1500,
								"default"=>true
							),
							array(	
								"id"=>9,
								"color"=>"#000000",
								"desctop_img" => "iphone4-4s_black_whitecrystal_case.png",
								"desctop_mask" => "iphone4-4s.png", //обрезка
								"desctop_camera" => "iphone4s_black_camera.png",
								"cost"=>1500
							)
						)
					),
				*/	
				array(
					"name" => "Soft Touch",
					"descr_1" => "Матовый белый",
					"descr_2" => "Бархатистый, приятный на ощупь чехол. Аккуратно! Сильно пачкается.",
					"lib_img" => "iphone4_4s_white_icon.png",
					"default"=>true,
					"colors"=> array(
						//цвет - вид (hex, rgb, transparent или название цвета)
							array(	
								"id"=>33,	
								"color"=>"transparent",
								"desctop_img" => "iphone4-4s_white_softtouch_case.png",
								"desctop_mask" => "iphone4-4s.png", //обрезка
								"desctop_camera" => "iphone4s_white_camera.png",
								"cost"=>1500
							)
						)
				),
				array(
					"name" => "Soft Touch",
					"descr_1" => "Матовый черный",
					"descr_2" => "Бархатистый, приятный на ощупь чехол..",
					"lib_img" => "iphone4_4s_black_icon.png",
					"default_color"=>"white",
					"colors"=> array(
						//цвет - вид (hex, rgb, transparent или название цвета)
							array(	
								"id"=>34,	
								"color"=>"transparent",
								"desctop_img" => "iphone4-4s_black_softtouch_case.png",
								"desctop_mask" => "iphone4-4s.png", //обрезка
								"desctop_camera" => "iphone4s_black_camera.png",
								"cost"=>1500
							)
						)
				),
			),
			
		), 
		//Цвета текста
		"colors" => array(
			array("#000000"),
			array("#989898"),
			array("#ffffff"),
			array("#181c90"),
			array("#3539a6"),
			array("#676abc"),
			array("#0d7cc3"),
			array("#6eafdb"),
			array("#d00349"),
			array("#e26891"),
			array("#a0a61a"),
			array("#d5dd23"),
			array("#5a9125"),
			array("#9bbd7c"),
			array("#9380"),
			array("#98e7dd"),
			array("#2ea2cd"),
			array("#abdaeb"),
			array("#90278d"),
			array("#9c1f63"),
			array("#550460"),
			array("#e91000"),
			array("#7a4407"),
			array("#efa3bd"),
			array("#f6d1dd"),
			array("#fdba33"),
			array("#fed685"),
			array("#fff336"),
			array("#ef5a29"),
			array("#f9cbbc"),
			array("#3d0d73"),
			array("#7a1ae4"),
			array("#00460a"),
			array("#668f6c"),
			array("#a2bed8"),
			array("#ecca48"),
			array("#d60c00"),
			array("#d4ef10"),
			array("#c1c66c"),
			array("#ae8e6a"),
			array("#f2805a"),
			array("#d57307"),
			array("#c4deec"),
			array("#da4437"),
			array("#0f5aba"),
			array("#3212d6"),
			array("#29efd8"),
			array("#c61f83"),
			array("#cbcbcb"),
			array("#510600"),
				
		),
		"fonts"=> array(
/*
				array(
						"name" => "AG Letterica Extra",
						"filename" => "aglettericaextracompressed-roman.ttf"
					),
*/
				array(
						"name" => "Angilla Tattoo",
						"filename" => "AngillaTattoo.ttf",
						"default"=>true
					),
				array(
						"name" => "Bira",
						"filename" => "Bira.ttf"
					),
				array(
						"name" => "Jellyka Love and Passion",
						"filename" =>"Jellyka_Love_and_Passion.ttf"
					),
				 array(
						"name" => "Mari and David",
						"filename" => "mari_and_david.ttf"
					),
				array(
						"name" => "Mustang",
						"filename" => "Mustang.otf"
					),
				array(
						"name" => "Simply Glamorous",
						"filename" => "SimplyGlamorous.ttf"
					),
				array(
						"name" => "Snappy Dna",
						"filename" => "snappy_dna.ttf"
					),
				array(
						"name" => "Waltograph",
						"filename" => "Waltograph.ttf"
					),
				/*
				array(
						"name" => "Helvetica NeueCyr Medium",
						"filename" => "HelveticaNeueCyr_Medium.otf"
					),
				array(
						"name" => "Helvetica NeueCyr Roman",
						"filename" => "HelveticaNeueCyr-Roman.otf"
					),
				*/	
				/*
				array(
						"name" => "League Gothic Condensed Italic",
						"filename" =>"LeagueGothic-CondensedItalic.otf"
					),
				*/	
				array(
						"name" => "League Gothic Condensed Regular",
						"filename" => "LeagueGothic-CondensedRegular.otf"
					),
				 array(
						"name" => "League Gothic Italic",
						"filename" => "LeagueGothic-Italic.otf"
					), 
				array(
						"name" => "League Gothic Regular",
						"filename" => "LeagueGothic-Regular.otf"
					),
				array(
						"name" => "Feathergraphy Decoration",
						"filename" => "2UJOKon2.ttf"
					),
				array(
						"name" => "AGLettericaExtraCompressed",
						"filename" => "aglettericaextracompressed-roman.otf"
					),
				array(
						"name" => "MA Sexy",
						"filename" => "gG6vljsL.ttf"
					),
				array(
						"name" => "Remachine Script",
						"filename" => "hFMl9DJx.ttf"
					),
				array(
						"name" => "Nautilus Pompilius",
						"filename" => "kBifv4lp.otf"
					),
				array(
						"name" => "Odessa Script",
						"filename" => "kDv32tul.otf"
					),

		),
		
		"backgrounds" => array(
			array(
				"link"=>"1/",
				"name"=>"категория 1",
				array( 
					//iphone 4

					array("big"=>"4-4s/bembi_i4-4s.png",
					"small"=>"bembi_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/devochka_i4-4s.png",
					"small"=>"devochka_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/dior_kedy_i4-4s.png",
					"small"=>"dior_kedy_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/duhi_v_ruke_i4-4s.png",
					"small"=>"duhi_v_ruke_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/edinorog_i4-4s.png",
					"small"=>"edinorog_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/edinorog2_i4-4s.png",
					"small"=>"edinorog2_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/fashion_i4-4s.png",
					"small"=>"fashion_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/fendi_i4-4s.png",
					"small"=>"fendi_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/karl_i4-4s.png",
					"small"=>"karl_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/katava_i4-4s.png",
					"small"=>"katava_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/koko_madm_i4-4s.png",
					"small"=>"koko_madm_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/Lubuteny_i4-4s.png",
					"small"=>"Lubuteny_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/makaruny_i4-4s.png",
					"small"=>"makaruny_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/manolo_i4-4s.png",
					"small"=>"manolo_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/miss_dior_i4-4s.png",
					"small"=>"miss_dior_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/nike_i4-4s.png",
					"small"=>"nike_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/palmy_i4-4s.png",
					"small"=>"palmy_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/paris_i4-4s.png",
					"small"=>"paris_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/pomada_mac_i4-4s.png",
					"small"=>"pomada_mac_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/pomada2_i4-4s.png",
					"small"=>"pomada2_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/rozy_i4-4s.png",
					"small"=>"rozy_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/ryukzak_i4-4s.png",
					"small"=>"ryukzak_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/sakura_i4-4s.png",
					"small"=>"sakura_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/tufli_valentino_i4-4s.png",
					"small"=>"tufli_valentino_r82.png","chechs"=>array(31,32,33,34)),

					

					//iphone5
					array("big"=>"5-5s-5c/donuts_i5-5s-5c.png",
					"small"=>"donuts_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30)),
					array("big"=>"5-5s-5c/mickey_i5-5s-5c.png",
					"small"=>"mickey_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30)),
					array("big"=>"5-5s-5c/minnie_i5-5s-5c.png",
					"small"=>"minnie_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30)),
					

					array("big"=>"5-5s-5c/bembi_i5-5s-5c.png",
					"small"=>"bembi_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30)),
					array("big"=>"5-5s-5c/devochka_i5-5s-5c.png",
					"small"=>"devochka_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30)),
					array("big"=>"5-5s-5c/dior_kedy_i5-5s-5c.png",
					"small"=>"dior_kedy_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30)),
					array("big"=>"5-5s-5c/duhi_v_ruke_i5-5s-5c.png",
					"small"=>"duhi_v_ruke_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30)),
					array("big"=>"5-5s-5c/edinorog_i5-5s-5c.png",
					"small"=>"edinorog_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30)),
					array("big"=>"5-5s-5c/edinorog2_i5-5s-5c.png",
					"small"=>"edinorog2_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30)),
					array("big"=>"5-5s-5c/fashion_i5-5s-5c.png",
					"small"=>"fashion_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30)),
					array("big"=>"5-5s-5c/fendi_i5-5s-5c.png",
					"small"=>"fendi_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30)),
					array("big"=>"5-5s-5c/karl_i5-5s-5c.png",
					"small"=>"karl_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30)),
					array("big"=>"5-5s-5c/katava_i5-5s-5c.png",
					"small"=>"katava_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30)),
					array("big"=>"5-5s-5c/koko_madm_i5-5s-5c.png",
					"small"=>"koko_madm_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30)),
					array("big"=>"5-5s-5c/Lubuteny_i5-5s-5c.png",
					"small"=>"Lubuteny_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30)),
					array("big"=>"5-5s-5c/makaruny_i5-5s-5c.png",
					"small"=>"makaruny_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30)),
					array("big"=>"5-5s-5c/manolo_i5-5s-5c.png",
					"small"=>"manolo_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30)),
					array("big"=>"5-5s-5c/miss_dior_i5-5s-5c.png",
					"small"=>"miss_dior_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30)),
					array("big"=>"5-5s-5c/nike_i5-5s-5c.png",
					"small"=>"nike_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30)),
					array("big"=>"5-5s-5c/palmy_i5-5s-5c.png",
					"small"=>"palmy_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30)),
					array("big"=>"5-5s-5c/paris_i5-5s-5c.png",
					"small"=>"paris_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30)),
					array("big"=>"5-5s-5c/pomada_mac_i5-5s-5c.png",
					"small"=>"pomada_mac_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30)),
					array("big"=>"5-5s-5c/pomada2_i5-5s-5c.png",
					"small"=>"pomada2_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30)),
					array("big"=>"5-5s-5c/rozy_i5-5s-5c.png",
					"small"=>"rozy_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30)),
					array("big"=>"5-5s-5c/ryukzak_i5-5s-5c.png",
					"small"=>"ryukzak_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30)),
					array("big"=>"5-5s-5c/sakura_i5-5s-5c.png",
					"small"=>"sakura_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30)),
					array("big"=>"5-5s-5c/tufli_valentino_i5-5s-5c.png",
					"small"=>"tufli_valentino_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30)),

					//iphone6
					array("big"=>"5-5s-5c/donuts_i6-6+.png",
					"small"=>"donuts_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15)),
					array("big"=>"5-5s-5c/mickey_i6-6+.png",
					"small"=>"mickey_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15)),
					array("big"=>"5-5s-5c/minnie_i6-6+.png",
					"small"=>"minnie_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15)),

					array("big"=>"6-6+/bembi_i6-6+.png",
					"small"=>"bembi_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15)),
					array("big"=>"6-6+/devochka_i6-6+.png",
					"small"=>"devochka_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15)),
					array("big"=>"6-6+/dior_kedy_i6-6+.png",
					"small"=>"dior_kedy_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15)),
					array("big"=>"6-6+/duhi_v_ruke_i6-6+.png",
					"small"=>"duhi_v_ruke_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15)),
					array("big"=>"6-6+/edinorog_i6-6+.png",
					"small"=>"edinorog_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15)),
					array("big"=>"6-6+/edinorog2_i6-6+.png",
					"small"=>"edinorog2_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15)),
					array("big"=>"6-6+/fashion_i6-6+.png",
					"small"=>"fashion_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15)),
					array("big"=>"6-6+/fendi_i6-6+.png",
					"small"=>"fendi_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15)),
					array("big"=>"6-6+/karl_i6-6+.png",
					"small"=>"karl_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15)),
					array("big"=>"6-6+/katava_i6-6+.png",
					"small"=>"katava_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15)),
					array("big"=>"6-6+/koko_madm_i6-6+.png",
					"small"=>"koko_madm_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15)),
					array("big"=>"6-6+/Lubuteny_i6-6+.png",
					"small"=>"Lubuteny_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15)),
					array("big"=>"6-6+/makaruny_i6-6+.png",
					"small"=>"makaruny_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15)),
					array("big"=>"6-6+/manolo_i6-6+.png",
					"small"=>"manolo_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15)),
					array("big"=>"6-6+/miss_dior_i6-6+.png",
					"small"=>"miss_dior_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15)),
					array("big"=>"6-6+/nike_i6-6+.png",
					"small"=>"nike_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15)),
					array("big"=>"6-6+/palmy_i6-6+.png",
					"small"=>"palmy_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15)),
					array("big"=>"6-6+/paris_i6-6+.png",
					"small"=>"paris_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15)),
					array("big"=>"6-6+/pomada_mac_i6-6+.png",
					"small"=>"pomada_mac_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15)),
					array("big"=>"6-6+/pomada2_i6-6+.png",
					"small"=>"pomada2_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15)),
					array("big"=>"6-6+/rozy_i6-6+.png",
					"small"=>"rozy_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15)),
					array("big"=>"6-6+/ryukzak_i6-6+.png",
					"small"=>"ryukzak_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15)),
					array("big"=>"6-6+/sakura_i6-6+.png",
					"small"=>"sakura_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15)),
					array("big"=>"6-6+/tufli_valentino_i6-6+.png",
					"small"=>"tufli_valentino_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15)),
				)
			),
			array(
				"link"=>"2/",
				"name"=>"категория 2",
				array( 
					/*
					array(
						"big"=>"1.png",
						"small"=>"1_r82.png"
					),
					array(
						"big"=>"bg1.jpg",
						"small"=>"bg1.jpg"
					),
					array(
						"big"=>"bg1.jpg",
						"small"=>"bg1.jpg"
					),
					array(
						"big"=>"bg1.jpg",
						"small"=>"bg1.jpg"
					),
					array(
						"big"=>"bg1.jpg",
						"small"=>"bg1.jpg"
					),
					array(
						"big"=>"bg1.jpg",
						"small"=>"bg1.jpg"
					),
					array(
						"big"=>"bg1.jpg",
						"small"=>"bg1.jpg"
					),
					array(
						"big"=>"bg1.jpg",
						"small"=>"bg1.jpg"
					),
					array(
						"big"=>"bg1.jpg",
						"small"=>"bg1.jpg"
					),
					array(
						"big"=>"bg1.jpg",
						"small"=>"bg1.jpg"
					),
					array(
						"big"=>"bg1.jpg",
						"small"=>"bg1.jpg"
					)
					*/
				)
			),
			array(
				"link"=>"3/",
				"name"=>"категория 3",
				array( 
					/*
					array(
						"big"=>"bg1.jpg",
						"small"=>"bg1.jpg"
					),
					array(
						"big"=>"bg1.jpg",
						"small"=>"bg1.jpg"
					),
					array(
						"big"=>"bg1.jpg",
						"small"=>"bg1.jpg"
					),
					array(
						"big"=>"bg1.jpg",
						"small"=>"bg1.jpg"
					),
					array(
						"big"=>"bg1.jpg",
						"small"=>"bg1.jpg"
					),
					array(
						"big"=>"bg1.jpg",
						"small"=>"bg1.jpg"
					),
					array(
						"big"=>"bg1.jpg",
						"small"=>"bg1.jpg"
					),
					array(
						"big"=>"bg1.jpg",
						"small"=>"bg1.jpg"
					),
					array(
						"big"=>"bg1.jpg",
						"small"=>"bg1.jpg"
					),
					array(
						"big"=>"bg1.jpg",
						"small"=>"bg1.jpg"
					),
					array(
						"big"=>"bg1.jpg",
						"small"=>"bg1.jpg"
					)
					*/
				)
			),
			array(
				"link"=>"4/",
				"name"=>"категория 4",
				array( 
					/*
					array(
						"big"=>"bg1.jpg",
						"small"=>"bg1.jpg"
					),
					array(
						"big"=>"bg1.jpg",
						"small"=>"bg1.jpg"
					),
					array(
						"big"=>"bg1.jpg",
						"small"=>"bg1.jpg"
					),
					array(
						"big"=>"bg1.jpg",
						"small"=>"bg1.jpg"
					),
					array(
						"big"=>"bg1.jpg",
						"small"=>"bg1.jpg"
					),
					array(
						"big"=>"bg1.jpg",
						"small"=>"bg1.jpg"
					),
					array(
						"big"=>"bg1.jpg",
						"small"=>"bg1.jpg"
					),
					array(
						"big"=>"bg1.jpg",
						"small"=>"bg1.jpg"
					),
					array(
						"big"=>"bg1.jpg",
						"small"=>"bg1.jpg"
					),
					array(
						"big"=>"bg1.jpg",
						"small"=>"bg1.jpg"
					),
					array(
						"big"=>"bg1.jpg",
						"small"=>"bg1.jpg"
					)
					*/
				)
			),
			array(
				"link"=>"5/",
				"name"=>"категория 5",
				array( 
					/*
					array(
						"big"=>"bg1.jpg",
						"small"=>"bg1.jpg"
					),
					array(
						"big"=>"bg1.jpg",
						"small"=>"bg1.jpg"
					),
					array(
						"big"=>"bg1.jpg",
						"small"=>"bg1.jpg"
					),
					array(
						"big"=>"bg1.jpg",
						"small"=>"bg1.jpg"
					),
					array(
						"big"=>"bg1.jpg",
						"small"=>"bg1.jpg"
					),
					array(
						"big"=>"bg1.jpg",
						"small"=>"bg1.jpg"
					),
					array(
						"big"=>"bg1.jpg",
						"small"=>"bg1.jpg"
					),
					array(
						"big"=>"bg1.jpg",
						"small"=>"bg1.jpg"
					),
					array(
						"big"=>"bg1.jpg",
						"small"=>"bg1.jpg"
					),
					array(
						"big"=>"bg1.jpg",
						"small"=>"bg1.jpg"
					),
					array(
						"big"=>"bg1.jpg",
						"small"=>"bg1.jpg"
					)
					*/
				)
			)
		),
		"paterns"=> array(
			array(
				"big"=>"1.png",
				"small"=>"r63_1.png"
				),
			/*
			array(
				"big"=>"2.png",
				"small"=>"r63_2.png"
				),
			array(
				"big"=>"3.png",
				"small"=>"r63_3.png"
				),
			array(
				"big"=>"4.png",
				"small"=>"r63_4.png"
				),
			array(
				"big"=>"5.png",
				"small"=>"r63_5.png"
				),
			array(
				"big"=>"6.png",
				"small"=>"r63_6.png"
				),
			array(
				"big"=>"7.png",
				"small"=>"r63_7.png"
				),
			array(
				"big"=>"8.png",
				"small"=>"r63_8.png"
				),
			array(
				"big"=>"9.png",
				"small"=>"r63_2.png"
				),
			array(
				"big"=>"10.png",
				"small"=>"r63_9.png"
				),
			array(
				"big"=>"11.png",
				"small"=>"r63_11.png"
				),
			array(
				"big"=>"12.png",
				"small"=>"r63_12.png"
				),
			array(
				"big"=>"13.png",
				"small"=>"r63_13.png"
				),
			array(
				"big"=>"14.png",
				"small"=>"r63_14.png"
				),
			array(
				"big"=>"15.png",
				"small"=>"r63_15.png"
				),
			array(
				"big"=>"16.png",
				"small"=>"r63_16.png"
				),
			array(
				"big"=>"17.png",
				"small"=>"r63_17.png"
				),
			array(
				"big"=>"18.png",
				"small"=>"r63_18.png"
				),
			array(
				"big"=>"19.png",
				"small"=>"r63_19.png"
				),
			array(
				"big"=>"20.png",
				"small"=>"r63_20.png"
				),
			array(
				"big"=>"21.png",
				"small"=>"r63_21.png"
				),
				*/	
		),
		"smiles"=>array(
/*
*/			array(
				"link"=>"people/",
				"name"=>"Люди",
				"images"=>array(
					

array("big"=>"persons-0001_large.png",
"small"=>"persons-0001_large.png",),
array("big"=>"persons-0002_large.png",
"small"=>"persons-0002_large.png",),
array("big"=>"persons-0003_large.png",
"small"=>"persons-0003_large.png",),
array("big"=>"persons-0004_large.png",
"small"=>"persons-0004_large.png",),
array("big"=>"persons-0005_large.png",
"small"=>"persons-0005_large.png",),
array("big"=>"persons-0006_large.png",
"small"=>"persons-0006_large.png",),
array("big"=>"persons-0007_large.png",
"small"=>"persons-0007_large.png",),
array("big"=>"persons-0008_large.png",
"small"=>"persons-0008_large.png",),
array("big"=>"persons-0009_large.png",
"small"=>"persons-0009_large.png",),
array("big"=>"persons-0010_large.png",
"small"=>"persons-0010_large.png",),
array("big"=>"persons-0011_large.png",
"small"=>"persons-0011_large.png",),
array("big"=>"persons-0012_large.png",
"small"=>"persons-0012_large.png",),
array("big"=>"persons-0013_large.png",
"small"=>"persons-0013_large.png",),
array("big"=>"persons-0014_large.png",
"small"=>"persons-0014_large.png",),
array("big"=>"persons-0015_large.png",
"small"=>"persons-0015_large.png",),
array("big"=>"persons-0016_large.png",
"small"=>"persons-0016_large.png",),
array("big"=>"persons-0017_large.png",
"small"=>"persons-0017_large.png",),
array("big"=>"persons-0018_large.png",
"small"=>"persons-0018_large.png",),
array("big"=>"persons-0019_large.png",
"small"=>"persons-0019_large.png",),
array("big"=>"persons-0020_large.png",
"small"=>"persons-0020_large.png",),
array("big"=>"persons-0021_large.png",
"small"=>"persons-0021_large.png",),
array("big"=>"persons-0022_large.png",
"small"=>"persons-0022_large.png",),
array("big"=>"persons-0023_large.png",
"small"=>"persons-0023_large.png",),
array("big"=>"persons-0024_large.png",
"small"=>"persons-0024_large.png",),
array("big"=>"persons-0025_large.png",
"small"=>"persons-0025_large.png",),
array("big"=>"persons-0026_large.png",
"small"=>"persons-0026_large.png",),
array("big"=>"persons-0027_large.png",
"small"=>"persons-0027_large.png",),
array("big"=>"persons-0028_large.png",
"small"=>"persons-0028_large.png",),
array("big"=>"persons-0029_large.png",
"small"=>"persons-0029_large.png",),
array("big"=>"persons-0030_large.png",
"small"=>"persons-0030_large.png",),
array("big"=>"persons-0031_large.png",
"small"=>"persons-0031_large.png",),
array("big"=>"persons-0032_large.png",
"small"=>"persons-0032_large.png",),
array("big"=>"persons-0033_large.png",
"small"=>"persons-0033_large.png",),
array("big"=>"persons-0034_large.png",
"small"=>"persons-0034_large.png",),
array("big"=>"persons-0035_large.png",
"small"=>"persons-0035_large.png",),
array("big"=>"persons-0036_large.png",
"small"=>"persons-0036_large.png",),
array("big"=>"persons-0037_large.png",
"small"=>"persons-0037_large.png",),
array("big"=>"persons-0038_large.png",
"small"=>"persons-0038_large.png",),
array("big"=>"persons-0039_large.png",
"small"=>"persons-0039_large.png",),
array("big"=>"persons-0040_large.png",
"small"=>"persons-0040_large.png",),
array("big"=>"persons-0041_large.png",
"small"=>"persons-0041_large.png",),
array("big"=>"persons-0042_large.png",
"small"=>"persons-0042_large.png",),
array("big"=>"persons-0043_large.png",
"small"=>"persons-0043_large.png",),
array("big"=>"persons-0044_large.png",
"small"=>"persons-0044_large.png",),
array("big"=>"persons-0045_large.png",
"small"=>"persons-0045_large.png",),
array("big"=>"persons-0046_large.png",
"small"=>"persons-0046_large.png",),
array("big"=>"persons-0047_large.png",
"small"=>"persons-0047_large.png",),
array("big"=>"persons-0048_large.png",
"small"=>"persons-0048_large.png",),
array("big"=>"persons-0049_large.png",
"small"=>"persons-0049_large.png",),
array("big"=>"persons-0050_large.png",
"small"=>"persons-0050_large.png",),
array("big"=>"persons-0051_large.png",
"small"=>"persons-0051_large.png",),
array("big"=>"persons-0052_large.png",
"small"=>"persons-0052_large.png",),
array("big"=>"persons-0053_large.png",
"small"=>"persons-0053_large.png",),
array("big"=>"persons-0054_large.png",
"small"=>"persons-0054_large.png",),
array("big"=>"persons-0055_large.png",
"small"=>"persons-0055_large.png",),
array("big"=>"persons-0056_large.png",
"small"=>"persons-0056_large.png",),
array("big"=>"persons-0057_large.png",
"small"=>"persons-0057_large.png",),
array("big"=>"persons-0058_large.png",
"small"=>"persons-0058_large.png",),
array("big"=>"persons-0059_large.png",
"small"=>"persons-0059_large.png",),
array("big"=>"persons-0060_large.png",
"small"=>"persons-0060_large.png",),
array("big"=>"persons-0061_large.png",
"small"=>"persons-0061_large.png",),
array("big"=>"persons-0062_large.png",
"small"=>"persons-0062_large.png",),
array("big"=>"persons-0063_large.png",
"small"=>"persons-0063_large.png",),
array("big"=>"persons-0065_large.png",
"small"=>"persons-0065_large.png",),
array("big"=>"persons-0066_large.png",
"small"=>"persons-0066_large.png",),
array("big"=>"persons-0067_large.png",
"small"=>"persons-0067_large.png",),
array("big"=>"persons-0068_large.png",
"small"=>"persons-0068_large.png",),
array("big"=>"persons-0069_large.png",
"small"=>"persons-0069_large.png",),
array("big"=>"persons-0070_large.png",
"small"=>"persons-0070_large.png",),
array("big"=>"persons-0071_large.png",
"small"=>"persons-0071_large.png",),
array("big"=>"persons-0072_large.png",
"small"=>"persons-0072_large.png",),
array("big"=>"persons-0073_large.png",
"small"=>"persons-0073_large.png",),
array("big"=>"persons-0074_large.png",
"small"=>"persons-0074_large.png",),
array("big"=>"persons-0075_large.png",
"small"=>"persons-0075_large.png",),
array("big"=>"persons-0076_large.png",
"small"=>"persons-0076_large.png",),
array("big"=>"persons-0077_large.png",
"small"=>"persons-0077_large.png",),
array("big"=>"persons-0078_large.png",
"small"=>"persons-0078_large.png",),
array("big"=>"persons-0079_large.png",
"small"=>"persons-0079_large.png",),
array("big"=>"persons-0080_large.png",
"small"=>"persons-0080_large.png",),
array("big"=>"persons-0081_large.png",
"small"=>"persons-0081_large.png",),
array("big"=>"persons-0082_large.png",
"small"=>"persons-0082_large.png",),
array("big"=>"persons-0083_large.png",
"small"=>"persons-0083_large.png",),
array("big"=>"persons-0084_large.png",
"small"=>"persons-0084_large.png",),
array("big"=>"persons-0085_large.png",
"small"=>"persons-0085_large.png",),
array("big"=>"persons-0086_large.png",
"small"=>"persons-0086_large.png",),
array("big"=>"persons-0087_large.png",
"small"=>"persons-0087_large.png",),
array("big"=>"persons-0088_large.png",
"small"=>"persons-0088_large.png",),
array("big"=>"persons-0089_large.png",
"small"=>"persons-0089_large.png",),
array("big"=>"persons-0090_large.png",
"small"=>"persons-0090_large.png",),
array("big"=>"persons-0091_large.png",
"small"=>"persons-0091_large.png",),
array("big"=>"persons-0092_large.png",
"small"=>"persons-0092_large.png",),
array("big"=>"persons-0093_large.png",
"small"=>"persons-0093_large.png",),
array("big"=>"persons-0094_large.png",
"small"=>"persons-0094_large.png",),
array("big"=>"persons-0095_large.png",
"small"=>"persons-0095_large.png",),
array("big"=>"persons-0096_large.png",
"small"=>"persons-0096_large.png",),
array("big"=>"persons-0097_large.png",
"small"=>"persons-0097_large.png",),
array("big"=>"persons-0098_large.png",
"small"=>"persons-0098_large.png",),
array("big"=>"persons-0099_large.png",
"small"=>"persons-0099_large.png",),
array("big"=>"persons-0100_large.png",
"small"=>"persons-0100_large.png",),
array("big"=>"persons-0101_large.png",
"small"=>"persons-0101_large.png",),
array("big"=>"persons-0102_large.png",
"small"=>"persons-0102_large.png",),
array("big"=>"persons-0103_large.png",
"small"=>"persons-0103_large.png",),
array("big"=>"persons-0104_large.png",
"small"=>"persons-0104_large.png",),
array("big"=>"persons-0105_large.png",
"small"=>"persons-0105_large.png",),
array("big"=>"persons-0106_large.png",
"small"=>"persons-0106_large.png",),
array("big"=>"persons-0107_large.png",
"small"=>"persons-0107_large.png",),
array("big"=>"persons-0108_large.png",
"small"=>"persons-0108_large.png",),
array("big"=>"persons-0109_large.png",
"small"=>"persons-0109_large.png",),
array("big"=>"persons-0110.png",
"small"=>"persons-0110.png",),
array("big"=>"persons-0111_large.png",
"small"=>"persons-0111_large.png",),
array("big"=>"persons-0112_large.png",
"small"=>"persons-0112_large.png",),
array("big"=>"persons-0113_large.png",
"small"=>"persons-0113_large.png",),
array("big"=>"persons-0114_large.png",
"small"=>"persons-0114_large.png",),
array("big"=>"persons-0115_large.png",
"small"=>"persons-0115_large.png",),
array("big"=>"persons-0116_large.png",
"small"=>"persons-0116_large.png",),
array("big"=>"persons-0117_large.png",
"small"=>"persons-0117_large.png",),
array("big"=>"persons-0118_large.png",
"small"=>"persons-0118_large.png",),
array("big"=>"persons-0119_large.png",
"small"=>"persons-0119_large.png",),
array("big"=>"persons-0120_large.png",
"small"=>"persons-0120_large.png",),
array("big"=>"persons-0121_large.png",
"small"=>"persons-0121_large.png",),
array("big"=>"persons-0122_large.png",
"small"=>"persons-0122_large.png",),
array("big"=>"persons-0123_large.png",
"small"=>"persons-0123_large.png",),
array("big"=>"persons-0124_large.png",
"small"=>"persons-0124_large.png",),
array("big"=>"persons-0125_large.png",
"small"=>"persons-0125_large.png",),
array("big"=>"persons-0126_large.png",
"small"=>"persons-0126_large.png",),
array("big"=>"persons-0127_large.png",
"small"=>"persons-0127_large.png",),
array("big"=>"persons-0128_large.png",
"small"=>"persons-0128_large.png",),
array("big"=>"persons-0129_large.png",
"small"=>"persons-0129_large.png",),
array("big"=>"persons-0130_large.png",
"small"=>"persons-0130_large.png",),
array("big"=>"persons-0131_large.png",
"small"=>"persons-0131_large.png",),
array("big"=>"persons-0132_large.png",
"small"=>"persons-0132_large.png",),
array("big"=>"persons-0133_large.png",
"small"=>"persons-0133_large.png",),
array("big"=>"persons-0134_large.png",
"small"=>"persons-0134_large.png",),
array("big"=>"persons-0135_large.png",
"small"=>"persons-0135_large.png",),
array("big"=>"persons-0136_large.png",
"small"=>"persons-0136_large.png",),
array("big"=>"persons-0137_large.png",
"small"=>"persons-0137_large.png",),
array("big"=>"persons-0138_large.png",
"small"=>"persons-0138_large.png",),
array("big"=>"persons-0139_large.png",
"small"=>"persons-0139_large.png",),
array("big"=>"persons-0140_large.png",
"small"=>"persons-0140_large.png",),
array("big"=>"persons-0144_large.png",
"small"=>"persons-0144_large.png",),
array("big"=>"persons-0145_large.png",
"small"=>"persons-0145_large.png",),
array("big"=>"persons-0146_large.png",
"small"=>"persons-0146_large.png",),
array("big"=>"persons-0147_large.png",
"small"=>"persons-0147_large.png",),
array("big"=>"persons-0148_large.png",
"small"=>"persons-0148_large.png",),
array("big"=>"persons-0149_large.png",
"small"=>"persons-0149_large.png",),
array("big"=>"persons-0150_large.png",
"small"=>"persons-0150_large.png",),
array("big"=>"persons-0151_large.png",
"small"=>"persons-0151_large.png",),
array("big"=>"persons-0152_large.png",
"small"=>"persons-0152_large.png",),
array("big"=>"persons-0153_large_1.png",
"small"=>"persons-0153_large_1.png",),
array("big"=>"persons-0153_large.png",
"small"=>"persons-0153_large.png",),
array("big"=>"persons-0154_large.png",
"small"=>"persons-0154_large.png",),
array("big"=>"persons-0155_large.png",
"small"=>"persons-0155_large.png",),
array("big"=>"persons-0156_large.png",
"small"=>"persons-0156_large.png",),
array("big"=>"persons-0157_large.png",
"small"=>"persons-0157_large.png",),
array("big"=>"persons-0158_large.png",
"small"=>"persons-0158_large.png",),
array("big"=>"persons-0159_large.png",
"small"=>"persons-0159_large.png",),
array("big"=>"persons-0160_large.png",
"small"=>"persons-0160_large.png",),
array("big"=>"persons-0162_large_1.png",
"small"=>"persons-0162_large_1.png",),
array("big"=>"persons-0162_large.png",
"small"=>"persons-0162_large.png",),
array("big"=>"persons-0163_large.png",
"small"=>"persons-0163_large.png",),
array("big"=>"persons-0164_large.png",
"small"=>"persons-0164_large.png",),
array("big"=>"persons-0165_large.png",
"small"=>"persons-0165_large.png",),
array("big"=>"persons-0166_large.png",
"small"=>"persons-0166_large.png",),
array("big"=>"persons-0167_large.png",
"small"=>"persons-0167_large.png",),
array("big"=>"persons-0168_large.png",
"small"=>"persons-0168_large.png",),
array("big"=>"persons-0169_large.png",
"small"=>"persons-0169_large.png",),
array("big"=>"persons-0170_large.png",
"small"=>"persons-0170_large.png",),
array("big"=>"persons-0171_large.png",
"small"=>"persons-0171_large.png",),
array("big"=>"persons-0172_large.png",
"small"=>"persons-0172_large.png",),
array("big"=>"persons-0173_large.png",
"small"=>"persons-0173_large.png",),
array("big"=>"persons-0174_large.png",
"small"=>"persons-0174_large.png",),
array("big"=>"persons-0175_large.png",
"small"=>"persons-0175_large.png",),
array("big"=>"persons-0176_large.png",
"small"=>"persons-0176_large.png",),
array("big"=>"persons-0177_large.png",
"small"=>"persons-0177_large.png",),
array("big"=>"persons-0178_large.png",
"small"=>"persons-0178_large.png",),
array("big"=>"persons-0179_large.png",
"small"=>"persons-0179_large.png",),
array("big"=>"persons-0180_large.png",
"small"=>"persons-0180_large.png",),
array("big"=>"persons-0181_large.png",
"small"=>"persons-0181_large.png",),
array("big"=>"persons-0182_large.png",
"small"=>"persons-0182_large.png",),
array("big"=>"persons-0183_large.png",
"small"=>"persons-0183_large.png",),
array("big"=>"persons-0184_large.png",
"small"=>"persons-0184_large.png",),
array("big"=>"persons-0185_large.png",
"small"=>"persons-0185_large.png",),
array("big"=>"persons-0186_large.png",
"small"=>"persons-0186_large.png",),
array("big"=>"persons-0187_large.png",
"small"=>"persons-0187_large.png",),
array("big"=>"persons-0188_large.png",
"small"=>"persons-0188_large.png",),
array("big"=>"persons-0189_large.png",
"small"=>"persons-0189_large.png",),
array("big"=>"persons-65_large.png",
"small"=>"persons-65_large.png",),


				)
			),
			array(
				"link"=>"nature/",
				"name"=>"Природа",
				"images"=>array(

						array(
							"big"=>"nature-0002_large.png",
							"small"=>"nature-0002_large.png",
							),
						array(
							"big"=>"nature-0003_large.png",
							"small"=>"nature-0003_large.png",
							),
						array(
							"big"=>"nature-large_0004.png",
							"small"=>"nature-0004_large.png",
							),
						array(
							"big"=>"nature-0005_large.png",
							"small"=>"nature-0005_large.png",
							),
						array(
							"big"=>"nature-0006_large.png",
							"small"=>"nature-0006_large.png",
							),
						array(
							"big"=>"nature-0007_large.png",
							"small"=>"nature-0007_large.png",
							),
						array(
							"big"=>"nature-9_large.png",
							"small"=>"nature-9_large.png",
							),
						array(
							"big"=>"nature-0009_large.png",
							"small"=>"nature-0009_large.png",
							),
						array(
							"big"=>"nature-0010_large.png",
							"small"=>"nature-0010_large.png",
							),
						array(
							"big"=>"nature-0011_large.png",
							"small"=>"nature-0011_large.png",
							),
						array(
							"big"=>"nature-0012_large.png",
							"small"=>"nature-0012_large.png",
							),
						array(
							"big"=>"nature-0013_large.png",
							"small"=>"nature-0013_large.png",
							),
						array(
							"big"=>"nature-0014_large.png",
							"small"=>"nature-0014_large.png",
							),
						array(
							"big"=>"nature-0015_large.png",
							"small"=>"nature-0015_large.png",
							),
						array(
							"big"=>"nature-0016_large.png",
							"small"=>"nature-0016_large.png",
							),
						array(
							"big"=>"nature-0017_large.png",
							"small"=>"nature-0017_large.png",
							),
						array(
							"big"=>"nature-0018_large.png",
							"small"=>"nature-0018_large.png",
							),
						array(
							"big"=>"nature-0019_large.png",
							"small"=>"nature-0019_large.png",
							),
						array(
							"big"=>"nature-0020_large.png",
							"small"=>"nature-0020_large.png",
							),
						array(
							"big"=>"nature-0021_large.png",
							"small"=>"nature-0021_large.png",
							),
						array(
							"big"=>"nature-0022_large.png",
							"small"=>"nature-0022_large.png",
							),
						array(
							"big"=>"nature-0023_large.png",
							"small"=>"nature-0023_large.png",
							),
						array(
							"big"=>"nature-0024_large.png",
							"small"=>"nature-0024_large.png",
							),
						array(
							"big"=>"nature-0025_large.png",
							"small"=>"nature-0025_large.png",
							),
						array(
							"big"=>"nature-0026_large.png",
							"small"=>"nature-0026_large.png",
							),
						array(
							"big"=>"nature-0027_large.png",
							"small"=>"nature-0027_large.png",
							),
						array(
							"big"=>"nature-0028_large.png",
							"small"=>"nature-0028_large.png",
							),
						array(
							"big"=>"nature-0029_large.png",
							"small"=>"nature-0029_large.png",
							),
						array(
							"big"=>"nature-0030_large.png",
							"small"=>"nature-0030_large.png",
							),
						array(
							"big"=>"nature-0031_large.png",
							"small"=>"nature-0031_large.png",
							),
						array(
							"big"=>"nature-0032_large.png",
							"small"=>"nature-0032_large.png",
							),
						array(
							"big"=>"nature-0033_large.png",
							"small"=>"nature-0033_large.png",
							),
						array(
							"big"=>"nature-0034_large.png",
							"small"=>"nature-0034_large.png",
							),
						array(
							"big"=>"nature-0035_large.png",
							"small"=>"nature-0035_large.png",
							),
						array(
							"big"=>"nature-0036_large.png",
							"small"=>"nature-0036_large.png",
							),
						array(
							"big"=>"nature-0037_large.png",
							"small"=>"nature-0037_large.png",
							),
						array(
							"big"=>"nature-0038_large.png",
							"small"=>"nature-0038_large.png",
							),
						array(
							"big"=>"nature-0039_large.png",
							"small"=>"nature-0039_large.png",
							),
						array(
							"big"=>"nature-0040_large.png",
							"small"=>"nature-0040_large.png",
							),
						array(
							"big"=>"nature-0041_large.png",
							"small"=>"nature-0041_large.png",
							),
						array(
							"big"=>"nature-0042_large.png",
							"small"=>"nature-0042_large.png",
							),
						array(
							"big"=>"nature-0043_large.png",
							"small"=>"nature-0043_large.png",
							),
						array(
							"big"=>"nature-0044_large.png",
							"small"=>"nature-0044_large.png",
							),
						array(
							"big"=>"nature-0045_large.png",
							"small"=>"nature-0045_large.png",
							),
						array(
							"big"=>"nature-0046_large.png",
							"small"=>"nature-0046_large.png",
							),
						array(
							"big"=>"nature-0047_large.png",
							"small"=>"nature-0047_large.png",
							),
						array(
							"big"=>"nature-0049_large.png",
							"small"=>"nature-0049_large.png",
							),
						array(
							"big"=>"nature-0050_large.png",
							"small"=>"nature-0050_large.png",
							),
						array(
							"big"=>"nature-0052_large.png",
							"small"=>"nature-0052_large.png",
							),
						array(
							"big"=>"nature-0053_large.png",
							"small"=>"nature-0053_large.png",
							),
						array(
							"big"=>"nature-0054_large.png",
							"small"=>"nature-0054_large.png",
							),
						array(
							"big"=>"nature-0055_large.png",
							"small"=>"nature-0055_large.png",
							),
						array(
							"big"=>"nature-0056_large.png",
							"small"=>"nature-0056_large.png",
							),
						array(
							"big"=>"nature-0057_large.png",
							"small"=>"nature-0057_large.png",
							),
						array(
							"big"=>"nature-0058_large.png",
							"small"=>"nature-0058_large.png",
							),
						array(
							"big"=>"nature-0059_large.png",
							"small"=>"nature-0059_large.png",
							),
						array(
							"big"=>"nature-0060_large.png",
							"small"=>"nature-0060_large.png",
							),
						array(
							"big"=>"nature-0061_large.png",
							"small"=>"nature-0061_large.png",
							),
						array(
							"big"=>"nature-0062_large.png",
							"small"=>"nature-0062_large.png",
							),
						array(
							"big"=>"nature-0063_large.png",
							"small"=>"nature-0063_large.png",
							),
						array(
							"big"=>"nature-0064_large.png",
							"small"=>"nature-0064_large.png",
							),
						array(
							"big"=>"nature-0065_large.png",
							"small"=>"nature-0065_large.png",
							),
						array(
							"big"=>"nature-0066_large.png",
							"small"=>"nature-0066_large.png",
							),
						array(
							"big"=>"nature-0067_large.png",
							"small"=>"nature-0067_large.png",
							),
						array(
							"big"=>"nature-0068_large.png",
							"small"=>"nature-0068_large.png",
							),
						array(
							"big"=>"nature-0069_large.png",
							"small"=>"nature-0069_large.png",
							),
						array(
							"big"=>"nature-0070_large.png",
							"small"=>"nature-0070_large.png",
							),
						array(
							"big"=>"nature-0071_large.png",
							"small"=>"nature-0071_large.png",
							),
						array(
							"big"=>"nature-0072_large.png",
							"small"=>"nature-0072_large.png",
							),
						array(
							"big"=>"nature-0073_large.png",
							"small"=>"nature-0073_large.png",
							),
						array(
							"big"=>"nature-0074_large.png",
							"small"=>"nature-0074_large.png",
							),
						array(
							"big"=>"nature-0075_large.png",
							"small"=>"nature-0075_large.png",
							),
						array(
							"big"=>"nature-0076_large.png",
							"small"=>"nature-0076_large.png",
							),
						array(
							"big"=>"nature-0077_large.png",
							"small"=>"nature-0077_large.png",
							),
						array(
							"big"=>"nature-0078_large.png",
							"small"=>"nature-0078_large.png",
							),
						array(
							"big"=>"nature-0079_large.png",
							"small"=>"nature-0079_large.png",
							),
						array(
							"big"=>"nature-0080_large.png",
							"small"=>"nature-0080_large.png",
							),
						array(
							"big"=>"nature-0081_large.png",
							"small"=>"nature-0081_large.png",
							),
						array(
							"big"=>"nature-0082_large.png",
							"small"=>"nature-0082_large.png",
							),
						array(
							"big"=>"nature-0083_large.png",
							"small"=>"nature-0083_large.png",
							),
						array(
							"big"=>"nature-0084_large.png",
							"small"=>"nature-0084_large.png",
							),
						array(
							"big"=>"nature-0085_large.png",
							"small"=>"nature-0085_large.png",
							),
						array(
							"big"=>"nature-0086_large.png",
							"small"=>"nature-0086_large.png",
							),
						array(
							"big"=>"nature-0087_large.png",
							"small"=>"nature-0087_large.png",
							),
						array(
							"big"=>"nature-0088_large.png",
							"small"=>"nature-0088_large.png",
							),
						array(
							"big"=>"nature-0089_large.png",
							"small"=>"nature-0089_large.png",
							),
						array(
							"big"=>"nature-0090_large.png",
							"small"=>"nature-0090_large.png",
							),
						array(
							"big"=>"nature-0091_large.png",
							"small"=>"nature-0091_large.png",
							),
						array(
							"big"=>"nature-0092_large.png",
							"small"=>"nature-0092_large.png",
							),
						array(
							"big"=>"nature-0093_large.png",
							"small"=>"nature-0093_large.png",
							),
						array(
							"big"=>"nature-0094_large.png",
							"small"=>"nature-0094_large.png",
							),
						array(
							"big"=>"nature-0095_large.png",
							"small"=>"nature-0095_large.png",
							),
						array(
							"big"=>"nature-0096_large.png",
							"small"=>"nature-0096_large.png",
							),
						array(
							"big"=>"nature-0097_large.png",
							"small"=>"nature-0097_large.png",
							),
						array(
							"big"=>"nature-0098_large.png",
							"small"=>"nature-0098_large.png",
							),
						array(
							"big"=>"nature-0099_large.png",
							"small"=>"nature-0099_large.png",
							),
						array(
							"big"=>"nature-0100_large.png",
							"small"=>"nature-0100_large.png",
							),
						array(
							"big"=>"nature-0101_large.png",
							"small"=>"nature-0101_large.png",
							),
						array(
							"big"=>"nature-0102_large.png",
							"small"=>"nature-0102_large.png",
							),
						array(
							"big"=>"nature-0103_large.png",
							"small"=>"nature-0103_large.png",
							),
						array(
							"big"=>"nature-0104_large.png",
							"small"=>"nature-0104_large.png",
							),
						array(
							"big"=>"nature-0105_large.png",
							"small"=>"nature-0105_large.png",
							),
						array(
							"big"=>"nature-0106_large.png",
							"small"=>"nature-0106_large.png",
							),
						array(
							"big"=>"nature-0107_large.png",
							"small"=>"nature-0107_large.png",
							),
						array(
							"big"=>"nature-0108_large.png",
							"small"=>"nature-0108_large.png",
							),
						array(
							"big"=>"nature-0109_large.png",
							"small"=>"nature-0109_large.png",
							),
						array(
							"big"=>"nature-0110_large.png",
							"small"=>"nature-0110_large.png",
							),
						array(
							"big"=>"nature-0111_large.png",
							"small"=>"nature-0111_large.png",
							),
						array(
							"big"=>"nature-0112_large.png",
							"small"=>"nature-0112_large.png",
							),
						array(
							"big"=>"nature-0113_large.png",
							"small"=>"nature-0113_large.png",
							),
						array(
							"big"=>"nature-0114_large.png",
							"small"=>"nature-0114_large.png",
							),
						array(
							"big"=>"nature-0115_large.png",
							"small"=>"nature-0115_large.png",
							),
						array(
							"big"=>"nature-0116_large.png",
							"small"=>"nature-0116_large.png",
							),
					)
			),
			array(
				"link"=>"objects/",
				"name"=>"Объекты",
				"images"=>array(
					
					
			array("big"=>"objects-0001_large.png",
			"small"=>"objects-0001_large.png",),
			array("big"=>"objects-0002_large.png",
			"small"=>"objects-0002_large.png",),
			array("big"=>"objects-0003_large.png",
			"small"=>"objects-0003_large.png",),
			array("big"=>"objects-0004_large.png",
			"small"=>"objects-0004_large.png",),
			array("big"=>"objects-0005_large.png",
			"small"=>"objects-0005_large.png",),
			array("big"=>"objects-0006_large.png",
			"small"=>"objects-0006_large.png",),
			array("big"=>"objects-0007_large.png",
			"small"=>"objects-0007_large.png",),
			array("big"=>"objects-0008_large.png",
			"small"=>"objects-0008_large.png",),
			array("big"=>"objects-0009_large.png",
			"small"=>"objects-0009_large.png",),
			array("big"=>"objects-0010_large_1.png",
			"small"=>"objects-0010_large_1.png",),
			array("big"=>"objects-0011_large_1.png",
			"small"=>"objects-0011_large_1.png",),
			array("big"=>"objects-0012_large.png",
			"small"=>"objects-0012_large.png",),
			array("big"=>"objects-0013_large.png",
			"small"=>"objects-0013_large.png",),
			array("big"=>"objects-0014_large.png",
			"small"=>"objects-0014_large.png",),
			array("big"=>"objects-0015_large.png",
			"small"=>"objects-0015_large.png",),
			array("big"=>"objects-0016_large.png",
			"small"=>"objects-0016_large.png",),
			array("big"=>"objects-0017_large.png",
			"small"=>"objects-0017_large.png",),
			array("big"=>"objects-0018_large.png",
			"small"=>"objects-0018_large.png",),
			array("big"=>"objects-0019_large.png",
			"small"=>"objects-0019_large.png",),
			array("big"=>"objects-0020_large.png",
			"small"=>"objects-0020_large.png",),
			array("big"=>"objects-0021_large.png",
			"small"=>"objects-0021_large.png",),
			array("big"=>"objects-0022_large.png",
			"small"=>"objects-0022_large.png",),
			array("big"=>"objects-0023_large.png",
			"small"=>"objects-0023_large.png",),
			array("big"=>"objects-0024_large.png",
			"small"=>"objects-0024_large.png",),
array("big"=>"objects-0025_large.png",
"small"=>"objects-0025_large.png",),
array("big"=>"objects-0026_large.png",
"small"=>"objects-0026_large.png",),
array("big"=>"objects-0027_large.png",
"small"=>"objects-0027_large.png",),
array("big"=>"objects-0028_large.png",
"small"=>"objects-0028_large.png",),
array("big"=>"objects-0029_large.png",
"small"=>"objects-0029_large.png",),
array("big"=>"objects-0030_large.png",
"small"=>"objects-0030_large.png",),
array("big"=>"objects-0031_large.png",
"small"=>"objects-0031_large.png",),
array("big"=>"objects-0032_large.png",
"small"=>"objects-0032_large.png",),
array("big"=>"objects-0033_large.png",
"small"=>"objects-0033_large.png",),
array("big"=>"objects-0034_large.png",
"small"=>"objects-0034_large.png",),
array("big"=>"objects-0035_large.png",
"small"=>"objects-0035_large.png",),
array("big"=>"objects-0036_large.png",
"small"=>"objects-0036_large.png",),
array("big"=>"objects-0037_large.png",
"small"=>"objects-0037_large.png",),
array("big"=>"objects-0038_large.png",
"small"=>"objects-0038_large.png",),
array("big"=>"objects-0039_large.png",
"small"=>"objects-0039_large.png",),
array("big"=>"objects-0040_large.png",
"small"=>"objects-0040_large.png",),
array("big"=>"objects-0042_large.png",
"small"=>"objects-0042_large.png",),
array("big"=>"objects-0043_large.png",
"small"=>"objects-0043_large.png",),
array("big"=>"objects-0044_large.png",
"small"=>"objects-0044_large.png",),
array("big"=>"objects-0045_large.png",
"small"=>"objects-0045_large.png",),
array("big"=>"objects-0046_large.png",
"small"=>"objects-0046_large.png",),
array("big"=>"objects-0047_large.png",
"small"=>"objects-0047_large.png",),
array("big"=>"objects-0048_large.png",
"small"=>"objects-0048_large.png",),
array("big"=>"objects-0049_large.png",
"small"=>"objects-0049_large.png",),
array("big"=>"objects-0050_large.png",
"small"=>"objects-0050_large.png",),
array("big"=>"objects-0051_large.png",
"small"=>"objects-0051_large.png",),
array("big"=>"objects-0052_large.png",
"small"=>"objects-0052_large.png",),
array("big"=>"objects-0053_large.png",
"small"=>"objects-0053_large.png",),
array("big"=>"objects-0054_large.png",
"small"=>"objects-0054_large.png",),
array("big"=>"objects-0055_large.png",
"small"=>"objects-0055_large.png",),
array("big"=>"objects-0056_large.png",
"small"=>"objects-0056_large.png",),
array("big"=>"objects-0057_large.png",
"small"=>"objects-0057_large.png",),
array("big"=>"objects-0058_large.png",
"small"=>"objects-0058_large.png",),
array("big"=>"objects-0059_large.png",
"small"=>"objects-0059_large.png",),
array("big"=>"objects-0060_large.png",
"small"=>"objects-0060_large.png",),
array("big"=>"objects-0061_large.png",
"small"=>"objects-0061_large.png",),
array("big"=>"objects-0062_large.png",
"small"=>"objects-0062_large.png",),
array("big"=>"objects-0063_large.png",
"small"=>"objects-0063_large.png",),
array("big"=>"objects-0064_large.png",
"small"=>"objects-0064_large.png",),
array("big"=>"objects-0065_large.png",
"small"=>"objects-0065_large.png",),
array("big"=>"objects-0066_large.png",
"small"=>"objects-0066_large.png",),
array("big"=>"objects-0067_large.png",
"small"=>"objects-0067_large.png",),
array("big"=>"objects-0068_large.png",
"small"=>"objects-0068_large.png",),
array("big"=>"objects-0069_large.png",
"small"=>"objects-0069_large.png",),
array("big"=>"objects-0070_large.png",
"small"=>"objects-0070_large.png",),
array("big"=>"objects-0071_large.png",
"small"=>"objects-0071_large.png",),
array("big"=>"objects-0072_large.png",
"small"=>"objects-0072_large.png",),
array("big"=>"objects-0073_large.png",
"small"=>"objects-0073_large.png",),
array("big"=>"objects-0074_large.png",
"small"=>"objects-0074_large.png",),
array("big"=>"objects-0075_large.png",
"small"=>"objects-0075_large.png",),
array("big"=>"objects-0076_large.png",
"small"=>"objects-0076_large.png",),
array("big"=>"objects-0077_large.png",
"small"=>"objects-0077_large.png",),
array("big"=>"objects-0078_large.png",
"small"=>"objects-0078_large.png",),
array("big"=>"objects-0079_large.png",
"small"=>"objects-0079_large.png",),
array("big"=>"objects-0080_large.png",
"small"=>"objects-0080_large.png",),
array("big"=>"objects-0081_large_1.png",
"small"=>"objects-0081_large_1.png",),
array("big"=>"objects-0082_large.png",
"small"=>"objects-0082_large.png",),
array("big"=>"objects-0084_large.png",
"small"=>"objects-0084_large.png",),
array("big"=>"objects-0085_large.png",
"small"=>"objects-0085_large.png",),
array("big"=>"objects-0086_large.png",
"small"=>"objects-0086_large.png",),
array("big"=>"objects-0087_large.png",
"small"=>"objects-0087_large.png",),
array("big"=>"objects-0089_large.png",
"small"=>"objects-0089_large.png",),
array("big"=>"objects-0090_large.png",
"small"=>"objects-0090_large.png",),
array("big"=>"objects-0091_large.png",
"small"=>"objects-0091_large.png",),
array("big"=>"objects-0092_large.png",
"small"=>"objects-0092_large.png",),
array("big"=>"objects-0093_large.png",
"small"=>"objects-0093_large.png",),
array("big"=>"objects-0096_large.png",
"small"=>"objects-0096_large.png",),
array("big"=>"objects-0097_large.png",
"small"=>"objects-0097_large.png",),
array("big"=>"objects-0098_large.png",
"small"=>"objects-0098_large.png",),
array("big"=>"objects-0099_large.png",
"small"=>"objects-0099_large.png",),
array("big"=>"objects-0100_large.png",
"small"=>"objects-0100_large.png",),
array("big"=>"objects-0101_large.png",
"small"=>"objects-0101_large.png",),
array("big"=>"objects-0102_large.png",
"small"=>"objects-0102_large.png",),
array("big"=>"objects-0103_large.png",
"small"=>"objects-0103_large.png",),
array("big"=>"objects-0104_large.png",
"small"=>"objects-0104_large.png",),
array("big"=>"objects-0105_large.png",
"small"=>"objects-0105_large.png",),
array("big"=>"objects-0106_large.png",
"small"=>"objects-0106_large.png",),
array("big"=>"objects-0107_large.png",
"small"=>"objects-0107_large.png",),
array("big"=>"objects-0108_large.png",
"small"=>"objects-0108_large.png",),
array("big"=>"objects-0109_large.png",
"small"=>"objects-0109_large.png",),
array("big"=>"objects-0111_large.png",
"small"=>"objects-0111_large.png",),
array("big"=>"objects-0112_large.png",
"small"=>"objects-0112_large.png",),
array("big"=>"objects-0113_large.png",
"small"=>"objects-0113_large.png",),
array("big"=>"objects-0114_large.png",
"small"=>"objects-0114_large.png",),
array("big"=>"objects-0115_large.png",
"small"=>"objects-0115_large.png",),
array("big"=>"objects-0116_large.png",
"small"=>"objects-0116_large.png",),
array("big"=>"objects-0117_large.png",
"small"=>"objects-0117_large.png",),
array("big"=>"objects-0118_large.png",
"small"=>"objects-0118_large.png",),
array("big"=>"objects-0119_large.png",
"small"=>"objects-0119_large.png",),
array("big"=>"objects-0120_large.png",
"small"=>"objects-0120_large.png",),
array("big"=>"objects-0121_large.png",
"small"=>"objects-0121_large.png",),
array("big"=>"objects-0122_large.png",
"small"=>"objects-0122_large.png",),
array("big"=>"objects-0123_large.png",
"small"=>"objects-0123_large.png",),
array("big"=>"objects-0124_large.png",
"small"=>"objects-0124_large.png",),
array("big"=>"objects-0125_large.png",
"small"=>"objects-0125_large.png",),
array("big"=>"objects-0126_large.png",
"small"=>"objects-0126_large.png",),
array("big"=>"objects-0127_large.png",
"small"=>"objects-0127_large.png",),
array("big"=>"objects-0128_large.png",
"small"=>"objects-0128_large.png",),
array("big"=>"objects-0129_large.png",
"small"=>"objects-0129_large.png",),
array("big"=>"objects-0130_large.png",
"small"=>"objects-0130_large.png",),
array("big"=>"objects-0131_large.png",
"small"=>"objects-0131_large.png",),
array("big"=>"objects-0132_large.png",
"small"=>"objects-0132_large.png",),
array("big"=>"objects-0133_large.png",
"small"=>"objects-0133_large.png",),
array("big"=>"objects-0134_large.png",
"small"=>"objects-0134_large.png",),
array("big"=>"objects-0135_large.png",
"small"=>"objects-0135_large.png",),
array("big"=>"objects-0136_large.png",
"small"=>"objects-0136_large.png",),
array("big"=>"objects-0137_large.png",
"small"=>"objects-0137_large.png",),
array("big"=>"objects-0138_large.png",
"small"=>"objects-0138_large.png",),
array("big"=>"objects-0139_large.png",
"small"=>"objects-0139_large.png",),
array("big"=>"objects-0140_large.png",
"small"=>"objects-0140_large.png",),
array("big"=>"objects-0141_large.png",
"small"=>"objects-0141_large.png",),
array("big"=>"objects-0142_large.png",
"small"=>"objects-0142_large.png",),
array("big"=>"objects-0143_large.png",
"small"=>"objects-0143_large.png",),
array("big"=>"objects-0144_large.png",
"small"=>"objects-0144_large.png",),
array("big"=>"objects-0145_large.png",
"small"=>"objects-0145_large.png",),
array("big"=>"objects-0146_large.png",
"small"=>"objects-0146_large.png",),
array("big"=>"objects-0147_large.png",
"small"=>"objects-0147_large.png",),
array("big"=>"objects-0148_large.png",
"small"=>"objects-0148_large.png",),
array("big"=>"objects-0149_large.png",
"small"=>"objects-0149_large.png",),
array("big"=>"objects-0150_large.png",
"small"=>"objects-0150_large.png",),
array("big"=>"objects-0151_large.png",
"small"=>"objects-0151_large.png",),
array("big"=>"objects-0152_large.png",
"small"=>"objects-0152_large.png",),
array("big"=>"objects-0153_large.png",
"small"=>"objects-0153_large.png",),
array("big"=>"objects-0154_large.png",
"small"=>"objects-0154_large.png",),
array("big"=>"objects-0155_large.png",
"small"=>"objects-0155_large.png",),
array("big"=>"objects-0156_large.png",
"small"=>"objects-0156_large.png",),
array("big"=>"objects-0157_large.png",
"small"=>"objects-0157_large.png",),
array("big"=>"objects-0158_large.png",
"small"=>"objects-0158_large.png",),
array("big"=>"objects-0159_large.png",
"small"=>"objects-0159_large.png",),
array("big"=>"objects-0160_large.png",
"small"=>"objects-0160_large.png",),
array("big"=>"objects-0161_large.png",
"small"=>"objects-0161_large.png",),
array("big"=>"objects-0162_large.png",
"small"=>"objects-0162_large.png",),
array("big"=>"objects-0163_large.png",
"small"=>"objects-0163_large.png",),
array("big"=>"objects-0164_large.png",
"small"=>"objects-0164_large.png",),
array("big"=>"objects-0165_large.png",
"small"=>"objects-0165_large.png",),
array("big"=>"objects-0166_large.png",
"small"=>"objects-0166_large.png",),
array("big"=>"objects-0167_large.png",
"small"=>"objects-0167_large.png",),
array("big"=>"objects-0168_large.png",
"small"=>"objects-0168_large.png",),
array("big"=>"objects-0169_large.png",
"small"=>"objects-0169_large.png",),
array("big"=>"objects-0170_large.png",
"small"=>"objects-0170_large.png",),
array("big"=>"objects-0171_large.png",
"small"=>"objects-0171_large.png",),
array("big"=>"objects-0172_large.png",
"small"=>"objects-0172_large.png",),
array("big"=>"objects-0173_large.png",
"small"=>"objects-0173_large.png",),
array("big"=>"objects-0174_large.png",
"small"=>"objects-0174_large.png",),
array("big"=>"objects-0175_large.png",
"small"=>"objects-0175_large.png",),
array("big"=>"objects-0176_large.png",
"small"=>"objects-0176_large.png",),
array("big"=>"objects-0177_large.png",
"small"=>"objects-0177_large.png",),
array("big"=>"objects-0178_large.png",
"small"=>"objects-0178_large.png",),
array("big"=>"objects-0179_large.png",
"small"=>"objects-0179_large.png",),
array("big"=>"objects-0180_large.png",
"small"=>"objects-0180_large.png",),
array("big"=>"objects-0181_large.png",
"small"=>"objects-0181_large.png",),
array("big"=>"objects-0182_large.png",
"small"=>"objects-0182_large.png",),
array("big"=>"objects-0183_large.png",
"small"=>"objects-0183_large.png",),
array("big"=>"objects-0184_large.png",
"small"=>"objects-0184_large.png",),
array("big"=>"objects-0185_large.png",
"small"=>"objects-0185_large.png",),
array("big"=>"objects-0186_large.png",
"small"=>"objects-0186_large.png",),
array("big"=>"objects-0187_large.png",
"small"=>"objects-0187_large.png",),
array("big"=>"objects-0189_large.png",
"small"=>"objects-0189_large.png",),
array("big"=>"objects-0190_large.png",
"small"=>"objects-0190_large.png",),
array("big"=>"objects-0191_large.png",
"small"=>"objects-0191_large.png",),
array("big"=>"objects-0192_large.png",
"small"=>"objects-0192_large.png",),
array("big"=>"objects-0193_large.png",
"small"=>"objects-0193_large.png",),
array("big"=>"objects-0195_large.png",
"small"=>"objects-0195_large.png",),
array("big"=>"objects-0196_large.png",
"small"=>"objects-0196_large.png",),
array("big"=>"objects-0197_large.png",
"small"=>"objects-0197_large.png",),
array("big"=>"objects-0198_large.png",
"small"=>"objects-0198_large.png",),
array("big"=>"objects-0199_large.png",
"small"=>"objects-0199_large.png",),
array("big"=>"objects-0200_large.png",
"small"=>"objects-0200_large.png",),
array("big"=>"objects-0201_large.png",
"small"=>"objects-0201_large.png",),
array("big"=>"objects-0202_large.png",
"small"=>"objects-0202_large.png",),
array("big"=>"objects-0203_large.png",
"small"=>"objects-0203_large.png",),
array("big"=>"objects-0204_large.png",
"small"=>"objects-0204_large.png",),
array("big"=>"objects-0205_large.png",
"small"=>"objects-0205_large.png",),
array("big"=>"objects-0206_large.png",
"small"=>"objects-0206_large.png",),
array("big"=>"objects-0207_large.png",
"small"=>"objects-0207_large.png",),
array("big"=>"objects-0208_large.png",
"small"=>"objects-0208_large.png",),
array("big"=>"objects-0209_large.png",
"small"=>"objects-0209_large.png",),
array("big"=>"objects-0210_large.png",
"small"=>"objects-0210_large.png",),
array("big"=>"objects-0211_large.png",
"small"=>"objects-0211_large.png",),
array("big"=>"objects-0212_large_1.png",
"small"=>"objects-0212_large_1.png",),
array("big"=>"objects-0212_large.png",
"small"=>"objects-0212_large.png",),
array("big"=>"objects-0213_large.png",
"small"=>"objects-0213_large.png",),
array("big"=>"objects-0214_large.png",
"small"=>"objects-0214_large.png",),
array("big"=>"objects-0215_large.png",
"small"=>"objects-0215_large.png",),
array("big"=>"objects-0216_large.png",
"small"=>"objects-0216_large.png",),
array("big"=>"objects-0217_large.png",
"small"=>"objects-0217_large.png",),
array("big"=>"objects-0218_large.png",
"small"=>"objects-0218_large.png",),
array("big"=>"objects-0219_large.png",
"small"=>"objects-0219_large.png",),
array("big"=>"objects-0220_large.png",
"small"=>"objects-0220_large.png",),
array("big"=>"objects-0221_large.png",
"small"=>"objects-0221_large.png",),
array("big"=>"objects-0222_large.png",
"small"=>"objects-0222_large.png",),
array("big"=>"objects-0223_large.png",
"small"=>"objects-0223_large.png",),
array("big"=>"objects-0224_large.png",
"small"=>"objects-0224_large.png",),
array("big"=>"objects-0225_large.png",
"small"=>"objects-0225_large.png",),
array("big"=>"objects-0226_large.png",
"small"=>"objects-0226_large.png",),
array("big"=>"objects-0227_large.png",
"small"=>"objects-0227_large.png",),
array("big"=>"objects-0228_large.png",
"small"=>"objects-0228_large.png",),
array("big"=>"objects-0229_large.png",
"small"=>"objects-0229_large.png",),
array("big"=>"objects-0230_large.png",
"small"=>"objects-0230_large.png",),
array("big"=>"objects-195_large.png",
"small"=>"objects-195_large.png",),
					
				)
			),
			
			array(
				"link"=>"places/",
				"name"=>"Места",
				"images"=>array(
					
array("big"=>"places-0001_large.png",
"small"=>"places-0001_large.png",),
array("big"=>"places-0002_large.png",
"small"=>"places-0002_large.png",),
array("big"=>"places-0003_large.png",
"small"=>"places-0003_large.png",),
array("big"=>"places-0004_large.png",
"small"=>"places-0004_large.png",),
array("big"=>"places-0005_large.png",
"small"=>"places-0005_large.png",),
array("big"=>"places-0006_large.png",
"small"=>"places-0006_large.png",),
array("big"=>"places-0007_large.png",
"small"=>"places-0007_large.png",),
array("big"=>"places-0008_large.png",
"small"=>"places-0008_large.png",),
array("big"=>"places-0009_large.png",
"small"=>"places-0009_large.png",),
array("big"=>"places-0010_large.png",
"small"=>"places-0010_large.png",),
array("big"=>"places-0011_large.png",
"small"=>"places-0011_large.png",),
array("big"=>"places-0012_large.png",
"small"=>"places-0012_large.png",),
array("big"=>"places-0013_large.png",
"small"=>"places-0013_large.png",),
array("big"=>"places-0014_large.png",
"small"=>"places-0014_large.png",),
array("big"=>"places-0015_large.png",
"small"=>"places-0015_large.png",),
array("big"=>"places-0016_large.png",
"small"=>"places-0016_large.png",),
array("big"=>"places-0017_large.png",
"small"=>"places-0017_large.png",),
array("big"=>"places-0018_large.png",
"small"=>"places-0018_large.png",),
array("big"=>"places-0019_large.png",
"small"=>"places-0019_large.png",),
array("big"=>"places-0020_large.png",
"small"=>"places-0020_large.png",),
array("big"=>"places-0021_large.png",
"small"=>"places-0021_large.png",),
array("big"=>"places-0022_large.png",
"small"=>"places-0022_large.png",),
array("big"=>"places-0023_large.png",
"small"=>"places-0023_large.png",),
array("big"=>"places-0024_large.png",
"small"=>"places-0024_large.png",),
array("big"=>"places-0025_large.png",
"small"=>"places-0025_large.png",),
array("big"=>"places-0026_large.png",
"small"=>"places-0026_large.png",),
array("big"=>"places-0027_large.png",
"small"=>"places-0027_large.png",),
array("big"=>"places-0028_large.png",
"small"=>"places-0028_large.png",),
array("big"=>"places-0029_large.png",
"small"=>"places-0029_large.png",),
array("big"=>"places-0030_large.png",
"small"=>"places-0030_large.png",),
array("big"=>"places-0031_large.png",
"small"=>"places-0031_large.png",),
array("big"=>"places-0032_large.png",
"small"=>"places-0032_large.png",),
array("big"=>"places-0033_large.png",
"small"=>"places-0033_large.png",),
array("big"=>"places-0034_large.png",
"small"=>"places-0034_large.png",),
array("big"=>"places-0035_large.png",
"small"=>"places-0035_large.png",),
array("big"=>"places-0036_large.png",
"small"=>"places-0036_large.png",),
array("big"=>"places-0037_large.png",
"small"=>"places-0037_large.png",),
array("big"=>"places-0038_large.png",
"small"=>"places-0038_large.png",),
array("big"=>"places-0039_large.png",
"small"=>"places-0039_large.png",),
array("big"=>"places-0040_large.png",
"small"=>"places-0040_large.png",),
array("big"=>"places-0041_large.png",
"small"=>"places-0041_large.png",),
array("big"=>"places-0042_large.png",
"small"=>"places-0042_large.png",),
array("big"=>"places-0043_large.png",
"small"=>"places-0043_large.png",),
array("big"=>"places-0044_large.png",
"small"=>"places-0044_large.png",),
array("big"=>"places-0045_large.png",
"small"=>"places-0045_large.png",),
array("big"=>"places-0046_large.png",
"small"=>"places-0046_large.png",),
array("big"=>"places-0047_large.png",
"small"=>"places-0047_large.png",),
array("big"=>"places-0048_large.png",
"small"=>"places-0048_large.png",),
array("big"=>"places-0049_large.png",
"small"=>"places-0049_large.png",),
array("big"=>"places-0050_large.png",
"small"=>"places-0050_large.png",),
array("big"=>"places-0051_large.png",
"small"=>"places-0051_large.png",),
array("big"=>"places-0052_large.png",
"small"=>"places-0052_large.png",),
array("big"=>"places-0053_large.png",
"small"=>"places-0053_large.png",),
array("big"=>"places-0054_large.png",
"small"=>"places-0054_large.png",),
array("big"=>"places-0055_large.png",
"small"=>"places-0055_large.png",),
array("big"=>"places-0056_large.png",
"small"=>"places-0056_large.png",),
array("big"=>"places-0057_large.png",
"small"=>"places-0057_large.png",),
array("big"=>"places-0058_large.png",
"small"=>"places-0058_large.png",),
array("big"=>"places-0059_large.png",
"small"=>"places-0059_large.png",),
array("big"=>"places-0060_large.png",
"small"=>"places-0060_large.png",),
array("big"=>"places-0061_large.png",
"small"=>"places-0061_large.png",),
array("big"=>"places-0062_large.png",
"small"=>"places-0062_large.png",),
array("big"=>"places-0063_large.png",
"small"=>"places-0063_large.png",),
array("big"=>"places-0064_large.png",
"small"=>"places-0064_large.png",),
array("big"=>"places-0065_large.png",
"small"=>"places-0065_large.png",),
array("big"=>"places-0066_large.png",
"small"=>"places-0066_large.png",),
array("big"=>"places-0067_large.png",
"small"=>"places-0067_large.png",),
array("big"=>"places-0068_large.png",
"small"=>"places-0068_large.png",),
array("big"=>"places-0069_large.png",
"small"=>"places-0069_large.png",),
array("big"=>"places-0070_large.png",
"small"=>"places-0070_large.png",),
array("big"=>"places-0071_large.png",
"small"=>"places-0071_large.png",),
array("big"=>"places-0072_large.png",
"small"=>"places-0072_large.png",),
array("big"=>"places-0073_large.png",
"small"=>"places-0073_large.png",),
array("big"=>"places-0074_large.png",
"small"=>"places-0074_large.png",),
array("big"=>"places-0075_large.png",
"small"=>"places-0075_large.png",),
array("big"=>"places-0076_large.png",
"small"=>"places-0076_large.png",),
array("big"=>"places-0077_large.png",
"small"=>"places-0077_large.png",),
array("big"=>"places-0078_large.png",
"small"=>"places-0078_large.png",),
array("big"=>"places-0079_large.png",
"small"=>"places-0079_large.png",),
array("big"=>"places-0080_large.png",
"small"=>"places-0080_large.png",),
array("big"=>"places-0081_large.png",
"small"=>"places-0081_large.png",),
array("big"=>"places-0082_large.png",
"small"=>"places-0082_large.png",),
array("big"=>"places-0083_large.png",
"small"=>"places-0083_large.png",),
array("big"=>"places-0084_large.png",
"small"=>"places-0084_large.png",),
array("big"=>"places-0085_large.png",
"small"=>"places-0085_large.png",),
array("big"=>"places-0086_large.png",
"small"=>"places-0086_large.png",),
array("big"=>"places-0087_large.png",
"small"=>"places-0087_large.png",),
array("big"=>"places-0088_large.png",
"small"=>"places-0088_large.png",),
array("big"=>"places-0089_large.png",
"small"=>"places-0089_large.png",),
array("big"=>"places-0090_large.png",
"small"=>"places-0090_large.png",),
array("big"=>"places-0091_large.png",
"small"=>"places-0091_large.png",),
array("big"=>"places-0092_large.png",
"small"=>"places-0092_large.png",),
array("big"=>"places-0093_large.png",
"small"=>"places-0093_large.png",),
array("big"=>"places-0094_large.png",
"small"=>"places-0094_large.png",),
array("big"=>"places-0095_large.png",
"small"=>"places-0095_large.png",),
array("big"=>"places-0096_large.png",
"small"=>"places-0096_large.png",),
array("big"=>"places-0097_large.png",
"small"=>"places-0097_large.png",),
array("big"=>"places-0098_large.png",
"small"=>"places-0098_large.png",),
array("big"=>"places-0099_large.png",
"small"=>"places-0099_large.png",),
array("big"=>"places-0100_large.png",
"small"=>"places-0100_large.png",),
array("big"=>"places-0101_large.png",
"small"=>"places-0101_large.png",),

				)
			),
			array(
				"link"=>"symbols/",
				"name"=>"Символы",
				"images"=>array(
					
array("big"=>"symbols-0002_large.png",
"small"=>"symbols-0002_large.png",),
array("big"=>"symbols-0003_large.png",
"small"=>"symbols-0003_large.png",),
array("big"=>"symbols-0004_large.png",
"small"=>"symbols-0004_large.png",),
array("big"=>"symbols-0005_large.png",
"small"=>"symbols-0005_large.png",),
array("big"=>"symbols-0006_large.png",
"small"=>"symbols-0006_large.png",),
array("big"=>"symbols-0007_large.png",
"small"=>"symbols-0007_large.png",),
array("big"=>"symbols-0008_large.png",
"small"=>"symbols-0008_large.png",),
array("big"=>"symbols-0009_large.png",
"small"=>"symbols-0009_large.png",),
array("big"=>"symbols-0010_large.png",
"small"=>"symbols-0010_large.png",),
array("big"=>"symbols-0011_large.png",
"small"=>"symbols-0011_large.png",),
array("big"=>"symbols-0012_large.png",
"small"=>"symbols-0012_large.png",),
array("big"=>"symbols-0013_large.png",
"small"=>"symbols-0013_large.png",),
array("big"=>"symbols-0014_large.png",
"small"=>"symbols-0014_large.png",),
array("big"=>"symbols-0015_large.png",
"small"=>"symbols-0015_large.png",),
array("big"=>"symbols-0016_large.png",
"small"=>"symbols-0016_large.png",),
array("big"=>"symbols-0017_large.png",
"small"=>"symbols-0017_large.png",),
array("big"=>"symbols-0018_large.png",
"small"=>"symbols-0018_large.png",),
array("big"=>"symbols-0019_large.png",
"small"=>"symbols-0019_large.png",),
array("big"=>"symbols-0020_large.png",
"small"=>"symbols-0020_large.png",),
array("big"=>"symbols-0021_large.png",
"small"=>"symbols-0021_large.png",),
array("big"=>"symbols-0022_large.png",
"small"=>"symbols-0022_large.png",),
array("big"=>"symbols-0023_large.png",
"small"=>"symbols-0023_large.png",),
array("big"=>"symbols-0024_large.png",
"small"=>"symbols-0024_large.png",),
array("big"=>"symbols-0025_large_1.png",
"small"=>"symbols-0025_large_1.png",),
array("big"=>"symbols-0025_large.png",
"small"=>"symbols-0025_large.png",),
array("big"=>"symbols-0026_large.png",
"small"=>"symbols-0026_large.png",),
array("big"=>"symbols-0027_large.png",
"small"=>"symbols-0027_large.png",),
array("big"=>"symbols-0028_large.png",
"small"=>"symbols-0028_large.png",),
array("big"=>"symbols-0029_large.png",
"small"=>"symbols-0029_large.png",),
array("big"=>"symbols-0030_large.png",
"small"=>"symbols-0030_large.png",),
array("big"=>"symbols-0031_large.png",
"small"=>"symbols-0031_large.png",),
array("big"=>"symbols-0032_large.png",
"small"=>"symbols-0032_large.png",),
array("big"=>"symbols-0033_large.png",
"small"=>"symbols-0033_large.png",),
array("big"=>"symbols-0034_large.png",
"small"=>"symbols-0034_large.png",),
array("big"=>"symbols-0035_large.png",
"small"=>"symbols-0035_large.png",),
array("big"=>"symbols-0036_large.png",
"small"=>"symbols-0036_large.png",),
array("big"=>"symbols-0037_large.png",
"small"=>"symbols-0037_large.png",),
array("big"=>"symbols-0038_large.png",
"small"=>"symbols-0038_large.png",),
array("big"=>"symbols-0039_large.png",
"small"=>"symbols-0039_large.png",),
array("big"=>"symbols-0040_large.png",
"small"=>"symbols-0040_large.png",),
array("big"=>"symbols-0041_large.png",
"small"=>"symbols-0041_large.png",),
array("big"=>"symbols-0042_large.png",
"small"=>"symbols-0042_large.png",),
array("big"=>"symbols-0043_large.png",
"small"=>"symbols-0043_large.png",),
array("big"=>"symbols-0044_large.png",
"small"=>"symbols-0044_large.png",),
array("big"=>"symbols-0045_large.png",
"small"=>"symbols-0045_large.png",),
array("big"=>"symbols-0046_large.png",
"small"=>"symbols-0046_large.png",),
array("big"=>"symbols-0047_large.png",
"small"=>"symbols-0047_large.png",),
array("big"=>"symbols-0048_large.png",
"small"=>"symbols-0048_large.png",),
array("big"=>"symbols-0049_large.png",
"small"=>"symbols-0049_large.png",),
array("big"=>"symbols-0050_large.png",
"small"=>"symbols-0050_large.png",),
array("big"=>"symbols-0051_large.png",
"small"=>"symbols-0051_large.png",),
array("big"=>"symbols-0052_large.png",
"small"=>"symbols-0052_large.png",),
array("big"=>"symbols-0053_large.png",
"small"=>"symbols-0053_large.png",),
array("big"=>"symbols-0054_large.png",
"small"=>"symbols-0054_large.png",),
array("big"=>"symbols-0055_large.png",
"small"=>"symbols-0055_large.png",),
array("big"=>"symbols-0056_large.png",
"small"=>"symbols-0056_large.png",),
array("big"=>"symbols-0057_large.png",
"small"=>"symbols-0057_large.png",),
array("big"=>"symbols-0058_large.png",
"small"=>"symbols-0058_large.png",),
array("big"=>"symbols-0059_large.png",
"small"=>"symbols-0059_large.png",),
array("big"=>"symbols-0060_large.png",
"small"=>"symbols-0060_large.png",),
array("big"=>"symbols-0061_large.png",
"small"=>"symbols-0061_large.png",),
array("big"=>"symbols-0062_large.png",
"small"=>"symbols-0062_large.png",),
array("big"=>"symbols-0063_large.png",
"small"=>"symbols-0063_large.png",),
array("big"=>"symbols-0064_large.png",
"small"=>"symbols-0064_large.png",),
array("big"=>"symbols-0065_large.png",
"small"=>"symbols-0065_large.png",),
array("big"=>"symbols-0066_large.png",
"small"=>"symbols-0066_large.png",),
array("big"=>"symbols-0067_large.png",
"small"=>"symbols-0067_large.png",),
array("big"=>"symbols-0068_large.png",
"small"=>"symbols-0068_large.png",),
array("big"=>"symbols-0069_large.png",
"small"=>"symbols-0069_large.png",),
array("big"=>"symbols-0070_large.png",
"small"=>"symbols-0070_large.png",),
array("big"=>"symbols-0071_large.png",
"small"=>"symbols-0071_large.png",),
array("big"=>"symbols-0072_large.png",
"small"=>"symbols-0072_large.png",),
array("big"=>"symbols-0073_large.png",
"small"=>"symbols-0073_large.png",),
array("big"=>"symbols-0074_large.png",
"small"=>"symbols-0074_large.png",),
array("big"=>"symbols-0076_large.png",
"small"=>"symbols-0076_large.png",),
array("big"=>"symbols-0077_large.png",
"small"=>"symbols-0077_large.png",),
array("big"=>"symbols-0078_large.png",
"small"=>"symbols-0078_large.png",),
array("big"=>"symbols-0079_large.png",
"small"=>"symbols-0079_large.png",),
array("big"=>"symbols-0080_large.png",
"small"=>"symbols-0080_large.png",),
array("big"=>"symbols-0081_large.png",
"small"=>"symbols-0081_large.png",),
array("big"=>"symbols-0082_large.png",
"small"=>"symbols-0082_large.png",),
array("big"=>"symbols-0083_large.png",
"small"=>"symbols-0083_large.png",),
array("big"=>"symbols-0084_large.png",
"small"=>"symbols-0084_large.png",),
array("big"=>"symbols-0085_large.png",
"small"=>"symbols-0085_large.png",),
array("big"=>"symbols-0086_large.png",
"small"=>"symbols-0086_large.png",),
array("big"=>"symbols-0087_large.png",
"small"=>"symbols-0087_large.png",),
array("big"=>"symbols-0088_large.png",
"small"=>"symbols-0088_large.png",),
array("big"=>"symbols-0089_large.png",
"small"=>"symbols-0089_large.png",),
array("big"=>"symbols-0090_large.png",
"small"=>"symbols-0090_large.png",),
array("big"=>"symbols-0091_large.png",
"small"=>"symbols-0091_large.png",),
array("big"=>"symbols-0092_large.png",
"small"=>"symbols-0092_large.png",),
array("big"=>"symbols-0093_large.png",
"small"=>"symbols-0093_large.png",),
array("big"=>"symbols-0094_large.png",
"small"=>"symbols-0094_large.png",),
array("big"=>"symbols-0095_large.png",
"small"=>"symbols-0095_large.png",),
array("big"=>"symbols-0096_large.png",
"small"=>"symbols-0096_large.png",),
array("big"=>"symbols-0097_large.png",
"small"=>"symbols-0097_large.png",),
array("big"=>"symbols-0098_large.png",
"small"=>"symbols-0098_large.png",),
array("big"=>"symbols-0099_large.png",
"small"=>"symbols-0099_large.png",),
array("big"=>"symbols-0100_large.png",
"small"=>"symbols-0100_large.png",),
array("big"=>"symbols-0101_large.png",
"small"=>"symbols-0101_large.png",),
array("big"=>"symbols-0102_large.png",
"small"=>"symbols-0102_large.png",),
array("big"=>"symbols-0103_large.png",
"small"=>"symbols-0103_large.png",),
array("big"=>"symbols-0104_large.png",
"small"=>"symbols-0104_large.png",),
array("big"=>"symbols-0105_large.png",
"small"=>"symbols-0105_large.png",),
array("big"=>"symbols-0106_large.png",
"small"=>"symbols-0106_large.png",),
array("big"=>"symbols-0107_large.png",
"small"=>"symbols-0107_large.png",),
array("big"=>"symbols-0108_large.png",
"small"=>"symbols-0108_large.png",),
array("big"=>"symbols-0109_large.png",
"small"=>"symbols-0109_large.png",),
array("big"=>"symbols-0110_large.png",
"small"=>"symbols-0110_large.png",),
array("big"=>"symbols-0111_large.png",
"small"=>"symbols-0111_large.png",),
array("big"=>"symbols-0112_large.png",
"small"=>"symbols-0112_large.png",),
array("big"=>"symbols-0113_large.png",
"small"=>"symbols-0113_large.png",),
array("big"=>"symbols-0114_large.png",
"small"=>"symbols-0114_large.png",),
array("big"=>"symbols-0115_large.png",
"small"=>"symbols-0115_large.png",),
array("big"=>"symbols-0116_large.png",
"small"=>"symbols-0116_large.png",),
array("big"=>"symbols-0117_large.png",
"small"=>"symbols-0117_large.png",),
array("big"=>"symbols-0118_large.png",
"small"=>"symbols-0118_large.png",),
array("big"=>"symbols-0119_large.png",
"small"=>"symbols-0119_large.png",),
array("big"=>"symbols-0120_large.png",
"small"=>"symbols-0120_large.png",),
array("big"=>"symbols-0121_large.png",
"small"=>"symbols-0121_large.png",),
array("big"=>"symbols-0122_large.png",
"small"=>"symbols-0122_large.png",),
array("big"=>"symbols-0123_large.png",
"small"=>"symbols-0123_large.png",),
array("big"=>"symbols-0124_large.png",
"small"=>"symbols-0124_large.png",),
array("big"=>"symbols-0125_large.png",
"small"=>"symbols-0125_large.png",),
array("big"=>"symbols-0126_large.png",
"small"=>"symbols-0126_large.png",),
array("big"=>"symbols-0127_large.png",
"small"=>"symbols-0127_large.png",),
array("big"=>"symbols-0128_large.png",
"small"=>"symbols-0128_large.png",),
array("big"=>"symbols-0129_large.png",
"small"=>"symbols-0129_large.png",),
array("big"=>"symbols-0130_large.png",
"small"=>"symbols-0130_large.png",),
array("big"=>"symbols-0131_large.png",
"small"=>"symbols-0131_large.png",),
array("big"=>"symbols-0132_large.png",
"small"=>"symbols-0132_large.png",),
array("big"=>"symbols-0133_large.png",
"small"=>"symbols-0133_large.png",),
array("big"=>"symbols-0134_large.png",
"small"=>"symbols-0134_large.png",),
array("big"=>"symbols-0135_large.png",
"small"=>"symbols-0135_large.png",),
array("big"=>"symbols-0136_large.png",
"small"=>"symbols-0136_large.png",),
array("big"=>"symbols-0137_large.png",
"small"=>"symbols-0137_large.png",),
array("big"=>"symbols-0138_large.png",
"small"=>"symbols-0138_large.png",),
array("big"=>"symbols-0139_large.png",
"small"=>"symbols-0139_large.png",),
array("big"=>"symbols-0140_large.png",
"small"=>"symbols-0140_large.png",),
array("big"=>"symbols-0141_large.png",
"small"=>"symbols-0141_large.png",),
array("big"=>"symbols-0142_large.png",
"small"=>"symbols-0142_large.png",),
array("big"=>"symbols-0143_large.png",
"small"=>"symbols-0143_large.png",),
array("big"=>"symbols-0144_large.png",
"small"=>"symbols-0144_large.png",),
array("big"=>"symbols-0145_large.png",
"small"=>"symbols-0145_large.png",),
array("big"=>"symbols-0146_large.png",
"small"=>"symbols-0146_large.png",),
array("big"=>"symbols-0147_large.png",
"small"=>"symbols-0147_large.png",),
array("big"=>"symbols-0148_large.png",
"small"=>"symbols-0148_large.png",),
array("big"=>"symbols-0149_large.png",
"small"=>"symbols-0149_large.png",),
array("big"=>"symbols-0150_large.png",
"small"=>"symbols-0150_large.png",),
array("big"=>"symbols-0151_large.png",
"small"=>"symbols-0151_large.png",),
array("big"=>"symbols-0152_large.png",
"small"=>"symbols-0152_large.png",),
array("big"=>"symbols-0153_large.png",
"small"=>"symbols-0153_large.png",),
array("big"=>"symbols-0154_large.png",
"small"=>"symbols-0154_large.png",),
array("big"=>"symbols-0155_large.png",
"small"=>"symbols-0155_large.png",),
array("big"=>"symbols-0156_large.png",
"small"=>"symbols-0156_large.png",),
array("big"=>"symbols-0157_large.png",
"small"=>"symbols-0157_large.png",),
array("big"=>"symbols-0158_large.png",
"small"=>"symbols-0158_large.png",),
array("big"=>"symbols-0159_large.png",
"small"=>"symbols-0159_large.png",),
array("big"=>"symbols-0160_large.png",
"small"=>"symbols-0160_large.png",),
array("big"=>"symbols-0161_large.png",
"small"=>"symbols-0161_large.png",),
array("big"=>"symbols-0162_large.png",
"small"=>"symbols-0162_large.png",),
array("big"=>"symbols-0163_large.png",
"small"=>"symbols-0163_large.png",),
array("big"=>"symbols-0164_large.png",
"small"=>"symbols-0164_large.png",),
array("big"=>"symbols-0165_large.png",
"small"=>"symbols-0165_large.png",),
array("big"=>"symbols-0166_large.png",
"small"=>"symbols-0166_large.png",),
array("big"=>"symbols-0167_large.png",
"small"=>"symbols-0167_large.png",),
array("big"=>"symbols-0168_large.png",
"small"=>"symbols-0168_large.png",),
array("big"=>"symbols-0169_large.png",
"small"=>"symbols-0169_large.png",),
array("big"=>"symbols-0170_large.png",
"small"=>"symbols-0170_large.png",),
array("big"=>"symbols-0171_large.png",
"small"=>"symbols-0171_large.png",),
array("big"=>"symbols-0172_large.png",
"small"=>"symbols-0172_large.png",),
array("big"=>"symbols-0173_large.png",
"small"=>"symbols-0173_large.png",),
array("big"=>"symbols-0174_large.png",
"small"=>"symbols-0174_large.png",),
array("big"=>"symbols-0175_large.png",
"small"=>"symbols-0175_large.png",),
array("big"=>"symbols-0176_large.png",
"small"=>"symbols-0176_large.png",),
array("big"=>"symbols-0177_large.png",
"small"=>"symbols-0177_large.png",),
array("big"=>"symbols-0178_large.png",
"small"=>"symbols-0178_large.png",),
array("big"=>"symbols-0179_large.png",
"small"=>"symbols-0179_large.png",),
array("big"=>"symbols-0180_large.png",
"small"=>"symbols-0180_large.png",),
array("big"=>"symbols-0181_large.png",
"small"=>"symbols-0181_large.png",),
array("big"=>"symbols-0182_large.png",
"small"=>"symbols-0182_large.png",),
array("big"=>"symbols-0183_large.png",
"small"=>"symbols-0183_large.png",),
array("big"=>"symbols-0184_large.png",
"small"=>"symbols-0184_large.png",),
array("big"=>"symbols-0185_large.png",
"small"=>"symbols-0185_large.png",),
array("big"=>"symbols-0186_large.png",
"small"=>"symbols-0186_large.png",),
array("big"=>"symbols-0187_large.png",
"small"=>"symbols-0187_large.png",),
array("big"=>"symbols-0190_large.png",
"small"=>"symbols-0190_large.png",),
array("big"=>"symbols-0191_large.png",
"small"=>"symbols-0191_large.png",),
array("big"=>"symbols-2_large.png",
"small"=>"symbols-2_large.png",),

				)
			),
			array(
				"link"=>"3/",
				"name"=>"Другое",
				"images"=>array(
					array(
						"big"=>"smile1.png",
						"small"=>"smile1.png"
					),
					array(
						"big"=>"smile1.png",
						"small"=>"smile1.png"
					),
					array(
						"big"=>"smile1.png",
						"small"=>"smile1.png"
					),
					array(
						"big"=>"smile1.png",
						"small"=>"smile1.png"
					),
					array(
						"big"=>"smile1.png",
						"small"=>"smile1.png"
					),
					array(
						"big"=>"smile1.png",
						"small"=>"smile1.png"
					),
				)
			),
		)
);
?>
