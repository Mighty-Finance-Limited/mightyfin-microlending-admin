
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <a href="{{ route('item-settings', ['confg' => 'loan','settings' => 'loan-types']) }}" class="flex py-4 px-9">
        <span>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-90deg-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1.146 4.854a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H12.5A2.5 2.5 0 0 1 15 6.5v8a.5.5 0 0 1-1 0v-8A1.5 1.5 0 0 0 12.5 5H2.707l3.147 3.146a.5.5 0 1 1-.708.708z"/>
            </svg>
        </span>
        <span>
            Return Back to Loan Product List
        </span>
    </a>
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <form action="{{ route("proxy-apply-loan") }}" method="POST" enctype="multipart/form-data" id="kt_content_container" class="container-xxl">
            @csrf
            <div class="card-header border-0 cursor-pointer">
                <div class="alert alert-primary mt-2">
                    <small>
                        Please note that some of the fields below are optional. You can leave the fields empty if you do not want to place any restriction.
                    </small>
                </div>
            </div>

            <div class="card mb-5 mb-xl-10">
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                    <div class="card-title m-0">
                        <h3 class="fw-bold text-info m-0">New Loan Information:</h3>
                    </div>
                </div>
                
                <div id="kt_account_settings_profile_details" class="collapse show">
                    <div id="kt_account_profile_details_form" class="form">
                        <div class="card-body border-top p-9">
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Loan Product</label>
                                <div class="col-lg-8 fv-row">
                                    <select type="text" name="loan_product_id" class="form-control form-control-lg form-control-solid" placeholder="E.g Business Loan" required>
                                        <option value="">-- select --</option>
                                        @forelse ($loan_products as $lp)
                                        <option value="{{ $lp->id }}">{{ $lp->name }}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                </div>
                            </div> 
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Borrower</label>
                                <div class="col-lg-8 fv-row">
                                    <select type="text" name="borrower_id" class="form-control form-control-lg form-control-solid" placeholder="E.g Civil Servant Loan" required>
                                        <option value="name">-- select --</option>
                                        @forelse ($borrowers as $b)
                                        <option value="{{ $b->id }}">{{ $b->fname.' '.$b->lname.' | '.$b->phone }}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                            {{-- <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Loan #</label>
                                <div class="col-lg-8 fv-row">
                                    <textarea type="text" name="new_loan_icon" class="form-control form-control-lg form-control-solid" placeholder="SVG code" required></textarea>
                                </div>
                            </div> --}}
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Principal Amount</label>
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="amount" class="form-control form-control-lg form-control-solid" placeholder="10 000" required/>
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Duration</label>
                                <div class="col-lg-8 fv-row">
                                    <select type="text" name="replayment_plan" class="form-control form-control-lg form-control-solid" placeholder="" required>
                                        <option value="">--select--</option>
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
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-5 mb-xl-10">
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                    <div class="card-title m-0">
                        <h3 class="fw-bold text-info m-0">Next of Kin:</h3>
                    </div>
                </div>
                
                <div id="kt_account_settings_profile_details" class="collapse show">
                    <div id="kt_account_profile_details_form" class="form">
                        <div class="card-body border-top p-9">
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">First Name</label>
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="nok_fname" class="form-control form-control-lg form-control-solid" placeholder="" ></input>
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Last Name</label>
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="nok_lname" class="form-control form-control-lg form-control-solid" placeholder="" ></input>
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Phone Number</label>
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="nok_phone" class="form-control form-control-lg form-control-solid" placeholder="" ></input>
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Email Address</label>
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="nok_email" class="form-control form-control-lg form-control-solid" placeholder="" ></input>
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Relation</label>
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="nok_relation" class="form-control form-control-lg form-control-solid" placeholder="" ></input>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            

            <div class="card mb-5 mb-xl-10">
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                    <div class="card-title m-0">
                        <h3 class="fw-bold text-info m-0">References Information:</h3>
                    </div>
                </div>
                
                <div id="kt_account_settings_profile_details" class="collapse show">
                    <div id="kt_account_profile_details_form" class="form">
                        <div class="card-body border-top p-9">
                            
                        <h4 class="text-gray py-3" style="color: darkgray">Human Resources</h4>
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">First Name</label>
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="sup_fname" class="form-control form-control-lg form-control-solid" placeholder=""></input>
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Last Name</label>
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="sup_lname" class="form-control form-control-lg form-control-solid" placeholder=""></input>
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Phone Number</label>
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="sup_phone" class="form-control form-control-lg form-control-solid" placeholder=""></input>
                                </div>
                            </div>
                        </div>
                        <div class="card-body border-top p-9">
                            
                        <h4 class="text-gray py-3" style="color: darkgray">Supervisor </h4>
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">First Name</label>
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="sup_fname" class="form-control form-control-lg form-control-solid" placeholder="" ></input>
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Last Name</label>
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="sup_lname" class="form-control form-control-lg form-control-solid" placeholder="" ></input>
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Phone Number</label>
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="sup_phone" class="form-control form-control-lg form-control-solid" placeholder="" ></input>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="card mb-5 mb-xl-10">
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                    <div class="card-title m-0">
                        <h3 class="fw-bold text-info m-0">Documents Upload:</h3>
                    </div>
                </div>
                
                <div id="kt_account_settings_profile_details" class="collapse show">
                    <div id="kt_account_profile_details_form" class="form">
                        <div class="card-body border-top p-9">
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">NRC</label>
                                <div class="col-lg-8 fv-row">
                                    <input type="file" name="nrc_file" class="form-control" id="nrcFile" required>
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Payslip</label>
                                <div class="col-lg-8 fv-row">
                                    <input type="file" name="payslip_file" class="form-control" id="payslip_file" >
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">TPIN</label>
                                <div class="col-lg-8 fv-row">
                                    <input type="file" name="tpin_file" class="form-control" id="tpin_file" >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="kt_account_settings_deactivate" class="collapse show">
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <button id="kt_account_deactivate_account_submit" type="submit" class="btn btn-primary fw-semibold">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-floppy2" viewBox="0 0 16 16">
                                <path d="M1.5 0h11.586a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13A1.5 1.5 0 0 1 1.5 0M1 1.5v13a.5.5 0 0 0 .5.5H2v-4.5A1.5 1.5 0 0 1 3.5 9h9a1.5 1.5 0 0 1 1.5 1.5V15h.5a.5.5 0 0 0 .5-.5V2.914a.5.5 0 0 0-.146-.353l-1.415-1.415A.5.5 0 0 0 13.086 1H13v3.5A1.5 1.5 0 0 1 11.5 6h-7A1.5 1.5 0 0 1 3 4.5V1H1.5a.5.5 0 0 0-.5.5m9.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5z"/>
                            </svg>
                        </span>    
                        Save
                    </button>
                </div>
            </div>
            
        </form>
    </div>
</div>
<script>
    // Get the input and select elements
    const minAmountInput = document.getElementById('minimum_loan_principal_amount');
    const selectElement = document.getElementById('loan_product_wiz_steps');

    // Event listener to update select options when input changes
    minAmountInput.addEventListener('input', updateSelectOptions);

    // Initial update based on the current value
    updateSelectOptions();

    function updateSelectOptions() {
        // Get the minimum loan principal amount from the input
        const minAmount = parseFloat(minAmountInput.value);

        // Clear existing options
        selectElement.innerHTML = '';
        // Add options based on the minimum loan principal amount
        if (minAmount >= 1500) {
            addOption(10);
            addOption(50);
            addOption(100);
            addOption(500);
        } else {
            addOption(10);
            addOption(50);
            addOption(100);
            addOption(500);
            addOption(1000);
        }

        // Trigger the Livewire update if needed
        selectElement.dispatchEvent(new Event('change'));
    }

    function addOption(value) {
        const option = document.createElement('option');
        option.value = value;
        option.text = value;
        selectElement.add(option);
    }
</script>