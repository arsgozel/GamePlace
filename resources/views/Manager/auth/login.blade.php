<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@lang('app.login') - @lang('app.app-name')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-icons.css') }}">
</head>
<body style="background-color: #D7D7D7">
@include('Manager.layouts.alert')
<div class="container-fluid">
    <div class="row justify-content-center align-items-center vh-100 py-3 p-5">
        <div class="col-10 col-sm-6 col-md-4 col-lg-4 col-xxl-2">
            <div class="bg-light rounded p-4">
                <form action="{{ route('manager.login') }}" method="post">
                    @csrf
                    @honeypot
                    <div class="h4 mb-3 fw-semibold text-center" style="color: #0F0071">@lang('app.login')</div>
                    <div class="mb-3">
                        <label for="username" class="form-label fw-semibold">
                            @lang('app.username')
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control form-control-lg @error('username') is-invalid @enderror" name="username" id="username" value="{{ old('username') }}" required autofocus>
                        @error('username')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label fw-semibold">
                            @lang('app.password')
                            <span class="text-danger">*</span>
                        </label>
                        <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" id="password" value="{{ old('password') }}" required>
                        @error('password')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" value="1" name="remember" id="remember">
                        <label class="form-check-label" for="remember">
                            @lang('app.rememberMe')
                        </label>
                    </div>

                    <button type="submit" class="btn btn-lg w-100 text-white" style="background-color: #0F0071">
                        @lang('app.login')
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>