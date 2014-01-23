<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property int $role
 */
class User extends CActiveRecord
{
	const ROLE_ADMIN   = 1;
	const ROLE_MANAGER = 2;
	const ROLE_BANNED = 0;

    public $roles = array();

    public function init()
    {
        parent::init();

        $this->roles = array(
			self::ROLE_ADMIN   => 'Админ',
			self::ROLE_MANAGER => 'Менеджер',
			self::ROLE_BANNED         => 'Неактивный',
        );
    }

	// public function behaviors(){
    //     return array(
    //         'DatetimeBehavior' => array(
				// 'class'      => 'DatetimeBehavior',
    //         ),
    //     );
    // }

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, role', 'required'),
			array('role', 'numerical', 'integerOnly' => true),
			array('username', 'isUniqueUsername'),
			array('role', 'length', 'max'=>1),
			array('username', 'length', 'max'=>64),
			array('password', 'length', 'max'=>256),
		);
	}

	public function isUniqueUsername($attribute)
	{
	    if ($this->isNewRecord) {
	    	$record = User::model()->findByAttributes(array($attribute => $this->username));
	    	if ($record !== null) {
	    		$this->addError($attribute, 'Такое имя пользователя уже существует!');
	    	}
	    }
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id'       => 'ID',
			'username' => 'Имя пользователя',
			'password' => 'Пароль',
			'role'     => 'Роль',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


    protected function beforeSave()
    {
        if (parent::beforeSave()) {
            if ($this->isNewRecord) {
                $this->password     = crypt($this->password);
            }
            return true;
        } else {
            return false;
        }
    }

}