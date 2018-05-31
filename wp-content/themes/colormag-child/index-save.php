<?php

/*
	Template Name: HOME - save
*/
	/**
 * Theme Header Section for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main" class="clearfix"> <div class="inner-wrap">
 *
 * @package ThemeGrill
 * @subpackage ColorMag
 * @since ColorMag 1.0
 */
	get_header();
	?>

<style media="screen">
	html{
		overflow: hidden
	}
	#primary{
		margin-right: 0!important;
	}
	.owl-stage-outer{
		border-radius: 10% / 50%;
	}
	#secondary{
		position: relative;
		float: left;
		top: -430px;
	}
	@media only screen and (max-width: 768px){
		#secondary{
			position: relative;
			margin-top: 430px;
		}
	}
	.widget-title{
		font-family: 'Orbitron', sans-serif;
		border-radius: 4px;
		box-shadow: 0px 0px 6px #289dcc;
		background: #fff;
		margin-top: 25px;
		margin-bottom: 20px;
		padding-bottom: 5px;
		text-align: center;
		border: solid 1px rgba(0, 0, 0, 0.1);
		font-size:7px;
		width: 200px;
		padding:1px;
		color:white;
		background-color: #38a7bb;
		margin-top:0px;
	}
	#media_image-17{
		margin-top: 10px;
	}
	.widget{
		display: none;
	}
	#site-navigation{
		background-color: rgba(250,250,250,0.0);
	}
	#menu-jeuxvideo{
		color: black;
	}
	#site-title, #menu-jeuxvideo li, .entry-title{
		font-family: 'Orbitron', sans-serif;
	}
	.main-navigation ul li.current_page_item ul li a{
		color: black;
	}
	.wp-custom-header{
		top: 40px;
		left: 30px;
		border-bottom:none;
	}

	#site-navigation{
		top: -35px;
	}

	#background_video{
		position: absolute;
		top: 0px;
		left: 0px;
		pointer-events: none;
		width: 100%;
		height: 100%;
		z-index: 0;
	}
	#game_search_bar{
		position: relative;
		text-align: center;
		top: 30%;
		left: 20%;
		max-width: 60%;
	}
	#q{
		height: 45px;
		border: 5px solid #de00ff;
		border-radius: 100px;
		box-shadow: 0 0 5px #fff, 0 0 10px #fff, 0 0 10px #ff0080, 0 0 15px #ff0080, 0 0 20px #ff0080, 0 0 27px #ff0080, 0 0 37px #ff0080;
	}
	#searchBtn{
		position: relative;
		top: -103px;
		float: right;
		right: 17px;
		border: 1px solid #de00ff;
		text-shadow: 0 0 5px #fff, 0 0 10px #fff, 0 0 20px #ff0080, 0 0 30px #ff0080, 0 0 40px #ff0080, 0 0 55px #ff0080, 0 0 75px #ff0080;

	}
	.title_home{
		position: relative;
		font-family: Orbitron;
		font-weight: 900;
		font-size: 68px;
		text-align: center;
		color: white;
		bottom: 0;
		text-shadow: 0 0 5px #fff, 0 0 10px #fff, 0 0 20px #ff0080, 0 0 30px #ff0080, 0 0 40px #ff0080, 0 0 55px #ff0080, 0 0 75px #ff0080;
		top: 25%;
	}
	#colophon{
		position: absolute;
		border: none;
		bottom: 0;
		left: 0;
		right: 0;
	}

	ul>li>a{
		text-shadow: 2px 2px #f014a2;
	}

	.footer-widgets-area{
		display: none;
	}
</style>
<section style="position: absolute;
height: 100%;
top: 0;
width: 100%;
left: 0;">
<div id="background_video">
	<iframe id="ytplayer" type="text/html" src="https://www.youtube.com/embed/nNALmQ48bh0?autoplay=1&controls=0&disablekb=1&enablejsapi=1&fs=0&loop=1&modestbranding=1&rel=0&showinfo=0" width="1920" height="760" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
</div>
<h1 class="title_home">Tous les jeux</h1></br><h1 class="title_home">à portée de clics</h1>
<form id="game_search_bar">
	<div class="main-search__wrapper ">
		<div class="main-search__form">
			<fieldset class="main-search__item u-f2">
				<label for="q" class="label-w-picto">
				</label>
				<input id="q" required="required" placeholder="Trouver son jeu !" type="text" name="q" autocomplete="off" aria-autocomplete="list"><ul hidden=""></ul>
			</fieldset>
		</div>
			<button type="submit" id="searchBtn" class="button_search_game">
				<span style="font-family: Orbitron">Jouer</span>
			</button>
	</div>
</form>
</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
