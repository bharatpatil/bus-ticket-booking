<?php
/* @var $this BusTravelCompanyMappingController */
/* @var $model BusTravelCompanyMapping */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'bus-travel-company-mapping-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'bus_id'); ?>
		<?php echo $form->textField($model,'bus_id',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'bus_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'travel_company_id'); ?>
		<?php echo $form->dropDownList($model, 'travel_company_id', $travelCompany, array(
				'prompt'=>'Select City',
				'id'=>'txtSource',
				'class'=>'XXinput'
		));  ?>
		<?php //echo $form->textField($model,'travel_company_id',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'travel_company_id'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->