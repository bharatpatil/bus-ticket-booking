<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		$tableData = null;
		
		$sql = "select s.id,
					tc.name,
					s.`departure_time`,
					cs.name as source,
					cd.name as destination,
					(case when (b.type = 0) THEN 'Non-AC' ELSE 'AC' END) as type,
					f.fare_amount, r.distance
					from
					`schedule` s
					inner join route r on s.route_id = r.id
					inner join fare f on f.route_id = s.route_id
					inner join city cs on cs.id = r.source_city
					inner join city cd on cd.id = r.destination_city
					inner join bus_travel_company_mapping btcm on s.`bus_travel_company_mapping_id` = btcm.id
					inner join travel_company tc on btcm.travel_company_id = tc.id
					inner join bus b on btcm.bus_id = b.id";
		
		$command = Yii::app()->db->createCommand($sql);

		$city_list = City::model()->findAll(array('select'=>'id,name'));
		$city_list = CHtml::listData($city_list , 'id', 'name');
		$model=new BusSearch();
		
		if(isset($_POST['BusSearch']))
		{
			//var_dump($_POST['BusSearch']);
			$model->attributes=$_POST['BusSearch'];
			$model->busType = $_POST['BusSearch']['busType'];
			// validate user input and redirect to the previous page if valid
			if($model->validate()) {
				$sql = $sql. ' where ';
				$sql = $sql. ' r.source_city=:source_city ';
				$sql = $sql. ' and r.destination_city=:destination_city ';
				if($model->busType !== null &&  $model->busType !== '') {
					$sql = $sql. ' and b.type=:type ';
				}
				$command = Yii::app()->db->createCommand($sql);
				$command->bindValue(':source_city',$model->citySource);
				$command->bindValue(':destination_city',$model->cityDestination);
				if($model->busType !== null &&  $model->busType !== '') {
					$command->bindValue(':type',$model->busType);
				}
				
				
				
			}
		}
		$command = $command->queryAll();
		$tableData = new CArrayDataProvider($command, array(
				'keyField' => 'id'
		));
		
		$this->render('index', array('city_list'=>$city_list, 'model'=>$model, 'tableData'=>$tableData));
		//$this->render('index');
		
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}