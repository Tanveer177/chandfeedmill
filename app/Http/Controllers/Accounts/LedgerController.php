<?php

namespace App\Http\Controllers\Accounts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Accounts\Ledger;
use App\Models\Accounts\Account;

class LedgerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ledgers = Ledger::with('account')->paginate(10);
        return view('accounts.ledgers.index', compact('ledgers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $accounts = Account::all();
        return view('accounts.ledgers.create', compact('accounts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'account_id' => 'required|exists:accounts,id',
            'date' => 'required|date',
            'debit' => 'required|numeric',
            'credit' => 'required|numeric',
        ]);
        $data = $request->except('_token');
        $data['balance'] = $data['debit'] - $data['credit'];
        Ledger::create($data);
        return redirect()->route('ledgers.index')->with('success', 'Ledger entry created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ledger $ledger)
    {
        $accounts = Account::all();
        return view('accounts.ledgers.edit', compact('ledger', 'accounts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ledger $ledger)
    {
        $request->validate([
            'account_id' => 'required|exists:accounts,id',
            'date' => 'required|date',
            'debit' => 'required|numeric',
            'credit' => 'required|numeric',
        ]);
        $data = $request->except('_token');
        $data['balance'] = $data['debit'] - $data['credit'];
        $ledger->update($data);
        return redirect()->route('ledgers.index')->with('success', 'Ledger entry updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ledger $ledger)
    {
        $ledger->delete();
        return redirect()->route('ledgers.index')->with('success', 'Ledger entry deleted successfully.');
    }
}
