<?php
/* @var $this BusTravelCompanyMappingController */
/* @var $model BusTravelCompanyMapping */

$this->breadcrumbs=array(
	'Bus Travel Company Mappings'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List BusTravelCompanyMapping', 'url'=>array('index')),
	array('label'=>'Create BusTravelCompanyMapping', 'url'=>array('create')),
	array('label'=>'View BusTravelCompanyMapping', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage BusTravelCompanyMapping', 'url'=>array('admin')),
);
?>

<h1>Update BusTravelCompanyMapping <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>