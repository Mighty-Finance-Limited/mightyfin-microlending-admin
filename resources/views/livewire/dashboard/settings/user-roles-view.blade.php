<style>
    .tree {
        list-style-type: none;
        padding-left: 1em;
    }

    .tree li {
        margin: 0;
        padding: 0 1em;
        line-height: 2em;
        color: #000;
        position: relative;
    }

    .tree li:before {
        position: absolute;
        top: 0;
        left: 0;
        width: 1em;
        height: 1em;
        font-weight: bold;
        color: #000;
        transform: rotate(45deg);
        margin-top: 0.2em;
    }

    .toggle {
        cursor: pointer;
    }

    .nested {
        display: none;
    }

    .nested.show {
        display: block;
    }
</style>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div id="kt_content_container" class="container-xxl">
        <div class="card mb-5 mb-xl-10">
            <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                <!--begin::Card title-->
                <div class="card-title m-0 gap-3 ">
                    <a href="{{ route('sys-settings') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
                            <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1"/>
                        </svg>
                    </a>
                    <h3 class="fw-bold m-0">User Roles & Permission Settings</h3>
                </div>
                @can('add user roles')
                    <button type="button" class="btn btn-primary my-5 d-flex flex-column flex-center" data-bs-toggle="modal" data-bs-target="#kt_modal_add_role">
                        Add New Role
                    </button>
                @endcan
                <!--end::Card title-->
            </div>
        </div>
    </div>
    <div class="container">
        @if (session()->has('attention'))
            <div class="alert alert-success">
                {{ session('attention') }}
            </div>
        @endif
        @if (session()->has('error_msg'))
            <div class="alert alert-danger">
                {{ session('error_msg') }}
            </div>
        @endif
    </div>
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Row-->
            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-5 g-xl-9">
                <!--begin::Col-->
                @foreach ($roles as $key => $role)
                <div class="col-md-4">
                    <!--begin::Card-->
                    <div class="card card-flush h-md-100">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <div class="card-title text-info">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill-gear" viewBox="0 0 16 16">
                                    <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0m-9 8c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4m9.886-3.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382zM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0"/>
                                </svg>
                                &nbsp;
                                <h2 class="capitalize text-info">{{ ucwords($role->name) }}</h2>
                            </div>
                            <!--end::Card title-->
                        </div>
                        <!--begin::Card footer-->
                        <div class="card-footer flex-wrap pt-0">
                            @can('delete user roles')
                                <a class="btn btn-danger btn-active-primary my-1 me-2"  wire:click="destroy({{ $role->id }})">Delete</a>
                            @endcan

                            @can('edit user roles')
                                <button type="button" class="btn btn-info btn-active-light-primary my-1" data-bs-toggle="modal" data-bs-target="#kt_modal_update_role"  wire:click="edit({{ $role->id }})">Edit Role</button>
                            @endcan
                        </div>
                        <!--end::Card footer-->
                    </div>
                    <!--end::Card-->
                </div>
                @endforeach
                
                
                <!--end::Col-->
                <!--begin::Add new card-->
                @can('add user roles')
                <div class="col-md-4">
                    <!--begin::Card-->
                    <div class="card h-md-100">
                        <!--begin::Card body-->
                        <div class="card-body d-flex flex-center">
                            <!--begin::Button-->
                            <button type="button" class="btn btn-clear d-flex flex-column flex-center" data-bs-toggle="modal" data-bs-target="#kt_modal_add_role">
                                <!--begin::Illustration-->
                                <img src="{{ asset('public/mfs/admin/assets/media/illustrations/sketchy-1/4.png')}}" alt="" class="mw-100 mh-150px mb-7" />
                                <!--end::Illustration-->
                                <!--begin::Label-->
                                <div class="fw-bold fs-3 text-gray-600 text-hover-primary">Add New Role</div>
                                <!--end::Label-->
                            </button>
                            <!--begin::Button-->
                        </div>
                        <!--begin::Card body-->
                    </div>
                    <!--begin::Card-->
                </div>
                @endcan
                <!--begin::Add new card-->
            </div>
            
            <div wire:ignore class="modal fade" id="kt_modal_add_role" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered mw-750px">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="fw-bold">Add a Role</h2>
                            
                            <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-roles-modal-action="close">
                                <i class="ki-duotone ki-cross fs-1">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </div>
                        </div>
                        
                        <div class="modal-body scroll-y mx-lg-5 my-7">
                            <form id="kt_modal_add_role_form" class="form"  method="POST" action="{{ route('create-role') }}">
                                @csrf
                                <div wire:loading.remove wire:target="store" class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_role_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_role_header" data-kt-scroll-wrappers="#kt_modal_add_role_scroll" data-kt-scroll-offset="300px">
                                    <div class="fv-row mb-10">
                                        <label class="fs-5 fw-bold form-label mb-2">
                                            <span class="required">Role name</span>
                                        </label>
                                        <input class="form-control form-control-solid" placeholder="Enter a role name"  name="name" />
                                    </div>
                                    
                                    <div class="fv-row">
                                        <label class="fs-5 fw-bold form-label mb-2">Role Permissions</label>
                                        <div class="table-responsive">
                                            <!--begin::Table row-->
                                            {{-- 
                                                <tr>
                                                <td class="text-gray-800">Administrator Access
                                                    <span class="ms-2" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-html="true" data-bs-content="Allows a full access to the system">
                                                        <i class="ki-duotone ki-information fs-7">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                            <span class="path3"></span>
                                                        </i>
                                                    </span>
                                                </td>
                                                <td>
                                                    <label class="form-check form-check-custom form-check-solid me-9">
                                                        <input class="form-check-input" type="checkbox" value="" id="kt_roles_select_all" />
                                                        <span class="form-check-label" for="kt_roles_select_all">Select all</span>
                                                    </label>
                                                </td>
                                                </tr> 
                                            --}}
                                            <ul class="tree">
                                                @foreach($permissions as $g => $p)
                                                    <li class="text-gray-800">
                                                        <span class="toggle">
                                                            <span style="color: blueviolet">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                                                                    <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
                                                                </svg>
                                                            </span>
                                                            <span class="font-bold" style="color: blueviolet">
                                                                <b>{{ ucwords($g) }} Management</b>
                                                            </span>
                                                        </span>
                                                        <ul class="nested">
                                                            <li class="d-block">
                                                                @foreach($p as $key => $perm)
                                                                    <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                                        <input class="form-check-input" type="checkbox" name="permission[]" value="{{ $perm->name }}" />
                                                                        <small class="form-check-label">{{ ucwords($perm->permission) }}</small>
                                                                    </label>
                                                                @endforeach
                                                            </li>
                                                        </ul>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                
                                <div wire:loading wire:target="store" class="text-center">
                                    <div class="d-flex justify-content-center align-items-center gap-4 text-center items-center">
                                        <span class="spinner-border text-primary" role="status"></span>
                                        <p class="mt-2">Making the user role...</p>
                                    </div>
                                </div>
                                
                                <div class="text-center pt-15">
                                    <button type="reset" class="btn btn-light me-3" data-kt-roles-modal-action="cancel">Discard</button>
                                    <button type="submit" class="btn btn-primary"  data-bs-dismiss="modal"  data-kt-roles-modal-action="submit">
                                        <span class="indicator-label">Submit</span>
                                        <span class="indicator-progress">Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
            @if($show)
            <div wire:ignore.self class="modal fade" id="kt_modal_update_role" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered mw-750px">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="fw-bold">Update Role</h2>
                            
                            <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-roles-modal-action="close">
                                <i class="ki-duotone ki-cross fs-1">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </div>
                        </div>
                        
                        <div class="modal-body scroll-y mx-5 my-7">
                            <form id="updateRoleForm" class="form" method="POST" action="{{ route('update-role') }}">
                                @csrf
                                <input type="hidden" name="role_id" value="{{$role_id}}">
                                <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_update_role_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_update_role_header" data-kt-scroll-wrappers="#kt_modal_update_role_scroll" data-kt-scroll-offset="300px">
                                    <div class="fv-row mb-10">
                                        <label class="fs-5 fw-bold form-label mb-2">
                                            <span class="required">Role name</span>
                                        </label>
                                        <input class="form-control form-control-solid" name="name" value="{{$name}}" wire:model.defer="name" />
                                    </div>
                                    <div class="fv-row">
                                        <label class="fs-5 fw-bold form-label mb-2">Role Permissions</label>
                                        <div class="table-responsive">
                                            <table class="table align-middle table-row-dashed fs-6 gy-5">
                                                <tbody class="text-gray-600 fw-semibold">
                                                    @foreach($permissions as $g => $p)
                                                        <tr>
                                                            <td class="text-gray-800"> {{ ucwords($g) }} Management</td>
                                                            <td>
                                                                <div class="d-flex">
                                                                    @foreach($p as $key => $perm)
                                                                        <label for="{{ $perm->name.''.$perm->id }}" class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                                            <input 
                                                                                id="{{ $perm->name.''.$perm->id }}"
                                                                                class="form-check-input" 
                                                                                type="checkbox" 
                                                                                name="permission[]"
                                                                                @if(!empty($rolePermissions))
                                                                                value="{{ $perm->name }}" 
                                                                                {{ 
                                                                                    in_array($perm->name, $rolePermissions) ? 'checked' : '' 
                                                                                }} 
                                                                                @endif
                                                                                value="{{ $perm->name }}"

                                                                            />
                                                                            <small class="form-check-label">{{ ucwords($perm->permission) }}</small>
                                                                            <span class="form-check-label">{{ $permission->permission }}</span>
                                                                        </label>
                                                                    @endforeach
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="text-center pt-15">
                                    <button type="reset" class="btn btn-light me-3" data-kt-roles-modal-action="cancel">Discard</button>
                                    <button onclick="submitForm()" type="button" class="btn btn-primary" data-kt-roles-modal-action="cancel">
                                        <span class="indicator-label">Submit</span>
                                        <span class="indicator-progress">Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    </button>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.toggle').click(function () {
                $(this).parent().children('ul.nested').toggleClass('show');
            });
        });
    
        function submitForm() {
            var form = document.getElementById('updateRoleForm');
            var formData = new FormData(form);
            // Prevent the default form submission behavior
            form.addEventListener('submit', function(event) {
                event.preventDefault();
            });
            fetch(form.action, {
                method: 'POST',
                body: formData
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                // Handle the response data as needed
                console.log(data);
                jSuites.notification({
                        name: 'Role Update',
                        message: 'User role updated successfully!',
                });
            })
            .catch(error => {
                // Handle errors
                console.error('There was a problem with the fetch operation:', error);
            });
        }
    </script>
</div>