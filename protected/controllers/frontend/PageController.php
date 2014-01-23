<?php

class PageController extends FrontEndController
{
    public $layout = '//templates/default';

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($page_slug)
    {
        $page = $this->loadModel($page_slug);
        $this->_getPageMeta($page);

        $parent = Page::model()->active()->findByPk($page->parent_id);

        $this->render('view', array(
            'parent' => $parent,
            'model' => $page,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Page the loaded model
     * @throws CHttpException
     */
    public function loadModel($slug)
    {
        $model = Page::model()->active()->findByAttributes(array('slug' => $slug));
        if ($model === null) {
            throw new CHttpException(404, 'Запрашиваемая страница не найдена.');
        }
        return $model;
    }

    private function _getParentsArray($page)
    {
        if (!empty($page->parent_id)) {
            $parent = Page::model()->active()->findByPk($page->parent_id);

            if (isset($parent->parent_id)) {
                $this->_getParentsArray($page);
            }
        }

        return array();
    }
}
