<?php
/* @var $this BusController */
/* @var $model Bus */

$this->breadcrumbs=array(
	'Buses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Bus', 'url'=>array('index')),
	array('label'=>'Manage Bus', 'url'=>array('admin')),
);
?>

<h1>Create Bus</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>