<?php
/**
 * Created by PhpStorm.
 * User: yac0105
 * Date: 1/06/2018
 * Time: 7:41 PM
 */

namespace app\controllers;

use app\controllers\formbeans\LoginFormBeanFactory;
use comphp\base\Controller;
use app\models\UserModel;
use app\uti\ValidateUtil;
include(APP_PATH. 'app/util/' .'ValidateUtil.php');
include(APP_PATH . 'app/controllers/formbeans/'.'LoginFormBean.php');


define('LOGIN_ACTION_LOGIN', "login" );

class LoginController extends Controller
{

    private $formBean;

	private $userModel;

    public function init(){

        $this->formBean = LoginFormBeanFactory::create();

	    $this->userModel = new UserModel();

        if($this->_actionName == LOGIN_ACTION_LOGIN){

            $this->loginFunction();

        }

    }

    public function loginFunction(){

        if( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' ) {
            //valid
            if($this->isValidLogin()){

				$userInfo = $this->userModel->searchUsrInfoByLoginName($this->formBean->getFormUsrName());
				
				if ( !$userInfo )
                {
                    echo "Not a valid surname, password combination <br />";
                }else{
					if($userInfo->size()>0){

						$userLoginPwd = '';
						$userID = -1;

						while ( $aRow =  $userInfo->fetch() ){

                            $userLoginPwd = $aRow['loginPwd'];
                            $userID = $aRow['userID'];

						}

						if(!$this->checkPwd($this->formBean->getFormUsrPwd(), $userLoginPwd )){

                            echo " <p class='bg-danger text-white'>You password is wrong!</p> <br />";

                            return;

                        }

                        if(ValidateUtil::validateIfWeakPwd($this->formBean->getFormUsrPwd())){
                            echo "<script type='text/javascript'>alert('Login successfully! Your passwords is weak. We suggest you to modify the password!')</script>";
                        }

                        session_save_path( './' );
                        session_start();

                        $_SESSION[ 'theUsrName' ] = $this->formBean->getFormUsrName();
                        $_SESSION[ 'userID' ] = $userID;

			            header( 'Location:post.php' ) ;
			        }else{
			  	        echo " <p class='bg-danger text-white'>No User was found!</p> <br />";
			        }
				} 

            }

        }

    }

    private function checkPwd($userInputPwd, $userLoginPwd){
        if (password_verify($userInputPwd, $userLoginPwd)) {
            return true;
        } else {
            return false;
        }
    }

    private function isValidLogin(){

        $hasIssue = false;

        if(isset($_POST['user_name']) && !empty($_POST['user_name'])){

            $this->formBean->setFormUsrName($_POST['user_name']);

            if(!ValidateUtil::validateUserName($this->formBean->getFormUsrName())){
                echo "<p class='bg-danger text-white'>Please input the right user name</p>";

                $hasIssue = true;
            }
        }

        if(isset($_POST['user_pwd'])&& !empty($_POST['user_pwd'])){
            $this->formBean->setFormUsrPwd($_POST['user_pwd']);

            if(ValidateUtil::validateIfPwdUnleagal($this->formBean->getFormUsrPwd())){
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