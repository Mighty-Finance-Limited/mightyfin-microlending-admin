@if($createModal)
<div wire:ignore class="modal fade" id="kt_modal_add_customer" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Form-->
            <form class="form" method="POST" action="{{ route('create-user') }}" id="kt_modal_add_customer_form" validate enctype="multipart/form-data">
                @csrf
                <!--begin::Modal header-->
                <div class="pb-0 border-0 modal-header">
                    <h2 class="fw-bold text-dark">Add a Customer</h2>
                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal" aria-label="Close">
                        <i class="ki-duotone ki-cross fs-1"></i>
                    </div>
                </div>
                <!--end::Modal header-->

                <!--begin::Modal body-->
                <div class="py-5 modal-body">
                    <!-- Photo Uploads Section -->
                    <div class="mb-5">
                        <h3 class="mb-3 fs-5 fw-semibold">Required Documents</h3>
                        <div class="row g-3">
                            <!-- Passport Photo 1 -->
                            <div class="col-md-3">
                                <div class="d-flex flex-column align-items-center">
                                    <div class="image-input image-input-outline" data-kt-image-input="true">
                                        <div class="image-input-wrapper w-100px h-100px" id="passport1Preview" style="background-image: url('{{ asset('default-avatar.png') }}')"></div>
                                        <label class="shadow btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body" data-kt-image-input-action="change">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-folder-plus" viewBox="0 0 16 16">
                                                <path d="m.5 3 .04.87a2 2 0 0 0-.342 1.311l.637 7A2 2 0 0 0 2.826 14H9v-1H2.826a1 1 0 0 1-.995-.91l-.637-7A1 1 0 0 1 2.19 4h11.62a1 1 0 0 1 .996 1.09L14.54 8h1.005l.256-2.819A2 2 0 0 0 13.81 3H9.828a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 6.172 1H2.5a2 2 0 0 0-2 2m5.672-1a1 1 0 0 1 .707.293L7.586 3H2.19q-.362.002-.683.12L1.5 2.98a1 1 0 0 1 1-.98z"/>
                                                <path d="M13.5 9a.5.5 0 0 1 .5.5V11h1.5a.5.5 0 1 1 0 1H14v1.5a.5.5 0 1 1-1 0V12h-1.5a.5.5 0 0 1 0-1H13V9.5a.5.5 0 0 1 .5-.5"/>
                                              </svg>
                                            <input type="file" name="passport_photo1" accept="image/*" class="photo-upload" data-preview="passport1Preview"/>
                                        </label>
                                    </div>
                                    <span class="mt-2 text-gray-600 fs-7">Passport Photo 1</span>
                                    <div class="text-center form-text">Passport sized photo with white background</div>
                                </div>
                            </div>

                            <!-- Passport Photo 2 -->
                            <div class="col-md-3">
                                <div class="d-flex flex-column align-items-center">
                                    <div class="image-input image-input-outline" data-kt-image-input="true">
                                        <div class="image-input-wrapper w-100px h-100px" id="passport2Preview" style="background-image: url('{{ asset('default-avatar.png') }}')"></div>
                                        <label class="shadow btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body" data-kt-image-input-action="change">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-folder-plus" viewBox="0 0 16 16">
                                                <path d="m.5 3 .04.87a2 2 0 0 0-.342 1.311l.637 7A2 2 0 0 0 2.826 14H9v-1H2.826a1 1 0 0 1-.995-.91l-.637-7A1 1 0 0 1 2.19 4h11.62a1 1 0 0 1 .996 1.09L14.54 8h1.005l.256-2.819A2 2 0 0 0 13.81 3H9.828a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 6.172 1H2.5a2 2 0 0 0-2 2m5.672-1a1 1 0 0 1 .707.293L7.586 3H2.19q-.362.002-.683.12L1.5 2.98a1 1 0 0 1 1-.98z"/>
                                                <path d="M13.5 9a.5.5 0 0 1 .5.5V11h1.5a.5.5 0 1 1 0 1H14v1.5a.5.5 0 1 1-1 0V12h-1.5a.5.5 0 0 1 0-1H13V9.5a.5.5 0 0 1 .5-.5"/>
                                              </svg>
                                            <input type="file" name="passport_photo2" accept="image/*" class="photo-upload" data-preview="passport2Preview"/>
                                        </label>
                                    </div>
                                    <span class="mt-2 text-gray-600 fs-7">Passport Photo 2</span>
                                    <div class="text-center form-text">Alternative passport photo</div>
                                </div>
                            </div>

                            <!-- NRC Front -->
                            <div class="col-md-3">
                                <div class="d-flex flex-column align-items-center">
                                    <div class="image-input image-input-outline" data-kt-image-input="true">
                                        <div class="image-input-wrapper w-100px h-100px" id="nrcFrontPreview" style="background-image: url('{{ asset('id-placeholder.png') }}')"></div>
                                        <label class="shadow btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body" data-kt-image-input-action="change">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-folder-plus" viewBox="0 0 16 16">
                                                <path d="m.5 3 .04.87a2 2 0 0 0-.342 1.311l.637 7A2 2 0 0 0 2.826 14H9v-1H2.826a1 1 0 0 1-.995-.91l-.637-7A1 1 0 0 1 2.19 4h11.62a1 1 0 0 1 .996 1.09L14.54 8h1.005l.256-2.819A2 2 0 0 0 13.81 3H9.828a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 6.172 1H2.5a2 2 0 0 0-2 2m5.672-1a1 1 0 0 1 .707.293L7.586 3H2.19q-.362.002-.683.12L1.5 2.98a1 1 0 0 1 1-.98z"/>
                                                <path d="M13.5 9a.5.5 0 0 1 .5.5V11h1.5a.5.5 0 1 1 0 1H14v1.5a.5.5 0 1 1-1 0V12h-1.5a.5.5 0 0 1 0-1H13V9.5a.5.5 0 0 1 .5-.5"/>
                                              </svg>
                                            <input type="file" name="nrc_file" accept="image/*" class="photo-upload" data-preview="nrcFrontPreview"/>
                                        </label>
                                    </div>
                                    <span class="mt-2 text-gray-600 fs-7">NRC Front</span>
                                    <div class="text-center form-text">Front side of ID document</div>
                                </div>
                            </div>

                            <!-- NRC Back -->
                            <div class="col-md-3">
                                <div class="d-flex flex-column align-items-center">
                                    <div class="image-input image-input-outline" data-kt-image-input="true">
                                        <div class="image-input-wrapper w-100px h-100px" id="nrcBackPreview" style="background-image: url('{{ asset('id-placeholder.png') }}')"></div>
                                        <label class="shadow btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body" data-kt-image-input-action="change">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-folder-plus" viewBox="0 0 16 16">
                                                <path d="m.5 3 .04.87a2 2 0 0 0-.342 1.311l.637 7A2 2 0 0 0 2.826 14H9v-1H2.826a1 1 0 0 1-.995-.91l-.637-7A1 1 0 0 1 2.19 4h11.62a1 1 0 0 1 .996 1.09L14.54 8h1.005l.256-2.819A2 2 0 0 0 13.81 3H9.828a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 6.172 1H2.5a2 2 0 0 0-2 2m5.672-1a1 1 0 0 1 .707.293L7.586 3H2.19q-.362.002-.683.12L1.5 2.98a1 1 0 0 1 1-.98z"/>
                                                <path d="M13.5 9a.5.5 0 0 1 .5.5V11h1.5a.5.5 0 1 1 0 1H14v1.5a.5.5 0 1 1-1 0V12h-1.5a.5.5 0 0 1 0-1H13V9.5a.5.5 0 0 1 .5-.5"/>
                                              </svg>
                                            <input type="file" name="nrc_b_file" accept="image/*" class="photo-upload" data-preview="nrcBackPreview"/>
                                        </label>
                                    </div>
                                    <span class="mt-2 text-gray-600 fs-7">NRC Back</span>
                                    <div class="text-center form-text">Back side of ID document</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Form Inputs in 3x3 Grid -->
                    <div class="row g-3">
                        <!-- First Name -->
                        <div class="col-md-4">
                            <label class="required form-label fs-6 fw-semibold">First Name</label>
                            <div class="input-group">
                                <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-check" viewBox="0 0 16 16">
                                    <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4"/>
                                    <path d="M8.256 14a4.5 4.5 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10q.39 0 .74.025c.226-.341.496-.65.804-.918Q8.844 9.002 8 9c-5 0-6 3-6 4s1 1 1 1z"/>
                                  </svg><span class="path1"></span><span class="path2"></span><span class="path3"></span></i></span>
                                <input type="text" class="form-control form-control-solid" name="fname" placeholder="Enter first name" required data-bs-toggle="tooltip" data-bs-placement="top" title="Customer's legal first name" />
                            </div>
                        </div>

                        <!-- Last Name -->
                        <div class="col-md-4">
                            <label class="required form-label fs-6 fw-semibold">Last Name</label>
                            <div class="input-group">
                                <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/>
                                  </svg><span class="path1"></span><span class="path2"></span><span class="path3"></span></i></span>
                                <input type="text" class="form-control form-control-solid" name="lname" placeholder="Enter last name" required data-bs-toggle="tooltip" data-bs-placement="top" title="Customer's legal last name" />
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="col-md-4">
                            <label class="required form-label fs-6 fw-semibold">Email</label>
                            <div class="input-group">
                                <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-at-fill" viewBox="0 0 16 16">
                                    <path d="M2 2A2 2 0 0 0 .05 3.555L8 8.414l7.95-4.859A2 2 0 0 0 14 2zm-2 9.8V4.698l5.803 3.546zm6.761-2.97-6.57 4.026A2 2 0 0 0 2 14h6.256A4.5 4.5 0 0 1 8 12.5a4.49 4.49 0 0 1 1.606-3.446l-.367-.225L8 9.586zM16 9.671V4.697l-5.803 3.546.338.208A4.5 4.5 0 0 1 12.5 8c1.414 0 2.675.652 3.5 1.671"/>
                                    <path d="M15.834 12.244c0 1.168-.577 2.025-1.587 2.025-.503 0-1.002-.228-1.12-.648h-.043c-.118.416-.543.643-1.015.643-.77 0-1.259-.542-1.259-1.434v-.529c0-.844.481-1.4 1.26-1.4.585 0 .87.333.953.63h.03v-.568h.905v2.19c0 .272.18.42.411.42.315 0 .639-.415.639-1.39v-.118c0-1.277-.95-2.326-2.484-2.326h-.04c-1.582 0-2.64 1.067-2.64 2.724v.157c0 1.867 1.237 2.654 2.57 2.654h.045c.507 0 .935-.07 1.18-.18v.731c-.219.1-.643.175-1.237.175h-.044C10.438 16 9 14.82 9 12.646v-.214C9 10.36 10.421 9 12.485 9h.035c2.12 0 3.314 1.43 3.314 3.034zm-4.04.21v.227c0 .586.227.8.581.8.31 0 .564-.17.564-.743v-.367c0-.516-.275-.708-.572-.708-.346 0-.573.245-.573.791"/>
                                  </svg></span>
                                <input type="email" class="form-control form-control-solid" name="email" placeholder="email@example.com" required data-bs-toggle="tooltip" data-bs-placement="top" title="Valid email address for communications" />
                            </div>
                        </div>

                        <!-- Gender -->
                        <div class="col-md-4">
                            <label class="form-label fs-6 fw-semibold">Gender</label>
                            <div class="input-group">
                                <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gender-ambiguous" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M11.5 1a.5.5 0 0 1 0-1h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V1.707l-3.45 3.45A4 4 0 0 1 8.5 10.97V13H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V14H6a.5.5 0 0 1 0-1h1.5v-2.03a4 4 0 1 1 3.471-6.648L14.293 1zm-.997 4.346a3 3 0 1 0-5.006 3.309 3 3 0 0 0 5.006-3.31z"/>
                                  </svg></span>
                                <select name="gender" class="form-select form-select-solid" data-bs-toggle="tooltip" data-bs-placement="top" title="Customer's gender identity">
                                    <option value="">--Select Gender--</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>

                        <!-- National ID Type -->
                        <div class="col-md-4">
                            <label class="form-label fs-6 fw-semibold">ID Type</label>
                            <div class="input-group">
                                <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-postcard" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2zM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1zm7.5.5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0zM2 5.5a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5H6a.5.5 0 0 1 0 1H2.5a.5.5 0 0 1-.5-.5M10.5 5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5zM13 8h-2V6h2z"/>
                                  </svg></span>
                                <select name="id_type" class="form-select form-select-solid" data-bs-toggle="tooltip" data-bs-placement="top" title="Type of identification document">
                                    <option value="">--Select ID Type--</option>
                                    <option value="NRC">NRC</option>
                                    <option value="Passport">Passport</option>
                                    <option value="Driver's License">Driver's License</option>
                                </select>
                            </div>
                        </div>

                        <!-- ID Number -->
                        <div class="col-md-4">
                            <label class="form-label fs-6 fw-semibold">ID Number</label>
                            <div class="input-group">
                                <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hash" viewBox="0 0 16 16">
                                    <path d="M8.39 12.648a1 1 0 0 0-.015.18c0 .305.21.508.5.508.266 0 .492-.172.555-.477l.554-2.703h1.204c.421 0 .617-.234.617-.547 0-.312-.188-.53-.617-.53h-.985l.516-2.524h1.265c.43 0 .618-.227.618-.547 0-.313-.188-.524-.618-.524h-1.046l.476-2.304a1 1 0 0 0 .016-.164.51.51 0 0 0-.516-.516.54.54 0 0 0-.539.43l-.523 2.554H7.617l.477-2.304c.008-.04.015-.118.015-.164a.51.51 0 0 0-.523-.516.54.54 0 0 0-.531.43L6.53 5.484H5.414c-.43 0-.617.22-.617.532s.187.539.617.539h.906l-.515 2.523H4.609c-.421 0-.609.219-.609.531s.188.547.61.547h.976l-.516 2.492c-.008.04-.015.125-.015.18 0 .305.21.508.5.508.265 0 .492-.172.554-.477l.555-2.703h2.242zm-1-6.109h2.266l-.515 2.563H6.859l.532-2.563z"/>
                                  </svg></span>
                                <input type="text" class="form-control form-control-solid" name="nrc_no" placeholder="Enter ID number" data-bs-toggle="tooltip" data-bs-placement="top" title="National ID, passport, or driver's license number" />
                            </div>
                        </div>

                        <!-- Phone -->
                        <div class="col-md-4">
                            <label class="required form-label fs-6 fw-semibold">Phone</label>
                            <div class="input-group">
                                <span class="input-group-text">+26</span>
                                <input type="tel" class="form-control form-control-solid" name="phone" placeholder="0123456789" required minlength="10" maxlength="10" pattern="[0-9]{10}" data-bs-toggle="tooltip" data-bs-placement="top" title="10-digit phone number" />
                                <span class="input-group-text"><i class="ki-duotone ki-phone fs-2"></i></span>
                            </div>
                        </div>

                        <!-- Address -->
                        <div class="col-md-4">
                            <label class="form-label fs-6 fw-semibold">Address</label>
                            <div class="input-group">
                                <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-check" viewBox="0 0 16 16">
                                    <path d="M7.293 1.5a1 1 0 0 1 1.414 0L11 3.793V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v3.293l2.354 2.353a.5.5 0 0 1-.708.708L8 2.207l-5 5V13.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 1 0 1h-4A1.5 1.5 0 0 1 2 13.5V8.207l-.646.647a.5.5 0 1 1-.708-.708z"/>
                                    <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.707l.547.547 1.17-1.951a.5.5 0 1 1 .858.514"/>
                                  </svg></span>
                                <input type="text" class="form-control form-control-solid" name="address" placeholder="Enter address" data-bs-toggle="tooltip" data-bs-placement="top" title="Customer's current residence address" />
                            </div>
                        </div>

                        <!-- Job Title -->
                        <div class="col-md-4">
                            <label class="required form-label fs-6 fw-semibold">Job Title</label>
                            <div class="input-group">
                                <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-briefcase-fill" viewBox="0 0 16 16">
                                    <path d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v1.384l7.614 2.03a1.5 1.5 0 0 0 .772 0L16 5.884V4.5A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5"/>
                                    <path d="M0 12.5A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5V6.85L8.129 8.947a.5.5 0 0 1-.258 0L0 6.85z"/>
                                  </svg></span>
                                <input type="text" class="form-control form-control-solid" name="JobTitle" placeholder="Enter job title" required data-bs-toggle="tooltip" data-bs-placement="top" title="Customer's current occupation" />
                            </div>
                        </div>

                        <!-- Role -->
                        <div class="col-md-4">
                            <label class="required form-label fs-6 fw-semibold">Role</label>
                            <div class="input-group">
                                <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-workspace" viewBox="0 0 16 16">
                                    <path d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-5.95a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/>
                                    <path d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h.653a5.4 5.4 0 0 1 1.066-2H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9h-2.219c.554.654.89 1.373 1.066 2h.653a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2z"/>
                                  </svg></span>
                                <select class="form-select form-select-solid" name="assigned_role" required data-bs-toggle="tooltip" data-bs-placement="top" title="System access role">
                                    @foreach($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Modal body-->

                <!--begin::Modal footer-->
                <div class="pt-0 border-0 modal-footer">
                    <button type="button" class="btn btn-light-danger me-3" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross-square fs-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                        Cancel
                    </button>
                    <button type="submit" class="btn btn-primary btnclicky">
                        <span class="indicator-label">
                            <i class="ki-duotone ki-check-circle fs-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            Submit
                        </span>
                        <span class="indicator-progress">Please wait...
                        <span class="align-middle spinner-border spinner-border-sm ms-2"></span></span>
                    </button>
                </div>
                <!--end::Modal footer-->
            </form>
        </div>
    </div>
</div>

<script>
    // Initialize tooltips
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        });

        // Image preview function
        const photoUploads = document.querySelectorAll('.photo-upload');
        photoUploads.forEach(input => {
            input.addEventListener('change', function(e) {
                const previewId = this.getAttribute('data-preview');
                const previewElement = document.getElementById(previewId);

                if (e.target.files && e.target.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        previewElement.style.backgroundImage = `url('${e.target.result}')`;
                    }
                    reader.readAsDataURL(e.target.files[0]);
                }
            });
        });

        // Phone validation
        const phoneInput = document.querySelector('input[name="phone"]');
        phoneInput.addEventListener('input', function() {
            this.value = this.value.replace(/[^0-9]/g, '').substring(0, 10);
        });
    });
</script>
@endif