<?php
/**
 * 合成模式(组合模式)(部分-整体模式)
 * 用于将对象组合成树形结构以表示“部分-整体”的层次关系。
 * 组合模式使得用户对单个对象和组合对象的使用具有一致性。
 *
 * 常见使用场景：如树形菜单、文件夹菜单、部门组织架构图等。
 * User: 墨娘
 * Date: 2020-3-10
 */


/**
 * 安全式合成模式
 * Interface Component
 */
interface Component  {
    public function getComposite(); // 返回自己的实例
    public function operation();
}

/**
 * 树枝组件角色
 * Class Composite
 */
class Composite implements Component{
    private $_composites = [];

    public function getComposite(): Composite
    {
        return $this;
    }

    public function operation(): void
    {
        foreach ($this->_composites as $composite) {
            $composite->operation();
        }
    }

    /**
     * 聚类管理方法 添加一个子对象
     * @param Component $component
     */
    public function add(Component $component): void
    {
        $this->_composites[] = $component;
    }

    /**
     * 聚类管理方法 删除一个子对象
     * @param Component $component
     * @return bool
     */
    public function remove(Component $component): bool
    {
        foreach ($this->_composites as $key => $row){
            if($component === $row){
                unset($this->_composites[$key]);
                return true;
            }
        }
    }

    /**
     * 聚类管理方法 返回所有子对象
     * @return array
     */
    public function getChild(){
        return $this->_composites;
    }
}

class Leaf implements Component{
    private $_name;

    public function __construct($name)
    {
        $this->_name = $name;
    }

    public function operation()
    {
        echo $this->_name.'进行了一些操作';
        // TODO: Implement operation() method.
    }

    public function getComposite()
    {
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