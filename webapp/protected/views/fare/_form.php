<?php
/* @var $this FareController */
/* @var $model Fare */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'fare-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'bus_travel_company_mapping_id'); ?>
		<?php echo $form->textField($model,'bus_travel_company_mapping_id',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'bus_travel_company_mapping_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'route_id'); ?>
		<?php echo $form->textField($model,'route_id',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'route_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fare_type'); ?>
		<?php echo $form->textField($model,'fare_type',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'fare_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fare_amount'); ?>
		<?php echo $form->textField($model,'fare_amount',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'fare_amount'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'added_by'); ?>
		<?php echo $form->textField($model,'added_by',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'added_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'added_on'); ?>
		<?php echo $form->textField($model,'added_on'); ?>
		<?php echo $form->error($model,'added_on'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'updated_by'); ?>
		<?php echo $form->textField($model,'updated_by',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'updated_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'updated_on'); ?>
		<?php echo $form->textField($model,'updated_on'); ?>
		<?php echo $form->error($model,'updated_on'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->