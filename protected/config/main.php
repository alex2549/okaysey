<?php

Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');

require_once(dirname(__FILE__) . '/params.php');

return array(
	'basePath'       => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name'           => 'Okaysey',
    'sourceLanguage' =>'ru',
    'language'       => 'ru',
    'timeZone'       => 'Europe/Moscow',

    // preloading 'log' component
    'preload' => array('log'),



	// autoloading model and component classes
    'import'=>array(
        'application.components.*',

		'application.components.common.*.*',
        'application.components.common.controllers.*',
        'application.components.common.models.*',
        'application.components.common.widgets.*',

        'application.models.*',
        'application.helpers.*',
        'application.behaviors.*',
        'application.vendors.*',
    ),

	// используемые приложением поведения
	'behaviors' => array(
	  	'runEnd' => array(
	  		'class'  => 'application.behaviors.WebApplicationEndBehavior',
	  	),
	),

	// application components
	'components'=>array(
		'errorHandler' => array(
			'errorAction' => 'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
			),
		),
        'mailer' => array(
            'class'       => 'application.extensions.mailer.EMailer',
            'pathViews'   => 'application.views.email',
            'pathLayouts' => 'application.views.email.layouts'
        ),
	),

	'params' => $params,
);