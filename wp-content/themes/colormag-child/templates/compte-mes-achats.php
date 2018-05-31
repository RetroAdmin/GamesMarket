<?php
	/*
	Template Name: Compte - Mes Achats
	*/

  // Verif user
    if(!is_user_logged_in()){
      wp_redirect('/connexion');
    }

  // Init
    get_header();
  	global $current_user;

?>

<section id="account" class="mesAchats">
    <?php wp_nav_menu( array( 'theme_location' => 'menu-espace-membre', 'container_class' => 'menu-espace-membre' ) ); ?>


    <div class="cont">
      <ul id="maListe">
        <?php for ($i=0; $i < 3; $i++) { ?>
          <li>
          <div class="left">
            <div class="affiche">
              <img src="<?= get_template_directory_uri(); ?>-child/assets/images/baku.jpg" alt="">
            </div>
          </div>
          <div class="right bloc1">
            <table>
              <colgroup>
                <col class="column-one">
                <col class="column-two">
              </colgroup>
              <tbody>
                <tr>
                  <td>Jeu</td>
                  <td>Baku Baku Animals</td>
                </tr>
                <tr>
                  <td>Date d'achat</td>
                  <td>21/02/2018</td>
                </tr>
                <tr>
                  <td>Prix d'achat</td>
                  <td>39€</td>
                </tr>
                <tr>
                  <td>N° suivi</td>
                  <td>Bj7H4773H3G2</td>
                </tr>
              </tbody>
            </table>
          </div>
        </li>
        <?php } ?>
      </ul>
    </div>

</section>

<?php get_footer(); ?>
