@extends('frontend.layout')

@section('css-custom-files')
@endsection

@section('js-custom-files')
@endsection

@section('content')

    <!-- Start header -->
    <div class="all-page-title page-breadcrumb">
      <div class="container text-center">
        <div class="row">
          <div class="col-lg-12">
            <h1>About Us</h1>
          </div>
        </div>
      </div>
    </div>
    <!-- End header -->

    <!-- Start About -->
    <div class="about-section-box">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-6">
            <img src="images/about-img.jpg" alt="" class="img-fluid" />
          </div>
          <div class="col-lg-6 col-md-6 text-center">
            <div class="inner-column">
              <h1>Welcome To <span> Berla Store</span></h1>
              <h4>About Us</h4>
              <p>
                Welcome to our online store! We are a trusted seller of
                high-quality groceries and food items, providing customers with
                a convenient way to shop for their essential needs. Our store
                offers a wide range of fresh produce, pantry staples, snacks,
                beverages, and much more.
                <br />
                At our store, we prioritize customer satisfaction above all
                else. We believe in delivering products that meet the highest
                standards of quality and taste. Our dedicated team works
                tirelessly to ensure that every item you purchase from us is
                carefully selected and handled with care.

                <br />
              </p>
            </div>
          </div>
          <div class="col-md-12">
            <div class="inner-pt">
              With a focus on providing a seamless shopping experience, our
              website is designed to be user-friendly and easy to navigate. You
              can browse through our extensive catalog, read detailed product
              descriptions, and make secure and hassle-free transactions. We
              offer multiple payment options and ensure timely delivery right to
              your doorstep.
              <br />

              We take pride in being a reliable source of groceries and food
              items for our customers. Whether you are an individual, a family,
              or a business, we are committed to serving you with excellence.
              Shopping with us means getting access to a wide variety of
              products at competitive prices, without compromising on quality.
              <br />

              Shop with us and experience the convenience of online grocery
              shopping. We are here to make your life easier and help you
              maintain a healthy and well-stocked pantry.
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End About -->


     <!-- Start Customer Reviews -->
	<div class="customer-reviews-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Customer Reviews</h2>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-8 mr-auto ml-auto text-center">
					<div id="reviews" class="carousel slide" data-ride="carousel">
						<div class="carousel-inner mt-4">
							<div class="carousel-item text-center active">
								<div class="img-box p-1 border rounded-circle m-auto">
									<img class="d-block w-100 rounded-circle" src="images/profile-1.jpg" alt="">
								</div>
								<h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">Paul Mitchel</strong></h5>
								<h6 class="text-dark m-0">Web Developer</h6>
								<p class="m-0 pt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor, varius quam at, luctus dui. Mauris magna metus, dapibus nec turpis vel, semper malesuada ante. Idac bibendum scelerisque non non purus. Suspendisse varius nibh non aliquet.</p>
							</div>
							<div class="carousel-item text-center">
								<div class="img-box p-1 border rounded-circle m-auto">
									<img class="d-block w-100 rounded-circle" src="images/profile-3.jpg" alt="">
								</div>
								<h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">Steve Fonsi</strong></h5>
								<h6 class="text-dark m-0">Web Designer</h6>
								<p class="m-0 pt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor, varius quam at, luctus dui. Mauris magna metus, dapibus nec turpis vel, semper malesuada ante. Idac bibendum scelerisque non non purus. Suspendisse varius nibh non aliquet.</p>
							</div>
							<div class="carousel-item text-center">
								<div class="img-box p-1 border rounded-circle m-auto">
									<img class="d-block w-100 rounded-circle" src="images/profile-7.jpg" alt="">
								</div>
								<h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">Daniel vebar</strong></h5>
								<h6 class="text-dark m-0">Seo Analyst</h6>
								<p class="m-0 pt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor, varius quam at, luctus dui. Mauris magna metus, dapibus nec turpis vel, semper malesuada ante. Idac bibendum scelerisque non non purus. Suspendisse varius nibh non aliquet.</p>
							</div>
						</div>
						<a class="carousel-control-prev" href="#reviews" role="button" data-slide="prev">
							<i class="fa fa-angle-left" aria-hidden="true"></i>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="#reviews" role="button" data-slide="next">
							<i class="fa fa-angle-right" aria-hidden="true"></i>
							<span class="sr-only">Next</span>
						</a>
                    </div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Customer Reviews -->
    
@endsection