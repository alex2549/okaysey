<?php

class BlockController extends BackEndController
{
	public function accessRules()
	{
		return array(
            array('allow',
                'actions' => array('index', 'create', 'update', 'turnOn', 'turnOff', 'delete'),
                'roles'   => array(
                        User::ROLE_MANAGER,
                ),
            ),
			array('allow',
                'actions' => array('index', 'create', 'update', 'turnOn', 'turnOff', 'delete', 'order', 'orderAjax'),
                'roles'   => array(
                        User::ROLE_ADMIN,
                ),
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
		$model = new Block;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['Block'])) {
			$model->attributes = $_POST['Block'];
			if ($model->save()) {
				$this->redirect(array('index'));
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

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['Block'])) {
			$model->attributes = $_POST['Block'];
			if ($model->save()) {
				$this->redirect(array('index'));
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
		$page = $this->loadModel($id);
		$page->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if (!isset($_GET['ajax'])) {
			$this->setNotice('Блок удален!');
			$this->redirect(array('index'));
		}

	}

	/**
	 * Manages all models.
	 */
	public function actionIndex()
	{
		$model = new Block('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['Block'])) {
			$model->attributes = $_GET['Block'];
		}

		$this->render('index', array(
			'model' => $model,
		));
	}

	public function actionTurnOn($id)
	{
		$this->loadModel($id)->updateByPk($id, array('active' => 1));
		if (!isset($_GET['ajax'])) {
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
		}
	}

	public function actionTurnOff($id)
	{
		$this->loadModel($id)->updateByPk($id, array('active' => 0));
		if (!isset($_GET['ajax'])) {
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
		}
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Block the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model = Block::model()->multilang()->findByPk($id);
		if ($model === null) {
			throw new CHttpException(404,'The requested block does not exist.');
		}
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Block $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'block-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
