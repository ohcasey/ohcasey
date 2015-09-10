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
					<input type="text" name="index" placeholder = "* Индекс" class="cart_item item_right half_item item_important index" value="<?php  if (isset($_SESSION['index'])) { echo $_SESSION['index'];}?>">
					<textarea placeholder="Почтовый индекс и адрес доставки" name="adress" class="cart_item adress"><?php if (isset($_SESSION['city'])) { if ($city==$_SESSION['city'])  { echo $_SESSION['adress'];} }?></textarea>
					<textarea placeholder="Комментарии к заказу" name="comments" class="cart_item comments"></textarea>
				</div>
				
				<div class="right_item">
					<div class="right_menu_title_2">Выберите способ доставки</div>
					<div class="checkbox_item person">
						<input type="radio" name="deliver" value="self" id ="self" data-delivery="<?php echo $config['deliver_cost']['self'] ?>">
						<div class="checkbox_prev_input">
							<div class="checkbox_selector"></div>
						</div>
						<span>Самовывоз - <?php echo $config['deliver_cost']['self'] ?> р.</span>
						<div class="cart_help_button">
							<div class="help_block">
								Самовывоз по Москве осуществляется по адресу м. Таганская
									ул. Гончарная д. 5 Время работы: с 10 до 19
								<div class="separator"></div>
							</div>
						</div>
					</div>

					<div class="checkbox_item sdec">
						<input type="radio" name="deliver" value="sdek" id ="sdek" data-delivery="">
						<div class="checkbox_prev_input">
							<div class="checkbox_selector"></div>
						</div>
						<div class="cart_help_button">
						</div>
						<span class="two_line">Самовывоз их пункта выдачи СДЭК</span>
						<span>Москва, Нелидовская улица д.10</span>

						
					</div>


					<div class="checkbox_item deliver">
						<input type="radio" name="deliver" value="kur_mos" id ="kur_mos" data-delivery="<?php echo $config['deliver_cost']['kur_mos'] ?>">
						<div class="checkbox_prev_input">
							<div class="checkbox_selector"></div>
						</div>
						<span for ="kur_mos">Курьером по Москве — <?php echo $config['deliver_cost']['kur_mos'] ?> р.</span>
						<div class="cart_help_button">
						</div>
					</div>

					<div class="checkbox_item deliver">
						<input type="radio" name="deliver" value="kur_rus" id ="kur_rus" data-delivery="<?php echo $config['deliver_cost']['kur_rus'] ?>">
						<div class="checkbox_prev_input">
							<div class="checkbox_selector"></div>
						</div>
						<span for ="kur_rus">Курьером по России — от <?php echo $config['deliver_cost']['kur_rus'] ?> р.</span>
						
					</div>
					<div class="checkbox_item mail">
						<input type="radio" name="deliver" value="mail_ru" id ="mail_ru" data-delivery="<?php echo $config['deliver_cost']['mail_ru'] ?>">
						<div class="checkbox_prev_input">
							<div class="checkbox_selector"></div>
						</div>
						<span for ="mail_ru">Почта России — <?php echo $config['deliver_cost']['mail_ru'] ?> р.</span>
					</div>
				</div>
			
				<div class="right_item">
					<div class="right_menu_title_2">Выберите способ оплаты</div>
					<div class="checkbox_item cash">
						<input type="radio" name="payment" value="cash" id = "cash"  class="disabled" >
						<div class="checkbox_prev_input">
							<div class="checkbox_selector"></div>
						</div>
						<span >Наличными</span>
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
						<span >Робокасса</span>
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

</body>
<script type="text/javascript" src="js/jquery-2.1.3.min.js"></script>
<script type="text/javascript" src="js/phone_input.js"></script>
<script type="text/javascript" src="js/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/cart.js"></script>
<script type="text/javascript" src="js/perfect-scrollbar.js"></script>
<script type="text/javascript" src="js/jquery.mousewheel.js"></script>
<script type="text/javascript" src="js/sweet-alert.min.js"></script>
<script type="text/javascript" src="js/knob.js"></script> 	

</html>
