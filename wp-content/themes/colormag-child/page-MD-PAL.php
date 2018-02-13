<?php

try

{

	$bdd = new PDO('mysql:host=gamesmarberoot.mysql.db;dbname=gamesmarberoot;charset=utf8', 'gamesmarberoot', 'Eminem95500');

}

catch(Exception $e)

{

// En cas d'erreur, on affiche un message et on arrête tout

	die('Erreur : '.$e->getMessage());

}

$reponse = $bdd->query('SELECT * FROM sega_megadrive_games WHERE REGION = "PAL" ORDER BY NOM'); ?>
<style type="text/css">
body{
	font-size: 10px;
}
.row{
	position: relative;
	width: 50%;
}

.package{
	border-radius: 12px;
	box-shadow: 0px 0px 11px #289dcc;
}
.packages .package {
	background: #fff;
	margin-top: 25px;
	margin-bottom: 20px;
	padding-bottom: 5px;
	text-align: center;
	border: solid 1px #38a7bb;
	overflow: hidden;
}
.packages .package .package-header {
	height: 50px;
	background: #289dcc;
}

.packages .package .package-header h5 {
	color: #fff;
	text-transform: uppercase;
	font-weight: bold;
	line-height: 47px;
	margin: 0;
	letter-spacing: 0.08em;
}
.packages .package .package-header.light-gray h5 {
	color: white;
}
.packages .package .price {
	height: 5%;
	color: #fff;
}
.packages .package ul {
	padding: 0;
	font-size: 20px;
}
.packages .package ul li {
	list-style-type: none;
	padding-top: 10px;
	padding-bottom: 10px;
	width: 90%;
	margin: auto;
	border-bottom: 1px dotted #ccc;
}
.packages .package ul li:last-child {
	border-bottom: 0;
}
.title_tab{
	font-size: 18px;
}
#global_id{
	border-width:1px 1px 1px 1px;
	border-style:solid;
	border-color: black;
	border-radius: 12px;
	background-color: #F5F5F5;
	box-shadow: 0px 0px 11px #000000;
	margin:0 auto;
	width: 900px;
	height: 375px;
	margin-left: -50px;
}
#global_id .gauche{
	float: left;
	margin-top: 25px;
	margin-right: 20px;
	margin-left: 20px;
	margin-bottom: 25px;
}
#global_id .droite{
	float: left;
	width: 300px;
}
#global_id .ex-droite{
	float: left;
	width: 300px;
	margin-left: 20px;
}

.market {
	margin:0 auto;
	width: 1000px;
	margin-top: 25px;
	margin-bottom: 25px;
	margin-left: -100px;
}
.market_tab{
	border:0;
}

thead tr th{
	font-family: "Gadugi";
	text-align: center;
		font-size: 13px;
		background-color: #289dcc;
		color: white;
}

.ligne_tab td{
	font-family: "Gadugi";
		text-align: center;
		font-size: 11px;
}

.donnees{
	font-size: 15px;
}

.gauche img{
	border-radius: 12px;
	box-shadow: 0px 0px 11px #289dcc;
}

</style>

<?php
/*
 Template name: Fiche_Megadrive_PAL
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

 	</div><!-- #content -->
 	<div id="global_id">
 		<div class="middle_div">
 			<div class="gauche">
 				<?php 
 				$i = 0;
 				while ($i < 1) {
 				while ($donnees = $reponse->fetch()){
 					if ($donnees['NOM'] == get_the_title()) {
 						echo '<img class="cover" src="'.$donnees['IMAGE'].'" alt="cover_'.$donnees['IMAGE'].'"/>';
 						?>
 					</div>
 					<div class="row packages droite">
 						<div class="package">
 							<div class="package-header light-gray">
 								<h5>Fiche</h5>
 							</div>
 							<ul>
							<li><strong class="title_tab">Numéro :</strong><span class="donnees"> <?php
							echo $donnees['ID'];
							?></span></li>
							<li><strong class="title_tab">Année :</strong><span class="donnees"> <?php 
							echo $donnees['ANNEE'];
							?></span></li>
							<li><strong class="title_tab">Genre :</strong><span class="donnees"> <?php echo $donnees['TYPE'];?></span></li>
							<li><strong class="title_tab">Editeur :</strong><span class="donnees"> <?php echo $donnees['EDITEUR'];?></span></li>
							<li><strong class="title_tab">Développeur :</strong><span class="donnees"> <?php echo $donnees['DEVELOPPEUR'];?></span></li></ul></div>
 				</div>
 				<?php
						}
						else{
							echo "je ne suis pas égale";
							echo $donnees['NOM'];
							echo get_the_title();
						}
					}
					$i++;
				}
					?>
					
				

 					
 				<div class="row packages ex-droite">

 					<div class="package">
 						<div class="package-header light-gray">
 							<h5>WIP</h5>
 						</div>

 						<ul>
 							<li><strong class="title_tab">AAA :</strong></li>
 							<li><strong class="title_tab">BBB :</strong></li>
 							<li><strong class="title_tab">CCC :</strong></li>
 							<li><strong class="title_tab">DDD :</strong></li>
 							<li><strong class="title_tab">EEE :</strong></li>
 						</ul>

 					</div>
 				</div>

 			</div>
 		</div>
 		<div class="market">
 			<?php
$reponse = $bdd->query('SELECT * FROM sell');?>
 			<table class="market_tab">
  <thead>
  	<tr>
    <th>Vendeurs</th>
    <th style="display: none;">Notes</th>
    <th>Etat</th>
    <th>Boite</th>
    <th>Notice</th>
    <th>Jeu</th>
    <th>Prix</th>
    <th>Commentaires</th>
    <th>Acheter</th>
  </tr>
  <thead>
  	<tbody>
  		<?php while ($donnees = $reponse->fetch()){ 			
  			if ($donnees['Titre_du_jeu'] == get_the_title()){?>
  			  <tr class="ligne_tab">
  			  	<td><?php echo $donnees['Username'];?></td>
  			  	<td><?php echo $donnees['Etat'];?></td>
  			  	<td><?php echo $donnees['Boite'];?></td>
  			  	<td><?php echo $donnees['Notice'];?></td>
  			  	<td><?php echo $donnees['Jeu'];?></td>
  			  	<td><?php echo $donnees['Prix'];?>€</td>
  			  	<td><?php if ($donnees['Commentaires'] != "Insérez votre commentaire ici"){
  			  				echo $donnees['Commentaires'];}
  			  				else{
  			  					echo "";}?></td>
  			  	<td><a href="/../cart"><?php echo do_shortcode('[wpepsc name="' . $donnees['Titre_du_jeu'] . '" price="' . $donnees['Prix'] . '"]');
  			  	'<form action="/.../command" method="POST"><input type="hidden" name="paypal" />';
  			  	?></a></td>
  			  </tr>
  			<?php }}?>
</tbody>
</table></div>
 		<!-- #primary -->



 		<?php do_action( 'colormag_after_body_content' ); ?>

 		<?php get_footer(); ?>