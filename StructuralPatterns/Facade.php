<?php
/**
 * 门面模式
 * 门面模式 （Facade）又称外观模式，用于为子系统中的一组接口提供一个一致的界面。
 * 门面模式定义了一个高层接口，这个接口使得子系统更加容易使用：引入门面角色之后，
 * 用户只需要直接与门面角色交互，用户与子系统之间的复杂关系由门面角色来实现，
 * 从而降低了系统的耦
 * User: 墨娘
 * Date: 2020-3-10
 */

/**
 * 照相机
 * Class Camera
 */
class Camera
{
    public function on(){}
    public function off(){}
    public function rotate($status){} //旋转
}

/**
 * 灯泡
 * Class Light
 */
class Light
{
    public function on(){}
    public function off(){}
    public function changeBulb($status){} //换灯泡
}

/**
 * 传感器
 * Class Sensor
 */
class Sensor {
    public function activate() {} //激活
    public function deactivate() {} //停用
    public function trigger() {} //触发
}

/**
 * 报警器
 * Class Alarm
 */
class Alarm {
    public function activate() {} //激活
    public function deactivate() {} //停用
    public function ring() {} //响
    public function stopRing() {} //停止响动
}


/**
 * 安全系数
 * Class SecurityFacade
 */
class SecurityFacade
{
    private $_camera1, $_camera2; //2个照相机
    private $_light1, $_light2, $_light3; // 3个灯泡
    private $_sensor; //1个传感器
    private $_alarm; // 1个报警器

    /**
     * 实例化各个组件
     * SecurityFacade constructor.
     */
    public function __construct() {
        $this->_camera1 = new Camera();
        $this->_camera2 = new Camera();

        $this->_light1 = new Light();
        $this->_light2 = new Light();
        $this->_light3 = new Light();

        $this->_sensor = new Sensor();
        $this->_alarm = new Alarm();
    }

    /**
     * 激活各个组件
     */
    public function activate() {
        $this->_camera1->on();
        $this->_camera2->on();

        $this->_light1->on();
        $this->_light2->on();
        $this->_light3->on();

        $this->_sensor->activate();
        $this->_alarm->activate();
    }

    /**
     * 关闭各个组件
     */
    public  function deactivate() {
        $this->_camera1->off();
        $this->_camera2->off();

        $this->_light1->off();
        $this->_light2->off();
        $this->_light3->off();

        $this->_sensor->deactivate();
        $this->_alarm->deactivate();
    }
}

$security = new SecurityFacade();
$security->activate();