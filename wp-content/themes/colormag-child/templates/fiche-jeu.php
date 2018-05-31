<?php

	/*
	Template Name: Fiche Jeu
	*/

  // Init
    get_header();

  // Recuperation slug
    $slug = $wp_query->query_vars['slug'];

  // Get Data Game
    global $wpdb;
    $result = $wpdb->get_results( "SELECT * FROM Master_DB_Games WHERE slug='".$slug."' ");
    $game = $result[0];
    $console = $wpdb->get_results("SELECT * FROM Master_DB_Consoles");
    //echo '<pre>';
    //var_dump($console);
    //echo '</pre>';

?>

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






<style media="screen">
  .ficheJeu{
    text-align: center;
  }
  .ficheJeu .tableData{
    width:100%;
    max-width: 900px;
    margin:0 auto;
    overflow: hidden;
    padding:20px 30px 5px;
    border-radius:25px;
    border: solid 1px #000;
    box-shadow: 0px 0px 12px #DC27FC;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
  }
  .ficheJeu .tableData .column{
    float: left;
    width:30%;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
  }
  .ficheJeu .tableData .middle{
    margin:0 5%;
  }
  .ficheJeu .tableData .column img{
    max-width:100%;
    max-height:325px;
    border-radius: 12px;
    border: solid 1px #DC27FC;
    box-shadow: 0px 0px 11px #DC27FC;
  }
  .ficheJeu .tableData .column table{
    background: #fff;
    text-align: center;
    border: solid 1px #DC27FC;
    overflow: hidden;
    border-radius: 12px;
    box-shadow: 0px 0px 11px #DC27FC;
  }
  .ficheJeu .tableData .column table tr{
  }
  .ficheJeu .tableData .column table tr th{
    height: 50px;
    margin: 0;
    background: #000;
    color: white;
    font-size: 20px;
    line-height: 47px;
    font-weight: bold;
    letter-spacing: 0.08em;
    text-transform: uppercase;
    text-align: center;
  }
  .ficheJeu .tableData .column table tr td{
    font-size: 16px;
    line-height: 37px;
  }
  .ficheJeu .market{
    width:100%;
    margin:0;
    margin-top:35px;
  }
  .ficheJeu .market table tr th{
    background:#000;
    color:#fff;
  }
</style>






<section class="ficheJeu">

	<header class="entry-header">
		<h1 class="entry-title"><?php echo $game->NOM; ?></h1>
	</header>

  <div class="tableData">
    <div class="column">
      <?php echo '<img class="cover" src="'.$game->IMAGE.'" alt="Cover du jeu '.$game->NOM.'"/>'; ?>
    </div>
    <div class="column middle">
      <table>
        <tr><th>Fiche</th></tr>
        <tr><td><b>Console :</b> <?php echo $console[$game->CONSOLE]->NOM?></td></tr>
        <tr><td><b>Date de sortie :</b> <?php echo $game->DATE; ?></td></tr>
        <tr><td><b>Genre :</b> <?php echo $game->GENRE; ?></td></tr>
        <tr><td><b>Editeur :</b> <?php echo $game->EDITEUR; ?></td></tr>
        <tr><td><b>Développeur :</b> <?php echo $game->DEVELOPPEUR; ?></td></tr>
      </table>
    </div>
    <div class="column">
      <table>
        <tr><th>Statistiques</th></tr>
        <tr><td><b>Prix moyen en loose :</b></td></tr>
        <tr><td><b>Prix moyen en complet :</b></td></tr>
        <tr><td><b>CCC :</b></td></tr>
        <tr><td><b>DDD :</b></td></tr>
        <tr><td><b>EEE :</b></td></tr>
      </table>
    </div>
  </div>

  <div class="market">
    <table>
      <tr>
        <th>Vendeurs</th>
        <th>Etat</th>
        <th>Boite</th>
        <th>Notice</th>
        <th>Jeu</th>
        <th>Prix</th>
        <th>Commentaires</th>
        <th>Acheter</th>
      </tr>
      <tr>
        <td>-</td>
        <td>-</td>
        <td>-</td>
        <td>-</td>
        <td>-</td>
        <td>-</td>
        <td>-</td>
        <td>-</td>
      </tr>
    </table>
  </div>

</section>







<?php get_footer(); ?>
