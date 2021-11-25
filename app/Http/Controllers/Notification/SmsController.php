<?php

namespace App\Http\Controllers\Notification;

use App\Http\Controllers\Controller;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Ipecompany\Smsirlaravel\Smsirlaravel;

class SmsController extends Controller
{
    public function send(User $user, $text, $sendDataTime=null)
    {
        // $user = User::find(1);
        // dd($user);
        // $text='تست';
        $result = Smsirlaravel::send($text, $user->mobile);
        dd($result);
    }
}
