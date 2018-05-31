<?php

  // Require
require('connexionBDD.php');
require('slugify.php');

  // Data
$array = array();
$term = htmlentities($_GET['term']);

  // Query
$requete = $bdd->prepare('SELECT G.ID, G.NOM, G.REGION, G.SLUG, G.IMAGE, CS.NOM as CONSOLE, CO.SLUG as CONSTRUCTEUR
	FROM Master_DB_Games G, Master_DB_Consoles CS, Master_DB_Constructeurs CO
	WHERE G.NOM LIKE :term 
	AND G.CONSOLE = CS.ID
	AND CS.CONSTRUCTEUR = CO.ID
	ORDER BY G.NOM');

  // Parcours des resultats
$requete->execute(array('term' => '%'.$term.'%'));
while($donnee = $requete->fetch()){
	$array2 = array();
	$array2['ID']=	 'ID';
	$array2['NOM']= $donnee['NOM'];
	$array2['CONSOLE']= $donnee['CONSOLE'];
	$array2['REGION']= $donnee['REGION'];
	$array2['SLUG']= $donnee['SLUG'];
	$array2['IMAGE']= $donnee['IMAGE'];
	$array2['URL']= rennommerSlug($donnee['CONSTRUCTEUR']).'/'.rennommerSlug($donnee['CONSOLE']).'/'.rennommerSlug($donnee['REGION']).'/'.$donnee['SLUG'];
	array_push($array,$array2);
}

  // Affichage resultat
echo json_encode($array);

?>
