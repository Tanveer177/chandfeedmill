@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Account</h1>
    <form action="{{ route('accounts.store') }}" method="POST" class="mt-4">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="code" class="form-label">Code</label>
            <input type="text" name="code" id="code" class="form-control @error('code') is-invalid @enderror" value="{{ old('code') }}" required>
            @error('code')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <select name="type" id="type" class="form-select @error('type') is-invalid @enderror" required>
                <option value="">Select Type</option>
                <option value="asset" @if(old('type')=='asset' ) selected @endif>Asset</option>
                <option value="liability" @if(old('type')=='liability' ) selected @endif>Liability</option>
                <option value="income" @if(old('type')=='income' ) selected @endif>Income</option>
                <option value="expense" @if(old('type')=='expense' ) selected @endif>Expense</option>
                <option value="equity" @if(old('type')=='equity' ) selected @endif>Equity</option>
            </select>
            @error('type')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
        </div>
        <button type="submit" class="btn btn-success"><i class="bi bi-check-circle"></i> Create</button>
        <a href="{{ route('accounts.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
