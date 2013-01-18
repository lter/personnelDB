<?php

// *******************************************************************************************************
// *******************************************************************************************************
// COPYRIGHT 2013, NET WHIZ MEDIA, LLC, ALL RIGHTS RESERVED
//
// FILE:            curl_test_auth_header.php
// DATE:            2013-01-07
// URL:             http://sunshine.lternet.edu/personnelDB/rclark/curl_test_auth_header.php
// DESCRIPTION:     MESSING WITH THE AUTHORIZATION HEADER IN CURL
//
// *******************************************************************************************************
// *******************************************************************************************************





// ************************************ { 2012-08-23 - RC } ************************************
// IS THIS SHELL OR BROWSER
// *********************************************************************************************
$br = php_sapi_name() == 'cli' ? "\n" : "<BR>";






// ************************************ { 2013-01-07 - RC } ************************************
// SET THE DEFAULTS
// *********************************************************************************************
$auth_token = '';
$headers = apache_request_headers();









print "<PRE><FONT COLOR=RED>"; print_r($headers); print "</FONT></PRE>";


if ($headers['Authorization']) {

	if (preg_match('/basic /i', $headers['Authorization'])) {
		$auth_token = preg_replace('/basic /i', '', $headers['Authorization']);
		$auth_token = trim($auth_token);
	}
	else {
		print $br."Authentication Is Not Basic";
	}

}
else {
	print $br."No Authorization Header Present";
}




if ($auth_token) {

	print $br.$auth_token;
	$decoded_auth = base64_decode($auth_token);
	print $br.$decoded_auth;
	
	if (ldap_verification($auth_token)) {
		print $br."LDAP VERIFIED";
	}
	else {
		print $br."LDAP NOT VERIFIED";
	}

}
else {

	print $br."Error Processing The Authorization Request";

}







function ldap_verification($auth_token) {



	// ************************************ { 2013-01-07 - RC } ************************************
	// SPLIT THE USERNAME AND PASSWORD APART
	// *********************************************************************************************
	$decoded_auth = base64_decode($auth_token);
	if (preg_match('/:/', $decoded_auth)) {
		list($ldap_username, $ldap_password) = explode(':', $decoded_auth);
	}
	else {
		return false;
	}






	// ************************************ { 2012-12-07 - RC } ************************************
	// SET THE DEFAULTS
	// *********************************************************************************************
	$ldap = "ldap://ldap.lternet.edu";
	$usr = "uid=".$ldap_username.",o=lter,dc=ecoinformatics,dc=org";
	$pwd = $ldap_password;

	$message = array();






	// ************************************ { 2012-12-07 - RC } ************************************
	// TRY AND ESTABLISH A CONNECTION TO THE LDAP SERVER
	// *********************************************************************************************
	$ds=ldap_connect($ldap); 
	$ldapbind=false;






	// ************************************ { 2013-01-07 - RC } ************************************
	// TRY AND RUN THROUGH THE TESTS AND MAKE A BIND TO THE LDAP SERVER
	// *********************************************************************************************
	if (ldap_set_option($ds, LDAP_OPT_PROTOCOL_VERSION, 3)) {

		$message[] = "Protocol Has Been Set.";

		if(ldap_set_option($ds, LDAP_OPT_REFERRALS, 0)) {

			$message[] = "Referrals Have Been Set.";

			if(ldap_start_tls($ds)) {

				$message[] = "Starting TLS: Attempting To Bind...";
				$ldapbind = ldap_bind($ds, $usr, $pwd);

			}
			else {

				$message[] = "Could Not Start TLS.";

			}

		}
		else {

			$message[] = "Could Not Set Opt Referrals.";

		}


		$message[] = "Closing LDAP Connection.";
		ldap_close($ds);

	}
	else {

		$message[] = "Could Not Set Protocol Version";

	}



	if (!$ldapbind) {
		$message[] = "<FONT COLOR=RED><B>ERROR: Not Able To Bind To LDAP.</B></FONT>";
		return false;
	}
	else {
		$message[] = "<FONT COLOR=GREEN><B>OK: Was Able To Bind To LDAP Successfully.</B></FONT>";
		return true;
	}




}



if ($message) {
	print_r($message);
}



?>