<?php



// ************************************ { 2012-12-07 - RC } ************************************
// FILE TO TEST THE TLS CONNECTION TO LDAP
// *********************************************************************************************






// ************************************ { 2012-12-07 - RC } ************************************
// PRINT A DATE MARKER
// *********************************************************************************************
print "<BR>Date: ".date("Y-m-d H:i:s");






// ************************************ { 2012-12-07 - RC } ************************************
// SET THE DEFAULTS
// *********************************************************************************************
$ldap="ldap://ldap.lternet.edu";
$usr="uid=rclark1,o=lter,dc=ecoinformatics,dc=org";
$pwd="Jack!A55ssss";






// ************************************ { 2012-12-07 - RC } ************************************
// TRY AND ESTABLISH A CONNECTION TO THE LDAP SERVER
// *********************************************************************************************
$ds=ldap_connect($ldap); 
$ldapbind=false;





if (ldap_set_option($ds, LDAP_OPT_PROTOCOL_VERSION, 3)) {
	
	print "<BR>Protocal Set";
	
	if(ldap_set_option($ds, LDAP_OPT_REFERRALS, 0)) {
	
		print "<BR>Referrals Set";

		if(ldap_start_tls($ds)) {
			
			print "<BR>Starting TLS: Attempting To Bind...";
			$ldapbind = ldap_bind($ds, $usr, $pwd);

		}
		else {

			print "<BR>Could Not Start TLS";

		}

	}
	else {

		print "<BR>Could Not Set Opt Referrals";

	}


	print "<BR>Closing LDAP Connection.";
	ldap_close($ds);

}
else {

	print "<BR>Could Not Set Protocol Version";

}

if(!$ldapbind)
	echo "<BR><FONT COLOR=RED><B>ERROR: Not Able To Bind To LDAP.</B></FONT>";
else
	echo "<BR><FONT COLOR=GREEN><B>OK: Was Able To Bind To LDAP Successfully.</B></FONT>";




?>