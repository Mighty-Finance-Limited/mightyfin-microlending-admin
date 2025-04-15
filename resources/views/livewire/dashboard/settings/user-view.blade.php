<div class="content d-flex flex-column flex-column-fluid">
    <div class="container-fluid">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="mb-1 card-label fw-bold fs-3">User Accounts</span>
                        <span class="mt-1 text-muted fw-semibold fs-7">Over {{$users->count()}} records of every user account account on the platform</span>
                    </h3>
                    {{-- <div>
                        @can('view all loan requests')
                            <button wire:click="exportRepaymentLoans()" title="Export to Excel" class="btn btn-square btn-success">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-spreadsheet" viewBox="0 0 16 16">
                                    <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V9H3V2a1 1 0 0 1 1-1h5.5v2zM3 12v-2h2v2H3zm0 1h2v2H4a1 1 0 0 1-1-1v-1zm3 2v-2h3v2H6zm4 0v-2h3v1a1 1 0 0 1-1 1h-2zm3-3h-3v-2h3v2zm-7 0v-2h3v2H6z"/>
                                </svg>
                            </button>
                        @endcan
                    </div>               --}}
                    {{-- <button data-toggle="modal" data-target="#createUserModeling" class="btn btn-square btn-primary">New User</button> --}}
                </div>

                <div class="pb-0 card-body">

                    <div class="table-responsive">
                        @if (Session::has('attention'))
                        <div wire:ignore class="alert alert-info solid alert-end-icon alert-dismissible fade show">
                            <span><i class="mdi mdi-check"></i></span>
                            <button type="button" class="btn-close" data-dismiss="alert" aria-label="btn-close">
                            </button> {{ Session::get('attention') }}
                            {{-- @dd(session('borrower_id')) --}}
                            <a class="text-white" href="{{ route('apply-for', ['id' => session('borrower_id') ?? 0]) }}"> Continue to loan application</a>
                        </div>
                        @elseif (Session::has('error_msg'))
                        <div wire:ignore class="alert alert-danger solid alert-end-icon alert-dismissible fade show">
                            <span><i class="mdi mdi-help"></i></span>
                            <button type="button" class="btn-close" data-dismiss="alert" aria-label="btn-close">
                            </button>
                            <strong>Error!</strong> {{ Session::get('error_msg') }}
                        </div>
                        @elseif (Session::has('deteted'))
                        <div wire:ignore class="alert alert-success solid alert-end-icon alert-dismissible fade show">
                            <span><i class="mdi mdi-help"></i></span>
                            <button type="button" class="btn-close" data-dismiss="alert" aria-label="btn-close">

                            </button> {{ Session::get('deteted') }}
                        </div>
                        @endif
                        <table id="example3" class="table align-middle table-row-bordered table-row-gray-100 gs-0 gy-3">
                            <thead>
                                <tr class="fw-bold text-muted">
                                    {{-- <th></th> --}}
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Gender</th>
                                    <th>NRC</th>
                                    <th>Mobile</th>
                                    <th>Email</th>
                                    <th>Joining Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse($users as $user)
                                <tr>
                                    {{-- <td>
                                        @if($user->profile_photo_path == null)
                                            @if($user->fname != null && $user->lname != null)
                                                <span class="text-white">{{ $user->fname[0].' '.$user->lname[0] }}</span>
                                            @else
                                                <span>{{ $user->name[0] }}</span>
                                            @endif
                                        @else
                                            <img class="rounded-circle" width="35" src="{{ 'public/'.Storage::url($user->profile_photo_path) }}" />
                                        @endif
                                    </td> --}}
                                    <td>{{ $user->fname ?? $user->name.' '.$user->lname ?? '' }} </td>
                                    <td>
                                        @forelse($user->roles as $role)
                                            <span class="capitalize">{{ $role->name }}</span>
                                        @empty
                                            <span>Guest</span>
                                        @endforelse
                                    </td>
                                    <td>{{ $user->gender }}</td>
                                    <td>{{ $user->nrc ?? 'No ID' }}</td>
                                    <td><a href="javascript:void(0);"><strong>{{ $user->phone }}</strong></a></td>
                                    <td><a href="javascript:void(0);"><strong>{{ $user->email }}</strong></a></td>
                                    <td>{{ $user->created_at->toFormattedDateString() }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a target="_blank" href="{{ route('client-account', ['key'=>$user->id]) }}" class="shadow btn btn-primary btn-xs sharp me-1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
                                                <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
                                              </svg></a>
                                            <a target="_blank" href="{{ route('edit-user', ['id'=>$user->id]) }}" class="shadow btn btn-primary btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                            @if($user->email != 'info@mightyfinance.co.zm' || $user->email != 'info@mightyfinance.co.zm')
                                            <a href="#" wire:click="destory({{ $user->id }})" onclick="confirm('Are you sure you want to permanently delete this account.') || event.stopImmediatePropagation();" class="shadow btn btn-danger btn-xs sharp"><i class="fa fa-trash"></i></a>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <div class="col-span-12 intro-y md:col-span-6">
                                    <div class="text-center box">
                                        <p>No User Found</p>
                                    </div>
                                </div>
                                @endforelse
                            </tbody>
                        </table>
                        @if (Session::has('attention'))
                        <div class="alert alert-info solid alert-end-icon alert-dismissible fade show">
                            <span><i class="mdi mdi-check"></i></span>
                            <button type="button" class="btn-close" data-dismiss="alert" aria-label="btn-close">
                            </button> {{ Session::get('attention') }}
                        </div>
                        @elseif (Session::has('error_msg'))
                        <div class="alert alert-danger solid alert-end-icon alert-dismissible fade show">
                            <span><i class="mdi mdi-help"></i></span>
                            <button type="button" class="btn-close" data-dismiss="alert" aria-label="btn-close">
                            </button>
                            <strong>Error!</strong> {{ Session::get('error_msg') }}
                        </div
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if($createModal)
    <div wire:ignore class="modal fade bd-example-modal-lg {{ $hold }}" {{ $style }} id="createUserModeling">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create User</h5>
                    <button type="button" class="btn-close" data-dismiss="modal">
                    </button>
                </div>

                <form method="POST" action="{{ route('create-user') }}"  class="needs-validation" validate enctype="multipart/form-data">
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
                                                            <div class="p-0 border-2 border-dashed rounded-md shadow-xs border-slate-200/60 dark:border-darkmode-400">
                                                                <div class="relative h-20 mx-auto cursor-pointer image-fit zoom-in">
                                                                    <img class="col-12" alt="" id="preview-image-before-upload_create" src="{{ asset('public/images/noimage.jpg') }}">
                                                                    {{-- <div title="Remove this profile photo?" class="absolute top-0 right-0 flex items-center justify-center w-5 h-5 -mt-2 -mr-2 text-white rounded-full tooltip bg-danger"> <i data-lucide="x" class="w-4 h-4"></i> </div> --}}
                                                                </div>
                                                                <div class="relative mx-auto mt-5 cursor-pointer">
                                                                    {{-- <button type="button" class="btn btn-square btn-primary">Add Photo</button> --}}
                                                                    <input type="file" id="prof_image_create" name="image_path" class="top-0 left-0 w-full h-full">
                                                                    {{-- <input type="file" name="image_path" class="w-full h-full"> --}}
                                                                </div>
                                                                <small>
                                                                    {{-- @if ($errors->has('image_path'))
                                                                        <span class="text-left text-danger">{{ $errors->first('image_path') }}</span>
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
                                                    {{-- <div class="mb-3 row">
                                                        <label class="col-lg-4 col-form-label" for="validationCustom03">Password
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-6">
                                                            <input type="password" class="form-control" id="validationCustom03" placeholder="Choose a safe one.." required>
                                                            <div class="invalid-feedback">
                                                                Please enter a password.
                                                            </div>
                                                        </div>
                                                    </div> --}}
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
                                                            <input type="text" class="form-control" name="nrc" id="validationCustom07"  placeholder="999999/99/9" required>
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
                                                            <input name="occupation" type="text" class="form-control" id="validationCustom09"  placeholder="Ex. Business Administrator" required>
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
                                                    <div class="mb-3 row">
                                                        <label class="col-lg-4 col-form-label" for="validationCustom04">Address <span
                                                                class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-6">
                                                            <textarea name="address" class="form-control" id="validationCustom04"  rows="5" placeholder="Where does the user stay?" required></textarea>
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
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif


    @if($editModal)
    <div class="modal fade bd-example-modal-lg {{ $hold }}" {{ $style }} id="createUserModeling">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create User</h5>
                    <button type="button" class="btn-close" data-dismiss="modal">
                    </button>
                </div>

                <form method="POST" action="{{ route('update-user') }}"  class="needs-validation" novalidate enctype="multipart/form-data">
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
                                                            <div class="p-5 border-2 border-dashed rounded-md shadow-sm border-slate-200/60 dark:border-darkmode-400">
                                                                <div class="relative h-40 mx-auto cursor-pointer image-fit zoom-in">
                                                                    <img class="rounded-md" alt="Midone - HTML Admin Template" id="preview-image-before-upload_create" src="{{ asset('dist/images/profile-10.jpg') }}">
                                                                </div>
                                                                <div class="relative mx-auto mt-5 cursor-pointer">
                                                                <button type="button" class="w-full btn btn-primary">Add Photo</button>
                                                                    <input type="file" id="prof_image_create" name="profile_photo_path" class="absolute top-0 left-0 w-full h-full opacity-0">
                                                                    {{-- <input type="file" name="image_path" class="w-full h-full"> --}}
                                                                </div>
                                                                <small>
                                                                    {{-- @if ($errors->has('image_path'))
                                                                        <span class="text-left text-danger">{{ $errors->first('image_path') }}</span>
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
                                                    {{-- <div class="mb-3 row">
                                                        <label class="col-lg-4 col-form-label" for="validationCustom03">Password
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="col-lg-6">
                                                            <input type="password" class="form-control" id="validationCustom03" placeholder="Choose a safe one.." required>
                                                            <div class="invalid-feedback">
                                                                Please enter a password.
                                                            </div>
                                                        </div>
                                                    </div> --}}
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
                                                            <input type="text" class="form-control" name="nrc" id="validationCustom07"  placeholder="999999/99/9" required>
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
                                                            <input  name="occupation" type="text" class="form-control" id="validationCustom09"  placeholder="Ex. Business Administrator" required>
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
    @endif

</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function (e) {
   $('#prof_image_create').change(function(){
        let reader = new FileReader();
        reader.onload = (e) => {
            $('#preview-image-before-upload_create').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]);
    });

    // const select = document.getElementById('user_group_select');

    // select.addEventListener('change', function handleChange(event) {
    //     if(event.target.value == 'patient'){
    //         $('#professional_details').hide();
    //         $('#medical_details').show();
    //     }else{
    //         $('#professional_details').show();
    //         $('#medical_details').hide();
    //     }

    //     // // 👇️ get selected VALUE even outside event handler
    //     // console.log(select.options[select.selectedIndex].value);

    //     // // 👇️ get selected TEXT in or outside event handler
    //     // console.log(select.options[select.selectedIndex].text);
    // });
});

</script>