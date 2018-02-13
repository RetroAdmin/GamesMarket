<?php
/*
 Template name: Sell
	*/
 get_header(); ?>

 <?php do_action( 'colormag_before_body_content' ); ?>
 <div id="primary">
 	<div id="content" class="clearfix">
 		<?php while ( have_posts() ) : the_post(); ?>

 			<?php get_template_part( 'content', 'page' ); ?>

 			<?php
 			do_action( 'colormag_before_comments_template' );
					// If comments are open or we have at least one comment, load up the comment template
 			if ( comments_open() || '0' != get_comments_number() )
 				comments_template();
 			do_action ( 'colormag_after_comments_template' );
 			?>

 		<?php endwhile; ?>

 	</div><!-- #content --><div id="sell_form">

 		<div class="ui-widget">
  <label for="birds">Birds: </label>
  <input id="birds">
</div>
 
<div class="ui-widget" style="margin-top:2em; font-family:Arial">
  Result:
  <div id="log" style="height: 200px; width: 300px; overflow: auto;" class="ui-widget-content"></div>
</div>
 			<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js">
  jQuery( function() {
    function log( message ) {
      jQuery( "<div>" ).text( message ).prependTo( "#log" );
      jQuery( "#log" ).scrollTop( 0 );
    }
 
    jQuery( "#birds" ).autocomplete({
      source: "http://gamesmarket.fr/betaccess/wp-content/themes/colormag-child/nom.php",
      minLength: 2,
      select: function( event, ui ) {
        log( "Selected: " + ui.item.value + " aka " + ui.item.id );
      }
    });
  } );
  </script>
 		</form>
 		 <p>--------------------------------------------------------------------</p>
 		<form id="vente_form" action="validation" method="post">
 			<select name="select_constructor" id="select_constructor" onChange="choices()">
 				<option value="null">Selectionnez le constructeur</option>
 				<option value="sega">Sega</option>
 				<option value="nintendo">Nintendo</option>
 				<option value="microsoft">Microsoft</option>
 				<option value="sony">Sony</option>
 				<option value="snk">SNK</option>
 				<option value="nec">NEC</option>
 			    </select>
 			<select name="sega" id="sega" style="display: none;" onChange="reg_games()">
 				<option value="null">Selectionnez la console</option>
 				<option value="master_system">Master System</option>
 				<option value="megadrive">Megadrive</option>
 				<option value="saturn">Saturn</option>
 				<option value="dreamcast">Dreamcast</option>
 			</select>
 			<select name="nintendo" id="nintendo" style="display: none;">
 				<option value="null">Selectionnez la console</option>
 				<option value="nes">NES</option>
 				<option value="snes">SNES</option>
 				<option value="n64">N64</option>
 				<option value="gamecube">Gamecube</option>
 				<option value="wii">WII</option>
 				<option value="wiiu">WII U</option>
 				<option value="switch">Switch</option>
 			</select>
 			<select name="microsoft" id="microsoft" style="display: none;">
 				<option value="null">Selectionnez la console</option>
 				<option value="xbox">Xbox</option>
 				<option value="xbox360">Xbox 360</option>
 				<option value="xboxone">Xbox One</option>
 			</select>
 			<select name="sony" id="sony" style="display: none;">
 				<option value="null">Selectionnez la console</option>
 				<option value="ps1">Playstation 1</option>
 				<option value="ps2">Playstation 2</option>
 				<option value="ps3">Playstation 3</option>
 				<option value="ps4">Playstation 4</option>
 			</select>
 			<select name="snk" id="snk" style="display: none;">
 				<option value="null">Selectionnez la console</option>
 				<option value="neogeo">Neo-Geo</option>
 				<option value="neogeocd">Neo-Geo CD</option>
 				<option value="neogeocdz">Neo-Geo CDZ</option>
 				<option value="neogeop">Neo-Geo Pocket</option>
 				<option value="neogeopc">Neo-Geo Pocket Color</option>
 			</select>
 			<select name="nec" id="nec" style="display: none;">
 				<option value="null">Selectionnez la console</option>
 				<option value="pcengine">PC-Engine</option>
 			</select>
 			<select name="region" id="region" style="display: none;" onChange="list_games()">
 				<option value="null">Selectionnez la région</option>
 				<option value="pal">PAL</option>
 				<option value="us">US</option>
 				<option value="jap">JAP</option>
 			</select>
 			<select name="gamelist" id="gamelist" style="display: none;">
 				<option value="null">Selectionnez le jeu</option>
 			</select>
 			<select name="saturn_games" id="saturn_games"></select>
 			<select name="etat" id="etat">
 				<option value="null">Selectionnez l'état</option>
 				<option value="Neuf">Neuf</option>
 				<option value="Excellent">Excellent</option>
 				<option value="Très Bon">Très Bon</option>
 				<option value="Bon">Bon</option>
 				<option value="Moyen">Moyen</option>
 				<option value="Mauvais">Mauvais</option>
 				<option value="Très Mauvais">Très Mauvais</option>
 				<option value="Poubelle">Poubelle</option>
 			</select>
 			<p>Boite :<input type="checkbox" name="box"></br>
 				Notice :<input type="checkbox" name="manual"></br>
 				Jeu :<input type="checkbox" name="game"></p>
 				<input type="number" name="price" min="0.01" step="0.01">
 				<input type="text" name="comment" maxlength="50" value="Insérez votre commentaire ici" onclick="javascript:this.value=''"">
 				<input type="submit" name="submit" value="Ajouter au tableau">
 			</form>
 		</div>


 		<!-- #primary -->


 		<?php do_action( 'colormag_after_body_content' ); ?>

 		<?php get_footer(); 
 		?>
 		
<script type="text/javascript">
	function choices() {
		if (document.getElementById('select_constructor').value == 'sega') {
			document.getElementById('sega').style.display = 'block';
		} else {
			document.getElementById('sega').style.display = 'none';
		}
		if (document.getElementById('select_constructor').value == 'nintendo') {
			document.getElementById('nintendo').style.display = 'block';
		} else {
			document.getElementById('nintendo').style.display = 'none';
		}
		if (document.getElementById('select_constructor').value == 'microsoft') {
			document.getElementById('microsoft').style.display = 'block';
		} else {
			document.getElementById('microsoft').style.display = 'none';
		}
		if (document.getElementById('select_constructor').value == 'sony') {
			document.getElementById('sony').style.display = 'block';
		} else {
			document.getElementById('sony').style.display = 'none';
		}
		if (document.getElementById('select_constructor').value == 'snk') {
			document.getElementById('snk').style.display = 'block';
		} else {
			document.getElementById('snk').style.display = 'none';
		}
		if (document.getElementById('select_constructor').value == 'nec') {
			document.getElementById('nec').style.display = 'block';
		} else {
			document.getElementById('nec').style.display = 'none';
		}
	}    

	function reg_games() {
		if ((document.getElementById('sega').value == 'master_system') || (document.getElementById('sega').value == 'megadrive') || (document.getElementById('sega').value == 'saturn') || (document.getElementById('sega').value == 'dreamcast')){
			document.getElementById('region').style.display = 'block';
		} else {
			document.getElementById('region').style.display = 'none';
		}
	}

	function list_games() {
		if ((document.getElementById('sega').value == 'saturn') && (document.getElementById('region').value == 'pal')){
			document.getElementById('gamelist').style.display = 'block';
		}
		else if ((document.getElementById('sega').value == 'megadrive') && (document.getElementById('region').value == 'pal')) {
			document.getElementById('gamelist').style.display = 'block';
		}
		else{
			document.getElementById('gamelist').style.display = 'none';
		}
	}
</script>