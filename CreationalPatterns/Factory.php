<?php
/**
 * 工厂模式
 * 工厂模式是另一种非常常用的模式，正如其名字所示：确实是对象实例的生产工厂。
 * 某些意义上，工厂模式提供了通用的方法有助于我们去获取对象，而不需要关心其具体的内在的实现。
 * User: 墨娘
 * Date: 2020-3-10
 */


/**
 * 工厂模式
 * Interface SystemFactory
 */
interface SystemFactory
{
    public function createSystem($type);
}

class MySystemFactory implements SystemFactory
{
    #实现工厂方法
    public function createSystem($type)
    {
        switch ($type) {
            case 'Mac':
                return new MacSystem();
            case 'Win':
                return new WinSystem();
            case 'Linux':
                return new LinuxSystem();
        }
    }
}

class System{}
class WinSystem extends System{}
class MacSystem extends System{}
class LinuxSystem extends System{}

//创建我的系统工厂
$System_obj = new MySystemFactory();
//用我的系统工厂分别创建不同系统对象
var_dump($System_obj->createSystem('Mac'));
var_dump($System_obj->createSystem('Win'));
var_dump($System_obj->createSystem('Linux'));