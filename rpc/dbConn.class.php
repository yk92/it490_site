<?php

  //Not sure if we will end up using this particular
  //dbConn class but it will serve as an example for now.

  class dbConn {

    protected static $db;

    private function __construct() {

      try {

        //assign PDO object to db Variable

        self::$db = new PDO('mysql:host=localhost;dbname=it490;', 'nflGuy', 'nflguy');
        self::$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
      }
      catch (PDOException $e) {
        echo "Connection Error: " . $e->getMessage();
      }
    }

    public static function getConnection() {

      //Guarantee single instance, if no connection object exists create one

      if ( !self::$db ) {
        //new connection object
        new dbConn();
      }

      //return the connection
      return self::$db;
    }

  }


