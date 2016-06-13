<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $form CActiveForm */
?>

<div class="form">    
   
    <?php $form = $this->beginWidget('booster.widgets.TbActiveForm',array(
                'id' => 'UsuarioForm',
                'htmlOptions' => array('class' => 'well'), )); ?>
            
    <div class="usuario">
        <div class="columna1">
            <div class="name">
                <?php echo $form->textFieldGroup($usuario, 'name', array('style' => 'text-transform: uppercase','wrapperHtmlOptions' => array('class' => 'col-sm-5', ),)); ?>                
            </div>
            
                <div class="pass">
                    <?php echo $form->textFieldGroup($usuario, 'pass', array ('wrapperHtmlOptions' =>  array(  'class' => 'col-sm-5'),));?>                    
                </div>            
            
            
        </div>      
    </div>
        
    <div class="persona">
        <div class="row1">
            <div class="nombre">
                <?php echo $form->textFieldGroup($persona, 'nombre', array('style' => 'text-transform: uppercase','wrapperHtmlOptions' => array('class' => 'col-sm-5', ),)); ?>                
            </div>

            <div class="apellido">
                <?php echo $form->textFieldGroup($persona, 'apellido', array('style' => 'text-transform: uppercase','wrapperHtmlOptions' => array('class' => 'col-sm-5', ),)); ?>                
            </div>           
        </div>
        
        <div class="row2">
            
            <div class="dni">            
                <?php echo $form->textFieldGroup($persona, 'dni', array ('hint' => 'sin punto (.) ej: 23456545', 'widgetOption'  =>  'Checsdasadut', 'wrapperHtmlOptions' => array('class' => 'col-sm-5',),'width' => '40',)); ?>
            </div>   
        </div>
    </div>
   
    <div class="direccion">
        <div class="calle">
            <?php echo $form->textFieldGroup($direccion, 'calleNro', array('style' => 'text-transform: uppercase','wrapperHtmlOptions' => array('class' => 'col-sm-5', ),)); ?>
        </div>   
         <div class="localidad">
            <?php echo $form->textFieldGroup($direccion, 'localidad', array('style' => 'text-transform: uppercase','wrapperHtmlOptions' => array('class' => 'col-sm-5', ),)); ?>
        </div>       
    </div>
        
    <div class="tel">
        <div class="telefono">
            <?php echo $form->textFieldGroup($persona, 'tel', array('style' => 'text-transform: uppercase','wrapperHtmlOptions' => array('class' => 'col-sm-5', ),)); ?>
        </div>
    </div>  
        <div class="boton">
            <?php $this->widget('booster.widgets.TbButton', array('label' => 'Cargar', 'context' => 'success','buttonType' => 'submit',));?>
        </div>

    <?php $this->endWidget(); ?>        
</div>

