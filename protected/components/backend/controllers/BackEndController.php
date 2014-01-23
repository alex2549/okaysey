<?php
class BackEndController extends BaseController
{

    // лейаут
    public $layout='//layouts/column2';

    // меню
    public $menu = array();

    // крошки
    public $breadcrumbs = array();

    public $loginPage = false;

    /*
        Фильтры
    */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
            // 'postOnly + delete', // we only allow deletion via POST request
        );
    }

}