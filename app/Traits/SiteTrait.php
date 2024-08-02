<?php

namespace App\Traits;

use App\Models\CareerSetting;

trait SiteTrait{

    public function getCareers(){
        return CareerSetting::orderBy('created_at', 'desc')->get();
    }
}