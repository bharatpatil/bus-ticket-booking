<?php
/* @var $this ScheduleController */
/* @var $model Schedule */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'schedule-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	

	<div class="row">
		<?php echo $form->labelEx($model,'route_id'); ?>
		<?php //echo $form->textField($model,'route_id',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->dropDownList($model, 'route_id', 
				$routeList, array(
					'prompt'=>'Select Type',
					'id'=>'txtSource',
					'class'=>'XXinput'
		));  ?>
		<?php echo $form->error($model,'route_id'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'bus_travel_company_mapping_id'); ?>
		<?php echo $form->dropDownList($model, 'bus_travel_company_mapping_id', 
				$busList, array(
					'prompt'=>'Select Type',
					'id'=>'txtSource',
					'class'=>'XXinput'
		));  ?>
		<?php echo $form->error($model,'bus_travel_company_mapping_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'frequency_id'); ?>
		<?php echo $form->textField($model,'frequency_id',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'frequency_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'departure_time'); ?>
		<?php echo $form->textField($model,'departure_time'); ?>
		<?php echo $form->error($model,'departure_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'valid_until'); ?>
		<?php echo $form->textField($model,'valid_until'); ?>
		<?php echo $form->error($model,'valid_until'); ?>
	</div>

	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->