@extends('frontend.layout')

@section('css-custom-files')
    <style>
 .floating-button {
    position: fixed;
    bottom: 20px;
    left: 20px;
    background-color: #007bff;
    color: white;
    padding: 12px 20px;
    border-radius: 50px;
    cursor: pointer;
    border: none;
    font-size: 16px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
    z-index: 1000; /* ✅ جعل الزر فوق جميع العناصر الأخرى */
}

.filter-popup {
    display: none;
    position: fixed;
    top: 5px;
    left: 20px;
    background: white;
    padding: 20px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
    border-radius: 10px;
    width: 300px;
    z-index: 1000; /* ✅ جعل النافذة فوق جميع العناصر */
}

.filter-form h3 {
    margin-bottom: 10px;
}

.filter-popup .form-control {
    margin-bottom: 10px;
}

        .wrapper {
            width: 95%;
            text-align: center;
            margin: 35px 0px;
        }

        .wrapper #search-container {
            margin: 1em 0;
        }

        .wrapper #search-container input {
            background-color: transparent;
            width: 40%;
            border: 2px solid #ddd;
            padding: 1em 0.3em;
        }

        .wrapper #search-container input:focus {
            border: 2px solid #d0a772 !important;
            outline: 0px !important;
            box-shadow: none !important;
        }

        .wrapper #search-container button {
            padding: 1em 2em;
            margin-left: 1em;
            background-color: #d0a772;
            color: #ffffff;
            border-radius: 5px;
            margin-top: 0.5em;
            border: 0px;
            outline: 0px;
            box-shadow: none;
            cursor: pointer;
        }

        .wrapper .button-value {
            border: 2px solid #d0a772;
            padding: 1em 2.2em;
            border-radius: 3em;
            background-color: transparent;
            color: #d0a772;
            cursor: pointer;
        }

        .wrapper .active {
            background-color: #d0a772;
            color: #ffffff;
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

        .wrapper .image-container {
            text-align: center;
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

        .wrapper .container h5 {
            font-weight: 500;
        }

        .wrapper .hide {
            display: none;
        }

        @media screen and (max-width: 720px) {
            .wrapper img {
                max-width: 100%;
                object-fit: contain;
                height: 10em;
            }

            .wrapper .card {
                max-width: 10em;
                margin-top: 1em;
            }

            .wrapper #products {
                grid-template-columns: auto auto;
                grid-column-gap: 1em;
            }
        }
    </style>
@endsection

@section('js-custom-files')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("filter-btn").addEventListener("click", function () {
        document.getElementById("filter-popup").style.display = "block";
    });

    document.getElementById("close-popup").addEventListener("click", function () {
        document.getElementById("filter-popup").style.display = "none";
    });
});

        document.addEventListener("DOMContentLoaded", function () {
            document.getElementById("filter-form").addEventListener("submit", function (event) {
                event.preventDefault();
                let category = document.querySelector("select[name='category']").value;
                let minPrice = document.querySelector("input[name='min_price']").value;
                let maxPrice = document.querySelector("input[name='max_price']").value;
                let sortBy = document.querySelector("select[name='sort_by']").value;

              let queryString = "?category=" + category + "&min_price=" + minPrice + "&max_price=" + maxPrice + "&sort_by=" + sortBy;
                window.location.href = "{{ route('products.index3') }}" + queryString;

            });
        });
    </script>
@endsection

@section('content')
    <!-- Start All Pages -->
    <div class="all-page-title page-breadcrumb">
        <div class="container text-center">
            <div class="row">
                <div class="col-lg-12">
                    <h1>All Products</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Pages -->
   <br>
   <button id="filter-btn" class="floating-button">Filter</button>
<div id="filter-popup" class="filter-popup">
    <form method="GET" action="{{ route('products.filtered') }}" class="filter-form">
        <h3>Filter Products</h3>
        <label>Category</label>
        <select name="category" class="form-control">
            <option value="">All Categories</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>

        <label>Min Price</label>
        <input type="number" name="min_price" class="form-control" placeholder="Min Price">

        <label>Max Price</label>
        <input type="number" name="max_price" class="form-control" placeholder="Max Price">

        <label>Sort By</label>
        <select name="sort_by" class="form-control">
            <option value="">Sort by</option>
            <option value="price_asc">Price: Low to High</option>
            <option value="price_desc">Price: High to Low</option>
            <option value="newest">Newest</option>
        </select>

        <button type="submit" class="btn btn-primary mt-3">Apply Filters</button>
        <button type="button" id="close-popup" class="btn btn-secondary mt-2">Close</button>
    </form>
</div>



        @foreach ($categories as $category)
            <h2 class="mt-4 fw-bold" style="font-weight: bold !important; font-size:30px !important">{{ $category->name }}</h2>
            <div class="row">
                @foreach ($category->products as $product)
                    <div class="col-lg-4 col-md-6 special-grid {{ Str::slug($category->name) }}">
                        <div class="gallery-single fix">
                            <img src="{{ asset('storage/' . ($product->image ?? 'default.jpg')) }}" class="img-fluid" alt="{{ $product->name }}" />
                            <div class="why-text">
                                <h4>{{ $product->name }}</h4>
                                <h5>${{ $product->price }}</h5>
                                <a href="{{ route('product.show', $product->id) }}" class="show-product">Show Product</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach

        <!-- ✅ عرض التصفح بالصفحات -->
        <div class="d-flex justify-content-center mt-4">
            {{ $products->links() }}
        </div>
    </div>
@endsection
