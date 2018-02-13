<?php


/******************************************************/
/* 		             	 Share Message 	                  */
/******************************************************/
  add_action('wp_ajax_getUsernameByMail', 'getUsernameByMail');
  add_action('wp_ajax_nopriv_getUsernameByMail', 'getUsernameByMail');
  function getUsernameByMail(){
    if(isset($_POST['mail']) && !empty($_POST['mail'])){
      // Script
        $username = $_POST['mail'];
        $username = explode('@',$username)[0];
        $username = sanitize_title($username);
      // Retour
        echo json_encode($username);
        die();
    }
    else{
      die();
    }
  }





?>
