<?php
/*
Plugin Name: Forum_wordpress_fr
Description: Questionnaire du forum http://www.wordpress-fr.net/support
Author: Andre Renaut
Author URI: http://www.mailpress.org
Requires at least: 3.3
Tested up to: 4.5
Version: 4.1
*/

define ( 'FWF_FOLDER', 	basename( dirname( __FILE__ ) ) );
define ( 'FWF_PLUGIN_DIR',	PLUGINDIR . '/' . FWF_FOLDER . '/' );

class Forum_wordpress_fr 
{
	const txt_domain = 'Forum_wordpress_fr';

	function __construct() 
	{
		if ( is_admin() ) add_action( 'wp_dashboard_setup', array( &$this, 'wp_dashboard_setup' ), 8 );
	}

	function wp_dashboard_setup()
	{
		if ( !function_exists( 'wp_add_dashboard_widget' ) ) return;

	// for gettext
		load_plugin_textdomain( self::txt_domain, false, FWF_PLUGIN_DIR . 'languages' );

	// 
		$this->with_flash = $this->with_flash();
		$this->site_url   = $this->site_url();

	// for javascript
		wp_register_script( __CLASS__,	'/' . FWF_PLUGIN_DIR . 'js/fwf.js', array('jquery'), false, 1);

		$L10n['ko'] = esc_js( __( 'S&eacute;lectionner le texte ci-dessous puis CTRL+C ou Pomme+C', self::txt_domain ) ) . "\n\n\n";
		$L10n['ok'] = esc_js( __( 'Copi&eacute; dans le presse-papier', self::txt_domain ) );
		if ($this->with_flash)
			$L10n['embed'] = ($this->is_ie()) ? "<object classid='clsid:d27cdb6e-ae6d-11cf-96b8-444553540000' align='middle' codebase='" . ((is_ssl()) ? 'https://' : 'http://') . "download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=10,0,0,0' width='WW' height='HH' id='fwf_zc_movie'><param name='allowScriptAccess' value='always' /><param name='allowFullScreen' value='false' /><param name='wmode' value='transparent'/><param name='loop' value='false' /><param name='menu' value='false' /><param name='quality' value='best' /><param name='bgcolor' value='#ffffff' /><param name='movie' value='" . $this->site_url . '/' . FWF_PLUGIN_DIR . 'js/fwf_zc.swf' ."' /><param name='flashvars' value='id=1&width=WW&height=HH' /></object>" : "<embed pluginspage='http://www.macromedia.com/go/getflashplayer' type='application/x-shockwave-flash' allowScriptAccess='always' allowFullScreen='false' loop='false' menu='false' quality='best' bgcolor='#ffffff' wmode='transparent' align='middle' width='WW' height='HH' flashvars='id=1&width=WW&height=HH' id='fwf_zc_movie' name='fwf_zc_movie' src='" . $this->site_url . '/' . FWF_PLUGIN_DIR . 'js/fwf_zc.swf' ."' />";

		wp_localize_script( __CLASS__, 	'fwf_L10n', $L10n );
		wp_enqueue_script( __CLASS__ );

	// for widget
		wp_add_dashboard_widget( self::txt_domain, __( 'wordpress-fr.net/support', self::txt_domain ), array( &$this, 'widget' ), array( &$this, 'control' ) );
	}

	function widget() 
	{
	// version wordpress
		global $wp_version, $wpdb;
		$txt[] = sprintf( __( '<strong>- Version de WordPress :</strong> %1$s%2$s', self::txt_domain ), $wp_version, ( is_multisite() ) ? ' ' . __( 'multi-site', self::txt_domain ) : '' );

	// version php/mysql
		$php_ver = phpversion();
		$mysql_ver = $wpdb->db_version();
		$txt[] = sprintf( __( '<strong>- Version de PHP/MySQL :</strong> %1$s / %2$s', self::txt_domain ), $php_ver, $mysql_ver );

	// theme
		if ( function_exists( 'wp_get_theme' ) )
		{
			$wp_theme = wp_get_theme( get_stylesheet() );
			$wp_theme_name = $wp_theme->display( 'Name', true, false );
			$wp_theme_url = $wp_theme->display( 'ThemeURI', true, false );
			if ( !empty( $wp_theme_url ) ) $wp_theme_url = sprintf( __( '<strong>- Th&egrave;me URI :</strong> %s', self::txt_domain ), $wp_theme_url );
		}
		else
		{
			global $wp_themes;
			$wp_theme_name = get_current_theme();
			$wp_theme = $wp_themes[$wp_theme_name];
			$wp_theme_url = $wp_theme['Author URI'];
			if ( !empty( $wp_theme_url ) ) $wp_theme_url = sprintf( __('<strong>- Th&egrave;me Auteur URI :</strong> %s', self::txt_domain ), $wp_theme_url );
		}
		$txt[] = sprintf( __( '<strong>- Th&egrave;me utilis&eacute; :</strong> %s', self::txt_domain ), $wp_theme_name );
		if ( !empty( $wp_theme_url ) ) 
			$txt[] = $wp_theme_url;

	// plugins
		foreach ( (array) get_plugins() as $plugin_file => $plugin_data ) 
		{
			if ( is_plugin_active_for_network( $plugin_file ) ) 
				$ms_plugins[] = $plugin_data['Name'] . ' (' . $plugin_data['Version'] . ')';
			elseif ( is_plugin_active( $plugin_file ) ) 
				$wp_plugins[] = $plugin_data['Name'] . ' (' . $plugin_data['Version'] . ')';
		}
		if ( isset( $wp_plugins ) )
			$txt[] = sprintf( __( '<strong>- Extensions en place :</strong> %s', self::txt_domain ), join( ', ', $wp_plugins ) );

		if ( isset( $ms_plugins ) )
			$txt[] = sprintf( __( '<strong>- Extensions r&eacute;seau en place :</strong> %s', self::txt_domain ), join( ', ', $ms_plugins ) );

	// site url
		$siteurl = $this->site_url;
		$txt[] = sprintf( __( "<strong>- Adresse du site :</strong> %s", self::txt_domain ), $siteurl );

	// host
		$host = $_SERVER['SERVER_SOFTWARE'];
		$txt[] = sprintf( __( "<strong>- Nom de l'h&eacute;bergeur :</strong> %s", self::txt_domain ), $host );
?>
<div id='fwf_content'><strong><?php _e( "Ma configuration WP actuelle :", self::txt_domain ); ?></strong>

<ul><li><?php echo join( "</li>\n<li>", $txt ); ?></li></ul>
</div>
<div>
<?php if ($this->with_flash) echo "\t<div id='fwf_zc' style='position:absolute;z-index:99;'></div>\n"; ?>
	<div style='position:relative;'>
		<input id='fwf_copy' class='button-primary' type='button' value="<?php echo esc_attr( __('Copier', self::txt_domain ) ); ?>" />
	</div>
</div>
<?php
	}

	function control()
	{
		if ( 'POST' == $_SERVER['REQUEST_METHOD'] && isset($_POST['fwf']) ) 
		{	
			update_option( self::txt_domain, $_POST['fwf'] );
			return;
		}
?>
<br /><strong><?php _e("Copie dans le presse-papier : ", self::txt_domain ); ?></strong><br />
<label for='fwf_Flash'>
	<input type='checkbox' id='fwf_Flash' name='fwf[Flash]' value='1'<?php checked($this->with_flash, 1);?> /> <?php _e("Utiliser Flash", self::txt_domain ); ?>
</label>
<br /><br />
<input type='hidden' name='fwf[hidden]' value='0' />
<?php
	}

	function site_url()
	{
		return ( defined( 'WP_SITEURL' ) ) ? WP_SITEURL : site_url();
	}

	function is_ie()
	{
		return ( @preg_match( '/MSIE/', $_SERVER['HTTP_USER_AGENT'], $matches ) );
	}

	function with_flash()
	{
		$options = get_option( self::txt_domain );
		return ( isset( $options['hidden'] ) && !isset( $options['Flash'] ) ) ? 0 : 1;
	}
}
new Forum_wordpress_fr();