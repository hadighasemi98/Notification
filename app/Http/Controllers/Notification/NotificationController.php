<?php

namespace App\Http\Controllers\Notification;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserEmailRequest;
use App\Http\Requests\UserSmsData;
use App\Models\User;
use App\Services\Notifications\Constants\EmailTypes;
use App\Services\Notifications\Exceptions\UserDoseNotHaveMobile;
use App\Services\Notifications\Notification;
use Exception;

class NotificationController extends Controller
{
    private $user ;
    private $notification ;

    public function __construct()
    {
        $this->user = User::class;
        $this->notification = resolve(Notification::class);
    }

    public function email()
    {
        $users = $this->user::all();
        $emailTypes = EmailTypes::toString();
        return view('notifications.send-email', compact('users', 'emailTypes'));
    }

    public function sendEmail(UserEmailRequest $request)
    {
        try {
            $validatedData = $request->validated();
            $mailable = EmailTypes::toMail($validatedData['email_type']);
            $this->notification->sendEmail($this->user::find($validatedData['user']), new $mailable);
            return  $this->redirectBack('success', __('notification.send_email_success'));
        
        } catch (\Exception $error) {
            return  $this->redirectBack('failed', __('notification.email_services_has_problem'));
        }
  
    }

    public function sms()
    {
        $users = $this->user::all();
        return view('notifications.send-sms' , compact('users'));
    }
    
    public function sendSms(UserSmsData $request)
    {
        try {
            $validatedData = $request->validated();            
            $result = $this->notification->sendms($validatedData['text'],$this->user::find($validatedData['user']));

            return  $this->redirectBack('success', $result['Message']);

        } catch (UserDoseNotHaveMobile $error) {
            return $this->redirectBack('failed', __('notification.user_dose_not_have_mobile'));
        
        } catch (Exception $err) {
            return $this->redirectBack('failed', __('notification.sms_services_has_problem'));
        }


    }

    public function home()
    {
        return view('home');
    }

    private function redirectBack(string $type , string $message)
    {
        return back()->with($type, $message);

    }
}
