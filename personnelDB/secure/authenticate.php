<?php

include '../PersonnelDBConfig.php';
include 'LDAPAuth/LDAPAuth.php';

$action = (isset($_GET['action'])) ? $_GET['action'] : '';
switch ($action) {
case 'authenticate':
  $user = isset($_POST['username']) ? $_POST['username'] : '';
  $pass = isset($_POST['password']) ? $_POST['password'] : '';
  
  $ldap = new \WSWG\LDAPAuth();

  if (!empty($user) && !empty($pass) && $ldap->authenticate($user, $pass)) {
    $info = $ldap->getUserByName($user);

    $_SESSION['PDB']['NAME'] = $info['cn'][0];
    $_SESSION['PDB']['ACCESS'] = true;
    $_SESSION['PDB']['LOGIN_MESSAGE'] = "You are logged in as {$info['cn'][0]}.";
  } else {
    $_SESSION['PDB']['LOGIN_MESSAGE'] = "Your username and password could not be verified.";
  }
  break;

case 'deauthenticate': 
  session_destroy();
  header('Location: '.$_SERVER['HTTP_REFERER']);
  break;
}

header('Location: '.PDB_URL);

?>
