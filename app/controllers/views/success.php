<!DOCTYPE html>
<html>
<head>
<title>
	Ohcasey | Спасибо за заказ
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
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
	<div class="main_container">
		<div class="line_block top"></div>
		<a class = "success-logo" href="/" title="На главную"> </a>
		<div class="inspire__container">
			<a class="instagram_button" href="https://instagram.com/_ohcasey_" title="Наш инстаграм"></a>
			<div class="center_block_success">
				<h1>СПАСИБО, ВАШ ЗАКАЗ ПРИНЯТ!</h1>
				<h2>№ <?php echo $_SESSION['zakaz_number']; $_SESSION['zakaz_number'] = "";$_SESSION['items'] = array();?></h2>
				<span>Мы отправили Вам письмо с данными заказа,<br>
проверьте, пожалуйста, все ли правильно и ждите нашего звонка.</span>
			</h1>.
			</div>
		</div>
		
			<div class="line_block"></div>
	</div>
</body>
<script type="text/javascript" src="js/jquery-2.1.3.min.js"></script>
<script type="text/javascript">
function preparing_html() {
	var html_width = $("body").width();
	var html_height = $(document).height();
	
	$(".main_container").css("height", html_height+"px");
	
}

$(document).ready(function(){
		preparing_html();
});

$(window).resize(function(){
	preparing_html();
	
});
</script>
</html>