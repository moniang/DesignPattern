<?php
/**
 * 中介者模式
 * 中介者模式用于开发一个对象，这个对象能够在类似对象相互之间不直接相互的情况下传送或者调解对这些对象的集合的修改。
 * 一般处理具有类似属性，需要保持同步的非耦合对象时，最佳的做法就是中介者模式。
 * PHP中不是特别常用的设计模式。
 * User: 墨娘
 * Date: 2020-3-10
 */

/**
 * 中介者角色
 * Class Mediator
 */
abstract class Mediator
{
    abstract public function send($message,$colleague);
}

/**
 * 抽象对象
 * Class Colleague
 */
abstract class Colleague
{
    private $_mediator = null;

    public function __construct($mediator)
    {
        $this->_mediator = $mediator;
    }

    public function send($message)
    {
        $this->_mediator->send($message,$this);
    }

    abstract public function notify($message);
}

/**
 * 具体中介者角色
 * Class ConcreteMediator
 */
class ConcreteMediator extends Mediator
{
    private $_colleague1 = null;
    private $_colleague2 = null;

    public function send($message, $colleague)
    {
        if($colleague == $this->_colleague1){
            $this->_colleague1->notify($message);
        }else{
            $this->_colleague2->notify($message);
        }
    }
    public function set($colleague1,$colleague2)
    {
        $this->_colleague1 = $colleague1;
        $this->_colleague2 = $colleague2;
    }
}

/**
 * 具体对象角色
 * Class Colleague1
 */
class Colleague1 extends Colleague
{
    public function notify($message)
    {
        echo "colleague1:$message<br />";
    }
}

/**
 * 具体对象角色
 * Class Colleague2
 */
class Colleague2 extends Colleague
{
    public function notify($message)
    {
        echo "colleague2:$message<br />";
    }
}

$objMediator = new ConcreteMediator();
$objC1 = new Colleague1($objMediator);
$objC2 = new Colleague2($objMediator);
$objMediator->set($objC1,$objC2);
$objC1->send('to c2 from c1');
$objC2->send('to c1 from c2');