<?php

/**
 * This is the model class for table "pages".
 *
 * The followings are the available columns in table 'pages':
 * @property integer $id
 * @property string $title
 * @property string $slug
 * @property string $begin_body
 * @property string $end_body
 * @property integer $order
 * @property integer $parent_id
 * @property integer $show_in_menu
 * @property string $menu_class
 * @property integer $show_title
 * @property integer $module
 * @property integer $undeletable
 * @property string $template
 * @property integer $meta_index
 * @property string $meta_title
 * @property string $meta_description
 * @property string $meta_keywords
 * @property integer $active
 *
 * The followings are the available model relations:
 * @property PagesContent[] $pagesContents
 * @property PagesLang[] $pagesLangs
 */
class Page extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Page the static model class
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
		return 'pages';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title', 'required'),
			array('order, parent_id, show_in_menu, module, undeletable, active, show_title, meta_index', 'numerical', 'integerOnly'=>true),
			array('title, slug, meta_title', 'length', 'max'=>200),
			array('template, menu_class', 'length', 'max'=>50),
			array('meta_description, meta_keywords', 'length', 'max'=>300),
			array('begin_body, end_body', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, slug, begin_body, end_body, order, parent_id, show_in_menu, module, undeletable, template, meta_title, meta_description, meta_keywords', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'pagesLangs' => array(self::HAS_MANY, 'PagesLang', 'page_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id'               => 'ID',
			'title'            => 'Название страницы',
			'slug'             => 'Алиас',
			'begin_body'       => 'Текст перед дополнительным модулем',
			'end_body'         => 'Текст после дополнительного модуля',
			'order'            => 'Порядок',
			'parent_id'        => 'Страница-родитель',
			'show_in_menu'     => 'Показывать в меню',
			'menu_class'       => 'CSS-класс для пунка меню',
			'show_title'       => 'Показывать заголовок на странице?',
			'module'           => 'Module',
			'undeletable'      => 'Undeletable',
			'template'         => 'Шаблон',
			'meta_index'       => 'Meta Index',
			'meta_title'       => 'Meta Title',
			'meta_description' => 'Meta Description',
			'meta_keywords'    => 'Meta Keywords',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('slug',$this->slug,true);
		$criteria->compare('begin_body',$this->begin_body,true);
		$criteria->compare('end_body',$this->end_body,true);
		$criteria->compare('order',$this->order);
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('show_in_menu',$this->show_in_menu);
		$criteria->compare('module',$this->module);
		$criteria->compare('undeletable',$this->undeletable);
		$criteria->compare('template',$this->template,true);
		$criteria->compare('meta_title',$this->meta_title,true);
		$criteria->compare('meta_description',$this->meta_description,true);
		$criteria->compare('meta_keywords',$this->meta_keywords,true);

		return new CActiveDataProvider($this, array(
            'criteria' => $this->ml->modifySearchCriteria($criteria),

			'pagination' => array('pageSize' => 25),

			'sort'       => array(
                'defaultOrder' => 'id DESC',
            )
        ));
	}

	public function behaviors()
    {
        return array(
            'ml' => array(
                'class' => 'ext.multilangual.MultilingualBehavior',
                'localizedAttributes' => array(
                    'title',
                    'begin_body',
                    'end_body',
                    'meta_title',
                    'meta_description',
                    'meta_keywords',
                ),
				'langClassName'    => 'PageLang',
				'langTableName'    => '{{pages_lang}}',
				'languages'        => Yii::app()->params['translatedLanguages'],
				'defaultLanguage'  => Yii::app()->params['defaultLanguage'],
				'langForeignKey'   => 'owner_id',
				'dynamicLangClass' => true,
            ),
        );
    }


	public function scopes()
	{
		return array(
            'active' => array(
                'condition' => 'active = 1'
            ),
        );
	}

    public function defaultScope()
    {
        return $this->ml->localizedCriteria();
    }

	protected function beforeValidate()
	{
	    if (parent::beforeValidate()) {
	        if ($this->isNewRecord) {
	        	if (empty($this->slug)) {
	        		$this->slug = CHelper::transliteration($this->title);
	        	}
	        }
	    }

	    return true;
	}

    public function isUniqueSlug($attribute)
	{
	    if ($this->isNewRecord) {
	    	$record = Page::model()->findByAttributes(array($attribute => $this->slug));
	    	if ($record !== null) {
	    		$this->addError($attribute, 'Такой алиас уже существует!');
	    	}
	    } else {
	    	$records = Page::model()->findAllByAttributes(array($attribute => $this->slug));
	    	if (count($records) > 1) {
	    		$this->addError($attribute, 'Такой алиас уже существует!');
	    	}
	    }
	}

	public function saveOrder($pages)
	{
		if (count($pages)) {
			foreach ($pages as $order => $page) {
				if ($page['item_id'] != '') {
					$result = Page::model()->updateByPk($page['item_id'], array('parent_id' => (int) $page['parent_id'], 'order' => $order));
				}
			}
		}
	}

	public function getNested()
	{
		return Page::model()->findAllByAttributes(array('show_in_menu' => 1), array('order' => 'parent_id ASC, `order` ASC'));
	}

}
