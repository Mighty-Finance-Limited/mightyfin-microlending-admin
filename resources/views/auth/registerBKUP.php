<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Sign Up - Mighty Finance Solution</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('public/web/images/favicon.png') }}">
    <link href="{{ asset('public/theme/css/style.css') }}" rel="stylesheet">

</head>

<body class="h-100" style="margin: 0; overflow: hidden;">
    <div id="preloader"><i>.</i><i>.</i><i>.</i></div>
    <div style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(to right, rgba(102, 45, 145, 0.8), rgba(145, 45, 115, 0.8)), url('https://cdn03.allafrica.com/download/pic/main/main/csiid/00611742:63e77387f56223a1509fb944791b01eb:arc614x376:w735:us1.jpg'); background-size: cover; background-position: center;"></div>
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">									
									<div class="logo justify-content-center justify-center items-center text-center"> 
										<a href="{{ route('welcome') }}"> 
											<img width="50" src="{{ asset('public/web/images/logo.png') }}" alt=""> 
										</a> 
									</div>
                                    <h4 class="text-center mb-4">Create your account</h4>
									<x-jet-validation-errors class="mb-4" style="color:red" />

                                    <form method="POST" action="{{ route('register') }}">
										@csrf
                                        <div class="form-group">
                                            <label class="mb-1"><strong>First Name</strong></label>
                                            <input name="fname" :value="old('fname')" required type="text" class="form-control" placeholder="Your First Name">
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1"><strong>Last Name</strong></label>
                                            <input name="lname" :value="old('lname')" required type="text" class="form-control" placeholder="Your Last Name">
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1"><strong>Email</strong></label>
                                            <input name="email" :value="old('email')" required type="email" class="form-control" placeholder="yourname@email.com">
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1"><strong>Password</strong></label>
                                            <input name="password" required autocomplete="new-password" type="password" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1"><strong>Confirm Password</strong></label>
                                            <input name="password_confirmation" required autocomplete="new-password" type="password" class="form-control">
                                        </div>
                                        <div class="text-center mt-4">
                                            <button type="submit" class="btn btn-primary btn-block">Sign me up</button>
                                        </div>
										@if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
										<div class="form-check">
											<input type="checkbox" name="terms" class="form-check-input" id="termsCheckbox">
											<label class="form-check-label font-w400" for="termsCheckbox">{!! __('I agree to the :terms_of_service and :privacy_policy', [
												'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
												'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
											]) !!}</label>
										</div>
										@endif
                                    </form>
                                    <div class="new-account mt-3">
                                        <p>Already have an account? <a class="text-primary" href="{{ route('login') }}">Sign in</a></p>
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