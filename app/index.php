<?php		

			session_start();
	
			include("config.php");
			include("function.php");

			$action_name = 'main';
			$controller_name = 'main';
			$path = $_SERVER['REQUEST_URI'];
			$arr = parse_url($path);

			$path = $arr["path"];
			
			$routes = explode('/', $path);

			if (!empty($routes[1]) )
			{		
				$controller_name = $routes[1];

				if(strpos($controller_name ,'#')) {
					$controller_name ="main";
				}
			}

			if (!empty($routes[2]) )
			{		
				$action_name = $routes[2];	
			}

			if ($controller_name==""){
				$controller_name = 'main';
				$action_name = 'main';
			}


			if (in_array($controller_name, $pages)){
				if ((in_array($action_name, $subfunctions[$controller_name])) || ($action_name=="main") || ($action_name==$controller_name)){
					
				}else{
					$controller_name = "404";
				}

			}else{
				$controller_name = "404";
			}

			include('controllers/controller.php');
?>

