@extends('admin.master')

@section('adminpanel')
<div class="container mt-4">
    <h2 class="fw-bold">Notifications</h2>
    <div class="card mt-3">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Message</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($notifications as $notification)
                        <tr>
                            <td>{{ $notification->title }}</td>
                            <td>{{ $notification->message }}</td>
                            <td>{{ $notification->created_at->format('d M, Y h:i A') }}</td>
                            <td>
                                @if($notification->is_read)
                                    <span class="badge bg-success">Read</span>
                                @else
                                    <span class="badge bg-danger">Unread</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">No notifications yet</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
