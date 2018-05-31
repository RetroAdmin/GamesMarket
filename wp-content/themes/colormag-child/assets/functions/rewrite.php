<?php


/****************************************************/
/*                      REWRITE                     */
/****************************************************/

  // Fiche jeu --------------------------
  	add_action('init', 'rewrite_fiche_jeu');
  	function rewrite_fiche_jeu() {
  	  global $wp_rewrite;
      $constructeurs = "(nintendo|sega|sony|microsoft|snk|nec|philips|atari|mattel|magnavox|coleco|amstrad|commodore|panasonic|nokia|fujitsu|apple|tiger|bandai)";
  		add_rewrite_tag('%slug%','([^&]+)');
  	  $wp_rewrite->add_rule('^'.$constructeurs.'/([^/]*)/([^/]*)/([^/]*)$','index.php?pagename=fiche-jeu&slug=$matches[4]','top');
  	  $wp_rewrite->flush_rules();
  	}

  // Fiche constructeur --------------------------
  	add_action('init', 'rewrite_page_console');
  	function rewrite_page_console() {
  	  global $wp_rewrite;
      $constructeurs = "(nintendo|sega|sony|microsoft|snk|nec|philips|atari|mattel|magnavox|coleco|amstrad|commodore|panasonic|nokia|fujitsu|apple|tiger|bandai)";
  		add_rewrite_tag('%slug%','([^&]+)');
  	  $wp_rewrite->add_rule('^'.$constructeurs.'/([^/]*)$','index.php?pagename=page-console&slug=$matches[2]','top');
  	  $wp_rewrite->flush_rules();
  	}

  // Fiche constructeur --------------------------
  	add_action('init', 'rewrite_page_constructeur');
  	function rewrite_page_constructeur() {
  	  global $wp_rewrite;
      $constructeurs = "(nintendo|sega|sony|microsoft|snk|nec|philips|atari|mattel|magnavox|coleco|amstrad|commodore|panasonic|nokia|fujitsu|apple|tiger|bandai)";
  		add_rewrite_tag('%slug%','([^&]+)');
  	  $wp_rewrite->add_rule('^'.$constructeurs.'$','index.php?pagename=page-constructeur&slug=$matches[1]','top');
  	  $wp_rewrite->flush_rules();
  	}


?>
