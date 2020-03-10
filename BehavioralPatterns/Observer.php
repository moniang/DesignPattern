<?php
/**
 * 观察者模式
 * 某个对象可以被设置为是可观察的，只要通过某种方式允许其他对象注册为观察者。每当被观察的对象改变时，会发送信息给观察者。
 * User: 墨娘
 * Date: 2020-3-10
 */

interface IObserver
{
    function onSendMsg($sender,$args);
    function getName();
}

interface IObservable
{
    function addObserver($observer);
}

class UserList implements IObservable
{
    private $_observers = [];

    public function sendMsg($name)
    {
        foreach ($this->_observers as $obs){
            $obs->onSendMsg($this,$name);
        }
    }

    public function addObserver($observer)
    {
        $this->_observers[] = $observer;
    }

    public function removeObserver($observerName)
    {
        foreach ($this->_observers as $index => $observer){
            if($observer->getName() === $observerName){
                array_splice($this->_observers,$index,1);
                return;
            }
        }
    }
}

class UserListLogger implements IObserver{
    public function onSendMsg( $sender, $args ){
        echo( "'$args' send to UserListLogger\n" );
    }

    public function getName(){
        return 'UserListLogger';
    }
}


class OtherObserver implements IObserver
{
    public function onSendMsg($sender, $args)
    {
        echo( "'$args' send to OtherObserver\n" );
    }

    public function getName()
    {
        return 'OtherObserver';
    }
}

$ul = new UserList(); // 被观察者
$ul->addObserver(new UserListLogger()); // 增加观察者
$ul->addObserver(new OtherObserver()); //增加观察者
$ul->sendMsg('Hello'); // 发送消息到观察者

$ul->removeObserver('UserListLogger');// 移除观察者
$ul->sendMsg('Hi~');


#'Hello' send to UserListLogger
#'Hello' send to OtherObserver
#'Hi~' send to OtherObserver
