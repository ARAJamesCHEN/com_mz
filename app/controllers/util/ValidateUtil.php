<?php
namespace app\controllers\util;

class ValidateUtil {
	
	public static function validateUserName($userName){
		
		$userRegxPattern = '/^[a-zA-Z0-9_]{1,30}$/i';
		
		if(preg_match($userRegxPattern,$userName)){
			return true;
		}
		
		return false;
	}
	
	public static function validateIfPwdUnleagal($pwd){
		
		$pattern = '/[\'.,:;*?~`!@#$%^&+=)(<>{}]|\]|\[|\/|\\\|\"|\|/';
		
		if(preg_match($pattern, $pwd)) {
            return true;
        }else {
            return false;
        }
	}
	
	
	public static function validateIfWeakPwd($pwd){
		if(preg_match("/^.*(?=.{8,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$/", $pwd)) {
            return true;
        }else {
            return false;
        }
	}
	
}
