<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'value',
        'type',
        'status',
        'active',
        'count',
        'comment',
        'user_id',
        'team_id'
    ];

    public function auto_approvers(){
        return $this->hasMany(LoanApprover::class, 'setting_id');
    }
}
