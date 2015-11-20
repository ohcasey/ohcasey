<?php
/**
 * Front to the WordPress application. This file doesn't do anything, but loads
 * wp-blog-header.php which does and tells WordPress to load the theme.
 *
 * @package WordPress
 */

/**
 * Tells WordPress to load the WordPress theme and output it.
 *
 * @var bool
 */
define('WP_USE_THEMES', true);
ini_set('date.timezone', "Europe/Moscow");
mb_internal_encoding("UTF-8");


if (substr_count($_SERVER["REQUEST_URI"],"main")>0 OR substr_count($_SERVER["REQUEST_URI"],"cart")>0 OR substr_count($_SERVER["REQUEST_URI"],"success")>0) {

    include($_SERVER["DOCUMENT_ROOT"] . "/app/config.php");
    include($_SERVER["DOCUMENT_ROOT"] . "/app/function.php");

    $action_name = 'main';
    $controller_name = 'main';
    $path = $_SERVER['REQUEST_URI'];
    $arr = parse_url($path);

    $path = $arr["path"];

    $routes = explode('/', $path);

    if (!empty($routes[1])) {
        $controller_name = $routes[1];

        if (strpos($controller_name, '#')) {
            $controller_name = "main";
        }
    }

    if (!empty($routes[2])) {
        $action_name = $routes[2];
    }

    if ($controller_name == "") {
        $controller_name = 'main';
        $action_name = 'main';
    }

    if (in_array($controller_name, $cont_pages)) {
        if ((in_array($action_name, $subfunctions[$controller_name])) || ($action_name == "main") || ($action_name == $controller_name)) {

        } else {
            $controller_name = "404";
        }

    } else {
        $controller_name = "404";
    }

    include($_SERVER["DOCUMENT_ROOT"] . "/app/controllers/controller.php");
    ini_set('magic_quotes_gpc', '1');
} else {
    /** Loads the WordPress Environment and Template */
    require(dirname(__FILE__) . '/wp-blog-header.php');

}
