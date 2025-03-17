 <!--begin::Sidebar-->
 <div class="flex-column flex-lg-row-auto w-100 w-xl-350px mb-10">
    <div class="card border-0 shadow-sm rounded-xl overflow-hidden">
        <div class="card-body p-0">
            <!-- Status Header -->
            <div class="bg-gradient-to-r from-green-500 to-green-600 px-6 py-5 text-white">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h2 class="fs-2 fw-bold m-0">Approval</h2>
                    <div class="approval-badge px-3 py-1 bg-white bg-opacity-25 rounded-pill">
                        <span class="fs-7 fw-semibold">Approved</span>
                    </div>
                </div>
                <p class="fs-7 text-white text-opacity-75 m-0">Loan application has been successfully approved</p>
            </div>

            <!-- User Profile Section -->
            <div class="d-flex flex-column align-items-center px-6 py-6 border-bottom">
                <div class="position-relative mb-5">
                    <div class="symbol symbol-100px symbol-circle border border-4 border-white shadow-sm">
                        @if ($loan->user->profile_photo_path)
                            <img src="{{ '../public/'.Storage::url($loan->user->profile_photo_path) }}" alt="{{ $loan->user->fname }}"/>
                        @else
                            <img src="https://thumbs.dreamstime.com/b/default-avatar-profile-image-vector-social-media-user-icon-potrait-182347582.jpg" alt="default"/>
                        @endif
                    </div>
                    <div class="position-absolute bottom-0 end-0 bg-success rounded-circle p-1">
                        <div class="w-3 h-3"></div>
                    </div>
                </div>

                <h3 class="fs-3 fw-bold text-gray-900 text-center mb-1">{{ $loan->user->fname.' '.$loan->user->lname }}</h3>
                <span class="fs-6 text-gray-500 mb-4">{{ $loan->user->occupation }}</span>
            </div>

            <!-- Loan Summary Section -->
            <div class="px-6 py-6 border-bottom">
                <h4 class="fs-6 fw-bold text-gray-800 mb-4">Loan Summary</h4>
                <div class="loan-metrics">
                    <div class="loan-metric">
                        <div class="loan-metric-icon bg-primary-light text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="12" y1="1" x2="12" y2="23"></line>
                                <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                            </svg>
                        </div>
                        <div class="loan-metric-content">
                            <span class="loan-metric-value">ZMW {{ $loan->amount}}</span>
                            <span class="loan-metric-label">Principal Amount</span>
                        </div>
                    </div>

                    <div class="loan-metric">
                        <div class="loan-metric-icon bg-info-light text-info">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                <line x1="3" y1="10" x2="21" y2="10"></line>
                            </svg>
                        </div>
                        <div class="loan-metric-content">
                            <span class="loan-metric-value">{{ $loan->repayment_plan ?? 1}} Months</span>
                            <span class="loan-metric-label">Loan Duration</span>
                        </div>
                    </div>

                    <div class="loan-metric">
                        <div class="loan-metric-icon bg-warning-light text-warning">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                            </svg>
                        </div>
                        <div class="loan-metric-content">
                            <span class="loan-metric-value">K {{ App\Models\Application::payback($loan->amount, $loan->repayment_plan, $loan_product->id) }}</span>
                            <span class="loan-metric-label">Total Repayment</span>
                        </div>
                    </div>

                    <div class="loan-metric">
                        <div class="loan-metric-icon bg-success-light text-success">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="2" y="5" width="20" height="14" rx="2"></rect>
                                <line x1="2" y1="10" x2="22" y2="10"></line>
                            </svg>
                        </div>
                        <div class="loan-metric-content">
                            <span class="loan-metric-value">K {{ App\Models\Application::monthly_installment($loan->amount, $loan->repayment_plan) }}</span>
                            <span class="loan-metric-label">Monthly Repayment</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- User Details Section -->
            <div class="px-6 py-6">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h4 class="fs-6 fw-bold text-gray-800 m-0">Customer Details</h4>
                    <button type="button" class="btn btn-sm btn-icon" data-bs-toggle="collapse" href="#kt_customer_view_details">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="chevron-icon">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </button>
                </div>

                <div id="kt_customer_view_details" class="collapse show">
                    <div class="user-details">
                        <div class="user-detail">
                            <span class="user-detail-label">Account ID</span>
                            <span class="user-detail-value">ID-{{$loan->user->id}}</span>
                        </div>

                        <div class="user-detail">
                            <span class="user-detail-label">Gender</span>
                            <span class="user-detail-value">{{ ucwords($loan->gender) }}</span>
                        </div>

                        <div class="user-detail">
                            <span class="user-detail-label">Email</span>
                            <a href="mailto:{{$loan->user->email}}" class="user-detail-value text-hover-primary">
                                {{ $loan->user->email ?? 'Not set'}}
                            </a>
                        </div>

                        <div class="user-detail">
                            <span class="user-detail-label">Address</span>
                            <span class="user-detail-value">{{ $loan->user->address ?? 'Not set'}}</span>
                        </div>

                        <div class="user-detail">
                            <span class="user-detail-label">Phone</span>
                            <span class="user-detail-value">+260{{ $loan->phone ?? ' --' }}</span>
                        </div>

                        <div class="user-detail">
                            <span class="user-detail-label">Interest Rate</span>
                            <span class="user-detail-value text-success">{{ App\Models\Application::interest_rate($loan_product->id) }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end::Sidebar-->

<style>
/* Modern Loan Approval Sidebar Styling */
.card {
    transition: all 0.3s ease;
}

/* Status Header */
.approval-badge {
    font-size: 0.75rem;
}

/* User Profile Section */
.symbol img {
    object-fit: cover;
}

/* Loan Metrics */
.loan-metrics {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 1rem;
}

.loan-metric {
    display: flex;
    align-items: flex-start;
    gap: 0.75rem;
    padding: 0.75rem;
    background-color: #f9fafb;
    border-radius: 0.5rem;
    transition: all 0.2s ease;
}

.loan-metric:hover {
    background-color: #f3f4f6;
    transform: translateY(-2px);
}

.loan-metric-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 2.5rem;
    height: 2.5rem;
    border-radius: 0.5rem;
    flex-shrink: 0;
}

.bg-primary-light { background-color: rgba(var(--bs-primary-rgb), 0.1); }
.bg-success-light { background-color: rgba(var(--bs-success-rgb), 0.1); }
.bg-warning-light { background-color: rgba(var(--bs-warning-rgb), 0.1); }
.bg-info-light { background-color: rgba(var(--bs-info-rgb), 0.1); }

.text-primary { color: var(--bs-primary); }
.text-success { color: var(--bs-success); }
.text-warning { color: var(--bs-warning); }
.text-info { color: var(--bs-info); }

.loan-metric-content {
    display: flex;
    flex-direction: column;
}

.loan-metric-value {
    font-weight: 600;
    font-size: 0.875rem;
    color: #374151;
    line-height: 1.25;
}

.loan-metric-label {
    font-size: 0.75rem;
    color: #6b7280;
    line-height: 1.25;
}

/* User Details */
.user-details {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.user-detail {
    display: flex;
    flex-direction: column;
    gap: 0.25rem;
}

.user-detail-label {
    font-size: 0.75rem;
    font-weight: 500;
    color: #6b7280;
}

.user-detail-value {
    font-size: 0.875rem;
    color: #374151;
    font-weight: 500;
}

a.user-detail-value {
    text-decoration: none;
    color: #6b7280;
    transition: color 0.2s ease;
}

a.user-detail-value:hover {
    color: var(--bs-primary);
}

.text-hover-primary:hover {
    color: var(--bs-primary) !important;
}

/* Chevron icon animation */
.chevron-icon {
    transition: transform 0.3s ease;
}

.collapsed .chevron-icon {
    transform: rotate(-180deg);
}

/* Responsive adjustments */
@media (max-width: 767.98px) {
    .loan-metrics {
        grid-template-columns: 1fr;
    }
}
</style>