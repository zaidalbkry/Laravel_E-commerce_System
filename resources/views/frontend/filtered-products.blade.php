@extends('frontend.layout')

@section('content')
    <div class="container">
        <!-- ✅ عنوان الصفحة -->
        <h1 class="text-center mt-4">Filtered Products</h1>

        <!-- ✅ عرض المنتجات بنفس تصميم صفحة جميع المنتجات -->
        <div class="row">
            @forelse ($products as $product)
                <div class="col-lg-4 col-md-6 special-grid {{ Str::slug($product->category->name) }}">
                    <div class="gallery-single fix">
                        <img src="{{ asset('storage/' . ($product->image ?? 'default.jpg')) }}" class="img-fluid" alt="{{ $product->name }}" />
                        <div class="why-text">
                            <h4>{{ $product->name }}</h4>
                            <h5>${{ $product->price }}</h5>
                            <a href="{{ route('product.show', $product->id) }}" class="show-product">Show Product</a>
                        </div>
                    </div>
                </div>
            @empty
                <p class="alert alert-warning w-100 text-center">No products match your filter criteria.</p>
            @endforelse
        </div>

        <!-- ✅ عرض التصفح بالصفحات -->
        <div class="d-flex justify-content-center mt-4">
            {{ $products->links() }}
        </div>
    </div>
@endsection
