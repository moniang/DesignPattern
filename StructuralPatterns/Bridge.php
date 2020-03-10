<?php
/**
 * 桥接模式
 * 将抽象部分与它的实现部分分离，使他们都可以独立的变抽象与它的实现分离，即抽象类和它的派生类用来实现自己的对象
 *
 * 桥接与适配器模式的关系：
 * 桥接属于聚合关系，两者关联 但不继承
 * 适配器属于组合关系，适配者需要继承源
 *
 * 聚合关系：A对象可以包含B对象 但B对象不是A对象的一部分
 * User: 墨娘
 * Date: 2020-3-10
 */

/**
 * 实现化角色, 给出实现化角色的接口，但不给出具体的实现。
 * Class Implementor
 */
abstract class Implementor
{
    abstract public function operationImp();
}

/**
 * 具体化角色A
 * Class ConcreteImplementorA
 */
class ConcreteImplementorA extends Implementor
{
    public function operationImp()
    {
        echo "A";
    }
}

/**
 * 具体化角色B
 * Class ConcreteImplementorB
 */
class ConcreteImplementorB extends Implementor
{
    public function operationImp()
    {
        echo "B";
    }
}

/**
 * 抽象化角色，抽象化给出的定义，并保存一个对实现化对象的引用
 * Class Abstraction
 */

abstract class Abstraction
{
    protected $imp;

    public function operation()
    {
        $this->imp->operationImp();
    }
}

/**
 * 修正抽象化角色, 扩展抽象化角色，改变和修正父类对抽象化的定义。
 * Class RefinedAbstraction
 */
class RefinedAbstraction extends Abstraction
{
    public function __construct(Implementor $imp)
    {
        $this->imp = $imp;
    }

    public function operation()
    {
        $this->imp->operationImp();
    }
}

$abstraction = new RefinedAbstraction(new ConcreteImplementorA());
$abstraction->operation();
//A
$abstraction = new RefinedAbstraction(new ConcreteImplementorB());
$abstraction->operation();
//B