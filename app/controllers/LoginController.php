<?php
/**
 * Created by PhpStorm.
 * User: yac0105
 * Date: 1/06/2018
 * Time: 7:41 PM
 */

namespace app\controllers;

use comphp\base\Controller;
use app\models\UserModel;
use app\uti\ValidateUtil;

include(APP_PATH. 'app/util/' .'ValidateUtil.php');

define('LOGIN_ACTION_LOGIN', "login" );

class LoginController extends Controller
{

    public $formName;

    public $formPwd;

    public function init(){


        if($this->_actionName == LOGIN_ACTION_LOGIN){

            $this->loginFunction();

        }

    }

    public function loginFunction(){

        if( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' ) {
            //valid
            if($this->isValidLogin()){
                $this->formName = $_POST['user_name'];

                $this->formPwd = $_POST['user_pwd'];


                (new UserModel())->search($this->formName);

            }

        }



        //header( 'Location:post.php' );

    }


    private function isValidLogin(){

        $hasIssue = false;

        if(isset($_POST['user_name']) && !empty($_POST['user_name'])){

            $this->formName = $_POST['user_name'];

            if(!ValidateUtil::validateUserName($this->formName)){
                echo "<p class='bg-danger text-white'>Please input the right user name</p>";

                $hasIssue = true;
            }
        }

        if(isset($_POST['user_pwd'])&& !empty($_POST['user_pwd'])){
            $this->formPwd = $_POST['user_pwd'];

            if(ValidateUtil::validateIfPwdUnleagal($this->formPwd)){
                echo "<p class='bg-danger text-white'>Please input the right style password</p>";
                $hasIssue = true;
            }
        }

        if($hasIssue){
            return false;
        }

        return true;
    }

}