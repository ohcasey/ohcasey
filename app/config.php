<?php



//страницы
global $pages; 
$pages= array("main","cart");


global $subfunctions;

$subfunctions= array("main" =>array("get_data", "save_img", "add_to_cart"), "cart" =>array("remove_item"));

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
			"default_text"=>"Текст",
			"devices_desctop_path"=>"img/devices/desctop/",
			"devices_library_path"=>"img/devices/library/",
			"patterns_path_big"=>"img/patterns/big/",
			"patterns_path_small"=>"img/patterns/small/",
			"desctop_font_size"=>"50",
			"default_font_color"=>"black",
			"desctop_font_path"=>"fonts/",
			"desctop_bg_path"=>'img/backgrounds/',
			"smiles_path"=>'img/smiles/',
			"desctop_material_path"=>'img/materials/library/',
			"chech_material_path" =>'img/materials/chech/',
			"material_mask_path"=>"img/materials/mask/"	,
			"material_mask_camera"=>"img/materials/camera/",
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
			//Для остальных width и height не было, пока поставил 0
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
			array(			 
						"id"=>"galaxyS6",
						"name" => "Galaxy S6",
						 "lib_img" => "device-9.png",
						 "desctop_img" => "device-1.png",
						 "width"=>0,
						 "height"=>0
				),
			array(
						"id"=>"galaxyS5",		
						"name" => "Galaxy S5",
						"lib_img" => "device-8.png",
						"desctop_img" => "device-1.png",
						"width"=>0,
						"height"=>0
        		),
  			array(
						 "id"=>"galaxyS4",
						 "name" => "Galaxy S4",
						 "lib_img" => "device-9.png",
						 "desctop_img" => "device-1.png",
						 "width"=>0,
						 "height"=>0
				),
			array(
						 "id"=>"galaxyS3",
						 "name" => "Galaxy S3",
						 "lib_img" => "device-9.png",
						 "desctop_img" => "device-1.png",
						 "width"=>0,
						 "height"=>0
			),
			array(
						 "id"=>"galaxyS2",
						 "name" => "Galaxy S2",
						 "lib_img" => "device-9.png",
						 "desctop_img" => "device-1.png",
						 "width"=>0,
						 "height"=>0
				),
			array(
						 "id"=>"galaxyS",
						 "name" => "Galaxy S",
						 "lib_img" => "device-9.png",
						 "desctop_img" => "devi.style();ce-1.png",
						 "width"=>0,
						 "height"=>0
				),
		
		),
		/*Материалы*/
		"materials" => array(
			//id device
			"iphone6"=>array(

				array(
					"name" => "Crystal clear",
					"descr_1" => "Прозрачный",
					"descr_2" => "Полностью прозрачный",
					"lib_img" => "iphone6_transparent_plastic_icon.png",
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
					"name" => "White clear",
					"descr_1" => "Матовый",
					"descr_2" => "Полупрозрачный чехол",
					"lib_img" => "iphone6_transparent_plastic_icon.png",
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
					"lib_img" => "iphone6_ST__0001s_0000s_0001_white.png",
					"colors"=> array(
									//цвет - вид (hex, rgb, transparent или название цвета)
										array(		
											"id"=>6,
											"color"=>"transparent",
											"desctop_img" => "iphone6_ST__0001s_0000s_0001_white.png",
											"desctop_mask" => "white_mask.png", //обрезка
											"desctop_camera" => "camera.png",
											"cost"=>1600
										)
									
									)
				),
				array(
					"name" => "Soft Touch",
					"descr_1" => "матовый черный",
					"descr_2" => "Бархатистый, приятный на ощупь чехол.",
					"lib_img" => "iphone6_ST_0001s_0000s_0002_black.png",
					"colors"=> array(
									//цвет - вид (hex, rgb, transparent или название цвета)
										array(		
											"id"=>7,
											"color"=>"transparent",
											"desctop_img" => "iphone6_ST_0001s_0000s_0002_black.png",
											"desctop_mask" => "white_mask.png", //обрезка
											"desctop_camera" => "camera.png",
											"cost"=>1700
										)
									
									)
				)
			),
			
			"iphone6plus"=>array(
				array(
					"name" => "Soft Touch",
					"descr_1" => "Прозрачный",
					"descr_2" => "Полностью прозрачный",
					"lib_img" => "iphone6_0003s_0002_gold.png",
					"default"=>true,
					"colors"=> array(
									array(		
											"id"=>8,
											"color"=>"#00FFFF",
											"desctop_img" => "iphone6_0003s_0002_gold.png",
											"desctop_mask" => "white_mask.png", //обрезка
											"desctop_camera" => "camera.png",
											"cost"=>1800,
											"default"=>true
									),
										array(	
											"id"=>9,
											"color"=>"#0000ff",
											"desctop_img" => "iphone6_0003s_0001_silver.png",
											"desctop_mask" => "white_mask.png",
											"desctop_camera" => "camera.png",
											"cost"=>1900
										),
										 array(
										 	"id"=>10,
											"color"=>"red",
											"desctop_img" => "iphone5_0002s_0002s_0000_black.png",
											"desctop_mask" => "white_mask.png",
											"desctop_camera" => "camera.png",
											"cost"=>2000
										)
								)
				),
				array(
					"name" => "Soft Touch",
					"descr_1" => "матовый белый",
					"descr_2" => "Бархатистый, приятный на ощупь чехол. Аккуратно! Сильно пачкается.",
					"lib_img" => "iphone6_ST__0001s_0000s_0001_white.png",
					"colors"=> array(
									//цвет - вид (hex, rgb, transparent или название цвета)
										array(	
											"id"=>11,	
											"color"=>"transparent",
											"desctop_img" => "material-1.png",
											"desctop_mask" => "white_mask.png", //обрезка
											"desctop_camera" => "camera.png",
											"cost"=>1450
										)
									)
				),
				array(
					"name" => "Soft Touch",
					"descr_1" => "матовый черный",
					"descr_2" => "Бархатистый, приятный на ощупь чехол.",
					"lib_img" => "iphone6_ST_0001s_0000s_0002_black.png",
					"colors"=> array(
					)
				)
			)
			
		),
		//Цвета текста
		"colors" => array(
			array("#cccccc"),
			array("#444444"),
			array("#cccccc"),
			array("#cccccc"),
			array("#cccccc"),
			array("#cccccc"),		
			array("#cccccc"),		
			array("#cccccc"),	
			array("#cccccc"),		
			array("#cccccc"),		
			array("#cccccc"),		
			array("#cccccc"),		
			array("#cccccc"),
			array("#cccccc"),
			array("#cccccc"),
			array("#cccccc"),		
			array("#cccccc"),		
			array("#cccccc"),	
			array("#cccccc"),		
			array("#cccccc"),		
			array("#cccccc"),		
			array("#cccccc"),				
			array("#cccccc"),
			array("#cccccc"),
			array("#cccccc"),
			array("#cccccc"),		
			array("#cccccc"),		
			array("#cccccc"),	
			array("#cccccc"),		
			array("#cccccc"),		
			array("#cccccc"),		
			array("#cccccc"),					
			array("#cccccc"),
			array("#cccccc"),
			array("#cccccc"),
			array("#cccccc"),		
			array("#cccccc"),		
			array("#cccccc"),	
			array("#cccccc"),		
			array("#cccccc"),		
			array("#cccccc"),		
			array("#cccccc")				
		),
		"fonts"=> array(
			/*Только в */
				array(
						"name" => "Waltograph",
						"filename" => "Waltograph.ttf"
					),
				array(
						"name" => "snappy dna",
						"filename" => "snappy_dna.ttf",
						"default"=>true
					),

				array(
						"name" => "SimplyGlamorous",
						"filename" => "SimplyGlamorous.ttf"
					),

				array(
						"name" => "Remachine Script",
						"filename" => "Remachine_Script_Personal_Use.otf"
					),

				array(
						"name" => "Mustang",
						"filename" => "Mustang.otf"
					),

				array(
						"name" => "LeagueGothic-CondensedRegular",
						"filename" =>"LeagueGothic-CondensedRegular.otf"
					),

				array(
						"name" => "Jellyka - Love and Passion",
						"filename" =>"Jellyka_Love_and_Passion.ttf"
					),

				array(
						"name" => "Feathergraphy Decoration",
						"filename" => "Feathergraphy_Decoration.ttf"
					),

				 array(
						"name" => "Bira",
						"filename" => "Bira_PERSONAL_USE_ONLY.ttf"
					), 

				array(
						"name" => "AngillaTattoo",
						"filename" => "AngillaTattoo_PERSONAL_USE_ONLY.ttf"
					),

				 array(
						"name" => "AGLettericaExtraCompressed Roman",
						"filename" => "AGLettericaExtraCompressed Roman.ttf"
					)
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
			array(
				"link"=>"1/",
				"name"=>"emoji",
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