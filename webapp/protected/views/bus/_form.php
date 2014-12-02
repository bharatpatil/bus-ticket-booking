<?php
/* @var $this BusController */
/* @var $model Bus */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'bus-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->dropDownList($model, 'type', 
				array(
					'0'=>'AC',
					'1'=>'Non-AC'
				), array(
					'prompt'=>'Select Type',
					'id'=>'txtSource',
					'class'=>'XXinput'
		));  ?>
		
		<?php //echo $form->textField($model,'type'); ?>
		
		<?php echo $form->error($model,'type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'arrangement'); ?>
		<?php echo $form->dropDownList($model, 'arrangement', 
				array(
					'0'=>'Seatign',
					'1'=>'Sleeper'		
				), array(
					'prompt'=>'Select Type',
					'id'=>'txtSource',
					'class'=>'XXinput'
		));  ?>
		<?php //echo $form->textField($model,'arrangement'); ?>
		<?php echo $form->error($model,'arrangement'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'registration_number'); ?>
		<?php echo $form->textField($model,'registration_number',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'registration_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'capacity'); ?>
		<?php echo $form->dropDownList($model, 'capacity', 
				array(
					'15'=>'15 seater',
					'30'=>'30 seater'		
				), array(
					'prompt'=>'Select Type',
					'id'=>'txtSource',
					'class'=>'XXinput'
		));  ?>
		<?php //echo $form->textField($model,'capacity'); ?>
		<?php echo $form->error($model,'capacity'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'is_available'); ?>
		<?php echo $form->dropDownList($model, 'is_available', 
				array(
					'0'=>'Undre Maintanance',
					'1'=>'Available',
					'2'=>'Not Available'		
				), array(
					'prompt'=>'Select Type',
					'id'=>'txtSource',
					'class'=>'XXinput'
		));  ?>
		<?php //echo $form->textField($model,'is_available'); ?>
		<?php echo $form->error($model,'is_available'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'make'); ?>
		<?php echo $form->textField($model,'make',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'make'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'model'); ?>
		<?php echo $form->textField($model,'model',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'model'); ?>
	</div>



	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->