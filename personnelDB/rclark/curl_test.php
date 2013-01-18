<?php

// *******************************************************************************************************
// *******************************************************************************************************
// COPYRIGHT 2012, LTER, ALL RIGHTS RESERVED
//
// FILE:            curl_test.php
// DATE:            2012-12-17
// URL:             http://sunshine.lternet.edu/personnelDB/rclark/curl_test.php
// DESCRIPTION:     POSTS AUTHENTICATION HEADERS TO THE API
//
// *******************************************************************************************************
// *******************************************************************************************************






// ************************************ { 2012-08-23 - RC } ************************************
// IS THIS SHELL OR BROWSER
// *********************************************************************************************
$br = php_sapi_name() == 'cli' ? "\n" : "<BR>";




print $br."<FONT COLOR=\"GREEN\"><B>MARKER: 1</B></FONT>";


$post_string = 'site';



$response = send_request_lter_2($post_string);



print "<PRE><FONT COLOR=ORANGE>"; print_r($response); print "</FONT></PRE>";






//$decoded_auth = base64_decode($auth_token);
//print $br.$decoded_auth;



// *********************************************************************************************
// CURL FUNCTION
// SENDS DATA TO LENDER
// *********************************************************************************************
function send_request_lter($post_string) {

	global $br;


//$usr = 'tmonkey';
//$pwd = 'bananas';
//$usr="rclark1";
//$pwd="Jack!A55";
$usr = 'amonkey';
$pwd = 'changeme';


$auth_token = base64_encode($usr.':'.$pwd);
print $br.$auth_token;



	
	// SET THE POST URL
	$post_url = "http://sunshine.lternet.edu/personnelDB/rclark/curl_test_auth_header.php";
	//$post_url = "http://sunshine.lternet.edu/services/personnelDB/".$post_string; // TEST
	print $br."<B>Working URL:</B>".$br."<FONT COLOR=GREEN>".$post_url."</FONT>";


	
	// BUILD THE HEADERS
	$header_3 = array();
	$header_3 = array('Authorization: Basic ' . $auth_token);
	//$header_3[] = "POST /ms.asmx/PrePingFD HTTP/1.1";
	//$header_3[] = "Host: appchktest.mscorpweb.com";
	//$header_3[] = "Content-Type: application/x-www-form-urlencoded";
	//$header_3[] = "Content-Length: ".strlen($post_string);
	


	// CURL REQUEST
	$ch = curl_init();
	//curl_setopt($ch, CURLOPT_CONNECTTIMEOUT,5);  // SET A CONNECTION TIMEOUT
	curl_setopt($ch, CURLOPT_TIMEOUT, 30);  // HOW LONG TO WAIT FOR A RESPONSE
	curl_setopt($ch, CURLOPT_URL, $post_url); // SET THE POST URL
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // GET THE RESPONSE BACK
	curl_setopt($ch, CURLOPT_HTTPHEADER, $header_3); // SEND THE HEADERS
	//curl_setopt($ch, CURLOPT_POSTFIELDS, $post_string); // SEND THE XML POST STRING
	//curl_setopt($ch, CURLOPT_POST, 1);  // THIS IS A POST REQUEST
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);  // DO NOT VERIFY THE SSL IS VALID
	

	
	// EXECUTE THE REQUEST
	$response = curl_exec($ch);
	
	print $br."RESPONSE: ".$response;
	
	// CHECK TO SEE IF WE GOT AN ERROR
	// IF SO, FORMAT IT LIKE THIS   ::28::Operation timed out after 30 seconds
	if ((curl_errno($ch)) && (curl_errno($ch) != 0)) {
		$response = "::".curl_errno($ch)."::".curl_error($ch);
	}

	
	
	// SEND THE RESPONSE BACK TO THE SCRIPT
	return $response;



}






function send_request_lter_2($post_string) {


	$usr = 'amonkey';
	$pwd = 'changeme';


	$auth_token = base64_encode($usr.':'.$pwd);
	print $br.$auth_token;


	$httpOptions = array('method' => 'GET', 'header' => array('Accept: text/xml', 'Authorization: Basic '. $auth_token), 'timeout' => '10');
	$httpContext = stream_context_create(array('http' => $httpOptions));



	// SET THE POST URL
	$post_url = "http://sunshine.lternet.edu/personnelDB/rclark/curl_test_auth_header.php";
	
	
	$response = file_get_contents($post_url, false, $httpContext);
	
	
	return $response;


}



?>