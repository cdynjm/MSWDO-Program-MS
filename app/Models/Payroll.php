<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    use HasFactory;

    protected $table = 'payroll';

    public $timestamps;

    protected $fillable = [
        'userid',
        'programtype_id',
        'balance',
        'status',
        'program'
    ];

    public function Beneficiary() {
        return $this->hasOne(Beneficiary::class, 'id', 'userid');
    }
    public function Program() {
        return $this->hasOne(Program::class, 'id', 'program');
    }
    public function ProgramType() {
        return $this->hasOne(ProgramType::class, 'id', 'programtype_id');
    }
}
