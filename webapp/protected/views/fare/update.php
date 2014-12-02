<?php
/* @var $this FareController */
/* @var $model Fare */

$this->breadcrumbs=array(
	'Fares'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Fare', 'url'=>array('index')),
	array('label'=>'Create Fare', 'url'=>array('create')),
	array('label'=>'View Fare', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Fare', 'url'=>array('admin')),
);
?>

<h1>Update Fare <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>