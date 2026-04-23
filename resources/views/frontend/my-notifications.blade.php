@extends('frontend.layout')
@section('content')
<div class="mx-auto max-w-3xl">
    <h4 class="mb-4 text-2xl font-bold text-mint-900">Notifications</h4>
    <ul class="space-y-3">
        @forelse($notifications as $note)
            <li class="rounded-xl border border-mint-100 bg-white p-4 shadow-soft {{ $note->is_read ? '' : 'font-semibold' }}">
                <strong>{{ $note->title }}</strong>
                <p class="mt-1 text-slate-700">{{ $note->body }}</p>
                <small class="text-slate-500">{{ $note->created_at->diffForHumans() }}</small>
            </li>
        @empty
            <li class="rounded-xl bg-mint-50 px-4 py-3 text-slate-600">No notifications found.</li>
        @endforelse
    </ul>
</div>
@endsection