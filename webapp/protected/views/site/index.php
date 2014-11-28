<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1><br><br>

<!-- <p>Congratulations! You have successfully created your Yii application.</p> -->

<!-- <p>You may change the content of this page by modifying the following two files:</p> -->
<!-- <ul> 
	<li>View file: <code><?php //echo __FILE__; ?></code></li>
	<li>Layout file: <code><?php //echo $this->getLayoutFile('main'); ?></code></li>-->
<!-- </ul> -->

<!-- <p>For more details on how to further develop this application, please read -->
<!-- the <a href="http://www.yiiframework.com/doc/">documentation</a>. -->
<!-- Feel free to ask in the <a href="http://www.yiiframework.com/forum/">forum</a>, -->
<!-- should you have any questions.</p> -->

<div class="mainBox">
	<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'bus-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>
	
		<h3>Book Bus Tickets Online with Zero Booking Fees</h2>
		<div class="searchRow">
		<?php echo $form->errorSummary($model,NULL, NULL, array('class'=>'alert alert-error')); ?>
				<div class="boxLeft">
					<?php echo $form->labelEx($model,'citySource', array(
							'class'=>'inputLabel'
					)); ?>
					<br>
					<?php echo $form->dropDownList($model, 'citySource', $city_list, array(
							'prompt'=>'Select City',
							'id'=>'txtSource',
							'class'=>'XXinput'
					));  ?>
				</div>
				<span class="switchButton" id="switchButton"><img alt="" src="images/switch.png"></span>
				<div class="boxLeft">
					
					<?php echo $form->labelEx($model,'cityDestination', array(
							'class'=>'inputLabel'
					)); ?>
					<br>
					<?php
					
					
					 
					 echo $form->dropDownList($model, 'cityDestination', $city_list, array(
							'prompt'=>'Select City',
							'id'=>'txtSource',
							'class'=>'XXinput'
					));  ?>
					           
				</div>
				<span class="switchButton" id="switchButton">&nbsp;</span> 
				<div class="boxLeft">
					
					<?php 
					echo $form->labelEx($model,'busType', array(
							'class'=>'inputLabel'
					)); ?>
					<br>
					<?php echo $form->dropDownList($model, 'busType', array(0=>'Non-AC', 1=>'AC'), array(
							'prompt'=>'Select Bus Type',
							'id'=>'txtBusType',
							'class'=>'XXinput'
					));  ?>
				</div>
				<div style='clear:both;'></div>
			</div>
			<div class="searchRow">
				<div class="boxLeft">
					
					<?php echo $form->labelEx($model,'txtOnwardCalendar', array(
							'class'=>'inputLabel'
					)); ?>
					<br>
					<input name="BusSearch[txtOnwardCalendar]" id="txtOnwardCalendar" class="XXinput" placeholder="yyyy-mm-dd" type="text" title="yyyy-mm-dd" tabindex="3" />
					
				</div>
				<span class="switchButton" id="switchButton">&nbsp;</span>         
				<div class="boxLeft">
					
					<?php echo $form->labelEx($model,'txtReturnCalendar', array(
							'class'=>'inputLabel'
					)); ?>
					<br>
					<input name="BusSearch[txtReturnCalendar]" id="txtReturnCalendar" class="XXinput" placeholder="yyyy-mm-dd" type="text" title="yyyy-mm-dd" tabindex="4" />
				</div>  
				<div style='clear:both;'></div>  
			</div> 
			
			</div>
			<button class="Xbutton" id="searchBtn" tabindex="6">Search Buses</button> 
			<div style='clear:both;'></div>
	<?php $this->endWidget(); ?>
	<?php 
		if($tableData != null) {
			$this->widget('zii.widgets.grid.CGridView', array(
				'id' => 'a-grid-id',
				'dataProvider' => $tableData
			));
		}

?>
</div>


