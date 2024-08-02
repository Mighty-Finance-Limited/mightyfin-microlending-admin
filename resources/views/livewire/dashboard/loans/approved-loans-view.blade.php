<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <br>
            <div class="col-12">
                @if(!empty($loan_requests->toArray()))
                <div class="">

                    @role('user')
                    <div style="background-color:#792db8;@role('user') @else margin-top:2%; padding:2%; @endrole " class="card-header">

                        <h4 class="card-title" style=" color:#f0f0f0">
                            <svg version="1.1" id="Uploaded to svgrepo.com" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="35" height="35" viewBox="0 0 32 32" xml:space="preserve" fill="#af83c3" stroke="#af83c3" stroke-width="0.48">

                                <g id="SVGRepo_bgCarrier" stroke-width="0"/>

                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>

                                <g id="SVGRepo_iconCarrier"> <style type="text/css"> .feather_een{fill:#ffffff;} </style> <path class="feather_een" d="M3,11c0-0.552,0.448-1,1-1s1,0.448,1,1c0,0.552-0.448,1-1,1S3,11.552,3,11z M4,22c0.552,0,1-0.448,1-1 c0-0.552-0.448-1-1-1s-1,0.448-1,1C3,21.552,3.448,22,4,22z M28,10c-0.552,0-1,0.448-1,1c0,0.552,0.448,1,1,1s1-0.448,1-1 C29,10.448,28.552,10,28,10z M21,16c0,3.314-1.686,6-5,6s-5-2.686-5-6s1.686-6,5-6S21,12.686,21,16z M20,16c0-2.417-1.051-5-4-5 s-4,2.583-4,5c0,2.417,1.051,5,4,5S20,18.417,20,16z M28,20c-0.552,0-1,0.448-1,1c0,0.552,0.448,1,1,1s1-0.448,1-1 C29,20.448,28.552,20,28,20z M31,12.28V22c0,1.105-0.895,2-2,2h-9.686l-6.849,6.849c-0.391,0.391-0.902,0.586-1.414,0.586 s-1.024-0.195-1.414-0.586l-6.873-6.873c-0.923-0.11-1.647-0.844-1.742-1.771C0.432,21.481,0.425,20.451,1,19.72V10 c0-1.105,0.895-2,2-2h9.686l6.849-6.849c0.391-0.391,0.902-0.586,1.414-0.586s1.024,0.195,1.414,0.586l6.873,6.873 c0.923,0.11,1.647,0.843,1.742,1.771C31.568,10.519,31.575,11.549,31,12.28z M14.101,8h13.698l-6.142-6.142 c-0.189-0.189-0.44-0.293-0.707-0.293s-0.518,0.104-0.707,0.293L14.101,8z M17.899,24H4.201l6.142,6.142 c0.189,0.189,0.44,0.293,0.707,0.293c0.267,0,0.518-0.104,0.707-0.293L17.899,24z M30,10c0-0.551-0.449-1-1-1H3 c-0.551,0-1,0.449-1,1v12c0,0.551,0.449,1,1,1h26c0.551,0,1-0.449,1-1V10z"/> </g>

                                </svg>
                            View All Loans
                        </h4>

                        <!-- <div>
                            <button title="Export to Excel" wire:click="exportLoans()" class="btn btn-square btn-success">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-spreadsheet" viewBox="0 0 16 16">
                                    <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V9H3V2a1 1 0 0 1 1-1h5.5v2zM3 12v-2h2v2H3zm0 1h2v2H4a1 1 0 0 1-1-1v-1zm3 2v-2h3v2H6zm4 0v-2h3v1a1 1 0 0 1-1 1h-2zm3-3h-3v-2h3v2zm-7 0v-2h3v2H6z"/>
                                </svg>
                            </button>
                            <button onclick="printLoansTable()" title="Export all to PDF" class="btn btn-square btn-warning">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filetype-pdf" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5ZM1.6 11.85H0v3.999h.791v-1.342h.803c.287 0 .531-.057.732-.173.203-.117.358-.275.463-.474a1.42 1.42 0 0 0 .161-.677c0-.25-.053-.476-.158-.677a1.176 1.176 0 0 0-.46-.477c-.2-.12-.443-.179-.732-.179Zm.545 1.333a.795.795 0 0 1-.085.38.574.574 0 0 1-.238.241.794.794 0 0 1-.375.082H.788V12.48h.66c.218 0 .389.06.512.181.123.122.185.296.185.522Zm1.217-1.333v3.999h1.46c.401 0 .734-.08.998-.237a1.45 1.45 0 0 0 .595-.689c.13-.3.196-.662.196-1.084 0-.42-.065-.778-.196-1.075a1.426 1.426 0 0 0-.589-.68c-.264-.156-.599-.234-1.005-.234H3.362Zm.791.645h.563c.248 0 .45.05.609.152a.89.89 0 0 1 .354.454c.079.201.118.452.118.753a2.3 2.3 0 0 1-.068.592 1.14 1.14 0 0 1-.196.422.8.8 0 0 1-.334.252 1.298 1.298 0 0 1-.483.082h-.563v-2.707Zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638H7.896Z"/>
                                </svg>
                            </button>
                            @hasanyrole('admin')
                            <a target="_blank" href="{{ route('proxy-loan-create')}}" class="btn btn-square btn-primary">
                                <span class="mx-2">Create New Loan</span>
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-up-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5z"/>
                                        <path fill-rule="evenodd" d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0v-5z"/>
                                    </svg>
                                </span>
                            </a>
                            @endhasanyrole
                        </div> -->
                    </div>
                    @endrole

                    <div class="card-body pb-0" style="padding-bottom: 30%">
                        @if (Session::has('attention'))
                        <div wire:ignore.self class="intro-x alert alert-secondary w-1/2 alert-dismissible justify-center show flex items-center mb-2" role="alert">
                            <i data-lucide="alert-octagon" class="w-6 h-6 mr-2"></i>
                            {{ Session::get('attention') }}
                            <button type="button" class="btn-close" data-tw-dismiss="alert" aria-label="Close">
                                <i data-lucide="x" class="w-4 h-4"></i>
                            </button>
                        </div>
                        @elseif (Session::has('error_msg'))
                        <div wire:ignore.self class="intro-x alert alert-danger w-1/2 alert-dismissible justify-center show flex items-center mb-2" role="alert">
                            <i data-lucide="alert-octagon" class="w-6 h-6 mr-2"></i>
                            {{ Session::get('error_msg') }}
                            <button type="button" class="btn-close" data-tw-dismiss="alert" aria-label="Close">
                                <i data-lucide="x" class="w-4 h-4"></i>
                            </button>
                        </div>
                        @endif
                        <div wire:ignore.self  class="table-responsive patient">
                            <div class="row py-2">
                                {{-- Admin Only --}}
                                @can('accept and reject loan requests')
                                {{-- <div wire:ignore class="col-xl-3 center">
                                    <select multiple wire:model.lazy="status" class="default-select form-control wide mt-3" aria-placeholder="Settlement Type" placeholder="Status">
                                        <option value="">Any</option>
                                        <option value="0">Pending</option>
                                        <option value="1">Accepted</option>
                                        <option value="2">Under Review</option>
                                        <option value="3">Rejected</option>
                                    </select>
                                </div>
                                <div wire:ignore class="col-xl-3 center">
                                    <select multiple wire:model.lazy="type" class="default-select form-control wide mt-3" aria-placeholder="Loan" placeholder="Loan Types">
                                        <option value="Personal">Personal Loan</option>
                                        <option value="Education">Education Loan</option>
                                        <option value="Asset Financing">Asset Financing Loan</option>
                                        <option value="Home Improvement">Home Improvements Loan</option>
                                        <option value="Agri Business">Agri Business Loan</option>
                                        <option value="Women in Business (Femiprise) Soft">Women in Business Loan</option>
                                    </select>
                                </div> --}}
                                @endcan
                                <div class="col-xl-6 center">
                                    {{-- <button wire:click="changeView('grid')" class="mt-3 btn {{ $view === 'grid' ? 'btn-primary':'btn-light' }} btn-square" title="View Grid">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-grid-3x3-gap" viewBox="0 0 16 16">
                                            <path d="M4 2v2H2V2h2zm1 12v-2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1zm0-5V7a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1zm0-5V2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1zm5 10v-2a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1zm0-5V7a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1zm0-5V2a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1zM9 2v2H7V2h2zm5 0v2h-2V2h2zM4 7v2H2V7h2zm5 0v2H7V7h2zm5 0h-2v2h2V7zM4 12v2H2v-2h2zm5 0v2H7v-2h2zm5 0v2h-2v-2h2zM12 1a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1h-2zm-1 6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1V7zm1 4a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-2a1 1 0 0 0-1-1h-2z"/>
                                        </svg>
                                    </button> --}}
                                    {{-- <button wire:click="changeView('table')" class="mt-3 btn {{ $view === 'table' ? 'btn-primary':'btn-light' }} btn-square" title="View Grid">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-table" viewBox="0 0 16 16">
                                            <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z"/>
                                        </svg>
                                    </button>
                                    <button wire:click="changeView('assesment')" class="mt-3 btn {{ $view === 'assesment' ? 'btn-primary':'btn-light' }} btn-square" title="View Assesement">
                                        Assesment
                                        <span class="btn-icon-end">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-spreadsheet-fill" viewBox="0 0 16 16">
                                                <path d="M6 12v-2h3v2H6z"/>
                                                <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM3 9h10v1h-3v2h3v1h-3v2H9v-2H6v2H5v-2H3v-1h2v-2H3V9z"/>
                                            </svg>
                                        </span>
                                    </button> --}}
                                </div>
                                {{-- End Amin Only --}}
                            </div>
                            @include('livewire.dashboard.__parts.dash-alerts')

                            <div id="loans_table_print_view">
                                @if($view === 'list')
                                @role('user')
                                    @include('livewire.dashboard.loans.__parts.list-loan-request')
                                @else
                                    @include('livewire.dashboard.loans.__parts.staff-loan-request-table')
                                @endrole
                                @endif
                                @if($view === 'table')
                                    @include('livewire.dashboard.loans.__parts.default-loan-request-table')
                                @endif

                                @if($view === 'grid')
                                    @include('livewire.dashboard.loans.__parts.grid-loan-requests')
                                @endif

                                @if($view === 'assesment')
                                    @include('livewire.dashboard.loans.__parts.assesment-loan-request-table')
                                @endif
                            </div>
                            <div class="flex items-center justify-center text-xs my-4 mx-4">
                                {{-- {{ $requests->links() }} --}}
                            </div>
                        </div>
                    </div>
                </div>

                @else
                    {{-- Illustrate No Loan --}}
                    <div class="container m-12 d-flex justify-content-center align-items-center">
                        <div class="col-12 text-center">
                            <img width="300" src="{{ asset('public/mfs/admin/assets/media/illustrations/sigma-1/loan.png')}}" alt="">
                            @role('user')
                            <div class="my-4">
                                <a href="{{ route('new-loan') }}" style="background-color:#571d58;" class="btn btn-primary">
                                    <strong>Get a Loan</strong>
                                </a>
                            </div>

                            <div class="col-12 mt-3 text-center">
                                <p class="text-muted">Need help or have questions? <a href="{{ route('contact') }}">Contact us</a>.</p>
                            </div>
                            @endrole
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>

                @endif
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="updateDueDate" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-header bg-primary text-white">
                <h3 style="color:#fff">{{ $loan_request->type }} Loan</h3>
                <h5 style="color:#fff">{{ $loan_request->fname.' '.$loan_request->lname }}</h5>
            </div>
            <div class="modal-content p-4">
                @if ($loan_request !== null)
                <div class="row mb-3">
                    <div class="col-xl-12">
                        <h5>Amount: {{ $loan_request->amount }}</h5>
                        <h5>Duration: {{ $loan_request->repayment_plan }} Months</h5>
                        <h6>Date of Application:
                            @if ($loan_request->doa !== null)
                                @php
                                    $date_str = $loan_request->doa;
                                    $date = DateTime::createFromFormat('Y-m-d H:i:s', $date_str);
                                    echo $date->format('F j, Y, g:i a');
                                @endphp
                            @else
                            {{ $loan_request->created_at->toFormattedDateString() }}
                            @endif

                        </h6>
                    </div>

                </div>
                @endif
                <div class="col-xl-12">
                    <div class="mb-3">
                        <div>
                            <h5 class="text-label form-label text-warning">Change Due Date (Optional)</h5>
                            <input type="date" placeholder="Due Date" name="datepicker" wire:model.defer="due_date" class=" form-control" id="">
                        </div>
                        <br>
                        <button  data-bs-dismiss="modal" wire:click="clear()" class="btn btn-light btn-square">Cancel</button>
                        @if($loan_request !== null)
                            <button wire:click="accept({{ $loan_request->id }})" data-bs-dismiss="modal" class="btn btn-primary btn-square">Approve Loan</button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div wire:ignore class="modal fade" id="createNewLoanMain" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content p-4">

                <div id="smartwizard" class="form-wizard order-create">
                    <ul class="nav nav-wizard">
                        <li>
                            <a class="nav-link" href="#wizard_Service">
                                <span>1</span>
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" href="#wizard_Time">
                                <span>2</span>
                            </a>
                        </li>
                        {{-- <li><a class="nav-link" href="#wizard_Details">
                            <span>3</span>
                        </a></li> --}}
                        <li>
                            <a class="nav-link" href="#wizard_Payment">
                                <span>3</span>
                            </a>
                        </li>
                    </ul>
                    <form id="kyc_form" class="tab-content" action="{{ route("proxy-apply-loan") }}" method="POST" style="min-height:60vh" enctype="multipart/form-data">
                        @csrf
                        <div id="wizard_Service" class="tab-pane" role="tabpanel">
                            <div class="row">

                                <div class="col-lg-6 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Borrower*</label>
                                        <select type="text" name="borrower_id" class="form-control">
                                            @forelse ($users as $user)
                                                @if(empty($user->loans->toArray()))
                                                    <option wire:model="new_loan_user" value="{{ $user->id }}">{{ $user->fname.' '.$user->lname}}</option>
                                                @endif
                                            @empty
                                            <option>No Borrowers Available. <a target="_blank" href="{{ route('borrowers') }}">Add Borrowers</a></option>
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                                <input type="hidden" name="proxyloan" value="proxyloan">
                                <div class="col-lg-6 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Purpose for Loan*</label>
                                        <select type="text" name="type" class="form-control">
                                            <option value="Personal">Personal</option>
                                            <option value="Education">Education</option>
                                            <option value="Asset Financing">Asset Financing</option>
                                            <option value="Home Improvement">Home Improvements</option>
                                            <option value="Agri Business">Agri Business</option>
                                            <option value="Women in Business (Femiprise) Soft">Women in Business (Femiprise) Soft Loan</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-6 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Amount (ZMW)</label>
                                        <input type="text" id="principalLoan2" name="amount" class="form-control" placeholder="0.00" required>
                                        <small id="validprincipal2" style="color:red">Amount is required!</small>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Duration*</label>
                                        <select type="text" name="repayment_plan" class="form-control">
                                            <option value="1">1 Month</option>
                                            <option value="2">2 Month</option>
                                            <option value="3">3 Months</option>
                                            <option value="4">4 Months</option>
                                            <option value="5">5 Months</option>
                                            <option value="6">6 Months</option>
                                            <option value="7">7 Months</option>
                                            <option value="8">8 Months</option>
                                            <option value="9">9 Months</option>
                                            <option value="10">10 Months</option>
                                            <option value="11">11 Months</option>
                                            <option value="12">12 Months</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Borrower KYC*</label>
                                        <select type="text" name="bypass" class="form-control">
                                            <option value="true">Skip KYC Update</option>
                                            <option value="false">Borrower will update KYC</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Date of Application*</label>
                                        <input name="datepicker" type="date" name="created_at" class="form-control" id="datepicker">
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Basic Pay*</label>
                                        <input id="basic_pay_field" value="{{ $user_basic_pay }}" name="basic_pay" class=" form-control" >
                                        <small id="validbasicpayl2" style="color:red">Basic Pay is required!</small>

                                    </div>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Net Pay*</label>
                                        <input id="net_pay_field" value="{{ $user_net_pay }}" name="net_pay" class="form-control">
                                        <small id="validnetpayl2" style="color:red">Net Pay is required!</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="wizard_Time" class="tab-pane" role="tabpanel">
                            <div class="row">
                                <div class="col-lg-6 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Guarantor 1's First Name*</label>
                                        <input type="text" name="gfname" class="form-control" placeholder="Name" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Guarantor 1's Last Name*</label>
                                        <input type="text" name="glname" class="form-control" placeholder="Name" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Guarantor 1's Email Address*</label>
                                        <input type="email" name="gemail" class="form-control" id="emial1" placeholder="example@example.com.com" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Guarantor 1's Phone Number*</label>
                                        <input type="text" name="gphone" class="form-control" placeholder="(+1)408-657-9007" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Relation*</label>
                                        <select type="text" name="g_relation" class="form-control">
                                            <option value="Work Mate">Work Mate</option>
                                            <option value="Relative">Relative</option>
                                            <option value="Close Friend">Close Friend</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Gender*</label>
                                        <select type="text" name="g_gender" class="form-control">
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Guarantor 2's First Name*</label>
                                        <input type="text" name="g2fname" class="form-control" placeholder="Name" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Guarantor 2's Last Name*</label>
                                        <input type="text" name="g2lname" class="form-control" placeholder="Name" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Guarantor 2's Email Address*</label>
                                        <input type="email" name="g2email" class="form-control" id="emial1" placeholder="example@example.com.com" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Guarantor 2's Phone Number*</label>
                                        <input type="text" name="g2phone" class="form-control" placeholder="(+1)408-657-9007" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Relation*</label>
                                        <select type="text" name="g2_relation" class="form-control">
                                            <option value="Work Mate">Work Mate</option>
                                            <option value="Relative">Relative</option>
                                            <option value="Close Friend">Close Friend</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Gender*</label>
                                        <select type="text" name="g2_gender" class="form-control">
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div id="wizard_Details" class="tab-pane" role="tabpanel">
                            <div class="row">
                                <div class="col-sm-4 mb-2">
                                    <h4>Monday *</h4>
                                </div>
                                <div class="col-6 col-sm-4 mb-2">
                                    <div class="mb-3">
                                        <input class="form-control" value="9.00" type="number" name="input1" id="input1">
                                    </div>
                                </div>
                                <div class="col-6 col-sm-4 mb-2">
                                    <div class="mb-3">
                                        <input class="form-control" value="6.00" type="number" name="input2" id="input2">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 mb-2">
                                    <h4>Tuesday *</h4>
                                </div>
                                <div class="col-6 col-sm-4 mb-2">
                                    <div class="mb-3">
                                        <input class="form-control" value="9.00" type="number" name="input3" id="input3">
                                    </div>
                                </div>
                                <div class="col-6 col-sm-4 mb-2">
                                    <div class="mb-3">
                                        <input class="form-control" value="6.00" type="number" name="input4" id="input4">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 mb-2">
                                    <h4>Wednesday *</h4>
                                </div>
                                <div class="col-6 col-sm-4 mb-2">
                                    <div class="mb-3">
                                        <input class="form-control" value="9.00" type="number" name="input5" id="input5">
                                    </div>
                                </div>
                                <div class="col-6 col-sm-4 mb-2">
                                    <div class="mb-3">
                                        <input class="form-control" value="6.00" type="number" name="input6" id="input6">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 mb-2">
                                    <h4>Thrusday *</h4>
                                </div>
                                <div class="col-6 col-sm-4 mb-2">
                                    <div class="mb-3">
                                        <input class="form-control" value="9.00" type="number" name="input7" id="input7">
                                    </div>
                                </div>
                                <div class="col-6 col-sm-4 mb-2">
                                    <div class="mb-3">
                                        <input class="form-control" value="6.00" type="number" name="input8" id="input8">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 mb-2">
                                    <h4>Friday *</h4>
                                </div>
                                <div class="col-6 col-sm-4 mb-2">
                                    <div class="mb-3">
                                        <input class="form-control" value="9.00" type="number" name="input9" id="input9">
                                    </div>
                                </div>
                                <div class="col-6 col-sm-4 mb-2">
                                    <div class="mb-3">
                                        <input class="form-control" value="6.00" type="number" name="input10" id="input10">
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <div id="wizard_Payment" class="tab-pane" role="tabpanel">
                            <div class="row">
                                <div class="col-lg-6 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">NRC Copy*</label>
                                        <input type="file" name="nrc_file" class="form-control" id="nrcFile" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Payslip (leave empty if not applicable)</label>
                                        <input type="file" name="payslip_file" class="form-control" id="payslip_file" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">TPIN*</label>
                                        <input type="file" name="tpin_file" class="form-control" id="tpin_file" required>
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="row">
                                <div class="col-12">
                                    <div class="skip-email text-center">
                                        <p>Or if want skip this step entirely and setup it later</p>
                                        <a href="javascript:void(0)">Skip step</a>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </form>
                </div>
                <div id="loaderloanrequest" class="mx-auto">
                    <div class="container-fluid content-center justify-center items-center">
                        <img width="60" src="{{ asset('public/loader/loading.gif') }}">
                        <span>Please wait a minute</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- pickdate -->

    <script language = "javascript" type = "text/javascript">
        document.getElementById("loaderloanrequest").style.display = "none";
        document.getElementById("validbasicpayl2").style.display = "none";
        document.getElementById("validnetpayl2").style.display = "none";
        document.getElementById("validprincipal2").style.display = "none";
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script>
    <!-- html2canvas library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function (e) {
            $('#prof_image_create').change(function(){
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#preview-image-before-upload_create').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });
        });

        function printLoansTable(){
            $('.actions-btns').hide();
            // Get the HTML element that you want to convert to PDF
            const element = document.getElementById('loans_table_print_view');
            var pdfWidth = 210; // mm
            var pdfHeight = 297; // mm
            // Create a new jsPDF instance
            const doc = new jsPDF('landscape');
            // Use the html2canvas library to render the element as a canvas
            html2canvas(element).then(canvas => {
                // Convert the canvas to an image data URL
                const imgData = canvas.toDataURL('image/png');
                // Add the image data URL to the PDF document
                doc.addImage(
                    imgData,
                    'PNG',
                    2, // x-coordinate
                    2, // y-coordinate
                );

                // Save the PDF document
                doc.save('All Loans.pdf');

                $('.actions-btns').show();
            });
        }
    </script>
</div>

