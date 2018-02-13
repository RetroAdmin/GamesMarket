<?php
/** Step 1. */
function php_everywhere_menu() {
	add_options_page( 'PHP Everywhere', 'PHP Everywhere', 'manage_options', 'php-everywhere-identifier', 'php_everywhere_options' );
}

/** Step 3. */
function php_everywhere_options() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( __('You do not have sufficient permissions to access this page.', 'php-everywhere') ) );
	}
	
	if(isset($_POST['php_everywhere_roles']))
	{
	update_option('php_everywhere_option_roles',$_POST['php_everywhere_roles']);
	}

	?>
<div class="wrap">
<h1>PHP Everywhere</h1>
<p><?php _e('Thanks for using PHP Everywhere. If you have any questions, feel free to ask <a href="mailto:alexandria96gmx.de">me</a>.<br />I created this plugin because I have not found a Wordpress PHP plugin which is simple to use and provides a good user experience while being able to use PHP or HTML in Posts, Pages or Widgets.', 'php-everywhere'); ?></p>
<h1><?php _e('User role management', 'php-everywhere')?></h1>
<p><?php _e('Who can modify the PHP in posts and pages?', 'php-everywhere')?></p>
<form method="post">
<select name="php_everywhere_roles">
  <option value="everyone"><?php _e('Administrator, editor, author', 'php-everywhere')?></option>
  <option value="admin" <?php if(get_option('php_everywhere_option_roles')=='admin'){echo('selected');}?>><?php _e('Administrator only', 'php-everywhere')?></option>
</select>
<?php submit_button(); ?>
</form> 
<h1><?php _e('Usage', 'php-everywhere')?></h1>
<h3><?php _e('Widgets', 'php-everywhere')?></h3>
<p><?php _e('Simply activate the <pre>PHP + HTML</pre> Widget. in your sidebar and paste your PHP code including the PHP Tags like this:
<pre>&lt;?php  echo("Hello, World!"); ?&gt;</pre>
You code may contain HTML Elements or have multiple lines.', 'php-everywhere')?></p>
<h3><?php _e('Posts & Pages', 'php-everywhere')?></h3>
<p><?php _e('Edit or create a new post or page and simply put your PHP Code including the PHP Tags into the side options_box, which is labeled "PHP Everywhere". Then put the <pre>[php_everywhere]</pre> shortcode where you want the code to appear. Your code may contain multiple lines or HTML Tags.', 'php-everywhere')?></p>
<h3><?php _e('Multiple PHP instances', 'php-everywhere')?></h3>
<p><?php _e('If you want to use multiple PHP instances use the shortcode with the instance parameter like this:', 'php-everywhere')?><br><pre>[php_everywhere instance="1"]</pre><br><?php _e('Your PHP snippet should look like this:', 'php-everywhere')?><br><pre>&lt;?php
if($instance==&quot;1&quot;)
{
echo(&quot;Number one!&quot;);
}
if($instance==&quot;2&quot;)
{
echo(&quot;Number two!&quot;);
}
?&gt;</pre></p>
<h1><?php _e('Changelog', 'php-everywhere')?></h1>
<p><?php _e('Go to <a href="http://www.alexander-fuchs.net/php-everywhere/" target="_blank">http://www.alexander-fuchs.net/php-everywhere/</a> to view the changelog and more.', 'php-everywhere')?></p>
<h1><?php _e('Like this Plugin? Support me :)', 'php-everywhere')?></h1>
<h3><?php _e('Follow me', 'php-everywhere')?></h3>
<ul>
<li><a href="https://www.alexander-fuchs.net" target="_blank">alexander-fuchs.net</a></li>
<li><a href="https://www.linkedin.com/in/alexander-fuchs-38b932a1/" target="_blank">LinkedIn</a></li>
</ul>
</div>
<?php
}
?>