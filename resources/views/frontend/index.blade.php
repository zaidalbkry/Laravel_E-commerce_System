@extends('frontend.layout')

@section('content')
    <section class="grid gap-6 rounded-3xl bg-gradient-to-br from-mint-100 to-cream p-8 md:grid-cols-2 md:p-12">
        <div class="space-y-4">
            <p class="inline-block rounded-full bg-white px-4 py-1 text-sm font-semibold text-mint-700">Fresh daily picks</p>
            <h1 class="text-3xl font-extrabold leading-tight text-mint-900 md:text-5xl">Healthy groceries, modern experience.</h1>
            <p class="text-slate-600">Discover premium products curated for quality, fast ordering, and a smoother shopping flow.</p>
            <a href="{{ route('allProducts') }}" class="fb-btn">Browse products</a>
        </div>
        <img src="{{ asset('images/slider-01.jpg') }}" alt="Fresh products" class="h-72 w-full rounded-2xl object-cover shadow-soft">
    </section>

    <section class="mt-10">
        <div class="mb-6 flex items-end justify-between">
            <h2 class="text-2xl font-bold text-mint-900">Best Products</h2>
            <a href="{{ route('allProducts') }}" class="text-sm font-semibold text-mint-700">View all</a>
        </div>
        <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($products as $product)
                <article class="fb-card">
                    <img src="{{ asset('storage/' . ($product->image ?? 'default.jpg')) }}" alt="{{ $product->name }}" class="h-52 w-full rounded-xl object-cover">
                    <h3 class="mt-4 text-lg font-bold text-slate-800">{{ $product->name }}</h3>
                    <p class="mt-1 text-mint-700">${{ $product->price }}</p>
                    <a href="{{ route('product.show', $product->id) }}" class="fb-btn mt-4 w-full">Show Product</a>
                </article>
            @endforeach
        </div>
    </section>
@endsection
