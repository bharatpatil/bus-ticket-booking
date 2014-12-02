<?php
/* @var $this RouteController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Routes',
);

$this->menu=array(
	array('label'=>'Create Route', 'url'=>array('create')),
	array('label'=>'Manage Route', 'url'=>array('admin')),
);
?>

<h1>Routes</h1>
var_dump($city_list);
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
