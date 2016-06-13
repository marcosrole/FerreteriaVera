<?php
/* @var $this FacturadebeController */
/* @var $model Facturadebe */

$this->breadcrumbs=array(
	'Facturadebes'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Facturadebe', 'url'=>array('index')),
	array('label'=>'Create Facturadebe', 'url'=>array('create')),
	array('label'=>'Update Facturadebe', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Facturadebe', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Facturadebe', 'url'=>array('admin')),
);
?>

<h1>View Facturadebe #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'fecha',
		'monto',
		'nroFactura',
		'id_emp',
	),
)); ?>
