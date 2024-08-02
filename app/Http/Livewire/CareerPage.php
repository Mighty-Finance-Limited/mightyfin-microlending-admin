<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Traits\SiteTrait;

class CareerPage extends Component
{
    use SiteTrait;

    public $careers;
    public function render()
    {
        $this->careers = $this->getCareers();
        return view('livewire.career-page');
    }
}
