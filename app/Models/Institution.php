<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'address',
        'phone',
        'email',
        'status',
        'map',
    ];
    public function loan_products(){
        return $this->hasMany(LoanProductInstitution::class);
    }
}
