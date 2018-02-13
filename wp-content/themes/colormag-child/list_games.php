<?php
// Vérification des paramètres d'accès au fichier liste.php
if(isset($_GET['go']) || isset($_GET['saturn_games']) || isset($_GET['localite_deux'])) {
	// connexion à la base de données
	try {
		$bdd = new PDO('mysql:host=gamesmarberoot.mysql.db;dbname=gamesmarberoot', 'gamesmarberoot', 'Eminem95500');
	} catch(Exception $e) {
		exit('Impossible de se connecter à la base de données.');
	}
	
	$json = array();
	
	if(isset($_GET['go'])) {
		// requête qui récupère les localités un
		$requete = "SELECT * FROM sega_saturn_games ORDER BY NOM ASC";
		// exécution de la requête
		$resultat = $bdd->query($requete) or die(print_r($bdd->errorInfo()));
		// Création de la liste
		while($donnees = $resultat->fetch(PDO::FETCH_ASSOC)) {
			// je remplis un tableau et mettant l'id en index
			$json[$donnees["ID"]][] = utf8_encode($donnees["NOM"]);
		}
	}
	elseif(isset($_GET['saturn_games'])) {
		// requête qui récupère les localités un
		$requete = "SELECT * FROM sega_saturn_games ORDER BY NOM";
		// exécution de la requête
		$resultat = $bdd->query($requete) or die(print_r($bdd->errorInfo()));
		// Création de la liste
		while($donnees = $resultat->fetch(PDO::FETCH_ASSOC)) {
			// je remplis un tableau et mettant l'id en index
			$json[$donnees["ID"]][] = utf8_encode($donnees["NOM"]);
		}
	}
	elseif(isset($_GET['localite_deux'])) {
		// requête qui récupère les localités un
		$requete = "SELECT * FROM localite_trois WHERE id_localite_deux = '".$_GET['localite_deux']."' ORDER BY localite_trois ASC";
		// exécution de la requête
		$resultat = $bdd->query($requete) or die(print_r($bdd->errorInfo()));
		// Création de la liste
		while($donnees = $resultat->fetch(PDO::FETCH_ASSOC)) {
			// je remplis un tableau et mettant l'id en index
			$json[$donnees["id_localite_trois"]][] = utf8_encode($donnees["localite_trois"]);
		}
	}
	 // envoi du résultat au success
	echo json_encode($json);
}

?>