@extends('frontend.layout')

@section('css-custom-files')
@endsection

@section('content')
    <h2 class="mb-6 text-2xl font-bold text-mint-900">Favorite Products</h2>

    <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
        @if($favorites->isEmpty())
            <p class="rounded-xl bg-yellow-50 px-4 py-3 text-yellow-800">No favorite products found.</p>
        @else
            @foreach($favorites as $favorite)
                <article class="fb-card">
                    <img src="{{ asset('storage/' . $favorite->product->image) }}" alt="{{ $favorite->product->name }}" class="h-52 w-full rounded-xl object-cover">
                    <h3 class="mt-4 text-lg font-bold">{{ $favorite->product->name }}</h3>
                    <p class="text-mint-700">Price: ${{ $favorite->product->price }}</p>
                    <form action="{{ route('favorite.remove') }}" method="POST" class="mt-4">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $favorite->product->id }}">
                        <button type="submit" class="w-full rounded-xl bg-red-600 px-4 py-2 font-semibold text-white hover:bg-red-700">Remove</button>
                    </form>
                </article>
            @endforeach
        @endif
        </div>
@endsection
