<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>Oops - Mighty Finance Solution</title>
        <!-- Favicon icon -->
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('public/web/images/favicon.png') }}">
        <link href="{{ asset('public/web/css/style.css') }}" rel="stylesheet">
        
    </head>
    <body>
        <div class="authincation h-100">
            <div class="container h-100">
                <div class="row justify-content-center h-100 align-items-center">
                    <div class="col-md-5">
                        <div class="form-input-content text-center error-page">
                            @yield('message')
                            <div>
                                <a class="btn btn-primary" href="{{ route('dashboard') }}">Back to Home</a>
                            </div>	
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script src="{{ asset('public/web/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('public/web/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('public/web/js/custom.min.js') }}"></script>
    <script src="{{ asset('public/web/js/deznav-init.js') }}"></script>
</html>
