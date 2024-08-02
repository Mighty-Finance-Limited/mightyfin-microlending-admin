<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl">
            <div class="d-flex flex-column flex-xl-row">
                <div class="flex-column flex-lg-row-auto w-100 w-xl-350px mb-10">
                    <div class="card mb-5 mb-xl-8">
                        <div class="card-body pt-15">
                            <div class="d-flex flex-center flex-column mb-5">

                                <div class="fs-3 text-gray-800 text-hover-primary fw-bold mb-1">
                                    <h1 class="text-primary font-bold">Financial Risk</h1>
                                </div>
                                
                                <div class="symbol symbol-100px symbol-circle mb-7">
                                    @if ($loan->user->profile_photo_path)
                                        <img src="{{ '../public/'.Storage::url($loan->user->profile_photo_path) }}" alt=""/>
                                    @else
                                        <img src="https://thumbs.dreamstime.com/b/default-avatar-profile-image-vector-social-media-user-icon-potrait-182347582.jpg" alt=""/>
                                    @endif
                                </div>
                                <a href="#" class="fs-3 text-gray-800 text-hover-primary fw-bold mb-1">
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
                                            <div class="fw-semibold text-muted">Principle<br>Amount</div>
                                        </div>
                                        <div class="col-lg-4 border border-gray-300 border-dashed rounded py-3 px-3 mx-4 m-3">
                                            <div class="fs-4 fw-bold text-gray-700">
                                                <span class="w-50px">{{ $loan->repayment_plan ?? 1}} (Months)</span>
                                                <i class="ki-duotone ki-usd fs-3 text-danger">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </div>
                                            <div class="fw-semibold text-muted">Loan Duration</div>
                                        </div>
                                        <div class="col-lg-4 bg-info text-white border border-gray-300 border-dashed rounded py-3 px-3 mx-4 m-3">
                                            <div class="fs-4 fw-bold text-gray-700">
                                                <span class="w-50px text-white">K {{ App\Models\Application::payback($loan->amount, $loan->repayment_plan, $loan_product->id) }}</span>
                                                <i class="ki-duotone ki-usd fs-3 text-danger">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </div>
                                            <div class="fw-semibold text-muted">Total <br> Repayment</div>
                                        </div>
                                        <div class="col-lg-4 border border-gray-300 border-dashed rounded py-3 px-3 mx-4 m-3">
                                            <div class="fs-4 fw-bold text-gray-700">
                                                <span class="w-50px text-warning">K {{ App\Models\Application::monthly_installment($loan->amount, $loan->repayment_plan) }}</span>
                                                <i class="ki-duotone ki-usd fs-3 text-danger">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </div>
                                            <div class="fw-semibold text-info">Monthly<br>Repayment</div>
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
                                    <div class="text-gray-600">ID-{{$loan->user->id}} </div>
                                    <div class="fw-bold mt-5">Gender</div>
                                    <div class="text-gray-600">{{ ucwords($loan->gender) }}</div>
                                    <div class="fw-bold mt-5">Email</div>
                                    <div class="text-gray-600">
                                        <a href="mailto:{{$loan->user->email}}"
                                            class="text-gray-600 text-hover-primary">{{ $loan->user->email ?? 'Not set'}}</a>
                                    </div>
                                    <div class="fw-bold mt-5">Address</div>
                                    <div class="text-gray-600">
                                        {{ $loan->user->address ?? 'Not set'}}
                                    </div>
                                    <div class="fw-bold mt-5">Phone</div>
                                    <div class="text-gray-600">+260{{ $loan->phone ?? ' --' }}</div>
                                    <div class="fw-bold mt-5">Interest Rate</div>
                                    <div class="text-gray-600">{{ App\Models\Application::interest_rate($loan_product->id) }}</div>
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
                                {{-- <div class="menu-item px-5">
                                    <a href="#" wire:click="accept({{$loan->id}})" class="menu-link px-5"> Approve </a>
                                </div> --}}
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
                    
                    <div class="tab-content" id="myTabContent">
                        <!--begin:::Tab pane-->
                        <div class="tab-pane fade show active" id="kt_customer_view_overview_tab"
                            role="tabpanel">
                            <!--begin::Card-->
                            
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
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>