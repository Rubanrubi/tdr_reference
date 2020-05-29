<?php

namespace App\Model;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\AdminResetPasswordNotification;

class CreditorsUser extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    protected $guard = 'creditor';


    protected $hidden = ['password'];

     /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CreditorResetPasswordNotification($token));
    }

    protected $table = 'creditors_user';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function UserType()
    {
        return $this->belongsTo('App\Model\UserType', 'user_type','id');
    }
}
