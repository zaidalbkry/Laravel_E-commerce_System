@extends('layouts.master')

@section('title')
Users -
List of Users
(edit)
@endsection


@section('css')
<!-- Internal Nice-select css  -->
<link href="{{URL::asset('assets/plugins/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet" />
@endsection



@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
	<div class="my-auto">
		<div class="d-flex">
			<h4 class="content-title mb-0 my-auto">Users</h4>

			<span class="text-muted mt-1 tx-13 mr-2 mb-0">/
				List of Users
				(edit)
			</span>
		</div>
	</div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
	<div class="col-lg-12 col-md-12">

		@if (count($errors) > 0)
		<div class="alert alert-danger">
			<button aria-label="Close" class="close" data-dismiss="alert" type="button">
				<span aria-hidden="true">&times;</span>
			</button>
			<strong>Error</strong>
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif

		<div class="card">
			<div class="card-body">
				<div class="col-lg-12 margin-tb">
					<div class="pull-right">
						<a class="btn btn-primary btn-sm" href="{{ route('users.index') }}">back</a>
					</div>
				</div><br>

				<form method="POST" action="{{ route('users.update', $user->id) }}">
					@method('PATCH')
					@csrf

					<div class="">

						<div class="row mg-b-20">
							<div class="parsley-input col-md-6" id="fnWrapper">
								<label>User Name: <span class="tx-danger">*</span></label>
								<input type="text" name="name" value="{{ $user->name }}" class="form-control" required>
							</div>

							<div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
								<label>Email: <span class="tx-danger">*</span></label>
								<input type="text" name="email" value="{{ $user->email }}" class="form-control" required>
							</div>
						</div>

					</div>

					<div class="mg-t-30">
						<button class="btn btn-main-primary pd-x-20" type="submit">Update</button>
					</div>
				</form>
			</div>
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