<?php
/**
 * 通用的抽象父工厂方法
 * User: 墨娘
 * Date: 2020-3-10
 */
/**
 * 单例模式:多个类创建单例的构造方式
 */
abstract class FactoryAbstract
{
    protected static $instances = [];

    final protected static function getClassName()
    {
        return get_called_class();
    }

    public static function getInstance()
    {
        $className = self::getClassName();
        if(!array_key_exists($className,self::$instances)){
            self::$instances[$className] = new $className;
        }else{
            if(!(self::$instances[$className] instanceof $className)){
                self::$instances[$className] = new $className;
            }
        }
        return self::$instances[$className];
    }

    public static function removeInstance()
    {
        $className = self::getClassName();
        if(array_key_exists($className,self::$instances)){
            unset(self::$instances[$className]);
        }
    }

    public function __construct(){}
    final protected  function __clone(){}

}

/**
 * 防止修改方法
 * Class Factory
 */
abstract class Factory extends FactoryAbstract
{
    final public static function getInstance()
    {
        return parent::getInstance();
    }

    final public static function removeInstance()
    {
        parent::removeInstance();
    }
}

class FirstProduct extends Factory
{
    public $a = [];
}
class SecondProduct extends FirstProduct{}

FirstProduct::getInstance()->a[] = 1;
SecondProduct::getInstance()->a[] = 2;
FirstProduct::getInstance()->a[] = 11;
SecondProduct::getInstance()->a[] = 22;

print_r(FirstProduct::getInstance()->a);
// Array ( [0] => 1 [1] => 11 )
print_r(SecondProduct::getInstance()->a);
// Array ( [0] => 2 [1] => 22 )