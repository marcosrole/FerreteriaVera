<?php
/* @var $this EmpresaController */
/* @var $model Empresa */
/* @var $form CActiveForm */
?>

<div class="form">    
   
    <?php $form = $this->beginWidget('booster.widgets.TbActiveForm',array(
                'id' => 'UsuarioForm',
                'htmlOptions' => array('class' => 'well'), )); ?>
            
    <div class="empresa">
        <div class="columna1">
            <div class="razonsocial">
                <?php echo $form->textFieldGroup($empresa, 'razonSocial', array('style' => 'text-transform: uppercase','wrapperHtmlOptions' => array('class' => 'col-sm-5', ),)); ?>                
            </div>
            
            <div class="cuit">
                <?php echo $form->textFieldGroup($empresa, 'cuit', array ('wrapperHtmlOptions' =>  array(  'class' => 'col-sm-5'),));?>                    
            </div>   
            
            <div class="tel">
                <?php echo $form->textFieldGroup($empresa, 'tel', array ('wrapperHtmlOptions' =>  array(  'class' => 'col-sm-5'),));?>                    
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
    
    <div class="boton">
        <?php $this->widget('booster.widgets.TbButton', array('label' => 'Cargar', 'context' => 'success','buttonType' => 'submit',));?>
    </div>

    <?php $this->endWidget(); ?>        
</div>
