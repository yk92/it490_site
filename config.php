<?php

require __DIR__ . '/vendor/autoload.php';

use PhpAmqpLib\Connection\AMQPLazyConnection;
use Thumper\ConnectionRegistry;

//need to update with fsockopen function
$connections = array(
    'default' => new AMQPLazyConnection($arr["M"], 5672, 'demo', 'demo')
  );

$registry = new ConnectionRegistry($connections, 'default');

