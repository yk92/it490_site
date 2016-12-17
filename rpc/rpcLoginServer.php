<?php

require __DIR__ . '/../config.php';
require __DIR__ .'/dbConn.class.php';

$doLogin = function ($creds) {
  $data = unserialize($creds);
  $db = dbConn::getConnection();
  $sql = $db->prepare('SELECT * FROM Accounts WHERE Username = :user AND Password = :pw');
  $pw = sha1($data['pw']);
  $sql->execute( array( ':user' => $data['user'], ':pw' => $pw ) );
  $results = $sql->fetch();

  if ($results) {
    //login successful
    $msg = array();
    $msg['token'] = uniqid();
    $msg['success'] = "Yes";
    $data = serialize($msg);
    return $data;
  }
  else {
    return "No";
  }
   
};

$server = new Thumper\RpcServer($registry->getConnection());
$server->initServer('doLogin');
$server->setCallback($doLogin);
$server->start();
