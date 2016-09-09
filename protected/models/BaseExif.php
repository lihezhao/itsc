<?php

/**
 * This is the model class for table "{{exif}}".
 *
 * The followings are the available columns in table '{{exif}}':
 * @property string $id
 * @property string $pathName
 * @property string $fileName
 * @property integer $fileType
 * @property string $mimeType
 * @property integer $fileSize
 * @property string $fileDateTime
 * @property string $imageDescription
 * @property string $make
 * @property string $model
 * @property integer $orientation
 * @property string $xResolution
 * @property string $yResolution
 * @property integer $resolutionUnit
 * @property string $software
 * @property string $dateTime
 * @property string $artist
 * @property integer $ycbCrPositioning
 * @property string $copyright
 * @property string $copyrightPhotographer
 * @property string $copyrightEditor
 * @property string $exifVersion
 * @property integer $flashPixVersion
 * @property string $dateTimeOriginal
 * @property string $dateTimeDigitized
 * @property integer $height
 * @property integer $width
 * @property integer $apertureValue
 * @property integer $shutterSpeedValue
 * @property integer $apertureFNumber
 * @property integer $maxApertureValue
 * @property integer $exposureTime
 * @property integer $fNumber
 * @property integer $meteringMode
 * @property integer $lightSource
 * @property integer $flash
 * @property integer $exposureMode
 * @property integer $whiteBalance
 * @property integer $exposureProgram
 * @property integer $exposureBiasValue
 * @property integer $ISOSpeedRatings
 * @property integer $componentsConfiguration
 * @property integer $compressedBitsPerPixel
 * @property integer $focusDistance
 * @property integer $focalLength
 * @property integer $focalLengthIn35mmFilm
 * @property integer $userCommentEncoding
 * @property string $userComment
 * @property integer $colorSpace
 * @property integer $exifImageLength
 * @property integer $exifImageWidth
 * @property integer $fileSource
 * @property integer $sceneType
 * @property integer $thumbnailFileType
 * @property integer $thumbnailMimeType
 *
 * The followings are the available model relations:
 * @property Image $id0
 */
class BaseExif extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{exif}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, pathName, fileName, fileType, mimeType, fileSize, fileDateTime, imageDescription, make, model, orientation, xResolution, yResolution, resolutionUnit, software, dateTime, artist, ycbCrPositioning, copyright, copyrightPhotographer, copyrightEditor, exifVersion, flashPixVersion, dateTimeOriginal, dateTimeDigitized, height, width, apertureValue, shutterSpeedValue, apertureFNumber, maxApertureValue, exposureTime, fNumber, meteringMode, lightSource, flash, exposureMode, whiteBalance, exposureProgram, exposureBiasValue, ISOSpeedRatings, componentsConfiguration, compressedBitsPerPixel, focusDistance, focalLength, focalLengthIn35mmFilm, userCommentEncoding, userComment, colorSpace, exifImageLength, exifImageWidth, fileSource, sceneType, thumbnailFileType, thumbnailMimeType', 'required'),
			array('fileType, fileSize, orientation, resolutionUnit, ycbCrPositioning, flashPixVersion, height, width, apertureValue, shutterSpeedValue, apertureFNumber, maxApertureValue, exposureTime, fNumber, meteringMode, lightSource, flash, exposureMode, whiteBalance, exposureProgram, exposureBiasValue, ISOSpeedRatings, componentsConfiguration, compressedBitsPerPixel, focusDistance, focalLength, focalLengthIn35mmFilm, userCommentEncoding, colorSpace, exifImageLength, exifImageWidth, fileSource, sceneType, thumbnailFileType, thumbnailMimeType', 'numerical', 'integerOnly'=>true),
			array('id', 'length', 'max'=>32),
			array('pathName, userComment', 'length', 'max'=>512),
			array('fileName', 'length', 'max'=>256),
			array('mimeType', 'length', 'max'=>16),
			array('imageDescription', 'length', 'max'=>1024),
			array('make, model, software, artist, copyright, copyrightPhotographer, copyrightEditor', 'length', 'max'=>128),
			array('xResolution, yResolution, exifVersion', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, pathName, fileName, fileType, mimeType, fileSize, fileDateTime, imageDescription, make, model, orientation, xResolution, yResolution, resolutionUnit, software, dateTime, artist, ycbCrPositioning, copyright, copyrightPhotographer, copyrightEditor, exifVersion, flashPixVersion, dateTimeOriginal, dateTimeDigitized, height, width, apertureValue, shutterSpeedValue, apertureFNumber, maxApertureValue, exposureTime, fNumber, meteringMode, lightSource, flash, exposureMode, whiteBalance, exposureProgram, exposureBiasValue, ISOSpeedRatings, componentsConfiguration, compressedBitsPerPixel, focusDistance, focalLength, focalLengthIn35mmFilm, userCommentEncoding, userComment, colorSpace, exifImageLength, exifImageWidth, fileSource, sceneType, thumbnailFileType, thumbnailMimeType', 'safe', 'on'=>'search'),
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
			'id0' => array(self::BELONGS_TO, 'ImageFile', 'id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'pathName' => 'Path Name',
			'fileName' => '文件名',
			'fileType' => '文件类型',
			'mimeType' => '文件格式',
			'fileSize' => '文件大小',
			'fileDateTime' => '时间戳',
			'imageDescription' => '图片说明',
			'make' => '制造商',
			'model' => '型号',
			'orientation' => '方向',
			'xResolution' => '水平分辨率',
			'yResolution' => '垂直分辨率',
			'resolutionUnit' => 'Resolution Unit',
			'software' => '创建软件',
			'dateTime' => '修改时间',
			'artist' => '作者',
			'ycbCrPositioning' => 'YCbCr位置控制',
			'copyright' => '版权',
			'copyrightPhotographer' => '摄影版权',
			'copyrightEditor' => '编辑版权',
			'exifVersion' => 'Exif版本',
			'flashPixVersion' => 'FlashPix版本',
			'dateTimeOriginal' => '拍摄时间',
			'dateTimeDigitized' => '数字化时间',
			'height' => '拍摄分辨率高',
			'width' => '拍摄分辨率宽',
			'apertureValue' => '光圈',
			'shutterSpeedValue' => '快门速度',
			'apertureFNumber' => '快门光圈',
			'maxApertureValue' => '最大光圈值',
			'exposureTime' => '曝光时间',
			'fNumber' => 'F-Number',
			'meteringMode' => '测光模式',
			'lightSource' => '光源',
			'flash' => '闪光灯',
			'exposureMode' => '曝光模式',
			'whiteBalance' => '白平衡',
			'exposureProgram' => '曝光程序',
			'exposureBiasValue' => '曝光补偿',
			'ISOSpeedRatings' => 'ISO感光度',
			'componentsConfiguration' => '分量配置',
			'compressedBitsPerPixel' => '图像压缩率',
			'focusDistance' => '对焦距离',
			'focalLength' => '焦距',
			'focalLengthIn35mmFilm' => '等价35mm焦距',
			'userCommentEncoding' => '用户注释编码',
			'userComment' => '用户注释',
			'colorSpace' => '色彩空间',
			'exifImageLength' => 'Exif图像宽度',
			'exifImageWidth' => 'Exif图像高度',
			'fileSource' => '文件来源',
			'sceneType' => '场景类型',
			'thumbnailFileType' => '缩略图文件格式',
			'thumbnailMimeType' => '缩略图Mime格式',
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
		$criteria->compare('pathName',$this->pathName,true);
		$criteria->compare('fileName',$this->fileName,true);
		$criteria->compare('fileType',$this->fileType);
		$criteria->compare('mimeType',$this->mimeType,true);
		$criteria->compare('fileSize',$this->fileSize);
		$criteria->compare('fileDateTime',$this->fileDateTime,true);
		$criteria->compare('imageDescription',$this->imageDescription,true);
		$criteria->compare('make',$this->make,true);
		$criteria->compare('model',$this->model,true);
		$criteria->compare('orientation',$this->orientation);
		$criteria->compare('xResolution',$this->xResolution,true);
		$criteria->compare('yResolution',$this->yResolution,true);
		$criteria->compare('resolutionUnit',$this->resolutionUnit);
		$criteria->compare('software',$this->software,true);
		$criteria->compare('dateTime',$this->dateTime,true);
		$criteria->compare('artist',$this->artist,true);
		$criteria->compare('ycbCrPositioning',$this->ycbCrPositioning);
		$criteria->compare('copyright',$this->copyright,true);
		$criteria->compare('copyrightPhotographer',$this->copyrightPhotographer,true);
		$criteria->compare('copyrightEditor',$this->copyrightEditor,true);
		$criteria->compare('exifVersion',$this->exifVersion,true);
		$criteria->compare('flashPixVersion',$this->flashPixVersion);
		$criteria->compare('dateTimeOriginal',$this->dateTimeOriginal,true);
		$criteria->compare('dateTimeDigitized',$this->dateTimeDigitized,true);
		$criteria->compare('height',$this->height);
		$criteria->compare('width',$this->width);
		$criteria->compare('apertureValue',$this->apertureValue);
		$criteria->compare('shutterSpeedValue',$this->shutterSpeedValue);
		$criteria->compare('apertureFNumber',$this->apertureFNumber);
		$criteria->compare('maxApertureValue',$this->maxApertureValue);
		$criteria->compare('exposureTime',$this->exposureTime);
		$criteria->compare('fNumber',$this->fNumber);
		$criteria->compare('meteringMode',$this->meteringMode);
		$criteria->compare('lightSource',$this->lightSource);
		$criteria->compare('flash',$this->flash);
		$criteria->compare('exposureMode',$this->exposureMode);
		$criteria->compare('whiteBalance',$this->whiteBalance);
		$criteria->compare('exposureProgram',$this->exposureProgram);
		$criteria->compare('exposureBiasValue',$this->exposureBiasValue);
		$criteria->compare('ISOSpeedRatings',$this->ISOSpeedRatings);
		$criteria->compare('componentsConfiguration',$this->componentsConfiguration);
		$criteria->compare('compressedBitsPerPixel',$this->compressedBitsPerPixel);
		$criteria->compare('focusDistance',$this->focusDistance);
		$criteria->compare('focalLength',$this->focalLength);
		$criteria->compare('focalLengthIn35mmFilm',$this->focalLengthIn35mmFilm);
		$criteria->compare('userCommentEncoding',$this->userCommentEncoding);
		$criteria->compare('userComment',$this->userComment,true);
		$criteria->compare('colorSpace',$this->colorSpace);
		$criteria->compare('exifImageLength',$this->exifImageLength);
		$criteria->compare('exifImageWidth',$this->exifImageWidth);
		$criteria->compare('fileSource',$this->fileSource);
		$criteria->compare('sceneType',$this->sceneType);
		$criteria->compare('thumbnailFileType',$this->thumbnailFileType);
		$criteria->compare('thumbnailMimeType',$this->thumbnailMimeType);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return BaseExif the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
