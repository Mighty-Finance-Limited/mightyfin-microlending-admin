<div wire:ignore class="modal fade" id="applyForLoanNow" tabindex="-1" aria-hidden="true">
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
                <form id="kyc_form" class="tab-content" action="{{ route("apply-loan") }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div id="wizard_Service" class="tab-pane" role="tabpanel">
                        <div class="row">
                            <div class="col-lg-6 mb-2">
                                <div class="mb-3">
                                    <label class="text-label form-label">First Name*</label>
                                    <input type="text" value="{{ auth()->user()->fname }}" name="fname" class="form-control" placeholder="{{ auth()->user()->fname ?? 'John' }}" required>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-2">
                                <div class="mb-3">
                                    <label class="text-label form-label">Last Name*</label>
                                    <input type="text" value="{{ auth()->user()->lname }}" name="lname" class="form-control" placeholder="{{ auth()->user()->lname ?? 'Doe' }}" required>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-2">
                                <div class="mb-3">
                                    <label class="text-label form-label">Email Address*</label>
                                    <input type="email" name="email" value="{{ auth()->user()->email }}" class="form-control" id="inputGroupPrepend2" aria-describedby="inputGroupPrepend2" placeholder="{{ auth()->user()->email ?? 'example@mail.com' }}" required>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-2">
                                <div class="mb-3">
                                    <label class="text-label form-label">Phone Number*</label>
                                    <input type="text" value="{{ auth()->user()->phone }}" name="phone" class="form-control" placeholder="(+260)97-000-999" required>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-2">
                                <div class="mb-3">
                                    <label class="text-label form-label">Gender*</label>
                                    <select type="text" name="gender" value="{{ auth()->user()->gender }}" class="form-control">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>                                
                                </div>
                            </div>
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
                                    <input type="text" name="amount" class="form-control" placeholder="0.00" required>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-2">
                                <div class="mb-3">
                                    <label class="text-label form-label">Duration*</label>
                                    <select type="text" name="repayment_plan" class="form-control">
                                        <option value="1">1 Month</option>
                                        <option value="2">2 Month</option>
                                        <option value="3">3 Months</option>
                                    </select>
                                </div>
                            </div>
                            {{-- <div class="col-lg-12 mb-3">
                                <div class="mb-3">
                                    <label class="text-label form-label">Your Gender*</label>
                                    <input type="text" name="place" class="form-control" required>
                                </div>
                            </div> --}}
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

        </div>
    </div>
</div>