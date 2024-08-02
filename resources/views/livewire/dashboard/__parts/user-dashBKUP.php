<div class="content-body">
    <div class="container-fluid" style="background: #2f0238;" class="py-4 col-xl-12 col-lg-12 col-sm-12">
        <h1 class="mb-6" style="color: rgb(255, 251, 0)">Details</h1>
    </div>
    <div style="margin-top: -10%" class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-lg-6 col-sm-6 ">
                <div class="widget-stat card rounded">
                    <div class="card-body p-4">
                        <div class="media ai-icon">
                            <span class="mr-3 bgl-primary text-primary">
                                <!-- <i class="ti-user"></i> -->
                                <svg id="icon-customers" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                            </span>
                            <div class="media-body">
                                <p class="mb-1">My Loans</p>
                                <h4 class="mb-0">{{ App\Models\Loans::total_loans(auth()->user()->id) }}</h4>
                                {{-- <span class="badge badge-primary">+3.5%</span> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-sm-6">
                <div class="widget-stat card rounded">
                    <div class="card-body p-4">
                        <div class="media ai-icon">
                            <span class="mr-3 bgl-warning text-warning">
                                <svg id="icon-orders" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text">
                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                    <polyline points="14 2 14 8 20 8"></polyline>
                                    <line x1="16" y1="13" x2="8" y2="13"></line>
                                    <line x1="16" y1="17" x2="8" y2="17"></line>
                                    <polyline points="10 9 9 9 8 9"></polyline>
                                </svg>
                            </span>
                            <div class="media-body">
                                <p class="mb-1">Total Loan</p>
                                <h4 class="mb-0">K{{ App\Models\Loans::customer_total_borrowed(auth()->user()->id) }}</h4>
                                {{-- <span class="badge badge-warning">+3.5%</span> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-sm-6">
                <div class="widget-stat card rounded">
                    <div class="card-body  p-4">
                        <div class="media ai-icon">
                            <span class="mr-3 bgl-danger text-danger">
                                <svg id="icon-revenue" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign">
                                    <line x1="12" y1="1" x2="12" y2="23"></line>
                                    <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                                </svg>
                            </span>
                            <div class="media-body">
                                <p class="mb-1">Total Balance</p>
                                <h4 class="mb-0">K{{ App\Models\Loans::customer_balance(auth()->user()->id) }} </h4>
                                {{-- <span class="badge badge-danger">-3.5%</span> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-sm-6">
                <div class="widget-stat card rounded">
                    <div class="card-body p-4">
                        <div class="media ai-icon">
                            <span class="mr-3 bgl-success text-success">
                                <svg id="icon-database-widget" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-database">
                                    <ellipse cx="12" cy="5" rx="9" ry="3"></ellipse>
                                    <path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path>
                                    <path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path>
                                </svg>
                            </span>
                            <div class="media-body">
                                <p class="mb-1">Invites</p>
                                <h4 class="mb-0">0</h4>
                                <span class="badge badge-success">0%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6">
                <div class="mt-2 border-0 pb-0">
                    <div class="card-action card-tabs mt-sm-0">
                        <div class="py-2">
                            <h4 class="fs-20 text-black">Menu Favourite</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 gap-4 row">
                        <div class="col-xl-4 col-4 items-center justify-content-center">
                            <a href="{{ route('view-loan-requests') }}">
                                <div class="widget-stat card rounded">
                                    <div class="text-center items-center justify-content-center card-body p-4">
                                        <span class="">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-piggy-bank" viewBox="0 0 16 16">
                                                <path d="M5 6.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0zm1.138-1.496A6.613 6.613 0 0 1 7.964 4.5c.666 0 1.303.097 1.893.273a.5.5 0 0 0 .286-.958A7.602 7.602 0 0 0 7.964 3.5c-.734 0-1.441.103-2.102.292a.5.5 0 1 0 .276.962z"/>
                                                <path fill-rule="evenodd" d="M7.964 1.527c-2.977 0-5.571 1.704-6.32 4.125h-.55A1 1 0 0 0 .11 6.824l.254 1.46a1.5 1.5 0 0 0 1.478 1.243h.263c.3.513.688.978 1.145 1.382l-.729 2.477a.5.5 0 0 0 .48.641h2a.5.5 0 0 0 .471-.332l.482-1.351c.635.173 1.31.267 2.011.267.707 0 1.388-.095 2.028-.272l.543 1.372a.5.5 0 0 0 .465.316h2a.5.5 0 0 0 .478-.645l-.761-2.506C13.81 9.895 14.5 8.559 14.5 7.069c0-.145-.007-.29-.02-.431.261-.11.508-.266.705-.444.315.306.815.306.815-.417 0 .223-.5.223-.461-.026a.95.95 0 0 0 .09-.255.7.7 0 0 0-.202-.645.58.58 0 0 0-.707-.098.735.735 0 0 0-.375.562c-.024.243.082.48.32.654a2.112 2.112 0 0 1-.259.153c-.534-2.664-3.284-4.595-6.442-4.595zM2.516 6.26c.455-2.066 2.667-3.733 5.448-3.733 3.146 0 5.536 2.114 5.536 4.542 0 1.254-.624 2.41-1.67 3.248a.5.5 0 0 0-.165.535l.66 2.175h-.985l-.59-1.487a.5.5 0 0 0-.629-.288c-.661.23-1.39.359-2.157.359a6.558 6.558 0 0 1-2.157-.359.5.5 0 0 0-.635.304l-.525 1.471h-.979l.633-2.15a.5.5 0 0 0-.17-.534 4.649 4.649 0 0 1-1.284-1.541.5.5 0 0 0-.446-.275h-.56a.5.5 0 0 1-.492-.414l-.254-1.46h.933a.5.5 0 0 0 .488-.393zm12.621-.857a.565.565 0 0 1-.098.21.704.704 0 0 1-.044-.025c-.146-.09-.157-.175-.152-.223a.236.236 0 0 1 .117-.173c.049-.027.08-.021.113.012a.202.202 0 0 1 .064.199z"/>
                                            </svg>
                                        </span>
                                        <div class="media-body">
                                            <small class="mb-1">My Loans</small>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-xl-4 col-4 items-center justify-content-center">
                            <a href="{{ route('repayments') }}">
                                <div class="widget-stat card rounded">
                                    <div class="text-center items-center justify-content-center card-body p-4">
                                        <span class="">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-credit-card-2-back" viewBox="0 0 16 16">
                                                <path d="M11 5.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1z"/>
                                                <path d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2zm13 2v5H1V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1zm-1 9H2a1 1 0 0 1-1-1v-1h14v1a1 1 0 0 1-1 1z"/>
                                              </svg>
                                        </span>
                                        <div class="media-body">
                                            <small class="mb-1">Pending Repayments</small>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-xl-4 col-4 items-center justify-content-center">
                            <a href="{{ route('closed-loans') }}">
                                <div class="widget-stat card rounded">
                                    <div class="text-center items-center justify-content-center card-body p-4">
                                        <span class="">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-check2-circle" viewBox="0 0 16 16">
                                                <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z"/>
                                                <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"/>
                                              </svg>
                                        </span>
                                        <div class="media-body">
                                            <small class="mb-1">Closed Loans</small>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-xl-4 col-4 items-center justify-content-center">
                            <a href="{{ route('repayments') }}">

                            </a>
                            <div class="widget-stat card rounded">
                                <div class="text-center items-center justify-content-center card-body p-4">
                                    <span class="">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                                            <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
                                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"/>
                                          </svg>
                                    </span>
                                    <div class="media-body">
                                        <small class="mb-1">Missed Repayments</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-4 items-center justify-content-center">
                            <a href="{{ route('past-maturity-date') }}">
                                <div class="widget-stat card rounded">
                                    <div class="text-center items-center justify-center justify-content-center card-body p-4">
                                        <span class="">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-clock-history" viewBox="0 0 16 16">
                                                <path d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z"/>
                                                <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z"/>
                                                <path d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z"/>
                                              </svg>
                                        </span>
                                        <div class="media-body">
                                            <small class="mb-1">Past Maturity Date</small>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-xl-4 col-4 items-center justify-content-center">
                            <a href="{{ route('profile.show') }}">
                                <div style="background-color: #ffd900" class="widget-stat card rounded">
                                    <div class="text-center items-center justify-center justify-content-center card-body p-4">
                                        <span class="">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-person-lock" viewBox="0 0 16 16">
                                                <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 5.996V14H3s-1 0-1-1 1-4 6-4c.564 0 1.077.038 1.544.107a4.524 4.524 0 0 0-.803.918A10.46 10.46 0 0 0 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h5ZM9 13a1 1 0 0 1 1-1v-1a2 2 0 1 1 4 0v1a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1v-2Zm3-3a1 1 0 0 0-1 1v1h2v-1a1 1 0 0 0-1-1Z"/>
                                              </svg>
                                        </span>
                                        <div class="media-body">
                                            <small class="mb-1">My Account</small>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>
                    {{-- <div class="col-xl-12">
                        <div class="border-6 border-top border-warning card">
                            <div class="card-header border-0 pb-0">
                                <div>
                                    <h4 class="fs-20 text-black">Make Repayment</h4>
                                    <p class="mb-0 fs-13">Make a loan repayment</p>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form>
                                        <div class="form-group">
                                            <div class="input-group input-group-lg">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-white border rounded-0">Amount</span>
                                                </div>
                                                <input type="number" class="form-control rounded-0" placeholder="0,000000">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                               <div class="d-flex justify-content-between align-items-center">
                                    <h4 class="fs-20 text-black mb-0">Recent Loans</h4>
                                    <a href="javascript:void(0);" class="btn btn-link">View more</a>
                                </div>
                                <div class="testimonial-one owl-right-nav owl-carousel owl-loaded owl-drag">
                                    <div class="items">
                                        <div>
                                            <img class="mb-3" src="images/profile/10.jpg" alt="">
                                            <h5 class="text-black mb-0">Personal Loan</h5>
                                            <span class="fs-12">K1000</span>
                                        </div>
                                    </div>
                                    <div class="items">
                                        <div>
                                            <img class="mb-3" src="images/profile/11.jpg" alt="">
                                            <h5 class="text-black mb-0">Basic Loan</h5>
                                            <span class="fs-12">K4990</span>
                                        </div>
                                    </div>
                                    <div class="items">
                                        <div>
                                            <img class="mb-3" src="images/profile/12.jpg" alt="">
                                            <h5 class="text-black mb-0">Agri Loan</h5>
                                            <span class="fs-12">K300</span>
                                        </div>
                                    </div>
                                    <div class="items">
                                        <div>
                                            <img class="mb-3" src="images/profile/13.jpg" alt="">
                                            <h5 class="text-black mb-0">Finance Loan </h5>
                                            <span class="fs-12">K2000</span>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                            <div class="card-footer border-0 pt-0">
                                <div class="row align-items-center">
                                    <div class="col-md-7">
                                        <p class="mb-0 fs-14">Proceed to making payments</p>
                                    </div>
                                    <div class="col-md-5 text-right">
                                        <a href="javascript:void(0);" class="btn btn-primary d-block rounded-0 mt-3 mt-md-0">
                                        PAY NOW
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
            <div class="col-xl-6">
                <div class="row">
                    <div class="col-xl-12">
                        @if($my_loan !== null)
                        <div class="card border-4 border-top border-warning">
                            <div class="card-header d-block d-sm-flex border-0 pb-0">
                                <div class="card-action card-tabs mt-3 mt-sm-0">
                                    <div>
                                        <h4 class="fs-20 text-black">My Current Status</h4>
                                        <p class="mb-0 fs-13">Current loan details</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body tab-content">
                                <div class="tab-pane active show fade" id="Bank-Wallet" role="tabpanel">
                                    <div class="mb-4">
                                        @include('livewire.dashboard.__parts.current-balanace')
                                    </div>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="card">
                            <div class="card-body p-0">
                                <div class="media p-4 top-up-bx col-md-6 align-items-center">
                                    <div class="media-body">
                                        <h3 class="fs-20 text-white">NEW LOAN</h3>
                                        <p class="text-white font-w200 mb-0 fs-14">Get a new loan</p>
                                    </div>
                                    <a href="{{ route('new-loan') }}" class="icon-btn ml-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-plus-circle-dotted" viewBox="0 0 16 16">
                                            <path d="M8 0c-.176 0-.35.006-.523.017l.064.998a7.117 7.117 0 0 1 .918 0l.064-.998A8.113 8.113 0 0 0 8 0zM6.44.152c-.346.069-.684.16-1.012.27l.321.948c.287-.098.582-.177.884-.237L6.44.153zm4.132.271a7.946 7.946 0 0 0-1.011-.27l-.194.98c.302.06.597.14.884.237l.321-.947zm1.873.925a8 8 0 0 0-.906-.524l-.443.896c.275.136.54.29.793.459l.556-.831zM4.46.824c-.314.155-.616.33-.905.524l.556.83a7.07 7.07 0 0 1 .793-.458L4.46.824zM2.725 1.985c-.262.23-.51.478-.74.74l.752.66c.202-.23.418-.446.648-.648l-.66-.752zm11.29.74a8.058 8.058 0 0 0-.74-.74l-.66.752c.23.202.447.418.648.648l.752-.66zm1.161 1.735a7.98 7.98 0 0 0-.524-.905l-.83.556c.169.253.322.518.458.793l.896-.443zM1.348 3.555c-.194.289-.37.591-.524.906l.896.443c.136-.275.29-.54.459-.793l-.831-.556zM.423 5.428a7.945 7.945 0 0 0-.27 1.011l.98.194c.06-.302.14-.597.237-.884l-.947-.321zM15.848 6.44a7.943 7.943 0 0 0-.27-1.012l-.948.321c.098.287.177.582.237.884l.98-.194zM.017 7.477a8.113 8.113 0 0 0 0 1.046l.998-.064a7.117 7.117 0 0 1 0-.918l-.998-.064zM16 8a8.1 8.1 0 0 0-.017-.523l-.998.064a7.11 7.11 0 0 1 0 .918l.998.064A8.1 8.1 0 0 0 16 8zM.152 9.56c.069.346.16.684.27 1.012l.948-.321a6.944 6.944 0 0 1-.237-.884l-.98.194zm15.425 1.012c.112-.328.202-.666.27-1.011l-.98-.194c-.06.302-.14.597-.237.884l.947.321zM.824 11.54a8 8 0 0 0 .524.905l.83-.556a6.999 6.999 0 0 1-.458-.793l-.896.443zm13.828.905c.194-.289.37-.591.524-.906l-.896-.443c-.136.275-.29.54-.459.793l.831.556zm-12.667.83c.23.262.478.51.74.74l.66-.752a7.047 7.047 0 0 1-.648-.648l-.752.66zm11.29.74c.262-.23.51-.478.74-.74l-.752-.66c-.201.23-.418.447-.648.648l.66.752zm-1.735 1.161c.314-.155.616-.33.905-.524l-.556-.83a7.07 7.07 0 0 1-.793.458l.443.896zm-7.985-.524c.289.194.591.37.906.524l.443-.896a6.998 6.998 0 0 1-.793-.459l-.556.831zm1.873.925c.328.112.666.202 1.011.27l.194-.98a6.953 6.953 0 0 1-.884-.237l-.321.947zm4.132.271a7.944 7.944 0 0 0 1.012-.27l-.321-.948a6.954 6.954 0 0 1-.884.237l.194.98zm-2.083.135a8.1 8.1 0 0 0 1.046 0l-.064-.998a7.11 7.11 0 0 1-.918 0l-.064.998zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                                        </svg>
                                    </a>
                                </div>
                                <div class="media p-4 bg-warning withdraw-bx col-md-6 align-items-center">
                                    <div class="media-body">
                                        <h3 class="fs-20 text-white">KYC</h3>
                                        <p class="text-white font-w200 mb-0 fs-14">Update KYC</p>
                                    </div>
                                    <a href="{{ route('profile.show') }}" class="icon-btn ml-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-person-vcard" viewBox="0 0 16 16">
                                            <path d="M5 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm4-2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5ZM9 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4A.5.5 0 0 1 9 8Zm1 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5Z"/>
                                            <path d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2ZM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H8.96c.026-.163.04-.33.04-.5C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1.006 1.006 0 0 1 1 12V4Z"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="col-xl-12">
                        <div class="card border-4 border-top border-warning ">
                            <div class="card-header border-0 d-sm-flex d-block">
                                <div>
                                    <h4 class="fs-20 text-black">Obtained Loans</h4>
                                    <p class="mb-0 fs-13">Previously obtained loans</p>
                                </div>
                                <div class="card-action card-tabs mt-3 mt-sm-0">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#monthly" role="tab" aria-selected="true">
                                                Completed	
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#Weekly" role="tab" aria-selected="false">
                                                Pending Payback
                                            </a>
                                        </li>
                                        {{-- <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#Today" role="tab" aria-selected="false">
                                                Today
                                            </a>
                                        </li> --}}
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body p-0 tab-content card-table">
                                <div class="tab-pane fade active show" id="monthly">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                @forelse($all_loan_requests as $loan)
                                                    {{-- <tr>
                                                        <td>
                                                            <div class="media">
                                                                <span class="bgl-primary p-3 mr-3">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash-stack" viewBox="0 0 16 16">
                                                                        <path d="M1 3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1H1zm7 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
                                                                        <path d="M0 5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V5zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V7a2 2 0 0 1-2-2H3z"/>
                                                                    </svg>
                                                                </span>
                                                                <div class="media-body align-self-center">
                                                                    <h5 class="font-w600 text-black">{{ $loan->type  }}</h5>
                                                                    <p class="mb-0 fs-15">{{ $loan->created_at->toFormattedDateString() }}</p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="font-w600 text-center">K{{ $loan->amount  }}</td>
                                                        <td><a class="btn-link text-success float-right" href="javascript:void(0);">Completed</a></td>
                                                    </tr> --}}
                                                @empty
                                                <p>No Completed Loans</p>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane" id="Weekly">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                @forelse($all_loan_requests as $loan)
                                                <tr>
                                                    <td>
                                                        <div class="media">
                                                            <span class="bgl-primary p-3 mr-3">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash-stack" viewBox="0 0 16 16">
                                                                    <path d="M1 3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1H1zm7 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
                                                                    <path d="M0 5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V5zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V7a2 2 0 0 1-2-2H3z"/>
                                                                </svg>
                                                            </span>
                                                            <div class="media-body align-self-center">
                                                                <h5 class="font-w600 text-black">{{ $loan->type  }}</h5>
                                                                <p class="mb-0 fs-15">{{ $loan->created_at->toFormattedDateString() }}</p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="font-w600 text-center">K{{ $loan->amount  }}</td>
                                                    <td><a class="btn-link text-success float-right" href="javascript:void(0);">Pending Payback</a></td>
                                                </tr>
                                                @empty
                                                <p>No Completed Loans</p>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane" id="Today">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="media">
                                                            <span class="bgl-primary p-3 mr-3">
                                                                <svg width="27" height="27" viewBox="0 0 15 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M5.9375 6.23199L5.9375 24.875C5.9375 25.6689 6.58107 26.3125 7.375 26.3125C8.16892 26.3125 8.8125 25.6689 8.8125 24.875L8.8125 6.23202L11.2311 8.66232L11.2311 8.66234C11.7911 9.22504 12.7013 9.2272 13.264 8.66717C13.8269 8.10701 13.8288 7.19681 13.2689 6.63421L12.9145 6.9869L13.2689 6.6342L8.3939 1.73558L8.38872 1.73037L8.38704 1.72878C7.82626 1.1728 6.92186 1.17468 6.36301 1.72877L6.36136 1.73033L6.35609 1.73563L1.48109 6.63425L1.48108 6.63426C0.921124 7.19695 0.9232 8.10709 1.48597 8.6672C2.04868 9.22725 2.95884 9.22509 3.51889 8.66238L3.51891 8.66236L5.9375 6.23199Z" fill="#6418C3" stroke="#6418C3"></path>
                                                                </svg>
                                                            </span>
                                                            <div class="media-body align-self-center">
                                                                <h5 class="font-w600 text-black">Topup</h5>
                                                                <p class="mb-0 fs-15">4/5/2020 06:24 AM</p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="font-w600 text-center">+$5,553</td>
                                                    <td><a class="btn-link text-success float-right" href="javascript:void(0);">COMPLETED</a></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="media">
                                                            <span class="bgl-primary p-3 mr-3">
                                                                <svg width="27" height="27" viewBox="0 0 15 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M5.9375 20.768L5.9375 2.12498C5.9375 1.33106 6.58107 0.687485 7.375 0.687485C8.16892 0.687485 8.8125 1.33106 8.8125 2.12499L8.8125 20.768L11.2311 18.3377L11.2311 18.3377C11.7911 17.775 12.7013 17.7728 13.264 18.3328C13.8269 18.893 13.8288 19.8032 13.2689 20.3658L12.9145 20.0131L13.2689 20.3658L8.3939 25.2644L8.38872 25.2696L8.38704 25.2712C7.82626 25.8272 6.92186 25.8253 6.36301 25.2712L6.36136 25.2697L6.35609 25.2644L1.48109 20.3657L1.48108 20.3657C0.921124 19.803 0.9232 18.8929 1.48597 18.3328C2.04868 17.7727 2.95884 17.7749 3.51889 18.3376L3.51891 18.3376L5.9375 20.768Z" fill="#6418C3" stroke="#6418C3"></path></svg>
                                                            </span>
                                                            <div class="media-body align-self-center">
                                                                <h5 class="font-w600 text-black">Withdraw</h5>
                                                                <p class="mb-0 fs-15">4/5/2020 06:24 AM</p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="font-w600 text-center">-$2,000</td>
                                                    <td><a class="btn-link text-danger float-right" href="javascript:void(0);">CANCELED</a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>