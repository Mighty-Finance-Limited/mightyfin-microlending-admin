<div class="content">
    <div class="col">
        <div class="px-8 col-12">
            <div class="bg-transparent page-title-box">
                <div class="page-title-right">
                    <ol class="m-0 breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Loan Calculator</li>
                    </ol>
                </div>
                <h4 class="text-primary font-weight-bold">Loan Calculator</h4>
            </div>
        </div>
    </div>
    <div class="mx-8">
        @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    </div>
    <!-- Amortization Table (when available) -->
    <div class="px-8">
        @if ($amortization_table)
            <div class="mt-4 overflow-hidden shadow-lg rounded-xl">
                <div class="px-6 py-4 bg-primary">
                    <h3 class="flex items-center text-lg font-semibold text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar3" viewBox="0 0 16 16">
                            <path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2M1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857z"/>
                            <path d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/>
                          </svg>
                        Repayment Schedule
                    </h3>
                </div>
                <div class="bg-white border-b border-gray-200">
                    <div class="overflow-x-auto">
                        <table class="table col-lg-12 table-condensed">
                            <thead class="text-white bg-gray-800">
                                <tr>
                                    <th class="px-6 py-4 text-sm font-semibold text-left">#</th>
                                    <th class="px-6 py-4 text-sm font-semibold text-left">Principal Amount</th>
                                    <th class="px-6 py-4 text-sm font-semibold text-left">Interest Amount</th>
                                    <th class="px-6 py-4 text-sm font-semibold text-left">Installment Amount</th>
                                    <th class="px-6 py-4 text-sm font-semibold text-left">Principal Balance</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($amortization_table as $index => $row)
                                    <tr class="hover:bg-gray-50 {{ $index % 2 == 0 ? 'bg-gray-50' : 'bg-white' }}">
                                        <td class="px-6 py-4 border-t border-gray-100">
                                            <span class="px-2 py-1 text-xs font-medium text-blue-800 bg-blue-100 rounded-full">{{ $index + 1 }}</span>
                                        </td>
                                        <td class="px-6 py-4 font-mono text-right border-t border-gray-100 fw-bold">K{{ number_format($row['principal'], 2) }}</td>
                                        <td class="px-6 py-4 font-mono text-right border-t border-gray-100 fw-bold">K{{ number_format($row['interest'], 2) }}</td>
                                        <td class="px-6 py-4 font-mono text-right border-t border-gray-100 fw-bold">K{{ number_format($row['installment'], 2) }}</td>
                                        <td class="px-6 py-4 font-mono text-right border-t border-gray-100 fw-bold">K{{ number_format($row['balance'], 2) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <div class="post d-flex flex-column-fluid" id="kt_post">
        <form wire:submit.prevent="calculateLoan()" id="kt_content_container" class="container-xxl">
            <div class="border-0 cursor-pointer card-header">
                <div class="mt-2 alert alert-primary d-flex align-items-center">
                    <i class="ki-duotone ki-information-5 fs-2 me-2">
                        <span class="path1"></span>
                        <span class="path2"></span>
                        <span class="path3"></span>
                    </i>
                    <small>
                        You can use this page to calculate the loan value in case of customer inquiries. To add a loan into the system, visit Loans(left menu) → <a href="{{ route('new-loan') }}" class="fw-bold">Add Loan</a>.
                    </small>
                </div>
            </div>

            <div class="mb-5 shadow-sm card mb-xl-10">
                <!-- Loan Product Selection -->
                <div class="px-10 py-4 mb-3 row bg-light">
                    <label class="col-lg-4 col-form-label required fw-bold fs-6">Loan Product</label>
                    <div class="col-lg-8 fv-row">
                        <div class="input-group input-group-solid">
                            <span class="input-group-text bg-primary">
                                <i class="text-white ki-duotone ki-briefcase fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </span>
                            <select wire:model.lazy="loan_product_id" class="form-select form-select-solid" wire:change="prefillLoanProductValues" required>
                                <option value="">-- Select Loan Product --</option>
                                @forelse ($this->get_all_loan_products() as $lp)
                                    <option {{ $loan->loan_product_id == $lp->id ? 'selected':'' }} value="{{ $lp->id }}">{{ $lp->name }}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Principal Section -->
                <div class="py-2 border-0 card-header bg-gradient-primary" role="button" data-bs-toggle="collapse" data-bs-target="#principal_section">
                    <div class="m-0 card-title d-flex align-items-center text-primary">
                        <span class="badge badge-light-danger badge-circle fw-bold fs-5 me-3">1</span>
                        <h3 class="m-0 text-primary fw-bold">Principal</h3>
                    </div>
                </div>

                <div id="principal_section" class="collapse show">
                    <div class="card-body p-9 bg-light-primary">
                        <div class="mb-6 row">
                            <label class="col-lg-4 col-form-label required fw-bold fs-6">Principal Amount</label>
                            <div class="col-lg-8 fv-row">
                                <div class="input-group input-group-solid">
                                    <span class="input-group-text">
                                        <i class="text-dark ki-duotone ki-dollar fs-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </span>
                                    <input type="text" wire:model.lazy="principal" class="form-control form-control-solid" placeholder="0.00" required/>
                                </div>
                            </div>
                        </div>

                        <div class="mb-6 row">
                            <label class="col-lg-4 col-form-label required fw-bold fs-6">Loan Release Date</label>
                            <div class="col-lg-8 fv-row">
                                <div class="input-group input-group-solid">
                                    <span class="input-group-text">
                                        <i class="text-dark ki-duotone ki-calendar fs-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </span>
                                    <input type="text" id="release_date_picker" wire:model.lazy="release_date" class="form-control form-control-solid" placeholder="Select date" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Interest Section -->
                <div class="py-2 border-0 card-header bg-gradient-primary" role="button" data-bs-toggle="collapse" data-bs-target="#interest_section">
                    <div class="m-0 card-title d-flex align-items-center">
                        <span class="badge badge-light-danger badge-circle fw-bold fs-5 me-3">2</span>
                        <h3 class="m-0 text-primary fw-bold">Interest</h3>
                    </div>
                </div>

                <div id="interest_section" class="collapse show">
                    <div class="card-body p-9 bg-light-primary">
                        <div class="mb-6 row">
                            <label class="col-lg-4 col-form-label required fw-bold fs-6">Interest Method</label>
                            <div class="col-lg-8 fv-row">
                                <div class="input-group input-group-solid">
                                    <span class="input-group-text">
                                        <i class="text-dark ki-duotone ki-chart-line fs-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </span>
                                    <select wire:model.lazy="loan_interest_method" class="form-select form-select-solid">
                                        @forelse ($interest_methods as $option)
                                            <option value="{{ $option->name }}">{{ $option->name }}</option>
                                        @empty
                                            <span>No Methods</span>
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="mb-6 row">
                            <label class="col-lg-4 col-form-label fw-bold fs-6">
                                <span class="required">Interest Type</span>
                                <i class="text-dark ms-1 ki-duotone ki-information-5 fs-6" data-bs-toggle="tooltip" title="Select the type of interest calculation"></i>
                            </label>
                            <div class="col-lg-8 fv-row">
                                <div class="flex-wrap gap-5 pt-2 d-flex">
                                    @forelse ($interest_types as $option)
                                        <label class="form-check form-check-custom form-check-solid">
                                            <input class="form-check-input" wire:model.lazy="loan_interest_type" type="radio" value="{{ $option->id }}" />
                                            <span class="form-check-label fw-semibold ps-2">{{ $option->description }}</span>
                                        </label>
                                    @empty
                                    @endforelse
                                </div>
                            </div>
                        </div>

                        <div class="mb-6 row">
                            <label class="col-lg-4 col-form-label fw-bold fs-6">Loan Interest</label>
                            <div class="col-lg-8 fv-row">
                                <div class="row">
                                    <div class="col-lg-7">
                                        <div class="input-group input-group-solid">
                                            <span class="input-group-text">
                                                <i class="text-dark ki-duotone ki-percentage fs-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </span>
                                            <input type="text" wire:model.lazy="loan_interest_value" class="form-control form-control-solid" placeholder="%" required/>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <select wire:model.lazy="loan_interest_period" class="form-select form-select-solid">
                                            <option value="per-day">Per Day</option>
                                            <option value="per-week">Per Week</option>
                                            <option value="per-month" selected>Per Month</option>
                                            <option value="per-year">Per Year</option>
                                            <option value="per-loan">Per Loan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Duration Section -->
                <div class="py-2 border-0 card-header bg-gradient-primary" role="button" data-bs-toggle="collapse" data-bs-target="#duration_section">
                    <div class="m-0 card-title d-flex align-items-center">
                        <span class="badge badge-light-danger badge-circle fw-bold fs-5 me-3">3</span>
                        <h3 class="m-0 text-primary fw-bold">Duration</h3>
                    </div>
                </div>

                <div id="duration_section" class="collapse show">
                    <div class="card-body p-9 bg-light-primary">
                        <div class="mb-6 row">
                            <label class="col-lg-4 col-form-label fw-bold fs-6">Loan Duration Period</label>
                            <div class="col-lg-8 fv-row">
                                <div class="row">
                                    <div class="col-lg-7">
                                        <div class="input-group input-group-solid">
                                            <button class="btn btn-icon btn-light-warning" type="button" wire:click="decreaseDurationValue">
                                                <i class="ki-duotone ki-minus fs-2"></i>
                                            </button>
                                            <input type="text" wire:model.lazy="loan_duration_value" class="text-center form-control form-control-solid" required>
                                            <button class="btn btn-icon btn-light-warning" type="button" wire:click="increaseDurationValue">
                                                <i class="ki-duotone ki-plus fs-2"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <select wire:model.lazy="loan_duration_period" wire:change="updateLoanDurationPeriod" class="form-select form-select-solid">
                                            <option value="day" selected>Days</option>
                                            <option value="week">Weeks</option>
                                            <option value="month">Month</option>
                                            <option value="year">Years</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Repayments Section -->
                <div class="py-2 border-0 card-header bg-gradient-primary" role="button" data-bs-toggle="collapse" data-bs-target="#repayments_section">
                    <div class="m-0 card-title d-flex align-items-center">
                        <span class="badge badge-light-danger badge-circle fw-bold fs-5 me-3">4</span>
                        <h3 class="m-0 text-primary fw-bold">Repayments</h3>
                    </div>
                </div>

                <div id="repayments_section" class="collapse show">
                    <div class="card-body p-9 bg-light-primary">
                        <div class="mb-6 row">
                            <label class="col-lg-4 col-form-label required fw-bold fs-6">Repayment Cycle</label>
                            <div class="col-lg-8 fv-row">
                                <div class="input-group input-group-solid">
                                    <span class="input-group-text">
                                        <i class="text-dark ki-duotone ki-repeat fs-2">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i>
                                    </span>
                                    <select wire:model.lazy="loan_repayment_cycle" wire:change="updateLoanDurationPeriod" class="form-select form-select-solid">
                                        @foreach ($repayment_cycles as $option)
                                            <option value="{{ $option->name }}">{{ $option->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="mb-6 row">
                            <label class="col-lg-4 col-form-label required fw-bold fs-6">Number of Repayments</label>
                            <div class="col-lg-8 fv-row">
                                <div class="input-group input-group-solid" style="max-width: 200px;">
                                    <button class="btn btn-icon btn-light-warning" type="button" wire:click="decreaseRepayments">
                                        <i class="ki-duotone ki-minus fs-2"></i>
                                    </button>
                                    <input type="text" wire:model.lazy="minimum_num_of_repayments" class="text-center form-control form-control-solid" placeholder="1">
                                    <button class="btn btn-icon btn-light-warning" type="button" wire:click="increaseRepayments">
                                        <i class="ki-duotone ki-plus fs-2"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="py-2 card-footer d-flex justify-content-end px-9 bg-light">
                    <button id="kt_account_deactivate_account_submit" type="submit" class="btn btn-primary btn-lg">
                        <i class="text-dark ki-duotone ki-calculator fs-2 me-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                        Calculate Loan
                    </button>
                </div>
            </div>
        </form>
    </div>

    <script>
        // Function to scroll to the top of the page
        function scrollToTop() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        // Add an event listener to the submit button
        document.getElementById('kt_account_deactivate_account_submit').addEventListener('click', function() {
            // Scroll to the top when the button is clicked
            scrollToTop();
        });

        // Initialize tooltips
        document.addEventListener('DOMContentLoaded', function() {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            });
        });
    </script>
</div>
