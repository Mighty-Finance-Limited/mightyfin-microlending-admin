<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanScore extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'eligible',
        'amount',
        'score',
        'user_id',
        'loan_id'
    ];

    public function application(){
        $this->belongsTo(Application::class, 'loan_id');
    }
    public function user(){
        $this->belongsTo(User::class, 'user_id');
    }
}
