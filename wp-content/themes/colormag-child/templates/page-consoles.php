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
		$games = $wpdb->get_results("SELECT G.NOM, G.IMAGE, G.GENRE, G.SLUG, G.REGION, G.TYPE FROM Master_DB_Games G, Master_DB_Consoles C WHERE C.slug='".$slug."' AND C.ID = G.CONSOLE ORDER BY G.NOM");
		$packs = $wpdb->get_results("SELECT P.NOM, P.IMAGE, P.SLUG, P.REGION, P.TYPE FROM Master_DB_Packs P, Master_DB_Consoles C WHERE C.slug='".$slug."' AND C.ID = P.CONSOLE ORDER BY P.NOM");
		$constructeur = $wpdb->get_results("SELECT SLUG FROM Master_DB_Constructeurs WHERE ID='".$console[0]->CONSTRUCTEUR."'");
		$results = array_merge($games, $packs);
	    // echo '<pre>';
	    // // var_dump($slug);
	    // // var_dump($console);
	    // // var_dump($games);
	    // // var_dump($constructeur);
	    // echo '</pre>';


		?>
		<style type="text/css">
		.light{
			color: yellow;
		}
	</style>
	<div class="wrap" id="pageConsole">
		<img class="mainLogo" src="http://gamesmarket.fr/img<?php echo $console[0]->LOGO; ?>" alt="Logo du constructeur">
		<div><?php
		echo '<form method="GET" action="'.get_site_url().'/'.$constructeur[0]->SLUG.'/'.$slug.'""></form>'?>
		<span>
			<label>Type</label><br>
			<span><select class="filter" data-filter="console" autocomplete="off" ">
				<option value="all" selected="selected">Tous</option>
				<option value="consoles">Console</option>
				<option value="jeu">Jeu</option>
			</select></span>
			<label>Rechercher</label>
			<input type="text" name="search" id="categoryfilter" placeholder="chercher le jeu">
		</span>
	</div>
	<table id="tableid">
		<tbody>
			<thead>
				<th>Photo</th>
				<th>Type</th>
				<th>Nom</th>
				<th>Region</th>
				<th>Genre</th>
				<th>Disponibe</th>
				<th>A partir de</th>
			</thead>
			<?php
			foreach ($results as $key => $value) {
				if ($value->TYPE == "jeu"){
					echo '<tr data-console="jeu">';
					echo '<td>'.do_shortcode('[icon name="camera-retro" class="" unprefixed_class=""]').'</td>';
					echo '<td id="type_jeu">Jeu</td>';}
					else{
						echo '<tr data-console="consoles">';
						echo '<td>'.do_shortcode('[icon name="camera-retro" class="" unprefixed_class=""]').'</td>';
						echo '<td>Console</td>';
					};
					echo '<td><a id="filtre_game_name" href="'.get_site_url().'/'.$constructeur[0]->SLUG.'/'.$console[0]->SLUG.'/'.$value->REGION.'/'.$value->SLUG.'" title="'.$value->NOM.'"><span>'.$value->NOM.'</span></a></td>';
					if ($value->REGION == 'JAP'){
						echo '<td><img src="/img/flags/japan_flag.png" alt="japan_flag" width="20px" style="margin-bottom:0;"/></td>';
					}
					elseif ($value->REGION == 'PAL') {
						echo '<td><img src="/img/flags/eu_flag.png" alt="eu_flag" width="20px" style="margin-bottom:0;"/></td>';
					}
					elseif ($value->REGION == 'US') {
						echo '<td><img src="/img/flags/us_flag.png" alt="us_flag" width="20px" style="margin-bottom:0;"/></td>';
					}
					elseif ($value->REGION == 'AUS') {
						echo '<td><img src="/img/flags/aus_flag.png" alt="aus_flag" width="20px" style="margin-bottom:0;"/></td>';
					};
					if (isset($value->GENRE)){
						echo '<td>'.$value->GENRE.'</td>';}
						else{
							echo '<td>-</td>';};
							echo '<td>-</td>';
							echo '<td>-</td>';
							echo '</tr>';
						}
						?>
					</tbody>
				</table>

			</div>







			<?php
			get_footer();
			?>


			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
			<script src="//code.jquery.com/ui/1.9.1/jquery-ui.js"></script>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
			<script type="text/javascript">
				jQuery.noConflict();
				jQuery(document).ready(function() {
					jQuery('[data-toggle="popover"]').popover({
						placement: 'top',
						trigger: 'hover'
					});
				});
				jQuery('.filter').change(function(){
	    // on cache toutes les lignes
	    jQuery('tbody tr').hide();      
	    // on parcourt les différents filtres.
	    var dataSelector = ""; // variable qui servira à stocker les filtres et leur valeur
	    jQuery('.filter').each(function(){
	        // on récupère le data-filter et la value du select
	        var filter = jQuery(this).data('filter'),
	            valeur = jQuery(this).val();
	        // si le filtre est utilisé on stocke la valeur
	        if(valeur != 0 && valeur != 'all'){      
		            dataSelector += "[data-"+filter+"="+valeur+"]";
	        } 
    });
	      
	    // on affiche toutes les lignes correspondant aux filtre.
	jQuery('thead').show();
	    jQuery('tbody tr'+dataSelector).show();
});
	//Dynamic_Search
	(function($){
		jQuery('#categoryfilter').keyup(function(event){
			var input = jQuery(this);
			var val = input.val();
			var regexp = '\\b(.*)';
			for(var i in val){
				regexp += '('+val[i]+')';
			}
			regexp += '(.*)\\b';
			$('span').parent().parent().parent().show()
			$('td').find('a>span').each(function(){
				var span = $(this);
				var resultats = span.text().match(new RegExp(regexp,'i'));
				if (resultats){
					var string ='';
					for(var i in resultats){
						if(i > 0){
							string += resultats[i];
						}
					}
					span.empty().append(string);
				}
				else{
					span.parent().parent().parent().hide();
				}
			})
		});
	}) (jQuery);

</script>