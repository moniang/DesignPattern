<?php
/**
 * 策略模式
 * 策略模式主要为了让客户类能够更好地使用某些算法而不需要知道其具体的实现。
 * User: 墨娘
 * Date: 2020-3-10
 */

/**
 * 抽象策略角色，以接口实现
 * Interface Strategy
 */
interface Strategy
{
    public function doMethod(); // 算法接口
}

/**
 * 具体策略角色A
 * Class ConcreteStrategyA
 */
class ConcreteStrategyA implements Strategy
{
    public function doMethod()
    {
       echo "Do Method A<br />";
    }
}

/**
 * 具体策略角色B
 * Class ConcreteStrategyB
 */
class ConcreteStrategyB implements Strategy
{
    public function doMethod()
    {
        echo "Do Method B<br />";
    }
}

/**
 * 具体策略角色C
 * Class ConcreteStrategyC
 */
class ConcreteStrategyC implements Strategy
{
    public function doMethod()
    {
        echo "Do Method C<br />";
    }
}

/**
 * 环境角色
 * Class Question
 */
class Question
{
    private $_strategy;

    public function __construct(Strategy $strategy)
    {
        $this->_strategy = $strategy;
    }

    /**
     * 处理问题
     */
    public function handleQuestion()
    {
        $this->_strategy->doMethod();
    }
}

$strategyA = new ConcreteStrategyA();
$question = new Question($strategyA);
$question->handleQuestion();

$strategyB = new ConcreteStrategyB();
$question = new Question($strategyB);
$question->handleQuestion();

$strategyC = new ConcreteStrategyC();
$question = new Question($strategyC);
$question->handleQuestion();