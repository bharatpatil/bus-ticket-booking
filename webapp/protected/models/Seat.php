<?php

/**
 * This is the model class for table "seat".
 *
 * The followings are the available columns in table 'seat':
 * @property string $id
 * @property string $bus_id
 * @property string $seat_name
 * @property integer $is_window_seat
 * @property string $added_by
 * @property string $added_on
 * @property string $updated_by
 * @property string $updated_on
 *
 * The followings are the available model relations:
 * @property User $addedBy
 * @property User $updatedBy
 * @property Bus $bus
 */
class Seat extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'seat';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('bus_id', 'required'),
			array('is_window_seat', 'numerical', 'integerOnly'=>true),
			array('bus_id, added_by, updated_by', 'length', 'max'=>20),
			array('seat_name', 'length', 'max'=>255),
			array('added_on, updated_on', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, bus_id, seat_name, is_window_seat, added_by, added_on, updated_by, updated_on', 'safe', 'on'=>'search'),
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
			'seat_name' => 'Seat Name',
			'is_window_seat' => 'Is Window Seat',
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
		$criteria->compare('seat_name',$this->seat_name,true);
		$criteria->compare('is_window_seat',$this->is_window_seat);
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
	 * @return Seat the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
