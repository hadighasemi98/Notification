<?php

namespace App\Services\Notifications\Providers ;

use App\Models\User;
use App\Services\Notifications\Providers\Contracts\ProviderInterface;
use Ipecompany\Smsirlaravel\Smsirlaravel;

class SmsProvider implements ProviderInterface
{
    private User $user ;
    private $text ;
    private $sendDataTime ;

    public function __construct(User $user, string $text, $sendDataTime=null)
    {
        $this->user = $user;
        $this->text = $text;
        $this->$sendDataTime = $sendDataTime;
    }

    public function send()
    {
        $result = Smsirlaravel::send($this->text, $this->user->mobile);
        dd($result);
    }
}
