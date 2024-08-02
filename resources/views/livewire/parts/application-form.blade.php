<!-- Modal -->
<div wire:ignore class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="false">
    <div wire:ignore class="modal-dialog modal-dialog-scrollable">
        <div wire:ignore class="modal-content">
            <div wire:ignore class="modal-body">
                <div id="closere" class="preloader-close" data-bs-dismiss="modal" aria-label="Close">x</div>
                <main class="d-flex align-items-center">
                    <div class="container">
                        {{-- <form onsubmit="event.preventDefault(); submit_request();" id="wizard" enctype="multipart/form-data"> --}}
                        <form action="{{ route("loan-request") }}" validate method="POST" id="wizard" enctype="multipart/form-data">
                            @csrf
                            <h3>Step 1 Title</h3>
                            <section>
                                <div class="sec-title">
                                    <h3>{{ $step_1_title }}</h3>
                                    <div class="sub-title">
                                        <p>Fill in all the necessary details to started with the first step.</p>
                                    </div>
                                </div>
                                <div class="apply-form-box__content">
                                    <div id="apply-form" name="apply_form" class="default-form2" action="https://st.ourhtmldemo.com/new/finbank-demo/index.php" method="post">

                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <div class="input-box">
                                                        <input type="text" name="fname" id="fnameLoan" placeholder="First Name" required="">
                                                        <small id="validfname" style="color:red"></small>
                                                        <div class="icon">
                                                            <i class="fas fa-user"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <div class="input-box">
                                                        <input type="text" name="lname" id="lnameLoan" placeholder="Last Name" required="">
                                                        <small id="validlname" style="color:red"></small>
                                                        <div class="icon">
                                                            <i class="fas fa-user"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <div class="input-box">
                                                        <input type="text" required="required" name="amount" placeholder="Amount" id="amountLoan">
                                                        <small id="validAmount" style="color:red"></small>
                                                        <div class="icon">
                                                            <i class="fas fa-money-bill"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <div class="select-box clearfix">
                                                        <select wire:model="loan_type" name="type" class="wide" id="typeLoan">
                                                            <option value="" data-display="Purpose of Loan">
                                                                Purpose of Loan
                                                            </option>
                                                            <option value="Personal">Personal</option>
                                                            <option value="Education">Education</option>
                                                            <option value="Asset Financing">Asset Financing</option>
                                                            <option value="Home Improvement">Home Improvements</option>
                                                            <option value="Agri Business">Agri Business</option>
                                                            <option value="Women in Business (Femiprise) Soft">Women in Business</option>
                                                        </select>
                                                        <small id="validType" style="color:red"></small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">

                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <div class="select-box clearfix">
                                                        <select name="gender" id="genderLoan" class="wide">
                                                            <option value="" data-display="Your Gender">
                                                                Gender
                                                            </option>
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                        </select>
                                                        <small id="validGender" style="color:red"></small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <div class="select-box clearfix">
                                                        <select name="repayment_plan" id="durationLoan" class="wide">
                                                            <option value="" data-display="Duration">
                                                                Duration
                                                            </option>
                                                            <option value="1">1 Month</option>
                                                            <option value="2">2 Months</option>
                                                            <option value="3">3 Months</option>
                                                            <option value="4">4 Months</option>
                                                            <option value="5">5 Months</option>
                                                            <option value="6">6 Months</option>
                                                        </select>
                                                        <small id="validDuration" style="color:red"></small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <div class="input-box">
                                                        <input type="text" name="phone" value="" id="phoneLoan" placeholder="Phone">
                                                        <div class="icon">
                                                            <i class="fas fa-phone-alt"></i>
                                                        </div>
                                                        <small id="validPhone" style="color:red"></small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <div class="input-box">
                                                        <input type="email" wire:model.defer="email" name="email" id="loanEmail" placeholder="Email" required="">
                                                        <div class="icon">
                                                            <i class="fas fa-envelope-open"></i>
                                                        </div>
                                                        <small id="validEmail" style="color:red"></small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </section>
                            <h3>Step 2 Title</h3>
                            {{-- @if($loan_type !== 'Personal') --}}
                            <section>
                                <div class="sec-title">
                                    <h3 id="guarant">Guarantor & Loan Credentials</h3>
                                    <h3 id="nok">Next of Kin</h3>
                                    <div class="sub-title">
                                        <p>Fill in all the necessary details to started with continue second step.</p>
                                    </div>
                                </div>
                                <div id="step2B" class="apply-form-box__content">
                                    {{-- @if($showDiag === true) --}}
                                    <div class="modal-overlay2" style="display:none" id="modal-overlay2"></div>
                                    <div wire:ignore class="modal2" style="display:none" id="modal2">
                                        <div class="modal-guts2">
                                            <div class="flex row">
                                                <div class="col-lg-12">

                                                    <h1 style="color:#7b1919">
                                                        <img width="40" src="https://cdn-icons-png.flaticon.com/512/4202/4202134.png">
                                                        Account Aready Exists
                                                    </h1>
                                                </div>
                                                <div class="col-lg-12" style="padding-top:3px">
                                                    <p>
                                                        An account with this email <span style="color:#7b1919" id="emailValidCheck"></span> already exists please sign in to check your account.
                                                    </p>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="col-lg-12 btn-box" style="padding-right:20px; padding-left:10px;">
                                                {{-- <button id="updateExistingLoan" class="btn btn-sm btn-waring">Update Existing Loan</button> --}}
                                                <a href="{{ route('login') }}"class="btn btn-warning btn-lg " style="background-color:#7b1919; color:white">
                                                Sign In
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- @endif --}}

                                    <div id="apply-form" name="apply_form" class="default-form2">
                                        <div class="sec-title">
                                            <h5>Guarantor 1</h5>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <div class="input-box">
                                                        <input type="text" id="checkforthisapplication" name="gfname" placeholder="Guarantor 1's First Name" required="">
                                                        <small id="validgfname" style="color:red"></small>
                                                        <div class="icon">
                                                            <i class="fas fa-user"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <div class="input-box">
                                                        <input type="text" name="glname" id="glname" placeholder="Guarantor 1's  Last Name" required="">
                                                        <small id="validglname" style="color:red"></small>
                                                        <div class="icon">
                                                            <i class="fas fa-user"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">

                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <div class="select-box clearfix">
                                                        <select name="g_relation" id="gRelation" class="wide">
                                                            <option value="" data-display=" Relation">
                                                                Relation
                                                            </option>
                                                            <option value="Brother">Brother</option>
                                                            <option value="Sister">Sister</option>
                                                            <option value="Parent">Parent</option>
                                                            <option value="Relative">Relative</option>
                                                            <option value="Spouse">Spouse</option>
                                                            <option value="Work Mate">Work Mate</option>
                                                            <option value="Close Friend">Close Friend</option>

                                                        </select>
                                                    </div>
                                                    <small id="validgRelation" style="color:red"></small>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <div class="select-box clearfix">
                                                        <select name="g_gender" id="gGender" class="wide">
                                                            <option value="" data-display="Gender">
                                                                Gender
                                                            </option>
                                                            <option value="Female">Female</option>
                                                            <option value="Male">Male</option>
                                                        </select>
                                                    </div>
                                                    <small id="validgGender" style="color:red"></small>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <div class="input-box">
                                                        <input type="text" name="gphone" value="" id="gPhone" placeholder="Guarantor 1's Phone">
                                                        <small id="validgPhone" style="color:red"></small>
                                                        <div class="icon">
                                                            <i class="fas fa-phone-alt"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <div class="input-box">
                                                        <input type="email" name="gemail" id="gEmail" placeholder="Guarantor 1's Email" required="">
                                                        <small id="validgEmail" style="color:red"></small>
                                                        <div class="icon">
                                                            <i class="fas fa-envelope-open"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>

                                        <div class="sec-title">
                                            <h5>Guarantor 2</h5>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <div class="input-box">
                                                        <input type="text" name="g2fname" id="g2fname" placeholder="Guarantor 2's First Name" required="">
                                                        <small id="validg2fname" style="color:red"></small>
                                                        <div class="icon">
                                                            <i class="fas fa-user"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <div class="input-box">
                                                        <input type="text" name="g2lname" id="g2lname" placeholder="Guarantor 2's  Last Name" required="">
                                                        <small id="validg2lname" style="color:red"></small>
                                                        <div class="icon">
                                                            <i class="fas fa-user"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="row">

                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <div class="select-box clearfix">
                                                        <select name="g2_relation" id="g2Relation" class="wide">
                                                            <option value="" data-display="Relation">
                                                                Relation
                                                            </option>
                                                            <option value="Brother">Brother</option>
                                                            <option value="Sister">Sister</option>
                                                            <option value="Parent">Parent</option>
                                                            <option value="Relative">Relative</option>
                                                            <option value="Spouse">Spouse</option>
                                                            <option value="Work Mate">Work Mate</option>
                                                            <option value="Close Friend">Close Friend</option>
                                                        </select>
                                                        <small id="validg2Relation" style="color:red"></small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <div class="select-box clearfix">
                                                        <select name="g2_gender" id="g2Gender" class="wide">
                                                            <option value="" data-display="Gender">
                                                                Gender
                                                            </option>
                                                            <option value="Female">Female</option>
                                                            <option value="Male">Male</option>

                                                        </select>
                                                        <small id="validg2Gender" style="color:red"></small>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <div class="input-box">
                                                        <input type="text" name="g2phone" id="g2Phone" placeholder="Guarantor 2's Phone">
                                                        <small id="validg2Phone" style="color:red"></small>
                                                        <div class="icon">
                                                            <i class="fas fa-phone-alt"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <div class="input-box">
                                                        <input type="email" name="g2email" id="g2Email" placeholder="Guarantor 2's Email" required="">
                                                        <small id="validg2Email" style="color:red"></small>
                                                        <div class="icon">
                                                            <i class="fas fa-envelope-open"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div wire:ignore id="step2P" class="apply-form-box__content">
                                    <div id="apply-form" name="apply_form" class="default-form2">
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <div class="input-box">
                                                        <input type="text" id="nok_fname" name="nok_fname" placeholder="First Name" required="">
                                                        <small id="validnok_fname" style="color:red"></small>
                                                        <div class="icon">
                                                            <i class="fas fa-user"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <div class="input-box">
                                                        <input type="text" name="nok_lname" id="nok_lname" placeholder="Last Name" required="">
                                                        <small id="validnok_lname" style="color:red"></small>
                                                        <div class="icon">
                                                            <i class="fas fa-user"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <div class="select-box clearfix">
                                                        <select name="nok_relation" id="nok_relation" class="wide">
                                                            <option value="" data-display="Relation">
                                                                Relation
                                                            </option>
                                                            <option value="Brother">Brother</option>
                                                            <option value="Sister">Sister</option>
                                                            <option value="Parent">Parent</option>
                                                            <option value="Relative">Relative</option>
                                                            <option value="Spouse">Spouse</option>
                                                            <option value="Work Mate">Work Mate</option>
                                                            <option value="Close Friend">Close Friend</option>
                                                        </select>
                                                    </div>
                                                    <small id="validnok_relation" style="color:red"></small>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <div class="select-box clearfix">
                                                        <select name="nok_gender" id="nok_gender" class="wide">
                                                            <option value="" data-display="Gender">
                                                                Gender
                                                            </option>
                                                            <option value="Female">Female</option>
                                                            <option value="Male">Male</option>
                                                        </select>
                                                    </div>
                                                    <small id="validnok_gender" style="color:red"></small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <div class="input-box">
                                                        <input type="text" name="nok_phone" value="" id="nok_phone" placeholder="Next of Kin's Phone">
                                                        <small id="validnok_phone" style="color:red"></small>
                                                        <div class="icon">
                                                            <i class="fas fa-phone-alt"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <div class="input-box">
                                                        <input type="email" name="nok_email" id="nok_email" placeholder="Next of Kin's Email" required="">
                                                        <small id="validnok_email" style="color:red"></small>
                                                        <div class="icon">
                                                            <i class="fas fa-envelope-open"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            {{-- @endif --}}
                            <h3>Step 3 Title</h3>
                            <section>
                                <div class="sec-title">
                                    <h3>Documents</h3>
                                    <div class="sub-title">
                                        <p>Fill in all the necessary details to started with the first step.</p>
                                    </div>
                                </div>
                                <div class="apply-form-box__content">


                                    <div id="apply-form">
                                        {{-- <div class="sec-title">
                                            <h5>Ba</h5>
                                        </div> --}}
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <div class="input-box">
                                                        <div class="mb-3">
                                                            <label for="formFile" id="payslipLoan" class="form-label">Payslip (leave empty if not applicable)</label>
                                                            <input name="payslip_file" class="form-control" type="file"  />
                                                            <small id="validpayslipLoan" style="color:red"></small>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <div class="input-box">
                                                        <div class="mb-3">
                                                            <label for="formFile" class="form-label">TPIN</label>
                                                            <input name="tpin_file" id="tpinLoan" class="form-control" type="file"  />
                                                            <small id="validtpin" style="color:red"></small>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <div class="col-xl-6">
                                                <div class="form-group">
                                                    <div class="input-box">
                                                        <div class="mb-3">
                                                            <label for="formFile" name="" class="form-label">Potrait Picture of you holding NRC</label>
                                                            <input class="form-control" type="file" id="formFile">
                                                        </div>

                                                    </div>
                                                </div>
                                            </div> --}}

                                        </div>
                                    </div>
                                </div>
                                <div wire:loading wire:target="submit">
                                    Loading...
                                 </div>
                            </section>
                        </form>

                        <div id="webloaderdashboard" class="mx-auto">
                            <div style="margin:auto" class="container-fluid content-center justify-center items-center">
                                <img width="60" src="{{ asset('public/loader/loading.gif') }}">
                                <span>Please wait a minute</span>
                            </div>
                        </div>
                    </div>
                </main>
            </div>

        </div>
    </div>
    <style>

        .modal2 {
          display: block;
          width: 600px;
          max-width: 100%;
          line-height:25px;
          padding:6px;
          height: 50vh;
          max-height: 100%;
          position: fixed;
          z-index: 100;
          left: 50%;
          top: 50%;
          transform: translate(-50%, -50%);
          background: white;
          box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px;
        }
        .closed2 {
          display: none;
        }

        .modal-overlay2 {
          position: fixed;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
          z-index: 50;
          background: rgba(0, 0, 0, 0.6);
        }
        .modal-guts2 {
          position: absolute;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
          overflow: auto;
          padding: 30px;
        }
        .modal2 .close-button2 {
          position: absolute;

          /* don't need to go crazy with z-index here, just sits over .modal-guts */
          z-index: 1;

          top: 10px;

          /* needs to look OK with or without scrollbar */
          right: 20px;

          border: 0;
          background: black;
          color: white;
          padding: 5px 10px;
          font-size: 1.3rem;
        }

        .open-button2 {
          border: 0;
          position: absolute;
          top: 50%;
          left: 50%;
          transform: translate(-50%, -50%);
          background: lightgreen;
          color: white;
          padding: 10px 20px;
          border-radius: 10px;
          font-size: 21px;
        }
            .modal-dialog {
                max-width: 100%;
                margin: 0;
                top: 0;
                bottom: 0;
                left: 0;
                right: 0;
                height: 100%;
                display: flex;
                position: fixed;
            }

            .apply-form-box__content {
                position: relative;
                display: block;
                max-width: 100%;
                width: 100%;
                /* float: left; */
                background-color: #f7f1eb;
                padding: 50px;
            }

            #closere {
                position: absolute;
                top: 9px;
                right: 15px;
                width: 35px;
                height: 35px;
                border-radius: 50%;
                font-size: 20px;
                line-height: 36px;
                background: #e3d3d3;
                text-align: center;
                cursor: pointer;
                z-index: 99999999;
                color: #7b1919;
            }

        </style>
        <script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            document.getElementById("webloaderdashboard").style.display = "none";
            var step2B = $('#step2B');
            var step2P = $('#step2P');
            var guarant = $('#guarant');
            var nok = $('#nok');

            step2B.show();
            step2P.hide();
            guarant.show();
            nok.hide();

            $('#typeLoan').change(function() {

                // get the selected value
                var selectedValue = $(this).val();
                // do something with the selected value, e.g. log it to the console
                if(selectedValue === 'Personal'){
                    guarant.hide();
                    step2B.hide();
                    nok.show();
                    step2P.show();
                }
            });
            // $("#checkforthisapplication").keyup(function() {
            //     var myemail = $("#loanEmail").val();
            //     var emailValidCheck = $('#emailValidCheck');
            //     emailValidCheck.text(myemail);
            //     $.ajax({
            //         type:'GET',
            //         url:'{{ route("get-application") }}',
            //         data: {
            //             email:myemail
            //         },
            //         success:function(data) {
            //             if(data === 1){
            //                 $("#modal-overlay2").removeAttr('style');
            //                 $("#modal2").removeAttr('style');
            //                 $("#modal-overlay2").css("display", "block");
            //                 $("#modal2").css("display", "block");
            //             }
            //         }
            //     });
            // });

            $("#updateExistingLoan").click(function() {
                var myemail = $("#loanEmail").val();
                $.ajax({
                    type:'GET',
                    url:'{{ route("update-existing-application") }}',
                    data: {
                        email:myemail
                    },
                    success:function(data) {
                        if(data === 1){
                            $("#modal-overlay2").removeAttr('style');
                            $("#modal2").removeAttr('style');
                            $("#modal-overlay2").css("display", "none");
                            $("#modal2").css("display", "none");
                        }
                    }
                });
            });

        });
        </script>
</div>
