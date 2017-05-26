<?php
// 被观察者基类
abstract class Subject
{
    private $observers = array();

    public function  Attach(Observer $observer)
    {
        array_push($this->observers,$observer);
    }

    public function  Detach(Observer $observer)
    {
        foreach($this->observers as $k=>$v)
        {
            if($v==$observer)
            {
                unset($this->observers[$k]);
            }
        }
    }

    function  Notify()
    {
        foreach($this->observers as $v)
        {
            $v->Update();
        }
    }
}

// 被观察者
class ConcreteSubject extends Subject
{
   private $subject_state='';

   public function __set($k,$v){
     if ($this->$k != $v) {
       $this->$k = $v;
       parent::Notify();
     }
   }

   public function __get($k){
     return $this->$k;
   }
}

//观察者基类
abstract class Observer
{
    public abstract function Update();
}

// 观察者
class xiaotou extends Observer
{
    private $name;
    private $observerState;
    public $subject;

    public function __construct(ConcreteSubject $_sub,$_name)
    {
        $this->subject = $_sub;
        $this->name = $_name;
    }

    public function  Update()
    {
        if ($this->subject->subject_state=='警察') {
          echo "$this->name:走,警察来了！\n";
        }elseif($this->subject->subject_state=='交警'){
          echo "$this->name:跑个卵子，是交警。。。\n";
        }
    }
}

// 观察者
class zuijia extends Observer
{
    private $name;
    private $observerState;
    public $subject;

    public function __construct(ConcreteSubject $_sub,$_name)
    {
        $this->subject = $_sub;
        $this->name = $_name;
    }
    public function  Update()
    {
        if ($this->subject->subject_state=='交警') {
          echo "$this->name:调头,有交警！\n";
        }elseif($this->subject->subject_state=='警察'){
          echo "$this->name:跑个卵子，是警察。。。\n";
        }
    }
}


// 初始化被观察者
$byWatch = new ConcreteSubject();

//注册被观察者
$xiaotou = new xiaotou($byWatch,"小偷");
$zuijia = new zuijia($byWatch,"醉驾");

//加入观察者
$byWatch->Attach($xiaotou);
$byWatch->Attach($zuijia);

//被观察者改变状态
$byWatch->subject_state = "警察";
