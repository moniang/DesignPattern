<?php
/**
 * 适配器模式
 * 这种模式允许使用不同的接口重构某个类，可以允许使用不同的调用方式进行调用
 * User: 墨娘
 * Date: 2020-3-10
 */

/**
 * 对象适配器
 * Interface Target
 */
interface Target
{
    public function sampleMethod1();
    public function sampleMethod2();
}

class Adaptee
{
    public function sampleMethod1()
    {
        echo "+++";
    }
}

class Adapter implements Target
{
    private $_adaptee;

    public function __construct(Adaptee $adaptee)
    {
        $this->_adaptee = $adaptee;
    }

    public function sampleMethod1()
    {
        $this->_adaptee->sampleMethod1();
    }

    public function sampleMethod2()
    {
       echo "---";
    }
}

$adapter = new Adapter(new Adaptee());
$adapter->sampleMethod1();
//+++
$adapter->sampleMethod2();
//---
/**
 * 类适配器
 * Interface Target2
 */
interface Target2
{
    public function sampleMethod1();
    public function sampleMethod2();
}

/**
 * 源角色
 * Class Adaptee2
 */
class Adaptee2
{
    public function sampleMethod1()
    {
        echo "+++++";
    }
}

/**
 * 适配后角色
 * Class Adapter2
 */
class Adapter2 extends Adaptee2 implements Target2
{
    public function sampleMethod2()
    {
        echo "-----";
    }
}

$adapter = new Adapter2();
$adapter->sampleMethod1();
//+++++
$adapter->sampleMethod2();
//-----