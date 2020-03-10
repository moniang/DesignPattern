<?php
/**
 * 命令模式
 * 命令模式：在软件系统中，“行为请求者”与“行为实现者”通常呈现一种“紧耦合”。但在某些场合，比如要对行为进行“记录、撤销/重做、事务”等处理，这种无法抵御变化的紧耦合是不合适的。在这种情况下，如何将“行为请求者”与“行为实现者”解耦？将一组行为抽象为对象，实现二者之间的松耦合。这就是命令模式。
 * 角色分析：
 * 抽象命令：定义命令的接口，声明执行的方法。
 * 具体命令：命令接口实现对象，是“虚”的实现；通常会持有接收者，并调用接收者的功能来完成命令要执行的操作。
 * 命令接收者：接收者，真正执行命令的对象。任何类都可能成为一个接收者，只要它能够实现命令要求实现的相应功能。
 * 控制者：要求命令对象执行请求，通常会持有命令对象，可以持有很多的命令对象。这个是客户端真正触发命令并要求命令执行相应操作的地方，也就是说相当于使用命令对象的入口。
 * User: 墨娘
 * Date: 2020-3-10
 */

/**
 * 命令角色
 * Interface Command
 */
interface Command
{
    public function execute(); // 执行方法
}


/**
 * 接受者角色
 * Class Receiver
 */
class Receiver
{
    private $_name;

    public function __construct($name)
    {
        $this->_name = $name;
    }

    public function action()
    {
        echo 'receive some cmd:'.$this->_name;
    }
}

/**
 * 具体命令方法
 * Class ConcreteCommmand
 */
class ConcreteCommand implements Command
{
    private $_receiver;

    public function __construct(Receiver $command)
    {
        $this->_receiver = $command;
    }

    public function execute()
    {
        $this->_receiver->action();
    }
}

/**
 * 请求者角色
 * Class Invoker
 */
class Invoker
{
    private $_command;

    public function __construct(Command $command)
    {
        $this->_command = $command;
    }

    public function action()
    {
        $this->_command->execute();
    }
}

$receiver = new Receiver('hello word');
$command = new ConcreteCommand($receiver);
$invoker = new Invoker($command);

$invoker->action();