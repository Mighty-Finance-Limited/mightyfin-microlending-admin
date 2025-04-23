<div class="ms-lg-15">
    <div class="d-flex">
        <div class="loan-tabs-container">
            <nav class="loan-tabs">
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
            <div class="p-4 border-0 rounded shadow-sm card">
                <div class="pb-3 card-header border-bottom">
                    <h4 class="mb-0 fw-bold text-primary">Check CRB information</h4>
                </div>

                <div class="p-3 card-body">
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

        <div class="tab-pane fade show active" id="kt_customer_view_overview_risk" role="tabpanel">
            <div class="row g-5 g-xl-12">
                <div class="col-xl-12">
                    <style>
                        :root {
                            --primary-color: #6a3093;
                            --primary-hover: #6a3093;
                            --secondary-color: #64748b;
                            --light-bg: #f8fafc;
                            --border-radius: 10px;
                            --box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
                        }

                        body {
                            background-color: #f1f5f9;
                            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                        }

                        .card {
                            border-radius: var(--border-radius);
                            box-shadow: var(--box-shadow);
                            border: none;
                            background: white;
                        }

                        .card-header {
                            background: white;
                            padding: 1.5rem 2rem;
                            border-bottom: 1px solid #e2e8f0;
                        }

                        .card-title {
                            color: var(--primary-color);
                            font-weight: 700;
                            display: flex;
                            align-items: center;
                            gap: 12px;
                            margin: 0;
                        }

                        .card-body {
                            padding: 2rem;
                        }

                        .input-group {
                            margin-bottom: 1.5rem;
                            position: relative;
                        }

                        .input-label {
                            display: block;
                            margin-bottom: 0.5rem;
                            font-weight: 600;
                            color: #334155;
                        }

                        .input-field {
                            position: relative;
                        }

                        .form-control {
                            padding: 0.75rem 1rem;
                            padding-left: 3rem;
                            border-radius: 8px;
                            border: 1px solid #cbd5e1;
                            background-color: #f8fafc;
                            transition: all 0.3s ease;
                        }

                        .form-control:focus {
                            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.25);
                            border-color: var(--primary-color);
                            background-color: white;
                        }

                        .form-control:disabled {
                            background-color: #f1f5f9;
                            border-color: #cbd5e1;
                        }

                        .input-icon {
                            position: absolute;
                            left: 1rem;
                            top: 50%;
                            transform: translateY(-50%);
                            color: var(--secondary-color);
                            font-size: 1.25rem;
                        }

                        .btn-primary {
                            background-color: var(--primary-color);
                            border-color: var(--primary-color);
                            border-radius: 8px;
                            padding: 0.75rem 1.5rem;
                            font-weight: 600;
                            transition: all 0.3s ease;
                        }

                        .btn-primary:hover {
                            background-color: var(--primary-hover);
                            border-color: var(--primary-hover);
                            transform: translateY(-2px);
                            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
                        }

                        .btn-secondary {
                            background-color: #94a3b8;
                            border-color: #94a3b8;
                        }

                        .btn-success {
                            background-color: #10b981;
                            border-color: #10b981;
                        }

                        .modal-content {
                            border-radius: var(--border-radius);
                            overflow: hidden;
                        }

                        .modal-header {
                            background-color: var(--primary-color);
                            padding: 1.25rem 1.5rem;
                        }

                        .modal-body {
                            padding: 1.5rem;
                        }

                        .form-label {
                            font-weight: 600;
                            color: #334155;
                        }

                        /* Result indicator styling */
                        .result-indicator {
                            display: flex;
                            align-items: center;
                            justify-content: space-between;
                            padding: 1rem;
                            border-radius: 8px;
                            margin-top: 1.5rem;
                            background-color: #f8fafc;
                            border-left: 4px solid var(--primary-color);
                        }

                        .result-text {
                            font-weight: 600;
                            color: #334155;
                        }

                        .result-value {
                            font-weight: 700;
                            color: var(--primary-color);
                        }

                        /* Responsive adjustments */
                        @media (max-width: 768px) {
                            .input-group-wrapper {
                                flex-direction: column;
                            }

                            .input-group-wrapper .input-group {
                                width: 100%;
                            }
                        }
                    </style>

                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-white card-title">
                                    <i class="fas fa-chart-line"></i>
                                    Loan Risk Assessment
                                </h4>
                            </div>
                            <div class="card-body">
                                <div class="py-0">
                                    <div id="kt_customer_view_payment_method_1" class="collapse show fs-6 ps-0" data-bs-parent="#kt_customer_view_payment_method">
                                        <div class="row g-4">
                                            <div class="col-md-4">
                                                <div class="input-group">
                                                    <label class="input-label">Debt Ratio (%)</label>
                                                    <div class="input-field">
                                                        <span class="input-icon">
                                                            <i class="fas fa-percentage"></i>
                                                        </span>
                                                        <input type="number" value="40" class="form-control" placeholder="{{$debt_ratio}}" id="debt_ratio">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="input-group">
                                                    <label class="input-label">Gross Pay</label>
                                                    <div class="input-field">
                                                        <span class="input-icon">
                                                            <i class="fas fa-dollar-sign"></i>
                                                        </span>
                                                        <input type="number" class="form-control" placeholder="{{$gross_pay}}" id="gross_pay">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="input-group">
                                                    <label class="input-label">Net Pay</label>
                                                    <div class="input-field">
                                                        <span class="input-icon">
                                                            <i class="fas fa-wallet"></i>
                                                        </span>
                                                        <input type="number" class="form-control" placeholder="{{$net_pay}}" id="net_pay">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="result-indicator">
                                            <span class="result-text">Loan risk assessment is the process of evaluating a borrower's creditworthiness and the likelihood that they will repay a loan. Lenders (banks, credit unions, fintech companies, etc.) use this assessment to determine whether to approve a loan, set appropriate interest rates, and establish repayment terms.</span>
                                            <div class="input-field" style="width: 200px;">
                                                <span class="input-icon">
                                                    <i class="fas fa-calculator"></i>
                                                </span>
                                                <input type="text" disabled class="form-control" placeholder="{{$result_amount}}" id="result_amount">
                                            </div>
                                        </div>

                                        <div class="mt-4 text-end">
                                            <button id="calculateRisk" class="btn btn-primary">
                                                <i class="fas fa-check-circle me-2"></i>Check Risk
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Advanced Risk Feedback Modal -->
                        <div class="modal fade" id="riskModal" tabindex="-1" aria-labelledby="riskModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="text-white modal-title" id="riskModalLabel">
                                            <i class="fas fa-chart-pie me-2"></i>Risk Assessment Summary
                                        </h5>
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row g-4">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">
                                                        <i class="fas fa-tachometer-alt me-2"></i>Risk Score
                                                    </label>
                                                    <div class="input-field">
                                                        <span class="input-icon">
                                                            <i class="fas fa-chart-line"></i>
                                                        </span>
                                                        <input type="text" class="form-control" id="modal_risk_score" readonly>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">
                                                        <i class="fas fa-signal me-2"></i>Risk Level
                                                    </label>
                                                    <div class="input-field">
                                                        <span class="input-icon">
                                                            <i class="fas fa-level-up-alt"></i>
                                                        </span>
                                                        <input type="text" class="form-control" id="modal_risk_level" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">
                                                <i class="fas fa-money-bill-wave me-2"></i>Loan Amount
                                            </label>
                                            <div class="input-field">
                                                <span class="input-icon">
                                                    <i class="fas fa-dollar-sign"></i>
                                                </span>
                                                <input type="number" class="form-control" id="modal_loan_amount" placeholder="Enter loan amount">
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">
                                                <i class="fas fa-comment-alt me-2"></i>Reviewer Comment
                                            </label>
                                            <textarea class="form-control" rows="3" id="modal_comment" placeholder="Add reviewer remarks..."></textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">
                                                <i class="fas fa-tasks me-2"></i>Decision
                                            </label>
                                            <select class="form-select" id="modal_decision">
                                                <option value="">-- Select Decision --</option>
                                                <option value="approved">Approve</option>
                                                <option value="declined">Decline</option>
                                                <option value="review">Need Further Review</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                            <i class="fas fa-times me-2"></i>Cancel
                                        </button>
                                        <button type="button" class="btn btn-success" id="submitAssessmentBtn">
                                            <i class="fas fa-paper-plane me-2"></i>Submit Assessment
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
                    <script>
                        document.getElementById('calculateRisk').addEventListener('click', function () {
                            const debtRatio = parseFloat(document.getElementById('debt_ratio').value);
                            const grossPay = parseFloat(document.getElementById('gross_pay').value);
                            const netPay = parseFloat(document.getElementById('net_pay').value);

                            if (isNaN(debtRatio) || isNaN(grossPay) || isNaN(netPay)) {
                                alert('Please fill all the fields correctly.');
                                return;
                            }

                            const riskScore = ((netPay / grossPay) * 100) - debtRatio;
                            let riskLevel = '';
                            if (riskScore >= 60) {
                                riskLevel = 'Low';
                            } else if (riskScore >= 30) {
                                riskLevel = 'Medium';
                            } else {
                                riskLevel = 'High';
                            }

                            // Set values in modal fields
                            document.getElementById('modal_risk_score').value = `${riskScore.toFixed(2)}%`;
                            document.getElementById('modal_risk_level').value = riskLevel;

                            // Show modal
                            const modal = new bootstrap.Modal(document.getElementById('riskModal'));
                            modal.show();
                        });
                        document.getElementById('submitAssessmentBtn').addEventListener('click', function () {
                            const payload = {
                                risk_score: document.getElementById('modal_risk_score').value,
                                risk_level: document.getElementById('modal_risk_level').value,
                                loan_amount: document.getElementById('modal_loan_amount').value,
                                comment: document.getElementById('modal_comment').value,
                                decision: document.getElementById('modal_decision').value
                            };

                            if (!payload.decision || !payload.loan_amount) {
                                alert('Please fill in all required fields (Loan Amount & Decision).');
                                return;
                            }

                            fetch('/api/submit-risk-assessment', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                                },
                                body: JSON.stringify(payload)
                            })
                            .then(res => res.json())
                            .then(data => {
                                alert(data.message || 'Assessment submitted successfully!');
                                bootstrap.Modal.getInstance(document.getElementById('riskModal')).hide();
                            })
                            .catch(err => {
                                alert('Something went wrong. Please try again.');
                                console.error(err);
                            });
                        });
                    </script>

                </div>
            </div>
        </div>
        
        <div class="tab-pane fade" id="kt_customer_view_overview_loan_details" role="tabpanel">
            <div class="row g-5 g-xl-12">
                <div class="col-xl-12">
                    <div class="p-4 border-0 rounded shadow-sm card">
                        <div class="p-3 card-body">
                            <div class="table-responsive">
                                <table class="table align-middle table-borderless">
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
                    <div class="p-4 border-0 rounded shadow-sm card">
                        <div class="border-0 card-header">
                            <div class="card-title">
                                <h4 class="mb-0 fw-bold">Repayment Methods</h4>
                            </div>
                        </div>

                        <div id="kt_customer_view_payment_method" class="pt-0 card-body">
                            <div class="py-0" data-kt-customer-payment-method="row">
                                <div id="kt_customer_view_payment_method_1"
                                    class="collapse show fs-6 ps-10"
                                    data-bs-parent="#kt_customer_view_payment_method">
                                    <div class="flex-wrap py-5 d-flex">
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
        <div class="tab-pane fade" id="kt_customer_view_documents" role="tabpanel">
            <div class="pt-4 mb-6 card mb-xl-9">
                <div class="py-0 card-body">

                    <div class="">
                        <h6 class="mb-3 fw-semibold text-warning text-uppercase">Uploaded Attachments</h6>
                        <div class="gap-2 p-4 d-flex">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
