@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Purchase Order</h1>
    <form action="{{ route('purchase-management.orders.store') }}" method="POST" class="mt-4">
        @csrf
        <div class="mb-3">
            <label for="order_no" class="form-label">Order #</label>
            <input type="text" name="order_no" id="order_no" class="form-control @error('order_no') is-invalid @enderror" value="{{ old('order_no') }}" required>
            @error('order_no')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="supplier_id" class="form-label">Supplier</label>
            <select name="supplier_id" id="supplier_id" class="form-select @error('supplier_id') is-invalid @enderror" required>
                <option value="">Select Supplier</option>
                @foreach($suppliers as $supplier)
                <option value="{{ $supplier->id }}" @if(old('supplier_id')==$supplier->id) selected @endif>{{ $supplier->name }}</option>
                @endforeach
            </select>
            @error('supplier_id')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="order_date" class="form-label">Order Date</label>
            <input type="date" name="order_date" id="order_date" class="form-control @error('order_date') is-invalid @enderror" value="{{ old('order_date', date('Y-m-d')) }}" required>
            @error('order_date')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-select @error('status') is-invalid @enderror">
                <option value="pending" @if(old('status')=='pending' ) selected @endif>Pending</option>
                <option value="completed" @if(old('status')=='completed' ) selected @endif>Completed</option>
                <option value="cancelled" @if(old('status')=='cancelled' ) selected @endif>Cancelled</option>
            </select>
            @error('status')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="total_amount" class="form-label">Total Amount</label>
            <input type="number" step="0.01" name="total_amount" id="total_amount" class="form-control @error('total_amount') is-invalid @enderror" value="{{ old('total_amount') }}" required>
            @error('total_amount')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success"><i class="bi bi-check-circle"></i> Create</button>
        <a href="{{ route('purchase-management.orders.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
