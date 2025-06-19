@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Account</h1>
    <form action="{{ route('accounts.update', $account) }}" method="POST" class="mt-4">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $account->name) }}" required>
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="code" class="form-label">Code</label>
            <input type="text" name="code" id="code" class="form-control @error('code') is-invalid @enderror" value="{{ old('code', $account->code) }}" required>
            @error('code')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <select name="type" id="type" class="form-select @error('type') is-invalid @enderror" required>
                <option value="">Select Type</option>
                <option value="asset" @if(old('type', $account->type)=='asset') selected @endif>Asset</option>
                <option value="liability" @if(old('type', $account->type)=='liability') selected @endif>Liability</option>
                <option value="income" @if(old('type', $account->type)=='income') selected @endif>Income</option>
                <option value="expense" @if(old('type', $account->type)=='expense') selected @endif>Expense</option>
                <option value="equity" @if(old('type', $account->type)=='equity') selected @endif>Equity</option>
            </select>
            @error('type')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control">{{ old('description', $account->description) }}</textarea>
        </div>
        <button type="submit" class="btn btn-success"><i class="bi bi-check-circle"></i> Update</button>
        <a href="{{ route('accounts.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
