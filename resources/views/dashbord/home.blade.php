@extends('layouts.master')

@section('css')
    <!-- Owl-carousel css -->
    <link href="{{ URL::asset('assets/plugins/owl-carousel/owl.carousel.css') }}" rel="stylesheet" />
    <!-- Maps css -->
    <link href="{{ URL::asset('assets/plugins/jqvmap/jqvmap.min.css') }}" rel="stylesheet">
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="left-content">
            <div>
                <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">Hi, welcome back</h2>
            </div>
        </div>
    </div>
    <!-- /breadcrumb -->
@endsection

@section('content')
    <!-- Start Dashboard Cards Row -->
    <div class="row row-sm">
        <!-- Product with unanswered comments card -->
        @if ($productsWithUnansweredComments->isNotEmpty())
            <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
                <div class="card overflow-hidden sales-card bg-primary-gradient">
                    <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                        <div>
                            <h6 class="mb-3 tx-12 text-white">Products with unanswered comments</h6>
                        </div>
                        <div class="pb-0 mt-0">
                            <div class="d-flex">
                                <div>
                                    <h4 class="tx-20 font-weight-bold mb-1 text-white">
                                        {{ $productsWithUnansweredComments->count() }}
                                    </h4>
                                    <p class="mb-0 tx-12 text-white op-7">Number of products</p>
                                </div>
                                <span class="float-right my-auto mr-auto">
                                    <i class="fas fa-exclamation-circle text-white"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <span id="compositeline" class="pt-1"></span>
                </div>
            </div>
        @endif

        <!-- Total Revenue Card -->
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-danger-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <div>
                        <h6 class="mb-3 tx-12 text-white">Total Revenue</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div>
                                <h4 class="tx-20 font-weight-bold mb-1 text-white">
                                    ${{ number_format($totalRevenue, 2) }}
                                </h4>
                                <p class="mb-0 tx-12 text-white op-7">Revenue in period</p>
                            </div>
                            <span class="float-right my-auto mr-auto">
                                <i class="fas fa-dollar-sign text-white"></i>
                                <span class="text-white op-7"></span>
                            </span>
                        </div>
                    </div>
                </div>
                <span id="compositeline2" class="pt-1">3,2,4,6,12,14,8,7,14,16,12,7,8,4,3,2,2,5,6,7</span>
            </div>
        </div>

        <!-- Average Order Value Card -->
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-success-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <div>
                        <h6 class="mb-3 tx-12 text-white">Average Order Value</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div>
                                <h4 class="tx-20 font-weight-bold mb-1 text-white">
                                    ${{ number_format($averageOrderValue, 2) }}
                                </h4>
                                <p class="mb-0 tx-12 text-white op-7">Per Order</p>
                            </div>
                            <span class="float-right my-auto mr-auto">
                                <i class="fas fa-chart-line text-white"></i>
                                <span class="text-white op-7"></span>
                            </span>
                        </div>
                    </div>
                </div>
                <span id="compositeline3" class="pt-1">5,10,5,20,22,12,15,18,20,15,8,12,22,5,10,12,22,15,16,10</span>
            </div>
        </div>

        <!-- New Customers Card -->
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-warning-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <div>
                        <h6 class="mb-3 tx-12 text-white">New Customers (Last Month)</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div>
                                <h4 class="tx-20 font-weight-bold mb-1 text-white">{{ $newCustomersCount }}</h4>
                                <p class="mb-0 tx-12 text-white op-7">Registered Recently</p>
                            </div>
                            <span class="float-right my-auto mr-auto">
                                <i class="fas fa-user-plus text-white"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <span id="compositeline4" class="pt-1">5,9,5,6,4,12,18,14,10,15,12,5,8,5,12,5,12,10,16,12</span>
            </div>
        </div>
    </div>
    <!-- End Dashboard Cards Row -->

    <!-- Orders by Month Chart -->
    <div class="row my-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5>Orders by Month</h5>
                </div>
                <div class="card-body">
                    <canvas id="ordersChart" height="100"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Top Selling Products Table -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5>Top Selling Products</h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Orders Count</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($topSellingProducts as $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->orders_count }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- End of Reports -->

    <!-- Notification Form -->
    <div class="container d-flex justify-content-center" style="position: relative; top: 30px;">
        <div class="col-lg-8">
            <h4 class="text-center mb-4">📢 Send Notification to All Customers</h4>
            <form action="{{ route('admin.notifications.send') }}" method="POST" class="p-4 border rounded shadow-sm bg-white">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Notification Title:</label>
                    <input type="text" name="title" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="body" class="form-label">Notification Body:</label>
                    <textarea name="body" class="form-control" rows="4" required></textarea>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-success px-5 py-2">🚀 Send Now</button>
                </div>
            </form>
        </div>
    </div>
    <!-- End of Notification Form -->

@endsection

@section('js')
    <!--Internal Chart.bundle js -->
    <script src="{{ URL::asset('assets/plugins/chart.js/Chart.bundle.min.js') }}"></script>
    <!--Internal Flot js-->
    <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.categories.js') }}"></script>
    <script src="{{ URL::asset('assets/js/dashboard.sampledata.js') }}"></script>
    <script src="{{ URL::asset('assets/js/chart.flot.sampledata.js') }}"></script>
    <!--Internal Apexchart js-->
    <script src="{{ URL::asset('assets/js/apexcharts.js') }}"></script>
    <!-- Internal Map -->
    <script src="{{ URL::asset('assets/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <script src="{{ URL::asset('assets/js/modal-popup.js') }}"></script>
    <!--Internal index js -->
    <script src="{{ URL::asset('assets/js/index.js') }}"></script>
    <script src="{{ URL::asset('assets/js/jquery.vmap.sampledata.js') }}"></script>
    <script>
        // إعداد بيانات الرسم البياني للطلبات حسب الشهر
        var ctx = document.getElementById('ordersChart').getContext('2d');
        var labels = {!! json_encode($ordersByMonth->pluck('month')) !!};
        var data = {!! json_encode($ordersByMonth->pluck('count')) !!};

        var ordersChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Orders Count',
                    data: data,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 2,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            precision: 0
                        }
                    }]
                }
            }
        });
    </script>
@endsection
