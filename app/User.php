<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Mail\UserVerificationEmail;
use Illuminate\Support\Facades\Mail;


class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens,Notifiable;

    public function sendEmailVerificationNotification()
    {
       $this->notify(new Notifications\UserVerificationEmail);
    }
   
    protected $fillable = [
        'name', 'surname', 'email', 'password','type', 'cicle_id',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function appliedsOffers(){
        return $this->hasMany(Applied::class);
    }

}

// class User extends Authenticatable
// {
//     use Notifiable;

//     /**
//      * The attributes that are mass assignable.
//      *
//      * @var array
//      */
//     protected $fillable = [
//         'name', 'surname', 'email', 'password', 'cicle_id',
//     ];

//     /**
//      * The attributes that should be hidden for arrays.
//      *
//      * @var array
//      */
//     protected $hidden = [
//         'password', 'remember_token',
//     ];

//     /**
//      * The attributes that should be cast to native types.
//      *
//      * @var array
//      */
//     protected $casts = [
//         'email_verified_at' => 'datetime',
//     ];
// }
