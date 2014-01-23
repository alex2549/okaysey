<?php

class UserController extends BackEndController
{
	public function accessRules()
	{
		return array(
            array('allow',
                'actions' => array('index', 'create', 'update', 'login', 'logout', 'changePassword'),
                'roles'   => array(
                        User::ROLE_MANAGER,
                ),
            ),
			array('allow',
                'actions' => array('index', 'create', 'update', 'login', 'logout', 'delete', 'changePassword'),
                'roles'   => array(
                        User::ROLE_ADMIN,
                ),
            ),
			array('allow',
                'actions' => array('login', 'logout'),
                'users'   => array('*'),
            ),
            array('deny',  // deny all users
                'users' => array('*'),
            ),
		);
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model = new User;

		$this->performAjaxValidation($model);

		if (isset($_POST['User'])) {
			$model->attributes = $_POST['User'];
			if ($model->save()) {
				$this->setSuccess('Пользователь создан!');
				$this->redirect(array('index'));
			} else {
				$this->setError('Пользователь не создан!');
			}
		}

		$this->render('create', array(
			'model' => $model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model = $this->loadModel($id);

		$this->performAjaxValidation($model);

		if (isset($_POST['User'])) {
			$model->attributes = $_POST['User'];
			if ($model->save()) {
				$this->setSuccess('Изменения сохранены!');
				$this->redirect(array('index'));
			} else {
				$this->setError('Изменения не сохранены!');
			}
		}

		$this->render('update', array(
			'model' => $model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if (!isset($_GET['ajax'])) {
			$this->setNotice('Пользователь удален!');
			$this->redirect(array('index'));
		}

	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model = new User('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['User'])) {
			$model->attributes=$_GET['User'];
		}

		$this->render('index', array(
			'model' => $model,
		));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model = new LoginForm;

		// if it is ajax validation request
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if (isset($_POST['LoginForm'])) {
			$model->attributes = $_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if ($model->validate() && $model->login()) {
				$this->redirect(Yii::app()->user->returnUrl);
			}
		}

		$this->loginPage = true;
		$this->layout = '//layouts/column1';

		// display the login form
		$this->render('login', array('model' => $model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return User the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model = User::model()->findByPk($id);
		if ($model === null) {
			throw new CHttpException(404, 'Запрашиваемый пользователь не найден.');
		}
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param User $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'user-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionChangePassword($id)
	{
		$model = new ChangePasswordForm;
		$user  = $this->loadModel($id);

		// // if it is ajax validation request
		// if (isset($_POST['ajax']) && $_POST['ajax'] === 'changepassword-form') {
		// 	echo CActiveForm::validate($model);
		// 	Yii::app()->end();
		// }

		// collect user input data
		if (isset($_POST['ChangePasswordForm'])) {
			$model->attributes = $_POST['ChangePasswordForm'];
			// validate user input and redirect to the previous page if valid
			if ($model->validate() && $model->change($user->id)) {
				$this->setSuccess('Пароль изменен!');
				$this->redirect(array('update', 'id' => $user->id));
			} else {
				$this->setError('Пароль не изменен!');
			}
		}

		$this->render('changepassword', array(
			'model' => $model,
			'user'  => $user,
		));
	}

}
