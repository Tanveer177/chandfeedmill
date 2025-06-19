@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Inventory Items</h1>
        <a href="{{ route('inventory-items.create') }}" class="btn btn-success"><i class="bi bi-plus-circle"></i> New Item</a>
    </div>
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-info">
                <tr>
                    <th>Name</th>
                    <th>SKU</th>
                    <th>Category</th>
                    <th>Unit</th>
                    <th>Quantity</th>
                    <th>Min Qty</th>
                    <th>Cost Price</th>
                    <th>Sale Price</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td><span class="badge bg-info text-dark">{{ $item->sku }}</span></td>
                    <td><span class="badge bg-secondary">{{ $item->category }}</span></td>
                    <td>{{ $item->unit }}</td>
                    <td><span class="badge bg-primary">{{ number_format($item->quantity, 2) }}</span></td>
                    <td><span class="badge bg-warning text-dark">{{ number_format($item->min_quantity, 2) }}</span></td>
                    <td><span class="badge bg-success">{{ number_format($item->cost_price, 2) }}</span></td>
                    <td><span class="badge bg-danger">{{ number_format($item->sale_price, 2) }}</span></td>
                    <td>{{ $item->description }}</td>
                    <td>
                        <a href="{{ route('inventory-items.edit', $item) }}" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                        <form action="{{ route('inventory-items.destroy', $item) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" type="submit"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $items->links() }}
    </div>
</div>
@endsection
