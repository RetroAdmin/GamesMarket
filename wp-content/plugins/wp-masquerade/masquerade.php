<?php
/**
* Plugin Name: WP Masquerade
* Description: Allow WP Admin users to easily masquerade as other users on a site
* Plugin URI: https://github.com/Swingline0/masquerade
* Author: JR King/Eran Schoellhorn
* Author URI: https://github.com/Swingline0/masquerade
* Version: 1.1.0
* License: GPL2
*/

/*
Copyright (C) 2014 Eran Schoellhorn me@eran.sh

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

if ( ! defined( 'ABSPATH' ) ) exit;

add_action( 'plugins_loaded', array('WPMasquerade', 'get_instance'));

class WPMasquerade {

	private static $instance = null;

	public static function get_instance(){
		if(!isset(self::$instance))
			self::$instance = new self;

		return self::$instance;
	}

	private function __construct(){
		add_action('init',                     array($this, 'start_session'                ));
		add_action('admin_init',               array($this, 'masq_init'                    ));
		add_action('admin_footer',             array($this, 'masq_as_user_js'              ));
		add_action('wp_ajax_masq_user',        array($this, 'ajax_masq_login'              ));
		add_action('wp_ajax_wpmasq_get_users', array($this, 'ajax_get_users'               ));
		add_action('admin_bar_menu',           array($this, 'add_admin_menu'               ), 99);
		add_action('admin_enqueue_scripts',    array($this, 'register_admin_bar_assets'    ));
		add_action('wp_enqueue_scripts',       array($this, 'register_admin_bar_assets'    ));
		add_action('admin_enqueue_scripts',    array($this, 'register_notification_assets' ));
		add_action('wp_enqueue_scripts',       array($this, 'register_notification_assets' ));
		add_action('wp_footer',                array($this, 'add_notification'             ), 99);
		add_action('admin_footer',             array($this, 'add_notification'             ), 99);
	}

	public function start_session(){
		if(!session_id())
			session_start();

		if(!is_user_logged_in() && isset($_SESSION['wpmsq_active']))
			unset($_SESSION['wpmsq_active']);
	}

	public function register_admin_bar_assets(){
		if(!is_super_admin() || !is_admin_bar_showing())
			return;

		wp_enqueue_script(
			'jquery-chosen',
			plugins_url('vendor/chosen_v1.3.0/chosen.jquery.min.js', __FILE__),
			'jquery', false, true );

		wp_enqueue_style('jquery-chosen', plugins_url('css/chosen-modified.css', __FILE__));

		wp_enqueue_script(
			'wpmsq-admin-bar',
			plugins_url('js/wpmsq-admin-bar.js', __FILE__),
			'jquery-chosen', false, true );

		wp_enqueue_style('wpmsq-admin-bar', plugins_url('css/wpmsq-admin-bar.css', __FILE__));

		wp_localize_script(
			'wpmsq-admin-bar',
			'wpmsqAdminBar',
			array(
				'ajaxurl' => admin_url('admin-ajax.php'),
				'getUsersNonce' => wp_create_nonce('wpmsq_get_users_nonce'),
				'masqNonce' => wp_create_nonce('masq_once')
			)
		);

	}

	public function masq_init(){
		if(is_admin()){
			add_filter('user_row_actions', array($this, 'masq_user_link'), 99, 2);
		}
	}

	public function masq_user_link($actions, $user_object){
		if(current_user_can('delete_users')){
			$current_user = wp_get_current_user();
			if($current_user->ID != $user_object->ID){
				$actions['masquerade'] = "<a class='masquerade-link' data-uid='{$user_object->ID}' href='#' title='Masquerade'>Masquerade</a>";
			}
		}
		return $actions;
	}

	public function masq_as_user_js(){
		if (is_admin()){
			?>
				<script type="text/javascript">
					(function($){
						$('.masquerade-link').click(function(ev){
							ev.preventDefault();
							var ajax_url = '<?php echo admin_url("admin-ajax.php"); ?>';
							var data = {
								action: 'masq_user',
								wponce: '<?php echo wp_create_nonce('masq_once')?>',
								uid: $(this).data('uid')
							};
							$.post(ajax_url, data, function(response){
								if(response == '1'){
									window.location = "<?php echo site_url();?>"
								}
							});
						});
					})(jQuery);
				</script>
			<?php
		}
	}

	public function ajax_masq_login(){
		if(!isset($_POST['wponce']) || !wp_verify_nonce($_POST['wponce'], 'masq_once'))
			wp_die('Security check');

		$uid   = filter_input(INPUT_POST, 'uid', FILTER_SANITIZE_NUMBER_INT);
		$reset = filter_input(INPUT_POST, 'reset', FILTER_VALIDATE_BOOLEAN);

		if(!$reset && !$uid)
			wp_die('Security Check');

		if($reset && !isset($_SESSION['wpmsq_active']))
			wp_logout();

		$user_id   = $reset ? $_SESSION['wpmsq_active']->ID         : $uid;
		$user_name = $reset ? $_SESSION['wpmsq_active']->user_login : get_userdata($uid)->user_login;

		// Flush the session if user requests reset OR user attempts to masquerade as the original user
		if($reset || (isset($_SESSION['wpmsq_active']) && $_SESSION['wpmsq_active']->ID == $uid)){
			unset($_SESSION['wpmsq_active']);
		}elseif(!$reset && !isset($_SESSION['wpmsq_active'])){
			$_SESSION['wpmsq_active'] = wp_get_current_user();
		}

		wp_set_current_user($user_id, $user_name);
		wp_set_auth_cookie($user_id);
		do_action('wp_login', $user_name);

		echo wp_get_current_user()->ID == $user_id ? 1 : 0;
		exit();
	}

	public function ajax_get_users(){
		if(!isset($_GET['n']) || !wp_verify_nonce($_GET['n'], 'wpmsq_get_users_nonce'))
			wp_die('Security check');

		if(!current_user_can('delete_users'))
			wp_die('Security check');

		$users = get_users(array(
			'fields' => array('ID','user_nicename'),
			));

		header('Content-Type: application/json');
		echo json_encode($users);
		exit();
	}

	public function add_admin_menu($wp_admin_bar){
		if(!is_super_admin() || !is_admin_bar_showing())
			return;

		ob_start();
		require 'partials/admin-bar-node.php';
		$html = ob_get_clean();

		$args = array(
			'id'    => 'wpmsq-ab-link',
			'title' => 'Masquerade as...',
			'meta'  => array('html' => $html)
		);

		$wp_admin_bar->add_node($args);
	}

	public function add_notification(){
		if(isset($_SESSION['wpmsq_active'])){
			$prev_user = $_SESSION['wpmsq_active'];
			ob_start();
			require 'partials/active-notification.php';
			echo ob_get_clean();
		}
	}

	public function register_notification_assets(){
		if(!isset($_SESSION['wpmsq_active']))
			return;

		wp_enqueue_style('wpmsq-notification', plugins_url('css/wpmsq-notification.css', __FILE__));

		wp_enqueue_script(
			'wpmsq-notification',
			plugins_url('js/wpmsq-notification.js', __FILE__),
			'jquery', false, true );

		wp_localize_script(
			'wpmsq-notification',
			'wpmsqNotification',
			array(
				'ajaxurl' => admin_url('admin-ajax.php'),
				'masqNonce' => wp_create_nonce('masq_once')
			)
		);
	}

}
