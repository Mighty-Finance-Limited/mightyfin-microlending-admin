<div class="m-6 content d-flex flex-column flex-column-fluid">
    @include('livewire.dashboard.settings.breadcrums.update-user-crums')
    <div class="content-body">
        <div class="overflow-hidden rounded-lg shadow-sm card">
            <div class="p-4 card-header bg-light border-bottom">
                <h4 class="mb-0 fw-bold text-primary">User Profile Details</h4>
            </div>

            <form method="POST" action="{{ route('update-user') }}" class="needs-validation" validate enctype="multipart/form-data">
                @csrf
                <div class="p-4 modal-body">
                    <!-- Profile Picture Section -->
                    <div class="mb-4 row justify-content-center">
                        <div class="col-md-6 col-lg-4">
                            <div class="text-center profile-upload-container">
                                <div class="position-relative d-inline-block">
                                    <img class="border shadow rounded-circle" id="preview-image-before-upload_create"
                                         src="{{ !empty($user->profile_photo_path) ? 'public/' . Storage::url($user->profile_photo_path) : '/api/placeholder/150/150' }}"
                                         width="150" height="150" style="object-fit: cover;">
                                    <div class="bottom-0 position-absolute end-0">
                                        <label for="prof_image_create" class="rounded-circle btn btn-xs btn-primary">
                                            <i class="text-xl fas fa-camera"></i>
                                        </label>
                                        <input type="file" id="prof_image_create" name="image_path" class="form-control d-none">
                                    </div>
                                </div>
                                <div class="mt-2 text-muted small">Click to upload profile photo</div>
                                @error('image_path') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row g-4">
                        <!-- Personal Information Section -->
                        <div class="col-12">
                            <div class="mb-4 card bg-light">

                                <div class="card-body">
                                    <div class="row g-3">
                                        <!-- Left Column -->
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Firstname <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                    <input type="text" name="fname" value="{{ $user->fname }}" class="form-control" required>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Middle Name</label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                    <input type="text" name="mname" value="{{ $user->mname }}" class="form-control">
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Surname <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                    <input type="text" name="lname" value="{{ $user->lname }}" class="form-control" required>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Email <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                                    <input type="email" name="email" value="{{ $user->email }}" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Right Column -->
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Phone <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                    <input type="text" name="phone" value="{{ $user->phone }}" class="form-control" required>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Alternate Phone</label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="fas fa-phone-alt"></i></span>
                                                    <input type="text" name="phone2" value="{{ $user->phone2 }}" class="form-control">
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Date of Birth</label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                                    <input type="date" name="dob" value="{{ $user->dob }}" class="form-control">
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Gender <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="fas fa-venus-mars"></i></span>
                                                    <select name="gender" class="form-select">
                                                        <option value="{{ $user->gender }}">{{ $user->gender }}</option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                        <option value="Other">Other</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Employment Information Section -->
                        <div class="col-12">
                            <div class="mb-4 card bg-light">
                                <div class="card-body">
                                    <div class="row g-3">
                                        <!-- Left Column -->
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Occupation <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="fas fa-briefcase"></i></span>
                                                    <input type="text" name="occupation" value="{{ $user->occupation }}" class="form-control" required>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Job Title</label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="fas fa-id-badge"></i></span>
                                                    <input type="text" name="jobTitle" value="{{ $user->jobTitle }}" class="form-control">
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Employee No.</label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="fas fa-hashtag"></i></span>
                                                    <input type="text" name="employeeNo" value="{{ $user->employeeNo }}" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Right Column -->
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Ministry</label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="fas fa-building"></i></span>
                                                    <input type="text" name="ministry" value="{{ $user->ministry }}" class="form-control">
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Department</label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="fas fa-sitemap"></i></span>
                                                    <input type="text" name="department" value="{{ $user->department }}" class="form-control">
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">User Role <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="fas fa-user-tag"></i></span>
                                                    <select name="assigned_role" class="form-select">
                                                        <option value="">Select</option>
                                                        @foreach($roles as $role)
                                                            <option value="{{ $role->id }}" {{ $user->roles->contains($role->id) ? 'selected' : '' }}>
                                                                {{ $role->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Financial & Address Information Section -->
                        <div class="col-12">
                            <div class="mb-4 card bg-light">
                                <div class="card-body">
                                    <div class="row g-3">
                                        <!-- Left Column -->
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Basic Pay <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="fas fa-money-bill"></i></span>
                                                    <input type="number" step="0.01" name="basic_pay" value="{{ $user->basic_pay }}" class="form-control" required>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Net Pay <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="fas fa-coins"></i></span>
                                                    <input type="number" step="0.01" name="net_pay" value="{{ $user->net_pay }}" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Right Column -->
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Address <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                                    <textarea name="address" class="form-control" rows="3" required>{{ $user->address }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Identity Information Section -->
                        <div class="col-12">
                            <div class="mb-4 card bg-light">
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">ID Type</label>
                                                <select name="id_type" class="mb-2 form-select">
                                                    <option value="NRC" {{ $user->id_type == 'NRC' ? 'selected' : '' }}>National Registration Card (NRC)</option>
                                                    <option value="Passport" {{ $user->id_type == 'Passport' ? 'selected' : '' }}>Passport</option>
                                                    <option value="Drivers License" {{ $user->id_type == 'Drivers License' ? 'selected' : '' }}>Driver's License</option>
                                                    <option value="Other" {{ $user->id_type == 'Other' ? 'selected' : '' }}>Other</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">NRC Number <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="fas fa-fingerprint"></i></span>
                                                    <input type="text" name="nrc_no" value="{{ $user->nrc_no }}" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="user_edit_id" value="{{ $user->id }}">
                </div>

                <div class="p-4 text-center card-footer bg-light">
                    <button type="submit" class="px-5 py-2 btn btn-primary btnclicky">
                        <i class="fas fa-save me-2"></i>Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
// Profile image preview script
$(document).ready(function() {
    $('#prof_image_create').change(function(){
        let reader = new FileReader();
        reader.onload = (e) => {
            $('#preview-image-before-upload_create').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]);
    });
});
</script>