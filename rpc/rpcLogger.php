<?php

require __DIR__ . '/../config.php';

$myConsumer = function ($msg) {
  echo $msg . "\n";
};

$consumer = new Thumper\Consumer($registry->getConnection());
$consumer->setExchangeOptions( array( 'name'=> 'logs-exchange', 'type'=>'topic'));
$consumer->setQueueOptions( array( 'name'=> $argv[2]. '-queue'));
$consumer->setRoutingKey($argv[1]);
$consumer->setCallback($myConsumer);
$consumer->consumeForLogger();

