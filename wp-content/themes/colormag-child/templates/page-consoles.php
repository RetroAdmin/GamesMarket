<?php
	/*
	Template Name: Page Console
	*/

  // Init
    get_header();

  // Recuperation slug
    $slug = $wp_query->query_vars['slug'];

  // Get Data Game
    global $wpdb;
    $console = $wpdb->get_results("SELECT SLUG, IMAGE, CONSTRUCTEUR, LOGO FROM Master_DB_Consoles WHERE slug='".$slug."'");
    $games = $wpdb->get_results("SELECT G.NOM, G.IMAGE, G.GENRE, G.SLUG, G.REGION FROM Master_DB_Games G, Master_DB_Consoles C WHERE C.slug='".$slug."' AND C.ID = G.CONSOLE");
    $constructeur = $wpdb->get_results("SELECT SLUG FROM Master_DB_Constructeurs WHERE ID='".$console[0]->CONSTRUCTEUR."'");

    // echo '<pre>';
    // // var_dump($slug);
    // // var_dump($console);
    // // var_dump($games);
    // // var_dump($constructeur);
    // echo '</pre>';

?>





  <div class="wrap" id="pageConsole">
    <img class="mainLogo" src="http://gamesmarket.fr/img<?php echo $console[0]->LOGO; ?>" alt="Logo du constructeur">

    <table>
    	<tr>
    		<th>Photo</th>
    		<th>Type</th>
        <th>Nom</th>
        <th>Genre</th>
        <th>Disponibe</th>
        <th>A partir de</th>
    	</tr>
      <?php
        foreach ($games as $key => $value) {
          echo '<tr>';
            echo '<td>'.do_shortcode('[icon name="camera-retro" class="" unprefixed_class=""]').'</td>';
            echo '<td>Jeu</td>';
            echo '<td><a href="'.get_site_url().'/'.$constructeur[0]->SLUG.'/'.$console[0]->SLUG.'/'.$value->REGION.'/'.$value->SLUG.'" title="'.$value->NOM.'">'.$value->NOM.'</a></td>';
            echo '<td>'.$value->GENRE.'</td>';
            echo '<td>-</td>';
            echo '<td>-</td>';
          echo '</tr>';
        }
      ?>
    </table>

  </div>







<?php
  get_footer();
?>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="//code.jquery.com/ui/1.9.1/jquery-ui.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
   $('[data-toggle="popover"]').popover({
      placement: 'top',
      trigger: 'hover'
   });
});
</script>