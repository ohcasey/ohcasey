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


function save_img(){
    $dir = "uploaded_images";
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


function mysqlconnect($bd_controls){

    if (gethostname() === "dmitry-HP-Pavilion-dv7-Notebook-PC") {
        $dbhost = "localhost"; 
        // Имя пользователя базы данных 
        $dbuser = "root"; 
            // и его пароль 
        $dbpass = "as210100"; 
            // Имя базы данных, на хостинге или локальной машине 
        $dbname = "cities"; 
    }else{
        $dbhost = $bd_controls["mysql.server"]; 
        // Имя пользователя базы данных 
        $dbuser = $bd_controls["u11014_ohcasey"]; 
            // и его пароль 
        $dbpass = $bd_controls["ohcasey"]; 
            // Имя базы данных, на хостинге или локальной машине 
        $dbname = $bd_controls["u11014_ohcasey"]; 
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



function get_mail($config, $mail_controls){
  

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


    echo $_SESSION['fio'];



 if ((isset($fio)) &&  (isset($email)) && (isset($phone)) && (isset($city)) && (isset($deliver)) && (isset($payment))) {

    $zakaz_number=time();
    $_SESSION['zakaz_number'] = $zakaz_number;
    $time_order = date("d.m.y H:i:s");
    $_SESSION['time_order'] =  $time_order;

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

    $mail->isHTML(true);                                  // Set email format to HTML


    $body = file_get_contents('mail_templates/admin.html');


    
    $body = str_replace('$time_order', $time_order, $body);
    $body = str_replace('$fio', $fio, $body);
    $body = str_replace(' $zakaz_number',  $zakaz_number, $body);
    $body = str_replace('$email', $email, $body);
    $body = str_replace('$phone', $phone, $body);
    $body = str_replace('$city', $city, $body);

    $cost = 0;
    $cost += $config["deliver_cost"][$deliver];

    /*
        тут все остальное
    */
    $deliver_type ="";


    if ($deliver=="self"){
        $deliver_type = "Cамовывоз";

    }
    if ($deliver=="kur_mos"){
          $deliver_type = "Курьер по Москве";

    }
    if ($deliver=="kur_rus"){
        $deliver_type = "Курьер по России";

    }
    if ($deliver=="mail_ru"){
        $deliver_type = "Почта России";
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




    $cost+=$elements[1];
    $body = str_replace('$deliver', $deliver_type, $body);

    $body = str_replace('$payment', $payment_type, $body);

    $body = str_replace('$cost', $cost, $body);

    if (isset($adress)) {
         $body = str_replace('$adress','<tr>
                                                        <td style ="padding: 5px;" width="50%">Адрес</td>
                                                        <td style ="padding: 5px;">'.$adress.'</td>
                                                    </tr>', $body);
    }else{
        $body = str_replace('$adress', "", $body);
    }

    if (isset($comments)) {
         $body = str_replace('$comments', '<tr>
                                                        <td style ="padding: 5px;" width="50%">Комментарии к заказу</td>
                                                        <td style ="padding: 5px;">'.$comments.'</td>
                                                    </tr>', $body);
    }else{
        $body = str_replace('$comments', "", $body);
    }




    $body = str_replace('$time_order', $time_order, $body);
    
    // strip backslashes
    $body = preg_replace('/\\\\/','', $body);



    $mail->Subject = 'Новый заказ №'.$zakaz_number;
    $mail->MsgHTML($body);
    $mail->CharSet="utf-8";

    
    

    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if(!$mail->send()) {
        
       echo 'Письмо админу не отправлено.';
       echo 'Oшибка письма: ' . $mail->ErrorInfo;
    } else {

       // echo 'Письмо админу отправлено';
         
    } 



    /*mail client*/

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

    $mail->addAddress($email, $fio);     // Add a recipient

    $mail->isHTML(true);                                  // Set email format to HTML

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
    $body = str_replace('$zakaz_number',  $zakaz_number, $body);
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
        $body = str_replace('$adress_mail','', $body);
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
         $body = str_replace('$comments_mail','', $body);
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
   


    echo $body;




    
    $mail->SMTPSecure = 'tls';
    $mail->Subject = 'Заказ на сайте ohcasey.ru №'.$zakaz_number;
    $mail->addAddress($email, $fio);
    $mail->MsgHTML($body);
    $mail->CharSet="utf-8";

 
    
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients'; 

    if(!$mail->send()) {
        
        echo 'Письмо клиенту не отправлено.';
        echo 'Oшибка письма: ' . $mail->ErrorInfo;
    } else {

        echo 'Письмо админу отправлено';
       
    }


    if ($payment=="robocassa"){

        $kassa = new Robokassa('ohcasey.ru', 'hnb128gbz2', 'hnb128gbz3');
        /* назначение параметров */
        $kassa->OutSum       = $cost;
        $kassa->IncCurrLabel = 'WMRM';
        $kassa->Email = $email;

        $kassa->Desc         = 'Оплата заказа '.$zakaz_number;
        $kassa->addCustomValues(array(
            'shp_user' => $fio// все ключи массива должны быть с префиксом shp_    
        ));
        /* редирект на сайт робокассы */
        header('Location: ' . $kassa->getRedirectURL());
       exit;
    }



     header("Location: /success"); 



}else{
    header("Location: /cart"); 
}



}    


function get_client_mail($config) {
    $cost_cur =0;
    $cost = 0;
    $count = count($_SESSION['items']); 
    print_r($_SESSION['items']);

    $result ="";
    for ($i=0; $i<$count; $i++) {
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
    for ($i=0; $i<$count; $i++) {
        $result.='  <table style = "text-align: center; font-size: 14px; " border="0" cellpadding="0" cellspacing="0" width="100%" class="half_table admin_table">
             <caption style="font-size: 16px; margin-bottom: 15px; padding-top:20px;" >Элемент '.($i+1).'</caption>';

        $result.=' <tr><td  width="60%"><table width="100%" style = "text-align: center; font-size: 14px; " border="1" cellpadding="0" cellspacing="0" class="half_table admin_table">';
      

      
        $result.='<tr><td style ="padding: 5px;" colspan="2">Информация о чехле</td></tr>';

        $result.='<tr><td style ="padding: 5px;">Устройство</td><td>'.$_SESSION['items'][$i]["device_name"].'</td></tr>';
         $result.='<tr><td style ="padding: 5px;">Id чехла</td><td>'.$_SESSION['items'][$i]["case_id"].'</td></tr>';
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




function url(){
  return sprintf(
    "%s://%s%s",
    isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
    $_SERVER['SERVER_NAME'],
    $_SERVER['REQUEST_URI']
  );
}



?>