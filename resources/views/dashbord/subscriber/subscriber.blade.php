@extends('layouts.master')
@section('title')
Subscribers
@endsection
@section('css')
<!-- Internal Data table css -->
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
{{-- my css style --}}
<style>
	.alert-dismissible .close {
		position: absolute;
		top: 0;
		left: 0 !important;
		right: initial !important;
		opacity: initial !important;
		padding: 0.75rem 1.25rem;
		color: inherit;
	}

	.table-responsive {
		overflow-x: hidden !important;
	}

	table.dataTable {
		width: 99% !important;
	}
</style>


@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
	<div class="my-auto">
		<div class="d-flex">
			<h4 class="content-title mb-0 my-auto">Subscribers List</h4>
		</div>
	</div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')

<!-- row -->
<div class="row">
	<div class="col-xl-12">
		<div class="card">

			<div class="card-header pb-0">
				<div class="d-flex justify-content-between">
					<a class="modal-effect btn btn-outline-primary" data-effect="effect-scale" data-toggle="modal" href="#modaldemo8">Add New Subscriber</a>
				</div>
			</div>

			<div class="card-body">
				<div class="table-responsive">
					<table class="table text-md-nowrap">
						<thead>
							<tr>
								<th class="wd-15p border-bottom-0">#</th>
								<th class="wd-15p border-bottom-0">Subscriber's Number</th>
								<th class="wd-15p border-bottom-0">Actions</th>
							</tr>
						</thead>
						<tbody>
							@php
							$i = 0;
							@endphp
							@foreach ($subscriber as $sub)
							<tr>
								<td>{{++$i}}</td>
								<td>{{$sub->phone_number}}</td>
								<td>
									<a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale" data-id="{{ $sub->id }}" data-phone_number="{{ $sub->phone_number }}" data-toggle="modal" href="#exampleModal2" title="Edit"><i class="las la-pen"></i></a>

									<a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale" data-id="{{ $sub->id }}" data-phone_number="{{ $sub->phone_number }}" data-toggle="modal" href="#modaldemo9" title="Delete"><i class="las la-trash"></i></a>
								</td>

							</tr>
							@endforeach
						</tbody>
					</table>
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

{{-- ************************************************************************* --}}
{{-- ************************************************************************* --}}
<!-- create -->
<div class="modal" id="modaldemo8">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content modal-content-demo">
			<div class="modal-header">
				<h6 class="modal-title">Add New Subscriber</h6>
				<button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
			</div>
			<form id="addSection" action="{{route('subscribers.store')}}" class="modal-body" method="POST">
				@csrf
				<div class="form-group">
					<label class="form-label" for="phone_number">Subscriber's Number</label>
					<input required type="text" name="phone_number" id="phone_number" class="form-control">
				</div>

			</form>
			<div class="modal-footer">
				<button class="btn ripple btn-primary" type="submit" onclick="document.getElementById('addSection').submit();">Add</button>
				<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
			</div>
		</div>
	</div>
</div>
<!-- edit -->
<div class="modal" id="exampleModal2">
	<div class="modal-dialog  modal-dialog-centered" role="document">
		<div class="modal-content modal-content-demo">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit Subscriber</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="subscribers/update" method="POST" autocomplete="off">

					@csrf
					@method('PUT')

					<div class="form-group">
						<input type="hidden" name="id" id="id" value="">
						<label for="recipient-name" class="col-form-label">Subscriber's Number:</label>
						<input class="form-control" name="phone_number" id="phone_number" type="text">
					</div>

			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary">Confirm</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
			</form>
		</div>
	</div>
</div>
<!-- delete -->
<div class="modal" id="modaldemo9">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content modal-content-demo">
			<div class="modal-header">
				<h6 class="modal-title">Delete Subscriber</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
			</div>
			<form action="subscribers/destroy" method="post">
				@csrf
				@method('delete')
				<div class="modal-body">
					<p>Are you sure you want to delete this subscriber?</p><br>
					<input type="hidden" name="id" id="id" value="">
					<input class="form-control" name="phone_number" id="phone_number" type="text" readonly>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-danger">Confirm</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

				</div>
		</div>
		</form>
	</div>
</div>
{{-- ************************************************************************* --}}
{{-- ************************************************************************* --}}
@endsection
@section('js')
<!-- Internal Data tables -->
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>

{{-- *********************************************************************************** --}}
<!--Internal  Datatable js -->
<script src="{{ URL::asset('assets/js/table-data.js') }}"></script>
<!-- Internal Modal js-->
<script src="{{URL::asset('assets/js/modal.js')}}"></script>
{{-- *********************************************************************************** --}}

{{-- edit --}}
<script>
	$('#exampleModal2').on('show.bs.modal', function(event) {
		var button = $(event.relatedTarget)
		var id = button.data('id')
		var phone_number = button.data('phone_number')
		var description = button.data('description')
		var modal = $(this)
		modal.find('.modal-body #id').val(id);
		modal.find('.modal-body #phone_number').val(phone_number);
		modal.find('.modal-body #description').val(description);
	})
</script>
{{-- delete --}}
<script>
	$('#modaldemo9').on('show.bs.modal', function(event) {
		var button = $(event.relatedTarget)
		var id = button.data('id')
		var phone_number = button.data('phone_number')
		var modal = $(this)
		modal.find('.modal-body #id').val(id);
		modal.find('.modal-body #phone_number').val(phone_number);
	})
</script>
@endsection