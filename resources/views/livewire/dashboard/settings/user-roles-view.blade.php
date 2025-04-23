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
        <div class="mb-5 card mb-xl-10">
            <div class="border-0 cursor-pointer card-header" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                <div class="gap-3 m-0 card-title ">
                    <a href="{{ route('sys-settings') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
                            <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1"/>
                        </svg>
                    </a>
                    <h3 class="m-0 fw-bold">User Roles & Permission Settings</h3>
                </div>
                @can('add user roles')
                    <button type="button" class="my-5 btn-sm btn btn-primary d-flex flex-column flex-center" data-bs-toggle="modal" data-bs-target="#kt_modal_add_role">
                        Add New Role
                    </button>
                @endcan
            </div>
        </div>
    </div>
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl">
            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-5 g-xl-9">
                @foreach ($roles as $key => $role)
                <div class="col-md-4">
                    <div class="card card-flush h-md-100">
                        <div class="card-header">
                            <div class="card-title text-info">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill-gear" viewBox="0 0 16 16">
                                    <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0m-9 8c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4m9.886-3.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382zM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0"/>
                                </svg>
                                &nbsp;
                                <h2 class="capitalize text-info fs-4">{{ ucwords($role->name) }}</h2>
                            </div>
                        </div>
                        <div class="flex-wrap pt-0 card-footer">
                            @can('delete user roles')
                                <a class="my-1 btn btn-sm btn-danger btn-active-primary me-2"  wire:click="destroy({{ $role->id }})">Delete</a>
                            @endcan
                            @can('edit user roles')
                                <button
                                    type="button"
                                    class="my-1 btn-sm btn btn-info btn-primary"
                                    data-bs-toggle="modal"
                                    data-bs-target="#kt_modal_update_role"
                                    data-role-id="{{ $role->id }}"
                                    data-role-name="{{ $role->name }}"
                                    data-role-permissions='@json($role->permissions->pluck("name"))'
                                >
                                    Edit Role
                                </button>
                            @endcan
                        </div>
                    </div>
                </div>
                @endforeach
                @can('add user roles')
                <div class="col-md-4">
                    <div class="card h-md-100">
                        <div class="card-body d-flex flex-center">
                            <button type="button" class="btn btn-sm btn-clear d-flex flex-column flex-center" data-bs-toggle="modal" data-bs-target="#kt_modal_add_role">
                                <img src="{{ asset('public/mfs/admin/assets/media/illustrations/sketchy-1/4.png')}}" alt="" class="mw-100 mh-150px mb-7" />
                                <div class="text-gray-600 fw-bold fs-3 text-hover-primary">Add New Role</div>
                            </button>
                        </div>
                    </div>
                </div>
                @endcan
            </div>
            @include('livewire.dashboard.settings.__parts.add-role-modal')
            @include('livewire.dashboard.settings.__parts.edit-role-modal')
        </div>
    </div>
</div>
