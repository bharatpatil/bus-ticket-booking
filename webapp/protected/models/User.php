<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property string $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $password
 * @property integer $role
 * @property string $added_by
 * @property string $added_on
 * @property string $updated_by
 * @property string $updated_on
 *
 * The followings are the available model relations:
 * @property Booking[] $bookings
 * @property Booking[] $bookings1
 * @property Bus[] $buses
 * @property Bus[] $buses1
 * @property BusTravelCompanyMapping[] $busTravelCompanyMappings
 * @property BusTravelCompanyMapping[] $busTravelCompanyMappings1
 * @property Fare[] $fares
 * @property Fare[] $fares1
 * @property Frequency[] $frequencies
 * @property Frequency[] $frequencies1
 * @property Route[] $routes
 * @property Route[] $routes1
 * @property Schedule[] $schedules
 * @property Schedule[] $schedules1
 * @property Seat[] $seats
 * @property Seat[] $seats1
 * @property TravelCompany[] $travelCompanies
 * @property TravelCompany[] $travelCompanies1
 * @property User $addedBy
 * @property User[] $users
 * @property User $updatedBy
 * @property User[] $users1
 */
class User extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('role', 'required'),
			array('role', 'numerical', 'integerOnly'=>true),
			array('first_name, last_name', 'length', 'max'=>255),
			array('email, password', 'length', 'max'=>512),
			array('added_by, updated_by', 'length', 'max'=>20),
			array('added_on, updated_on', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, first_name, last_name, email, password, role, added_by, added_on, updated_by, updated_on', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'bookings' => array(self::HAS_MANY, 'Booking', 'added_by'),
			'bookings1' => array(self::HAS_MANY, 'Booking', 'updated_by'),
			'buses' => array(self::HAS_MANY, 'Bus', 'added_by'),
			'buses1' => array(self::HAS_MANY, 'Bus', 'updated_by'),
			'busTravelCompanyMappings' => array(self::HAS_MANY, 'BusTravelCompanyMapping', 'added_by'),
			'busTravelCompanyMappings1' => array(self::HAS_MANY, 'BusTravelCompanyMapping', 'updated_by'),
			'fares' => array(self::HAS_MANY, 'Fare', 'added_by'),
			'fares1' => array(self::HAS_MANY, 'Fare', 'updated_by'),
			'frequencies' => array(self::HAS_MANY, 'Frequency', 'added_by'),
			'frequencies1' => array(self::HAS_MANY, 'Frequency', 'updated_by'),
			'routes' => array(self::HAS_MANY, 'Route', 'added_by'),
			'routes1' => array(self::HAS_MANY, 'Route', 'updated_by'),
			'schedules' => array(self::HAS_MANY, 'Schedule', 'added_by'),
			'schedules1' => array(self::HAS_MANY, 'Schedule', 'updated_by'),
			'seats' => array(self::HAS_MANY, 'Seat', 'added_by'),
			'seats1' => array(self::HAS_MANY, 'Seat', 'updated_by'),
			'travelCompanies' => array(self::HAS_MANY, 'TravelCompany', 'added_by'),
			'travelCompanies1' => array(self::HAS_MANY, 'TravelCompany', 'updated_by'),
			'addedBy' => array(self::BELONGS_TO, 'User', 'added_by'),
			'users' => array(self::HAS_MANY, 'User', 'added_by'),
			'updatedBy' => array(self::BELONGS_TO, 'User', 'updated_by'),
			'users1' => array(self::HAS_MANY, 'User', 'updated_by'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'email' => 'Email',
			'password' => 'Password',
			'role' => 'Role',
			'added_by' => 'Added By',
			'added_on' => 'Added On',
			'updated_by' => 'Updated By',
			'updated_on' => 'Updated On',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('role',$this->role);
		$criteria->compare('added_by',$this->added_by,true);
		$criteria->compare('added_on',$this->added_on,true);
		$criteria->compare('updated_by',$this->updated_by,true);
		$criteria->compare('updated_on',$this->updated_on,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
