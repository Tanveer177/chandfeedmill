@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Inventory Item</h1>
    <form action="{{ route('inventory-items.update', $item) }}" method="POST" class="mt-4">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $item->name) }}" required>
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="sku" class="form-label">SKU</label>
            <input type="text" name="sku" id="sku" class="form-control @error('sku') is-invalid @enderror" value="{{ old('sku', $item->sku) }}" required>
            @error('sku')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <input type="text" name="category" id="category" class="form-control @error('category') is-invalid @enderror" value="{{ old('category', $item->category) }}">
            @error('category')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="unit" class="form-label">Unit</label>
            <input type="text" name="unit" id="unit" class="form-control @error('unit') is-invalid @enderror" value="{{ old('unit', $item->unit) }}" required>
            @error('unit')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" step="0.01" name="quantity" id="quantity" class="form-control @error('quantity') is-invalid @enderror" value="{{ old('quantity', $item->quantity) }}" required>
            @error('quantity')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="min_quantity" class="form-label">Min Quantity</label>
            <input type="number" step="0.01" name="min_quantity" id="min_quantity" class="form-control @error('min_quantity') is-invalid @enderror" value="{{ old('min_quantity', $item->min_quantity) }}" required>
            @error('min_quantity')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="cost_price" class="form-label">Cost Price</label>
            <input type="number" step="0.01" name="cost_price" id="cost_price" class="form-control @error('cost_price') is-invalid @enderror" value="{{ old('cost_price', $item->cost_price) }}" required>
            @error('cost_price')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="sale_price" class="form-label">Sale Price</label>
            <input type="number" step="0.01" name="sale_price" id="sale_price" class="form-control @error('sale_price') is-invalid @enderror" value="{{ old('sale_price', $item->sale_price) }}" required>
            @error('sale_price')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control">{{ old('description', $item->description) }}</textarea>
        </div>
        <button type="submit" class="btn btn-success"><i class="bi bi-check-circle"></i> Update</button>
        <a href="{{ route('inventory-items.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
