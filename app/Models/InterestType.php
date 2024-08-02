<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InterestType extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'status'
    ];

    public function loan_interest_type(){
        return $this->hasMany(LoanInterestType::class);
    }
}
