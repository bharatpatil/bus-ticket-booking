<?php
/* @var $this RouteController */
/* @var $data Route */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('source_city')); ?>:</b>
	<?php echo CHtml::encode($data->sourceCity->name); 
	?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('destination_city')); ?>:</b>
	<?php echo CHtml::encode($data->destinationCity->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('journey_duration')); ?>:</b>
	<?php echo CHtml::encode($data->journey_duration); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('distance')); ?>:</b>
	<?php echo CHtml::encode($data->distance); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('added_by')); ?>:</b>
	<?php echo CHtml::encode($data->added_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('added_on')); ?>:</b>
	<?php echo CHtml::encode($data->added_on); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('updated_by')); ?>:</b>
	<?php echo CHtml::encode($data->updated_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updated_on')); ?>:</b>
	<?php echo CHtml::encode($data->updated_on); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_available')); ?>:</b>
	<?php echo CHtml::encode($data->is_available); ?>
	<br />

	*/ ?>

</div>