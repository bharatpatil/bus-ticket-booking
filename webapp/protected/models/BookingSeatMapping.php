<?php

/**
 * This is the model class for table "booking_seat_mapping".
 *
 * The followings are the available columns in table 'booking_seat_mapping':
 * @property string $id
 * @property string $booking_id
 * @property string $seat_id
 * @property string $added_by
 * @property string $added_on
 * @property string $updated_by
 * @property string $updated_on
 *
 * The followings are the available model relations:
 * @property Booking $booking
 * @property BookingSeatMapping $seat
 * @property BookingSeatMapping[] $bookingSeatMappings
 */
class BookingSeatMapping extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'booking_seat_mapping';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('booking_id, seat_id', 'required'),
			array('booking_id, seat_id, added_by, updated_by', 'length', 'max'=>20),
			array('added_on, updated_on', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, booking_id, seat_id, added_by, added_on, updated_by, updated_on', 'safe', 'on'=>'search'),
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
			'booking' => array(self::BELONGS_TO, 'Booking', 'booking_id'),
			'seat' => array(self::BELONGS_TO, 'BookingSeatMapping', 'seat_id'),
			'bookingSeatMappings' => array(self::HAS_MANY, 'BookingSeatMapping', 'seat_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'booking_id' => 'Booking',
			'seat_id' => 'Seat',
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
		$criteria->compare('booking_id',$this->booking_id,true);
		$criteria->compare('seat_id',$this->seat_id,true);
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
	 * @return BookingSeatMapping the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
