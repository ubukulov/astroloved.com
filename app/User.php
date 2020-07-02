<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'birth_date', 'phone', 'confirmation_token', 'free_count', 'round'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function payments()
    {
        return $this->hasMany('App\Payment', 'user_id');
    }

    public static function exists($email)
    {
        $user = User::where(['email' => $email])->first();
        return (!$user) ? true : false;
    }

    public static function generateToken() {
        return md5(microtime(true));
    }

    public function hasConfirmed() {
        return $this->confirmation_token === null ? true : false;
    }

    public function confirm($token) {
        // If the user has already confirmed we can't confirm him again.
        if ($this->hasConfirmed()) return false;

        if ($token === $this->confirmation_token) {
            // User has confirmed his e-mail address.
            $this->confirmation_token = null;
            $this->email_verified_at = \Carbon\Carbon::now();
            $this->save();

            return true;
        }

        // Token was incorrect.
        return false;
    }
}
