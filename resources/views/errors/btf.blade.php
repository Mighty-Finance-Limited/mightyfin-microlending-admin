

<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
     	
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Salreo : Crypto Trading UI Admin  Bootstrap 5 Template" >
	<meta property="og:title" content="Salreo : Crypto Trading UI Admin  Bootstrap 5 Template" >
	<meta property="og:description" content="Salreo : Crypto Trading UI Admin  Bootstrap 5 Template" >
	<meta property="og:image" content="social-image.png" >
	<meta name="format-detection" content="telephone=no">
	
	<!-- PAGE TITLE HERE -->
	<title>Mighty Finance - Dashboard</title>
	<!-- FAVICONS ICON -->
	

    <link href="{{ asset('public/vendor/wow-master/css/libs/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('public/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('public/vendor/bootstrap-select-country/css/bootstrap-select-country.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/vendor/jquery-nice-select/css/nice-select.css') }}">
    <!--swiper-slider-->
    <link rel="stylesheet" href="{{ asset('public/vendor/swiper/css/swiper-bundle.min.css') }}">
    <link href="{{ asset('public/vendor/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
    <!-- Form step -->
    <link href="{{ asset('public/vendor/jquery-smartwizard/dist/css/smart_wizard.min.css') }}" rel="stylesheet">
    <!-- Datatable -->
    <link href="{{ asset('public/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <!-- Style css -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('public/mfs/css/style.css')}}" />
  
</head>

<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-7">
                    <div class="form-input-content text-center error-page">
                        <h1 style="color: #792db8" class="error-text fw-bold"> 
                            @yield('code')
                        </h1>
                        <h4><i class="fa fa-exclamation-triangle text-warning"></i> 
                            @yield('message')
                        </h4>
                        <p>@yield('submessage')</p>
                        <img width="170" style="border-radius: 50%" src="https://i.pinimg.com/736x/76/f5/0c/76f50c518d95c7f57fd395c6bf3c95e1.jpg" alt="">
						<br>
						<br>
                        <div>
                            <a class="btn" style="background-color: #792db8" href="{{route('welcome')}}">Back to Home</a>
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
<script src="{{ asset('public/vendor/global/global.min.js') }}"></script>
<script src="{{ asset('public/js/custom.min.js') }}"></script>
	<script src="{{ asset('public/js/deznav-2-init.js') }}"></script>

</body>
</html>