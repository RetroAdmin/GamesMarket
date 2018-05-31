<?php
	/*
	Template Name: Compte - Tableau de bord
	*/

  // Verif user
    if(!is_user_logged_in()){
      wp_redirect('/connexion');
    }

  // Init
    get_header();
  	global $current_user;

?>



<section id="account" class="tableauBord">

    <?php wp_nav_menu( array( 'theme_location' => 'menu-espace-membre', 'container_class' => 'menu-espace-membre' ) ); ?>

    <div class="cont">

      <div class="details bloc1">
        <p class="title">Mes Achats</p>
        <ul class="liste">
          <?php for ($i=0; $i<5; $i++) { ?>
            <li>
              <div class="affiche">
                <img src="<?= get_template_directory_uri(); ?>-child/assets/images/batman.jpg" alt="">
              </div>
            </li>
          <?php } ?>
        </ul>
      </div>

      <div class="details bloc1">
        <p class="title">Mes Ventes</p>
        <ul class="liste">
          <?php for ($i=0; $i<5; $i++) { ?>
            <li>
              <div class="affiche">
                <img src="<?= get_template_directory_uri(); ?>-child/assets/images/batman-robin.jpg" alt="">
              </div>
            </li>
          <?php } ?>
        </ul>
      </div>

    </div>


</section>

<?php get_footer(); ?>
