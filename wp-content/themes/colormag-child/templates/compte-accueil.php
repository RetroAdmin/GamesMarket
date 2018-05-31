<?php
	/*
	Template Name: Compte - Accueil
	*/

  // Verif user
    if(!is_user_logged_in()){
      wp_redirect('/connexion');
    }

  // Init
    get_header();
  	global $current_user;
  	$countries = WC()->countries;
  	$countries_array = WC()->countries->get_countries();

?>



<section id="account" class="monCompte">

    <?php wp_nav_menu( array( 'theme_location' => 'menu-espace-membre', 'container_class' => 'menu-espace-membre' ) ); ?>

    <div class="blocAvatar">
      <img src="<?= get_template_directory_uri(); ?>-child/assets/images/avatar.png" alt="">
      <p><?php echo $current_user->user_login; ?></p>
    </div>

    <div class="cont">
      <div class="details bloc1">
        <p class="title">Détails du compte</p>
        <table>
          <colgroup>
            <col class="column-one">
            <col class="column-two">
          </colgroup>
          <tbody>
            <tr>
              <td>Identifiant</td>
              <td><?php echo $current_user->user_login; ?></td>
            </tr>
            <tr>
              <td>Email</td>
              <td><?php echo $current_user->user_email; ?></td>
            </tr>
            <tr>
              <td>Prénom</td>
              <td><?php echo $current_user->first_name; ?></td>
            </tr>
            <tr>
              <td>Nom</td>
              <td><?php echo $current_user->last_name; ?></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <div class="cont w50">
      <div class="details bloc1">
        <p class="title">Adresse du domicile</p>
        <table>
          <colgroup>
            <col class="column-one">
            <col class="column-two">
          </colgroup>
          <tbody>
            <tr>
              <td>Prénom</td>
              <td><?php echo get_user_meta($current_user->ID,'shipping_first_name')[0]; ?></td>
            </tr>
            <tr>
              <td>Nom</td>
              <td><?php echo get_user_meta($current_user->ID,'shipping_last_name')[0]; ?></td>
            </tr>
            <tr>
              <td>Société</td>
              <td><?php echo get_user_meta($current_user->ID,'shipping_company')[0]; ?></td>
            </tr>
            <tr>
              <td>N°TVA</td>
              <td> *** </td>
            </tr>
            <tr>
              <td>Addresse</td>
              <td><?php echo get_user_meta($current_user->ID,'shipping_address_1')[0]; ?></td>
            </tr>
            <tr>
              <td><span class="opacityNull">Addresse 2</span></td>
              <td><?php echo get_user_meta($current_user->ID,'shipping_address_2')[0]; ?></td>
            </tr>
            <tr>
              <td>Code Postal</td>
              <td><?php echo get_user_meta($current_user->ID,'shipping_postcode')[0]; ?></td>
            </tr>
            <tr>
              <td>Ville</td>
              <td><?php echo get_user_meta($current_user->ID,'shipping_city')[0]; ?></td>
            </tr>
            <tr>
              <td>Pays</td>
              <td><?php if(!empty(get_user_meta($current_user->ID,'shipping_country')[0])) echo $countries_array[get_user_meta($current_user->ID,'shipping_country')[0]]; ?></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>


    <div class="cont w50">
      <div class="details bloc1">
        <p class="title">Adresse de facturation</p>
        <table>
          <colgroup>
            <col class="column-one">
            <col class="column-two">
          </colgroup>
          <tbody>
            <tr>
              <td>Prénom</td>
              <td><?php echo get_user_meta($current_user->ID,'billing_first_name')[0]; ?></td>
            </tr>
            <tr>
              <td>Nom</td>
              <td><?php echo get_user_meta($current_user->ID,'billing_last_name')[0]; ?></td>
            </tr>
            <tr>
              <td>Société</td>
              <td><?php echo get_user_meta($current_user->ID,'billing_company')[0]; ?></td>
            </tr>
            <tr>
              <td>N°TVA</td>
              <td> *** </td>
            </tr>
            <tr>
              <td>Addresse</td>
              <td><?php echo get_user_meta($current_user->ID,'billing_address_1')[0]; ?></td>
            </tr>
            <tr>
              <td><span class="opacityNull">Addresse 2</span></td>
              <td><?php echo get_user_meta($current_user->ID,'billing_address_2')[0]; ?></td>
            </tr>
            <tr>
              <td>Code Postal</td>
              <td><?php echo get_user_meta($current_user->ID,'billing_postcode')[0]; ?></td>
            </tr>
            <tr>
              <td>Ville</td>
              <td><?php echo get_user_meta($current_user->ID,'billing_city')[0]; ?></td>
            </tr>
            <tr>
              <td>Pays</td>
              <td><?php if(!empty(get_user_meta($current_user->ID,'shipping_country')[0])) echo $countries_array[get_user_meta($current_user->ID,'billing_country')[0]]; ?></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>


</section>

<?php get_footer(); ?>
