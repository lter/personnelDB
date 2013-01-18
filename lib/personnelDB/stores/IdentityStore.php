<?php

namespace PersonnelDB;

require_once('Store.php');
require_once('personnelDB/SQL/IdentitySQL.php');
require_once('personnelDB/entities/Identity.php');

class IdentityStore extends Store {

  /* METHODS */
  
  public function __construct() {
    parent::__construct();

    $this->filterList = array (
			       'name' => array('firstName', 'middleName', 'lastName', 'preferredName', 'nameAlias'),
			       'lastName' => array('lastName')
			       );
  }
  
  public function __destruct() {
    parent::__destruct();
  }


  /* ACCESS METHODS */

  // Returns an empty Identity entity
  public function getEmpty() {
    return new Identity();
  }

  // Returns an array of all identities in the database
  public function getAll() {
    return $this->makeEntityArray('Identity', IDENTITY_GETALL);
  }

  // Returns a single identity matching $id, or null if no match exists
  public function getById($id) {
    $list = $this->makeEntityArray('Identity', IDENTITY_GETBYID, array($id));
    return isset($list[0]) ? $list[0] : null;
  }

  // Returns an array of identities matching the filter/value pairs
  //  given in $filters, or null if there are no matches
  public function getByFilter($filters = array()) {
    return $this->makeFilteredArray('Identity', IDENTITY_GETBYFILTER_STUB, $filters);
  }

  // Returns an array of alias strings for the identity matching $id
  public function getAliases($id) {
    $f = function($e) { return array(null, $e['nameAlias']); };
    return $this->makeArray($f, ALIAS_GETBYIDENTITY, array($id));
  }


  /* UPDATE METHODS */

  public function insert($identity) {
    // Insert identity information
    $inf = array($identity->prefix, $identity->firstName, $identity->middleName, $identity->lastName,
		 $identity->suffix, $identity->preferredName, $identity->primaryEmail, $identity->title,
		 $identity->optOut);
    $sth = $this->iDBConnection->prepare(IDENTITY_INSERT);
    $this->iDBConnection->execute($sth, $inf);
    $identity->personID = $this->iDBConnection->insertId();

    // Insert aliases
    $this->putAliases($identity);

    return $this->getById($identity->personID);
  }

  public function update($identity) {
    // Update identity information
    $inf = array($identity->prefix, $identity->firstName, $identity->middleName, $identity->lastName,
		 $identity->suffix, $identity->preferredName, $identity->primaryEmail, $identity->title,
		 $identity->optOut, $identity->personID);

    $sth = $this->iDBConnection->prepare(IDENTITY_UPDATE);
    $this->iDBConnection->execute($sth, $inf);

    // Replace aliases
    $this->putAliases($identity);

    return $this->getById($identity->personID);
  }

  private function putAliases($identity) {
    // Clear existing aliases
    $sth = $this->iDBConnection->prepare(ALIAS_DELETE);
    $this->iDBConnection->execute($sth, array($identity->personID));

    // Insert new aliases
    $sth = $this->iDBConnection->prepare(ALIAS_INSERT);
    foreach ($identity->aliases as $alias) {
      $inf = array($identity->personID, $alias);
      $this->iDBConnection->execute($sth, $inf);
    }
  }

}