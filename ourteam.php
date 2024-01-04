<?php
/**
 * Plugin Name: Elementor Our Team Addon
 * Description: Simple  widget for Elementor.
 * Version:     1.0.0
 * Author:      Oleksandr Lilik
 * Author URI:  https://developers.elementor.com/
 * Text Domain: ourteam
 */


load_plugin_textdomain('ourteam', false, '/languages/');
function register_hello_world_widget($widgets_manager)
{

    require_once(__DIR__ . '/widgets/our-team-widget.php');

    $widgets_manager->register(new \Elementor_Our_Team_Widget());
}
add_action('elementor/widgets/register', 'register_hello_world_widget');