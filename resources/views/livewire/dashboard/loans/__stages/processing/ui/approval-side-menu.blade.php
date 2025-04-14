 <!--begin::Sidebar-->
 <div class="mb-10 flex-column flex-lg-row-auto w-100 w-xl-350px">
    <div class="overflow-hidden border-0 shadow-sm card rounded-xl">
        <div class="p-0 card-body">
            <!-- User Profile Section -->
            <div class="px-6 py-6 d-flex flex-column align-items-center border-bottom">
                <!-- Update your HTML to make the image clickable with Lightbox -->
                <div class="mb-5 position-relative">
                    <div class="border border-4 border-white shadow-sm symbol symbol-100px symbol-circle">
                        @php
                        $photo = $loan->user->profile_photo_path;
                            if ($photo && (Str::startsWith($photo, ['http://', 'https://']))) {
                                $profilePhotoUrl = $photo;
                            }
                            elseif ($photo) {
                                if (Storage::exists($photo)) {
                                    $profilePhotoUrl = asset(Storage::url($photo));
                                }else{
                                    $profilePhotoUrl = Storage::disk('custom_public')->url(Str::replaceFirst('public/', '', $photo));
                                }
                            } else {
                                $profilePhotoUrl = 'https://thumbs.dreamstime.com/b/default-avatar-profile-image-vector-social-media-user-icon-potrait-182347582.jpg';
                            }
                        @endphp
                        <a class="border border-4 border-white shadow-sm symbol symbol-100px symbol-circle" href="{{ $profilePhotoUrl }}" data-lightbox="profile-image" data-title="{{ $loan->user->fname }}'s Profile Photo">
                            <img src="{{ $profilePhotoUrl }}" alt="{{ $loan->user->fname }}"/>
                        </a>
                    </div>
                </div>

                <!-- Add these in your layout's head section or at the bottom of the body -->
                <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet" />
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>

                <!-- Optional: Customize Lightbox behavior -->
                <script>
                    lightbox.option({
                        'resizeDuration': 200,
                        'wrapAround': true,
                        'alwaysShowNavOnTouchDevices': true
                    });
                </script>

                <h3 class="mb-1 text-center text-gray-900 fs-3 fw-bold">{{ $loan->user->fname.' '.$loan->user->lname }}</h3>
                <span class="mb-4 text-gray-500 fs-6">{{ $loan->user->occupation }}</span>
            </div>

            <!-- Loan Summary Section -->
            <div class="px-6 py-6 border-bottom">
                <h4 class="mb-4 text-gray-800 fs-6 fw-bold">Loan Summary</h4>
                <div class="loan-metrics">
                    <div class="loan-metric">
                        <div class="loan-metric-icon bg-primary-light text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="12" y1="1" x2="12" y2="23"></line>
                                <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                            </svg>
                        </div>
                        <div class="loan-metric-content">
                            <span class="loan-metric-value">ZMW {{ number_format($loan->amount, 2, '.', ',') }}</span>
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
                            <span class="loan-metric-value">K {{ number_format(App\Models\Application::payback($loan),2,'.',',') }}</span>
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
                            <span class="loan-metric-value">K {{ number_format(App\Models\Application::monthInstallment($loan),2,'.',',') }}</span>
                            <span class="loan-metric-label">Monthly Repayment</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- User Details Section -->
            <div class="px-6 py-6">
                <div class="mb-4 d-flex align-items-center justify-content-between">
                    <h4 class="m-0 text-gray-800 fs-6 fw-bold">Customer Details</h4>
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
                            <span class="user-detail-value">{{ $loan->phone ?? $loan->user->phone }}</span>
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