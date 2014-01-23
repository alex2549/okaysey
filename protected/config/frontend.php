<?php
return CMap::mergeArray(

    require_once(dirname(__FILE__) . '/main.php'),
    array(
        // стандартный контроллер
        'defaultController' => 'site',
        'homeUrl'           => array('order/create'),

        'import' => array(
            'application.components.frontend.*.*',
            'application.components.frontend.controllers.*',
            'application.components.frontend.widgets.*',
        ),

        'modules'=>array(
            'page',
        ),

        // компоненты
        'components' => array(

            'clientScript' => array(
                'coreScriptPosition' => CClientScript::POS_END,
                'packages' => array(
                    'jquery' => array(
                        'baseUrl' => 'js/',
                        'js' => array('jquery-1.10.2.min.js'),
                    ),
                    'jquery-ui' => array(
                        'baseUrl' => 'js/ui/',
                        'js'      => 'minified/jquery-ui.min.js',
                        'depends' => array('jquery'),
                    ),
                    'bootstrap3' => array(
                        'baseUrl' => '',
                        'js'      => array(
                            YII_DEBUG ? 'js/bootstrap.js' : 'js/bootstrap.min.js'
                        ),
                        'css'      => array(
                            'css/bootstrap.min.css',
                            'css/bootstrap-theme.min.css',
                        ),
                        'depends' =>array('jquery'),
                    ),
                    'my-js' => array(
                        'baseUrl' => 'js/',
                        'js'      => array(
                            YII_DEBUG ? 'main.js' : 'main.min.js'
                        ),
                        'depends' =>array('jquery'),
                    ),
                    'my-css' => array(
                        'baseUrl' => 'css/',
                        'css'      => array('styles.css'),
                    ),
                ),
            ),

            // uncomment the following to enable URLs in path-format
            'urlManager' => array(
                'class'          =>'DLanguageUrlManager',
                'urlFormat'      => 'path',
                'showScriptName' => false,
                'caseSensitive'  => false,
                'urlSuffix'      => '/',
                'rules'     => array(
                    '<slug:[\w\-]+>/*'             => 'site/index',
                ),
            ),

            'request'=>array(
                'class'=>'DLanguageHttpRequest',
            ),

            // пользователь
            'user' => array(
                // 'loginUrl' => array('/user/login'),
            ),
        ),
    )
);