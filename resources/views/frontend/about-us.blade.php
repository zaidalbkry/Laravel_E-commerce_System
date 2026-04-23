@extends('frontend.layout')

@section('css-custom-files')
@endsection

@section('js-custom-files')
@endsection

@section('content')
    <div class="grid gap-8 rounded-3xl bg-white p-8 shadow-soft md:grid-cols-2">
        <img src="{{ asset('images/about-img.jpg') }}" alt="About us" class="h-full w-full rounded-2xl object-cover">
        <div>
            <h1 class="text-3xl font-extrabold text-mint-900">About FreshBasket</h1>
            <p class="mt-4 leading-7 text-slate-700">
                Welcome to our online store. We provide high-quality groceries and food items with a simple shopping experience, trusted quality control, and timely delivery.
            </p>
            <p class="mt-3 leading-7 text-slate-700">
                Our goal is to help customers shop confidently with clear product info, fair pricing, and dependable service for homes and businesses.
            </p>
        </div>
    </div>
@endsection