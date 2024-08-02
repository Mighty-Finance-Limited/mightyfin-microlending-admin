<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Sign Up - Mighty Finance Solution</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('public/images/m.jpg') }}">
    <link href="{{ asset('public/theme/css/style.css') }}" rel="stylesheet">
    <script src="https://jsuites.net/v4/jsuites.js"></script>
    <link rel="stylesheet" href="https://jsuites.net/v4/jsuites.css" type="text/css" />
    <style>
        body {
            margin: 0;
            overflow: hidden;
            overflow-y: auto;
            font-family: 'Montserrat', sans-serif
        }

        a {
            color: rgb(255, 187, 0);
        }

        #background-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to right, rgba(102, 45, 145, 0.619), rgba(145, 45, 115, 0.906)),
                url('https://media.istockphoto.com/id/1385118964/photo/shot-of-a-young-woman-using-a-digital-tablet-while-working-in-an-organic-store.jpg?s=612x612&w=0&k=20&c=mFc1p5N1FBnIRKSb6P106J2X98jXqV_IXH4eLFrsbO0=');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: left;
        }

        .authincation {
            position: relative;
        }

        .authincation-content {
            margin-top: 0%;
            background-color: #ffffff;
            /* Adjust the transparency level as needed */
            border-radius: 5px;
            overflow: hidden;
            margin-bottom: 0%;
            margin-right: 0%;
        }

        .auth-form {
            padding: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            margin-bottom: 5px;
        }


        @media (max-width: 767px) {
            .authincation-content {
                margin: 0px;
                width: 100%;
            }
        }

        .float-alert-bar {
            position: absolute;
            padding: 15px;
            width: 100%;
            background-color: #dc3545;
            /* Choose a background color that suits your design */
            color: #c77878;
            /* Text color */
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            z-index: 99999;
            /* Ensure it appears above other elements */
            display: block;
            /* Hide it by default */
        }

        #policy {
            margin-top: 4%;
            font-size: 12px;
        }

        @media (max-width: 767px) {
            #policy {
                margin-top: 0%;
                font-size: 9px;
            }
        }

        #form-card {
            padding: 4%;
        }

        @media (max-width: 767px) {
            #form-card {
                padding: 0%;
            }
        }

        #form-content {
            padding-top: 4%;
        }

        #leftSide {
            padding-top: 0%;
        }

        #slogan-text {
            font-size: 18px;
        }

        #id-text {
            font-size: 14px;
            margin-bottom: 2%;
        }

        @media (max-width: 767px) {
            #form-content {
                padding-top: 0%;
            }

            #create-text {
                font-size: 14px;
            }

            #leftSide {
                padding-top: 0%;
                margin-bottom: 2%;
            }

            #slogan-text {
                font-size: 14px;
            }

            #id-text {
                font-size: 10px;
            }
                    
            .disabled {
                opacity: 0.5;
                pointer-events: none;
                background-color: rgba(185, 161, 196, 0.379);
                background: rgba(185, 161, 196, 0.379);
                border-color: rgba(185, 161, 196, 0.379);
            }
        }
    </style>
</head>

<body class="h-100">
    <x-jet-validation-errors class="mb-4 text-xs float-alert-bar" style="color:rgb(255, 255, 255)" />
    <div id="background-container"></div>
    <div class="authincation h-100">
        <div class="container-fluid h-100 ">
            <div class="row justify-content-center align-items-center p-4 h-70">
                <div class="col-md-5 col-sm-12" id="leftSide">
                    <div class="text-center">
                        <div class="logo">
                            <a href="{{ route('welcome') }}">
                                <img width="170" src="{{ asset('/public/web/images/01-ft-logo.png') }}"
                                    alt="">
                            </a>
                        </div>
                        <h4 class="text-white" style="margin-top:2rem" id="slogan-text">Financial Inclusion for All!
                        </h4>
                        <p class="text-white mb-4" id="id-text">Welcome Back!</p>
                    </div>
                </div>
                <div class="col-md-6 d-flex align-items-center py-5">
                    <div class="container my-auto py-4 shadow-lg bg-white">
                        <div class="row">
                            <div class="col-11 col-lg-10 mx-auto">
                                <h2 id="create-text" style="color: #792db8" class="text-center mb-4"> <b>Validate
                                        OTP</b> </h2>
                                <p class="text-center"><img class="img-fluid"
                                        src="{{ asset('/public/web/images/otp-icon.png') }}" alt="verification"></p>
                                <p style="color:#792db8" class="text-muted text-center mb-4">Please enter the OTP (one
                                    time password) to verify your account. A code has been sent to <span
                                        class="text-dark text-4">{{ '-phone variable-' }}</span></p>
                                <p class="text-dark text-center fw-600 mb-3">Enter 5 digit code</p>
                                <form id="otp-screen" method="POST" class="text-white" action="{{ route('otp') }}">
                                    @csrf
                                    <div class="row g-3">
                                        <div class="col">
                                            <input type="text" class="form-control rounded-0 text-center text-6 py-2" maxlength="1" required="" autocomplete="off">
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control rounded-0 text-center text-6 py-2" maxlength="1" required="" autocomplete="off">
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control rounded-0 text-center text-6 py-2" maxlength="1" required="" autocomplete="off">
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control rounded-0 text-center text-6 py-2" maxlength="1" required="" autocomplete="off">
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control rounded-0 text-center text-6 py-2" maxlength="1" required="" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="d-grid my-4">
                                        {{-- <button
                                            style="background-color:#792db8; box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px;"
                                            type="submit" class="btn btn-block text-white text-lg"
                                            type="submit">Verify</button> --}}
                                        {{-- <p class="form-check-label font-w400">{!! __(
                                            'By confirming your credential we are able to secure and confirm your account. Please check our Mightyfin :terms_of_service and :privacy_policy',
                                            [
                                                'terms_of_service' =>
                                                    '<a target="_blank" href="' .
                                                    route('terms') .
                                                    '" class="underline text-sm text-gray-600 hover:text-gray-900">' .
                                                    __('Terms of Service') .
                                                    '</a>',
                                                'privacy_policy' =>
                                                    '<a target="_blank" href="' .
                                                    route('pp') .
                                                    '" class="underline text-sm text-gray-600 hover:text-gray-900">' .
                                                    __('Privacy Policy') .
                                                    '</a>',
                                            ],
                                        ) !!}</p> --}}
                                    </div>

                                </form>
                                <p class="text-center">Not received your code? <a href="{{ route('dashboard') }}"><u>Resend code</u></a>
                                </p>
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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        $(document).ready(function () {
            const inputs = $('input[type="text"]');
            const user_id = {!! json_encode(auth()->user()->id) !!};
            
            inputs.on('input', function () {
                const index = inputs.index(this);
                if (index < inputs.length - 1 && $(this).val().trim() !== '') {
                inputs.eq(index + 1).focus();
                }
            
                if (inputs.filter((_, el) => $(el).val().trim() !== '').length === inputs.length) {
                const otp = inputs.map((_, el) => $(el).val()).get().join('');
            
                // Disable input fields during the verification process
                inputs.addClass('disabled');
            
                $.post('api/verify-otp', { otp: otp, user_id: user_id }, function (response) {
                    // console.log(response === 'true');
                    if (response === 'true') {
                        // Display success swal alert
                        Swal.fire({
                            icon: 'success',
                            title: 'Verification Successful!',
                            text: 'Your OTP has been verified.',
                        });
                        // Use the route function to generate the URL based on the route name
                        const homeRoute = "{{ route('dashboard') }}";

                        // Redirect to the "home" route
                        window.location.href = homeRoute;
                    } else {
                        // Display error swal alert
                        Swal.fire({
                            icon: 'error',
                            title: 'Verification Failed!',
                            text: 'Please check your OTP and try again.',
                        });
                    }
            
                    // Remove disable effect after verification
                    inputs.removeClass('disabled');
                });
                }
            });
            
            inputs.on('keypress', function (e) {
                const key = e.which;
                if (key < 48 || key > 57) {
                e.preventDefault();
                }
            });
        });
        </script>

</body>

</html>
