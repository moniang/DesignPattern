<?php
/**
 * 单例模式
 * 单例模式是最常见的模式之一，在Web应用的开发中，常常用于允许在运行时为某个特定的类创建仅有一个可访问的实例。
 * User: 墨娘
 * Date: 2020-3-10
 */


final class Mysql
{
    #该属性用来保存实例
    private static $instance;

    #用于测试示例
    public $mix;
    /**
     * 创建一个用来实例化对象的方法
     * @return Mysql
     */
    public static function getInstance()
    {
        if(!(self::$instance instanceof self)){
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * 构造函数为private,防止创建对象
     * Mysql constructor.
     */
    public function __construct(){}

    /**
     * 防止对象被复制
     */
    private function __clone(){}
}

$mysqlA = Mysql::getInstance();
$mysqlB = Mysql::getInstance();

$mysqlA->mix = '111';
$mysqlA->mix = '222';

var_dump($mysqlA->mix);
var_dump($mysqlB->mix);

//string(3) "222"
//string(3) "222"