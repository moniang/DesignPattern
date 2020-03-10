<?php
/**
 * 抽象工厂模式
 * 有些情况下我们需要根据不同的选择逻辑提供不同的构造工厂，而对于多个工厂而言需要一个统一的抽象工厂：
 * User: 墨娘
 * Date: 2020-3-10
 */

class System{}
class Soft{}

class MacSystem extends System{}
class MacSoft extends Soft{}

class WinSystem extends System{}
class WinSoft extends Soft{}

/**
 * 抽象工厂模式
 * Interface AbstractFactory
 */
interface AbstractFactory
{
    public function CreateSystem();
    public function CreateSoft();
}

class MacFactory implements AbstractFactory
{
    public function CreateSoft()
    {
        return new MacSystem();
    }

    public function CreateSystem()
    {
        return new MacSoft();
    }
}

class WinFactory  implements AbstractFactory
{
    public function CreateSoft()
    {
        return new WinSystem();
    }

    public function CreateSystem()
    {
        return new WinSoft();
    }
}

#创建工厂->用该工厂生产对应的对象

//创建MacFactory工厂
$MacFactory_obj = new MacFactory();
//用MacFactory工厂分别创建不同对象
var_dump($MacFactory_obj->CreateSystem());
var_dump($MacFactory_obj->CreateSoft());


//创建WinFactory
$WinFactory_obj = new WinFactory();
//用WinFactory工厂分别创建不同对象
var_dump($WinFactory_obj->CreateSystem());
var_dump($WinFactory_obj->CreateSoft());