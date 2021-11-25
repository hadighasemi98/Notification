<?php

namespace App\Services\Notifications\Providers ;

use App\Models\User;
use App\Services\Notifications\Providers\Contracts\ProviderInterface;
use Illuminate\Contracts\Mail\Mailable;
use Illuminate\Support\Facades\Mail;

class EmailProvider implements ProviderInterface
{
    private User $user ;
    private $mailable ;

    public function __construct(User $user, Mailable $mailable)
    {
        $this->user = $user;
        $this->mailable = $mailable;
    }

    public function send()
    {
        return Mail::to($this->user->email)->send($this->mailable);
    }
}
