<?php
/* @var $this RouteController */
/* @var $model Route */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'route-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'source_city'); ?>
		<?php //echo $form->textField($model,'source_city',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->dropDownList($model, 'source_city', $city_list, array(
				'prompt'=>'Select City',
				'id'=>'txtSource',
				'class'=>'XXinput'
		));  ?>
		<?php echo $form->error($model,'source_city'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'destination_city'); ?>
		<?php echo $form->dropDownList($model, 'destination_city', $city_list, array(
				'prompt'=>'Select City',
				'id'=>'txtSource',
				'class'=>'XXinput'
		));  ?>
		<?php //echo $form->textField($model,'destination_city',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'destination_city'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'journey_duration'); ?>
		<?php echo $form->textField($model,'journey_duration'); ?>
		<?php echo $form->error($model,'journey_duration'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'distance'); ?>
		<?php echo $form->textField($model,'distance'); ?>
		<?php echo $form->error($model,'distance'); ?>
	</div>

	
	<div class="row">
		<?php echo $form->labelEx($model,'is_available'); ?>
		
		<?php echo $form->dropDownList($model, 'is_available', 
				array(
					'0'=>'No',
					'1'=>'Yes'
				), array(
					'prompt'=>'Select Type',
					'id'=>'txtSource',
					'class'=>'XXinput'
		));  ?>
		<?php //echo $form->textField($model,'is_available'); ?>
		<?php echo $form->error($model,'is_available'); ?>
		<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->