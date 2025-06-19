@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Suppliers</h1>
        <a href="{{ route('purchase-management.suppliers.create') }}" class="btn btn-success"><i class="bi bi-plus-circle"></i> New Supplier</a>
    </div>
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-info">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Company</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($suppliers as $supplier)
                <tr>
                    <td>{{ $supplier->name }}</td>
                    <td>{{ $supplier->email }}</td>
                    <td>{{ $supplier->phone }}</td>
                    <td>{{ $supplier->company }}</td>
                    <td><span class="badge bg-{{ $supplier->status == 'active' ? 'success' : 'secondary' }}">{{ ucfirst($supplier->status) }}</span></td>
                    <td>
                        <a href="{{ route('purchase-management.suppliers.show', $supplier) }}" class="btn btn-sm btn-info" title="View"><i class="bi bi-eye"></i></a>
                        <a href="{{ route('purchase-management.suppliers.edit', $supplier) }}" class="btn btn-sm btn-warning" title="Edit"><i class="bi bi-pencil-square"></i></a>
                        <form action="{{ route('purchase-management.suppliers.destroy', $supplier) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" type="submit" title="Delete"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $suppliers->links() }}
    </div>
</div>
@endsection
