<?php

/**
 * This is the model class for table "ctacte".
 *
 * The followings are the available columns in table 'ctacte':
 * @property integer $id
 * @property string $observacion
 * @property integer $id_emp
 * @property integer $id_per
 *
 * The followings are the available model relations:
 * @property Empresa $idEmp
 * @property Persona $idPer
 * @property Ctactelinea[] $ctactelineas
 */
class Ctacte extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ctacte';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('observacion, id_emp, id_per', 'required'),
			array('id_emp, id_per', 'numerical', 'integerOnly'=>true),
			array('observacion', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, observacion, id_emp, id_per', 'safe', 'on'=>'search'),
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
			'idEmp' => array(self::BELONGS_TO, 'Empresa', 'id_emp'),
			'idPer' => array(self::BELONGS_TO, 'Persona', 'id_per'),
			'ctactelineas' => array(self::HAS_MANY, 'Ctactelinea', 'id_ctacte'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'observacion' => 'Observacion',
			'id_emp' => 'Id Emp',
			'id_per' => 'Id Per',
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
		$criteria->compare('observacion',$this->observacion,true);
		$criteria->compare('id_emp',$this->id_emp);
		$criteria->compare('id_per',$this->id_per);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Ctacte the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
