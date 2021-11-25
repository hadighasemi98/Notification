<?php

namespace App\Http\Controllers\Notification;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserEmailRequest;
use App\Mail\UserRegister;
use App\Models\User;
use App\Services\Notifications\Constants\EmailTypes;
use App\Services\Notifications\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    private $user ;
    public function __construct()
    {
        $this->user = User::class;
        $this->notification = new Notification();
    }

    public function email()
    {
        $users = $this->user::all();
        $emailTypes = EmailTypes::toString();
        return view('notifications.send-email', compact('users', 'emailTypes'));
    }

    public function sendEmail(UserEmailRequest $request)
    {
        $validatedData = $request->validated();
        dd($request->all());
        
        $validatedData = [
            'user' => $request->user,
            'email_type' => $request->email_type,
        ];
        

        $emailTypes = $this->notification->sendEmail($this->user::find($validatedData['user']), UserRegister::class);
        return back()->with('', '');
    }

    public function home()
    {
        return view('home');
    }
}
