<?php
class FrontEndController extends BaseController
{
    private $_modified  = array();
    public $blocks      = array();
    public $breadcrumbs = array();
    public $pageIndex   = 1;
    public $pageDescription;
    public $pageKeywords;

    public $page;
    public $block;

    public function init()
    {
        parent::init();

        if (CHelper::segment(1) == 'admin') {
            $this->redirect('http://' . $_SERVER['SERVER_NAME'] . '/admin.php?r=site/index', true, 301);
        }

        $this->getBlocks();

        $this->_redirectSeo();
        $this->_get_last_modified_header();
    }

    public function behaviors()
    {
        return array(
            'InlineWidgetsBehavior' => array(
                'class'      => 'DInlineWidgetsBehavior',
                'location'   => 'application.components.frontend.widgets',
                'startBlock' => '{{w:',
                'endBlock'   => '}}',
                'widgets'    => array(
                    'LanguageSwitcherWidget',
                    'MainMenu',
                    'FooterMenu',
                    'CurrentYear',
                    'HomeUrl',
                ),
            ),
        );
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
        $model = Page::model()->localized(Yii::app()->language)->findByPk($id);
        if ($model === null) {
            throw new CHttpException(404, 'Запрашиваемая страница не найдена.');
        }

        return $model;
    }

    public function loadModelByAttributes($array)
    {
        $model = Page::model()->localized(Yii::app()->language)->findByAttributes($array);
        if ($model === null) {
            throw new CHttpException(404, 'Запрашиваемая страница не найдена.');
        }

        return $model;
    }

    public function getBlocks()
    {
        $blocks = Block::model()->active()->findAll();
        foreach ($blocks as $block) {
            $this->block[$block->slug] = $block->body;
        }
    }

    private function _redirectSeo()
    {
        $server_name = $_SERVER['SERVER_NAME'];
        $request_uri = $_SERVER['REQUEST_URI'];

        if (strstr($request_uri, '/index.php/')) {
            $request_uri = str_replace('/index.php/', '/', $request_uri);
            $this->redirect('http://' . $server_name . $request_uri, true, 301);
        }
        if (strstr($request_uri, '/index.php')) {
            $request_uri = str_replace('/index.php', '/', $request_uri);
            $this->redirect('http://' . $server_name . $request_uri, true, 301);
        }

        if ((isset($request_uri[1])) && ($request_uri[1] == '?')) {
            $this->redirect(Yii::app()->getBaseUrl(true), true, 301);
        }

        $path = 'http://' . $server_name . $request_uri;
        if (substr($path, -1) != '/') {
            $this->redirect($path . '/', true, 301);
        }
    }

    protected function _get_last_modified_header($timestamp = false) {
        $delay = mt_rand(2000,10000); // случайная задержка
        // $this->output->set_header('Last-Modified: ' . gmdate('D, d M Y H:i:s\G\M\T', time() - $delay) . ' GMT');
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s\G\M\T', time() - $delay) . ' GMT');
        return true;

        $if_modified_since = false;
        if (isset($_ENV['HTTP_IF_MODIFIED_SINCE'])) {
            $if_modified_since = strtotime(substr($_ENV['HTTP_IF_MODIFIED_SINCE'], 5));
        }
        if (isset($_SERVER['HTTP_IF_MODIFIED_SINCE'])) {
            $if_modified_since = strtotime(substr($_SERVER['HTTP_IF_MODIFIED_SINCE'], 5));
        }
        if ($if_modified_since && $if_modified_since >= $timestamp) {
            header($_SERVER['SERVER_PROTOCOL'] . ' 304 Not Modified');
            exit;
        }
        // $this->output->set_header('Last-Modified: ' . gmdate('D, d M Y H:i:s\G\M\T', $timestamp) . ' GMT');
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s\G\M\T', $timestamp) . ' GMT');


        return true;
    }

    protected function _getPageMeta($page)
    {
        $this->pageIndex       = $page->meta_index;
        (empty($page->meta_title)) ? $this->setPageTitle($page->title . ' | ' . $this->pageTitle) : $this->setPageTitle($page->meta_title);
        (empty($page->meta_keywords)) || $this->pageKeywords = $page->meta_keywords;
        (empty($page->meta_description)) || $this->pageDescription = $page->meta_description;
    }

}
