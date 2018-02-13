<?php

try

{

$bdd = new PDO('mysql:host=localhost;dbname=gamingmarket;charset=utf8', 'root', '');

}

catch(Exception $e)

{

// En cas d'erreur, on affiche un message et on arrête tout

die('Erreur : '.$e->getMessage());

}

$reponse = $bdd->query('SELECT * FROM SEGA ORDER BY NOM');

?>
<table>
<tr class="tabgames">
		<td>
<h6 >NOM</h6>
		</td>
		<td>
<h6>ANNEE</h6>
		</td>
		<td>
<h6>TYPE</h6>
		</td>
	</tr>
	<?php

while ($donnees = $reponse->fetch()){



	$nom = strtolower($donnees['NOM']); 
	$nom = strtr($nom, "àäåâôöîïûüéè", "aaaaooiiuuee");
	$nom = str_replace(' ', '-', $nom);


	?>
		<tr>
		<td>
			<?php
				
// Initialize the page ID to -1. This indicates no action has been taken.
	$post_id = -1;

	// Setup the author, slug, and title for the post
	$author_id = 1;
	$slug = $nom;
	$title = $donnees['NOM'];

	// Set the post ID so that we know the post was created successfully
		$post_id = wp_insert_post(
			array(
				'comment_status'	=>	'closed',
				'ping_status'		=>	'closed',
				'post_author'		=>	$author_id,
				'post_name'		=>	$slug,
				'post_title'		=>	$title,
				'post_status'		=>	'publish',
				'post_type'		=>	'page',
				'post_parent'	=>	'125',
				'page_template'	=>	'page-services.php'
			)
		);


add_filter( 'after_setup_theme', 'programmatically_create_post' );
			echo('<a href="'.$nom.'">'.$donnees['NOM'].'</a>');
			?>
		</td>
		<td class="centerstyle">
			<?php
			echo $donnees['ANNEE']
			?>
		</td>
		<td class="centerstyle">
			<?php
			echo $donnees['TYPE']
			?>
		</td>
	</tr>
	<?php
	}

	$reponse->closeCursor(); // Termine le traitement de la requête
?>
	
</table>