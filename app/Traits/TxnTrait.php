<?php

namespace App\Traits;

use App\Models\Transaction;

trait TxnTrait
{
    public function transaction_entry(array $data)
    {
        Transaction::create([
            'application_id' => $data['loan_id'] ?? null,
            'proof_id' => $data['proof_id'] ?? null,
            'balance_statement_id' => $data['balance_statement_id'] ?? null,
            'amount_settled' => $data['amount'] ?? 0,
            'transaction_fee' => 0,
            'profit_margin' => 0,
            'proccess_by' => ($data['fname'] ?? '') . ' ' . ($data['lname'] ?? ''),
            'charge_amount' => 0,
            'method' => $data['method'] ?? 'unknown',
            'user_id' => $data['user_id'] ?? null,
            'installment_id' => $data['installment_id'] ?? null,
            'created_at'=> $data['payment_date']
        ]);
    }
    public function transaction_update(array $data)
    {
        // Update the latest matching transaction for the given loan_id and user_id
        $transaction = Transaction::where('application_id', $data['loan_id'])
            ->where('user_id', $data['user_id'])
            ->latest()
            ->first();

        if ($transaction) {
            $transaction->update([
                'amount_settled' => $data['amount_settled'],
                'method' => $data['method'],
                'proccess_by' => $data['fname'] . ' ' . $data['lname'],
            ]);
        }
    }

    public function transaction_removal(array $data)
    {
        // Remove the latest matching transaction by loan_id and amount
        $transaction = Transaction::where('application_id', $data['loan_id'])
            ->where('amount_settled', $data['amount_settled'])
            ->latest()
            ->first();

        if ($transaction) {
            $transaction->delete();
        }
    }

}