<?php

namespace App\Http\Controllers\PurchaseManagement;

use App\Http\Controllers\Controller;
use App\Models\PurchaseManagement\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suppliers = Supplier::orderBy('created_at', 'desc')->paginate(15);
        return view('purchase-management.suppliers.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('purchase-management.suppliers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:50',
            'address' => 'nullable|string|max:255',
            'company' => 'nullable|string|max:255',
            'status' => 'required|in:active,inactive',
        ]);
        Supplier::create($validated);
        return redirect()->route('purchase-management.suppliers.index')->with('success', 'Supplier created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $supplier = Supplier::findOrFail($id);
        return view('purchase-management.suppliers.show', compact('supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $supplier = Supplier::findOrFail($id);
        return view('purchase-management.suppliers.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $supplier = Supplier::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:50',
            'address' => 'nullable|string|max:255',
            'company' => 'nullable|string|max:255',
            'status' => 'required|in:active,inactive',
        ]);
        $supplier->update($validated);
        return redirect()->route('purchase-management.suppliers.index')->with('success', 'Supplier updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();
        return redirect()->route('purchase-management.suppliers.index')->with('success', 'Supplier deleted successfully.');
    }
}
