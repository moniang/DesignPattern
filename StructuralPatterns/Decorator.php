<?php
/**
 * 装饰器模式
 * 装饰器模式允许我们根据运行时不同的情景动态地为某个对象调用前后添加不同的行
 * User: 墨娘
 * Date: 2020-3-10
 */

interface Cooking
{
    public function operation();
}

abstract class Decorator implements Cooking //装饰角色
{
    protected $_component;

    public function __construct(Cooking $component)
    {
        $this->_component = $component;
    }

    public function operation()
    {
        $this->_component->operation();
    }
}

class CookA extends Decorator //具体装饰类A
{
    public function __construct(Cooking $component)
    {
        parent::__construct($component);
    }

    public function operation()
    {
        parent::operation(); // 调用装饰类的操作
        $this->addedOperationA(); //新增加的操作
    }

    public function addedOperationA()
    {
        echo "A加点面";
    }
}

class CookB extends Decorator //具体装饰类B
{
    public function __construct(Cooking $component)
    {
        parent::__construct($component);
    }

    public function operation()
    {
        parent::operation();  // 调用装饰类的操作
        $this->addedOperationB(); //新增加的操作
    }

    public function addedOperationB()
    {
        echo "B加点水";
    }
}

class CookMain implements Cooking //具体组件类
{
    public function operation()
    {
        echo '在最开始的时候，有个什么操作';
    }
}

$component = new CookMain();
$decoratorA = new CookA($component);
$decoratorB = new CookB($decoratorA);

$decoratorA->operation();
echo '<br>--------<br>';
$decoratorB->operation();