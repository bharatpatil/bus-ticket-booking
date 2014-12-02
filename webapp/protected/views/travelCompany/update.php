<?php
/* @var $this TravelCompanyController */
/* @var $model TravelCompany */

$this->breadcrumbs=array(
	'Travel Companies'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TravelCompany', 'url'=>array('index')),
	array('label'=>'Create TravelCompany', 'url'=>array('create')),
	array('label'=>'View TravelCompany', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TravelCompany', 'url'=>array('admin')),
);
?>

<h1>Update TravelCompany <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>