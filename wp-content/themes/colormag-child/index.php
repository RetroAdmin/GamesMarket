<?php

/*
	Template Name: HOME
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
</style>


<div id="primary">
<section>
		<?php
			echo do_shortcode('[slide-anything id="9372"]');
		?>
</section>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>