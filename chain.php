<?php
class CommandChain
{
  private $_commands = array();

  public function addCommand( $cmd )
  {
    $this->_commands []= $cmd;
  }

  public function runCommand( $name, $args )
  {
    foreach( $this->_commands as $cmd )
    {
      if ( $cmd->onCommand( $name, $args ) )//运行持有对象的方法
        return;
    }
  }
}

// 持有对象需要实现的方法
interface ICommand
{
  function onCommand( $name, $args );
}

class SMSCommand implements ICommand
{
  public function onCommand( $name, $args )
  {
    if ( $name != 'sms' ) return false;
    echo( "SMSCommand handling 'SMS'\n" );
    return true;
  }
}

class MailCommand implements ICommand
{
  public function onCommand( $name, $args )
  {
    if ( $name != 'mail' ) return false;
    echo( "MailCommand handling 'mail'\n" );
    return true;
  }
}

$cc = new CommandChain();
$cc->addCommand( new SMSCommand() );
$cc->addCommand( new MailCommand() );
$cc->runCommand( 'sms', null );
$cc->runCommand( 'mail', null );
