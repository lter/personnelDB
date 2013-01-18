<?php

ini_set('display_errors', 0);
ini_set('error_log', "/var/www/personnelDB/error_log.txt");

/**
 * REST service configuration 
 */

// Application classes
//
include('personnelDB/PersonnelDB.php');

// REST server
include('RESTServer/RESTServer.php');

// Service-specific includes
//
include('utils.php');
include('handlers.php');

?>
