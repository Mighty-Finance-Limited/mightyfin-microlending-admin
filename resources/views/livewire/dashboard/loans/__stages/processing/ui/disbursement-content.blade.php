<div class="ms-lg-15">
    <!-- Enhanced Navigation Tabs -->
    <div class="d-flex">
        <div class="loan-tabs-container">
            <nav class="loan-tabs">
                {{-- <div class="loan-tab active" data-bs-toggle="tab" href="#kt_customer_view_overview_tab">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="loan-tab-icon">
                        <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                    </svg>
                    <span class="loan-tab-text">CRB Checks & Assessments</span>
                </div> --}}

                <div class="loan-tab active" data-bs-toggle="tab" href="#kt_customer_view_overview_risk">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="loan-tab-icon">
                        <polygon points="12 2 22 20 2 20"></polygon>
                        <line x1="12" y1="9" x2="12" y2="13"></line>
                        <line x1="12" y1="17" x2="12.01" y2="17"></line>
                    </svg>
                    <span class="loan-tab-text">Risk Assessments</span>
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

                <div class="action-dropdown-item btnclicky" onclick="location.href='#'" wire:click="accept({{$loan->id}}, 'disburse')">
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
        <div class="tab-pane fade" id="kt_customer_view_overview_tab" role="tabpanel">
            <div class="card shadow-sm border-0 p-4 rounded">
                <div class="card-header border-bottom pb-3">
                    <h4 class="fw-bold mb-0 text-primary">Check CRB information</h4>
                </div>

                <div class="card-body p-3">
                    <div class="pt-0">
                        <div class="py-0" data-kt-customer-payment-method="row">
                            <div id="kt_customer_view_payment_method_1"
                                 class="collapse show fs-6 ps-10"
                                 data-bs-parent="#kt_customer_view_payment_method">
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">CRB Product</label>

                                <select type="text" wire:model.lazy="code"
                                        class="form-control form-control-lg form-control-solid"
                                        placeholder="" required>

                                    <option value="s">Sample</option>
                                    @forelse ($crb_selected_products as $item)
                                    <option value="{{ $item->crb_product->name }}">{{ $item->crb_product->name }}</option>
                                    @empty
                                    <option value="">None</option>
                                    @endforelse
                                </select>
                                <br>
                                <!-- Show loading spinner while the action is processing -->
                                <button class="btn btn-primary" wire:click="CheckCRB()" wire:loading.attr="disabled">
                                    <span wire:loading.remove>Submit</span>
                                    <span wire:loading>Loading...</span>
                                </button>
                                <!-- Preloader icon to display while the action is processing -->
                                <div wire:loading wire:target="CheckCRB()">
                                    <div class="spinner-border text-primary" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="px-10 mt-10">
                            @if(isset($crb_results['values']) && count($crb_results['values']) > 0)
                                <div>
                                    <h6 class="text-muted">Result Information</h6>
                                    <hr>
                                    <h6>
                                        @switch($crb_results['values'][5]['value'])
                                            @case(200)
                                                Product request processed successfully
                                                @break
                                            @case(202)
                                                Credit Reference Number not found
                                                @break
                                            @case(203)
                                                Multiple Credit Reference Number Found
                                                @break
                                            @case(204)
                                                Invalid report reason
                                            @break
                                            @default

                                        @endswitch
                                    </h6>
                                </div>
                                <br>
                                <br>
                                <h6 class="text-muted">More Details</h6>
                                <hr>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th><b>Element</b></th>
                                        <th><b>Status</b></th>
                                        <th><b>Code</b></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($crb_results['values'] as $value)
                                        <tr>
                                            <td>{{ $value['tag'] }}</td>
                                            <td>{{ $value['type'] }}</td>
                                            <td>{{ $value['value'] }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @else
                                <p>No CRB results available.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="tab-pane fade" id="kt_customer_view_overview_risk" role="tabpanel">

            <div class="row g-5 g-xl-12">
                <div class="col-xl-12">
                    <div class="card shadow-sm border-0 p-4 rounded">

                        <div class="card-header border-bottom pb-3">
                            <h4 class="fw-bold mb-0 text-primary">Loan Risk Assessment</h4>
                        </div>
                        <div class="card-body p-3">
                            <div class="py-0">
                                <div id="kt_customer_view_payment_method_1" class="collapse show fs-6 ps-10" data-bs-parent="#kt_customer_view_payment_method">
                                    <div class="d-flex gap-10 flex-wrap py-5">
                                        <div class="w-full">
                                            <span class="font-bold"><b>Debt Ratio (%)</b></span>
                                            <input type="number" value="40" class="form-control" placeholder="{{$debt_ratio}}" id="debt_ratio">
                                        </div>

                                        <div class="w-full">
                                            <span class="font-bold"><b>Gross Pay</b></span>
                                            <input type="number" class="form-control" placeholder="{{$gross_pay}}" id="gross_pay">
                                        </div>

                                        <div class="w-full">
                                            <span class="font-bold"><b>Net Pay</b></span>
                                            <input type="number" class="form-control" placeholder="{{$net_pay}}" id="net_pay">
                                        </div>

                                        <div class="w-full">
                                            <span>Results</span>
                                            <input type="text" disabled class="form-control" placeholder="{{$result_amount}}" id="result_amount">
                                        </div>
                                    </div>
                                    <button id="calculateRisk" class="btn btn-sm btn-primary">Check</button>
                                </div>
                            </div>
                        </div>
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
                                        {{-- <tr>
                                            <td class="text-muted fw-semibold w-50">KYC</td>
                                            <td>
                                                @if($loan->complete == 1)
                                                    <span class="badge bg-success p-2">Completed</span>
                                                @else
                                                    <span class="badge bg-danger p-2">Incomplete</span>
                                                @endif
                                            </td>
                                        </tr> --}}
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

                    <div class="">
                        <h6 class="mb-3 fw-semibold text-warning text-uppercase">Uploaded Attachments</h6>
                        <div class="gap-2 p-4 d-flex">
                            <!-- end col -->
                            @php
                                function getFileUrl($upload) {
                                    return $upload->source === 'admin'
                                        ? url('public/' . Storage::url($upload->path))
                                        : 'https://localhost/mfs-admin/public/' . Storage::url($upload->path);
                                }

                                function renderFileBlock($upload, $label, $user) {
                                    return '
                                        <a target="_blank" href="' . getFileUrl($upload) . '" class="open-modal" data-toggle="modal" data-target="#fileModal" data-file-url="public/' . Storage::url($upload->path) . '">
                                            <div class="col-md-2">
                                                <div class="p-2 border border-dashed rounded">
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-shrink-0 me-3">
                                                            <div class="avatar-sm">
                                                                <div class="rounded avatar-title bg-light text-primary fs-24">
                                                                    <i class="ri-file-ppt-2-line"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="overflow-hidden flex-grow-1">
                                                            <h5 class="mb-1 fs-13">
                                                                <a href="#" class="text-body text-truncate d-block">' . $user->fname . ' ' . $user->lname . '\'s ' . $label . '</a>
                                                            </h5>
                                                            <div>' . $upload->created_at->toFormattedDateString() . '</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>';
                                }
                            @endphp

                            @if ($loan?->user?->uploads?->where('name', 'nrc_file')->isNotEmpty())
                                {!! renderFileBlock($loan->user->uploads->where('name', 'nrc_file')->first(), 'NRC Front', $loan->user) !!}
                            @endif

                            @if ($loan?->user?->uploads?->where('name', 'nrc_b_file')->isNotEmpty())
                                {!! renderFileBlock($loan->user->uploads->where('name', 'nrc_b_file')->first(), 'NRC Back', $loan->user) !!}
                            @endif

                            @if ($loan?->user?->uploads?->where('name', 'tpin_file')->isNotEmpty())
                                {!! renderFileBlock($loan->user->uploads->where('name', 'tpin_file')->first(), 'TPIN', $loan->user) !!}
                            @endif

                            @if ($loan?->user?->uploads?->where('name', 'payslip_file')->isNotEmpty())
                                {!! renderFileBlock($loan->user->uploads->where('name', 'payslip_file')->first(), 'Payslip', $loan->user) !!}
                            @endif

                            @if ($loan->user->uploads->where('name', 'bankstatement')->isNotEmpty())
                                {!! renderFileBlock($loan->user->uploads->where('name', 'bankstatement')->first(), 'Bank Statement', $loan->user) !!}
                            @endif

                            <!-- end col -->
                        </div>
                        <!-- end row -->
                    </div>
                </div>

            </div>
        </div>
        <!--end:::Tab pane-->
    </div>
    <!--end:::Tab content-->
</div>