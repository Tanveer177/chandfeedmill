@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Vouchers</h1>
        <a href="{{ route('vouchers.create') }}" class="btn btn-success"><i class="bi bi-plus-circle"></i> New Voucher</a>
    </div>
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-warning">
                <tr>
                    <th>Voucher No</th>
                    <th>Date</th>
                    <th>Type</th>
                    <th>Amount</th>
                    <th>Created By</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($vouchers as $voucher)
                <tr>
                    <td><span class="badge bg-info text-dark">{{ $voucher->voucher_no }}</span></td>
                    <td>{{ $voucher->date }}</td>
                    <td><span class="badge bg-secondary">{{ ucfirst($voucher->type) }}</span></td>
                    <td><span class="badge bg-success">{{ number_format($voucher->amount, 2) }}</span></td>
                    <td>{{ $voucher->creator->name ?? '-' }}</td>
                    <td>{{ $voucher->description }}</td>
                    <td>
                        <a href="{{ route('vouchers.edit', $voucher) }}" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                        <form action="{{ route('vouchers.destroy', $voucher) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" type="submit"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $vouchers->links() }}
    </div>
</div>
@endsection
