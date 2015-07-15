<?php		
			session_start();

			include("config.php");
			include("function.php");

			$action_name = 'main';
			$controller_name = 'main';
			$routes = explode('/', $_SERVER['REQUEST_URI']);


			if (!empty($routes[1]) )
			{	
			
				if (($routes[1]=="ohcasey")||($routes[1]=="caseforlesha")) {
					$controller_name = "main";
				}else{
					$controller_name = $routes[1];
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
				if (in_array($action_name, $subfunctions[$controller_name])||($action_name=="main") ){
					include('controllers/'.$controller_name.'.php');
				}else{
					include('controllers/404.php');
				}

				

			}else{
				include('controllers/404.php');
			}
?>

