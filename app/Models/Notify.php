<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notify extends Model
{
    use HasFactory;

    protected $table = 'notify';

    public $timestamps;

    protected $fillable = [
        'userid',
        'program_id',
        'title',
        'date',
        'cash',
        'status',
        'type'
    ];

    public function Program() {
        return $this->hasOne(Program::class, 'id', 'program_id');
    }
    public function Beneficiary() {
        return $this->hasOne(Beneficiary::class, 'id', 'userid');
    }
    public function Event() {
        return $this->hasOne(Event::class, 'id', 'title');
    }
}
