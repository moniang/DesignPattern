<?php
/**
 * 模板方法模式
 * 模板模式准备一个抽象类，将部分逻辑以具体方法以及具体构造形式实现，
 * 然后声明一些抽象方法来迫使子类实现剩余的逻辑。
 * 不同的子类可以以不同的方式实现这些抽象方法，
 * 从而对剩余的逻辑有不同的实现。
 * 先制定一个顶级逻辑框架，而将逻辑的细节留给具体的子类去实现。
 * User: 墨娘
 * Date: 2020-3-10
 */

/**
 * 抽象模板角色
 * Class AbstractClass
 */
abstract class AbstractClass
{
    /**
     * 模板方法 调用基本方法组装顶层逻辑
     */
    public function templateMethod()
    {
        $this->primitiveOperation1();
        $this->primitiveOperation2();
    }

    abstract protected function primitiveOperation1();// 基本方法
    abstract protected function primitiveOperation2();// 基本方法
}

/**
 * 具体模板角色
 * Class ConcreteClass
 */
class ConcreteClass extends AbstractClass
{
    protected function primitiveOperation1()
    {
        echo '进行了一系列的操作A';
    }

    protected function primitiveOperation2()
    {
        echo '进行了一系列的操作B';
    }
}

$class = new ConcreteClass();
$class->templateMethod();