<?php

namespace App\Services\Notifications\Constants;

class EmailTypes
{
    const USER_REGISTERED = 1;
    const TOPIC_CREATED   = 2;
    const FORGET_PASSWORD = 3;
    
    public static function toString()
    {
        return [
            self::USER_REGISTERED => 'کاربر ثبت نام کرد' ,
            self::TOPIC_CREATED   => 'مقاله ساخته شد' ,
            self::FORGET_PASSWORD => 'رمز فراموش شده' ,

        ];
    }
}
