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
        "mail_ru" => 2,  //самовывоз
    ),
    //Конфигурации
    "default_text"=>"Введите текст",
    "devices_desctop_path"=>"",
    "devices_library_path"=>"",
    "patterns_path_big"=>"img/patterns/big/",
    "patterns_path_small"=>"img/patterns/small/",
    "desctop_font_size"=>"25",
    "default_font_color"=>"black",
    "desctop_font_path"=>"fonts/",
    "desctop_bg_path"=>'',
    "smiles_path"=>'',
    "desctop_material_path"=>'',
    "chech_material_path" =>'',
    "material_mask_path"=>""	,
    "material_mask_camera"=>"",
    "inspire_path"=>"",
    //Картинки inspire

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

);

/*
echo "<pre>";
print_r($config["materials"]);
echo "</pre>";
*/
$args = array( 'posts_per_page' => 20, 'offset'=> 0, 'category' => 15 );
$myposts = get_posts($args);
foreach ($myposts as $k=>$post) {
    unset($inspire_pic);
    unset($inspire_sort);
    unset($inspire_pic_src);
    $inspire_pic = get_post_meta($post->ID, "inspire_pic", true);
    $inspire_sort = get_post_meta($post->ID, "inspire_sort", true);
    $inspire_pic_src = wp_get_attachment_image_src($inspire_pic,'full');

    $arrInspire[$inspire_sort."_".$k]["NAME"] = $post->post_title;
    $arrInspire[$inspire_sort."_".$k]["PIC"] = $inspire_pic_src[0];
}
wp_reset_postdata();
ksort($arrInspire);
//Картинки inspire
foreach ($arrInspire as $item) {
    $config["inspire"][$item["NAME"]] = $item["PIC"];
}

//Иконки
$field_label = get_field_label("категории_иконок");
$args = array('posts_per_page' => 20000, 'offset'=> 0, 'category' => 8);
$myposts = get_posts($args);

foreach ($myposts as $k=>$post) {
    $post_meta = get_post_custom($post->ID);
    $icons_small_image_src = wp_get_attachment_image_src($post_meta["icons_small_image"][0],'full');
    $icons_icon_src = wp_get_attachment_image_src($post_meta["icons_icon"][0],'full');

    $arrIcons[$post_meta["icons_category"][0]][$post_meta["icons_sort"][0]."_".$k]["NAME"] = $field_label[$post_meta["icons_category"][0]];
    $arrIcons[$post_meta["icons_category"][0]][$post_meta["icons_sort"][0]."_".$k]["SMALL"] = $icons_small_image_src;
    $arrIcons[$post_meta["icons_category"][0]][$post_meta["icons_sort"][0]."_".$k]["ICON"] = $icons_icon_src;
}
wp_reset_postdata();

foreach($field_label as $k=>$v) {
    unset($imgs);
    $to_sort = $arrIcons[$k];
    ksort($to_sort);
    foreach ($to_sort as $item) {
        $imgs[] = array("big"=>$item["ICON"][0],"small"=>$item["SMALL"][0]);
    }

    $arPreIcons[] = array(
        "link" => "",
        "name" => $v,
        "images" => $imgs
    );
}
$config["smiles"] = $arPreIcons;

//Цвета текста
$args = array( 'posts_per_page' => 20000, 'offset'=> 0, 'category' => 12 );
$myposts = get_posts($args);
foreach ($myposts as $post) {
    if ($post->post_title=='transparent')
        $arColors[] = array('transparent');
    else
        $arColors[] = array('#'.$post->post_title);
}
wp_reset_postdata();
$config["colors"] = $arColors;

//Шрифты текста
$args = array( 'posts_per_page' => 20000, 'offset'=> 0, 'category' => 11 );
$myposts = get_posts($args);
foreach ($myposts as $k=>$post) {
    $post_meta = get_post_custom($post->ID);

    $arFonts[$post_meta["font_sort"][0]."_".$k] = array(
        "name" => $post->post_title,
        "filename" => $post_meta["font_file_name"][0],
        "font_default" => $post_meta["font_default"][0]
    );
}
wp_reset_postdata();
ksort($arFonts);
foreach ($arFonts as $font) {
    $arFontsFinal[] = $font;
}
$config["fonts"] = $arFontsFinal;



//Фоны
$field_label = get_field_label_short("field_561f6c37ef443");
$args = array( 'posts_per_page' => 20000, 'offset'=> 0, 'category' => 9 );
$myposts = get_posts($args);
foreach ($myposts as $k=>$post) {

    $post_meta = get_post_custom($post->ID);
    $fon_small_image_src = wp_get_attachment_image_src($post_meta["fon_small_image"][0],'full');
    $fon_big_src = wp_get_attachment_image_src($post_meta["fon_fon"][0],'full');

    $arrPreFon[$post_meta["fon_category"][0]][$post_meta["fon_sort"][0]."_".$k]["NAME"] = $field_label[$post_meta["fon_category"][0]];
    $arrPreFon[$post_meta["fon_category"][0]][$post_meta["fon_sort"][0]."_".$k]["SMALL"] = $fon_small_image_src;
    $arrPreFon[$post_meta["fon_category"][0]][$post_meta["fon_sort"][0]."_".$k]["BIG"] = $fon_big_src;
    $arrPreFon[$post_meta["fon_category"][0]][$post_meta["fon_sort"][0]."_".$k]["CHECHS"] = $post_meta["fon_checks"][0];

}
wp_reset_postdata();


foreach($field_label as $k=>$v) {
    unset($fons);
    $to_sort = $arrPreFon[$k];
    ksort($to_sort);
    foreach ($to_sort as $item) {
        $fons[] = array(
            "big"=>$item["BIG"][0],
            "small"=>$item["SMALL"][0],
            "chechs"=>explode(",",$item["CHECHS"])
        );
    }

    $arrFon[] = array(
        "link" => "",
        "name" => $v,
        "0" => $fons
    );
}
$config["backgrounds"] = $arrFon;



//Девайсы
$args = array( 'posts_per_page' => 20000, 'offset'=> 0, 'category' => 14 );
$myposts = get_posts($args);
foreach ($myposts as $k=>$post) {
    $post_meta = get_post_custom($post->ID);

    $device_small_image_src = wp_get_attachment_image_src($post_meta["devices_small_image"][0],'full');
    $device_big_src = wp_get_attachment_image_src($post_meta["devices_big_image"][0],'full');

    $arDevices[$post_meta["devices_sort"][0]."_".$k] = array(
        "id" => $post_meta["devices_id"][0],
        "name" => $post->post_title,
        "lib_img" => $device_small_image_src[0],
        "desctop_img" => $device_big_src[0],
        "width" => $post_meta["devices_width"][0],
        "height" => $post_meta["devices_height"][0],
    );
    if ($post_meta["devices_default"][0]) $arDevices[$post_meta["devices_sort"][0]."_".$k]["default"] = $post_meta["devices_default"][0];

}
wp_reset_postdata();
ksort($arDevices);
foreach ($arDevices as $device) {
    $arDevicesFinal[] = $device;
}
$config["devices"] = $arDevicesFinal;


$args = array( 'posts_per_page' => 20000, 'offset'=> 0, 'category' => 14 );
$myposts = get_posts($args);
foreach ($myposts as $X3=>$post) {
    unset($deviceId);
    unset($arPreDevices);

    $post_meta = get_post_custom($post->ID);
    $deviceId = $post_meta["devices_id"][0];
    $ARdeviceSort[$post_meta["devices_sort"][0]."_".$X3] = $deviceId;

    $args2 = array( 'posts_per_page' => 20000, "post_type"=>"product", 'offset'=> 0, 'meta_query' => array(array('key' => 'good_phone','value' => $post->ID)));
    $myProducts = get_posts($args2);
    foreach ($myProducts as $X=>$product) {
        $product_meta = get_post_custom($product->ID);

        $good_pic_image_src = wp_get_attachment_image_src($product_meta["good_pic"][0],'full');
        $good_mask_src = wp_get_attachment_image_src($product_meta["good_mask"][0],'full');
        $price = $product_meta["_price"][0];

        unset($colors);
        unset($arClrs);

        $z=0;
        $args3 = array( 'posts_per_page' => 20000, 'offset'=> 0, 'category' => 13, 'meta_query' => array(array('key' => 'casey_case','value' => $product->ID))  );
        $myColors = get_posts($args3);
        foreach ($myColors as $X2=>$color) {
            $color_meta = get_post_custom($color->ID);

            $casey_image_image_src = wp_get_attachment_image_src($color_meta["casey_image"][0],'full');
            $casey_mask_src = wp_get_attachment_image_src($color_meta["casey_mask"][0],'full');
            $casey_camera_image_src = wp_get_attachment_image_src($color_meta["casey_camera"][0],'full');

            $colors[$color_meta["casey_sort"][0]."_".$X2] = array(
                                    "id" => $z,
                                    "desctop_img" => $casey_image_image_src[0],
                                    "desctop_mask" => $casey_mask_src[0],
                                    "desctop_camera" => $casey_camera_image_src[0],
                                    "cost" => $price,
            );
            if ($color_meta["casey_default"][0]) $colors[$color_meta["casey_sort"][0]."_".$X2]["default"] = $color_meta["casey_default"][0];

            if ($color_meta["casey_color"][0]=='transparent')
                $colors[$color_meta["casey_sort"][0]."_".$X2]["color"] = 'transparent';
            else
                $colors[$color_meta["casey_sort"][0]."_".$X2]["color"] = '#'.$color_meta["casey_color"][0];

            $z++;
        }

        ksort($colors);
        foreach ($colors as $clrs) {
            $arClrs[] = $clrs;
        }


        $arPreDevices[$product_meta["good_sort"][0]."_".$X] = array(
            "name" => $product->post_title,
            "descr_1" => $product->post_content,
            "desctop_mask_2" => $good_mask_src[0],
            "descr_2" => $product_meta["good_descr"][0],
            "lib_img" => $good_pic_image_src[0],
            "colors" => $arClrs,
        );
        if ($product_meta["good_default"][0]) $arPreDevices[$product_meta["good_sort"][0]."_".$X]["default"] = $product_meta["good_default"][0];

        ksort($arPreDevices);
        unset($arPreDevs);
        foreach ($arPreDevices as $arPreDev) {
            $arPreDevs[] = $arPreDev;
        }
        $arDevice[$deviceId] = $arPreDevs;

    }
}

ksort($ARdeviceSort);
foreach ($ARdeviceSort as $dev) {
    $arDeviceFinal[$dev] = $arDevice[$dev];
}
$config["materials"] = $arDeviceFinal;

/*
echo "<pre>";
print_r($config["devices"]);
echo "</pre>";
*/
?>








