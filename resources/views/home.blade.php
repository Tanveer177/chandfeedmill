@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Welcome to Feedmill ERP</h1>
            <p>Select a module from the sidebar or use the quick links below:</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 mb-3">
            <a href="{{ route('accounts.index') }}" class="card card-body text-center text-decoration-none">Accounts</a>
        </div>
        <div class="col-md-3 mb-3">
            <a href="{{ route('inventory-items.index') }}" class="card card-body text-center text-decoration-none">Inventory</a>
        </div>
        <div class="col-md-3 mb-3">
            <a href="{{ route('suppliers.index') }}" class="card card-body text-center text-decoration-none">Suppliers</a>
        </div>
        <div class="col-md-3 mb-3">
            <a href="{{ route('production-batches.index') }}" class="card card-body text-center text-decoration-none">Production</a>
        </div>
    </div>
</div>
@endsection
