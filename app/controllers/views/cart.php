<?php include "templates/header.php";?>
<div id="main" class="cart_page">
	<?php include "templates/left_block.php";?>

	<div id = "center">
		<form id = "order_form" name="order_form"  action="/cart/confirm_order" method="post">
			<div class="overflow_form">
				<div id="right-1" class="right_content_block">
				<div class="right_menu_title_3">Заполните форму заказа</div>
				<div class="right_item"> 
					<input type="text" name="fio" placeholder = "* Имя, Фамилия" class="cart_item item_important fio" value="<?php  if (isset($_SESSION['fio'])) { echo $_SESSION['fio'];}?>">
					<input type="email" name="email" placeholder = "* E-mail" class="cart_item half_item item_important email" value="<?php  if (isset($_SESSION['email'])) { echo $_SESSION['email'];}?>">
					<input type="text" name="phone" placeholder = "* Телефон" class="cart_item item_right half_item item_important phone" value="<?php  if (isset($_SESSION['phone'])) { echo $_SESSION['phone'];}?>">
					<div class="city_block">
						<input type="text" name="city" placeholder = "* Город" class="cart_item item_important city" value="<?php echo $city; ?>" autocomplete="off">
						<div class = "result_city">
						</div>
					</div>
					<input type="text" name="index" placeholder = "* Индекс" class="cart_item item_right half_item index" value="<?php  if (isset($_SESSION['index'])) { echo $_SESSION['index'];}?>">
					<textarea placeholder="* Адрес доставки" name="adress" class="cart_item adress"><?php if (isset($_SESSION['city'])) { if ($city==$_SESSION['city'])  { echo $_SESSION['adress'];} }?></textarea>
					<textarea placeholder="Комментарии к заказу" name="comments" class="cart_item comments"></textarea>
				</div>
				
				<div class="right_item">
					<div class="right_menu_title_2">Выберите способ доставки</div>
					<div class="checkbox_item person">
						<div class="order_form-box">
								<input type="radio" name="deliver" value="self" id ="self" data-delivery="<?php echo $config['deliver_cost']['self'] ?>">
								<div class="checkbox_prev_input">
									<div class="checkbox_selector"></div>
								</div>
							<div class="cart_help_button">
								<div class="help_block">
									Шоурум находится по адресу м. Таганская,
										ул. Таганская 24 стр. 1, ежедневно с 12 до 20) 
								</div>
							</div>
							<div class="order_form-box_block"> 
								<span class="new_line">Самовывоз из шоурума</span>
								<span class="checkbox_hided">Москва, м. Таганская
								<br>ул. Таганская д. 24 стр. 1</span>
							</div>
							<div class="order_form-box_block">
								<p class="time_order" >2 дня</p>
								<input type="text" placeholder="Дата визита" name="calendar_self" class="calendar checkbox_hided" id="calendar_self">
							</div>
							<div class="order_form-box_block right">
								<p class="cost_level"><?php echo $config['deliver_cost']['self'] ?>р</p>
							</div>
						</div>
					</div>


					<div class="checkbox_item sdec">
						<div class="order_form-box">
								<input type="radio" name="deliver" value="sdec" id ="sdec" data-delivery="0">
								<div class="checkbox_prev_input">
									<div class="checkbox_selector"></div>
								</div>
							<div class="cart_help_button">
								<div class="help_block">
									Пункты самовывоза курьерской компании <a href="http://cdek.ru" target="_balnk">СДЭК</a>. Выберите этот способ доставки и на появившейся карте вашего города выберите удобный вам пункт самовывоза.
								</div>
							</div>
							<div class="order_form-box_block"> 
								<span class="new_line">Пункты самовывоза</span>
								<span class="checkbox_hided sdec_address">Выбрать пункт выдачи</span>

								<input type="hidden" name="sdec_code" id="sdec_code" value="">
								<input type="hidden" name="sdec_adress" id="sdec_adress" value="">
								<input type="hidden" name="sdec_cost" id="sdec_cost" value="">
								<input type="hidden" name="sdec_name" id="sdec_name" value="">
								<input type="hidden" name="sdec_worktime" id="sdec_worktime" value="">

							</div>
							<div class="order_form-box_block">
								<p class="time_order" >Выберите</br> пункт</p>
								<input type="text" placeholder="Дата визита" class="calendar checkbox_hided" name="calendar_sdec" id="calendar_sdec">

							</div>
							<div class="order_form-box_block right">
								<p class="cost_level sdec_cost">-</p>
							</div>
						</div>
					</div>


					<div class="checkbox_item deliver moscow">
						<div class="order_form-box">
								<input type="radio" name="deliver" value="kur_mos" id ="kur_mos" data-delivery="<?php echo $config['deliver_cost']['kur_mos'] ?>">
								<div class="checkbox_prev_input">
									<div class="checkbox_selector"></div>
								</div>
							<div class="cart_help_button">
								<div class="help_block">
									Доставка нашим курьером в пределах МКАД
								</div>
							</div>
							<div class="order_form-box_block"> 
								<span class="new_line">Курьер по Москве в пределах МКАД</span>
								<input type="hidden" name="russia_cost" id="russia_cost" value="">
								
							</div>
							<div class="order_form-box_block">
								<p class="time_order" >2 дня</p>
								<input type="text" placeholder="Дата визита" class="calendar checkbox_hided" name="calendar_moscow"  id="calendar_moscow">
							</div>
							<div class="order_form-box_block right">
								<p class="cost_level"><?php echo $config['deliver_cost']['kur_mos'] ?>р</p>
							</div>
						</div>

					</div>

					<div class="checkbox_item deliver russia">
						<div class="order_form-box">
								<input type="radio" name="deliver" value="kur_rus" id ="kur_rus" data-delivery="0">
								<div class="checkbox_prev_input">
									<div class="checkbox_selector"></div>
								</div>
							<div class="cart_help_button">
								<div class="help_block">
									Доставка курьерской компанией <a href="http://cdek.ru" target="_balnk">СДЭК</a>. Выберите этот способ доставки и кликните "дата визита", чтобы увидеть ближайшую возможную дату доставки в вашем городе.
								</div>
							</div>
							<div class="order_form-box_block"> 
								<span class="new_line">Курьером по России</span>	
							</div>
							<div class="order_form-box_block">
								<p class="time_order" >3-5 дней</p>
								<input type="text" placeholder="Дата визита" name="calendar_russia" class="calendar checkbox_hided" id="calendar_russia">
							</div>
							<div class="order_form-box_block right">
								<p class="cost_level russia_cost">-</p>
							</div>
						</div>
					</div>

					<div class="checkbox_item mail">
						<div class="order_form-box">
									<input type="radio" name="deliver" value="mail_ru" id ="mail_ru" data-delivery="<?php echo $config['deliver_cost']['mail_ru'] ?>">
								<div class="checkbox_prev_input">
									<div class="checkbox_selector"></div>
								</div>
							<div class="cart_help_button">
								<div class="help_block">
									Доставка в отделение Почты России
								</div>
							</div>
							<div class="order_form-box_block"> 
								<span class="new_line">Почта России</span>
								
							</div>
							<div class="order_form-box_block">
								<p class="time_order" >7-9 дней</p>
							
							</div>
							<div class="order_form-box_block right">
								<p class="cost_level"><?php echo $config['deliver_cost']['mail_ru'] ?>р</p>
							</div>
						</div>
					</div>
				</div>
			
				<div class="right_item">
					<div class="right_menu_title_2">Выберите способ оплаты</div>
					<div class="checkbox_item cash">
						<input type="radio" name="payment" value="cash" id = "cash"  class="disabled" >
						<div class="checkbox_prev_input">
							<div class="checkbox_selector"></div>
						</div>
						<span>Наличными</span>
					</div>
					<div class="checkbox_item sber">
						<input type="radio" name="payment" value="sber" id = "sber"  class="disabled">
						<div class="checkbox_prev_input">
							<div class="checkbox_selector"></div>
						</div>
						<span >Картой сбербанка</span>
					</div>
					<div class="checkbox_item robocassa">
						<input type="radio" name="payment" value="robocassa" id = "robocassa" class="disabled">
						<div class="checkbox_prev_input">
							<div class="checkbox_selector"></div>
						</div>
						<span >Банковской картой онлайн</span>
					</div>
				</div>
			</div>
			</div>
			
		</form>
		<div class="center_bottom"> 
			<div class="half">
				<div class="half">
					<span>Cумма:</span>
					<span>Доставка:</span>
				</div>
				<div class="half">
					<span  class="cost_item" >0 рублей</span>
					<span data-delivery="0" class="delivery_cost">0 рублей</span>
				</div>
			</div>
			<div class="half">
				<span class="result" >Итого: 0 рублей</span> 
			</div>
		</div>
	</div>



	<div id="right" class="cart">
		 <div class="cart_items_block" >
		 <div class="empty_cart">
		 	В корзине пока ничего нет :(
		 </div>
		<?php // print_r($_SESSION['items']) 
			if (isset($_SESSION['items'])) {
				   foreach ($_SESSION['items'] as $i => $value) {
				   	$price = get_cost_case($_SESSION['items'][$i]["case_id"], $config, $_SESSION['items'][$i]["device_id_case"]);
				   	?>
				   		<div class="cart_item_block" data-cost="<?php echo 	$price; ?>" id="<?php echo $i ;?>" style ="background-image: url(<?php echo $_SESSION['items'][$i]["preview_url"] ;?>);">
				   			<div class="cache_name_block">
				   				<span class="library-case_row-block-1"><?php echo $_SESSION['items'][$i]["name_case_1"] ;?></span>
								<span class="library-case_row-block-2"><?php echo $_SESSION['items'][$i]["name_case_2"] ;?></span>
				   			</div>
				   			<div class="cache_name_block">
								<span>Цена: <?php echo 	$price; ?> р.</span>
							</div>

				   			<div class="cart_item_block__close"></div>
				   		</div>
				   	
				   	<?php      
				   }
			}
		?>
		</div>
		

	</div>

</div>

<div id ="footer"></div>
<div id="steps_controller" class="cart">
	<div id="steps_controller-checkout_but" class="active make_more"><div><a title="Сделать еще" href="/">Сделать еще</a></div></div>
	<div id="steps_controller-next_but" class=" active cart_item"><div title="Оформить">Оформить</div></div>
</div>
<?php 
	if ((isset($_SESSION['payment_result'])) && ($_SESSION['payment_result']!="")) {
		?>
		<div class="payment_message active <?php if ($_SESSION['payment_result']=='Оплата прошла неуспешно :(') echo('error'); ?>">
			<?php echo($_SESSION['payment_result']); ?>
		</div>

		<?php
	
	$_SESSION['payment_result']="";

	}
?>
</div>

<div class="alert_block alert_cart">
	<div class="container_yandex">
		<div class="rubrics">
			Выберите пункт выдачи СДЭК
			<span class="container_yandex_close">&times;</span>
		</div>
		<div class="central_block">
			<div id="map"></div>
			<div class="select_city_block">
				<div class="select-city__main-input">
					<input type="text" class="select-city__main-input__sdec" placeholder="Выберите город" value="<?php echo $city; ?>">
					<span>Выбрать другой город</span>
				</div>
				<div class = "city_list-sdec">
				</div>
			</div>
		</div>
	</div>
</div>


</body>
<script src="//api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-2.1.3.min.js"></script>
<script type="text/javascript" src="js/jquery.maskedinput.js"></script>
<script type="text/javascript" src="js/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/cart.js"></script>
<script type="text/javascript" src="js/perfect-scrollbar.js"></script>
<script type="text/javascript" src="js/jquery.mousewheel.js"></script>
<script type="text/javascript" src="js/sweet-alert.min.js"></script>
<script type="text/javascript" src="js/knob.js"></script> 	

<script type="text/javascript">
	$(document).load(function(){
			var dates1 = $(".calendar").datepicker({
			 firstDay: 1,
			monthNames:
			["Январь","Февраль","Март","Апрель","Май","Июнь","Июль","Август", 
			"Сентябрь","Октябрь","Ноябрь","Декабрь"],
			//minDate: Date()
			dayNamesMin: 
			["Вс","Пн", "Вт", "Ср", "Чт", "Пт", "Сб"],
			changeMonth: false,
			changeYear: false,
			dateFormat: 'dd.mm.yy',

			beforeShow: function() {
		        setTimeout(function(){
		            $('.ui-datepicker').css('z-index', 99999999999999);
		        }, 0);
		    }
		});

		/*на разные даты*/
		var selfDate = new Date();

		selfDate.setDate(selfDate.getDate() + 1);

		$("#calendar_self").datepicker('option', 
			{
				minDate: selfDate
			}
		);
		

		var moscowDate = new Date();

		moscowDate.setDate(moscowDate.getDate() + 2);

		$("#calendar_moscow").datepicker('option', 
			{
				minDate: moscowDate
			}
		);


		var russiaDate = new Date();

		russiaDate.setDate(russiaDate.getDate() + 4);

		$("#calendar_russia").datepicker('option', 
			{
				minDate: russiaDate
			}
		);


		

		$(".calendar").change(function(){
			$(this).val($(this).val().replace('Январь', 'Января'));
			$(this).val($(this).val().replace('Февраль', ' Февраля '));
			$(this).val($(this).val().replace('Март', ' Марта '));
			$(this).val($(this).val().replace('Апрель', 'Апреля'));
			$(this).val($(this).val().replace('Май', 'Мая'));
			$(this).val($(this).val().replace('Июнь', 'Июня'));
			$(this).val($(this).val().replace('Июль', 'Июля'));	
			$(this).val($(this).val().replace('Август', 'Августа'));
			$(this).val($(this).val().replace('Сентябрь', 'Сентября'));
			$(this).val($(this).val().replace('Октябрь', 'Октября'));
			$(this).val($(this).val().replace('Ноябрь', 'Ноября'));
			$(this).val($(this).val().replace('Декабрь', 'Декабря'));
		});
	});

</script>
</html>
