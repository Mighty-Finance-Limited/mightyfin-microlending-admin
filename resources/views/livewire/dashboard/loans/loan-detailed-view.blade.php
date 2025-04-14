<div class="content d-flex flex-column flex-column-fluid bg-light" id="kt_content">
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl">
            <!-- Main Profile Card -->
            <div class="mb-6 shadow-sm card rounded-3">
                <div class="pb-0 card-body pt-9">
                    <div class="flex-wrap d-flex flex-sm-nowrap">
                        <!-- Profile Image Section -->
                        <!-- Profile Image Section -->
                    @php
                        $photo = $loan->user->profile_photo_path;

                        // Check if it's a full URL already
                        if ($photo && (Str::startsWith($photo, ['http://', 'https://']))) {
                            $profilePhotoUrl = $photo;
                        }
                        // If not, assume it's a local path in the storage and generate full URL
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

                <div class="mb-4 me-7">
                    <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                        <img src="{{ $profilePhotoUrl }}"
                             alt="image"
                             class="border rounded-circle border-3 border-light" />

                        <div class="bottom-0 mb-6 border border-4 border-white position-absolute translate-middle start-100 bg-success rounded-circle h-20px w-20px"></div>
                    </div>
                </div>

                        <!-- Profile Information Section -->
                        <div class="flex-grow-1">
                            <div class="flex-wrap mb-2 d-flex justify-content-between align-items-start">
                                <div class="d-flex flex-column">
                                    <!-- Client Name -->
                                    <div class="mb-2 d-flex align-items-center">
                                        <a href="#" class="text-gray-900 text-hover-primary fs-1 fw-bolder me-1">{{ $loan->user->fname.' '.$loan->user->lname }}</a>
                                        <a href="#">
                                            <i class="ki-duotone ki-verify fs-1 text-primary">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </a>
                                    </div>

                                    <!-- Client Details -->
                                    <div class="flex-wrap gap-4 mb-4 d-flex fw-semibold fs-6 pe-2">
                                        @if($loan->user->nrc_no)
                                        <a href="#" class="mb-2 text-gray-600 d-flex align-items-center text-hover-primary me-5">
                                            <i class="ki-duotone ki-profile-user fs-5 me-1 text-primary"></i>
                                            {{ $loan->user->id_type ?? 'NRC: '}}
                                            {{ $loan->user->nrc_no ?? $loan->user->nrc}}</a>
                                        @endif

                                        @if($loan->user->occupation)
                                        <a href="#" class="mb-2 text-gray-600 d-flex align-items-center text-hover-primary me-5">
                                            <i class="ki-duotone ki-briefcase fs-5 me-1 text-primary"></i>
                                            {{ $loan->user->occupation }}</a>
                                        @endif

                                        @if($loan->user->jobTitle)
                                        <a href="#" class="mb-2 text-gray-600 d-flex align-items-center text-hover-primary me-5">
                                            <i class="ki-duotone ki-medal fs-5 me-1 text-primary"></i>
                                            {{ $loan->user->jobTitle }}</a>
                                        @endif

                                        @if($loan->user->address)
                                        <a href="#" class="mb-2 text-gray-600 d-flex align-items-center text-hover-primary me-5">
                                            <i class="ki-duotone ki-geolocation fs-5 me-1 text-primary"></i>
                                            {{ $loan->user->address }}</a>
                                        @endif

                                        @if($loan->user->email)
                                        <a href="#" class="mb-2 text-gray-600 d-flex align-items-center text-hover-primary">
                                            <i class="ki-duotone ki-message-text-2 fs-5 me-1 text-primary"></i>
                                            {{ $loan->user->email }}</a>
                                        @endif

                                        @if($loan->user->phone)
                                        <a href="#" class="mb-2 text-gray-600 d-flex align-items-center text-hover-primary">
                                            <i class="ki-duotone ki-phone fs-5 me-1 text-primary"></i>
                                            {{ $loan->user->phone }}</a>
                                        @endif

                                        @if($loan->user->dob)
                                        <a href="#" class="mb-2 text-gray-600 d-flex align-items-center text-hover-primary">
                                            <i class="ki-duotone ki-calendar fs-5 me-1 text-primary"></i>
                                            DOB: {{ $loan->user->dob }}</a>
                                        @endif

                                        @if($loan->user->gender)
                                        <a href="#" class="mb-2 text-gray-600 d-flex align-items-center text-hover-primary">
                                            <i class="ki-duotone ki-user fs-5 me-1 text-primary"></i>
                                            {{ $loan->user->gender }}</a>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!-- Loan Stats Cards -->
                            <div class="flex-wrap d-flex flex-stack">
                                <div class="d-flex flex-column flex-grow-1 pe-8">
                                    <div class="flex-wrap gap-4 d-flex">
                                        <div class="px-4 py-3 mb-3 overflow-hidden bg-white border border-gray-300 border-dashed shadow-sm rounded-3 min-w-150px position-relative">
                                            <div class="top-0 h-full position-absolute opacity-10 end-0 w-35px bg-primary"></div>
                                            <div class="mb-1 d-flex align-items-center">
                                                <i class="ki-duotone ki-dollar fs-3 me-2 text-primary"></i>
                                                <div class="fs-2 fw-bolder" data-kt-countup="true" data-kt-countup-value="{{ $loan->amount }}" data-kt-countup-prefix="K">0</div>
                                            </div>
                                            <div class="text-gray-500 fw-bold fs-6">Principal Amount</div>
                                        </div>

                                        <div class="px-4 py-3 mb-3 overflow-hidden bg-white border border-gray-300 border-dashed shadow-sm rounded-3 min-w-150px position-relative">
                                            <div class="top-0 h-full position-absolute opacity-10 end-0 w-35px bg-success"></div>
                                            <div class="mb-1 d-flex align-items-center">
                                                <i class="ki-duotone ki-arrow-right-square fs-3 me-2 text-success"></i>
                                                <div class="fs-2 fw-bolder" data-kt-countup="true" data-kt-countup-prefix="K" data-kt-countup-value="{{ App\Models\Application::payback($loan) }}">0</div>
                                            </div>
                                            <div class="text-gray-500 fw-bold fs-6">Est. Repayment</div>
                                        </div>

                                        <div class="px-4 py-3 mb-3 overflow-hidden bg-white border border-gray-300 border-dashed shadow-sm rounded-3 min-w-150px position-relative">
                                            <div class="top-0 h-full position-absolute opacity-10 end-0 w-35px bg-warning"></div>
                                            <div class="mb-1 d-flex align-items-center">
                                                <i class="ki-duotone ki-chart-simple fs-3 me-2 text-warning"></i>
                                                <div class="fs-2 fw-bolder" data-kt-countup="true" data-kt-countup-value="{{ App\Models\Application::loan_balance($loan->id) }}" data-kt-countup-prefix="K">0</div>
                                            </div>
                                            <div class="text-gray-500 fw-bold fs-6">Pending Repayments</div>
                                        </div><div class="px-4 py-3 mb-3 overflow-hidden bg-white border border-gray-300 border-dashed shadow-sm rounded-3 min-w-150px position-relative">
                                            <div class="top-0 h-full position-absolute opacity-10 end-0 w-35px bg-warning"></div>
                                            <div class="mb-1 d-flex align-items-center">
                                                <i class="ki-duotone ki-chart-simple fs-3 me-2 text-warning"></i>
                                                <div class="fs-2 fw-bolder" data-kt-countup="true" data-kt-countup-value="{{ App\Models\Application::monthInstallment($loan) }}" data-kt-countup-prefix="K">0</div>
                                            </div>
                                            <div class="text-gray-500 fw-bold fs-6">Monthly Repayments</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Navigation Tabs -->
                    <ul class="mt-5 border-transparent nav nav-stretch nav-line-tabs nav-line-tabs-2x fs-5 fw-bold">
                        <li class="mt-2 nav-item">
                            <a class="py-5 nav-link text-active-primary ms-0 me-10 active" href="#repayments_tablet">
                                <i class="ki-duotone ki-calendar-tick fs-4 me-1"></i>Repayments</a>
                        </li>
                        <li class="mt-2 nav-item">
                            <a class="py-5 nav-link text-active-primary ms-0 me-10" href="#schedule_tab">
                                <i class="ki-duotone ki-calendar fs-4 me-1"></i>Loan Schedule</a>
                        </li>
                        <li class="mt-2 nav-item">
                            <a class="py-5 nav-link text-active-primary ms-0 me-10" href="#loan_files_tab">
                                <i class="ki-duotone ki-file fs-4 me-1"></i>Balance Statement</a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Repayment Details Section -->
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
                        {{-- <button class="btn btn-sm btn-primary me-2">
                            <i class="ki-duotone ki-plus fs-5"></i>Add Payment
                        </button>
                        <button class="btn btn-sm btn-secondary">
                            <i class="ki-duotone ki-document-download fs-5"></i>Export
                        </button> --}}
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
                                    <p class="mt-1 text-gray-800 fw-bold fs-3 mb-7">Monthly Repayments</p>
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
                                    <div class="mb-2 d-flex align-items-center">
                                        <span class="badge badge-light-success fs-7 fw-bold me-2">COMPLETED</span>
                                        <span class="text-gray-500 fs-7">Last Payment: Feb 28, 2025</span>
                                    </div>
                                    <p class="mt-1 text-gray-800 fw-bold fs-3 mb-7">Interest & Fees</p>
                                    <div class="flex-wrap mb-5 d-flex">
                                        <div class="px-3 py-2 mb-2 border border-gray-300 border-dashed rounded me-3">
                                            {{-- <div class="text-gray-700 fs-6 fw-bold">K125.00</div> --}}
                                            <div class="text-gray-700 fs-6 fw-bold">{{ App\Models\Application::interest_rate($loan_product->id) }}</div>
                                            <div class="text-gray-500 fw-semibold">Interest Rate</div>
                                        </div>
                                        <div class="px-3 py-2 mb-2 border border-gray-300 border-dashed rounded">
                                            <div class="text-gray-700 fs-6 fw-bold">10%</div>
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
                                            <div class="text-gray-700 fs-6 fw-bold">K{{ number_format(App\Models\Application::loanBalance($loan->id), 2, '.', ',') }}</div>
                                            <div class="text-gray-500 fw-semibold">Total Paid</div>
                                        </div>
                                        <div class="px-3 py-2 mb-2 border border-gray-300 border-dashed rounded">
                                            <div class="text-gray-700 fs-6 fw-bold">K{{ number_format(App\Models\Application::loanBalance($loan->id), 2, '.', ',') }}</div>
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

           @include('livewire.dashboard.loans.__parts.repayments')
           {{-- @include('livewire.dashboard.loans.__parts.loan_files') --}}
           @include('livewire.dashboard.loans.__parts.balance-statement')

        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const tabLinks = document.querySelectorAll(".nav-link");
            const tabContents = document.querySelectorAll(".tabs-content");

            function showTab(targetId) {
                tabContents.forEach(tab => {
                    tab.style.display = "none";
                });

                const targetTab = document.querySelector(targetId);
                if (targetTab) {
                    targetTab.style.display = "block";
                }
            }

            tabLinks.forEach(link => {
                link.addEventListener("click", function (e) {
                    e.preventDefault();

                    // Remove 'active' from all tabs
                    tabLinks.forEach(l => l.classList.remove("active"));

                    // Add 'active' to clicked tab
                    this.classList.add("active");

                    // Show the corresponding tab content
                    const targetId = this.getAttribute("href");
                    showTab(targetId);
                });
            });

            // Show default active tab on page load
            const defaultTab = document.querySelector(".nav-link.active");
            if (defaultTab) {
                showTab(defaultTab.getAttribute("href"));
            }
        });
    </script>
</div>
