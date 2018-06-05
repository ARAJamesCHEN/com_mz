<?php
/**
 * Created by PhpStorm.
 * User: yac0105
 * Date: 1/06/2018
 * Time: 6:05 PM
 */
namespace comphp\base;

class View
{
    protected $variables = array();
    protected $_controller;
    protected $_viewName;

    function __construct($controller, $_viewName)
    {
        $this->_controller = strtolower($controller);
        $this->_viewName = strtolower($_viewName);
    }

    public function assign($name, $value)
    {

        $this->variables[$name] = $value;
    }

    public function render()
    {
        extract($this->variables);
        $defaultHeader = APP_PATH . 'app/views/header.php';
        $defaultFooter = APP_PATH . 'app/views/footer.php';

        $controllerHeader = APP_PATH . 'app/views/' . $this->_controller . '/header.php';
        $controllerFooter = APP_PATH . 'app/views/' . $this->_controller . '/footer.php';
        $controllerLayout = APP_PATH . 'app/views/' . $this->_viewName.'/'. $this->_viewName.'View.php';

        // header
        if (is_file($controllerHeader)) {
            include ($controllerHeader);
        } else {
            include ($defaultHeader);
        }

        //view
        if (is_file($controllerLayout)) {
            include_once ($controllerLayout);
        } else {
            echo "<h1>Fail to find View File</h1>";
        }

        if (is_file($controllerFooter)) {
            include ($controllerFooter);
        } else {
            include ($defaultFooter);
        }
    }
}