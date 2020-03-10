<?php
/**
 * 备忘录模式(快照模式)(Token 模式)
 * 备忘录模式的用意是在不破坏封装性的前提下，捕获一个对象的内部状态，并在该对象之外保存这个状态，这样就可以在合适的时候将该对象恢复到原先保存的状态。
 * 备忘录模式所涉及的角色有三个：备忘录(Memento)角色、发起人(Originator)角色、负责人(Caretaker)角色。
 * 这三个角色的职责分别是：
 * 发起人：记录当前时刻的内部状态，负责定义哪些属于备份范围的状态，负责创建和恢复备忘录数据。
 * 备忘录：负责存储发起人对象的内部状态，在需要的时候提供发起人需要的内部状态。
 * 管理角色：对备忘录进行管理，保存和提供备忘录。
 * User: 墨娘
 * Date: 2020-3-10
 */

/**
 * 备忘录角色
 * Class Memento
 */
class Memento
{
    private $_state;

    public function __construct($state)
    {
        $this->setState($state);
    }

    public function getState()
    {
        return $this->_state;
    }

    public function setState($state)
    {
        $this->_state = $state;
    }
}


/**
 * 发起人角色
 * Class Originator
 */
class Originator
{
    private $_state;

    public function __construct()
    {
        $this->_state = '';
    }

    /**
     * 创建备忘录
     * @return Memento
     */
    public function createMemento( )
    {
        return new Memento($this->_state);
    }

    /**
     * 将发起人回复到备忘录对象记录的状态上
     * @param Memento $memento
     */
    public function restoreMemento(Memento $memento)
    {
        $this->_state = $memento->getState();
    }

    public function setState($state)
    {
        $this->_state = $state;
    }

    public function getState()
    {
        return $this->_state;
    }

    public function showState()
    {
        echo $this->_state;
        echo "<br />";
    }
}

/**
 * 发起人角色
 * Class Caretaker
 */
class Caretaker {
    private $_memento;
    public function getMemento()
    {
        return $this->_memento;
    }
    public function setMemento(Memento $memento)
    {
        $this->_memento = $memento;
    }
}

/* 创建目标对象 */
$org = new Originator();
$org->setState('open');
$org->showState();

/* 创建备忘 */
$memento = $org->createMemento();

/* 通过Caretaker保存此备忘 */
$caretaker = new Caretaker();
$caretaker->setMemento($memento);

/* 改变目标对象的状态 */
$org->setState('close');
$org->showState();

$org->restoreMemento($memento);
$org->showState();

/* 改变目标对象的状态 */
$org->setState('close');
$org->showState();

/* 还原操作 */
$org->restoreMemento($caretaker->getMemento());
$org->showState();