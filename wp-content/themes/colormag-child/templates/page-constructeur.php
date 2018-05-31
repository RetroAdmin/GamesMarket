<?php
	/*
	Template Name: Page Constructeur
	*/

  // Init
    get_header();

  // Recuperation slug
    $slug = $wp_query->query_vars['slug'];

  // Get Data Game
    global $wpdb;
    $constructeur = $wpdb->get_results("SELECT LOGO, SLUG FROM Master_DB_Constructeurs WHERE slug='".$slug."'");
    $consoles = $wpdb->get_results("SELECT CS.NOM, CS.IMAGE, CS.SLUG FROM Master_DB_Constructeurs CT, Master_DB_Consoles CS WHERE CT.slug='".$slug."' AND CT.ID = CS.CONSTRUCTEUR ");

    // echo '<pre>';
    // var_dump($constructeur[0]);
    // echo '</pre>';








    echo '<div class="wrap" id="pageConstructeur">';

      echo '<img class="mainLogo" src="http://'.$_SERVER["HTTP_HOST"].'/img'.$constructeur[0]->LOGO.'" alt="Logo du constructeur">';

      $count = 0;
      foreach ($consoles as $key => $value) {
        $count ++;
        if($count == 1) { echo '<div class="row consoles">'; }
          echo '<div class="col-xs-6 col-sm-3">';
            echo '<a href="'.get_site_url().'/'.$constructeur[0]->SLUG.'/'.$value->SLUG.'/" title="Console : '.$value->NOM.'" class="pinkShadow">';
              echo '<img src="http://'.$_SERVER["HTTP_HOST"].'/img'.$value->IMAGE.'" alt="">';
              echo '<h2>'.$value->NOM.'</h2>';
            echo '</a>';
          echo '</div>';
        if($count == 4) { echo '</div>'; $count = 0; }
      }

    echo '</div></div>';







    get_footer();

?>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
