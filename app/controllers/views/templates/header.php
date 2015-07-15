<!DOCTYPE html>
<html>
<head>
<title>
<?php 
	if ($controller_name=="main") {
		echo "Ohcasey | Конструктор";
	}
	if ($controller_name=="cart") {
		echo "Ohcasey | Корзина";
	}




?>



</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css">
	<link rel="stylesheet" type="text/css" href="css/sweet-alert.css">	
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/perfect-scrollbar.css">

</head>
<body>

<div id="header">
	<ul id="header-menu">
		<li id="header-logo">
			<a href="/"></a>
		</li>
		<li data-menu-id="1" id="header-menu-item-1">
			<a title="Девайс" href="/#device">
				ДЕВАЙС
			</a>
		</li>

		<li data-menu-id="2" id="header-menu-item-2">
			<a title="Чехол" href="/#case">ЧЕХОЛ</a>
		</li>
		<li data-menu-id="3" id="header-menu-item-3">
			<a title="Текст" href="/#text">ТЕКСТ</a>
		</li>
		<li data-menu-id="4" id="header-menu-item-4">
			<a title="Цвет" href="/#color">ЦВЕТ</a>
		</li>
		<li data-menu-id="5" id="header-menu-item-5">
			<a title="Фон" href="/#background">ФОН</a>
		</li>
		<li data-menu-id="6" id="header-menu-item-6">
			<a title="Смайлы" href="/#smiles">СМАЙЛЫ</a>
		</li>
	</ul>
</div>