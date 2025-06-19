@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Voucher</h1>
    <form action="{{ route('vouchers.store') }}" method="POST" class="mt-4">
        @csrf
        <div class="mb-3">
            <label for="voucher_no" class="form-label">Voucher No</label>
            <input type="text" name="voucher_no" id="voucher_no" class="form-control @error('voucher_no') is-invalid @enderror" value="{{ old('voucher_no') }}" required>
            @error('voucher_no')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" name="date" id="date" class="form-control @error('date') is-invalid @enderror" value="{{ old('date') }}" required>
            @error('date')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <select name="type" id="type" class="form-select @error('type') is-invalid @enderror" required>
                <option value="">Select Type</option>
                <option value="payment" @if(old('type')=='payment' ) selected @endif>Payment</option>
                <option value="receipt" @if(old('type')=='receipt' ) selected @endif>Receipt</option>
                <option value="journal" @if(old('type')=='journal' ) selected @endif>Journal</option>
                <option value="contra" @if(old('type')=='contra' ) selected @endif>Contra</option>
            </select>
            @error('type')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="amount" class="form-label">Amount</label>
            <input type="number" step="0.01" name="amount" id="amount" class="form-control @error('amount') is-invalid @enderror" value="{{ old('amount') }}" required>
            @error('amount')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="created_by" class="form-label">Created By</label>
            <select name="created_by" id="created_by" class="form-select @error('created_by') is-invalid @enderror" required>
                <option value="">Select User</option>
                @foreach($users as $user)
                <option value="{{ $user->id }}" @if(old('created_by')==$user->id) selected @endif>{{ $user->name }}</option>
                @endforeach
            </select>
            @error('created_by')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
        </div>
        <button type="submit" class="btn btn-success"><i class="bi bi-check-circle"></i> Create</button>
        <a href="{{ route('vouchers.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
