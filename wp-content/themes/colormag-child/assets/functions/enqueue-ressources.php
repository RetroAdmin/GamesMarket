<?php

/* Proper way to enqueue scripts and styles */
  function wpdocs_theme_scripts() {
    wp_enqueue_style( 'style-global', get_template_directory_uri().'-child/assets/styles/global.css');
    wp_enqueue_style( 'style-pages', get_template_directory_uri().'-child/assets/styles/pages.css');
    wp_enqueue_style( 'style-compte', get_template_directory_uri().'-child/assets/styles/compte.css');
    // wp_enqueue_script( 'script-name', get_template_directory_uri() . '/js/example.js', array(), '1.0.0', true );
  }
  add_action( 'wp_enqueue_scripts', 'wpdocs_theme_scripts' );

?>
