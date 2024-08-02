<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CareerSetting extends Model
{
    use HasFactory;
    protected $fillable = [
        'dept',
        'job_role',
        'location',
        'last_date',
        'desc'
    ];

    
}
