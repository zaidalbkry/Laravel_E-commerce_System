@extends('layouts.master')

@section('title')
    Order List
@endsection

@section('css')
    <!-- Internal Data table css -->

    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <!--Internal   Notify -->
    <link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
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

        .hoverable-table .btn-primary {
            margin-left: 0px ! important;
        }
    </style>
@endsection
@section('page-header')
    <!-- breadcrumb  -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Order List</h4>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection


@section('content')
<div class="container">
    <h2 class="mb-4 text-center">✏ Edit Order Status</h2>

    <form action="{{ route('orders.update', $order->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="status" class="form-label">Order Status</label>
            <select name="status" id="status" class="form-control">
                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="delivering" {{ $order->status == 'delivering' ? 'selected' : '' }}>Delivering</option>
                <option value="canceled" {{ $order->status == 'canceled' ? 'selected' : '' }}>Canceled</option>
                <option value="received" {{ $order->status == 'received' ? 'selected' : '' }}>Received</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Update Order</button>
        <a href="{{ route('orders.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection