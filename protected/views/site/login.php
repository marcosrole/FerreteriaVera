<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<h1>Inicio de sesión</h1>

<p>Complete los datos para iniciar el sistema:</p>

<div class="form">

	<p class="note">Los campos con <span class="required">*</span> son obligatorios.</p>
        
         <?php 
    $form = $this->beginWidget('booster.widgets.TbActiveForm',
        array(
            'id' => 'UsuarioForm',
            //'htmlOptions' => array('class' => 'well'), // for inset effect
        )
    ); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name'); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pass'); ?>
		<?php echo $form->passwordField($model,'pass'); ?>
		<?php echo $form->error($model,'pass'); ?>
		
	</div>
        
        <?php if($error){ ?>
                <font color="red">
                    <h5>
                        Usuario o contraseña incorrecto.
                    </h5>            
                </font>           
            <?php } ?>
	

	<div class="row buttons">
		<?php echo CHtml::submitButton('Login'); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
