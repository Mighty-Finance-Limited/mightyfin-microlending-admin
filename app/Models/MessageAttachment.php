<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessageAttachment extends Model
{
    use HasFactory;
    protected $fillable = [
        'file_path',
        'customer_messages_id'
    ];

    public function message(){
        return $this->belongsTo(CustomerMessage::class, 'customer_messages_id');
    }
}
