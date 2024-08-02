<?php

namespace App\Classes\Exports;

use App\Models\Application;
use App\Models\Loans;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ReportExport implements FromView
{
    public $start_date, $end_date, $type;
    public function __construct($start_date, $end_date, $type)
    {
        $this->start_date = $start_date;
        $this->end_date = $end_date;
        $this->type = $type;
    }

    public function view(): View
    {
        if($this->type == 1){
            if(isset($this->start_date) && isset($this->end_date)){
                $results = Loans::with('application')->where('final_due_date', '>', 'repaid_at')
                ->where('closed', 1)
                ->whereBetween('created_at', [$this->start_date, $this->end_date])
                ->get();
            }else{
                $results = Loans::with('application')
                ->where('closed', 1)
                ->where('final_due_date', '>', 'repaid_at')->get();
            }
        }
        
        // Late Settlements Query
        if($this->type == 2){
            if(isset($this->start_date) && isset($this->end_date)){
                $results = Loans::with('application')->where('final_due_date', '<', 'repaid_at')
                ->where('closed', 1)
                ->whereBetween('created_at', [$this->start_date, $this->end_date])
                ->get();
            }else{
                $results = Loans::with('application')
                ->where('closed', 1)
                ->where('final_due_date', '<', 'repaid_at
                ')->get();
            }
        }
        return view('livewire.report-view',[
            'results' => $results
        ]);
    }
}