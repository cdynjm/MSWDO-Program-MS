<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $table = 'programs';

    public $timestamps;

    protected $fillable = [
        'program',
        'description',
        'focal_person',
    ];

    public function FocalPerson() {
        return $this->hasOne(FocalPerson::class, 'id', 'focal_person');
    }
}
