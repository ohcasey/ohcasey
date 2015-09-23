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
	<script src="js/device.min.js"></script>
	<!--[if lt IE 9]>
		<script type="text/javascript">
			$(document).load(function(){
				$(".alert_block.alert_old").addClass("active");
			});
		</script>
	<![endif]-->
</head>
<body>
<?php include_once("analyticstracking.php") ?>




<div class="alert_block alert_mobile">
	<div class="container_mobile">
		<h2>В данный момент наш сайт 
оптимизирован для работы 
только с компьютеров.</h2>
		<span>Для использования всех возможностей в создании чехла, а также правильной работы системы мы очень ПРОСИМ Вас зайти к нам на сайт с компьютера. Огромное спасибо!</span>
		<button>все равно продолжить</button>
	</div>
</div>

<div class="alert_block alert_tablet">
	<div class="container_tablet">
		<h2>В данный момент наш сайт 
оптимизирован для работы 
только с компьютеров.</h2>
		<span>Для использования всех возможностей в создании чехла, а также правильной работы системы мы очень ПРОСИМ Вас зайти к нам на сайт с компьютера. Огромное спасибо!</span>
		<button>все равно продолжить</button>
	</div>
</div>

<div class="alert_block alert_old">
	<div class="container_old">
			<h2>Вы зашли на наш сайт со старой версии браузера.</h2>
		<span>Некоторый функционал может работать некорректно, а созданный чехол — не сохранится. Рекомендуем Вам обновить браузер
<br>до последней версии.</span>
		<div>
			<div>
				<a href="https://www.google.com/chrome/browser/desktop/index.html" target="_blank">обновить браузер</a>
			</div>
			<div>
				<button>все равно продолжить</button>
			</div>
		</div>
		
	</div>
</div>


<div class="alert_block alert_safari">
	<div class="container_safari">
		<img src="img/safari_sav.png" alt="сохраняем ваш чехол"/>
		<h2>Сохраняем Ваш дизайн.</h2>
		<span>Это может занять несколько минут</span>
		<div class="loader">Loading...</div>
		
	</div>
</div>

<!-- Yandex.Metrika counter --><script type="text/javascript"> (function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter32242774 = new Ya.Metrika({ id:32242774, clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true, trackHash:true }); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = "https://mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks");</script><noscript><div><img src="https://mc.yandex.ru/watch/32242774" style="position:absolute; left:-9999px;" alt="" /></div></noscript><!-- /Yandex.Metrika counter -->
<div class="main_container">
	<div id="header">
		<ul id="header-menu">
			<li id="header-logo">
				<a href="/"></a>
			</li>
			<li data-menu-id="1" id="header-menu-item-1" class="header_menu__item">

						<a title="Девайс" href="/#case" class="header_device_li">
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