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
            margin-left: 0px !important;
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
    <h2 class="mb-4 text-center">📦 Orders Management</h2>

    <table class="table table-bordered text-center">
        <thead class="thead-dark">
            <tr>
                <th>Order Number</th>
                <th>User</th>
                <th>Total Price ($)</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->order_number }}</td>
                    <td>{{ $order->user->name ?? 'Unknown' }}</td>
                    <td>{{ number_format($order->total_price, 2) }}</td>
                    <td>
                        <span class="badge 
                            @if($order->status == 'pending') bg-primary 
                            @elseif($order->status == 'delivering') bg-warning 
                            @elseif($order->status == 'canceled') bg-danger 
                            @elseif($order->status == 'received') bg-secondary
                            @endif">
                            {{ ucfirst($order->status) }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
