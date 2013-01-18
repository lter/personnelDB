<?php

// *******************************************************************************************************
// *******************************************************************************************************
// COPYRIGHT 2012, LTER, ALL RIGHTS RESERVED
//
// FILE:            update_keywords.php
// DATE:            2012-12-07
// URL:             http://sunshine.lternet.edu/personnelDB/rclark/update_keywords.php
// DESCRIPTION:     LOOPS THROUGH A TEXT FILE AND UPDATES THE KEYWORDS IN THE DATABASE
//
// *******************************************************************************************************
// *******************************************************************************************************






// ************************************ { 2012-12-07 - RC } ************************************
// TURN OFF NOTICES
// *********************************************************************************************
error_reporting(E_ERROR | E_WARNING | E_PARSE);






// ************************************ { 2012-12-07 - RC } ************************************
// CONNECT TO THE DATABASE
// *********************************************************************************************
$link = mysql_connect("mountain.lternet.edu",'yxia','830011') or die("Cannot Connect To Database"); // CONNECT TO LOCAL DATABASE
mysql_query('USE bibunique', $link);






// ************************************ { 2012-12-07 - RC } ************************************
// OPEN THE FILE FOR READING
// *********************************************************************************************
$lines = file('bib_2012dec.txt');
$lines = array_map('trim', $lines); // TRIM OFF EXTRA SPACES
$lines = array_filter($lines); // LOSE THE BLANK LINES






// ************************************ { 2012-12-07 - RC } ************************************
// LOOP THROUGH THE FILE AND PULL OUT EACH LINE AND BREAK IT APART
// *********************************************************************************************
foreach ($lines AS $line) {



	// ************************************ { 2012-12-07 - RC } ************************************
	// SPLIT EACH LINE INTO PARTS
	// - RECORD NUMBER AND KEYWORDS
	// *********************************************************************************************
	$line_array = preg_split('/\t/', $line, -1, PREG_SPLIT_NO_EMPTY);
	
	$reference_id = $line_array[0];
	$keywords = $line_array[1];
	$keywords = preg_replace('/,\s+/', ',', $keywords); // STRIP OUT SPACES AFTER THE COMMA






	// ************************************ { 2012-12-07 - RC } ************************************
	// CONVERT ALL KEYWORDS TO LOWER CASE AND THEN DO SOME APPROPRIATE CASE-SENSITIVE FORMATTING
	// *********************************************************************************************
	if ($keywords) {



		// ************************************ { 2012-12-07 - RC } ************************************
		// LOWERCASE ALL KEYWORDS TO START WITH
		// *********************************************************************************************
		$keywords = strtolower($keywords);






		// ************************************ { 2012-12-07 - RC } ************************************
		// FOR THE LINES THAT HAVE MORE THAN ONE KEYWORD IN IT, CONVERT IT INTO AN ARRAY SO 
		// - WE CAN MANIPULATE EACH KEYWORD
		// THEN REBUILD ANOTHER ARRAY FROM THE FORMATTED KEYWORDS AND TURN IT INTO A STRING WE CAN USE
		// *********************************************************************************************
		if (preg_match('/,/', $keywords)) {



			// ************************************ { 2012-12-07 - RC } ************************************
			// CREATE A NEW ARRAY, SEPARATE THE KEYWORDS IN IT AND REMOVE THE DUPES
			// *********************************************************************************************
			$new_keyword_array = array();

			$keyword_array = preg_split('/,/', $keywords, -1, PREG_SPLIT_NO_EMPTY);
			$keyword_array = array_unique($keyword_array);






			// ************************************ { 2012-12-07 - RC } ************************************
			// LOOP THROUGH THE KEYWORDS AND APPLY CASE-SENSITIVE FORMATTING
			// *********************************************************************************************
			foreach($keyword_array AS $keyword_part) {




				// LEAVE THESE WORDS LOWERCASE
				// NECESSARY FOR WORDS THAT THE CAPITALIZATION ARRAY WILL UPPERCASE ("DIN" IS MATCHED IN "DINOFLAGELLATE")
				if (preg_match('/(STANDING-DEAD|MARSH GRASS|THYMIDINE INCORPORATION|THALASSIA-TESTUDINUM|THALASSIA TESTUDINUM|DINOFLAGELLATE|FRESHWATER MARSH|STANDING DECAY|spartina alterniflora|DENITRIFICATION DIN FLUX)/i', $keyword_part)) {
					$new_keyword_array[] = $keyword_part;
				}
				// CAPITALIZE THESE WORDS
				elseif (preg_match('/(CASMGS|DIN|ILTER|LTER|GTOS|DOC|HGM|LTER1|LTER2|LTER3|NIGEC|PDF|HWA|FRAGSTATS|15N|SDS-PAGE|NWTLTER|NWT|USA|SIR|SIGR|ITEX|CH4|ANPP|AVHRR\/NOAA|NDVI|C3|C4|CO2|CH4|N2O|GIS)/i', $keyword_part)) {
				
					$keyword_part = strtoupper($keyword_part);
					$new_keyword_array[] = $keyword_part;
				
				}
				// CAPITALIZE THE FIRST LETTER OF EACH WORD
				elseif (preg_match('/(Italy|Network|North Carolina|Southeastern US|American|Maryland|Virginia|Delaware|United States|Massachusetts|New England|Puerto Rico|Mexico|Massachusetts-wide|Connecticut|Taconic|Berkshire region|North Quabbin region|Islands|Long Island|Young|Lignin|Long-Term Ecological Research|Forest Science Data Bank|Landsat|El Nino|Southern Oscillation|Research Natural Areas|Florida Bay|Everglades National Park|chromophoric dissolved organic matter|Colorado|Niwot Ridge|Rocky Mountains)/i', $keyword_part)) {
				
					$keyword_part = ucwords(strtolower($keyword_part));
					$new_keyword_array[] = $keyword_part;
				
				}
				// DO NOT INCLUDE THESE WORDS IN THE ARRAY
				elseif (preg_match('/(incomplete|none)/i', $keyword_part)) {
					// DO NOTHING
				}
				// OTHERWISE, LEAVE THE WORDS IN LOWERCASE
				else {
					$new_keyword_array[] = $keyword_part;
				}
				
			}






			// ************************************ { 2012-12-07 - RC } ************************************
			// TURN THE ARRAY BACK INTO A COMMA-SEPARATED STRING
			// *********************************************************************************************
			$formatted_keywords = implode(', ', $new_keyword_array);



		}
		else {



			// ************************************ { 2012-12-07 - RC } ************************************
			// LOWERCASE THE KEYWORDS AND ASSIGN IT INTO THE KEYWORD PART VARIABLE
			// *********************************************************************************************
			$keyword_part = strtolower($keywords);






			// ************************************ { 2012-12-07 - RC } ************************************
			// CREATE A NEW ARRAY, SEPARATE THE KEYWORDS IN IT AND REMOVE THE DUPES
			// *********************************************************************************************
			$new_keyword_array = array();






			// ************************************ { 2012-12-07 - RC } ************************************
			// APPLY CASE-SENSITIVE FORMATTING TO THE KEYWORDS
			// *********************************************************************************************

			// LEAVE THESE WORDS LOWERCASE
			// NECESSARY FOR WORDS THAT THE CAPITALIZATION ARRAY WILL UPPERCASE ("DIN" IS MATCHED IN "DINOFLAGELLATE")
			if (preg_match('/(STANDING-DEAD|MARSH GRASS|THYMIDINE INCORPORATION|THALASSIA-TESTUDINUM|THALASSIA TESTUDINUM|DINOFLAGELLATE|FRESHWATER MARSH|STANDING DECAY|spartina alterniflora|DENITRIFICATION DIN FLUX)/i', $keyword_part)) {
				$new_keyword_array[] = $keyword_part;
			}
			// CAPITALIZE THESE WORDS
			elseif (preg_match('/(CASMGS|DIN|ILTER|LTER|GTOS|DOC|HGM|LTER1|LTER2|LTER3|NIGEC|PDF|HWA|FRAGSTATS|15N|SDS-PAGE|NWTLTER|NWT|USA|SIR|SIGR|ITEX|CH4|ANPP|AVHRR\/NOAA|NDVI|C3|C4|CO2|CH4|N2O|GIS)/i', $keyword_part)) {
			
				$keyword_part = strtoupper($keyword_part);
				$new_keyword_array[] = $keyword_part;
			
			}
			// CAPITALIZE THE FIRST LETTER OF EACH WORD
			elseif (preg_match('/(Italy|Network|North Carolina|Southeastern US|American|Maryland|Virginia|Delaware|United States|Massachusetts|New England|Puerto Rico|Mexico|Massachusetts-wide|Connecticut|Taconic|Berkshire region|North Quabbin region|Islands|Long Island|Young|Lignin|Long-Term Ecological Research|Forest Science Data Bank|Landsat|El Nino|Southern Oscillation|Research Natural Areas|Florida Bay|Everglades National Park|chromophoric dissolved organic matter|Colorado|Niwot Ridge|Rocky Mountains)/i', $keyword_part)) {
			
				$keyword_part = ucwords(strtolower($keyword_part));
				$new_keyword_array[] = $keyword_part;
			
			}
			// DO NOT INCLUDE THESE WORDS IN THE ARRAY
			elseif (preg_match('/(incomplete|none)/i', $keyword_part)) {
				// DO NOTHING
			}
			// OTHERWISE, LEAVE THE WORDS IN LOWERCASE
			else {
				$new_keyword_array[] = $keyword_part;
			}
			
			
			
			// ************************************ { 2012-12-07 - RC } ************************************
			// TURN THE ARRAY BACK INTO A COMMA-SEPARATED STRING
			// *********************************************************************************************
			$formatted_keywords = implode(', ', $new_keyword_array);



		}






		// ************************************ { 2012-12-07 - RC } ************************************
		// DO THE DATABASE QUERY TO UPDATE THE RECORDS
		// *********************************************************************************************
		$q_update_keywords = "
			UPDATE
				lter_reference
			SET
				keywords = '".$formatted_keywords."'
			WHERE
				referenceid = '".$reference_id."'";
		
		mysql_query($q_update_keywords, $link) or trigger_error("Cannot Update Keywords: (".mysql_error().")", E_USER_ERROR);
		print "\n".$q_update_keywords;



	}



}



?>