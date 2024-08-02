<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'bankName',
        'branchName',
        'accountNames',
        'accountNumber',
        'user_id',
    ];

    public function user(){
        $this->belongsTo(User::class);
    }
}
