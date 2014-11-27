<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	public $id;
	private $model;
	
	public function getId()
    {
        return $this->id;
    }
 
    public function getModel()
    {
        return $this->model;
    }
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		// $users=array(
		// 	// username => password
		// 	'demo'=>'demo',
		// 	'admin'=>'admin',
		// );
		// if(!isset($users[$this->username]))
		// 	$this->errorCode=self::ERROR_USERNAME_INVALID;
		// elseif($users[$this->username]!==$this->password)
		// 	$this->errorCode=self::ERROR_PASSWORD_INVALID;
		// else
		// 	$this->errorCode=self::ERROR_NONE;
		// return !$this->errorCode;

		$user = User::model()->find('email collate utf8_general_ci =? and password=?',array(trim($this->username),sha1($this->password)));

		if($user===null)
		{
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		}	
		else 
		{			
			$this->id = $user->id;
			$this->model = $user;
			Yii::app()->session['user'] = $user;
			Yii::app()->session['username'] = $user->first_name . ' ' . $user->last_name;
			// Yii::app()->session['previousLoginTime'] = $user->last_logged_in_time;
			// $user->last_logged_in_time = new CDbExpression('NOW()');
			// $user->save();
			
			$this->errorCode=self::ERROR_NONE;			
		}		
		
		
		return !$this->errorCode;		
	}
}