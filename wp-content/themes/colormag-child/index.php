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
	.formGM input{
		margin:0;
	}
	.formGM > .row{
		position:relative;
		padding-left:115px;
		margin-bottom: 20px;
	}
	.formGM > .row label{
		position: absolute;
		left:0;
		top:50%;
		transform:translateY(-50%);
	}
	.formGM .submit{
		margin:0 auto;
		width:114px;
	}
</style>



<div id="primary">
	<p>
		Say Hello !
	</p>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>