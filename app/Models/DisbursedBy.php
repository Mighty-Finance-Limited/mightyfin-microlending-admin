<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DisbursedBy extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'description',
        'tag'
    ];

    
    public function disbursed_by(){
        return $this->hasMany(LoanDisbursedBy::class);
    }
}
