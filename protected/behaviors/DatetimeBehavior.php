<?php
class DatetimeBehavior extends CActiveRecordBehavior
{
    public function beforeSave($event)
    {
        if ($this->owner->isNewRecord) {
            $this->owner->created = $this->owner->modified = date('Y-m-d H:i:s');
        } else {
            $this->owner->modified = date('Y-m-d H:i:s');
        }
    }
}