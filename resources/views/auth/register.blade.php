@extends('frontend.layout')

@section('content')
    <div class="mx-auto max-w-xl rounded-3xl bg-white p-8 shadow-soft">
        <h1 class="text-center text-2xl font-bold text-mint-900">Create Account</h1>
        <form method="POST" action="{{ route('register') }}" class="mt-6 grid gap-4 md:grid-cols-2">
            @csrf
            <div class="md:col-span-1">
                <label for="name" class="text-sm font-semibold">Full Name</label>
                <input id="name" type="text" class="mt-1 w-full rounded-xl border-mint-200" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus minlength="6">
            </div>

            <div class="md:col-span-1">
                <label for="email" class="text-sm font-semibold">Email</label>
                <input id="email" type="email" class="mt-1 w-full rounded-xl border-mint-200" name="email" value="{{ old('email') }}" required autocomplete="email">
            </div>

            <div class="md:col-span-1">
                <label for="password" class="text-sm font-semibold">Password</label>
                <input id="password" type="password" class="mt-1 w-full rounded-xl border-mint-200" name="password" required autocomplete="current-password" minlength="8">
            </div>

            <div class="md:col-span-1">
                <label for="password-confirm" class="text-sm font-semibold">Confirm Password</label>
                <input id="password-confirm" type="password" class="mt-1 w-full rounded-xl border-mint-200" name="password_confirmation" required autocomplete="new-password" minlength="8">
            </div>

            <div class="md:col-span-2">
                @include('layouts.alert-error-msgs')
                <button type="submit" class="fb-btn w-full">Create Account</button>
                <a href="{{ route('login') }}" class="fb-btn-secondary mt-3 w-full">Login</a>
            </div>
        </form>
    </div>
@endsection
