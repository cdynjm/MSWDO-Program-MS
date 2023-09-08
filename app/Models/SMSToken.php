<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SMSToken extends Model
{
    use HasFactory;
    
    protected $table = 'sms_token_identity';

    public $timestamps;

    protected $fillable = [
        'url',
        'access_token',
        'mobile_identity'
    ];

}
