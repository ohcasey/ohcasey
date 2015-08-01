<?php
		//main
	
	//
	if (isset($_SESSION['items'])) {
		$count_tov = count($_SESSION['items']);
	}else{
		$count_tov = 0;
	 //количество товаров
	}

	
	if ($count_tov==0) {
		$count_text = "Товаров";
	}
	if ($count_tov==1) {
		$count_text = "Товар";
	}
	if (($count_tov>=2) &&($count_tov<5)) {
		$count_text = "Товара";
	}
	if ($count_tov>=5) {
		$count_text = "Товаров";
	}

	
	if ($controller_name == "404") {	
		//404
		if ($action_name=="main" ) {
			include("views/main.php");
		}
		return;
	}

	if ($controller_name == "main") {	
		if ($action_name=="main" ) {
			include("views/main.php");
		}
		if ($action_name=="get_data" ) {
			get_config($config);
		}
		if ($action_name=="save_img" ) {
			save_img();
		}
		if ($action_name=="add_to_cart" ) {
			add_to_cart();
		}		

		if ($action_name == "save_png") {
			save_svg_to_png();
		}

	}

	if ($controller_name == "success") {	
		if (isset( $_SESSION['zakaz_number'] )) {
				if ($_SESSION['zakaz_number']!="") {
						include("views/success.php");
				}else{
					header("Location: /main"); 
				}
		}else{
			header("Location: /main"); 
		}
		
	}


	if ($controller_name == "cart") {	
		
		if ($action_name=="main" ) {
			
			$city = get_city();
			include("views/cart.php");
			exit;
		}

		if ($action_name=="remove_item" ) {
			remove_item();
			exit;
		}

		if (($action_name=="robo_success") || ($action_name=="robo_fail") || ($action_name=="robo_result")) {

			if ($action_name=="robo_result") {

				$kassa = new Robokassa('ohcasey.ru', 'hnb128gbz2', 'hnb128gbz3');
				/* назначение параметров */
				$kassa->OutSum  = $_POST['OutSum'];
				$kassa->InvId   = $_POST['InvId'];
				/* добавление кастомных полей из запроса */
				$kassa->addCustomValues(array(
				    'shp_user' => $_POST['shp_user']
				));
				/* проверка цифровой подписи запроса */
				if($kassa->checkHash($_POST['SignatureValue']))
				    echo 'Оплата проведена успешно!';
				else
				    echo 'Валидация не пройдена';
				exit;
			}


			if ($action_name=="robo_success") {
				if (isset( $_SESSION['zakaz_number'] )) {
					if ($_SESSION['zakaz_number']!="") {
						header("Location: /success");
						exit;
					}
				}
				
			}
			if ($action_name=="robo_fail") {
				$_SESSION['payment_result']='Оплата прошла неуспешно :(';
			}

			header("Location: /cart"); 
			exit;
		}




		if ($action_name=="get_city") {
			if (isset($_POST['string'])) {

				$string = $_POST['string'];
				
				get_city_input($string, $bd_controls);
			}else{

				$array = array();
				$result = json_encode($array, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP );
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
			exit;
		}

		if ($action_name=="confirm_order" ) {
			get_mail($config, $mail_controls);
			exit;
		}

		header("Location: /cart");
	}

?>