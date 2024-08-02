<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanApprover extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'application_id',
        'setting_id',
        'priority',
        'status'
    ];

    public function settings(){
        return $this->belongsTo(SystemSetting::class);
    }
}
