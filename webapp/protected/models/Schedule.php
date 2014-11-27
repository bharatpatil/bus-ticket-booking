<?php

/**
 * This is the model class for table "schedule".
 *
 * The followings are the available columns in table 'schedule':
 * @property string $id
 * @property string $bus_id
 * @property string $route_id
 * @property string $frequency_id
 * @property string $departure_time
 * @property string $valid_until
 * @property string $added_by
 * @property string $added_on
 * @property string $updated_by
 * @property string $updated_on
 *
 * The followings are the available model relations:
 * @property Bus $bus
 * @property Route $route
 * @property Frequency $frequency
 * @property User $addedBy
 * @property User $updatedBy
 */
class Schedule extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'schedule';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('bus_id, route_id, frequency_id, departure_time', 'required'),
			array('bus_id, route_id, frequency_id, added_by, updated_by', 'length', 'max'=>20),
			array('valid_until, added_on, updated_on', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, bus_id, route_id, frequency_id, departure_time, valid_until, added_by, added_on, updated_by, updated_on', 'safe', 'on'=>'search'),
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
			'bus' => array(self::BELONGS_TO, 'Bus', 'bus_id'),
			'route' => array(self::BELONGS_TO, 'Route', 'route_id'),
			'frequency' => array(self::BELONGS_TO, 'Frequency', 'frequency_id'),
			'addedBy' => array(self::BELONGS_TO, 'User', 'added_by'),
			'updatedBy' => array(self::BELONGS_TO, 'User', 'updated_by'),
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
			'frequency_id' => 'Frequency',
			'departure_time' => 'Departure Time',
			'valid_until' => 'Valid Until',
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
		$criteria->compare('frequency_id',$this->frequency_id,true);
		$criteria->compare('departure_time',$this->departure_time,true);
		$criteria->compare('valid_until',$this->valid_until,true);
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
	 * @return Schedule the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
