<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>FreshBasket | Berla</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @yield('css-custom-files')
</head>
<body class="min-h-screen bg-mint-50 text-slate-800">
    <header class="sticky top-0 z-40 border-b border-mint-100 bg-white/95 backdrop-blur">
        <div class="fb-container flex items-center justify-between gap-4 py-4">
            <a href="{{ route('storePage') }}" class="flex items-center gap-3">
                <img src="{{ asset('images/logo.png') }}" alt="logo" class="h-10 w-10 rounded-full object-cover">
                <span class="text-xl font-extrabold text-mint-800">FreshBasket</span>
            </a>

            <form method="GET" action="{{ route('product.search') }}" class="hidden flex-1 md:block">
                <input name="query" required placeholder="Search products..."
                    class="w-full rounded-xl border-mint-200 bg-mint-50/60">
            </form>

            <nav class="flex items-center gap-3 text-sm font-semibold">
                <a href="{{ route('allProducts') }}" class="fb-btn-secondary">Products</a>
                <a href="{{ route('user.card') }}" class="fb-btn-secondary">Cart <span id="cart-count" class="ml-1">0</span></a>
                @auth
                    <a href="{{ route('client.notifications') }}" class="fb-btn-secondary">Notifications</a>
                    @if (Auth::user()->role == 'admin' || Auth::user()->role == 'employee')
                        <a href="{{ route('home') }}" class="fb-btn-secondary">Dashboard</a>
                    @endif
                    <a href="{{ route('user.profile') }}" class="fb-btn">My Account</a>
                @else
                    <a href="{{ route('login') }}" class="fb-btn">Login</a>
                @endauth
            </nav>
        </div>
    </header>

    <main class="py-8">
        <div class="fb-container">
            @if ($msg = Session::get('msg'))
                <div class="mb-4 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-green-800">{{ $msg }}</div>
            @endif
            @if ($success = Session::get('success'))
                <div class="mb-4 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-green-800">{{ $success }}</div>
            @endif
            @if (count($errors) > 0)
                <div class="mb-4 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-red-700">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            @yield('content')
        </div>
    </main>

    <footer class="mt-12 border-t border-mint-100 bg-white">
        <div class="fb-container grid gap-6 py-8 md:grid-cols-3">
            <div>
                <h3 class="text-lg font-bold text-mint-900">FreshBasket</h3>
                <p class="mt-2 text-sm text-slate-600">Modern grocery shopping with fresh products and fast checkout.</p>
            </div>
            <div class="text-sm">
                <h4 class="font-semibold">Explore</h4>
                <div class="mt-2 space-y-2">
                    <a class="block text-slate-600 hover:text-mint-700" href="{{ url('/about-us') }}">About Us</a>
                    <a class="block text-slate-600 hover:text-mint-700" href="{{ url('/contact-us') }}">Contact</a>
                    @auth
                        <a class="block text-slate-600 hover:text-mint-700" href="{{ route('user.favorite') }}">Favorites</a>
                        <a class="block text-slate-600 hover:text-mint-700" href="{{ route('user.orders') }}">My Orders</a>
                    @endauth
                </div>
            </div>
            <div class="text-sm">
                <h4 class="font-semibold">Subscribe</h4>
                <form action="{{ route('new-number.store') }}" method="POST" class="mt-2 flex gap-2">
                    @csrf
                    <input name="phone_number" placeholder="Phone number" required class="flex-1 rounded-xl border-mint-200">
                    <button class="fb-btn" type="submit">Join</button>
                </form>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const cart = JSON.parse(localStorage.getItem('cart')) || [];
            const cartCount = document.getElementById('cart-count');
            if (cartCount) cartCount.innerText = cart.length;
        });
    </script>
    @yield('js-custom-files')
</body>
</html>
