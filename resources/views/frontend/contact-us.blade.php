@extends('frontend.layout')

@section('css-custom-files')
@endsection

@section('js-custom-files')
@endsection

@section('content')

<!-- Start All Pages -->
<div class="all-page-title page-breadcrumb">
	<div class="container text-center">
		<div class="row">
			<div class="col-lg-12">
				<h1>Contact</h1>
			</div>
		</div>
	</div>
</div>
<!-- End All Pages -->

<!-- Start Contact -->
<div class="contact-box">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="heading-title text-center">
					<h2>Contact</h2>
					<p>Send your message, and one of our customer service staff will respond to you as soon as possible.</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<form id="contactFogfdrm" action="{{route('new-msg.store')}}" method="POST">
					@csrf

					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required data-error="Please enter your name">
								<div class="help-block with-errors"></div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<input type="text" placeholder="Your phone" id="phone" class="form-control" name="phone_number" required data-error="Please enter your phone">
								<div class="help-block with-errors"></div>
							</div>
						</div>

						<div class="col-md-12">
							<div class="form-group">
								<textarea class="form-control" id="message"  name="messages" placeholder="Your Message" rows="2" data-error="Write your message" required></textarea>
								<div class="help-block with-errors"></div>
							</div>
							<div class="submit-button text-center">
								<button class="btn btn-common" id="submit" type="submit">Send Message</button>
								<div id="msgSubmit" class="h3 text-center hidden"></div>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- End Contact -->


@endsection