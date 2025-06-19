@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Purchase Invoice</h1>
    <form action="{{ route('purchase-management.invoices.update', $purchaseInvoice) }}" method="POST" class="mt-4">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="invoice_no" class="form-label">Invoice #</label>
            <input type="text" name="invoice_no" id="invoice_no" class="form-control @error('invoice_no') is-invalid @enderror" value="{{ old('invoice_no', $purchaseInvoice->invoice_no) }}" required>
            @error('invoice_no')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="purchase_order_id" class="form-label">Purchase Order</label>
            <select name="purchase_order_id" id="purchase_order_id" class="form-select @error('purchase_order_id') is-invalid @enderror" required>
                <option value="">Select Purchase Order</option>
                @foreach($purchaseOrders as $order)
                <option value="{{ $order->id }}" @if(old('purchase_order_id', $purchaseInvoice->purchase_order_id) == $order->id) selected @endif>
                    {{ $order->order_no }} - {{ $order->supplier->name ?? 'No Supplier' }}
                </option>
                @endforeach
            </select>
            @error('purchase_order_id')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="invoice_date" class="form-label">Invoice Date</label>
            <input type="date" name="invoice_date" id="invoice_date" class="form-control @error('invoice_date') is-invalid @enderror" value="{{ old('invoice_date', \Carbon\Carbon::parse($purchaseInvoice->invoice_date)->format('Y-m-d')) }}" required>
            @error('invoice_date')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-select @error('status') is-invalid @enderror">
                <option value="unpaid" @if(old('status', $purchaseInvoice->status)=='unpaid') selected @endif>Unpaid</option>
                <option value="paid" @if(old('status', $purchaseInvoice->status)=='paid') selected @endif>Paid</option>
                <option value="cancelled" @if(old('status', $purchaseInvoice->status)=='cancelled') selected @endif>Cancelled</option>
            </select>
            @error('status')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="amount" class="form-label">Amount</label>
            <input type="number" step="0.01" name="amount" id="amount" class="form-control @error('amount') is-invalid @enderror" value="{{ old('amount', $purchaseInvoice->amount) }}" required>
            @error('amount')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Update</button>
        <a href="{{ route('purchase-management.invoices.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
