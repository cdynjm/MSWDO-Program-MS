<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\CanResetPassword;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'userid',
        'name',
        'email',
        'password',
        'location',
        'phone',
        'about',
        'password_confirmation',
        'type',
        'active_status',
        'avatar',
        'dark_mode'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function Program() {
        return $this->hasOne(Program::class, 'focal_person', 'userid');
    }

    public function Beneficiary() {
        return $this->hasOne(Beneficiary::class, 'id', 'userid');
    }
    public function FocalPerson() {
        return $this->hasOne(FocalPerson::class, 'id', 'userid');
    }

}
