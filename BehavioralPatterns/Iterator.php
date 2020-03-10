<?php
/**
 * 迭代器模式(游标模式)
 * 提供一种方法访问一个容器（Container）对象中各个元素，而又不需暴露该对象的内部细节。
 * 当你需要访问一个聚合对象，而且不管这些对象是什么都需要遍历的时候，就应该考虑使用迭代器模式。
 * 另外，当需要对聚集有多种方式遍历时，可以考虑去使用迭代器模式。
 * 迭代器模式为遍历不同的聚集结构提供如开始、下一个、是否结束、当前哪一项等统一的接口。
 * User: 墨娘
 * Date: 2020-3-10
 */

class Sample implements Iterator
{
    private $_items;

    public function __construct(&$data)
    {
        $this->_items = $data;
    }

    public function current()
    {
        return current($this->_items);
    }

    public function next()
    {
        next($this->_items);
    }

    public function key()
    {
        return key($this->_items);
    }

    public function rewind()
    {
        reset($this->_items);
    }

    public function valid()
    {
        return ($this->current() !== false);
    }
}

$data = array(1, 2, 3, 4, 5);
$sa = new sample($data);
foreach ($sa AS $key => $row) {
    echo $key, ' ', $row, '<br />';
}