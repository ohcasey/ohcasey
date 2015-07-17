<?php
global $config;
function styles_setup($config){

    $path = $config["desctop_font_path"];
    $count = count($config["fonts"]);
    for ($i=0; $i<$count; $i++) {

        if (file_exists($path.$config["fonts"][$i]["filename"]) ){
                $text = "@font-face { font-family: '".$config["fonts"][$i]["name"]."';";
                $text.=" src: url(";
                $text.=base64DataUri($path.$config["fonts"][$i]["filename"]);
                $text.=");";
                $text.="}";
                echo $text;
        }    
    }
}


function get_cost_case($id_case, $config, $id_phone) {
    $cost = 0;
    $count = count($config["materials"][$id_phone]); 
    for ($i=0; $i<$count; $i++) {
        $colors_var = $config["materials"][$id_phone][$i]["colors"];
        $count2 = count( $colors_var); 
       
        for ($j=0; $j<$count2; $j++) {
            if ($colors_var[$j]["id"]==$id_case) {
                $cost = $colors_var[$j]["cost"];
                break 2;
            }
        }

    }

    return $cost;
}


function get_config($config){
    $result =  json_encode($config, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP );
    echo $result;
}

function add_to_cart() {
    if(isset($_POST['desctop'])) {

        print_r($_POST['desctop']);
        $array =  json_decode($_POST['desctop'], true);

        if (isset($_SESSION['items'])) {
            array_push($_SESSION['items'], $array);
        } else {
            $_SESSION['items'] = array($array);
        }
        
    }else{
        echo $data['errors'] = "Произошла ошибка, попробуйте еще раз";
    }  
}

function remove_item() {
    if ((isset($_POST['item'])) && (isset($_SESSION['items']))) { 
        $k =  (int) $_POST['item'];
        

        unset($_SESSION['items'][$k]); 
   

       print_r($_SESSION['items']);
    }else{
        echo $data['errors'] = "Элемента не существует";
    }
}


function save_img(){
    $dir = "uploaded_png";
    if(isset($_POST['image'])) {
        $image = $_POST['image'];
        $image = str_replace('data:image/png;base64,', '', $image);

        $year = date('Y');
        $month =date('m');
        $day = date('d');

        $data = array();

        if (is_dir($dir)) {

        }else{
            mkdir($dir);
        }


        $dir.="/".$year;

        if (is_dir($dir)) {

        }else{
            mkdir($dir);
        }


        $dir.="/".$month;

        if (is_dir($dir)) {
        
        }else{
            mkdir($dir);
        }

        $dir.="/".$day;
    
        if (is_dir($dir)) {
        
        }else{
            mkdir($dir);
        }

        $id = generatePassword();

        file_put_contents($dir.'/'.$id.'.png', base64_decode($image));

        echo $dir.'/'.$id.'.png';

        
    }else{
        echo $data['errors'] = "Произошла ошибка, попробуйте еще раз";
    }
}

   



function base64DataUri($sFile)
{                   
    // Switch to right MIME-type
    $sExt = strtolower(substr(strrchr($sFile, '.'), 1));
     
    switch($sExt)
    {
        case 'gif':
        case 'jpg':
        case 'png':
            $sMimeType = 'image/'. $sExt;
        break;
        
        case 'ico':
            $sMimeType = 'image/x-icon';
        break;
        
        case 'eot':
            $sMimeType = 'application/vnd.ms-fontobject';
        break;
        case 'ttf': 
             $sMimeType = 'application/font-ttf';
        
        break;
        case 'otf':
            $sMimeType='font/opentype';
        break;
        case 'woff':
            $sMimeType = 'application/font-woff';
        break;
        
        default:
            exit('Invalid extension file!');
    }

    $sBase64 = base64_encode(file_get_contents($sFile));
    return "data:".$sMimeType.";charset=utf-8;base64,".$sBase64;
}

function generatePassword($length = 24){
          $chars = 'abdefhiknrstyzABDEFGHKNQRSTYZ23456789';
          $numChars = strlen($chars);
          $string = '';
          for ($i = 0; $i < $length; $i++) {
            $string .= substr($chars, rand(1, $numChars) - 1, 1);
          }
          return $string;
}


?>