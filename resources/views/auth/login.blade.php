@extends('layouts.master3-auth')

@section('title')
    Login - {{ env('APP_NAME') }}
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
                            <div class="col-md-11 col-lg-10  mx-auto">
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
                                            <h3 class="text-center font-weight-semibold"> Login  </h3>
                                            <form method="POST" action="{{ route('login') }}" class="needs-validation text-left"
                                                novalidate >
                                                @csrf
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input id="email" type="email" dir="ltr" class="form-control"
                                                        name="email" value="{{ old('email') }}" required
                                                        autocomplete="email" autofocus>

                                                    <div class="invalid-feedback">
                                                      Please Write A Valid Email
                                                    </div>

                                                </div>

                                                <div class="form-group">
                                                    <label for="password">Password</label>

                                                    <input id="password" type="password" class="form-control"
                                                        name="password" required autocomplete="current-password"
                                                        minlength="8">

                                                    <div class="invalid-feedback">
                                                       Password Must Be 8 Characters At least
                                                    </div>



                                                    <div class="form-group row">
                                                        <div class="col-6">
                                                            <div
                                                                class="form-check d-flex justify-content-start align-items-center">
                                                                <input class="form-check-i-input" type="checkbox"
                                                                    name="remember" id="remember"
                                                                    {{ old('remember') ? 'checked' : '' }}>
                                                                &nbsp;&nbsp;&nbsp;
                                                                <label class="form-check-i-label my-0" for="remember">
                                                                    {{ __('Remember Me') }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            @if (Route::has('password.request'))
                                                                <a class="btn btn-link w-100 text-left p-0"
                                                                    href="{{ route('password.request') }}">
                                                                    {{ __('Forget Password') }}
                                                                </a>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>

                                                @include('layouts.alert-error-msgs')


                                                <button type="submit" class="btn btn-main-primary btn-block">
                                                    {{ __("Login") }}
                                                </button>


                                                @if (Route::has('register'))
                                                    <a href="{{ route('register') }}"
                                                        class="btn btn-secondary btn-block mt-3">
                                                        {{ __("Create New Account") }}
                                                    </a>
                                                @endif

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
