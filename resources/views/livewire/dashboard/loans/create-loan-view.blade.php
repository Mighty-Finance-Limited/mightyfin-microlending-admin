<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <a href="{{ route('view-loan-requests') }}" class="flex py-4 px-9">
        <span>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-90deg-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1.146 4.854a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H12.5A2.5 2.5 0 0 1 15 6.5v8a.5.5 0 0 1-1 0v-8A1.5 1.5 0 0 0 12.5 5H2.707l3.147 3.146a.5.5 0 1 1-.708.708z"/>
            </svg>
        </span>
        <span>
            Loan Requests
        </span>
    </a>
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <form action="{{ route("proxy-apply-loan") }}" method="POST" enctype="multipart/form-data" id="kt_content_container" class="container-xxl">
            @csrf
            <div class="border-0 cursor-pointer card-header">
                <div class="mt-2 alert alert-primary">
                    <small>
                        Please note that some of the fields below are optional. You can leave the fields empty if you do not want to place any restriction.
                    </small>
                </div>
            </div>

            <div class="wizard-wrapper">
                {{-- Step 1 --}}
                <div class="mb-5 card mb-xl-10 wizard-step" data-step="1">
                    <div class="border-0 cursor-pointer card-header" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                        <div class="m-0 card-title">
                            <h3 class="m-0 fw-bold text-info">New Loan Information:</h3>
                        </div>
                    </div>

                    <div id="kt_account_settings_profile_details" class="collapse show">
                        <div id="kt_account_profile_details_form" class="form">
                            <div class="card-body border-top p-9">
                                <!-- Loan Product -->
                                    <div class="mb-6 row">
                                        <label class="col-lg-4 col-form-label required fw-bold fs-6">Loan Product</label>
                                        <div class="col-lg-8 fv-row">
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-journal-richtext"></i></span>
                                                <select name="loan_product_id" class="form-control form-control-lg form-control-solid" required>
                                                    <option value="">-- select --</option>
                                                    @forelse ($loan_products as $lp)
                                                    <option value="{{ $lp->id }}">{{ $lp->name }}</option>
                                                    @empty @endforelse
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Borrower -->
                                    <div class="mb-6 row">
                                        <label class="col-lg-4 col-form-label required fw-bold fs-6">Borrower</label>
                                        <div class="col-lg-8 fv-row">
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-person-lines-fill"></i></span>
                                                <select name="borrower_id" class="form-control form-control-lg form-control-solid" required>
                                                    <option value="">-- select --</option>
                                                    @forelse ($borrowers as $b)
                                                    <option value="{{ $b->id }}">{{ $b->fname.' '.$b->lname.' | '.$b->phone }}</option>
                                                    @empty @endforelse
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Principal Amount -->
                                    <div class="mb-6 row">
                                        <label class="col-lg-4 col-form-label required fw-bold fs-6">Principal Amount</label>
                                        <div class="col-lg-8 fv-row">
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-currency-dollar"></i></span>
                                                <input type="number" name="amount" class="form-control form-control-lg form-control-solid" placeholder="10 000" required/>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Duration -->
                                    <div class="mb-6 row">
                                        <label class="col-lg-4 col-form-label required fw-bold fs-6">Duration</label>
                                        <div class="col-lg-8 fv-row">
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="bi bi-calendar-range"></i></span>
                                                <select name="repayment_plan" class="form-control form-control-lg form-control-solid" required>
                                                    <option value="">--select--</option>
                                                    @for ($i = 1; $i <= 12; $i++)
                                                    <option value="{{ $i }}">{{ $i }} Month{{ $i > 1 ? 's' : '' }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="py-6 card-footer d-flex justify-content-end px-9">
                        <button type="button" class="btn btn-primary next-step">Next</button>
                    </div>
                </div>

                {{-- Step 2 --}}
                <div class="mb-5 card mb-xl-10 wizard-step" data-step="2" style="display: none;">
                    <div class="border-0 cursor-pointer card-header" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                        <div class="m-0 card-title">
                            <h3 class="m-0 fw-bold text-info">Next of Kin:</h3>
                        </div>
                    </div>

                    <div id="kt_account_settings_profile_details" class="collapse show">
                        <div id="kt_account_profile_details_form" class="form">
                            <div class="card-body border-top p-9">
                                
                                <!-- NOK First Name -->
                                <div class="mb-6 row">
                                    <label class="col-lg-4 col-form-label required fw-bold fs-6">First Name</label>
                                    <div class="col-lg-8 fv-row">
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-person"></i></span>
                                            <input type="text" name="nok_fname" class="form-control form-control-lg form-control-solid" placeholder="">
                                        </div>
                                    </div>
                                </div>

                                <!-- NOK Last Name -->
                                <div class="mb-6 row">
                                    <label class="col-lg-4 col-form-label required fw-bold fs-6">Last Name</label>
                                    <div class="col-lg-8 fv-row">
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-person-vcard"></i></span>
                                            <input type="text" name="nok_lname" class="form-control form-control-lg form-control-solid" placeholder="">
                                        </div>
                                    </div>
                                </div>

                                <!-- NOK Phone Number -->
                                <div class="mb-6 row">
                                    <label class="col-lg-4 col-form-label required fw-bold fs-6">Phone Number</label>
                                    <div class="col-lg-8 fv-row">
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                                            <input type="text" name="nok_phone" class="form-control form-control-lg form-control-solid" placeholder="">
                                        </div>
                                    </div>
                                </div>

                                <!-- NOK Email -->
                                <div class="mb-6 row">
                                    <label class="col-lg-4 col-form-label required fw-bold fs-6">Email Address</label>
                                    <div class="col-lg-8 fv-row">
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-envelope-at"></i></span>
                                            <input type="text" name="nok_email" class="form-control form-control-lg form-control-solid" placeholder="">
                                        </div>
                                    </div>
                                </div>

                                <!-- NOK Relation -->
                                <div class="mb-6 row">
                                    <label class="col-lg-4 col-form-label required fw-bold fs-6">Relation</label>
                                    <div class="col-lg-8 fv-row">
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-people-fill"></i></span>
                                            <input type="text" name="nok_relation" class="form-control form-control-lg form-control-solid" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="py-6 card-footer d-flex justify-content-between px-9">
                        <button type="button" class="btn btn-light-primary prev-step">Previous</button>
                        <button type="button" class="btn btn-primary next-step">Next</button>
                    </div>
                </div>

                {{-- Step 3 --}}
                <div class="mb-5 card mb-xl-10 wizard-step" data-step="3" style="display: none;">
                    <div class="border-0 cursor-pointer card-header" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                        <div class="m-0 card-title">
                            <h3 class="m-0 fw-bold text-info">References Information:</h3>
                        </div>
                    </div>

                    <div id="kt_account_settings_profile_details" class="collapse show">
                        <div id="kt_account_profile_details_form" class="form">
                            <div class="card-body border-top p-9">

                            <h4 class="py-3 text-gray" style="color: darkgray">Human Resources</h4>
                                <!-- HR First Name -->
                                <div class="mb-6 row">
                                    <label class="col-lg-4 col-form-label required fw-bold fs-6">First Name</label>
                                    <div class="col-lg-8 fv-row">
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-person-badge"></i></span>
                                            <input type="text" name="hr_fname" class="form-control form-control-lg form-control-solid" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-6 row">
                                    <label class="col-lg-4 col-form-label required fw-bold fs-6">Last Name</label>
                                    <div class="col-lg-8 fv-row">
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-person-badge-fill"></i></span>
                                            <input type="text" name="hr_lname" class="form-control form-control-lg form-control-solid" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-6 row">
                                    <label class="col-lg-4 col-form-label required fw-bold fs-6">Phone Number</label>
                                    <div class="col-lg-8 fv-row">
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-telephone-outbound"></i></span>
                                            <input type="text" name="hr_phone" class="form-control form-control-lg form-control-solid" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-6 row">
                                    <label class="col-lg-4 col-form-label required fw-bold fs-6">Email Address</label>
                                    <div class="col-lg-8 fv-row">
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-envelope-paper"></i></span>
                                            <input type="email" name="supervisor_email" class="form-control form-control-lg form-control-solid" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body border-top p-9">

                            <h4 class="py-3 text-gray" style="color: darkgray">Supervisor </h4>
                                <div class="mb-6 row">
                                    <label class="col-lg-4 col-form-label required fw-bold fs-6">First Name</label>
                                    <div class="col-lg-8 fv-row">
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-person-check-fill"></i></span>
                                            <input type="text" name="supervisor_fname" class="form-control form-control-lg form-control-solid" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            
                                <div class="mb-6 row">
                                    <label class="col-lg-4 col-form-label required fw-bold fs-6">Last Name</label>
                                    <div class="col-lg-8 fv-row">
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-person-check"></i></span>
                                            <input type="text" name="supervisor_lname" class="form-control form-control-lg form-control-solid" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-6 row">
                                    <label class="col-lg-4 col-form-label required fw-bold fs-6">Phone Number</label>
                                    <div class="col-lg-8 fv-row">
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-phone-vibrate"></i></span>
                                            <input type="text" name="supervisor_phone" class="form-control form-control-lg form-control-solid" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-6 row">
                                    <label class="col-lg-4 col-form-label required fw-bold fs-6">Email Address</label>
                                    <div class="col-lg-8 fv-row">
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-envelope-paper"></i></span>
                                            <input type="email" name="supervisor_email" class="form-control form-control-lg form-control-solid" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="py-6 card-footer d-flex justify-content-between px-9">
                        <button type="button" class="btn btn-light-primary prev-step">Previous</button>
                        <button type="button" class="btn btn-primary next-step">Next</button>
                    </div>
                </div>

                {{-- Step 4 --}}
                <div class="mb-5 card mb-xl-10 wizard-step" data-step="4" style="display: none;">
                    <div class="border-0 cursor-pointer card-header" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                        <div class="m-0 card-title">
                            <h3 class="m-0 fw-bold text-info">Documents Upload:</h3>
                        </div>
                    </div>

                    <div id="kt_account_settings_profile_details" class="collapse show">
                        <div id="kt_account_profile_details_form" class="form">
                            <div class="card-body border-top p-9">
                                <div class="mb-6 row">
                                    <label class="col-lg-4 col-form-label required fw-bold fs-6">NRC</label>
                                    <div class="col-lg-8 fv-row">
                                        <input type="file" name="nrc_file" class="form-control" id="nrcFile" required>
                                    </div>
                                </div>
                                <div class="mb-6 row">
                                    <label class="col-lg-4 col-form-label fw-bold fs-6">Payslip</label>
                                    <div class="col-lg-8 fv-row">
                                        <input type="file" name="payslip_file" class="form-control" id="payslip_file" >
                                    </div>
                                </div>
                                <div class="mb-6 row">
                                    <label class="col-lg-4 col-form-label fw-bold fs-6">TPIN</label>
                                    <div class="col-lg-8 fv-row">
                                        <input type="file" name="tpin_file" class="form-control" id="tpin_file" >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="py-6 card-footer d-flex justify-content-between px-9">
                        <button type="button" class="btn btn-light-primary prev-step">Previous</button>
                        <button id="kt_account_deactivate_account_submit" type="submit" class="btn btn-primary fw-semibold">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    let currentStep = 1;
    const steps = $(".wizard-step");
    const numSteps = steps.length;

    function showStep(step) {
        steps.hide();
        $(`.wizard-step[data-step="${step}"]`).show();
    }

    showStep(currentStep);

    $(".next-step").click(function() {
        if (validateStep(currentStep)) {
            currentStep++;
            if (currentStep <= numSteps) {
                showStep(currentStep);
            }
        }
    });

    $(".prev-step").click(function() {
        currentStep--;
        if (currentStep >= 1) {
            showStep(currentStep);
        }
    });

    function validateStep(step) {
        let isValid = true;
        const currentStepElements = $(`.wizard-step[data-step="${step}"]`).find(":input[required]");

        currentStepElements.each(function() {
            if ($(this).val() === "") {
                $(this).addClass("is-invalid");
                isValid = false;
            } else {
                $(this).removeClass("is-invalid");
            }
        });

        return isValid;
    }

    $("form").submit(function(e) {
        if (!validateStep(numSteps)) {
            e.preventDefault();
             alert("Please complete all required fields in the form.");
        }
    });
});
</script>

