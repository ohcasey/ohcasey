<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
<<<<<<< HEAD
=======
include($_SERVER["DOCUMENT_ROOT"]."/app/controllers/controller.php");
>>>>>>> 63fad7a1e49d3da96649269b57c15320e8c514c0
include($_SERVER["DOCUMENT_ROOT"]."/app/config.php");
include($_SERVER["DOCUMENT_ROOT"]."/app/function.php");
?>
<?if (substr_count($_SERVER["REQUEST_URI"],"cart")>0) {?>

    <div id="main" class="cart_page">
<<<<<<< HEAD
        <?php include "templates/left_block.php";?>
=======
        <?php include $_SERVER["DOCUMENT_ROOT"]."/app/controllers/views/templates/left_block.php";?>
>>>>>>> 63fad7a1e49d3da96649269b57c15320e8c514c0

        <div id = "center">
            <!--<div class="form-outer-scroll">     -->
            <form id = "order_form" name="order_form"  action="/cart/confirm_order" method="post">
                <div class="overflow_form">
                    <div id="right-1" class="right_content_block">

                        <!-- CITY BLOCK -->

                        <div class = "right_item city_block">
                            <div class="right_menu_title_2">Выберите город</div>
                            <input type="text" name="city" placeholder = "* Город" class="cart_item city item_important" value="<?php echo $city; ?>" autocomplete="off">
                            <div class="result_city"></div>
                        </div>

                        <!-- // -->

                        <!-- ORDER DELIVERY BLOCK-->
                        <div class="right_item delivery_block hidden-element">
                            <div class="right_menu_title_2">Выберите способ доставки</div>
                            <div class="checkbox_item person hidden-element">
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
                                        <span class="checkbox_hided" id="info_span_self">Москва, м. Таганская<br>ул. Таганская д. 24 стр. 1</span>
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


                            <div class="checkbox_item sdec hidden-element">
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
                                        <span class="checkbox_hided sdec_address" id="info_span_sdec">Выбрать пункт выдачи</span>

                                        <input type="hidden" name="sdec_code" id="sdec_code" value="">
                                        <input type="hidden" name="sdec_adress" id="sdec_adress" value="">
                                        <input type="hidden" name="sdec_cost" id="sdec_cost" value="">
                                        <input type="hidden" name="sdec_name" id="sdec_name" value="">
                                        <input type="hidden" name="sdec_worktime" id="sdec_worktime" value="">

                                    </div>
                                    <div class="order_form-box_block">
                                        <p class="time_order select_sdec active" >Выберите</br> пункт</p>
                                        <input type="text" placeholder="Дата визита" class="calendar checkbox_hided" name="calendar_sdec" id="calendar_sdec">

                                    </div>
                                    <div class="order_form-box_block right">
                                        <p class="cost_level sdec_cost">-</p>
                                    </div>
                                </div>
                            </div>


                            <div class="checkbox_item deliver moscow hidden-element">
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

                            <div class="checkbox_item deliver russia hidden-element">
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
                                        <p class="time_order select_city active" >3-5 дней</p>
                                        <input type="text" placeholder="Дата визита" name="calendar_russia" class="calendar checkbox_hided" id="calendar_russia">
                                    </div>
                                    <div class="order_form-box_block right">
                                        <p class="cost_level russia_cost">-</p>
                                    </div>
                                </div>
                            </div>

                            <div class="checkbox_item mail hidden-element">
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



                        <!-- /ORDER DELIVERY BLOCK-->




                        <!-- ORDER DETAILS BLOCK -->
                        <div class="right_item details_block hidden-element">
                            <div class="right_menu_title_3">Заполните форму заказа</div>

                            <div class="right_item">

                                <input type="text" name="fio" placeholder = "* Имя, Фамилия" class="cart_item item_important fio" value="<?php  if (isset($_SESSION['fio'])) { echo $_SESSION['fio'];}?>">

                                <input type="email" name="email" placeholder = "* E-mail" class="cart_item half_item item_important email" value="<?php  if (isset($_SESSION['email'])) { echo $_SESSION['email'];}?>">

                                <input type="text" name="phone" placeholder = "* Телефон" class="cart_item item_right half_item item_important phone" value="<?php  if (isset($_SESSION['phone'])) { echo $_SESSION['phone'];}?>">

                                <input type="text" name="index" placeholder = "* Индекс" class="cart_item index hidden-element item_important" value="<?php  if (isset($_SESSION['index'])) { echo $_SESSION['index'];}?>">

                                <textarea placeholder="* Адрес доставки" name="adress" class="cart_item adress hidden-element item_important"><?php if (isset($_SESSION['city'])) { if ($city==$_SESSION['city'])  { echo $_SESSION['adress'];} }?></textarea>

                                <textarea placeholder="Комментарии к заказу" name="comments" class="cart_item comments"></textarea>

                            </div>
                        </div>
                        <!-- /ORDER DETAILS FORM -->




                        <!-- ORDER PAYMENT BLOCK -->
                        <div class="right_item payment_block hidden-element">
                            <div class="right_menu_title_2">Выберите способ оплаты</div>
                            <div class="checkbox_item cash hidden-element">
                                <input type="radio" name="payment" value="cash" id = "cash">
                                <div class="checkbox_prev_input">
                                    <div class="checkbox_selector"></div>
                                </div>
                                <span>Наличными</span>
                            </div>
                            <div class="checkbox_item sber">
                                <input type="radio" name="payment" value="sber" id = "sber">
                                <div class="checkbox_prev_input">
                                    <div class="checkbox_selector"></div>
                                </div>
                                <span >Картой сбербанка</span>
                            </div>
                            <!--
                            <div class="checkbox_item robocassa">
                                <input type="radio" name="payment" value="robocassa" id = "robocassa">
                                <div class="checkbox_prev_input">
                                    <div class="checkbox_selector"></div>
                                </div>
                                <span >Банковской картой онлайн</span>
                            </div>
                            -->
                        </div>
                    </div>
                </div>
            </form>
            <!--</div>-->

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

<?}else{?>

<div id="main">
<<<<<<< HEAD
    <div id="left">
        <div id="phone"><a href="tel:79269798139" title="Телефон"> +7 (926) 979-81-39</a></div>
        <div id="left_menu">
            <a id="cart"  href="/cart" title="Корзина" class="<?php if ($controller_name=="cart") {echo "cart_cart";}?>">
				<span>
					<span class="cart_count"><?php echo $count_tov;?></span>
                    <?php echo $count_text;?>
				</span>
            </a>
            <div id="price">
                <div id="phone_model" class="<?php if ($controller_name=="cart") {		echo 'cart_name_price';	} ?>"></div>
                <div id="price_total" class="<?php if ($controller_name=="cart") {		echo 'cart_name_price';	} ?>"></div>
                <div id="price-point"></div>
            </div>
            <!--
            <a id="left_menu-shipping" title="О доставке">О ДОСТАВКЕ</a>
            <a id="left_menu-help"  title="Нужна помощь">НУЖНА ПОМОЩЬ</a>
            -->
        </div>
    </div>
=======
    <?php include $_SERVER["DOCUMENT_ROOT"]."/app/controllers/views/templates/left_block.php";?>
>>>>>>> 63fad7a1e49d3da96649269b57c15320e8c514c0

    <div id="center">
		<div id="center_in" >

				<svg  xmlns="http://www.w3.org/2000/svg" version="1.1"  id="device"  class="center_device_svg">
					<defs class ="font_block">
						<style type="text/css">
							<![CDATA[
								<?php styles_setup($config);?>
							]]>
						</style>
					</defs>
				</svg>

				<svg  xmlns="http://www.w3.org/2000/svg" version="1.1"  class="svg_text_svg">
					<defs class ="font_block">
						<style type="text/css">
							<![CDATA[
								<?php styles_setup($config);?>
							]]>
						</style>
					</defs>
				</svg>

				<svg xmlns="http://www.w3.org/2000/svg" version="1.1"   class="svg_second_svg"></svg>

				
				<svg xmlns="http://www.w3.org/2000/svg" version="1.1" class="controls_device_svg">
					<defs>
						<pattern id="move" x="0" y="0" patternUnits="objectBoundingBox" height="25" width="25">
						  <image x="0" y="0" xlink:href="/img/buttons/move.png" height="25" width="25"></image>
						</pattern>
						<pattern id="move_active" x="0" y="0" patternUnits="objectBoundingBox" height="25" width="25">
						  <image x="0" y="0" xlink:href="/img/buttons/move_active.png" height="25" width="25"></image>
						</pattern>
						
						<pattern id="stretch" x="0" y="0" patternUnits="objectBoundingBox" height="25" width="25">
						  <image x="0" y="0" xlink:href="/img/buttons/stretch.png" height="25" width="25"></image>
						</pattern>
						<pattern id="stretch_active" x="0" y="0" patternUnits="objectBoundingBox" height="25" width="25">
						  <image x="0" y="0" xlink:href="/img/buttons/stretch_active.png" height="25" width="25"></image>
						</pattern>
						
						<pattern id="rotate" x="0" y="0" patternUnits="objectBoundingBox" height="25" width="25">
						  <image x="0" y="0" xlink:href="/img/buttons/rotate.png" height="25" width="25"></image>
						</pattern>
						<pattern id="rotate_active" x="0" y="0" patternUnits="objectBoundingBox" height="25" width="25">
						  <image x="0" y="0" xlink:href="/img/buttons/rotate_active.png" height="25" width="25"></image>
						</pattern>
						<pattern id="delete" x="0" y="0" patternUnits="objectBoundingBox" height="25" width="25">
						  <image x="0" y="0" xlink:href="/img/buttons/delete.png" height="25" width="25"></image>
						</pattern>
						<pattern id="delete_active" x="0" y="0" patternUnits="objectBoundingBox" height="25" width="25">
						  <image x="0" y="0" xlink:href="/img/buttons/delete_active.png" height="25" width="25"></image>
						</pattern>
  					</defs>
			</svg>
			
			<div class="device_colors chech_colors" id="device_colors-2" style="display: none;">
				<div class="device_colors-selected"></div>
				<div></div>
				<div></div>
			</div>
			
			<div class="info_block" id="info_block-1">
				<div class="icon-question" data-answer-id="1"></div>
				<div class="icon-close"></div>
				<div class="answer_block" id="answer_block-1">
					<div class="info_block-row">
						<div class="info_block-point"></div>
						Нажмите в правом боковом меню на устройство, для которого хотите создать чехол.
						<br><br>
						<span class="font-blue">Если Вашего устройства нет в списке, а Вы очень хотите заказать чехол, напишите нам.</span>
					</div>
				</div>
			</div>
			<div class="info_block" id="info_block-2" style="display: none;">
				<div class="icon-question" data-answer-id="2"></div>
				<div class="icon-close"></div>
				<div class="answer_block" id="answer_block-2">
					<div class="info_block-row">
						<div class="info_block-point"></div>
						В правом меню отображены доступные для заказа чехлы.<br><br>
						Чтобы выбрать чехол, просто кликните на необходимый Вам.<br><br>
						<span class="font-blue">Для прозрачных чехлов важно выбрать цвет самого устройства, чтобы не ошибиться с макетом.</span>
					</div>
				</div>
			</div>
			<div class="info_block" id="info_block-3" style="display: none;">
				<div class="icon-question" data-answer-id="3"></div>
				<div class="icon-close"></div>
				<div class="answer_block" id="answer_block-3">
					<div class="info_block-row">
						<div class="info_block-point"></div>
						Вы можете написать текст как вдоль чехла, так и поперек.<br><br>
						Впишите ваш текст на латинице, после чего выберите шрифт в правом меню.<br><br>
						<span class="font-red">Размещайте текст внутри чехла, не выходите за его пределы.</span>
					</div>
					<div class="info_block-row">
						<p class="info_block-1-2-1">2 клика по области, чтобы изменить текст<br><br> или нажмите здесь
						<span id="change_color_but">ИЗМЕНИТЬ ТЕКСТ</span>
						</p>
						<p class="info_block-1-2-2">1 клик - работать с объектом</p>
						<p class="info_block-1-2-3">крутите и вертите</p>
						<p class="info_block-1-2-4">потяните за угол, чтобы растянуть</p>
						<p class="info_block-1-2-5">перемещение по чехлу</p>
					</div>
				</div>
			</div>
			<div class="info_block" id="info_block-4">
				<div class="icon-question" data-answer-id="4"></div>
				<div class="icon-close"></div>
				<div class="answer_block" id="answer_block-4">
					<div class="info_block-row">
						<div class="info_block-point"></div>
					
						Выберите в правом меню необходимый цвет надписи. 
						<br><br>
						Вы также можете выбрать паттерн, который заполнит текст узором, добавив потрясающий эффект.
						<br><br>
						<span class="font-blue">Подвигайте текст по чехлу после добавления паттерна для выбора наилучшего отображения узора.</span>
					</div>
					<div class="info_block-row">
						<p class="info_block-1-2-1">2 клика по области, чтобы изменить текст<br><br> или нажмите здесь
						<span id="change_color_but">ИЗМЕНИТЬ Текст</span>
						</p>
						<p class="info_block-1-2-2">1 клик - работать с объектом</p>
						<p class="info_block-1-2-3">крутите и вертите</p>
						<p class="info_block-1-2-4">потяните за угол, чтобы растянуть</p>
						<p class="info_block-1-2-5">перемещение по чехлу</p>
					</div>
				</div>
			</div>
			<div class="info_block" id="info_block-5">
				<div class="icon-question" data-answer-id="5"></div>
				<div class="icon-close"></div>
				<div class="answer_block" id="answer_block-5">
					<div class="info_block-row">
						<div class="info_block-point"></div>
						В правом меню выберите фон чехла на свой вкус.
						<br><br>
						Чтобы удалить фон, нажмите на крестик.
						<br><br>
						Вы можете вернуться в раздел “цвет”, Ваш фон сохранится.
						<br><br>
						<span class="font-blue">Можно пропустить этот шаг, нажав кнопку “смайлы” или кнопку “заказать”.</span>
					</div>
				</div>
			</div>
			<div class="info_block" id="info_block-6">
				<div class="icon-question" data-answer-id="6"></div>
				<div class="icon-close"></div>
				<div class="answer_block" id="answer_block-6">
					<div class="info_block-row">
						<div class="info_block-point"></div>
						В правом меню выберите смайлы или иконки, перетащив их на чехол.
						<br><br>
						Растягивайте/уменьшайте их, потянув за уголок. Перемещайте их по чехлу на свое усмотрение.
						<br><br>
					
						<span class="font-blue">Если Вы не хотите использовать смайлы, пропустите этот шаг, нажав “заказать”.</span>
					</div>
						<div class="info_block-row">
						<p class="info_block-1-2-2">1 клик - работать с объектом</p>
						<p class="info_block-1-2-3">крутите и вертите</p>
						<p class="info_block-1-2-4">потяните за угол, чтобы растянуть</p>
						<p class="info_block-1-2-5">перемещение по чехлу</p>
						<p class="info_block-1-2-6">удалить</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="right">
		<div id="right-1" class="right_content_block">
			<div class="right_menu_title">Выберите устройство</div>
			<div class="library">
				<div class="library_in library_of_devices">
						
				</div>		
			</div>
		</div>
		<div id="right-2" class="right_content_block" style="display: none;">
			<div class="right_menu_title">Выберите чехол</div>
			<div class="library_2">
				<div class="library_in library_check">
					
				</div>
			</div>
		</div>
		<div id="right-3" class="right_content_block" style="display: none;">
			<div class="right_menu_title">Выберите шрифт</div>
			<div class="library_2 ">
				<div class="library_in library_font">
				</div>
			</div>
		</div>
		<div id="right-4" class="right_content_block" style="display: none;">
			<div class="right_menu_title">Выберите цвет</div>
			<div class="library_3">
				<div class="library_in library_color">
				</div>
			</div>
			<!--
			<div class="right_menu_title_2">или<br>Выберите паттерн</div>
			<div class="library_4">
				<div class="library_in library_pattern">
				</div>
			</div>
			-->
		</div>
		<div id="right-5" class="right_content_block" style="display: none;">
			<div class="right_menu_title">Выберите фон</div>
			<div class="category_buttons">
				
			</div>
			
		</div>
		<div id="right-6" class="right_content_block" style="display: none;">
			<div class="right_menu_title">Выберите смайл</div>
			<div class="category_buttons">
				
			</div>
		</div>
		
	</div>
</div>

<?}?>