<?php
/* @var $this SeatController */
/* @var $model Seat */

$this->breadcrumbs=array(
	'Seats'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Seat', 'url'=>array('index')),
	array('label'=>'Manage Seat', 'url'=>array('admin')),
);
?>

<h1>Create Seat</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>