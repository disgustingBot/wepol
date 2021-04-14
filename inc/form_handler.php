<?php


add_action(        'admin_post_lt_form_handler', 'lt_form_handler');
add_action( 'admin_post_nopriv_lt_form_handler', 'lt_form_handler');
function lt_form_handler() {
	$debugMode = false;
	$respuesta = array();


  $link=$_POST['link'];

	if($_POST['a00'] != ""){
		$link = add_query_arg( array('no' => 'go',), $link );
	} else {

		$message='';

		$ignore_this_keys = array('a00', 'action', 'link', 'status', 'submit', 'g-recaptcha-response', 'token');
    foreach ($_POST as $key => $value) {
      // if ( $key != 'a00' && $key != 'action' && $key != 'link' && $key != 'status' && $key != 'submit' && $key != 'g-recaptcha-response' ) {
      // }
			if (!in_array($key, $ignore_this_keys)) {
				$message=$message.'<strong>'.$key.':</strong> '.$value.' - <br>';
				// echo "BB is not found";
			}
    }


    $headers = array('Content-Type: text/html; charset=UTF-8');

    $site = '6LdjfoEaAAAAABvZvcpj1DkuySF5DVeXSQ0mUbjf';
    $scrt = '6LdjfoEaAAAAAPtLYImMO__2eadmy5qj_SBy_amg';




		    $token = $_POST['token'];
				// $link = add_query_arg( array( 'token' => $token , ), $link );

				// get validation from google
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
				curl_setopt($ch, CURLOPT_HEADER, 0);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_POST, 1);
				curl_setopt($ch, CURLOPT_POSTFIELDS, array(
				  'secret' => $scrt,
				  'response' => $token,
				  'remoteip' => $_SERVER['REMOTE_ADDR']
				));
				// save response in a variable
				$boring_google_response = json_decode(curl_exec($ch));
				curl_close($ch);
				// end of get validation




		    if ($boring_google_response->success) {
					if (wp_mail( get_option('contact_form_to') , $subject , $message , $headers )) {
						// wp_mail( $email2 , $subject , $message , $headers );
						// wp_mail( $_POST['email'] , $subject , $message , $headers );
						$link = add_query_arg( array( 'status' => 'sent' , ), $link );
					} else {
						$link = add_query_arg( array( 'status' => 'error', ), $link );
					}
		    } else {
					$link = add_query_arg( array( 'status' => 'bot' , ), $link );
					// foreach ($_POST as $key => $value) {
					// 	$link = add_query_arg( array( $key => $value , ), $link );
					// 	// code...
					// }
		    }
	}
	wp_redirect($link);
	// if($debugMode){echo wp_json_encode($respuesta);}
	exit();
}
