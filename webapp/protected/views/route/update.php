<?php
/* @var $this RouteController */
/* @var $model Route */

$this->breadcrumbs=array(
	'Routes'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Route', 'url'=>array('index')),
	array('label'=>'Create Route', 'url'=>array('create')),
	array('label'=>'View Route', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Route', 'url'=>array('admin')),
);
?>

<h1>Update Route <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>