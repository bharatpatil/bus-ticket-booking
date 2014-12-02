<?php
/* @var $this FareController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Fares',
);

$this->menu=array(
	array('label'=>'Create Fare', 'url'=>array('create')),
	array('label'=>'Manage Fare', 'url'=>array('admin')),
);
?>

<h1>Fares</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
