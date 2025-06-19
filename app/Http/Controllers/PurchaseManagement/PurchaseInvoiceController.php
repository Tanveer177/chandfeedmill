<?php

namespace App\Http\Controllers\PurchaseManagement;

use App\Http\Controllers\Controller;
use App\Models\PurchaseManagement\PurchaseInvoice;
use App\Models\PurchaseManagement\PurchaseOrder;
use Illuminate\Http\Request;

class PurchaseInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $purchaseInvoices = PurchaseInvoice::with('purchaseOrder.supplier')->orderBy('created_at', 'desc')->paginate(15);
        return view('purchase-management.purchase-invoices.index', compact('purchaseInvoices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $purchaseOrders = PurchaseOrder::orderBy('order_no')->get();
        return view('purchase-management.purchase-invoices.create', compact('purchaseOrders'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'purchase_order_id' => 'required|exists:purchase_orders,id',
            'invoice_no' => 'required|string|max:255',
            'invoice_date' => 'required|date',
            'amount' => 'required|numeric|min:0',
            'status' => 'required|in:unpaid,paid,cancelled',
            'description' => 'nullable|string',
        ]);
        PurchaseInvoice::create($validated);
        return redirect()->route('purchase-management.invoices.index')->with('success', 'Purchase invoice created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $purchaseInvoice = PurchaseInvoice::with('purchaseOrder.supplier')->findOrFail($id);
        return view('purchase-management.purchase-invoices.show', compact('purchaseInvoice'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $purchaseInvoice = PurchaseInvoice::findOrFail($id);
        $purchaseOrders = PurchaseOrder::orderBy('order_no')->get();
        return view('purchase-management.purchase-invoices.edit', compact('purchaseInvoice', 'purchaseOrders'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $purchaseInvoice = PurchaseInvoice::findOrFail($id);
        $validated = $request->validate([
            'purchase_order_id' => 'required|exists:purchase_orders,id',
            'invoice_no' => 'required|string|max:255',
            'invoice_date' => 'required|date',
            'amount' => 'required|numeric|min:0',
            'status' => 'required|in:unpaid,paid,cancelled',
            'description' => 'nullable|string',
        ]);
        $purchaseInvoice->update($validated);
        return redirect()->route('purchase-management.invoices.index')->with('success', 'Purchase invoice updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $purchaseInvoice = PurchaseInvoice::findOrFail($id);
        $purchaseInvoice->delete();
        return redirect()->route('purchase-management.invoices.index')->with('success', 'Purchase invoice deleted successfully.');
    }
}
