@if($createModal)
<div wire:ignore class="modal fade" id="kt_modal_add_customer" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered modal-xl"> <!-- Wider Modal -->
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Form-->
            <form class="form" method="POST" action="{{ route('create-user') }}" id="kt_modal_add_customer_form" validate enctype="multipart/form-data">
                @csrf
                <!--begin::Modal header-->
                <div class="modal-header">
                    <h2 class="fw-bold">Add a Customer</h2>
                    <div id="kt_modal_add_customer_close" class="btn btn-icon btn-sm btn-active-icon-primary">
                        <i class="ki-duotone ki-cross fs-1"></i>
                    </div>
                </div>
                <!--end::Modal header-->

                <!--begin::Modal body-->
                <div class="modal-body py-10 px-lg-17">
                    <div class="scroll-y me-n7 pe-7">

                        <!-- Profile Avatar Upload -->
                        <div class="mb-7 text-center">
                            <label class="fs-6 fw-semibold mb-2 d-block">Profile Picture</label>
                            <div class="d-flex justify-content-center">
                                <img id="avatarPreview" src="{{ asset('default-avatar.png') }}" class="rounded-circle border" width="120" height="120" />
                            </div>
                            <input type="file" class="form-control mt-3" name="avatar" id="avatarUpload" accept="image/*" onchange="previewImage(event)">
                        </div>

                        <!-- Grid Layout for Inputs -->
                        <div class="row g-5">
                            <div class="col-md-6">
                                <label class="required fs-6 fw-semibold mb-2">Firstname</label>
                                <input type="text" class="form-control form-control-solid" name="fname" />
                            </div>
                            <div class="col-md-6">
                                <label class="required fs-6 fw-semibold mb-2">Lastname</label>
                                <input type="text" class="form-control form-control-solid" name="lname" />
                            </div>
                            <div class="col-md-6">
                                <label class="required fs-6 fw-semibold mb-2">Email</label>
                                <input type="email" class="form-control form-control-solid" name="email" />
                            </div>
                            <div class="col-md-6">
                                <label class="fs-6 fw-semibold mb-2">Gender</label>
                                <select name="gender" class="form-control form-control-solid">
                                    <option value="">--choose--</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="fs-6 fw-semibold mb-2">National ID Type</label>
                                <select name="id_type" class="form-control form-control-solid">
                                    <option value="">--choose--</option>
                                    <option value="NRC">NRC</option>
                                    <option value="Passport">Passport</option>
                                    <option value="Driver's License">Driver's License</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="fs-6 fw-semibold mb-2">ID Number</label>
                                <input type="text" class="form-control form-control-solid" name="nrc_no" />
                            </div>
                            <div class="col-md-6">
                                <label class="required fs-6 fw-semibold mb-2">Phone</label>
                                <input class="form-control form-control-solid" name="phone" />
                            </div>
                            <div class="col-md-6">
                                <label class="fs-6 fw-semibold mb-2">Address Line</label>
                                <input class="form-control form-control-solid" name="address" />
                            </div>
                        </div>

                    </div>
                </div>
                <!--end::Modal body-->

                <!--begin::Modal footer-->
                <div class="modal-footer flex-center">
                    <button type="reset" class="btn btn-light me-3">Discard</button>
                    <button type="submit" class="btn btn-primary">
                        <span class="indicator-label">Submit</span>
                        <span class="indicator-progress">Please wait...
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                </div>
                <!--end::Modal footer-->
            </form>
        </div>
    </div>
</div>

<script>
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function(){
            document.getElementById('avatarPreview').src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>

@endif
