<?php

class SiteController extends FrontEndController
{
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex($slug = '')
	{
        $this->page = $this->loadModelByAttributes(array('slug' => $slug));
        if (!empty($this->page->module)) {
            $this->forward('/' . $this->page->module . '/default/index/slug/' . $slug);
        } else {
            $this->forward('/page/default/index/slug/' . $slug);
        }
	}

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
}