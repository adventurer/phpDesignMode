<?php
class singleTon
{
    private static $_instance;

    //private will can't be new
    //Error: Call to private singleTon::__construct() from invalid context
    private function __construct()
    {
      echo "__construct\n";
    }

    public static function singleton()
    {
        if (!isset(self::$_instance)) {
          $c = __CLASS__;
          self::$_instance = new $c;
        }
        return self::$_instance;
    }

    public function __clone()
    {
        die('don\'t clone me\n');
    }

    public function test()
    {
        echo "i'm a singleton function\n";
    }
}

//useage:
$test = singleTon::singleton();
$test->test();

$test = singleTon::singleton();
$test->test();
