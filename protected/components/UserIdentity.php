<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	
            private $_id;


    public function authenticate()
	{
            $criterial = new CDbCriteria();
            $criterial->addCondition("name='" . strtolower($this->username) . "' ");
            $user = Usuario::model()->find($criterial);
            
            if($user===null)
                    $this->errorCode=self::ERROR_USERNAME_INVALID;                
            elseif($this->password!==$user->pass)
                    $this->errorCode=self::ERROR_PASSWORD_INVALID;
            else{
                    $this->errorCode=self::ERROR_NONE;
                        //Yii::app()->user->id                    
            }
           
            return $this->errorCode;
	}
        
    public function getId(){ return $this->_id; }


//	public function authenticate()
//	{
//		$users=array(
//			// username => password
//			'demo'=>'demo',
//			'admin'=>'admin',
//		);
//		if(!isset($users[$this->username]))
//			$this->errorCode=self::ERROR_USERNAME_INVALID;
//		elseif($users[$this->username]!==$this->password)
//			$this->errorCode=self::ERROR_PASSWORD_INVALID;
//		else
//			$this->errorCode=self::ERROR_NONE;
//		return !$this->errorCode;
//	}
}