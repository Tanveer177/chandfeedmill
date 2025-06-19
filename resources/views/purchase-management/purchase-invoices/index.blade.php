@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Purchase Invoices</h1>
        <a href="{{ route('purchase-management.invoices.create') }}" class="btn btn-success"><i class="bi bi-plus-circle"></i> New Purchase Invoice</a>
    </div>
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-info">
                <tr>
                    <th>Invoice #</th>
                    <th>Supplier</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Total Amount</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($purchaseInvoices as $invoice)
                <tr>
                    <td>{{ $invoice->invoice_no }}</td>
                    <td>{{ $invoice->purchaseOrder->supplier->name ?? '-' }}</td>
                    <td>{{ \Carbon\Carbon::parse($invoice->invoice_date)->format('Y-m-d') }}</td>
                    <td><span class="badge bg-{{ $invoice->status == 'paid' ? 'success' : ($invoice->status == 'unpaid' ? 'warning' : 'secondary') }}">{{ ucfirst($invoice->status) }}</span></td>
                    <td>{{ number_format($invoice->total_amount, 2) }}</td>
                    <td>
                        <a href="{{ route('purchase-management.invoices.show', $invoice) }}" class="btn btn-sm btn-info" title="View"><i class="bi bi-eye"></i></a>
                        <a href="{{ route('purchase-management.invoices.edit', $invoice) }}" class="btn btn-sm btn-warning" title="Edit"><i class="bi bi-pencil-square"></i></a>
                        <form action="{{ route('purchase-management.invoices.destroy', $invoice) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" type="submit" title="Delete"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $purchaseInvoices->links() }}
    </div>
</div>
@endsection
