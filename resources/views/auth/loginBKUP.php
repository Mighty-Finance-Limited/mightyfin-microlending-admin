<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Login - Mighty Finance Solution</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('public/web/images/favicon.png') }}">
    <link href="{{ asset('public/theme/css/style.css') }}" rel="stylesheet">

</head>

<body style="background: url('https://extension.harvard.edu/wp-content/uploads/sites/8/2020/10/finance.jpg');
            background-size:cover;
            background-attachment:fixed;
            backdrop-filter: blur(4.1px);
            -webkit-backdrop-filter: blur(4.1px);" 
            class="h-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content" style="
                        background: rgba(255, 255, 255, 0.87);
                        border-radius: 16px;
                        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
                        backdrop-filter: blur(11.2px);
                        -webkit-backdrop-filter: blur(11.2px);
                        border: 1px solid rgba(255, 255, 255, 0.94);">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
									<div class="logo justify-content-center justify-center items-center text-center"> 
										<a href="{{ route('welcome') }}"> 
											<img src="{{ asset('public/web/images/logo.png') }}" alt=""> 
										</a> 
									</div>

                                    <h4 class="text-center mb-4">Sign in your account</h4>
									<x-jet-validation-errors class="mb-4 text-danger" />

									@if (session('status'))
										<div class="mb-4 font-medium text-sm text-green-600">
											{{ session('status') }}
										</div>
									@endif
                                    <form class="mt-4" method="POST" action="{{ route('login') }}">
										@csrf
                                        <div class="form-group">
                                            <label class="mb-1"><strong>Email</strong></label>
                                            <input type="email" name="email" :value="old('email')" class="form-control" placeholder="Your Email">
                                        </div>
                                        <div class="form-group" >
                                            <label class="mb-1"><strong>Password</strong></label>
                                            <input type="password" name="password" required autocomplete="current-password" class="form-control">
                                        </div>
                                        <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                            <div class="form-group">
                                               <div class="custom-control custom-checkbox ml-1">
													<input type="checkbox" name="remember" class="custom-control-input" id="basic_checkbox_1">
													<label class="custom-control-label" for="basic_checkbox_1">Remember my preference</label>
												</div>
                                            </div>
											
											@if (Route::has('password.request'))
                                            <div class="form-group">
                                                <a href="{{ route('password.request') }}">Forgot Password?</a>
                                            </div>
											@endif
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">Sign Me In</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p>Don't have an account? <a class="text-primary" href="{{ route('register') }}">Sign up</a></p>
                                    </div>
                                </div>
                            </div>
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
    <script src="{{ asset('public/theme/vendor/global/global.min.js') }}"></script>
	<script src="{{ asset('public/theme/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('public/theme/js/custom.min.js') }}"></script>
    <script src="{{ asset('public/theme/js/deznav-init.js') }}"></script>

</body>

</html>