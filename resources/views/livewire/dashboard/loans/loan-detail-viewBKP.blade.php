<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    
    <div class="post d-flex flex-column-fluid" id="kt_post">
        
        <div id="kt_content_container" class="container-xxl">
            <div style="margin-top: -4%; z-index: 5; background-image: url( {{ asset('public/mfs/admin/assets/media/product/loan_header.webp') }}); width: 109%;
            left: -5%;"
                class="card mb-6">
                <div class="card-body pt-9 pb-0">
                    <div class="d-flex flex-wrap flex-sm-nowrap">
                        
                        <div style="margin-left: 2%;" class="flex-grow-1">
                            <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                <div class="d-flex flex-column">
                                    <div class="d-flex align-items-center mb-2">
                                        <p class="text-white fs-2 fw-bold mb-1 me-1">ZMW {{ $loan->amount ?? 0 }}</p>
                                        <a href="#">
                                            <i class="text-white ki-duotone ki-verify fs-1 ">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </a>
                                    </div>
                                    
                                    <div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
                                        <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                            <i class="ki-duotone ki-profile-circle fs-4 me-1">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                            </i>{{$loan_product->name }}
                                        </a>
                                    </div>
                                </div>
                                
                                <div class="d-flex">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="m-2 d-flex flex-column">
                                                <div class="d-flex fw-semibold align-items-center mb-">
                                                    <p class="text-white fs-2 me-1">#{{ $loan->id }}</p>

                                                </div>
                                                <div class="d-flex align-items-center fw-semibold">
                                                    <p class=" align-items-center text-gray-400">Loan ID</p>

                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="m-2 d-flex flex-column">
                                                <div class="d-flex fw-semibold align-items-center mb-">
                                                    <p class="align-items-center text-white fs-2 me-1">{{ $loan->created_at->toFormattedDateString()}}</p>
                                                </div>
                                                <div class="d-flex align-items-center fw-semibold">
                                                    <p class="align-items-center fs- text-gray-400">Application date</p>

                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="m-2 d-flex flex-column">
                                                <div class="d-flex fw-semibold align-items-center mb-">
                                                    <p class="align-items-center text-white fs-2 me-1">{{ $loan->repayment_plan ?? 1 }}</p>
                                                </div>
                                                <div class="d-flex align-items-center fw-semibold">
                                                    <p class=" fs- text-gray-400">Loan term (months)</p>
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
            <div style=" width: 109%; top:-5%; left: -5%;" class="card">
                <div style="margin-top: -4%; padding: 0px;" class="card-body pt-5 pb-0">
                    <!--begin::Details-->
                    <div class="col-12">
                        <div class="tabbable">
                            {{-- @dd($loan_product->loan_status->where('stage', 'processing')) --}}
                            <ul class="nav nav-tabss wizard">
                                <li class="active"><a href="#i9" data-toggle="tab" aria-expanded="false"><span class="nmbr">1</span>Application Submitted</a></li>
                                @forelse ($loan_product->loan_status->where('stage', 'processing') as $key => $step)
                                    <li><a href="#w{{ $step->id }}" data-toggle="tab" aria-expanded="false"><span class="nmbr">{{ $key+ 1 }}</span>{{ $step->status->name }}</a></li>
                                @empty

                                @endforelse                                    
                                
                                {{-- <li><a href="#w4" data-toggle="tab" aria-expanded="false"><span class="nmbr">2</span>Verification</a></li>
                                <li><a href="#stateinfo" data-toggle="tab" aria-expanded="false"><span class="nmbr">3</span>Approval</a></li>
                                <li><a href="#finish" data-toggle="tab" aria-expanded="true"><span class="nmbr">5</span>Disbusements</a></li> --}}
                            </ul>
                        </div>
                        {{-- hello bremah edit the bottom styles and scripts and add in appropriate files --}}
                        <script>
                            //this will show completed steps regardless of step user is on
                            //see class used below to use for completion
                            $('.wizard li').click(function() {
                                $(this).prevAll().addClass("completed");
                                $(this).nextAll().removeClass("completed")
                            });
                        </script>
                        <style>
                            .nav-tabss.wizard {
                                background-color: transparent;
                                padding: 0;
                                width: 100%;
                                margin: 1em auto;
                                border-radius: .25em;
                                clear: both;
                                border-bottom: none;
                            }

                            .nav-tabss.wizard li {
                                width: 100%;
                                float: none;
                                margin-bottom: 3px;
                            }

                            .nav-tabss.wizard li>* {
                                position: relative;
                                padding: 1em .8em .8em 2.5em;
                                color: #999999;
                                background-color: #dedede;
                                border-color: #dedede;
                            }

                            .nav-tabss.wizard li.completed>* {
                                color: #fff !important;
                                background-color: #96c03d !important;
                                border-color: #96c03d !important;
                                border-bottom: none !important;
                            }

                            .nav-tabss.wizard li.active>* {
                                color: #fff !important;
                                background-color: #2c3f4c !important;
                                border-color: #2c3f4c !important;
                                border-bottom: none !important;
                            }

                            .nav-tabss.wizard li::after:last-child {
                                border: none;
                            }

                            .nav-tabss.wizard>li>a {
                                opacity: 1;
                                font-size: 14px;
                            }

                            .nav-tabss.wizard a:hover {
                                color: #fff;
                                background-color: #2c3f4c;
                                border-color: #2c3f4c
                            }

                            span.nmbr {
                                display: inline-block;
                                padding: 10px 0 0 0;
                                background: #ffffff;
                                width: 35px;
                                line-height: 100%;
                                height: 35px;
                                margin: auto;
                                border-radius: 50%;
                                font-weight: bold;
                                font-size: 16px;
                                color: #555;
                                margin-bottom: 10px;
                                text-align: center;
                            }

                            @media(min-width:992px) {
                                .nav-tabss.wizard li {
                                    position: relative;
                                    padding: 0;
                                    margin: 4px 4px 4px 0;
                                    width: 24.6%;
                                    float: left;
                                    text-align: center;
                                }

                                .nav-tabss.wizard li.active a {
                                    padding-top: 15px;
                                }

                                .nav-tabss.wizard li::after,
                                .nav-tabss.wizard li>*::after {
                                    content: '';
                                    position: absolute;
                                    top: 1px;
                                    left: 100%;
                                    height: 0;
                                    width: 0;
                                    border: 45px solid transparent;
                                    border-right-width: 0;
                                    /*border-left-width: 20px*/
                                }

                                .nav-tabss.wizard li::after {
                                    z-index: 1;
                                    -webkit-transform: translateX(4px);
                                    -moz-transform: translateX(4px);
                                    -ms-transform: translateX(4px);
                                    -o-transform: translateX(4px);
                                    transform: translateX(4px);
                                    border-left-color: #fff;
                                    margin: 0
                                }

                                .nav-tabss.wizard li>*::after {
                                    z-index: 2;
                                    border-left-color: inherit
                                }

                                .nav-tabss.wizard>li:nth-of-type(1)>a {
                                    border-top-left-radius: 10px;
                                    border-bottom-left-radius: 10px;
                                }

                                .nav-tabss.wizard li:last-child a {
                                    border-top-right-radius: 10px;
                                    border-bottom-right-radius: 10px;
                                }

                                .nav-tabss.wizard li:last-child {
                                    margin-right: 0;
                                }

                                .nav-tabss.wizard li:last-child a:after,
                                .nav-tabss.wizard li:last-child:after {
                                    content: "";
                                    border: none;
                                }

                                span.nmbr {
                                    display: block;
                                }
                            }
                        </style>

                    </div>
                    <!--end::Details-->
                    <!--begin::Navs-->

                    <!--begin::Navs-->
                </div>
            </div>

            <!--end::Navbar-->
            <!--end::Container-->
        </div>


        <!--end::Post-->
    </div>
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                <!--begin::Layout-->
                <div class="d-flex flex-column flex-xl-row">
                    <!--begin::Sidebar-->
                    <div class="flex-column flex-lg-row-auto w-100 w-xl-350px mb-10">
                        <!--begin::Card-->
                        <div class="card mb-5 mb-xl-8">
                            <!--begin::Card body-->
                            <div class="card-body pt-15">
                                <!--begin::Summary-->
                                <div class="d-flex flex-center flex-column mb-5">

                                    <div class="mb-5">
                                        <!--begin::Badge-->
                                        {{-- <div class="badge badge-lg badge-light-primary d-inline">Primary Applicant</div> --}}
                                        <!--begin::Badge-->
                                    </div>
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-100px symbol-circle mb-7">
                                        @if ($loan->user->profile_photo_path)
                                            <img src="{{ '../public/'.Storage::url($loan->user->profile_photo_path) }}" alt=""/>
                                        @else
                                            <img src="https://thumbs.dreamstime.com/b/default-avatar-profile-image-vector-social-media-user-icon-potrait-182347582.jpg" alt=""/>
                                        @endif
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Name-->
                                    <a href="#" class="fs-3 text-gray-800 text-hover-primary fw-bold mb-1">
                                        {{ $loan->user->fname.' '.$loan->user->lname }}
                                    </a>
                                    <!--end::Name-->
                                    <!--begin::Position-->
                                    <div class="fs-5 fw-semibold text-muted mb-6">{{ $loan->user->occupation }}</div>
                                    <!--end::Position-->
                                    <!--begin::Info-->
                                    <div class="d-flex flex-wrap flex-center">
                                        <!--begin::Stats-->
                                        <div class="row justify-content-center">
                                            <div
                                                class="col-lg-4 border border-gray-300 border-dashed rounded py-3 px-3 mx-4 m-3">
                                                <div class="fs-4 fw-bold text-gray-700">
                                                    <span class="w-50px">ZMW {{ $loan->amount}}</span>
                                                    <i class="ki-duotone ki-usd fs-3 text-danger">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                </div>
                                                <div class="fw-semibold text-muted">Principle<br>Amount</div>
                                            </div>
                                            <div
                                                class="col-lg-4 border border-gray-300 border-dashed rounded py-3 px-3 mx-4 m-3">
                                                <div class="fs-4 fw-bold text-gray-700">
                                                    <span class="w-50px">{{ $loan->repayment_plan ?? 1}} (Months)</span>
                                                    <i class="ki-duotone ki-usd fs-3 text-danger">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                </div>
                                                <div class="fw-semibold text-muted">Loan Duration</div>
                                            </div>
                                            <div
                                                class="col-lg-4 border border-gray-300 border-dashed rounded py-3 px-3 mx-4 m-3">
                                                <div class="fs-4 fw-bold text-gray-700">
                                                    <span class="w-50px">K {{ App\Models\Application::payback($loan->amount, $loan->repayment_plan, $loan_product->id) }}</span>
                                                    <i class="ki-duotone ki-usd fs-3 text-danger">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                </div>
                                                <div class="fw-semibold text-muted">Total <br> Repayment</div>
                                            </div>
                                            <div
                                                class="col-lg-4 border border-gray-300 border-dashed rounded py-3 px-3 mx-4 m-3">
                                                <div class="fs-4 fw-bold text-gray-700">
                                                    <span class="w-50px">K {{ App\Models\Application::monthly_installment($loan->amount, $loan->repayment_plan) }}</span>
                                                    <i class="ki-duotone ki-usd fs-3 text-danger">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                </div>
                                                <div class="fw-semibold text-muted">Monthly<br>Repayment</div>
                                            </div>

                                        </div>
                                    </div>
                                    <!--end::Info-->
                                </div>
                                <!--end::Summary-->
                                <!--begin::Details toggle-->
                                <div class="d-flex flex-stack fs-4 py-3">
                                    <div class="fw-bold rotate collapsible" data-bs-toggle="collapse"
                                        href="#kt_customer_view_details" role="button" aria-expanded="false"
                                        aria-controls="kt_customer_view_details">Details
                                        <span class="ms-2 rotate-180">
                                            <i class="ki-duotone ki-down fs-3"></i>
                                        </span>
                                    </div>
                                    {{-- <span data-bs-toggle="tooltip" data-bs-trigger="hover"
                                        title="Edit customer details">
                                        <a href="#" class="btn btn-sm btn-light-primary" data-bs-toggle="modal"
                                            data-bs-target="#kt_modal_update_customer">Edit</a>
                                    </span> --}}
                                </div>
                                <!--end::Details toggle-->
                                <div class="separator separator-dashed my-3"></div>
                                <!--begin::Details content-->
                                <div id="kt_customer_view_details" class="collapse show">
                                    <div class="py-5 fs-6">
                                        <!--begin::Badge-->
                                        {{-- <div class="badge badge-light-info d-inline">Premium user</div> --}}
                                        <!--begin::Badge-->
                                        <!--begin::Details item-->
                                        <div class="fw-bold mt-5">Account ID</div>
                                        <div class="text-gray-600">ID-{{$loan->user->id}} </div>
                                        <!--begin::Details item-->
                                        <!--begin::Details item-->
                                        <div class="fw-bold mt-5">Gender</div>
                                        <div class="text-gray-600">{{ ucwords($loan->gender) }}</div>
                                        <!--begin::Details item-->
                                        <!--begin::Details item-->
                                        <div class="fw-bold mt-5">Email</div>
                                        <div class="text-gray-600">
                                            <a href="mailto:{{$loan->user->email}}"
                                                class="text-gray-600 text-hover-primary">{{ $loan->user->email ?? 'Not set'}}</a>
                                        </div>
                                        <!--begin::Details item-->
                                        <!--begin::Details item-->
                                        <div class="fw-bold mt-5">Address</div>
                                        <div class="text-gray-600">
                                            {{ $loan->user->address ?? 'Not set'}}
                                        </div>
                                        <!--begin::Details item-->
                                        <!--begin::Details item-->
                                        <div class="fw-bold mt-5">Phone</div>
                                        <div class="text-gray-600">+260{{ $loan->phone ?? ' --' }}</div>
                                        <!--begin::Details item-->
                                        <!--begin::Details item-->
                                        <div class="fw-bold mt-5">Interest Rate</div>
                                        <div class="text-gray-600">{{ App\Models\Application::interest_rate($loan_product->id) }}</div>
                                        <!--begin::Details item-->
                                        <!--begin::Details item-->
                                        {{-- <div class="fw-bold mt-5">Tax ID</div>
                                        <div class="text-gray-600">TX-8674</div> --}}
                                        <!--begin::Details item-->
                                    </div>
                                </div>
                                <!--end::Details content-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Card-->
                        <!--begin::Connected Accounts-->
                        {{-- <div class="card mb-5 mb-xl-8">
                            <!--begin::Card header-->
                            <div class="card-header border-0">
                                <div class="card-title">
                                    <h3 class="fw-bold m-0">Connected Accounts</h3>
                                </div>
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-2">
                                <!--begin::Notice-->
                                <div
                                    class="notice d-flex bg-light-primary rounded border-primary border border-dashed mb-9 p-6">
                                    <!--begin::Icon-->
                                    <i class="ki-duotone ki-design-1 fs-2tx text-primary me-4"></i>
                                    <!--end::Icon-->
                                    <!--begin::Wrapper-->
                                    <div class="d-flex flex-stack flex-grow-1">
                                        <!--begin::Content-->
                                        <div class="fw-semibold">
                                            <div class="fs-6 text-gray-700">By connecting an account, you hereby agree
                                                to our
                                                <a href="#" class="me-1">privacy policy</a>and
                                                <a href="#">terms of use</a>.
                                            </div>
                                        </div>
                                        <!--end::Content-->
                                    </div>
                                    <!--end::Wrapper-->
                                </div>
                                <!--end::Notice-->
                                <!--begin::Items-->
                                <div class="py-2">
                                    <!--begin::Item-->
                                    <div class="d-flex flex-stack">
                                        <div class="d-flex">
                                            <img src="assets/media/svg/brand-logos/google-icon.svg"
                                                class="w-30px me-6" alt="" />
                                            <div class="d-flex flex-column">
                                                <a href="#"
                                                    class="fs-5 text-dark text-hover-primary fw-bold">Google</a>
                                                <div class="fs-6 fw-semibold text-muted">Plan properly your workflow
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <!--begin::Switch-->
                                            <label
                                                class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                                <!--begin::Input-->
                                                <input class="form-check-input" name="google" type="checkbox"
                                                    value="1" id="kt_modal_connected_accounts_google"
                                                    checked="checked" />
                                                <!--end::Input-->
                                                <!--begin::Label-->
                                                <span class="form-check-label fw-semibold text-muted"
                                                    for="kt_modal_connected_accounts_google"></span>
                                                <!--end::Label-->
                                            </label>
                                            <!--end::Switch-->
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                    <div class="separator separator-dashed my-5"></div>
                                    <!--begin::Item-->
                                    <div class="d-flex flex-stack">
                                        <div class="d-flex">
                                            <img src="assets/media/svg/brand-logos/github.svg" class="w-30px me-6"
                                                alt="" />
                                            <div class="d-flex flex-column">
                                                <a href="#"
                                                    class="fs-5 text-dark text-hover-primary fw-bold">Github</a>
                                                <div class="fs-6 fw-semibold text-muted">Keep eye on on your
                                                    Repositories</div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <!--begin::Switch-->
                                            <label
                                                class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                                <!--begin::Input-->
                                                <input class="form-check-input" name="github" type="checkbox"
                                                    value="1" id="kt_modal_connected_accounts_github"
                                                    checked="checked" />
                                                <!--end::Input-->
                                                <!--begin::Label-->
                                                <span class="form-check-label fw-semibold text-muted"
                                                    for="kt_modal_connected_accounts_github"></span>
                                                <!--end::Label-->
                                            </label>
                                            <!--end::Switch-->
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                    <div class="separator separator-dashed my-5"></div>
                                    <!--begin::Item-->
                                    <div class="d-flex flex-stack">
                                        <div class="d-flex">
                                            <img src="assets/media/svg/brand-logos/slack-icon.svg" class="w-30px me-6"
                                                alt="" />
                                            <div class="d-flex flex-column">
                                                <a href="#"
                                                    class="fs-5 text-dark text-hover-primary fw-bold">Slack</a>
                                                <div class="fs-6 fw-semibold text-muted">Integrate Projects Discussions
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <!--begin::Switch-->
                                            <label
                                                class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                                <!--begin::Input-->
                                                <input class="form-check-input" name="slack" type="checkbox"
                                                    value="1" id="kt_modal_connected_accounts_slack" />
                                                <!--end::Input-->
                                                <!--begin::Label-->
                                                <span class="form-check-label fw-semibold text-muted"
                                                    for="kt_modal_connected_accounts_slack"></span>
                                                <!--end::Label-->
                                            </label>
                                            <!--end::Switch-->
                                        </div>
                                    </div>
                                    <!--end::Item-->
                                </div>
                                <!--end::Items-->
                            </div>
                            <!--end::Card body-->
                            <!--begin::Card footer-->
                            <div class="card-footer border-0 d-flex justify-content-center pt-0">
                                <button class="btn btn-sm btn-light-primary">Save Changes</button>
                            </div>
                            <!--end::Card footer-->
                        </div> --}}
                        <!--end::Connected Accounts-->
                    </div>
                    <!--end::Sidebar-->
                    <!--begin::Content-->
                    <div class="flex-lg-row-fluid ms-lg-15">
                        <div class="float-end">
                            
                            @if ($this->my_review_status($loan->id) == 1)
                                <a href="#" class="btn btn-primary ps-7" data-kt-menu-trigger="click"
                                    data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">Action
                                    <i class="ki-duotone ki-down fs-2 me-0"></i>
                                </a>
                            @elseif (auth()->user()->hasRole('admin'))
                                <a href="#" class="btn btn-primary ps-7" data-kt-menu-trigger="click"
                                    data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">Action
                                    <i class="ki-duotone ki-down fs-2 me-0"></i>
                                </a>
                            @endif
                                
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold py-4 w-250px fs-6" data-kt-menu="true">
                                    {{-- <div class="menu-item px-5">
                                        <div class="menu-content text-muted pb-2 px-5 fs-7 text-uppercase">Payments</div>
                                    </div> --}}
                                    <div class="menu-item px-5">
                                        <a href="#" wire:click="setLoanID({{$loan->id}})" class="menu-link px-5"> Decline </a>
                                    </div>
                                    <div class="menu-item px-5">
                                        <a href="#" wire:click="accept({{$loan->id}})" class="menu-link px-5"> Approve </a>
                                    </div>
                            </div>
                        </div>



                        <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-8">
                            <li class="nav-item">
                                <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab"
                                    href="#kt_customer_view_overview_tab">Overview</a>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
                                    href="#kt_customer_view_overview_loan_details">Loan Details</a>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link text-active-primary pb-4" data-kt-countup-tabs="true"
                                    data-bs-toggle="tab" href="#kt_customer_view_documents">Documents</a>
                            </li>
                            
                            {{-- <li class="nav-item">
                                <a class="nav-link text-active-primary pb-4" data-kt-countup-tabs="true"
                                    data-bs-toggle="tab" href="#kt_customer_view_activity">Activity Log</a>
                            </li> --}}
                        </ul>
                        <!--end:::Tabs-->
                        <!--begin:::Tab content-->
                        <div class="tab-content" id="myTabContent">
                            <!--begin:::Tab pane-->
                            <div class="tab-pane fade show active" id="kt_customer_view_overview_tab"
                                role="tabpanel">
                                <!--begin::Card-->
                                {{-- <div class="card mb-6 mb-xl-9">
                                    <!--begin::Header-->
                                    <div class="card-header border-0">
                                        <div class="card-title">
                                            <h2>Details </h2>
                                        </div>
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Body-->
                                    <div class="card-body py-0">
                                        <div class="fs-5 fw-semibold text-gray-500 mb-4">
                                            Last 30 day earnings
                                            calculated. Apart from arranging the order of topics.
                                        </div>
                                        <!--begin::Left Section-->
                                        <div class="d-flex flex-wrap flex-stack mb-5">
                                            <!--begin::Row-->
                                            <div class="d-flex flex-wrap">
                                                <!--begin::Col-->
                                                <div
                                                    class="border border-dashed border-gray-300 w-150px rounded my-3 p-4 me-6">
                                                    <span class="fs-1 fw-bold text-gray-800 lh-1">
                                                        <span data-kt-countup="true" data-kt-countup-value="6,840"
                                                            data-kt-countup-prefix="K">0</span>

                                                    </span>
                                                    <span class="fs-6 fw-semibold text-muted d-block lh-1 pt-2">Net
                                                        Earnings
                                                    </span>
                                                </div>
                                                <!--end::Col-->
                                                <!--begin::Col-->
                                                <div
                                                    class="border border-dashed border-gray-300 w-125px rounded my-3 p-4 me-6">
                                                    <span class="fs-1 fw-bold text-gray-800 lh-1">
                                                        <span class="" data-kt-countup="true" data-kt-countup-value="18">0</span>%
                                                    </span>
                                                    <span class="fs-6 fw-semibold text-muted d-block lh-1 pt-2">r</span>
                                                </div>
                                                <!--end::Col-->
                                                <!--begin::Col-->
                                                <div
                                                    class="border border-dashed border-gray-300 w-150px rounded my-3 p-4 me-6">
                                                    <span class="fs-1 fw-bold text-gray-800 lh-1">
                                                        <span data-kt-countup="true" data-kt-countup-value="1,240"
                                                            data-kt-countup-prefix="K">0</span>
                                                        <span class="text-primary">--</span>
                                                    </span>
                                                    <span
                                                        class="fs-6 fw-semibold text-muted d-block lh-1 pt-2">Fees</span>
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Row-->
                                            <a href="#"
                                                class="btn btn-sm btn-light-primary flex-shrink-0">Withdraw
                                                Earnings</a>
                                        </div>
                                        <!--end::Left Section-->
                                    </div>
                                    <!--end::Body-->
                                </div> --}}
                                <div class="card pt-4 mb-6 mb-xl-9">
                                    <!--begin::Card header-->
                                    <div class="card-header border-0">
                                        <!--begin::Card title-->
                                        <div class="card-title">
                                            <h2>Repayment Records</h2>
                                        </div>
                                        <!--end::Card title-->
                                        <!--begin::Card toolbar-->
                                        <div class="card-toolbar">
                                            <!--begin::Filter-->
                                            <button type="button" class="btn btn-sm btn-flex btn-light-primary"
                                                data-bs-toggle="modal" data-bs-target="#kt_modal_add_payment">
                                                <i class="ki-duotone ki-plus-square fs-3">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                </i>Add payment</button>
                                            <!--end::Filter-->
                                        </div>
                                        <!--end::Card toolbar-->
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0 pb-5">
                                        <!--begin::Table-->
                                        <table class="table align-middle table-row-dashed gy-5"
                                            id="kt_table_customers_payment">
                                            <thead class="border-bottom border-gray-200 fs-7 fw-bold">
                                                <tr class="text-start text-muted text-uppercase gs-0">
                                                    <th class="min-w-100px">Invoice No.</th>
                                                    <th>Status</th>
                                                    <th>Amount</th>
                                                    <th class="min-w-100px">Date</th>
                                                    <th class="text-end min-w-100px pe-4">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody class="fs-6 fw-semibold text-gray-600">
                                                @forelse (App\Models\Transaction::hasTransaction($data->id) as $item)
                                                    <tr>
                                                        <td>
                                                            <a href="#" class="text-gray-600 text-hover-primary mb-1">9673-1893</a>
                                                        </td>
                                                        <td>
                                                            <span class="badge badge-light-success">Successful</span>
                                                        </td>
                                                        <td>$1,200.00</td>
                                                        <td>14 Dec 2020, 8:43 pm</td>
                                                        <td class="pe-0 text-end">
                                                            <a href="#" class="btn btn-sm btn-light image.png btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                                            <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                                            <!--begin::Menu-->
                                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                                                <!--begin::Menu item-->
                                                                <div class="menu-item px-3">
                                                                    <a href="../apps/customers/view.html" class="menu-link px-3">View</a>
                                                                </div>
                                                                <!--end::Menu item-->
                                                                <!--begin::Menu item-->
                                                                <div class="menu-item px-3">
                                                                    <a href="#" class="menu-link px-3" data-kt-customer-table-filter="delete_row">Delete</a>
                                                                </div>
                                                                <!--end::Menu item-->
                                                            </div>
                                                            <!--end::Menu-->
                                                        </td>
                                                    </tr>
                                                @empty  
                                                @endforelse
                                            </tbody>
                                            <!--end::Table body-->
                                        </table>
                                        <!--end::Table-->
                                    </div>
                                    <!--end::Card body-->
                                </div>
                                <!--end::Card-->
                                <!--begin::Card-->
                                <div class="card pt-4 mb-6 mb-xl-9">
                                    <!--begin::Card header-->
                                    <div class="card-header border-0">
                                        <!--begin::Card title-->
                                        <div class="card-title">
                                            <h2 class="fw-bold mb-0">Repayment Methods</h2>
                                        </div>
                                        <!--end::Card title-->
                                        <!--begin::Card toolbar-->
                                        <div class="card-toolbar">
                                            <a href="#" class="btn btn-sm btn-flex btn-light-primary"
                                                data-bs-toggle="modal" data-bs-target="#kt_modal_new_card">
                                                <i class="ki-duotone ki-plus-square fs-3">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                </i>Add new method</a>
                                        </div>
                                        <!--end::Card toolbar-->
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div id="kt_customer_view_payment_method" class="card-body pt-0">
                                        <!--begin::Option-->
                                        <div class="py-0" data-kt-customer-payment-method="row">
                                            <!--begin::Header-->
                                            
                                            <!--end::Header-->
                                            <!--begin::Body-->
                                            <div id="kt_customer_view_payment_method_1"
                                                class="collapse show fs-6 ps-10"
                                                data-bs-parent="#kt_customer_view_payment_method">
                                                <!--begin::Details-->
                                                <div class="d-flex flex-wrap py-5">
                                                    <!--begin::Col-->
                                                    <div class="flex-equal me-5">
                                                        <table class="table table-flush fw-semibold gy-1">
                                                            @if($data->bank !== null)
                                                            <tr>
                                                                <td class="text-muted min-w-125px w-125px">Name</td>
                                                                <td class="text-gray-800">{{ $data->bank->first()->accountNames }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-muted min-w-125px w-125px">Number</td>
                                                                <td class="text-gray-800">{{ $data->bank->first()->accountNumber }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-muted min-w-125px w-125px">Branch Name</td>
                                                                <td class="text-gray-800">{{ $data->bank->first()->branchName }}</td>
                                                            </tr>
                                                            @else
                                                            <span class="text-muted">Not Set</span>
                                                            @endif
                                                        </table>
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    
                                                    <!--end::Col-->
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::Body-->
                                        </div>
                                        
                                    </div>
                                    <!--end::Card body-->
                                </div>
                                <!--end::Card-->
                                <!--begin::Card-->
                                {{-- <div class="card pt-4 mb-6 mb-xl-9">
                                    <!--begin::Card header-->
                                    <div class="card-header border-0">
                                        <!--begin::Card title-->
                                        <div class="card-title">
                                            <h2 class="fw-bold">Credit Balance</h2>
                                        </div>
                                        <!--end::Card title-->
                                        <!--begin::Card toolbar-->
                                        <div class="card-toolbar">
                                            <a href="#" class="btn btn-sm btn-flex btn-light-primary"
                                                data-bs-toggle="modal" data-bs-target="#kt_modal_adjust_balance">
                                                <i class="ki-duotone ki-pencil fs-3">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>Adjust Balance</a>
                                        </div>
                                        <!--end::Card toolbar-->
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body pt-0">
                                        <div class="fw-bold fs-2">K32,487.57
                                            <span class="text-muted fs-4 fw-semibold">USD</span>
                                            <div class="fs-7 fw-normal text-muted">Balance will increase the amount due
                                                on the customer's next invoice.</div>
                                        </div>
                                    </div>
                                    <!--end::Card body-->
                                </div> --}}
                                <!--end::Card-->
                                <!--begin::Card-->
                            </div>
                            <!--end:::Tab pane-->
                            <!--begin:::Tab pane-->
                            <div class="tab-pane fade" id="kt_customer_view_overview_loan_details"
                                role="tabpanel">
                                <!--begin::Card-->

                                <!--end::Card-->
                                <!--begin::Card-->
                                <div class="row g-5 g-xl-12">


                                    <div class="col-xl-12">

                                        <!--begin::List Widget 2-->
                                        <div class="card card-xl-stretch mb-xl-8">
                                            <!--begin::Header-->
                                            <div class="card-header border-0">
                                                <h3 class="card-title fw-bold text-gray-900">Parties Information</h3>

                                                <div class="card-toolbar">
                                                    <!--begin::Menu-->
                                                    <button type="button"
                                                        class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary"
                                                        data-kt-menu-trigger="click"
                                                        data-kt-menu-placement="bottom-end">
                                                        <i class="ki-duotone ki-category fs-6"><span
                                                                class="path1"></span><span
                                                                class="path2"></span><span
                                                                class="path3"></span><span
                                                                class="path4"></span></i> </button>
                                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px"
                                                        data-kt-menu="true">
                                                        <div class="menu-item px-3">
                                                            <div
                                                                class="menu-content fs-6 text-gray-900 fw-bold px-3 py-4">
                                                                Quick Actions</div>
                                                        </div>
                                                        
                                                        <div class="separator mb-3 opacity-75"></div>
                                                    
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3">
                                                                New Ticket
                                                            </a>
                                                        </div>
                                                        
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3">
                                                                New Customer
                                                            </a>
                                                        </div>
                                                        
                                                        <div class="menu-item px-3" data-kt-menu-trigger="hover"
                                                            data-kt-menu-placement="right-start">
                                                            
                                                            <a href="#" class="menu-link px-3">
                                                                <span class="menu-title">New Group</span>
                                                                <span class="menu-arrow"></span>
                                                            </a>
                                                            
                                                            <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                                            
                                                                <div class="menu-item px-3">
                                                                    <a href="#" class="menu-link px-3">
                                                                        Admin Group
                                                                    </a>
                                                                </div>
                                                                
                                                                <div class="menu-item px-3">
                                                                    <a href="#" class="menu-link px-3">
                                                                        Staff Group
                                                                    </a>
                                                                </div>
                                                                
                                                                <div class="menu-item px-3">
                                                                    <a href="#" class="menu-link px-3">
                                                                        Member Group
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3">
                                                                New Contact
                                                            </a>
                                                        </div>
                                                    
                                                        <div class="separator mt-3 opacity-75"></div>
                                                    
                                                        <div class="menu-item px-3">
                                                            <div class="menu-content px-3 py-3">
                                                                <a class="btn btn-primary  btn-sm px-4"
                                                                    href="#">
                                                                    Generate Reports
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            
                                            <div class="card-body pt-2">
                                                <div class="d-flex align-items-center mb-7">
                                                    {{-- <div class="symbol symbol-50px me-5">
                                                        <img src="{{ asset('public/mfs/admin/assets/avatars/blank.png') }}"
                                                            class="" alt="">
                                                    </div> --}}
                                                    <div class="flex-grow-1">
                                                        <a href="#"class="text-gray-900 fw-bold text-hover-primary fs-6">{{ $loan_product->name}}</a>

                                                        <span class="text-muted d-block fw-bold">ZMW {{ $loan->amount }}</span>
                                                    </div>
                                                </div>
                                                
                                                <div class="d-flex align-items-center mb-7">
                                                    {{-- <div class="symbol symbol-50px me-5">
                                                        <img src="{{ asset('public/mfs/admin/assets/avatars/blank.png') }}" class="" alt="">
                                                    </div> --}}
                                                    
                                                    <div class="flex-grow-1">
                                                        <a href="#" class="text-gray-900 fw-bold text-hover-primary fs-6">
                                                            KYC information
                                                        </a>
                                                        <span class="text-muted d-block fw-bold mt-2">
                                                            @if($loan->complete == 1)
                                                                <span class="text-white bg-success p-2 rounded">{{ 'Completed' }}</span>
                                                            @else
                                                                <span class="text-primary bg-danger p-2 rounded">{{ 'Incomplete' }}</span>
                                                            @endif        
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>


                                </div>
                                <!--end::Card-->
                            </div>
                            <!--end:::Tab pane-->
                            <!--begin:::Tab pane-->
                            <div class="tab-pane fade" id="kt_customer_view_documents" role="tabpanel">
                                <!--begin::Earnings-->
                                <div class="card pt-4 mb-6 mb-xl-9">
                                    <!--begin::Card header-->
                                    <div class="card-header border-0">
                                        <!--begin::Card title-->
                                        <div class="card-title">
                                            <h2>KYC Documents</h2>
                                        </div>
                                        <!--end::Card title-->
                                        <!--begin::Card toolbar-->
                                        <div class="card-toolbar">
                                            <!--begin::Button-->
                                            <button type="button" class="btn btn-sm btn-light-primary">
                                                <i class="ki-duotone ki-cloud-download fs-3">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>Download Report</button>
                                            <!--end::Button-->
                                        </div>
                                        <!--end::Card toolbar-->
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body py-0">
                                        <!--begin::Table-->

                                        <div class="row g-6 g-xl-9 mb-6 mb-xl-9">


                                            <!--begin::Col-->
                                            {{-- <div class="col-md-6 col-lg-4 col-xl-3">
                                                <!--begin::Card-->
                                                <div class="card h-100 ">
                                                    <!--begin::Card body-->
                                                    <div class="card-body d-flex justify-content-center text-center flex-column p-8">
                                                        <!--begin::Name-->
                                                        <a href="/metronic8/demo8/../demo8/apps/file-manager/files.html"
                                                            class="text-gray-800 text-hover-primary d-flex flex-column">
                                                            <!--begin::Image-->
                                                            <div class="symbol symbol-60px mb-5">
                                                                <img src="{{ asset('public/mfs/admin/assets/media/svg/files/pdf.svg') }}"
                                                                    class="theme-light-show" alt="">
                                                                <img src="{{ asset('public/mfs/admin/assets/media/svg/files/pdf.svg') }}"
                                                                    class="theme-dark-show" alt="">

                                                            </div>
                                                            <!--end::Image-->

                                                            <!--begin::Title-->
                                                            <div class="fs-5 fw-bold mb-2">
                                                                ID ATTACHMENT </div>
                                                            <!--end::Title-->
                                                        </a>
                                                        <!--end::Name-->

                                                        <!--begin::Description-->
                                                        <div class="fs-7 fw-semibold text-gray-500">
                                                            3 days ago </div>
                                                        <!--end::Description-->
                                                    </div>
                                                    <!--end::Card body-->
                                                </div>
                                                <!--end::Card-->
                                            </div> --}}

                                            <div class="row">
                                                <div class="row col-6">
                                                    @if ($loan->user->uploads->where('name', 'nrc_file')->isNotEmpty())
                                                        <div class="col-6">
                                                            <a href="{{ 'public/'.Storage::url($loan->user->uploads->where('name', 'nrc_file')->first()->path) }}"  class="open-modal" data-toggle="modal" data-target="#fileModal" data-file-url="{{ 'public/'.Storage::url($loan->user->uploads[0]->path) }}">
                                                                <img width="90" src="{{ asset('public/mfs/admin/assets/media/svg/files/pdf.svg') }}">
                                                            </a>
                                                            <p class="file-list">NRC uploaded on {{ $loan->user->uploads->where('name', 'nrc_file')->first()->created_at->toFormattedDateString() }}</p>
                                                        </div>
                                                    @endif
                                                    @if ($loan->user->uploads->where('name', 'tpin_file')->isNotEmpty())
                                                        <div class="col-6">
                                                            <a href="{{ 'public/'.Storage::url($loan->user->uploads->where('name', 'tpin_file')->first()->path) }}"  class="open-modal" data-toggle="modal" data-target="#fileModal" data-file-url="{{ 'public/'.Storage::url($loan->user->uploads[0]->path) }}">
                                                                <img width="90" src="{{ asset('public/mfs/admin/assets/media/svg/files/pdf.svg') }}">
                                                            </a>
                                                            <p class="file-list">Tpin uploaded on {{ $loan->user->uploads->where('name', 'tpin_file')->first()->created_at->toFormattedDateString() }}</p>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="row col-6">
                                                    @if ($loan->user->uploads->where('name', 'preapproval')->isNotEmpty())
                                                        <div class="col-6">
                                                            <a href="{{ 'public/'.Storage::url($loan->user->uploads->where('name', 'preapproval')->first()->path) }}"  class="open-modal" data-toggle="modal" data-target="#fileModal" data-file-url="{{ 'public/'.Storage::url($loan->user->uploads[0]->path) }}">
                                                                <img width="90" src="{{ asset('public/mfs/admin/assets/media/svg/files/pdf.svg') }}">
                                                            </a>
                                                            <p class="file-list">Preapproval uploaded on {{ $loan->user->uploads->where('name', 'preapproval')->first()->created_at->toFormattedDateString() }}</p>
                                                        </div>
                                                    @endif
                                                    @if ($loan->user->uploads->where('name', 'letterofintro')->isNotEmpty())
                                                        <div class="col-6">
                                                            <a href="{{ 'public/'.Storage::url($loan->user->uploads->where('name', 'letterofintro')->first()->path) }}"  class="open-modal" data-toggle="modal" data-target="#fileModal" data-file-url="{{ 'public/'.Storage::url($loan->user->uploads[0]->path) }}">
                                                                <img width="90" src="{{ asset('public/mfs/admin/assets/media/svg/files/pdf.svg') }}">
                                                            </a>
                                                            <p class="file-list">Letter of Introduction uploaded on {{ $loan->user->uploads->where('name', 'letterofintro')->first()->created_at->toFormattedDateString() }}</p>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="row col-12">
                                                    @if ($loan->user->uploads->where('name', 'bankstatement')->isNotEmpty())
                                                        <div class="col-3">
                                                            <a href="{{ 'public/'.Storage::url($loan->user->uploads->where('name', 'bankstatement')->first()->path) }}"  class="open-modal" data-toggle="modal" data-target="#fileModal" data-file-url="{{ 'public/'.Storage::url($loan->user->uploads[0]->path) }}">
                                                                <img width="90" src="{{ asset('public/mfs/admin/assets/media/svg/files/pdf.svg') }}">
                                                            </a>
                                                            <p class="file-list">Bank Statement uploaded on {{ $loan->user->uploads->where('name', 'bankstatement')->first()->created_at->toFormattedDateString() }}</p>
                                                        </div>
                                                    @endif
                                                    @if ($loan->user->uploads->where('name', 'payslip_file')->isNotEmpty())
                                                        <div class="col-3">
                                                            <a href="{{ 'public/'.Storage::url($loan->user->uploads->where('name', 'payslip_file')->first()->path) }}"  class="open-modal" data-toggle="modal" data-target="#fileModal" data-file-url="{{ 'public/'.Storage::url($loan->user->uploads[0]->path) }}">
                                                                <img width="90" src="{{ asset('public/mfs/admin/assets/media/svg/files/pdf.svg') }}">
                                                            </a>
                                                            <p class="file-list">Payslip uploaded on {{ $loan->user->uploads->where('name', 'payslip_file')->first()->created_at->toFormattedDateString() }}</p>
                                                        </div>
                                                    @endif
                                                    @if ($loan->user->uploads->where('name', 'passport')->isNotEmpty())
                                                        <div class="col-3">
                                                            <a href="{{ 'public/'.Storage::url($loan->user->uploads->where('name', 'passport')->first()->path) }}"  class="open-modal" data-toggle="modal" data-target="#fileModal" data-file-url="{{ 'public/'.Storage::url($loan->user->uploads[0]->path) }}">
                                                                <img width="90" src="{{ asset('public/mfs/admin/assets/media/svg/files/pdf.svg') }}">
                                                            </a>
                                                            <p class="file-list">Passport Size photo uploaded on {{ $loan->user->uploads->where('name', 'passport')->first()->created_at->toFormattedDateString() }}</p>
                                                        </div>
                                                    @endif
                                                </div>
                                                <!--end::Table-->
                                            </div>

                                        </div>
                                        <!--end::Table-->
                                    </div>
                                    <!--end::Card body-->
                                </div>
                            </div>
                            <div class="tab-pane fade" id="kt_customer_view_activity" role="tabpanel">
                                <!--begin::Earnings-->

                                <div class="card pt-4 mb-6 mb-xl-9">
                                    <!--begin::Card header-->
                                    <div class="card-header border-0">
                                        <!--begin::Card title-->
                                        <div class="card-title">
                                            <h2>Events</h2>
                                        </div>
                                        <!--end::Card title-->
                                        <!--begin::Card toolbar-->
                                        <div class="card-toolbar">
                                            <!--begin::Button-->
                                            <button type="button" class="btn btn-sm btn-light-primary">
                                                <i class="ki-duotone ki-cloud-download fs-3">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>Download Report</button>
                                            <!--end::Button-->
                                        </div>
                                        <!--end::Card toolbar-->
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body py-0">
                                        <!--begin::Table-->
                                        <table
                                            class="table align-middle table-row-dashed fs-6 text-gray-600 fw-semibold gy-5"
                                            id="kt_table_customers_events">
                                            <tbody>
                                                <tr>
                                                    <td class="min-w-400px">Invoice
                                                        <a href="#"
                                                            class="fw-bold text-gray-900 text-hover-primary me-1">#WER-45670</a>is
                                                        <span class="badge badge-light-info">In Progress</span>
                                                    </td>
                                                    <td class="pe-0 text-gray-600 text-end min-w-200px">10 Nov 2023,
                                                        10:30 am</td>
                                                </tr>
                                                <tr>
                                                    <td class="min-w-400px">
                                                        <a href="#"
                                                            class="text-gray-600 text-hover-primary me-1">Melody
                                                            Macy</a>has made payment to
                                                        <a href="#"
                                                            class="fw-bold text-gray-900 text-hover-primary">#XRS-45670</a>
                                                    </td>
                                                    <td class="pe-0 text-gray-600 text-end min-w-200px">05 May 2023,
                                                        10:30 am</td>
                                                </tr>
                                                <tr>
                                                    <td class="min-w-400px">Invoice
                                                        <a href="#"
                                                            class="fw-bold text-gray-900 text-hover-primary me-1">#LOP-45640</a>has
                                                        been
                                                        <span class="badge badge-light-danger">Declined</span>
                                                    </td>
                                                    <td class="pe-0 text-gray-600 text-end min-w-200px">15 Apr 2023,
                                                        6:43 am</td>
                                                </tr>
                                                <tr>
                                                    <td class="min-w-400px">
                                                        <a href="#"
                                                            class="text-gray-600 text-hover-primary me-1">Max
                                                            Smith</a>has made payment to
                                                        <a href="#"
                                                            class="fw-bold text-gray-900 text-hover-primary">#SDK-45670</a>
                                                    </td>
                                                    <td class="pe-0 text-gray-600 text-end min-w-200px">19 Aug 2023,
                                                        10:30 am</td>
                                                </tr>
                                                <tr>
                                                    <td class="min-w-400px">Invoice
                                                        <a href="#"
                                                            class="fw-bold text-gray-900 text-hover-primary me-1">#KIO-45656</a>status
                                                        has changed from
                                                        <span class="badge badge-light-succees me-1">In
                                                            Transit</span>to
                                                        <span class="badge badge-light-success">Approved</span>
                                                    </td>
                                                    <td class="pe-0 text-gray-600 text-end min-w-200px">10 Nov 2023,
                                                        5:30 pm</td>
                                                </tr>
                                                <tr>
                                                    <td class="min-w-400px">
                                                        <a href="#"
                                                            class="text-gray-600 text-hover-primary me-1">Brian
                                                            Cox</a>has made payment to
                                                        <a href="#"
                                                            class="fw-bold text-gray-900 text-hover-primary">#OLP-45690</a>
                                                    </td>
                                                    <td class="pe-0 text-gray-600 text-end min-w-200px">19 Aug 2023,
                                                        9:23 pm</td>
                                                </tr>
                                                <tr>
                                                    <td class="min-w-400px">Invoice
                                                        <a href="#"
                                                            class="fw-bold text-gray-900 text-hover-primary me-1">#LOP-45640</a>has
                                                        been
                                                        <span class="badge badge-light-danger">Declined</span>
                                                    </td>
                                                    <td class="pe-0 text-gray-600 text-end min-w-200px">24 Jun 2023,
                                                        10:10 pm</td>
                                                </tr>
                                                <tr>
                                                    <td class="min-w-400px">
                                                        <a href="#"
                                                            class="text-gray-600 text-hover-primary me-1">Max
                                                            Smith</a>has made payment to
                                                        <a href="#"
                                                            class="fw-bold text-gray-900 text-hover-primary">#SDK-45670</a>
                                                    </td>
                                                    <td class="pe-0 text-gray-600 text-end min-w-200px">25 Jul 2023,
                                                        2:40 pm</td>
                                                </tr>
                                                <tr>
                                                    <td class="min-w-400px">Invoice
                                                        <a href="#"
                                                            class="fw-bold text-gray-900 text-hover-primary me-1">#KIO-45656</a>status
                                                        has changed from
                                                        <span class="badge badge-light-succees me-1">In
                                                            Transit</span>to
                                                        <span class="badge badge-light-success">Approved</span>
                                                    </td>
                                                    <td class="pe-0 text-gray-600 text-end min-w-200px">25 Jul 2023,
                                                        8:43 pm</td>
                                                </tr>
                                                <tr>
                                                    <td class="min-w-400px">
                                                        <a href="#"
                                                            class="text-gray-600 text-hover-primary me-1">Melody
                                                            Macy</a>has made payment to
                                                        <a href="#"
                                                            class="fw-bold text-gray-900 text-hover-primary">#XRS-45670</a>
                                                    </td>
                                                    <td class="pe-0 text-gray-600 text-end min-w-200px">25 Oct 2023,
                                                        10:30 am</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <!--end::Table-->
                                    </div>
                                    <!--end::Card body-->
                                </div>
                                <div class="card pt-4 mb-6 mb-xl-9">
                                    <!--begin::Card header-->
                                    <div class="card-header border-0">
                                        <!--begin::Card title-->
                                        <div class="card-title">
                                            <h2>Logs</h2>
                                        </div>
                                        <!--end::Card title-->
                                        <!--begin::Card toolbar-->
                                        <div class="card-toolbar">
                                            <!--begin::Button-->
                                            <button type="button" class="btn btn-sm btn-light-primary">
                                                <i class="ki-duotone ki-cloud-download fs-3">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>Download Report</button>
                                            <!--end::Button-->
                                        </div>
                                        <!--end::Card toolbar-->
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Card body-->
                                    <div class="card-body py-0">
                                        <!--begin::Table wrapper-->
                                        <div class="table-responsive">
                                            <!--begin::Table-->
                                            <table
                                                class="table align-middle table-row-dashed fw-semibold text-gray-600 fs-6 gy-5"
                                                id="kt_table_customers_logs">
                                                <tbody>
                                                    <tr>
                                                        <td class="min-w-70px">
                                                            <div class="badge badge-light-success">200 OK</div>
                                                        </td>
                                                        <td>POST /v1/invoices/in_9381_6519/payment</td>
                                                        <td class="pe-0 text-end min-w-200px">15 Apr 2023, 6:05 pm
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="min-w-70px">
                                                            <div class="badge badge-light-success">200 OK</div>
                                                        </td>
                                                        <td>POST /v1/invoices/in_5959_3541/payment</td>
                                                        <td class="pe-0 text-end min-w-200px">25 Jul 2023, 2:40 pm
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="min-w-70px">
                                                            <div class="badge badge-light-warning">404 WRN</div>
                                                        </td>
                                                        <td>POST /v1/customer/c_64b784ba36261/not_found</td>
                                                        <td class="pe-0 text-end min-w-200px">10 Mar 2023, 2:40 pm
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="min-w-70px">
                                                            <div class="badge badge-light-success">200 OK</div>
                                                        </td>
                                                        <td>POST /v1/invoices/in_9381_6519/payment</td>
                                                        <td class="pe-0 text-end min-w-200px">19 Aug 2023, 10:10 pm
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="min-w-70px">
                                                            <div class="badge badge-light-success">200 OK</div>
                                                        </td>
                                                        <td>POST /v1/invoices/in_6751_5507/payment</td>
                                                        <td class="pe-0 text-end min-w-200px">10 Nov 2023, 5:20 pm
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="min-w-70px">
                                                            <div class="badge badge-light-danger">500 ERR</div>
                                                        </td>
                                                        <td>POST /v1/invoice/in_7903_5155/invalid</td>
                                                        <td class="pe-0 text-end min-w-200px">20 Dec 2023, 8:43 pm
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="min-w-70px">
                                                            <div class="badge badge-light-success">200 OK</div>
                                                        </td>
                                                        <td>POST /v1/invoices/in_9381_6519/payment</td>
                                                        <td class="pe-0 text-end min-w-200px">19 Aug 2023, 10:10 pm
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="min-w-70px">
                                                            <div class="badge badge-light-danger">500 ERR</div>
                                                        </td>
                                                        <td>POST /v1/invoice/in_5250_9522/invalid</td>
                                                        <td class="pe-0 text-end min-w-200px">24 Jun 2023, 11:05 am
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="min-w-70px">
                                                            <div class="badge badge-light-warning">404 WRN</div>
                                                        </td>
                                                        <td>POST /v1/customer/c_64b784ba3625f/not_found</td>
                                                        <td class="pe-0 text-end min-w-200px">10 Mar 2023, 5:20 pm
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="min-w-70px">
                                                            <div class="badge badge-light-success">200 OK</div>
                                                        </td>
                                                        <td>POST /v1/invoices/in_6751_5507/payment</td>
                                                        <td class="pe-0 text-end min-w-200px">10 Mar 2023, 5:20 pm
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!--end::Table wrapper-->
                                    </div>
                                    <!--end::Card body-->
                                </div>
                                <!--end::Earnings-->
                                <!--begin::Statements-->

                                <!--end::Statements-->
                            </div>
                            <!--end:::Tab pane-->
                        </div>
                        <!--end:::Tab content-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Layout-->
                <!--begin::Modals-->
                <!--begin::Modal - Add Payment-->
                <div class="modal fade" id="kt_modal_add_payment" tabindex="-1" aria-hidden="true">
                    <!--begin::Modal dialog-->
                    <div class="modal-dialog mw-650px">
                        <!--begin::Modal content-->
                        <div class="modal-content">
                            <!--begin::Modal header-->
                            <div class="modal-header">
                                <!--begin::Modal title-->
                                <h2 class="fw-bold">Add a Payment Record</h2>
                                <!--end::Modal title-->
                                <!--begin::Close-->
                                <div id="kt_modal_add_payment_close"
                                    class="btn btn-icon btn-sm btn-active-icon-primary">
                                    <i class="ki-duotone ki-cross fs-1">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </div>
                                <!--end::Close-->
                            </div>
                            <!--end::Modal header-->
                            <!--begin::Modal body-->
                            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                <!--begin::Form-->
                                <form id="kt_modal_add_payment_form" class="form" action="#">
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold form-label mb-2">
                                            <span class="required">Invoice Number</span>
                                            <span class="ms-2" data-bs-toggle="tooltip"
                                                title="The invoice number must be unique.">
                                                <i class="ki-duotone ki-information fs-7">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                </i>
                                            </span>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-solid"
                                            name="invoice" value="" />
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="required fs-6 fw-semibold form-label mb-2">Status</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <select class="form-select form-select-solid fw-bold" name="status"
                                            data-control="select2" data-placeholder="Select an option"
                                            data-hide-search="true">
                                            <option></option>
                                            <option value="0">Approved</option>
                                            <option value="1">Pending</option>
                                            <option value="2">Rejected</option>
                                            <option value="3">In progress</option>
                                            <option value="4">Completed</option>
                                        </select>
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="required fs-6 fw-semibold form-label mb-2">Invoice
                                            Amount</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-solid"
                                            name="amount" value="" />
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-15">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold form-label mb-2">
                                            <span class="required">Additional Information</span>
                                            <span class="ms-2" data-bs-toggle="tooltip"
                                                title="Information such as description of invoice or product purchased.">
                                                <i class="ki-duotone ki-information fs-7">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                </i>
                                            </span>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <textarea class="form-control form-control-solid rounded-3" name="additional_info"></textarea>
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Actions-->
                                    <div class="text-center">
                                        <button type="reset" id="kt_modal_add_payment_cancel"
                                            class="btn btn-light me-3">Discard</button>
                                        <button type="submit" id="kt_modal_add_payment_submit"
                                            class="btn btn-primary">
                                            <span class="indicator-label">Submit</span>
                                            <span class="indicator-progress">Please wait...
                                                <span
                                                    class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                    </div>
                                    <!--end::Actions-->
                                </form>
                                <!--end::Form-->
                            </div>
                            <!--end::Modal body-->
                        </div>
                        <!--end::Modal content-->
                    </div>
                    <!--end::Modal dialog-->
                </div>
                <!--end::Modal - New Card-->
                <!--begin::Modal - Adjust Balance-->
                <div class="modal fade" id="kt_modal_adjust_balance" tabindex="-1" aria-hidden="true">
                    <!--begin::Modal dialog-->
                    <div class="modal-dialog modal-dialog-centered mw-650px">
                        <!--begin::Modal content-->
                        <div class="modal-content">
                            <!--begin::Modal header-->
                            <div class="modal-header">
                                <!--begin::Modal title-->
                                <h2 class="fw-bold">Adjust Balance</h2>
                                <!--end::Modal title-->
                                <!--begin::Close-->
                                <div id="kt_modal_adjust_balance_close"
                                    class="btn btn-icon btn-sm btn-active-icon-primary">
                                    <i class="ki-duotone ki-cross fs-1">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </div>
                                <!--end::Close-->
                            </div>
                            <!--end::Modal header-->
                            <!--begin::Modal body-->
                            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                <!--begin::Balance preview-->
                                <div class="d-flex text-center mb-9">
                                    <div class="w-50 border border-dashed border-gray-300 rounded mx-2 p-4">
                                        <div class="fs-6 fw-semibold mb-2 text-muted">Current Balance</div>
                                        <div class="fs-2 fw-bold" kt-modal-adjust-balance="current_balance">ZMWK
                                            32,487.57</div>
                                    </div>
                                    <div class="w-50 border border-dashed border-gray-300 rounded mx-2 p-4">
                                        <div class="fs-6 fw-semibold mb-2 text-muted">New Balance
                                            <span class="ms-2" data-bs-toggle="tooltip"
                                                title="Enter an amount to preview the new balance.">
                                                <i class="ki-duotone ki-information fs-7">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                </i>
                                            </span>
                                        </div>
                                        <div class="fs-2 fw-bold" kt-modal-adjust-balance="new_balance">--</div>
                                    </div>
                                </div>
                                <!--end::Balance preview-->
                                <!--begin::Form-->
                                <form id="kt_modal_adjust_balance_form" class="form" action="#">
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="required fs-6 fw-semibold form-label mb-2">Adjustment
                                            type</label>
                                        <!--end::Label-->
                                        <!--begin::Dropdown-->
                                        <select class="form-select form-select-solid fw-bold" name="adjustment"
                                            aria-label="Select an option" data-control="select2"
                                            data-dropdown-parent="#kt_modal_adjust_balance"
                                            data-placeholder="Select an option" data-hide-search="true">
                                            <option></option>
                                            <option value="1">Credit</option>
                                            <option value="2">Debit</option>
                                        </select>
                                        <!--end::Dropdown-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-7">
                                        <label class="required fs-6 fw-semibold form-label mb-2">Amount</label>
                                        <input id="kt_modal_inputmask" type="text"
                                            class="form-control form-control-solid" name="amount"
                                            value="" />
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-7">
                                        <label class="fs-6 fw-semibold form-label mb-2">Add adjustment note</label>
                                        <textarea class="form-control form-control-solid rounded-3 mb-5"></textarea>
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Disclaimer-->
                                    <div class="fs-7 text-muted mb-15">
                                        Please be aware that all manual balance changes
                                        will be audited by the financial team every fortnight. Please maintain your
                                        invoices and receipts until then. Thank you.
                                    </div>
                                    <!--end::Disclaimer-->
                                    <!--begin::Actions-->
                                    <div class="text-center">
                                        <button type="reset" id="kt_modal_adjust_balance_cancel"
                                            class="btn btn-light me-3">Discard</button>
                                        <button type="submit" id="kt_modal_adjust_balance_submit"
                                            class="btn btn-primary">
                                            <span class="indicator-label">Submit</span>
                                            <span class="indicator-progress">Please wait...
                                                <span
                                                    class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                    </div>
                                    <!--end::Actions-->
                                </form>
                                <!--end::Form-->
                            </div>
                            <!--end::Modal body-->
                        </div>
                        <!--end::Modal content-->
                    </div>
                    <!--end::Modal dialog-->
                </div>
                <!--end::Modal - New Card-->
                <!--begin::Modal - New Address-->
                <div class="modal fade" id="kt_modal_update_customer" tabindex="-1" aria-hidden="true">
                    <!--begin::Modal dialog-->
                    <div class="modal-dialog modal-dialog-centered mw-650px">
                        <!--begin::Modal content-->
                        <div class="modal-content">
                            <!--begin::Form-->
                            <form class="form" action="#" id="kt_modal_update_customer_form">
                                <!--begin::Modal header-->
                                <div class="modal-header" id="kt_modal_update_customer_header">
                                    <!--begin::Modal title-->
                                    <h2 class="fw-bold">Update Customer</h2>
                                    <!--end::Modal title-->
                                    <!--begin::Close-->
                                    <div id="kt_modal_update_customer_close"
                                        class="btn btn-icon btn-sm btn-active-icon-primary">
                                        <i class="ki-duotone ki-cross fs-1">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </div>
                                    <!--end::Close-->
                                </div>
                                <!--end::Modal header-->
                                <!--begin::Modal body-->
                                <div class="modal-body py-10 px-lg-17">
                                    <!--begin::Scroll-->
                                    <div class="d-flex flex-column scroll-y me-n7 pe-7"
                                        id="kt_modal_update_customer_scroll" data-kt-scroll="true"
                                        data-kt-scroll-activate="{default: false, lg: true}"
                                        data-kt-scroll-max-height="auto"
                                        data-kt-scroll-dependencies="#kt_modal_update_customer_header"
                                        data-kt-scroll-wrappers="#kt_modal_update_customer_scroll"
                                        data-kt-scroll-offset="300px">
                                        <!--begin::Notice-->
                                        <!--begin::Notice-->
                                        <div
                                            class="notice d-flex bg-light-primary rounded border-primary border border-dashed mb-9 p-6">
                                            <!--begin::Icon-->
                                            <i class="ki-duotone ki-information fs-2tx text-primary me-4">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                            </i>
                                            <!--end::Icon-->
                                            <!--begin::Wrapper-->
                                            <div class="d-flex flex-stack flex-grow-1">
                                                <!--begin::Content-->
                                                <div class="fw-semibold">
                                                    <div class="fs-6 text-gray-700">
                                                        Updating customer details will
                                                        receive a privacy audit. For more info, please read our

                                                        <a href="#">Privacy Policy</a>
                                                    </div>
                                                </div>
                                                <!--end::Content-->
                                            </div>
                                            <!--end::Wrapper-->
                                        </div>
                                        <!--end::Notice-->
                                        <!--end::Notice-->
                                        <!--begin::User toggle-->
                                        <div class="fw-bold fs-3 rotate collapsible mb-7" data-bs-toggle="collapse"
                                            href="#kt_modal_update_customer_user_info" role="button"
                                            aria-expanded="false"
                                            aria-controls="kt_modal_update_customer_user_info">User Information
                                            <span class="ms-2 rotate-180">
                                                <i class="ki-duotone ki-down fs-3"></i>
                                            </span>
                                        </div>
                                        <!--end::User toggle-->
                                        <!--begin::User form-->
                                        <div id="kt_modal_update_customer_user_info" class="collapse show">
                                            <!--begin::Input group-->
                                            <div class="mb-7">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-semibold mb-2">
                                                    <span>Update Avatar</span>
                                                    <span class="ms-1" data-bs-toggle="tooltip"
                                                        title="Allowed file types: png, jpg, jpeg.">
                                                        <i class="ki-duotone ki-information fs-7">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                            <span class="path3"></span>
                                                        </i>
                                                    </span>
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Image input wrapper-->
                                                <div class="mt-1">
                                                    <!--begin::Image input-->
                                                    <div class="image-input image-input-outline"
                                                        data-kt-image-input="true"
                                                        style="background-image: url('assets/media/svg/avatars/blank.svg')">
                                                        <!--begin::Preview existing avatar-->
                                                        <div class="image-input-wrapper w-125px h-125px"
                                                            style="background-image: url(assets/media/avatars/300-1.jpg)">
                                                        </div>
                                                        <!--end::Preview existing avatar-->
                                                        <!--begin::Edit-->
                                                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                            data-kt-image-input-action="change"
                                                            data-bs-toggle="tooltip" title="Change avatar">
                                                            <i class="ki-duotone ki-pencil fs-7">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                            </i>
                                                            
                                                            <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
                                                            <input type="hidden" name="avatar_remove" />
                                                        </label>
                                                        <!--end::Edit-->
                                                        <!--begin::Cancel-->
                                                        <span
                                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                            data-kt-image-input-action="cancel"
                                                            data-bs-toggle="tooltip" title="Cancel avatar">
                                                            <i class="ki-duotone ki-cross fs-2">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                            </i>
                                                        </span>
                                                        <!--end::Cancel-->
                                                        <!--begin::Remove-->
                                                        <span
                                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                            data-kt-image-input-action="remove"
                                                            data-bs-toggle="tooltip" title="Remove avatar">
                                                            <i class="ki-duotone ki-cross fs-2">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                            </i>
                                                        </span>
                                                        <!--end::Remove-->
                                                    </div>
                                                    <!--end::Image input-->
                                                </div>
                                                <!--end::Image input wrapper-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-semibold mb-2">Name</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" class="form-control form-control-solid"
                                                    placeholder="" name="name" value="Sean Bean" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-semibold mb-2">
                                                    <span>Email</span>
                                                    <span class="ms-1" data-bs-toggle="tooltip" title="Email address must be active">
                                                        <i class="ki-duotone ki-information fs-7">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                            <span class="path3"></span>
                                                        </i>
                                                    </span>
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="email" class="form-control form-control-solid"
                                                    placeholder="" name="email" value="sean@dellito.com" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="fv-row mb-15">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-semibold mb-2">Description</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" class="form-control form-control-solid"
                                                    placeholder="" name="description" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <!--end::User form-->
                                        <!--begin::Billing toggle-->
                                        <div class="fw-bold fs-3 rotate collapsible collapsed mb-7"
                                            data-bs-toggle="collapse" href="#kt_modal_update_customer_billing_info"
                                            role="button" aria-expanded="false"
                                            aria-controls="kt_modal_update_customer_billing_info">Shipping Information
                                            <span class="ms-2 rotate-180">
                                                <i class="ki-duotone ki-down fs-3"></i>
                                            </span>
                                        </div>
                                        <!--end::Billing toggle-->
                                        <!--begin::Billing form-->
                                        <div id="kt_modal_update_customer_billing_info" class="collapse">
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column mb-7 fv-row">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-semibold mb-2">Address Line 1</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input class="form-control form-control-solid" placeholder=""
                                                    name="address1" value="101, Collins Street" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column mb-7 fv-row">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-semibold mb-2">Address Line 2</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input class="form-control form-control-solid" placeholder=""
                                                    name="address2" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column mb-7 fv-row">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-semibold mb-2">Town</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input class="form-control form-control-solid" placeholder=""
                                                    name="city" value="Melbourne" />
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="row g-9 mb-7">
                                                <!--begin::Col-->
                                                <div class="col-md-6 fv-row">
                                                    <!--begin::Label-->
                                                    <label class="fs-6 fw-semibold mb-2">State / Province</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input class="form-control form-control-solid" placeholder=""
                                                        name="state" value="Victoria" />
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Col-->
                                                <!--begin::Col-->
                                                <div class="col-md-6 fv-row">
                                                    <!--begin::Label-->
                                                    <label class="fs-6 fw-semibold mb-2">Post Code</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input class="form-control form-control-solid" placeholder=""
                                                        name="postcode" value="3000" />
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="d-flex flex-column mb-7 fv-row">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-semibold mb-2">
                                                    <span>Country</span>
                                                    <span class="ms-1" data-bs-toggle="tooltip"
                                                        title="Country of origination">
                                                        <i class="ki-duotone ki-information fs-7">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                            <span class="path3"></span>
                                                        </i>
                                                    </span>
                                                </label>
                                                <!--end::Label-->

                                                <!--begin::Input-->
                                                <select name="country" aria-label="Select a Country"
                                                    data-control="select2" data-placeholder="Select a Country..."
                                                    data-dropdown-parent="#kt_modal_update_customer"
                                                    class="form-select form-select-solid fw-bold">
                                                    <option value="">Select a Country...</option>
                                                    <option value="AF">Afghanistan</option>
                                                    <option value="AX">Aland Islands</option>
                                                    <option value="AL">Albania</option>
                                                    <option value="DZ">Algeria</option>
                                                    <option value="AS">American Samoa</option>
                                                    <option value="AD">Andorra</option>
                                                    <option value="AO">Angola</option>
                                                    <option value="AI">Anguilla</option>
                                                    <option value="AG">Antigua and Barbuda</option>
                                                    <option value="AR">Argentina</option>
                                                    <option value="AM">Armenia</option>
                                                    <option value="AW">Aruba</option>
                                                    <option value="AU">Australia</option>
                                                    <option value="AT">Austria</option>
                                                    <option value="AZ">Azerbaijan</option>
                                                    <option value="BS">Bahamas</option>
                                                    <option value="BH">Bahrain</option>
                                                    <option value="BD">Bangladesh</option>
                                                    <option value="BB">Barbados</option>
                                                    <option value="BY">Belarus</option>
                                                    <option value="BE">Belgium</option>
                                                    <option value="BZ">Belize</option>
                                                    <option value="BJ">Benin</option>
                                                    <option value="BM">Bermuda</option>
                                                    <option value="BT">Bhutan</option>
                                                    <option value="BO">Bolivia, Plurinational State of</option>
                                                    <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                                                    <option value="BA">Bosnia and Herzegovina</option>
                                                    <option value="BW">Botswana</option>
                                                    <option value="BR">Brazil</option>
                                                    <option value="IO">British Indian Ocean Territory</option>
                                                    <option value="BN">Brunei Darussalam</option>
                                                    <option value="BG">Bulgaria</option>
                                                    <option value="BF">Burkina Faso</option>
                                                    <option value="BI">Burundi</option>
                                                    <option value="KH">Cambodia</option>
                                                    <option value="CM">Cameroon</option>
                                                    <option value="CA">Canada</option>
                                                    <option value="CV">Cape Verde</option>
                                                    <option value="KY">Cayman Islands</option>
                                                    <option value="CF">Central African Republic</option>
                                                    <option value="TD">Chad</option>
                                                    <option value="CL">Chile</option>
                                                    <option value="CN">China</option>
                                                    <option value="CX">Christmas Island</option>
                                                    <option value="CC">Cocos (Keeling) Islands</option>
                                                    <option value="CO">Colombia</option>
                                                    <option value="KM">Comoros</option>
                                                    <option value="CK">Cook Islands</option>
                                                    <option value="CR">Costa Rica</option>
                                                    <option value="CI">Côte d'Ivoire</option>
                                                    <option value="HR">Croatia</option>
                                                    <option value="CU">Cuba</option>
                                                    <option value="CW">Curaçao</option>
                                                    <option value="CZ">Czech Republic</option>
                                                    <option value="DK">Denmark</option>
                                                    <option value="DJ">Djibouti</option>
                                                    <option value="DM">Dominica</option>
                                                    <option value="DO">Dominican Republic</option>
                                                    <option value="EC">Ecuador</option>
                                                    <option value="EG">Egypt</option>
                                                    <option value="SV">El Salvador</option>
                                                    <option value="GQ">Equatorial Guinea</option>
                                                    <option value="ER">Eritrea</option>
                                                    <option value="EE">Estonia</option>
                                                    <option value="ET">Ethiopia</option>
                                                    <option value="FK">Falkland Islands (Malvinas)</option>
                                                    <option value="FJ">Fiji</option>
                                                    <option value="FI">Finland</option>
                                                    <option value="FR">France</option>
                                                    <option value="PF">French Polynesia</option>
                                                    <option value="GA">Gabon</option>
                                                    <option value="GM">Gambia</option>
                                                    <option value="GE">Georgia</option>
                                                    <option value="DE">Germany</option>
                                                    <option value="GH">Ghana</option>
                                                    <option value="GI">Gibraltar</option>
                                                    <option value="GR">Greece</option>
                                                    <option value="GL">Greenland</option>
                                                    <option value="GD">Grenada</option>
                                                    <option value="GU">Guam</option>
                                                    <option value="GT">Guatemala</option>
                                                    <option value="GG">Guernsey</option>
                                                    <option value="GN">Guinea</option>
                                                    <option value="GW">Guinea-Bissau</option>
                                                    <option value="HT">Haiti</option>
                                                    <option value="VA">Holy See (Vatican City State)</option>
                                                    <option value="HN">Honduras</option>
                                                    <option value="HK">Hong Kong</option>
                                                    <option value="HU">Hungary</option>
                                                    <option value="IS">Iceland</option>
                                                    <option value="IN">India</option>
                                                    <option value="ID">Indonesia</option>
                                                    <option value="IR">Iran, Islamic Republic of</option>
                                                    <option value="IQ">Iraq</option>
                                                    <option value="IE">Ireland</option>
                                                    <option value="IM">Isle of Man</option>
                                                    <option value="IL">Israel</option>
                                                    <option value="IT">Italy</option>
                                                    <option value="JM">Jamaica</option>
                                                    <option value="JP">Japan</option>
                                                    <option value="JE">Jersey</option>
                                                    <option value="JO">Jordan</option>
                                                    <option value="KZ">Kazakhstan</option>
                                                    <option value="KE">Kenya</option>
                                                    <option value="KI">Kiribati</option>
                                                    <option value="KP">Korea, Democratic People's Republic of
                                                    </option>
                                                    <option value="KW">Kuwait</option>
                                                    <option value="KG">Kyrgyzstan</option>
                                                    <option value="LA">Lao People's Democratic Republic</option>
                                                    <option value="LV">Latvia</option>
                                                    <option value="LB">Lebanon</option>
                                                    <option value="LS">Lesotho</option>
                                                    <option value="LR">Liberia</option>
                                                    <option value="LY">Libya</option>
                                                    <option value="LI">Liechtenstein</option>
                                                    <option value="LT">Lithuania</option>
                                                    <option value="LU">Luxembourg</option>
                                                    <option value="MO">Macao</option>
                                                    <option value="MG">Madagascar</option>
                                                    <option value="MW">Malawi</option>
                                                    <option value="MY">Malaysia</option>
                                                    <option value="MV">Maldives</option>
                                                    <option value="ML">Mali</option>
                                                    <option value="MT">Malta</option>
                                                    <option value="MH">Marshall Islands</option>
                                                    <option value="MQ">Martinique</option>
                                                    <option value="MR">Mauritania</option>
                                                    <option value="MU">Mauritius</option>
                                                    <option value="MX">Mexico</option>
                                                    <option value="FM">Micronesia, Federated States of</option>
                                                    <option value="MD">Moldova, Republic of</option>
                                                    <option value="MC">Monaco</option>
                                                    <option value="MN">Mongolia</option>
                                                    <option value="ME">Montenegro</option>
                                                    <option value="MS">Montserrat</option>
                                                    <option value="MA">Morocco</option>
                                                    <option value="MZ">Mozambique</option>
                                                    <option value="MM">Myanmar</option>
                                                    <option value="NA">Namibia</option>
                                                    <option value="NR">Nauru</option>
                                                    <option value="NP">Nepal</option>
                                                    <option value="NL">Netherlands</option>
                                                    <option value="NZ">New Zealand</option>
                                                    <option value="NI">Nicaragua</option>
                                                    <option value="NE">Niger</option>
                                                    <option value="NG">Nigeria</option>
                                                    <option value="NU">Niue</option>
                                                    <option value="NF">Norfolk Island</option>
                                                    <option value="MP">Northern Mariana Islands</option>
                                                    <option value="NO">Norway</option>
                                                    <option value="OM">Oman</option>
                                                    <option value="PK">Pakistan</option>
                                                    <option value="PW">Palau</option>
                                                    <option value="PS">Palestinian Territory, Occupied</option>
                                                    <option value="PA">Panama</option>
                                                    <option value="PG">Papua New Guinea</option>
                                                    <option value="PY">Paraguay</option>
                                                    <option value="PE">Peru</option>
                                                    <option value="PH">Philippines</option>
                                                    <option value="PL">Poland</option>
                                                    <option value="PT">Portugal</option>
                                                    <option value="PR">Puerto Rico</option>
                                                    <option value="QA">Qatar</option>
                                                    <option value="RO">Romania</option>
                                                    <option value="RU">Russian Federation</option>
                                                    <option value="RW">Rwanda</option>
                                                    <option value="BL">Saint Barthélemy</option>
                                                    <option value="KN">Saint Kitts and Nevis</option>
                                                    <option value="LC">Saint Lucia</option>
                                                    <option value="MF">Saint Martin (French part)</option>
                                                    <option value="VC">Saint Vincent and the Grenadines</option>
                                                    <option value="WS">Samoa</option>
                                                    <option value="SM">San Marino</option>
                                                    <option value="ST">Sao Tome and Principe</option>
                                                    <option value="SA">Saudi Arabia</option>
                                                    <option value="SN">Senegal</option>
                                                    <option value="RS">Serbia</option>
                                                    <option value="SC">Seychelles</option>
                                                    <option value="SL">Sierra Leone</option>
                                                    <option value="SG">Singapore</option>
                                                    <option value="SX">Sint Maarten (Dutch part)</option>
                                                    <option value="SK">Slovakia</option>
                                                    <option value="SI">Slovenia</option>
                                                    <option value="SB">Solomon Islands</option>
                                                    <option value="SO">Somalia</option>
                                                    <option value="ZA">South Africa</option>
                                                    <option value="KR">South Korea</option>
                                                    <option value="SS">South Sudan</option>
                                                    <option value="ES">Spain</option>
                                                    <option value="LK">Sri Lanka</option>
                                                    <option value="SD">Sudan</option>
                                                    <option value="SR">Suriname</option>
                                                    <option value="SZ">Swaziland</option>
                                                    <option value="SE">Sweden</option>
                                                    <option value="CH">Switzerland</option>
                                                    <option value="SY">Syrian Arab Republic</option>
                                                    <option value="TW">Taiwan, Province of China</option>
                                                    <option value="TJ">Tajikistan</option>
                                                    <option value="TZ">Tanzania, United Republic of</option>
                                                    <option value="TH">Thailand</option>
                                                    <option value="TG">Togo</option>
                                                    <option value="TK">Tokelau</option>
                                                    <option value="TO">Tonga</option>
                                                    <option value="TT">Trinidad and Tobago</option>
                                                    <option value="TN">Tunisia</option>
                                                    <option value="TR">Turkey</option>
                                                    <option value="TM">Turkmenistan</option>
                                                    <option value="TC">Turks and Caicos Islands</option>
                                                    <option value="TV">Tuvalu</option>
                                                    <option value="UG">Uganda</option>
                                                    <option value="UA">Ukraine</option>
                                                    <option value="AE">United Arab Emirates</option>
                                                    <option value="GB">United Kingdom</option>
                                                    <option value="US">United States</option>
                                                    <option value="UY">Uruguay</option>
                                                    <option value="UZ">Uzbekistan</option>
                                                    <option value="VU">Vanuatu</option>
                                                    <option value="VE">Venezuela, Bolivarian Republic of</option>
                                                    <option value="VN">Vietnam</option>
                                                    <option value="VI">Virgin Islands</option>
                                                    <option value="YE">Yemen</option>
                                                    <option value="ZM">Zambia</option>
                                                    <option value="ZW">Zimbabwe</option>
                                                </select>
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="fv-row mb-7">
                                                <!--begin::Wrapper-->
                                                <div class="d-flex flex-stack">
                                                    <!--begin::Label-->
                                                    <div class="me-5">
                                                        <!--begin::Label-->
                                                        <label class="fs-6 fw-semibold">Use as a billing
                                                            adderess?</label>
                                                        <!--end::Label-->
                                                        <!--begin::Input-->
                                                        <div class="fs-7 fw-semibold text-muted">If you need more
                                                            info, please check budget planning</div>
                                                        <!--end::Input-->
                                                    </div>
                                                    <!--end::Label-->
                                                    <!--begin::Switch-->
                                                    <label
                                                        class="form-check form-switch form-check-custom form-check-solid">
                                                        <!--begin::Input-->
                                                        <input class="form-check-input" name="billing"
                                                            type="checkbox" value="1"
                                                            id="kt_modal_update_customer_billing"
                                                            checked="checked" />
                                                        <!--end::Input-->
                                                        <!--begin::Label-->
                                                        <span class="form-check-label fw-semibold text-muted"
                                                            for="kt_modal_update_customer_billing">Yes</span>
                                                        <!--end::Label-->
                                                    </label>
                                                    <!--end::Switch-->
                                                </div>
                                                <!--begin::Wrapper-->
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <!--end::Billing form-->
                                    </div>
                                    <!--end::Scroll-->
                                </div>
                                <!--end::Modal body-->
                                <!--begin::Modal footer-->
                                <div class="modal-footer flex-center">
                                    <!--begin::Button-->
                                    <button type="reset" id="kt_modal_update_customer_cancel"
                                        class="btn btn-light me-3">Discard</button>
                                    <!--end::Button-->
                                    <!--begin::Button-->
                                    <button type="submit" id="kt_modal_update_customer_submit"
                                        class="btn btn-primary">
                                        <span class="indicator-label">Submit</span>
                                        <span class="indicator-progress">Please wait...
                                            <span
                                                class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    </button>
                                    <!--end::Button-->
                                </div>
                                <!--end::Modal footer-->
                            </form>
                            <!--end::Form-->
                        </div>
                    </div>
                </div>
                <!--end::Modal - New Address-->
                <!--begin::Modal - New Card-->
                <div class="modal fade" id="kt_modal_new_card" tabindex="-1" aria-hidden="true">
                    <!--begin::Modal dialog-->
                    <div class="modal-dialog modal-dialog-centered mw-650px">
                        <!--begin::Modal content-->
                        <div class="modal-content">
                            <!--begin::Modal header-->
                            <div class="modal-header">
                                <!--begin::Modal title-->
                                <h2>Add New Card</h2>
                                <!--end::Modal title-->
                                <!--begin::Close-->
                                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                                    <i class="ki-duotone ki-cross fs-1">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </div>
                                <!--end::Close-->
                            </div>
                            <!--end::Modal header-->
                            <!--begin::Modal body-->
                            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                <!--begin::Form-->
                                <form id="kt_modal_new_card_form" class="form" action="#">
                                    <!--begin::Input group-->
                                    <div class="d-flex flex-column mb-7 fv-row">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                            <span class="required">Name On Card</span>
                                            <span class="ms-1" data-bs-toggle="tooltip"
                                                title="Specify a card holder's name">
                                                <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                </i>
                                            </span>
                                        </label>
                                        <!--end::Label-->
                                        <input type="text" class="form-control form-control-solid"
                                            placeholder="" name="card_name" value="Max Doe" />
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="d-flex flex-column mb-7 fv-row">
                                        <!--begin::Label-->
                                        <label class="required fs-6 fw-semibold form-label mb-2">Card Number</label>
                                        <!--end::Label-->
                                        <!--begin::Input wrapper-->
                                        <div class="position-relative">
                                            <!--begin::Input-->
                                            <input type="text" class="form-control form-control-solid"
                                                placeholder="Enter card number" name="card_number"
                                                value="4111 1111 1111 1111" />
                                            <!--end::Input-->
                                            <!--begin::Card logos-->
                                            <div class="position-absolute translate-middle-y top-50 end-0 me-5">
                                                <img src="assets/media/svg/card-logos/visa.svg" alt=""
                                                    class="h-25px" />
                                                <img src="assets/media/svg/card-logos/mastercard.svg" alt=""
                                                    class="h-25px" />
                                                <img src="assets/media/svg/card-logos/american-express.svg"
                                                    alt="" class="h-25px" />
                                            </div>
                                            <!--end::Card logos-->
                                        </div>
                                        <!--end::Input wrapper-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row mb-10">
                                        <!--begin::Col-->
                                        <div class="col-md-8 fv-row">
                                            <!--begin::Label-->
                                            <label class="required fs-6 fw-semibold form-label mb-2">Expiration
                                                Date</label>
                                            <!--end::Label-->
                                            <!--begin::Row-->
                                            <div class="row fv-row">
                                                <!--begin::Col-->
                                                <div class="col-6">
                                                    <select name="card_expiry_month"
                                                        class="form-select form-select-solid" data-control="select2"
                                                        data-hide-search="true" data-placeholder="Month">
                                                        <option></option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
                                                        <option value="11">11</option>
                                                        <option value="12">12</option>
                                                    </select>
                                                </div>
                                                <!--end::Col-->
                                                <!--begin::Col-->
                                                <div class="col-6">
                                                    <select name="card_expiry_year"
                                                        class="form-select form-select-solid" data-control="select2"
                                                        data-hide-search="true" data-placeholder="Year">
                                                        <option></option>
                                                        <option value="2023">2023</option>
                                                        <option value="2024">2024</option>
                                                        <option value="2025">2025</option>
                                                        <option value="2026">2026</option>
                                                        <option value="2027">2027</option>
                                                        <option value="2028">2028</option>
                                                        <option value="2029">2029</option>
                                                        <option value="2030">2030</option>
                                                        <option value="2031">2031</option>
                                                        <option value="2032">2032</option>
                                                        <option value="2033">2033</option>
                                                    </select>
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Row-->
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-md-4 fv-row">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                                <span class="required">CVV</span>
                                                <span class="ms-1" data-bs-toggle="tooltip"
                                                    title="Enter a card CVV code">
                                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                    </i>
                                                </span>
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Input wrapper-->
                                            <div class="position-relative">
                                                <!--begin::Input-->
                                                <input type="text" class="form-control form-control-solid"
                                                    minlength="3" maxlength="4" placeholder="CVV"
                                                    name="card_cvv" />
                                                <!--end::Input-->
                                                <!--begin::CVV icon-->
                                                <div class="position-absolute translate-middle-y top-50 end-0 me-3">
                                                    <i class="ki-duotone ki-credit-cart fs-2hx">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                </div>
                                                <!--end::CVV icon-->
                                            </div>
                                            <!--end::Input wrapper-->
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="d-flex flex-stack">
                                        <!--begin::Label-->
                                        <div class="me-5">
                                            <label class="fs-6 fw-semibold form-label">Save Card for further
                                                billing?</label>
                                            <div class="fs-7 fw-semibold text-muted">If you need more info, please
                                                check budget planning</div>
                                        </div>
                                        <!--end::Label-->
                                        <!--begin::Switch-->
                                        <label class="form-check form-switch form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value="1"
                                                checked="checked" />
                                            <span class="form-check-label fw-semibold text-muted">Save Card</span>
                                        </label>
                                        <!--end::Switch-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Actions-->
                                    <div class="text-center pt-15">
                                        <button type="reset" id="kt_modal_new_card_cancel"
                                            class="btn btn-light me-3">Discard</button>
                                        <button type="submit" id="kt_modal_new_card_submit"
                                            class="btn btn-primary">
                                            <span class="indicator-label">Submit</span>
                                            <span class="indicator-progress">Please wait...
                                                <span
                                                    class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                    </div>
                                    <!--end::Actions-->
                                </form>
                                <!--end::Form-->
                            </div>
                            <!--end::Modal body-->
                        </div>
                        <!--end::Modal content-->
                    </div>
                    <!--end::Modal dialog-->
                </div>
                <!--end::Modal - New Card-->
                <!--end::Modals-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
</div>