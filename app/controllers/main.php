<?php
	
	if ($action_name=="main" ) {
		include("views/main.php");
	}
	if ($action_name=="get_data" ) {
		get_config($config);
	}
	if ($action_name=="save_img" ) {
		save_img();
	}

	
?>