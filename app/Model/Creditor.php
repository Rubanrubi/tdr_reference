<?php

namespace App\Model;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\AdminResetPasswordNotification;


class Creditor  extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    protected $guard = 'creditor';


    protected $hidden = ['password'];

    protected $with = ['CreditorsUser'];


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


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function CreditorsUser()
    {
        return $this->hasMany('App\Model\CreditorsUser', 'creditor_id','id');
    }


}
