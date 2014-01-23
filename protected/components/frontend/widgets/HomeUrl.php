<?php

class HomeUrl extends CWidget
{
    public function run()
    {
        echo Yii::app()->getBaseUrl(true);
    }
}

?>