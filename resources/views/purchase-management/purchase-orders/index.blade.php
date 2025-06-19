@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Purchase Orders</h1>
        <a href="{{ route('purchase-management.orders.create') }}" class="btn btn-success"><i class="bi bi-plus-circle"></i> New Purchase Order</a>
    </div>
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-info">
                <tr>
                    <th>Order #</th>
                    <th>Supplier</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Total Amount</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($purchaseOrders as $order)
                <tr>
                    <td>{{ $order->order_no }}</td>
                    <td>{{ $order->supplier->name ?? '-' }}</td>
                    <td>{{ \Carbon\Carbon::parse($order->order_date)->format('Y-m-d') }}</td>
                    <td><span class="badge bg-{{ $order->status == 'completed' ? 'success' : ($order->status == 'pending' ? 'warning' : 'secondary') }}">{{ ucfirst($order->status) }}</span></td>
                    <td>{{ number_format($order->total_amount, 2) }}</td>
                    <td>
                        <a href="{{ route('purchase-management.orders.show', $order) }}" class="btn btn-sm btn-info" title="View"><i class="bi bi-eye"></i></a>
                        <a href="{{ route('purchase-management.orders.edit', $order) }}" class="btn btn-sm btn-warning" title="Edit"><i class="bi bi-pencil-square"></i></a>
                        <form action="{{ route('purchase-management.orders.destroy', $order) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" type="submit" title="Delete"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $purchaseOrders->links() }}
    </div>
</div>
@endsection
