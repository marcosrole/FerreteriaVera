<?php
/* @var $this EmpresaController */
/* @var $model Empresa */

$this->breadcrumbs=array(
	'Empresas'=>array('index'),
	'Administrar Empresas',
);

$this->menu=array(
	array('label'=>'List Empresa', 'url'=>array('index')),
	array('label'=>'Create Empresa', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#empresa-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Empresas</h1>


<?php echo CHtml::link('Búsqueda avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php 
        $this->widget('booster.widgets.TbGridView', array(
            'id'=>'empresa-grid',
            'dataProvider'=>$model->search(),
             'summaryText'=>'Página {page}-{pages} de {count} resultados.',
            //'filter' => $model,
            'columns' => array(                                                       
                array(
                    'name' => 'cuit',
                    'header'=>'CUIT',
                    'htmlOptions'=>array('width'=>'3O%'), 
                ),
                array(
                    'name' => 'razonSocial',
                    'header'=>'Razon Social',
                    'htmlOptions'=>array('width'=>'4O%'), 
                ),  
                  array(
                    'name' => 'tel',
                    'header'=>'Telefono',
                    'htmlOptions'=>array('width'=>'20%'), 
                ),      
                array(
                    'class' => 'booster.widgets.TbButtonColumn',
                   // 'htmlOptions' => array('width' => '10'), //ancho de la columna
                    'template' => '{view} {update} ', // botones a mostrar
                    'buttons' => array(
                        'view' => array(
                            'label' => 'Detalles',                                                         
                            'url'=> 'Yii::app()->createUrl("empresa/view?cuit=$data->cuit")'
                        ),                                        
                        'update' => array(
                            'label' => 'Actualizar',                                                         
                            'url'=> 'Yii::app()->createUrl("empresa/update?cuit=$data->cuit")'
                        ),
                    ),
                    'htmlOptions'=>array('width'=>'1O%'), 
                    ),
            ),

        ));
        ?>
