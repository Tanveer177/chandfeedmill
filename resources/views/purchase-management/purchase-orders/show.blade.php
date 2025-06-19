@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mt-4">
        <div class="card-header bg-info text-white">
            <h3 class="mb-0">Purchase Order Details</h3>
        </div>
        <div class="card-body">
            <dl class="row">
                <dt class="col-sm-3">Order #</dt>
                <dd class="col-sm-9">{{ $purchaseOrder->order_number }}</dd>
                <dt class="col-sm-3">Supplier</dt>
                <dd class="col-sm-9">{{ $purchaseOrder->supplier->name ?? '-' }}</dd>
                <dt class="col-sm-3">Order Date</dt>
                <dd class="col-sm-9">{{ \Carbon\Carbon::parse($purchaseOrder->order_date)->format('Y-m-d') }}</dd>
                <dt class="col-sm-3">Status</dt>
                <dd class="col-sm-9"><span class="badge bg-{{ $purchaseOrder->status == 'completed' ? 'success' : ($purchaseOrder->status == 'pending' ? 'warning' : 'secondary') }}">{{ ucfirst($purchaseOrder->status) }}</span></dd>
                <dt class="col-sm-3">Total Amount</dt>
                <dd class="col-sm-9">{{ number_format($purchaseOrder->total_amount, 2) }}</dd>
            </dl>
            <a href="{{ route('purchase-management.orders.index') }}" class="btn btn-secondary mt-3"><i class="bi bi-arrow-left"></i> Back</a>
        </div>
    </div>
</div>
@endsection
