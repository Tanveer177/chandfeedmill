@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Ledgers</h1>
        <a href="{{ route('ledgers.create') }}" class="btn btn-success"><i class="bi bi-plus-circle"></i> New Ledger Entry</a>
    </div>
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-info">
                <tr>
                    <th>Date</th>
                    <th>Account</th>
                    <th>Description</th>
                    <th>Debit</th>
                    <th>Credit</th>
                    <th>Balance</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ledgers as $ledger)
                <tr>
                    <td>{{ $ledger->date }}</td>
                    <td>{{ $ledger->account->name ?? '-' }}</td>
                    <td>{{ $ledger->description }}</td>
                    <td><span class="badge bg-success">{{ number_format($ledger->debit, 2) }}</span></td>
                    <td><span class="badge bg-danger">{{ number_format($ledger->credit, 2) }}</span></td>
                    <td><span class="badge bg-primary">{{ number_format($ledger->balance, 2) }}</span></td>
                    <td>
                        <a href="{{ route('ledgers.edit', $ledger) }}" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                        <form action="{{ route('ledgers.destroy', $ledger) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" type="submit"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $ledgers->links() }}
    </div>
</div>
@endsection
