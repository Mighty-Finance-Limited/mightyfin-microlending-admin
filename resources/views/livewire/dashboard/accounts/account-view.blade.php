
<div class="content-body">
    <div class="container-fluid">
        @if($data != null)
        <div class="row">
            <div class="col-xl-12 col-xxl-12 col-lg-12">
                <div class="px-3 pt-3 pb-0 profile card card-body">
                    <div class="profile-head">
                        <div class="profile-info">
                            <div class="profile-photo">
                                @if($data->profile_photo_path == null)
                                    @if($data->fname != null && $data->lname != null)
                                        <span class="text-white">{{ $data->fname[0].' '.$data->lname[0] }}</span>
                                    @else
                                        <span>{{ $data->name[0] }}</span>
                                    @endif
                                @else
                                    <img height="90" width="100" class="rounded-circle bg-primary" src="{{ 'public/'.Storage::url($data->profile_photo_path) }}" />
                                @endif
                            </div>
                            <div class="profile-details">
                                <div class="px-3 pt-2 profile-name">
                                    <h4 style="text-transform: camelcase;" class="mb-0 text-primary">{{ $data->fname.' '.$data->lname }}</h4>
                                    @foreach ($data->roles as $role)
                                        @if($role->name == 'user')
                                        <p>Borrower</p>
                                        @else
                                        <p>{{ $role->name }}</p>
                                        @endif
                                    @endforeach
                                    <h4 class="mb-0 text-muted">Gender</h4>
                                    <p>{{ $data->gender ?? 'Not Set' }}</p>
                                    <h4 class="mb-0 text-muted">Phone#</h4>
                                    <p>{{ $data->phone ?? 'Not Set'  }}</p>
                                    <h4 class="mb-0 text-muted">Phone2#</h4>
                                    <p>{{ $data->phone2 ?? 'Not Set'  }}</p>
                                </div>

                                <div class="px-2 pt-2 profile-email">
                                    <h4 class="mb-0 text-muted">Email</h4>
                                    <p>{{ $data->email }}</p>
                                    <h4 class="mb-0 text-muted"> NRC# </h4>
                                    <p>{{ $data->nrc_no ?? 'Not Set' }}</p>
                                    <h4 class="mb-0 text-muted"> Occupation</h4>
                                    <p>{{ $data->occupation ?? 'Not Set' }}</p>
                                </div>

                                <div class="px-2 pt-2 profile-email">
                                    <h4 class="mb-0 text-muted">Basic Pay</h4>
                                    <p>K {{ $data->basic_pay }}</p>
                                    <h4 class="mb-0 text-muted">Net Pay</h4>
                                    <p>K {{ $data->net_pay }}</p>
                                    <h4 class="mb-0 text-muted"> Address </h4>
                                    <p>{{ $data->address ?? 'No Address' }}</p>
                                    <h4 class="mb-0 text-muted"> Joined</h4>
                                    <p>{{ $data->created_at->diffForHumans() ?? 'Not Set' }}</p>
                                </div>
                                @if($data->hasRole('user') && $data->loans->first() != null )

                                @endif

                                @if($data->blacklist != null)
                                <div class="ms-auto">
                                    <div class="alert alert-light solid fade show">
                                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                                        <b>BLACK LISTED!</b>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                                        </button>
                                    </div>
                                </div>
                                @endif

                                <div class="dropdown ms-auto">
                                    <div class="btn sharp btn-primary tp-btn" data-bs-toggle="dropdown">
                                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8.47908 4.58333C8.47908 3.19 9.60659 2.0625 10.9999 2.0625C12.3933 2.0625 13.5208 3.19 13.5208 4.58333C13.5208 5.97667 12.3933 7.10417 10.9999 7.10417C9.60658 7.10417 8.47908 5.97667 8.47908 4.58333ZM12.1458 4.58333C12.1458 3.95083 11.6324 3.4375 10.9999 3.4375C10.3674 3.4375 9.85408 3.95083 9.85408 4.58333C9.85408 5.21583 10.3674 5.72917 10.9999 5.72917C11.6324 5.72917 12.1458 5.21583 12.1458 4.58333Z" fill="#252289"/>
                                            <path d="M8.47908 17.4163C8.47908 16.023 9.60659 14.8955 10.9999 14.8955C12.3933 14.8955 13.5208 16.023 13.5208 17.4163C13.5208 18.8097 12.3933 19.9372 10.9999 19.9372C9.60658 19.9372 8.47908 18.8097 8.47908 17.4163ZM12.1458 17.4163C12.1458 16.7838 11.6324 16.2705 10.9999 16.2705C10.3674 16.2705 9.85408 16.7838 9.85408 17.4163C9.85408 18.0488 10.3674 18.5622 10.9999 18.5622C11.6324 18.5622 12.1458 18.0488 12.1458 17.4163Z" fill="#252289"/>
                                            <path d="M8.47908 11.0003C8.47908 9.60699 9.60659 8.47949 10.9999 8.47949C12.3933 8.47949 13.5208 9.60699 13.5208 11.0003C13.5208 12.3937 12.3933 13.5212 10.9999 13.5212C9.60658 13.5212 8.47908 12.3937 8.47908 11.0003ZM12.1458 11.0003C12.1458 10.3678 11.6324 9.85449 10.9999 9.85449C10.3674 9.85449 9.85408 10.3678 9.85408 11.0003C9.85408 11.6328 10.3674 12.1462 10.9999 12.1462C11.6324 12.1462 12.1458 11.6328 12.1458 11.0003Z" fill="#252289"/>
                                        </svg>
                                    </div>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        {{-- <li class="dropdown-item"><a href="javascript:void(0)"><i class="fa fa-user-circle text-primary me-2"></i> View profile</a></li> --}}
                                        {{-- <li class="dropdown-item"><a href="javascript:void(0)"><i class="fa fa-users text-primary me-2"></i> Add to btn-close friends</a></li>
                                        <li class="dropdown-item"><a href="javascript:void(0)"><i class="fa fa-plus text-primary me-2"></i> Add to group</a></li> --}}
                                        @if($data->blacklist != null)
                                        <li class="dropdown-item">
                                            <button wire:click="unblockUser"><i class="fa fa-ban text-danger me-2"></i> Unblock</button>
                                        </li>
                                        @else
                                        <li class="dropdown-item">
                                            <button wire:click="blockUser"><i class="fa fa-ban text-primary me-2"></i> Add to Blacklist</button>
                                        </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <!-- Row -->
                <div class="row">
                    <!--column-->
                    @if($data->hasRole('user'))
                    <div class="col-xl-12">
                        <div class="card your_balance">
                            <div class="border-0 card-header">
                                <div>
                                    <h2 class="mb-1 heading">Owing Balance</h2>
                                    @if($data->loans->first() != null && $data->loans->first()->status == 1)
                                    <span>Loaned out on {{ $data->loans->first()->created_at->toFormattedDateString()  }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="pt-0 pb-0 card-body custome-tooltip pb-xl-3">
                                <div class="row gx-0">
                                    <div class="col-xl-4 col-sm-4">
                                        @if($data->loans->first() != null)
                                            @if($data->loans->first()->status == 1)
                                            <div class="mothly-income">
                                                <span>{{ $data->loans->first()->type }} Loan</span>
                                                <h4>K {{ $data->loans->first()->amount }} <span class="ms-1"></span></h4>
                                            </div>
                                            <div class="balance_data">
                                                <div class="balance-icon outcome">
                                                    <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M8.16667 25.6667H19.8333C20.9384 25.6667 21.9982 25.2277 22.7796 24.4463C23.561 23.6649 24 22.6051 24 21.5V16.5C24 15.3949 23.561 14.3351 22.7796 13.5537C21.9982 12.7723 20.9384 12.3333 19.8333 12.3333H8.16667C7.0616 12.3333 6.00179 12.7723 5.22039 13.5537C4.43899 14.3351 4 15.3949 4 16.5V21.5C4 22.6051 4.43899 23.6649 5.22039 24.4463C6.00179 25.2277 7.0616 25.6667 8.16667 25.6667ZM5.66667 16.5C5.66667 15.837 5.93006 15.2011 6.3989 14.7322C6.86774 14.2634 7.50363 14 8.16667 14H19.8333C20.4964 14 21.1323 14.2634 21.6011 14.7322C22.0699 15.2011 22.3333 15.837 22.3333 16.5V21.5C22.3333 22.163 22.0699 22.7989 21.6011 23.2678C21.1323 23.7366 20.4964 24 19.8333 24H8.16667C7.50363 24 6.86774 23.7366 6.3989 23.2678C5.93006 22.7989 5.66667 22.163 5.66667 21.5V16.5Z" fill="#FCFCFC"/>
                                                        <path d="M14.0002 22.3333C14.6595 22.3333 15.3039 22.1378 15.8521 21.7716C16.4002 21.4053 16.8275 20.8847 17.0798 20.2756C17.3321 19.6665 17.3981 18.9963 17.2695 18.3497C17.1409 17.7031 16.8234 17.1091 16.3572 16.643C15.891 16.1768 15.2971 15.8593 14.6505 15.7307C14.0039 15.6021 13.3337 15.6681 12.7246 15.9204C12.1155 16.1727 11.5949 16.5999 11.2286 17.1481C10.8623 17.6963 10.6669 18.3407 10.6669 19C10.6669 19.884 11.018 20.7319 11.6432 21.357C12.2683 21.9821 13.1161 22.3333 14.0002 22.3333ZM14.0002 17.3333C14.3298 17.3333 14.6521 17.4311 14.9261 17.6142C15.2002 17.7973 15.4138 18.0576 15.54 18.3622C15.6661 18.6667 15.6991 19.0018 15.6348 19.3251C15.5705 19.6484 15.4118 19.9454 15.1787 20.1785C14.9456 20.4116 14.6486 20.5703 14.3253 20.6346C14.002 20.6989 13.6669 20.6659 13.3624 20.5398C13.0578 20.4136 12.7975 20.2 12.6144 19.9259C12.4313 19.6519 12.3335 19.3296 12.3335 19C12.3335 18.558 12.5091 18.134 12.8217 17.8215C13.1342 17.5089 13.5582 17.3333 14.0002 17.3333ZM14.0002 2.33333C13.7792 2.33333 13.5672 2.42113 13.4109 2.57741C13.2546 2.73369 13.1669 2.94565 13.1669 3.16666V7.825L11.0502 5.70833C10.8908 5.57181 10.6857 5.50047 10.476 5.50857C10.2662 5.51667 10.0673 5.60361 9.91888 5.75203C9.77047 5.90044 9.68353 6.09939 9.67543 6.30912C9.66733 6.51885 9.73866 6.72391 9.87519 6.88333L13.4085 10.425C13.4853 10.5 13.5759 10.5594 13.6752 10.6C13.778 10.6435 13.8885 10.666 14.0002 10.666C14.1118 10.666 14.2224 10.6435 14.3252 10.6C14.4245 10.5594 14.5151 10.5 14.5919 10.425L18.1669 6.88333C18.3034 6.72391 18.3747 6.51885 18.3666 6.30912C18.3585 6.09939 18.2716 5.90044 18.1232 5.75203C17.9747 5.60361 17.7758 5.51667 17.5661 5.50857C17.3563 5.50047 17.1513 5.57181 16.9919 5.70833L14.8335 7.825V3.16666C14.8335 2.94565 14.7457 2.73369 14.5894 2.57741C14.4332 2.42113 14.2212 2.33333 14.0002 2.33333V2.33333Z" fill="#FCFCFC"/>
                                                    </svg>
                                                </div>
                                                <div class="balance_info">
                                                    <span class="text-danger">Current Loan Owing Balance</span>
                                                    <h4>K {{ App\Models\Application::loan_balance($data->loans->first()->id) }}</h4>
                                                </div>
                                            </div>
                                            @endif

                                        @else
                                            <div class="balance_info">
                                                <span class="text-danger">No Active Loan</span>
                                            </div>
                                        @endif

                                        <div class="balance_info">
                                            <span class="text-danger">Total Outstanding Balance</span>
                                            <h4>K {{ App\Models\Loans::customer_balance($data->id) }}</h4>
                                        </div>
                                    </div>
                                    <div class="col-xl-8 col-sm-8">
                                        <div id="barChart"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/column-->
                    <!--column-->
                    <div class="col-xl-12">
                            <div class="h-auto card lastest_trans">
                            <div class="flex-wrap pb-3 card-header dz-border">
                                <div>
                                    <h2 class="heading">Loan History</h2>
                                </div>
                                <div class="d-flex align-items-center">
                                    <select class="bg-white image-select default-select dashboard-select me-2" aria-label="Default">
                                        <option selected>This Month</option>
                                        <option value="1">This Year</option>
                                        <option value="2">Last 6 Years</option>
                                    </select>

                                </div>
                            </div>
                            <div class="p-0 card-body">
                                <div class="table-responsive">
                                    <table class="table mb-0 shadow-hover trans-table border-no dz-border tbl-btn short-one ">
                                        <tbody>
                                            @forelse($data->loans as $loan)
                                            <tr class="trans-td-list">
                                                <td>
                                                    <div class="trans-list">
                                                        <div class="user-info">
                                                            <h6 class="mb-0 font-500 ms-3">{{ $loan->type }} Loan</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="fs-15 font-w500">K {{ $loan->amount }}</span>
                                                </td>
                                                <td>
                                                    <span class="font-w400">{{ $loan->created_at->toFormattedDateString() }}</span>
                                                </td>
                                                <td>
                                                    @if($loan->status == 0)
                                                    <span class="badge badge-sm light badge-danger">
                                                        <i class="fa fa-circle text-danger me-1"></i>
                                                        Pending
                                                    </span>
                                                    @elseif($loan->status == 1)
                                                    <span class="badge badge-sm light badge-success">
                                                        <i class="fa fa-circle text-success me-1"></i>
                                                        Accepted
                                                    </span>
                                                    @elseif($loan->status == 2)
                                                    <span class="badge badge-sm light badge-warning">
                                                        <i class="fa fa-circle text-warning me-1"></i>
                                                        Under Review
                                                    </span>
                                                    @else
                                                    <span class="badge badge-sm light badge-default">
                                                        <i class="fa fa-circle text-warning me-1"></i>
                                                        Rejected
                                                    </span>
                                                    @endif
                                                </td>
                                            </tr>
                                            @empty
                                            @endforelse

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                    @endif
                    <!--/column-->
                </div>
                <!-- /Row -->
            </div>



            <div class="col-xl-6">
                <div class="row">
                    <!--column-->

                    @if($data->hasRole('user'))
                    <div class="col-md-6 col-xl-6 col-xxl-12">
                        <div class="row">
                             <!--column-->
                            <div class="col-xl-12">
                                 <div class="card prim-card">
                                     <div class="py-3 card-body">
                                         <h4 class="number">Wallet Balance</h4>
                                         <div class="d-flex align-items-center justify-content-between">
                                            <div class="prim-info">
                                                <span>Current</span>
                                                @if($data->wallet->first() == null)
                                                <h4>K 0.00</h4>
                                                @else
                                                <h4>K {{ $data->wallet->first()->deposit ?? 0 }}</h4>
                                                @endif
                                            </div>
                                            <div class="prim-info">
                                                <span>Withdrawn</span>
                                                @if($data->wallet->first() == null)
                                                <h4>K 0.00</h4>
                                                @else
                                                <h4>K {{ $data->wallet->first()->withdraw ?? 0 }}</h4>
                                                @endif
                                            </div>
                                            <div class="prim-info">
                                            </div>
                                             <div class="master-card">
                                                 <svg width="55" height="35" viewBox="0 0 55 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                     <circle opacity="0.5" cx="17.5" cy="17.5" r="17.5" fill="#FCFCFC"/>
                                                     <circle opacity="0.5" cx="37.5" cy="17.5" r="17.5" fill="#FCFCFC"/>
                                                 </svg>
                                                 <span class="mt-1 text-white d-block">Wallet</span>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                            </div>

                            <div class="col-xl-12">
                                 <div class="card recent-activity">
                                     <div class="pt-3 pb-0 border-0 card-header">
                                         <h2 class="mb-0 heading">Recent Payments</h2>
                                     </div>
                                     <div class="p-0 pb-3 card-body">


                                     </div>
                                 </div>
                            </div>
                        </div>
                    </div>
                    @endif

                </div>
            </div>
        </div>
        @else
        <div class="col-xl-12">
            <div class="items-center justify-center center">
                <h1>No Results Found.</h1>
            </div>
        </div>
        @endif
    </div>
</div>
