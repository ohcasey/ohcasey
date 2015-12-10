<?php
/*
Plugin Name: Ohcasey Designer
Description: Custom interface for designer group.
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



    function ohcasey_designer_remove_bulk_actions(){
        if (current_user_can('designer') AND !is_super_admin()) {

            if (substr_count($_SERVER["REQUEST_URI"],"edit.php")>0) {
                if (!$_REQUEST["filter_action"]) {
                    header("Location: /wp-admin/edit.php?s&post_status=all&post_type=post&m=0&cat=9&filter_action=Фильтр&paged=1&mode=list");
                }
            }

            return array();
        }
    }
    add_filter('bulk_actions-edit-post', 'ohcasey_designer_remove_bulk_actions');

    function ohcasey_designer_remove_options_show_screen(){
        if (current_user_can('designer') AND !is_super_admin()) {
            return false;
        }
    }
    add_filter('screen_options_show_screen', 'ohcasey_designer_remove_options_show_screen');

    function ohcasey_designer_remove_help_tabs($old_help, $screen_id, $screen){
        if (current_user_can('designer') AND !is_super_admin()) {
            $screen->remove_help_tabs();
            return $old_help;
        }
    }
    add_filter( 'contextual_help', 'ohcasey_designer_remove_help_tabs', 999, 3 );

    function ohcasey_designer_admin_bar_render() {
        global $wp_admin_bar;
        if (current_user_can('designer') AND !is_super_admin()) {
            $wp_admin_bar->remove_menu('comments');
            $wp_admin_bar->remove_menu('new-content');
        }
    }
    add_action('wp_before_admin_bar_render', 'ohcasey_designer_admin_bar_render');


    function ohcasey_designer_admin_left_menu() {
        global $menu;
        global $submenu;
        if (current_user_can('designer') AND !is_super_admin()) {
            unset($menu[2]);
            unset($menu[10]);
            unset($menu[15]);
            unset($menu[20]);
            unset($menu[25]);
            unset($menu[26]);
            unset($menu[27]);
            unset($menu[59]);
            unset($menu[60]);
            unset($menu[65]);
            unset($menu[62.32]);
            unset($menu[55.5]);
            unset($menu[100]);
            unset($menu[75]);
            unset($submenu["edit.php"][10]);
        }
    }
    add_action('admin_menu', 'ohcasey_designer_admin_left_menu');


    function ohcasey_designer_meta_filter_posts( $query ) {
        if (current_user_can('designer') AND !is_super_admin()) {
            $user_ID = get_current_user_id();
            if (is_admin() && is_search()) {
                $query->set('meta_key', 'fon_author');
                $query->set('meta_value', $user_ID);
            }
        }
        return $query;
    }
    add_filter( 'pre_get_posts', 'ohcasey_designer_meta_filter_posts' );


    function ohcasey_designer_edit_post_columns($columns) {
        if (current_user_can('designer') AND !is_super_admin()) {
            $columns = array(
                'id' => __('Id'),
                'title' => __('Title'),
                'date' => __('Date'),
                'sum_earned' => "Сумма, руб.",
                'prints_saled' => "Продано принтов",
            );
        }
        return $columns;
    }
    add_filter('manage_edit-post_columns', 'ohcasey_designer_edit_post_columns');


    function ohcasey_designer_post_add_columns($column) {
        if (current_user_can('designer') AND !is_super_admin()) {
            global $post;

            switch( $column ) {
                case 'id':
                    echo $post->ID;
                break;
                case 'sum_earned':
                    echo "0";
                break;
                case 'prints_saled':
                    echo "0";
                break;

            }
        }
    }
    add_filter('manage_post_posts_custom_column', 'ohcasey_designer_post_add_columns');

    function ohcasey_admin_designer_scripts() {
        if (current_user_can('designer') AND !is_super_admin()) {
            echo '<link rel="stylesheet" href="/wp-content/plugins/ohcasey-designer/css/admin_designer.css" type="text/css" media="all" />';
        }
    }
    add_action('admin_footer', 'ohcasey_admin_designer_scripts');



