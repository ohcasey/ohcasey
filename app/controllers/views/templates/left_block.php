<div id="left">
		<div id="phone"><a href="tel:79269798139" title="Телефон"> +7 (965) 396-97-85</a></div>
		<div id="left_menu">
			<a id="cart"  href="/cart" title="Корзина" class="<?php if ($controller_name=="cart") {echo "cart_cart";}?>">
				<span>
					<span class="cart_count"><?php echo $count_tov;?></span>
					 <?php echo $count_text;?>
				</span>
			</a>
			<div id="price">
				<div id="phone_model" class="<?php  if ($controller_name=="cart") {		echo 'cart_name_price';	}?>"></div>
				<div id="price_total" class="<?php  if ($controller_name=="cart") {		echo 'cart_name_price';	}?>"></div>
				<div id="price-point"></div>
			</div>
			
			<a id="left_menu-shipping" title="Калькулятор доставки" href="/dostavka">КАЛЬКУЛЯТОР ДОСТАВКИ</a>
			<a id="left_menu-help"  title="О наших чехлах" href="/podrobnee">О НАШИХ ЧЕХЛАХ</a>
			
		</div>
</div>
