<?php
interface programer
{
  function work();
}

class employer implements programer
{
  private $id;
  public function __construct($id) {
    $this->id = $id;
  }

  public function work()
  {
    return "Id:$this->id startd work...\n";
  }
}

class programerFactory
{
  public static function Create($id)
  {
    return new employer($id);
  }
}

$me = programerFactory::Create(2);
echo $me->work();
?>
