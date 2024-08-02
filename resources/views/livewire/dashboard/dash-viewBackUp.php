<div class="content-body">
    <!-- Modal -->
    <div wire:ignore class="modal fade" id="exampleModal1" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Make Payment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-label">Seller Mobile Number</label>
                        <input type="number" class="form-control mb-3" id="exampleInputEmail1" placeholder="Number">
                        <label class="form-label">product Name</label>
                        <input type="email" class="form-control mb-3" id="exampleInputEmail2" placeholder=" Name">
                        <label class="form-label">Amount</label>
                        <input type="number" class="form-control mb-3" id="exampleInputEmail3" placeholder="Amount">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <div wire:ignore.self class="modal fade" id="exampleModal2" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="bg-primary modal-header ">
                    <h5 class="modal-title text-white">Request Withdraw</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <label class="form-label">Payment method</label>
                        <div wire:ignore>
                            <select wire:model="payment_method" id="payment_method" class=" w-100 mb-3" aria-label="Default select example">
                                <option selected>--Choose--</option>
                                <option value="Mobile Money">Mobile Money</option>
                                <option value="Cash">Cash</option>
                                <option value="Card">Card</option>
                            </select>
                        </div>
                    </div>
                    
                    <label class="form-label">Amount</label>
                    <input wire:model.defer="withdraw_amount" type="text" class="form-control mb-3" id="amount" placeholder="ZMW">
                    
                    @if($payment_method === 'Mobile Money')
                        <label class="form-label">Mobile Number</label>
                        <input wire:model.defer="mobile_number" type="text" class="form-control mb-3" id="mobile_num" placeholder="Mobile Money Number">
                    @endif
                    @if($payment_method === 'Card')
                        <label class="form-label">Card Name</label>
                        <input wire:model.defer="card_name" type="text" class="form-control mb-3" id="card_name" placeholder="">
                        <label class="form-label">Bank Name</label>
                        <input wire:model.defer="bank_name" type="text" class="form-control mb-3" id="bank_name" placeholder="">
                        <label class="form-label">Card Number</label>
                        <input wire:model.defer="card_number" type="text" class="form-control mb-3" id="card_number" placeholder="">
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                    <button wire:loading.attr="disabled" wire:click="submitWithdrawRequest()" data-bs-dismiss="modal" id="withdraw-request-toastr-success-bottom-left" class="btn btn-primary">Submit Request</button>
                </div>
            </div>
        </div>
    </div>
    <div wire:ignore class="modal fade" id="exampleModal3" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header ">
                    <h5 class="modal-title">Transfer Funds to Customer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label class="form-label">Loan Application</label>
                    <select multiple class="default-select uppercase form-control wide mb-3" id="exampleInputEmail7" placeholder="Find Customer">
                        @forelse ($all_loan_requests as $item)
                        <option value="{{ $item->id }}">{{ $item->fname.' '.$item->lname.' | K'.$item->amount.' - '.$item->type.' Loan'.' | Duration '.$item->repayment_plan}}</option>
                        @empty
                        <option>No Customers Yet</option>
                        @endforelse
                    </select>
                    {{-- <label class="form-label">Expiry/Validity</label>
                    <input type="number" class="form-control mb-3" id="exampleInputEmail8" placeholder="Year/Month">
                    <label class="form-label">CVV</label>
                    <input type="number" class="form-control mb-3" id="exampleInputEmail9" placeholder="123"> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Proceed to Transfer</button>
                </div>
            </div>
        </div>
    </div>
    <div wire:ignore class="modal fade" id="exampleModal4" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header ">
                    <h5 class="modal-title">Send Payment Remainders</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label class="form-label">Send email to</label>
                    <select multiple class="default-select uppercase form-control wide mb-3" id="exampleInputEmail7" placeholder="Find Customer">
                        @forelse ($all_loan_requests as $item)
                        <option value="{{ $item->email }}">{{ $item->fname.' '.$item->lname.' | K'.$item->amount.' - '.$item->type.' Loan'}}</option>
                        @empty
                        <option>No Customers Found</option>
                        @endforelse
                    </select>
                    <label class="form-label">Subject</label>
                    <input type="number" class="form-control mb-3" id="exampleInputEmail11" placeholder="Loan Payback Remainder">
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Body</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Remaind Customer(s)</button>
                </div>
            </div>
        </div>
    </div>
    {{-- @include('livewire.dashboard.__parts.loan-application') --}}
    <!-- row -->
    <div class="container-fluid pt-0">
        <div class="row">
            <div class="col-xl-12">
                <div class="payment-bx">
                    <div class="d-flex py-2 justify-content-between flex-wrap">
                        @role('user')
                        <div class="payment-content">
                            <h3 class="font-w500 mb-2 text-white">Welcome to Bridgetrust Finance: Effortlessly Manage Your Loan Today!</h3>
                            @if($my_loan !== null)
                                @if ($my_loan->complete == 0)
                                <a href="{{ route('profile.show') }}" class="dz-para">We are glad to see you! Make sure your kyc profile is Complete </a>
                                @endif
                            @endif
                        </div>
                        @endrole
                        <div class="mb-4 mb-xl-0">
                            @can('make payments')
                            <!-- Button trigger modal -->
                            {{-- <button type="button" class="btn btn-primary me-3" data-bs-toggle="modal" data-bs-target="#exampleModal1">
                                Make a payment
                            </button> --}}
                            @endcan
                            @can('withdraw funds')
                            {{-- <button type="button" class="btn btn-white" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                                Request Withdraw
                            </button> --}}
                            @endcan
                        </div>
                    </div>

                    {{-- @can('view financial overview') --}}
                    <div class="row">
                        <div class="col-xl-4">
                            <div class="card dz-wallet overflow-hidden">
                                <div class="boxs">
                                    <span class="box one"></span>
                                    <span class="box two"></span>
                                    <span class="box three"></span>
                                    <span class="box four"></span>
                                </div>
                                <div class="card-header border-0 pb-3 pb-sm-0 pe-4">
                                    <div class="wallet-icon">
                                        <svg width="62" height="39" viewBox="0 0 62 39" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="42.7722" cy="19.2278" r="19.2278" fill="white" fill-opacity="0.2" />
                                            <circle cx="19.2278" cy="19.2278" r="19.2278" fill="white" fill-opacity="0.2" />
                                        </svg>
                                    </div>
                                    @can('transfer funds to customers')
                                    {{-- <button type="button" class="modal-btn" data-bs-toggle="modal" data-bs-target="#exampleModal3">
                                        <span class="dz-wallet icon-box icon-box-lg m-auto mb-1 d-block">
                                            <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path opacity="0.3" d="M15.1667 4.66667C15.1667 4.02233 14.6444 3.5 14 3.5C13.3557 3.5 12.8334 4.02233 12.8334 4.66667V18.6667C12.8334 19.311 13.3557 19.8333 14 19.8333C14.6444 19.8333 15.1667 19.311 15.1667 18.6667V4.66667Z" fill="white" />
                                                <path d="M7.825 12.4916C7.36939 12.9472 6.63069 12.9472 6.17508 12.4916C5.71947 12.036 5.71947 11.2973 6.17508 10.8417L13.1751 3.84171C13.6168 3.40003 14.3279 3.38458 14.7884 3.80665L21.7884 10.2233C22.2634 10.6587 22.2954 11.3967 21.8601 11.8717C21.4247 12.3467 20.6867 12.3787 20.2117 11.9433L14.0351 6.2815L7.825 12.4916Z" fill="white" />
                                                <path opacity="0.3" d="M23.3333 22.1667H4.66667C4.02233 22.1667 3.5 22.689 3.5 23.3334C3.5 23.9777 4.02233 24.5 4.66667 24.5H23.3333C23.9777 24.5 24.5 23.9777 24.5 23.3334C24.5 22.689 23.9777 22.1667 23.3333 22.1667Z" fill="white" />
                                            </svg>
                                        </span>
                                        <span>Transfer </span>
                                    </button> --}}
                                    @endcan
                                </div>
                                <div class="card-body py-3 pt-1 d-flex align-items-center justify-content-between flex-wrap pe-3">
                                    <div class="wallet-info">
                                        <span class="fs-14 font-w400 d-block">Wallet Balance</span>
                                        <h2 class="font-w600 mb-0">K {{ $wallet ?? '0.00' }}</h2>
                                    </div>

                                    @can('send payment remainders to customers')
                                    {{-- <button type="button" class="modal-btn" data-bs-toggle="modal" data-bs-target="#exampleModal4">
                                        <span class="dz-wallet icon-box icon-box-lg ms-3 mb-1 d-block">
                                            <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path opacity="0.3" d="M6.83329 2.33331H16.0258C16.4396 2.33331 16.84 2.47994 17.1559 2.74718L22.7134 7.44791C23.1066 7.78042 23.3333 8.26917 23.3333 8.78405V23.4305C23.3333 25.5195 23.3094 25.6666 21.1666 25.6666H6.83329C4.69048 25.6666 4.66663 25.5195 4.66663 23.4305V4.56942C4.66663 2.48046 4.69048 2.33331 6.83329 2.33331Z" fill="white" />
                                                <path d="M16.3333 12.8333H8.16667C7.52233 12.8333 7 13.3557 7 14C7 14.6443 7.52233 15.1667 8.16667 15.1667H16.3333C16.9777 15.1667 17.5 14.6443 17.5 14C17.5 13.3557 16.9777 12.8333 16.3333 12.8333Z" fill="white" />
                                                <path d="M11.6667 17.5H8.16667C7.52233 17.5 7 18.0223 7 18.6667C7 19.311 7.52233 19.8333 8.16667 19.8333H11.6667C12.311 19.8333 12.8333 19.311 12.8333 18.6667C12.8333 18.0223 12.311 17.5 11.6667 17.5Z" fill="white" />
                                            </svg>
                                        </span>
                                        <span>Send<br>Remainders</span>
                                    </button> --}}
                                    @endcan
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8">
                            @include('livewire.dashboard.__parts.dash-finanicial-stats')
                        </div>
                    </div>
                    {{-- @endcan --}}
                </div>

                @role('user')
                    @if($my_loan !== null)
                        @include('livewire.dashboard.__parts.dash-loan-reguest')
                    @else
                        <div class="items-center">
                            <h4>Apply for a Loan</h4>
                        </div>
                    {{-- <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#applyForLoanNow" id="applyForLoanNow">Apply For a Loan</button>
                         --}}
                        @include('livewire.dashboard.__parts.loan-application-standalone')  
                    @endif
                @endrole

                {{-- <button type="button" class="btn btn-dark mb-2  me-2" id="toastr-success-bottom-left">Bottom Left</button> --}}
                @can('company overview dashboard')
                <div class="row">
                    <div class="col-xl-8">
                        @can('loan recoveries')
                        <div class="card crypto-chart h-auto">
                            <div class="card-header pb-0 border-0 flex-wrap">
                                <div>
                                    <div class="chart-title mb-3">
                                        <h2 class="heading">Loan Recoveries</h2>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="round weekly" id="dzOldSeries">
                                            <div>
                                                <input type="checkbox" id="checkbox1" name="radio" value="weekly">
                                                <label for="checkbox1" class="checkmark"></label>
                                            </div>
                                            <div>
                                                <span>This Month</span>
                                                <h4 class="mb-0">1.982</h4>
                                            </div>
                                        </div>
                                        <div class="round" id="dzNewSeries">
                                            <div>
                                                <input type="checkbox" id="checkbox" name="radio" value="monthly">
                                                <label for="checkbox" class="checkmark"></label>
                                            </div>
                                            <div>
                                                <span>This Week</span>
                                                <h4 class="mb-0">1.345</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-static">
                                    <div class="d-flex align-items-center mb-3 ">
                                        <select class="image-select default-select dashboard-select " id="box" aria-label="Default">
                                            <option value="month">This Month</option>
                                            <option value="week">This Weeks</option>
                                            <option value="today">Today</option>
                                        </select>
                                    </div>
                                    <div class="progress-content">
                                        <div class="d-flex justify-content-between">
                                            <h6>Total</h6>
                                            <span class="pull-end">3.982</span>
                                        </div>
                                        <div class="progress mt-2">
                                            <div class="progress-bar bg-primary" style="width: 80%; height:	100%;" role="progressbar">
                                                <span class="sr-only">60% Complete</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-2 custome-tooltip pb-0">
                                <div id="activity"></div>
                            </div>
                        </div>
                        @endcan
                        
                        @can('view loan requests')
                        <div class="card lastest_trans h-auto">
                            <div class="card-header dz-border flex-wrap pb-3">
                                <div>
                                    <h2 class="heading">Lastest 5 Requests</h2>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <!--list-->
                                <div class="table-responsive">
                                    <table class="table shadow-hover trans-table border-no dz-border tbl-btn short-one mb-0 ">
                                        <tbody>                                    
                                            @forelse($all_loan_requests as $loan)
                                            <tr class="trans-td-list">
                                                <td>
                                                    <div class="trans-list">
                                                        <div class="profile-img">
                                                            <img src="{{ asset('public/images/trans/3.jpg') }}" class="avtar" alt="">
                                                        </div>
                                                        <div class="user-info">
                                                            <h6 class="font-w500 mb-0 ms-3">{{ $loan->fname.' '.$loan->lname }}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="fs-15 font-w500"> K {{ $loan->amount }}</span>
                                                </td>
                                                <td>
                                                    <span class="font-w400">{{ $loan->created_at->toFormattedDateString() }}</span>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <div>
                                                    No Loan Requests So Far.
                                                </div>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="table-pagenation pt-3 mt-0">
                                <a class="btn btn-xs btn-square btn-info" href="{{ route('view-loan-requests') }}">See more</a>
                            </div>
                        </div>
                        @endcan

                        @can('see the list of users')
                        <div wire:ignore class="row">
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <h4 class="fs-20 font-w600 mb-0">Users</h4>
                                        </div>
                                        <div id="pieChart1"></div>
                                        <div class="chart-labels">
                                            <ul class="d-flex align-items-baseline justify-content-between mt-3">
                                                <li>
                                                    <svg class="me-2" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect width="14" height="14" rx="7" fill="#D7D7D7" />
                                                    </svg><span class="font-w300">Guests</span>
                                                </li>
                                                <li>
                                                    <svg class="me-2" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect width="14" height="14" rx="7" fill="#9568ff" />
                                                    </svg>
                                                    <span class="font-w300">Registered Customers</span>
                                                </li>
                                                <li>
                                                    <svg class="me-2" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect width="14" height="14" rx="7" fill="#2696FD" />
                                                    </svg>
                                                    <span class="font-w300">Loan Officers</span>
                                                </li>
                                                <li>
                                                    <svg class="me-2" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect width="14" height="14" rx="7" fill="#252289" />
                                                    </svg>
                                                    <span class="font-w300">Blacklisted</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card bg-primary">
                                    <div class="card-body dz-date-picker">
                                        <div class="dz-calender">
                                            <input type="text" class="form-control d-none" id="datetimepicker" style="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endcan
                    </div>
                    @can('view company financial statistics')
                    <div class="col-xl-4">
                        <div class="card h-auto">
                            <div class="card-header border-0 pb-1 ">
                                <div>
                                    <h4 class="mb-0 fs-20 font-w600">Total Collected Repayments</h4>
                                </div>
                            </div>
                            <div class="card-body pb-0 pt-3 px-3 d-flex align-items-center flex-wrap">
                                <div class="p-3">
                                    <h2>
                                        <b>
                                        K {{ App\Models\Transaction::total_collected() }}
                                        </b>
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endcan
                </div>
                @endcan
            </div>
        </div>
    </div>
</div>