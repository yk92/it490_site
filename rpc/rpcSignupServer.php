<?php

require __DIR__ . '/../config.php';
require __DIR__ .'/dbConn.class.php';

$doSignup = function ($acct) {
  $data = unserialize($acct);
  $db = dbConn::getConnection();
  $sql = $db->prepare('INSERT INTO Accounts ( Username, Password, Firstname, Lastname ) VALUES ( :user, :pw, :first, :last )');
  $pw = sha1($data['pw']); 
  try {
    $sql->execute( array( ':user' => $data['user'], ':pw' => $pw, ':first' => $data['firstName'], ':last' => $data['lastName'] ) );
    $rep = array();
    $rep['success'] = "Yes";
    $rep['user'] = $data['user'];
    $rep['token'] = uniqid();

    return serialize($rep);
  }
  catch (PDOException $e) {
    return $e->getMessage();
  }

};

$server = new Thumper\RpcServer($registry->getConnection());
$server->initServer('signup');
$server->setCallback($doSignup);
$server->start();
