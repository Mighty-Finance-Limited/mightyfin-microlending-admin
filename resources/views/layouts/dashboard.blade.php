<!DOCTYPE html>
<html lang="en">
@php
    // Gobal Variables
    $meta = App\Models\User::meta();
    $activeLoan = App\Models\Application::currentApplication();
    $status = App\Models\Application::currentApplication()->continue;
    $kyc = App\Models\Application::currentApplication()->complete;
    $route = request()
        ->route()
        ->getName();
        // @dd($status)
@endphp
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Mighty Finance Solution | App</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('public/images/m.jpg') }}" />
    <!-- Custom Stylesheet -->

    <link rel="stylesheet" href="{{ asset('public/mfs/css/style.css') }}" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="https://unpkg.com/intro.js/introjs.css">
    <!-- Include your modal library (e.g., Bootstrap) -->
    <!-- Add your modal CSS and JS here -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">
    @livewireStyles
    <style>
        .p-6 {
            padding: 3%;
        }

        .text-center {
            text-align: center;
        }

        #overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            /* background: rgba(0, 0, 0, 0.317); Dimmed background */
            backdrop-filter: blur(2px);
            /* Blurred background */
            z-index: 1;
        }

        /* Styling for the modal */
        #continue-loan-modal {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: rgba(0, 0, 0, 0.105);
            /* Dimmed background */
            backdrop-filter: blur(5px);
            /* Blurred background */
            padding: 20px;
            z-index: 2;
        }

        /* Optional: Style for the close button */
        .close {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }

        #sendDocModal {
            display: flex;
            align-items: center;
            justify-content: center;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            /* semi-transparent background overlay */
        }

        .send-doc-modal {
            max-width: 600px;
            z-index: 1050;
        }

        /* Default styles for the "hideInMobile" div */


        /* Media query to hide the "hideInMobile" div on screens smaller than 768 pixels */
        @media (max-width: 768px) {
            #hideInMobile {
                display: none;
            }
        }

        /* Styles for the modal */
        /* Styles for the modal */
        /* .modal {
            display: none;
            position: fixed;
            top: 30%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #483050af;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            z-index: 19999;
            padding: 8%;
            padding-left: 20%;
            margin-top: 10%;
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.5);
            width: 100%;
        } */

        /* Media query for mobile devices with a maximum width of 767px */
        /* @media (max-width: 768px) {
            .modal {
                padding: 2%;
                top: 45%;
                width: 100%;
            }
            .modal-content{
              width: 100%;
            }
        }
        .modal-content{
          width: 60%;
        } */
        .btn-bg{
            background-color: #662d91;
        }


        /* Style for the file input */
        #imageInput {
            display: none;
            /* Hide the actual file input */
        }

        .file-input-container {
            position: relative;
            overflow: hidden;
        }

        .file-input-label {
            display: block;
            padding: 10px;
            background-color: #3498db;
            color: #fff;
            cursor: pointer;
        }

        /* Stylish border for the preview container */
        #preview-container {
            max-width: 300px;
            margin-top: 20px;
            border: 2px dashed #3498db;
            padding: 10px;
            text-align: center;
        }

        #preview-image {
            max-width: 100%;
        }

        /* Style for the placeholder text in the preview container */
        #preview-container::before {
            content: 'No image selected';
            display: block;
            color: #777;
            font-style: italic;
            font-size: 12px;
            margin-bottom: 5px;
        }
    </style>

    <script src="https://jsuites.net/v4/jsuites.js"></script>
    <link rel="stylesheet" href="https://jsuites.net/v4/jsuites.css" type="text/css" />
    {{-- <script src="https://cdn.jsdelivr.net/npm/@jsuites/cropper/cropper.min.js"></script> --}}
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@jsuites/cropper/cropper.min.css" type="text/css" /> --}}
</head>

<body class="dashboard">

    <div id="preloader"><i>.</i><i>.</i><i>.</i></div>


    <div @if (request()->routeIs('dashboard')) style="margin-top:0px" @endif id="main-wrapper">

       
       @include('livewire.dashboard.__parts.header_content')
        <div class="sidebar" style="background-image: linear-gradient(to right, #792db8, #792db8); color:#fff;">
            <div class="brand-logo">
                <a href="{{ route('dashboard') }}" style="margin:4%;">
                    <img src="{{ asset('public/web/images/01-ft-logo.png') }}" alt="" width="80" />
                </a>
            </div>
            <div class="menu">
                <ul>
                    <li>
                        <a href="{{ route('dashboard') }}" data-toggle="tooltip" data-placement="right"
                            title="Dashboard">
                            <span class="text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                                    fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                                    <path
                                        d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z" />
                                </svg>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('view-loan-requests') }}" data-toggle="tooltip" data-placement="right"
                            title="My Loans">
                            <span class="text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                    fill="currentColor" class="bi bi-cash-stack" viewBox="0 0 16 16">
                                    <path d="M1 3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1zm7 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4" />
                                    <path
                                        d="M0 5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V7a2 2 0 0 1-2-2z" />
                                </svg>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('loan-wallet') }}" data-toggle="tooltip" data-placement="right"
                            title="My Wallet">
                            <span><i class="bi bi-wallet2 text-white"></i></span>
                        </a>
                    </li>
                    <li>
                        <a class="setting_" href="{{ route('settings') }}" data-toggle="tooltip" data-placement="right"
                            title="Settings">
                            <span><i class="bi bi-gear text-white"></i></span>
                        </a>
                    </li>
                    <li class="logout">
                        <a data-toggle="tooltip" data-placement="right" title="Signout">
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf
                                <button type="submit" class="dropdown-item ai-icon">
                                    <span><i class="bi bi-power text-white"></i></span>
                                </button>
                            </form>

                        </a>
                    </li>
                </ul>

                {{-- <p class="copyright">&#169; <a href="#">greenwebbtech</a></p> --}}
            </div>
        </div>

        {{ $slot }}

        @if($status == 1)
            @include('components.continue-application')
            @include('components.email-docs')
        @endif
    </div>
    @stack('modals')

    @livewireScripts
    <script src="{{ asset('public/mfs/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('public/mfs/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('public/mfs/vendor/apexchart/apexcharts.min.js') }}"></script>
    <script src="{{ asset('public/mfs/js/plugins/apex-price.js') }}"></script>

    <script src="{{ asset('public/mfs/vendor/basic-table/jquery.basictable.min.js') }}"></script>
    <script src="{{ asset('public/mfs/js/plugins/basic-table-init.js') }}"></script>

    <script src="{{ asset('public/mfs/vendor/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('public/mfs/js/plugins/perfect-scrollbar-init.js') }}"></script>

    <script src="{{ asset('public/mfs/js/dashboard.js') }}"></script>
    <script src="{{ asset('public/mfs/js/scripts.js') }}"></script>

    {{-- Third party --}}
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> --}}

    <script>
        AOS.init();
        let status = '{{ $status }}';
        let router = '{{ $route }}';
        let kyc = '{{ $kyc }}';

        $('#sendDocModal').hide();
        $('#sendDocResponseText').hide();
        $('#sendDocResponseText2').hide();

        if (status === '1') {
            $(document).ready(function() {
                // Show overlay and modal when the page loads
                $("#overlay, #continue-loan-modal").show();
            });

            function closeModal() {
                // Hide overlay and modal when the close button is clicked
                $("#overlay, #continue-loan-modal").hide();
            }
        }

        function openSendDocModal() {
            $('#sendDocModal').show();
        }

        function closeSendDocModal() {
            $('#sendDocModal').hide();
        }

        function shareDocuments() {
            // Disable the button and show the loading spinner
            $('#cancelShareDoc').hide();
            $('#shareButton').prop('disabled', true);
            $('#shareButtonText').hide();
            $('#shareButtonSpinner').removeClass('d-none');

            var formData = $('#shareDocsForm').serialize();
            var route = "{{ route('share.docs') }}"
            $.ajax({
                type: 'POST',
                url: route,
                data: formData,
                success: function(response) {
                    // Enable the button and hide the loading spinner
                    $('#shareButton').prop('disabled', false);
                    $('#shareButtonText').show();
                    $('#shareButtonSpinner').addClass('d-none');
                    $('#cancelShareDoc').show();
                    closeSendDocModal();
                    if (response.msg) {
                        $('#sendDocResponseText').show();
                    } else {
                        $('#sendDocResponseText2').show();
                    }
                },
                error: function(error) {
                    // Handle error, if needed
                    console.log(error);
                },
                complete: function() {
                    // Enable the button and hide the loading spinner
                    $('#shareButton').prop('disabled', false);
                    $('#shareButtonText').show();
                    $('#shareButtonSpinner').addClass('d-none');
                }
            });
        }
    </script>

    {{-- Loan Completion Form was here --}}

    <script src="https://unpkg.com/intro.js/intro.js"></script>
    <script>
        // Get the current URL
        var currentUrl = window.location.href;

        // Extract the route name from the URL
        var route = currentUrl.split('/').pop();

        // Check if the route starts with "dashboard"
        // if (route.startsWith('dashboard') && kyc === '0' ) {
        //     // alert('Current route starts with "dashboard"');
        //     introJs().setOptions({
        //         steps: [{
        //             element: document.querySelector('.tour-kyc-1'),
        //             intro: "Click here to complete your KYC profile information!",
        //             position: 'left'
        //         }]
        //     }).start();
        //     introJs().addHints();
        // } else {
        //     // alert('Current route does not start with "dashboard"');
        // }
    </script>

    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script>
        // let table = new DataTable('#default_loan_list', {
        //     responsive: true
        // });
        $(document).ready(function() {
            $('#default_loan_list').DataTable();
        });
    </script>
</body>


<!-- Mirrored from tende.vercel.app/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 17 Nov 2023 16:21:36 GMT -->

</html>
