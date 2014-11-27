<?php
/* @var $this BusController */
/* @var $model Bus */

$this->breadcrumbs=array(
	'Buses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Bus', 'url'=>array('index')),
	array('label'=>'Create Bus', 'url'=>array('create')),
	array('label'=>'Update Bus', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Bus', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Bus', 'url'=>array('admin')),
);
?>

<h1>View Bus #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'type',
		'arrangement',
		'registration_number',
		'capacity',
		'is_available',
		'make',
		'model',
		'added_by',
		'added_on',
		'updated_by',
		'updated_on',
	),
)); ?>
