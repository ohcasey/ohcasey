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
	"main" =>array("get_data", "save_img", "add_to_cart"),
	"success"=>array() , 
	"cart" =>array("remove_item", "confirm_order", "get_city", "robo_success","robo_fail","robo_result")
 );
//конфиги девайсов
global $config;
$config = array(
		"deliver_cost" => array(
			"self" =>  0, //самовывоз
			"kur_mos" =>  250,
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
			"pict1" => "bg1.jpg",
			"pict2" => "bg1.jpg",
			"pict3" => "bg1.jpg",
			"pict4" => "bg1.jpg",
			"pict5" => "bg1.jpg",
			"pict6" => "bg1.jpg",
			"pict7" => "bg1.jpg",
			"pict8" => "bg1.jpg",
			"pict9" => "bg1.jpg",
			"pict10" => "bg1.jpg",
			"pict11" => "bg1.jpg",
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
											"cost"=>1000,
											"default"=>true
									),
									array(	
										//серебристый прозрачный
											"id"=>1,
											"color"=>"#BBBBBB",
											"desctop_img" => "iphone6_silver_crystal_case.png",
											"desctop_mask" => "iphone6-6+.png",
											"desctop_camera" => "iphone6_silver_camera.png",
											"cost"=>1100
									),
									array(	
										//серый прозрачный прозрачный
											"id"=>2,
											"color"=>"#888888",
											"desctop_img" => "iphone6_gray_crystal_case.png",
											"desctop_mask" => "iphone6-6+.png",
											"desctop_camera" => "iphone6_gray_camera.png",
											"cost"=>1200
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
											"cost"=>1300,
											"default"=>true
									),
									array(	
										//серебристый прозрачный
											"id"=>4,
											"color"=>"#BBBBBB",
											"desctop_img" => "iphone6_silver_whitecrystal_case.png",
											"desctop_mask" => "iphone6-6+.png",
											"desctop_camera" => "iphone6_silver_camera.png",
											"cost"=>1400
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
											"cost"=>1600
										)
									
									)
				),
				array(
					"name" => "Soft Touch",
					"descr_1" => "матовый черный",
					"descr_2" => "Бархатистый, приятный на ощупь чехол.",
					"desctop_mask_2"=>"iphone_6_mask_2.png",
					"lib_img" => "iphone6_black_icon.png",
					"colors"=> array(
									//цвет - вид (hex, rgb, transparent или название цвета)
										array(		
											"id"=>7,
											"color"=>"transparent",
											"desctop_img" => "iphone6_black_softtouch_case.png",
											"desctop_mask" => "iphone6-6+.png", //обрезка
											"desctop_camera" => "iphone6_gray_camera.png",
											"cost"=>1700
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
					"lib_img" => "material-1.png",
					"default"=>true,
					"colors"=> array(
									array(		
										//золотой прозрачный
											"id"=>0,
											"color"=>"#CF9657",
											"desctop_img" => "iphone6_gold_crystal_case.png",
											"desctop_mask" => "iphone6-6+.png", //обрезка
											"desctop_camera" => "iphone6_gold_camera.png",
											"cost"=>1000,
											"default"=>true
									),
									array(	
										//серебристый прозрачный
											"id"=>1,
											"color"=>"#BBBBBB",
											"desctop_img" => "iphone6_silver_crystal_case.png",
											"desctop_mask" => "iphone6-6+.png",
											"desctop_camera" => "iphone6_silver_camera.png",
											"cost"=>1100
									),
									array(	
										//серый прозрачный прозрачный
											"id"=>2,
											"color"=>"#888888",
											"desctop_img" => "iphone6_gray_crystal_case.png",
											"desctop_mask" => "iphone6-6+.png",
											"desctop_camera" => "iphone6_gray_camera.png",
											"cost"=>1200
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
											"cost"=>1300,
											"default"=>true
									),
									array(	
										//серебристый прозрачный
											"id"=>4,
											"color"=>"#BBBBBB",
											"desctop_img" => "iphone6_silver_whitecrystal_case.png",
											"desctop_mask" => "iphone6-6+.png",
											"desctop_camera" => "iphone6_silver_camera.png",
											"cost"=>1400
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
											"cost"=>1600
										)
									
									)
				),
				array(
					"name" => "Soft Touch",
					"descr_1" => "матовый черный",
					"descr_2" => "Бархатистый, приятный на ощупь чехол.",
					"desctop_mask_2"=>"iphone_6_mask_2.png",
					"lib_img" => "iphone6_black_icon.png",
					"colors"=> array(
									//цвет - вид (hex, rgb, transparent или название цвета)
										array(		
											"id"=>7,
											"color"=>"transparent",
											"desctop_img" => "iphone6_black_softtouch_case.png",
											"desctop_mask" => "iphone6-6+.png", //обрезка
											"desctop_camera" => "iphone6_gray_camera.png",
											"cost"=>1700
										)
									
									)
				)
			),
			
		
		"iphone5s"=>array(
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
											"cost"=>1800,
											"default"=>true
									),
										array(	
											"id"=>9,
											"color"=>"#BBBBBB",
											"desctop_img" => "iphone5s_silver_crystal_case.png",
											"desctop_mask" => "iphone5-5s.png",
											"desctop_camera" => "iphone5s_silver_camera.png",
											"cost"=>1900
										),
										 array(
										 	"id"=>10,
											"color"=>"#888888",
											"desctop_img" => "iphone5s_gray_crystal_case.png",
											"desctop_mask" => "iphone5-5s.png",
											"desctop_camera" => "iphone5s_gray_camera.png",
											"cost"=>2000
										),
									array(		
											"id"=>8,
											"color"=>"#FFFFFF",   
											"desctop_img" => "iphone5_white_crystal_case.png",
											"desctop_mask" => "iphone5-5s.png", //обрезка
											"desctop_camera" => "iphone5_white_camera.png",
											"cost"=>1800,
											"default"=>true
									),
										array(	
											"id"=>9,
											"color"=>"#000000",
											"desctop_img" => "iphone5_black_crystal_case.png",
											"desctop_mask" => "iphone5-5s.png",
											"desctop_camera" => "iphone5_black_camera.png",
											"cost"=>1900
										),
									
								)
				),
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
											"id"=>8,
											"color"=>"#CF9657",   
											"desctop_img" => "iphone5-5s_gold_whitecrystal_case.png",
											"desctop_mask" => "iphone5-5s.png", //обрезка
											"desctop_camera" => "iphone5s_gold_camera.png",
											"cost"=>1800,
											"default"=>true
									),
										array(	
											"id"=>9,
											"color"=>"#BBBBBB",
											"desctop_img" => "iphone5-5s_light_whitecrystal_case.png",
											"desctop_mask" => "iphone5-5s.png",
											"desctop_camera" => "iphone5s_silver_camera.png",
											"cost"=>1900
										),
										 array(
										 	"id"=>10,
											"color"=>"#888888",
											"desctop_img" => "iphone5-5s_dark_whitecrystal_case.png",
											"desctop_mask" => "iphone5-5s.png",
											"desctop_camera" => "iphone5s_gray_camera.png",
											"cost"=>2000
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
											"id"=>11,	
											"color"=>"transparent",
											"desctop_img" => "iphone5-5s_white_softtouch_case.png",
											"desctop_mask" => "iphone5-5s.png", //обрезка
											"desctop_camera" => "iphone5_white_camera.png",
											"cost"=>1450
										)
									)
				),
				array(
					"name" => "Soft Touch",
					"descr_1" => "Матовый черный",
					"descr_2" => "Бархатистый, приятный на ощупь чехол..",
					"lib_img" => "iphone5_5s_black_icon.png",
					"colors"=> array(
									//цвет - вид (hex, rgb, transparent или название цвета)
										array(	
											"id"=>11,	
											"color"=>"transparent",
											"desctop_img" => "iphone5-5s_black_softtouch_case.png",
											"desctop_mask" => "iphone5-5s.png", //обрезка
											"desctop_camera" => "iphone5_black_camera.png",
											"cost"=>1450
										)
									)
				),
			
			),
		"iphone5"=>array(
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
											"cost"=>1800,
											"default"=>true
									),
										array(	
											"id"=>9,
											"color"=>"#BBBBBB",
											"desctop_img" => "iphone5s_silver_crystal_case.png",
											"desctop_mask" => "iphone5-5s.png",
											"desctop_camera" => "iphone5s_silver_camera.png",
											"cost"=>1900
										),
										 array(
										 	"id"=>10,
											"color"=>"#888888",
											"desctop_img" => "iphone5s_gray_crystal_case.png",
											"desctop_mask" => "iphone5-5s.png",
											"desctop_camera" => "iphone5s_gray_camera.png",
											"cost"=>2000
										),
									array(		
											"id"=>8,
											"color"=>"#FFFFFF",   
											"desctop_img" => "iphone5_white_crystal_case.png",
											"desctop_mask" => "iphone5-5s.png", //обрезка
											"desctop_camera" => "iphone5_white_camera.png",
											"cost"=>1800,
											"default"=>true
									),
										array(	
											"id"=>9,
											"color"=>"#000000",
											"desctop_img" => "iphone5_black_crystal_case.png",
											"desctop_mask" => "iphone5-5s.png",
											"desctop_camera" => "iphone5_black_camera.png",
											"cost"=>1900
										),
									
								)
				),
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
											"id"=>8,
											"color"=>"#CF9657",   
											"desctop_img" => "iphone5-5s_gold_whitecrystal_case.png",
											"desctop_mask" => "iphone5-5s.png", //обрезка
											"desctop_camera" => "iphone5s_gold_camera.png",
											"cost"=>1800,
											"default"=>true
									),
										array(	
											"id"=>9,
											"color"=>"#BBBBBB",
											"desctop_img" => "iphone5-5s_light_whitecrystal_case.png",
											"desctop_mask" => "iphone5-5s.png",
											"desctop_camera" => "iphone5s_silver_camera.png",
											"cost"=>1900
										),
										 array(
										 	"id"=>10,
											"color"=>"#888888",
											"desctop_img" => "iphone5-5s_dark_whitecrystal_case.png",
											"desctop_mask" => "iphone5-5s.png",
											"desctop_camera" => "iphone5s_gray_camera.png",
											"cost"=>2000
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
											"id"=>11,	
											"color"=>"transparent",
											"desctop_img" => "iphone5-5s_white_softtouch_case.png",
											"desctop_mask" => "iphone5-5s.png", //обрезка
											"desctop_camera" => "iphone5_white_camera.png",
											"cost"=>1450
										)
									)
				),
				array(
					"name" => "Soft Touch",
					"descr_1" => "Матовый черный",
					"descr_2" => "Бархатистый, приятный на ощупь чехол..",
					"lib_img" => "iphone5_5s_black_icon.png",
					"colors"=> array(
									//цвет - вид (hex, rgb, transparent или название цвета)
										array(	
											"id"=>11,	
											"color"=>"transparent",
											"desctop_img" => "iphone5-5s_white_softtouch_case.png",
											"desctop_mask" => "iphone5-5s.png", //обрезка
											"desctop_camera" => "iphone5_black_camera.png",
											"cost"=>1450
										)
									)
				),
			
			),
		"iphone5c"=>array(
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
											"cost"=>1800,
											"default"=>true
									),
										array(	
											"id"=>9,
											"color"=>"#00FF00",   
											"desctop_img" => "iphone5c_green_crystal_case.png",
											"desctop_mask" => "iphone5c.png", //обрезка
											"desctop_camera" => "iphone5c_green_camera.png",
											"cost"=>1800,
											"default"=>true
										),
										 array(
										 	"id"=>10,
											"color"=>"#FF0011",
											"desctop_img" => "iphone5c_red_crystal_case.png",
											"desctop_mask" => "iphone5c.png", //обрезка
											"desctop_camera" => "iphone5c_red_camera.png",
											"cost"=>2000
										),
									array(		
											"id"=>8,
											"color"=>"yellow",   
											"desctop_img" => "iphone5c_yellow_crystal_case.png",
											"desctop_mask" => "iphone5c.png", //обрезка
											"desctop_camera" => "iphone5c_yellow_camera.png",
											"cost"=>1800,
											"default"=>true
									),
										array(	
											"id"=>9,
											"color"=>"#FFFFFF",
											"desctop_img" => "iphone5c_white_crystal_case.png",
											"desctop_mask" => "iphone5c.png", //обрезка
											"desctop_camera" => "iphone5c_white_camera.png",
											"cost"=>1900
										),
									
								)
				),
				/* матовый полупрозрачный*/
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
											"cost"=>1800,
											"default"=>true
									),
										array(	
											"id"=>9,
											"color"=>"#00FF00",   
											"desctop_img" => "iphone5c_green_whitecrystal_case.png",
											"desctop_mask" => "iphone5c.png", //обрезка
											"desctop_camera" => "iphone5c_green_camera.png",
											"cost"=>1800,
											"default"=>true
										),
										 array(
										 	"id"=>10,
											"color"=>"#FF0011",
											"desctop_img" => "iphone5c_red_whitecrystal_case.png",
											"desctop_mask" => "iphone5c.png", //обрезка
											"desctop_camera" => "iphone5c_red_camera.png",
											"cost"=>2000
										),
									array(		
											"id"=>8,
											"color"=>"yellow",   
											"desctop_img" => "iphone5c_yellow_whitecrystal_case.png",
											"desctop_mask" => "iphone5c.png", //обрезка
											"desctop_camera" => "iphone5c_yellow_camera.png",
											"cost"=>1800,
											"default"=>true
									),
										array(	
											"id"=>9,
											"color"=>"#FFFFFF",
											"desctop_img" => "iphone5c_white_crystal_case.png",
											"desctop_mask" => "iphone5c.png", //обрезка
											"desctop_camera" => "iphone5c_white_camera.png",
											"cost"=>1900
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
											"cost"=>1450
										)
									)
				),
				array(
					"name" => "Soft Touch",
					"descr_1" => "Матовый черный",
					"descr_2" => "Бархатистый, приятный на ощупь чехол..",
					"lib_img" => "iphone5c_black_icon.png",
					"colors"=> array(
									//цвет - вид (hex, rgb, transparent или название цвета)
										array(	
											"id"=>11,	
											"color"=>"transparent",
											"desctop_img" => "iphone5c_black_softtouch_case.png",
											"desctop_mask" => "iphone5c.png", //обрезка
											"desctop_camera" => "iphone5c_white_camera.png",
											"cost"=>1450
										)
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
								"cost"=>1800,
								"default"=>true
							),
							array(	
								"id"=>9,
								"color"=>"#000000",
								"desctop_img" => "iphone4s_black_crystal_case.png",
								"desctop_mask" => "iphone4-4s.png", //обрезка
								"desctop_camera" => "iphone4s_black_camera.png",
								"cost"=>1900
							)
						)
					),
				/* матовый полупрозрачный*/
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
								"cost"=>1800,
								"default"=>true
							),
							array(	
								"id"=>9,
								"color"=>"#000000",
								"desctop_img" => "iphone4-4s_black_whitecrystal_case.png",
								"desctop_mask" => "iphone4-4s.png", //обрезка
								"desctop_camera" => "iphone4s_black_camera.png",
								"cost"=>1900
							)
						)
					),
				array(
					"name" => "Soft Touch",
					"descr_1" => "Матовый белый",
					"descr_2" => "Бархатистый, приятный на ощупь чехол. Аккуратно! Сильно пачкается.",
					"lib_img" => "iphone4_4s_white_icon.png",
					"colors"=> array(
						//цвет - вид (hex, rgb, transparent или название цвета)
							array(	
								"id"=>11,	
								"color"=>"transparent",
								"desctop_img" => "iphone4-4s_white_softtouch_case.png",
								"desctop_mask" => "iphone4-4s.png", //обрезка
								"desctop_camera" => "iphone4s_white_camera.png",
								"cost"=>1450
							)
						)
				),
				array(
					"name" => "Soft Touch",
					"descr_1" => "Матовый черный",
					"descr_2" => "Бархатистый, приятный на ощупь чехол..",
					"lib_img" => "iphone4_4s_black_icon.png",
					"colors"=> array(
						//цвет - вид (hex, rgb, transparent или название цвета)
							array(	
								"id"=>11,	
								"color"=>"transparent",
								"desctop_img" => "iphone4-4s_black_softtouch_case.png",
								"desctop_mask" => "iphone4-4s.png", //обрезка
								"desctop_camera" => "iphone4s_black_camera.png",
								"cost"=>1450
							)
						)
				),
			),
		"iphone4"=>array(
				/* прозрачный */
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
								"cost"=>1800,
								"default"=>true
							),
							array(	
								"id"=>9,
								"color"=>"#000000",
								"desctop_img" => "iphone4_black_crystal_case.png",
								"desctop_mask" => "iphone4-4s.png", //обрезка
								"desctop_camera" => "iphone4s_black_camera.png",
								"cost"=>1900
							)
						)
					),
				/* матовый полупрозрачный*/
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
								"cost"=>1800,
								"default"=>true
							),
							array(	
								"id"=>9,
								"color"=>"#000000",
								"desctop_img" => "iphone4-4s_black_whitecrystal_case.png",
								"desctop_mask" => "iphone4-4s.png", //обрезка
								"desctop_camera" => "iphone4s_black_camera.png",
								"cost"=>1900
							)
						)
					),
				array(
					"name" => "Soft Touch",
					"descr_1" => "Матовый белый",
					"descr_2" => "Бархатистый, приятный на ощупь чехол. Аккуратно! Сильно пачкается.",
					"lib_img" => "iphone4_4s_white_icon.png",
					"colors"=> array(
						//цвет - вид (hex, rgb, transparent или название цвета)
							array(	
								"id"=>11,	
								"color"=>"transparent",
								"desctop_img" => "iphone4-4s_white_softtouch_case.png",
								"desctop_mask" => "iphone4-4s.png", //обрезка
								"desctop_camera" => "iphone4s_white_camera.png",
								"cost"=>1450
							)
						)
				),
				array(
					"name" => "Soft Touch",
					"descr_1" => "Матовый черный",
					"descr_2" => "Бархатистый, приятный на ощупь чехол..",
					"lib_img" => "iphone4_4s_black_icon.png",
					"colors"=> array(
						//цвет - вид (hex, rgb, transparent или название цвета)
							array(	
								"id"=>11,	
								"color"=>"transparent",
								"desctop_img" => "iphone4-4s_black_softtouch_case.png",
								"desctop_mask" => "iphone4-4s.png", //обрезка
								"desctop_camera" => "iphone4s_black_camera.png",
								"cost"=>1450
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
				array(
						"name" => "Helvetica NeueCyr Medium",
						"filename" => "HelveticaNeueCyr_Medium.otf"
					),
				array(
						"name" => "Helvetica NeueCyr Roman",
						"filename" => "HelveticaNeueCyr-Roman.otf"
					),
				array(
						"name" => "League Gothic Condensed Italic",
						"filename" =>"LeagueGothic-CondensedItalic.otf"
					),
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
		),
		
		"backgrounds" => array(
			array(
				"link"=>"1/",
				"name"=>"категория 1",
				array( 
					array(
						"big"=>"2.png",
						"small"=>"2_r82.png"
					),
					array(
						"big"=>"3.png",
						"small"=>"3_r82.png"
					),
					array(
						"big"=>"4.png",
						"small"=>"4_r82.png"
					),
					
					array(
						"big"=>"5.png",
						"small"=>"5_r82.png"
					),
					array(
						"big"=>"6.png",
						"small"=>"6_r82.png"
					),
					array(
						"big"=>"7.png",
						"small"=>"7_r82.png"
					),
					array(
						"big"=>"8.png",
						"small"=>"8_r82.png"
					),
					array(
						"big"=>"9.png",
						"small"=>"9_r82.png"
					),
					array(
						"big"=>"10.png",
						"small"=>"10_r82.png"
					),
					array(
						"big"=>"11.png",
						"small"=>"11_r82.png"
					),
					array(
						"big"=>"12.png",
						"small"=>"12_r82.png"
					),
					
					array(
						"big"=>"13.png",
						"small"=>"13_r82.png"
					),
					array(
						"big"=>"14.png",
						"small"=>"14_r82.png"
					),
					array(
						"big"=>"15.png",
						"small"=>"15_r82.png"
					),
					array(
						"big"=>"16.png",
						"small"=>"16_r82.png"
					),
					array(
						"big"=>"17.png",
						"small"=>"17_r82.png"
					)
				)
			),
			array(
				"link"=>"2/",
				"name"=>"категория 2",
				array( 
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
				)
			),
			array(
				"link"=>"3/",
				"name"=>"категория 3",
				array( 
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
				)
			),
			array(
				"link"=>"4/",
				"name"=>"категория 4",
				array( 
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
				)
			),
			array(
				"link"=>"5/",
				"name"=>"категория 5",
				array( 
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
				)
			)
		),
		"paterns"=> array(
			array(
				"big"=>"1.png",
				"small"=>"r63_1.png"
				),
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
		),
		"smiles"=>array(
/*
*/
			array(
				"link"=>"1/",
				"name"=>"emoji",
				"images"=>array(
					array(
						"big"=>"nature-2_large.png",
						"small"=>"nature-2_large.png"
					),
					array(
						"big"=>"nature-0002_large.png",
						"small"=>"nature-0002_large.png"
					),
					array(
						"big"=>"nature-0003_large.png",
						"small"=>"nature-0003_large.png"
					),
					array(
						"big"=>"nature-0004_large.png",
						"small"=>"nature-0004_large.png"
					),
					array(
						"big"=>"nature-0006_large.png",
						"small"=>"nature-0006_large.png"
					),
					array(
						"big"=>"nature-0006_large_11.png",
						"small"=>"nature-0006_large_11.png"
					),
					array(
						"big"=>"nature-9_large.png",
						"small"=>"nature-9_large.png"
					),
					array(
						"big"=>"nature-0009_large.png",
						"small"=>"nature-0009_large.png"
					),
					array(
						"big"=>"nature-0010_large.png",
						"small"=>"nature-0010_large.png"
					),
					array(
						"big"=>"nature-0011_large.png",
						"small"=>"nature-0011_large.png"
					),
					array(
						"big"=>"nature-0015_large_1.png",
						"small"=>"nature-0015_large_1.png"
					),
					
				)
			),
			array(
				"link"=>"2/",
				"name"=>"иконки",
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
					array(
						"big"=>"smile1.png",
						"small"=>"smile1.png"
					),
					array(
						"big"=>"smile1.png",
						"small"=>"smile1.png"
					)
					
				)
			),
			array(
				"link"=>"3/",
				"name"=>"пиктограммы",
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
					array(
						"big"=>"smile1.png",
						"small"=>"smile1.png"
					)
				)
			),
		)
);
?>