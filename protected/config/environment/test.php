<?php

return CMap::mergeArray(
    // наследуемся от main.php
    require(dirname(__FILE__) . '/../' . $config_file),
    array(
        'components'=>array(
            // переопределяем компонент db
            'db'=>array(
                'connectionString'=>'sqlite:protected/data/citrusfit.db',
                'username'         => 'root',
                'password'         => 'admin',
                'charset'          => 'utf8',
                'enableProfiling'    => true,
                'enableParamLogging' => true,
            ),
            'log'=>array(
                'class'=>'CLogRouter',
                'routes'=>array(
                    array(
                        'class'      => 'CWebLogRoute',
                        'categories' => 'application',
                        'levels'     =>'error, warning, trace, profile, info',
                    ),
                    // array(
                    //     // направляем результаты профайлинга в ProfileLogRoute (отображается
                    //     // внизу страницы)
                    //     'class'   => 'CProfileLogRoute',
                    //     'levels'  => 'profile',
                    //     'enabled' => true,
                    // ),
                ),
            ),
        ),
        'params' => array(
            'smtp' => array(
                'host'     => '##############',
                'debug'    => '##############',
                'auth'     => '##############',
                'port'     => '##############',
                'username' => '##############',
                'password' => '##############',
                'addreply' => '##############',
                'replyto'  => '##############',
                'fromname' => '##############',
                'from'     => '##############',
                'charset'  => '##############',
            ),
        ),

    )
);

?>