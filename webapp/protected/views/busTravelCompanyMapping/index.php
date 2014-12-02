<?php
/* @var $this BusTravelCompanyMappingController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Bus Travel Company Mappings',
);

$this->menu=array(
	array('label'=>'Create BusTravelCompanyMapping', 'url'=>array('create')),
	array('label'=>'Manage BusTravelCompanyMapping', 'url'=>array('admin')),
);
?>

<h1>Bus Travel Company Mappings</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
