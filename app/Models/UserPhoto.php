<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPhoto extends Model
{
    use HasFactory;

    // Specify the table name if it differs from the default 'user_photos'
    protected $table = 'user_photos';

    // Define the fillable fields
    protected $fillable = [
        'user_id',  // Foreign key referencing the user
        'name',     // Name of the photo (primary, secondary, tertiary)
        'path',     // Path to the photo file
        'source'
    ];

    // Define any relationships, if necessary
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}