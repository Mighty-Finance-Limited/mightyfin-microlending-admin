<style>
    #checkNowBtn {
        position: relative;
    }

    #disabledIcon {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        display: none;
        /* Initially hidden */
    }

    #checkNowBtn[disabled]:hover #disabledIcon {
        display: inline;
        /* Show the icon on hover when the button is disabled */
    }

    /* ranger */
    @import url("https://fonts.googleapis.com/css2?family=Creepster&family=montserrat:wght@700&display=swap");

    /* .container {
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
  } */

    .range-slider {
        position: relative;
        width: 35vmin;
        height: 15vmin;
    }

    .range-slider_input {
        width: 100%;
        position: absolute;
        top: 50%;
        z-index: 3;
        transform: translateY(-50%);
        -webkit-appearance: none;
        appearance: none;
        width: 100%;
        height: 4px;
        opacity: 0;
        margin: 0;
    }

    .range-slider_input::-webkit-slider-thumb {
        -webkit-appearance: none;
        appearance: none;
        width: 100px;
        height: 100px;
        cursor: pointer;
        border-radius: 50%;
        opacity: 0;
    }

    .range-slider_input::-moz-range-thumb {
        width: 14vmin;
        height: 14vmin;
        cursor: pointer;
        border-radius: 50%;
        opacity: 0;
    }

    .range-slider_thumb {
        width: 14vmin;
        height: 14vmin;
        border: 0.6vmin solid #662d91;
        border-radius: 50%;
        position: absolute;
        left: 0;
        top: 50%;
        transform: translateY(-50%);
        background-color: #f4f4f4;
        display: flex;
        justify-content: center;
        align-items: center;
        font-weight: 700;
        font-size: 4vmin;
        color: #662d91;
        z-index: 2;
    }

    .range-slider_line {
        height: 0.5vmin;
        width: 100%;
        background-color: #e1e1e1;
        top: 50%;
        transform: translateY(-50%);
        left: 0;
        position: absolute;
        z-index: 1;
    }

    .range-slider_line-fill {
        position: absolute;
        height: 0.5vmin;
        width: 0;
        background-color: #662d91;
    }

    .button-container {
        display: flex;
        justify-content: space-between;
        gap: 4%;
        width: 100%;
    }

    .btn-default {
        background-color: rgb(90, 0, 128);
        color: white;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 10px;
        text-align: center;
    }

    .btn-default:hover {
        background-color: rgb(105, 0, 128);
    }

    .btn-primary span {
        margin-bottom: 5px;
    }

    .btn-primary svg {
        width: 1.5em;
        height: 1.5em;
        margin-bottom: 5px;
    }

    @media (max-width: 767px) {
        .button-container {
            padding-right: 4%;
        }
    }
</style>
<div class="col-12" style="background-image: linear-gradient(to right, #792db8, #912d73); color:#fff">
    <div style="margin-top: 0px;" class="content-body">
        <div class="container-fluid">
            <div class="header" style="background: #6d0b6700;position: absolute;top: 26px;">
                <div class="container">
                    <div class="row">
                        <div class="col-xxl-12">
                            <div class="header-content">

                                <div class="header-left">



                                </div>

                                {{-- <div id="hideInMobile" class="header-right">
              <div class="notify-bell">
                <span class="btn" style="background: #662d91"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-repeat" viewBox="0 0 16 16">
                  <path d="M11 5.466V4H5a4 4 0 0 0-3.584 5.777.5.5 0 1 1-.896.446A5 5 0 0 1 5 3h6V1.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384l-2.36 1.966a.25.25 0 0 1-.41-.192Zm3.81.086a.5.5 0 0 1 .67.225A5 5 0 0 1 11 13H5v1.466a.25.25 0 0 1-.41.192l-2.36-1.966a.25.25 0 0 1 0-.384l2.36-1.966a.25.25 0 0 1 .41.192V12h6a4 4 0 0 0 3.585-5.777.5.5 0 0 1 .225-.67Z"/>
                </svg> Transfer</span>
              </div>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <div class="notify-bell">
                <span class="btn text-primary" style="background: #662d912f"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-safe" viewBox="0 0 16 16">
                  <path d="M1 1.5A1.5 1.5 0 0 1 2.5 0h12A1.5 1.5 0 0 1 16 1.5v13a1.5 1.5 0 0 1-1.5 1.5h-12A1.5 1.5 0 0 1 1 14.5V13H.5a.5.5 0 0 1 0-1H1V8.5H.5a.5.5 0 0 1 0-1H1V4H.5a.5.5 0 0 1 0-1H1zM2.5 1a.5.5 0 0 0-.5.5v13a.5.5 0 0 0 .5.5h12a.5.5 0 0 0 .5-.5v-13a.5.5 0 0 0-.5-.5z"/>
                  <path d="M13.5 6a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5M4.828 4.464a.5.5 0 0 1 .708 0l1.09 1.09a3.003 3.003 0 0 1 3.476 0l1.09-1.09a.5.5 0 1 1 .707.708l-1.09 1.09c.74 1.037.74 2.44 0 3.476l1.09 1.09a.5.5 0 1 1-.707.708l-1.09-1.09a3.002 3.002 0 0 1-3.476 0l-1.09 1.09a.5.5 0 1 1-.708-.708l1.09-1.09a3.003 3.003 0 0 1 0-3.476l-1.09-1.09a.5.5 0 0 1 0-.708zM6.95 6.586a2 2 0 1 0 2.828 2.828A2 2 0 0 0 6.95 6.586"/>
                </svg> Fund Account</span>
              </div>
            </div> --}}
                                <div class="header-right">
                                    <div class="dark-light-toggle" onclick="themeToggle()">
                                        <span class="dark"><i class="bi bi-moon"></i></span>
                                        <span class="light"><i class="bi bi-brightness-high"></i></span>
                                    </div>


                                    @include('livewire.dashboard.__parts.notifcations_part')
                                    @include('livewire.dashboard.__parts.profile_part')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="">
                <div style="padding-top: 7svh" class="col-xl-12">
                    <div class="page-title-content">
                        <h1 style="font-size:4svh; " class="text-white card-title">Dashboard</h1>

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @elseif(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @else
                            <p style="margin-top: 1rem; font-size:2.5svh;">
                                Welcome Back,
                                <strong class="text-secondary">
                                    {{ auth()->user()->fname . ' ' . auth()->user()->lname }}!</strong>
                            </p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">


                <div class="col-xl-9">
                    <div class="row">
                        <div class="col-xxl-12 col-xl-12">
                            <div class="home-chart" color:#fff">
                                <div style="padding-left: 0px;" class="card-body">
                                    <p class="text-white" style="margin-bottom: 0px; color: #fec00f !important;">
                                        Your Wallet Balance
                                    </p>
                                    <div class="home-chart-height">
                                        <div class="row">
                                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                                <div class="my-2">
                                                    <h1 class="text-white" style="font-weight: 900;">0.00 ZMW</h1>
                                                </div>
                                            </div>

                                        </div>
                                        <div id="chartx"></div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        {{-- <div class="col-xxl-4 col-xl-4">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Latest Loans</h4>
            </div>
            <div class="card-body">
              <ul class="balance-widget trade-balance">
                <li>
                  <h5>GRZ Loan</h5>
                  <div class="text-end">
                    <h5>K10000</h5>
                    <span>K12100.</span>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div> --}}

                        {{-- <div class="col-xxl-8">
        <div class="card">
            <div class="card-header">
            <h4 class="card-title">Balance</h4>
            </div>
            <div class="card-body">
            <div class="row align-items-center">
                <div class="col-xxl-6 col-xl-6 col-lg-6">
                <div class="balance-chart">
                    <div id="balance-chart"></div>
                    <h4>Total Balance = K 5360</h4>
                </div>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6">
                <ul class="balance-widget mt-4">
                    <li>
                    <div class="icon-title">
                        <i class="cc BTC"></i>
                        <span>Bitcoin</span>
                    </div>
                    <div class="text-end">
                        <h5>0.000242 BTC</h5>
                        <span>0.125 USD</span>
                    </div>
                    </li>
                    <li>
                    <div class="icon-title">
                        <i class="cc USDT"></i>
                        <span>Tether</span>
                    </div>
                    <div class="text-end">
                        <h5>0.000242 USDT</h5>
                        <span>0.125 USD</span>
                    </div>
                    </li>
                    <li>
                    <div class="icon-title">
                        <i class="cc XTZ"></i>
                        <span>Tezos</span>
                    </div>
                    <div class="text-end">
                        <h5>0.000242 XTZ</h5>
                        <span>0.125 USD</span>
                    </div>
                    </li>
                    <li>
                    <div class="icon-title">
                        <i class="cc XMR"></i>
                        <span>Monero</span>
                    </div>
                    <div class="text-end">
                        <h5>0.000242 XMR</h5>
                        <span>0.125 USD</span>
                    </div>
                    </li>
                </ul>
                </div>
            </div>
            </div>
        </div>
        </div> --}}



                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
<div class="content-body">
    <div class="container-fluid">
        <div class="row" style="">
            <div class="col-xl-12">
                <div class="page-title-content">

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @elseif(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @else
                        
                    @endif
                </div>
            </div>
        </div>
        <div class="row">


            <div class="col-xl-9">
                <div class="row">
                    {{-- <div class="col-xxl-12 col-xl-12">
                        <div class="card home-chart"
                            style="background-image: linear-gradient(to right, #662d91, #912d73); color:#fff">
                          
                            <div class="card-body">
                                <h4 class="card-title home-chart text-white">Your Balance</h4>
                                <div class="home-chart-height">
                                    <div class="row">
                                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                            <div class="my-2">
                                                <h1 class="text-white" style="font-weight: 900;">0.00 ZMW</h1>
                                            </div>
                                        </div>
                                       
                                    </div>
                                    <div id="chartx"></div>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                    {{-- <div class="col-xxl-4 col-xl-4">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Latest Loans</h4>
                </div>
                <div class="card-body">
                  <ul class="balance-widget trade-balance">
                    <li>
                      <h5>GRZ Loan</h5>
                      <div class="text-end">
                        <h5>K10000</h5>
                        <span>K12100.</span>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div> --}}

                    {{-- <div class="col-xxl-8">
            <div class="card">
                <div class="card-header">
                <h4 class="card-title">Balance</h4>
                </div>
                <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-xxl-6 col-xl-6 col-lg-6">
                    <div class="balance-chart">
                        <div id="balance-chart"></div>
                        <h4>Total Balance = K 5360</h4>
                    </div>
                    </div>
                    <div class="col-xxl-6 col-xl-6 col-lg-6">
                    <ul class="balance-widget mt-4">
                        <li>
                        <div class="icon-title">
                            <i class="cc BTC"></i>
                            <span>Bitcoin</span>
                        </div>
                        <div class="text-end">
                            <h5>0.000242 BTC</h5>
                            <span>0.125 USD</span>
                        </div>
                        </li>
                        <li>
                        <div class="icon-title">
                            <i class="cc USDT"></i>
                            <span>Tether</span>
                        </div>
                        <div class="text-end">
                            <h5>0.000242 USDT</h5>
                            <span>0.125 USD</span>
                        </div>
                        </li>
                        <li>
                        <div class="icon-title">
                            <i class="cc XTZ"></i>
                            <span>Tezos</span>
                        </div>
                        <div class="text-end">
                            <h5>0.000242 XTZ</h5>
                            <span>0.125 USD</span>
                        </div>
                        </li>
                        <li>
                        <div class="icon-title">
                            <i class="cc XMR"></i>
                            <span>Monero</span>
                        </div>
                        <div class="text-end">
                            <h5>0.000242 XMR</h5>
                            <span>0.125 USD</span>
                        </div>
                        </li>
                    </ul>
                    </div>
                </div>
                </div>
            </div>
            </div> --}}


                    {{-- Yellow Background --}}
                    @include('livewire.dashboard.__parts.current-balance')
                    {{-- Qiuck Actions --}}
                    <p>

                      <strong class="text-primary">
                          Quick Actions</strong>
                  </p>
                    <div class="button-container mb-4">
                        <a class="text-center" href="{{ route('payment.gate', ['view' => 'bills']) }}">
                            <span class="btn btn-default">
                                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35"
                                    fill="currentColor" class="bi bi-receipt" viewBox="0 0 16 16">
                                    <path
                                        d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v12a.5.5 0 0 1-.053.224l-.5 1a.5.5 0 0 1-.8.13L13 14.707l-.646.647a.5.5 0 0 1-.708 0L11 14.707l-.646.647a.5.5 0 0 1-.708 0L9 14.707l-.646.647a.5.5 0 0 1-.708 0L7 14.707l-.646.647a.5.5 0 0 1-.708 0L5 14.707l-.646.647a.5.5 0 0 1-.708 0L3 14.707l-.646.647a.5.5 0 0 1-.801-.13l-.5-1A.5.5 0 0 1 1 14V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27m.217 1.338L2 2.118v11.764l.137.274.51-.51a.5.5 0 0 1 .707 0l.646.647.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.509.509.137-.274V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0z" />
                                    <path
                                        d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5m8-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5" />
                                </svg>
                            </span>
                            <small>Pay Bills</small>
                        </a>
                        <a class="text-center" href="{{ route('payment.gate', ['view' => 'invest']) }}">
                            <span class="btn btn-default">
                                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35"
                                    fill="currentColor" class="bi bi-graph-up-arrow" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M0 0h1v15h15v1H0zm10 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V4.9l-3.613 4.417a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61L13.445 4H10.5a.5.5 0 0 1-.5-.5" />
                                </svg>
                            </span>
                            <small>Invest</small>
                        </a>
                        <a class="text-center" href="{{ route('payment.gate', ['view' => 'deposit']) }}">
                            <span class="btn btn-default">
                                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35"
                                    fill="currentColor" class="bi bi-wallet" viewBox="0 0 16 16">
                                    <path
                                        d="M0 3a2 2 0 0 1 2-2h13.5a.5.5 0 0 1 0 1H15v2a1 1 0 0 1 1 1v8.5a1.5 1.5 0 0 1-1.5 1.5h-12A2.5 2.5 0 0 1 0 12.5zm1 1.732V12.5A1.5 1.5 0 0 0 2.5 14h12a.5.5 0 0 0 .5-.5V5H2a1.99 1.99 0 0 1-1-.268M1 3a1 1 0 0 0 1 1h12V2H2a1 1 0 0 0-1 1" />
                                </svg>
                            </span>
                            <small>Deposit</small>
                        </a>
                        <a class="text-center" href="{{ route('profile.show', ['view' => 'kyc']) }}">
                            <span class="btn btn-default">
                                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35"
                                    fill="currentColor" class="bi bi-lightning-charge-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M11.251.068a.5.5 0 0 1 .227.58L9.677 6.5H13a.5.5 0 0 1 .364.843l-8 8.5a.5.5 0 0 1-.842-.49L6.323 9.5H3a.5.5 0 0 1-.364-.843l8-8.5a.5.5 0 0 1 .615-.09z" />
                                </svg>
                            </span>
                            <small>KYC</small>
                        </a>
                        <a class="text-center" href="{{ route('payment.gate', ['view' => 'withdraw']) }}">
                            <span class="btn btn-default">
                                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35"
                                    fill="currentColor" class="bi bi-cash" viewBox="0 0 16 16">
                                    <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4" />
                                    <path
                                        d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2z" />
                                </svg>
                            </span>
                            <small>Widthdraw</small>
                        </a>
                    </div>
                    <p>

                      <strong class="text-primary">
                        Wallet Information</strong>
                  </p>
                   
                    <div class="col-xxl-4 col-xl-12">
                        <div class="row">
                            <div class="col-xxl-12 col-xl-4 col-lg-6">
                                <div class="price-widget">
                                    <a href="price-details.html">
                                        <div class="price-content">
                                            <div class="icon-title">
                                                <span class="badge badge-primary">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="currentColor" class="bi bi-wallet2"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M12.136.326A1.5 1.5 0 0 1 14 1.78V3h.5A1.5 1.5 0 0 1 16 4.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 13.5v-9a1.5 1.5 0 0 1 1.432-1.499L12.136.326zM5.562 3H13V1.78a.5.5 0 0 0-.621-.484zM1.5 4a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5z" />
                                                    </svg>
                                                </span>
                                                <span>Wallet</span>
                                            </div>
                                            <h5>K 0.00</h5>
                                        </div>
                                        {{-- <div id="chart"></div> --}}
                                    </a>
                                </div>
                            </div>
                            <div class="col-xxl-12 col-xl-4 col-lg-6">
                                <div class="price-widget">
                                    <a href="price-details.html">
                                        <div class="price-content">
                                            <div class="icon-title">
                                                <span class="badge badge-primary">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="currentColor"
                                                        class="bi bi-box-arrow-in-down" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd"
                                                            d="M3.5 6a.5.5 0 0 0-.5.5v8a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5v-8a.5.5 0 0 0-.5-.5h-2a.5.5 0 0 1 0-1h2A1.5 1.5 0 0 1 14 6.5v8a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 14.5v-8A1.5 1.5 0 0 1 3.5 5h2a.5.5 0 0 1 0 1z" />
                                                        <path fill-rule="evenodd"
                                                            d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                                                    </svg>
                                                </span>
                                                <span>Withdrawals</span>
                                            </div>
                                            <h5>K 0.0</h5>
                                        </div>
                                        {{-- <div id="chart2"></div> --}}
                                    </a>
                                </div>
                            </div>
                            <div class="col-xxl-12 col-xl-4 col-lg-6">
                                <div class="price-widget">
                                    <a href="price-details.html">
                                        <div class="price-content">
                                            <div class="icon-title">
                                                <span class="badge badge-primary">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="currentColor"
                                                        class="bi bi-box-arrow-in-up" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd"
                                                            d="M3.5 10a.5.5 0 0 1-.5-.5v-8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 0 0 1h2A1.5 1.5 0 0 0 14 9.5v-8A1.5 1.5 0 0 0 12.5 0h-9A1.5 1.5 0 0 0 2 1.5v8A1.5 1.5 0 0 0 3.5 11h2a.5.5 0 0 0 0-1z" />
                                                        <path fill-rule="evenodd"
                                                            d="M7.646 4.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V14.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708z" />
                                                    </svg>
                                                </span>
                                                <span>Deposits</span>
                                            </div>
                                            <h5>K 0.00</h5>
                                        </div>
                                        {{-- <div id="chart3"></div> --}}
                                    </a>
                                </div>
                            </div>
                            <!-- <div class="col-xxl-6 col-xl-4 col-lg-6">
                                    <div class="price-widget">
                                        <a href="price-details.html">
                                            <div class="price-content">
                                                <div class="icon-title">
                                                    <i class="cc USDT"></i>
                                                    <span>Tether</span>
                                                </div>
                                                <h5>K 11,785.10</h5>
                                            </div>
                                            <div id="chart4"></div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-xl-4 col-lg-6">
                                    <div class="price-widget">
                                        <a href="price-details.html">
                                            <div class="price-content">
                                                <div class="icon-title">
                                                    <i class="cc USDT"></i>
                                                    <span>Tether</span>
                                                </div>
                                                <h5>K 11,785.10</h5>
                                            </div>
                                            <div id="chart5"></div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-xl-4 col-lg-6">
                                    <div class="price-widget">
                                        <a href="price-details.html">
                                            <div class="price-content">
                                                <div class="icon-title">
                                                    <i class="cc USDT"></i>
                                                    <span>Tether</span>
                                                </div>
                                                <h5>K 11,785.10</h5>
                                            </div>
                                            <div id="chart6"></div>
                                        </a>
                                    </div>
                                </div> -->
                        </div>
                    </div><p>

                      <strong class="text-primary">
                        Loan History</strong>
                  </p>
                    
                    <div class="col-xxl-12 col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Recent Loans</h4>
                                <span>
                                    <a href="{{ route('view-loan-requests') }}">See more</a>
                                </span>
                            </div>
                            @if (!empty($all_loan_requests->toArray()))
                                <div class="card-body">
                                    <div class="table-responsive transaction-table">
                                        <table class="table table-striped responsive-table">
                                            <thead>
                                                <tr>
                                                    <th>Loan ID</th>
                                                    <th>Date</th>
                                                    <th>Type</th>
                                                    <th>Amount</th>
                                                    <th>Payback</th>
                                                    {{-- <th>Fee</th> --}}
                                                    <th>Balance</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($all_loan_requests as $loan)
                                                    <tr>
                                                        <td>{{ $loan->id }}</td>
                                                        <td>{{ $loan->created_at->toFormattedDateString() }}
                                                        </td>
                                                        <td>
                                                            <span class="danger-arrow">{{ $loan->type }}</span>
                                                        </td>
                                                        <td class="text-primary">
                                                            {{ $loan->amount }} ZMW</td>
                                                        <td class="text-danger">
                                                            {{ App\Models\Application::payback($loan->amount, $loan->repayment_plan) }}
                                                            ZMW</td>
                                                        {{-- <td>0.02%</td> --}}
                                                        <td><strong>{{ App\Models\Loans::loan_balance($loan->id) }}
                                                                ZMW</strong></td>
                                                    </tr>
                                                @empty
                                                    <p>No Completed Loans</p>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-xl-3">
                <div class="row">
                    @if ($my_loan->complete == 0)
                        <div class="col-xxl-12 col-xl-12 col-lg-6">
                            <div class="card welcome-profile"
                                style="background-image: linear-gradient(to right, #662d91, #662d91); color:#fff">
                                <div class="card-body">
                                    {{-- <img src="https://www.seekpng.com/png/detail/72-729756_how-to-add-a-new-user-to-your.png" alt="" /> --}}
                                    <h4>Hi,
                                        {{ auth()->user()->fname . ' ' . auth()->user()->lname }}!
                                    </h4>
                                    <p>
                                        Looks like you are not verified yet. Update your full
                                        profile details to use
                                        the full potential of MFS.
                                    </p>

                                    <ul>
                                        {{-- <li>
                        <a href="#">
                          <span class="verified"
                            ><i class="icofont-check"></i
                          ></span>
                          Verify account
                        </a>
                      </li> --}}
                                        <li>
                                            <a class="tour-kyc-1"
                                                href="{{ route('profile.show', ['view' => 'kyc']) }}">
                                                <span class="not-verified"><i class="icofont-close-line"></i></span>
                                                Update Profile (KYC)
                                                <div data-hint="Please continue to update and upload neccessary 
                            profile information, to allow quick loan processing and review"
                                                    data-hint-position="top-left"></div>
                                            </a>
                                        </li>
                                        {{-- <li>
                        <a href="#">
                          <span class="not-verified"
                            ><i class="icofont-close-line"></i
                          ></span>
                          Two-factor authentication (2FA)
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <span class="not-verified"
                            ><i class="icofont-close-line"></i
                          ></span>
                          Deposit money
                        </a>
                      </li> --}}
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="mb-4 justify-content-between" style="display: flex; gap:1%;">
                        <div class="notify-bell">
                            <a href="{{ route('payment.gate', ['view' => 'deposit']) }}" class="btn"
                                style="background: #662d91">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-repeat" viewBox="0 0 16 16">
                                    <path
                                        d="M11 5.466V4H5a4 4 0 0 0-3.584 5.777.5.5 0 1 1-.896.446A5 5 0 0 1 5 3h6V1.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384l-2.36 1.966a.25.25 0 0 1-.41-.192Zm3.81.086a.5.5 0 0 1 .67.225A5 5 0 0 1 11 13H5v1.466a.25.25 0 0 1-.41.192l-2.36-1.966a.25.25 0 0 1 0-.384l2.36-1.966a.25.25 0 0 1 .41.192V12h6a4 4 0 0 0 3.585-5.777.5.5 0 0 1 .225-.67Z" />
                                </svg> Transfer
                            </a>
                        </div>
                        <div class="notify-bell">
                            <a href="{{ route('payment.gate', ['view' => 'deposit']) }}" class="btn text-primary"
                                style="background: #662d912f"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                    height="16" fill="currentColor" class="bi bi-safe" viewBox="0 0 16 16">
                                    <path
                                        d="M1 1.5A1.5 1.5 0 0 1 2.5 0h12A1.5 1.5 0 0 1 16 1.5v13a1.5 1.5 0 0 1-1.5 1.5h-12A1.5 1.5 0 0 1 1 14.5V13H.5a.5.5 0 0 1 0-1H1V8.5H.5a.5.5 0 0 1 0-1H1V4H.5a.5.5 0 0 1 0-1H1zM2.5 1a.5.5 0 0 0-.5.5v13a.5.5 0 0 0 .5.5h12a.5.5 0 0 0 .5-.5v-13a.5.5 0 0 0-.5-.5z" />
                                    <path
                                        d="M13.5 6a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5M4.828 4.464a.5.5 0 0 1 .708 0l1.09 1.09a3.003 3.003 0 0 1 3.476 0l1.09-1.09a.5.5 0 1 1 .707.708l-1.09 1.09c.74 1.037.74 2.44 0 3.476l1.09 1.09a.5.5 0 1 1-.707.708l-1.09-1.09a3.002 3.002 0 0 1-3.476 0l-1.09 1.09a.5.5 0 1 1-.708-.708l1.09-1.09a3.003 3.003 0 0 1 0-3.476l-1.09-1.09a.5.5 0 0 1 0-.708zM6.95 6.586a2 2 0 1 0 2.828 2.828A2 2 0 0 0 6.95 6.586" />
                                </svg> Fund Account</a>
                        </div>
                    </div>

                    <div class="col-xxl-12 col-xl-12 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Loan Calculator</h4>
                            </div>
                            <div class="card-body">
                                <form name="myform" class="currency_validate trade-form row g-3">
                                    <div class="col-12">
                                        <label class="form-label">Principal (ZMW)</label>
                                        <div class="input-group">
                                            {{-- <select class="form-select" name="method">
                          <option value="ZMW">ZMW</option>
                          <option value="master">Euro</option>
                        </select> --}}
                                            <input type="text" name="currency_amount" class="form-control"
                                                placeholder="0.00" id="amountInput" value="100"
                                                contentEditable='true' data-mask='K #,##0.00' />
                                        </div>
                                    </div>
                                    {{--
                    <div class="col-12">
                      <label class="form-label">Duration</label>
                      <div class="input-group">
                        <select class="form-select" name="method">
                          <option value="Months">Months</option>
                          <option value="Years">Years</option>
                        </select>
                        <input
                          type="text"
                          name="currency_amount"
                          class="form-control"
                          placeholder="2"
                        />
                      </div>
                    </div> --}}

                                    {{-- <p class="mb-0">
                      1 USD ~ 0.000088 BTC
                      <a href="#">Expected rate <br />No extra fees</a>
                    </p> --}}

                                    {{-- <button
                      type="submit"
                      name="submit"
                      class="btn btn-block"
                      style="background: #662d91"
                      disabled
                    >
                    <span>Check Now</span>
                    <span class="icon" id="disabledIcon">&#128683;</span>
                    </button> --}}

                                    <div style="">
                                        <div class="range-slider">
                                            <div id="slider_thumb" class="range-slider_thumb">
                                            </div>
                                            <div class="range-slider_line">
                                                <div id="slider_line" class="range-slider_line-fill"></div>
                                            </div>
                                            <input id="slider_input" name="duration" class="range-slider_input"
                                                type="range" value="1" min="1" max="18">
                                        </div>
                                    </div>
                                    <div>
                                        <p id="slider_value2">1 Month(s)</p>
                                        <p id="interest_value2">Interest Rate: 21%</p>
                                        <p id="principal_value2"></p>
                                        <p style="padding: 2%; background-color:#662d91"
                                            class="bg-[#662d91] text-white" id="payback_value">
                                            Calculator</p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-xxl-12 col-xl-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Position Valuation</h4>
                </div>
                <div class="card-body">
                  <ul class="balance-widget position-value">
                    <li>
                      <h5>Opening Cost</h5>
                      <div class="text-end">
                        <h5>K0.0000</h5>
                        <span>Original cost of all open positions.</span>
                      </div>
                    </li>
                    <li>
                      <h5>Current Valuation</h5>
                      <div class="text-end">
                        <h5>K0.0000</h5>
                        <span>Paper valuation of all open positions.</span>
                      </div>
                    </li>
                    <li>
                      <h5>Profit</h5>
                      <div class="text-end">
                        <h5>K0.0000 (0,00%)</h5>
                        <span>Paper profit of all open positions..</span>
                      </div>
                    </li>
                    <li>
                      <h5>Loss</h5>
                      <div class="text-end">
                        <h5>K0.0000 (0,00%)</h5>
                        <span>Paper loss of all open positions.</span>
                      </div>
                    </li>
                    <li>
                      <h5>Fees</h5>
                      <div class="text-end">
                        <h5>K0.0000</h5>
                        <span>Current Fee</span>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div> --}}

                    <div class="col-xxl-12 col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="invite-content">
                                    <h4>Invite a friend and get K30</h4>
                                    <p>
                                        You will receive up to K30 when they： (1).Apply for a Loan
                                        (2).
                                        Get approved and (3). Payback <br /><a href="#">Learn
                                            more</a>
                                    </p>

                                    <div class="copy-link">
                                        <form action="#">
                                            <div class="input-group">
                                                <input disabled type="text" class="form-control"
                                                    value="https://mightyfinance.co.zm/" />
                                                <span class="input-group-text copy"
                                                    style="background: #662d91">Copy</span>
                                            </div>
                                        </form>
                                    </div>

                                    <!-- <div class="social-share-link">
                          <a href="#"><span><i class="icofont-facebook"></i></span></a>
                          <a href="#"><span><i class="icofont-twitter"></i></span></a>
                          <a href="#"><span><i class="icofont-whatsapp"></i></span></a>
                          <a href="#"><span><i class="icofont-telegram"></i></span></a>
                      </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-xxl-12 col-xl-6 col-lg-12">
                  <div class="card">
                      <div class="card-body">
                          <div class="invite-content">
                              <h4>Get free BTC every day</h4>
                              <p>Earn free bitcoins in rewards by completing a learning mission daily or
                                  inviting
                                  friends to Tende. <a href="#">Learn more</a>

                              </p>

                              <a href="#" class="btn btn-primary">Invite friends to join</a>
                          </div>
                      </div>
                  </div>
              </div> -->
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

        // Get the input element by its ID
        const amountInput = document.getElementById('amountInput');
        var slider_months = 1;
        // init calucator
        var init_return = (parseInt(100) * 0.21) * parseInt(1) + parseInt(100);

        $('#payback_value').text('Payback amount of: K' + init_return.toFixed(2));
        // Add an input event listener to the input element
        amountInput.addEventListener('input', function() {
            // Get the current value of the input
            var inputValue = amountInput.value;

            // Remove non-numeric characters (letters, symbols, commas)
            var numericValue = inputValue.replace(/[^0-9.]/g, '');

            // Convert the numeric value to a float
            principal = parseInt(numericValue);

            // Log the cleaned and converted value to the console
            var my_returns = (parseInt(principal) * 0.21) * parseInt(slider_months) + parseInt(
                principal);
            $('#payback_value').text('Payback amount of: K' + my_returns.toFixed(2));
            $('#principal_value').text('Borrowing: K' + principal);
            // Update a display element with the current value
            $('#slider_value').text('Payback in ' + slider_months + ' Months');
        });


        // Use input event to track changes in the range input value
        $('#slider_input').on('input', function() {

            // Get the current value of the range input
            var sliderValue = $(this).val();
            slider_months = sliderValue;
            // Convert the numeric value to a float
            // Get the current value of the input
            var inputValue = amountInput.value;

            // Remove non-numeric characters (letters, symbols, commas)
            var numericValue = inputValue.replace(/[^0-9.]/g, '');

            // Convert the numeric value to a float
            principal = parseInt(numericValue);

            var my_returns = (parseInt(principal) * 0.21) * parseInt(sliderValue) + parseInt(principal);

            // Convert the numeric value to a float
            principal = parseInt(numericValue);

            $('#payback_value').text('Payback amount of: K' + my_returns.toFixed(2));
            $('#principal_value').text('Borrowing: K' + principal);
            // Update a display element with the current value
            $('#slider_value').text('Payback in ' + sliderValue + ' Months');
        });
    });

    const slider_input = document.getElementById('slider_input'),
        slider_thumb = document.getElementById('slider_thumb'),
        slider_line = document.getElementById('slider_line');

    function showSliderValue() {
        slider_thumb.innerHTML = slider_input.value;
        const bulletPosition = (slider_input.value / slider_input.max),
            space = slider_input.offsetWidth - slider_thumb.offsetWidth;

        slider_thumb.style.left = (bulletPosition * space) + 'px';
        slider_line.style.width = slider_input.value + '%';
    }

    showSliderValue();
    window.addEventListener("resize", showSliderValue);
    slider_input.addEventListener('input', showSliderValue, false);
</script>
