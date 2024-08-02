<div wire:ignore.self class="content-body">
    <div class="container-fluid">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Contact Settings</h4>                
                    {{-- <button data-toggle="modal" data-target="#createUserModeling" class="btn btn-square btn-primary">New Borrower</button> --}}
                </div>

                <div class="card-body pb-0">
                    <form wire:submit.prevent="saveContacts()" novalidate enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        
                                        @include('livewire.dashboard.__parts.dash-alerts')
                                        <div class="form-validation">
                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        {{-- <div class="mb-2">
                                                            <div class="col-8">
                                                                <div class="border-2 border-dashed shadow-sm border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                                                                    <div class="h-40 relative image-fit cursor-pointer zoom-in mx-auto">
                                                                        <img class="rounded-md" alt="Logo" id="preview-image-before-upload_create" src="{{ asset('dist/images/profile-10.jpg') }}">
                                                                    </div>
                                                                    <div class="mx-auto cursor-pointer relative mt-5">
                                                                    <button type="button" class="btn btn-primary w-full">Add Logo
                                                                        <input wire:ignore.self type="file" id="prof_image_create" name="logo_file" class="w-full h-full top-0 left-0 absolute opacity-0"> 
                                                                    </button>
                                                                    </div>
                                                                </div>
                                                            </div>                                                        
                                                        </div> --}}
                                                        
                                                        <div class="mb-3 row">
                                                            <label class="col-lg-4 col-form-label" for="validationCustom01">Business Name
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-lg-6">
                                                                <input type="text" class="form-control" id="validationCustom01" wire:model.defer="name"  placeholder="Ex. ABC Limited" required>
                                                                <div class="invalid-feedback">
                                                                    Please enter a name.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label class="col-lg-4 col-form-label" for="validationCustom01">Slogan
                                                                <span class="text-danger">*</span>
                                                                {{-- @dd($contacts) --}}
                                                            </label>
                                                            <div class="col-lg-6">
                                                                <input type="text" class="form-control" id="validationCustom01" value="{{ $contacts->slogan}}" wire:model.defer="slogan"  placeholder="{{ $contacts->slogan}}" required>
                                                                <div class="invalid-feedback">
                                                                    Please enter a slogan.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label class="col-lg-4 col-form-label" for="validationCustom02">Customer Support Email <span
                                                                    class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-lg-6">
                                                                <input type="text" class="form-control" value="{{ $contacts->email1 }}" wire:model.defer="email" id="validationCustom02"  placeholder="{{ $contacts->email1 }}" required>
                                                                <div class="invalid-feedback">
                                                                    Please enter an Email.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label class="col-lg-4 col-form-label" for="validationCustom02">Loan Request Email <span
                                                                    class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-lg-6">
                                                                <input type="text" class="form-control" value="{{ $contacts->email2 }}" wire:model.defer="email2" id="validationCustom02"  placeholder="{{ $contacts->email2 }}" required>
                                                                <div class="invalid-feedback">
                                                                    Please enter an Email.
                                                                </div>
                                                        </div>
                                                        </div><div class="mb-3 row">
                                                            <label class="col-lg-4 col-form-label" for="validationCustom05">Legal Structure
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-lg-6">
                                                                <select value="{{ $contacts->legal_structure }}" wire:model.defer="legal_structure" class="default-select wide form-control" id="validationCustom05">
                                                                    <option data-display="Select">{{ $contacts->legal_structure }}</option>
                                                                    <option value="">None</option>
                                                                    <option value="PLc">Private</option>
                                                                    <option value="Ltd">Public</option>
                                                                    <option value="Corp">Corporation</option>
                                                                    <option value="LLC">LLC</option>
                                                                    <option value="Partnership">Partnership</option>
                                                                    <option value="Sole Proprietorship">Sole Proprietorship</option>
                                                                </select>
                                                                <div class="invalid-feedback">
                                                                    Please select a one.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label class="col-lg-4 col-form-label" for="validationCustom07">State/Province
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-lg-6">
                                                                <input value="{{ $contacts->province }}" type="text" class="form-control" wire:model.defer="state" id="validationCustom07"  placeholder="{{ $contacts->province }}" required>
                                                                <div class="invalid-feedback">
                                                                    Please enter State.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label class="col-lg-4 col-form-label" for="validationCustom07">City
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-lg-6">
                                                                <input value="{{ $contacts->city }}" type="text" class="form-control" wire:model.defer="city" id="validationCustom07"  placeholder="{{ $contacts->city }}" required>
                                                                <div class="invalid-feedback">
                                                                    Please enter a City.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label class="col-lg-4 col-form-label" for="validationCustom07">Start Time
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-lg-6">
                                                                <input value="{{ $contacts->start_time }}" type="text" class="form-control" wire:model.defer="start_time" id="validationCustom07"  placeholder="{{ $contacts->start_time }}" required>
                                                                <div class="invalid-feedback">
                                                                    Please enter a Start time.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label class="col-lg-4 col-form-label" for="validationCustom07">Closing Time
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-lg-6">
                                                                <input value="{{ $contacts->stop_time }}" type="text" class="form-control" wire:model.defer="stop_time" id="validationCustom07"  placeholder="{{ $contacts->stop_time }}" required>
                                                                <div class="invalid-feedback">
                                                                    Please enter a Stop time.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label class="col-lg-4 col-form-label" for="validationCustom07">Start Day
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-lg-6">
                                                                <input value="{{ $contacts->start_day }}" type="text" class="form-control" wire:model.defer="start_day" id="validationCustom07"  placeholder="{{ $contacts->start_day }}" required>
                                                                <div class="invalid-feedback">
                                                                    Please enter a Start Day.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label class="col-lg-4 col-form-label" for="validationCustom07">End Day
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-lg-6">
                                                                <input value="{{ $contacts->stop_day }}" type="text" class="form-control" wire:model.defer="stop_day" id="validationCustom07"  placeholder="{{ $contacts->stop_day }}" required>
                                                                <div class="invalid-feedback">
                                                                    Please enter a End Day.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <div class="mb-3 row">
                                                            <label class="col-lg-4 col-form-label" for="validationCustom05">Business Type
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-lg-6">
                                                                <select value="{{ $contacts->business_type }}" wire:model.defer="business_type" class="default-select wide form-control" id="validationCustom05">
                                                                    <option  data-display="Select">{{ $contacts->business_type }}</option>
                                                                    <option value="">None</option>
                                                                    <option value="Banking">Banking Service</option>
                                                                    <option value="Lending">Lending Service</option>
                                                                    <option value="E-Commerce">E-Commerce</option>
                                                                    <option value="Others">Others</option>
                                                                </select>
                                                                <div class="invalid-feedback">
                                                                    Please select a one.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="mb-3 row">
                                                            <label class="col-lg-4 col-form-label" for="validationCustom08">Customer Care Phone Number (+260)
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-lg-6">
                                                                <input value="{{ $contacts->phone1  }}" type="text" class="form-control" wire:model.defer="phone1" id="validationCustom08" placeholder="{{ $contacts->phone1  }}" required>
                                                                <div class="invalid-feedback">
                                                                    Please enter a phone no.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label class="col-lg-4 col-form-label" for="validationCustom08">Contact Us Phone Number (+260)
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-lg-6">
                                                                <input value="{{ $contacts->phone2  }}" type="text" class="form-control" wire:model.defer="phone2" id="validationCustom08" placeholder="{{ $contacts->phone2  }}" required>
                                                                <div class="invalid-feedback">
                                                                    Please enter a phone no.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label class="col-lg-4 col-form-label" for="validationCustom08">General Support Phone Number (+260)
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-lg-6">
                                                                <input value="{{ $contacts->phone3 }}" type="text" class="form-control" wire:model.defer="phone3" id="validationCustom08" placeholder="{{ $contacts->phone3 }}" required>
                                                                <div class="invalid-feedback">
                                                                    Please enter a phone no.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label class="col-lg-4 col-form-label" for="validationCustom08">Facebook Link 
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-lg-6">
                                                                <input value="{{ $contacts->facebook}}" type="text" class="form-control" wire:model.defer="facebook" id="validationCustom08" placeholder="https://{{ $contacts->facebook}}" required>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label class="col-lg-4 col-form-label" for="validationCustom08">Instagram Link 
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-lg-6">
                                                                <input value="{{ $contacts->instagram }}" type="text" class="form-control" wire:model.defer="instagram" id="validationCustom08" placeholder="https://link{{ $contacts->instagram }}" required>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label class="col-lg-4 col-form-label" for="validationCustom08">Linkedin Link 
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-lg-6">
                                                                <input value="{{ $contacts->linkedin }}" type="text" class="form-control" wire:model.defer="linkedin" id="validationCustom08" placeholder="https://link{{ $contacts->linkedin }}" required>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label class="col-lg-4 col-form-label" for="validationCustom08">Twitter Link 
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-lg-6">
                                                                <input value="{{ $contacts->twitter }}" type="text" class="form-control" wire:model.defer="twitter" id="validationCustom08" placeholder="https://link{{ $contacts->twitter }}" required>
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label class="col-lg-4 col-form-label" for="validationCustom04">Address 
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <div class="col-lg-6">
                                                                <textarea value="{{ $contacts->address  }}" wire:model.defer="address" class="form-control" id="validationCustom04"  rows="5" placeholder="{{ $contacts->address  }}" required>
                                                                    {{ $contacts->address  }}
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
                            <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
                            <button type="submit" id="update-contact-toastr-success-bottom-left" class="btn btn-primary">Save changes</button>
                        </div>  
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

