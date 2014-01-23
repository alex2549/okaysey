<?php

$environment = 'development';

switch (dirname(__FILE__)) {
    case 'D:\server\home\_GitHub\okaysey':
    case 'd:\server\home\_GitHub\okaysey':
    case 'X:\server\home\_GitHub\okaysey':
        $yii = dirname(__FILE__) . '/../../Yii/www/framework/yii.php';
        break;
    case '/Users/paveldanilov/Sites/okaysey':
        $yii = dirname(__FILE__) . '/../Yii/framework/yii.php';
        break;
    // case '/your/test/dir':
    //     $environment = 'test';
    //     $yii = dirname(__FILE__) . '/../../frameworks/Yii/1.1.14/framework/' . $yii_file;
    //     break;
    default:
        $environment = 'production';
        $yii = dirname(__FILE__) . '/../../frameworks/Yii/1.1.14/framework/' . $yii_file;
        break;
}

if (($environment == 'development') || ($environment == 'test')) {
    error_reporting(E_ALL);
    defined('YII_DEBUG') or define('YII_DEBUG', true);
    defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL', 3);
} else {
    // error_reporting(E_ALL);
    // defined('YII_DEBUG') or define('YII_DEBUG', true);
    // defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL', 3);
    define('YII_DEBUG', false);
    error_reporting(0);
}
?>