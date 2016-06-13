<?php

/**
 * This is the model class for table "linea".
 *
 * The followings are the available columns in table 'linea':
 * @property integer $id
 * @property string $fechaCompra
 * @property integer $cant
 * @property string $descripcion
 * @property double $monto
 * @property integer $pagado
 * @property string $fechaPago
 *
 * The followings are the available model relations:
 * @property Ctactelinea[] $ctactelineas
 */
class Linea extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'linea';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fechaCompra, cant, descripcion, monto', 'required'),
			array('cant, pagado', 'numerical', 'integerOnly'=>true),
			array('monto', 'numerical'),
			array('descripcion', 'length', 'max'=>20),
			array('fechaPago', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, fechaCompra, cant, descripcion, monto, pagado, fechaPago', 'safe', 'on'=>'search'),
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
			'ctactelineas' => array(self::HAS_MANY, 'Ctactelinea', 'id_lin'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'fechaCompra' => 'Fecha Compra',
			'cant' => 'Cant',
			'descripcion' => 'Descripcion',
			'monto' => 'Monto',
			'pagado' => 'Pagado',
			'fechaPago' => 'Fecha Pago',
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
		$criteria->compare('fechaCompra',$this->fechaCompra,true);
		$criteria->compare('cant',$this->cant);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('monto',$this->monto);
		$criteria->compare('pagado',$this->pagado);
		$criteria->compare('fechaPago',$this->fechaPago,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Linea the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
