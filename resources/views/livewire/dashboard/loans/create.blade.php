<div class="content-body">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Create a Loan </h4>
                <a target="_blank" href="{{ route('view-loan-requests')}}" class="btn btn-square btn-primary">
                    <span class="mx-2">View all Loans</span>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-up-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5z"/>
                            <path fill-rule="evenodd" d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0v-5z"/>
                        </svg>
                    </span>
                </a>
            </div>
            
            <div class="card-body">
                <div id="createNewLoanMain" tabindex="-1" aria-hidden="true">
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
                                                    <select type="text" id="user_field_id" name="borrower_id" class="form-control" data-live-search="true">
                                                        <option value="">Search</option>
                                                        @forelse ($users as $user)
                                                            @if(App\Models\Loans::hasLoan($user->id))
                                                                <option wire:click="updated({{$user->id}})" value="{{ $user->id }}">{{ $user->fname.' '.$user->lname}}</option>
                                                            @endif
                                                        @empty
                                                        <option value="">No Customers</option>
                                                        @endforelse
                                                    </select> 
                                                    <small id="validuser_id" style="color:red">You need to pick a borrower!</small>

                                                                                   
                                                </div>
                                            </div>
                                            <input type="hidden" name="proxyloan" value="proxyloan">
                                            <div class="col-lg-6 mb-2">
                                                <div class="mb-3">
                                                    <label class="text-label form-label">Purpose for Loan*</label>
                                                    <select type="text" onchange="changeType()" id="loan_type_id1" name="type" class="form-control">
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
                                                        <option value="2">2 Months</option>
                                                        <option value="3">3 Months</option>
                                                        <option value="4">4 Months</option>
                                                        <option value="5">5 Months</option>
                                                        <option value="6">6 Months</option>
                                                        {{-- <option value="7">7 Months</option>
                                                        <option value="8">8 Months</option>
                                                        <option value="9">9 Months</option>
                                                        <option value="10">10 Months</option>
                                                        <option value="11">11 Months</option>
                                                        <option value="12">12 Months</option> --}}
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
                                                    <label class="text-label form-label">Date of Application (Optional)</label>
                                                    <input name="datepicker" type="date" class="form-control" id="datepicker">
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
                                        <div id="guarantorLoanRef">
                                            <div class="row">
                                                <div class="col-lg-6 mb-2">
                                                    <div class="mb-3">
                                                        <label class="text-label form-label">Guarantor 1's First Name*</label>
                                                        <input type="text" name="gfname" id="gfname22" class="form-control" placeholder="Name" required>
                                                        <small id="validg_fname22" style="color:red">Missing information!</small>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="mb-3">
                                                        <label class="text-label form-label">Guarantor 1's Last Name*</label>
                                                        <input type="text" name="glname" id="glname22" class="form-control" placeholder="Name" required>
                                                        <small id="validg_lname22" style="color:red">Missing information!</small>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="mb-3">
                                                        <label class="text-label form-label">Guarantor 1's Email Address*</label>
                                                        <input type="email" name="gemail" id="gemail22" class="form-control" id="emial1" placeholder="example@example.com.com" required>
                                                        <small id="validg_email22" style="color:red">Missing information!</small>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="mb-3">
                                                        <label class="text-label form-label">Guarantor 1's Phone Number*</label>
                                                        <input type="text" name="gphone" id="gphone22" class="form-control" placeholder="(+1)408-657-9007" required>
                                                        <small id="validg_phone22" style="color:red">Missing information!</small>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="mb-3">
                                                        <label class="text-label form-label">Relation*</label>
                                                        <select type="text" name="g_relation" id="g_relation22" class="form-control">
                                                            <option value="Brother">Brother</option>
                                                            <option value="Sister">Sister</option>
                                                            <option value="Parent">Parent</option>
                                                            <option value="Relative">Relative</option>
                                                            <option value="Spouse">Spouse</option>
                                                            <option value="Work Mate">Work Mate</option>
                                                            <option value="Close Friend">Close Friend</option>
                                                        </select> 
                                                        <small id="validg_relation22" style="color:red">Missing information!</small>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="mb-3">
                                                        <label class="text-label form-label">Gender*</label>
                                                        <select type="text" name="g_gender" id="g_gender22" class="form-control">
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                        </select> 
                                                        <small id="validg_gender22" style="color:red">Missing information!</small>
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
                                                        <select type="text" name="g2_gender" class="form-control">
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                        </select> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="nokLoanRef">
                                            <div class="row">
                                                <div class="col-lg-6 mb-2">
                                                    <div class="mb-3">
                                                        <label class="text-label form-label">Next of Kin's First Name*</label>
                                                        <input id="noK_fname22" type="text" name="nok_fname" class="form-control" placeholder="Name" required>
                                                        {{-- <small id="validnok_fname22" style="color:red">Missing information!</small> --}}
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="mb-3">
                                                        <label class="text-label form-label">Next of Kin's Last Name*</label>
                                                        <input id="noK_lname22" type="text" name="nok_lname" class="form-control" placeholder="Name" required>
                                                        {{-- <small id="validnok_lname22" style="color:red">Missing information!</small> --}}
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="mb-3">
                                                        <label class="text-label form-label">Next of Kin's Email Address*</label>
                                                        <input type="email" name="nok_email" id="nok_email22" class="form-control" id="emial1" placeholder="example@example.com.com" required>
                                                        {{-- <small id="validnok_email22" style="color:red">Missing information!</small> --}}
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="mb-3">
                                                        <label class="text-label form-label">Next of Kin's Phone Number*</label>
                                                        <input type="text" name="nok_phone" id="nok_phone22" class="form-control" placeholder="(+260)777888899" required>
                                                        {{-- <small id="validnok_phone2" style="color:red">Missing information!</small> --}}
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="mb-3">
                                                        <label class="text-label form-label">Relation*</label>
                                                        <select type="text" name="nok_relation" id="nok_relation22" class="form-control">
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
                                                        <select type="text" name="nok_gender" id="nok_gender22" class="form-control">
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
                                    </div>
                                </form>
                            </div>
                            <div id="loaderloancreate2" class="mx-auto">
                                <div class="container-fluid content-center justify-center items-center">
                                    <img width="60" src="{{ asset('public/loader/loading.gif') }}">
                                    <span>Please wait a minute</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- pickdate -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script>
    <!-- html2canvas library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function (e) {
            
            document.getElementById("loaderloancreate2").style.display = "none";
            document.getElementById("validbasicpayl2").style.display = "none";
            document.getElementById("validnetpayl2").style.display = "none";
            document.getElementById("validprincipal2").style.display = "none";
            document.getElementById("validuser_id").style.display = "none";

            // Next of Kin
            document.getElementById("nokLoanRef").style.display = "none";
            // document.getElementById("validnoK_fname22").style.display = "none";
            // document.getElementById("validnoK_lname22").style.display = "none";
            // document.getElementById("validnoK_email22").style.display = "none";
            // document.getElementById("validnoK_phone22").style.display = "none";
            // document.getElementById("validnoK_relation22").style.display = "none";
            // document.getElementById("validnoK_gender22").style.display = "none";

            // Guarantor
            document.getElementById("validg_fname22").style.display = "none";
            document.getElementById("validg_lname22").style.display = "none";
            document.getElementById("validg_email22").style.display = "none";
            document.getElementById("validg_phone22").style.display = "none";
            document.getElementById("validg_relation22").style.display = "none";
            document.getElementById("validg_gender22").style.display = "none";

            $('#prof_image_create').change(function(){
                let reader = new FileReader();
                reader.onload = (e) => { 
                    $('#preview-image-before-upload_create').attr('src', e.target.result); 
                }
                reader.readAsDataURL(this.files[0]); 
            });
        });

        function changeType(){
            const dropdown = document.getElementById("loan_type_id1");
            const selectedValue = dropdown.value;
            if(selectedValue !== 'Asset Financing'){
                document.getElementById("nokLoanRef").style.display = "block";
                document.getElementById("guarantorLoanRef").style.display = "none";
            }else{
                document.getElementById("nokLoanRef").style.display = "none";
                document.getElementById("guarantorLoanRef").style.display = "block";
            }
        }
    </script>
</div>
