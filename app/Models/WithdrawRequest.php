<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WithdrawRequest extends Model
{
    use HasFactory;
    protected $fillable = [
        'wallet_id',
        'amount',
        'comments',
        'ref',
        'withdraw_method',
        'mobile_number',
        'card_name',
        'bank_name',
        'user_id',
        'card_number',
        'status',
        'processed_by'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
