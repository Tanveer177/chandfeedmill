@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Ledger Entry</h1>
    <form action="{{ route('ledgers.update', $ledger) }}" method="POST" class="mt-4">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="account_id" class="form-label">Account</label>
            <select name="account_id" id="account_id" class="form-select @error('account_id') is-invalid @enderror" required>
                <option value="">Select Account</option>
                @foreach($accounts as $account)
                <option value="{{ $account->id }}" @if(old('account_id', $ledger->account_id)==$account->id) selected @endif>{{ $account->name }}</option>
                @endforeach
            </select>
            @error('account_id')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" name="date" id="date" class="form-control @error('date') is-invalid @enderror" value="{{ old('date', $ledger->date) }}" required>
            @error('date')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control">{{ old('description', $ledger->description) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="debit" class="form-label">Debit</label>
            <input type="number" step="0.01" name="debit" id="debit" class="form-control @error('debit') is-invalid @enderror" value="{{ old('debit', $ledger->debit) }}" required>
            @error('debit')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="credit" class="form-label">Credit</label>
            <input type="number" step="0.01" name="credit" id="credit" class="form-control @error('credit') is-invalid @enderror" value="{{ old('credit', $ledger->credit) }}" required>
            @error('credit')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success"><i class="bi bi-check-circle"></i> Update</button>
        <a href="{{ route('ledgers.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
