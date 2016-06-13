<?php

/**
 * This is the model class for table "persona".
 *
 * The followings are the available columns in table 'persona':
 * @property integer $id
 * @property integer $dni
 * @property string $apellido
 * @property string $nombre
 * @property integer $id_dir
 * @property string $tel
 *
 * The followings are the available model relations:
 * @property Ctacte[] $ctactes
 * @property Direccion $idDir
 * @property Usuario[] $usuarios
 */
class Persona extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'persona';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('dni, apellido, nombre, id_dir', 'required'),
			array('dni, id_dir', 'numerical', 'integerOnly'=>true),
			array('apellido, nombre, tel', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, dni, apellido, nombre, id_dir, tel', 'safe', 'on'=>'search'),
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
			'ctactes' => array(self::HAS_MANY, 'Ctacte', 'id_per'),
			'idDir' => array(self::BELONGS_TO, 'Direccion', 'id_dir'),
			'usuarios' => array(self::HAS_MANY, 'Usuario', 'id_per'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'dni' => 'Dni',
			'apellido' => 'Apellido',
			'nombre' => 'Nombre',
			'id_dir' => 'Id Dir',
			'tel' => 'Tel',
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
		$criteria->compare('dni',$this->dni);
		$criteria->compare('apellido',$this->apellido,true);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('id_dir',$this->id_dir);
		$criteria->compare('tel',$this->tel,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Persona the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
