<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class References extends Model
{
    use HasFactory;
    protected $fillable = [
        'hrFname',
        'hrLname',
        'hrContactNumber',
        'supervisorFirstName',
        'supervisorLastName',
        'supervisorContactNumber',
        'user_id',
        'application_id'
    ];

    public function user(){
        $this->belongsTo(User::class);
    }
    public static function customer_hrs($user_id){
        return References::where('user_id', $user_id)->distinct('hrContactNumber')->get(['hrFname','hrLname','hrContactNumber']);
    }
    public static function customer_supervisors($user_id){
        return References::where('user_id', $user_id)->distinct('supervisorContactNumber')->get(['supervisorLastName','supervisorLastName','supervisorContactNumber']);
    }
     
}
