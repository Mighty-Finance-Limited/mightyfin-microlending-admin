<div class="content-body">
    <div class="container @role('user') @else mt-4 @endrole">
        <div class="row ">
            <div class="col-xxl-12 col-xl-12 col-lg-12">
                <div class="card home-chart fireworks">
                    <div class="card-header">
                        <h4 class="card-title text-primary home-chart">LOAN INFORMATION</h4>
                        @role('user')@else
                            @if ($this->my_review_status($loan->id) == 1)
                                <span class="m-3 mt-7 alert alert-sm alert-primary text-center items-content-center d-flex gap-2">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lightbulb" viewBox="0 0 16 16">
                                            <path d="M2 6a6 6 0 1 1 10.174 4.31c-.203.196-.359.4-.453.619l-.762 1.769A.5.5 0 0 1 10.5 13a.5.5 0 0 1 0 1 .5.5 0 0 1 0 1l-.224.447a1 1 0 0 1-.894.553H6.618a1 1 0 0 1-.894-.553L5.5 15a.5.5 0 0 1 0-1 .5.5 0 0 1 0-1 .5.5 0 0 1-.46-.302l-.761-1.77a1.964 1.964 0 0 0-.453-.618A5.984 5.984 0 0 1 2 6m6-5a5 5 0 0 0-3.479 8.592c.263.254.514.564.676.941L5.83 12h4.342l.632-1.467c.162-.377.413-.687.676-.941A5 5 0 0 0 8 1"/>
                                        </svg>
                                    </span>
                                    @if ($loan->status == 0)
                                        @if($loan->complete == 0)
                                            <span class="text-warning fw-bold">
                                                Incomplete KYC
                                            </span>
                                        @else
                                            <span class="text-warning fw-bold">
                                                Processing
                                            </span>
                                        @endif
                                    @endif
                                    @if ($loan->status == 1)
                                        <span class="text-success fw-bold">
                                            Accepted
                                        </span>
                                    @endif
                                    @if ($loan->status == 2)
                                        <span class="text-info fw-bold">
                                            Processing
                                        </span>
                                    @endif  
                                    @if ($loan->status == 3)
                                        <span class="text-danger fw-bold">
                                            Loan Request Rejected
                                        </span>
                                    @endif
                                </span>
                            @else
                                <div class="mt-6">
                                    <button wire:click="setLoanID({{ $loan->id }})" data-bs-toggle="modal" data-bs-target="#kt_modal_review_warning" class="btn btn-sm btn-success">Review</button>
                                </div>
                            @endif
                        @endrole
                    </div>
                    <div class="card-body">
                        <div class="home-chart-height">
                        <div class="row">
                            <div
                            class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6"
                            >
                            <div class="chart-price-value">
                                <span>Loan</span>
                                <h5>{{ $loan_product->name }} Loan</h5>
                            </div>
                            </div>
                            <div
                            class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6"
                            >
                            <div class="chart-price-value">
                                <span>Borrowed</span>
                                <h5>{{ $loan->amount ?? 0 }} ZMW</h5>
                            </div>
                            </div>
                            <div
                            class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6"
                            >
                            <div class="chart-price-value">
                                <span>Duration</span>
                                <h5>{{ $loan->repayment_plan }} Month(s)</h5>
                            </div>
                            </div>
                            <div
                            class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6"
                            >
                            <div class="chart-price-value">
                                <span>Paying Back</span>
                                <h5>K {{ App\Models\Application::payback($loan->amount, $loan->repayment_plan) }}</h5>
                            </div>
                            </div>
                        </div>
                        <div id="chartx"></div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-xxl-4 col-xl-4 col-lg-4">
                <div class="card">
                    <div class="card-header">
                    <h4 class="card-title">Download App</h4>
                    </div>
                    <div class="card-body">
                    <div class="app-link">
                        <h5>Get Verified On Our Mobile App</h5>
                        <p>
                        Get mobile app more secure, faster,
                        and reliable.
                        </p>
                        <a href="#" class="btn btn-primary">
                        <img src="images/android.svg" alt="" />
                        </a>
                        <br />
                        <div class="mt-3"></div>
                        <a href="#" class="btn btn-primary">
                        <img src="images/apple.svg" alt="" />
                        </a>
                    </div>
                    </div>
                </div>
            </div> --}}

            <div class="col-xxl-12">
                <div class="card">
                    <div class="card-header">
                    <h4 class="card-title text-primary">USER INFORMATION</h4>
                    {{-- <a href="settings-profile.html" class="btn btn-primary">Edit</a> --}}
                    </div>
                    <div class="card-body row">
                        <div class="col-xxl-4 col-xl-4 col-lg-4">
                            <div class="symbol symbol-150px">

                                @if ($loan->user->profile_photo_path)
                                    <img src="{{ '../public/'.Storage::url($loan->user->profile_photo_path) }}" alt=""/>
                                @else
                                    <img src="https://thumbs.dreamstime.com/b/default-avatar-profile-image-vector-social-media-user-icon-potrait-182347582.jpg" alt=""/>
                                @endif
                            </div>
                        </div>
                        <div class="row col-xxl-8 col-xl-8 col-lg-8">
                            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                                <div class="user-info">
                                    <span>USER ID</span>
                                    <h4>{{ $loan->user->id }}</h4>
                                </div>
                            </div>
                            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                                <div class="user-info">
                                    <span>FULL NAMES</span>
                                    <h4>
                                        {{-- {{ route('client-account', ['key'=>$user->id]) }} --}}
                                        <a target="_blank" href="{{ route('client-account', ['key'=>$loan->user->id]) }}">
                                            {{ $loan->user->fname.' '.$loan->user->lname }}
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-up-right" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5"/>
                                                    <path fill-rule="evenodd" d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0z"/>
                                                </svg>
                                            </span>
                                        </a>

                                    </h4>
                                </div>
                            </div>
                            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                                <div class="user-info">
                                    <span>EMAIL ADDRESS</span>
                                    <h4>{{ $loan->user->email ?? 'Not set'}}</h4>
                                </div>
                            </div>
                            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                                <div class="user-info">
                                    <span>RESIDENCIAL ADDRESS</span>
                                    <h4>{{ $loan->user->address ?? 'Not set'}}</h4>
                                </div>
                            </div>
                            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                                <div class="user-info">
                                    <span>PHONE NUMBER</span>
                                    <h4> <a href="tel:{{ $loan->user->phone }}" style="color: rgb(55, 44, 58)">+260 {{ $loan->user->phone ?? 'Not set'}}</a> </h4>
                                </div>
                            </div>
                            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                                <div class="user-info">
                                    <span>RESIDENCIAL ADDRESS</span>
                                    <h4>{{ $loan->user->address ?? 'Not set'}}</h4>
                                </div>
                            </div>
                            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                                <div class="user-info">
                                    <span>JOINED SINCE</span>
                                    <h4>{{ $loan->user->created_at->toFormattedDateString()}}</h4>
                                </div>
                            </div>
                            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                            <div class="user-info">
                                <span>TYPE</span>
                                <h4>{{ $loan_product->name }} Loan</h4>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            {{-- !important | Staff Use Only --}}
            @role('user')@else
            <div class="col-xxl-12 col-xl-12 col-lg-12 @role('user') @else mt-4 @endrole">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-primary">SUPPORT DOCUMENTS & REFERENCES</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="row col-6">
                                @if ($loan->user->uploads->where('name', 'nrc_file')->isNotEmpty())
                                    <div class="col-6">
                                        <a href="{{ 'public/'.Storage::url($loan->user->uploads->where('name', 'nrc_file')->first()->path) }}"  class="open-modal" data-toggle="modal" data-target="#fileModal" data-file-url="{{ 'public/'.Storage::url($loan->user->uploads[0]->path) }}">
                                            <img width="90" src="https://img.freepik.com/free-vector/illustration-folder-with-document_53876-37005.jpg?w=740&t=st=1676996943~exp=1676997543~hmac=d03d65c77d403c5ed653a733705504e21b5b3fb42e7cfe3c4340f90aaf55f9d2">
                                        </a>
                                        <p class="file-list">NRC uploaded on {{ $loan->user->uploads->where('name', 'nrc_file')->first()->created_at->toFormattedDateString() }}</p>
                                    </div>
                                @endif
                                @if ($loan->user->uploads->where('name', 'tpin_file')->isNotEmpty())
                                    <div class="col-6">
                                        <a href="{{ 'public/'.Storage::url($loan->user->uploads->where('name', 'tpin_file')->first()->path) }}"  class="open-modal" data-toggle="modal" data-target="#fileModal" data-file-url="{{ 'public/'.Storage::url($loan->user->uploads[0]->path) }}">
                                            <img width="90" src="https://img.freepik.com/free-vector/illustration-folder-with-document_53876-37005.jpg?w=740&t=st=1676996943~exp=1676997543~hmac=d03d65c77d403c5ed653a733705504e21b5b3fb42e7cfe3c4340f90aaf55f9d2">
                                        </a>
                                        <p class="file-list">Tpin uploaded on {{ $loan->user->uploads->where('name', 'tpin_file')->first()->created_at->toFormattedDateString() }}</p>
                                    </div>
                                @endif
                            </div>
                            <div class="row col-6">
                                @if ($loan->user->uploads->where('name', 'preapproval')->isNotEmpty())
                                    <div class="col-6">
                                        <a href="{{ 'public/'.Storage::url($loan->user->uploads->where('name', 'preapproval')->first()->path) }}"  class="open-modal" data-toggle="modal" data-target="#fileModal" data-file-url="{{ 'public/'.Storage::url($loan->user->uploads[0]->path) }}">
                                            <img width="90" src="https://img.freepik.com/free-vector/illustration-folder-with-document_53876-37005.jpg?w=740&t=st=1676996943~exp=1676997543~hmac=d03d65c77d403c5ed653a733705504e21b5b3fb42e7cfe3c4340f90aaf55f9d2">
                                        </a>
                                        <p class="file-list">Preapproval uploaded on {{ $loan->user->uploads->where('name', 'preapproval')->first()->created_at->toFormattedDateString() }}</p>
                                    </div>
                                @endif
                                @if ($loan->user->uploads->where('name', 'letterofintro')->isNotEmpty())
                                    <div class="col-6">
                                        <a href="{{ 'public/'.Storage::url($loan->user->uploads->where('name', 'letterofintro')->first()->path) }}"  class="open-modal" data-toggle="modal" data-target="#fileModal" data-file-url="{{ 'public/'.Storage::url($loan->user->uploads[0]->path) }}">
                                            <img width="90" src="https://img.freepik.com/free-vector/illustration-folder-with-document_53876-37005.jpg?w=740&t=st=1676996943~exp=1676997543~hmac=d03d65c77d403c5ed653a733705504e21b5b3fb42e7cfe3c4340f90aaf55f9d2">
                                        </a>
                                        <p class="file-list">Letter of Introduction uploaded on {{ $loan->user->uploads->where('name', 'letterofintro')->first()->created_at->toFormattedDateString() }}</p>
                                    </div>
                                @endif
                            </div>
                            <div class="row col-12">
                                @if ($loan->user->uploads->where('name', 'bankstatement')->isNotEmpty())
                                    <div class="col-3">
                                        <a href="{{ 'public/'.Storage::url($loan->user->uploads->where('name', 'bankstatement')->first()->path) }}"  class="open-modal" data-toggle="modal" data-target="#fileModal" data-file-url="{{ 'public/'.Storage::url($loan->user->uploads[0]->path) }}">
                                            <img width="90" src="https://img.freepik.com/free-vector/illustration-folder-with-document_53876-37005.jpg?w=740&t=st=1676996943~exp=1676997543~hmac=d03d65c77d403c5ed653a733705504e21b5b3fb42e7cfe3c4340f90aaf55f9d2">
                                        </a>
                                        <p class="file-list">Bank Statement uploaded on {{ $loan->user->uploads->where('name', 'bankstatement')->first()->created_at->toFormattedDateString() }}</p>
                                    </div>
                                @endif
                                @if ($loan->user->uploads->where('name', 'payslip_file')->isNotEmpty())
                                    <div class="col-3">
                                        <a href="{{ 'public/'.Storage::url($loan->user->uploads->where('name', 'payslip_file')->first()->path) }}"  class="open-modal" data-toggle="modal" data-target="#fileModal" data-file-url="{{ 'public/'.Storage::url($loan->user->uploads[0]->path) }}">
                                            <img width="90" src="https://img.freepik.com/free-vector/illustration-folder-with-document_53876-37005.jpg?w=740&t=st=1676996943~exp=1676997543~hmac=d03d65c77d403c5ed653a733705504e21b5b3fb42e7cfe3c4340f90aaf55f9d2">
                                        </a>
                                        <p class="file-list">Payslip uploaded on {{ $loan->user->uploads->where('name', 'payslip_file')->first()->created_at->toFormattedDateString() }}</p>
                                    </div>
                                @endif
                                @if ($loan->user->uploads->where('name', 'passport')->isNotEmpty())
                                    <div class="col-3">
                                        <a href="{{ 'public/'.Storage::url($loan->user->uploads->where('name', 'passport')->first()->path) }}"  class="open-modal" data-toggle="modal" data-target="#fileModal" data-file-url="{{ 'public/'.Storage::url($loan->user->uploads[0]->path) }}">
                                            <img width="90" src="https://img.freepik.com/free-vector/illustration-folder-with-document_53876-37005.jpg?w=740&t=st=1676996943~exp=1676997543~hmac=d03d65c77d403c5ed653a733705504e21b5b3fb42e7cfe3c4340f90aaf55f9d2">
                                        </a>
                                        <p class="file-list">Passport Size photo uploaded on {{ $loan->user->uploads->where('name', 'passport')->first()->created_at->toFormattedDateString() }}</p>
                                    </div>
                                @endif
                            </div>
                            <!--end::Table-->
                        </div>
                    </div>
                </div>
            </div>
            @endrole


            @role('user')
                <div class="col-xxl-8 col-xl-6 @role('user') @else mt-4 @endrole">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title text-primary">VERIFY & UPGRADE</h4>
                        </div>
                        <div class="card-body">
                        <h5>
                            Loan Status :
                            @if ($loan->status == 0)
                                @if($loan->complete == 0)
                                    <span class="text-warning">
                                        Incomplete KYC <i class="icofont-warning"></i>
                                    </span>
                                @endif
                            @else
                                @if($loan->complete == 0)
                                    <span class="text-warning">
                                        Incomplete KYC <i class="icofont-warning"></i>
                                    </span>
                                @endif
                            @endif
                            @if ($loan->status == 1)
                                <span class="text-success">
                                    Accepted <i class="icofont-success"></i>
                                </span>
                            @endif
                            @if ($loan->status == 2)
                                <span class="text-success">
                                    Processing <i class="icofont-info"></i>
                                </span>
                            @endif
                            @if ($loan->status == 3)
                                <span class="text-success">
                                    Rejected <i class="icofont-default"></i>
                                </span>
                            @endif
                        </h5>


                        @if ($loan->status == 0)
                            <p>
                                @if($loan->complete == 0)
                                Your loan request needs attention. Please update your profile information within the next 24 hours to avoid potential delays or denial of your application.
                                @else
                                    Your loan request is unverified. Please hold on while we process your request
                                @endif
                            </p>
                            <a href="{{ route('profile.show') }}" class="btn btn-warning"> Update Profile</a>
                        @endif
                        @if ($loan->status == 1)
                            <p>
                                Great news! Your loan request has been accepted. Congratulations!
                            </p>
                            <a href="#" class="btn btn-primary"> Get Cash</a>
                        @endif
                        @if ($loan->status == 2)
                            <p>
                                Your loan request is currently under review. We appreciate your patience and will notify you via email of any updates.
                            </p>
                            {{-- <a href="#" class="btn btn-primary"> Get Verified</a> --}}
                        @endif
                        @if ($loan->status == 3)
                            <p>
                                Loan request rejected. Feel free to reapply later. For assistance, contact customer support.
                            </p>
                            <a href="#" class="btn btn-primary"> Reapply</a>
                        @endif

                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-6 @role('user') @else mt-4 @endrole">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title text-primary">Earn 30% Commission</h4>
                        </div>
                        <div class="card-body">
                            <p>Refer your friends and earn 30% of their trading fees.</p>
                            <a @disabled(true) href="#" class="btn btn-primary"> Referral Program</a>
                        </div>
                    </div>
                </div>
            @else

            @endrole
        </div>

        @role('user') @else
            @if ($this->my_review_status($loan->id) == 1)
                <div class="col-xl-12 col-xxl-12 col-md-12 mt-4 mb-4">
                    <div class="d-flex justify-content-between align-items-center gap-4 text-center items-center">
                        <span>
                            <button class="btn btn-light">Cancel Review</button>
                            <button wire:click="setLoanID({{$loan->id}})" data-bs-target="#kt_modal_decline_warning" data-bs-toggle="modal" class="btn btn-danger" data >Decline</button>
                        </span>
                        <span>
                            @if ($this->my_approval_status($loan->id) == 1)
                                <span class="badge badge-success">You approved this loan
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                                        <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                                    </svg>
                                </span>
                            @else
                                <span class="badge badge-warning">You have not approved this loan</span>
                            @endif
                        </span>
                        <span>
                            <button wire:click="accept({{$loan->id}})" class="btn btn-primary">Approve
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                                    <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                                </svg>
                            </button>
                        </span>
                    </div>
                </div>
            @endif
        @endrole
        <br>
    </div>

    @include('livewire.dashboard.loans.__modals.review-warning')
    @include('livewire.dashboard.loans.__modals.decline-loan')
</div>

