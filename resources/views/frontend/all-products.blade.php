@extends('frontend.layout')

@section('content')
    <section class="mb-8 rounded-2xl bg-white p-6 shadow-soft">
        <h1 class="text-2xl font-bold text-mint-900">All Products</h1>
        <form method="GET" action="{{ route('products.filtered') }}" class="mt-4 grid gap-3 md:grid-cols-5">
            <select name="category" class="rounded-xl border-mint-200">
                <option value="">All Categories</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <input type="number" name="min_price" class="rounded-xl border-mint-200" placeholder="Min Price">
            <input type="number" name="max_price" class="rounded-xl border-mint-200" placeholder="Max Price">
            <select name="sort_by" class="rounded-xl border-mint-200">
                <option value="">Sort by</option>
                <option value="price_asc">Price: Low to High</option>
                <option value="price_desc">Price: High to Low</option>
                <option value="newest">Newest</option>
            </select>
            <button type="submit" class="fb-btn">Apply Filters</button>
        </form>
    </section>

    @foreach ($categories as $category)
        <section class="mb-10">
            <h2 class="mb-4 text-xl font-bold text-mint-900">{{ $category->name }}</h2>
            <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($category->products as $product)
                    <article class="fb-card">
                        <img src="{{ asset('storage/' . ($product->image ?? 'default.jpg')) }}" alt="{{ $product->name }}" class="h-52 w-full rounded-xl object-cover">
                        <h3 class="mt-4 text-lg font-bold">{{ $product->name }}</h3>
                        <p class="text-mint-700">${{ $product->price }}</p>
                        <a href="{{ route('product.show', $product->id) }}" class="fb-btn mt-4 w-full">Show Product</a>
                    </article>
                @endforeach
            </div>
        </section>
    @endforeach

    <div class="mt-6">
        {{ $products->links() }}
        </div>
@endsection
