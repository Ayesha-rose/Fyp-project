@extends('admin.master')

@section('adminpanel')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="fw-bold">Notifications</h2>
        <div class="d-flex gap-2">
            <form action="{{ route('admin.notifications.markAllRead') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-success btn-sm">Mark All as Read</button>
            </form>
            <form action="{{ route('admin.notifications.deleteAll') }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Delete All</button>
            </form>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Message</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Actions</th>
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
                        <td class="d-flex gap-2">
                            {{-- Individual Mark as Read --}}
                            @if(!$notification->is_read)
                            <form action="{{ route('admin.notifications.markRead', $notification->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-outline-success">Mark as Read</button>
                            </form>
                            @endif

                            {{-- Individual Delete --}}
                            <form action="{{ route('admin.notifications.delete', $notification->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this notification?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">No notifications yet</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
