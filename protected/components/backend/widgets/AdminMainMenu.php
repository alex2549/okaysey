<?php
class AdminMainMenu extends CWidget
{
    public function run()
    {
        $view_session = Yii::app()->user->getState('view');

        $view = '';

        $view_array = explode('_', $view_session);
        foreach ($view_array as $value) {
            $view .= ucfirst($value);
        }
        $view = lcfirst($view);

        $this->render($view . 'MainMenu', array(

        ));
    }
}