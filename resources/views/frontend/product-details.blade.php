@extends('frontend.layout')

@section('css-custom-files')
@endsection


@section('content')

        <style>
    .stars i {
        font-size: 25px;
        color: gray;
        cursor: pointer;
        transition: color 0.3s;
    }

    .stars i.active {
        color: gold;
    }
</style>
    <!-- Start All Pages -->
    <div class="all-page-title page-breadcrumb">
        <div class="container text-center">
            <div class="row">
                <div class="col-lg-12">
                    <h1>{{ $product->name }}</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Pages -->



    @if (count($errors) > 0)
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ $error }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endforeach
    @endif

    @if ($success = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ $success }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif


    <!-- Start blog details -->
    <div class="blog-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading-title text-center">
                        <h2>{{ $product->id }} - {{ $product->name }}</h2>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class=" col-12">
                    <div class="blog-inner-details-page">
                        <div class="blog-inner-box">
                            <div class="side-blog-img">
                                @if ($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                        style="width:100%;
                                    ">
                                @endif
                                <div class="date-blog-up fw-bold"
                                    style="color:white !important;font-weight: bold;padding-left: 10px;cursor: pointer;background-color: rgb(211, 74, 74);">
                                    <h2 style="color:white !important;font-weight:bold !important;padding-top:10px">
                                        {{ $product->price }}$</h2>
                                </div>
                            </div>
                            <div class="inner-blog-detail details-page">

                                <h3>Category :{{ $product->category->name }}</h3>
                                <p>{{ $product->description }}</p>
                            </div>
                        </div>

                        <button
                            onclick="addToCart({{ $product->id }}, '{{ $product->name }}', '{{ asset('storage/' . $product->image) }}', {{ $product->price }})"
                            class="get-product-orange w-75 text-center d-block m-auto">
                            Add To Cart
                        </button>


<!-- ✅ زر المفضلة -->
<button  id="favorite-btn" class="favorite-btn {{ in_array($product->id, $favorites) ? 'favorite-active' : '' }}" data-product-id="{{ $product->id }}">
    <i class="fa fa-heart"></i>
</button>




                        <br>
                        <br>
@if($relatedProducts->count())
    <div class="mt-5">
        <h4 class="fw-bold"> Related Products</h4>
        <div class="row">
            @foreach($relatedProducts as $product)
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
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
@endif

                       <br>
                       <br>
                        <div class="average-rating text-center mb-4">
    <h5>⭐ Average Rating: {{ number_format($averageRating, 1) }}/5</h5>
</div>
<br>
<div class="rating-container text-center">
    <h5>Rate this product:</h5>
    <div class="stars">
        @for ($i = 5; $i >= 1; $i--)
            <i class="star fa fa-star" data-value="{{ $i }}"></i>
        @endfor
    </div>

    <textarea id="review-co mment" class="form-control mt-3" rows="3" placeholder="Write a review..." style="display: none;"></textarea>
    <button id="submit-review" class="btn btn-success mt-3" data-product-id="{{ $product->id }}" style="display: none;">Submit Review</button>
</div>



<br>

                        <div class="blog-comment-box">
                            @foreach ($product->comments as $comment)
                                <section
                                    style="background: #eee;padding:15px;
                               border-radius:20px;margin-bottom:20px">
                                    <!-- عرض التعليق -->
                                    <div class="comment-item">
                                        <div class="comment-item-left">
                                            <img src="{{ asset('images/avt-img.jpg') }}" alt="User Avatar"
                                                style="border-radius: 50%;width:60px;height:60px">
                                        </div>
                                        <div class="comment-item-right">
                                            <div class="pull-left">
                                                <a href="#">{{ $comment->user->name }}</a>
                                            </div>
                                            <div class="pull-right">
                                                <i class="fa fa-clock-o" aria-hidden="true"></i> Time :
                                                <span>{{ $comment->updated_at->addHours(3)->format('h:i A') }}</span>
                                            </div>
                                            <div class="des-l">
                                                <p>{{ $comment->comment }}</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- عرض الرد إذا كان موجودًا -->
                                    @if ($comment->reply)
                                        <div class="comment-item children">
                                            <div class="comment-item-left">
                                                <img src="{{ asset('images/logo.png') }}" alt="User Avatar"
                                                    style="width:50px;height:50px;object-fit:cover;">
                                            </div>
                                            <div class="comment-item-right">
                                                <div class="pull-left">
                                                    <a href="#">Admin</a>
                                                </div>
                                                <div class="pull-right">
                                                    <i class="fa fa-clock-o" aria-hidden="true"></i> Time :
                                                    <span>{{ $comment->updated_at->addHours(3)->format('h:i A') }}</span>

                                                </div>
                                                <div class="des-l">
                                                    <p>{{ $comment->reply }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--إذا لم يكن هنالك ردود وكان الشخص أدمن يمكنه إضافة رد-->
                                    @elseif (Auth::user() && Auth::user()->role === 'admin')
                                        <!-- نموذج الرد للمشرف فقط -->
                                        <form action="{{ route('comment.reply', $comment->id) }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <textarea name="reply" class="form-control" placeholder="Write a reply..." required></textarea>
                                            </div>
                                            <button type="submit"
                                                class="btn btn-sm p-1 px-3 mb-5 btn-primary">Reply</button>
                                        </form>
                                    @endif


                                </section>
                            @endforeach
                        </div>



                        <br>


                        {{-- لازم يكون يوزر حصرا ليضيف تعليق --}}
                        @if (Auth::check() && Auth::user() && Auth::user()->role !== 'admin')
                            @php
                                // التحقق مما إذا كان المستخدم قد أضاف تعليقًا مسبقًا
                                $hasCommented = $product->comments->where('user_id', Auth::id())->isNotEmpty();
                            @endphp

                            @if (!$hasCommented)
                                <div class="comment-respond-box">
                                    <h3 style="font-weight:bold;font-size:20px">Leave your comment</h3>
                                    <div class="comment-respond-form">
                                        <form action="{{ route('comment.store', $product->id) }}" method="POST">
                                            @csrf
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <textarea class="form-control" name="comment" placeholder="Your Message" rows="2" required></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <button class="btn btn-submit" type="submit">Submit Comment</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            @else
                                <p
                                    style="margin-top: 20px; padding: 5px 10px; border: 2px solid #aaa; color: green; width: 100%; background-color: #f0f0f0;">
                                    You have already left a comment on this product, you can't add more.
                                </p>
                            @endif
                        @elseif (Auth::check() && Auth::user() && Auth::user()->role == 'admin')
                            {{-- لا يظهر أي شيء إذا كان آدمن --}}
                        @else
                            {{-- إذا كان غير مسجل دخول بيظهر هذا  --}}
                            <p
                                style="margin-top: 20px; padding: 5px 10px; border: 2px solid #aaa; color: red;
                                 width: 100%; background-color: #ddd;">
                                Please <a href="{{ route('login') }}">log in</a> to leave a comment.
                            </p>
                        @endif



                    </div>
                </div>


            </div>
        </div>
    </div>
    <!-- End details -->
@endsection

@section('js-custom-files')



@section('js-custom-files')
    <script>
        function addToCart(id, name, image, price) {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];

            let existingProduct = cart.find(product => product.id === id);
            if (!existingProduct) {
                cart.push({
                    id,
                    name,
                    image,
                    price
                });
                localStorage.setItem('cart', JSON.stringify(cart));

                updateCartCount(); // تحديث العداد
                alert("The product has been successfully added to the cart!");
            } else {
                alert("This product is already in the cart!");
            }
        }

        function updateCartCount() {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            document.getElementById("cart-count").innerText = cart.length;        
        }
      
document.querySelectorAll('.favorite-btn').forEach(btn => {
    btn.addEventListener('click', function () {
        let productId = this.getAttribute('data-product-id');
        let heartIcon = this.querySelector('.fa-heart'); // ✅ تحديد العنصر الصحيح

        fetch('/favorite/add', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ product_id: productId })
        }).then(response => response.json())
          .then(data => {
              if (data.success) {
                  heartIcon.classList.toggle('favorite-active'); // ✅ تغيير لون القلب عند الضغط
                  location.reload();
              }
          }).catch(error => console.error('Error:', error));
    });
});



        

document.addEventListener("DOMContentLoaded", function () {
    const stars = document.querySelectorAll(".star");
    const commentBox = document.getElementById("review-comment");
    const submitButton = document.getElementById("submit-review");
    let selectedRating = 0; // ✅ حفظ التقييم المختار من قبل المستخدم

    stars.forEach(star => {
        star.addEventListener("mouseover", function () {
            if (selectedRating === 0) {
                resetStars();
                highlightStars(this.getAttribute("data-value"));
            }
        });

        star.addEventListener("mouseleave", function () {
            if (selectedRating === 0) {
                resetStars();
            }
        });

        star.addEventListener("click", function () {
            selectedRating = parseInt(this.getAttribute("data-value")); // ✅ تثبيت التقييم المختار
            highlightStars(selectedRating);
            commentBox.style.display = "block";
            submitButton.style.display = "block";
        });
    });

    submitButton.addEventListener("click", function () {
        let productId = submitButton.getAttribute("data-product-id"); 
        let comment = commentBox.value;

        if (selectedRating === 0) {
            alert("Please select a rating before submitting.");
            return;
        }

        fetch('/submit-review', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ product_id: productId, rating: selectedRating, comment })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert("Review submitted successfully!");
                location.reload()
            } else {
                alert("Error submitting review.");
            }
        })
        .catch(error => console.error('Error:', error));
    });

    function resetStars() {
        stars.forEach(star => star.classList.remove("active"));
    }

    function highlightStars(value) {
        stars.forEach(star => {
            if (star.getAttribute("data-value") <= value) {
                star.classList.add("active");
            } else {
                star.classList.remove("active");
            }
        });
    }
});


    </script>

@endsection