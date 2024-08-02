

<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
	
	<!-- PAGE TITLE HERE -->
	<title>Mighty Finance - Dashboard</title>
	<!-- FAVICONS ICON -->

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Oops - Mighty Finance Solution</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('public/web/images/favicon.png') }}">
    <link href="{{ asset('public/web/css/style.css') }}" rel="stylesheet">
    
</head>

<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-7">
                    <div class="form-input-content text-center error-page">
                        <h1 class="error-text fw-bold"> 
                            @yield('code')
                        </h1>
                        <h4><i class="fa fa-exclamation-triangle text-warning"></i> 
                            @yield('message')
                        </h4>
                        <p>@yield('submessage')</p>
						<div>
                            <a class="btn btn-primary" href="{{route('dashboard')}}">Back to Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!--**********************************
	Scripts
***********************************-->
<!-- Required vendors -->
    <script src="{{ asset('public/web/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('public/web/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('public/web/js/custom.min.js') }}"></script>
    <script src="{{ asset('public/web/js/deznav-init.js') }}"></script>

</body>
</html>