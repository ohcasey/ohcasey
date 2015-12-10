<?php
/*
Plugin Name: Ohcasey Printer
Description: Custom interface for printer group.
Version: 1.0.0
Author: Sergey Nikitin
Author URI: http://catsdev.com
*/

/*
Copyright (c) 2015 Sergey Nikitin

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/


    function ohcasey_printer_edit_shop_order_columns($columns) {
        if (current_user_can('print_design') AND !is_super_admin()) {
            $columns = array(
                //'cb' => '<input type="checkbox" />',
                'id' => __('Id'),
                'fons_print' => 'Чехлы, Картинки',
                'order_date' => __('Date'),
                'change_status' => __('Actions')
            );
        }
        return $columns;
    }
    add_filter('manage_edit-shop_order_columns', 'ohcasey_printer_edit_shop_order_columns');


    function ohcasey_printer_shop_order_add_columns($column) {
        if (current_user_can('print_design') AND !is_super_admin()) {
            global $post;

            switch( $column ) {
                case 'id':
                    echo $post->ID;
                break;
                case 'fons_print':
                    $order = new WC_Order($post->ID);
                    $items = $order->get_items();
                    foreach ($items as $item) {
                        $casey = get_post($item["product_id"]);
                        $order_meta = get_post_meta($post->ID, 'case_preview_url_'.$item["product_id"], true);
                        echo '<a href="/'.$order_meta.'" target="_blank">'.$casey->post_title.' '.$casey->post_content.'</a><br>';
                    }
                break;
                case 'change_status':
                    $order = new WC_Order($post->ID);

                    $statuses = wc_get_order_statuses();

                    if ($order->post_status=='wc-preprint' OR $order->post_status=='wc-print-problem' OR $order->post_status=='wc-ready' OR $order->post_status=='wc-courier') {
                        if ($order->post_status=='wc-preprint')
                            echo '<span style="color: green">'.$statuses[$order->post_status].'</span>';
                        elseif ($order->post_status=='wc-print-problem')
                            echo '<span style="color: red">'.$statuses[$order->post_status].'</span>';
                        else echo $statuses[$order->post_status];
                    } else {
                        echo '<div class="ohcasey-printer-act-'.$post->ID.'"><a href="javascript:void(0)" data-status="wc-preprint" data-order="'.$post->ID.'" class="preprint">Напечатано</a><br><a href="javascript:void(0)" data-status="wc-print-problem" data-order="'.$post->ID.'" class="errorprint" style="color:red;">Проблема</a></div>';
                    }
                break;

            }
        }
    }
    add_filter('manage_shop_order_posts_custom_column', 'ohcasey_printer_shop_order_add_columns');

    function ohcasey_printer_enqueue($hook) {
        if (current_user_can('print_design') AND !is_super_admin()) {
            wp_enqueue_script('ajax-script', plugins_url('/js/ohcaseyprinter.js', __FILE__), array('jquery'));

            $author_nonce = wp_create_nonce('status');
            wp_localize_script('ajax-script', 'ajax_object', array(
                'ajax_url' => admin_url('admin-ajax.php'),
                'author' => $author_nonce,
            ));
        }
    }
    add_action('admin_enqueue_scripts', 'ohcasey_printer_enqueue');

    function ohcasey_printer_change_status() {
        if (current_user_can('print_design') AND !is_super_admin()) {
            check_ajax_referer('status');
            global $woocommerce;
            $order_id = intval($_POST["order"]);
            $status = $_POST["status"];
            if (!$order_id AND !$status) die();

            if ($status == "wc-preprint" OR $status == "wc-print-problem") {
                $order = new WC_Order($order_id);
                $order->update_status($status);
                echo "OK";
            }
        }
        die();
    }
    add_action('wp_ajax_change', 'ohcasey_printer_change_status');

    function ohcasey_admin_printer_scripts() {
        if (current_user_can('print_design') AND !is_super_admin()) {
            echo '<link rel="stylesheet" href="/wp-content/plugins/ohcasey-printer/css/admin_printer.css" type="text/css" media="all" />';
        }
    }
    add_action('admin_footer', 'ohcasey_admin_printer_scripts');





/*
function list_hooked_functions($tag=false){
    global $wp_filter;
    if ($tag) {
        $hook[$tag]=$wp_filter[$tag];
        if (!is_array($hook[$tag])) {
            trigger_error("Nothing found for '$tag' hook", E_USER_WARNING);
            return;
        }
    }
    else {
        $hook=$wp_filter;
        ksort($hook);
    }
    echo '<pre>';
    foreach($hook as $tag => $priority){
        echo "<br />&gt;&gt;&gt;&gt;&gt;\t<strong>$tag</strong><br />";
        ksort($priority);
        foreach($priority as $priority => $function){
            echo $priority;
            foreach($function as $name => $properties) echo "\t$name<br />";
        }
    }
    echo '</pre>';
    return;
}
*/
//list_hooked_functions();