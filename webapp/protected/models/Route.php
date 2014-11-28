<?php

/**
 * This is the model class for table "route".
 *
 * The followings are the available columns in table 'route':
 * @property string $id
 * @property string $source_city
 * @property string $destination_city
 * @property integer $journey_duration
 * @property integer $distance
 * @property string $added_by
 * @property string $added_on
 * @property string $updated_by
 * @property string $updated_on
 * @property integer $is_available
 *
 * The followings are the available model relations:
 * @property Booking[] $bookings
 * @property Fare[] $fares
 * @property City $sourceCity
 * @property City $destinationCity
 * @property User $addedBy
 * @property User $updatedBy
 * @property Schedule[] $schedules
 */
class Route extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'route';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('source_city, destination_city, journey_duration', 'required'),
			array('journey_duration, distance, is_available', 'numerical', 'integerOnly'=>true),
			array('source_city, destination_city, added_by, updated_by', 'length', 'max'=>20),
			array('added_on, updated_on', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, source_city, destination_city, journey_duration, distance, added_by, added_on, updated_by, updated_on, is_available', 'safe', 'on'=>'search'),
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
			'bookings' => array(self::HAS_MANY, 'Booking', 'route_id'),
			'fares' => array(self::HAS_MANY, 'Fare', 'route_id'),
			'sourceCity' => array(self::BELONGS_TO, 'City', 'source_city'),
			'destinationCity' => array(self::BELONGS_TO, 'City', 'destination_city'),
			'addedBy' => array(self::BELONGS_TO, 'User', 'added_by'),
			'updatedBy' => array(self::BELONGS_TO, 'User', 'updated_by'),
			'schedules' => array(self::HAS_MANY, 'Schedule', 'route_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'source_city' => 'Source City',
			'destination_city' => 'Destination City',
			'journey_duration' => 'Journey Duration',
			'distance' => 'Distance',
			'added_by' => 'Added By',
			'added_on' => 'Added On',
			'updated_by' => 'Updated By',
			'updated_on' => 'Updated On',
			'is_available' => 'Is Available',
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
		$criteria->compare('source_city',$this->source_city,true);
		$criteria->compare('destination_city',$this->destination_city,true);
		$criteria->compare('journey_duration',$this->journey_duration);
		$criteria->compare('distance',$this->distance);
		$criteria->compare('added_by',$this->added_by,true);
		$criteria->compare('added_on',$this->added_on,true);
		$criteria->compare('updated_by',$this->updated_by,true);
		$criteria->compare('updated_on',$this->updated_on,true);
		$criteria->compare('is_available',$this->is_available);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Route the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
