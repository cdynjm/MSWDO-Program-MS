<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table = 'event';

    public $timestamps;

    protected $fillable = [
        'title',
        'date',
        'program',
        'location',
        'time'
    ];

    public function Program() {
        return $this->hasOne(Program::class, 'id', 'program');
    }

}
