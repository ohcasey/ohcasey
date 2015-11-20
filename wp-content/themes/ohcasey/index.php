<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

 ?>


<div id="main">
    <?php include "templates/left_block.php";?>
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

            <svg xmlns="http://www.w3.org/2000/svg" version="1.1"   class="svg_second_svg">
            </svg>


            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" class="controls_device_svg">
                <defs>
                    <pattern id="move" x="0" y="0" patternUnits="objectBoundingBox" height="25" width="25">
                        <image x="0" y="0" xlink:href="img/buttons/move.png" height="25" width="25"></image>
                    </pattern>
                    <pattern id="move_active" x="0" y="0" patternUnits="objectBoundingBox" height="25" width="25">
                        <image x="0" y="0" xlink:href="img/buttons/move_active.png" height="25" width="25"></image>
                    </pattern>

                    <pattern id="stretch" x="0" y="0" patternUnits="objectBoundingBox" height="25" width="25">
                        <image x="0" y="0" xlink:href="img/buttons/stretch.png" height="25" width="25"></image>
                    </pattern>
                    <pattern id="stretch_active" x="0" y="0" patternUnits="objectBoundingBox" height="25" width="25">
                        <image x="0" y="0" xlink:href="img/buttons/stretch_active.png" height="25" width="25"></image>
                    </pattern>

                    <pattern id="rotate" x="0" y="0" patternUnits="objectBoundingBox" height="25" width="25">
                        <image x="0" y="0" xlink:href="img/buttons/rotate.png" height="25" width="25"></image>
                    </pattern>
                    <pattern id="rotate_active" x="0" y="0" patternUnits="objectBoundingBox" height="25" width="25">
                        <image x="0" y="0" xlink:href="img/buttons/rotate_active.png" height="25" width="25"></image>
                    </pattern>
                    <pattern id="delete" x="0" y="0" patternUnits="objectBoundingBox" height="25" width="25">
                        <image x="0" y="0" xlink:href="img/buttons/delete.png" height="25" width="25"></image>
                    </pattern>
                    <pattern id="delete_active" x="0" y="0" patternUnits="objectBoundingBox" height="25" width="25">
                        <image x="0" y="0" xlink:href="img/buttons/delete_active.png" height="25" width="25"></image>
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

<? ?>
