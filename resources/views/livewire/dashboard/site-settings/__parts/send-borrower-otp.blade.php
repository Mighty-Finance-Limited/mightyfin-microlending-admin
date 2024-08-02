
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <form wire:submit.prevent="create_loan_product" id="kt_content_container" class="container-xxl">
            
            <div class="card-header border-0 cursor-pointer">
                <div class="alert alert-primary">
                    <small>
                        The <b>One Time Password (OTP)</b> feature can be used to verify that the borrower has approved the disbursement of the loan. On the Add/Edit Loan
                        and the Approve Loan pages, when you set the Loan Status, field to <b>Open<b>, the system will ask you for the OTP. You can send
                        the OTP via SMS or Email to the borrower. Once the borrower received the OTP, he/she will notify you of the OTP which you can enter
                        while Adding/Editing/Approving Loans and then click Submit. If the OTP is empty
                        or incorrect, the system will give an error and not allow the loan to be converted into <b>Open</b> status.
                        <br><br>
                        <b>Please see the video at <a href="#">Send OTP to Borrower before Loan Disbursement</a> to see how it works.</b>
                    </small>
                </div>
            </div>

            <div class="card mb-5 mb-xl-10">
                <!--begin::Card header-->
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                    <!--begin::Card title-->
                    <div class="card-title m-0">
                        <h3 class="fw-bold text-info m-0">OTP Expiry Time:</h3>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--begin::Card header-->
                <!--begin::Content-->
                <div id="kt_account_settings_profile_details" class="collapse show">
                    <div id="kt_account_profile_details_form" class="form">
                        <!--begin::Card body-->
                        <div class="card-body border-top p-9">
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">OTP Expiry Time</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <select type="text" wire:model.lazy="otp_expiry_time" class="form-control form-control-lg form-control-solid" placeholder="E.g Business Loan" required>
                                        <option value="">--select--</option>
                                        <option value="5">5 minutes</option>
                                        <option value="10">10 minutes</option>
                                        <option value="15">15 minutes</option>
                                        <option value="20">20 minutes</option>
                                        <option value="25">25 minutes</option>
                                        <option value="30">30 minutes</option>
                                        <option value="35">35 minutes</option>
                                        <option value="40">40 minutes</option>
                                        <option value="45">45 minutes</option>
                                        <option value="50">50 minutes</option>
                                        <option value="59">59 minutes</option>
                                    </select>
                                </div>
                                <!--end::Col-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-5 mb-xl-10">
                <!--begin::Card header-->
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                    <!--begin::Card title-->
                    <div class="card-title m-0">
                        <h3 class="fw-bold text-info m-0">Do Not Apply OTP to the following Staff when Adding/Editing/Approving Loans into Open Status:</h3>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--begin::Card header-->
                <!--begin::Content-->
                <div id="kt_account_settings_profile_details" class="collapse show">
                    <div class="card-body border-top p-9">
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label required fw-bold fs-6">Select Staff</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <!--begin::Options-->
                                <div class="d-flex align-items-center mt-3">
                                    <!--begin::Option-->
                                        <input class="form-control" id="no" wire:model.lazy="loan_release_date" type="text"/>
                                </div>
                                <div class="p-2 py-3">
                                    <p>The above selected staff memebers will <b>not</b> be required to enter OTP while Adding/Editing/Approving loans into Open status</p>
                                </div>
                                <!--end::Options-->
                            </div>
                            <!--end::Col-->
                        </div>
                    </div>
                </div>
            </div>

            <!--begin::Deactivate Account-->
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
            <!--end::Deactivate Account-->
        </form>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>