<?php

namespace App\Services\Notifications\Constants;

use App\Mail\ForgetPassword;
use App\Mail\TopicCreated;
use App\Mail\UserRegister;

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

    public static function toMail($type)
    {
        try {
            $types = [
                self::USER_REGISTERED => UserRegister::class ,
                self::TOPIC_CREATED   => TopicCreated::class ,
                self::FORGET_PASSWORD => ForgetPassword::class ,
            ];
    
            return $types[$type];

        } catch (\Exception $error) {
            throw new \InvalidArgumentException('Mailable class does not exist !');
        }
        
    }
}
