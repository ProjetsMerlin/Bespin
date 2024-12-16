<?php
/* Version */
define('BESPIN_VERSION', '1.0');

/* Css & Javascript */
function virgin_scripts() {
  wp_enqueue_script('tailwind', get_stylesheet_directory_uri() . '/assets/js/tailwind-3.4.min.js', array(), BESPIN_VERSION);
  wp_enqueue_script('alpine', get_stylesheet_directory_uri() . '/assets/js/alpine.min.js', array(), BESPIN_VERSION);
  wp_enqueue_script('js_main', get_stylesheet_directory_uri() . '/assets/js/main.js', array('jquery'), BESPIN_VERSION);
  wp_enqueue_style('css_bespin', get_stylesheet_directory_uri() . '/assets/css/bespin.css', array(), BESPIN_VERSION, 'all');

  if( is_single() === true) {
    wp_enqueue_style('css_prism', get_stylesheet_directory_uri() . '/assets/css/prism.css', array(), BESPIN_VERSION, 'all');
    wp_enqueue_script('js_prism', get_stylesheet_directory_uri() . '/assets/js/prism.min.js', array(), BESPIN_VERSION);
  }
}
add_action('wp_enqueue_scripts', 'virgin_scripts');

/* CUSTOM BESPIN */
require_once(get_template_directory()) . '/include/bespin.php';

/*
A FAIRE :
  Run 2 wp-cli
  améliorer sitemap.xml -> propriety
*/