
<div id="overlay"></div>
<div class="modal" style="z-index: 99999" id="continue-loan-modal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
    
        <div class="p-6 modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center ">
                    <b>Loan Completion Form</b>
                </h4>

                {{-- <span style="cursor:pointer" onclick="closeModal()">x</span> --}}
            </div>
            <div class="modal-body row" style="overflow-y: scroll; overflow-x:hidden; height:63vh">
                <div class="col-xxl-3 col-xl-3 col-lg-3" >
                    <img width="240" src="https://img.freepik.com/free-vector/account-concept-illustration_114360-279.jpg?w=740&t=st=1700475235~exp=1700475835~hmac=99f4c6fbffcf369cc925fde13256cbcdefd9c50ab8b470e1d74610f67d158f4d">
                </div>
                <div class="col-xxl-9 col-xl-9 col-lg-9">
                    <form class="py-6 pb-4 col-xxl-12 col-xl-12 col-lg-12 " method="post" action="{{ route('continue-loan') }}"  id="wizard" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="MAX_FILE_SIZE" value="64000000" />
                        <input type="hidden" name="application_id" value="{{ App\Models\Application::currentApplication()->id }}">
                        <input type="hidden" name="borrower_id" value="{{ auth()->user()->id }}">
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                        <!-- Personal Info -->
                        <div class="step col-xxl-12" id="step1"  data-aos="fade-left"
                            data-aos-anchor="#example-anchor"
                            data-aos-startEvent="DOMContentLoaded"
                            data-aos-offset="500"
                            data-aos-duration="500">

                            <div style="width: 90%" class="d-flex justify-content-between mb-2">
                                <h5>Profile Details</h5>
                            </div>
                            <br>
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label for="dob">D.O.B</label>
                                    <input value="{{auth()->user()->dob}}" type="date" class="form-control" id="dob" name="dob">
                                    <small id="jobDOBError" class="text-danger"></small>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="jobTitle">JOB TITLE</label>
                                    <input value="{{ auth()->user()->occupation ?? auth()->user()->jobTitle }}"  type="text" class="form-control" id="jobTitleInput" placeholder="eg. Teacher" name="jobTitle">
                                    <small id="jobTitleError" class="text-danger"></small>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="form-group col-md-6">
                                    <label for="phone">PHONE NUMBER
                                        <small class="text-success">(eg. starting with: 975, 772, 965)</small></label>
                                    <div class="input-group">
                                        <select class="form-control" name="pcode">
                                            <option value="260">+260</option>
                                        </select>
                                        <input
                                            id="phone"
                                            value="{{ intval($activeLoan->phone)  }}"
                                            type="text"
                                            data-mask='0000 000 000'
                                            name="phone"
                                            class="form-control"
                                            placeholder="975 --- ---"
                                        />
                                    </div>
                                    <small id="phoneError" class="text-danger"></small>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="employeeNo">EMPLOYEE NO</label>
                                    <input value="{{ auth()->user()->employeeNo }}" type="text" class="form-control" id="employeeNo" placeholder="Employee No." name="employeeNo">
                                    <small id="employeeNoError" class="text-danger"></small>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label for="nrc">IDENTIFICATION TYPE</label>
                                    <div class="input-group">
                                        <select
                                            id="nrc_id"
                                            name="id_type"
                                            class="form-control"
                                            {{-- wire:model.defer="state.id_type" --}}
                                            >  
                                            <option {{ auth()->user()->id_type == null ? 'selected' : ''}} value="">-- ID TYPE --</option>
                                            <option {{ auth()->user()->id_type == 'NRC' ? 'selected' : ''}} value="NRC">NRC</option>
                                            <option {{ auth()->user()->id_type == 'Passport' ? 'selected' : ''}} value="Passport">Passport</option>
                                            <option {{ auth()->user()->id_type == 'Driver Liecense' ? 'selected' : ''}} value="Driver Liecense">Driver Liecense</option>
                                        </select>
                                        <input value="{{auth()->user()->nrc_no ?? auth()->user()->nrc}}" type="text" placeholder="ID Number" class="form-control" id="nrc" name="nrc">
                                    </div>
                                    <small id="nrcError" class="text-danger"></small>
                                    <br>
                                    <small id="nrcIDError" class="text-danger"></small>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="ministry">MINISTRY</label>
                                    <input value="{{ auth()->user()->ministry }}" placeholder="eg. Ministry of Health" type="text" class="form-control" id="ministry" name="ministry">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="form-group col-md-6">
                                    <label for="department">GENDER</label>
                                    <select
                                        id="gender"
                                        class="form-control"
                                        name="gender"
                                        {{-- wire:model.defer="state.gender" --}}
                                        >  
                                        <option> -- GENDER --</option>
                                        <option {{ auth()->user()->gender == 'Male' ? 'selected' : ''}} value="Male">Male</option>
                                        <option {{ auth()->user()->gender == 'Female' ? 'selected' : ''}} value="Female">Female</option>
                                    </select>
                                    <small id="genderError" class="text-danger"></small>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="department">DEPARTMENT</label>
                                    <input value="{{ auth()->user()->department }}" type="text" placeholder="" class="form-control" id="department" name="department">
                                </div>
                            </div>
                            <button type="button" style="float: right;" class="mt-3 btn btn-primary" onclick="nextStep(1)">
                                Next 
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                </svg>
                            </button>
                        </div>

                        {{-- KYC --}}
                        <div class="step" id="step2">
                            <div style="width: 90%" class="d-flex justify-content-between mb-2">
                                <h5>KYC Documents</h5>
                            </div>
                            <br>
                            <div class="row col-md-12 col-lg-12" style="">
                                <div class="file-uploader col-xxl-6 col-xl-6 col-lg-6 border" style="border: 1px #d3d1d1; padding:2%;">
                                    <!-- Use a label for file input and add a Font Awesome icon -->
                                    
                                    <input type="file" value="{{ $meta->uploads->where('name', 'nrc_file')->first()->path }}" class="file-input visually-hidden" id="fileInput" accept=".pdf, .doc, .docx" name="nrc_file">
                                
                                    <label for="fileInput" class="bg-primary p-2 text-white rounded file-input-label">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-cloud-upload" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M4.406 1.342A5.53 5.53 0 0 1 8 0c2.69 0 4.923 2 5.166 4.579C14.758 4.804 16 6.137 16 7.773 16 9.569 14.502 11 12.687 11H10a.5.5 0 0 1 0-1h2.688C13.979 10 15 8.988 15 7.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 2.825 10.328 1 8 1a4.53 4.53 0 0 0-2.941 1.1c-.757.652-1.153 1.438-1.153 2.055v.448l-.445.049C2.064 4.805 1 5.952 1 7.318 1 8.785 2.23 10 3.781 10H6a.5.5 0 0 1 0 1H3.781C1.708 11 0 9.366 0 7.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383z"/>
                                            <path fill-rule="evenodd" d="M7.646 4.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V14.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3z"/>
                                        </svg>
                                        <span>Upload Copy of NRC</span>
                                    </label>
                                    
                                    <!-- Uploaded file list -->
                                    <div class="pt-2">
                                        <ul class="file-list" id="fileList"></ul>
                                        @if ($meta->uploads->where('name', 'nrc_file')->isNotEmpty())
                                            <p  class="file-list">You uploaded a National ID Copy on {{ $meta->uploads->where('name', 'tpin_file')->first()->created_at->toFormattedDateString() }}</p>
                                        @endif
                                    </div>
                                    <small id="nrcFileError" class="text-danger"></small>
                                </div>
                                <div class="file-uploader col-xxl-6 col-xl-6 col-lg-6 border" style="border: 1px #d3d1d1; padding:2%;">
                                    <!-- Use a label for file input and add a Font Awesome icon -->
                                    <input type="file" class="file-input visually-hidden"  value="{{ $meta->uploads->where('name', 'tpin_file')->first()->path }}" id="fileInput2" accept=".pdf, .doc, .docx" name="tpin_file">
                                    <label for="fileInput2" class="bg-primary p-2 text-white rounded file-input-label">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-cloud-upload" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M4.406 1.342A5.53 5.53 0 0 1 8 0c2.69 0 4.923 2 5.166 4.579C14.758 4.804 16 6.137 16 7.773 16 9.569 14.502 11 12.687 11H10a.5.5 0 0 1 0-1h2.688C13.979 10 15 8.988 15 7.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 2.825 10.328 1 8 1a4.53 4.53 0 0 0-2.941 1.1c-.757.652-1.153 1.438-1.153 2.055v.448l-.445.049C2.064 4.805 1 5.952 1 7.318 1 8.785 2.23 10 3.781 10H6a.5.5 0 0 1 0 1H3.781C1.708 11 0 9.366 0 7.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383z"/>
                                            <path fill-rule="evenodd" d="M7.646 4.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V14.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3z"/>
                                        </svg>
                                        <span>Upload Copy of Tpin <span class="badge badge-danger bg-danger">Optional</span></span>
                                    </label>
                                    
                                    <!-- Uploaded file list -->
                                    <div class="pt-2">
                                        <ul class="file-list-2" id="fileList-2"></ul>
                                        @if ($meta->uploads->where('name', 'tpin_file')->isNotEmpty())
                                            <p class="file-list">You uploaded a Tpin Copy on  {{ $meta->uploads->where('name', 'tpin_file')->first()->created_at->toFormattedDateString() }}</p>
                                        @endif
                                    </div>
                                    <small id="fiileInput2Error" class="text-danger"></small>
                                </div>
                            </div>
                            <div style="float: right;" class="mt-2">
                                <button type="button" class="btn btn-light text-dark" onclick="prevStep(2)">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                                    </svg>
                                    Back
                                </button>
                                <button type="button" class="btn btn-primary" onclick="nextStep(2)">
                                    Next 
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <!-- Next of Kin Info -->
                        <div class="step" id="step3">
                            <h5>Next of Kin Details</h5>
                            <br>
                            <div class="row mb-4">
                                <div class="form-group col-md-6">
                                    <label for="nextOfKinFirstName">FIRST NAME (Next of Kin)</label>
                                    <input type="text" value="{{ $meta->next_of_king->first()->fname }}" class="form-control" id="nextOfKinFirstName" name="nextOfKinFirstName">
                                    <small id="nokFNError" class="text-danger"></small>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="nextOfKinLastName">LAST NAME (Next of Kin)</label>
                                    <input type="text" value="{{ $meta->next_of_king->first()->lname }}"  class="form-control" id="nextOfKinLastName" name="nextOfKinLastName">
                                    <small id="nokLNError" class="text-danger"></small>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="form-group col-md-6">
                                    <label for="nextOfKinPhone">PHONE NUMBER (Next of Kin)</label>
                                    <div class="input-group">
                                        <select class="form-control" name="kpcode">
                                            <option value="260">+260</option>
                                        </select>
                                        <input
                                            id="nextOfKinPhone"
                                            type="text"
                                            value="{{ $meta->next_of_king->first()->phone }}" 
                                            name="nextOfKinPhone"
                                            class="form-control"
                                            data-mask='000 000 000'
                                            placeholder=""
                                        />
                                    </div>
                                    <small id="nextOfKinPhoneError" class="text-danger"></small>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="physicalAddress">PHYSICAL ADDRESS (Next of Kin)</label>
                                    <input type="text" value="{{ $meta->next_of_king->first()->address }}"  class="form-control" id="physicalAddress" name="physicalAddress">
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label for="relationship">RELATIONSHIP WITH APPLICANT</label>
                                <input type="text" value="{{ $meta->next_of_king->first()->relation }}"  class="form-control" id="relationship" name="relationship">
                                <small id="relationError" class="text-danger"></small>
                            </div>
                            <div style="float: right;">
                                <button type="button" class="btn btn-light text-dark" onclick="prevStep(3)">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                                    </svg>
                                    Back
                                </button>
                                <button type="button" class="btn btn-primary" onclick="nextStep(3)">
                                    Next 
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        {{-- <div class="step" id="step3">
                            <h4>Guarantor's Information</h4>
                            
                            <div class="row mb-4">
                                <div class="form-group col-md-6">
                                    <label for="guarantorName">Guarantor’s Name</label>
                                    <input type="text" class="form-control" id="guarantorName" name="guarantorName">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="guarantorAddress">Residential address</label>
                                    <input type="text" class="form-control" id="guarantorAddress" name="guarantorAddress">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="form-group col-md-6">
                                    <label for="guarantorNRC">NRC Number</label>
                                    <input type="text" class="form-control" id="guarantorNRC" name="guarantorNRC">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="guarantorDOB">Date of Birth</label>
                                    <input type="date" class="form-control" id="guarantorDOB" name="guarantorDOB">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="form-group col-md-6">
                                    <label for="relationshipToBorrower">Relationship to the Borrower</label>
                                    <input type="text" class="form-control" id="relationshipToBorrower" name="relationshipToBorrower">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="guarantorContactNumber">Contact Number</label>
                                    <input type="text" class="form-control" id="guarantorContactNumber" name="guarantorContactNumber">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="form-group col-md-6">
                                    <label for="alternativeNumber">Alternative Number</label>
                                    <input type="text" class="form-control" id="alternativeNumber" name="alternativeNumber">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="spouseContactNumber">Contact NO. of Spouse</label>
                                    <input type="text" class="form-control" id="spouseContactNumber" name="spouseContactNumber">
                                </div>
                            </div>
                            <!-- Navigation buttons to move to the previous and next steps -->
                            <div style="float: right;">
                                <button type="button" class="btn btn-light text-dark" onclick="prevStep(3)">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                                    </svg>
                                    Back
                                </button>
                                <button type="button" class="btn btn-primary" onclick="nextStep(3)">
                                    Next 
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                    </svg>
                                </button>
                            </div>
                        </div> --}}
                        <!-- References -->
                        <div class="step" id="step4">
                            <h5>References</h5>
                            <p>Human Resource Details:</p>
                            <br>
                            <div class="row mb-4">
                                <div class="form-group col-md-4">
                                    <label for="hrFirstName">FIRST NAME (HR)</label>
                                    <input type="text" value="{{ $meta->refs->first()->hrFname }}" class="form-control" id="hrFirstName" name="hrFirstName">
                                    <small id="fnHRError" class="text-danger"></small>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="hrLastName">LAST NAME (HR)</label>
                                    <input type="text" value="{{ $meta->refs->first()->hrLname }}" class="form-control" id="hrLastName" name="hrLastName">
                                    <small id="lnHRError" class="text-danger"></small>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="hrContactNumber">CONTACT NUMBER (HR)</label>
                                    <input type="text" value="{{ $meta->refs->first()->hrContactNumber }}" data-mask='000 0000 000' class="form-control" id="hrContactNumber" name="hrContactNumber">
                                    <small id="contactHRError" class="text-danger"></small>
                                </div>
                            </div>
    
                            <p>Supervisor Details:</p>
                            <div class="row mb-4">
                                <div class="form-group col-md-4">
                                    <label for="supervisorFirstName">FIRST NAME (Supervisor)</label>
                                    <input type="text" value="{{ $meta->refs->first()->supervisorFirstName }}" class="form-control" id="supervisorFirstName" name="supervisorFirstName">
                                    <small id="supFNError" class="text-danger"></small>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="supervisorLastName">LAST NAME (Supervisor)</label>
                                    <input type="text" value="{{ $meta->refs->first()->supervisorLastName }}" class="form-control" id="supervisorLastName" name="supervisorLastName">
                                    <small id="supLNError" class="text-danger"></small>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="supervisorContactNumber">CONTACT NUMBER (Supervisor)</label>
                                    <input type="text" value="{{ $meta->refs->first()->supervisorContactNumber }}" data-mask='000 0000 000' class="form-control" id="supervisorContactNumber" name="supervisorContactNumber">
                                    <small id="supContactError" class="text-danger"></small>
                                </div>
                            </div>
                            <div style="float: right;">
                                <button type="button" class="btn btn-light text-dark" onclick="prevStep(4)">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                                    </svg>
                                    Back
                                </button>
                                <button type="button" class="btn btn-primary" onclick="nextStep(4)">
                                    Next 
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
    
                        <!-- Bank Details -->
                        <div class="step" id="step5">
                            <h5>Bank Details</h5>
                            <br>
                            <div class="row mb-4">
                                <div class="form-group col-md-6">
                                    <label for="bankName">BANK NAME</label>
                                    <input type="text" value="{{ $meta->bank->first()->bankName }}" class="form-control" id="bankName" name="bankName">
                                    <small id="bankNameError" class="text-danger"></small>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="branchName">BRANCH NAME</label>
                                    <input type="text" value="{{ $meta->bank->first()->branchName }}" class="form-control" id="branchName" name="branchName">
                                    <small id="bankBranchError" class="text-danger"></small>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="form-group col-md-6">
                                    <label for="accountNumber">ACCOUNT NUMBER</label>
                                    <input type="text" value="{{ $meta->bank->first()->accountNumber }}" class="form-control" id="accountNumber" name="accountNumber" placeholder="XXXX XXXX XXXX XXXX">
                                    <small id="bankAccError" class="text-danger"></small>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="accountNames">ACCOUNT NAMES</label>
                                    <input type="text" value="{{ $meta->bank->first()->accountNames }}" class="form-control" id="accountNames" name="accountNames">
                                    <small id="bankAccNameError" class="text-danger"></small>
                                </div>
                            </div>
                            <div style="float: right;">
                                <button type="button" class="btn btn-light text-dark" onclick="prevStep(5)">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                                    </svg>
                                    Back
                                </button>
                                <button type="button" class="btn btn-primary" onclick="nextStep(5)">
                                    Next 
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
    
                        <!-- Bank Details -->
                        <div class="step" id="step6">
                            <div style="width: 90%" class="d-block justify-content-start mb-2">
                                <h5>Requirements</h5>
                                <span class="justify-content-end items-right float-right text-left">
                                    <p>Click the button below to share preapproval form, if missing</p>
                                    <button title="Send the preapproval form to employer, manager, or supervisor" type="button" class="btn btn-sm" style="background-color: rgb(54, 15, 94)" onclick="openSendDocModal()">Send Preapproval</button>
                                </span>
                            </div>
                            <br>
                            <div class="col-xxl-12 col-xl-12 col-lg-12">
                                <div class="text-success" id="sendDocResponseText">Pre-approval forms share successfully</div>
                                <div class="text-danger" id="sendDocResponseText2">Could not send, Please try again</div>
                            </div>
                            {{-- <small>Please upload a Copy of your <b>NRC(Front & Back)</b>, <b>latest Payslip</b>, <b>3 months Bank statement</b> and <b>passport size photo</b></small> --}}
                            <div class="row col-md-12 col-lg-12" style="">
                                <div class="file-uploader col-xxl-6 col-xl-6 col-lg-6 border" style="border: 1px #d3d1d1; padding:2%;">
                                    <!-- Use a label for file input and add a Font Awesome icon -->
                                    <input type="file" value="{{ $meta->uploads->where('name', 'payslip_file')->first()->path }}" class="file-input visually-hidden" id="fileInput3" accept=".pdf, .doc, .docx" name="payslip_file">
                                    <label for="fileInput3" class="file-input-label">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-cloud-upload" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M4.406 1.342A5.53 5.53 0 0 1 8 0c2.69 0 4.923 2 5.166 4.579C14.758 4.804 16 6.137 16 7.773 16 9.569 14.502 11 12.687 11H10a.5.5 0 0 1 0-1h2.688C13.979 10 15 8.988 15 7.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 2.825 10.328 1 8 1a4.53 4.53 0 0 0-2.941 1.1c-.757.652-1.153 1.438-1.153 2.055v.448l-.445.049C2.064 4.805 1 5.952 1 7.318 1 8.785 2.23 10 3.781 10H6a.5.5 0 0 1 0 1H3.781C1.708 11 0 9.366 0 7.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383z"/>
                                            <path fill-rule="evenodd" d="M7.646 4.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V14.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3z"/>
                                        </svg>
                                        <span>Upload Latest Payslip</span>
                                    </label>
                                    
                                    <!-- Uploaded file list -->
                                    <div class="pt-2">
                                        <ul class="file-list-2" id="fileList-3"></ul>
                                        @if ($meta->uploads->where('name', 'payslip_file')->isNotEmpty())
                                            <p class="file-list">You uploaded a Payslip Copy on  {{ $meta->uploads->where('name', 'payslip_file')->first()->created_at->toFormattedDateString() }}</p>
                                        @endif
                                    </div>
                                    <small id="payslipError" class="text-danger"></small>
                                </div>
                                <div class="file-uploader col-xxl-6 col-xl-6 col-lg-6 border" style="border: 1px #d3d1d1; padding:2%;">
                                    <!-- Use a label for file input and add a Font Awesome icon -->
                                    <input type="file" value="{{ $meta->uploads->where('name', 'bankstatement')->first()->path }}" class="file-input visually-hidden" id="fileInput4" accept=".pdf, .doc, .docx" name="bankstatement">
                                    <label for="fileInput4" class="file-input-label">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-cloud-upload" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M4.406 1.342A5.53 5.53 0 0 1 8 0c2.69 0 4.923 2 5.166 4.579C14.758 4.804 16 6.137 16 7.773 16 9.569 14.502 11 12.687 11H10a.5.5 0 0 1 0-1h2.688C13.979 10 15 8.988 15 7.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 2.825 10.328 1 8 1a4.53 4.53 0 0 0-2.941 1.1c-.757.652-1.153 1.438-1.153 2.055v.448l-.445.049C2.064 4.805 1 5.952 1 7.318 1 8.785 2.23 10 3.781 10H6a.5.5 0 0 1 0 1H3.781C1.708 11 0 9.366 0 7.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383z"/>
                                            <path fill-rule="evenodd" d="M7.646 4.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V14.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3z"/>
                                        </svg>
                                        <span>3 months Bank statement</span>
                                    </label>
                                    
                                    <!-- Uploaded file list -->
                                    <div class="pt-2">
                                        <ul class="file-list-3" id="fileList-4"></ul>
                                        @if ($meta->uploads->where('name', 'bankstatement')->isNotEmpty())
                                            <p class="file-list">You uploaded a Bank Statement Copy on  {{ $meta->uploads->where('name', 'bankstatement')->first()->created_at->toFormattedDateString() }}</p>
                                        @endif
                                    </div>
                                    <small id="bankstatementError" class="text-danger"></small>
                                </div>
                                <div class="file-uploader col-xxl-6 col-xl-6 col-lg-6 border" style="border: 1px #d3d1d1; padding:2%;">
                                    <!-- Use a label for file input and add a Font Awesome icon -->
                                    <input type="file" value="{{ $meta->uploads->where('name', 'passport')->first()->path }}" class="file-input visually-hidden" id="fileInput5" accept=".pdf, .doc, .docx" name="passport">
                                    <label for="fileInput5" class="file-input-label">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-cloud-upload" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M4.406 1.342A5.53 5.53 0 0 1 8 0c2.69 0 4.923 2 5.166 4.579C14.758 4.804 16 6.137 16 7.773 16 9.569 14.502 11 12.687 11H10a.5.5 0 0 1 0-1h2.688C13.979 10 15 8.988 15 7.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 2.825 10.328 1 8 1a4.53 4.53 0 0 0-2.941 1.1c-.757.652-1.153 1.438-1.153 2.055v.448l-.445.049C2.064 4.805 1 5.952 1 7.318 1 8.785 2.23 10 3.781 10H6a.5.5 0 0 1 0 1H3.781C1.708 11 0 9.366 0 7.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383z"/>
                                            <path fill-rule="evenodd" d="M7.646 4.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V14.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3z"/>
                                        </svg>
                                        <span>Passport size photo</span>
                                    </label>
                                    
                                    <!-- Uploaded file list -->
                                    <div class="pt-2">
                                        <ul class="file-list-4" id="fileList-5"></ul>
                                        @if ($meta->uploads->where('name', 'passport')->isNotEmpty())
                                            <p class="file-list">You uploaded a Passport Size photo on  {{ $meta->uploads->where('name', 'passport')->first()->created_at->toFormattedDateString() }}</p>
                                        @endif
                                    </div>
                                    <small id="passportError" class="text-danger"></small>
                                </div>
                                <div class="file-uploader col-xxl-6 col-xl-6 col-lg-6 border" style="border: 1px #d3d1d1; padding:2%;">
                                    <!-- Use a label for file input and add a Font Awesome icon -->
                                    <input type="file" value="{{ $meta->uploads->where('name', 'preapproval')->first()->path }}" class="file-input visually-hidden" id="fileInput6" accept=".pdf, .doc, .docx" name="preapproval">
                                    <label for="fileInput6" class="file-input-label">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-cloud-upload" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M4.406 1.342A5.53 5.53 0 0 1 8 0c2.69 0 4.923 2 5.166 4.579C14.758 4.804 16 6.137 16 7.773 16 9.569 14.502 11 12.687 11H10a.5.5 0 0 1 0-1h2.688C13.979 10 15 8.988 15 7.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 2.825 10.328 1 8 1a4.53 4.53 0 0 0-2.941 1.1c-.757.652-1.153 1.438-1.153 2.055v.448l-.445.049C2.064 4.805 1 5.952 1 7.318 1 8.785 2.23 10 3.781 10H6a.5.5 0 0 1 0 1H3.781C1.708 11 0 9.366 0 7.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383z"/>
                                            <path fill-rule="evenodd" d="M7.646 4.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V14.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3z"/>
                                        </svg>
                                        <span>Pre approval Document</span>
                                    </label>
                                    
                                    <!-- Uploaded file list -->
                                    <div class="pt-2">
                                        <ul class="file-list-5" id="fileList-6"></ul>
                                        @if ($meta->uploads->where('name', 'preapproval')->isNotEmpty())
                                            <p class="file-list">You uploaded a Pre-approval form Copy on  {{ $meta->uploads->where('name', 'preapproval')->first()->created_at->toFormattedDateString() }}</p>
                                        @endif
                                    </div>
                                    <small id="preapprovalError" class="text-danger"></small>
                                </div>
                                <div class="file-uploader col-xxl-6 col-xl-6 col-lg-6 border" style="border: 1px #d3d1d1; padding:2%;">
                                    <!-- Use a label for file input and add a Font Awesome icon -->
                                    <input type="file" value="{{ $meta->uploads->where('name', 'letterofintro')->first()->path }}" class="file-input visually-hidden" id="fileInput7" accept=".pdf, .doc, .docx" name="letterofintro">
                                    <label for="fileInput7" class="file-input-label">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-cloud-upload" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M4.406 1.342A5.53 5.53 0 0 1 8 0c2.69 0 4.923 2 5.166 4.579C14.758 4.804 16 6.137 16 7.773 16 9.569 14.502 11 12.687 11H10a.5.5 0 0 1 0-1h2.688C13.979 10 15 8.988 15 7.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 2.825 10.328 1 8 1a4.53 4.53 0 0 0-2.941 1.1c-.757.652-1.153 1.438-1.153 2.055v.448l-.445.049C2.064 4.805 1 5.952 1 7.318 1 8.785 2.23 10 3.781 10H6a.5.5 0 0 1 0 1H3.781C1.708 11 0 9.366 0 7.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383z"/>
                                            <path fill-rule="evenodd" d="M7.646 4.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V14.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3z"/>
                                        </svg>
                                        <span>Letter of Introduction <span class="badge badge-danger bg-danger">Optional</span></span>
                                    </label>
                                    
                                    <!-- Uploaded file list -->
                                    <div class="pt-2">
                                        <ul class="file-list-5" id="fileList-7"></ul>
                                        @if ($meta->uploads->where('name', 'letterofintro')->isNotEmpty())
                                            <p class="file-list">You uploaded a Letter of Introduction Copy on  {{ $meta->uploads->where('name', 'letterofintro')->first()->created_at->toFormattedDateString() }}</p>
                                        @endif
                                    </div>
                                    <small id="letterError" class="text-danger"></small>
                                </div>
                            </div>
                            <div style="float: right;">
                                <button type="button" class="btn btn-light text-dark" onclick="prevStep(6)">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                                    </svg>
                                    Back
                                </button>
                                <button type="button" class="btn btn-primary" onclick="nextStep(6)">
                                    Next 
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
    
    
                        <!-- Loan Details -->
                        <div class="step" id="step7">
                            <h5>Loan Summary Details</h5>
                            <br>
                            <div class="col-lg-12 row">
                                <div class="form-group col-md-6">
                                    <p>Loan Amount: <b>K{{ $activeLoan->amount }}</b> </p>
                                    <p>Loan Type: <b>{{ $activeLoan->type }} Loan</b> </p>
                                    <p>Interest rate: <b>21%</b> </p>
                                    <p>Service Charge:  <b>K3.5</b> </p>
                                    <p>Repayment Period: <b>{{ $activeLoan->repayment_plan }} Months</b> </p>
                                    
                                    <input type="hidden" name="final" value="1">
                                </div>
                                <div class="form-group col-md-6">
                                    <p>Payback Amount: <b>K {{ App\Models\Application::payback($activeLoan->amount, $activeLoan->repayment_plan)}}</b> </p>
                                    <p>Phone Number: <b>{{ intval($activeLoan->phone)  }}</b> </p>
                                    <p>Email: <b>{{ auth()->user()->email }}</b> </p>
                                </div>
                            </div>
                            <div style="float: right;">
                                <button id="backicon" type="button" class="btn btn-light text-dark" onclick="prevStep(7)">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                                    </svg>
                                    Back
                                </button>
                                <button type="submit" id="submit_click" class="btn btn-primary">
                                    <div id="ploading" style="display:none;">
                                        <svg width="60" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200"><circle fill="#ffff" stroke="#ffff" stroke-width="2" r="15" cx="35" cy="100"><animate attributeName="cx" calcMode="spline" dur="0.9" values="35;165;165;35;35" keySplines="0 .1 .5 1;0 .1 .5 1;0 .1 .5 1;0 .1 .5 1" repeatCount="indefinite" begin="0"></animate></circle><circle fill="#ffff" stroke="#BB14FF" stroke-width="2" opacity=".8" r="15" cx="35" cy="100"><animate attributeName="cx" calcMode="spline" dur="0.9" values="35;165;165;35;35" keySplines="0 .1 .5 1;0 .1 .5 1;0 .1 .5 1;0 .1 .5 1" repeatCount="indefinite" begin="0.05"></animate></circle><circle fill="#F0E7F9" stroke="#BB14FF" stroke-width="2" opacity=".6" r="15" cx="35" cy="100"><animate attributeName="cx" calcMode="spline" dur="0.9" values="35;165;165;35;35" keySplines="0 .1 .5 1;0 .1 .5 1;0 .1 .5 1;0 .1 .5 1" repeatCount="indefinite" begin=".1"></animate></circle><circle fill="#BB14FF" stroke="#BB14FF" stroke-width="2" opacity=".4" r="15" cx="35" cy="100"><animate attributeName="cx" calcMode="spline" dur="0.9" values="35;165;165;35;35" keySplines="0 .1 .5 1;0 .1 .5 1;0 .1 .5 1;0 .1 .5 1" repeatCount="indefinite" begin=".15"></animate></circle><circle fill="#BB14FF" stroke="#BB14FF" stroke-width="2" opacity=".2" r="15" cx="35" cy="100"><animate attributeName="cx" calcMode="spline" dur="0.9" values="35;165;165;35;35" keySplines="0 .1 .5 1;0 .1 .5 1;0 .1 .5 1;0 .1 .5 1" repeatCount="indefinite" begin=".2"></animate></circle></svg>
                                        <small>Please wait...</small>
                                    </div>
                                    <div id="finishicon">
                                        Finish
                                        <svg  xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                        </svg>
                                    </div>
                                </button>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    // if (window.innerWidth > 768) {
    //     AOS.init();
    // }
    let currentStep = 1;
    showStep(1);

    function showStep(step) {
      const steps = document.querySelectorAll('.step');
      steps.forEach((stepElem) => stepElem.style.display = 'none');

      const currentStep = document.getElementById('step' + step);
      currentStep.style.display = 'block';

      // Attach AOS attributes to the current step element
      currentStep.setAttribute('data-aos', 'fade-left');
      currentStep.setAttribute('data-aos-anchor', '#example-anchor');
      currentStep.setAttribute('data-aos-offset', '500');
      currentStep.setAttribute('data-aos-duration', '500');
      currentStep.setAttribute('data-aos-once', 'false');
      currentStep.setAttribute('data-aos-mirror', 'true');
      
      // Initialize AOS for the current step
      AOS.init({
          duration: 1000, // You can set a default duration for AOS
      });

      // Refresh AOS to apply the changes
      AOS.refresh();
    }

    function nextStep(step) {
      switch (step) {
        case 1:
          if (_validate_step1()) {
            currentStep += 1;
            showStep(currentStep);
          }
          break;
        case 2:
          if (_validate_step2()) {
            currentStep += 1;
            showStep(currentStep);
          }
          break;
        case 3:
          if (_validate_step3()) {
            currentStep += 1;
            showStep(currentStep);
          }
          break;
        case 4:
          if (_validate_step4()) {
            currentStep += 1;
            showStep(currentStep);
          }
          break;
        case 5:
          if (_validate_step5()) {
            currentStep += 1;
            showStep(currentStep);
          }
          break;
        case 6:
          if (_validate_step6()) {
            currentStep += 1;
            showStep(currentStep);
          }
          break;
      
        default:
        
          currentStep += 1;
          showStep(currentStep);
          break;
      }
    }

    function prevStep(step) {
        currentStep -= 1;
        showStep(currentStep);
    }

    document.getElementById('submit_click').addEventListener('click', function() {// Disable the button
        document.getElementById('submit_click').classList.remove('btn-primary');
        document.getElementById('submit_click').classList.add('text-dark');

        // Show loading animation and hide finish icon
        document.getElementById('ploading').style.display = 'inline-block';
        
        document.getElementById('finishicon').style.display = 'none';
        document.getElementById('backicon').style.display = 'none';

        // You can add additional logic here, such as form submission or other actions.

        // For demonstration purposes, let's simulate a delay (e.g., 3 seconds) before resetting the button state.
        setTimeout(function() {
            // Hide loading animation and show finish icon
            document.getElementById('ploading').style.display = 'none';
            document.getElementById('finishicon').style.display = 'inline-block';
            document.getElementById('backicon').style.display = 'inline-block';
        }, 10000);
    });

    function _validate_step1(){
      var jobTitleInput = document.getElementById('jobTitleInput');
      var jobTitleError = document.getElementById('jobTitleError');
      var employeeNo = document.getElementById('employeeNo');
      var employeeNoError = document.getElementById('employeeNoError');
      var dobInput = document.getElementById('dob');
      var dobError = document.getElementById('jobDOBError');
      var phoneInput = document.getElementById('phone');
      var phoneError = document.getElementById('phoneError');
      var nrcInput = document.getElementById('nrc');
      var nrcError = document.getElementById('nrcError');
      var genderInput = document.getElementById('gender');
      var genderError = document.getElementById('genderError');
      var nrc_idInput = document.getElementById('nrc_id');
      var nrcIDError = document.getElementById('nrcIDError');

      var ministry = document.getElementById('ministry');
      var department = document.getElementById('department');

      // In this example, we'll check if the input is not empty
      if (!employeeNo.value) {
          employeeNoError.textContent = 'Employee Number is required';
      }
      if (!jobTitleInput.value) {
          jobTitleError.textContent = 'Job Title is required';
      }
      if (!dobInput.value) {
          dobError.textContent = 'DOB is required';
      }
      if (!phoneInput.value) {
          phoneError.textContent = 'Phone is required';
      }
      if (!nrcInput.value) {
          nrcError.textContent = 'Identification ID is required';
      }
      if (!genderInput.value) {
          genderError.textContent = 'Gender is required';
      } 
      if (!nrc_idInput.value) {
          nrcIDError.textContent = 'Identification Type is required';
      } 
      
      if (!employeeNo.value || !jobTitleInput.value || !dobInput.value || !phoneInput.value || !nrcInput.value || !genderInput.value || !nrc_idInput.value) {
          return false;
      } else {
          // Prepare data to send to the server
          var formData = new FormData();
          formData.append('jobTitle', jobTitleInput.value);
          formData.append('dob', dobInput.value);
          formData.append('phone', phoneInput.value);
          formData.append('nrc', nrcInput.value);
          formData.append('gender', genderInput.value);
          formData.append('nrc_id', nrc_idInput.value);
          formData.append('employeeNo', employeeNo.value);
          formData.append('ministry', ministry.value);
          formData.append('department', department.value);
          formData.append('borrower_id', '{{ auth()->user()->id }}');
    
          // Perform Fetch API request to the Laravel backend
          fetch("{{ route('continue-loan') }}", {
              method: 'POST',
              body: formData
          })
          .then(response => response.json())
          .then(data => {
              // Handle the success response from the server
              console.log('Data successfully updated or created:', data);
          })
          .catch(error => {
              // Handle the error response from the server
              // console.error('Error updating or creating data:', error);
          });
          return true;
      }

    }

    function _validate_step2(){
      var fileInput = document.getElementById('fileInput');
      var nrcFileError = document.getElementById('nrcFileError');
      var fileInput2 = document.getElementById('fileInput2');
      var fiileInput2Error = document.getElementById('fiileInput2Error');

      var nrcExists = "{{$meta->uploads->where('name', 'nrc_file')->first()->path}}";
      var tpinExists = "{{$meta->uploads->where('name', 'tpin_file')->first()->path}}";

      // In this example, we'll check if the input is not empty
      if (!fileInput.value && nrcExists === 'null') {
        nrcFileError.textContent = 'Please upload copy of national ID';
      }
        //   if (!fileInput2.value && tpinExists === 'null') {
        //     fiileInput2Error.textContent = 'Please upload copy of Tpin';
        //   }
        // !fileInput2.value && tpinExists === 'null' || 
      if (!fileInput.value && nrcExists === 'null') {
          return false;
      } else {
  
          // Prepare data to send to the server
          var formData = new FormData();

          // Get the files
          formData.append('nrc_file', fileInput.files[0]);
          formData.append('tpin_file', fileInput2.files[0]);
    
          // Perform Fetch API request to the Laravel backend
          fetch("{{ route('continue-loan') }}", {
              method: 'POST',
              body: formData
          })
          .then(response => response.json())
          .then(data => {
              // Handle the success response from the server
              console.log('Data successfully updated or created:', data);
          })
          .catch(error => {
              // Handle the error response from the server
              // console.error('Error updating or creating data:', error);
          });
          return true;
      }

    } 

    function _validate_step3(){
      // Required
      var nextOfKinFirstName = document.getElementById('nextOfKinFirstName');
      var nokFNError = document.getElementById('nokFNError');
      var nextOfKinLastName = document.getElementById('nextOfKinLastName');
      var nokLNError = document.getElementById('nokLNError');
      var nextOfKinPhone = document.getElementById('nextOfKinPhone');
      var nextOfKinPhoneError = document.getElementById('nextOfKinPhoneError');
      var relationshipInput = document.getElementById('relationship');
      var relationError = document.getElementById('relationError');
      // optionals
      var physicalAddress = document.getElementById('physicalAddress');
      
      

      // In this example, we'll check if the input is not empty
      if (!nextOfKinFirstName.value) {
        nokFNError.textContent = 'First Name required';
      }
      if (!nextOfKinLastName.value) {
        nokLNError.textContent = 'First Name required';
      }
      if (!nextOfKinPhone.value) {
        nextOfKinPhoneError.textContent = 'Phone number required';
      }
      if (!relationshipInput.value) {
        relationError.textContent = 'Your relation is required';
      }
      
      if (!nextOfKinLastName.value || !nextOfKinFirstName.value || !nextOfKinPhone.value || !relationshipInput.value ) {
          return false;
      } else {
          // Prepare data to send to the server
          var formData = new FormData();
          formData.append('nextOfKinFirstName', nextOfKinFirstName.value);
          formData.append('nextOfKinLastName', nextOfKinLastName.value);
          formData.append('nextOfKinPhone', nextOfKinPhone.value);
          formData.append('relationship', relationshipInput.value);
          formData.append('physicalAddress', physicalAddress.value);
          formData.append('borrower_id', '{{ auth()->user()->id }}');
    
          // Perform Fetch API request to the Laravel backend
          fetch("{{ route('continue-loan') }}", {
              method: 'POST',
              body: formData
          })
          .then(response => response.json())
          .then(data => {
              // Handle the success response from the server
              console.log('Data successfully updated or created:', data);
          })
          .catch(error => {
              // Handle the error response from the server
              // console.error('Error updating or creating data:', error);
          });
          return true;
      }

    } 
    
    function _validate_step4(){
      var hrFirstName = document.getElementById('hrFirstName');
      var fnHRError = document.getElementById('fnHRError');
      var hrLastName = document.getElementById('hrLastName');
      var lnHRError = document.getElementById('lnHRError');
      var hrContactNumber = document.getElementById('hrContactNumber');
      var contactHRError = document.getElementById('contactHRError');
      var supervisorFirstName = document.getElementById('supervisorFirstName');
      var supLNError = document.getElementById('supLNError');
      var supervisorLastName = document.getElementById('supervisorLastName');
      var supFNError = document.getElementById('supFNError');
      var supervisorContactNumber = document.getElementById('supervisorContactNumber');
      var supContactError = document.getElementById('supContactError');
      

      // In this example, we'll check if the input is not empty
      if (!hrFirstName.value) {
        fnHRError.textContent = 'HR First Name required';
      }
      if (!hrLastName.value) {
        lnHRError.textContent = 'HR Last Name required';
      }
      if (!hrContactNumber.value) {
        contactHRError.textContent = 'HR contact is required';
      }

        //   ---- supervisor
    //   if (!supervisorLastName.value) {
    //     supLNError.textContent = 'Supervisor First Name';
    //   }
    //   if (!supervisorFirstName.value) {
    //     supFNError.textContent = 'Supervisor Last Name';
    //   }
    //   if (!supervisorContactNumber.value) {
    //     supContactError.textContent = 'Supervisor Conact Number';
    //   }
    // || !supervisorLastName.value || !supervisorFirstName.value || !supervisorContactNumber.value 
      if (!hrFirstName.value || !hrLastName.value || !hrContactNumber.value ) {
          return false;
      } else {
          // Prepare data to send to the server
          var formData = new FormData();
          formData.append('hrFirstName', hrFirstName.value);
          formData.append('hrLastName', hrLastName.value);
          formData.append('hrContactNumber', hrContactNumber.value);
          formData.append('supervisorFirstName', supervisorFirstName.value);
          formData.append('supervisorLastName', supervisorLastName.value);
          formData.append('supervisorContactNumber', supervisorContactNumber.value);
          formData.append('application_id', '{{ $activeLoan->id }}');
          formData.append('borrower_id', '{{ auth()->user()->id }}');
    
          // Perform Fetch API request to the Laravel backend
          fetch("{{ route('continue-loan') }}", {
              method: 'POST',
              body: formData
          })
          .then(response => response.json())
          .then(data => {
              // Handle the success response from the server
              console.log('Data successfully updated or created:', data);
          })
          .catch(error => {
              // Handle the error response from the server
              // console.error('Error updating or creating data:', error);
          });
          return true;
      }
    }

    function _validate_step5(){
      var bankName = document.getElementById('bankName');
      var bankNameError = document.getElementById('bankNameError');
      var branchName = document.getElementById('branchName');
      var bankBranchError = document.getElementById('bankBranchError');
      var accountNumber = document.getElementById('accountNumber');
      var bankAccError = document.getElementById('bankAccError');
      var accountNames = document.getElementById('accountNames');
      var bankAccNameError = document.getElementById('bankAccNameError');      

      // In this example, we'll check if the input is not empty
      if (!bankName.value) {
        bankNameError.textContent = 'Bank Name required';
      }
      if (!branchName.value) {
        bankBranchError.textContent = 'Branch Name required';
      }
      if (!accountNumber.value) {
        bankAccError.textContent = 'Account Number is required';
      }
      if (!accountNames.value) {
        bankAccNameError.textContent = 'Account Name required';
      }

      if (!bankName.value || !branchName.value || !accountNumber.value || !accountNames.value ) {
          return false;
      } else {
          // Prepare data to send to the server
          var formData = new FormData();
          formData.append('bankName', bankName.value);
          formData.append('branchName', branchName.value);
          formData.append('accountNames', accountNames.value);
          formData.append('accountNumber', accountNumber.value);
          formData.append('user_id', '{{ auth()->user()->id }}');
    
          // Perform Fetch API request to the Laravel backend
          fetch("{{ route('continue-loan') }}", {
              method: 'POST',
              body: formData
          })
          .then(response => response.json())
          .then(data => {
              // Handle the success response from the server
              console.log('Data successfully updated or created:', data);
          })
          .catch(error => {
              // Handle the error response from the server
              // console.error('Error updating or creating data:', error);
          });
          return true;
      }
    }
    
    function _validate_step6(){
      var fileInput3 = document.getElementById('fileInput3');
      var payslipError = document.getElementById('payslipError');
      var fileInput4 = document.getElementById('fileInput4');
      var bankstatementError = document.getElementById('bankstatementError');
      var fileInput5 = document.getElementById('fileInput5');
      var passportError = document.getElementById('passportError');
      var fileInput6 = document.getElementById('fileInput6');
      var preapprovalError = document.getElementById('preapprovalError');
      var fileInput7 = document.getElementById('fileInput7');
      var letterError = document.getElementById('letterError');

      
      var payslipExists = "{{$meta->uploads->where('name', 'nrc_file')->first()->path}}";
      var bankExists = "{{$meta->uploads->where('name', 'bankstatement')->first()->path}}";
      var passportExists = "{{$meta->uploads->where('name', 'passport')->first()->path}}";
      var preapprovalExists = "{{$meta->uploads->where('name', 'preapproval')->first()->path}}";
      var letterExists = "{{$meta->uploads->where('name', 'letterofintro')->first()->path}}";

      // we'll check if the input is not empty
      if (!fileInput3.value && payslipExists === 'null') {
        payslipError.textContent = 'Please upload copy of Latest Payslip';
      }
      if (!fileInput4.value && bankExists === 'null') {
        bankstatementError.textContent = 'Please upload copy of Bank Statement';
      }
      if (!fileInput5.value && passportExists === 'null') {
        passportError.textContent = 'Please upload a Passport size photo';
      }
      if (!fileInput6.value && preapprovalExists === 'null') {
        preapprovalError.textContent = 'Please upload signed Preapproval form';
      }
      
      if (!fileInput3.value && payslipExists === 'null'|| 
          !fileInput4.value && bankExists === 'null' || 
          !fileInput5.value && passportExists === 'null'|| 
          !fileInput6.value && preapprovalExists === 'null' ) {
          return false;
      } else {
          // Prepare data to send to the server
          var formData = new FormData();

          // Get the files
          formData.append('payslip_file', fileInput3.files[0]);
          formData.append('bankstatement', fileInput4.files[0]);
          formData.append('passport', fileInput5.files[0]);
          formData.append('preapproval', fileInput6.files[0]);
          formData.append('letterofintro', fileInput7.files[0]);
    
          // Perform Fetch API request to the Laravel backend
          fetch("{{ route('continue-loan') }}", {
              method: 'POST',
              body: formData
          })
          .then(response => response.json())
          .then(data => {
              // Handle the success response from the server
              console.log('Data successfully updated or created:', data);
          })
          .catch(error => {
              // Handle the error response from the server
              // console.error('Error updating or creating data:', error);
          });
          return true;
      }

    } 



    // NRC
    // JavaScript to handle file selection and removal
    const fileInput = document.getElementById('fileInput');
    const fileList = document.getElementById('fileList');

    const uploadedFiles = [];
    // const uploadedFilesJson = [];

    // JavaScript to handle file selection and removal
    fileInput.addEventListener('change', function () {
    const files = this.files; 
    // Initialize an array to store uploaded file names

  if (files.length > 0) {

      // Add the uploaded files to the uploadedFiles array
      Array.from(files).forEach(file => {
          uploadedFiles.push(file);

          const listItem = document.createElement('li');
          listItem.className = 'file-item grid pb-1';
          listItem.innerHTML = `
              <span class="grid-file-item">${file.name}</span>
              <button class="grid-file-item-btn" type="button" class="remove-button" data-name="${file.name}">x</button>
          `;
          fileList.appendChild(listItem);
      });
  }
  });
  fileList.addEventListener('click', function (e) {

  // console.log(e.target.classList.value);
  if (e.target.classList.value == 'grid-file-item-btn') {
      const fileName = e.target.getAttribute('data-name');
      const fileItem = e.target.parentElement;
      fileItem.remove();
      // Remove the file name from the uploadedFiles array
      const fileIndex = uploadedFiles.indexOf(fileName);
      if (fileIndex !== -1) {
          uploadedFiles.splice(fileIndex, 1);
      }
      // Update the hidden input with the updated uploaded files
      myUploadedFilesInput.value = JSON.stringify(uploadedFiles);
      // You can perform additional actions here (e.g., remove the file from the server).
  }
  });


  //Tpin File Upload
  // JavaScript to handle file selection and removal
  const fileInput2 = document.getElementById('fileInput2');
  const fileList2 = document.getElementById('fileList-2');

  const uploadedFiles2 = [];
  // const uploadedFilesJson = [];

  // JavaScript to handle file selection and removal
  fileInput2.addEventListener('change', function () {
  const files = this.files; 
  // Initialize an array to store uploaded file names

  if (files.length > 0) {

      // Add the uploaded files to the uploadedFiles array
      Array.from(files).forEach(file => {
      
          uploadedFiles2.push(file);

          const listItem = document.createElement('li');
          listItem.className = 'file-item grid pb-1';
          listItem.innerHTML = `
              <span class="grid-file-item">${file.name}</span>
              <button class="grid-file-item-btn" type="button" class="remove-button" data-name="${file.name}">x</button>
          `;

          fileList2.appendChild(listItem);
      });
  }
  });

  fileList2.addEventListener('click', function (e) {
    // console.log(e.target.classList.value);
    if (e.target.classList.value == 'grid-file-item-btn') {
        const fileName = e.target.getAttribute('data-name');
        const fileItem = e.target.parentElement;
        fileItem.remove();
        // Remove the file name from the uploadedFiles array
        const fileIndex = uploadedFiles.indexOf(fileName);
        if (fileIndex !== -1) {
            uploadedFiles2.splice(fileIndex, 1);
        }
        // Update the hidden input with the updated uploaded files
        myUploadedFilesInput.value = JSON.stringify(uploadedFiles);
        // You can perform additional actions here (e.g., remove the file from the server).
    }
  });


  // 3 months bank statement
  // JavaScript to handle file selection and removal
  const fileInput3 = document.getElementById('fileInput3');
  const fileList3 = document.getElementById('fileList-3');

  const uploadedFiles3 = [];
  // const uploadedFilesJson = [];

  // JavaScript to handle file selection and removal
  fileInput3.addEventListener('change', function () {
  const files = this.files; 
  // Initialize an array to store uploaded file names

  if (files.length > 0) {

      // Add the uploaded files to the uploadedFiles array
      Array.from(files).forEach(file => {
      
          uploadedFiles3.push(file);

          const listItem = document.createElement('li');
          listItem.className = 'file-item grid pb-1';
          listItem.innerHTML = `
              <span class="grid-file-item">${file.name}</span>
              <button class="grid-file-item-btn" type="button" class="remove-button" data-name="${file.name}">x</button>
          `;

          fileList3.appendChild(listItem);
      });
  }
  });
  fileList3.addEventListener('click', function (e) {
  if (e.target.classList.value == 'grid-file-item-btn') {
      const fileName = e.target.getAttribute('data-name');
      const fileItem = e.target.parentElement;
      fileItem.remove();
      // Remove the file name from the uploadedFiles array
      const fileIndex = uploadedFiles.indexOf(fileName);
      if (fileIndex !== -1) {
          uploadedFiles3.splice(fileIndex, 1);
      }
      // Update the hidden input with the updated uploaded files
      myUploadedFilesInput.value = JSON.stringify(uploadedFiles);
      // You can perform additional actions here (e.g., remove the file from the server).
  }
  });


  // Passport
  // JavaScript to handle file selection and removal
  const fileInput4 = document.getElementById('fileInput4');
  const fileList4 = document.getElementById('fileList-4');

  const uploadedFiles4 = [];
  // const uploadedFilesJson = [];

  // JavaScript to handle file selection and removal
  fileInput4.addEventListener('change', function () {
  const files = this.files; 
  // Initialize an array to store uploaded file names

  if (files.length > 0) {

      // Add the uploaded files to the uploadedFiles array
      Array.from(files).forEach(file => {
      
          uploadedFiles4.push(file);

          const listItem = document.createElement('li');
          listItem.className = 'file-item grid pb-1';
          listItem.innerHTML = `
              <span class="grid-file-item">${file.name}</span>
              <button class="grid-file-item-btn" type="button" class="remove-button" data-name="${file.name}">x</button>
          `;

          fileList4.appendChild(listItem);
      });
  }
  });
  fileList4.addEventListener('click', function (e) {
  if (e.target.classList.value == 'grid-file-item-btn') {
      const fileName = e.target.getAttribute('data-name');
      const fileItem = e.target.parentElement;
      fileItem.remove();
      // Remove the file name from the uploadedFiles array
      const fileIndex = uploadedFiles.indexOf(fileName);
      if (fileIndex !== -1) {
          uploadedFiles4.splice(fileIndex, 1);
      }
      // Update the hidden input with the updated uploaded files
      myUploadedFilesInput.value = JSON.stringify(uploadedFiles);
      // You can perform additional actions here (e.g., remove the file from the server).
  }
  });

  // Preapproval
  // JavaScript to handle file selection and removal
  const fileInput5 = document.getElementById('fileInput5');
  const fileList5 = document.getElementById('fileList-5');

  const uploadedFiles5 = [];
  // const uploadedFilesJson = [];

  // JavaScript to handle file selection and removal
  fileInput5.addEventListener('change', function () {
    const files = this.files; 
    // Initialize an array to store uploaded file names

    if (files.length > 0) {

        // Add the uploaded files to the uploadedFiles array
        Array.from(files).forEach(file => {
        
            uploadedFiles5.push(file);

            const listItem = document.createElement('li');
            listItem.className = 'file-item grid pb-1';
            listItem.innerHTML = `
                <span class="grid-file-item">${file.name}</span>
                <button class="grid-file-item-btn" type="button" class="remove-button" data-name="${file.name}">x</button>
            `;

            fileList5.appendChild(listItem);
        });
    }
  });
  fileList5.addEventListener('click', function (e) {
    if (e.target.classList.value == 'grid-file-item-btn') {
        const fileName = e.target.getAttribute('data-name');
        const fileItem = e.target.parentElement;
        fileItem.remove();
        // Remove the file name from the uploadedFiles array
        const fileIndex = uploadedFiles.indexOf(fileName);
        if (fileIndex !== -1) {
            uploadedFiles5.splice(fileIndex, 1);
        }
        // Update the hidden input with the updated uploaded files
        myUploadedFilesInput.value = JSON.stringify(uploadedFiles);
        // You can perform additional actions here (e.g., remove the file from the server).
    }
  });


  // Preapproval
  // JavaScript to handle file selection and removal
  const fileInput6 = document.getElementById('fileInput6');
  const fileList6 = document.getElementById('fileList-6');

  const uploadedFiles6 = [];
  // const uploadedFilesJson = [];

  // JavaScript to handle file selection and removal
  fileInput6.addEventListener('change', function () {
    const files = this.files; 
    // Initialize an array to store uploaded file names

    if (files.length > 0) {

        // Add the uploaded files to the uploadedFiles array
        Array.from(files).forEach(file => {
        
            uploadedFiles6.push(file);

            const listItem = document.createElement('li');
            listItem.className = 'file-item grid pb-1';
            listItem.innerHTML = `
                <span class="grid-file-item">${file.name}</span>
                <button class="grid-file-item-btn" type="button" class="remove-button" data-name="${file.name}">x</button>
            `;

            fileList6.appendChild(listItem);
        });
    }
  });
  fileList6.addEventListener('click', function (e) {
    if (e.target.classList.value == 'grid-file-item-btn') {
        const fileName = e.target.getAttribute('data-name');
        const fileItem = e.target.parentElement;
        fileItem.remove();
        // Remove the file name from the uploadedFiles array
        const fileIndex = uploadedFiles.indexOf(fileName);
        if (fileIndex !== -1) {
            uploadedFiles6.splice(fileIndex, 1);
        }
        // Update the hidden input with the updated uploaded files
        myUploadedFilesInput.value = JSON.stringify(uploadedFiles);
        // You can perform additional actions here (e.g., remove the file from the server).
    }
  });


  // Preapproval
  // JavaScript to handle file selection and removal
  const fileInput7 = document.getElementById('fileInput7');
  const fileList7 = document.getElementById('fileList-7');

  const uploadedFiles7 = [];
  // const uploadedFilesJson = [];

  // JavaScript to handle file selection and removal
  fileInput7.addEventListener('change', function () {
    const files = this.files; 
    // Initialize an array to store uploaded file names

    if (files.length > 0) {

        // Add the uploaded files to the uploadedFiles array
        Array.from(files).forEach(file => {
        
            uploadedFiles7.push(file);

            const listItem = document.createElement('li');
            listItem.className = 'file-item grid pb-1';
            listItem.innerHTML = `
                <span class="grid-file-item">${file.name}</span>
                <button class="grid-file-item-btn" type="button" class="remove-button" data-name="${file.name}">x</button>
            `;

            fileList7.appendChild(listItem);
        });
    }
  });
  fileList6.addEventListener('click', function (e) {
    if (e.target.classList.value == 'grid-file-item-btn') {
        const fileName = e.target.getAttribute('data-name');
        const fileItem = e.target.parentElement;
        fileItem.remove();
        // Remove the file name from the uploadedFiles array
        const fileIndex = uploadedFiles.indexOf(fileName);
        if (fileIndex !== -1) {
            uploadedFiles6.splice(fileIndex, 1);
        }
        // Update the hidden input with the updated uploaded files
        myUploadedFilesInput.value = JSON.stringify(uploadedFiles);
        // You can perform additional actions here (e.g., remove the file from the server).
    }
  });
  </script>