@extends('frontend.layout')

@section('css-custom-files')
@endsection

@section('js-custom-files')
@endsection

@section('content')
    <!-- Start slides -->
    <div id="slides" class="cover-slides">
        <ul class="slides-container">
            <li class="text-center">
                <img src="images/slider-01.jpg" alt="" />
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20">
                                <strong>Welcome To <br />
                                    Berla Store</strong>
                            </h1>
                            <p class="m-b-40">
                                Immerse yourself in a world of exquisite tastes and
                                <br />
                                culinary delights with our premium offerings.
                            </p>
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-center">
                <img src="images/slider-02.jpg" alt="" />
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20">
                                <strong>Savor the Finest
                                    <br />
                                    Selections at Pearla</strong>
                            </h1>
                            <p class="m-b-40">
                                Enjoy a shopping experience like no other, where you can find
                                the
                                <br />
                                finest selections to enhance your culinary creations.
                            </p>
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-center">
                <img src="images/slider-03.jpg" alt="" />
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20">
                                <strong>Discover Fresh
                                    <br />
                                    Flavors at Pearla</strong>
                            </h1>
                            <p class="m-b-40">
                                Explore a variety of fresh and high-quality ingredients
                                <br />
                                that will elevate your cooking experience.
                            </p>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
        <div class="slides-navigation">
            <a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
            <a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
        </div>
    </div>
    <!-- End slides -->

    <!-- Start Menu -->
    <div class="menu-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading-title text-center">
                        <h2>Best Products</h2>
                        <p>
                            Discover a world of culinary excellence in our All Products
                            section at Pearla. From premium oils and vinegars to handcrafted
                            pastas and decadent sweets, our curated selection promises to
                            elevate your culinary creations. Explore a diverse array of
                            gourmet treasures sourced from around the globe and indulge in
                            the finest flavors and ingredients.
                        </p>
                    </div>
                </div>
            </div>
        
            
            <div class="row special-list">
   
                    @foreach ($products as $product)
                        <div class="col-lg-4 col-md-6 special-grid">
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
           
        </div>
    </div>
    <!-- End Menu -->
@endsection
