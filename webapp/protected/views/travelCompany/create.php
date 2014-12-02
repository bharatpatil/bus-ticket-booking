<?php
/* @var $this TravelCompanyController */
/* @var $model TravelCompany */

$this->breadcrumbs=array(
	'Travel Companies'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TravelCompany', 'url'=>array('index')),
	array('label'=>'Manage TravelCompany', 'url'=>array('admin')),
);
?>

<h1>Create TravelCompany</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>