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
	}
	if ($controller_name == "cart") {	
		//cart
		if ($action_name=="main" ) {
			include("views/cart.php");
		}

		if ($action_name=="remove_item" ) {
			remove_item();
		}

		if ($action_name=="get_city") {
			if (isset($_POST['string'])) {

				$string = $_POST['string'];
				
				get_city_input($string);
			}else{
				$array = array();
				$result = json_encode($array, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP  );
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
	}

?>