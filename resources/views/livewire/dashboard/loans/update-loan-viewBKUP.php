<div class="content-body">
    <div class="container-fluid">
        <div class="container">
            @if(!$can_edit)
            <form id="updateloandetails" action="{{ route("update-loan-details") }}" method="POST" style="min-height:60vh" enctype="multipart/form-data">
                @csrf
                <div class="card p-4">
                    <h4>Loan Details</h4>
                    <div class="row">
                        <div class="col-lg-6 mb-2">
                            <div class="mb-3">
                                <label class="text-label form-label">Borrower*</label>
                                <input disabled type="text" value="{{ $user->fname.' '.$user->lname}}" class="form-control">                      
                                <input type="hidden" value="{{ $user->id }}" name="borrower_id" class="form-control">                      
                            </div>
                        </div>
                        <input type="hidden" name="loan_id" value="{{$loan->id}}">
                        <input type="hidden" name="old_amount" value="{{$loan->amount}}">
                        
                        <input type="hidden" name="loan_status" value="{{$loan->status}}">
                        <div class="col-lg-6 mb-2">
                            <div class="mb-3">
                                <label class="text-label form-label">Purpose for Loan*</label>
                                <select onchange="changeType()" type="text" value="{{ $loan->type }}" id="myTypeDropdown" name="type" class="form-control">
                                    <option data-display="Select">{{ $loan->type }}</option>
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
                                <input type="text" value="{{$loan->amount}}" id="principalLoan2" name="amount" class="form-control" placeholder="0.00" >
                                {{-- <small id="validprincipal2" style="color:red">Amount is !</small> --}}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-2">
                            <div class="mb-3">
                                <label class="text-label form-label">Duration (Months)</label>
                                <select type="text" value="{{ $loan->repayment_plan }}" name="repayment_plan" class="form-control">
                                    <option data-display="Select">{{ $loan->repayment_plan }}</option>
                                    <option value="1">1 Month</option>
                                    <option value="2">2 Months</option>
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
                                    <option value="18">1 Year 6 Months</option>
                                    <option value="24">2 Years</option>
                                    <option value="30">2 Year 6 Months</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-2">
                            <div class="mb-3">
                                <label class="text-label form-label">Borrower KYC*</label>
                                <select type="text" value="{{ $loan->complete }}" name="complete" class="form-control">
                                    <option data-display="Select" value="{{ $loan->complete }}">{{ $loan->complete == 1 ? 'Skip KYC Update':'Borrower will update KYC' }}</option>
                                    <option value="1">Skip KYC Update</option>
                                    <option value="0">Borrower will update KYC</option>
                                </select>
                            </div>
                        </div>
                        @if($loan->status == 1)
                        <div class="col-lg-6 mb-3">
                            <div class="mb-3">
                                <label class="text-label form-label">Due Date</label>
                                <input type="date" value="{{ $loan->loan->final_due_date }}" name="new_due_date" class="form-control" id="datepicker">
                                <p class="text-primary">Current Due Date: {{ $loan->loan->final_due_date }}</p>
                            </div>
                        </div>
                        @endif
                        <div class="col-lg-6 mb-3">
                            <div class="mb-3">
                                <label class="text-label form-label">Date of Application*</label>
                                <input value="{{$loan->created_at ?? $loan->created_at}}" type="date" name="doa" class="form-control" id="datepicker">
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="mb-3">
                                <label class="text-label form-label">Basic Pay*</label>
                                <input id="basic_pay_field" value="{{ $user->basic_pay }}" name="basic_pay" class=" form-control" >
                                {{-- <small id="validbasicpayl2" style="color:red">Basic Pay is !</small> --}}

                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="mb-3">
                                <label class="text-label form-label">Net Pay*</label>
                                <input id="net_pay_field" value="{{ $user->net_pay }}" name="net_pay" class="form-control">
                                {{-- <small id="validnetpayl2" style="color:red">Net Pay is !</small> --}}
                            </div>
                        </div>
                    </div>
                </div>


                <div class="card p-4">
                    <div id="guarantorLoanRef2">
                        <h4>Gurantors</h4>
                        <div class="row">
                            <div class="col-lg-6 mb-2">
                                <div class="mb-3">
                                    <label class="text-label form-label">Guarantor 1's First Name*</label>
                                    <input type="text" value="{{$loan->gfname}}" name="gfname" id="gfname22" class="form-control" placeholder="Name" >
                                    {{-- <small id="validg_fname22" style="color:red">Missing information!</small> --}}
                                </div>
                            </div>
                            <div class="col-lg-6 mb-2">
                                <div class="mb-3">
                                    <label class="text-label form-label">Guarantor 1's Last Name*</label>
                                    <input type="text" value="{{$loan->glname}}" name="glname" id="glname22" class="form-control" placeholder="Name" >
                                    {{-- <small id="validg_lname22" style="color:red">Missing information!</small> --}}
                                </div>
                            </div>
                            <div class="col-lg-6 mb-2">
                                <div class="mb-3">
                                    <label class="text-label form-label">Guarantor 1's Email Address*</label>
                                    <input type="email" value="{{$loan->gemail}}" name="gemail" id="gemail22" class="form-control" id="emial1" placeholder="example@example.com.com" >
                                    {{-- <small id="validg_email22" style="color:red">Missing information!</small> --}}
                                </div>
                            </div>
                            <div class="col-lg-6 mb-2">
                                <div class="mb-3">
                                    <label class="text-label form-label">Guarantor 1's Phone Number*</label>
                                    <input type="text" value="{{$loan->gphone}}" name="gphone" id="gphone22" class="form-control" placeholder="(+1)408-657-9007" >
                                    {{-- <small id="validg_phone22" style="color:red">Missing information!</small> --}}
                                </div>
                            </div>
                            <div class="col-lg-6 mb-2">
                                <div class="mb-3">
                                    <label class="text-label form-label">Relation*</label>
                                    <select type="text" value="{{$loan->g_relation}}" name="g_relation" id="g_relation22" class="form-control">
                                        <option data-display="Select">{{ $loan->g_relation }}</option>
                                        <option value="Brother">Brother</option>
                                        <option value="Sister">Sister</option>
                                        <option value="Parent">Parent</option>
                                        <option value="Relative">Relative</option>
                                        <option value="Spouse">Spouse</option>
                                        <option value="Work Mate">Work Mate</option>
                                        <option value="Close Friend">Close Friend</option>
                                    </select> 
                                    {{-- <small id="validg_relation22" style="color:red">Missing information!</small> --}}
                                </div>
                            </div>
                            <div class="col-lg-6 mb-2">
                                <div class="mb-3">
                                    <label class="text-label form-label">Gender*</label>
                                    <select type="text" value="{{$loan->g_gender}}" name="g_gender" id="g_gender22" class="form-control">
                                        <option data-display="Select">{{ $loan->g_gender }}</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select> 
                                    {{-- <small id="validg_gender22" style="color:red">Missing information!</small> --}}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 mb-2">
                                <div class="mb-3">
                                    <label class="text-label form-label">Guarantor 2's First Name*</label>
                                    <input type="text" value="{{$loan->g2fname}}" name="g2fname" class="form-control" placeholder="Name" >
                                </div>
                            </div>
                            <div class="col-lg-6 mb-2">
                                <div class="mb-3">
                                    <label class="text-label form-label">Guarantor 2's Last Name*</label>
                                    <input type="text" value="{{$loan->g2lname}}" name="g2lname" class="form-control" placeholder="Name" >
                                </div>
                            </div>
                            <div class="col-lg-6 mb-2">
                                <div class="mb-3">
                                    <label class="text-label form-label">Guarantor 2's Email Address*</label>
                                    <input type="email" value="{{$loan->g2email}}" name="g2email" class="form-control" id="emial1" placeholder="example@example.com.com" >
                                </div>
                            </div>
                            <div class="col-lg-6 mb-2">
                                <div class="mb-3">
                                    <label class="text-label form-label">Guarantor 2's Phone Number*</label>
                                    <input type="text" value="{{$loan->g2phone}}" name="g2phone" class="form-control" placeholder="(+1)408-657-9007" >
                                </div>
                            </div>
                            <div class="col-lg-6 mb-2">
                                <div class="mb-3">
                                    <label class="text-label form-label">Relation*</label>
                                    <select type="text" value="{{ $loan->g2_relation }}" name="g2_relation" class="form-control">
                                        <option data-display="Select">{{ $loan->g2_relation }}</option>
                                        <option value="Brother">Brother</option>
                                        <option value="Sister">Sister</option>
                                        <option value="Parent">Parent</option>
                                        <option value="Relative">Relative</option>
                                        <option value="Spouse">Spouse</option>
                                        <option value="Work Mate">Work Mate</option>
                                        <option value="Close Friend">Close Friend</option>
                                    </select> 
                                </div>
                            </div>
                            <div class="col-lg-6 mb-2">
                                <div class="mb-3">
                                    <label class="text-label form-label">Gender*</label>
                                    <select type="text" value="{{ $loan->g2_gender }}" name="g2_gender" class="form-control">
                                        <option data-display="Select">{{ $loan->g2_gender }}</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select> 
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- NEXT OF KIN SECTION --}}
                    <div id="nok2">
                        <h4>Next of Kin</h4>
                        <div class="row">
                            <div class="col-lg-6 mb-2">
                                <div class="mb-3">
                                    <label class="text-label form-label">Next of Kin's First Name*</label>
                                    <input id="noK_fname22" type="text" value="{{$user->nextkin->first()->fname}}" name="nok_fname" class="form-control" placeholder="Name" >
                                    {{-- <small id="validnok_fname22" style="color:red">Missing information!</small> --}}
                                </div>
                            </div>
                            <div class="col-lg-6 mb-2">
                                <div class="mb-3">
                                    <label class="text-label form-label">Next of Kin's Last Name*</label>
                                    <input id="noK_lname22" type="text" value="{{$user->nextkin->first()->lname}}" name="nok_lname" class="form-control" placeholder="Name" >
                                    {{-- <small id="validnok_lname22" style="color:red">Missing information!</small> --}}
                                </div>
                            </div>
                            <div class="col-lg-6 mb-2">
                                <div class="mb-3">
                                    <label class="text-label form-label">Next of Kin's Email Address*</label>
                                    <input type="email"  value="{{$user->nextkin->first()->email}}" name="nok_email" id="nok_email22" class="form-control" id="emial1" placeholder="example@example.com.com" >
                                    {{-- <small id="validnok_email22" style="color:red">Missing information!</small> --}}
                                </div>
                            </div>
                            <div class="col-lg-6 mb-2">
                                <div class="mb-3">
                                    <label class="text-label form-label">Next of Kin's Phone Number*</label>
                                    <input type="text"  value="{{$user->nextkin->first()->phone}}" name="nok_phone" id="nok_phone22" class="form-control" placeholder="(+260)777888899" >
                                    {{-- <small id="validnok_phone2" style="color:red">Missing information!</small> --}}
                                </div>
                            </div>
                            <div class="col-lg-6 mb-2">
                                <div class="mb-3">
                                    <label class="text-label form-label">Relation*</label>
                                    <select type="text" value="{{$user->nextkin->first()->address}}" name="nok_relation" id="nok_relation22" class="form-control">
                                        <option data-display="Select">{{$user->nextkin->first()->address}}</option>
                                        <option value="Brother">Brother</option>
                                        <option value="Sister">Sister</option>
                                        <option value="Parent">Parent</option>
                                        <option value="Relative">Relative</option>
                                        <option value="Spouse">Spouse</option>
                                        <option value="Work Mate">Work Mate</option>
                                        <option value="Close Friend">Close Friend</option>
                                    </select> 
                                    {{-- <small id="validnok_relation2" style="color:red">Missing information!</small> --}}
                                </div>
                            </div>
                            <div class="col-lg-6 mb-2">
                                <div class="mb-3">
                                    <label class="text-label form-label">Gender*</label>
                                    <select type="text" value="{{$user->nextkin->first()->gender}}" name="nok_gender" id="nok_gender22" class="form-control">
                                        <option data-display="Select">{{$user->nextkin->first()->gender}}</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select> 
                                    {{-- <small id="validnok_gender2" style="color:red">Missing information!</small> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                {{-- Step 3 --}}
                <div class="card p-4">
                    <h4>Support Documents</h4>
                    <div class="row">
                        <div class="col-lg-6 mb-2">
                            <div class="mb-3">
                                <label class="text-label form-label">NRC Copy*</label>
                                <input type="file" value="{{ $loan->nrc_file }}" placeholder="{{ $loan->nrc_file }}" name="nrc_file" class="form-control" id="nrcFile" >
                            </div>
                        </div>
                        <div class="col-lg-6 mb-2">
                            <div class="mb-3">
                                <label class="text-label form-label">Payslip (leave empty if not applicable)</label>
                                <input type="file" value="{{ $loan->payslip_file }}" name="payslip_file" class="form-control" id="payslip_file" >
                            </div>
                        </div>
                        <div class="col-lg-6 mb-2">
                            <div class="mb-3">
                                <label class="text-label form-label">TPIN*</label>
                                <input type="file" value="{{ $loan->tpin_file }}" name="tpin_file" class="form-control" id="tpin_file" >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex">
                    <button onclick="isLoanding()" class="btn btn-primary btn-square">
                        Save Changes
                    </button>
                </div>
            </form>
            <div id="loaderloanupdate" class="mx-auto">
                <div class="container-fluid content-center justify-center items-center">
                    <img width="60" src="{{ asset('public/loader/loading.gif') }}">
                    <span>Please wait a minute</span>
                </div>
            </div>
            @else
            <div id="transactionExists" class="mx-auto">
                <div class="col-xl-12">
                    <div class="alert alert-primary left-icon-big alert-dismissible fade show">
                        <div class="media">
                            <div class="alert-left-icon-big">
                                <span>
                                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>	
                                </span>
                            </div>
                            <div class="media-body">
                                <h2 class="mt-1 mb-2">Not Applicable!</h2>
                                <p class="mb-0">
                                    Can not edit loan details, transactions are currently in progress, view <a  href="{{ route('loan-statement', ['id'=>$loan->id]) }}">Loan Statement</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>  
</div>
<script type="text/javascript">    
    const type = '{{ $loan_type }}';
    document.getElementById("updateloandetails").style.display = "block";
    document.getElementById("loaderloanupdate").style.display = "none";
    
    if(type !== 'Asset Financing'){
        document.getElementById("nok2").style.display = "block";
        document.getElementById("guarantorLoanRef2").style.display = "none";
    }else{
        document.getElementById("nok2").style.display = "none";
        document.getElementById("guarantorLoanRef2").style.display = "block";
    }

    function changeType(){
        const dropdown = document.getElementById("myTypeDropdown");
        const selectedValue = dropdown.value;
        if(selectedValue !== 'Asset Financing'){
            document.getElementById("nok2").style.display = "block";
            document.getElementById("guarantorLoanRef2").style.display = "none";
        }else{
            document.getElementById("nok2").style.display = "none";
            document.getElementById("guarantorLoanRef2").style.display = "block";
        }
    }

    function isLoanding(){
        document.getElementById("updateloandetails").style.display = "none";
        document.getElementById("loaderloanupdate").style.display = "block";
    }
</script>