<?php

require __DIR__ . '/../config.php';
require __DIR__ .'/dbConn.class.php';

$userInfo = function ($acct) {
  $data = unserialize($acct);
  $db = dbConn::getConnection();
  $sql = $db->prepare('SELECT * FROM Accounts WHERE Username = :user');
  try {
    $sql->execute( array( ':user' => $data['user'] ) );
    $user = $sql->fetchAll(PDO::FETCH_ASSOC);
    echo $user;
    return serialize($user);
  }
  catch (PDOException $e) {
    echo $e->getMessage();
    return $e->getMessage();
  }

};

$server = new Thumper\RpcServer($registry->getConnection());
$server->initServer('userInfo');
$server->setCallback($userInfo);
$server->start();
