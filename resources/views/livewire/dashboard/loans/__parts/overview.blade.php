<div class="tabs-content" id="repayments_tablet">
    <div class="flex-wrap mb-6 d-flex flex-stack">
        <h3 class="my-2 fw-bolder">
            <i class="ki-duotone ki-dollar-circle fs-1 me-2 text-primary">
                <span class="path1"></span>
                <span class="path2"></span>
            </i>
            Repayment Details
        </h3>
        <div class="d-flex align-items-center">
        </div>
    </div>

    <!-- Repayment Cards -->
    <div class="row g-6 g-xl-9">
        <div class="col-md-6 col-xl-4">
            <a href="#" class="shadow-sm card border-hover-primary h-100 rounded-3">
                <div class="card-body p-9">
                    <div class="d-flex flex-column">
                        {{-- <div class="mb-2 d-flex align-items-center">
                            <span class="badge badge-light-primary fs-7 fw-bold me-2">MONTHLY</span>
                            <span class="text-gray-500 fs-7">Next Payment: Mar 30, 2025</span>
                        </div> --}}
                        <p class="mt-1 text-gray-800 fw-bold fs-3 mb-7">Monthly Repayment</p>
                        <div class="flex-wrap mb-5 d-flex">
                            <div class="px-3 py-2 mb-2 border border-gray-300 border-dashed rounded me-3">
                                <div class="text-gray-700 fs-6 fw-bold">K{{ number_format(App\Models\Application::monthInstallment($loan),2,'.',',') }}</div>
                                <div class="text-gray-500 fw-semibold">Amount Due</div>
                            </div>
                            {{-- <div class="px-3 py-2 mb-2 border border-gray-300 border-dashed rounded">
                                <div class="text-gray-700 fs-6 fw-bold">6 of 12</div>
                                <div class="text-gray-500 fw-semibold">Payments Made</div>
                            </div> --}}
                        </div>
                        <div class="progress h-8px bg-light-primary">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-6 col-xl-4">
            <a href="#" class="shadow-sm card border-hover-success h-100 rounded-3">
                <div class="card-body p-9">
                    <div class="d-flex flex-column">
                        {{-- <div class="mb-2 d-flex align-items-center">
                            <span class="badge badge-light-success fs-7 fw-bold me-2">COMPLETED</span>
                            <span class="text-gray-500 fs-7">Last Payment: Feb 28, 2025</span>
                        </div> --}}
                        <p class="mt-1 text-gray-800 fw-bold fs-3 mb-7">Interest & Fees</p>
                        <div class="flex-wrap mb-5 d-flex">
                            <div class="px-3 py-2 mb-2 border border-gray-300 border-dashed rounded me-3">
                                {{-- <div class="text-gray-700 fs-6 fw-bold">K125.00</div> --}}
                                <div class="text-gray-700 fs-6 fw-bold">{{ App\Models\Application::interest_rate($loan_product->id) }}</div>
                                <div class="text-gray-500 fw-semibold">Interest Rate</div>
                            </div>
                            <div class="px-3 py-2 mb-2 border border-gray-300 border-dashed rounded">
                                <div class="text-gray-700 fs-6 fw-bold">{{ App\Models\Application::service_charge($loan) }}%</div>
                                <div class="text-gray-500 fw-semibold">Processing Fee</div>
                            </div>
                        </div>
                        {{-- <div class="d-flex align-items-center text-success">
                            <i class="ki-duotone ki-check-circle fs-2 me-2"></i>
                            <div class="fs-6 fw-bold">All fees paid in full</div>
                        </div> --}}
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-6 col-xl-4">
            <a href="#" class="shadow-sm card border-hover-warning h-100 rounded-3">
                <div class="card-body p-9">
                    <div class="d-flex flex-column">
                        <div class="mb-2 d-flex align-items-center">
                            <span class="badge badge-light-warning fs-7 fw-bold me-2">OVERVIEW</span>
                            <span class="text-gray-500 fs-7">Term: {{ $loan->repayment_plan }} months</span>
                        </div>
                        <p class="mt-1 text-gray-800 fw-bold fs-3 mb-7">Loan Summary</p>
                        <div class="flex-wrap mb-5 d-flex">
                            <div class="px-3 py-2 mb-2 border border-gray-300 border-dashed rounded me-3">
                                <div class="text-gray-700 fs-6 fw-bold">K{{ number_format(App\Models\Application::paidOnLoan($loan->id), 2, '.', ',') }}</div>
                                <div class="text-gray-500 fw-semibold">Total Paid</div>
                            </div>
                            <div class="px-3 py-2 mb-2 border border-gray-300 border-dashed rounded">
                                <div class="text-gray-700 fs-6 fw-bold">K{{ number_format(App\Models\Application::loan_balance($loan->id), 2, '.', ',') }}</div>
                                <div class="text-gray-500 fw-semibold">Remaining</div>
                            </div>
                        </div>
                        {{-- <div class="d-flex align-items-center">
                            <i class="ki-duotone ki-calendar-tick fs-2 me-2 text-warning"></i>
                            <div class="text-gray-700 fs-6 fw-bold">Expected completion: Mar 2026</div>
                        </div> --}}
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
