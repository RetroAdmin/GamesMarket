<?php
	/*
	Template Name: Compte - Accueil
	*/

  // Init
    get_header();
  	global $current_user;
  	$countries = WC()->countries;
  	$countries_array = WC()->countries->get_countries();

?>

<style media="screen">
    /* Général */
      .hidden{
        display:none;
      }
      .opacityNull{
        opacity:0;
      }
      .bloc1 .title{
        display:block;
        height: 40px;
        line-height: 40px;
        margin:0;
        padding: 0 10px;
        color:#fff;
        background-color: #2B9ECA;
      }
      .bloc1 table tr{
        font-size:12px;
        line-height:40px;
      }
      .bloc1 table td{
        border:0;
      }
      .bloc1 table tr td:first-child{
        font-weight:bold;
      }
      .w50{
        width:50% !important;
        float:left;
        -webkit-box-sizing:border-box;
        box-sizing:border-box;
      }
    /* Espace Membre */
      #account{
        border:solid 1px #CECAC6;
        overflow: hidden;
      }
      #account .cont{
        padding:10px;
      }
    /* Menu Membre */
      #account .menu-espace-membre{
        display: block;
        width:100%;
        overflow:hidden;
        display: block;
        height: 60px;
        line-height: 60px;
      }
      #account .menu-espace-membre li{
        float:left;
        padding: 0 20px;
      }
      #account .menu-espace-membre li a{
        color:#707070;
        width:100%;
        height:100%;
      }
      #account .menu-espace-membre li.active{
        background-color:#515151;
      }
      #account .menu-espace-membre li.active a{
        color:#fefefe;
      }
    /* Informations du compte */
      #account .blocAvatar{
        background-color: #F9F9F8;
        padding: 30px;
        border-bottom:solid 1px #CECAC6;
        margin-bottom: 15px;
      }
      #account .blocAvatar img,
      #account .blocAvatar p{
        display:inline-block;
        vertical-align:middle;
        margin:0 10px 0 0;
        padding:0;
      }
      #account .blocAvatar p{
        font-size:25px;
      }
      #account .details .column-one{
        width:200px;
      }

</style>


<section id="account">

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
              <td><?php echo $countries_array[get_user_meta($current_user->ID,'shipping_country')[0]]; ?></td>
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
              <td><?php echo $countries_array[get_user_meta($current_user->ID,'billing_country')[0]]; ?></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>


</section>

<?php get_footer(); ?>
