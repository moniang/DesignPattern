<?php
/**
 * 责任链模式(控制链模式)
 * 它主要由一系列对于某些命令的处理器构成，每个查询会在处理器构成的责任链中传递，
 * 在每个交汇点由处理器判断是否需要对它们进行响应与处理。每次的处理程序会在有处理器处理这些请求时暂停。
 * User: 墨娘
 * Date: 2020-3-10
 */

/**
 * 抽象责任角色
 * Class Responsibility
 */
abstract class Responsibility
{
    #下一个责任角色
    protected $next;

    public function setNext(Responsibility $l)
    {
        $this->next = $l;
        return $this;
    }

    abstract public function operate(); //操作方法
}

class ResponsibilityA extends Responsibility
{
    public function __construct()
    {
    }

    public function operate()
    {
        echo "Res A Start<br />";
        if(false == is_null($this->next)){
            $this->next->operate();
        }
        echo "Res A End<br />";
    }
}

class ResponsibilityB extends Responsibility
{
    public function __construct()
    {
    }

    public function operate()
    {
        echo "Res B Start<br />";
        if(false == is_null($this->next)){
            $this->next->operate();
        }
        echo "Res B End<br />";
    }
}

class ResponsibilityC extends Responsibility
{
    public function __construct()
    {
    }

    public function operate()
    {
        echo "Res C Start<br />";
        if(false == is_null($this->next)){
            $this->next->operate();
        }
        echo "Res C End<br />";
    }
}

$res_a = new ResponsibilityA();
$res_b = new ResponsibilityB();
$res_c = new ResponsibilityC();
$res_b->setNext($res_c);
$res_a->setNext($res_b);
$res_a->operate();