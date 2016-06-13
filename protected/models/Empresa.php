<?php

/**
 * This is the model class for table "empresa".
 *
 * The followings are the available columns in table 'empresa':
 * @property integer $id
 * @property string $razonSocial
 * @property integer $tel
 * @property integer $cuit
 * @property integer $id_dir
 *
 * The followings are the available model relations:
 * @property Ctacte[] $ctactes
 * @property Direccion $idDir
 * @property Facturadebe[] $facturadebes
 */
class Empresa extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'empresa';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('razonSocial, cuit, id_dir', 'required'),
			array('tel, cuit, id_dir', 'numerical', 'integerOnly'=>true),
			array('razonSocial', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, razonSocial, tel, cuit, id_dir', 'safe', 'on'=>'search'),
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
			'ctactes' => array(self::HAS_MANY, 'Ctacte', 'id_emp'),
			'idDir' => array(self::BELONGS_TO, 'Direccion', 'id_dir'),
			'facturadebes' => array(self::HAS_MANY, 'Facturadebe', 'id_emp'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'razonSocial' => 'Razon Social',
			'tel' => 'Tel',
			'cuit' => 'Cuit',
			'id_dir' => 'Id Dir',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('razonSocial',$this->razonSocial,true);
		$criteria->compare('tel',$this->tel);
		$criteria->compare('cuit',$this->cuit);
		$criteria->compare('id_dir',$this->id_dir);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Empresa the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
