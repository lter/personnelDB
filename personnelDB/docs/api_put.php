<?php


include_once 'geshi/geshi.php';

/*
$source = '$foo = 45;
for ( $i = 1; $i < $foo; $i++ ){
	  echo "$foo\n";  --$foo;
}';

$language = 'php';
*/


$source = <<<EOF


// ************************************ { 2012-11-12 - RC } ************************************
// SET THE DEFAULTS
// *********************************************************************************************
\$person_id = '';
\$action = "update";
//\$action = "insert";


\$person_id = 203;  // REQUIRED IF \$action = "update"
\$first_name = 'Billy Bob';
\$last_name = 'Clarkorino';
\$email = 'rickclark@lternet.edu';
\$opt_out = 1;
\$prefix = 'Mr.';
\$preferred_name = 'Rickster';
\$title = 'Programmer';
\$name_alias = 'Rick Clark';

\$role_is_active = 1;
\$role_id = 9;
\$role_site_acronym = 'LNO';
\$role_type = 'Programmer';
\$role_type_attribute = 'local';
\$site_begin_date = '2012-11-05';

\$contact_info_id = 12;
\$contact_is_active = 0;
\$is_primary = 0;
\$contact_site_acronym = 'SEV';
\$label = '';
\$contact_begin_date = '2012-11-05';
\$institution = 'University Of New Mexico';
\$city = 'Albuquerque';
\$administrative_area = 'NM';
\$zip_code = '87111';
\$country = 'USA';
\$phone = '(831) 274-2710';
\$fax = '';
\$alternate_email = '';

EOF;






$geshi = new GeSHi($source, 'php');


echo $geshi->parse_code();

?>
