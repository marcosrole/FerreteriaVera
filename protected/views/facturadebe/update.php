<?php
/* @var $this FacturadebeController */
/* @var $model Facturadebe */

$this->breadcrumbs=array(
	'Facturadebes'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Facturadebe', 'url'=>array('index')),
	array('label'=>'Create Facturadebe', 'url'=>array('create')),
	array('label'=>'View Facturadebe', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Facturadebe', 'url'=>array('admin')),
);
?>

<h1>Update Facturadebe <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>