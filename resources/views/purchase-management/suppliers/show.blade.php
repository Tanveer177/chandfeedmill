@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mt-4">
        <div class="card-header bg-info text-white">
            <h3 class="mb-0">Supplier Details</h3>
        </div>
        <div class="card-body">
            <dl class="row">
                <dt class="col-sm-3">Name</dt>
                <dd class="col-sm-9">{{ $supplier->name }}</dd>
                <dt class="col-sm-3">Email</dt>
                <dd class="col-sm-9">{{ $supplier->email }}</dd>
                <dt class="col-sm-3">Phone</dt>
                <dd class="col-sm-9">{{ $supplier->phone }}</dd>
                <dt class="col-sm-3">Address</dt>
                <dd class="col-sm-9">{{ $supplier->address }}</dd>
                <dt class="col-sm-3">Company</dt>
                <dd class="col-sm-9">{{ $supplier->company }}</dd>
                <dt class="col-sm-3">Status</dt>
                <dd class="col-sm-9"><span class="badge bg-{{ $supplier->status == 'active' ? 'success' : 'secondary' }}">{{ ucfirst($supplier->status) }}</span></dd>
            </dl>
            <a href="{{ route('purchase-management.suppliers.index') }}" class="btn btn-secondary mt-3"><i class="bi bi-arrow-left"></i> Back</a>
        </div>
    </div>
</div>
@endsection
