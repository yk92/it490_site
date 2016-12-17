#!/bin/bash

while true;
do
  /usr/bin/php -f /var/www/demo/rpc/rpcLoginServer.php
  /usr/bin/php -f /var/www/demo/rpc/rpcSignupServer.php
done
