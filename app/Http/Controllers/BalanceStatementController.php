<?php

namespace App\Http\Controllers;

use App\Models\LoanBalanceStatement;
use App\Http\Requests\StoreBalanceStatementRequest;
use App\Http\Requests\UpdateBalanceStatementRequest;
use App\Traits\LoanTrait;
use App\Traits\TxnTrait;
use Illuminate\Http\Request;

class BalanceStatementController extends Controller
{
    use LoanTrait, TxnTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBalanceStatementRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'loan_id' => 'required|integer',
                'debit' => 'nullable|numeric',
                'credit' => 'nullable|numeric',
                'user_id' => 'nullable|integer',
                'payment_method' => 'nullable|string',
                'payment_date' => 'required',
                'description' => 'required',
            ]);

            // Prevent duplicate: define what makes it "duplicate"
            $existing = LoanBalanceStatement::where([
                'loan_id' => $validated['loan_id'],
                'debit' => $validated['debit'] ?? 0,
                'credit' => $validated['credit'] ?? 0,
            ])->first();

            if ($existing) {
                return redirect()->back()->with('info', 'Duplicate entry detected. No new entry added.');
            }

            // Create balance statement
            $LoanBalanceStatement = LoanBalanceStatement::create($validated);

            // Process transaction entry if credit or debit is non-zero
            $amount = $validated['debit'] ?? $validated['credit'];
            if (!empty($amount)) {
                $data = [
                    'loan_id' => $validated['loan_id'],
                    'fname' => auth()->user()->fname,
                    'lname' => auth()->user()->lname,
                    'amount' => $amount,
                    'method' => $validated['payment_method'] ?? 'unknown',
                    'payment_date'=> $validated['payment_date'] ,
                    'user_id' => $validated['user_id'] ?? auth()->id(),
                ];
                $this->transaction_entry($data);
            }

            return redirect()->back()->with('success', 'Entry added successfully.');
        } catch (\Throwable $th) {
            report($th);
            return redirect()->back()->with('error', 'An error occurred while saving the entry.');
        }
    }


    public function update(Request $request, $id = null)
    {
        try {
            $data = [
                'loan_id' => $request->input('loan_id'),
                'fname' => auth()->user()->fname,
                'lname' => auth()->user()->lname,
                'amount' => $request->input('amount'),
                'method' => $request->input('method') ?? 'unknown',
                'user_id' =>  $request->input('user_id') ?? auth()->id(),
            ];
            $this->transaction_update($data);
            LoanBalanceStatement::findOrFail($id)->update($request->all());
            return redirect()->back()->with('success', 'Entry updated successfully.');
            // return response()->json(['message' => 'Updated successfully']);
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Updated failed']);
            //throw $th;
        }
    }

    public function destroy($entry)  // Using route model binding
    {
        $statement = LoanBalanceStatement::where('id', $entry)->first();
        try {

            LoanBalanceStatement::where('id', $statement->id)->delete();
            $data = [
                'entry_id' => $statement->id,
                'loan_id' => $statement->loan_id,
                'fname' => auth()->user()->fname,
                'lname' => auth()->user()->lname,
                'amount' => $statement->amount
            ];
            $this->transaction_removal($data);
            return redirect()->back()->with('success', 'Deleted successfully.');
        } catch (\Throwable $th) {
            dd($th);
            return response()->json(['error' => 'Deleted failed']);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LoanBalanceStatement  $LoanBalanceStatement
     * @return \Illuminate\Http\Response
     */
    public function show(LoanBalanceStatement $LoanBalanceStatement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LoanBalanceStatement  $LoanBalanceStatement
     * @return \Illuminate\Http\Response
     */
    public function edit(LoanBalanceStatement $LoanBalanceStatement)
    {
        //
    }
}