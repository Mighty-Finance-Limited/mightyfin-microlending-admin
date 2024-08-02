

<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from tende.vercel.app/reset.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 17 Nov 2023 16:22:14 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Mighty Finance Solution | Reset Password</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('public/mfs/images/logoi.png')}}" />
    <!-- Custom Stylesheet -->
     
    <link rel="stylesheet" href="{{ asset('public/mfs/css/style.css')}}" />
  </head>

  <body class="@@dashboard">


<div id="preloader"><i>.</i><i>.</i><i>.</i></div>


<div id="main-wrapper">

    <div class="authincation section-padding">
        <div class="container">
            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif
            
            <x-jet-validation-errors class="mb-4" />
            <div class="row justify-content-center align-items-center">
                <div class="col-xl-6 col-md-6">
                    <div class="mini-logo text-center my-3">
                        <a href="{{ route('welcome') }}">
                            <img width="100" src="{{ asset('public/web/images/logo.png')}}" alt="" />
                        </a>
                        <h4 class="card-title mt-5">Change Password</h4>
                    </div>
                    <div class="auth-form card">

                        <x-jet-validation-errors class="w-full" />
                        <div class="card-body">
                            <form class="row g-3" method="POST" action="{{ route('password.update') }}">
                                @csrf
                                <div class="col-12">
                                    <label class="form-label">Email</label>

                                    <input type="email" name="email" :value="old('email', $request->email)" required autofocus class="form-control">
                                </div>
                                <div class="col-12">
                                    <label class="form-label">New Password</label>
                                    <input  type="password" name="password" required autocomplete="new-password" class="form-control">
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Confirm Password</label>
                                    <input type="password" name="password_confirmation" required autocomplete="new-password" class="form-control">
                                </div>
                                <div class="text-center mt-4">
                                    <button type="submit" class="btn btn-primary btn-block">Save Changes</button>
                                </div>
                            </form>
                            {{-- <div class="new-account mt-3">
                                <p>Didn't get code? <a class="text-primary" href="otp-1.html">Resend</a></p>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>



<script src="{{ asset('public/mfs/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('public/mfs/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>


















<script src="{{ asset('public/mfs/js/scripts.js')}}"></script>


</body>


<!-- Mirrored from tende.vercel.app/reset.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 17 Nov 2023 16:22:14 GMT -->
</html>