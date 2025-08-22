@extends('admin.master')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/adminpanel.css') }}">
@endsection

@section('adminpanel')
<div class="col-md-12 main-content">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>All Users</h2>

    </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Registered At</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at->format('d M Y, h:i A') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center">No users found</td>
                </tr>
                @endforelse
            </tbody>
        </table>

    </div>
</div>

@stop