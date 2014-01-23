<?php

class MainMenu extends CWidget
{
    public function run()
    {
        $pages = Page::model()->active()->findAllByAttributes(array('show_in_menu' => 1), array('order' => '`order` ASC'));

        $this->render('mainMenu', array(
            'pages' => $pages,
        ));
    }

}