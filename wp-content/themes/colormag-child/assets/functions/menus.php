<?php


// Ajouter emplacement nouveau menu (Espace membre)
  function wpb_custom_new_menu() {
    register_nav_menu('menu-espace-membre',__( 'Espace Membre' ));
  }
  add_action( 'init', 'wpb_custom_new_menu' );


// Ajout Class Active
  add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
  function special_nav_class ($classes, $item) {
    if (in_array('current-menu-item', $classes) ){
        $classes[] = 'active ';
    }
    return $classes;
  }

?>
