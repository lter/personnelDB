<?php

namespace PersonnelDB;

/* ACCESS STATEMENTS */

define('SITE_GETALL',			'SELECT * FROM site');

define('SITE_GETBYID',			'SELECT * FROM site WHERE siteID = ?');

define('SITE_GETBYACRONYM',			'SELECT * FROM site WHERE siteAcronym = ?');

define('SITE_GETBYFILTER_STUB',		'SELECT * FROM site');


/* UPDATE STATEMENTS */
