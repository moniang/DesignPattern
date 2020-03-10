<?php
/**
 * 合成模式(组合模式)
 * User: 墨娘
 * Date: 2020-3-10
 */

/**
 * 透明式合成模式
 * Interface Component
 */
interface Component2 //抽象组件角色
{
    public function getComposite();//返回自己的实例
    public function operation();//示例方法
    public function add(Component2 $component);//聚集管理方法，添加一个子对象
    public function remove(Component2 $component);//聚类管理方法，删除一个子对象
    public function getChild();//聚类管理方法，返回所有的子对象
}

class Composite implements Component2 // 树枝组件角色
{
    private $_composites;

    public function __construct()
    {
        $this->_composites = [];
    }

    public function getComposite()
    {
        return $this;
    }

    /**
     * 示例方法，调用各个子对象的operation方法
     */
    public function operation()
    {
        foreach ($this->_composites as $composite) {
            $composite->operation();
        }
    }

    /**
     * 聚集管理方法 添加一个子对象
     * @param Component2 $component
     */
    public function add(Component2 $component)
    {
        $this->_composites[] = $component;
    }

    /**
     * 聚集管理方法 删除一个子对象
     * @param Component2 $component
     * @return bool
     */
    public function remove(Component2 $component)
    {
        foreach ($this->_composites as $key => $row) {
            if ($component == $row) {
                unset($this->_composites[$key]);
                return true;
            }
        }
        return false;
    }

    /**
     * 聚集管理方法 返回所有的子对象
     * @return array
     */
    public function getChild() {
        return $this->_composites;
    }
}

class Leaf implements Component2 {
    private $_name;
    public function __construct($name)
    {
        $this->_name = $name;
    }

    public function operation() {
        echo $this->_name."<br>";
    }

    public function getComposite()
    {
        return null;
    }
    public function add(Component2 $component) {
        return false;
    }
    public function remove(Component2 $component) {
        return false;
    }
    public function getChild() {
        return null;
    }
}

#客户
$leaf1 = new Leaf('a');
$leaf2 = new Leaf('b');

$composite  = new Composite();
$composite->add($leaf1);
$composite->add($leaf2);
$composite->operation();

$composite->remove($leaf2);
$composite->operation();