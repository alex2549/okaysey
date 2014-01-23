<?php

return CMap::mergeArray(
    // наследуемся от main.php
    require(dirname(__FILE__) . '/../' . $config_file),
    array(
        'components'=>array(
            // переопределяем компонент db
            'db' => array(
                'connectionString' => 'mysql:host=localhost;dbname=okaysey',
                'emulatePrepare'   => true,
                'username'         => 'root',
                'password'         => 'admin',
                'charset'          => 'utf8',
                'enableProfiling'    => true,
                'enableParamLogging' => true,
                'tablePrefix' => '',
            ),
            'log'=>array(
                'class'=>'CLogRouter',
                'routes'=>array(
                    array(
                        'class'      => 'CWebLogRoute',
                        'categories' => 'application',
                        'levels'     =>'error, warning, trace, profile, info',
                    ),
                    array(
                        // направляем результаты профайлинга в ProfileLogRoute (отображается
                        // внизу страницы)
                        'class'   => 'CProfileLogRoute',
                        'levels'  => 'profile',
                        'enabled' => true,
                    ),
                ),
            ),
        ),

        'modules' => array(
            // uncomment the following to enable the Gii tool
            'gii' => array(
                'class'          => 'system.gii.GiiModule',
                'password'       => 'admin',
                // If removed, Gii defaults to localhost only. Edit carefully to taste.
                'ipFilters'      => array('127.0.0.1','::1'),
                'generatorPaths' => array(
                    'bootstrap.gii',
                ),
            ),
        ),

        'params' => array(
            'smtp' => array(
                'host'     => 'CHANGEME',
                'debug'    => 'CHANGEME',
                'auth'     => 'CHANGEME',
                'port'     => 'CHANGEME',
                'username' => 'CHANGEME',
                'password' => 'CHANGEME',
                'addreply' => 'CHANGEME',
                'replyto'  => 'CHANGEME',
                'fromname' => 'CHANGEME',
                'from'     => 'CHANGEME',
                'charset'  => 'CHANGEME',
            ),

            'robokassa' => array(
                'login' => 'CHANGEME',
                'pass1' => 'CHANGEME',
                'pass2' => 'CHANGEME',
            ),
        ),

    )
);

?>