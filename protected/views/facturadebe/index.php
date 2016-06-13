<?php
/* @var $this FacturadebeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Facturadebes',
);

$this->menu=array(
	array('label'=>'Create Facturadebe', 'url'=>array('create')),
	array('label'=>'Manage Facturadebe', 'url'=>array('admin')),
);
?>

<h1>Facturadebes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
