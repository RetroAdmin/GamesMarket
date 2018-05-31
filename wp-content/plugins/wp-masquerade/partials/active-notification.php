<div class="wpmsq-notification">
	<?php $current_user = wp_get_current_user(); ?>
	Currently masquerading as <strong><?php echo $current_user->user_login; ?></strong>.
	<a id="wpmsq-revert-link" href='#' title='Click here to restore your session.'>Click here</a> to restore your session or
	<a href="<?php echo wp_logout_url( get_permalink() ); ?>">log out.</a>
</div>