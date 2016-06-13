<?php
/* @var $this FacturadebeController */
/* @var $data Facturadebe */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('monto')); ?>:</b>
	<?php echo CHtml::encode($data->monto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nroFactura')); ?>:</b>
	<?php echo CHtml::encode($data->nroFactura); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_emp')); ?>:</b>
	<?php echo CHtml::encode($data->id_emp); ?>
	<br />


</div>