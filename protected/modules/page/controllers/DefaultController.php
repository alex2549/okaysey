<?php

class DefaultController extends FrontEndController
{
    public function actionIndex($slug)
    {
        $this->page = $this->loadModelByAttributes(array('slug' => $slug));
        $this->_getPageMeta($this->page);
        $this->layout = (!empty($this->page->template)) ? '//templates/' . $this->page->template : '//templates/page';

        $this->render('index',
            array(
                'page' => $this->page,
            )
        );
    }


}