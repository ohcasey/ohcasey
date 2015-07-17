<?php
		//main
	if ($controller_name == "404") {	
		//404
		if ($action_name=="main" ) {
			include("views/main.php");
		}
		return;
	}

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
	}

?>