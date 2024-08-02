<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactSetting extends Model
{
    use HasFactory;
    protected $fillable = [
        'logo',
        'name',
        'phone1',
        'phone2',
        'phone3',
        'address',
        'province',
        'state',
        'city',
        'country',
        'business_type',
        'legal_structure',
        'facebook',
        'instagram',
        'linkedin',
        'twitter',
        'email1',
        'email2',
        'start_time',
        'stop_time',
        'start_day',
        'stop_day',
        'slogan'
    ];

    public static function name(){
        return ContactSetting::get()->first()->name;
    }

    public static function place(){
        return ContactSetting::get()->first()->city;
    }

    public static function customer_care_line(){
        return ContactSetting::get()->first()->phone1;
    }

    public static function contact_us_line(){
        return ContactSetting::get()->first()->phone2;
    }
    
    public static function province(){
        return ContactSetting::get()->first()->province;
    }    

    public static function city(){
        return ContactSetting::get()->first()->city;
    }

    public static function contact_us_email(){
        return ContactSetting::get()->first()->email1;
    }

    public static function loan_req_email(){
        return ContactSetting::get()->first()->email1;
    }

    public static function top_line(){
        return ContactSetting::get()->first()->phone;
    }

    public static function work_days(){
        return ContactSetting::get()->first()->start_day.' - '.ContactSetting::get()->first()->stop_day;
    }

    public static function work_hours(){
        return ContactSetting::get()->first()->start_time.' - '.ContactSetting::get()->first()->stop_time;
    }

    public static function address(){
        return ContactSetting::get()->first()->address;
    }

    public static function fb(){
        return ContactSetting::get()->first()->facebook;
    }
    public static function linkedin(){
        return ContactSetting::get()->first()->linkedin;
    }
    public static function twitter(){
        return ContactSetting::get()->first()->twitter;
    }
    public static function instagram(){
        return ContactSetting::get()->first()->instagram;
    }

}
