@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mt-4">
        <div class="card-header bg-info text-white">
            <h3 class="mb-0">Purchase Invoice Details</h3>
        </div>
        <div class="card-body">
            <dl class="row">
                <dt class="col-sm-3">Invoice #</dt>
                <dd class="col-sm-9">{{ $purchaseInvoice->invoice_no }}</dd>
                <dt class="col-sm-3">Supplier</dt>
                <dd class="col-sm-9">{{ $purchaseInvoice->purchaseOrder->supplier->name ?? '-' }}</dd>
                <dt class="col-sm-3">Invoice Date</dt>
                <dd class="col-sm-9">{{ \Carbon\Carbon::parse($purchaseInvoice->invoice_date)->format('Y-m-d') }}</dd>
                <dt class="col-sm-3">Status</dt>
                <dd class="col-sm-9"><span class="badge bg-{{ $purchaseInvoice->status == 'paid' ? 'success' : ($purchaseInvoice->status == 'unpaid' ? 'warning' : 'secondary') }}">{{ ucfirst($purchaseInvoice->status) }}</span></dd>
                <dt class="col-sm-3">Total Amount</dt>
                <dd class="col-sm-9">{{ number_format($purchaseInvoice->total_amount, 2) }}</dd>
            </dl>
            <a href="{{ route('purchase-management.invoices.index') }}" class="btn btn-secondary mt-3"><i class="bi bi-arrow-left"></i> Back</a>
        </div>
    </div>
</div>
@endsection
