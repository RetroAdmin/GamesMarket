<?php


  if(strstr($_SERVER['HTTP_HOST'],'localhost:8888') || $_SERVER['HTTP_HOST']=='gamesmarket.com'){ // Pour Mac (local)
    try{$bdd = new PDO( 'mysql:host=localhost;dbname=gamesmarberoot','root','root' );}
    catch(Exception $e){die('Erreur : ' . $e->getMessage());}
  }
  else if ($_SERVER['HTTP_HOST']=='localhost'){ // pour windows (local)
    try{$bdd = new PDO( 'mysql:host=localhost;dbname=gamesmarberoot','root','' );}
    catch(Exception $e){die('Erreur : ' . $e->getMessage());}
  }
  else { // Serveur en ligne
    try{$bdd = new PDO( 'mysql:host=gamesmarberoot.mysql.db;dbname=gamesmarberoot','gamesmarberoot','Leane2015' );}
    catch(Exception $e){die('Erreur : ' . $e->getMessage());}
  }


?>
