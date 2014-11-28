<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class BusSearch extends CFormModel
{
	public $citySource;
	public $cityDestination;
	public $busType;
	public $txtOnwardCalendar;
	public $txtReturnCalendar;

	private $_identity;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and password are required
			array('citySource, cityDestination, txtOnwardCalendar', 'required')
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'citySource'=>'From',
			'cityDestination'=>'To',
			'busType'=>'Bus Type',
			'txtOnwardCalendar'=>'Date of Journey',
			'txtReturnCalendar'=>'Date of Return (Optional)'
		);
	}
}
