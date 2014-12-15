<?php
/**
* Plugin Name: BuddyPress Slide Menu By Alexandr Nikitin
* Plugin URI: http://facebook.com/nikitindiz
* Description: Adds left slide menu
* Version: 1.0
* Author: Alexandr Nikitin
* Author URI:  http://facebook.com/nikitindiz
* License: Custom
*/

function an_bp_widget_init() {

	register_sidebar( array(
		'name' => 'BuddyPress Slide Menu Widget',
		'id' => 'an_bp_widget',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	) );		
	
}

add_action( 'widgets_init', 'an_bp_widget_init' );

function an_bp_slider_css_file_init() {
	wp_enqueue_style( 'an_bp_slider_css_file', plugins_url( 'css/style.css', __FILE__ ) );	
}

add_action( 'wp_enqueue_scripts', 'an_bp_slider_css_file_init' );

function an_bp_slide_menu_insert_data_to_footer() {
        if ( is_active_sidebar( 'an_bp_widget' ) )
        {
          $template_top = file_get_contents(plugins_url( 'template/template_top.htm', __FILE__ ), true);
          echo $template_top;
		  dynamic_sidebar( 'an_bp_widget' ); 
          $template_bottom = file_get_contents(plugins_url( 'template/template_bottom.htm', __FILE__ ), true);
          echo $template_bottom;
        }
	}

add_action('wp_footer', 'an_bp_slide_menu_insert_data_to_footer', 100); 