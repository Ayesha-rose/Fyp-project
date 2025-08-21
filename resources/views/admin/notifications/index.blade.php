@extends('admin.master')

@section('adminpanel')
<div class="col-md-12 main-content">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Notifications</h2>
        <div class="d-flex gap-2">
            <form action="{{ route('admin.notifications.markAllRead') }}" method="POST">
                @csrf
                <button class="btn text-white px-4 pt-2" style="background-color: #015F9E;">All Read</button>
            </form>
            <form action="{{ route('admin.notifications.deleteAll') }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger px-4 pt-2">Delete All</button>
            </form>
        </div>
    </div>

    <table class="table table-bordered">
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
                <td style="display: flex; gap: 5px;  justify-content: center;">
                    @if(!$notification->is_read)
                    <form action="{{ route('admin.notifications.markRead', $notification->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-outline-primary">Read</button>
                    </form>
                    @endif

                    <form action="{{ route('admin.notifications.delete', $notification->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this notification?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td class="text-center">No notifications yet</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection