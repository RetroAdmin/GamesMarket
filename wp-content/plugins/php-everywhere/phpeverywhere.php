<?php
/**
 * Plugin Name: PHP Everywhere
 * Plugin URI: http://www.alexander-fuchs.net/php-everywhere/
 * Description: This Plugin enables PHP code in widgets, pages and posts
 * Version: 1.4.2
 * Author: Alexander Fuchs
 * Author URI: http://www.alexander-fuchs.net
 * License: GPL2
 * Text Domain: php-everywhere
 * Domain Path: /languages
 */

/* Copyright 2014-2018 Alexander Fuchs (email: alexander.fuchs@5-k.de) This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License, version 2, as published by the Free Software Foundation. This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details. You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA */

//includes
require 'widget.php';
require 'shortcode.php';
require 'myoptions.php';
require 'options_box.php';

//init
add_action('plugins_loaded', 'init_textdomain');
add_action('widgets_init', create_function('', 'return register_widget("phpeverywherewidget");'));
add_shortcode('php_everywhere', 'php_everywhere_func');
add_action('admin_menu', 'php_everywhere_menu');
// register the meta box
add_action('add_meta_boxes', 'php_everywhere_options_box');
function php_everywhere_options_box()
{
    if (get_option('php_everywhere_option_roles') == 'admin') {
        //get user
        $user = wp_get_current_user();
        //check user role
        if ($user->roles[0] == 'administrator') {
            add_meta_box(
                'php_everywhere_options_id', // this is HTML id of the box on edit screen
                'PHP Everywhere', // title of the box
                'php_everywhere_options_box_content', // function to be called to display the checkboxes, see the function below
                '', // on which edit screen the box should appear
                'side', // part of page where the box should appear
                'default' // priority of the box
            );
        }
    } else {
        add_meta_box(
            'php_everywhere_options_id', // this is HTML id of the box on edit screen
            'PHP Everywhere', // title of the box
            'php_everywhere_options_box_content', // function to be called to display the checkboxes, see the function below
            '', // on which edit screen the box should appear
            'side', // part of page where the box should appear
            'default' // priority of the box
        );
    }

}
function init_textdomain()
{
//Localization
    load_plugin_textdomain('php-everywhere', false
        , dirname(plugin_basename(__FILE__)) . "/languages");
}
