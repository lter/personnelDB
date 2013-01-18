<?php



// ************************************ { 2012-11-17 - RC } ************************************
// HTML
// *********************************************************************************************
$rest_url_1 = 'http://sunshine.lternet.edu/services/personnelDB/role';
$rest_url_2 = 'http://sunshine.lternet.edu/services/personnelDB/role/local';
$rest_url_3 = 'http://sunshine.lternet.edu/services/personnelDB/role/local/9';
$rest_url_4 = 'http://sunshine.lternet.edu/services/personnelDB';
$rest_url_5 = 'http://sunshine.lternet.edu/services/personnelDB/contact';
$rest_url_6 = 'http://sunshine.lternet.edu/services/personnelDB/contact/9';
$rest_url_7 = 'http://sunshine.lternet.edu/services/personnelDB/identity';
$rest_url_8 = 'http://sunshine.lternet.edu/services/personnelDB/identity/199';
$rest_url_9 = 'http://sunshine.lternet.edu/services/personnelDB/person';
$rest_url_10 = 'http://sunshine.lternet.edu/services/personnelDB/person/199';
$rest_url_11 = 'http://sunshine.lternet.edu/services/personnelDB/role';
$rest_url_12 = 'http://sunshine.lternet.edu/services/personnelDB/role/nsf';
$rest_url_13 = 'http://sunshine.lternet.edu/services/personnelDB/role/nsf/29';
$rest_url_14 = 'http://sunshine.lternet.edu/services/personnelDB/roleType';
$rest_url_15 = 'http://sunshine.lternet.edu/services/personnelDB/roleType/nsf';
$rest_url_16 = 'http://sunshine.lternet.edu/services/personnelDB/roleType/nsf/9';
$rest_url_17 = 'http://sunshine.lternet.edu/services/personnelDB/site';
$rest_url_18 = 'http://sunshine.lternet.edu/services/personnelDB/site/LNO';






// ************************************ { 2012-11-17 - RC } ************************************
// XML
// *********************************************************************************************
$xml_data_contact_1 = <<<EOF
<?xml version="1.0" encoding="UTF-8"?>
<personnel>
  <person>
    <personID>199</personID>
    <contactInfoList>
      <contactInfo>
        <contactInfoID>12</contactInfoID>
        <label />
        <isPrimary>0</isPrimary>
        <isActive>0</isActive>
        <siteAcronym>SEV</siteAcronym>
        <beginDate>2012-11-05</beginDate>
        <administrativeArea>NM</administrativeArea>
        <city>Albuquerque</city>
        <country>USA</country>
        <email />
        <fax />
        <institution>University Of New Mexico</institution>
        <phone>(831) 274-2710</phone>
        <postalCode>87111</postalCode>
      </contactInfo>
      <contactInfo>
        <contactInfoID>13</contactInfoID>
        <label />
        <isPrimary>0</isPrimary>
        <isActive>0</isActive>
        <siteAcronym>AND</siteAcronym>
      </contactInfo>
    </contactInfoList>
  </person>
</personnel>
//?>
EOF;



$xml_data_identity_1 = <<<EOF
<?xml version="1.0" encoding="UTF-8"?>
<personnel>
  <person>
    <personID>199</personID>
    <identity>
      <prefix>Mr.</prefix>
      <firstName>Richard</firstName>
      <lastName>Clark</lastName>
      <preferredName>Rickster</preferredName>
      <title>Programmer</title>
      <primaryEmail>rickclark@lternet.edu</primaryEmail>
      <optOut>1</optOut>
      <nameAlias>Rick Clark</nameAlias>
    </identity>
  </person>
</personnel>
EOF;



$xml_data_person_1 = <<<EOF
<?xml version="1.0" encoding="UTF-8"?>
<personnel>
  <person>
    <personID>199</personID>
    <identity>
      <prefix>Mr.</prefix>
      <firstName>Richard</firstName>
      <lastName>Clark</lastName>
      <preferredName>Rickster</preferredName>
      <title>Programmer</title>
      <primaryEmail>rickclark@lternet.edu</primaryEmail>
      <optOut>1</optOut>
      <nameAlias>Rick Clark</nameAlias>
    </identity>
    <roleList>
      <role>
        <roleID>9</roleID>
        <isActive>1</isActive>
        <roleType type="local">Programmer</roleType>
        <siteAcronym>AND</siteAcronym>
        <beginDate>2012-11-05</beginDate>
      </role>
    </roleList>
    <contactInfoList>
      <contactInfo>
        <contactInfoID>12</contactInfoID>
        <label />
        <isPrimary>0</isPrimary>
        <isActive>0</isActive>
        <siteAcronym>SEV</siteAcronym>
        <beginDate>2012-11-05</beginDate>
        <administrativeArea>NM</administrativeArea>
        <city>Albuquerque</city>
        <country>USA</country>
        <email />
        <fax />
        <institution>University Of New Mexico</institution>
        <phone>(831) 274-2710</phone>
        <postalCode>87111</postalCode>
      </contactInfo>
      <contactInfo>
        <contactInfoID>13</contactInfoID>
        <label />
        <isPrimary>0</isPrimary>
        <isActive>0</isActive>
        <siteAcronym>AND</siteAcronym>
      </contactInfo>
    </contactInfoList>
  </person>
</personnel>
EOF;



$xml_data_role_1 = <<<EOF
<?xml version="1.0" encoding="UTF-8"?>
<personnel>
  <person>
    <personID>187</personID>
    <roleList>
      <role>
        <roleID>29</roleID>
        <isActive>0</isActive>
        <roleType type="nsf">Lead Principal Investigator</roleType>
        <siteAcronym>AND</siteAcronym>
      </role>
    </roleList>
  </person>
</personnel>
EOF;



$xml_data_role_type_1 = <<<EOF
<?xml version="1.0" encoding="UTF-8"?>
<roleTypeList>
  <roleType>
    <nsfRoleTypeID>9</nsfRoleTypeID>
    <roleName>Other</roleName>
    <type>nsf</type>
    <isRepeatable>1</isRepeatable>
  </roleType>
</roleTypeList>
EOF;



$xml_data_site_1 = <<<EOF
<?xml version="1.0" encoding="UTF-8"?>
<siteList>
  <site>
    <siteID>343</siteID>
    <siteAcronym>LNO</siteAcronym>
  </site>
</siteList>
EOF;










// ************************************ { 2012-11-26 - RC } ************************************
// PHP
// *********************************************************************************************
$php_curl_1 = <<<EOF
<?php

\$ch = curl_init();
curl_setopt(\$ch, CURLOPT_URL, 'http://sunshine.lternet.edu/services/personnelDB/site');
curl_setopt(\$ch, CURLOPT_RETURNTRANSFER, 1); // GET THE RESPONSE BACK
\$response = curl_exec(\$ch); // EXECUTE THE REQUEST
	
print \$response;

?>
EOF;



$php_simple_xml_1 = <<<EOF
<?php

\$xml = new SimpleXMLElement(\$response); // TURN THE XML INTO A PHP OBJECT
print "<pre>"; print_r(\$xml); print "</pre>"; // PRINT OUT EVERYTHING

?>
EOF;



$php_simple_xml_2 = <<<EOF
<?php

\$xml = new SimpleXMLElement(\$response); // TURN THE XML INTO A PHP OBJECT
\$site_acronym = \$xml->site[2]->siteAcronym; // ACCESS A PARTICULAR PART OF THE OBJECT
	
print \$site_acronym; // WILL PRINT 'BES'

?>
EOF;


$php_response_1 = <<<EOF
SimpleXMLElement Object
(
    [site] => Array
        (
            [0] => SimpleXMLElement Object
                (
                    [siteID] => 314
                    [siteAcronym] => AND
                )

            [1] => SimpleXMLElement Object
                (
                    [siteID] => 315
                    [siteAcronym] => ARC
                )

            [2] => SimpleXMLElement Object
                (
                    [siteID] => 316
                    [siteAcronym] => BES
                )
  ...
EOF;






// ************************************ { 2012-11-17 - RC } ************************************
// PHP
// *********************************************************************************************
$geshi = new GeSHi($rest_url, 'php');
$geshi->set_header_type(GESHI_HEADER_PRE_VALID);
//$geshi->set_header_type(GESHI_HEADER_PRE_TABLE);
$geshi->enable_line_numbers(GESHI_FANCY_LINE_NUMBERS, 5); 
$geshi->set_line_style('background: #fcfcfc; color: #000000;', 'background: #fefefe; color: #000000;', true);
$geshi->set_overall_style('background-color: #dddddd;', true);
$geshi->set_code_style('background-color: #efefef;', true);


$geshi->set_source($php_curl_1);
$php_curl_1 = $geshi->parse_code();


$geshi->set_source($php_simple_xml_1);
$php_simple_xml_1 = $geshi->parse_code();


$geshi->set_source($php_simple_xml_2);
$php_simple_xml_2 = $geshi->parse_code();


$geshi->set_source($php_response_1);
$php_response_1 = $geshi->parse_code();





// ************************************ { 2012-11-17 - RC } ************************************
// HTML
// *********************************************************************************************
$geshi_link = new GeSHi($rest_url_1, 'html5');
$geshi_link->set_header_type(GESHI_HEADER_PRE_VALID);
$geshi_link->set_header_type(GESHI_HEADER_PRE_TABLE);
$geshi_link->enable_line_numbers(GESHI_NO_LINE_NUMBERS); 
//$geshi->set_line_style('background: #fcfcfc; color: #000000;', 'background: #fefefe; color: #000000;', true);
$geshi_link->set_overall_style('background-color: #dddddd;', true);
$geshi_link->set_code_style('background-color: #efefef;', true);

$geshi_link->set_source($rest_url_1);
$rest_url_1 = $geshi_link->parse_code();

$geshi_link->set_source($rest_url_2);
$rest_url_2 = $geshi_link->parse_code();

$geshi_link->set_source($rest_url_3);
$rest_url_3 = $geshi_link->parse_code();

$geshi_link->set_source($rest_url_4);
$rest_url_4 = $geshi_link->parse_code();

$geshi_link->set_source($rest_url_5);
$rest_url_5 = $geshi_link->parse_code();

$geshi_link->set_source($rest_url_6);
$rest_url_6 = $geshi_link->parse_code();

$geshi_link->set_source($rest_url_7);
$rest_url_7 = $geshi_link->parse_code();

$geshi_link->set_source($rest_url_8);
$rest_url_8 = $geshi_link->parse_code();

$geshi_link->set_source($rest_url_9);
$rest_url_9 = $geshi_link->parse_code();

$geshi_link->set_source($rest_url_10);
$rest_url_10 = $geshi_link->parse_code();

$geshi_link->set_source($rest_url_11);
$rest_url_11 = $geshi_link->parse_code();

$geshi_link->set_source($rest_url_12);
$rest_url_12 = $geshi_link->parse_code();

$geshi_link->set_source($rest_url_13);
$rest_url_13 = $geshi_link->parse_code();

$geshi_link->set_source($rest_url_14);
$rest_url_14 = $geshi_link->parse_code();

$geshi_link->set_source($rest_url_15);
$rest_url_15 = $geshi_link->parse_code();

$geshi_link->set_source($rest_url_16);
$rest_url_16 = $geshi_link->parse_code();

$geshi_link->set_source($rest_url_17);
$rest_url_17 = $geshi_link->parse_code();

$geshi_link->set_source($rest_url_18);
$rest_url_18 = $geshi_link->parse_code();






// ************************************ { 2012-11-17 - RC } ************************************
// XML
// *********************************************************************************************
$geshi_xml = new GeSHi($xml_data_contact_1, 'html5');
$geshi_xml->set_header_type(GESHI_HEADER_PRE_VALID);
$geshi_xml->enable_line_numbers(GESHI_FANCY_LINE_NUMBERS, 5); 
$geshi_xml->set_line_style('background-color: #fcfcfc; color: #000000;', 'background-color: #fefefe; color: #000000;', true);
$geshi_xml->set_overall_style('background-color: #dddddd;', true);
//$geshi_xml->set_code_style('background-color: #efefef;', true);

$geshi_xml->set_source($xml_data_contact_1);
$geshi_xml->highlight_lines_extra(array(7));
//$geshi_xml->set_code_style('background-color: #efefef;', true);
//print $geshi_xml->parse_code();

$xml_data_contact_1 = $geshi_xml->parse_code();


$geshi_xml->set_source($xml_data_identity_1);
$geshi_xml->highlight_lines_extra(array(4));
$xml_data_identity_1 = $geshi_xml->parse_code();


$geshi_xml->set_source($xml_data_person_1);
$geshi_xml->highlight_lines_extra(array(4));
$xml_data_person_1 = $geshi_xml->parse_code();


$geshi_xml->set_source($xml_data_role_1);
$geshi_xml->highlight_lines_extra(array(7));
$xml_data_role_1 = $geshi_xml->parse_code();


$geshi_xml->set_source($xml_data_role_type_1);
$geshi_xml->highlight_lines_extra(array(4));
$xml_data_role_type_1 = $geshi_xml->parse_code();


$geshi_xml->set_source($xml_data_site_1);
$geshi_xml->highlight_lines_extra(array(4, 5));
$xml_data_site_1 = $geshi_xml->parse_code();


//$geshi_xml->set_source($xml_response_1);
//$geshi_xml->highlight_lines_extra(array(4, 5));
//$xml_response_1 = $geshi_xml->parse_code();
