<?php

namespace App\Http\Controllers\PurchaseManagement;

use App\Http\Controllers\Controller;
use App\Models\PurchaseManagement\PurchaseOrder;
use App\Models\PurchaseManagement\Supplier;
use Illuminate\Http\Request;

class PurchaseOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $purchaseOrders = PurchaseOrder::with('supplier')->orderBy('created_at', 'desc')->paginate(15);
        return view('purchase-management.purchase-orders.index', compact('purchaseOrders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $suppliers = Supplier::orderBy('name')->get();
        return view('purchase-management.purchase-orders.create', compact('suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'supplier_id' => 'required|exists:suppliers,id',
            'order_no' => 'required|string|max:255',
            'order_date' => 'required|date',
            'status' => 'required|in:pending,completed,cancelled',
            'total_amount' => 'required|numeric|min:0',
            'description' => 'nullable|string',
        ]);
        PurchaseOrder::create($validated);
        return redirect()->route('purchase-management.orders.index')->with('success', 'Purchase order created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $purchaseOrder = PurchaseOrder::with('supplier')->findOrFail($id);
        return view('purchase-management.purchase-orders.show', compact('purchaseOrder'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $purchaseOrder = PurchaseOrder::findOrFail($id);
        $suppliers = Supplier::orderBy('name')->get();
        return view('purchase-management.purchase-orders.edit', compact('purchaseOrder', 'suppliers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $purchaseOrder = PurchaseOrder::findOrFail($id);
        $validated = $request->validate([
            'supplier_id' => 'required|exists:suppliers,id',
            'order_no' => 'required|string|max:255',
            'order_date' => 'required|date',
            'status' => 'required|in:pending,completed,cancelled',
            'total_amount' => 'required|numeric|min:0',
            'description' => 'nullable|string',
        ]);
        $purchaseOrder->update($validated);
        return redirect()->route('purchase-management.orders.index')->with('success', 'Purchase order updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $purchaseOrder = PurchaseOrder::findOrFail($id);
        $purchaseOrder->delete();
        return redirect()->route('purchase-management.orders.index')->with('success', 'Purchase order deleted successfully.');
    }
}
