<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
global $mail_controls;
$mail_controls = array(
	
	"Host" => 'smtp.yandex.ru',
    "Port" => "25",
    "Username" => 'wisethetwice@yandex.ru',              
    "Password" => '2glvPRO100'                  
  	
);
global $bd_controls; 
$bd_controls = array(
	"dbhost" => "localhost",
	//"dbhost" => "localhost",
        // Имя пользователя базы данных 
    "dbuser" => "u11014_ohcasey", 
    //"dbuser" => "root",
            // и его пароль 
     "dbpass" => "ohcasey",
    //"dbpass" => "12345",
            // Имя базы данных, на хостинге или локальной машине 
     "dbname" => "u11014_ohcasey" 
);
//страницы
global $pages; 
$pages= array("main","cart","success");
global $subfunctions;
$subfunctions= array(
	"main" =>array("get_data", "save_img", "add_to_cart", "save_png", "save_svg", "save_png2", "total_list"),
	"success"=>array() , 
	"cart" =>array("remove_item", "confirm_order", "get_city", "robo_success","robo_fail","robo_result","get_city_sdec", "get_cost_sdec","get_cost_summary")
 );
//конфиги девайсов
global $config;
$config = array(
		"deliver_cost" => array(
			"self" =>  0, //самовывоз
			"kur_mos" =>  350,
			"kur_rus" =>  650,
			"mail_ru" => 300,  //самовывоз
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
					   //"default"=>true
				),
			array(
					   "id"=>"iphone6s",	
					   "name"=>"iPhone 6s",
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
					"name" => "Силикон",
					"descr_1" => "Полностью прозрачный",
					"desctop_mask_2"=>"iphone_6_mask_2.png",
					"descr_2" => "Оптимальная толщина. Отличная защита устройства при падениях. Не скользит в руке",
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
					"name" => "Пластик",
					"descr_1" => "Матовый полупрозрачный",
					"descr_2" => "Тонкий, но прочный, бархатистый на ощупь. Не скользит в руке",
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
				/*
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
				*/
				array(
					"name" => "Soft Touch",
					"descr_1" => "матовый черный",
					"descr_2" => "Бархатистый, приятный на ощупь чехол. Не скользит в руке",
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
					"name" => "Силикон",
					"descr_1" => "Полностью прозрачный",
					"desctop_mask_2"=>"iphone_6_mask_2.png",
					"descr_2" => "Оптимальная толщина. Отличная защита устройства при падениях. Не скользит в руке",
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
					"name" => "Пластик",
					"descr_1" => "Матовый полупрозрачный",
					"descr_2" => "Тонкий, но прочный, бархатистый на ощупь. Не скользит в руке",
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
				/*
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
				*/
				array(
					"name" => "Пластик",
					"descr_1" => "матовый черный",
					"descr_2" => "Бархатистый, приятный на ощупь чехол. Не скользит в руке",
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
			//id device
			"iphone6s"=>array(
				array(
					"name" => "Силикон",
					"descr_1" => "Полностью прозрачный",
					"desctop_mask_2"=>"iphone_6_mask_2.png",
					"descr_2" => "Оптимальная толщина. Отличная защита устройства при падениях. Не скользит в руке",
					"lib_img" => "iphone6_crystal_icon.png",
					"default"=>true,
					"colors"=> array(
									array(		
										//золотой прозрачный
											"id"=>60,
											"color"=>"#CF9657",
											"desctop_img" => "iphone6_gold_crystal_case.png",
											"desctop_mask" => "iphone6-6+.png", //обрезка
											"desctop_camera" => "iphone6_gold_camera.png",
											"cost"=>1500,
											"default"=>true
									),
									array(		
										//розовый прозрачный
											"id"=>61,
											"color"=>"#E2A2AC",
											"desctop_img" => "iphone6s_pink_crystal_case.png",
											"desctop_mask" => "iphone6-6+.png", //обрезка
											"desctop_camera" => "iphone6-6plus_pink_camera.png",
											"cost"=>1500
									),
									array(	
										//серебристый прозрачный
											"id"=>62,
											"color"=>"#BBBBBB",
											"desctop_img" => "iphone6_silver_crystal_case.png",
											"desctop_mask" => "iphone6-6+.png",
											"desctop_camera" => "iphone6_silver_camera.png",
											"cost"=>1500
									),
									array(	
										//серый прозрачный прозрачный
											"id"=>63,
											"color"=>"#888888",
											"desctop_img" => "iphone6_gray_crystal_case.png",
											"desctop_mask" => "iphone6-6+.png",
											"desctop_camera" => "iphone6_gray_camera.png",
											"cost"=>1500
									),
										
								)
				),
				
				array(
					"name" => "Пластик",
					"descr_1" => "Матовый полупрозрачный",
					"descr_2" => "Тонкий, но прочный, бархатистый на ощупь. Не скользит в руке",
					"desctop_mask_2"=>"iphone_6_mask_2.png",
					"lib_img" => "iphone6_white_crystal_icon.png",
					"colors"=> array(
									array(		
										//золотой прозрачный
											"id"=>64,
											"color"=>"#CF9657",
											"desctop_img" => "iphone6_gold_whitecrystal_case.png",
											"desctop_mask" => "iphone6-6+.png", //обрезка
											"desctop_camera" => "iphone6_gold_camera.png",
											"cost"=>1500,
											"default"=>true
									),
									array(		
										//розовый полупрозрачный
											"id"=>65,
											"color"=>"#E2A2AC",
											"desctop_img" => "iphone6s_pink_whitecrystal_case.png",
											"desctop_mask" => "iphone6-6+.png", //обрезка
											"desctop_camera" => "iphone6-6plus_pink_camera.png",
											"cost"=>1500
									),
									array(	
										//серебристый прозрачный
											"id"=>66,
											"color"=>"#BBBBBB",
											"desctop_img" => "iphone6_silver_whitecrystal_case.png",
											"desctop_mask" => "iphone6-6+.png",
											"desctop_camera" => "iphone6_silver_camera.png",
											"cost"=>1500
									),
									array(	
										//серый прозрачный прозрачный
											"id"=>67,
											"color"=>"#888888",
											"desctop_img" => "iphone6_gray_whitecrystal_case.png",
											"desctop_mask" => "iphone6-6+.png",
											"desctop_camera" => "iphone6_gray_camera.png",
											"cost"=>1500
									),
										
								)
				),
				/*
				array(
					"name" => "Soft Touch",
					"descr_1" => "матовый белый",
					"descr_2" => "Бархатистый, приятный на ощупь чехол. Аккуратно! Сильно пачкается.",
					"desctop_mask_2"=>"iphone_6_mask_2.png",
					"lib_img" => "iphone6_white_icon.png",
					"colors"=> array(
									//цвет - вид (hex, rgb, transparent или название цвета)
										array(		
											"id"=>68,
											"color"=>"transparent",
											"desctop_img" => "iphone6_white_softtouch_case.png",
											"desctop_mask" => "iphone6-6+.png", //обрезка
											"desctop_camera" => "iphone6_silver_camera.png",
											"cost"=>1500
										)
									
									)
				),
				*/
				array(
					"name" => "Soft Touch",
					"descr_1" => "матовый черный",
					"descr_2" => "Бархатистый, приятный на ощупь чехол. Не скользит в руке",
					"desctop_mask_2"=>"iphone_6_mask_2.png",
					"lib_img" => "iphone6_black_icon.png",
					"default_color"=>"white",
					"colors"=> array(
									//цвет - вид (hex, rgb, transparent или название цвета)
										array(		
											"id"=>69,
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
				
				array(
					"name" => "Силикон",
					"descr_1" => "Полностью прозрачный",
					"descr_2" => "Оптимальная толщина. Отличная защита устройства при падениях. Не скользит в руке",
					"lib_img" => "iphone5_5s_crystal_icon.png",
					//"desctop_mask_2"=>"iphone_6_mask_2.png",
					"default"=>true,
					"colors"=> array(
									array(		
											"id"=>36,
											"color"=>"#CF9657",   
											"desctop_img" => "iphone5s_gold_crystal_case.png",
											"desctop_mask" => "iphone5-5s.png", //обрезка
											"desctop_camera" => "iphone5s_gold_camera.png",
											"cost"=>1500,
											"default"=>true
									),
										array(	
											"id"=>37,
											"color"=>"#BBBBBB",
											"desctop_img" => "iphone5s_silver_crystal_case.png",
											"desctop_mask" => "iphone5-5s.png",
											"desctop_camera" => "iphone5s_silver_camera.png",
											"cost"=>1500
										),
										 array(
										 	"id"=>38,
											"color"=>"#888888",
											"desctop_img" => "iphone5s_gray_crystal_case.png",
											"desctop_mask" => "iphone5-5s.png",
											"desctop_camera" => "iphone5s_gray_camera.png",
											"cost"=>1500
										),
									array(		
											"id"=>39,
											"color"=>"#FFFFFF",   
											"desctop_img" => "iphone5_white_crystal_case.png",
											"desctop_mask" => "iphone5-5s.png", //обрезка
											"desctop_camera" => "iphone5_white_camera.png",
											"cost"=>1500,
											//"default"=>true
									),
										array(	
											"id"=>40,
											"color"=>"#000000",
											"desctop_img" => "iphone5_black_crystal_case.png",
											"desctop_mask" => "iphone5-5s.png",
											"desctop_camera" => "iphone5_black_camera.png",
											"cost"=>1500
										),
									
								)
				),
				
				/* матовый полупрозрачный*/
				array(
					"name" => "Пластик",
					"descr_1" => "Матовый полупрозрачный",
					"descr_2" => "Тонкий, но прочный, бархатистый на ощупь. Не скользит в руке",
					"lib_img" => "iphone5_5s_white_crystal_icon.png",
					//"desctop_mask_2"=>"iphone_6_mask_2.png",
					//"default"=>true,
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
				/*
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
				*/
				array(
					"name" => "Пластик",
					"descr_1" => "Матовый черный",
					"descr_2" => "Тонкий, но прочный, бархатистый на ощупь. Не скользит в руке",
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
				array(
					"name" => "Силикон",
					"descr_1" => "Полностью прозрачный",
					"descr_2" => "Оптимальная толщина. Отличная защита устройства при падениях. Не скользит в руке",
					"lib_img" => "iphone5_5s_crystal_icon.png",
					//"desctop_mask_2"=>"iphone_6_mask_2.png",
					"default"=>true,
					"colors"=> array(
									array(		
											"id"=>46,
											"color"=>"#CF9657",   
											"desctop_img" => "iphone5s_gold_crystal_case.png",
											"desctop_mask" => "iphone5-5s.png", //обрезка
											"desctop_camera" => "iphone5s_gold_camera.png",
											"cost"=>1500,
											"default"=>true
									),
										array(	
											"id"=>47,
											"color"=>"#BBBBBB",
											"desctop_img" => "iphone5s_silver_crystal_case.png",
											"desctop_mask" => "iphone5-5s.png",
											"desctop_camera" => "iphone5s_silver_camera.png",
											"cost"=>1500
										),
										 array(
										 	"id"=>48,
											"color"=>"#888888",
											"desctop_img" => "iphone5s_gray_crystal_case.png",
											"desctop_mask" => "iphone5-5s.png",
											"desctop_camera" => "iphone5s_gray_camera.png",
											"cost"=>1500
										),
									array(		
											"id"=>49,
											"color"=>"#FFFFFF",   
											"desctop_img" => "iphone5_white_crystal_case.png",
											"desctop_mask" => "iphone5-5s.png", //обрезка
											"desctop_camera" => "iphone5_white_camera.png",
											"cost"=>1500,
											//"default"=>true
									),
										array(	
											"id"=>50,
											"color"=>"#000000",
											"desctop_img" => "iphone5_black_crystal_case.png",
											"desctop_mask" => "iphone5-5s.png",
											"desctop_camera" => "iphone5_black_camera.png",
											"cost"=>1500
										),
									
								)
				),
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
					"name" => "Пластик",
					"descr_1" => "Матовый полупрозрачный",
					"descr_2" => "Тонкий, но прочный, бархатистый на ощупь. Не скользит в руке",
					"lib_img" => "iphone5_5s_white_crystal_icon.png",
					//"desctop_mask_2"=>"iphone_6_mask_2.png",
					//"default"=>true,
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
				/*
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
				*/
				array(
					"name" => "Пластик",
					"descr_1" => "Матовый черный",
					"descr_2" => "Тонкий, но прочный, бархатистый на ощупь. Не скользит в руке",
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
				
				array(
					"name" => "Силикон",
					"descr_1" => "Полностью прозрачный",
					"descr_2" => "Оптимальная толщина. Отличная защита устройства при падениях. Не скользит в руке",
					"lib_img" => "iphone5c_crystal_icon.png",
					//"desctop_mask_2"=>"iphone_6_mask_2.png",
					"default"=>true,
					"colors"=> array(
									array(		
											"id"=>41,
											"color"=>"#0000FF",   
											"desctop_img" => "iphone5c_blue_crystal_case.png",
											"desctop_mask" => "iphone5c.png", //обрезка
											"desctop_camera" => "iphone5c_blue_camera.png",
											"cost"=>1500,
											"default"=>true
									),
										array(	
											"id"=>42,
											"color"=>"#00FF00",   
											"desctop_img" => "iphone5c_green_crystal_case.png",
											"desctop_mask" => "iphone5c.png", //обрезка
											"desctop_camera" => "iphone5c_green_camera.png",
											"cost"=>1500,
											//"default"=>true
										),
										 array(
										 	"id"=>43,
											"color"=>"#FF0011",
											"desctop_img" => "iphone5c_red_crystal_case.png",
											"desctop_mask" => "iphone5c.png", //обрезка
											"desctop_camera" => "iphone5c_red_camera.png",
											"cost"=>1500
										),
									array(		
											"id"=>44,
											"color"=>"yellow",   
											"desctop_img" => "iphone5c_yellow_crystal_case.png",
											"desctop_mask" => "iphone5c.png", //обрезка
											"desctop_camera" => "iphone5c_yellow_camera.png",
											"cost"=>1500,
											//"default"=>true
									),
										array(	
											"id"=>45,
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
					"name" => "Пластик",
					"descr_1" => "Матовый черный",
					"descr_2" => "Тонкий, но прочный, бархатистый на ощупь. Не скользит в руке",
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
											//"default"=>true
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
											//"default"=>true
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
				/*
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
				*/
				array(
					"name" => "Пластик",
					"descr_1" => "Матовый черный",
					"descr_2" => "Тонкий, но прочный, бархатистый на ощупь. Не скользит в руке",
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
				/*
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
				*/
				array(
					"name" => "Пластик",
					"descr_1" => "Матовый черный",
					"descr_2" => "Тонкий, но прочный, бархатистый на ощупь. Не скользит в руке",
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
					
						// новое 20.04.2016
					array("big"=>"4-4s/limons_i4-4s.png",
					"small"=>"limons_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/maki_i4-4s.png",
					"small"=>"maki_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/romashki_i4-4s.png",
					"small"=>"romashki_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/tiger_i4-4s.png",
					"small"=>"tiger_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/tiger_white_i4-4s.png",
					"small"=>"tiger_white_r82.png","chechs"=>array(31,32,33,34)),
					
					
					// новое 12.04.2016
					array("big"=>"4-4s/autobuses_i4-4s.png",
					"small"=>"autobuses_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/lovec_s_cvetami_i4-4s.png",
					"small"=>"lovec_s_cvetami_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/periya_i4-4s.png",
					"small"=>"periya_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/tufli_nov_i4-4s.png",
					"small"=>"tufli_nov_r82.png","chechs"=>array(31,32,33,34)),
					
					// новое 29.03.2016
					array("big"=>"4-4s/111_i4-4s.png",
					"small"=>"111_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/Alisa_i4-4s.png",
					"small"=>"Alisa_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/Avengers_i4-4s.png",
					"small"=>"Avengers_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/baletki_Chiara_i4-4s.png",
					"small"=>"baletki_Chiara_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/baletki_Chiara2_i4-4s.png",
					"small"=>"baletki_Chiara2_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/banani_i4-4s.png",
					"small"=>"banani_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/Beyonce_i4-4s.png",
					"small"=>"Beyonce_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/CIPA_i4-4s.png",
					"small"=>"CIPA_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/fotiki_i4-4s.png",
					"small"=>"fotiki_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/Mnogo_Mickey_i4-4s.png",
					"small"=>"Mnogo_Mickey_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/ponchiki2_i4-4s.png",
					"small"=>"ponchiki2_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/ponchiki1_i4-4s.png",
					"small"=>"ponchiki1_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/paporotnik_white_i4-4s.png",
					"small"=>"paporotnik_white_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/paporotnik_black_i4-4s.png",
					"small"=>"paporotnik_black_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/nevesta_i4-4s.png",
					"small"=>"nevesta_r82.png","chechs"=>array(31,32,33,34)),
					
					//новые принты 6.03.2016
					array("big"=>"4-4s/malvina_i4-4s.png",
					"small"=>"malvina_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/roza_orhidei_i4-4s.png",
					"small"=>"roza_orhidei_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/lilii_zerkalo_i4-4s.png",
					"small"=>"lilii_zerkalo_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/vishenki_i4-4s.png",
					"small"=>"vishenki_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/terier2_i4-4s.png",
					"small"=>"terier2_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/sobaka_goroh_i4-4s.png",
					"small"=>"sobaka_goroh_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/york_lezhit_i4-4s.png",
					"small"=>"york_lezhit_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/pantera_i4-4s.png",
					"small"=>"pantera_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/buldog_angl_i4-4s.png",
					"small"=>"buldog_angl_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/buldog_kolpak_i4-4s.png",
					"small"=>"buldog_kolpak_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/mops_i4-4s.png",
					"small"=>"mops_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/cara_i4-4s.png",
					"small"=>"cara_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/chihuahua_blue_i4-4s.png",
					"small"=>"chihuahua_blue_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/chihuahua_pink_i4-4s.png",
					"small"=>"chihuahua_pink_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/chihuahua_v_sumke_i4-4s.png",
					"small"=>"chihuahua_v_sumke_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/girldog_red_i4-4s.png",
					"small"=>"girldog_red_r82.png","chechs"=>array(31,32,33,34)),
					
					//новые принты 14.02.2016
					array("big"=>"4-4s/devushka_serdce_i4-4s.png",
					"small"=>"devushka_serdce_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/Jurnali_i4-4s.png",
					"small"=>"Jurnali_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/kotik_i4-4s.png",
					"small"=>"kotik_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/Love_i4-4s.png",
					"small"=>"Love_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/nogi_i4-4s.png",
					"small"=>"nogi_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/paris-ice-cream_i4-4s.png",
					"small"=>"paris-ice-cream_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/shturmovik_i4-4s.png",
					"small"=>"shturmovik_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/starbucks_pioni_i4-4s.png",
					"small"=>"starbucks_pioni_r82.png","chechs"=>array(31,32,33,34)),
				
					
					//принты 1.02.2016
					array("big"=>"4-4s/Ulyana_koko_i4-4s.png",
					"small"=>"Ulyana_koko_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/Labuteni_TatShashkina_i4-4s.png",
					"small"=>"Labuteni_TatShashkina_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/krujevo_i4-4s.png",
					"small"=>"krujevo_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/krujevo_white_i4-4s.png",
					"small"=>"krujevo_white_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/york_i4-4s.png",
					"small"=>"york_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/shpiz_1_i4-4s.png",
					"small"=>"shpiz_1_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/shpiz_2_i4-4s.png",
					"small"=>"shpiz_2_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/buldog_i4-4s.png",
					"small"=>"buldog_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/shpiz_2_i4-4s.png",
					"small"=>"shpiz_2_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/buldog_i4-4s.png",
					"small"=>"buldog_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/sobaka_i4-4s.png",
					"small"=>"sobaka_r82.png","chechs"=>array(31,32,33,34)),
					
		
					
					
					// принты 24.01.2016
					array("big"=>"4-4s/tropiki_i4-4s.png",
					"small"=>"tropiki_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/rozovie-rozi_i4-4s.png",
					"small"=>"rozovie-rozi_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/puanti_i4-4s.png",
					"small"=>"puanti_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/paporotnik_i4-4s.png",
					"small"=>"paporotnik_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/kaktus_i4-4s.png",
					"small"=>"kaktus_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/flamingo2_i4-4s.png",
					"small"=>"flamingo2_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/flamingo_i4-4s.png",
					"small"=>"flamingo_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/cherep-s-zvetami_i4-4s.png",
					"small"=>"cherep-s-zvetami_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/bonjour_i4-4s.png",
					"small"=>"bonjour_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/mandala_i4-4s.png",
					"small"=>"mandala_r82.png","chechs"=>array(31,32,33,34)),
				
					
					// новый принты 15.01.2016
					array("big"=>"4-4s/origami_i4-4s.png",
					"small"=>"origami_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/kitty-pakety_i4-4s.png",
					"small"=>"kitty-pakety_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/kitty_i4-4s.png",
					"small"=>"kitty_r82.png","chechs"=>array(31,32,33,34)),
					
					// новые принты 20.11.2015
					array("big"=>"4-4s/orhidei_i4-4s.png",
					"small"=>"orhidei_preview.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/ded_pattern_i4-4s.png",
					"small"=>"ded_pattern_preview.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/ded_moroz_i4-4s.png",
					"small"=>"ded_moroz_preview.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/hello_winter_white_i4-4s.png",
					"small"=>"hello_winter_white_preview.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/cherep_i4-4s.png",
					"small"=>"cherep_preview.png","chechs"=>array(31,32,33,34)),
					
					
					// новые принты 20.11.2015
					array("big"=>"4-4s/paket_i4-4s.png",
					"small"=>"paket_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/starbucks_i4-4s.png",
					"small"=>"starbucks_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/pryanik_i4-4s.png",
					"small"=>"pryanik_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/blonde_i4-4s.png",
					"small"=>"blonde_r82.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/brunette_i4-4s.png",
					"small"=>"brunette_r82.png","chechs"=>array(31,32,33,34)),
					
					array(
						"big"=>"4-4s/s_elkoi_i4-4s.png",
						"small"=>"s_elkoi_r82.png",
						"chechs"=>array(31,32,33,34)
						),
					array(
						"big"=>"4-4s/dart_i4-4s.png",
						"small"=>"dart_r82.png",
						"chechs"=>array(31,32,33,34)
						),
					array(
						"big"=>"4-4s/chr-pat_i4-4s.png",
						"small"=>"chr-pat_r82.png",
						"chechs"=>array(31,32,33,34)
						),
					array(
						"big"=>"4-4s/lollipops_i4-4s.png",
						"small"=>"lollipops_r82.png",
						"chechs"=>array(31,32,33,34)
						),
					array(
						"big"=>"4-4s/rozochki_i4-4s.png",
						"small"=>"rozochki_r82.png",
						"chechs"=>array(31,32,33,34)
						),
					array(
						"big"=>"4-4s/snegiri_i4-4s.png",
						"small"=>"snegiri_r82.png",
						"chechs"=>array(31,32,33,34)
						),
					array(
						"big"=>"4-4s/zajka_i4-4s.png",
						"small"=>"zajka_r82.png",
						"chechs"=>array(31,32,33,34)
						),
					
				
					// 
					array(
						"big"=>"4-4s/bembi_i4-4s.png",
						"small"=>"bembi_r82.png",
						"chechs"=>array(31,32,33,34)
						),
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
					array("big"=>"4-4s/tufli-versache-iphonei4_4-4s.png",
					"small"=>"tufli-versache-preview.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/unicorn-iphonei4_4-4s.png",
					"small"=>"unicorn-prevew.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/uzoe-iphonei4_4-4s.png",
					"small"=>"uzor-prevew.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/serdca-iphonei4_4-4s.png",
					"small"=>"serdca-preview.png","chechs"=>array(31,32,33,34)),
					
					array("big"=>"4-4s/odri-iphonei4_4-4s.png",
					"small"=>"odri-preview.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/odri-white-iphonei4_4-4s.png",
					"small"=>"odri-white-preview.png","chechs"=>array(31,32,33,34)),
					
					// паттерны черные - белые - цветные 
					
					array(
						"big"=>"4-4s/chr1_i4-4s.png",
						"small"=>"chr1_r82.png",
						"chechs"=>array(31,32,33,34)
						),
					array(
						"big"=>"4-4s/chr2_i4-4s.png",
						"small"=>"chr2_r82.png",
						"chechs"=>array(31,32,33,34)
						),
					array(
						"big"=>"4-4s/chr3_i4-4s.png",
						"small"=>"chr3_r82.png",
						"chechs"=>array(31,32,33,34)
						),
					array(
						"big"=>"4-4s/confetti1_i4-4s.png",
						"small"=>"confetti1_r82.png",
						"chechs"=>array(31,32,33,34)
						),
					array(
						"big"=>"4-4s/confetti2_i4-4s.png",
						"small"=>"confetti2_r82.png",
						"chechs"=>array(31,32,33,34)
						),
					array(
						"big"=>"4-4s/confetti3_i4-4s.png",
						"small"=>"confetti3_r82.png",
						"chechs"=>array(31,32,33,34)
						),
					array(
						"big"=>"4-4s/confetti4_i4-4s.png",
						"small"=>"confetti4_r82.png",
						"chechs"=>array(31,32,33,34)
						),
					array(
						"big"=>"4-4s/confetti5_i4-4s.png",
						"small"=>"confetti5_r82.png",
						"chechs"=>array(31,32,33,34)
						),
					array(
						"big"=>"4-4s/gor1_i4-4s.png",
						"small"=>"gor1_r82.png",
						"chechs"=>array(31,32,33,34)
						),
					array(
						"big"=>"4-4s/gor2_i4-4s.png",
						"small"=>"gor2_r82.png",
						"chechs"=>array(31,32,33,34)
						),
					array(
						"big"=>"4-4s/goroh2_i4-4s.png",
						"small"=>"goroh2_r82.png",
						"chechs"=>array(31,32,33,34)
						),
					array(
						"big"=>"4-4s/goroh3_i4-4s.png",
						"small"=>"goroh3_r82.png",
						"chechs"=>array(31,32,33,34)
						),
					array(
						"big"=>"4-4s/goroshki_i4-4s.png",
						"small"=>"goroshki_r82.png",
						"chechs"=>array(31,32,33,34)
						),
					array(
						"big"=>"4-4s/hearts_black_i4-4s.png",
						"small"=>"hearts_black_r82.png",
						"chechs"=>array(31,32,33,34)
						),
					array(
						"big"=>"4-4s/hearts_white_i4-4s.png",
						"small"=>"hearts_white_r82.png",
						"chechs"=>array(31,32,33,34)
						),
					array(
						"big"=>"4-4s/ny_pattern_black_i4-4s.png",
						"small"=>"ny_pattern_black_r82.png",
						"chechs"=>array(31,32,33,34)
						),
					array(
						"big"=>"4-4s/ny_pattern_color_i4-4s.png",
						"small"=>"ny_pattern_color_r82.png",
						"chechs"=>array(31,32,33,34)
						),
					array(
						"big"=>"4-4s/ny_pattern_white_i4-4s.png",
						"small"=>"ny_pattern_white_r82.png",
						"chechs"=>array(31,32,33,34)
						),
					array(
						"big"=>"4-4s/snowflakes_red_i4-4s.png",
						"small"=>"snowflakes_red_r82.png",
						"chechs"=>array(31,32,33,34)
						),
					array(
						"big"=>"4-4s/snowflakes_white_i4-4s.png",
						"small"=>"snowflakes_white_r82.png",
						"chechs"=>array(31,32,33,34)
						),
					
					array("big"=>"4-4s/ogurci-black-iphonei4_4-4s.png",
					"small"=>"ogurci-black-preview.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/ogurci-iphonei4_4-4s.png",
					"small"=>"ogurci-preview.png","chechs"=>array(31,32,33,34)),
					
					array("big"=>"4-4s/hamsa-black-iphonei4_4-4s.png",
					"small"=>"hamsa-black-preview.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/hamsa-iphonei4_4-4s.png",
					"small"=>"hamsa-preview.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/david-black-iphonei4_4-4s.png",
					"small"=>"david-black-preview.png","chechs"=>array(31,32,33,34)),
					array("big"=>"4-4s/david-iphonei4_4-4s.png",
					"small"=>"david-preview.png","chechs"=>array(31,32,33,34)),

					

					//iphone5
					
					// новое 20.04.2016
					array("big"=>"5-5s-5c/limons_i5-5s-5c.png",
					"small"=>"limons_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/maki_i5-5s-5c.png",
					"small"=>"maki_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/romashki_i5-5s-5c.png",
					"small"=>"romashki_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/tiger_i5-5s-5c.png",
					"small"=>"tiger_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/tiger_white_i5-5s-5c.png",
					"small"=>"tiger_white_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					
					// новое 12.04.2016
					array("big"=>"5-5s-5c/autobuses_i5-5s-5c.png",
					"small"=>"autobuses_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/lovec_s_cvetami_i5-5s-5c.png",
					"small"=>"lovec_s_cvetami_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/periya_i5-5s-5c.png",
					"small"=>"periya_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/tufli_nov_i5-5s-5c.png",
					"small"=>"tufli_nov_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					
					// новое 29.03.2016
					array("big"=>"5-5s-5c/111_i5-5s-5c.png",
					"small"=>"111_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/Alisa_i5-5s-5c.png",
					"small"=>"Alisa_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/Avengers_i5-5s-5c.png",
					"small"=>"Avengers_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/baletki_Chiara_i5-5s-5c.png",
					"small"=>"baletki_Chiara_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/baletki_Chiara2_i5-5s-5c.png",
					"small"=>"baletki_Chiara2_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/banani_i5-5s-5c.png",
					"small"=>"banani_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/Beyonce_i5-5s-5c.png",
					"small"=>"Beyonce_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/CIPA_i5-5s-5c.png",
					"small"=>"CIPA_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/fotiki_i5-5s-5c.png",
					"small"=>"fotiki_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/Mnogo_Mickey_i5-5s-5c.png",
					"small"=>"Mnogo_Mickey_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/ponchiki2_i5-5s-5c.png",
					"small"=>"ponchiki2_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/ponchiki1_i5-5s-5c.png",
					"small"=>"ponchiki1_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/paporotnik_white_i5-5s-5c.png",
					"small"=>"paporotnik_white_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/paporotnik_black_i5-5s-5c.png",
					"small"=>"paporotnik_black_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/nevesta_i5-5s-5c.png",
					"small"=>"nevesta_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					
					//новые принты 14.02.2016
					array("big"=>"5-5s-5c/malvina_i5-5s-5c.png",
					"small"=>"malvina_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/roza_orhidei_i5-5s-5c.png",
					"small"=>"roza_orhidei_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/lilii_zerkalo_i5-5s-5c.png",
					"small"=>"lilii_zerkalo_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/vishenki_i5-5s-5c.png",
					"small"=>"vishenki_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/terier2_i5-5s-5c.png",
					"small"=>"terier2_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/sobaka_goroh_i5-5s-5c.png",
					"small"=>"sobaka_goroh_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/york_lezhit_i5-5s-5c.png",
					"small"=>"york_lezhit_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/pantera_i5-5s-5c.png",
					"small"=>"pantera_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/buldog_angl_i5-5s-5c.png",
					"small"=>"buldog_angl_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/buldog_kolpak_i5-5s-5c.png",
					"small"=>"buldog_kolpak_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/mops_i5-5s-5c.png",
					"small"=>"mops_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/cara_i5-5s-5c.png",
					"small"=>"cara_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/chihuahua_blue_i5-5s-5c.png",
					"small"=>"chihuahua_blue_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/chihuahua_pink_i5-5s-5c.png",
					"small"=>"chihuahua_pink_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/chihuahua_v_sumke_i5-5s-5c.png",
					"small"=>"chihuahua_v_sumke_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/girldog_red_i5-5s-5c.png",
					"small"=>"girldog_red_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					
					//новые принты 14.02.2016
					array("big"=>"5-5s-5c/devushka_serdce_i5-5s-5c.png",
					"small"=>"devushka_serdce_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/Jurnali_i5-5s-5c.png",
					"small"=>"Jurnali_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/kotik_i5-5s-5c.png",
					"small"=>"kotik_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/Love_i5-5s-5c.png",
					"small"=>"Love_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/nogi_i5-5s-5c.png",
					"small"=>"nogi_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/paris-ice-cream_i5-5s-5c.png",
					"small"=>"paris-ice-cream_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/shturmovik_i5-5s-5c.png",
					"small"=>"shturmovik_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/starbucks_pioni_i5-5s-5c.png",
					"small"=>"starbucks_pioni_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					
					
					//принты 1.02.2016
					array("big"=>"5-5s-5c/Ulyana_koko_i5-5s-5c.png",
					"small"=>"Ulyana_koko_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/Labuteni_TatShashkina_i5-5s-5c.png",
					"small"=>"Labuteni_TatShashkina_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/krujevo_i5-5s-5c.png",
					"small"=>"krujevo_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/krujevo_white_i5-5s-5c.png",
					"small"=>"krujevo_white_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/york_i5-5s-5c.png",
					"small"=>"york_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/shpiz_1_i5-5s-5c.png",
					"small"=>"shpiz_1_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/shpiz_2_i5-5s-5c.png",
					"small"=>"shpiz_2_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/buldog_i5-5s-5c.png",
					"small"=>"buldog_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/sobaka_i5-5s-5c.png",
					"small"=>"sobaka_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					
					
					
						// принты 24.01.2016
					array("big"=>"5-5s-5c/tropiki_i5-5s-5c.png",
					"small"=>"tropiki_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/rozovie-rozi_i5-5s-5c.png",
					"small"=>"rozovie-rozi_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/puanti_i5-5s-5c.png",
					"small"=>"puanti_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/paporotnik_i5-5s-5c.png",
					"small"=>"paporotnik_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/kaktus_i5-5s-5c.png",
					"small"=>"kaktus_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/flamingo2_i5-5s-5c.png",
					"small"=>"flamingo2_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/flamingo_i5-5s-5c.png",
					"small"=>"flamingo_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/cherep-s-zvetami_i5-5s-5c.png",
					"small"=>"cherep-s-zvetami_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/bonjour_i5-5s-5c.png",
					"small"=>"bonjour_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/mandala_i5-5s-5c.png",
					"small"=>"mandala_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					
					// новый принты 15.01.2016
					array("big"=>"5-5s-5c/origami_i5-5s-5c.png",
					"small"=>"origami_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/kitty-pakety_i5-5s-5c.png",
					"small"=>"kitty-pakety_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/kitty_i5-5s-5c.png",
					"small"=>"kitty_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					
						// новые принты 20.11.2015
					array("big"=>"5-5s-5c/orhidei_i5-5s-5c.png",
					"small"=>"orhidei_preview.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/ded_pattern_i5-5s-5c.png",
					"small"=>"ded_pattern_preview.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/ded_moroz_i5-5s-5c.png",
					"small"=>"ded_moroz_preview.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/hello_winter_white_i5-5s-5c.png",
					"small"=>"hello_winter_white_preview.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/cherep_i5-5s-5c.png",
					"small"=>"cherep_preview.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					
					array("big"=>"5-5s-5c/paket_i5-5s-5c.png",
					"small"=>"paket_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/starbucks_i5-5s-5c.png",
					"small"=>"starbucks_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/pryanik_i5-5s-5c.png",
					"small"=>"pryanik_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/blonde_i5-5s-5c.png",
					"small"=>"blonde_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/brunette_i5-5s-5c.png",
					"small"=>"brunette_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),

					// новые принты 20.11.2015
					array(
						"big"=>"5-5s-5c/s_elkoi_i5-5s-5c.png",
						"small"=>"s_elkoi_r82.png",
						"chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)
						),
					array(
						"big"=>"5-5s-5c/dart_i5-5s-5c.png",
						"small"=>"dart_r82.png",
						"chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)
						),
					array(
						"big"=>"5-5s-5c/chr-pat_i5-5s-5c.png",
						"small"=>"chr-pat_r82.png",
						"chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)
						),
					array(
						"big"=>"5-5s-5c/lollipops_i5-5s-5c.png",
						"small"=>"lollipops_r82.png",
						"chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)
						),
					array(
						"big"=>"5-5s-5c/rozochki_i5-5s-5c.png",
						"small"=>"rozochki_r82.png",
						"chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)
						),
					array(
						"big"=>"5-5s-5c/snegiri_i5-5s-5c.png",
						"small"=>"snegiri_r82.png",
						"chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)
						),
					array(
						"big"=>"5-5s-5c/zajka_i5-5s-5c.png",
						"small"=>"zajka_r82.png",
						"chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)
						),
					
					
					

					// 
					array("big"=>"5-5s-5c/donuts_i5-5s-5c.png",
					"small"=>"donuts_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/mickey_i5-5s-5c.png",
					"small"=>"mickey_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/minnie_i5-5s-5c.png",
					"small"=>"minnie_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					

					array("big"=>"5-5s-5c/bembi_i5-5s-5c.png",
					"small"=>"bembi_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/devochka_i5-5s-5c.png",
					"small"=>"devochka_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/dior_kedy_i5-5s-5c.png",
					"small"=>"dior_kedy_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/duhi_v_ruke_i5-5s-5c.png",
					"small"=>"duhi_v_ruke_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/edinorog_i5-5s-5c.png",
					"small"=>"edinorog_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/edinorog2_i5-5s-5c.png",
					"small"=>"edinorog2_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/fashion_i5-5s-5c.png",
					"small"=>"fashion_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/fendi_i5-5s-5c.png",
					"small"=>"fendi_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/karl_i5-5s-5c.png",
					"small"=>"karl_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/katava_i5-5s-5c.png",
					"small"=>"katava_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/koko_madm_i5-5s-5c.png",
					"small"=>"koko_madm_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/Lubuteny_i5-5s-5c.png",
					"small"=>"Lubuteny_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/makaruny_i5-5s-5c.png",
					"small"=>"makaruny_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/manolo_i5-5s-5c.png",
					"small"=>"manolo_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/miss_dior_i5-5s-5c.png",
					"small"=>"miss_dior_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/nike_i5-5s-5c.png",
					"small"=>"nike_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/palmy_i5-5s-5c.png",
					"small"=>"palmy_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/paris_i5-5s-5c.png",
					"small"=>"paris_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/pomada_mac_i5-5s-5c.png",
					"small"=>"pomada_mac_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/pomada2_i5-5s-5c.png",
					"small"=>"pomada2_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/rozy_i5-5s-5c.png",
					"small"=>"rozy_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/ryukzak_i5-5s-5c.png",
					"small"=>"ryukzak_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/sakura_i5-5s-5c.png",
					"small"=>"sakura_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/tufli_valentino_i5-5s-5c.png",
					"small"=>"tufli_valentino_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/tufli_valentino_i5-5s-5c.png",
					"small"=>"tufli_valentino_r82.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/tufli-versache-iphonei5-5s-5c.png",
					"small"=>"tufli-versache-preview.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/unicorn-iphonei5-5s-5c.png",
					"small"=>"unicorn-prevew.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/uzor-iphonei5-5s-5c.png",
					"small"=>"uzor-prevew.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/serdca-iphonei5-5s-5c.png",
					"small"=>"serdca-preview.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					
					array("big"=>"5-5s-5c/ogurci-iphonei5-5s-5c.png",
					"small"=>"odri-preview.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/odri-white-iphonei5-5s-5c.png",
					"small"=>"odri-white-preview.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					
					// паттерны - четное - белое - цветное
					array(
						"big"=>"5-5s-5c/chr1_i5-5s-5c.png",
						"small"=>"chr1_r82.png",
						"chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)
						),
					array(
						"big"=>"5-5s-5c/chr2_i5-5s-5c.png",
						"small"=>"chr2_r82.png",
						"chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)
						),
					array(
						"big"=>"5-5s-5c/chr3_i5-5s-5c.png",
						"small"=>"chr3_r82.png",
						"chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)
						),
					array(
						"big"=>"5-5s-5c/confetti1_i5-5s-5c.png",
						"small"=>"confetti1_r82.png",
						"chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)
						),
					array(
						"big"=>"5-5s-5c/confetti2_i5-5s-5c.png",
						"small"=>"confetti2_r82.png",
						"chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)
						),
					array(
						"big"=>"5-5s-5c/confetti3_i5-5s-5c.png",
						"small"=>"confetti3_r82.png",
						"chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)
						),
					array(
						"big"=>"5-5s-5c/confetti4_i5-5s-5c.png",
						"small"=>"confetti4_r82.png",
						"chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)
						),
					array(
						"big"=>"5-5s-5c/confetti5_i5-5s-5c.png",
						"small"=>"confetti5_r82.png",
						"chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)
						),
					array(
						"big"=>"5-5s-5c/gor1_i5-5s-5c.png",
						"small"=>"gor1_r82.png",
						"chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)
						),
					array(
						"big"=>"5-5s-5c/gor2_i5-5s-5c.png",
						"small"=>"gor2_r82.png",
						"chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)
						),
					array(
						"big"=>"5-5s-5c/goroh2_i5-5s-5c.png",
						"small"=>"goroh2_r82.png",
						"chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)
						),
					array(
						"big"=>"5-5s-5c/goroh3_i5-5s-5c.png",
						"small"=>"goroh3_r82.png",
						"chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)
						),
					array(
						"big"=>"5-5s-5c/goroshki_i5-5s-5c.png",
						"small"=>"goroshki_r82.png",
						"chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)
						),
					array(
						"big"=>"5-5s-5c/hearts_black_i5-5s-5c.png",
						"small"=>"hearts_black_r82.png",
						"chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)
						),
					array(
						"big"=>"5-5s-5c/hearts_white_i5-5s-5c.png",
						"small"=>"hearts_white_r82.png",
						"chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)
						),
					array(
						"big"=>"5-5s-5c/ny_pattern_black_i5-5s-5c.png",
						"small"=>"ny_pattern_black_r82.png",
						"chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)
						),
					array(
						"big"=>"5-5s-5c/ny_pattern_color_i5-5s-5c.png",
						"small"=>"ny_pattern_color_r82.png",
						"chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)
						),
					array(
						"big"=>"5-5s-5c/ny_pattern_white_i5-5s-5c.png",
						"small"=>"ny_pattern_white_r82.png",
						"chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)
						),
					array(
						"big"=>"5-5s-5c/snowflakes_red_i5-5s-5c.png",
						"small"=>"snowflakes_red_r82.png",
						"chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)
						),
					array(
						"big"=>"5-5s-5c/snowflakes_white_i5-5s-5c.png",
						"small"=>"snowflakes_white_r82.png",
						"chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)
						),
					array("big"=>"5-5s-5c/ogurci-black-iphonei5-5s-5c.png",
					"small"=>"ogurci-black-preview.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/ogurci-iphonei5-5s-5c.png",
					"small"=>"ogurci-preview.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					
					array("big"=>"5-5s-5c/hamsa-black-iphonei5-5s-5c.png",
					"small"=>"hamsa-black-preview.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/hamsa-iphonei5-5s-5c.png",
					"small"=>"hamsa-preview.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/david-black-iphonei5-5s-5c.png",
					"small"=>"david-black-preview.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),
					array("big"=>"5-5s-5c/david-iphonei5-5s-5c.png",
					"small"=>"david-preview.png","chechs"=>array(16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50)),



					//iphone6
					
					// новое 20.04.2016
					array("big"=>"6-6+/limons_i6-6+.png",
					"small"=>"limons_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/maki_i6-6+.png",
					"small"=>"maki_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/romashki_i6-6+.png",
					"small"=>"romashki_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/tiger_i6-6+.png",
					"small"=>"tiger_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/tiger_white_i6-6+.png",
					"small"=>"tiger_white_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					
					// новое 14.03
					array("big"=>"6-6+/autobuses_i6-6+.png",
					"small"=>"autobuses_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/lovec_s_cvetami_i6-6+.png",
					"small"=>"lovec_s_cvetami_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/periya_i6-6+.png",
					"small"=>"periya_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/tufli_nov_i6-6+.png",
					"small"=>"tufli_nov_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					
					// новые 29.03
						array("big"=>"6-6+/111_i6-6+.png",
					"small"=>"111_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/Alisa_i6-6+.png",
					"small"=>"Alisa_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/Avengers_i6-6+.png",
					"small"=>"Avengers_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/baletki_Chiara_i6-6+.png",
					"small"=>"baletki_Chiara_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/baletki_Chiara2_i6-6+.png",
					"small"=>"baletki_Chiara2_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/banani_i6-6+.png",
					"small"=>"banani_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/Beyonce_i6-6+.png",
					"small"=>"Beyonce_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/CIPA_i6-6+.png",
					"small"=>"CIPA_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/fotiki_i6-6+.png",
					"small"=>"fotiki_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/Mnogo_Mickey_i6-6+.png",
					"small"=>"Mnogo_Mickey_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/ponchiki2_i6-6+.png",
					"small"=>"ponchiki2_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/ponchiki1_i6-6+.png",
					"small"=>"ponchiki1_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/paporotnik_white_i6-6+.png",
					"small"=>"paporotnik_white_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/paporotnik_black_i6-6+.png",
					"small"=>"paporotnik_black_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/nevesta_i6-6+.png",
					"small"=>"nevesta_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					
					//новые макеты 5.03.2016
					array("big"=>"6-6+/malvina_i6-6+.png",
					"small"=>"malvina_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/roza_orhidei_i6-6+.png",
					"small"=>"roza_orhidei_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/lilii_zerkalo_i6-6+.png",
					"small"=>"lilii_zerkalo_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/vishenki_i6-6+.png",
					"small"=>"vishenki_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/terier2_i6-6+.png",
					"small"=>"terier2_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/sobaka_goroh_i6-6+.png",
					"small"=>"sobaka_goroh_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/york_lezhit_i6-6+.png",
					"small"=>"york_lezhit_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/pantera_i6-6+.png",
					"small"=>"pantera_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/buldog_angl_i6-6+.png",
					"small"=>"buldog_angl_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/buldog_kolpak_i6-6+.png",
					"small"=>"buldog_kolpak_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/mops_i6-6+.png",
					"small"=>"mops_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/cara_i6-6+.png",
					"small"=>"cara_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/chihuahua_blue_i6-6+.png",
					"small"=>"chihuahua_blue_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/chihuahua_pink_i6-6+.png",
					"small"=>"chihuahua_pink_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/chihuahua_v_sumke_i6-6+.png",
					"small"=>"chihuahua_v_sumke_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/girldog_red_i6-6+.png",
					"small"=>"girldog_red_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					
					//принты 14.02.2016
					array("big"=>"6-6+/devushka_serdce_i6-6+.png",
					"small"=>"devushka_serdce_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/Jurnali_i6-6+.png",
					"small"=>"Jurnali_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/kotik_i6-6+.png",
					"small"=>"kotik_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/Love_i6-6+.png",
					"small"=>"Love_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/nogi_i6-6+.png",
					"small"=>"nogi_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/paris-ice-cream_i6-6+.png",
					"small"=>"paris-ice-cream_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/shturmovik_i6-6+.png",
					"small"=>"shturmovik_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/starbucks_pioni_i6-6+.png",
					"small"=>"starbucks_pioni_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
				
					
					//принты 1.02.2016
					array("big"=>"6-6+/Ulyana_koko_i6-6+.png",
					"small"=>"Ulyana_koko_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/Labuteni_TatShashkina_i6-6+.png",
					"small"=>"Labuteni_TatShashkina_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/krujevo_i6-6+.png",
					"small"=>"krujevo_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/krujevo_white_i6-6+.png",
					"small"=>"krujevo_white_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/york_i6-6+.png",
					"small"=>"york_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/shpiz_1_i6-6+.png",
					"small"=>"shpiz_1_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/shpiz_2_i6-6+.png",
					"small"=>"shpiz_2_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/buldog_i6-6+.png",
					"small"=>"buldog_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/sobaka-i6-6+.png",
					"small"=>"sobaka_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					
					
					
					// принты 24.01.2016
					
					array("big"=>"6-6+/tropiki-i6-6+.png",
					"small"=>"tropiki_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/rozovie-rozi-i6-6+.png",
					"small"=>"rozovie-rozi_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/puanti-i6-6+.png",
					"small"=>"puanti_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/paporotnik-i6-6+.png",
					"small"=>"paporotnik_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/kaktus-i6-6+.png",
					"small"=>"kaktus_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/flamingo2-i6-6+.png",
					"small"=>"flamingo2_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/flamingo-i6-6+.png",
					"small"=>"flamingo_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/cherep-s-zvetami-i6-6+.png",
					"small"=>"cherep-s-zvetami_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/bonjour-i6-6+.png",
					"small"=>"bonjour_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/mandala-i6-6+.png",
					"small"=>"mandala_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					
					// новый принты 15.01.2016
					array("big"=>"6-6+/origami-i6-6+.png",
					"small"=>"origami_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/kitty-pakety-i6-6+.png",
					"small"=>"kitty-pakety_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/kitty-i6-6+.png",
					"small"=>"kitty_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					
					// новые принты 20.11.2015
					array("big"=>"6-6+/orhidei_i6-6+.png",
					"small"=>"orhidei_preview.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/ded_pattern_i6-6+.png",
					"small"=>"ded_pattern_preview.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/ded_moroz_i6-6+.png",
					"small"=>"ded_moroz_preview.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/hello_winter_white_i6-6+.png",
					"small"=>"hello_winter_white_preview.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/cherep_i6-6+.png",
					"small"=>"cherep_preview.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					
					array("big"=>"6-6+/paket_i6-6+.png",
					"small"=>"paket_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/starbucks_i6-6+.png",
					"small"=>"starbucks_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/pryanik_i6-6+.png",
					"small"=>"pryanik_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/blonde_i6-6+.png",
					"small"=>"blonde_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/brunette_i6-6+.png",
					"small"=>"brunette_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					
					// новые принты 20.11.2015
					
					array(
						"big"=>"6-6+/s_elkoi_i6-6+.png",
						"small"=>"s_elkoi_r82.png",
						"chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)
						),
					array(
						"big"=>"6-6+/dart_i6-6+.png",
						"small"=>"dart_r82.png",
						"chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)
						),
					array(
						"big"=>"6-6+/chr-pat_i6-6+.png",
						"small"=>"chr-pat_r82.png",
						"chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)
						),
					array(
						"big"=>"6-6+/lollipops_i6-6+.png",
						"small"=>"lollipops_r82.png",
						"chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)
						),
					array(
						"big"=>"6-6+/rozochki_i6-6+.png",
						"small"=>"rozochki_r82.png",
						"chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)
						),
					array(
						"big"=>"6-6+/snegiri_i6-6+.png",
						"small"=>"snegiri_r82.png",
						"chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)
						),
					array(
						"big"=>"6-6+/zajka_i6-6+.png",
						"small"=>"zajka_r82.png",
						"chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)
						),
					

					//
					array("big"=>"6-6+/donuts_i6-6+.png",
					"small"=>"donuts_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/mickey_i6-6+.png",
					"small"=>"mickey_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/minnie_i6-6+.png",
					"small"=>"minnie_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),

					array("big"=>"6-6+/bembi_i6-6+.png",
					"small"=>"bembi_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/devochka_i6-6+.png",
					"small"=>"devochka_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/dior_kedy_i6-6+.png",
					"small"=>"dior_kedy_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/duhi_v_ruke_i6-6+.png",
					"small"=>"duhi_v_ruke_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/edinorog_i6-6+.png",					
					"small"=>"edinorog_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/edinorog2_i6-6+.png",
					"small"=>"edinorog2_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/fashion_i6-6+.png",
					"small"=>"fashion_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/fendi_i6-6+.png",
					"small"=>"fendi_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/karl_i6-6+.png",
					"small"=>"karl_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/katava_i6-6+.png",
					"small"=>"katava_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/koko_madm_i6-6+.png",
					"small"=>"koko_madm_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/Lubuteny_i6-6+.png",
					"small"=>"Lubuteny_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/makaruny_i6-6+.png",
					"small"=>"makaruny_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/manolo_i6-6+.png",
					"small"=>"manolo_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/miss_dior_i6-6+.png",
					"small"=>"miss_dior_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/nike_i6-6+.png",
					"small"=>"nike_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/palmy_i6-6+.png",
					"small"=>"palmy_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/paris_i6-6+.png",
					"small"=>"paris_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/pomada_mac_i6-6+.png",
					"small"=>"pomada_mac_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/pomada2_i6-6+.png",
					"small"=>"pomada2_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/rozy_i6-6+.png",
					"small"=>"rozy_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/ryukzak_i6-6+.png",
					"small"=>"ryukzak_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/sakura_i6-6+.png",
					"small"=>"sakura_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/tufli_valentino_i6-6+.png",
					"small"=>"tufli_valentino_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/tufli_valentino_i6-6+.png",
					"small"=>"tufli_valentino_r82.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/tufli-versache-iphonei6.png",
					"small"=>"tufli-versache-preview.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/unicorn-iphonei6.png",
					"small"=>"unicorn-prevew.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/uzor-iphonei6.png",
					"small"=>"uzor-prevew.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/serdca-iphonei6.png",
					"small"=>"serdca-preview.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					
					array("big"=>"6-6+/odri-iphonei6.png",
					"small"=>"odri-preview.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/odri-white-iphonei6.png",
					"small"=>"odri-white-preview.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					
					// паттерны - черное - белое - цветное
					array(
						"big"=>"6-6+/chr1_i6-6+.png",
						"small"=>"chr1_r82.png",
						"chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)
						),
					array(
						"big"=>"6-6+/chr2_i6-6+.png",
						"small"=>"chr2_r82.png",
						"chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)
						),
					array(
						"big"=>"6-6+/chr3_i6-6+.png",
						"small"=>"chr3_r82.png",
						"chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)
						),
					array(
						"big"=>"6-6+/confetti1_i6-6+.png",
						"small"=>"confetti1_r82.png",
						"chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)
						),
					array(
						"big"=>"6-6+/confetti2_i6-6+.png",
						"small"=>"confetti2_r82.png",
						"chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)
						),
					array(
						"big"=>"6-6+/confetti3_i6-6+.png",
						"small"=>"confetti3_r82.png",
						"chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)
						),
					array(
						"big"=>"6-6+/confetti4_i6-6+.png",
						"small"=>"confetti4_r82.png",
						"chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)
						),
					array(
						"big"=>"6-6+/confetti5_i6-6+.png",
						"small"=>"confetti5_r82.png",
						"chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)
						),
					array(
						"big"=>"6-6+/gor1_i6-6+.png",
						"small"=>"gor1_r82.png",
						"chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)
						),
					array(
						"big"=>"6-6+/gor2_i6-6+.png",
						"small"=>"gor2_r82.png",
						"chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)
						),
					array(
						"big"=>"6-6+/goroh2_.png",
						"small"=>"goroh2_r82.png",
						"chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)
						),
					array(
						"big"=>"6-6+/goroh3_i6-6+.png",
						"small"=>"goroh3_r82.png",
						"chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)
						),
					array(
						"big"=>"6-6+/goroshki_i6-6+.png",
						"small"=>"goroshki_r82.png",
						"chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)
						),
					array(
						"big"=>"6-6+/hearts_black_i6-6+.png",
						"small"=>"hearts_black_r82.png",
						"chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)
						),
					array(
						"big"=>"6-6+/hearts_white_i6-6+.png",
						"small"=>"hearts_white_r82.png",
						"chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)
						),
					array(
						"big"=>"6-6+/ny_pattern_black_i6-6+.png",
						"small"=>"ny_pattern_black_r82.png",
						"chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)
						),
					array(
						"big"=>"6-6+/ny_pattern_color_i6-6+.png",
						"small"=>"ny_pattern_color_r82.png",
						"chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)
						),
					array(
						"big"=>"6-6+/ny_pattern_white_i6-6+.png",
						"small"=>"ny_pattern_white_r82.png",
						"chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)
						),
					array(
						"big"=>"6-6+/snowflakes_red_i6-6+.png",
						"small"=>"snowflakes_red_r82.png",
						"chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)
						),
					array(
						"big"=>"6-6+/snowflakes_white_i6-6+.png",
						"small"=>"snowflakes_white_r82.png",
						"chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)
						),
					array("big"=>"6-6+/ogurci-black-iphonei6.png",
					"small"=>"ogurci-black-preview.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/ogurci-iphonei6.png",
					"small"=>"ogurci-preview.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					
					array("big"=>"6-6+/hamsa-black-iphonei6.png",
					"small"=>"hamsa-black-preview.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/hamsa-iphonei6.png",
					"small"=>"hamsa-preview.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/david-black-iphonei6.png",
					"small"=>"david-black-preview.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),
					array("big"=>"6-6+/david-iphonei6.png",
					"small"=>"david-preview.png","chechs"=>array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,60,61,62,63,64,65,66,67)),


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
*/			
			array(
                                "link"=>"3/",
                                "name"=>"Новинки",
                                "images"=>array(
                                
                                // смайлы 12.04
                                
                                		array(
                                                "big"=>"480/blue_flower_Smiles-480-big.png",
                                                "small"=>"124/blue_flower_Smiles-124-small.png"
                                        ),
                                		 array(
                                                "big"=>"480/pink_flower_Smiles-480-big.png",
                                                "small"=>"124/pink_flower_Smiles-124-small.png"
                                        ),
                                        array(
                                                "big"=>"480/palm_Smiles-480-big.png",
                                                "small"=>"124/palm_Smiles-124-small.png"
                                        ),
                                        array(
                                                "big"=>"480/ochki_Smiles-480-big.png",
                                                "small"=>"124/ochki_Smiles-124-small.png"
                                        ),
                                        array(
                                                "big"=>"480/bus_blue_Smiles-480-big.png",
                                                "small"=>"124/bus_blue_Smiles-124-small.png"
                                        ),
                                         array(
                                                "big"=>"480/red_bus_Smiles-480-big.png",
                                                "small"=>"124/red_bus_Smiles-124-small.png"
                                        ),
                                        array(
                                                "big"=>"480/board_Smiles-480-big.png",
                                                "small"=>"124/board_Smiles-124-small.png"
                                        ),
                                        array(
                                                "big"=>"480/rakushka2_Smiles-480-big.png",
                                                "small"=>"124/rakushka2_Smiles-124-small.png"
                                        ),
                                        array(
                                                "big"=>"480/rakushka_Smiles-480-big.png",
                                                "small"=>"124/rakushka_Smiles-124-small.png"
                                        ),
                                         array(
                                                "big"=>"480/broccoli_Smiles-480-big.png",
                                                "small"=>"124/broccoli_Smiles-124-small.png"
                                        ),
                                        array(
                                                "big"=>"480/red_heart_shar_Smiles-480-big.png",
                                                "small"=>"124/red_heart_shar_Smiles-124-small.png"
                                        ),
                                        array(
                                                "big"=>"480/pink_heart_shar_Smiles-480-big.png",
                                                "small"=>"124/pink_heart_shar_Smiles-124-small.png"
                                        ),
                                
                                
                                // новые смайлы 29.03
                                
                                 		array(
                                                "big"=>"480/fuckkim-480-big.png",
                                                "small"=>"124/fuckkim-124-small.png"
                                        ),
                                		 array(
                                                "big"=>"480/awesome_Smiles-480-big.png",
                                                "small"=>"124/awesome_Smiles-124-small.png"
                                        ),
                                        array(
                                                "big"=>"480/chihua_Smiles-480-big.png",
                                                "small"=>"124/chihua_Smiles-124-small.png"
                                        ),
                                        array(
                                                "big"=>"480/fotik_Smiles-480-big.png",
                                                "small"=>"124/fotik_Smiles-124-small.png"
                                        ),
                                        array(
                                                "big"=>"480/nichosi_Smiles-480-big.png",
                                                "small"=>"124/nichosi_Smiles-124-small.png"
                                        ),
                                        array(
                                                "big"=>"480/patrik_Smiles-480-big.png",
                                                "small"=>"124/patrik_Smiles-124-small.png"
                                        ),
                                        array(
                                                "big"=>"480/ponchik_green_Smiles-480-big.png",
                                                "small"=>"124/ponchik_green_Smiles-124-small.png"
                                        ),
                                        array(
                                                "big"=>"480/ponchik_pink_Smiles-480-big.png",
                                                "small"=>"124/ponchik_pink_Smiles-124-small.png"
                                        ),
                                        array(
                                                "big"=>"480/ponchik_white_Smiles-480-big.png",
                                                "small"=>"124/ponchik_white_Smiles-124-small.png"
                                        ),
                                
                             			array(
                                                "big"=>"480/poni_Smiles-480-big.png",
                                                "small"=>"124/poni_Smiles-124-small.png"
                                        ),
                                        array(
                                                "big"=>"480/popeye_Sailor_Smiles-480-big.png",
                                                "small"=>"124/popeye_Sailor_Smiles-124-small.png"
                                        ),
                                        array(
                                                "big"=>"480/utochka_Smiles-480-big.png",
                                                "small"=>"124/utochka_Smiles-124-small.png"
                                        ),
                                        array(
                                                "big"=>"480/spanchbob_Smiles-480-big.png",
                                                "small"=>"124/spanchbob_Smiles-124-small.png"
                                        ),
                                        array(
                                                "big"=>"480/Sailor_Moon_Smiles-480-big.png",
                                                "small"=>"124/Sailor_Moon_Smiles-124-small.png"
                                        ),
                                        array(
                                                "big"=>"480/sobaka_Smiles-480-big.png",
                                                "small"=>"124/sobaka_Smiles-124-small.png"
                                        ),
                                        array(
                                                "big"=>"480/sobaka2_Smiles-480-big.png",
                                                "small"=>"124/sobaka2_Smiles-124-small.png"
                                        ),
   
                                    array(
                                                "big"=>"480/batman_Smiles-480-big.png",
                                                "small"=>"124/batman_Smiles-124-small.png"
                                        ),
                                        array(
                                                "big"=>"480/bolshe_kofe_Smiles-480-big.png",
                                                "small"=>"124/bolshe_kofe_Smiles-124-small.png"
                                        ),
                                        array(
                                                "big"=>"480/enot_Smiles-480-big.png",
                                                "small"=>"124/enot_Smiles-124-small.png"
                                        ),
                                        array(
                                                "big"=>"480/gomer_Smiles-480-big.png",
                                                "small"=>"124/gomer_Smiles-124-small.png"
                                        ),
                                        array(
                                                "big"=>"480/GrumpyCat_Smiles-480-big.png",
                                                "small"=>"124/GrumpyCat_Smiles-124-small.png"
                                        ),
                                        array(
                                                "big"=>"480/kotik_mem_Smiles-480-big.png",
                                                "small"=>"124/kotik_mem_Smiles-124-small.png"
                                        ),
                                        array(
                                                "big"=>"480/minion_Smiles-480-big.png",
                                                "small"=>"124/minion_Smiles-124-small.png"
                                        ),
                                        array(
                                                "big"=>"480/superman_Smiles-480-big.png",
                                                "small"=>"124/superman_Smiles-124-small.png"
                                        ),
                                
                             			array(
                                                "big"=>"480/audi_Smiles-480-big.png",
                                                "small"=>"124/audi_Smiles-124-small.png"
                                        ),
                                        array(
                                                "big"=>"480/bentley_Smiles-480-big.png",
                                                "small"=>"124/bentley_Smiles-124-small.png"
                                        ),
                                        array(
                                                "big"=>"480/bmw_Smiles-480-big.png",
                                                "small"=>"124/bmw_Smiles-124-small.png"
                                        ),
                                        array(
                                                "big"=>"480/ferrari_Smiles-480-big.png",
                                                "small"=>"124/ferrari_Smiles-124-small.png"
                                        ),
                                        array(
                                                "big"=>"480/infiniti_Smiles-480-big.png",
                                                "small"=>"124/infiniti_Smiles-124-small.png"
                                        ),
                                        array(
                                                "big"=>"480/jaguar_Smiles-480-big.png",
                                                "small"=>"124/jaguar_Smiles-124-small.png"
                                        ),
                                        array(
                                                "big"=>"480/lamborghini_Smiles-480-big.png",
                                                "small"=>"124/lamborghini_Smiles-124-small.png"
                                        ),
                                        array(
                                                "big"=>"480/landrover_Smiles-480-big.png",
                                                "small"=>"124/landrover_Smiles-124-small.png"
                                        ),
                                        array(
                                                "big"=>"480/logo_mini_Smiles-480-big.png",
                                                "small"=>"124/logo_mini_Smiles-124-small.png"
                                        ),
                                        array(
                                                "big"=>"480/mercedes_benz_Smiles-480-big.png",
                                                "small"=>"124/mercedes_benz_Smiles-124-small.png"
                                        ),
                                        array(
                                                "big"=>"480/porche_Smiles-480-big.png",
                                                "small"=>"124/porche_Smiles-124-small.png"
                                        ),
                                        array(
                                                "big"=>"480/nissan_Smiles-480-big.png",
                                                "small"=>"124/nissan_Smiles-124-small.png"
                                        ),
                                      
                                
                                
                                
                                // новые смайлы нг
								 		array(
                                                "big"=>"480/superman-480-big.png",
                                                "small"=>"124/superman-124-small.png"
                                        ),
                                        array(
                                                "big"=>"480/keks-480-big.png",
                                                "small"=>"124/keks-124-small.png"
                                        ),
                                        array(
                                                "big"=>"480/ng-480-big.png",
                                                "small"=>"124/ng-124-small.png"
                                        ),
                                        array(
                                                "big"=>"480/ng2-480-big.png",
                                                "small"=>"124/ng2-124-small.png"
                                        ),
                
                                
                                    
                                        
                                        // добавлено 20.10                                
                                
                                        array(
                                                "big"=>"480/Unicorn-big.png",
                                                "small"=>"124/Unicorn-small.png"
                                        ),
                                        array(
                                                "big"=>"480/morojennoe-480-big.png",
                                                "small"=>"124/morojennoe-124-small.png"
                                        ),
                                        array(
                                                "big"=>"480/pinnaple-480-big.png",
                                                "small"=>"124/pinnaple-124-small.png"
                                        ),
                                        array(
                                                "big"=>"480/pero-480-big.png",
                                                "small"=>"124/pero-124-small.png"
                                        ),
                                        array(
                                                "big"=>"480/pero2-480-big.png",
                                                "small"=>"124/pero2-124-small.png"
                                        ),
                                        array(
                                                "big"=>"480/ochki-480-big.png",
                                                "small"=>"124/ochki-124-small.png"
                                        ),
                                        array(
                                                "big"=>"480/klatch-480-big.png",
                                                "small"=>"124/klatch-124-small.png"
                                        ),
                                        array(
                                                "big"=>"480/chasi-480-big.png",
                                                "small"=>"124/chasi-124-small.png"
                                        ),
                                        array(
                                                "big"=>"480/tufli-480-big.png",
                                                "small"=>"124/tufli-124-small.png"
                                        ),
                                        array(
                                                "big"=>"480/sergi-480-big.png",
                                                "small"=>"124/sergi-124-small.png"
                                        ),
                                        array(
                                                "big"=>"480/sumka-480-big.png",
                                                "small"=>"124/sumka-124-small.png"
                                        ),
                                        array(
                                                "big"=>"480/tshirt-480-big.png",
                                                "small"=>"124/tshirt-124-small.png"
                                        ),
                                        array(
                                                "big"=>"480/jinsy-480-big.png",
                                                "small"=>"124/jinsy-124-small.png"
                                        ),
                                        array(
                                                "big"=>"480/arbuz-480-big.png",
                                                "small"=>"124/arbuz-124-small.png"
                                        ),
                                        array(
                                                "big"=>"480/arbuz2-480-big.png",
                                                "small"=>"124/arbuz2-124-small.png"
                                        ),
                                        array(
                                                "big"=>"480/kruassan-480-big.png",
                                                "small"=>"124/kruassan-124-small.png"
                                        ),
                                        array(
                                                "big"=>"480/iagodi-480-big.png",
                                                "small"=>"124/iagodi-124-small.png"
                                        ),
                                        array(
                                                "big"=>"480/gubki-480-big.png",
                                                "small"=>"124/gubki-124-small.png"
                                        ),
                                        array(
                                                "big"=>"480/glaz-480-big.png",
                                                "small"=>"124/glaz-124-small.png"
                                        ),
                                        array(
                                                "big"=>"480/molniia-480-big.png",
                                                "small"=>"124/molniia-124-small.png"
                                        ),
                                        array(
                                                "big"=>"480/mikki-480-big.png",
                                                "small"=>"124/mikki-124-small.png"
                                        ),
                                        array(
                                                "big"=>"480/banan-480-big.png",
                                                "small"=>"124/banan-124-small.png"
                                        ),
                                        array(
                                                "big"=>"480/oops-480-big.png",
                                                "small"=>"124/oops-124-small.png"
                                        ),
                                        array(
                                                "big"=>"480/tufli2-480-big.png",
                                                "small"=>"124/tufli2-124-small.png"
                                        ),
                                        array(
                                                "big"=>"480/heart-480-big.png",
                                                "small"=>"124/heart-124-small.png"
                                        ),
                                        array(
                                                "big"=>"480/Gus-480-big.png",
                                                "small"=>"124/Gus-124-small.png"
                                        ),
                                        
                                        // смайлы 
                                        
                                         array(
                                                "big"=>"480/heart2black-480-big.png",
                                                "small"=>"124/heart2black-124-small.png"
                                        ),
                                        array(
                                                "big"=>"480/heart2pink-480-big.png",
                                                "small"=>"124/heart2pink-124-small.png"
                                        ),
                                        array(
                                                "big"=>"480/heart2red-480-big.png",
                                                "small"=>"124/heart2red-124-small.png"
                                        ),
                                        array(
                                                "big"=>"480/heart2white-480-big.png",
                                                "small"=>"124/heart2white-124-small.png"
                                        ),
                                        array(
                                                "big"=>"480/heartpink-480-big.png",
                                                "small"=>"124/heartpink-124-small.png"
                                        ),
                                        array(
                                                "big"=>"480/heartred-480-big.png",
                                                "small"=>"124/heartred-124-small.png"
                                        ),
                                        array(
                                                "big"=>"480/heartwhite-480-big.png",
                                                "small"=>"124/heartwhite-124-small.png"
                                        ),
                                )
                        ),
			array(
				"link"=>"people/",
				"name"=>"Люди",
				"images"=>array(
					

					array("big"=>"480/persons-0001_large.png",
					"small"=>"124/persons-0001_large.png",),
					array("big"=>"480/persons-0002_large.png",
					"small"=>"124/persons-0002_large.png",),
					array("big"=>"480/persons-0003_large.png",
					"small"=>"124/persons-0003_large.png",),
					array("big"=>"480/persons-0004_large.png",
					"small"=>"124/persons-0004_large.png",),
					array("big"=>"480/persons-0005_large.png",
					"small"=>"124/persons-0005_large.png",),
					array("big"=>"480/persons-0006_large.png",
					"small"=>"124/persons-0006_large.png",),
					array("big"=>"480/persons-0007_large.png",
					"small"=>"124/persons-0007_large.png",),
					array("big"=>"480/persons-0008_large.png",
					"small"=>"124/persons-0008_large.png",),
					array("big"=>"480/persons-0009_large.png",
					"small"=>"124/persons-0009_large.png",),
					array("big"=>"480/persons-0010_large.png",
					"small"=>"124/persons-0010_large.png",),
					array("big"=>"480/persons-0011_large.png",
					"small"=>"124/persons-0011_large.png",),
					array("big"=>"480/persons-0012_large.png",
					"small"=>"124/persons-0012_large.png",),
					array("big"=>"480/persons-0013_large.png",
					"small"=>"124/persons-0013_large.png",),
					array("big"=>"480/persons-0014_large.png",
					"small"=>"124/persons-0014_large.png",),
					array("big"=>"480/persons-0015_large.png",
					"small"=>"124/persons-0015_large.png",),
					array("big"=>"480/persons-0016_large.png",
					"small"=>"124/persons-0016_large.png",),
					array("big"=>"480/persons-0017_large.png",
					"small"=>"124/persons-0017_large.png",),
					array("big"=>"480/persons-0018_large.png",
					"small"=>"124/persons-0018_large.png",),
					array("big"=>"480/persons-0019_large.png",
					"small"=>"124/persons-0019_large.png",),
					array("big"=>"480/persons-0020_large.png",
					"small"=>"124/persons-0020_large.png",),
					array("big"=>"480/persons-0021_large.png",
					"small"=>"124/persons-0021_large.png",),
					array("big"=>"480/persons-0022_large.png",
					"small"=>"124/persons-0022_large.png",),
					array("big"=>"480/persons-0023_large.png",
					"small"=>"124/persons-0023_large.png",),
					array("big"=>"480/persons-0024_large.png",
					"small"=>"124/persons-0024_large.png",),
					array("big"=>"480/persons-0025_large.png",
					"small"=>"124/persons-0025_large.png",),
					array("big"=>"480/persons-0026_large.png",
					"small"=>"124/persons-0026_large.png",),
					array("big"=>"480/persons-0027_large.png",
					"small"=>"124/persons-0027_large.png",),
					array("big"=>"480/persons-0028_large.png",
					"small"=>"124/persons-0028_large.png",),
					array("big"=>"480/persons-0029_large.png",
					"small"=>"124/persons-0029_large.png",),
					array("big"=>"480/persons-0030_large.png",
					"small"=>"124/persons-0030_large.png",),
					array("big"=>"480/persons-0031_large.png",
					"small"=>"124/persons-0031_large.png",),
					array("big"=>"480/persons-0032_large.png",
					"small"=>"124/persons-0032_large.png",),
					array("big"=>"480/persons-0033_large.png",
					"small"=>"124/persons-0033_large.png",),
					array("big"=>"480/persons-0034_large.png",
					"small"=>"124/persons-0034_large.png",),
					array("big"=>"480/persons-0035_large.png",
					"small"=>"124/persons-0035_large.png",),
					array("big"=>"480/persons-0036_large.png",
					"small"=>"124/persons-0036_large.png",),
					array("big"=>"480/persons-0037_large.png",
					"small"=>"124/persons-0037_large.png",),
					array("big"=>"480/persons-0038_large.png",
					"small"=>"124/persons-0038_large.png",),
					array("big"=>"480/persons-0039_large.png",
					"small"=>"124/persons-0039_large.png",),
					array("big"=>"480/persons-0040_large.png",
					"small"=>"124/persons-0040_large.png",),
					array("big"=>"480/persons-0041_large.png",
					"small"=>"124/persons-0041_large.png",),
					array("big"=>"480/persons-0042_large.png",
					"small"=>"124/persons-0042_large.png",),
					array("big"=>"480/persons-0043_large.png",
					"small"=>"124/persons-0043_large.png",),
					array("big"=>"480/persons-0044_large.png",
					"small"=>"124/persons-0044_large.png",),
					array("big"=>"480/persons-0045_large.png",
					"small"=>"124/persons-0045_large.png",),
					array("big"=>"480/persons-0046_large.png",
					"small"=>"124/persons-0046_large.png",),
					array("big"=>"480/persons-0047_large.png",
					"small"=>"124/persons-0047_large.png",),
					array("big"=>"480/persons-0048_large.png",
					"small"=>"124/persons-0048_large.png",),
					array("big"=>"480/persons-0049_large.png",
					"small"=>"124/persons-0049_large.png",),
					array("big"=>"480/persons-0050_large.png",
					"small"=>"124/persons-0050_large.png",),
					array("big"=>"480/persons-0051_large.png",
					"small"=>"124/persons-0051_large.png",),
					array("big"=>"480/persons-0052_large.png",
					"small"=>"124/persons-0052_large.png",),
					array("big"=>"480/persons-0053_large.png",
					"small"=>"124/persons-0053_large.png",),
					array("big"=>"480/persons-0054_large.png",
					"small"=>"124/persons-0054_large.png",),
					array("big"=>"480/persons-0055_large.png",
					"small"=>"124/persons-0055_large.png",),
					array("big"=>"480/persons-0056_large.png",
					"small"=>"124/persons-0056_large.png",),
					array("big"=>"480/persons-0057_large.png",
					"small"=>"124/persons-0057_large.png",),
					array("big"=>"480/persons-0058_large.png",
					"small"=>"124/persons-0058_large.png",),
					array("big"=>"480/persons-0059_large.png",
					"small"=>"124/persons-0059_large.png",),
					array("big"=>"480/persons-0060_large.png",
					"small"=>"124/persons-0060_large.png",),
					array("big"=>"480/persons-0061_large.png",
					"small"=>"124/persons-0061_large.png",),
					array("big"=>"480/persons-0062_large.png",
					"small"=>"124/persons-0062_large.png",),
					array("big"=>"480/persons-0063_large.png",
					"small"=>"124/persons-0063_large.png",),
					array("big"=>"480/persons-0065_large.png",
					"small"=>"124/persons-0065_large.png",),
					array("big"=>"480/persons-0066_large.png",
					"small"=>"124/persons-0066_large.png",),
					array("big"=>"480/persons-0067_large.png",
					"small"=>"124/persons-0067_large.png",),
					array("big"=>"480/persons-0068_large.png",
					"small"=>"124/persons-0068_large.png",),
					array("big"=>"480/persons-0069_large.png",
					"small"=>"124/persons-0069_large.png",),
					array("big"=>"480/persons-0070_large.png",
					"small"=>"124/persons-0070_large.png",),
					array("big"=>"480/persons-0071_large.png",
					"small"=>"124/persons-0071_large.png",),
					array("big"=>"480/persons-0072_large.png",
					"small"=>"124/persons-0072_large.png",),
					array("big"=>"480/persons-0073_large.png",
					"small"=>"124/persons-0073_large.png",),
					array("big"=>"480/persons-0074_large.png",
					"small"=>"124/persons-0074_large.png",),
					array("big"=>"480/persons-0075_large.png",
					"small"=>"124/persons-0075_large.png",),
					array("big"=>"480/persons-0076_large.png",
					"small"=>"124/persons-0076_large.png",),
					array("big"=>"480/persons-0077_large.png",
					"small"=>"124/persons-0077_large.png",),
					array("big"=>"480/persons-0078_large.png",
					"small"=>"124/persons-0078_large.png",),
					array("big"=>"480/persons-0079_large.png",
					"small"=>"124/persons-0079_large.png",),
					array("big"=>"480/persons-0080_large.png",
					"small"=>"124/persons-0080_large.png",),
					array("big"=>"480/persons-0081_large.png",
					"small"=>"124/persons-0081_large.png",),
					array("big"=>"480/persons-0082_large.png",
					"small"=>"124/persons-0082_large.png",),
					array("big"=>"480/persons-0083_large.png",
					"small"=>"124/persons-0083_large.png",),
					array("big"=>"480/persons-0084_large.png",
					"small"=>"124/persons-0084_large.png",),
					array("big"=>"480/persons-0085_large.png",
					"small"=>"124/persons-0085_large.png",),
					array("big"=>"480/persons-0086_large.png",
					"small"=>"124/persons-0086_large.png",),
					array("big"=>"480/persons-0087_large.png",
					"small"=>"124/persons-0087_large.png",),
					array("big"=>"480/persons-0088_large.png",
					"small"=>"124/persons-0088_large.png",),
					array("big"=>"480/persons-0089_large.png",
					"small"=>"124/persons-0089_large.png",),
					array("big"=>"480/persons-0090_large.png",
					"small"=>"124/persons-0090_large.png",),
					array("big"=>"480/persons-0091_large.png",
					"small"=>"124/persons-0091_large.png",),
					array("big"=>"480/persons-0092_large.png",
					"small"=>"124/persons-0092_large.png",),
					array("big"=>"480/persons-0093_large.png",
					"small"=>"124/persons-0093_large.png",),
					array("big"=>"480/persons-0094_large.png",
					"small"=>"124/persons-0094_large.png",),
					array("big"=>"480/persons-0095_large.png",
					"small"=>"124/persons-0095_large.png",),
					array("big"=>"480/persons-0096_large.png",
					"small"=>"124/persons-0096_large.png",),
					array("big"=>"480/persons-0097_large.png",
					"small"=>"124/persons-0097_large.png",),
					array("big"=>"480/persons-0098_large.png",
					"small"=>"124/persons-0098_large.png",),
					array("big"=>"480/persons-0099_large.png",
					"small"=>"124/persons-0099_large.png",),
					array("big"=>"480/persons-0100_large.png",
					"small"=>"124/persons-0100_large.png",),
					array("big"=>"480/persons-0101_large.png",
					"small"=>"124/persons-0101_large.png",),
					array("big"=>"480/persons-0102_large.png",
					"small"=>"124/persons-0102_large.png",),
					array("big"=>"480/persons-0103_large.png",
					"small"=>"124/persons-0103_large.png",),
					array("big"=>"480/persons-0104_large.png",
					"small"=>"124/persons-0104_large.png",),
					array("big"=>"480/persons-0105_large.png",
					"small"=>"124/persons-0105_large.png",),
					array("big"=>"480/persons-0106_large.png",
					"small"=>"124/persons-0106_large.png",),
					array("big"=>"480/persons-0107_large.png",
					"small"=>"124/persons-0107_large.png",),
					array("big"=>"480/persons-0108_large.png",
					"small"=>"124/persons-0108_large.png",),
					array("big"=>"480/persons-0109_large.png",
					"small"=>"124/persons-0109_large.png",),
					array("big"=>"480/persons-0110_large.png",
					"small"=>"124/persons-0110_large.png",),
					array("big"=>"480/persons-0111_large.png",
					"small"=>"124/persons-0111_large.png",),
					array("big"=>"480/persons-0112_large.png",
					"small"=>"124/persons-0112_large.png",),
					array("big"=>"480/persons-0113_large.png",
					"small"=>"124/persons-0113_large.png",),
					array("big"=>"480/persons-0114_large.png",
					"small"=>"124/persons-0114_large.png",),
					array("big"=>"480/persons-0115_large.png",
					"small"=>"124/persons-0115_large.png",),
					array("big"=>"480/persons-0116_large.png",
					"small"=>"124/persons-0116_large.png",),
					array("big"=>"480/persons-0117_large.png",
					"small"=>"124/persons-0117_large.png",),
					array("big"=>"480/persons-0118_large.png",
					"small"=>"124/persons-0118_large.png",),
					array("big"=>"480/persons-0119_large.png",
					"small"=>"124/persons-0119_large.png",),
					array("big"=>"480/persons-0120_large.png",
					"small"=>"124/persons-0120_large.png",),
					array("big"=>"480/persons-0121_large.png",
					"small"=>"124/persons-0121_large.png",),
					array("big"=>"480/persons-0122_large.png",
					"small"=>"124/persons-0122_large.png",),
					array("big"=>"480/persons-0123_large.png",
					"small"=>"124/persons-0123_large.png",),
					array("big"=>"480/persons-0124_large.png",
					"small"=>"124/persons-0124_large.png",),
					array("big"=>"480/persons-0125_large.png",
					"small"=>"124/persons-0125_large.png",),
					array("big"=>"480/persons-0126_large.png",
					"small"=>"124/persons-0126_large.png",),
					array("big"=>"480/persons-0127_large.png",
					"small"=>"124/persons-0127_large.png",),
					array("big"=>"480/persons-0128_large.png",
					"small"=>"124/persons-0128_large.png",),
					array("big"=>"480/persons-0129_large.png",
					"small"=>"124/persons-0129_large.png",),
					array("big"=>"480/persons-0130_large.png",
					"small"=>"124/persons-0130_large.png",),
					array("big"=>"480/persons-0131_large.png",
					"small"=>"124/persons-0131_large.png",),
					array("big"=>"480/persons-0132_large.png",
					"small"=>"124/persons-0132_large.png",),
					array("big"=>"480/persons-0133_large.png",
					"small"=>"124/persons-0133_large.png",),
					array("big"=>"480/persons-0134_large.png",
					"small"=>"124/persons-0134_large.png",),
					array("big"=>"480/persons-0135_large.png",
					"small"=>"124/persons-0135_large.png",),
					array("big"=>"480/persons-0136_large.png",
					"small"=>"124/persons-0136_large.png",),
					array("big"=>"480/persons-0137_large.png",
					"small"=>"124/persons-0137_large.png",),
					array("big"=>"480/persons-0138_large.png",
					"small"=>"124/persons-0138_large.png",),
					array("big"=>"480/persons-0139_large.png",
					"small"=>"124/persons-0139_large.png",),
					array("big"=>"480/persons-0140_large.png",
					"small"=>"124/persons-0140_large.png",),
					array("big"=>"480/persons-0144_large.png",
					"small"=>"124/persons-0144_large.png",),
					array("big"=>"480/persons-0145_large.png",
					"small"=>"124/persons-0145_large.png",),
					array("big"=>"480/persons-0146_large.png",
					"small"=>"124/persons-0146_large.png",),
					array("big"=>"480/persons-0147_large.png",
					"small"=>"124/persons-0147_large.png",),
					array("big"=>"480/persons-0148_large.png",
					"small"=>"124/persons-0148_large.png",),
					array("big"=>"480/persons-0149_large.png",
					"small"=>"124/persons-0149_large.png",),
					array("big"=>"480/persons-0150_large.png",
					"small"=>"124/persons-0150_large.png",),
					array("big"=>"480/persons-0151_large.png",
					"small"=>"124/persons-0151_large.png",),
					array("big"=>"480/persons-0152_large.png",
					"small"=>"124/persons-0152_large.png",),

					array("big"=>"480/persons-0153_large.png",
					"small"=>"124/persons-0153_large.png",),
					array("big"=>"480/persons-0154_large.png",
					"small"=>"124/persons-0154_large.png",),
					array("big"=>"480/persons-0155_large.png",
					"small"=>"124/persons-0155_large.png",),
					array("big"=>"480/persons-0156_large.png",
					"small"=>"124/persons-0156_large.png",),
					array("big"=>"480/persons-0157_large.png",
					"small"=>"124/persons-0157_large.png",),
					array("big"=>"480/persons-0158_large.png",
					"small"=>"124/persons-0158_large.png",),
					array("big"=>"480/persons-0159_large.png",
					"small"=>"124/persons-0159_large.png",),
					array("big"=>"480/persons-0160_large.png",
					"small"=>"124/persons-0160_large.png",),

					array("big"=>"480/persons-0162_large.png",
					"small"=>"124/persons-0162_large.png",),
					array("big"=>"480/persons-0163_large.png",
					"small"=>"124/persons-0163_large.png",),
					array("big"=>"480/persons-0164_large.png",
					"small"=>"124/persons-0164_large.png",),
					array("big"=>"480/persons-0165_large.png",
					"small"=>"124/persons-0165_large.png",),
					array("big"=>"480/persons-0166_large.png",
					"small"=>"124/persons-0166_large.png",),
					array("big"=>"480/persons-0167_large.png",
					"small"=>"124/persons-0167_large.png",),
					array("big"=>"480/persons-0168_large.png",
					"small"=>"124/persons-0168_large.png",),
					array("big"=>"480/persons-0169_large.png",
					"small"=>"124/persons-0169_large.png",),
					array("big"=>"480/persons-0170_large.png",
					"small"=>"124/persons-0170_large.png",),
					array("big"=>"480/persons-0171_large.png",
					"small"=>"124/persons-0171_large.png",),
					array("big"=>"480/persons-0172_large.png",
					"small"=>"124/persons-0172_large.png",),
					array("big"=>"480/persons-0173_large.png",
					"small"=>"124/persons-0173_large.png",),
					array("big"=>"480/persons-0174_large.png",
					"small"=>"124/persons-0174_large.png",),
					array("big"=>"480/persons-0175_large.png",
					"small"=>"124/persons-0175_large.png",),
					array("big"=>"480/persons-0176_large.png",
					"small"=>"124/persons-0176_large.png",),
					array("big"=>"480/persons-0177_large.png",
					"small"=>"124/persons-0177_large.png",),
					array("big"=>"480/persons-0178_large.png",
					"small"=>"124/persons-0178_large.png",),
					array("big"=>"480/persons-0179_large.png",
					"small"=>"124/persons-0179_large.png",),
					array("big"=>"480/persons-0180_large.png",
					"small"=>"124/persons-0180_large.png",),
					array("big"=>"480/persons-0181_large.png",
					"small"=>"124/persons-0181_large.png",),
					array("big"=>"480/persons-0182_large.png",
					"small"=>"124/persons-0182_large.png",),
					array("big"=>"480/persons-0183_large.png",
					"small"=>"124/persons-0183_large.png",),
					array("big"=>"480/persons-0184_large.png",
					"small"=>"124/persons-0184_large.png",),
					array("big"=>"480/persons-0185_large.png",
					"small"=>"124/persons-0185_large.png",),
					array("big"=>"480/persons-0186_large.png",
					"small"=>"124/persons-0186_large.png",),
					array("big"=>"480/persons-0187_large.png",
					"small"=>"124/persons-0187_large.png",),
					array("big"=>"480/persons-0188_large.png",
					"small"=>"124/persons-0188_large.png",),
					array("big"=>"480/persons-0189_large.png",
					"small"=>"124/persons-0189_large.png",),
					array("big"=>"480/persons-65_large.png",
					"small"=>"124/persons-65_large.png",),


				)
			),
			array(
				"link"=>"nature/",
				"name"=>"Природа",
				"images"=>array(

						array(
							"big"=>"480/nature-0002_large.png",
							"small"=>"124/nature-0002_large.png",
							),
						array(
							"big"=>"480/nature-0003_large.png",
							"small"=>"124/nature-0003_large.png",
							),
						array(
							"big"=>"480/nature-large_0004.png",
							"small"=>"124/nature-0004_large.png",
							),
						array(
							"big"=>"480/nature-0005_large.png",
							"small"=>"124/nature-0005_large.png",
							),
						array(
							"big"=>"480/nature-0006_large.png",
							"small"=>"124/nature-0006_large.png",
							),
						array(
							"big"=>"480/nature-0007_large.png",
							"small"=>"124/nature-0007_large.png",
							),
						array(
							"big"=>"480/nature-9_large.png",
							"small"=>"124/nature-9_large.png",
							),
						array(
							"big"=>"480/nature-0009_large.png",
							"small"=>"124/nature-0009_large.png",
							),
						array(
							"big"=>"480/nature-0010_large.png",
							"small"=>"124/nature-0010_large.png",
							),
						array(
							"big"=>"480/nature-0011_large.png",
							"small"=>"124/nature-0011_large.png",
							),
						array(
							"big"=>"480/nature-0012_large.png",
							"small"=>"124/nature-0012_large.png",
							),
						array(
							"big"=>"480/nature-0013_large.png",
							"small"=>"124/nature-0013_large.png",
							),
						array(
							"big"=>"480/nature-0014_large.png",
							"small"=>"124/nature-0014_large.png",
							),
						array(
							"big"=>"480/nature-0015_large.png",
							"small"=>"124/nature-0015_large.png",
							),
						array(
							"big"=>"480/nature-0016_large.png",
							"small"=>"124/nature-0016_large.png",
							),
						array(
							"big"=>"480/nature-0017_large.png",
							"small"=>"124/nature-0017_large.png",
							),
						array(
							"big"=>"480/nature-0018_large.png",
							"small"=>"124/nature-0018_large.png",
							),
						array(
							"big"=>"480/nature-0019_large.png",
							"small"=>"124/nature-0019_large.png",
							),
						array(
							"big"=>"480/nature-0020_large.png",
							"small"=>"124/nature-0020_large.png",
							),
						array(
							"big"=>"480/nature-0021_large.png",
							"small"=>"124/nature-0021_large.png",
							),
						array(
							"big"=>"480/nature-0022_large.png",
							"small"=>"124/nature-0022_large.png",
							),
						array(
							"big"=>"480/nature-0023_large.png",
							"small"=>"124/nature-0023_large.png",
							),
						array(
							"big"=>"480/nature-0024_large.png",
							"small"=>"124/nature-0024_large.png",
							),
						array(
							"big"=>"480/nature-0025_large.png",
							"small"=>"124/nature-0025_large.png",
							),
						array(
							"big"=>"480/nature-0026_large.png",
							"small"=>"124/nature-0026_large.png",
							),
						array(
							"big"=>"480/nature-0027_large.png",
							"small"=>"124/nature-0027_large.png",
							),
						array(
							"big"=>"480/nature-0028_large.png",
							"small"=>"124/nature-0028_large.png",
							),
						array(
							"big"=>"480/nature-0029_large.png",
							"small"=>"124/nature-0029_large.png",
							),
						array(
							"big"=>"480/nature-0030_large.png",
							"small"=>"124/nature-0030_large.png",
							),
						array(
							"big"=>"480/nature-0031_large.png",
							"small"=>"124/nature-0031_large.png",
							),
						array(
							"big"=>"480/nature-0032_large.png",
							"small"=>"124/nature-0032_large.png",
							),
						array(
							"big"=>"480/nature-0033_large.png",
							"small"=>"124/nature-0033_large.png",
							),
						array(
							"big"=>"480/nature-0034_large.png",
							"small"=>"124/nature-0034_large.png",
							),
						array(
							"big"=>"480/nature-0035_large.png",
							"small"=>"124/nature-0035_large.png",
							),
						array(
							"big"=>"480/nature-0036_large.png",
							"small"=>"124/nature-0036_large.png",
							),
						array(
							"big"=>"480/nature-0037_large.png",
							"small"=>"124/nature-0037_large.png",
							),
						array(
							"big"=>"480/nature-0038_large.png",
							"small"=>"124/nature-0038_large.png",
							),
						array(
							"big"=>"480/nature-0039_large.png",
							"small"=>"124/nature-0039_large.png",
							),
						array(
							"big"=>"480/nature-0040_large.png",
							"small"=>"124/nature-0040_large.png",
							),
						array(
							"big"=>"480/nature-0041_large.png",
							"small"=>"124/nature-0041_large.png",
							),
						array(
							"big"=>"480/nature-0042_large.png",
							"small"=>"124/nature-0042_large.png",
							),
						array(
							"big"=>"480/nature-0043_large.png",
							"small"=>"124/nature-0043_large.png",
							),
						array(
							"big"=>"480/nature-0044_large.png",
							"small"=>"124/nature-0044_large.png",
							),
						array(
							"big"=>"480/nature-0045_large.png",
							"small"=>"124/nature-0045_large.png",
							),
						array(
							"big"=>"480/nature-0046_large.png",
							"small"=>"124/nature-0046_large.png",
							),
						array(
							"big"=>"480/nature-0047_large.png",
							"small"=>"124/nature-0047_large.png",
							),
						array(
							"big"=>"480/nature-0049_large.png",
							"small"=>"124/nature-0049_large.png",
							),
						array(
							"big"=>"480/nature-0050_large.png",
							"small"=>"124/nature-0050_large.png",
							),
						array(
							"big"=>"480/nature-0052_large.png",
							"small"=>"124/nature-0052_large.png",
							),
						array(
							"big"=>"480/nature-0053_large.png",
							"small"=>"124/nature-0053_large.png",
							),
						array(
							"big"=>"480/nature-0054_large.png",
							"small"=>"124/nature-0054_large.png",
							),
						array(
							"big"=>"480/nature-0055_large.png",
							"small"=>"124/nature-0055_large.png",
							),
						array(
							"big"=>"480/nature-0056_large.png",
							"small"=>"124/nature-0056_large.png",
							),
						array(
							"big"=>"480/nature-0057_large.png",
							"small"=>"124/nature-0057_large.png",
							),
						array(
							"big"=>"480/nature-0058_large.png",
							"small"=>"124/nature-0058_large.png",
							),
						array(
							"big"=>"480/nature-0059_large.png",
							"small"=>"124/nature-0059_large.png",
							),
						array(
							"big"=>"480/nature-0060_large.png",
							"small"=>"124/nature-0060_large.png",
							),
						array(
							"big"=>"480/nature-0061_large.png",
							"small"=>"124/nature-0061_large.png",
							),
						array(
							"big"=>"480/nature-0062_large.png",
							"small"=>"124/nature-0062_large.png",
							),
						array(
							"big"=>"480/nature-0063_large.png",
							"small"=>"124/nature-0063_large.png",
							),
						array(
							"big"=>"480/nature-0064_large.png",
							"small"=>"124/nature-0064_large.png",
							),
						array(
							"big"=>"480/nature-0065_large.png",
							"small"=>"124/nature-0065_large.png",
							),
						array(
							"big"=>"480/nature-0066_large.png",
							"small"=>"124/nature-0066_large.png",
							),
						array(
							"big"=>"480/nature-0067_large.png",
							"small"=>"124/nature-0067_large.png",
							),
						array(
							"big"=>"480/nature-0068_large.png",
							"small"=>"124/nature-0068_large.png",
							),
						array(
							"big"=>"480/nature-0069_large.png",
							"small"=>"124/nature-0069_large.png",
							),
						array(
							"big"=>"480/nature-0070_large.png",
							"small"=>"124/nature-0070_large.png",
							),
						array(
							"big"=>"480/nature-0071_large.png",
							"small"=>"124/nature-0071_large.png",
							),
						array(
							"big"=>"480/nature-0072_large.png",
							"small"=>"124/nature-0072_large.png",
							),
						array(
							"big"=>"480/nature-0073_large.png",
							"small"=>"124/nature-0073_large.png",
							),
						array(
							"big"=>"480/nature-0074_large.png",
							"small"=>"124/nature-0074_large.png",
							),
						array(
							"big"=>"480/nature-0075_large.png",
							"small"=>"124/nature-0075_large.png",
							),
						array(
							"big"=>"480/nature-0076_large.png",
							"small"=>"124/nature-0076_large.png",
							),
						array(
							"big"=>"480/nature-0077_large.png",
							"small"=>"124/nature-0077_large.png",
							),
						array(
							"big"=>"480/nature-0078_large.png",
							"small"=>"124/nature-0078_large.png",
							),
						array(
							"big"=>"480/nature-0079_large.png",
							"small"=>"124/nature-0079_large.png",
							),
						array(
							"big"=>"480/nature-0080_large.png",
							"small"=>"124/nature-0080_large.png",
							),
						array(
							"big"=>"480/nature-0081_large.png",
							"small"=>"124/nature-0081_large.png",
							),
						array(
							"big"=>"480/nature-0082_large.png",
							"small"=>"124/nature-0082_large.png",
							),
						array(
							"big"=>"480/nature-0083_large.png",
							"small"=>"124/nature-0083_large.png",
							),
						array(
							"big"=>"480/nature-0084_large.png",
							"small"=>"124/nature-0084_large.png",
							),
						array(
							"big"=>"480/nature-0085_large.png",
							"small"=>"124/nature-0085_large.png",
							),
						array(
							"big"=>"480/nature-0086_large.png",
							"small"=>"124/nature-0086_large.png",
							),
						array(
							"big"=>"480/nature-0087_large.png",
							"small"=>"124/nature-0087_large.png",
							),
						array(
							"big"=>"480/nature-0088_large.png",
							"small"=>"124/nature-0088_large.png",
							),
						array(
							"big"=>"480/nature-0089_large.png",
							"small"=>"124/nature-0089_large.png",
							),
						array(
							"big"=>"480/nature-0090_large.png",
							"small"=>"124/nature-0090_large.png",
							),
						array(
							"big"=>"480/nature-0091_large.png",
							"small"=>"124/nature-0091_large.png",
							),
						array(
							"big"=>"480/nature-0092_large.png",
							"small"=>"124/nature-0092_large.png",
							),
						array(
							"big"=>"480/nature-0093_large.png",
							"small"=>"124/nature-0093_large.png",
							),
						array(
							"big"=>"480/nature-0094_large.png",
							"small"=>"124/nature-0094_large.png",
							),
						array(
							"big"=>"480/nature-0095_large.png",
							"small"=>"124/nature-0095_large.png",
							),
						array(
							"big"=>"480/nature-0096_large.png",
							"small"=>"124/nature-0096_large.png",
							),
						array(
							"big"=>"480/nature-0097_large.png",
							"small"=>"124/nature-0097_large.png",
							),
						array(
							"big"=>"480/nature-0098_large.png",
							"small"=>"124/nature-0098_large.png",
							),
						array(
							"big"=>"480/nature-0099_large.png",
							"small"=>"124/nature-0099_large.png",
							),
						array(
							"big"=>"480/nature-0100_large.png",
							"small"=>"124/nature-0100_large.png",
							),
						array(
							"big"=>"480/nature-0101_large.png",
							"small"=>"124/nature-0101_large.png",
							),
						array(
							"big"=>"480/nature-0102_large.png",
							"small"=>"124/nature-0102_large.png",
							),
						array(
							"big"=>"480/nature-0103_large.png",
							"small"=>"124/nature-0103_large.png",
							),
						array(
							"big"=>"480/nature-0104_large.png",
							"small"=>"124/nature-0104_large.png",
							),
						array(
							"big"=>"480/nature-0105_large.png",
							"small"=>"124/nature-0105_large.png",
							),
						array(
							"big"=>"480/nature-0106_large.png",
							"small"=>"124/nature-0106_large.png",
							),
						array(
							"big"=>"480/nature-0107_large.png",
							"small"=>"124/nature-0107_large.png",
							),
						array(
							"big"=>"480/nature-0108_large.png",
							"small"=>"124/nature-0108_large.png",
							),
						array(
							"big"=>"480/nature-0109_large.png",
							"small"=>"124/nature-0109_large.png",
							),
						array(
							"big"=>"480/nature-0110_large.png",
							"small"=>"124/nature-0110_large.png",
							),
						array(
							"big"=>"480/nature-0111_large.png",
							"small"=>"124/nature-0111_large.png",
							),
						array(
							"big"=>"480/nature-0112_large.png",
							"small"=>"124/nature-0112_large.png",
							),
						array(
							"big"=>"480/nature-0113_large.png",
							"small"=>"124/nature-0113_large.png",
							),
						array(
							"big"=>"480/nature-0114_large.png",
							"small"=>"124/nature-0114_large.png",
							),
						array(
							"big"=>"480/nature-0115_large.png",
							"small"=>"124/nature-0115_large.png",
							),
						array(
							"big"=>"480/nature-0116_large.png",
							"small"=>"124/nature-0116_large.png",
							),
					)
			),
			array(
				"link"=>"objects/",
				"name"=>"Объекты",
				"images"=>array(
					
					
					array("big"=>"480/objects-0001_large.png",
					"small"=>"124/objects-0001_large.png",),
					array("big"=>"480/objects-0002_large.png",
					"small"=>"124/objects-0002_large.png",),
					array("big"=>"480/objects-0003_large.png",
					"small"=>"124/objects-0003_large.png",),
					array("big"=>"480/objects-0004_large.png",
					"small"=>"124/objects-0004_large.png",),
					array("big"=>"480/objects-0005_large.png",
					"small"=>"124/objects-0005_large.png",),
					array("big"=>"480/objects-0006_large.png",
					"small"=>"124/objects-0006_large.png",),
					array("big"=>"480/objects-0007_large.png",
					"small"=>"124/objects-0007_large.png",),
					array("big"=>"480/objects-0008_large.png",
					"small"=>"124/objects-0008_large.png",),
					array("big"=>"480/objects-0009_large.png",
					"small"=>"124/objects-0009_large.png",),
					array("big"=>"480/objects-0010_large_1.png",
					"small"=>"124/objects-0010_large_1.png",),
					array("big"=>"480/objects-0011_large_1.png",
					"small"=>"124/objects-0011_large_1.png",),
					array("big"=>"480/objects-0012_large.png",
					"small"=>"124/objects-0012_large.png",),
					array("big"=>"480/objects-0013_large.png",
					"small"=>"124/objects-0013_large.png",),
					array("big"=>"480/objects-0014_large.png",
					"small"=>"124/objects-0014_large.png",),
					array("big"=>"480/objects-0015_large.png",
					"small"=>"124/objects-0015_large.png",),
					array("big"=>"480/objects-0016_large.png",
					"small"=>"124/objects-0016_large.png",),
					array("big"=>"480/objects-0017_large.png",
					"small"=>"124/objects-0017_large.png",),
					array("big"=>"480/objects-0018_large.png",
					"small"=>"124/objects-0018_large.png",),
					array("big"=>"480/objects-0019_large.png",
					"small"=>"124/objects-0019_large.png",),
					array("big"=>"480/objects-0020_large.png",
					"small"=>"124/objects-0020_large.png",),
					array("big"=>"480/objects-0021_large.png",
					"small"=>"124/objects-0021_large.png",),
					array("big"=>"480/objects-0022_large.png",
					"small"=>"124/objects-0022_large.png",),
					array("big"=>"480/objects-0023_large.png",
					"small"=>"124/objects-0023_large.png",),
					array("big"=>"480/objects-0024_large.png",
					"small"=>"124/objects-0024_large.png",),
					array("big"=>"480/objects-0025_large.png",
					"small"=>"124/objects-0025_large.png",),
					array("big"=>"480/objects-0026_large.png",
					"small"=>"124/objects-0026_large.png",),
					array("big"=>"480/objects-0027_large.png",
					"small"=>"124/objects-0027_large.png",),
					array("big"=>"480/objects-0028_large.png",
					"small"=>"124/objects-0028_large.png",),
					array("big"=>"480/objects-0029_large.png",
					"small"=>"124/objects-0029_large.png",),
					array("big"=>"480/objects-0030_large.png",
					"small"=>"124/objects-0030_large.png",),
					array("big"=>"480/objects-0031_large.png",
					"small"=>"124/objects-0031_large.png",),
					array("big"=>"480/objects-0032_large.png",
					"small"=>"124/objects-0032_large.png",),
					array("big"=>"480/objects-0033_large.png",
					"small"=>"124/objects-0033_large.png",),
					array("big"=>"480/objects-0034_large.png",
					"small"=>"124/objects-0034_large.png",),
					array("big"=>"480/objects-0035_large.png",
					"small"=>"124/objects-0035_large.png",),
					array("big"=>"480/objects-0036_large.png",
					"small"=>"124/objects-0036_large.png",),
					array("big"=>"480/objects-0037_large.png",
					"small"=>"124/objects-0037_large.png",),
					array("big"=>"480/objects-0038_large.png",
					"small"=>"124/objects-0038_large.png",),
					array("big"=>"480/objects-0039_large.png",
					"small"=>"124/objects-0039_large.png",),
					array("big"=>"480/objects-0040_large.png",
					"small"=>"124/objects-0040_large.png",),
					array("big"=>"480/objects-0042_large.png",
					"small"=>"124/objects-0042_large.png",),
					array("big"=>"480/objects-0043_large.png",
					"small"=>"124/objects-0043_large.png",),
					array("big"=>"480/objects-0044_large.png",
					"small"=>"124/objects-0044_large.png",),
					array("big"=>"480/objects-0045_large.png",
					"small"=>"124/objects-0045_large.png",),
					array("big"=>"480/objects-0046_large.png",
					"small"=>"124/objects-0046_large.png",),
					array("big"=>"480/objects-0047_large.png",
					"small"=>"124/objects-0047_large.png",),
					array("big"=>"480/objects-0048_large.png",
					"small"=>"124/objects-0048_large.png",),
					array("big"=>"480/objects-0049_large.png",
					"small"=>"124/objects-0049_large.png",),
					array("big"=>"480/objects-0050_large.png",
					"small"=>"124/objects-0050_large.png",),
					array("big"=>"480/objects-0051_large.png",
					"small"=>"124/objects-0051_large.png",),
					array("big"=>"480/objects-0052_large.png",
					"small"=>"124/objects-0052_large.png",),
					array("big"=>"480/objects-0053_large.png",
					"small"=>"124/objects-0053_large.png",),
					array("big"=>"480/objects-0054_large.png",
					"small"=>"124/objects-0054_large.png",),
					array("big"=>"480/objects-0055_large.png",
					"small"=>"124/objects-0055_large.png",),
					array("big"=>"480/objects-0056_large.png",
					"small"=>"124/objects-0056_large.png",),
					array("big"=>"480/objects-0057_large.png",
					"small"=>"124/objects-0057_large.png",),
					array("big"=>"480/objects-0058_large.png",
					"small"=>"124/objects-0058_large.png",),
					array("big"=>"480/objects-0059_large.png",
					"small"=>"124/objects-0059_large.png",),
					array("big"=>"480/objects-0060_large.png",
					"small"=>"124/objects-0060_large.png",),
					array("big"=>"480/objects-0061_large.png",
					"small"=>"124/objects-0061_large.png",),
					array("big"=>"480/objects-0062_large.png",
					"small"=>"124/objects-0062_large.png",),
					array("big"=>"480/objects-0063_large.png",
					"small"=>"124/objects-0063_large.png",),
					array("big"=>"480/objects-0064_large.png",
					"small"=>"124/objects-0064_large.png",),
					array("big"=>"480/objects-0065_large.png",
					"small"=>"124/objects-0065_large.png",),
					array("big"=>"480/objects-0066_large.png",
					"small"=>"124/objects-0066_large.png",),
					array("big"=>"480/objects-0067_large.png",
					"small"=>"124/objects-0067_large.png",),
					array("big"=>"480/objects-0068_large.png",
					"small"=>"124/objects-0068_large.png",),
					array("big"=>"480/objects-0069_large.png",
					"small"=>"124/objects-0069_large.png",),
					array("big"=>"480/objects-0070_large.png",
					"small"=>"124/objects-0070_large.png",),
					array("big"=>"480/objects-0071_large.png",
					"small"=>"124/objects-0071_large.png",),
					array("big"=>"480/objects-0072_large.png",
					"small"=>"124/objects-0072_large.png",),
					array("big"=>"480/objects-0073_large.png",
					"small"=>"124/objects-0073_large.png",),
					array("big"=>"480/objects-0074_large.png",
					"small"=>"124/objects-0074_large.png",),
					array("big"=>"480/objects-0075_large.png",
					"small"=>"124/objects-0075_large.png",),
					array("big"=>"480/objects-0076_large.png",
					"small"=>"124/objects-0076_large.png",),
					array("big"=>"480/objects-0077_large.png",
					"small"=>"124/objects-0077_large.png",),
					array("big"=>"480/objects-0078_large.png",
					"small"=>"124/objects-0078_large.png",),
					array("big"=>"480/objects-0079_large.png",
					"small"=>"124/objects-0079_large.png",),
					array("big"=>"480/objects-0080_large.png",
					"small"=>"124/objects-0080_large.png",),
					array("big"=>"480/objects-0081_large_1.png",
					"small"=>"124/objects-0081_large_1.png",),
					array("big"=>"480/objects-0082_large.png",
					"small"=>"124/objects-0082_large.png",),
					array("big"=>"480/objects-0084_large.png",
					"small"=>"124/objects-0084_large.png",),
					array("big"=>"480/objects-0085_large.png",
					"small"=>"124/objects-0085_large.png",),
					array("big"=>"480/objects-0086_large.png",
					"small"=>"124/objects-0086_large.png",),
					array("big"=>"480/objects-0087_large.png",
					"small"=>"124/objects-0087_large.png",),
					array("big"=>"480/objects-0089_large.png",
					"small"=>"124/objects-0089_large.png",),
					array("big"=>"480/objects-0090_large.png",
					"small"=>"124/objects-0090_large.png",),
					array("big"=>"480/objects-0091_large.png",
					"small"=>"124/objects-0091_large.png",),
					array("big"=>"480/objects-0092_large.png",
					"small"=>"124/objects-0092_large.png",),
					array("big"=>"480/objects-0093_large.png",
					"small"=>"124/objects-0093_large.png",),
					array("big"=>"480/objects-0096_large.png",
					"small"=>"124/objects-0096_large.png",),
					array("big"=>"480/objects-0097_large.png",
					"small"=>"124/objects-0097_large.png",),
					array("big"=>"480/objects-0098_large.png",
					"small"=>"124/objects-0098_large.png",),
					array("big"=>"480/objects-0099_large.png",
					"small"=>"124/objects-0099_large.png",),
					array("big"=>"480/objects-0100_large.png",
					"small"=>"124/objects-0100_large.png",),
					array("big"=>"480/objects-0101_large.png",
					"small"=>"124/objects-0101_large.png",),
					array("big"=>"480/objects-0102_large.png",
					"small"=>"124/objects-0102_large.png",),
					array("big"=>"480/objects-0103_large.png",
					"small"=>"124/objects-0103_large.png",),
					array("big"=>"480/objects-0104_large.png",
					"small"=>"124/objects-0104_large.png",),
					array("big"=>"480/objects-0105_large.png",
					"small"=>"124/objects-0105_large.png",),
					array("big"=>"480/objects-0106_large.png",
					"small"=>"124/objects-0106_large.png",),
					array("big"=>"480/objects-0107_large.png",
					"small"=>"124/objects-0107_large.png",),
					array("big"=>"480/objects-0108_large.png",
					"small"=>"124/objects-0108_large.png",),
					array("big"=>"480/objects-0109_large.png",
					"small"=>"124/objects-0109_large.png",),
					array("big"=>"480/objects-0111_large.png",
					"small"=>"124/objects-0111_large.png",),
					array("big"=>"480/objects-0112_large.png",
					"small"=>"124/objects-0112_large.png",),
					array("big"=>"480/objects-0113_large.png",
					"small"=>"124/objects-0113_large.png",),
					array("big"=>"480/objects-0114_large.png",
					"small"=>"124/objects-0114_large.png",),
					array("big"=>"480/objects-0115_large.png",
					"small"=>"124/objects-0115_large.png",),
					array("big"=>"480/objects-0116_large.png",
					"small"=>"124/objects-0116_large.png",),
					array("big"=>"480/objects-0117_large.png",
					"small"=>"124/objects-0117_large.png",),
					array("big"=>"480/objects-0118_large.png",
					"small"=>"124/objects-0118_large.png",),
					array("big"=>"480/objects-0119_large.png",
					"small"=>"124/objects-0119_large.png",),
					array("big"=>"480/objects-0120_large.png",
					"small"=>"124/objects-0120_large.png",),
					array("big"=>"480/objects-0121_large.png",
					"small"=>"124/objects-0121_large.png",),
					array("big"=>"480/objects-0122_large.png",
					"small"=>"124/objects-0122_large.png",),
					array("big"=>"480/objects-0123_large.png",
					"small"=>"124/objects-0123_large.png",),
					array("big"=>"480/objects-0124_large.png",
					"small"=>"124/objects-0124_large.png",),
					array("big"=>"480/objects-0125_large.png",
					"small"=>"124/objects-0125_large.png",),
					array("big"=>"480/objects-0126_large.png",
					"small"=>"124/objects-0126_large.png",),
					array("big"=>"480/objects-0127_large.png",
					"small"=>"124/objects-0127_large.png",),
					array("big"=>"480/objects-0128_large.png",
					"small"=>"124/objects-0128_large.png",),
					array("big"=>"480/objects-0129_large.png",
					"small"=>"124/objects-0129_large.png",),
					array("big"=>"480/objects-0130_large.png",
					"small"=>"124/objects-0130_large.png",),
					array("big"=>"480/objects-0131_large.png",
					"small"=>"124/objects-0131_large.png",),
					array("big"=>"480/objects-0132_large.png",
					"small"=>"124/objects-0132_large.png",),
					array("big"=>"480/objects-0133_large.png",
					"small"=>"124/objects-0133_large.png",),
					array("big"=>"480/objects-0134_large.png",
					"small"=>"124/objects-0134_large.png",),
					array("big"=>"480/objects-0135_large.png",
					"small"=>"124/objects-0135_large.png",),
					array("big"=>"480/objects-0136_large.png",
					"small"=>"124/objects-0136_large.png",),
					array("big"=>"480/objects-0137_large.png",
					"small"=>"124/objects-0137_large.png",),
					array("big"=>"480/objects-0138_large.png",
					"small"=>"124/objects-0138_large.png",),
					array("big"=>"480/objects-0139_large.png",
					"small"=>"124/objects-0139_large.png",),
					array("big"=>"480/objects-0140_large.png",
					"small"=>"124/objects-0140_large.png",),
					array("big"=>"480/objects-0141_large.png",
					"small"=>"124/objects-0141_large.png",),
					array("big"=>"480/objects-0142_large.png",
					"small"=>"124/objects-0142_large.png",),
					array("big"=>"480/objects-0143_large.png",
					"small"=>"124/objects-0143_large.png",),
					array("big"=>"480/objects-0144_large.png",
					"small"=>"124/objects-0144_large.png",),
					array("big"=>"480/objects-0145_large.png",
					"small"=>"124/objects-0145_large.png",),
					array("big"=>"480/objects-0146_large.png",
					"small"=>"124/objects-0146_large.png",),
					array("big"=>"480/objects-0147_large.png",
					"small"=>"124/objects-0147_large.png",),
					array("big"=>"480/objects-0148_large.png",
					"small"=>"124/objects-0148_large.png",),
					array("big"=>"480/objects-0149_large.png",
					"small"=>"124/objects-0149_large.png",),
					array("big"=>"480/objects-0150_large.png",
					"small"=>"124/objects-0150_large.png",),
					array("big"=>"480/objects-0151_large.png",
					"small"=>"124/objects-0151_large.png",),
					array("big"=>"480/objects-0152_large.png",
					"small"=>"124/objects-0152_large.png",),
					array("big"=>"480/objects-0153_large.png",
					"small"=>"124/objects-0153_large.png",),
					array("big"=>"480/objects-0154_large.png",
					"small"=>"124/objects-0154_large.png",),
					array("big"=>"480/objects-0155_large.png",
					"small"=>"124/objects-0155_large.png",),
					array("big"=>"480/objects-0156_large.png",
					"small"=>"124/objects-0156_large.png",),
					array("big"=>"480/objects-0157_large.png",
					"small"=>"124/objects-0157_large.png",),
					array("big"=>"480/objects-0158_large.png",
					"small"=>"124/objects-0158_large.png",),
					array("big"=>"480/objects-0159_large.png",
					"small"=>"124/objects-0159_large.png",),
					array("big"=>"480/objects-0160_large.png",
					"small"=>"124/objects-0160_large.png",),
					array("big"=>"480/objects-0161_large.png",
					"small"=>"124/objects-0161_large.png",),
					array("big"=>"480/objects-0162_large.png",
					"small"=>"124/objects-0162_large.png",),
					array("big"=>"480/objects-0163_large.png",
					"small"=>"124/objects-0163_large.png",),
					array("big"=>"480/objects-0164_large.png",
					"small"=>"124/objects-0164_large.png",),
					array("big"=>"480/objects-0165_large.png",
					"small"=>"124/objects-0165_large.png",),
					array("big"=>"480/objects-0166_large.png",
					"small"=>"124/objects-0166_large.png",),
					array("big"=>"480/objects-0167_large.png",
					"small"=>"124/objects-0167_large.png",),
					array("big"=>"480/objects-0168_large.png",
					"small"=>"124/objects-0168_large.png",),
					array("big"=>"480/objects-0169_large.png",
					"small"=>"124/objects-0169_large.png",),
					array("big"=>"480/objects-0170_large.png",
					"small"=>"124/objects-0170_large.png",),
					array("big"=>"480/objects-0171_large.png",
					"small"=>"124/objects-0171_large.png",),
					array("big"=>"480/objects-0172_large.png",
					"small"=>"124/objects-0172_large.png",),
					array("big"=>"480/objects-0173_large.png",
					"small"=>"124/objects-0173_large.png",),
					array("big"=>"480/objects-0174_large.png",
					"small"=>"124/objects-0174_large.png",),
					array("big"=>"480/objects-0175_large.png",
					"small"=>"124/objects-0175_large.png",),
					array("big"=>"480/objects-0176_large.png",
					"small"=>"124/objects-0176_large.png",),
					array("big"=>"480/objects-0177_large.png",
					"small"=>"124/objects-0177_large.png",),
					array("big"=>"480/objects-0178_large.png",
					"small"=>"124/objects-0178_large.png",),
					array("big"=>"480/objects-0179_large.png",
					"small"=>"124/objects-0179_large.png",),
					array("big"=>"480/objects-0180_large.png",
					"small"=>"124/objects-0180_large.png",),
					array("big"=>"480/objects-0181_large.png",
					"small"=>"124/objects-0181_large.png",),
					array("big"=>"480/objects-0182_large.png",
					"small"=>"124/objects-0182_large.png",),
					array("big"=>"480/objects-0183_large.png",
					"small"=>"124/objects-0183_large.png",),
					array("big"=>"480/objects-0184_large.png",
					"small"=>"124/objects-0184_large.png",),
					array("big"=>"480/objects-0185_large.png",
					"small"=>"124/objects-0185_large.png",),
					array("big"=>"480/objects-0186_large.png",
					"small"=>"124/objects-0186_large.png",),
					array("big"=>"480/objects-0187_large.png",
					"small"=>"124/objects-0187_large.png",),
					array("big"=>"480/objects-0189_large.png",
					"small"=>"124/objects-0189_large.png",),
					array("big"=>"480/objects-0190_large.png",
					"small"=>"124/objects-0190_large.png",),
					array("big"=>"480/objects-0191_large.png",
					"small"=>"124/objects-0191_large.png",),
					array("big"=>"480/objects-0192_large.png",
					"small"=>"124/objects-0192_large.png",),
					array("big"=>"480/objects-0193_large.png",
					"small"=>"124/objects-0193_large.png",),
					array("big"=>"480/objects-0195_large.png",
					"small"=>"124/objects-0195_large.png",),
					array("big"=>"480/objects-0196_large.png",
					"small"=>"124/objects-0196_large.png",),
					array("big"=>"480/objects-0197_large.png",
					"small"=>"124/objects-0197_large.png",),
					array("big"=>"480/objects-0198_large.png",
					"small"=>"124/objects-0198_large.png",),
					array("big"=>"480/objects-0199_large.png",
					"small"=>"124/objects-0199_large.png",),
					array("big"=>"480/objects-0200_large.png",
					"small"=>"124/objects-0200_large.png",),
					array("big"=>"480/objects-0201_large.png",
					"small"=>"124/objects-0201_large.png",),
					array("big"=>"480/objects-0202_large.png",
					"small"=>"124/objects-0202_large.png",),
					array("big"=>"480/objects-0203_large.png",
					"small"=>"124/objects-0203_large.png",),
					array("big"=>"480/objects-0204_large.png",
					"small"=>"124/objects-0204_large.png",),
					array("big"=>"480/objects-0205_large.png",
					"small"=>"124/objects-0205_large.png",),
					array("big"=>"480/objects-0206_large.png",
					"small"=>"124/objects-0206_large.png",),
					array("big"=>"480/objects-0207_large.png",
					"small"=>"124/objects-0207_large.png",),
					array("big"=>"480/objects-0208_large.png",
					"small"=>"124/objects-0208_large.png",),
					array("big"=>"480/objects-0209_large.png",
					"small"=>"124/objects-0209_large.png",),
					array("big"=>"480/objects-0210_large.png",
					"small"=>"124/objects-0210_large.png",),
					array("big"=>"480/objects-0211_large.png",
					"small"=>"124/objects-0211_large.png",),
					array("big"=>"480/objects-0212_large.png",
					"small"=>"124/objects-0212_large.png",),
					array("big"=>"480/objects-0213_large.png",
					"small"=>"124/objects-0213_large.png",),
					array("big"=>"480/objects-0214_large.png",
					"small"=>"124/objects-0214_large.png",),
					array("big"=>"480/objects-0215_large.png",
					"small"=>"124/objects-0215_large.png",),
					array("big"=>"480/objects-0216_large.png",
					"small"=>"124/objects-0216_large.png",),
					array("big"=>"480/objects-0217_large.png",
					"small"=>"124/objects-0217_large.png",),
					array("big"=>"480/objects-0218_large.png",
					"small"=>"124/objects-0218_large.png",),
					array("big"=>"480/objects-0219_large.png",
					"small"=>"124/objects-0219_large.png",),
					array("big"=>"480/objects-0220_large.png",
					"small"=>"124/objects-0220_large.png",),
					array("big"=>"480/objects-0221_large.png",
					"small"=>"124/objects-0221_large.png",),
					array("big"=>"480/objects-0222_large.png",
					"small"=>"124/objects-0222_large.png",),
					array("big"=>"480/objects-0223_large.png",
					"small"=>"124/objects-0223_large.png",),
					array("big"=>"480/objects-0224_large.png",
					"small"=>"124/objects-0224_large.png",),
					array("big"=>"480/objects-0225_large.png",
					"small"=>"124/objects-0225_large.png",),
					array("big"=>"480/objects-0226_large.png",
					"small"=>"124/objects-0226_large.png",),
					array("big"=>"480/objects-0227_large.png",
					"small"=>"124/objects-0227_large.png",),
					array("big"=>"480/objects-0228_large.png",
					"small"=>"124/objects-0228_large.png",),
					array("big"=>"480/objects-0229_large.png",
					"small"=>"124/objects-0229_large.png",),
					array("big"=>"480/objects-0230_large.png",
					"small"=>"124/objects-0230_large.png",),
					array("big"=>"480/objects-195_large.png",
					"small"=>"124/objects-195_large.png",),
					
				)
			),
			
			array(
				"link"=>"places/",
				"name"=>"Места",
				"images"=>array(
					
					array("big"=>"480/places-0001_large.png",
					"small"=>"124/places-0001_large.png",),
					array("big"=>"480/places-0002_large.png",
					"small"=>"124/places-0002_large.png",),
					array("big"=>"480/places-0003_large.png",
					"small"=>"124/places-0003_large.png",),
					array("big"=>"480/places-0004_large.png",
					"small"=>"124/places-0004_large.png",),
					array("big"=>"480/places-0005_large.png",
					"small"=>"124/places-0005_large.png",),
					array("big"=>"480/places-0006_large.png",
					"small"=>"124/places-0006_large.png",),
					array("big"=>"480/places-0007_large.png",
					"small"=>"124/places-0007_large.png",),
					array("big"=>"480/places-0008_large.png",
					"small"=>"124/places-0008_large.png",),
					array("big"=>"480/places-0009_large.png",
					"small"=>"124/places-0009_large.png",),
					array("big"=>"480/places-0010_large.png",
					"small"=>"124/places-0010_large.png",),
					array("big"=>"480/places-0011_large.png",
					"small"=>"124/places-0011_large.png",),
					array("big"=>"480/places-0012_large.png",
					"small"=>"124/places-0012_large.png",),
					array("big"=>"480/places-0013_large.png",
					"small"=>"124/places-0013_large.png",),
					array("big"=>"480/places-0014_large.png",
					"small"=>"124/places-0014_large.png",),
					array("big"=>"480/places-0015_large.png",
					"small"=>"124/places-0015_large.png",),
					array("big"=>"480/places-0016_large.png",
					"small"=>"124/places-0016_large.png",),
					array("big"=>"480/places-0017_large.png",
					"small"=>"124/places-0017_large.png",),
					array("big"=>"480/places-0018_large.png",
					"small"=>"124/places-0018_large.png",),
					array("big"=>"480/places-0019_large.png",
					"small"=>"124/places-0019_large.png",),
					array("big"=>"480/places-0020_large.png",
					"small"=>"124/places-0020_large.png",),
					array("big"=>"480/places-0021_large.png",
					"small"=>"124/places-0021_large.png",),
					array("big"=>"480/places-0022_large.png",
					"small"=>"124/places-0022_large.png",),
					array("big"=>"480/places-0023_large.png",
					"small"=>"124/places-0023_large.png",),
					array("big"=>"480/places-0024_large.png",
					"small"=>"124/places-0024_large.png",),
					array("big"=>"480/places-0025_large.png",
					"small"=>"124/places-0025_large.png",),
					array("big"=>"480/places-0026_large.png",
					"small"=>"124/places-0026_large.png",),
					array("big"=>"480/places-0027_large.png",
					"small"=>"124/places-0027_large.png",),
					array("big"=>"480/places-0028_large.png",
					"small"=>"124/places-0028_large.png",),
					array("big"=>"480/places-0029_large.png",
					"small"=>"124/places-0029_large.png",),
					array("big"=>"480/places-0030_large.png",
					"small"=>"124/places-0030_large.png",),
					array("big"=>"480/places-0031_large.png",
					"small"=>"124/places-0031_large.png",),
					array("big"=>"480/places-0032_large.png",
					"small"=>"124/places-0032_large.png",),
					array("big"=>"480/places-0033_large.png",
					"small"=>"124/places-0033_large.png",),
					array("big"=>"480/places-0034_large.png",
					"small"=>"124/places-0034_large.png",),
					array("big"=>"480/places-0035_large.png",
					"small"=>"124/places-0035_large.png",),
					array("big"=>"480/places-0036_large.png",
					"small"=>"124/places-0036_large.png",),
					array("big"=>"480/places-0037_large.png",
					"small"=>"124/places-0037_large.png",),
					array("big"=>"480/places-0038_large.png",
					"small"=>"124/places-0038_large.png",),
					array("big"=>"480/places-0039_large.png",
					"small"=>"124/places-0039_large.png",),
					array("big"=>"480/places-0040_large.png",
					"small"=>"124/places-0040_large.png",),
					array("big"=>"480/places-0041_large.png",
					"small"=>"124/places-0041_large.png",),
					array("big"=>"480/places-0042_large.png",
					"small"=>"124/places-0042_large.png",),
					array("big"=>"480/places-0043_large.png",
					"small"=>"124/places-0043_large.png",),
					array("big"=>"480/places-0044_large.png",
					"small"=>"124/places-0044_large.png",),
					array("big"=>"480/places-0045_large.png",
					"small"=>"124/places-0045_large.png",),
					array("big"=>"480/places-0046_large.png",
					"small"=>"124/places-0046_large.png",),
					array("big"=>"480/places-0047_large.png",
					"small"=>"124/places-0047_large.png",),
					array("big"=>"480/places-0048_large.png",
					"small"=>"124/places-0048_large.png",),
					array("big"=>"480/places-0049_large.png",
					"small"=>"124/places-0049_large.png",),
					array("big"=>"480/places-0050_large.png",
					"small"=>"124/places-0050_large.png",),
					array("big"=>"480/places-0051_large.png",
					"small"=>"124/places-0051_large.png",),
					array("big"=>"480/places-0052_large.png",
					"small"=>"124/places-0052_large.png",),
					array("big"=>"480/places-0053_large.png",
					"small"=>"124/places-0053_large.png",),
					array("big"=>"480/places-0054_large.png",
					"small"=>"124/places-0054_large.png",),
					array("big"=>"480/places-0055_large.png",
					"small"=>"124/places-0055_large.png",),
					array("big"=>"480/places-0056_large.png",
					"small"=>"124/places-0056_large.png",),
					array("big"=>"480/places-0057_large.png",
					"small"=>"124/places-0057_large.png",),
					array("big"=>"480/places-0058_large.png",
					"small"=>"124/places-0058_large.png",),
					array("big"=>"480/places-0059_large.png",
					"small"=>"124/places-0059_large.png",),
					array("big"=>"480/places-0060_large.png",
					"small"=>"124/places-0060_large.png",),
					array("big"=>"480/places-0061_large.png",
					"small"=>"124/places-0061_large.png",),
					array("big"=>"480/places-0062_large.png",
					"small"=>"124/places-0062_large.png",),
					array("big"=>"480/places-0063_large.png",
					"small"=>"124/places-0063_large.png",),
					array("big"=>"480/places-0064_large.png",
					"small"=>"124/places-0064_large.png",),
					array("big"=>"480/places-0065_large.png",
					"small"=>"124/places-0065_large.png",),
					array("big"=>"480/places-0066_large.png",
					"small"=>"124/places-0066_large.png",),
					array("big"=>"480/places-0067_large.png",
					"small"=>"124/places-0067_large.png",),
					array("big"=>"480/places-0068_large.png",
					"small"=>"124/places-0068_large.png",),
					array("big"=>"480/places-0069_large.png",
					"small"=>"124/places-0069_large.png",),
					array("big"=>"480/places-0070_large.png",
					"small"=>"124/places-0070_large.png",),
					array("big"=>"480/places-0071_large.png",
					"small"=>"124/places-0071_large.png",),
					array("big"=>"480/places-0072_large.png",
					"small"=>"124/places-0072_large.png",),
					array("big"=>"480/places-0073_large.png",
					"small"=>"124/places-0073_large.png",),
					array("big"=>"480/places-0074_large.png",
					"small"=>"124/places-0074_large.png",),
					array("big"=>"480/places-0075_large.png",
					"small"=>"124/places-0075_large.png",),
					array("big"=>"480/places-0076_large.png",
					"small"=>"124/places-0076_large.png",),
					array("big"=>"480/places-0077_large.png",
					"small"=>"124/places-0077_large.png",),
					array("big"=>"480/places-0078_large.png",
					"small"=>"124/places-0078_large.png",),
					array("big"=>"480/places-0079_large.png",
					"small"=>"124/places-0079_large.png",),
					array("big"=>"480/places-0080_large.png",
					"small"=>"124/places-0080_large.png",),
					array("big"=>"480/places-0081_large.png",
					"small"=>"124/places-0081_large.png",),
					array("big"=>"480/places-0082_large.png",
					"small"=>"124/places-0082_large.png",),
					array("big"=>"480/places-0083_large.png",
					"small"=>"124/places-0083_large.png",),
					array("big"=>"480/places-0084_large.png",
					"small"=>"124/places-0084_large.png",),
					array("big"=>"480/places-0085_large.png",
					"small"=>"124/places-0085_large.png",),
					array("big"=>"480/places-0086_large.png",
					"small"=>"124/places-0086_large.png",),
					array("big"=>"480/places-0087_large.png",
					"small"=>"124/places-0087_large.png",),
					array("big"=>"480/places-0088_large.png",
					"small"=>"124/places-0088_large.png",),
					array("big"=>"480/places-0089_large.png",
					"small"=>"124/places-0089_large.png",),
					array("big"=>"480/places-0090_large.png",
					"small"=>"124/places-0090_large.png",),
					array("big"=>"480/places-0091_large.png",
					"small"=>"124/places-0091_large.png",),
					array("big"=>"480/places-0092_large.png",
					"small"=>"124/places-0092_large.png",),
					array("big"=>"480/places-0093_large.png",
					"small"=>"124/places-0093_large.png",),
					array("big"=>"480/places-0094_large.png",
					"small"=>"124/places-0094_large.png",),
					array("big"=>"480/places-0095_large.png",
					"small"=>"124/places-0095_large.png",),
					array("big"=>"480/places-0096_large.png",
					"small"=>"124/places-0096_large.png",),
					array("big"=>"480/places-0097_large.png",
					"small"=>"124/places-0097_large.png",),
					array("big"=>"480/places-0098_large.png",
					"small"=>"124/places-0098_large.png",),
					array("big"=>"480/places-0099_large.png",
					"small"=>"124/places-0099_large.png",),
					array("big"=>"480/places-0100_large.png",
					"small"=>"124/places-0100_large.png",),
					array("big"=>"480/places-0101_large.png",
					"small"=>"124/places-0101_large.png",),

				)
			),
			array(
				"link"=>"symbols/",
				"name"=>"Символы",
				"images"=>array(
					
					array("big"=>"480/symbols-0002_large.png",
					"small"=>"124/symbols-0002_large.png",),
					array("big"=>"480/symbols-0003_large.png",
					"small"=>"124/symbols-0003_large.png",),
					array("big"=>"480/symbols-0004_large.png",
					"small"=>"124/symbols-0004_large.png",),
					array("big"=>"480/symbols-0005_large.png",
					"small"=>"124/symbols-0005_large.png",),
					array("big"=>"480/symbols-0006_large.png",
					"small"=>"124/symbols-0006_large.png",),
					array("big"=>"480/symbols-0007_large.png",
					"small"=>"124/symbols-0007_large.png",),
					array("big"=>"480/symbols-0008_large.png",
					"small"=>"124/symbols-0008_large.png",),
					array("big"=>"480/symbols-0009_large.png",
					"small"=>"124/symbols-0009_large.png",),
					array("big"=>"480/symbols-0010_large.png",
					"small"=>"124/symbols-0010_large.png",),
					array("big"=>"480/symbols-0011_large.png",
					"small"=>"124/symbols-0011_large.png",),
					array("big"=>"480/symbols-0012_large.png",
					"small"=>"124/symbols-0012_large.png",),
					array("big"=>"480/symbols-0013_large.png",
					"small"=>"124/symbols-0013_large.png",),
					array("big"=>"480/symbols-0014_large.png",
					"small"=>"124/symbols-0014_large.png",),
					array("big"=>"480/symbols-0015_large.png",
					"small"=>"124/symbols-0015_large.png",),
					array("big"=>"480/symbols-0016_large.png",
					"small"=>"124/symbols-0016_large.png",),
					array("big"=>"480/symbols-0017_large.png",
					"small"=>"124/symbols-0017_large.png",),
					array("big"=>"480/symbols-0018_large.png",
					"small"=>"124/symbols-0018_large.png",),
					array("big"=>"480/symbols-0019_large.png",
					"small"=>"124/symbols-0019_large.png",),
					array("big"=>"480/symbols-0020_large.png",
					"small"=>"124/symbols-0020_large.png",),
					array("big"=>"480/symbols-0021_large.png",
					"small"=>"124/symbols-0021_large.png",),
					array("big"=>"480/symbols-0022_large.png",
					"small"=>"124/symbols-0022_large.png",),
					array("big"=>"480/symbols-0023_large.png",
					"small"=>"124/symbols-0023_large.png",),
					array("big"=>"480/symbols-0024_large.png",
					"small"=>"124/symbols-0024_large.png",),
					array("big"=>"480/symbols-0025_large.png",
					"small"=>"124/symbols-0025_large.png",),
					array("big"=>"480/symbols-0026_large.png",
					"small"=>"124/symbols-0026_large.png",),
					array("big"=>"480/symbols-0027_large.png",
					"small"=>"124/symbols-0027_large.png",),
					array("big"=>"480/symbols-0028_large.png",
					"small"=>"124/symbols-0028_large.png",),
					array("big"=>"480/symbols-0029_large.png",
					"small"=>"124/symbols-0029_large.png",),
					array("big"=>"480/symbols-0030_large.png",
					"small"=>"124/symbols-0030_large.png",),
					array("big"=>"480/symbols-0031_large.png",
					"small"=>"124/symbols-0031_large.png",),
					array("big"=>"480/symbols-0032_large.png",
					"small"=>"124/symbols-0032_large.png",),
					array("big"=>"480/symbols-0033_large.png",
					"small"=>"124/symbols-0033_large.png",),
					array("big"=>"480/symbols-0034_large.png",
					"small"=>"124/symbols-0034_large.png",),
					array("big"=>"480/symbols-0035_large.png",
					"small"=>"124/symbols-0035_large.png",),
					array("big"=>"480/symbols-0036_large.png",
					"small"=>"124/symbols-0036_large.png",),
					array("big"=>"480/symbols-0037_large.png",
					"small"=>"124/symbols-0037_large.png",),
					array("big"=>"480/symbols-0038_large.png",
					"small"=>"124/symbols-0038_large.png",),
					array("big"=>"480/symbols-0039_large.png",
					"small"=>"124/symbols-0039_large.png",),
					array("big"=>"480/symbols-0040_large.png",
					"small"=>"124/symbols-0040_large.png",),
					array("big"=>"480/symbols-0041_large.png",
					"small"=>"124/symbols-0041_large.png",),
					array("big"=>"480/symbols-0042_large.png",
					"small"=>"124/symbols-0042_large.png",),
					array("big"=>"480/symbols-0043_large.png",
					"small"=>"124/symbols-0043_large.png",),
					array("big"=>"480/symbols-0044_large.png",
					"small"=>"124/symbols-0044_large.png",),
					array("big"=>"480/symbols-0045_large.png",
					"small"=>"124/symbols-0045_large.png",),
					array("big"=>"480/symbols-0046_large.png",
					"small"=>"124/symbols-0046_large.png",),
					array("big"=>"480/symbols-0047_large.png",
					"small"=>"124/symbols-0047_large.png",),
					array("big"=>"480/symbols-0048_large.png",
					"small"=>"124/symbols-0048_large.png",),
					array("big"=>"480/symbols-0049_large.png",
					"small"=>"124/symbols-0049_large.png",),
					array("big"=>"480/symbols-0050_large.png",
					"small"=>"124/symbols-0050_large.png",),
					array("big"=>"480/symbols-0051_large.png",
					"small"=>"124/symbols-0051_large.png",),
					array("big"=>"480/symbols-0052_large.png",
					"small"=>"124/symbols-0052_large.png",),
					array("big"=>"480/symbols-0053_large.png",
					"small"=>"124/symbols-0053_large.png",),
					array("big"=>"480/symbols-0054_large.png",
					"small"=>"124/symbols-0054_large.png",),
					array("big"=>"480/symbols-0055_large.png",
					"small"=>"124/symbols-0055_large.png",),
					array("big"=>"480/symbols-0056_large.png",
					"small"=>"124/symbols-0056_large.png",),
					array("big"=>"480/symbols-0057_large.png",
					"small"=>"124/symbols-0057_large.png",),
					array("big"=>"480/symbols-0058_large.png",
					"small"=>"124/symbols-0058_large.png",),
					array("big"=>"480/symbols-0059_large.png",
					"small"=>"124/symbols-0059_large.png",),
					array("big"=>"480/symbols-0060_large.png",
					"small"=>"124/symbols-0060_large.png",),
					array("big"=>"480/symbols-0061_large.png",
					"small"=>"124/symbols-0061_large.png",),
					array("big"=>"480/symbols-0062_large.png",
					"small"=>"124/symbols-0062_large.png",),
					array("big"=>"480/symbols-0063_large.png",
					"small"=>"124/symbols-0063_large.png",),
					array("big"=>"480/symbols-0064_large.png",
					"small"=>"124/symbols-0064_large.png",),
					array("big"=>"480/symbols-0065_large.png",
					"small"=>"124/symbols-0065_large.png",),
					array("big"=>"480/symbols-0066_large.png",
					"small"=>"124/symbols-0066_large.png",),
					array("big"=>"480/symbols-0067_large.png",
					"small"=>"124/symbols-0067_large.png",),
					array("big"=>"480/symbols-0068_large.png",
					"small"=>"124/symbols-0068_large.png",),
					array("big"=>"480/symbols-0069_large.png",
					"small"=>"124/symbols-0069_large.png",),
					array("big"=>"480/symbols-0070_large.png",
					"small"=>"124/symbols-0070_large.png",),
					array("big"=>"480/symbols-0071_large.png",
					"small"=>"124/symbols-0071_large.png",),
					array("big"=>"480/symbols-0072_large.png",
					"small"=>"124/symbols-0072_large.png",),
					array("big"=>"480/symbols-0073_large.png",
					"small"=>"124/symbols-0073_large.png",),
					array("big"=>"480/symbols-0074_large.png",
					"small"=>"124/symbols-0074_large.png",),
					array("big"=>"480/symbols-0076_large.png",
					"small"=>"124/symbols-0076_large.png",),
					array("big"=>"480/symbols-0077_large.png",
					"small"=>"124/symbols-0077_large.png",),
					array("big"=>"480/symbols-0078_large.png",
					"small"=>"124/symbols-0078_large.png",),
					array("big"=>"480/symbols-0079_large.png",
					"small"=>"124/symbols-0079_large.png",),
					array("big"=>"480/symbols-0080_large.png",
					"small"=>"124/symbols-0080_large.png",),
					array("big"=>"480/symbols-0081_large.png",
					"small"=>"124/symbols-0081_large.png",),
					array("big"=>"480/symbols-0082_large.png",
					"small"=>"124/symbols-0082_large.png",),
					array("big"=>"480/symbols-0083_large.png",
					"small"=>"124/symbols-0083_large.png",),
					array("big"=>"480/symbols-0084_large.png",
					"small"=>"124/symbols-0084_large.png",),
					array("big"=>"480/symbols-0085_large.png",
					"small"=>"124/symbols-0085_large.png",),
					array("big"=>"480/symbols-0086_large.png",
					"small"=>"124/symbols-0086_large.png",),
					array("big"=>"480/symbols-0087_large.png",
					"small"=>"124/symbols-0087_large.png",),
					array("big"=>"480/symbols-0088_large.png",
					"small"=>"124/symbols-0088_large.png",),
					array("big"=>"480/symbols-0089_large.png",
					"small"=>"124/symbols-0089_large.png",),
					array("big"=>"480/symbols-0090_large.png",
					"small"=>"124/symbols-0090_large.png",),
					array("big"=>"480/symbols-0091_large.png",
					"small"=>"124/symbols-0091_large.png",),
					array("big"=>"480/symbols-0092_large.png",
					"small"=>"124/symbols-0092_large.png",),
					array("big"=>"480/symbols-0093_large.png",
					"small"=>"124/symbols-0093_large.png",),
					array("big"=>"480/symbols-0094_large.png",
					"small"=>"124/symbols-0094_large.png",),
					array("big"=>"480/symbols-0095_large.png",
					"small"=>"124/symbols-0095_large.png",),
					array("big"=>"480/symbols-0096_large.png",
					"small"=>"124/symbols-0096_large.png",),
					array("big"=>"480/symbols-0097_large.png",
					"small"=>"124/symbols-0097_large.png",),
					array("big"=>"480/symbols-0098_large.png",
					"small"=>"124/symbols-0098_large.png",),
					array("big"=>"480/symbols-0099_large.png",
					"small"=>"124/symbols-0099_large.png",),
					array("big"=>"480/symbols-0100_large.png",
					"small"=>"124/symbols-0100_large.png",),
					array("big"=>"480/symbols-0101_large.png",
					"small"=>"124/symbols-0101_large.png",),
					array("big"=>"480/symbols-0102_large.png",
					"small"=>"124/symbols-0102_large.png",),
					array("big"=>"480/symbols-0103_large.png",
					"small"=>"124/symbols-0103_large.png",),
					array("big"=>"480/symbols-0104_large.png",
					"small"=>"124/symbols-0104_large.png",),
					array("big"=>"480/symbols-0105_large.png",
					"small"=>"124/symbols-0105_large.png",),
					array("big"=>"480/symbols-0106_large.png",
					"small"=>"124/symbols-0106_large.png",),
					array("big"=>"480/symbols-0107_large.png",
					"small"=>"124/symbols-0107_large.png",),
					array("big"=>"480/symbols-0108_large.png",
					"small"=>"124/symbols-0108_large.png",),
					array("big"=>"480/symbols-0109_large.png",
					"small"=>"124/symbols-0109_large.png",),
					array("big"=>"480/symbols-0110_large.png",
					"small"=>"124/symbols-0110_large.png",),
					array("big"=>"480/symbols-0111_large.png",
					"small"=>"124/symbols-0111_large.png",),
					array("big"=>"480/symbols-0112_large.png",
					"small"=>"124/symbols-0112_large.png",),
					array("big"=>"480/symbols-0113_large.png",
					"small"=>"124/symbols-0113_large.png",),
					array("big"=>"480/symbols-0114_large.png",
					"small"=>"124/symbols-0114_large.png",),
					array("big"=>"480/symbols-0115_large.png",
					"small"=>"124/symbols-0115_large.png",),
					array("big"=>"480/symbols-0116_large.png",
					"small"=>"124/symbols-0116_large.png",),
					array("big"=>"480/symbols-0117_large.png",
					"small"=>"124/symbols-0117_large.png",),
					array("big"=>"480/symbols-0118_large.png",
					"small"=>"124/symbols-0118_large.png",),
					array("big"=>"480/symbols-0119_large.png",
					"small"=>"124/symbols-0119_large.png",),
					array("big"=>"480/symbols-0120_large.png",
					"small"=>"124/symbols-0120_large.png",),
					array("big"=>"480/symbols-0121_large.png",
					"small"=>"124/symbols-0121_large.png",),
					array("big"=>"480/symbols-0122_large.png",
					"small"=>"124/symbols-0122_large.png",),
					array("big"=>"480/symbols-0123_large.png",
					"small"=>"124/symbols-0123_large.png",),
					array("big"=>"480/symbols-0124_large.png",
					"small"=>"124/symbols-0124_large.png",),
					array("big"=>"480/symbols-0125_large.png",
					"small"=>"124/symbols-0125_large.png",),
					array("big"=>"480/symbols-0126_large.png",
					"small"=>"124/symbols-0126_large.png",),
					array("big"=>"480/symbols-0127_large.png",
					"small"=>"124/symbols-0127_large.png",),
					array("big"=>"480/symbols-0128_large.png",
					"small"=>"124/symbols-0128_large.png",),
					array("big"=>"480/symbols-0129_large.png",
					"small"=>"124/symbols-0129_large.png",),
					array("big"=>"480/symbols-0130_large.png",
					"small"=>"124/symbols-0130_large.png",),
					array("big"=>"480/symbols-0131_large.png",
					"small"=>"124/symbols-0131_large.png",),
					array("big"=>"480/symbols-0132_large.png",
					"small"=>"124/symbols-0132_large.png",),
					array("big"=>"480/symbols-0133_large.png",
					"small"=>"124/symbols-0133_large.png",),
					array("big"=>"480/symbols-0134_large.png",
					"small"=>"124/symbols-0134_large.png",),
					array("big"=>"480/symbols-0135_large.png",
					"small"=>"124/symbols-0135_large.png",),
					array("big"=>"480/symbols-0136_large.png",
					"small"=>"124/symbols-0136_large.png",),
					array("big"=>"480/symbols-0137_large.png",
					"small"=>"124/symbols-0137_large.png",),
					array("big"=>"480/symbols-0138_large.png",
					"small"=>"124/symbols-0138_large.png",),
					array("big"=>"480/symbols-0139_large.png",
					"small"=>"124/symbols-0139_large.png",),
					array("big"=>"480/symbols-0140_large.png",
					"small"=>"124/symbols-0140_large.png",),
					array("big"=>"480/symbols-0141_large.png",
					"small"=>"124/symbols-0141_large.png",),
					array("big"=>"480/symbols-0142_large.png",
					"small"=>"124/symbols-0142_large.png",),
					array("big"=>"480/symbols-0143_large.png",
					"small"=>"124/symbols-0143_large.png",),
					array("big"=>"480/symbols-0144_large.png",
					"small"=>"124/symbols-0144_large.png",),
					array("big"=>"480/symbols-0145_large.png",
					"small"=>"124/symbols-0145_large.png",),
					array("big"=>"480/symbols-0146_large.png",
					"small"=>"124/symbols-0146_large.png",),
					array("big"=>"480/symbols-0147_large.png",
					"small"=>"124/symbols-0147_large.png",),
					array("big"=>"480/symbols-0148_large.png",
					"small"=>"124/symbols-0148_large.png",),
					array("big"=>"480/symbols-0149_large.png",
					"small"=>"124/symbols-0149_large.png",),
					array("big"=>"480/symbols-0150_large.png",
					"small"=>"124/symbols-0150_large.png",),
					array("big"=>"480/symbols-0151_large.png",
					"small"=>"124/symbols-0151_large.png",),
					array("big"=>"480/symbols-0152_large.png",
					"small"=>"124/symbols-0152_large.png",),
					array("big"=>"480/symbols-0153_large.png",
					"small"=>"124/symbols-0153_large.png",),
					array("big"=>"480/symbols-0154_large.png",
					"small"=>"124/symbols-0154_large.png",),
					array("big"=>"480/symbols-0155_large.png",
					"small"=>"124/symbols-0155_large.png",),
					array("big"=>"480/symbols-0156_large.png",
					"small"=>"124/symbols-0156_large.png",),
					array("big"=>"480/symbols-0157_large.png",
					"small"=>"124/symbols-0157_large.png",),
					array("big"=>"480/symbols-0158_large.png",
					"small"=>"124/symbols-0158_large.png",),
					array("big"=>"480/symbols-0159_large.png",
					"small"=>"124/symbols-0159_large.png",),
					array("big"=>"480/symbols-0160_large.png",
					"small"=>"124/symbols-0160_large.png",),
					array("big"=>"480/symbols-0161_large.png",
					"small"=>"124/symbols-0161_large.png",),
					array("big"=>"480/symbols-0162_large.png",
					"small"=>"124/symbols-0162_large.png",),
					array("big"=>"480/symbols-0163_large.png",
					"small"=>"124/symbols-0163_large.png",),
					array("big"=>"480/symbols-0164_large.png",
					"small"=>"124/symbols-0164_large.png",),
					array("big"=>"480/symbols-0165_large.png",
					"small"=>"124/symbols-0165_large.png",),
					array("big"=>"480/symbols-0166_large.png",
					"small"=>"124/symbols-0166_large.png",),
					array("big"=>"480/symbols-0167_large.png",
					"small"=>"124/symbols-0167_large.png",),
					array("big"=>"480/symbols-0168_large.png",
					"small"=>"124/symbols-0168_large.png",),
					array("big"=>"480/symbols-0169_large.png",
					"small"=>"124/symbols-0169_large.png",),
					array("big"=>"480/symbols-0170_large.png",
					"small"=>"124/symbols-0170_large.png",),
					array("big"=>"480/symbols-0171_large.png",
					"small"=>"124/symbols-0171_large.png",),
					array("big"=>"480/symbols-0172_large.png",
					"small"=>"124/symbols-0172_large.png",),
					array("big"=>"480/symbols-0173_large.png",
					"small"=>"124/symbols-0173_large.png",),
					array("big"=>"480/symbols-0174_large.png",
					"small"=>"124/symbols-0174_large.png",),
					array("big"=>"480/symbols-0175_large.png",
					"small"=>"124/symbols-0175_large.png",),
					array("big"=>"480/symbols-0176_large.png",
					"small"=>"124/symbols-0176_large.png",),
					array("big"=>"480/symbols-0177_large.png",
					"small"=>"124/symbols-0177_large.png",),
					array("big"=>"480/symbols-0178_large.png",
					"small"=>"124/symbols-0178_large.png",),
					array("big"=>"480/symbols-0179_large.png",
					"small"=>"124/symbols-0179_large.png",),
					array("big"=>"480/symbols-0180_large.png",
					"small"=>"124/symbols-0180_large.png",),
					array("big"=>"480/symbols-0181_large.png",
					"small"=>"124/symbols-0181_large.png",),
					array("big"=>"480/symbols-0182_large.png",
					"small"=>"124/symbols-0182_large.png",),
					array("big"=>"480/symbols-0183_large.png",
					"small"=>"124/symbols-0183_large.png",),
					array("big"=>"480/symbols-0184_large.png",
					"small"=>"124/symbols-0184_large.png",),
					array("big"=>"480/symbols-0185_large.png",
					"small"=>"124/symbols-0185_large.png",),
					array("big"=>"480/symbols-0186_large.png",
					"small"=>"124/symbols-0186_large.png",),
					array("big"=>"480/symbols-0187_large.png",
					"small"=>"124/symbols-0187_large.png",),
					array("big"=>"480/symbols-0190_large.png",
					"small"=>"124/symbols-0190_large.png",),
					array("big"=>"480/symbols-0191_large.png",
					"small"=>"124/symbols-0191_large.png",),
					array("big"=>"480/symbols-2_large.png",
					"small"=>"124/symbols-2_large.png",),

				)
			),

		)
);
?>
