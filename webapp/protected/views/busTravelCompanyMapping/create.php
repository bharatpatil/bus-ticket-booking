<?php
/* @var $this BusTravelCompanyMappingController */
/* @var $model BusTravelCompanyMapping */

$this->breadcrumbs=array(
	'Bus Travel Company Mappings'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List BusTravelCompanyMapping', 'url'=>array('index')),
	array('label'=>'Manage BusTravelCompanyMapping', 'url'=>array('admin')),
);
?>

<h1>Create BusTravelCompanyMapping</h1>

<?php $this->renderPartial('_form', array('model'=>$model, 'travelCompany'=>$travelCompany)); ?>