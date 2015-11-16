<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('WP_CACHE', true); //Added by WP-Cache Manager
define( 'WPCACHEHOME', '/home/u11014/domains/f008.ohcasey.ru/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager
define('DB_NAME', 'u11014_ohcaseyadminka');

/** Имя пользователя MySQL */
define('DB_USER', 'u11014_ohcasey');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', 'ohcasey');

/** Имя сервера MySQL */
define('DB_HOST', 'mysql.server');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8mb4');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'p|+2+>2D4dG9(BEc/S7I~-8gC_/tH1x`ise]972zX>8:0NUPnGcI(x&):dcOZNz3');
define('SECURE_AUTH_KEY',  'k+`P}JCO1i+$@R).^0?knEC@U2)uLD.k#]P*@kMrE 5a#VC%0EQT4+Czgc~ {Td%');
define('LOGGED_IN_KEY',    'y[|(Mb)UQ~]a=:}/j#.t_:Jg|[.`0G0n[v,r_apfQ-/o5Y6.^(IzLq~9?ZJw=?bx');
define('NONCE_KEY',        '7<EcD)S$so|5y?TK+wASBX[ !+M,K&Q:*pAT9+:p$-`uQ06VgR`U+kR:Yigj_. 7');
define('AUTH_SALT',        'NZawBs*NKjWD)H8D?G{}+$.3%ae++Uc{-X]M uq-:A:#I/b U6}H]70^{60Cu~3L');
define('SECURE_AUTH_SALT', ' QkX4(@Cw(*2+PN);V=+xJgd~f&hZ2=Mi;w1HTb=ZbM.t47I|Jzbz1(GCeucqf86');
define('LOGGED_IN_SALT',   '/e)%-|l :^B+)<FI|MUl%gH92_/d3&b=|7v_:4qljDa[YYg$<Ul0q[|[}A9:0;o8');
define('NONCE_SALT',       'Sh$u[k5N 8(/w2kOYzy~>ivSd;g%|OpGdY<6F/UH!ZRyUKGehQ|-$>{SUPq.5,`h');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 * 
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
