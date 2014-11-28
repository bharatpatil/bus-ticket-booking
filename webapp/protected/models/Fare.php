<?php

/**
 * This is the model class for table "fare".
 *
 * The followings are the available columns in table 'fare':
 * @property string $id
 * @property string $bus_travel_company_mapping_id
 * @property string $route_id
 * @property string $fare_type
 * @property string $fare_amount
 * @property string $added_by
 * @property string $added_on
 * @property string $updated_by
 * @property string $updated_on
 *
 * The followings are the available model relations:
 * @property User $addedBy
 * @property User $updatedBy
 * @property BusTravelCompanyMapping $busTravelCompanyMapping
 * @property Route $route
 */
class Fare extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'fare';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('bus_travel_company_mapping_id, route_id, fare_type, fare_amount', 'required'),
			array('bus_travel_company_mapping_id, route_id, fare_amount, added_by, updated_by', 'length', 'max'=>20),
			array('fare_type', 'length', 'max'=>1),
			array('added_on, updated_on', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, bus_travel_company_mapping_id, route_id, fare_type, fare_amount, added_by, added_on, updated_by, updated_on', 'safe', 'on'=>'search'),
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
			'busTravelCompanyMapping' => array(self::BELONGS_TO, 'BusTravelCompanyMapping', 'bus_travel_company_mapping_id'),
			'route' => array(self::BELONGS_TO, 'Route', 'route_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'bus_travel_company_mapping_id' => 'Bus Travel Company Mapping',
			'route_id' => 'Route',
			'fare_type' => 'Fare Type',
			'fare_amount' => 'Fare Amount',
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
		$criteria->compare('bus_travel_company_mapping_id',$this->bus_travel_company_mapping_id,true);
		$criteria->compare('route_id',$this->route_id,true);
		$criteria->compare('fare_type',$this->fare_type,true);
		$criteria->compare('fare_amount',$this->fare_amount,true);
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
	 * @return Fare the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
