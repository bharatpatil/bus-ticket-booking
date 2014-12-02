<?php

/**
 * This is the model class for table "bus".
 *
 * The followings are the available columns in table 'bus':
 * @property string $id
 * @property integer $type
 * @property integer $arrangement
 * @property string $registration_number
 * @property integer $capacity
 * @property integer $is_available
 * @property string $make
 * @property string $model
 * @property string $added_by
 * @property string $added_on
 * @property string $updated_by
 * @property string $updated_on
 *
 * The followings are the available model relations:
 * @property Booking[] $bookings
 * @property User $addedBy
 * @property User $updatedBy
 * @property BusTravelCompanyMapping[] $busTravelCompanyMappings
 * @property Fare[] $fares
 * @property Schedule[] $schedules
 * @property Seat[] $seats
 */
class Bus extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'bus';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		$userId = Yii::app()->user->id;
		$timestamp = new CDbExpression('NOW()');
		return array(
			array('type, arrangement, capacity, is_available, registration_number', 'required'),
			array('type, arrangement, capacity, is_available', 'numerical', 'integerOnly'=>true),
			array('registration_number, make, model', 'length', 'max'=>255),
			// record info
			array('updated_on','default',
					'value'=>$timestamp,
					'setOnEmpty'=>false,'on'=>'update'),
			array('added_on,updated_on','default',
					'value'=>$timestamp,
					'setOnEmpty'=>false,'on'=>'insert'),
			array('added_by,updated_by','default',
					'value'=>$userId,
					'setOnEmpty'=>false,'on'=>'insert'),
			array('updated_by','default',
					'value'=>$userId,
					'setOnEmpty'=>false,'on'=>'update'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, type, arrangement, registration_number, capacity, is_available, make, model, added_by, added_on, updated_by, updated_on', 'safe', 'on'=>'search'),
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
			'bookings' => array(self::HAS_MANY, 'Booking', 'bus_id'),
			'addedBy' => array(self::BELONGS_TO, 'User', 'added_by'),
			'updatedBy' => array(self::BELONGS_TO, 'User', 'updated_by'),
			'busTravelCompanyMappings' => array(self::HAS_MANY, 'BusTravelCompanyMapping', 'bus_id'),
			'fares' => array(self::HAS_MANY, 'Fare', 'bus_id'),
			'schedules' => array(self::HAS_MANY, 'Schedule', 'bus_id'),
			'seats' => array(self::HAS_MANY, 'Seat', 'bus_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'type' => 'Bus Type',
			'arrangement' => 'Seat Arrangement',
			'registration_number' => 'Registration Number (Police reg. number)',
			'capacity' => 'Capacity',
			'is_available' => 'Is Available',
			'make' => 'Bus Make (Ex. Ashok Layland, Volvo)',
			'model' => 'Bus Model',
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
		$criteria->compare('type',$this->type);
		$criteria->compare('arrangement',$this->arrangement);
		$criteria->compare('registration_number',$this->registration_number,true);
		$criteria->compare('capacity',$this->capacity);
		$criteria->compare('is_available',$this->is_available);
		$criteria->compare('make',$this->make,true);
		$criteria->compare('model',$this->model,true);
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
	 * @return Bus the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
