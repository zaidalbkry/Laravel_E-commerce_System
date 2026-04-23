@extends('frontend.layout')

@section('content')
    <div class="mx-auto max-w-md rounded-3xl bg-white p-8 shadow-soft">
        <h1 class="text-center text-2xl font-bold text-mint-900">Login</h1>
        <form method="POST" action="{{ route('login') }}" class="mt-6 space-y-4">
            @csrf
            <div>
                <label for="email" class="text-sm font-semibold">Email</label>
                <input id="email" type="email" class="mt-1 w-full rounded-xl border-mint-200" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            </div>

            <div>
                <label for="password" class="text-sm font-semibold">Password</label>
                <input id="password" type="password" class="mt-1 w-full rounded-xl border-mint-200" name="password" required autocomplete="current-password" minlength="8">
            </div>

            <label class="flex items-center gap-2 text-sm">
                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                Remember Me
            </label>

            @include('layouts.alert-error-msgs')

            <button type="submit" class="fb-btn w-full">Login</button>
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="fb-btn-secondary w-full">Create New Account</a>
            @endif
        </form>
    </div>
@endsection
