<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrbProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'code',
        'tag'
    ];

    public function loan_crb(){
        return $this->hasMany(LoanCrbProduct::class);
    }
}
