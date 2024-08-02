<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlackList extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'user_id', 'email','comments'
    ];

    public function user(){
        return $this->hasMany(User::class, 'user_id');
    }
}
