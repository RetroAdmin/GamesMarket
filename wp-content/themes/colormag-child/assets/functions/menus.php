<?php


// Ajouter emplacement nouveau menu (Espace membre)
  function wpb_custom_new_menu() {
    register_nav_menu('menu-espace-membre',__( 'Espace Membre' ));
  }
  add_action( 'init', 'wpb_custom_new_menu' );




?>
