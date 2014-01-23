<?php
class BaseController extends CController
{

    // флеш-нотис пользователю
    public function setSuccess($message)
    {
        return Yii::app()->user->setFlash('success', $message);
    }

    // флеш-нотис пользователю
    public function setNotice($message)
    {
        return Yii::app()->user->setFlash('warning', $message);
    }

    // флеш-ошибка пользователю
    public function setError($message)
    {
        return Yii::app()->user->setFlash('danger', $message);
    }

}