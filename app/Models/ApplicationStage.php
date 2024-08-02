<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationStage extends Model
{
    use HasFactory;
    protected $fillable = [
        'application_id',
        'loan_product_id',
        'state',
        'status',
        'stage',
        'prev_status',
        'curr_status',
        'position',
    ];
}
