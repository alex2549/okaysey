<?php

return CMap::mergeArray(
    require(dirname(__FILE__) . '/../main.php'),
    array(
        'components'=>array(
            'db' => array(
                'connectionString' => 'CHANGEME',
                'emulatePrepare'   => 'CHANGEME',
                'username'         => 'CHANGEME',
                'password'         => 'CHANGEME',
                'charset'          => 'CHANGEME',
                'tablePrefix'      => 'CHANGEME',
            ),
        ),
        'modules' => array(
            // uncomment the following to enable the Gii tool
            'gii' => array(),
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