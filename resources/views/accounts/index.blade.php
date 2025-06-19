@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Accounts</h1>
        <a href="{{ route('accounts.create') }}" class="btn btn-success"><i class="bi bi-plus-circle"></i> New Account</a>
    </div>
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-primary">
                <tr>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Type</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($accounts as $account)
                <tr>
                    <td>{{ $account->name }}</td>
                    <td><span class="badge bg-info text-dark">{{ $account->code }}</span></td>
                    <td><span class="badge bg-secondary">{{ ucfirst($account->type) }}</span></td>
                    <td>{{ $account->description }}</td>
                    <td>
                        <a href="{{ route('accounts.edit', $account) }}" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                        <form action="{{ route('accounts.destroy', $account) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" type="submit"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $accounts->links() }}
    </div>
</div>
@endsection
