<?php
/**
 * 解释器模式
 * 给定一个语言, 定义它的文法的一种表示，并定义一个解释器，该解释器使用该表示来解释语言中的句子。
 * User: 墨娘
 * Date: 2020-3-10
 */

/**
 * 抽象解释器
 * 定义了部分解释具体实现，封装了一些由具体解释器实现的接口。
 * Class Expression
 */
class Expression
{
    public function interpreter($str){
        return $str;
    }
}

/**
 * 具体解释器 表示数字
 * 实现抽象解释器的接口，进行具体的解释执行。
 * Class ExpressionNum
 */
class ExpressionNum extends Expression
{
    public function interpreter($str)
    {
        switch ($str)
        {
            case "0": return "零";
            case "1": return "一";
            case "2": return "二";
            case "3": return "三";
            case "4": return "四";
            case "5": return "五";
            case "6": return "六";
            case "7": return "七";
            case "8": return "八";
            case "9": return "九";
        }
    }
}

/**
 * 具体解释器 表示字符
 * 实现抽象解释器的接口，进行具体的解释执行。
 * Class ExpressionCharater
 */
class ExpressionCharater extends Expression {
    function interpreter($str) {
        return strtoupper($str);
    }
}

/**
 * 环境角色 解释器
 * 定义解释规则的全局信息
 * Class Interpreter
 */
class Interpreter
{
    public function execute($string)
    {
        $expression = null;
        for($i = 0;$i < strlen($string);$i++){
            $temp = $string[$i];
            switch (true){
                case is_numeric($temp):
                    $expression = new ExpressionNum();
                    break;
                default:
                    $expression = new ExpressionCharater();
            }
            echo $expression->interpreter($temp);
            echo '<br />';
        }
    }
}

$obj = new Interpreter();
$obj->execute("123456SssffS21AS");