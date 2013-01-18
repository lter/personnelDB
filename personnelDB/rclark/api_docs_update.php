<?php



// ************************************ { 2012-11-19 - RC } ************************************
// REQUIRE THE COLOR CODING SCRIPT AND THE EXAMPLE DATA
// EXAMPLE DATA WAS PUT INTO ANOTHER FILE TO MAKE IT EASIER TO READ THIS SCRIPT
// *********************************************************************************************
require_once 'geshi/geshi.php';
require_once 'help_example_data.php';






// ************************************ { 2012-11-19 - RC } ************************************
// BUILD OUT THE DOCUMENT ARRAY
// *********************************************************************************************
$docs = array(
	array(
		"title" => "LTER API Overview",
		"text" => "This section gives a broad view of the API (application programming interface).  It will generally explain when and how to use the API.",
		"content" => array(
			array(
				"title" => "Introduction",
				"text" => "The LTER API (Application Programming Interface) is an efficient way to have all of the LTER Personnel databases kept current.  
							It allows for the computers to talk to each other so that all updates are seamless.  The API allows reading, writing and updating of the 
							database without having to go into each table and edit the data directly.  The results from the API will be returned in XML format which 
							can be styled to match any layout or color scheme."
			),
			array(
				"title" => "What is an API?",
				"text" => "The term API merely refers to a set of scripts that have been put in place to allow third-party applications to interact with an internal database.
							
							<br />
							<br />
							
							In the context that LTER is using it, the API will allow users to add new records as well as edit & view existing records.  
							All data going into and coming out of the database is standardized and consistent.  Each API is application-specific, so LTER does not need to
							give out the database usernames and passwords to people who want to change the data and all data being inserted into the database will be 
							checked for errors and put into a standard format.  Additionally, the API will make quick work of inserting/editing data across multiple tables.
							
							<br />
							<br />
							
							There are different ways to set up and connect to an API.  LTER has chosen the <a href=\"#rest\">REST</a> method for its ease of use scalability.  
							More information on <a href=\"#rest\">REST</a> is below.  To interact with the API, servers will use <a href=\"#curl\">CURL</a> to send data to and retrieve data from
							the API.  The data will be returned in <a href=\"#xml\">XML</a> format for easy parsing and displaying."
			),
			array(
				"title" => "What is REST?",
				"text" => "<span id=\"rest\"></span>REST stands for \"Representational State Transfer\". Despite its long and perhaps confusing name, it is perhaps the easiest API method to use.
							
							<br />
							<br />
							
							REST APIs generally consist of a URL which can be typed into the address bar of a web browser. Often, there will be a base URL which, when called, will return a vast 
							amount of data.  Filtering down the results can be achieved by adding additional parameters to the end of the URL. As you add on to the URL, the results will narrow down.
							
							<br />
							<br />
							
							For example, pasting this URL into the browser could bring back 10 results.
							
							<br />
							<br />
							
							".$rest_url_1."
							
							<br />
							<br />
							
							Adding a role type of \"local\" to the end of the URL will give us 5 results.
							
							<br />
							<br />
							
							".$rest_url_2."
							
							<br />
							<br />
							
							We can further narrow down the results by adding a role number to the end of the script.  Setting a role type of \"9\" will give us only one result.
							
							<br />
							<br />
							
							".$rest_url_3."
							
							<br />
							<br />
							
							Although so far this section has focused on using REST as a link, it is far more robust than that and allows not only viewing data in the database, but also adding, 
							editing and deleting data."
							
			),
			array(
				"title" => "What is XML?",
				"text" => "<span id=\"xml\"></span>XML stands for \"Extensible Markup Language\" and is a way to store and transport data.  Unlike HTML, it is not used for displaying data.  PHP provides 
							a few ways to display data stored in XML, the easiest of which is SimpleXML.  There will be examples of how to use SimpleXML later in this document, but here is a link to 
							PHP's website with more information: 
							
							<br />
							<br />
							
							".build_link('http://us2.php.net/manual/en/simplexml.examples-basic.php')."
							
  	  						<br />
  	  						<br />
  	  						
  	  						As XML is merely a way to store and transport data, it leaves the styling and layout of the data to the user.  XML data can be taken out and displayed to match any website 
  	  						template or design."
  	  						
			),
			array(
				"title" => "What is CURL",
				"text" => "<span id=\"curl\"></span>PHP uses \"libcurl\", which is an extension of the command-line cURL library, as one of the ways to transfer data between two computers.  It generally 
							comes standard with PHP so there are no additional things to do to get it to work.  cURL, although not the easiest method to interface with, is fairly straightforward and it 
							is simply the most powerful method for pulling data down or pushing data up to a different server."
			)
		)
	),
	array(
		"title" => "Using the API to view data",
		"text" => "The first and easiest way to use the API is to view data.  Use <a href=\"#curl\">cURL</a> to connect to the REST API and parse the XML that is sent back.",
		"content" => array(
			array(
				"title" => "Building the URL",
				"text" => "This Is The Sub Heading Text For Subheading 3"
			),
			array(
				"title" => "Sub Heading #4",
				"text" => "This Is The Sub Heading Text For Subheading 4"
			)
		)
	),
	array(
		"title" => "REST API URLs",
		"text" => "<span id=\"rest_urls\"></span>This section lists out the possible URLs that can be used in interacting with the server.",
		"content" => array(
			array(
				"title" => "Building the URL",
				"text" => "The REST URLs all have a base of: 
							
							<br />
							<br />
							
							".$rest_url_4."
							
							<br />
							<br />
							
							The actions that can be appended to the URL are in the following table.
							
							<br />
							<br />
							
							<table border=0 cellpadding=0 cellspacing=1 bgcolor=\"#555555\" width=100%>
							<tr bgcolor=\"#cccccc\">
							  <td width=30% align=center><b>1st URL Part</b></td>
							  <td width=40% align=center><b>2nd URL Part</b></td>
							  <td width=30% align=center><b>3rd URL Part</b></td>
							</tr>
							<tr bgcolor=\"#ffffff\">
							  <td style=\"padding-left: 5px;\"><span style=\"color: red; font-weight: bold;\">/</span>contact</td>
							  <td style=\"padding-left: 5px;\"><span style=\"color: red; font-weight: bold;\">/</span>[Contact ID #]</td>
							  <td style=\"padding-left: 5px;\">&nbsp;</td>
							</tr>
							<tr bgcolor=\"#ffffff\">
							  <td style=\"padding-left: 5px;\"><span style=\"color: red; font-weight: bold;\">/</span>identity</td>
							  <td style=\"padding-left: 5px;\"><span style=\"color: red; font-weight: bold;\">/</span>[Person's ID #]</td>
							  <td style=\"padding-left: 5px;\">&nbsp;</td>
							</tr>
							<tr bgcolor=\"#ffffff\">
							  <td style=\"padding-left: 5px;\"><span style=\"color: red; font-weight: bold;\">/</span>person</td>
							  <td style=\"padding-left: 5px;\"><span style=\"color: red; font-weight: bold;\">/</span>[Person's ID #]</td>
							  <td style=\"padding-left: 5px;\">&nbsp;</td>
							</tr>
							<tr bgcolor=\"#ffffff\">
							  <td style=\"padding-left: 5px;\"><span style=\"color: red; font-weight: bold;\">/</span>role</td>
							  <td style=\"padding-left: 5px;\"><span style=\"color: red; font-weight: bold;\">/</span>nsf <span style=\"color: green;\">Or</span> <span style=\"color: red; font-weight: bold;\">/</span>local</td>
							  <td style=\"padding-left: 5px;\"><span style=\"color: red; font-weight: bold;\">/</span>[Role ID #]</td>
							</tr>
							<tr bgcolor=\"#ffffff\">
							  <td style=\"padding-left: 5px;\"><span style=\"color: red; font-weight: bold;\">/</span>roleType</td>
							  <td style=\"padding-left: 5px;\"><span style=\"color: red; font-weight: bold;\">/</span>nsf <span style=\"color: green;\">Or</span> <span style=\"color: red; font-weight: bold;\">/</span>local</td>
							  <td style=\"padding-left: 5px;\"><span style=\"color: red; font-weight: bold;\">/</span>[Role ID #]</td>
							</tr>
							<tr bgcolor=\"#ffffff\">
							  <td style=\"padding-left: 5px;\"><span style=\"color: red; font-weight: bold;\">/</span>site</td>
							  <td style=\"padding-left: 5px;\"><span style=\"color: red; font-weight: bold;\">/</span>3 Character Site Code <span style=\"color: green;\">Or</span> <span style=\"color: red; font-weight: bold;\">/</span>[Site ID #]</td>
							  <td style=\"padding-left: 5px;\">&nbsp;</td>
							</tr>
							</table>"
			),
			array(
				"title" => "/contact",
				"text" => "The '<b><span style=\"color: red; font-weight: bold;\">/</span>contact</b>' section provides information on personnel such as their address and phone number.  It also lists the site(s) that they are associated with.
							
							<br />
							<br />
							
							The main '<b><span style=\"color: red; font-weight: bold;\">/</span>contact</b>' URL will list the contact information for all personell and has the following format: 
							
							<br />
							<br />
							
							".$rest_url_5."
							
							<br />
							<br />
							
							Additional filtering can be applied to see a specific contact id and will use the '<b>contactInfoID</b>' node in the <a href=\"xml\">XML</a>.  A finished URL will have the following format: 
							
							<br />
							<br />
							
							".$rest_url_6."
							
							<br />
							<br />
							
							The following <a href=\"xml\">XML</a> will be returned:
							
							<br />
							<br />
				
							".$xml_data_contact_1
			),
			array(
				"title" => "/identity",
				"text" => "The '<b><span style=\"color: red; font-weight: bold;\">/</span>identity</b>' section provides information on personnel such as their name, aliases and position title.
							
							<br />
							<br />
							
							The main '<b><span style=\"color: red; font-weight: bold;\">/</span>identity</b>' URL will list the information for all personell and has the following format: 
							
							<br />
							<br />
							
							".$rest_url_7."
							
							<br />
							<br />
							
							Additional filtering can be applied to see a specific person id and will use the '<b>personID</b>' node in the <a href=\"xml\">XML</a>.  A finished URL will have the following format: 
							
							<br />
							<br />
							
							".$rest_url_8."
							
							<br />
							<br />
							
							The following <a href=\"xml\">XML</a> will be returned:
							
							<br />
							<br />
				
							".$xml_data_identity_1
			),
			array(
				"title" => "/person",
				"text" => "The '<b><span style=\"color: red; font-weight: bold;\">/</span>person</b>' section provides everything in the database on an individual.  It is a combination of 
							'<b><span style=\"color: red; font-weight: bold;\">/</span>identity</b>', '<b><span style=\"color: red; font-weight: bold;\">/</span>contact</b>' and
							'<b><span style=\"color: red; font-weight: bold;\">/</span>role</b>'.
							
							<br />
							<br />
							
							The main '<b><span style=\"color: red; font-weight: bold;\">/</span>person</b>' URL will list the contact information for all personell and has the following format: 
							
							<br />
							<br />
							
							".$rest_url_9."
							
							<br />
							<br />
							
							Additional filtering can be applied to see a specific person id and will use the '<b>personID</b>' node in the <a href=\"xml\">XML</a>.  A finished URL will have the following format: 
							
							<br />
							<br />
							
							".$rest_url_10."
							
							<br />
							<br />
							
							The following <a href=\"xml\">XML</a> will be returned:
							
							<br />
							<br />
				
							".$xml_data_person_1
			),
			array(
				"title" => "/role",
				"text" => "The main '<b><span style=\"color: red; font-weight: bold;\">/</span>role</b>' URL will list all of the different available roles and has the following format: 
							
							<br />
							<br />
							
							".$rest_url_11."
							
							<br />
							<br />
							
							Appeding either '<b><span style=\"color: red; font-weight: bold;\">/</span>nsf</b>' or '<b><span style=\"color: red; font-weight: bold;\">/</span>local</b>' to the URL will show the available 
							roles set up for that type.
							
							<br />
							<br />
							
							".$rest_url_12."
							
							<br />
							<br />
							
							Additional filtering can be applied to see a specific information and will use the '<b>roleID</b>' node in the <a href=\"xml\">XML</a>.  A finished URL will have the following format: 
							
							<br />
							<br />
							
							".$rest_url_13."
							
							<br />
							<br />
							
							The following <a href=\"xml\">XML</a> will be returned:
							
							<br />
							<br />
				
							".$xml_data_role_1
			),
			array(
				"title" => "/roleType",
				"text" => "The main '<b><span style=\"color: red; font-weight: bold;\">/</span>roleType</b>' URL will list all of the different available role types and has the following format: 
							
							<br />
							<br />
							
							".$rest_url_14."
							
							<br />
							<br />
							
							Appeding either '<b><span style=\"color: red; font-weight: bold;\">/</span>nsf</b>' or '<b><span style=\"color: red; font-weight: bold;\">/</span>local</b>' to the URL will show the available 
							role types set up for that option.
							
							<br />
							<br />
							
							".$rest_url_15."
							
							<br />
							<br />
							
							Additional filtering can be applied to see a specific information and will use the '<b>nsfRoleTypeID</b>' or '<b>localRoleTypeID</b>' node in the <a href=\"xml\">XML</a>.  A finished URL will have the following format: 
							
							<br />
							<br />
							
							".$rest_url_16."
							
							<br />
							<br />
							
							The following <a href=\"xml\">XML</a> will be returned:
							
							<br />
							<br />
				
							".$xml_data_role_type_1
			),
			array(
				"title" => "/site",
				"text" => "The '<b><span style=\"color: red; font-weight: bold;\">/</span>site</b>' section provides information on all locations or a specific location.
							
							<br />
							<br />
							
							The main '<b><span style=\"color: red; font-weight: bold;\">/</span>site</b>' URL will list information on all of the sites and has the following format: 
							
							<br />
							<br />
							
							".$rest_url_17."
							
							<br />
							<br />
							
							Additional filtering can be applied to see specific site information and can use either the 3-character site code (such as LNO) found in the '<b>siteAcronym</b>' node in 
							the <a href=\"xml\">XML</a> or the '<b>siteID</b>' node in the <a href=\"xml\">XML</a>.  A finished URL will have the following format: 
							
							<br />
							<br />
							
							".$rest_url_18."
							
							<br />
							<br />
							
							The following <a href=\"xml\">XML</a> will be returned:
							
							<br />
							<br />
				
							".$xml_data_site_1
			)
		)
	),
	array(
		"title" => "Connecting To The API",
		"text" => "This section details the process for interacting with the API through PHP.",
		"content" => array(
			array(
				"title" => "The basics - Seding a request",
				"text" => "In PHP, cURL is one of the methods used to get data from an API and bring it back to the server.  First, initialize a cURL request, feed the request any desired options and finally 
							execute the request. Here is a code example for how to accomplish this:
							
							<br />
							<br />
							
							".$php_curl_1."
							
							<br />
							<br />
							
							Code Walkthrough:
							<ul>
							  <li>Lines 1 & 10: Open and close PHP.</li>
							  <li>Line 3: Initialize a cURL request.</li>
							  <li>Line 4: Set the URL to pull data from.</li>
							  <li>Line 5: Tell cURL that we want to get the response back.</li>
							  <li>Line 6: Execute the request and store the reponse in a variable named '\$response'.</li>
							  <li>Line 8: Print out the '\$response' variable.  (This will return XML.)</li>
							
							"
			),
			array(
				"title" => "The basics - Parsing a response",
				"text" => "Once the cURL request has been executed and XML data has been returned, that data can now be parsed and displayed in any manner deemed appropriate.  PHP has built-in functionality 
							to handle parsing the data.  It is called \"SimpleXML\" and using the '\$response' variable from the previous cURL request, here is an example of how it works:
							
							<br />
							<br />
							<b>Printing Out Everything:</b>
							<br />
							To see everything that is returned, use PHP's \"print_r\", along with HTML's \"pre\" tags to display the object.
							".$php_simple_xml_1."
							
							<br />
							
							Code Walkthrough:
							<ul>
							  <li>Lines 1 & 6: Open and close PHP.</li>
							  <li>Line 3: Use SimpleXML to parse the '\$response' variable and store it into a PHP object named '\$xml'.</li>
							  <li>Line 4: Dump out everything in the '\$xml' object.</li>
							</ul>
							
							<br />
							<br />
							This will output results like the following:
							
							".$php_response_1."
							
							Each object can be looped through or accessed directly by using the numbers in the square braces along the left side.  In the example above, those are 
							\"<span style=\"color: #009900;\">&#91;</span><span style=\"color: #cc66cc;\">0</span><span style=\"color: #009900;\">&#93;</span>\", 
							\"<span style=\"color: #009900;\">&#91;</span><span style=\"color: #cc66cc;\">1</span><span style=\"color: #009900;\">&#93;</span>\" and 
							\"<span style=\"color: #009900;\">&#91;</span><span style=\"color: #cc66cc;\">2</span><span style=\"color: #009900;\">&#93;</span>\".
							
							<br />
							<br />
							<br />
							
							<b>Printing Out Individual Elements:</b>
							".$php_simple_xml_2."
							
							<br />
							<br />
							
							Code Walkthrough:
							<ul>
							  <li>Line 3: Use SimpleXML to parse the '\$response' variable and store it into a PHP object named '\$xml'.</li>
							  <li>Line 4: Use the 'site' array number to access the 'siteAcronym' for that item.</li>
							  <li>Line 6: Print out the site's acronym.</li>
							</ul>"
			)
		)
	)
);


/*
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'http://sunshine.lternet.edu/services/personnelDB/site');

curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // GET THE RESPONSE BACK

$response = curl_exec($ch); // EXECUTE THE REQUEST

 

print $response;



$xml = new SimpleXMLElement($response); 

 

// PRINT OUT EVERYTHING

print "<pre>"; print_r($xml); print "</pre>"; 

 

// ACCESS A PARTICULAR PART OF THE OBJECT

foreach ($xml->site AS $site) {
	print "<BR>SITE ACRONYM: ".$site->siteAcronym;
}

$site_acronym = $xml->site[29]->siteAcronym;

 

print "SITE ACRONYM: ".$site_acronym;
*/
/*

8558432549 

04820125

1120563197-8

*/
?>
<html>

<head>

<title>LTER API Docs - Updating Records</title>

<style>
td {font-family: VERDANA; font-size: 11px; color: #000000;}
ul {padding: 2px 0px 0px 30px; margin: 0;}
a {color: #6593cf;}
.bold {font-family: VERDANA; font-size: 12px; color: #000000; font-weight: bold;}
.toc {font-family: VERDANA; font-size: 11px; color: #000000; line-height: 18px;}
.toc_bold {font-family: VERDANA; font-size: 11px; color: #000000; line-height: 18px; font-weight: bold;}
.toc_title {font-family: VERDANA; font-size: 11px; color: #000000; line-height: 18px; font-weight: bold; background-color: #EEEEEE; cursor: hand;}
.toc_subtitle {font-family: VERDANA; font-size: 11px; color: #000000; line-height: 18px; font-weight: bold; background-color: #FFFFFF; cursor: hand; padding: 0px 0px 0px 20px;}
.headline {font-family: VERDANA; font-size: 18px; color: #000000; font-weight: bold; text-decoration: underline;}
.heading {font-family: VERDANA; font-size: 14px; color: #000000; font-weight: bold; text-decoration: underline;}
.subheading {font-family: VERDANA; font-size: 12px; color: #000000; font-weight: bold; text-decoration: underline;}
</style>

</head>

<body bgcolor="#333333">

<center>


<!--
Updating a record through the API is done by building and sending an XML packet through the HTTP "PUT" method. Here are some examples of each.
<br/>
<br/>
<b>Building the XML packet.</b>
-->




<TABLE BORDER=0 CELLPADDING=0 CELLSPACING=0 WIDTH=800>
<TR BGCOLOR="#FFFFFF">
  <TD ALIGN=CENTER>
  
  	<TABLE BORDER=0 CELLPADDING=0 CELLSPACING=0 WIDTH=700>
  	<TR>
  	  <TD><IMG SRC="images/trans.gif" WIDTH=1 HEIGHT=30></TD>
  	</TR>
  	<TR>
  	  <TD CLASS="headline" ALIGN=CENTER>LTER API Docs</TD>
  	</TR>
  	<TR>
  	  <TD><IMG SRC="images/trans.gif" WIDTH=1 HEIGHT=30></TD>
  	</TR>
  	<TR>
  	  <TD>Copyright: LTER, <?php print date("Y"); ?><BR>Version 1.00 [2012-11-13]</TD>
  	</TR>  	
  	<TR>
  	  <TD><IMG SRC="images/trans.gif" WIDTH=1 HEIGHT=50></TD>
  	</TR>
  	</TABLE>
  	
  	<TABLE BORDER=0 CELLPADDING=0 CELLSPACING=0 WIDTH=700>
  	<TR>  
	  <TD CLASS="toc_bold" COLSPAN=2>TABLE OF CONTENTS</TD>
	</TR>
	<TR>
	  <TD COLSPAN=2 BGCOLOR="#000000"><IMG SRC="images/trans.gif" WIDTH=1 HEIGHT=1></TD>
	</TR>
	<TR>
  	  <TD COLSPAN=2><IMG SRC="images/trans.gif" WIDTH=1 HEIGHT=10></TD>
  	</TR>
<?php

$section_id = 0;

foreach ($docs AS $section) {

	++$section_id;
	$sub_section_id = $section_id;

	print "
	<TR>
	  <TD CLASS=\"toc_title\" onclick=\"window.location='#".$section_id.".0'\">".$section['title']."</TD>
	  <TD CLASS=\"toc_title\" ALIGN=RIGHT onclick=\"window.location='#".$section_id.".0'\">".$section_id.".0</TD>
	</TR>";
	
	
	
	foreach ($section['content'] AS $sub_section) {
	
		$sub_section_id += .1; 
		
		print "
	<TR>
	  <TD CLASS=\"toc_subtitle\" onclick=\"window.location='#".$sub_section_id."'\">".$sub_section['title']."</TD>
	  <TD CLASS=\"toc_subtitle\" ALIGN=RIGHT onclick=\"window.location='#".$sub_section_id."'\">".$sub_section_id."</TD>
	</TR>";
	
	}

}



?>
	
	<TR>
  	  <TD COLSPAN=2><IMG SRC="images/trans.gif" WIDTH=1 HEIGHT=50></TD>
  	</TR> 	
	</TABLE>





<?php


$section_id = 0;

foreach ($docs AS $section) {

	++$section_id;
	$sub_section_id = $section_id;


	print "
	<span id=\"".$section_id.".0\"></span>
	<TABLE BORDER=0 CELLPADDING=0 CELLSPACING=0 WIDTH=700>
  	<TR>  
	  <TD CLASS=\"heading\">".$section_id.".0 ".$section['title']."</TD>
	</TR>
	<TR>
  	  <TD><IMG SRC=\"images/trans.gif\" WIDTH=1 HEIGHT=10></TD>
  	</TR>
  	<TR>
  	  <TD>
  	  	".$section['text']."
<!--
  	  	<BR>
  	  	<BR>
  	  	
			<TABLE BORDER=0 CELLPADDING=0 CELLSPACING=0>
  	  		<TR>
  	  		  <TD><A HREF=\"http://www.ldcommon.com/reports/cash_advance_report.php\" TARGET=\"_blank\"><IMG BORDER=0 SRC=\"images/page_white_go.png\"></A></TD>
  	  		  <TD>&nbsp;</TD>
  	  		  <TD><A STYLE=\"color: #6593CF;\" TARGET=\"_blank\" HREF=\"http://www.ldcommon.com/reports/cash_advance_report.php\">http://www.ldcommon.com/reports/cash_advance_report.php</A></TD>
  	  		</TR>
  	  		</TABLE>
-->
  	  	
  	  	
  	  </TD>
  	</TR>
  	<TR>
  	  <TD><IMG SRC=\"images/trans.gif\" WIDTH=1 HEIGHT=30></TD>
  	</TR>
	</TABLE>";




	foreach ($section['content'] AS $sub_section) {
	
		$sub_section_id += .1; 
		
		print "
	<span id=\"".$sub_section_id."\"></span>
	<TABLE BORDER=0 CELLPADDING=0 CELLSPACING=0 WIDTH=650>
  	<TR>  
	  <TD CLASS=\"subheading\">".$sub_section_id." ".strtoupper($sub_section['title'])."</TD>
	</TR>
	<TR>
  	  <TD><IMG SRC=\"images/trans.gif\" WIDTH=1 HEIGHT=10></TD>
  	</TR>
  	<TR>
  	  <TD>
  	  		".$sub_section['text']."
  	  </TD>
  	</TR>
  	<TR>
  	  <TD><IMG SRC=\"images/trans.gif\" WIDTH=1 HEIGHT=30></TD>
  	</TR>
  	</TABLE>";
	
	
	}

}




function build_link($url) {


	$url_link = "
							<table border=0 cellpadding=0 cellspacing=0>
  	  						<tr>
  	  						  <td><a href=\"".$url."\" target=\"_blank\"><img border=0 src=\"images/page_white_go.png\"></a></td>
  	  						  <td>&nbsp;</td>
  	  						  <td><a style=\"color: #6593cf;\" target=\"_blank\" href=\"".$url."\">".$url."</a></td>
  	  						</tr>
  	  						</table>";


	return $url_link;

}



?>




<!--
	<A NAME="1.0">
	<TABLE BORDER=0 CELLPADDING=0 CELLSPACING=0 WIDTH=700>
  	<TR>  
	  <TD CLASS="heading">1.0 CASH ADVANCE REPORT</TD>
	</TR>
	<TR>
  	  <TD><IMG SRC="images/trans.gif" WIDTH=1 HEIGHT=10></TD>
  	</TR>
  	<TR>
  	  <TD>
  	  	The 'Cash Advance Report' displays both an overview list of leads, as well as drill-down capabilities for details on that lead.
  	  	<BR>
  	  	<BR>
  	  	
			<TABLE BORDER=0 CELLPADDING=0 CELLSPACING=0>
  	  		<TR>
  	  		  <TD><A HREF="http://www.ldcommon.com/reports/cash_advance_report.php" TARGET="_blank"><IMG BORDER=0 SRC="images/page_white_go.png"></A></TD>
  	  		  <TD>&nbsp;</TD>
  	  		  <TD><A STYLE="color: #6593CF;" TARGET="_blank" HREF="http://www.ldcommon.com/reports/cash_advance_report.php">http://www.ldcommon.com/reports/cash_advance_report.php</A></TD>
  	  		</TR>
  	  		</TABLE>
  	  	
  	  	
  	  	
  	  </TD>
  	</TR>
  	<TR>
  	  <TD><IMG SRC="images/trans.gif" WIDTH=1 HEIGHT=30></TD>
  	</TR>
	</TABLE>
	
	<A NAME="1.1">
	<TABLE BORDER=0 CELLPADDING=0 CELLSPACING=0 WIDTH=650>
  	<TR>  
	  <TD CLASS="subheading">1.1 INTRODUCTION</TD>
	</TR>
	<TR>
  	  <TD><IMG SRC="images/trans.gif" WIDTH=1 HEIGHT=10></TD>
  	</TR>
  	<TR>
  	  <TD>
  	  		This report has three parts to it: overview, detail and summary.  The overview gives a quick glance at the activity on the cash 
  	  		advance sites.  A user will appear on this screen if they have partially filled out offer (usually the first page).  Further 
  	  		detail for each lead can be shown by expanding the row.  The user's contact information should always be displayed in the detail
  	  		section and if the user went through the ping tree, the ping tree details will also be shown.  The summary section shows totals
  	  		for incomplete, accepted and rejected leads.
  	  </TD>
  	</TR>
  	<TR>
  	  <TD><IMG SRC="images/trans.gif" WIDTH=1 HEIGHT=30></TD>
  	</TR>
  	</TABLE>
  	
  	<A NAME="1.2">
	<TABLE BORDER=0 CELLPADDING=0 CELLSPACING=0 WIDTH=650>
  	<TR>  
	  <TD CLASS="subheading">1.2 USAGE: OVERVIEW</TD>
	</TR>
	<TR>
  	  <TD><IMG SRC="images/trans.gif" WIDTH=1 HEIGHT=10></TD>
  	</TR>
  	<TR>
  	  <TD>
  	  		The overview is what is displayed when the report is first loaded.  It shows the date/time, publisher id, customer name, 
  	  		as well as the lead status.  If the lead was accepted the overview screen shows the lender who purchased the lead, 
  	  		which tier it was purchased on and what the payout is for that lead.
  	  		<BR>
  	  		<BR>
  	  		<IMG SRC="images/ca_report_1.2.gif">
  	  		<BR>
  	  		<BR>
  	  		<BR>
  	  		The lead status column shows if the lead was 'Incomplete', 'Rejected' or 'Accepted'.
  	  		<BR>
  	  		<BR>
  	  		<IMG SRC="images/ca_report_1.2a.gif">
  	  		<BR>
  	  		<BR>
  	  		<UL>
  	  		  <LI>A status of 'Incomplete' means the user has partially filled out the form and hit submit.  The submitted data was captured, 
  	  				but there was not enough information collected to send the user through the ping tree.
  	  		<BR>
  	  		<BR>
  	  		  <LI>A 'Rejected' Status indicates the user completely filled out the form and was sent through the ping tree.  When the 
  	  				ping tree had finished running, no lenders purchased the lead.
  	  		<BR>
  	  		<BR>
  	  		  <LI>A status of 'Accepted' means that the user was sent through the ping tree and was approved by a lender for a cash advance.  
  	  			If the lead was accepted, the lender who purchased the lead, which tier the lead was purchased on and the payout for that tier
  	  			will also appear in this report.
  	  		</UL>

  	  		
  	  </TD>
  	</TR>
  	<TR>
  	  <TD><IMG SRC="images/trans.gif" WIDTH=1 HEIGHT=30></TD>
  	</TR>
  	</TABLE>
  	
	<A NAME="1.3">
	<TABLE BORDER=0 CELLPADDING=0 CELLSPACING=0 WIDTH=650>
  	<TR>  
	  <TD CLASS="subheading">1.3 USAGE: PING TREE DETAILS</TD>
	</TR>
	<TR>
  	  <TD><IMG SRC="images/trans.gif" WIDTH=1 HEIGHT=10></TD>
  	</TR>
  	<TR>
  	  <TD>
  	  		Once a user has completely filled out the form, they are sent to the ping tree and lenders are queried.  The ping tree details
  	  		are captured and can be viewed from within this report.  To see these details, either double-click on the row or click the plus 
  	  		sign at the beginning of the row.  Both methods will expand the row and the ping tree details will be shown.
  	  		<BR>
  	  		<BR>
  	  		<IMG SRC="images/ca_report_1.3.gif">
  	  		<BR>
  	  		<BR>
  	  		In the above screenshot, the user can be followed from tier to tier as they travel through the ping tree.  Here is a walk-through 
  	  		of the ping tree example shown above.
  	  		<BR>
  	  		<BR>
  	  		<UL>
  	  		  <LI>Partner Weekly tier 1 - Took 1.12 seconds and was rejected.<BR><BR>
  	  		  <LI>CashNet tier 1 - This tier should have been pinged and wasn't or that tier's activity wasn't recorded in the database properly.<BR><BR>
  	  		  <LI>MediaWhiz tier 1 - This tier wasn't pinged because the user didn't meet the qualifications for that tier.  If this is the case,
  	  		  		the reason they didn't qualify will also be stated.<BR><BR>
  	  		  <LI>Elite Cash tier 1 - Took about 1/2 second and was a duplicate lead.<BR><BR>
  	  		  <LI>MediaWhiz tier 5 - Took 1.8 seconds and was rejected.<BR><BR>
  	  		  <LI>MediaWhiz tier 6 - Took 5.36 seconds and was accepted.<BR><BR>
  	  		  <LI>Elite Cash tier 10 - This tier wasn't pinged because after a lead is accepted, the ping tree stops.  Had the lead not been 
  	  		  		purchased, this tier would have been pinged.<BR><BR>
  	  		  <LI>eDebit tier 10 - This tier wasn't pinged because after a lead is accepted, the ping tree stops.  Had the lead not been 
  	  		  		purchased, this tier would have been pinged.
  	  		</UL>
  	  		<BR>
  	  		<BR>
  	  		<B>For each tier that was successfully pinged, the complete details of the response can be seen by clicking the 'Show More' link as shown on 
  	  			MediaWhiz tiers 5 & 6.</B>
  	  		
  	  		
  	  </TD>
  	</TR>
  	<TR>
  	  <TD><IMG SRC="images/trans.gif" WIDTH=1 HEIGHT=30></TD>
  	</TR>
  	</TABLE>
	
	<A NAME="1.4">
	<TABLE BORDER=0 CELLPADDING=0 CELLSPACING=0 WIDTH=650>
  	<TR>  
	  <TD CLASS="subheading">1.4 USAGE: USER DETAILS</TD>
	</TR>
	<TR>
  	  <TD><IMG SRC="images/trans.gif" WIDTH=1 HEIGHT=10></TD>
  	</TR>
  	<TR>
  	  <TD>
  	  		The user details can be accessed the same way as ping tree details, either by clicking on the plus sign to 
  	  		the left of the row or double-clicking on the row.  Unlike the ping tree details which can be shown only when the 
  	  		user goes through the ping tree, the user details can be seen for every record, whether the user went through the 
  	  		ping tree or not.
  	  		<BR>
  	  		<BR>
  	  		The user details appear directly beneath the ping tree details and displays the values for each form field the user 
  	  		has filled in.
   	  		<BR>
  	  		<BR>
  	  		<IMG SRC="images/ca_report_1.4.gif">
  	  		<BR>
  	  		<BR>
  	  		A field that is marked '<FONT COLOR=RED>Incomplete</FONT>' in red text means that the field is required in order to be 
  	  		sent through the ping tree and it was not filled in by the user.
  	  		<BR>
  	  		<BR>
  	  		A gray '<FONT COLOR="#CCCCCC">Incomplete</FONT>' means that the user did not fill in this field, however, it is not 
  	  		required in order to be sent through the ping tree. 
  	  		
  	  </TD>
  	</TR>
  	<TR>
  	  <TD><IMG SRC="images/trans.gif" WIDTH=1 HEIGHT=30></TD>
  	</TR>
  	</TABLE>
	
	<A NAME="1.5">
	<TABLE BORDER=0 CELLPADDING=0 CELLSPACING=0 WIDTH=650>
  	<TR>  
	  <TD CLASS="subheading">1.5 USAGE: SUMMARY</TD>
	</TR>
	<TR>
  	  <TD><IMG SRC="images/trans.gif" WIDTH=1 HEIGHT=10></TD>
  	</TR>
  	<TR>
  	  <TD>
  	  		The summary section at the top of the report shows totals of incomplete, rejected and accepted leads, 
  	  		as well as the percentages pertaining to the ping tree.
  	  		<BR>
  	  		<BR>
  	  		<IMG SRC="images/ca_report_1.5.gif">
  	  		<BR>
  	  		<BR>
  	  		From this example, the breakdown is as follows:
  	  		<BR>
  	  		<BR>
  	  		<UL>
  	  		  <LI><B>Incomplete</B> - Number of leads that never made it to the ping tree.<BR><BR>
  	  		  <LI><B>Accepted</B> - Number of leads that were purchased by a lender.<BR><BR>
  	  		  <LI><B>Rejected</B> - Number of leads that did not get purchased by a lender.<BR><BR>
  	  		  <LI><B>Overall Total</B> - The total number of leads that are being counted. (Incompletes + Accepts + Rejects)<BR><BR>
  	  		  <LI><B>Ping Tree Accept %</B> - Percentage of leads that were accepted, not including incomplete leads.<BR><BR>
  	  		  <LI><B>Ping Tree Reject %</B> - Percentage of leads that were rejected, not including incomplete leads.<BR><BR>
  	  		  <LI><B>Ping Tree Total</B> - The total number of leads that went through the ping tree. (Accepts + Rejects)
  	  		</UL>
  	  </TD>
  	</TR>
  	<TR>
  	  <TD><IMG SRC="images/trans.gif" WIDTH=1 HEIGHT=30></TD>
  	</TR>
  	</TABLE>
  	
  	<A NAME="1.6">
	<TABLE BORDER=0 CELLPADDING=0 CELLSPACING=0 WIDTH=650>
  	<TR>  
	  <TD CLASS="subheading">1.6 FUTURE ADDITIONS</TD>
	</TR>
	<TR>
  	  <TD><IMG SRC="images/trans.gif" WIDTH=1 HEIGHT=10></TD>
  	</TR>
  	<TR>
  	  <TD>
  	  		The most pressing item to add to this report is data refining search controllers such as start and end dates and 
  	  		the ability to view accepted leads only.  Additionally, the ping tree run time for each user should be displayed
  	  		in this report somewhere; Probably in the overview screen.
  	  </TD>
  	</TR>
  	<TR>
  	  <TD><IMG SRC="images/trans.gif" WIDTH=1 HEIGHT=50></TD>
  	</TR>
  	</TABLE>
-->

<br /><br /></td>
</tr>
</table>

<br />

<span style="color: #ffffff; font-family: verdana; font-size: 11px;">Copyright <?php print date("Y"); ?>, Long-Term Environmental Research Project, All Rights Reserved.</span>

<br />
<br />

</center>

</body>

</html>