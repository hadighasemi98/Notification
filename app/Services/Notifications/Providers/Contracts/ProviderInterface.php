<?php

namespace App\Services\Notifications\Providers\Contracts;

use App\Models\User;

interface ProviderInterface
{
    public function send();
}
