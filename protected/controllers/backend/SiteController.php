<?php

class SiteController extends BackEndController
{
	public function accessRules()
	{
		return array(
            array('allow',
                'actions' => array('index'),
                'roles'   => array(
                        User::ROLE_MANAGER,
                        User::ROLE_ADMIN,
                ),
            ),
			array('allow',
                'actions' => array('error'),
                'users' => array('*'),
            ),
            array('deny',  // deny all users
                'users' => array('*'),
            ),
		);
	}

	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1';

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if ($error = Yii::app()->errorHandler->error) {
			if (Yii::app()->request->isAjaxRequest) {
				echo $error['message'];
			} else {
				$this->render('error', $error);
			}
		}
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}
}