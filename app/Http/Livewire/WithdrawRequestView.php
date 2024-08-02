<?php

namespace App\Http\Livewire;

use App\Models\WithdrawRequest;
use App\Traits\WalletTrait;
use Livewire\Component;

class WithdrawRequestView extends Component
{
    use WalletTrait;
    public $requests, $name, $reference_no, $message, $req_id, $payment_method, $status;

    public function render()
    {
        // $this->name = '';
        // $this->reference_no = '';
        // $this->message = '';
        // $this->req_id = '';
        $this->requests = $this->getWithdrawRequests();
        return view('livewire.withdraw-request-view')
        ->layout('layouts.dashboard');
    }

    public function acceptTransaction($id){
        $info = $this->getWithdrawRequests()->where('id', $id)->first();
        $x = WithdrawRequest::with('user')->where('id', $id)->first();  
        $x->status = 1;
        $x->comments = 'Wallet withdraw successfully approved & accepted';
        $x->save();
        $this->deductUserWallet($info);
        session()->flash('success', 'Successfully withdrawn '.$x->amount.' from '.$x->user->fname.' '.$x->user->lname."'s wallet");

    }

    public function viewDetailModal($id){
        $data = $this->requests->where('id', $id)->first();  
 
        $this->name = $data->user->fname.' '.$data->user->lname;
        $this->reference_no = $data->ref;
        $this->message = $data->comments;
        $this->req_id = $data->id;
        $this->status = $data->status;
        $this->payment_method = $data->card_number ?? $data->mobile_number ?? 'Cash';
    }

    public function denyTransaction($id){
        
    }
}
