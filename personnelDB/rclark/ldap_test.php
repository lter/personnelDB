<?php



// ************************************ { 2012-12-03 - RC } ************************************
// TAKE THE FORM INPUTS (IF ANY) AND USE THEM TO PREPOP THE FORM AND PERFORM THE AUTHENTICATION
// *********************************************************************************************
$ldap_user = $_POST['ldap_user'];
$ldap_pass = $_POST['ldap_pass'];
$ldap_server = $_POST['ldap_server'];






// ************************************ { 2012-12-03 - RC } ************************************
// SET THE DEFAULTS
// *********************************************************************************************
if (!$ldap_server) {
	$ldap_server = 'ldap://ldap.lternet.edu';
}






// ************************************ { 2012-12-03 - RC } ************************************
// BUILD OUT THE FORM FOR ENTERING IN A USERNAME AND PASSWORD
// *********************************************************************************************
print "
<FORM ACTION=\"ldap_test.php\" METHOD=POST>

<TABLE BORDER=0 CELLPADDING=5 CELLSPACING=1 BGCOLOR=\"#555555\">
<TR BGCOLOR=\"#ffffff\">
  <TD>LDAP USER:</TD>
  <TD><INPUT TYPE=TEXT NAME=\"ldap_user\" VALUE=\"".$ldap_user."\"></TD>
</TR>
<TR BGCOLOR=\"#ffffff\">
  <TD>LDAP PASS:</TD>
  <TD><INPUT TYPE=PASSWORD NAME=\"ldap_pass\" VALUE=\"".$ldap_pass."\"></TD>
</TR>
<TR BGCOLOR=\"#ffffff\">
  <TD>LDAP SERVER:</TD>
  <TD><INPUT TYPE=TEXT NAME=\"ldap_server\" VALUE=\"".$ldap_server."\"></TD>
</TR>
<TR BGCOLOR=\"#cccccc\">
  <TD COLSPAN=2 ALIGN=CENTER><INPUT TYPE=SUBMIT VALUE=\"Check User\"></TD>
</TR>
</TABLE>

</FORM>";






if (($ldap_user) && ($ldap_pass) && ($ldap_server)) {


	// ************************************ { 2012-12-03 - RC } ************************************
	// PRINT DIAGNOSTICS
	// *********************************************************************************************
	print "<BR>Date: ".date("Y-m-d H:i:s");
	print "<BR>Trying To Connect....";






	// ************************************ { 2012-12-03 - RC } ************************************
	// RUN THE FUNCTION TO BIND TO THE LDAP SERVER
	// FUNCTION LIVES AT THE BOTTOM OF THIS FILE
	// *********************************************************************************************
	$response = validate_against_ldap($ldap_user, $ldap_pass, $ldap_server) or die("<BR>Cannot Authenticate");
	print "<PRE><FONT COLOR=ORANGE>LDAP RESPONSE: "; print_r($response); print "</FONT></PRE>";



}






// ************************************ { 2012-12-03 - RC } ************************************
// THIS FUNCTION BINDS THE USER TO LDAP FOR AUTHORIZATION
// *********************************************************************************************
function validate_against_ldap($ldap_user, $ldap_pass, $ldap_server) {



	// ************************************ { 2012-12-03 - RC } ************************************
	// BUILD OUT THE AUTH USER STRING
	// *********************************************************************************************	
	$auth_user='uid='.$ldap_user.',o=lter,dc=ecoinformatics,dc=org';






	// ************************************ { 2012-12-03 - RC } ************************************
	// TRY TO CONNECT TO THE LDAP SERVER AND SET THE OPTIONS
	// *********************************************************************************************
	$ldap_conn = ldap_connect($ldap_server, 389) or die("Cannot Make An LDAP Connection To <FONT COLOR=BLUE>".$ldap_server."</FONT>");
	ldap_set_option($ldap_conn, LDAP_OPT_PROTOCOL_VERSION, 3);






	// ************************************ { 2012-12-03 - RC } ************************************
	// IF WE HAVE A CONNECTION, TRY TO BIND THE USERNAME AND PASSWORD
	// - THIS WILL ALWAYS WORK, EVEN IF WE PUT IN A BOGUS SERVER NAME - WTF???
	// *********************************************************************************************
	if ($ldap_conn) {



		print "<BR>Connection To '<FONT COLOR=BLUE>".$ldap_server."'</FONT> Was Successful";

		// ************************************ { 2012-12-03 - RC } ************************************
		// USE THE LDAP SERVER, THE USERNAME AND PASSWORD TO VALIDATE THE USER
		// *********************************************************************************************
		$r=ldap_bind($ldap_conn, $auth_user, $ldap_pass);






		// ************************************ { 2012-12-03 - RC } ************************************
		// CHECK TO SEE IF WE AUTHENTICATED OR NOT
		// *********************************************************************************************
		if(!$r) {

			$message = "<FONT COLOR=RED><B>User ".$ldap_user." Could Not Be Authenticated.</B></FONT>";

		}
		else {

			echo "<BR>ldap_bind success";
			ldap_close($ldap_conn);
			$message = "<FONT COLOR=GREEN><B>User ".$ldap_user." Was Authenticated.</B></FONT>";

		}



	}
	else {



		// ************************************ { 2012-12-03 - RC } ************************************
		// WE WERE NOT ABLE TO MAKE A CONNECTION WITH THE LDAP SERVER
		// *********************************************************************************************
		print "<BR>DS Was Not Successful";
		$message = "<FONT COLOR=GREEN><B>User ".$ldap_user." Was Authenticated.</B></FONT>";



	}


	
	return $message;



}



?>