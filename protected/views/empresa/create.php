<?php
/* @var $this EmpresaController */
/* @var $model Empresa */

$this->breadcrumbs=array(
	'Empresas'=>array('index'),
	'Crear Nueva Empresa',
);

$this->menu=array(
	array('label'=>'List Empresa', 'url'=>array('index')),
	array('label'=>'Manage Empresa', 'url'=>array('admin')),
);
?>

<h1>Crear nueva empresa</h1>

<?php $this->renderPartial('_form',
                        array(
                            'empresa'=>$empresa,                          
                            'direccion'=>$direccion,                            
                            ));
 ?>