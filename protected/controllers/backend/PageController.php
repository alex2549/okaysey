<?php

class PageController extends BackEndController
{
	public function accessRules()
	{
		return array(
            array('allow',
                'actions' => array('index', 'create', 'update', 'turnOn', 'turnOff', 'order', 'orderAjax', 'delete'),
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
		$model = new Page;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['Page'])) {
			$model->attributes = $_POST['Page'];
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

		if (isset($_POST['Page'])) {
			$model->attributes = $_POST['Page'];
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

		if ($page->undeletable == 1) {
			$this->setError('Эту страницу нельзя удалять!');
			$this->redirect(array('index'));
		}

		$page->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if (!isset($_GET['ajax'])) {
			$this->setNotice('Страница удалена!');
			$this->redirect(array('index'));
		}

	}

	/**
	 * Manages all models.
	 */
	public function actionIndex()
	{
		$model = new Page('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['Page'])) {
			$model->attributes = $_GET['Page'];
		}

		$this->render('index', array(
			'model' => $model,
		));
	}

	public function actionOrder()
	{
		$this->render('order');
	}

	public function actionOrderAjax()
	{
		// Save order from ajax call
		if (isset($_POST['sortable'])) {
			Page::model()->saveOrder($_POST['sortable']);
		}

		$pages = Page::model()->getNested();

		// Load view
		$this->renderPartial('order_ajax', array('pages' => $pages));
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
	 * @return Page the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model = Page::model()->multilang()->findByPk($id);
		if ($model === null) {
			throw new CHttpException(404,'The requested page does not exist.');
		}
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Page $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'page-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
