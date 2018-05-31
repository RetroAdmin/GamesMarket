<?php

try

{

	$bdd = new PDO('mysql:host=gamesmarberoot.mysql.db;dbname=gamesmarberoot;charset=utf8', 'gamesmarberoot', 'Leane2015');

}

catch(Exception $e)

{

// En cas d'erreur, on affiche un message et on arrête tout

	die('Erreur : '.$e->getMessage());

}
colormag_frontend_script();
$reponse = $bdd->query('SELECT * FROM sega_saturn_games WHERE REGION = "PAL" ORDER BY NOM');
$reponse = $reponse->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($reponse);
?>