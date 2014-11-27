<?php

/**
 * This is the model class for table "booking".
 *
 * The followings are the available columns in table 'booking':
 * @property string $id
 * @property string $bus_id
 * @property string $route_id
 * @property string $number_of_adults
 * @property string $number_of_children
 * @property string $booking_datetime
 * @property string $first_name
 * @property string $last_name
 * @property string $email_address
 * @property integer $contact_number
 * @property integer $is_canceled
 * @property string $added_by
 * @property string $added_on
 * @property string $updated_by
 * @property string $updated_on
 *
 * The followings are the available model relations:
 * @property User $addedBy
 * @property User $updatedBy
 * @property Bus $bus
 * @property Route $route
 * @property BookingSeatMapping[] $bookingSeatMappings
 */
class Booking extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'booking';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('bus_id, route_id, booking_datetime', 'required'),
			array('contact_number, is_canceled', 'numerical', 'integerOnly'=>true),
			array('bus_id, route_id, added_by, updated_by', 'length', 'max'=>20),
			array('number_of_adults, number_of_children', 'length', 'max'=>10),
			array('first_name, last_name', 'length', 'max'=>255),
			array('email_address', 'length', 'max'=>512),
			array('added_on, updated_on', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, bus_id, route_id, number_of_adults, number_of_children, booking_datetime, first_name, last_name, email_address, contact_number, is_canceled, added_by, added_on, updated_by, updated_on', 'safe', 'on'=>'search'),
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
			'addedBy' => array(self::BELONGS_TO, 'User', 'added_by'),
			'updatedBy' => array(self::BELONGS_TO, 'User', 'updated_by'),
			'bus' => array(self::BELONGS_TO, 'Bus', 'bus_id'),
			'route' => array(self::BELONGS_TO, 'Route', 'route_id'),
			'bookingSeatMappings' => array(self::HAS_MANY, 'BookingSeatMapping', 'booking_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'bus_id' => 'Bus',
			'route_id' => 'Route',
			'number_of_adults' => 'Number Of Adults',
			'number_of_children' => 'Number Of Children',
			'booking_datetime' => 'Booking Datetime',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'email_address' => 'Email Address',
			'contact_number' => 'Contact Number',
			'is_canceled' => 'Is Canceled',
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
		$criteria->compare('bus_id',$this->bus_id,true);
		$criteria->compare('route_id',$this->route_id,true);
		$criteria->compare('number_of_adults',$this->number_of_adults,true);
		$criteria->compare('number_of_children',$this->number_of_children,true);
		$criteria->compare('booking_datetime',$this->booking_datetime,true);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('email_address',$this->email_address,true);
		$criteria->compare('contact_number',$this->contact_number);
		$criteria->compare('is_canceled',$this->is_canceled);
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
	 * @return Booking the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
