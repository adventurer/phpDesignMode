<?php
interface programer
{
  function work();
}

class Golang implements programer
{
  private $id;
  public function __construct($id) {
    $this->id = $id;
  }

  public function work()
  {
    return "i use golang coding coding coding...\n";
  }
}

class programerFactory
{
  public static function Create( $id )
  {
    return new Golang( $id );
  }
}

$me = programerFactory::Create(1);
echo $me->work();
?>
