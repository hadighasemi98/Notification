<?php

namespace App\Services\Notifications\Providers ;

use App\Models\User;
use App\Services\Notifications\Providers\Contracts\ProviderInterface;

class TelegramProvider implements ProviderInterface
{
    private User $user ;
    private $text ;

    public function __construct(User $user, string $text)
    {
        $this->user = $user;
        $this->text = $text;
    }

    public function send()
    {
        dd($this->user->email);
    }
}
