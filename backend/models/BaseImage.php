<?php

/**
 * This is the model class for table "{{image}}".
 *
 * The followings are the available columns in table '{{image}}':
 * @property string $id
 * @property string $path
 * @property string $created_at
 * @property string $description
 * @property string $tags
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Exif $exif
 * @property Rating[] $ratings
 */
class BaseImage extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{image}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('path, status', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('id', 'length', 'max'=>32),
			array('path', 'length', 'max'=>512),
			array('created_at, description, tags', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, path, created_at, description, tags, status', 'safe', 'on'=>'search'),
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
			'exif' => array(self::HAS_ONE, 'Exif', 'id'),
			'ratings' => array(self::HAS_MANY, 'Rating', 'pid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'path' => 'Path',
			'created_at' => 'Created At',
			'description' => 'Description',
			'tags' => 'Tags',
			'status' => 'Status',
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
		$criteria->compare('path',$this->path,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('tags',$this->tags,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return BaseImage the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
