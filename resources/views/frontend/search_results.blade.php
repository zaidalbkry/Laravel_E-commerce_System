@extends('frontend.layout')

@section('content')
    <h1 class="mb-6 text-2xl font-bold text-mint-900">Search Results</h1>
    @if($products->isEmpty())
        <p class="rounded-xl bg-yellow-50 px-4 py-3 text-yellow-800">No matching products found.</p>
    @else
        <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($products as $product)
                <article class="fb-card">
                    <img src="{{ asset('storage/' . ($product->image ?? 'default.jpg')) }}" alt="{{ $product->name }}" class="h-52 w-full rounded-xl object-cover">
                    <h3 class="mt-4 text-lg font-bold">{{ $product->name }}</h3>
                    <p class="text-mint-700">${{ $product->price }}</p>
                    <a href="{{ route('product.show', $product->id) }}" class="fb-btn mt-4 w-full">Show Product</a>
                </article>
            @endforeach
        </div>
    @endif
@endsection
