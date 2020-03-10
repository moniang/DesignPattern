<?php
/**
 * 状态模式
 * 状态模式当一个对象的内在状态改变时允许改变其行为，这个对象看起来像是改变了其类。
 * 状态模式主要解决的是当控制一个对象状态的条件表达式过于复杂时的情况。
 * 把状态的判断逻辑转移到表示不同状态的一系列类中，可以把复杂的判断逻辑简化。
 * User: 墨娘
 * Date: 2020-3-10
 */

/**
 * 抽象状态角色（State）
 * 定义一个接口以封装使用上下文环境的的一个特定状态相关的行为。
 * Interface State
 */
interface State
{
    public function handle(Context $context); //方法示例
}

/**
 * 环境角色(Work)
 * 它定义了客户程序需要的接口并维护一个具体状态角色的实例，将与状态相关的操作委托给当前的具体对象来处理。
 * Class Context
 */
class Context
{
    private $_state;

    /**
     * 默认为SateA
     * Context constructor.
     */
    public function __construct()
    {
        $this->_state = ConcreateStateA::getInstance();
    }

    public function setState(State $state)
    {
        $this->_state = $state;
    }

    public function request()
    {
        $this->_state->handle($this);
    }
}

/**
 * 具体状态角色(AmState)A
 * 实现抽象状态定义的接口。
 * Class ConcreateStateA
 */
class ConcreateStateA implements State
{
    private static $_instance = null;

    private function __construct(){}

    /**
     * 静态工厂方法，返回此类的唯一实例
     * @return ConcreateStateA|null
     */
    public static function getInstance()
    {
        if(is_null(self::$_instance)){
            self::$_instance = new ConcreateStateA();
        }
        return self::$_instance;
    }

    public function handle(Context $context)
    {
        echo 'Concrete_A <br />';
        $context->setState(ConcreateStateB::getInstance());
    }
}
/**
 * 具体状态角色(AmState)B
 * 实现抽象状态定义的接口。
 * Class ConcreateStateB
 */

class ConcreateStateB implements State
{
    private static $_instance = null;

    private function __construct(){}

    public static function getInstance()
    {
        if(is_null(self::$_instance)){
            self::$_instance = new ConcreateStateB();
        }
        return self::$_instance;
    }

    public function handle(Context $context)
    {
        echo 'Concrete_B <br />';
        $context->setState(ConcreateStateA::getInstance());
    }
}

$context = new Context();
$context->request();
$context->request();
$context->request();
$context->request();