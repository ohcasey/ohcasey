<?php include "templates/header.php";?>
<div id="main" class="cart_page">
	<?php include "templates/left_block.php";?>
	<div id="center">
		 <div class="cart_items_block"  >
		<?php // print_r($_SESSION['items']) 
			if (isset($_SESSION['items'])) {
				$count = count($_SESSION['items']);





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
				   		//print_r($_SESSION['items'][$i]);
					      
				   }
				
			}

		?>
		
		</div>
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
	<form id="right">
		<div id="right-1" class="right_content_block">
			<div class="right_menu_title">Заполните форму заказа</div>
			<div class="right_item"> 
				<input type="text" placeholder = "* Имя, Фамилия" class="cart_item item_important fio">
				<input type="email" placeholder = "* E-mail" class="cart_item half_item item_important email" >
				<input type="text" placeholder = "* Телефон" class="cart_item item_right half_item item_important phone">
				<input type="text" placeholder = "* Город" class="cart_item item_important city" value="Москва">
				<textarea placeholder="Адрес" class="cart_item adress"></textarea>
				<textarea placeholder="Комментарии к заказу" class="cart_item comments"></textarea>
			</div>
			
			<div class="right_item">
				<div class="right_menu_title_2">Выберите способ доставки</div>
				<div class="checkbox_item person">
					<input type="radio" name="deliver" value="self" id ="self" data-delivery="<?php echo $config['deliver_cost']['self'] ?>">
					<span>Самовывоз - <?php echo $config['deliver_cost']['self'] ?> р.</span>
				</div>
				<div class="checkbox_item deliver">
					<input type="radio" name="deliver" value="kur_mos" id ="kur_mos" data-delivery="<?php echo $config['deliver_cost']['kur_mos'] ?>">
					<span for ="kur_mos">Курьером по Москве — <?php echo $config['deliver_cost']['kur_mos'] ?> р.</span>
				</div>
				<div class="checkbox_item deliver">
					<input type="radio" name="deliver" value="kur_rus" id ="kur_rus" data-delivery="<?php echo $config['deliver_cost']['kur_rus'] ?>">
					<span for ="kur_rus">Курьером по России — от <?php echo $config['deliver_cost']['kur_rus'] ?> р.</span>
					
				</div>
				<div class="checkbox_item mail">
					<input type="radio" name="deliver" value="mail_ru" id ="mail_ru" data-delivery="<?php echo $config['deliver_cost']['mail_ru'] ?>">
					<span for ="mail_ru">Почта России — <?php echo $config['deliver_cost']['mail_ru'] ?> р.</span>
				</div>
			</div>
		
			<div class="right_item">
				<div class="right_menu_title_2">Выберите способ оплаты</div>
				<div class="checkbox_item cash">
					<input type="radio" name="payment" value="cash"  class="disabled" >
					<span >Наличными</span>
				</div>
				<div class="checkbox_item sber">
					<input type="radio" name="payment" value="sber"  class="disabled">
					<span >Картой сбербанка</span>
				</div>
				<div class="checkbox_item robocassa">
					<input type="radio" name="payment" value="robocassa" class="disabled">
					<span >Робокасса</span>
				</div>
			</div>
		</div>
		<div id="steps_controller">
			<div id="steps_controller-checkout_but" class="active make_more"><div><a title="Сделать еще" href="/">Сделать еше</a></div></div>
			<div id="steps_controller-next_but" class=" active cart_item"><div title="Оформить">Оформить</div></div>
		</div>
	</form>
</div>
<div id ="footer"></div>
</body>

<script type="text/javascript" src="js/jquery-2.1.3.min.js"></script>
<script type="text/javascript" src="js/phone_input.js"></script>
<script type="text/javascript" src="js/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/cart.js"></script>
<script type="text/javascript" src="js/perfect-scrollbar.js"></script>
<script type="text/javascript" src="js/jquery.mousewheel.js"></script>
<script type="text/javascript" src="js/sweet-alert.min.js"></script>	

</html>