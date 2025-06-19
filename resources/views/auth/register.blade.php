@extends('layouts.master3-auth')

@section('title')
    إنشاء حساب جديد - {{ env('APP_NAME') }}
@endsection

@section('css')
@endsection

@section('js')
@endsection

@section('content')
    <div class="container-fluid authentication">
        <div class="row no-gutter">

            <!-- The content half -->
            <div class="col-md-6 col-lg-6 col-xl-5 bg-white">
                <div class="login d-flex align-items-center py-2">
                    <!-- Demo content-->
                    <div class="container p-0">
                        <div class="row">
                            <div class="col-md-11 col-lg-10 mx-auto">
                                <div class="card-sigin">
                                    <div class="mb-2 d-flex flex-column text-center">
                                        <span>
                                            <img src="{{ URL::asset('assets/img/brand/favicon.png') }}"
                                                class="sign-favicon ht-70" alt="logo">
                                        </span>

                                        <h1 class="main-logo1 ml-1 mr-0 my-2 tx-28">
                                            {{ env('APP_NAME') }}
                                        </h1>
                                    </div>
                                    <div class="card-sigin">
                                        <div class="main-signup-header">
                                            <h3 class="text-center font-weight-semibold">إنشاء حساب جديد</h3>
                                            <form method="POST"
                                                action="{{ route('register') }}"class="row needs-validation" novalidate>
                                                @csrf
                                                <div class="form-group col-md-6">
                                                    <label for="name">الاسم الثلاثي</label>
                                                    <input id="name" type="name" dir="ltr" class="form-control"
                                                        name="name" value="{{ old('name') }}" required
                                                        autocomplete="name" autofocus minlength="6">
                                                    <div class="invalid-feedback">
                                                        الرجاء كتابة الاسم كاملا بشكل صحيح
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="email">البريد الالكتروني</label>
                                                    <input id="email" type="email" dir="ltr" class="form-control"
                                                        name="email" value="{{ old('email') }}" required
                                                        autocomplete="email" autofocus>
                                                    <div class="invalid-feedback">
                                                        الرجاء كتابة الإيميل بشكل صحيح
                                                    </div>
                                                </div>


                                                <div class="form-group col-md-6">
                                                    <label for="password">كلمة المرور</label>

                                                    <input id="password" type="password" class="form-control"
                                                        name="password" required autocomplete="current-password"
                                                        minlength="8">

                                                    <div class="invalid-feedback">
                                                        كلمة المرور يجب أن تكون مؤلفة من 8 أحرف أو أرقام على الأقل
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="password-confirm">تأكيد كلمة المرور</label>

                                                    <input id="password-confirm" type="password" class="form-control"
                                                        name="password_confirmation" required autocomplete="new-password"
                                                        minlength="8">

                                                    <div class="invalid-feedback">
                                                        كلمة المرور يجب أن تكون مؤلفة من 8 أحرف أو أرقام على الأقل ومتطابقة
                                                        مع الحقل السابق
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    @include('layouts.alert-error-msgs')

                                                    <button type="submit" class=" btn btn-main-primary btn-block">
                                                        {{ __('إنشاء حساب جديد') }}
                                                    </button>

                                                    <a href="{{ route('login') }}"
                                                        class=" btn btn-secondary btn-block mt-3">
                                                        {{ __('تسجيل الدخول') }}
                                                    </a>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End -->
                </div>
            </div>
            <!-- End -->
            <!-- The image half -->
            <div class="d-none col-md-6 col-lg-6 col-xl-7 d-md-flex bg-primary-transparent">
                <div class="row wd-100p mx-auto text-center">
                    <div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">

                        <img src="{{ URL::asset('assets/img/backgrounds/buildings.png') }}"
                            class="my-auto ht-xl-80p wd-md-100p wd-xl-80p rounded  shadow mx-auto" alt="logo">
                    </div>
                </div>
            </div>
            <!-- End image-->

        </div>
    </div>
@endsection
