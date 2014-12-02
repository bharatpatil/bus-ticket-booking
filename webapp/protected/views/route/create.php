<?php
/* @var $this RouteController */
/* @var $model Route */

$this->breadcrumbs=array(
	'Routes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Route', 'url'=>array('index')),
	array('label'=>'Manage Route', 'url'=>array('admin')),
);
?>

<h1>Create Route</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'city_list'=>$city_list)); ?>