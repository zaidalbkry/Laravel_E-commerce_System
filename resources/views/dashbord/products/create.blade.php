@extends('layouts.master')
@section('css')
<!-- Internal Nice-select css  -->
<link href="{{URL::asset('assets/plugins/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet" />
@section('title')
Add New Product
@stop


@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
	<div class="my-auto">
		<div class="d-flex">
			<h4 class="content-title mb-0 my-auto">Products</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
				Add New Product
			</span>
		</div>
	</div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')


@if (count($errors)>0)
@foreach ($errors->all() as $error)
<div class="alert alert-danger alert-dismissible fade show" role="alert">
	<strong>{{$error}}</strong>
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
@endforeach
@endif

@if ($msg= Session::get('msg'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
	<strong>{{$msg}}</strong>
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
@endif

<!-- row -->
<div class="row">


	<div class="col-lg-12 col-md-12">


		<div class="card">
			<div class="card-body">
				<div class="col-lg-12 margin-tb">
					<div class="pull-right">
						<a class="btn btn-primary btn-sm" href="{{ route('products.index') }}">back</a>
					</div>
				</div><br>
			

					<form action="{{ route('products.store') }}" autocomplete="off" method="POST" enctype="multipart/form-data" class="parsley-style-1" id="selectForm2" name="selectForm2">
					@csrf

					<div class="">
						<div class="row mg-b-20">
							<div class="parsley-input col-md-6" id="fnWrapper">
								<label> Name: <span class="tx-danger">*</span></label>
								<input class="form-control form-control-sm mg-b-20" autocomplete="off" name="name" type="text">
							</div>
					
							<div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
								<label>Price: <span class="tx-danger">*</span></label>
								<input class="form-control form-control-sm mg-b-20" name="price" type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
							</div>
						</div>
					
						<div class="row mg-b-20">
							<div class="parsley-input col-md-12" id="roleWrapper">
								<label>Category: <span class="tx-danger">*</span></label>
								<select class="form-control form-control-sm mg-b-20" name="category_id">
									<option value="" disabled>Select category</option>
									@foreach ($categories as $category)
									<option value="{{ $category->id }}">{{ $category->name }}</option>
								@endforeach
								</select>
							</div>
						</div>
					</div>
					


				

					<div class="row mg-b-20">
						<div class="parsley-input col-md-12 mg-t-20 mg-md-t-0" id="lnWrapper">
							<label>Image: <span class="tx-danger">*</span></label>

							<input class="form-control form-control-sm mg-b-20" name="image" required="" type="file">
						</div>

						
					</div>
					<div class="row mg-b-20">


						<div class="parsley-input col-md-12 mg-t-20 mg-md-t-0" id="lnWrapper">
							<label>Description: <span class="tx-danger">*</span></label>


							<textarea class="form-control form-control-sm mg-b-20" name="description" id=""  rows="10"></textarea>
						</div>

						
					</div>



					<div class="col-xs-12 col-sm-12 col-md-12 text-center">
						<button class="btn btn-main-primary pd-x-20" type="submit">Confirm</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- row closed -->
</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->
@endsection
@section('js')


<!-- Internal Nice-select js-->
<script src="{{URL::asset('assets/plugins/jquery-nice-select/js/jquery.nice-select.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery-nice-select/js/nice-select.js')}}"></script>

<!--Internal  Parsley.min js -->
<script src="{{URL::asset('assets/plugins/parsleyjs/parsley.min.js')}}"></script>
<!-- Internal Form-validation js -->
<script src="{{URL::asset('assets/js/form-validation.js')}}"></script>
@endsection