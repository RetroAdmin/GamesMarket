<?php

/*
	Template Name: HOME
*/
//test
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
	*{
		margin: 0;
		padding: 0;
	}
	body{
		overflow-x: hidden;
	}
	.site-navigation{
		max-width: 100%;
	}
	.ui-autocomplete{
		max-height: 300px;
		overflow: scroll;
		padding-left:0;
		padding-right:0;
	}
	.auto_li{
		position:relative;
		padding-left: 5px !important;
		-webkit-box-sizing: border-box;
		box-sizing: border-box;
	}
	.auto_li a{
		padding:0 !important
	}
	.auto_li:hover{
		background: #dedede;
		cursor:pointer;
	}
	.auto_li a{
		width:100%;
		height:100%;
		position: absolute;
		z-index:1;
		top: 0;
		left: 0;
		padding: 0;
		border: 0 !important;
		background: transparent !important;
	}
	.auto_li a.ui-state-focus{
		padding: 0;
		border: 0 !important;
		background: transparent !important;
	}
	.auto_li p{
		position:relative;
		z-index: 2;
		margin: 0;
		line-height: 45px;
	}
	/* Custom search field */
	#searchField{
		height: 35px;
		border: 2px solid #57D2FF;
		border-radius: 20px;
		box-shadow: 0 0 7px -10px #fff, 0 0 20px #fff, 0 0 10px #ff0080, 0 0 15px #ff0080, 0 0 20px #ff0080, 0 0 27px #ff0080, 0 0 37px #ff0080;
		-webkit-box-sizing:initial;
		box-sizing:initial;
		width: 80%;
		margin-left: 10%;
	}
	#searchField:focus{
		outline: none;
	}
	.section_video{
		    width: 110%;
    margin-left: -2%;
    margin-top: -15%;
    min-height: 100vh;
	}
	#background_video{

		min-height: 100vh;
	}
	h1{
		text-shadow: 0 0 5px #fff, 0 0 10px #fff, 0 0 20px #ff0080, 0 0 30px #ff0080, 0 0 40px #ff0080, 0 0 55px #ff0080, 0 0 75px #ff0080;
		color: white;
		font-size: 90px;
	}
	iframe{
		pointer-events: none;
		width: 100%;
		min-height: 100vh;
		margin-left: -2.7%;
		position: absolute;
	}
	.section_search{
		position: absolute;
		margin-top: -40%;
		width: 95%;
	}
	#colophon{
			position: absolute;
			margin-top: -5%;
			width: 100%;
		}
		.title_home{
						font-family: 'Orbitron', sans-serif;
		}
		.main-navigation .sub-menu, .main-navigation .children{
			background-color: rgba(87,210,255,0.7);
		}
	@media screen and (max-width: 767px){
		html{
			overflow-y: hidden;
		}
		.section_search{
			margin-top: -110%;
		}
		.title_home{
			font-size: 40px;
			font-family: 'Orbitron', sans-serif;
		}
		.title_home_2{
			margin-bottom: 3%;
		}
		#background_video {
			background-image: url(https://www.afjv.com/2018/02/180223-sonic.jpg);
			margin-top: -50%;
		}
		iframe{
			display: none;
		}
	}
</style>
<section class="section_video">
	<div id="background_video" style="position: relative;">
		<iframe src="https://www.youtube.com/embed/nNALmQ48bh0?autoplay=1&controls=0&disablekb=1&fs=0&loop=1&modestbranding=1&rel=0&showinfo=0&color=white&iv_load_policy=3" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>

	</div>
</section>
<section class="section_search">
	<h1 class="title_home">Tous les jeux</h1></br><h1 class="title_home title_home_2">à portée de clics</h1>
	<form id="game_search_bar">
		<div class="main-search__wrapper ">
			<div class="main-search__form">
				<label for="searchField" class="label-w-picto">
				</label>
				<input id="searchField" required="required" placeholder="Trouver son jeu !" type="text" name="q" autocomplete="off" aria-autocomplete="list"><ul hidden=""></ul>
			</div>
		</div>
	</form>
</section>
<script src="//code.jquery.com/ui/1.9.1/jquery-ui.js"></script>
<script type="text/javascript">
	jQuery(function($){

		/*******************************/
		/*        Autocomplete         */
		/*******************************/
		jQuery('#searchField').autocomplete({
			minLength : 2,
			position : { my : 'top', at : 'bottom' },
			source : '<?php echo get_site_url(); ?>/wp-content/themes/colormag-child/assets/functions/recherche.php',
			select : function(event, ui) {
				window.location.href = '<?php echo get_site_url();?>/'+ui.item.URL;
				return false;
			}
		})
		.data('autocomplete')._renderItem=function(ul,item){
			return jQuery('<li class="auto_li"><a href="<?php echo get_site_url();?>'+item.URL+'"></a></li>')
			.data('item.autocomplete', item)
			.append('<p class="auto_p"><span class="auto_titre">'+item.NOM+'</span> / <span class="auto_console">'+item.CONSOLE+'</span> / <span class="auto_console">'+item.REGION+'</span></p>')
			.appendTo(ul);
		};
	});
	var tag = document.createElement('script');

	tag.src = "//www.youtube.com/iframe_api";
	var firstScriptTag = document.getElementsByTagName('script')[0];
	firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

	var player;

	function onYouTubeIframeAPIReady() {
		player = new YT.Player('ytplayer', {
			events: {
				'onReady': onPlayerReady
			}
		});
	}

	function onPlayerReady() {
		player.playVideo();
            // Mute!
            player.mute();
        }
    </script>
    <?php get_sidebar(); ?>
    <?php get_footer(); ?>
