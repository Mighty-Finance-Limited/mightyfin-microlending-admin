<div class="content d-flex flex-column flex-column-fluid m-6 py-4">
    <div class="content-body">
        <div class="card pb-5">
            <form method="POST" action="{{ route('update-user') }}"  class="needs-validation" validate enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                
                                <div class="form-validation">
                                        <div class="row">
                                            
                                            <div class="col-xl-6 col-xxl-6 col-lg-6">
                                                <div class="mb-2">
                                                    <div class="col-6">
                                                        
                                                        <div class="border-2 border-dashed shadow-xs border-slate-200/60 dark:border-darkmode-400 rounded-md p-0">
                                                            <div class="h-20 relative image-fit cursor-pointer zoom-in mx-auto">
                                                                <img class="col-12" alt="" id="preview-image-before-upload_create" src="{{ 'public/'.Storage::url($user->profile_photo_path) }}">
                                                                {{-- <div title="Remove this profile photo?" class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-danger right-0 top-0 -mr-2 -mt-2"> <i data-lucide="x" class="w-4 h-4"></i> </div> --}}
                                                            </div>
                                                            <div class="mx-auto cursor-pointer relative mt-5">
                                                                {{-- <button type="button" class="btn btn-square btn-primary">Add Photo</button> --}}
                                                                <input type="file" id="prof_image_create" name="image_path" class="w-full h-full top-0 left-0"> 
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

                                                        <input type="text" class="form-control" value="{{ $user->fname }}" id="validationCustom01" name="fname"  placeholder="Enter a firstname.." required>
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
                                                        <input type="text" class="form-control" value="{{ $user->lname }}" id="validationCustom01" name="lname"  placeholder="Enter a surname.." required>
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
                                                        <input type="text" class="form-control" value="{{ $user->email }}" name="email" id="validationCustom02"  placeholder="Your valid email.." required>
                                                        <div class="invalid-feedback">
                                                            Please enter an Email.
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
                                                            <option value="{{ $user->gender }}">{{ $user->gender }}</option>
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
                                                        <input type="text" name="basic_pay" value="{{ $user->basic_pay }}" class="form-control" id="validationCustom06" placeholder="21.60" required>
                                                        <div class="invalid-feedback">
                                                            Please enter a Basic Pay.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label" for="validationCustom06">Net Pay
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" name="net_pay" value="{{ $user->net_pay }}" class="form-control" id="validationCustom06" placeholder="21.60" required>
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
                                                        <input type="text" class="form-control" value="{{ $user->nrc_no }}" name="nrc_no" id="validationCustom07"  placeholder="999999/99/9" required>
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
                                                        <input type="text" class="form-control" value="{{ $user->phone }}" name="phone" id="validationCustom08" placeholder="097-999-8888" required>
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
                                                        <input type="text" class="form-control" name="occupation"  value="{{ $user->occupation }}" id=""  placeholder="Ex. Business Administrator" required>
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
                                                            <option  data-display="Select">Please select</option>
                                                            @foreach($roles as $role)
                                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <div class="invalid-feedback">
                                                            Please select a one.
                                                        </div>
                                                    </div>
                                                </div>                                                
                                                <input type="hidden" value="{{$user->id}}" name="user_edit_id" class="default-select wide form-control" placeholder="Borrower" id="validationCustom05">
                                                 
                                                <div class="mb-3 row">
                                                    <label class="col-lg-4 col-form-label" for="validationCustom04">Address<span
                                                            class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <textarea name="address" class="form-control" value="{{ $user->address }}" id="validationCustom04"  rows="5" placeholder="Where does the person stay?" required>
                                                            {{ $user->address }}
                                                        </textarea>
                                                        <div class="invalid-feedback">
                                                            Please enter an Address.
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
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>  
            </form>
        </div>
    </div>
</div>
