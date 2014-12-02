<?php
/* @var $this FareController */
/* @var $model Fare */

$this->breadcrumbs=array(
	'Fares'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Fare', 'url'=>array('index')),
	array('label'=>'Create Fare', 'url'=>array('create')),
	array('label'=>'Update Fare', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Fare', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Fare', 'url'=>array('admin')),
);
?>

<h1>View Fare #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'bus_travel_company_mapping_id',
		'route_id',
		'fare_type',
		'fare_amount',
		'added_by',
		'added_on',
		'updated_by',
		'updated_on',
	),
)); ?>
