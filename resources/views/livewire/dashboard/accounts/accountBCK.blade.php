<div class="content-body">
    <div class="container-fluid">
        {{-- @dd($data == null) --}}
        @if($data != null)
        <div class="row">
            <div class="col-xl-12 col-xxl-12 col-lg-12">
                <div class="profile card card-body px-3 pt-3 pb-0">
                    <div class="profile-head">
                        {{-- <div class="photo-content">
                            <div class="cover-photo rounded"></div>
                        </div> --}}
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
                                <div class="profile-name px-3 pt-2">
                                    <h4 style="text-transform: camelcase;" class="text-primary mb-0">{{ $data->fname.' '.$data->lname }}</h4>
                                    @foreach ($data->roles as $role)
                                        @if($role->name == 'user')
                                        <p>Borrower</p>
                                        @else
                                        <p>{{ $role->name }}</p>
                                        @endif
                                    @endforeach
                                    <h4 class="text-muted mb-0">Gender</h4>
                                    <p>{{ $data->gender ?? 'Not Set' }}</p>
                                    <h4 class="text-muted mb-0">Phone#</h4>
                                    <p>{{ $data->phone ?? 'Not Set'  }}</p>
                                    <h4 class="text-muted mb-0">Phone2#</h4>
                                    <p>{{ $data->phone2 ?? 'Not Set'  }}</p>
                                </div>

                                <div class="profile-email px-2 pt-2">
                                    <h4 class="text-muted mb-0">Email</h4>
                                    <p>{{ $data->email }}</p>
                                    <h4 class="text-muted mb-0"> NRC# </h4>
                                    <p>{{ $data->nrc_no ?? 'Not Set' }}</p>
                                    <h4 class="text-muted mb-0"> Occupation</h4>
                                    <p>{{ $data->occupation ?? 'Not Set' }}</p>
                                </div>

                                <div class="profile-email px-2 pt-2">
                                    <h4 class="text-muted mb-0">Basic Pay</h4>
                                    <p>K {{ $data->basic_pay }}</p>
                                    <h4 class="text-muted mb-0">Net Pay</h4>
                                    <p>K {{ $data->net_pay }}</p>
                                    <h4 class="text-muted mb-0"> Address </h4>
                                    <p>{{ $data->address ?? 'No Address' }}</p>
                                    <h4 class="text-muted mb-0"> Joined</h4>
                                    <p>{{ $data->created_at->diffForHumans() ?? 'Not Set' }}</p>
                                </div>
                                @if($data->hasRole('user') && $data->loans->first() != null )
                                {{-- <div class="profile-email px-2 pt-2">
                                    <h4 class="text-muted mb-0">Payslip</h4>
                                    <a href="{{ 'public/'.Storage::url($data->loans->first()->payslip_file) }}" download="{{ $data->loans->first()->payslip_file }}">
                                        <img width="90" src="https://img.freepik.com/free-vector/illustration-folder-with-document_53876-37005.jpg?w=740&t=st=1676996943~exp=1676997543~hmac=d03d65c77d403c5ed653a733705504e21b5b3fb42e7cfe3c4340f90aaf55f9d2">
                                        <br>
                                        Payslip File
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                                            <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                            <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                                        </svg>
                                    </a>
                                </div>
                                <div class="profile-email px-2 pt-2">
                                    <h4 class="text-muted mb-0">Tpin Certificate</h4>
                                    <a href="{{ 'public/'.Storage::url($data->loans->first()->tpin_file) }}" download="{{ $data->loans->first()->tpin_file }}">
                                        <img width="90" src="https://img.freepik.com/free-vector/illustration-folder-with-document_53876-37005.jpg?w=740&t=st=1676996943~exp=1676997543~hmac=d03d65c77d403c5ed653a733705504e21b5b3fb42e7cfe3c4340f90aaf55f9d2">
                                        <br>
                                        TPIN File
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                                            <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                            <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                                        </svg>
                                    </a>
                                </div>
                                <div class="profile-email px-2 pt-2">
                                    <h4 class="text-muted mb-0">NRC Copy</h4>
                                    <a href="{{ 'public/'.Storage::url($data->loans->first()->nrc_file) }}" download="{{ $data->loans->first()->nrc_file }}">
                                        <img width="90" src="https://img.freepik.com/free-vector/illustration-folder-with-document_53876-37005.jpg?w=740&t=st=1676996943~exp=1676997543~hmac=d03d65c77d403c5ed653a733705504e21b5b3fb42e7cfe3c4340f90aaf55f9d2">
                                        <br>
                                        NRC Copy 
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                                            <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                            <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                                        </svg>
                                    </a>
                                </div> --}}
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
                            <div class="card-header border-0">
                                <div>
                                    <h2 class="heading mb-1">Owing Balance</h2>
                                    @if($data->loans->first() != null && $data->loans->first()->status == 1)
                                    <span>Loaned out on {{ $data->loans->first()->created_at->toFormattedDateString()  }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="card-body pt-0 custome-tooltip pb-xl-3 pb-0">
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
                                                    <h4>K {{ App\Models\Loans::loan_balance($data->loans->first()->id) }}</h4>
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
                            <div class="card lastest_trans h-auto">
                            <div class="card-header dz-border flex-wrap pb-3">
                                <div>
                                    <h2 class="heading">Loan History</h2>
                                </div>
                                <div class="d-flex align-items-center">
                                    <select class="image-select default-select dashboard-select me-2 bg-white" aria-label="Default">
                                        <option selected>This Month</option>
                                        <option value="1">This Year</option>
                                        <option value="2">Last 6 Years</option>
                                    </select>
                                    {{-- <div class="dropdown custom-dropdown">
                                        <div class="btn sharp btn-primary tp-btn " data-bs-toggle="dropdown">
                                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8.47908 4.58333C8.47908 3.19 9.60659 2.0625 10.9999 2.0625C12.3933 2.0625 13.5208 3.19 13.5208 4.58333C13.5208 5.97667 12.3933 7.10417 10.9999 7.10417C9.60658 7.10417 8.47908 5.97667 8.47908 4.58333ZM12.1458 4.58333C12.1458 3.95083 11.6324 3.4375 10.9999 3.4375C10.3674 3.4375 9.85408 3.95083 9.85408 4.58333C9.85408 5.21583 10.3674 5.72917 10.9999 5.72917C11.6324 5.72917 12.1458 5.21583 12.1458 4.58333Z" fill="#252289"/>
                                                <path d="M8.47908 17.4163C8.47908 16.023 9.60659 14.8955 10.9999 14.8955C12.3933 14.8955 13.5208 16.023 13.5208 17.4163C13.5208 18.8097 12.3933 19.9372 10.9999 19.9372C9.60658 19.9372 8.47908 18.8097 8.47908 17.4163ZM12.1458 17.4163C12.1458 16.7838 11.6324 16.2705 10.9999 16.2705C10.3674 16.2705 9.85408 16.7838 9.85408 17.4163C9.85408 18.0488 10.3674 18.5622 10.9999 18.5622C11.6324 18.5622 12.1458 18.0488 12.1458 17.4163Z" fill="#252289"/>
                                                <path d="M8.47908 11.0003C8.47908 9.60699 9.60659 8.47949 10.9999 8.47949C12.3933 8.47949 13.5208 9.60699 13.5208 11.0003C13.5208 12.3937 12.3933 13.5212 10.9999 13.5212C9.60658 13.5212 8.47908 12.3937 8.47908 11.0003ZM12.1458 11.0003C12.1458 10.3678 11.6324 9.85449 10.9999 9.85449C10.3674 9.85449 9.85408 10.3678 9.85408 11.0003C9.85408 11.6328 10.3674 12.1462 10.9999 12.1462C11.6324 12.1462 12.1458 11.6328 12.1458 11.0003Z" fill="#252289"/>
                                            </svg>
                                        </div>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="javascript:void(0);">Option 1</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Option 2</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Option 3</a>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <!--list-->
                                <div class="table-responsive">
                                    <table class="table shadow-hover trans-table border-no dz-border tbl-btn short-one mb-0 ">
                                        <tbody>
                                            @forelse($data->loans as $loan)
                                            <tr class="trans-td-list">
                                                <td>
                                                    <div class="trans-list">
                                                        <div class="user-info">
                                                            <h6 class="font-500 mb-0 ms-3">{{ $loan->type }} Loan</h6>
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
                            {{-- <div class="table-pagenation pt-3 mt-0">
                                <p>Showing 1-5 from 100 data</p>
                                <nav>
                                    <ul class="pagination pagination-gutter pagination-primary no-bg me-2">
                                        <li class="page-item page-indicator">
                                            <a class="page-link" href="javascript:void(0)">
                                                <i class="fa-solid fa-angle-left"></i></a>
                                        </li>
                                        <li class="page-item "><a class="page-link" href="javascript:void(0)">1</a>
                                        </li>
                                        <li class="page-item active"><a class="page-link" href="javascript:void(0)">2</a></li>
                                        <li class="page-item"><a class="page-link" href="javascript:void(0)">3</a></li>
                                        <li class="page-item page-indicator">
                                            <a class="page-link" href="javascript:void(0)">
                                                <i class="fa-solid fa-angle-right"></i></a>
                                        </li>
                                    </ul>
                                </nav>
                            </div> --}}
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
                                     <div class="card-body py-3">
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
                                                 <span class="text-white d-block mt-1">Wallet</span>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                            </div>
                         <!--/column-->
                          <!--column-->
                            <div class="col-xl-12">
                                 <div class="card recent-activity">
                                     <div class="card-header pb-0 border-0 pt-3">
                                         <h2 class="heading mb-0">Recent Payments</h2>
                                     </div>
                                     <div class="card-body p-0 pb-3">
                                         {{-- <div class="recent-info">
                                             <div class="recent-content">
                                                 <span class="recent_icon">
                                                     <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                         <path d="M14.0038 25.4285C11.7434 25.4285 9.53382 24.7582 7.6544 23.5024C5.77498 22.2466 4.31015 20.4617 3.44515 18.3734C2.58015 16.2851 2.35382 13.9872 2.7948 11.7703C3.23577 9.55337 4.32424 7.51699 5.92255 5.91868C7.52087 4.32036 9.55724 3.2319 11.7742 2.79092C13.9911 2.34995 16.289 2.57627 18.3773 3.44127C20.4656 4.30627 22.2505 5.7711 23.5063 7.65052C24.7621 9.52994 25.4323 11.7395 25.4323 13.9999C25.429 17.0299 24.2239 19.9349 22.0813 22.0774C19.9388 24.22 17.0338 25.4251 14.0038 25.4285ZM14.0038 4.85704C12.1955 4.85704 10.4278 5.39326 8.92427 6.39789C7.42074 7.40252 6.24887 8.83044 5.55687 10.5011C4.86487 12.1717 4.68381 14.01 5.03659 15.7836C5.38937 17.5571 6.26014 19.1862 7.5388 20.4649C8.81745 21.7435 10.4465 22.6143 12.2201 22.9671C13.9936 23.3199 15.832 23.1388 17.5026 22.4468C19.1732 21.7548 20.6011 20.5829 21.6058 19.0794C22.6104 17.5759 23.1466 15.8082 23.1466 13.9999C23.1439 11.5759 22.1798 9.25196 20.4657 7.53793C18.7517 5.8239 16.4278 4.85976 14.0038 4.85704Z" fill="#FCFCFC"/>
                                                         <path d="M15.1466 18.5714H11.7181C11.4149 18.5714 11.1243 18.451 10.9099 18.2367C10.6956 18.0224 10.5752 17.7317 10.5752 17.4286C10.5752 17.1255 10.6956 16.8348 10.9099 16.6204C11.1243 16.4061 11.4149 16.2857 11.7181 16.2857H15.1466V15.1428H12.8609C12.2547 15.1428 11.6733 14.902 11.2447 14.4734C10.816 14.0447 10.5752 13.4633 10.5752 12.8571V11.7143C10.5752 11.1081 10.816 10.5267 11.2447 10.098C11.6733 9.66937 12.2547 9.42856 12.8609 9.42856H16.2895C16.5926 9.42856 16.8833 9.54897 17.0976 9.76329C17.3119 9.97762 17.4323 10.2683 17.4323 10.5714C17.4323 10.8745 17.3119 11.1652 17.0976 11.3795C16.8833 11.5939 16.5926 11.7143 16.2895 11.7143H12.8609V12.8571H15.1466C15.7528 12.8571 16.3342 13.0979 16.7629 13.5266C17.1915 13.9553 17.4323 14.5366 17.4323 15.1428V16.2857C17.4323 16.8919 17.1915 17.4733 16.7629 17.9019C16.3342 18.3306 15.7528 18.5714 15.1466 18.5714Z" fill="#FCFCFC"/>
                                                         <path d="M14.0032 11.7142C13.7001 11.7142 13.4094 11.5937 13.1951 11.3794C12.9808 11.1651 12.8604 10.8744 12.8604 10.5713V9.42844C12.8604 9.12534 12.9808 8.83465 13.1951 8.62032C13.4094 8.40599 13.7001 8.28558 14.0032 8.28558C14.3063 8.28558 14.597 8.40599 14.8113 8.62032C15.0257 8.83465 15.1461 9.12534 15.1461 9.42844V10.5713C15.1461 10.8744 15.0257 11.1651 14.8113 11.3794C14.597 11.5937 14.3063 11.7142 14.0032 11.7142ZM14.0032 19.7142C13.7001 19.7142 13.4094 19.5937 13.1951 19.3794C12.9808 19.1651 12.8604 18.8744 12.8604 18.5713V17.4284C12.8604 17.1253 12.9808 16.8346 13.1951 16.6203C13.4094 16.406 13.7001 16.2856 14.0032 16.2856C14.3063 16.2856 14.597 16.406 14.8113 16.6203C15.0257 16.8346 15.1461 17.1253 15.1461 17.4284V18.5713C15.1461 18.8744 15.0257 19.1651 14.8113 19.3794C14.597 19.5937 14.3063 19.7142 14.0032 19.7142Z" fill="#FCFCFC"/>
                                                     </svg>
                                                 </span>
                                                 <div class="user-name">
                                                     <h6>Payment </h6>
                                                     <span>2 March 2023, 13:45 PM</span>
                                                 </div>
                                             </div>
                                             <div class="count">
                                                 <span>K2000</span>
                                             </div>
                                         </div>
                                         <div class="recent-info">
                                             <div class="recent-content">
                                                 <span class="recent_icon">
                                                     <svg width="24" height="20" viewBox="0 0 24 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                         <path d="M20.0038 0.857117H4.00377C3.09445 0.857117 2.22238 1.21834 1.5794 1.86132C0.936419 2.5043 0.575195 3.37637 0.575195 4.28569V15.7143C0.575195 16.6236 0.936419 17.4956 1.5794 18.1386C2.22238 18.7816 3.09445 19.1428 4.00377 19.1428H20.0038C20.9131 19.1428 21.7852 18.7816 22.4281 18.1386C23.0711 17.4956 23.4323 16.6236 23.4323 15.7143V4.28569C23.4323 3.37637 23.0711 2.5043 22.4281 1.86132C21.7852 1.21834 20.9131 0.857117 20.0038 0.857117ZM2.86091 4.28569C2.86091 3.98258 2.98132 3.69189 3.19565 3.47757C3.40997 3.26324 3.70066 3.14283 4.00377 3.14283H20.0038C20.3069 3.14283 20.5976 3.26324 20.8119 3.47757C21.0262 3.69189 21.1466 3.98258 21.1466 4.28569V5.42854H2.86091V4.28569ZM21.1466 15.7143C21.1466 16.0174 21.0262 16.3081 20.8119 16.5224C20.5976 16.7367 20.3069 16.8571 20.0038 16.8571H4.00377C3.70066 16.8571 3.40997 16.7367 3.19565 16.5224C2.98132 16.3081 2.86091 16.0174 2.86091 15.7143V7.71426H21.1466V15.7143Z" fill="#FCFCFC"/>
                                                         <path d="M5.14676 11.1429H7.43248C7.73558 11.1429 8.02627 11.0225 8.2406 10.8081C8.45493 10.5938 8.57533 10.3031 8.57533 10C8.57533 9.6969 8.45493 9.40621 8.2406 9.19188C8.02627 8.97756 7.73558 8.85715 7.43248 8.85715H5.14676C4.84366 8.85715 4.55297 8.97756 4.33864 9.19188C4.12431 9.40621 4.00391 9.6969 4.00391 10C4.00391 10.3031 4.12431 10.5938 4.33864 10.8081C4.55297 11.0225 4.84366 11.1429 5.14676 11.1429Z" fill="#FCFCFC"/>
                                                     </svg>
                                                 </span>
                                                 <div class="user-name">
                                                     <h6>Subcription</h6>
                                                     <span>2 March 2023, 13:45 PM</span>
                                                 </div>
                                             </div>
                                             <div class="count">
                                                 <span>-$120</span>
                                             </div>
                                         </div> --}}
                                         
                                     </div>
                                 </div>
                            </div>
                         <!--/column-->
                        </div>
                    </div>
                    @endif
                 <!--/column-->
                </div>
            </div>
        </div>
        @else 
        <div class="col-xl-12">
            <div class="items-center center justify-center">
                <h1>No Results Found.</h1>
            </div>
        </div>
        @endif
    </div>
</div>
