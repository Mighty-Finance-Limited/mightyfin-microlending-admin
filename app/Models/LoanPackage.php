<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanPackage extends Model
{
    use HasFactory;
    protected $fillable = [
        'added_by',
        'rate_id',
        'name',
        'type',
        'description',
        'image',
        'image2',
        'phone_num',
        'status'
    ];

    public function audit(){
        return $this->belongsTo(User::class, 'added_by');
    }

    public function rate(){
        return $this->hasOne(LoanRate::class, 'rate_id');
    }
}
