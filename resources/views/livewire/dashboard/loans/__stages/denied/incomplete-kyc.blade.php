<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl">
            <div class="d-flex flex-column flex-xl-row">
                <div class="flex-column flex-lg-row-auto w-100 w-xl-350px mb-10">
                    <div class="card mb-5 mb-xl-8 bg-warning">
                        <div class="card-body pt-15">
                            <div class="d-flex flex-center flex-column mb-5">

                                <div class="fs-3 text-gray-800 text-hover-primary fw-bold mb-1">
                                    <h1 class="text-white font-bold">Incomplete KYC</h1>
                                </div>
                                
                                <div class="symbol symbol-100px symbol-circle mb-7">
                                    @if ($loan->user->profile_photo_path)
                                        <img src="{{ '../public/'.Storage::url($loan->user->profile_photo_path) }}" alt=""/>
                                    @else
                                        <img src="https://thumbs.dreamstime.com/b/default-avatar-profile-image-vector-social-media-user-icon-potrait-182347582.jpg" alt=""/>
                                    @endif
                                </div>
                                <a href="#" class="fs-3 text-white text-hover-primary fw-bold mb-1">
                                    {{ $loan->user->fname.' '.$loan->user->lname }}
                                </a>
                                
                                <div class="fs-5 fw-semibold text-muted mb-6">{{ $loan->user->occupation }}</div>

                                <div class="d-flex flex-wrap flex-center">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-4 border border-gray-300 border-dashed rounded py-3 px-3 mx-4 m-3">
                                            <div class="fs-4 fw-bold text-gray-700">
                                                <span class="w-50px">ZMW {{ $loan->amount}}</span>
                                                <i class="ki-duotone ki-usd fs-3 text-danger">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </div>
                                            <div class="fw-semibold text-white">Principle<br>Amount</div>
                                        </div>
                                        <div class="col-lg-4 border border-gray-300 border-dashed rounded py-3 px-3 mx-4 m-3">
                                            <div class="fs-4 fw-bold text-gray-700">
                                                <span class="w-50px">{{ $loan->repayment_plan ?? 1}} (Months)</span>
                                                <i class="ki-duotone ki-usd fs-3 text-danger">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </div>
                                            <div class="fw-semibold text-white">Loan Duration</div>
                                        </div>
                                        <div class="col-lg-4 bg-info text-white border border-gray-300 border-dashed rounded py-3 px-3 mx-4 m-3">
                                            <div class="fs-4 fw-bold text-gray-700">
                                                <i class="ki-duotone ki-usd fs-3 text-danger">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </div>
                                            <div class="fw-semibold text-white">Total <br> Repayment</div>
                                        </div>
                                        <div class="col-lg-4 border border-gray-300 border-dashed rounded py-3 px-3 mx-4 m-3">
                                            <div class="fs-4 fw-bold text-gray-700">
                                                <i class="ki-duotone ki-usd fs-3 text-danger">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </div>
                                            <div class="fw-semibold text-white">Monthly<br>Repayment</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="d-flex flex-stack fs-4 py-3">
                                <div class="fw-bold rotate collapsible" data-bs-toggle="collapse"
                                    href="#kt_customer_view_details" role="button" aria-expanded="false"
                                    aria-controls="kt_customer_view_details">Details
                                    <span class="ms-2 rotate-180">
                                        <i class="ki-duotone ki-down fs-3"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="separator separator-dashed my-3"></div>
                            <div id="kt_customer_view_details" class="collapse show">
                                <div class="py-5 fs-6">
                                    <div class="fw-bold mt-5">Account ID</div>
                                    <div class="text-gray-100">ID-{{$loan->user->id}} </div>
                                    <div class="fw-bold mt-5">Gender</div>
                                    <div class="text-gray-100">{{ ucwords($loan->gender) }}</div>
                                    <div class="fw-bold mt-5">Email</div>
                                    <div class="text-gray-100">
                                        <a href="mailto:{{$loan->user->email}}"
                                            class="text-gray-100 text-hover-primary">{{ $loan->user->email ?? 'Not set'}}</a>
                                    </div>
                                    <div class="fw-bold mt-5">Address</div>
                                    <div class="text-gray-100">
                                        {{ $loan->user->address ?? 'Not set'}}
                                    </div>
                                    <div class="fw-bold mt-5">Phone</div>
                                    <div class="text-gray-100">+260{{ $loan->phone ?? ' --' }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
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
                                    <a href="#" wire:click="setLoanID({{$loan->id}})" class="menu-link px-5"> Default Loan </a>
                                </div>
                                <div class="menu-item px-5">
                                    <a href="#" wire:click="accept({{$loan->id}})" class="menu-link px-5"> Continue to Verification </a>
                                </div>
                        </div>
                    </div>



                    <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-semibold mb-8">
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab"
                                href="#kt_customer_view_overview_loan_details">
                                <small>Loan Info</small>
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4" data-kt-countup-tabs="true"
                                data-bs-toggle="tab" href="#kt_customer_view_documents">
                                <small>Uploads</small>
                            </a>
                        </li>
                    </ul>
                    
                    <div class="tab-content" id="myTabContent">
                        <!--begin:::Tab pane-->
                        <div class="tab-pane active" id="kt_customer_view_overview_loan_details"
                            role="tabpanel">
                            <div class="row g-5 g-xl-12">
                                <div class="col-xl-12">
                                    <div class="card pt-4 mb-6 mb-xl-9">
                                        <div id="kt_customer_view_payment_method" class="card-body pt-0">
                                            <div class="py-0" data-kt-customer-payment-method="row">
                                                <div id="kt_customer_view_payment_method_1"
                                                    class="collapse show fs-6 ps-10"
                                                    data-bs-parent="#kt_customer_view_payment_method">
                                                    <div class="d-flex flex-wrap py-5">
                                                        <div class="flex-equal me-5">
                                                            <table class="table table-flush fw-semibold gy-1">
                                                                <tr>
                                                                    <td class="text-muted min-w-125px w-125px">Amount</td>
                                                                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                                    <td class="text-gray-800"><b>K{{ $loan->amount }}</b></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted min-w-125px w-125px">Loan Product</td>
                                                                    <td>&nbsp;&nbsp;&nbsp;</td>
                                                                    <td class="text-gray-800">{{ $loan_product->name}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted min-w-125px w-125px">KYC</td>
                                                                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                                    <td class="text-gray-800">
                                                                        <small class="text-white d-block fw-bold mt-2">
                                                                            @if($loan->complete == 1)
                                                                                <small class="text-white bg-success p-2 rounded">{{ 'Completed' }}</small>
                                                                            @else
                                                                                <small class="text-white bg-danger p-2 rounded">{{ 'Incomplete' }}</small>
                                                                            @endif        
                                                                        </small>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="text-muted min-w-125px w-125px">Created On</td>
                                                                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                                    <td class="text-gray-800">
                                                                        <small class="text-dark d-block fw-bold mt-2">
                                                                                {{ $loan->created_at->toFormattedDateString() }}      
                                                                        </small>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card pt-4 mb-6 mb-xl-9">
                                        <div class="card-header border-0">
                                            <div class="card-title">
                                                <h4 class="fw-bold mb-0">Repayment Methods</h4>
                                            </div>
                                        </div>
                                        
                                        <div id="kt_customer_view_payment_method" class="card-body pt-0">
                                            <div class="py-0" data-kt-customer-payment-method="row">
                                                <div id="kt_customer_view_payment_method_1"
                                                    class="collapse show fs-6 ps-10"
                                                    data-bs-parent="#kt_customer_view_payment_method">
                                                    <div class="d-flex flex-wrap py-5">
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
                                                    </div>
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
                                        <h4>KYC Documents</h4>
                                    </div>
                                    <!--end::Card title-->
                                    <!--begin::Card toolbar-->
                                    <div class="card-toolbar">
                                        <!--begin::Button-->
                                        {{-- <button type="button" class="btn btn-sm btn-light-primary">
                                            <i class="ki-duotone ki-cloud-download fs-3">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>Download Report</button> --}}
                                    </div>
                                </div>
                                
                                <div class="card-body py-0">

                                    <div class="row g-6 g-xl-9 mb-6 mb-xl-9">
                                        <div class="row">
                                            <div class="row col-6">
                                                @if ($loan->user->uploads->where('name', 'nrc_file')->isNotEmpty())
                                                    <div class="col-6">
                                                        <a href="{{ 'public/'.Storage::url($loan->user->uploads->where('name', 'nrc_file')->first()->path) }}"  class="open-modal" data-toggle="modal" data-target="#fileModal" data-file-url="{{ 'public/'.Storage::url($loan->user->uploads[0]->path) }}">
                                                            <img width="90" src="{{ asset('public/mfs/admin/assets/media/svg/files/pdf.svg') }}">
                                                        </a>
                                                        <p class="file-list">NRC uploaded on 
                                                            {{ 
                                                                $loan->user->uploads != null ?
                                                                $loan->user->uploads->where('name', 'nrc_file')->first()->created_at->toFormattedDateString() : '' 
                                                            }}
                                                        </p>
                                                    </div>
                                                @endif
                                                @if ($loan->user->uploads->where('name', 'tpin_file')->isNotEmpty())
                                                    <div class="col-6">
                                                        <a href="{{ 'public/'.Storage::url($loan->user->uploads->where('name', 'tpin_file')->first()->path) }}"  class="open-modal" data-toggle="modal" data-target="#fileModal" data-file-url="{{ 'public/'.Storage::url($loan->user->uploads[0]->path) }}">
                                                            <img width="90" src="{{ asset('public/mfs/admin/assets/media/svg/files/pdf.svg') }}">
                                                        </a>
                                                        <p class="file-list">Tpin uploaded on 
                                                            {{ 
                                                                $loan->user->uploads != null ? 
                                                                $loan->user->uploads->where('name', 'tpin_file')->first()->created_at->toFormattedDateString() : '' 
                                                            }}
                                                        </p>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="row col-6">
                                                @if ($loan->user->uploads->where('name', 'preapproval')->isNotEmpty())
                                                    <div class="col-6">
                                                        <a href="{{ 'public/'.Storage::url($loan->user->uploads->where('name', 'preapproval')->first()->path) }}"  class="open-modal" data-toggle="modal" data-target="#fileModal" data-file-url="{{ 'public/'.Storage::url($loan->user->uploads[0]->path) }}">
                                                            <img width="90" src="{{ asset('public/mfs/admin/assets/media/svg/files/pdf.svg') }}">
                                                        </a>
                                                        <p class="file-list">Preapproval uploaded on 
                                                            {{ 
                                                                $loan->user->uploads != null ?
                                                                $loan->user->uploads->where('name', 'preapproval')->first()->created_at->toFormattedDateString() :'' 
                                                            }}</p>
                                                    </div>
                                                @endif
                                                @if ($loan->user->uploads->where('name', 'letterofintro')->isNotEmpty())
                                                    <div class="col-6">
                                                        <a href="{{ 'public/'.Storage::url($loan->user->uploads->where('name', 'letterofintro')->first()->path) }}"  class="open-modal" data-toggle="modal" data-target="#fileModal" data-file-url="{{ 'public/'.Storage::url($loan->user->uploads[0]->path) }}">
                                                            <img width="90" src="{{ asset('public/mfs/admin/assets/media/svg/files/pdf.svg') }}">
                                                        </a>
                                                        <p class="file-list">Letter of Introduction uploaded on 
                                                            {{ 
                                                            $loan->user->uploads != null ?
                                                            $loan->user->uploads->where('name', 'letterofintro')->first()->created_at->toFormattedDateString() : '' 
                                                        }}</p>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="row col-12">
                                                @if ($loan->user->uploads->where('name', 'bankstatement')->isNotEmpty())
                                                    <div class="col-3">
                                                        <a href="{{ 'public/'.Storage::url($loan->user->uploads->where('name', 'bankstatement')->first()->path) }}"  class="open-modal" data-toggle="modal" data-target="#fileModal" data-file-url="{{ 'public/'.Storage::url($loan->user->uploads[0]->path) }}">
                                                            <img width="90" src="{{ asset('public/mfs/admin/assets/media/svg/files/pdf.svg') }}">
                                                        </a>
                                                        <p class="file-list">Bank Statement uploaded on 
                                                            {{ 
                                                                $loan->user->uploads != null ?
                                                                $loan->user->uploads->where('name', 'bankstatement')->first()->created_at->toFormattedDateString() : '' 
                                                            }}
                                                        </p>
                                                    </div>
                                                @endif
                                                @if ($loan->user->uploads->where('name', 'payslip_file')->isNotEmpty())
                                                    <div class="col-3">
                                                        <a href="{{ 'public/'.Storage::url($loan->user->uploads->where('name', 'payslip_file')->first()->path) }}"  class="open-modal" data-toggle="modal" data-target="#fileModal" data-file-url="{{ 'public/'.Storage::url($loan->user->uploads[0]->path) }}">
                                                            <img width="90" src="{{ asset('public/mfs/admin/assets/media/svg/files/pdf.svg') }}">
                                                        </a>
                                                        <p class="file-list">Payslip uploaded on {{ 
                                                        $loan->user->uploads != null ?
                                                        $loan->user->uploads->where('name', 'payslip_file')->first()->created_at->toFormattedDateString() :''
                                                        }}</p>
                                                    </div>
                                                @endif
                                                @if ($loan->user->uploads->where('name', 'passport')->isNotEmpty())
                                                    <div class="col-3">
                                                        <a href="{{ 'public/'.Storage::url($loan->user->uploads->where('name', 'passport')->first()->path) }}"  class="open-modal" data-toggle="modal" data-target="#fileModal" data-file-url="{{ 'public/'.Storage::url($loan->user->uploads[0]->path) }}">
                                                            <img width="90" src="{{ asset('public/mfs/admin/assets/media/svg/files/pdf.svg') }}">
                                                        </a>
                                                        <p class="file-list">Passport Size photo uploaded on 
                                                            {{ 
                                                                $loan->user->uploads != null ? 
                                                                $loan->user->uploads->where('name', 'passport')->first()->created_at->toFormattedDateString() : '' 
                                                            }}</p>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
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
                                        class="table align-middle table-row-dashed fs-6 text-gray-100 fw-semibold gy-5"
                                        id="kt_table_customers_events">
                                        <tbody>
                                            <tr>
                                                <td class="min-w-400px">Invoice
                                                    <a href="#"
                                                        class="fw-bold text-gray-900 text-hover-primary me-1">#WER-45670</a>is
                                                    <span class="badge badge-light-info">In Progress</span>
                                                </td>
                                                <td class="pe-0 text-gray-100 text-end min-w-200px">10 Nov 2023,
                                                    10:30 am</td>
                                            </tr>
                                            <tr>
                                                <td class="min-w-400px">
                                                    <a href="#"
                                                        class="text-gray-100 text-hover-primary me-1">Melody
                                                        Macy</a>has made payment to
                                                    <a href="#"
                                                        class="fw-bold text-gray-900 text-hover-primary">#XRS-45670</a>
                                                </td>
                                                <td class="pe-0 text-gray-100 text-end min-w-200px">05 May 2023,
                                                    10:30 am</td>
                                            </tr>
                                            <tr>
                                                <td class="min-w-400px">Invoice
                                                    <a href="#"
                                                        class="fw-bold text-gray-900 text-hover-primary me-1">#LOP-45640</a>has
                                                    been
                                                    <span class="badge badge-light-danger">Declined</span>
                                                </td>
                                                <td class="pe-0 text-gray-100 text-end min-w-200px">15 Apr 2023,
                                                    6:43 am</td>
                                            </tr>
                                            <tr>
                                                <td class="min-w-400px">
                                                    <a href="#"
                                                        class="text-gray-100 text-hover-primary me-1">Max
                                                        Smith</a>has made payment to
                                                    <a href="#"
                                                        class="fw-bold text-gray-900 text-hover-primary">#SDK-45670</a>
                                                </td>
                                                <td class="pe-0 text-gray-100 text-end min-w-200px">19 Aug 2023,
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
                                                <td class="pe-0 text-gray-100 text-end min-w-200px">10 Nov 2023,
                                                    5:30 pm</td>
                                            </tr>
                                            <tr>
                                                <td class="min-w-400px">
                                                    <a href="#"
                                                        class="text-gray-100 text-hover-primary me-1">Brian
                                                        Cox</a>has made payment to
                                                    <a href="#"
                                                        class="fw-bold text-gray-900 text-hover-primary">#OLP-45690</a>
                                                </td>
                                                <td class="pe-0 text-gray-100 text-end min-w-200px">19 Aug 2023,
                                                    9:23 pm</td>
                                            </tr>
                                            <tr>
                                                <td class="min-w-400px">Invoice
                                                    <a href="#"
                                                        class="fw-bold text-gray-900 text-hover-primary me-1">#LOP-45640</a>has
                                                    been
                                                    <span class="badge badge-light-danger">Declined</span>
                                                </td>
                                                <td class="pe-0 text-gray-100 text-end min-w-200px">24 Jun 2023,
                                                    10:10 pm</td>
                                            </tr>
                                            <tr>
                                                <td class="min-w-400px">
                                                    <a href="#"
                                                        class="text-gray-100 text-hover-primary me-1">Max
                                                        Smith</a>has made payment to
                                                    <a href="#"
                                                        class="fw-bold text-gray-900 text-hover-primary">#SDK-45670</a>
                                                </td>
                                                <td class="pe-0 text-gray-100 text-end min-w-200px">25 Jul 2023,
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
                                                <td class="pe-0 text-gray-100 text-end min-w-200px">25 Jul 2023,
                                                    8:43 pm</td>
                                            </tr>
                                            <tr>
                                                <td class="min-w-400px">
                                                    <a href="#"
                                                        class="text-gray-100 text-hover-primary me-1">Melody
                                                        Macy</a>has made payment to
                                                    <a href="#"
                                                        class="fw-bold text-gray-900 text-hover-primary">#XRS-45670</a>
                                                </td>
                                                <td class="pe-0 text-gray-100 text-end min-w-200px">25 Oct 2023,
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
                                            class="table align-middle table-row-dashed fw-semibold text-gray-100 fs-6 gy-5"
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
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>