<?php
	/*
	Template Name: Compte - Mes Ventes
	*/

  // Verif user
    if(!is_user_logged_in()){
      wp_redirect('/connexion');
    }

  // Init
    get_header();
  	global $current_user;

?>



<section id="account" class="mesVentes">
  <?php wp_nav_menu( array( 'theme_location' => 'menu-espace-membre', 'container_class' => 'menu-espace-membre' ) ); ?>


  <div class="cont">
    <ul id="maListe">
      <?php for ($i=0; $i < 9; $i++) { ?><li class="aff">
        <div class="affiche">
          <img src="<?= get_template_directory_uri(); ?>-child/assets/images/vente.jpg" alt="">
        </div>
        <div class="content">
          <p class="title">Donkey Kong 64</p>
          <p class="price">12.15 EUR</p>
        </div>
      </li><?php } ?>
    </ul>
  </div>

</section>

<?php get_footer(); ?>
