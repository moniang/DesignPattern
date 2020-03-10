<?php
/**
 * 代理模式
 * 代理模式（Proxy）为其他对象提供一种代理以控制对这个对象的访问。使用代理模式创建代理对象，
 * 让代理对象控制目标对象的访问（目标对象可以是远程的对象、创建开销大的对象或需要安全控制的对象），
 * 并且可以在不改变目标对象的情况下添加一些额外的功能。在某些情况下，一个客户不想或者不能直接引用另一个对象，
 * 而代理对象可以在客户端和目标对象之间起到中介的作用，
 * 并且可以通过代理对象去掉客户不能看到的内容和服务或者添加客户需要的额外服务。
 * 经典例子就是网络代理，你想访问 Facebook 或者 Twitter ，如何绕过 GFW？找个代理
 * User: 墨娘
 * Date: 2020-3-10
 */


/**
 * 抽象主题角色
 * Class Subject
 */
abstract class Subject
{
    abstract public function action();
}

/**
 * 真实主题角色
 * Class RealSubject
 */
class RealSubject extends Subject
{
    public function __construct()
    {
    }

    public function action()
    {
        echo "我是action<br />";
        // TODO: Implement action() method.
    }
}

/**
 * 代理主题角色
 * Class ProxySubject
 */
class ProxySubject extends Subject
{
    protected $_real_subject = null;
    public function __construct(){}

    public function action()
    {
        $this->_beforeAction();
        if(is_null($this->_real_subject)){
            $this->_real_subject = new RealSubject();
        }
        $this->_real_subject->action();
        $this->_afterAction();
    }

    private function _beforeAction() {
        echo '在Action方法之前，做点什么<br />';
    }

    private function _afterAction() {
        echo '在Action方法之吼，做点什么<br />';
    }
}

$subject = new ProxySubject();
$subject->action();