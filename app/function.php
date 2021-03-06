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

function get_cost_sdec($idcity, $kur) {
    $couter = 0;
    $dates = 1;
    while ($couter<3) {
        $date = date("Y-m-d", time() + 86400*$dates);
        if (BankDay::isWorkDay($date)) {
            $couter++;
        }
         $dates++;
    }

    date_default_timezone_set("UTC");
  
    if ($kur=="none") {
        $tarif = "136";
    }else{
        $tarif = "137";
    }


     $json_string = '
    {
        "version":"1.0",
        "dateExecute":"'.$date.'",
        "authLogin":"70706c7a6fdf9cdb2b4208348cbee331",
        "secure":"'.md5($date.'&'."47d9f60e3b8827fbe28b1babc54ecdce").'",
        "senderCityId":"44",
        "receiverCityId":"'.$idcity.'",
        "tariffId":"'.$tarif.'",
        "goods": 
        [
        {
        "weight":"0.1",
        "length":"20",
        "width":"10",
        "height":"1" 
        }
        ]
        }


    ';

   
    if( $ch = curl_init() ) {
        curl_setopt($ch, CURLOPT_URL, "http://api.edostavka.ru/calculator/calculate_price_by_json.php");  

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json_string);
      
        
        $output = curl_exec($ch); 

        $outputarray = json_decode($output,TRUE);

        curl_close($ch);  
        
        if(isset($outputarray["error"])){
            $result = array(
                "error" => true
            );
        }
        else{
        
            $result = array(
                "price" => $outputarray["result"]["price"],
                "deliveryDateMin"=> $outputarray["result"]["deliveryDateMin"],
                "deliveryDateMax"=> $outputarray["result"]["deliveryDateMax"],
                "idreceiver"=>$idcity
            );
        }

        $result =  json_encode($result, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP );
        $result = preg_replace_callback(
            '/\\\\u([0-9a-f]{4})/i',
            function ($matches) {
                $sym = mb_convert_encoding(
                    pack('H*', $matches[1]),
                    'UTF-8',
                    'UTF-16'
                );
                return $sym;
            },
            $result
        );
        
        echo $result;
    }
    else {
        echo "curl не доступен";
    }
}

function get_city_sdec() {

    

    if (isset($_POST["idcity"])) {
            $idcity = $_POST["idcity"];
    }else {
        $idcity = 44;
    }

    if( $ch = curl_init() ) {
        curl_setopt($ch, CURLOPT_URL, "http://gw.edostavka.ru:11443/pvzlist.php?cityid=".$idcity);  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);  
        curl_setopt($ch, CURLOPT_HEADER, 0);  
        $output = curl_exec($ch); 

        //echo $output;

        curl_close($ch);  

        $xml = simplexml_load_string($output, "SimpleXMLElement", LIBXML_NOCDATA);
        $json = json_encode($xml);
        $array = json_decode($json,TRUE);

       if(isset($array["Pvz"]) and !is_null($array["Pvz"])){
            $normalarray = $array["Pvz"];
        
            $result =  json_encode($normalarray, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP );
            $result = preg_replace_callback(
                    '/\\\\u([0-9a-f]{4})/i',
                    function ($matches) {
                        $sym = mb_convert_encoding(
                            pack('H*', $matches[1]),
                            'UTF-8',
                            'UTF-16'
                        );
                        return $sym;
                    },
                    $result 
                );
            echo $result;
        }
        else {
            echo "PVZ_NOT_FOUND";
        }

      }else {
        echo "curl не доступен";
      }
}

function total_list(){
    echo "<pre>";
    print_r($_SESSION["items"]);
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
    $result = preg_replace_callback(
                '/\\\\u([0-9a-f]{4})/i',
                function ($matches) {
                    $sym = mb_convert_encoding(
                        pack('H*', $matches[1]),
                        'UTF-8',
                        'UTF-16'
                    );
                    return $sym;
                },
                $result 
            );
    echo $result;
}


function get_city() {
    $ipinfo = get_ip_info($_SERVER['REMOTE_ADDR']);
    return $ipinfo->city; // город
}

function get_ip_info($ip)
{
    $postData = "
        <ipquery>
            <fields>
                <all/>
            </fields>
            <ip-list>
                <ip>$ip</ip>
            </ip-list>
        </ipquery>
    "; 
 
    $curl = curl_init(); 
 
    curl_setopt($curl, CURLOPT_URL, 'http://194.85.91.253:8090/geo/geo.html'); 
    curl_setopt($curl, CURLOPT_POSTFIELDS, $postData); 
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); 
 
    $responseXml = curl_exec($curl);
    curl_close($curl);
 
    if (substr($responseXml, 0, 5) == '<?xml')
    {
        $ipinfo = new SimpleXMLElement($responseXml);
        return $ipinfo->ip;
    }
 
    return false;
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

function str_replace_nth($search, $replace, $subject, $nth)
{
    $found = preg_match_all('/'.preg_quote($search).'/', $subject, $matches, PREG_OFFSET_CAPTURE);
    if (false !== $found && $found > $nth) {
        return substr_replace($subject, $replace, $matches[0][$nth][1], strlen($search));
    }
    return $subject;
}



function svg_string($svgString) {

            // $svgString is a string containing exported SVG XML
            $svgHeader = '<?xml version="1.0" standalone="no"?>'; // XML node needed by imagick
            $svgTag = 'svg'; // tag to search for
            preg_match_all("/\<svg(.*?)\>/", $svgString, $matches); // Get initial SVG node that may contain missing :xlink

            if ( !preg_match("/xmlns:xlink/", $matches[1][0]) )
                {
                    $tempString = str_replace_nth( 'xmlns=', 'xmlns:xlink=', $matches[1][0], 1 ); // Replace second occurance of xmlns
                    $svgString = str_replace($matches[1][0], $tempString, $svgString);
                }

            $svgString = preg_replace('/NS([1-9]|[1-9][0-9]):/', 'xlink:', $svgString); // Remove offending NS<number>: in front of href tags, will only remove NS0 - NS99

            $svgString = $svgHeader . $svgString; // Prefix SVG string with required XML node
            return $svgString;
}


function save_png2() {
      if(isset($_POST['image']) && isset($_POST['image1'])) {

            $array = array();

            $svgString =  svg_string($_POST['image']);

            $im = new Imagick();

            $im->setBackgroundColor(new ImagickPixel('transparent'));

            $im->readImageBlob($svgString);

            /*png settings*/
            $im->setImageFormat("png24");
                   
            array_push($array, array("image" => save_to_file($svgString,  $im)));

            $im->clear();
            $im->destroy(); 


            $svgString =  svg_string($_POST['image1']);

            $im = new Imagick();

            $im->setBackgroundColor(new ImagickPixel('transparent'));

            $im->readImageBlob($svgString);

            /*png settings*/
            $im->setImageFormat("png24");
                   
            array_push($array, array("image1" => save_to_file($svgString,  $im)));

            $im->clear();
            $im->destroy();  



            $result = json_encode( $array, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP );
    $result = preg_replace_callback(
                '/\\\\u([0-9a-f]{4})/i',
                function ($matches) {
                    $sym = mb_convert_encoding(
                        pack('H*', $matches[1]),
                        'UTF-8',
                        'UTF-16'
                    );
                    return $sym;
                },
                $result 
            );
    echo $result;   



      }
}


function save_svg_to_png() {

     if(isset($_POST['image'])) {

        $svgString =  $_POST['image'];

         // $svgString is a string containing exported SVG XML
        $svgHeader = '<?xml version="1.0" standalone="no"?>'; // XML node needed by imagick
        $svgTag = 'svg'; // tag to search for
        preg_match_all("/\<svg(.*?)\>/", $svgString, $matches); // Get initial SVG node that may contain missing :xlink

        if ( !preg_match("/xmlns:xlink/", $matches[1][0]) )
            {
                $tempString = str_replace_nth( 'xmlns=', 'xmlns:xlink=', $matches[1][0], 1 ); // Replace second occurance of xmlns
                $svgString = str_replace($matches[1][0], $tempString, $svgString);
            }

        $svgString = preg_replace('/NS([1-9]|[1-9][0-9]):/', 'xlink:', $svgString); // Remove offending NS<number>: in front of href tags, will only remove NS0 - NS99

        $svgString = $svgHeader . $svgString; // Prefix SVG string with required XML node

        $im = new Imagick();

        $im->setBackgroundColor(new ImagickPixel('transparent')); 

        $im->readImageBlob($svgString);

        /*png settings*/
        $im->setImageFormat("png24");
               
        save_to_file($svgString,  $im);

        $im->clear();
        $im->destroy();     

     }
}

function save_svg() {

     if(isset($_POST['image'])) {

            $dir = "uploaded_images";
            $svgString = $_POST['image'];

             // $svgString is a string containing exported SVG XML
            $svgHeader = '<?xml version="1.0" standalone="no"?>'; // XML node needed by imagick
            $svgTag = 'svg'; // tag to search for
            preg_match_all("/\<svg(.*?)\>/", $svgString, $matches); // Get initial SVG node that may contain missing :xlink

            if ( !preg_match("/xmlns:xlink/", $matches[1][0]) )
                {
                    $tempString = str_replace_nth( 'xmlns=', 'xmlns:xlink=', $matches[1][0], 1 ); // Replace second occurance of xmlns
                    $svgString = str_replace($matches[1][0], $tempString, $svgString);
                }

            $svgString = preg_replace('/NS([1-9]|[1-9][0-9]):/', 'xlink:', $svgString); // Remove offending NS<number>: in front of href tags, will only remove NS0 - NS99

            $svgString = $svgHeader . $svgString; // Prefix SVG string with required XML node

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

           
            file_put_contents($dir.'/'.$id.'.svg', $svgString);
            

            echo $dir.'/'.$id.'.svg';
    }

}

function save_to_file($image, $im){

        $dir = "uploaded_images";

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

        if ($im != false) {
            $im->writeImage($dir.'/'.$id.'.png');/*(or .jpg)*/
            return $dir.'/'.$id.'.png';
        }else{
            file_put_contents($dir.'/'.$id.'.png', base64_decode($image));
            echo $dir.'/'.$id.'.png';
        }   
}


function save_img(){  
    if(isset($_POST['image'])) {

        $image = $_POST['image'];  
        
        save_to_file($image, false);
/*
        if (isset($_POST['img1'])) {
            if (file_exists($_POST['img1'])) {
                unlink($_POST['img1']); 
            }
        }
        if (isset($_POST['img2'])) {
            if (file_exists($_POST['img2'])) {
                unlink($_POST['img2']); 
            }
        }
        */
    }else{
        echo $data['errors'] = "Произошла ошибка, попробуйте еще раз";
    }
}


function mysqlconnect($bd_controls){

    if (gethostname() == "dmitry-HP-Pavilion-dv7-Notebook-PC") {

        $dbhost = "localhost"; 
        // Имя пользователя базы данных 
        $dbuser = "root"; 
            // и его пароль 
        $dbpass = "as210100"; 
            // Имя базы данных, на хостинге или локальной машине 
        $dbname = "cities"; 
    }else{

        $dbhost = $bd_controls["dbhost"]; 
        // Имя пользователя базы данных 
        $dbuser = $bd_controls["dbuser"]; 
            // и его пароль 
        $dbpass = $bd_controls["dbpass"]; 
            // Имя базы данных, на хостинге или локальной машине 
        $dbname = $bd_controls["dbname"]; 
    }

    $db = @mysql_connect($dbhost, $dbuser, $dbpass) or die(mysql_error()); 
    if (!$db) { 
        exit ("<P>Сервер базы данных не доступен</P>" ); 
    } 
    if (!@mysql_select_db($dbname, $db)) { 
        exit( "<P>База данных $dbname не доступна</P>" ); 
    }
    mysql_query('SET NAMES utf8 COLLATE utf8_general_ci');
    return $db;
}
   

function get_city_input($string,$bd_controls) {
    $db =  mysqlconnect($bd_controls);
    $query = mysql_query("SELECT name FROM city WHERE country_id = 3159 AND name Like '$string%' LIMIT 20") or die(mysql_error());
    mysql_close($db);
    $array = array();
    while ($value = mysql_fetch_array($query)) {
        array_push($array, $value);
    }
    $result = json_encode( $array, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP );
    $result = preg_replace_callback(
                '/\\\\u([0-9a-f]{4})/i',
                function ($matches) {
                    $sym = mb_convert_encoding(
                        pack('H*', $matches[1]),
                        'UTF-8',
                        'UTF-16'
                    );
                    return $sym;
                },
                $result 
            );
    echo $result;
}


function base64DataUri($sFile)
{                   

    

    $sFile  = trim($sFile);

  
    // Switch to right MIME-type
    $sExt = strtolower(substr(strrchr($sFile, '.'), 1));
   
    switch($sExt)
    {
        case 'gif':
        case 'jpg':
        case 'png':
        case 'png':
        case 'png ':
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


function save_raspechat($config)
{
    $zakaz_number = $_SESSION['zakaz_number'];
    $fio =  $_SESSION['fio'];
    $email  = $_SESSION['email'];
    $phone =   $_SESSION['phone'];
    $city = $_SESSION['city'];
    $adress = $_SESSION['adress'];
    $comments =$_SESSION['comments'];
    $deliver = $_SESSION['deliver'];
    $payment  =  $_SESSION['payment'];

    $calendar_self = $_SESSION['calendar_self'];
    $calendar_sdec = $_SESSION['calendar_sdec'];
    $calendar_moscow = $_SESSION['calendar_moscow'];
    $calendar_russia = $_SESSION['calendar_russia'];

    $sdec_code = $_SESSION['sdec_code'];
    $sdec_adress = $_SESSION['sdec_adress'];
    $sdec_code = $_SESSION['sdec_code'];
    $sdec_name = $_SESSION['sdec_name'];
    $sdec_worktime = $_SESSION['sdec_worktime'];

    $body = file_get_contents('mail_templates/raspechat.html');
    $body = str_replace('$time_order', $_SESSION['time_order'], $body);
    $body = str_replace('$fio', $fio, $body);
    $body = str_replace('$zakaz_number',  $_SESSION['zakaz_number'], $body);
    $body = str_replace('$email', $email, $body);
    $body = str_replace('$phone', $phone, $body);
    $body = str_replace('$city', $city, $body);

    $cost = 0;
    if ($deliver!="sdec") {
             if ($deliver=="kur_rus") {
                $cost  = get_cost_summary($config, $_SESSION['russia_cost']);
             }else{
                 $cost  = get_cost_summary($config, "none");
             }
            
        }else{
                $cost  = get_cost_summary($config, $_SESSION['sdec_cost']);     
    }

    $deliver_type = "";

    if ($deliver=="self"){
        $deliver_type .= "Cамовывоз из шоурума";
        $deliver_type .= '
                <table class="delivery">
                    <tbody>
                        <tr>
                            <td class="col_l_delivery">Дата самовывоза</td>
                            <td class="col_r_delivery">'.$calendar_self.'</td>
                        </tr>
                    </tbody>
                </table>
        ';

    }
    if ($deliver=="kur_mos"){
        $deliver_type .= "Курьер по Москве";
        $deliver_type .= '
                <table class="delivery">
                    <tbody>
                        <tr>
                            <td class="col_l_delivery">Дата доставки</td>
                            <td class="col_r_delivery">'.$calendar_moscow.'</td>
                        </tr>
                        <tr>
                            <td class="col_l_delivery">Стоимость доставки</td>
                            <td class="col_r_delivery">'.$config["deliver_cost"]["kur_mos"].'</td>
                        </tr>
                    </tbody>
                </table>
        ';
    }
    if ($deliver=="kur_rus"){
        $deliver_type .= 'Курьер СДЭК по России';
        $deliver_type .= '
                <table class="delivery">
                    <tbody>
                        <tr>
                            <td class="col_l_delivery">Дата доставки</td>
                            <td class="col_r_delivery">'.$_SESSION['calendar_russia'].'</td>
                        </tr>
                        <tr>
                            <td class="col_l_delivery">Стоимость доставки</td>
                            <td class="col_r_delivery">'.$_SESSION['russia_cost'].'</td>
                        </tr>
                    </tbody>
                </table>
        ';
    }
    if ($deliver=="mail_ru"){
        $deliver_type .= 'Почтой России';
        $deliver_type .= '
                <table class="delivery">
                    <tbody>
                        <tr>
                            <td class="col_l_delivery">Стоимость доставки</td>
                            <td class="col_r_delivery">'.$config["deliver_cost"]["kur_mos"].'</td>
                        </tr>
                        <tr>
                            <td class="col_l_delivery">Индекс</td>
                            <td class="col_r_delivery">'.$_SESSION['index'].'</td>
                        </tr>
                    </tbody>
                </table>
        ';
    }

    if ($deliver=="sdec"){
        $deliver_type .= 'Самовывоз из пункта СДЭК';
        $deliver_type .= '
                <table class="delivery">
                    <tbody>
                        <tr>
                            <td class="col_l_delivery">Дата самовывоза</td>
                            <td class="col_r_delivery">'.$_SESSION['calendar_sdec'].'</td>
                        </tr>
                        <tr>
                            <td class="col_l_delivery">Пункт самовывоза</td>
                            <td class="col_r_delivery">'.$_SESSION['sdec_code'].'</td>
                        </tr>
                        <tr>
                            <td class="col_l_delivery">Адрес пункта</td>
                            <td class="col_r_delivery">'.$_SESSION['sdec_adress'].'</td>
                        </tr>
                        <tr>
                            <td class="col_l_delivery">Название пункта</td>
                            <td class="col_r_delivery">'.$_SESSION['sdec_name'].'</td>
                        </tr>
                        <tr>
                            <td class="col_l_delivery">Режим работы пункта</td>
                            <td class="col_r_delivery">'.$_SESSION['sdec_worktime'].'</td>
                        </tr>
                        <tr>
                            <td class="col_l_delivery">Стоимость самовывоза</td>
                            <td class="col_r_delivery">'.$_SESSION['sdec_cost'].'</td>
                        </tr>
                    </tbody>
                </table>
        ';
    }

    if ($payment=="cash"){
        $payment_type = "Наличными";
    }

    if ($payment=="sber"){
        $payment_type = "Карта сбербанка";
    }

    if ($payment=="robocassa"){
        $payment_type = "Банковской картой онлайн";
    }

    $elements = get_elements_to_raspechat();

  
    $body = str_replace('$elements', $elements, $body);

    $body = str_replace('$deliver', $deliver_type, $body);

    $body = str_replace('$payment', $payment_type, $body);

    $body = str_replace('$cost', $cost, $body);

    $body = str_replace('$adress', $adress, $body);
    
    $body = str_replace('$comments', $comments, $body);

    $body = str_replace('$time_order', $_SESSION['time_order'], $body);
    
    // strip backslashes
    $body = preg_replace('/\\\\/','', $body);
    
    
    $filename = 'orders/'.$zakaz_number.'.html';
    file_put_contents($filename, $body);
    $raspech_file_url = "http://".$_SERVER['HTTP_HOST']."/".$filename;
    return $raspech_file_url;
}

function send_mail($config, $mail_controls, $bd_controls) {

    $fio =  $_SESSION['fio'];
    $email  = $_SESSION['email'];
    $phone =   $_SESSION['phone'];
    $city = $_SESSION['city'];
    $adress = $_SESSION['adress'];
    $comments =$_SESSION['comments'];
    $deliver = $_SESSION['deliver'];
    $payment  =  $_SESSION['payment'];

    $calendar_self = $_SESSION['calendar_self'];
    $calendar_sdec = $_SESSION['calendar_sdec'];
    $calendar_moscow = $_SESSION['calendar_moscow'];
    $calendar_russia = $_SESSION['calendar_russia'];

    $sdec_code = $_SESSION['sdec_code'];
    $sdec_adress = $_SESSION['sdec_adress'];
    $sdec_code = $_SESSION['sdec_code'];
    $sdec_name = $_SESSION['sdec_name'];
    $sdec_worktime = $_SESSION['sdec_worktime'];



    if ((isset($fio)) &&  (isset($email)) && (isset($phone)) && (isset($city)) && (isset($deliver)) && (isset($payment))) {

        require 'mail_functions/PHPMailerAutoload.php';

        $mail = new PHPMailer;
        $mail->SMTPDebug = 0;                               // Enable verbose debug output  
        $mail->CharSet = 'UTF-8';
        $mail->isSMTP();  
        
        $mail->SMTPAuth = true;   
        $mail->Host = $mail_controls["Host"];
        $mail->Port = $mail_controls["Port"];
                                     // Set mailer to use SMTP                               // Enable SMTP authentication
        $mail->Username = $mail_controls["Username"];                 // SMTP username
        $mail->Password = $mail_controls["Password"];                           // SMTP password                          // Enable TLS encryption, `ssl` also accepted
                                    // TCP port to connect to

        $mail->From = $mail_controls["Username"];
        $mail->FromName = 'Сайт ohcasey';
        $mail->addAddress('ohcaseysales@gmail.com', 'Админ Ohcasey');     // Add a recipient
        // $mail->addAddress('atanikov@MacBook-Pro', 'Админ Ohcasey');     // Add a recipient
        $mail->isHTML(true);                                  // Set email format to HTML


        $body = file_get_contents('mail_templates/admin.html');

        $raspech_file_url = save_raspechat($config);
        
        $body = str_replace('$raspech_file_url', $raspech_file_url, $body);
        $body = str_replace('$time_order', $_SESSION['time_order'], $body);
        $body = str_replace('$fio', $fio, $body);
        $body = str_replace('$zakaz_number',  $_SESSION['zakaz_number'], $body);
        $body = str_replace('$email', $email, $body);
        $body = str_replace('$phone', $phone, $body);
        $body = str_replace('$city', $city, $body);

        $cost = 0;

       if ($deliver!="sdec") {
                 if ($deliver=="kur_rus") {
                    $cost  = get_cost_summary($config, $_SESSION['russia_cost']);
                 }else{
                     $cost  = get_cost_summary($config, "none");
                 }
                
            }else{
                    $cost  = get_cost_summary($config, $_SESSION['sdec_cost']);
            
        }

   
        $deliver_type ="";


        if ($deliver=="self"){
            $deliver_type = "Cамовывоз";

        }
        if ($deliver=="kur_mos"){
              $deliver_type = "Курьер по Москве";

        }
        if ($deliver=="kur_rus"){
            $deliver_type = '
                <table>
                <tbody>
                    <tr><td colspan="2">
                     Курьер по России
                    </td></tr>
                    <tr>
                        <td style ="padding: 5px;  text-align: right;" width="25%">Дата доставки</td>
                        <td style ="padding: 5px;  text-align: left;">'.$_SESSION['calendar_russia'].'</td>
                    </tr>
                    <tr>
                        <td style ="padding: 5px;  text-align: right;" width="50%">Стоимость доставки</td>
                        <td style ="padding: 5px;  text-align: left;">'.$_SESSION['russia_cost'].'</td>
                    </tr>
                </tbody>
                </table>'
            ;

        }
        if ($deliver=="mail_ru"){
            $deliver_type = "Почта России";
        }

        if ($deliver=="sdec"){
            $deliver_type = '
                <table>
                <tbody>
                    <tr><td colspan="2">
                    <b>Самовывоз из пункта СДЭК</b>
                    </td></tr>
                    <tr>
                        <td style ="padding: 5px;  text-align: right;" width="25%">Дата самовывоза</td>
                        <td style ="padding: 5px;  text-align: left;">'.$_SESSION['calendar_sdec'].'</td>
                    </tr>
                    <tr>
                        <td style ="padding: 5px; text-align: right;" width="25%">Пункт самовывоза</td>
                        <td style ="padding: 5px; text-align: left;">'.$_SESSION['sdec_code'].'</td>
                    </tr>
                    <tr>
                        <td style ="padding: 5px; text-align: right;" width="25%">Адреса пункта</td>
                        <td style ="padding: 5px; text-align: left;">'.$_SESSION['sdec_adress'].'</td>
                    </tr>
                    <tr>
                        <td style ="padding: 5px; text-align: right;" width="25%">Название пункта</td>
                        <td style ="padding: 5px; text-align: left;">'.$_SESSION['sdec_name'].'</td>
                    </tr>
                    <tr>
                        <td style ="padding: 5px; text-align: right;" width="25%">Режим работы пункта</td>
                        <td style ="padding: 5px; text-align: left;">'.$_SESSION['sdec_worktime'].'</td>
                    </tr>
                    <tr>
                        <td style ="padding: 5px; text-align: right;" width="25%">Стоимость самовывоза</td>
                        <td style ="padding: 5px; ext-align: left;">'.$_SESSION['sdec_cost'].'</td>
                    </tr>
                </tbody>
                </table>'
            ;
        }


        if ($payment=="cash"){
            $payment_type = "Наличными";

        }

        if ($payment=="sber"){
            $payment_type = "Карта сбербанка";
        }

        if ($payment=="robocassa"){
            $payment_type = "Робокасса";
        }


        $elements = get_elements_to_admin_mail($config);

      
        $body = str_replace('$elements', $elements[0], $body);

  

        $body = str_replace('$os', $_SESSION['items'][0]["OS"], $body);
        $body = str_replace('$browser', $_SESSION['items'][0]["browser"], $body);
        $body = str_replace('$version', $_SESSION['items'][0]["version"], $body);
        $body = str_replace('$useragent', $_SESSION['items'][0]["useragent"], $body);

        

        $body = str_replace('$deliver', $deliver_type, $body);



        $body = str_replace('$payment', $payment_type, $body);

        $body = str_replace('$cost', $cost, $body);

        if (isset($adress) && ($adress!="") && ($deliver!="self") && ($deliver!="sdec") ) {
             $body = str_replace('$adress','<tr>
                                                            <td style ="padding: 5px;" width="50%">Адрес</td>
                                                            <td style ="padding: 5px;">'.$adress.'</td>
                                                        </tr>', $body);
        }else{
            $body = str_replace('$adress', "", $body);
        }

        if (isset($comments) && ($comments!="")) {
             $body = str_replace('$comments', '<tr>
                                                            <td style ="padding: 5px;" width="50%">Комментарии к заказу</td>
                                                            <td style ="padding: 5px;">'.$comments.'</td>
                                                        </tr>', $body);
        }else{
            $body = str_replace('$comments', "", $body);
        }




        $body = str_replace('$time_order', $_SESSION['time_order'], $body);
        
        // strip backslashes
        $body = preg_replace('/\\\\/','', $body);


        $mail->Subject = 'Новый заказ №'.$_SESSION['zakaz_number'];
        $mail->MsgHTML($body);
        $mail->CharSet="utf-8";

        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        if(!$mail->send()) {
            
           echo 'Письмо админу не отправлено.';
           echo 'Oшибка письма: ' . $mail->ErrorInfo;
        } else {

            echo 'Письмо админу отправлено успешно';
             
        } 

        $mails = new PHPMailer;
        $mails->CharSet = 'UTF-8';
        $mails->isSMTP();  

        $mails->SMTPAuth = true;  

        $mails->Host = $mail_controls["Host"];
        $mails->Port = $mail_controls["Port"];
                                     // Set mailer to use SMTP                               // Enable SMTP authentication
        $mails->Username = $mail_controls["Username"];                 // SMTP username
        $mails->Password = $mail_controls["Password"];                           // SMTP password                          // Enable TLS encryption, `ssl` also accepted
                                    // TCP port to connect to

        $mails->From = $mail_controls["Username"];

        $mails->FromName = 'Сайт ohcasey';

        $mails->addAddress($email, $fio);     // Add a recipient

        $mails->isHTML(true);                                  // Set email format to HTML

        $body = file_get_contents('mail_templates/client.html');

        /*$src = $_SERVER['HTTP_HOST'];*/
        $src = 'ohcasey.dragon-web.vps-private.net';
        $fontface ="    @font-face {
        font-family: HelveticaNeueCyr;
        src: local('HelveticaNeueCyr'),
        url(".$src."/fonts/HelveticaNeueCyr-Roman.otf);}";

        $body = str_replace('$fontface',$fontface  , $body);


        
         
        $body =  str_replace('$href_logo', 'http://'.$src , $body);

        $body =  str_replace('$logo', 'http://'.$src.'/img/logo_white.png' , $body);

        $body = str_replace('$bottomemail', 'http://'.$src.'/img/mail_background2.png' , $body);


       
        $body = str_replace('$inst', 'http://'.$src.'/img/inst.png'  , $body);


        $body =  str_replace('$logo', 'http://'.$src.'/img/logo_white.png' , $body);

        $date = date("d.m.y");
        $body = str_replace('$date', $date  , $body);


        $time = date("H:i"); 
        $body = str_replace('$time', $time  , $body);

        $body = preg_replace('/\\\\/','', $body);
     
        

        $body = str_replace('$fio', $fio, $body);
        $body = str_replace('$zakaz_number',   $_SESSION['zakaz_number'], $body);
        $body = str_replace('$email', $email, $body);
        $body = str_replace('$phone', $phone, $body);
        $body = str_replace('$city', $city, $body);

         if (isset($adress))   {
          $body = str_replace('$adress_mail','<span  style="display: block;
                                                color:  #000000;
                                                font-size: 14px;
                                                padding-top: 3px;
                                                padding-bottom: 3px;
                                                font-weight: 400;
                                                text-align: left;">Адрес: <span style="color:  #405e88;
                                                font-size: 16px;" >'.$adress.'</span></span>', $body);
        }else{
            $body = str_replace('$adress_mail','-', $body);
        }

        if (isset($comments)) {
            $body = str_replace('$comments_mail','<span  style="display: block;
                                                color:  #000000;
                                                font-size: 14px;
                                                padding-top: 3px;
                                                padding-bottom: 3px;
                                                font-weight: 400;
                                                text-align: left;">Комментарии: <span style="color:  #405e88;
                                                font-size: 16px;" >'.$comments.'</span></span>', $body);
        }else{
             $body = str_replace('$comments_mail','-', $body);
        }

        $body = str_replace('$deliver', $deliver_type, $body);

        $body = str_replace('$payment', $payment_type, $body);




        if ($payment=="sber"){
            $body = str_replace('$sber_option','<span  style="display: block;
                                                color:  #000000;
                                                font-size: 14px;
                                                padding-top: 3px;
                                                padding-bottom: 3px;
                                                font-weight: 400;
                                                text-align: left;">Карта сбербанка для оплаты:  <span style="color:  #405e88;
                                                font-size: 16px;" >6761 9600 0133 359217</span></span>', $body);
        }else{
            $body = str_replace('$sber_option', "", $body);
        }


        

        $body = str_replace('$summ', $elements[1]." р." , $body);
        $body = str_replace('$delicer_cost', $config["deliver_cost"][$deliver]." р.", $body);
        $body = str_replace('$final', $cost." р.", $body);

        $body = str_replace('$finaf', $cost." рублей", $body);
        
        $elem = get_client_mail($config);


        $body = str_replace('$plant', $elem[0]   , $body);
        
        $mails->SMTPSecure = 'tls';
        $mails->Subject = 'Заказ на сайте ohcasey.ru №'.$_SESSION['zakaz_number'];
        $mails->addAddress($email, $fio);
        $mails->MsgHTML($body);
        $mails->CharSet="utf-8";

     
        
        $mails->AltBody = 'This is the body in plain text for non-HTML mail clients'; 

        if(!$mails->send()) {
            
            echo 'Письмо клиенту не отправлено.';
            echo 'Oшибка письма: ' . $mails->ErrorInfo;
        } else {

             echo 'Письмо клиенту отправлено';
           
        }

        //print_r($_SESSION["items"]);
        header("Location: /success"); 


    }else{
        header("Location: /cart"); 
    }

}


function get_cost_summary($config, $deliver) {
    
    $not_config = false;

    if ($deliver == "none") {
        $deliver = $_SESSION["deliver"];
        $not_config = true;
        
    }

    //echo "123".$deliver;
  
    $cost = 0;
 
    foreach ($_SESSION['items'] as $j => $value) {

        $id_case = $value["case_id"];

        foreach ($config["materials"] as $b => $val1) {


            foreach ($config["materials"][$b] as $c => $value) {
                foreach ($config["materials"][$b][$c]["colors"] as $d => $value) {
                    if ($config["materials"][$b][$c]["colors"][$d]["id"] == $id_case) {
                        $cost+=$config["materials"][$b][$c]["colors"][$d]["cost"];
                    }
                    
                }
            }
            
        }
    }
    if ($not_config == true) {
        $cost+=$config["deliver_cost"][$deliver];
    }else{
         $cost+=$deliver;
    }
    return $cost;
}


function get_mail($config, $mail_controls, $bd_controls){
  
    if (isset($_POST['fio'])) {
        $fio = $_POST['fio'];
        $_SESSION['fio'] =  $_POST['fio'];
    }

    if (isset($_POST['email'])) {
        $email = $_POST['email'];
        $_SESSION['email'] = $_POST['email'];
    }

    if (isset($_POST['phone'])) {
       $phone = $_POST['phone'];
       $_SESSION['phone'] = $_POST['phone'];
    }

    if (isset($_POST['city'])) {
       $city = $_POST['city'];
       $_SESSION['city'] = $_POST['city'];
    }
    
    if (isset($_POST['index'])) {
       $city = $_POST['index'];
       $_SESSION['index'] = $_POST['index'];
    }
    
    
    if (isset($_POST['adress'])) {
     $adress =$_POST['adress'];
     $_SESSION['adress'] = $_POST['adress'];
    }

    if (isset($_POST['comments'])) {
      $comments =$_POST['comments'];
      $_SESSION['comments'] = $_POST['comments'];
    }
      
    if (isset($_POST['deliver'])) {
        $deliver = $_POST['deliver'];
        $_SESSION['deliver'] = $_POST['deliver'];
    }
      
    if (isset($_POST['payment'])) {
        $payment  = $_POST['payment'];
        $_SESSION['payment'] = $_POST['payment'];
    }


    if (isset($_POST['calendar_self'])) {
        $_SESSION['calendar_self'] = $_POST['calendar_self'];
    }

    if (isset($_POST['calendar_sdec'])) {
        $_SESSION['calendar_sdec'] = $_POST['calendar_sdec'];
    }

    if (isset($_POST['calendar_moscow'])) {
        $_SESSION['calendar_moscow'] = $_POST['calendar_moscow'];
    }

    if (isset($_POST['calendar_russia'])) {
        $_SESSION['calendar_russia'] = $_POST['calendar_russia'];
    }


    if (isset($_POST['sdec_code'])) {
        $_SESSION['sdec_code'] = $_POST['sdec_code'];
    }

    if (isset($_POST['sdec_adress'])) {
        $_SESSION['sdec_adress'] = $_POST['sdec_adress'];
    }

    if (isset($_POST['sdec_cost'])) {
        $_SESSION['sdec_cost'] = $_POST['sdec_cost'];
        echo $_SESSION['sdec_cost'];
    }

    if (isset($_POST['sdec_name'])) {
        $_SESSION['sdec_name'] = $_POST['sdec_name'];
    }

    if (isset($_POST['sdec_worktime'])) {
        $_SESSION['sdec_worktime'] = $_POST['sdec_worktime'];
    }

    if (isset($_POST['russia_cost'])) {
        $_SESSION['russia_cost'] = $_POST['russia_cost'];
    }

   


    $db =  mysqlconnect($bd_controls);
        
    $query = mysql_query("SELECT count FROM settings") or die(mysql_error());
       
    while ($value = mysql_fetch_array($query)) {
        $zakaz_number = $value["count"]+1;
    }


    $query = mysql_query("UPDATE settings SET count = '$zakaz_number'") or die(mysql_error());

    mysql_close($db);


    $_SESSION['zakaz_number'] = $zakaz_number;
    $time_order = date("d.m.y H:i:s");
    $_SESSION['time_order'] =  $time_order;

    if ($payment=="robocassa"){  
            $kassa = new Robokassa('ohcasey.ru', 'as210100', 'qw210100');
         
            if ($deliver!="sdec") {
                 if ($deliver=="kur_rus") {
                    $kassa->OutSum  = get_cost_summary($config, $_SESSION['russia_cost']);
                 }else{
                    $kassa->OutSum  = get_cost_summary($config, "none");
                 }
            }else{
                   $kassa->OutSum  = get_cost_summary($config, $_SESSION['sdec_cost']);
              
            }
        
            echo $kassa->OutSum;

            $kassa->InvId = $zakaz_number;
            $kassa->Email = $email;
            $kassa->Desc         = 'Чехол на ohcasey.ru, заказ номер №'.$zakaz_number;
            $kassa->addCustomValues(array(
              
            ));

            header('Location: ' . $kassa->getRedirectURL());

           exit;
    }else{
         send_mail($config, $mail_controls, $bd_controls);
    }

}    


function get_client_mail($config) {
    $cost_cur =0;
    $cost = 0;
    $count = count($_SESSION['items']); 

    $result ="";
    foreach ($_SESSION['items'] as $i => $val) {
        $cur_cost = get_cost_case(($_SESSION['items'][$i]["case_id"]), $config, ($_SESSION['items'][$i]["device_id_case"]));
       

         $result.='<table style="width: 100%; margin-top: 20px;">
                                                <tr>
                                                    <td style="
                                                   
                                                    background-repeat: no-repeat;
                                                    background-size: contain;
                                                    background-position: top right;
                                                    width: 34%;
                                                    text-align: right;
                                                    ">
                                                    <img src = "http://'.$_SERVER['HTTP_HOST']."/".$_SESSION['items'][$i]["preview_url"].'" height="240px" width="auto" style="height: 250px; width: auto">
                                                        
                                                    </td>
                                                    <td style="width: 2%;"></td>
                                                    <td style="width: 49%;">
                                                        <table>
                                                            <tr>
                                                                <td style="
                                                                width: 122px;
                                                                height: 122px;
                                                                background-color: #f7f7f7;
                                                                text-align: center;
                                                                color: #669AC4;
                                                                font-size: 16px;
                                                                font-weight: 300;
                                                                text-align: center;
                                                                ">
                                                                <span style ="display: block; padding: 5px 0px; width:100%;">'.$_SESSION['items'][$i]["device_name"].'</span>
                                                                <img alt="" src = "http://'.$_SERVER['HTTP_HOST'].'/'.$config["devices_library_path"].$_SESSION['items'][$i]["lib_img"].'">

                                                                </td>
                                                                <td style="width: 3px;"></td>
                                                                <td style="

                                                                width: 122px;
                                                                height: 122px;
                                                                background-color: #f7f7f7;
                                                                text-align: center;
                                                                "
                                                                >
                                                                    <span style="color:  #405e88;
                                                                font-size: 18px;
                                                                font-weight: 300;
                                                                text-align: center;">'.$_SESSION['items'][$i]["name_case_1"].'</span><br>




                                                                    <span style="color:  #669AC4;
                                                            font-size: 16px;
                                                            display: block;
                                                            padding-top: 4px;
                                                            font-weight: 300;
                                                        text-align: center;">'.$_SESSION['items'][$i]["name_case_2"].'</span>
                                                                </td>
                                                            </tr>
                                                            <tr style="height: 5px;"></tr>
                                                            <tr style="
                                                                
                                                            ">
                                                                <td style="
                                                                width: 122px;
                                                                height: 122px;
                                                                background-color: #f7f7f7;
                                                                text-align: center;
                                                                ">
                                                                <span style="text-transform: uppercase; 
                                                color: #405e88;
                                                font-size: 16px;
                                                font-weight: 300;
                                                text-align: center;
                                                ">#ОБЪЁМНАЯ
                                                ПЕЧАТЬ
                                                </span><br><span style=" color:  #669AC4; font-size: 16px;
                                                                        display: block;
                                                                        padding-top: 4px;

                                                                    ">уникальная
                                                    технология</span>



                                                                </td>
                                                                <td style="width: 3px;"></td>
                                                                <td style="

                                                                width: 122px;
                                                                height: 122px;
                                                                background-color: #f7f7f7;

                                                                  color: #669AC4;
                                                                  font-size: 18px;
                                                                  text-align: center;


                                                                "
                                                                >
                                                                    <span style="font-size: 18px;">Цена:</span><br>
                                                                    <span style="
                                                                        display: block;
                                                                        padding-top: 4px;

                                                                    ">'.$cur_cost.' р.</span>
                                                                </td>
                                                            </tr>
                                                        </table>

                                                    </td>
                                                </tr>

                                            </table>';


        
    }
     return array($result, $cost);
}






class Robokassa {
    private $login, $password1, $password2,
    $endpoint = 'https://merchant.roboxchange.com/Index.aspx?',
    $customVars = array();
    public $OutSum, $Email = false, $InvId = 0, $Desc, $IncCurrLabel = '', $Culture = 'ru'; /* request parameters */
    /**
    * Вносит в класс данные для генерации защищенной подписи
    *
    * @param string $login логин мерчанта
    * @param string $pass1 пароль №1
    * @param string $pass2 пароль №2
    * @param boolean $test работа с тестовым сервером
    *
    * @return none
    */
    public function __construct($login, $pass1, $pass2, $test = false)
    {
        $this->login = $login;
        $this->password1 = $pass1;
        $this->password2 = $pass2;
        if($test) $this->endpoint = 'http://test.robokassa.ru/Index.aspx?';
    }
    /**
    * Добавление пользовательских значений в запрос
    *
    * @param array $vars именованный массив с переменными(названия указывать с суффиксом shp_)
    * @return none
    */
    public function addCustomValues($vars)
    {
        if(!is_array($vars)) throw new Exception('Function `addCustomValues` take only array`s');
        foreach($vars as $k => $v)
            $this->customVars[$k] = $v;
    }
    /**
    * Получение URL для запроса
    *
    * @return string $url
    */
    public function getRedirectURL()
    {
        $customVars = $this->getCustomValues();
        $hash = md5("{$this->login}:{$this->OutSum}:{$this->InvId}:{$this->password1}{$customVars}");
        $invId = ($this->InvId !== '') ? '&InvId=' . $this->InvId : '';
        $IncCurrLabel = ($this->IncCurrLabel !== '') ? '&IncCurrLabel=' . $this->IncCurrLabel : '';
        $Email = ($this->Email !== '') ? '&Email=' . $this->Email : '';
        return $this->endpoint . 'MrchLogin=' . $this->login
            . '&OutSum=' . (float) $this->OutSum
            . $invId
            . '&Desc=' . urlencode($this->Desc)
            . '&SignatureValue=' . $hash
            . $IncCurrLabel
            . $Email
            . '&Culture=' . $this->Culture
            . $this->getCustomValues($url = true);
    }
    /**
    * Проверка исполнения операции. Сравнение хеша
    *
    * @param string $hash значение SignatureValue, переданное кассой на Result URL
    * @param boolean $checkSuccess проверка параметров в скрипте завершения операции (SuccessURL)
    * @return boolean $hashValid
    */
    public function checkHash($hash, $checkSuccess = false)
    {
        $customVars = $this->getCustomValues();
        $password = $checkSuccess ? $this->password1 :$this->password2;
        $hashGenerated = md5("{$this->OutSum}:{$this->InvId}:{$password}{$customVars}");
        return (strtolower($hash) == $hashGenerated);
    }
    /**
     * Проверка завершения операции (проверка оплаты). Сравнение хеша
     *
     * @param string $hash значение SignatureValue, переданное кассой на Result URL
     * @return boolean $hashValid
     */
    public function checkSuccess($hash) {
        return $this->checkHash($hash, true);
    }
    /**
    * Получение строки с пользовательскими данными для шифрования
    *
    * @param boolean $url генерация строки для использования в URL true/false
    * @return string
    */
    private function getCustomValues($url = false)
    {
        $out = '';
        $customVars = array();
        if(!empty($this->customVars))
        {
            foreach($this->customVars as $k => $v)
                $customVars[$k] = $k . '=' . $v;
                
            sort($customVars);
            if($url === TRUE)
                $out = '&' . join('&', $customVars);
            else
                $out = ':' . join(':', $customVars);
        }
        return $out;
    }
}





function get_elements_to_admin_mail($config) {
    $cost_cur =0;
    $cost = 0;
    $count = count($_SESSION['items']); 


    $result ="";
    foreach ($_SESSION['items'] as $i => $val) {
        $result.='  <table style = "text-align: center; font-size: 14px; " border="0" cellpadding="0" cellspacing="0" width="100%" class="half_table admin_table">
             <caption style="font-size: 16px; margin-bottom: 15px; padding-top:20px;" >Элемент '.($i+1).'</caption>';

        $result.=' <tr><td  width="60%"><table width="100%" style = "text-align: center; font-size: 14px; " border="1" cellpadding="0" cellspacing="0" class="half_table admin_table">';
        $result.='<tr><td style ="padding: 5px;" colspan="2">Информация о чехле</td></tr>';

        $result.='<tr><td style ="padding: 5px;">Устройство</td><td>'.$_SESSION['items'][$i]["device_name"].'</td></tr>';
        $result.='<tr><td style ="padding: 5px;">Id чехла</td><td>'.$_SESSION['items'][$i]["case_id"].'</td></tr>';
        if (isset($_SESSION['items'][$i]["device_color"]))
        $result.='<tr><td style ="padding: 5px;">Цвет устройства</td><td style="background-color: '.$_SESSION['items'][$i]["device_color"].';"></td></tr>';
        $result.='<tr><td style ="padding: 5px;">Название чехла</td><td>'.$_SESSION['items'][$i]["name_case_1"].'</td></tr>';
        $result.='<tr><td style ="padding: 5px;">Подназвание чехла</td><td>'.$_SESSION['items'][$i]["name_case_2"].'</td></tr>';
        $result.='<tr><td style ="padding: 5px;">Ссылка на изображение</td><td style ="padding: 5px;"><a href="http://'.$_SERVER['HTTP_HOST']."/".$_SESSION['items'][$i]["preview_url"].'">http://'.$_SERVER['HTTP_HOST']."/".$_SESSION['items'][$i]["preview_url"].'</a></td></tr>';
        $result.='<tr><td style ="padding: 5px;">Ширина картинки</td><td style ="padding: 5px;">'.$_SESSION['items'][$i]["image_size_width"].'</td></tr>';
        $result.='<tr><td style ="padding: 5px;">Высота картинки</td><td style ="padding: 5px;">'.$_SESSION['items'][$i]["image_size_height"].'</td></tr>';


         if ($_SESSION['items'][$i]["bg_case"]!="") {
             $result.='<tr><td style ="padding: 5px;">Фон чехла</td><td style ="padding: 5px;"><a href="http://'.$_SERVER['HTTP_HOST']."/".$_SESSION['items'][$i]["bg_case"].'">http://'.$_SERVER['HTTP_HOST']."/".$_SESSION['items'][$i]["bg_case"].'</a></td></tr>';
        }


       
        $cur_cost = get_cost_case(($_SESSION['items'][$i]["case_id"]), $config, ($_SESSION['items'][$i]["device_id_case"]));
        $cost+=$cur_cost;
        $result.='<tr><td style ="padding: 5px;">Стоимость</td><td style ="padding: 5px;">'.$cur_cost.'</td></tr>';

        if ($_SESSION['items'][$i]["text"]!="") {
             $result.='<tr><td style ="padding: 5px;" colspan="2">Информация о тексте</td></tr>';
             $result.='<tr><td style ="padding: 5px;">Текст</td><td style ="padding: 5px;">'.$_SESSION['items'][$i]["text"].'</td></tr>';
             if( $_SESSION['items'][$i]["font_color"]!="") {
                 $result.='<tr><td style ="padding: 5px;">Цвет текста</td><td>'.$_SESSION['items'][$i]["font_color"].'</td></tr>';
             }
             if( $_SESSION['items'][$i]["font_pattern"]!="") {
                 $result.='<tr><td style ="padding: 5px;">Паттерн текста</td><td><a href="http://'.$_SERVER['HTTP_HOST']."/".$_SESSION['items'][$i]["font_pattern"].'">http://'.$_SERVER['HTTP_HOST']."/".$_SESSION['items'][$i]["font_pattern"].'</a></td></tr>';
             }
             $result.='<tr><td style ="padding: 5px;">Размер текста</td><td>'.$_SESSION['items'][$i]["font_size"].'</td></tr>';
             $result.='<tr><td style ="padding: 5px;">Шрифт</td><td>'.$_SESSION['items'][$i]["font_family"].'</td></tr>';
             $result.='<tr><td style ="padding: 5px;">Координата X</td><td>'.$_SESSION['items'][$i]["font_x"].'</td></tr>';
             $result.='<tr><td style ="padding: 5px;">Координата Y</td><td>'.$_SESSION['items'][$i]["font_y"].'</td></tr>';
             $result.='<tr><td style ="padding: 5px;">Ширина текста</td><td>'.$_SESSION['items'][$i]["font_width"].'</td></tr>';
              $result.='<tr><td style ="padding: 5px;">Высота текста</td><td>'.$_SESSION['items'][$i]["font_height"].'</td></tr>';




             $result.='<tr><td style ="padding: 5px;">Угол поворота текста</td><td>'.$_SESSION['items'][$i]["font_rotate"].'</td></tr>';
             
             
        }
        if (count($_SESSION['items'][$i]["smiles"])>0) {
            $result.='<tr><td style ="padding: 5px;" colspan="2">Информация о cмайлах</td></tr>';
            $count_smiles = 0;
     
            foreach ($_SESSION['items'][$i]["smiles"] as $j => $value) {
                $count_smiles++;
                $result.='<tr><td style ="padding: 5px;" colspan="2">Смайл '.$count_smiles.'</td></tr>';
                $result.='<tr><td style ="padding: 5px;">Ширина смайла</td><td>'.$_SESSION['items'][$i]["smiles"][$j]["smile_width"].'</td></tr>';
                $result.='<tr><td style ="padding: 5px;">Высота смайла</td><td>'.$_SESSION['items'][$i]["smiles"][$j]["smile_height"].'</td></tr>';
                $result.='<tr><td style ="padding: 5px;">Координата по X</td><td>'.$_SESSION['items'][$i]["smiles"][$j]["smile_x"].'</td></tr>';
                $result.='<tr><td style ="padding: 5px;">Координата по Y</td><td>'.$_SESSION['items'][$i]["smiles"][$j]["smile_y"].'</td></tr>';
                $result.='<tr><td style ="padding: 5px;">Поворот смайла</td><td>'.$_SESSION['items'][$i]["smiles"][$j]["smile_rotate"].'</td></tr>';
               $result.='<tr><td style ="padding: 5px;">Ссылка на смайл</td><td><a href="http://'.$_SERVER['HTTP_HOST']."/".$_SESSION['items'][$i]["smiles"][$j]["smile_url"].'">http://'.$_SERVER['HTTP_HOST']."/".$_SESSION['items'][$i]["smiles"][$j]["smile_url"].'</a></td></tr>';

            }
                
        }



        $src = "http://".$_SERVER['HTTP_HOST']."/".$_SESSION['items'][$i]["preview_url"];

        $result.='</table></td><td style ="padding: 5px;" width="40%"><img width="auto" height="auto" src="'.$src.'" alt ="Элемент '.($i+1).'"></td></tr>';

        $result.='</table>';
    }
     return array($result, $cost);
}

function get_elements_to_raspechat() {
    $count = count($_SESSION['items']); 
    $result ="";
    $column_num = 1;
    foreach ($_SESSION['items'] as $i => $val) {
        if ($column_num == 1) {
            $result.= '
            <article>
                <table>
                    <tr>
            ';
        }
        $result.= '
                        <!-- колонка с чехлом повторяется 3 раза, после чего пишется новый article на новой странице-->
                        <td>
                            <table>
                                <tr>
                                    <td>'.$_SESSION['items'][$i]["device_name"].'</td>
                                </tr>
                                <tr>
                                    <td>'.$_SESSION['items'][$i]["name_case_1"].'</td>
                                </tr>
                                <tr>
                                    <td>'.$_SESSION['items'][$i]["name_case_2"].'</td>
                                </tr>
                                <tr>
                                    <td >
                                        <img src="http://'.$_SERVER['HTTP_HOST']."/".$_SESSION['items'][$i]["preview_url"].'">
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <!-- -->';
        if ($column_num == 3) {
            $result.= '
                    </tr>
                </table>
            </article>
            ';
            $column_num=0;
        }
        $column_num ++;
    }
    return $result;
}




function url(){
  return sprintf(
    "%s://%s%s",
    isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
    $_SERVER['SERVER_NAME'],
    $_SERVER['REQUEST_URI']
  );
}

/*Определение рабочего дня*/

abstract class BankDay {
  protected static $holidays = array(
                                '01-01',
                                '01-02',
                                '01-03',
                                '01-04',
                                '01-05',
                                '01-07',
                                '02-23',
                                '03-08',
                                '05-01',
                                '05-09',
                                '06-12',
                                '11-04'
                              );
    # 1, 2, 3, 4 и 5 января - Новогодние каникулы;
    # 7 января - Рождество Христово;
    # 23 февраля - День защитника Отечества;
    # 8 марта - Международный женский день;
    # 1 мая - Праздник Весны и Труда;
    # 9 мая - День Победы;
    # 12 июня - День России;
    # 4 ноября - День народного единств

  protected static $weekends = array(0, 6);
    # 0 - Воскресенье
    # 6 - Суббота

  /**
   * Подготавливает дату для дальнейшей работы
   * @param string $date Дата отсчета
   * @return timestamp
   */
  public static function prepareDate($s) {
    if ($s !== null && !is_int($s)) {
      $ts = strtotime($s);
      if ($ts === -1 || $ts === false) {
        throw new Exception('Unable to parse date/time value from input: '.var_export($s, true));
      }
    }
    else {
      $ts = $s;
    }
    return $ts;
  }

  /**
   * Определяет выходной ли день
   * @param string $date Дата
   * @return boolean
   */
  public static function isWeekend($date) {
    $ts = self::prepareDate($date);
    return in_array(date('w', $ts), self::$weekends);
  }

  /**
   * Определяет праздничный ли день
   * @param string $date Дата
   * @return boolean
   */
  public static function isHoliday($date) {
    $ts = self::prepareDate($date);
    return in_array(date('m-d', $ts), self::$holidays);
  }

  /**
   * Определяет рабочий ли день
   * @param string $date Дата
   * @return boolean
   */
  public static function isWorkDay($date) {
    $ts = self::prepareDate($date);
    $holidays = self::getHolidays($ts);
    return !in_array(date('Y-m-d', $ts), $holidays);
  }

  /**
   * Возвращает массив выходных дней с учетом праздников
   * @param string $date Дата отсчета
   * @param integer $interval Интервал (дней)
   * @return array
   */
  public static function getHolidays($date, $interval = 30) {
    $ts = self::prepareDate($date);
    $holidays = array();

    for ($i = -$interval; $i <= $interval; $i++) {
      $curr = strtotime($i.' days', $ts);

      if (self::isWeekend($curr) || self::isHoliday($curr)) {
        $holidays[] = date('Y-m-d', $curr);
      }
    }

    // Перенос праздников
    foreach ($holidays as $date) {
      $ts = self::prepareDate($date);
      if (self::isHoliday($ts) && self::isWeekend($ts)) {
        $i = 0;
        while (in_array(date('Y-m-d', strtotime($i.' days', $ts)), $holidays)) {
          $i++;
        }
        $holidays[] = date('Y-m-d', strtotime($i.' days', $ts));
      }
    }

    return $holidays;
  }


  /**
   * Возвращает дату +$days банковских дней
   * @param string $start Дата отсчета
   * @param integer $days Кол-во банковских дней
   * @param string $format Формат date()
   * @return integer, string
   */
  public static function getEndDate($start, $days, $format = null) {
    $ts = self::prepareDate($start);
    $holidays = self::getHolidays($start);

    for ($i = 0; $i <= $days; $i++) {
      $curr = strtotime('+'.$i.' days', $ts);
      if (in_array(date('Y-m-d', $curr), $holidays)) {
        $days++;
      }
    }

    if ($format) {
      return date($format, strtotime('+'.$days.' days', $ts));
    }
    else {
      return strtotime('+'.$days.' days', $ts);
    }
  }



  /**
   * Возвращает кол-во банковских дней заданном периоде
   * @param string $start Дата отсчета
   * @param string $end Кол-во банковских дней
   * @return integer
   */
  public static function getNumDays($start_in, $end_in) {
    $start = self::prepareDate($start_in);
    $end = self::prepareDate($end_in);

    if ($start > $end) {
      throw new Exception(sprintf('Start date ("%s") bust be greater then end date ("%s"). ', $start_in, $end_in));
    }

    $bank_days = 0;
    $days = ceil(($end - $start) / 3600 / 24 );
    $holidays = self::getHolidays($start, $days);
    for ($i = 0; $i <= $days; $i++) {
      $curr = strtotime('+'.$i.' days', $start);
      if (!in_array(date('Y-m-d', $curr), $holidays)) {
        $bank_days++;
      }
    }

    return $bank_days;
  }
}

?>