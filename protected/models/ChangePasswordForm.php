<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class ChangePasswordForm extends CFormModel
{
    public $id;
    public $old_password;
    public $new_password;
    public $confirm_password;

    public function rules()
    {
        return array(
            array('id', 'numerical', 'integerOnly'=>true),
            array('old_password, new_password, confirm_password', 'required'),
            array('old_password', 'isCorrect'),
            array('confirm_password', 'isConfirm'),
        );
    }

    public function isCorrect($attribute)
    {
        $user = User::model()->findByPK($this->id);
        if ($user->password !== crypt($this->old_password, $user->password)) {
            $this->addError($attribute, 'Старый пароль введен неправильно');
        }
    }

    public function isConfirm($attribute)
    {
        if ($this->new_password !== $this->confirm_password) {
            $this->addError($attribute, 'Пароль и его подтверждение не совпадают');
        }
    }

    public function attributeLabels()
    {
        return array(
            'old_password'     => 'Старый пароль',
            'new_password'     => 'Новый пароль',
            'confirm_password' => 'Повторите новый пароль',
        );
    }

    public function change($id)
    {
        if (User::model()->updateByPK($id, array('password' => crypt($this->new_password))) ) {
            return true;
        }
        return false;
    }

}
