<?php
/*
 Template name: Sell
	*/
 get_header(); ?>

<style type="text/css">
	.row{
		margin-bottom: 10px!important;
	}
	.row-check{
		margin: 0 auto;
		float: left;
		width: 150px;
		margin-right:10px;
	}
	.check{
		border: 1px solid black!important;
		color: black
		background-color:rgb(255,255,255)!important;
	}
</style>
 <div id="primary">
 	<div id="content" class="clearfix">
 		<article class="type-page">

 			<header class="entry-header">
 				<h1 class="entry-title">Vendre</h1>
 			</header>
 			<form id="vente_form" action="validation" method="post">
 				<div class="row">
 					<input type="text" name="search" placeholder="Quel jeu souhaitez-vous vendre?" />
 				</div>
 				<div class="row row-check">
 					<label>Etat : </label>
 				<select name="etat" id="etat">
 					<option value="null">-</option>
 					<option value="Neuf">Neuf</option>
 					<option value="Excellent">Excellent</option>
 					<option value="Très Bon">Très Bon</option>
 					<option value="Bon">Bon</option>
 					<option value="Moyen">Moyen</option>
 					<option value="Mauvais">Mauvais</option>
 					<option value="Très Mauvais">Très Mauvais</option>
 					<option value="Poubelle">Poubelle</option>
 				</select>
 			</div>
 				<div class="row row-check">
 					<input class="check" type="submit" name="box" value="Boite">
 			</div>
 				<div class="row row-check">
 					<input class="check" type="submit" name="box" value="Notice">
 			</div>
 				<div class="row row-check">
 					<input class="check" type="submit" name="box" value="Jeu">
 			</div>
 				<div class="row">
 					<label>Ajouter une Photo : </label>
 				<input type="file" name="photo">
 			</div>
 				<div class="row">
 					<label>Prix : </label>
 				<input type="number" name="price" min="0.01" step="0.01">
 			</div>
 				<div class="row">
 					<input type="text" name="comment" maxlength="50" value="Insérez votre commentaire" onclick="javascript:this.value=''"">
 				</div>
 				<div class="row">
 					<input type="submit" name="submit" value="Ajouter au tableau">
 				</div>
 			</form>
 		</div>


 		<!-- #primary -->


 		<?php do_action( 'colormag_after_body_content' ); ?>

 		<?php get_footer(); 
 		?>
 		
