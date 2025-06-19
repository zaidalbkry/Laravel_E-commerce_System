@extends('frontend.layout')
@section('content')
<div class="container mt-4">
    <h4>🔔 Notifications</h4>
    <ul class="list-group">
        @forelse($notifications as $note)
            <li class="list-group-item {{ $note->is_read ? '' : 'fw-bold' }}">
                <strong>{{ $note->title }}</strong><br>
                {{ $note->body }}<br>
                <small class="text-muted">{{ $note->created_at->diffForHumans() }}</small>
            </li>
        @empty
            <li class="list-group-item text-muted">No notifications found.</li>
        @endforelse
    </ul>
</div>
@endsection