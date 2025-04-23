<div class="content-body bg-light">
    <div class="py-4 container-fluid">
        @if($user != null)
        <div class="row g-4">
            <!-- Profile Card -->
            <div class="col-xl-12">
                <div class="overflow-hidden border-0 rounded-lg shadow-sm card">
                    <div class="p-0 card-body">
                        <div class="p-4 text-white bg-gradient-primary">
                            <div class="d-flex align-items-center">
                                <div class="bg-white profile-photo rounded-circle d-flex align-items-center justify-content-center text-primary" style="width: 100px; height: 100px; font-size: 2rem; font-weight: bold;">
                                    @php
                                    $photo = $user->profile_photo_path;
                                        // Check if it's a full URL already
                                        if ($photo && (Str::startsWith($photo, ['http://', 'https://']))) {
                                            $profilePhotoUrl = $photo;
                                        }
                                        // If not, assume it's a local path in the storage and generate full URL
                                        elseif ($photo) {
                                            if (Storage::exists($photo)) {
                                                $profilePhotoUrl = 'public/'.Storage::url($photo);
                                            } else {
                                                $profilePhotoUrl = Storage::disk('custom_public')->url(Str::replaceFirst('public/', '', $photo));
                                            }
                                        } else {
                                            $profilePhotoUrl = 'https://thumbs.dreamstime.com/b/default-avatar-profile-image-vector-social-media-user-icon-potrait-182347582.jpg';
                                        }
                                    @endphp
                
                                    <img
                                        class="cursor-pointer rounded-circle preview-image" width="100"
                                        src="{{ $profilePhotoUrl }}"
                                        alt="{{ $user->fname.' '.$user->lname }}"
                                        data-original="{{ $profilePhotoUrl }}"
                                        onerror="this.onerror=null; this.src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSDqZLNNtpV-cNZfqbScWb3_Ny0C15rPO9mgg&s';"
                                    />
                                </div>

                                <div class="ms-4 flex-grow-1">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h1 class="mb-0 text-white fw-bold">{{ $user->fname.' '.$user->lname }}</h1>
                                            <div class="px-3 py-2 my-2 badge bg-light text-primary rounded-pill">
                                                @foreach ($user->roles as $role)
                                                    @if($role->name == 'user')
                                                    Borrower
                                                    @else
                                                    {{ $role->name }}
                                                    @endif
                                                @endforeach
                                            </div>
                                            <p class="mb-0 text-white-50">Joined {{ $user->created_at->diffForHumans() ?? 'Not Set' }}</p>
                                        </div>

                                        @if($user->blacklist != null)
                                        <div class="px-3 py-2 mb-0 alert alert-danger d-flex align-items-center">
                                            <i class="fas fa-exclamation-triangle me-2"></i>
                                            <strong>BLACKLISTED</strong>
                                        </div>
                                        @endif

                                        <div class="dropdown">
                                            <button class="p-2 text-white btn rounded-circle" data-bs-toggle="dropdown">
                                                <i class="text-white fas fa-ellipsis-v"></i>
                                            </button>
                                            <ul class="shadow-sm dropdown-menu dropdown-menu-end">
                                                @if($user->blacklist != null)
                                                <li class="dropdown-item">
                                                    <button wire:click="unblockUser" class="p-0 btn btn-link text-danger"><i class="fa fa-unlock me-2"></i> Unblock</button>
                                                </li>
                                                @else
                                                <li class="dropdown-item">
                                                    <button wire:click="blockUser" class="p-0 btn btn-link text-danger"><i class="fa fa-ban me-2"></i> Add to Blacklist</button>
                                                </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="p-4">
                            <div class="row g-4">
                                <div class="col-md-4">
                                    <div class="info-group">
                                        <h6 class="mb-2 text-uppercase text-muted fw-bold small">Personal Information</h6>
                                        <div class="mb-3 d-flex">
                                            <div class="p-2 info-icon bg-light rounded-circle me-3">
                                                <i class="fas fa-user text-primary"></i>
                                            </div>
                                            <div>
                                                <div class="text-muted small">Gender</div>
                                                <div class="fw-medium">{{ $user->gender ?? 'Not Set' }}</div>
                                            </div>
                                        </div>
                                        <div class="mb-3 d-flex">
                                            <div class="p-2 info-icon bg-light rounded-circle me-3">
                                                <i class="fas fa-id-card text-primary"></i>
                                            </div>
                                            <div>
                                                <div class="text-muted small">NRC#</div>
                                                <div class="fw-medium">{{ $user->nrc_no ?? 'Not Set' }}</div>
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="p-2 info-icon bg-light rounded-circle me-3">
                                                <i class="fas fa-briefcase text-primary"></i>
                                            </div>
                                            <div>
                                                <div class="text-muted small">Occupation</div>
                                                <div class="fw-medium">{{ $user->occupation ?? 'Not Set' }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="info-group">
                                        <h6 class="mb-2 text-uppercase text-muted fw-bold small">Contact Details</h6>
                                        <div class="mb-3 d-flex">
                                            <div class="p-2 info-icon bg-light rounded-circle me-3">
                                                <i class="fas fa-envelope text-primary"></i>
                                            </div>
                                            <div>
                                                <div class="text-muted small">Email</div>
                                                <div class="fw-medium">{{ $user->email }}</div>
                                            </div>
                                        </div>
                                        <div class="mb-3 d-flex">
                                            <div class="p-2 info-icon bg-light rounded-circle me-3">
                                                <i class="fas fa-phone text-primary"></i>
                                            </div>
                                            <div>
                                                <div class="text-muted small">Primary Phone</div>
                                                <div class="fw-medium">{{ $user->phone ?? 'Not Set' }}</div>
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="p-2 info-icon bg-light rounded-circle me-3">
                                                <i class="fas fa-phone-alt text-primary"></i>
                                            </div>
                                            <div>
                                                <div class="text-muted small">Secondary Phone</div>
                                                <div class="fw-medium">{{ $user->phone2 ?? 'Not Set' }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="info-group">
                                        <h6 class="mb-2 text-uppercase text-muted fw-bold small">Financial Details</h6>
                                        <div class="mb-3 d-flex">
                                            <div class="p-2 info-icon bg-light rounded-circle me-3">
                                                <i class="fas fa-money-bill-wave text-primary"></i>
                                            </div>
                                            <div>
                                                <div class="text-muted small">Basic Pay</div>
                                                <div class="fw-medium">K {{ $user->basic_pay ?? 0 }}</div>
                                            </div>
                                        </div>
                                        <div class="mb-3 d-flex">
                                            <div class="p-2 info-icon bg-light rounded-circle me-3">
                                                <i class="fas fa-wallet text-primary"></i>
                                            </div>
                                            <div>
                                                <div class="text-muted small">Net Pay</div>
                                                <div class="fw-medium">K {{ $user->net_pay ?? 0 }}</div>
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="p-2 info-icon bg-light rounded-circle me-3">
                                                <i class="fas fa-map-marker-alt text-primary"></i>
                                            </div>
                                            <div>
                                                <div class="text-muted small">Address</div>
                                                <div class="fw-medium">{{ $user->address ?? 'No Address' }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Financial Overview Section -->
            <div class="col-xl-8">
                @if($user->hasRole('user'))
                <!-- Owing Balance Card -->
                <div class="mb-4 overflow-hidden border-0 rounded-lg shadow-sm card">
                    <div class="py-3 bg-white card-header border-bottom-0 d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="mb-1 fw-bold">Owing Balance</h5>
                            @if($user->loans->first() != null && $user->loans->first()->status == 1)
                            <span class="text-muted small">Loaned out on {{ $user->loans->first()->created_at->toFormattedDateString() }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-5">
                                @if($user->loans->first() != null)
                                    @if($user->loans->first()->status == 1)
                                    <div class="mb-4 border-4 border-start border-primary ps-3">
                                        <span class="mb-1 text-muted d-block">{{ $user->loans->first()->type }} Loan</span>
                                        <h3 class="mb-0">K {{ $user->loans->first()->amount }}</h3>
                                    </div>

                                    <div class="p-3 mb-4 rounded-lg bg-light">
                                        <div class="d-flex align-items-center">
                                            <div class="p-3 icon-box bg-danger bg-opacity-10 rounded-circle me-3">
                                                <i class="fas fa-arrow-down text-danger"></i>
                                            </div>
                                            <div>
                                                <span class="text-danger d-block small">Current Loan Owing Balance</span>
                                                <h4 class="mb-0">K {{ App\Models\Application::loan_balance($user->loans->first()->id) }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                @else
                                    <div class="py-3">
                                        <span class="px-3 py-2 badge bg-light text-dark">No Active Loan</span>
                                    </div>
                                @endif

                                <div class="p-3 rounded-lg bg-light">
                                    <div class="d-flex align-items-center">
                                        <div class="p-3 text-white icon-box bg-danger bg-opacity-10 rounded-circle me-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-square" viewBox="0 0 16 16">
                                                <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                                                <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
                                              </svg>                                        </div>
                                        <div>
                                            <span class="text-danger d-block small">Total Outstanding Balance</span>
                                            <h4 class="mb-0">K {{ App\Models\Loans::customer_balance($user->id) }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-7">
                                <div id="barChart" class="w-100 h-100"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Loan History Card -->
                <div class="overflow-hidden border-0 rounded-lg shadow-sm card">
                    <div class="py-3 bg-white card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0 fw-bold">Loan History</h5>
                        <div class="d-flex align-items-center">
                            <select class="border-0 form-select form-select-sm bg-light" aria-label="Default">
                                <option selected>This Month</option>
                                <option value="1">This Year</option>
                                <option value="2">Last 6 Years</option>
                            </select>
                        </div>
                    </div>

                    <div class="p-0 card-body">
                        <div class="table-responsive">
                            <table class="table pl-4 mb-0 align-middle table-hover">
                                <tbody class="container pl-4" style="margin-left: 4px">
                                    @forelse($user->loans as $loan)
                                    <tr style="padding-left:4%">
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="p-2 text-white icon-box bg-primary bg-opacity-10 rounded-circle me-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash" viewBox="0 0 16 16">
                                                        <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4"/>
                                                        <path d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2z"/>
                                                      </svg>
                                                </div>
                                                <span class="fw-medium">{{ $loan->type }} Loan</span>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="fw-medium">K {{ $loan->amount }}</span>
                                        </td>
                                        <td>
                                            <span class="text-muted">{{ $loan->created_at->toFormattedDateString() }}</span>
                                        </td>
                                        <td style="color:#ffff">
                                            @if($loan->status == 0)
                                            <span class="px-3 py-2 text-white badge bg-warning bg-opacity-10 rounded-pill">
                                                <i class="fas fa-circle me-1 small"></i>&nbsp;
                                                Pending
                                            </span>
                                            @elseif($loan->status == 1)
                                            <span class="px-3 py-2 text-white badge bg-success bg-opacity-10 rounded-pill">
                                                <i class="fas fa-circle me-1 small"></i>&nbsp;
                                                Accepted
                                            </span>
                                            @elseif($loan->status == 2)
                                            <span class="px-3 py-2 text-white badge bg-warning bg-opacity-10 rounded-pill">
                                                <i class="fas fa-circle me-1 small"></i>&nbsp;
                                                Under Review
                                            </span>
                                            @else
                                            <span class="px-3 py-2 text-white badge bg-danger bg-opacity-10 rounded-pill">
                                                <i class="fas fa-circle me-1 small"></i>&nbsp;
                                                Rejected
                                            </span>
                                            @endif
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4" class="py-4 text-center">
                                            <div class="empty-state">
                                                <i class="mb-3 fas fa-file-invoice-dollar text-muted fa-3x"></i>
                                                <p class="text-muted">No loan history available</p>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @endif
            </div>

            <!-- Side Cards -->
            <div class="col-xl-4">
                @if($user->hasRole('user'))
                <!-- Wallet Balance Card -->
                <div class="mb-4 overflow-hidden border-0 rounded-lg shadow-sm card">
                    <div class="card-body">
                        <div class="mb-3 d-flex justify-content-between align-items-center">
                            <h5 class="mb-0 fw-bold">Wallet Balance</h5>
                            <div class="p-2 wallet-icon rounded-circle bg-primary">
                                <i class="text-white fas fa-wallet fa-lg"></i>
                            </div>
                        </div>

                        <div class="row g-3">
                            <div class="col-6">
                                <div class="p-3 rounded-lg bg-light h-100">
                                    <span class="mb-1 text-muted d-block small">Current Balance</span>
                                    @if($user->wallet->first() == null)
                                    <h4 class="mb-0">K 0.00</h4>
                                    @else
                                    <h4 class="mb-0">K {{ $user->wallet->first()->deposit ?? 0 }}</h4>
                                    @endif
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="p-3 rounded-lg bg-light h-100">
                                    <span class="mb-1 text-muted d-block small">Total Withdrawn</span>
                                    @if($user->wallet->first() == null)
                                    <h4 class="mb-0">K 0.00</h4>
                                    @else
                                    <h4 class="mb-0">K {{ $user->wallet->first()->withdraw ?? 0 }}</h4>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="mt-4">
                            <div class="mb-2 d-flex justify-content-between">
                                <span class="text-muted small">Wallet ID</span>
                                <span class="text-dark small fw-medium">{{ $user->id }}-WALLET</span>
                            </div>
                            <div class="progress" style="height: 6px;">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Payments Card -->
                <div class="overflow-hidden border-0 rounded-lg shadow-sm card">
                    <div class="py-3 bg-white card-header">
                        <h5 class="mb-0 fw-bold">Recent Payments</h5>
                    </div>

                    <div class="p-0 card-body">
                        <div class="py-5 text-center empty-state">
                            <div class="p-4 mb-3 empty-icon bg-light rounded-circle d-inline-flex">
                                <i class="fas fa-receipt text-muted fa-2x"></i>
                            </div>
                            <p class="mb-0 text-muted">No recent payment records</p>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
        @else
        <!-- No Data State -->
        <div class="row">
            <div class="col-xl-12">
                <div class="border-0 rounded-lg shadow-sm card">
                    <div class="py-5 card-body">
                        <div class="text-center">
                            <div class="p-4 mb-3 empty-icon bg-light rounded-circle d-inline-flex">
                                <i class="fas fa-user-slash text-muted fa-3x"></i>
                            </div>
                            <h3 class="mb-2">No Results Found</h3>
                            <p class="text-muted">The client you're looking for doesn't exist or has been removed.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>

<!-- Add required CSS -->
<style>
:root {
    --primary: #6a3093;
    --secondary: rgb(125, 108, 124);
    --success: #2ecc71;
    --danger: #e74c3c;
    --warning: #f39c12;
    --info: #6a3093;
    --light: #f8f9fa;
    --dark: #343a40;
}

.bg-gradient-primary {
    background: linear-gradient(135deg, var(--primary) 0%, #6a3093 100%);
}

.text-primary { color: var(--primary) !important; }
.text-success { color: var(--success) !important; }
.text-danger { color: var(--danger) !important; }
.text-warning { color: var(--warning) !important; }

.bg-primary { background-color: var(--primary) !important; }
.bg-success { background-color: var(--success) !important; }
.bg-danger { background-color: var(--danger) !important; }
.bg-warning { background-color: var(--warning) !important; }

.card {
    transition: all 0.3s ease;
    border: none;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
}

.shadow-sm {
    box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075) !important;
}

.info-icon {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.icon-box {
    width: 45px;
    height: 45px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.empty-icon {
    width: 80px;
    height: 80px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.rounded-lg {
    border-radius: 0.75rem !important;
}

.fw-medium {
    font-weight: 500 !important;
}

.table th, .table td {
    padding: 1rem 1.5rem;
    vertical-align: middle;
}

.form-select:focus {
    box-shadow: none;
    border-color: var(--primary);
}

.empty-state {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.progress {
    overflow: hidden;
    background-color: #f1f1f1;
    border-radius: 1rem;
}

.progress-bar {
    border-radius: 1rem;
}

/* Custom animation for wallet card */
.wallet-icon {
    position: relative;
    overflow: hidden;
}

.wallet-icon:after {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: linear-gradient(to right, rgba(255,255,255,0) 0%, rgba(255,255,255,0.3) 50%, rgba(255,255,255,0) 100%);
    transform: rotate(30deg);
    animation: shine 3s infinite linear;
}

@keyframes shine {
    0% { left: -100%; }
    20% { left: 100%; }
    100% { left: 100%; }
}

/* Custom animation for profile section */
.profile-photo {
    box-shadow: 0 0 0 4px rgba(255,255,255,0.3);
    transition: all 0.3s ease;
}

.profile-photo:hover {
    box-shadow: 0 0 0 8px rgba(255,255,255,0.5);
}

.object-cover {
    object-fit: cover;
}
</style>