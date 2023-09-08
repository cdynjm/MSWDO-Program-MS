<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionHistory extends Model
{
    use HasFactory;

    protected $table = 'transaction_history';

    public $timestamps;

    protected $fillable = [
        'userid',
        'program',
        'programtype_id',
        'cash',
        'address'
    ];

    public function Program() {
        return $this->hasOne(Program::class, 'id', 'program');
    }

    public function Beneficiary() {
        return $this->hasOne(Beneficiary::class, 'id', 'userid');
    }
    public function ProgramType() {
        return $this->hasOne(ProgramType::class, 'id', 'programtype_id');
    }
}
