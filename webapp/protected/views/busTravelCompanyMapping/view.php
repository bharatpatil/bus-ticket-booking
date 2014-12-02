<?php
/* @var $this BusTravelCompanyMappingController */
/* @var $model BusTravelCompanyMapping */

$this->breadcrumbs=array(
	'Bus Travel Company Mappings'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List BusTravelCompanyMapping', 'url'=>array('index')),
	array('label'=>'Create BusTravelCompanyMapping', 'url'=>array('create')),
	array('label'=>'Update BusTravelCompanyMapping', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete BusTravelCompanyMapping', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage BusTravelCompanyMapping', 'url'=>array('admin')),
);
?>

<h1>View BusTravelCompanyMapping #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'bus_id',
		'travel_company_id',
		'added_by',
		'added_on',
		'updated_by',
		'updated_on',
	),
)); ?>
