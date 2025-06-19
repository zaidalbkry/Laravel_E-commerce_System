@extends('frontend.layout')

@section('css-custom-files')
    <style>
        .wrapper {
            width: 95%;
            text-align: center;
            margin: 35px 0px;
        }

        .wrapper #products {
            display: grid;
            grid-template-columns: auto auto auto;
            grid-column-gap: 1.5em;
            padding: 2em 0;
            justify-content: space-evenly;
        }

        .wrapper .card {
            background-color: #ffffff;
            max-width: 18em;
            margin-top: 1em;
            padding: 1em;
            border-radius: 5px;
            box-shadow: 1em 2em 2.5em rgba(1, 2, 68, 0.08);
        }

        .wrapper img {
            max-width: 100%;
            object-fit: contain;
            height: 15em;
        }

        .wrapper .container {
            padding-top: 1em;
            color: #110f29;
        }
    </style>
@endsection

@section('content')
    <!-- ✅ عنوان صفحة البحث -->
    <div class="all-page-title page-breadcrumb">
        <div class="container text-center">
            <div class="row">
                <div class="col-lg-12">
                    <h1>نتائج البحث</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        @if($products->isEmpty())
            <p>لم يتم العثور على منتجات مطابقة.</p>
        @else
            <div class="wrapper">
                <div class="row">
                    @foreach ($products as $product)
                    <div class="col-lg-4 col-md-6 special-grid">
                        <div class="gallery-single fix">
                            <div class="image-container">
                                <img src="{{ asset('storage/' . ($product->image ?? 'default.jpg')) }}" alt="{{ $product->name }}">
                            </div>
                            <div class="why-text">
                                <h5>{{ $product->name }}</h5>
                                <h5>${{ $product->price }}</h5>
                                <a href="{{ route('product.show', $product->id) }}" class="show-product">Show Product</a>
                            </div>
                        </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
@endsection
