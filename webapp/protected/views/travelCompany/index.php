<?php
/* @var $this TravelCompanyController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Travel Companies',
);

$this->menu=array(
	array('label'=>'Create TravelCompany', 'url'=>array('create')),
	array('label'=>'Manage TravelCompany', 'url'=>array('admin')),
);
?>

<h1>Travel Companies</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
