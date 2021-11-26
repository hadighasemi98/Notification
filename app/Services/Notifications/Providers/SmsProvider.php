<?php

namespace App\Services\Notifications\Providers ;

use App\Models\User;
use App\Services\Notifications\Exceptions\SmsProviderException;
use App\Services\Notifications\Exceptions\UserDoseNotHaveMobile;
use App\Services\Notifications\Providers\Contracts\ProviderInterface;
use Exception;
use Ipecompany\Smsirlaravel\Smsirlaravel;

class SmsProvider implements ProviderInterface
{
    private $user ;
    private $text ;
    private $sendDataTime ;

    public function __construct(string $text, User $user, $sendDataTime=null)
    {
        $this->user = $user;
        $this->text = $text;
        $this->$sendDataTime = $sendDataTime;
    }

    public function send()
    {
        $this->havePhoneNumber();
        
        try {
            return Smsirlaravel::send($this->text, $this->user->mobile);

        } catch (SmsProviderException $err) {
            throw new SmsProviderException($err->getMessage());
        }
        
    }

    private function havePhoneNumber ()
    {
        if(is_null($this->user->mobile))
            throw new UserDoseNotHaveMobile('Mobile dose not be null');
    }
}
