<?php
/* @var $this TravelCompanyController */
/* @var $model TravelCompany */

$this->breadcrumbs=array(
	'Travel Companies'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List TravelCompany', 'url'=>array('index')),
	array('label'=>'Create TravelCompany', 'url'=>array('create')),
	array('label'=>'Update TravelCompany', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TravelCompany', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TravelCompany', 'url'=>array('admin')),
);
?>

<h1>View TravelCompany #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'added_by',
		'added_on',
		'updated_by',
		'updated_on',
	),
)); ?>
