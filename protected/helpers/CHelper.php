<?php

class CHelper
{

    public static function convertFio($fio)
    {
        $fio_explode = explode(' ', $fio);

        if(!isset($fio_explode[0]) || !isset($fio_explode[1]) || !isset($fio_explode[2]))
            return false;
        // Присваиваем результату фамилию
        $result = $fio_explode[0] . ' ';
        // добавляем первый символ имени и точку
        $result .= mb_substr($fio_explode[1], 0, 1, 'UTF-8') . '.';
        // добавляем первый символ отчества и точку
        $result .= mb_substr($fio_explode[2], 0, 1, 'UTF-8') . '.';
        // Позвращаем результат
        return $result;
    }

    public static function humanDateToSqlDate($date)
    {
        return !empty($date) ? Yii::app()->dateFormatter->format('yyyy-MM-dd', $date) : false;
    }

    public static function sqlDateToHumanDate($date)
    {
        return !empty($date) ? Yii::app()->dateFormatter->format('dd.MM.yyyy', $date) : false;
    }

    public static function sqlDateToRussianDate($date)
    {
        return !empty($date) ? Yii::app()->dateFormatter->format("dd MMMM yyyy", $date) : false;
    }

    public static function trimSeconds($time)
    {
        return !empty($time) ? Yii::app()->dateFormatter->format("HH:mm", $time) : false;
    }

    public static function buildDatepicker($class, $model, $fieldname, $fieldvalue = false, $on_select = false)
    {
        $max_year = intval(date('Y')) + 10;

        if ($fieldvalue === false) {
            $value = !empty($model->$fieldname) ? Yii::app()->dateFormatter->format('dd.MM.yyyy', $model->$fieldname) : '';
        } else {
            $value = $fieldvalue;
        }

        $class->widget('zii.widgets.jui.CJuiDatePicker', array(
            'name'      => $fieldname,
            'language'  => 'ru',
            'model'     => $model,
            'attribute' => $fieldname,
            'options'=>array(
                'showAnim'=>'fade',
                'dateFormat'=>'dd.mm.yy',
                // 'buttonImage'=> Yii::app()->baseUrl . '/images/calendar_icon.gif',
                'changeYear' => true,
                'changeMonth' => true,
                'yearRange' => '1900:' . $max_year,
                'onSelect'  => $on_select,
                // 'showButtonPanel' => true,
            ),
            'htmlOptions' => array(
                'value' => $value,
                'class' => 'input-small',
            ),
        ));
    }

    public static function getDropdownArray($model_name, $key = 'id', $value = 'title', $empty = false)
    {
        $elements = $model_name::model()->findAll();

        $dump = array();

        if (!empty($empty)) {
            $dump[0] = $empty;
        }

        foreach ($elements as $element) {
            $dump[$element->$key] = $element->$value;
        }

        return $dump;
    }

    public static function getList($class, $fields = array('id', 'title'), $find_all_attributes = array('order' => 'title'))
    {
        $models = $class::model()->findAll(
                                $find_all_attributes
                            );
        $list = CHtml::listData(
            $models,
            $fields[0], $fields[1]
        );
        return $list;
    }

    public static function getHallList($class, $fields = array('id', 'title'), $find_all_attributes = array('order' => 'club_id, title'))
    {
        $models = $class::model()->findAll(
                                $find_all_attributes
                            );

        foreach ($models as $hall) {
            $list[$hall->id] = $hall->club->title . ': ' . $hall->title;
        }

        return $list;
    }

    public static function timeToInt($time)
    {
        return intval(str_replace(':', '', $time));
    }

    public static function segment($number)
    {
        $url = Yii::app()->request->url;

        $url_array = explode('/', $url);

        foreach ($url_array as $key => $value) {
            if ($value === '') {
                unset($url_array[$key]);
            }
        }
        $url_array = array_values($url_array);

        return isset($url_array[$number - 1]) ? $url_array[$number - 1] : false;
    }

    public static function buildUrl($segments, $end_slash = true) {
        $url_array = explode('/', $segments);
        foreach ($url_array as $key => $value) {
            if ($value === '') {
                unset($url_array[$key]);
            }
        }
        $url_array = array_values($url_array);

        $new_url = !empty($url_array) ? implode('/', $url_array) : '';

        $new_url .= ((!empty($url_array)) && ($end_slash == true)) ? '/' : '';

        return Yii::app()->getBaseUrl(true) . '/' . $new_url;
    }

    public static function prepareMobilePhone($mobile_phone)
    {
        $phone = trim($mobile_phone);

        $phone = str_replace(' ', '', $phone);
        // $phone = str_replace('+', '', $phone);
        // $phone = str_replace('-', '', $phone);
        // $phone = str_replace(')', '', $phone);
        // $phone = str_replace('(', '', $phone);

        $phone = preg_replace("/\D/", '', $phone);

        switch (strlen($phone)) {
            case 11:
                $phone[0] = '7';
                break;
            case 10:
                $phone = '7' . $phone;
                break;
            default:
                $phone = $mobile_phone;
                break;
        }

        return $phone;
    }


    public static function transliteration($russian_text) {

        $abc = array(
           "А"=>"A","Б"=>"B","В"=>"V","Г"=>"G","Д"=>"D",
           "Е"=>"E","Ё"=>"JO","Ж"=>"ZH",
           "З"=>"Z","И"=>"I","Й"=>"JJ","К"=>"K","Л"=>"L",
           "М"=>"M","Н"=>"N","О"=>"O","П"=>"P","Р"=>"R",
           "С"=>"S","Т"=>"T","У"=>"U","Ф"=>"F","Х"=>"KH",
           "Ц"=>"C","Ч"=>"CH","Ш"=>"SH","Щ"=>"SHH","Ъ"=>"'",
           "Ы"=>"Y","Ь"=>"","Э"=>"EH","Ю"=>"YU","Я"=>"YA",
           "а"=>"a","б"=>"b","в"=>"v","г"=>"g","д"=>"d",
           "е"=>"e","ё"=>"jo","ж"=>"zh",
           "з"=>"z","и"=>"i","й"=>"jj","к"=>"k","л"=>"l",
           "м"=>"m","н"=>"n","о"=>"o","п"=>"p","р"=>"r",
           "с"=>"s","т"=>"t","у"=>"u","ф"=>"f","х"=>"kh",
           "ц"=>"c","ч"=>"ch","ш"=>"sh","щ"=>"shh","ъ"=>"",
           "ы"=>"y","ь"=>"","э"=>"eh","ю"=>"yu","я"=>"ya",
           " "=>"-"
        );

        $english_text = str_replace(array_keys($abc), array_values($abc), $russian_text);
        $english_text = strtolower($english_text);

        return $english_text;
    }

}

?>
