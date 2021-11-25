<?php

use App\Http\Controllers\Notification\NotificationController;
use App\Http\Controllers\Notification\SmsController;
use App\Http\Controllers\UserController;
use App\Mail\UserRegister;
use App\Models\User;
use App\Services\Notifications\Notification;
use App\Services\Notifications\SmsNotification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Ipecompany\Smsirlaravel\Controllers\SmsirlaravelController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Route::get('/mail', [UserController::class , 'send'])->name('send-email');

// Route::get('/sms-admin' , [SmsirlaravelController::class , 'index']);
Route::get('/send', function () {
    $notification = resolve(Notification::class);
    $notification->sendSms(User::find(1), 'تست بعد از اینترفیس ');
});

Route::prefix('/notification')->group(function () {
    Route::get('/home', [NotificationController::class , 'home'])->name('notification.home');

    Route::get('/email', [NotificationController::class , 'email'])->name('notification.form.email');
    Route::post('/email', [NotificationController::class , 'sendEmail'])->name('notification.send.email');
});










Route::group(['namespace'=>'Ipecompany\Smsirlaravel\Controllers','middleware'=>config('smsirlaravel.middlewares')], function () {
    Route::get(config('smsirlaravel.route'), 'SmsirlaravelController@index')->name('sms-admin');
    Route::get('sms-admin/{log}/delete', 'SmsirlaravelController@delete')->name('deleteLog');
});
