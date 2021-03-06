<?php




/*****************************************************************/
/*                        COLOR MAG INIT                         */
/*****************************************************************/
  // -----
    add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
    function theme_enqueue_styles() {
      // wp_enqueue_style( 'parent-style', get_stylesheet_directory_uri() . '/style.css', '', '4.9.6' );
     wp_enqueue_style( 'parent-style', 'http://gamesmarket.fr/betaccess/wp-content/themes/colormag/style.css?ver=4.9.6' );
     wp_enqueue_style( 'jquery-ui', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css');
    }
  // -----
    function cuar_change_dashboard_block_title($old_title) {
      return 'Commandes';
    }
    $page_slug = 'customer-private-files';
    add_filter('cuar/core/dashboard/block-title?slug=' . $page_slug, 'cuar_change_dashboard_block_title');
  // -----
    function cuar_change_associated_block_title($old_title) {
      return 'Associated files';
    }
    $post_type = 'cuar_private_file';
    add_filter('cuar/core/page/container-content-subtitle?type=' . $post_type, 'cuar_change_associated_block_title');
  // -----
    function change_login_redirect($url, $original_redirect) {
      return 'http://www.google.fr';
    }
    add_filter('cuar/routing/login-url', 'change_login_redirect');
  // -----
    function paypal_func($posted) {
      // Parse data from IPN $posted array
       $mc_gross = isset($posted['mc_gross']) ? $posted['mc_gross'] : '';
       $invoice = isset($posted['invoice']) ? $posted['invoice'] : '';
       $protection_eligibility = isset($posted['protection_eligibility']) ? $posted['protection_eligibility'] : '';
       $address_status = isset($posted['address_status']) ? $posted['address_status'] : '';
       $payer_id = isset($posted['payer_id']) ? $posted['payer_id'] : '';
       $tax = isset($posted['tax']) ? $posted['tax'] : '';
       $address_street = isset($posted['address_street']) ? $posted['address_street'] : '';
       $payment_date = isset($posted['payment_date']) ? $posted['payment_date'] : '';
       $payment_status = isset($posted['payment_status']) ? $posted['payment_status'] : '';
       $charset = isset($posted['charset']) ? $posted['charset'] : '';
       $address_zip = isset($posted['address_zip']) ? $posted['address_zip'] : '';
       $mc_shipping = isset($posted['mc_shipping']) ? $posted['mc_shipping'] : '';
       $mc_handling = isset($posted['mc_handling']) ? $posted['mc_handling'] : '';
       $first_name = isset($posted['first_name']) ? $posted['first_name'] : '';
       $address_country_code = isset($posted['address_country_code']) ? $posted['address_country_code'] : '';
       $address_name = isset($posted['address_name']) ? $posted['address_name'] : '';
       $notify_version = isset($posted['notify_version']) ? $posted['notify_version'] : '';
       $payer_status = isset($posted['payer_status']) ? $posted['payer_status'] : '';
       $business = isset($posted['business']) ? $posted['business'] : '';
       $address_country = isset($posted['address_country']) ? $posted['address_country'] : '';
       $num_cart_items = isset($posted['num_cart_items']) ? $posted['num_cart_items'] : '';
       $mc_handling1 = isset($posted['mc_handling1']) ? $posted['mc_handling1'] : '';
       $address_city = isset($posted['address_city']) ? $posted['address_city'] : '';
       $verify_sign = isset($posted['verify_sign']) ? $posted['verify_sign'] : '';
       $payer_email = isset($posted['payer_email']) ? $posted['payer_email'] : '';
       $mc_shipping1 = isset($posted['mc_shipping1']) ? $posted['mc_shipping1'] : '';
       $tax1 = isset($posted['tax1']) ? $posted['tax1'] : '';
       $txn_id = isset($posted['txn_id']) ? $posted['txn_id'] : '';
       $payment_type = isset($posted['payment_type']) ? $posted['payment_type'] : '';
       $last_name = isset($posted['last_name']) ? $posted['last_name'] : '';
       $address_state = isset($posted['address_state']) ? $posted['address_state'] : '';
       $item_name1 = isset($posted['item_name1']) ? $posted['item_name1'] : '';
       $receiver_email = isset($posted['receiver_email']) ? $posted['receiver_email'] : '';
       $quantity1 = isset($posted['quantity1']) ? $posted['quantity1'] : '';
       $receiver_id = isset($posted['receiver_id']) ? $posted['receiver_id'] : '';
       $pending_reason = isset($posted['pending_reason']) ? $posted['pending_reason'] : '';
       $txn_type = isset($posted['txn_type']) ? $posted['txn_type'] : '';
       $mc_gross_1 = isset($posted['mc_gross_1']) ? $posted['mc_gross_1'] : '';
       $mc_currency = isset($posted['mc_currency']) ? $posted['mc_currency'] : '';
       $residence_country = isset($posted['residence_country']) ? $posted['residence_country'] : '';
       $test_ipn = isset($posted['test_ipn']) ? $posted['test_ipn'] : '';
       $receipt_id = isset($posted['receipt_id']) ? $posted['receipt_id'] : '';
       $ipn_track_id = isset($posted['ipn_track_id']) ? $posted['ipn_track_id'] : '';
       $IPN_status = isset($posted['IPN_status']) ? $posted['IPN_status'] : '';
       $cart_items = isset($posted['cart_items']) ? $posted['cart_items'] : '';
       /**
       * At this point you can use the data to generate email notifications,
       * update your local database, hit 3rd party web services, or anything
       * else you might want to automate based on this type of IPN.
       */
   }
   add_action('paypal_ipn_for_wordpress_ipn_response_handler', 'paypal_func', 10, 1);


function msk_load_css_fontawesome() {
  if (!is_admin()) {
    wp_enqueue_style( 'font-awesome', '//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css', null, '4.0.1' );
  }
}
add_action('wp_enqueue_scripts', 'msk_load_css_fontawesome');




 /*****************************************************************/
 /*                      AJOUT DES FONCTIONS                      */
 /*****************************************************************/
   require_once(get_template_directory().'-child/assets/functions/enqueue-ressources.php');  // Ressources
   require_once(get_template_directory().'-child/assets/functions/user.php');  // Gestion inscription / connexion
   require_once(get_template_directory().'-child/assets/functions/menus.php'); // Gestion des menus supplémentaires
   require_once(get_template_directory().'-child/assets/functions/slugify.php'); // Gestion des menus supplémentaires
   require_once(get_template_directory().'-child/assets/functions/rewrite.php'); // Gestion des menus supplémentaires
