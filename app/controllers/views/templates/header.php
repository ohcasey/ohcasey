<!DOCTYPE html>
<html>
<head>
<title>
<?php 
	if ($controller_name=="main") {
		echo "Ohcasey | Конструктор чехлов";
	}
	if ($controller_name=="cart") {
		echo "Ohcasey | Корзина";
	}
?>

</title>
	<link rel="shortcut icon" href="img/128.png" type="image/png" />
	<link rel="apple-touch-icon" href="img/apple-touch-icon.png" />
	<link rel="apple-touch-icon" sizes="57x57" href="img/apple-touch-icon-57x57.png" />
	<link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png" />
	<link rel="apple-touch-icon" sizes="76x76" href="img/apple-touch-icon-76x76.png" />
	<link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png" />
	<link rel="apple-touch-icon" sizes="120x120" href="img/apple-touch-icon-120x120.png" />
	<link rel="apple-touch-icon" sizes="144x144" href="img/apple-touch-icon-144x144.png" />
	<link rel="apple-touch-icon" sizes="152x152" href="img/apple-touch-icon-152x152.png" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css">
	<link rel="stylesheet" type="text/css" href="css/sweet-alert.css">	
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/perfect-scrollbar.css">

</head>
<body>

<div class="main_container">
	<div class="alert_write"> 
		
		<div class="alert_opacity"></div>
		<div class="alert_write_block">
			<div class="alert_write_item">
				<input type="text" class="input_write" placeholder="Введите текст">
				<button class="btn_write no_write"></button>
				<button class="btn_write ok_write"></button>
			</div>
			<span>Вы можете написать любой текст,<br>
	не превышая 20 знаков</span>
	</div>
	</div>
	<div class="alert_out_svg">
		<div class="alert_out_svg-overlay">
		</div>
		<span class="alert_out_svg-text">Осторожно!<br>Ваш текст приближается к границе печати чехла.</span>
	</div>

	<div class="alert_block alert_device">
		<div class="alert_block_item">
				<div class="alert_block_item-overlay"></div>
				<h2>Вы хотите выбрать новый девайс?</h2>
				<div class="left_button buttons_block">
					<button class="btn no_device no_button">Нет</button>
				</div>
				<div class="right_button buttons_block">
					<button class="btn yes_device yes_button">Да</button>
				</div>
				<span>Выбирая новый девайс,<br>
			Вам придется начать все оформление сначала.</span>
		
		</div>
	</div>

	<div class="alert_block alert_save">
		<div class="alert_block_item">
				<div class="alert_block_item-overlay"></div>
				<h2>Отправить чехол в корзину?</h2>
				<div class="left_button buttons_block">
					<button class="btn no_device no_button">Нет</button>
				</div>
				<div class="right_button buttons_block">
					<button class="btn yes_save yes_button">Да</button>
				</div>
				<span>Поместив чехол в корзину,<br>
			Вы не сможете более отредактировать его.</span>
		
		</div>
	</div>
	<div class="overlay-inspire">
		<div class="overlay-inspire__overlay"></div>
		<div class="back_block lefted">
				вернуться
				<div></div>
		</div>
		<div class="line_block top"></div>
		<div class="line_block"></div>
		<div class="inspire__container">
			<div class="back_block">
				вернуться
				<div></div>
			</div>
			<h2>Для большего вдохновения, посетите наш Инстаграм</h2>
			<a class="instagram_button" href="https://instagram.com/_ohcasey_" title="Наш инстаграм"></a>
			<div class="inspire_item_block">

				<img class="item" id = "pict1" src="">	
				<img class="item big" id = "pict2" src="">	
				<img class="item" id = "pict3" src="">	
				<img class="item" id = "pict4" src="">	

				<img class="item" id = "pict5" src="">	
				<img class="item" id = "pict6" src="">	
				<img class="item" id = "pict7" src="">	
				<img class="item big" id = "pict8" src="">	

				<img class="item big" id = "pict9" src="">	
				<img class="item big" id = "pict10" src="">	
				<img class="item" id = "pict11" src="">	
			

			</div>

		</div>
	</div>
	<div id="header">
		<ul id="header-menu">
			<li id="header-logo">
				<a href="/"></a>
			</li>
			<li data-menu-id="1" id="header-menu-item-1" class="header_menu__item">
				<a title="Девайс" href="/#device">
					ДЕВАЙС
				</a>
			</li>
			<li class="header-menu__delimeter"><span></span></li>
			<li data-menu-id="2" id="header-menu-item-2" class="header_menu__item">
				<a title="Чехол" href="/#case">ЧЕХОЛ</a>
			</li>
			<li class="header-menu__delimeter"><span></span></li>
			<li data-menu-id="3" id="header-menu-item-3" class="header_menu__item">
				<a title="Текст" href="/#text">ТЕКСТ</a>
			</li>
			<li class="header-menu__delimeter"><span></span></li>
			<li data-menu-id="4" id="header-menu-item-4" class="header_menu__item">
				<a title="Цвет" href="/#color">ЦВЕТ</a>
			</li>
			<li class="header-menu__delimeter"><span></span></li>
			<li data-menu-id="5" id="header-menu-item-5" class="header_menu__item">
				<a title="Фон" href="/#background">ФОН</a>
			</li>
			<li class="header-menu__delimeter"><span></span></li>
			<li data-menu-id="6" id="header-menu-item-6" class="header_menu__item">
				<a title="Смайлы" href="/#smiles">СМАЙЛЫ</a>
			</li>
		</ul>
	</div>