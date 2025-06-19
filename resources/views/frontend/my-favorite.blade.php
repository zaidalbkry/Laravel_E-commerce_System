@extends('frontend.layout')

@section('css-custom-files')
@endsection

@section('content')
    <div class="container my-5">
        <h2 class="mb-4 text-center">❤️ Favorite Products</h2>

        <div class="row">
            @if($favorites->isEmpty())
                <p class="alert alert-warning w-100 text-center">No favorite products found.</p>
            @else
                @foreach($favorites as $favorite)
                    <div class="col-md-4 mb-3">
                        <div class="card shadow-sm">
                            <img src="{{ asset('storage/' . $favorite->product->image) }}" alt="{{ $favorite->product->name }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $favorite->product->name }}</h5>
                                <p class="card-text"><strong>Price:</strong> ${{ $favorite->product->price }}</p>
                                <form action="{{ route('favorite.remove') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $favorite->product->id }}">
                                    <button type="submit" class="btn btn-danger btn-sm">❌ Remove</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
