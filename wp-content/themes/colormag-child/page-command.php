<style type="text/css">
	#sell_form{
		margin: 25px;
	}
</style>

<?php
/*
 Template name: Command
*/
 
 get_header(); ?>

 <?php do_action( 'colormag_before_body_content' ); ?>

 <div id="primary">
 	<div id="content" class="clearfix">
 		<?php while ( have_posts() ) : the_post(); ?>

 			<?php get_template_part( 'content', 'page' ); ?>

 			<?php
 			do_action( 'colormag_before_comments_template' );
					// If comments are open or we have at least one comment, load up the comment template
 			if ( comments_open() || '0' != get_comments_number() )
 				comments_template();
 			do_action ( 'colormag_after_comments_template' );
 			?>

 		<?php endwhile; ?>

 	</div><!-- #content --><div id="sell_form">
<p>this is surprise</p>
<?php
if (isset($_POST['payment_status'])) {
	if ($_POST['payment_status'] == "Completed") {
	echo "trop cool";
	}
	echo "paiement echoué";
}
else{
	echo "nope, you loose";
}
?>


 		<!-- #primary -->


 		<?php do_action( 'colormag_after_body_content' ); ?>

 		<?php get_footer(); ?>

 		