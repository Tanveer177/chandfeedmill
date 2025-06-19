<?php

namespace App\Http\Controllers\Accounts;

use App\Http\Controllers\Controller;
use App\Models\Accounts\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accounts = Account::paginate(10);
        return view('accounts.index', compact('accounts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('accounts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required|unique:accounts,code',
            'type' => 'required',
        ]);
        $data = $request->except('_token');
        Account::create($data);
        return redirect()->route('accounts.index')->with('success', 'Account created successfully.');
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
    public function edit(Account $account)
    {
        return view('accounts.edit', compact('account'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Account $account)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required|unique:accounts,code,' . $account->id,
            'type' => 'required',
        ]);
        $data = $request->except('_token');
        $account->update($data);
        return redirect()->route('accounts.index')->with('success', 'Account updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Account $account)
    {
        $account->delete();
        return redirect()->route('accounts.index')->with('success', 'Account deleted successfully.');
    }
}
