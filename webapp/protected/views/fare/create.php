<?php
/* @var $this FareController */
/* @var $model Fare */

$this->breadcrumbs=array(
	'Fares'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Fare', 'url'=>array('index')),
	array('label'=>'Manage Fare', 'url'=>array('admin')),
);
?>

<h1>Create Fare</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>