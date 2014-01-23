    <?php $this->widget('bootstrap.widgets.TbNavbar',array(
        'fixed' => false,
        'brandUrl' => Yii::app()->getBaseUrl(true),
        'items' => array(
            array(
                'class'       => 'bootstrap.widgets.TbMenu',
                'htmlOptions' => array('id' => 'main-menu'),
                'items'       => array(
                    // array(
                    //     'label' => 'Главная',
                    //     'url'   => array('site/index'),
                    // ),
                    array(
                        'label' => 'Контент',
                        'url'   => '#',
                        'items' => array(
                            array(
                                'label' => 'Страницы',
                                'url'   => array('page/index'),
                            ),
                            // array(
                            //     'label' => 'Публикации',
                            //     'url'   => array('article/index'),
                            // ),
                        )
                    ),
                    array(
                        'label' => 'Блоки',
                        'url'   => '#',
                        'items' => array(
                            array(
                                'label' => 'Блоки',
                                'url'   => array('block/index'),
                            ),
                        )
                    ),
                    // array(
                    //     'label' => 'Пользователи',
                    //     'url'   => array('user/index'),
                    // ),
                    array(
                        'label'   => 'Вход',
                        'url'     => array('/user/login'),
                        'visible' => Yii::app()->user->isGuest,
                    ),
                    array(
                        'label'   => 'Выход (' . Yii::app()->user->name . ')',
                        'url'     => array('/user/logout'),
                        'visible' => !Yii::app()->user->isGuest,
                    ),
                ),
            ),
        ),
    )); ?>