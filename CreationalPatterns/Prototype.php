<?php
/**
 * 原型模式
 * 有时候，部分对象需要被初始化多次。
 * 而特别是在如果初始化需要耗费大量时间与资源的时候进行预初始化并且存储下这些对象，就会用到原型模式
 * User: 墨娘
 * Date: 2020-3-10
 */

/**
 * 原型接口
 * Interface Prototype
 */
interface Prototype
{
    public function copy();
}

/**
 * 具体实现
 * Class ConcreatePrototype
 */
class ConcretePrototype implements Prototype
{
    protected $_name;

    public function __construct($name)
    {
        $this->_name = $name;
    }

    public function copy()
    {
        return clone $this;
    }
}

class Test{}

$obj1 = new ConcretePrototype (new Test());
var_dump($obj1);
/*
object(ConcretePrototype)#1 (1) {
  ["_name":protected]=>
  object(Test)#2 (0) {
  }
}
 */
$obj2 = $obj1->copy();
var_dump($obj2);
/*
 object(ConcretePrototype)#3 (1) {
  ["_name":protected]=>
  object(Test)#2 (0) {
  }
}
 */