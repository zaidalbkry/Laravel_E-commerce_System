@extends('frontend.layout')

@section('content')
    <h1 class="mb-6 text-2xl font-bold text-mint-900">My Orders</h1>
    @if($orders->isEmpty())
        <p class="rounded-xl bg-mint-50 px-4 py-3 text-slate-700">You have no orders currently.</p>
    @else
        <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($orders as $order)
                <article class="fb-card">
                    <h3 class="text-lg font-bold">Order #{{ $order->id }}</h3>
                    <p class="mt-1 text-sm">Status: <span class="font-semibold">{{ ucfirst($order->status) }}</span></p>
                    <p class="text-sm">Phone: {{ $order->phone_number }}</p>
                    <p class="text-sm">Total Price: ${{ $order->total_price }}</p>

                    <h4 class="mt-4 font-semibold">Products</h4>
                    <ul class="mt-2 space-y-1 text-sm text-slate-700">
                        @foreach ($order->products_data ?? [] as $product)
                            <li>{{ $product['name'] }} - ${{ $product['price'] }}</li>
                        @endforeach
                    </ul>

                    @if($order->status === 'pending')
                        <form action="{{ route('orders.cancel', $order->id) }}" method="POST" class="mt-4">
                            @csrf
                            <button type="submit" onclick="return confirm('Do you really want to cancel this order?')" class="w-full rounded-xl bg-red-600 px-4 py-2 font-semibold text-white hover:bg-red-700">
                                Cancel Order
                            </button>
                        </form>
                    @endif
                </article>
            @endforeach
        </div>
    @endif
@endsection
