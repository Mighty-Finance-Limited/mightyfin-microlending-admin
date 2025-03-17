<div class="content d-flex flex-column flex-column-fluid" id="kt_content">

    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Layout-->
            <div class="d-flex flex-column flex-xl-row">
               @include('livewire.dashboard.loans.__stages.processing.ui.approval-side-menu')

                <div class="ms-lg-15">
                    <!-- Enhanced Navigation Tabs -->
                    <div class="d-flex">
                        <div class="loan-tabs-container">
                            <nav class="loan-tabs">
                                <div class="loan-tab active" data-bs-toggle="tab" href="#kt_customer_view_overview_tab">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="loan-tab-icon">
                                        <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                                    </svg>
                                    <span class="loan-tab-text">Amortization Schedule</span>
                                </div>

                                <div class="loan-tab" data-bs-toggle="tab" href="#kt_customer_view_overview_loan_details">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="loan-tab-icon">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <line x1="12" y1="16" x2="12" y2="12"></line>
                                        <line x1="12" y1="8" x2="12.01" y2="8"></line>
                                    </svg>
                                    <span class="loan-tab-text">Loan Info</span>
                                </div>

                                <div class="loan-tab" data-kt-countup-tabs="true" data-bs-toggle="tab" href="#kt_customer_view_documents">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="loan-tab-icon">
                                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                        <polyline points="14 2 14 8 20 8"></polyline>
                                        <line x1="16" y1="13" x2="8" y2="13"></line>
                                        <line x1="16" y1="17" x2="8" y2="17"></line>
                                        <polyline points="10 9 9 9 8 9"></polyline>
                                    </svg>
                                    <span class="loan-tab-text">Uploads</span>
                                </div>
                            </nav>
                        </div>

                        <div class="action-controls float-end">
                            @if ($this->my_review_status($loan->id) == 1)
                                @can('approve loan')
                                <button type="button" class="action-btn" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                                    <span class="action-btn-text">Actions</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="action-btn-icon">
                                        <polyline points="6 9 12 15 18 9"></polyline>
                                    </svg>
                                </button>
                                @endcan
                            @elseif (auth()->user()->hasRole('admin'))
                                <button type="button" class="action-btn" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                                    <span class="action-btn-text">Actions</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="action-btn-icon">
                                        <polyline points="6 9 12 15 18 9"></polyline>
                                    </svg>
                                </button>
                            @endif

                            <!-- Action Dropdown Menu -->
                            <div class="action-dropdown-menu" data-kt-menu="true">
                                <div class="action-dropdown-item" onclick="location.href='#'" data-bs-toggle="modal" data-bs-target="#kt_modal_review_rollback" wire:click="setLoanID({{$loan->id}})">
                                    <div class="action-icon bg-light-warning">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <polyline points="1 4 1 10 7 10"></polyline>
                                            <path d="M3.51 15a9 9 0 1 0 2.13-9.36L1 10"></path>
                                        </svg>
                                    </div>
                                    <div class="action-content">
                                        <span class="action-label">Rollback</span>
                                        <span class="action-description">Return to previous stage</span>
                                    </div>
                                </div>

                                <div class="action-dropdown-item" onclick="location.href='#'" data-bs-toggle="modal" data-bs-target="#kt_modal_decline_warning" wire:click="setLoanID({{$loan->id}})">
                                    <div class="action-icon bg-light-danger">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <line x1="18" y1="6" x2="6" y2="18"></line>
                                            <line x1="6" y1="6" x2="18" y2="18"></line>
                                        </svg>
                                    </div>
                                    <div class="action-content">
                                        <span class="action-label">Decline</span>
                                        <span class="action-description">Reject this loan application</span>
                                    </div>
                                </div>

                                <div class="action-dropdown-item" onclick="location.href='#'" wire:click="accept({{$loan->id}})">
                                    <div class="action-icon bg-light-success">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <polyline points="20 6 9 17 4 12"></polyline>
                                        </svg>
                                    </div>
                                    <div class="action-content">
                                        <span class="action-label">Approve</span>
                                        <span class="action-description">Approve this loan application</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="kt_customer_view_overview_tab" role="tabpanel">
                            <div class="card shadow-sm border-0 p-4 rounded">
                                <div class="card-header border-bottom pb-3">
                                    <h4 class="fw-bold mb-0 text-primary">Amortization Repayment Schedule</h4>
                                </div>
                            
                                <div class="card-body p-3">
                                    <div class="d-flex flex-wrap gap-3">
                                        <div class="w-100">
                                            <label class="form-label fw-semibold">Principal</label>
                                            <input type="number" class="form-control border-light shadow-sm" wire:model.defer="amo_principal" placeholder="{{$amo_principal}}">
                                        </div>
                                        <div class="w-100">
                                            <label class="form-label fw-semibold">Duration (Months)</label>
                                            <input type="number" class="form-control border-light shadow-sm" wire:model.defer="amo_duration" placeholder="{{$amo_duration}}">
                                        </div>
                                        <div class="mt-2">
                                            <button class="btn btn-primary px-4 py-2" wire:click="calculateAmoritization()" wire:loading.attr="disabled">
                                                <span wire:loading.remove>Submit</span>
                                                <span wire:loading class="spinner-border spinner-border-sm"></span>
                                            </button>
                                        </div>
                                    </div>
                            
                                    <!-- Loading Indicator -->
                                    <div class="text-center mt-3" wire:loading wire:target="calculateAmoritization()">
                                        <div class="spinner-border text-primary" role="status">
                                            <span class="visually-hidden">Calculating...</span>
                                        </div>
                                    </div>
                            
                                    <hr class="my-4">
                            
                                    <div class="table-responsive" wire:loading.remove>
                                        <table class="table table-hover table-bordered align-middle">
                                            <thead class="bg-light text-primary fw-bold">
                                                <tr>
                                                    <th>Month</th>
                                                    <th>Payment</th>
                                                    <th>Interest</th>
                                                    <th>Principal</th>
                                                    <th>Balance</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($amortizationSchedule as $payment)
                                                <tr>
                                                    <td>{{ $payment['month'] }}</td>
                                                    <td class="text-success">{{ number_format($payment['payment'], 2) }}</td>
                                                    <td class="text-danger">{{ number_format($payment['interest'], 2) }}</td>
                                                    <td>{{ number_format($payment['principal'], 2) }}</td>
                                                    <td class="fw-bold">{{ number_format($payment['balance'], 2) }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            
                        </div>

                        <!--begin:::Tab pane-->
                        <div class="tab-pane fade" id="kt_customer_view_overview_loan_details" role="tabpanel">

                            <div class="row g-5 g-xl-12">
                                <div class="col-xl-12">
                                    <div class="card shadow-sm border-0 p-4 rounded">
                                        <div class="card-body p-3">
                                            <div class="table-responsive">
                                                <table class="table table-borderless align-middle">
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-muted fw-semibold w-50">Amount</td>
                                                            <td class="text-gray-800 fw-bold">K{{ number_format($loan->amount, 2) }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted fw-semibold w-50">Loan Product</td>
                                                            <td class="text-gray-800">{{ $loan_product->name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted fw-semibold w-50">KYC</td>
                                                            <td>
                                                                @if($loan->complete == 1)
                                                                    <span class="badge bg-success p-2">Completed</span>
                                                                @else
                                                                    <span class="badge bg-danger p-2">Incomplete</span>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted fw-semibold w-50">Created On</td>
                                                            <td class="text-dark fw-bold">
                                                                {{ $loan->created_at->toFormattedDateString() }}
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    

                                    <br>
                                    <div class="card shadow-sm border-0 p-4 rounded">
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
                        </div>
                        <!--end:::Tab pane-->
                        <!--begin:::Tab pane-->
                        <div class="tab-pane fade" id="kt_customer_view_documents" role="tabpanel">
                            <!--begin::Earnings-->
                            <div class="card pt-4 mb-6 mb-xl-9">
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
    <style>
        /* World-Class Loan Actions and Navigation Styling */

/* Action Button and Menu */
.loan-actions-container {
    display: flex;
    justify-content: flex-end;
    margin-bottom: 2rem;
    position: relative;
}

.action-controls {
    position: relative;
}

.action-btn {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    background: linear-gradient(135deg, #4776E6 0%, #8E54E9 100%);
    color: white;
    border: none;
    border-radius: 0.5rem;
    padding: 0.75rem 1.5rem;
    font-weight: 600;
    font-size: 0.9rem;
    transition: all 0.2s ease;
    box-shadow: 0 4px 10px rgba(71, 118, 230, 0.2);
    cursor: pointer;
}

.action-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 15px rgba(71, 118, 230, 0.25);
}

.action-btn:active {
    transform: translateY(0);
}

.action-btn-text {
    padding-right: 0.25rem;
}

.action-dropdown-menu {
    position: absolute;
    top: calc(100% + 0.75rem);
    right: 0;
    width: 280px;
    background: white;
    border-radius: 0.75rem;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
    padding: 0.75rem;
    opacity: 0;
    visibility: hidden;
    transform: translateY(10px);
    transition: all 0.3s ease;
    z-index: 10;
    overflow: hidden;
}

.action-dropdown-menu.show {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}

.action-dropdown-item {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 0.875rem;
    border-radius: 0.5rem;
    cursor: pointer;
    transition: all 0.2s ease;
}

.action-dropdown-item:hover {
    background-color: #f9fafb;
}

.action-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 2.5rem;
    height: 2.5rem;
    border-radius: 0.5rem;
    flex-shrink: 0;
}

.action-icon svg {
    stroke-width: 2;
}

.bg-light-warning {
    background-color: rgba(255, 170, 0, 0.15);
    color: #FFAA00;
}

.bg-light-danger {
    background-color: rgba(255, 84, 84, 0.15);
    color: #FF5454;
}

.bg-light-success {
    background-color: rgba(46, 202, 106, 0.15);
    color: #2ECA6A;
}

.action-content {
    display: flex;
    flex-direction: column;
}

.action-label {
    font-weight: 600;
    font-size: 0.95rem;
    color: #1e293b;
    margin-bottom: 0.25rem;
}

.action-description {
    font-size: 0.8rem;
    color: #64748b;
}

/* Enhanced Tabs */
.loan-tabs-container {
    position: relative;
    margin-bottom: 2rem;
}

.loan-tabs {
    display: flex;
    gap: 1rem;
    padding-bottom: 0.25rem;
    border-bottom: 1px solid #e2e8f0;
    overflow-x: auto;
    scrollbar-width: none; /* Firefox */
    -ms-overflow-style: none; /* IE/Edge */
}

.loan-tabs::-webkit-scrollbar {
    display: none; /* Chrome, Safari, Opera */
}

.loan-tab {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.75rem 1rem;
    border-radius: 0.5rem 0.5rem 0 0;
    cursor: pointer;
    transition: all 0.2s ease;
    white-space: nowrap;
    position: relative;
    color: #64748b;
}

.loan-tab::after {
    content: '';
    position: absolute;
    bottom: -0.25rem;
    left: 0;
    width: 100%;
    height: 3px;
    background: transparent;
    transform: scaleX(0.7);
    transition: all 0.3s ease;
}

.loan-tab.active {
    color: #4776E6;
}

.loan-tab.active::after {
    background: linear-gradient(90deg, #4776E6 0%, #8E54E9 100%);
    transform: scaleX(1);
}

.loan-tab:hover {
    color: #4776E6;
}

.loan-tab-icon {
    opacity: 0.8;
}

.loan-tab.active .loan-tab-icon {
    opacity: 1;
}

.loan-tab-text {
    font-weight: 600;
    font-size: 0.9rem;
}

/* Responsive Design */
@media (max-width: 768px) {
    .loan-tabs {
        gap: 0.5rem;
    }

    .loan-tab {
        padding: 0.625rem 0.75rem;
    }

    .loan-tab-text {
        font-size: 0.8rem;
    }
}
    </style>

<script>
    document.addEventListener("DOMContentLoaded", function () {
    const tabs = document.querySelectorAll(".loan-tab");
    const tabContents = document.querySelectorAll(".tab-pane");

    tabs.forEach(tab => {
        tab.addEventListener("click", function () {
            // Remove active class from all tabs
            tabs.forEach(t => t.classList.remove("active"));

            // Add active class to the clicked tab
            this.classList.add("active");

            // Get target tab content ID
            const targetId = this.getAttribute("href");

            // Hide all tab contents
            tabContents.forEach(content => content.classList.remove("show", "active"));

            // Show the selected tab content
            document.querySelector(targetId).classList.add("show", "active");
        });
    });
});

</script>
</div>
