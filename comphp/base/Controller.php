<?php
/**
 * Created by PhpStorm.
 * User: yac0105
 * Date: 1/06/2018
 * Time: 6:02 PM
 */
namespace comphp\base;

use app\models\modelInterface\PollModelServiceImpl;

/**
 * Class Controller
 * @package comphp\base
 */
class Controller
{
    protected $_controller;
    protected $_viewName;
    protected $_actionName;
    protected $_view;
    protected $_usrId;


    public function __construct($controller, $viewName, $actionName)
    {
        $this->_controller = $controller;
        $this->_viewName = $viewName;
        $this->_view = new View($controller, $viewName);
        $this->_actionName = $actionName;

        $this->init();


    }

    public function init(){}

    public function forwardToLogin(){
        if(isset($_SESSION[ 'userID' ]) && !empty($_SESSION[ 'userID' ])){

            $this->_usrId = $_SESSION[ 'userID' ];

            return false;

        }else{

            if(!strrpos(strtolower($this->_viewName), 'login')){
                header( 'Location:Login.php?forward' ) ;
            }

            return true;
        }
    }

    public function assign($name, $value)
    {
        $this->_view->assign($name, $value);
    }

    public function render()
    {
        $this->_view->render();
    }

}