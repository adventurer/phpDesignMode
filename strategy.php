<?php
interface payment
{
  function pay();
}

//工行支付
class icbc implements payment
{
  private $name='icbc';
  public function pay()
  {
    echo "pay for $this->name\n";
  }
}

// 建行支付
class ccb implements payment
{
  private $name='ccb';

  public function pay()
  {
    echo "pay for $this->name\n";
  }
}


class ticket
{
  public function pay(payment $payment){
    return $payment->pay();
  }
}
// 灵活选择用哪家银行支付
$payment = new ticket('ccb');
$f1 = $payment->pay(new icbc());
$f1 = $payment->pay(new ccb());
