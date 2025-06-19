@extends('frontend.layout')

@section('css-custom-files')
    <style>
        .wrapper {
            width: 95%;
            text-align: center;
            margin: 35px auto;
        }

        .wrapper #orders {
            display: grid;
            grid-template-columns: auto auto auto;
            grid-column-gap: 1.5em;
            padding: 2em 0;
            justify-content: space-evenly;
        }

        .wrapper .order-card {
            background-color: #ffffff;
            max-width: 18em;
            margin-top: 1em;
            padding: 1em;
            border-radius: 5px;
            box-shadow: 1em 2em 2.5em rgba(1, 2, 68, 0.08);
        }

        .wrapper .image-container {
            text-align: center;
        }

        .wrapper img {
            max-width: 100%;
            object-fit: contain;
            height: 15em;
        }

        .wrapper .container {
            padding-top: 1em;
            color: #110f29;
        }
    </style>
@endsection

@section('content')
    <!-- ✅ Orders Page Title -->
    <div class="all-page-title page-breadcrumb">
        <div class="container text-center">
            <div class="row">
                <div class="col-lg-12">
                    <h1>📦 My Orders</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        @if($orders->isEmpty())
            <p class="text-center">You have no orders currently.</p>
        @else
            <div class="wrapper">
                <div id="orders">
                    @foreach ($orders as $order)
                        <div class="order-card">
                            <h3>Order #{{ $order->id }} | Status: {{ ucfirst($order->status) }}</h3>
                            <p><strong>📞 Phone:</strong> {{ $order->phone_number }}</p>
                            <p><strong>💰 Total Price:</strong> ${{ $order->total_price }}</p>

                            <h4>🛒 Products:</h4>
                            <ul>
                                @foreach ($order->products_data ?? [] as $product)
                                    <li>{{ $product['name'] }} - ${{ $product['price'] }}</li>
                                @endforeach
                            </ul>

                            @if($order->status === 'pending')
                                <form action="{{ route('orders.cancel', $order->id) }}" method="POST" class="mt-3">
                                    @csrf
                                    <button type="submit" onclick="return confirm('Do you really want to cancel this order?')" class="btn btn-danger btn-sm w-100">
                                        ❌ Cancel Order
                                    </button>
                                </form>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
            
        @endif
    </div>
@endsection
