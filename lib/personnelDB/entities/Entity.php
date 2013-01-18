<?php

namespace PersonnelDB;

//require_once('Transmuter/Transmutable.php');

abstract class Entity {

  /* MEMBER DATA */

  protected $storeFront;
  protected $xml_obj;
  private $contents;
  public $uniqueId;


  /* METHODS */

  public function __construct($inf) {
    // Take associative array as member data
    if (is_array($inf)) {
      $this->contents = $inf;
    } else {
      $this->contents = array();
    }

    // Local DataFormat copy for relational methods
    $this->storeFront = PersonnelDB::getInstance();
  }

  public function __destruct() {

  }

  /* OVERLOADED METHODS */

  // Getting an unavailable member variable will check the contents array, then
  //   the metadata array (if it exists)
  public function __get($field) {
    if (array_key_exists($field, $this->contents)) {
      return $this->contents[$field];
    } else {
      return null;
    }
  }

  public function __set($field, $value) {
    $this->contents[$field] = $value;
  }
  

  /* UTILITY FUNCTION */

  protected function add_xml_if($xml_doc, $xml_obj, $field) {
    if ($this->$field)
      return $xml_obj->appendChild($xml_doc->createElement($field, $this->$field));
    
    return null;
  }

  protected function get_xml_if($xml_obj, $stmt) {
    $xpath = new \DOMXPath($xml_obj->ownerDocument);
    $nodes = $xpath->query($stmt, $xml_obj);

    if ($nodes->length) {
      return $nodes->item(0)->nodeValue;
    } else {
      return null;
    }
  }
}
