<?php

namespace App\Http\Controllers\Accounts;

use App\Http\Controllers\Controller;
use App\Models\Accounts\Voucher;
use App\Models\User;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vouchers = Voucher::with('creator')->paginate(10);
        return view('accounts.vouchers.index', compact('vouchers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('accounts.vouchers.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'voucher_no' => 'required|unique:vouchers,voucher_no',
            'date' => 'required|date',
            'type' => 'required',
            'amount' => 'required|numeric',
            'created_by' => 'required|exists:users,id',
        ]);
        $data = $request->except('_token');
        Voucher::create($data);
        return redirect()->route('vouchers.index')->with('success', 'Voucher created successfully.');
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
    public function edit(Voucher $voucher)
    {
        $users = User::all();
        return view('accounts.vouchers.edit', compact('voucher', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Voucher $voucher)
    {
        $request->validate([
            'voucher_no' => 'required|unique:vouchers,voucher_no,' . $voucher->id,
            'date' => 'required|date',
            'type' => 'required',
            'amount' => 'required|numeric',
            'created_by' => 'required|exists:users,id',
        ]);
        $data = $request->except('_token');
        $voucher->update($data);
        return redirect()->route('vouchers.index')->with('success', 'Voucher updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Voucher $voucher)
    {
        $voucher->delete();
        return redirect()->route('vouchers.index')->with('success', 'Voucher deleted successfully.');
    }
}
