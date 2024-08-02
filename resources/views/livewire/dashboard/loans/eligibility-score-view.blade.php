<div wire:poll.1000000ms class="content-body">
    <div class="container-fluid">
        <div class="bg-white shadow rounded-lg p-4">
            <div class="flex justify-between items-center mb-4">
                <a href="{{ route('view-loan-requests') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/>
                    </svg>
                </a>
                <h3 class="text-lg font-bold text-gray-700">Loan Eligibility Score</h3>
            </div>
            <div class="mb-6">
              <p class="text-gray-600 mb-2">Requested Loan Amount</p> 
              <h2 class="text-3xl font-bold text-indigo-600">K {{$loan->amount}}</h2>
            </div>
            <ul class="divide-y divide-gray-200">
                {{-- <li class="py-2 flex justify-between items-center">
                  <span class="font-medium text-gray-700">Credit Score</span>
                  <span class="px-3 py-1 bg-indigo-600 text-primary rounded-md">750</span>
                </li> --}}
              <li class="py-2 flex justify-between items-center">
                <span class="font-medium text-gray-700">Interest Rate</span>
                <span class="px-3 py-1 bg-indigo-600 text-primary rounded-md">
                    @if($loan->repayment_plan > 1)
                    1.2
                    @else
                    0.2
                    @endif
                </span>
              </li>
              <li class="py-2 flex justify-between items-center">
                <span class="font-medium text-gray-700">Basic Pay</span>
                <span class="px-3 py-1 bg-indigo-600 text-primary rounded-md">K {{ $loan->user->basic_pay ?? 0 }}</span>
              </li>
              <li class="py-2 flex justify-between items-center">
                <span class="font-medium text-gray-700">Total Net Pay</span>
                <span class="px-3 py-1 bg-indigo-600 text-primary rounded-md">K {{ $loan->user->net_pay ?? 0 }}</span>
              </li>
              <li class="py-2 flex justify-between items-center">
                <span class="font-medium text-gray-700">Net Pay Before Loan Recovery</span>
                <span class="px-3 py-1 bg-indigo-600 text-primary rounded-md">{{ $loan->user->net_pay ?? 0 }}</span>
              </li>
              <li class="py-2 flex justify-between items-center">
                <span class="font-medium text-gray-700">Net Pay After Loan Recovery</span>
                <span class="px-3 py-1 bg-indigo-600 text-primary rounded-md">{{ $net_pay_alr ?? 0 }}</span>
              </li>
              <li class="py-2 flex justify-between items-center">
                <span class="font-medium text-gray-700">Attached Payslip</span>
                <span class="px-3 py-1 bg-indigo-600 text-primary rounded-md">
                    <a href="{{ 'public/'.Storage::url($loan->payslip_file) }}" download="{{ 'public/'.Storage::url($loan->payslip_file) }}">
                        Payslip File
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                            <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                            <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                        </svg>
                    </a>
                </span>
              </li>
            </ul>
            <div class="mt-6">
                <div>
                    <div class="col-xl-6">
                        @if(App\Models\Application::loan_assemenent_table($loan)['credit_score'])
                        <div class="alert alert-success left-icon-big alert-dismissible fade show">
                            <button type="button" class="btn-close" data-dismiss="alert" aria-label="btn-close"><span><i class="fa-solid fa-xmark"></i></span>
                            </button>
                            <div class="media">
                                <div class="alert-left-icon-big">
                                    <span><i class="mdi mdi-check-circle-outline"></i></span>
                                </div>
                                <div class="media-body">
                                    <h5 class="mt-1 mb-2">ELIGIBLE!</h5>
                                    <p class="mb-0">Borrower is eligibilible for {{$loan->type}} Loan.</p>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="alert alert-danger left-icon-big alert-dismissible fade show">
                            {{-- <button type="button" class="btn-close" data-dismiss="alert" aria-label="btn-close"><span><i class="fa-solid fa-xmark"></i></span>
                            </button> --}}
                            <div class="media">
                                <div class="alert-left-icon-big">
                                    <span><i class="mdi mdi-cancel"></i></span>
                                </div>
                                <div class="media-body">
                                    <h5 class="mt-1 mb-2">NOT ELIGIBLE!</h5>
                                    <p class="mb-0">Borrower is NOT eligibilible for {{$loan->type}} Loan.</p>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                    {{-- <div class="col-xl-6">
                        <div class="alert alert-danger left-icon-big alert-dismissible fade show">
                            <button type="button" class="btn-close" data-dismiss="alert" aria-label="btn-close"><span><i class="fa-solid fa-xmark"></i></span>
                            </button>
                            <div class="media">
                                <div class="alert-left-icon-big">
                                    <span><i class="mdi mdi-alert"></i></span>
                                </div>
                                <div class="media-body">
                                    <h5 class="mt-1 mb-2">NOT ELIGIBLE!</h5>
                                    <p class="mb-0">Borrow is NOT eligibilible at the moment due to circumstances.</p>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
              {{-- <a href="#" class="btn btn-square btn-sm btn-primary block w-full bg-indigo-600 hover:bg-indigo-700 font-semibold py-2 px-4">Apply Now</a> --}}
            </div>
        </div>
    </div>    
</div>
