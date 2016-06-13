<?php
/* @var $this FacturadebeController */
/* @var $model Facturadebe */

$this->breadcrumbs=array(
	'Facturadebes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Facturadebe', 'url'=>array('index')),
	array('label'=>'Manage Facturadebe', 'url'=>array('admin')),
);
?>

<h1>Create Facturadebe</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>