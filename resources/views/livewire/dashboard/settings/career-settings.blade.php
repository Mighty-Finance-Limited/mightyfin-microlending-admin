<div class="content-body">
    <div class="container-fluid">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Careers</h4>                
                    <button data-toggle="modal" data-target="#createUserModeling" class="btn btn-square btn-primary">Post New Job</button>
                </div>

                <div class="card-body pb-0">

                    @if(!empty($careers->toArray()))
                    <div class="table-responsive">
                        @include('livewire.dashboard.__parts.dash-alerts')
                        <table wire:ignore.self id="example5" class="display" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>Department</th>
                                    <th>Job Position</th>
                                    <th>Location</th>
                                    <th>Closing Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @forelse($careers as $career)
                                <tr>
                                    <td style="text-align:left;">{{ $career->dept }}</td>
                                    <td style="text-align:left;">{{ $career->job_role }}</td>
                                    <td style="text-align:left;">{{ $career->location }}</td>
                                    <td style="text-align:left;">{{ $career->last_date }}</td>
                                    <td style="text-align:left;">
                                        <div class="d-flex">
                                            {{-- <a href="{{ route('client-account', ['key'=>$career->id]) }}" class="btn btn-primary shadow btn-xs sharp me-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                                </svg>
                                            </a> --}}
                                            <button wire:click="destroy({{ $career->id }})" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                        </div>												
                                    </td>												
                                </tr>
                                @empty
                                <div class="intro-y col-span-12 md:col-span-6">
                                    <div class="box text-center">
                                        <p>No User Found</p>
                                    </div>
                                </div>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    @else
                    <div class="container">
                        <span>Nothing Found</span>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- @if($createModal) --}}
    <div wire:ignore class="modal fade bd-example-modal-lg" id="createUserModeling">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Post New Job</h5>
                    <button type="button" class="btn-close" data-dismiss="modal">
                    </button>
                </div>
                
                <form wire:submit.prevent="store()"  class="needs-validation" validate enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-validation">
                                            <div class="row">
                                                <div class="col-xl-12 col-xxl-12 col-lg-12">
                                                    <div class="mb-3 row">
                                                        <label class="col-lg-4 col-form-label" for="validationCustom01">Department
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control" id="validationCustom01" wire:model.defer="dept" required>
                                                            <div class="invalid-feedback">
                                                                Please enter a Department.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label class="col-lg-4 col-form-label" for="validationCustom01">Job Role
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control" id="validationCustom01" wire:model.defer="job_role"  placeholder="Ex. Loan Officer" required>
                                                            <div class="invalid-feedback">
                                                                Please enter a Job Role.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label class="col-lg-4 col-form-label" for="validationCustom02">Location<span
                                                                class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-6">
                                                            <select wire:model.defer="location" class="default-select form-control" id="validationCustom05">
                                                                <option  data-display="Select">Please select</option>
                                                                <option value="Male">Lusaka</option>
                                                                <option value="Kabwe">Kabwe</option>
                                                                <option value="Kapiri Mposhi">Kapiri Mposhi</option>
                                                                <option value="Ndola">Ndola</option>
                                                                <option value="Kitwe">Kitwe</option>
                                                                <option value="Kafue">Kafue</option>
                                                                <option value="Livingstone">Livingstone</option>
                                                                <option value="Mansa">Mansa</option>
                                                                <option value="Chipata">Chipata</option>
                                                            </select>
                                                        </div>
                                                        <div class="invalid-feedback">
                                                            Please select a one.
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label class="col-lg-4 col-form-label" for="validationCustom02">Closing Date <span
                                                                class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-6">
                                                            <input type="date" class="form-control datepicker date" wire:model.defer="last_date" id="validationCustom02"  placeholder="" required>
                                                            <div class="invalid-feedback">
                                                                Please enter a Closing Date
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>  
                </form>
            </div>
        </div>
    </div>
    {{-- @endif --}}


    {{-- @if($editModal) --}}
    <div class="modal fade bd-example-modal-lg" id="createUserModeling">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Job Information</h5>
                    <button type="button" class="btn-close" data-dismiss="modal">
                    </button>
                </div>
                
                <form method="POST" class="needs-validation" novalidate enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-validation">
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <div class="mb-2">
                                                        <div class="col-12">
                                                            <div class="border-2 border-dashed shadow-sm border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                                                                <div class="h-40 relative image-fit cursor-pointer zoom-in mx-auto">
                                                                    <img class="rounded-md" alt="Midone - HTML Admin Template" id="preview-image-before-upload_create" src="{{ asset('dist/images/profile-10.jpg') }}">
                                                                    {{-- <div title="Remove this profile photo?" class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger right-0 top-0 -mr-2 -mt-2"> <i data-lucide="x" class="w-4 h-4"></i> </div> --}}
                                                                </div>
                                                                <div class="mx-auto cursor-pointer relative mt-5">
                                                                <button type="button" class="btn btn-primary w-full">Add Photo</button>
                                                                    <input type="file" id="prof_image_create" name="profile_photo_path" class="w-full h-full top-0 left-0 absolute opacity-0"> 
                                                                    {{-- <input type="file" name="image_path" class="w-full h-full"> --}}
                                                                </div>
                                                                <small>
                                                                    {{-- @if ($errors->has('image_path'))
                                                                        <span class="text-danger text-left">{{ $errors->first('image_path') }}</span>
                                                                    @endif --}}
                                                                </small>
                                                            </div>
                                                        </div>                                                        
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label class="col-lg-4 col-form-label" for="validationCustom01">Firstname
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control" id="validationCustom01" name="fname"  placeholder="Enter a firstname.." required>
                                                            <div class="invalid-feedback">
                                                                Please enter a name.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label class="col-lg-4 col-form-label" for="validationCustom01">Surname
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control" id="validationCustom01" name="lname"  placeholder="Enter a surname.." required>
                                                            <div class="invalid-feedback">
                                                                Please enter a surname.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label class="col-lg-4 col-form-label" for="validationCustom02">Email <span
                                                                class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control" name="email" id="validationCustom02"  placeholder="Your valid email.." required>
                                                            <div class="invalid-feedback">
                                                                Please enter an Email.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label class="col-lg-4 col-form-label" for="validationCustom03">Password
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-6">
                                                            <input type="password" disabled class="form-control" id="validationCustom03" placeholder="peace2u">
                                                            <div class="invalid-feedback">
                                                                Please enter a password.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6">
                                                    <div class="mb-3 row">
                                                        <label class="col-lg-4 col-form-label" for="validationCustom05">Gender
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-6">
                                                            <select name="gender" class="default-select wide form-control" id="validationCustom05">
                                                                <option  data-display="Select">Please select</option>
                                                                <option value="Male">Male</option>
                                                                <option value="Female">Female</option>
                                                                <option value="Other">Other</option>
                                                            </select>
                                                            <div class="invalid-feedback">
                                                                Please select a one.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label class="col-lg-4 col-form-label" for="validationCustom06">Basic Pay
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-6">
                                                            <input type="text" name="basic_pay" class="form-control" id="validationCustom06" placeholder="21.60" required>
                                                            <div class="invalid-feedback">
                                                                Please enter a Basic Pay.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label class="col-lg-4 col-form-label" for="validationCustom07">NRC
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control" name="nrc_no" id="validationCustom07"  placeholder="999999/99/9" required>
                                                            <div class="invalid-feedback">
                                                                Please enter an NRC.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label class="col-lg-4 col-form-label" for="validationCustom08">Phone (ZM)
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control" name="phone" id="validationCustom08" placeholder="097-999-8888" required>
                                                            <div class="invalid-feedback">
                                                                Please enter a phone no.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label class="col-lg-4 col-form-label" for="validationCustom09">Occupation <span
                                                                class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control" id="validationCustom09"  placeholder="Ex. Business Administrator" required>
                                                            <div class="invalid-feedback">
                                                                Please enter an Occupation.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label class="col-lg-4 col-form-label" for="validationCustom05">User Role
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-6">
                                                            <select name="assigned_role" class="default-select wide form-control" id="validationCustom05">
                                                                <option data-display="Select">Please select</option>
                                                             
                                                            </select>
                                                            <div class="invalid-feedback">
                                                                Please select a one.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label class="col-lg-4 col-form-label" for="validationCustom04">Address <span
                                                                class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-6">
                                                            <textarea name="address" class="form-control" id="validationCustom04"  rows="5" placeholder="What would you like to see?" required></textarea>
                                                            <div class="invalid-feedback">
                                                                Please enter an Address.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- <div class="mb-3 row">
                                                        <label class="col-lg-4 col-form-label" for="validationCustom10">Number <span
                                                                class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control" id="validationCustom10" placeholder="5.0" required>
                                                            <div class="invalid-feedback">
                                                                Please enter a num.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label class="col-lg-4 col-form-label" for="validationCustom11">Range [1, 5]
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control" id="validationCustom11" placeholder="4" required>
                                                            <div class="invalid-feedback">
                                                                Please select a range.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label class="col-lg-4 col-form-label"><a
                                                                href="javascript:void(0);">Terms &amp; Conditions</a> <span
                                                                class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-8">
                                                            <div class="form-check">
                                                              <input class="form-check-input" type="checkbox" value="" id="validationCustom12" required>
                                                              <label class="form-check-label" for="validationCustom12">
                                                                Agree to terms and conditions
                                                              </label>
                                                            </div>
                                                        </div>
                                                    </div> --}}
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>  
                </form>
            </div>
        </div>
    </div>
    {{-- @endif --}}

</div>
