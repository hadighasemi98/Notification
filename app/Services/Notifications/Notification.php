<?php

namespace App\Services\Notifications;

use App\Services\Notifications\Providers\Contracts\ProviderInterface;
use Exception;

// /*
// *@method sendSms     (User $user , )
// *@method sendEmail   (User $user , )
// *@method sendTelegram(User $user , )
// */

class Notification
{
    public function __call($method, $arguments)
    {
        $providerPath = __NAMESPACE__ . '\Providers\\' . substr($method, 4) . 'Provider';
        
        if (!class_exists($providerPath)) {
            throw new Exception("$providerPath does not exist");
        }

        $providerInstance = new $providerPath(...$arguments);

        if (!is_subclass_of($providerInstance, ProviderInterface::class)) {
            throw new Exception("Class must implement App\Services\Notifications\Providers\Contracts\ProviderInterface");
        }

        return $providerInstance->send();
    }
}
