<div x-data="{ on:true }" class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">User Roles & Permssions</h4>
                        <button  data-toggle="modal" data-target="#exampleModalLong" class="btn btn-square btn-primary">New Role</button>
                    </div>
                    <div class="card-body pb-0">
                        <div class="col-xl-12 col-xxl-12 col-lg-12">
                            <div class="card border-0 pb-0">
                                <div class="card-body p-0"> 
                                    <div id="DZ_W_Todo4" class="widget-media dz-scroll height370 my-4 px-4">
                                        <ul class="timeline">

                                            @foreach ($roles as $key => $role)
                                            <li>
                                                <div class="timeline-panel">
                                                    <div class="form-check custom-checkbox checkbox-primary check-lg me-3">
                                                        <input type="checkbox" class="form-check-input" id="customCheckBox3" required="">
                                                        <label class="form-check-label" for="customCheckBox3"></label>
                                                    </div>
                                                    <div class="media-body">
                                                        <h5 class="capitalize mb-0">{{ $role->name }}</h5>
                                                        <small class="text-muted">{{ $role->created_at }}</small>
                                                    </div>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn btn-primary light sharp" data-toggle="dropdown">
                                                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M4.58333 13.5205C3.19 13.5205 2.0625 12.393 2.0625 10.9997C2.0625 9.60629 3.19 8.47879 4.58333 8.47879C5.97667 8.47879 7.10417 9.60629 7.10417 10.9997C7.10417 12.393 5.97667 13.5205 4.58333 13.5205ZM4.58333 9.85379C3.95083 9.85379 3.4375 10.3672 3.4375 10.9997C3.4375 11.6322 3.95083 12.1455 4.58333 12.1455C5.21583 12.1455 5.72917 11.6322 5.72917 10.9997C5.72917 10.3672 5.21583 9.85379 4.58333 9.85379Z" fill="var(--primary)"/>
                                                                <path d="M17.4163 13.5205C16.023 13.5205 14.8955 12.393 14.8955 10.9997C14.8955 9.60629 16.023 8.47879 17.4163 8.47879C18.8097 8.47879 19.9372 9.60629 19.9372 10.9997C19.9372 12.393 18.8097 13.5205 17.4163 13.5205ZM17.4163 9.85379C16.7838 9.85379 16.2705 10.3672 16.2705 10.9997C16.2705 11.6322 16.7838 12.1455 17.4163 12.1455C18.0488 12.1455 18.5622 11.6322 18.5622 10.9997C18.5622 10.3672 18.0488 9.85379 17.4163 9.85379Z" fill="var(--primary)"/>
                                                                <path d="M11.0003 13.5205C9.60699 13.5205 8.47949 12.393 8.47949 10.9997C8.47949 9.60629 9.60699 8.47879 11.0003 8.47879C12.3937 8.47879 13.5212 9.60629 13.5212 10.9997C13.5212 12.393 12.3937 13.5205 11.0003 13.5205ZM11.0003 9.85379C10.3678 9.85379 9.85449 10.3672 9.85449 10.9997C9.85449 11.6322 10.3678 12.1455 11.0003 12.1455C11.6328 12.1455 12.1462 11.6322 12.1462 10.9997C12.1462 10.3672 11.6328 9.85379 11.0003 9.85379Z" fill="var(--primary)"/>
                                                            </svg>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <button data-toggle="modal" data-target="#editUserRoleModal" class="dropdown-item" wire:click="edit({{ $role->id }})">Edit</button>
                                                            <a class="dropdown-item"  wire:click="destroy({{ $role->id }})">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            @endforeach
                                            {{-- <li>
                                                <div class="timeline-panel">
                                                    <div class="form-check custom-checkbox checkbox-warning check-lg me-3">
                                                        <input type="checkbox" class="form-check-input" id="customCheckBox2" required="">
                                                        <label class="form-check-label" for="customCheckBox2"></label>
                                                    </div>
                                                    <div class="media-body">
                                                        <h5 class="mb-0">Stand up</h5>
                                                        <small class="text-muted">29 July 2020 - 02:26 PM</small>
                                                    </div>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn btn-warning light sharp" data-toggle="dropdown">
                                                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M4.58333 13.5205C3.19 13.5205 2.0625 12.393 2.0625 10.9997C2.0625 9.60629 3.19 8.47879 4.58333 8.47879C5.97667 8.47879 7.10417 9.60629 7.10417 10.9997C7.10417 12.393 5.97667 13.5205 4.58333 13.5205ZM4.58333 9.85379C3.95083 9.85379 3.4375 10.3672 3.4375 10.9997C3.4375 11.6322 3.95083 12.1455 4.58333 12.1455C5.21583 12.1455 5.72917 11.6322 5.72917 10.9997C5.72917 10.3672 5.21583 9.85379 4.58333 9.85379Z" fill="#FFAB2D"/>
                                                                <path d="M17.4163 13.5205C16.023 13.5205 14.8955 12.393 14.8955 10.9997C14.8955 9.60629 16.023 8.47879 17.4163 8.47879C18.8097 8.47879 19.9372 9.60629 19.9372 10.9997C19.9372 12.393 18.8097 13.5205 17.4163 13.5205ZM17.4163 9.85379C16.7838 9.85379 16.2705 10.3672 16.2705 10.9997C16.2705 11.6322 16.7838 12.1455 17.4163 12.1455C18.0488 12.1455 18.5622 11.6322 18.5622 10.9997C18.5622 10.3672 18.0488 9.85379 17.4163 9.85379Z" fill="#FFAB2D"/>
                                                                <path d="M11.0003 13.5205C9.60699 13.5205 8.47949 12.393 8.47949 10.9997C8.47949 9.60629 9.60699 8.47879 11.0003 8.47879C12.3937 8.47879 13.5212 9.60629 13.5212 10.9997C13.5212 12.393 12.3937 13.5205 11.0003 13.5205ZM11.0003 9.85379C10.3678 9.85379 9.85449 10.3672 9.85449 10.9997C9.85449 11.6322 10.3678 12.1455 11.0003 12.1455C11.6328 12.1455 12.1462 11.6322 12.1462 10.9997C12.1462 10.3672 11.6328 9.85379 11.0003 9.85379Z" fill="#FFAB2D"/>
                                                            </svg>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item" href="#">Edit</a>
                                                            <a class="dropdown-item" href="#">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="timeline-panel">
                                                    <div class="form-check custom-checkbox checkbox-primary check-lg me-3">
                                                        <input type="checkbox" class="form-check-input" id="customCheckBox3" required="">
                                                        <label class="form-check-label" for="customCheckBox3"></label>
                                                    </div>
                                                    <div class="media-body">
                                                        <h5 class="mb-0">Don't give up the fight.</h5>
                                                        <small class="text-muted">29 July 2020 - 02:26 PM</small>
                                                    </div>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn btn-primary light sharp" data-toggle="dropdown">
                                                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M4.58333 13.5205C3.19 13.5205 2.0625 12.393 2.0625 10.9997C2.0625 9.60629 3.19 8.47879 4.58333 8.47879C5.97667 8.47879 7.10417 9.60629 7.10417 10.9997C7.10417 12.393 5.97667 13.5205 4.58333 13.5205ZM4.58333 9.85379C3.95083 9.85379 3.4375 10.3672 3.4375 10.9997C3.4375 11.6322 3.95083 12.1455 4.58333 12.1455C5.21583 12.1455 5.72917 11.6322 5.72917 10.9997C5.72917 10.3672 5.21583 9.85379 4.58333 9.85379Z" fill="var(--primary)"/>
                                                                <path d="M17.4163 13.5205C16.023 13.5205 14.8955 12.393 14.8955 10.9997C14.8955 9.60629 16.023 8.47879 17.4163 8.47879C18.8097 8.47879 19.9372 9.60629 19.9372 10.9997C19.9372 12.393 18.8097 13.5205 17.4163 13.5205ZM17.4163 9.85379C16.7838 9.85379 16.2705 10.3672 16.2705 10.9997C16.2705 11.6322 16.7838 12.1455 17.4163 12.1455C18.0488 12.1455 18.5622 11.6322 18.5622 10.9997C18.5622 10.3672 18.0488 9.85379 17.4163 9.85379Z" fill="var(--primary)"/>
                                                                <path d="M11.0003 13.5205C9.60699 13.5205 8.47949 12.393 8.47949 10.9997C8.47949 9.60629 9.60699 8.47879 11.0003 8.47879C12.3937 8.47879 13.5212 9.60629 13.5212 10.9997C13.5212 12.393 12.3937 13.5205 11.0003 13.5205ZM11.0003 9.85379C10.3678 9.85379 9.85449 10.3672 9.85449 10.9997C9.85449 11.6322 10.3678 12.1455 11.0003 12.1455C11.6328 12.1455 12.1462 11.6322 12.1462 10.9997C12.1462 10.3672 11.6328 9.85379 11.0003 9.85379Z" fill="var(--primary)"/>
                                                            </svg>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item" href="#">Edit</a>
                                                            <a class="dropdown-item" href="#">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="timeline-panel">
                                                    <div class="form-check custom-checkbox checkbox-info check-lg me-3">
                                                        <input type="checkbox" class="form-check-input" id="customCheckBox4" required="">
                                                        <label class="form-check-label" for="customCheckBox4"></label>
                                                    </div>
                                                    <div class="media-body">
                                                        <h5 class="mb-0">Do something else</h5>
                                                        <small class="text-muted">29 July 2020 - 02:26 PM</small>
                                                    </div>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn btn-info light sharp" data-toggle="dropdown">
                                                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M4.58333 13.5205C3.19 13.5205 2.0625 12.393 2.0625 10.9997C2.0625 9.60629 3.19 8.47879 4.58333 8.47879C5.97667 8.47879 7.10417 9.60629 7.10417 10.9997C7.10417 12.393 5.97667 13.5205 4.58333 13.5205ZM4.58333 9.85379C3.95083 9.85379 3.4375 10.3672 3.4375 10.9997C3.4375 11.6322 3.95083 12.1455 4.58333 12.1455C5.21583 12.1455 5.72917 11.6322 5.72917 10.9997C5.72917 10.3672 5.21583 9.85379 4.58333 9.85379Z" fill="#28BE9D"/>
                                                                <path d="M17.4163 13.5205C16.023 13.5205 14.8955 12.393 14.8955 10.9997C14.8955 9.60629 16.023 8.47879 17.4163 8.47879C18.8097 8.47879 19.9372 9.60629 19.9372 10.9997C19.9372 12.393 18.8097 13.5205 17.4163 13.5205ZM17.4163 9.85379C16.7838 9.85379 16.2705 10.3672 16.2705 10.9997C16.2705 11.6322 16.7838 12.1455 17.4163 12.1455C18.0488 12.1455 18.5622 11.6322 18.5622 10.9997C18.5622 10.3672 18.0488 9.85379 17.4163 9.85379Z" fill="#28BE9D"/>
                                                                <path d="M11.0003 13.5205C9.60699 13.5205 8.47949 12.393 8.47949 10.9997C8.47949 9.60629 9.60699 8.47879 11.0003 8.47879C12.3937 8.47879 13.5212 9.60629 13.5212 10.9997C13.5212 12.393 12.3937 13.5205 11.0003 13.5205ZM11.0003 9.85379C10.3678 9.85379 9.85449 10.3672 9.85449 10.9997C9.85449 11.6322 10.3678 12.1455 11.0003 12.1455C11.6328 12.1455 12.1462 11.6322 12.1462 10.9997C12.1462 10.3672 11.6328 9.85379 11.0003 9.85379Z" fill="#28BE9D"/>
                                                            </svg>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item" href="#">Edit</a>
                                                            <a class="dropdown-item" href="#">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="timeline-panel">
                                                    <div class="form-check custom-checkbox checkbox-success check-lg me-3">
                                                        <input type="checkbox" class="form-check-input" id="customCheckBox5" required="">
                                                        <label class="form-check-label" for="customCheckBox5"></label>
                                                    </div>
                                                    <div class="media-body">
                                                        <h5 class="mb-0">Get up</h5>
                                                        <small class="text-muted">29 July 2020 - 02:26 PM</small>
                                                    </div>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn btn-success light sharp" data-toggle="dropdown">
                                                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M4.58333 13.5205C3.19 13.5205 2.0625 12.393 2.0625 10.9997C2.0625 9.60629 3.19 8.47879 4.58333 8.47879C5.97667 8.47879 7.10417 9.60629 7.10417 10.9997C7.10417 12.393 5.97667 13.5205 4.58333 13.5205ZM4.58333 9.85379C3.95083 9.85379 3.4375 10.3672 3.4375 10.9997C3.4375 11.6322 3.95083 12.1455 4.58333 12.1455C5.21583 12.1455 5.72917 11.6322 5.72917 10.9997C5.72917 10.3672 5.21583 9.85379 4.58333 9.85379Z" fill="#28BE9D"/>
                                                                <path d="M17.4163 13.5205C16.023 13.5205 14.8955 12.393 14.8955 10.9997C14.8955 9.60629 16.023 8.47879 17.4163 8.47879C18.8097 8.47879 19.9372 9.60629 19.9372 10.9997C19.9372 12.393 18.8097 13.5205 17.4163 13.5205ZM17.4163 9.85379C16.7838 9.85379 16.2705 10.3672 16.2705 10.9997C16.2705 11.6322 16.7838 12.1455 17.4163 12.1455C18.0488 12.1455 18.5622 11.6322 18.5622 10.9997C18.5622 10.3672 18.0488 9.85379 17.4163 9.85379Z" fill="#28BE9D"/>
                                                                <path d="M11.0003 13.5205C9.60699 13.5205 8.47949 12.393 8.47949 10.9997C8.47949 9.60629 9.60699 8.47879 11.0003 8.47879C12.3937 8.47879 13.5212 9.60629 13.5212 10.9997C13.5212 12.393 12.3937 13.5205 11.0003 13.5205ZM11.0003 9.85379C10.3678 9.85379 9.85449 10.3672 9.85449 10.9997C9.85449 11.6322 10.3678 12.1455 11.0003 12.1455C11.6328 12.1455 12.1462 11.6322 12.1462 10.9997C12.1462 10.3672 11.6328 9.85379 11.0003 9.85379Z" fill="#28BE9D"/>
                                                            </svg>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item" href="#">Edit</a>
                                                            <a class="dropdown-item" href="#">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="timeline-panel">
                                                    <div class="form-check custom-checkbox checkbox-warning check-lg me-3">
                                                        <input type="checkbox" class="form-check-input" id="customCheckBox6" required="">
                                                        <label class="form-check-label" for="customCheckBox6"></label>
                                                    </div>
                                                    <div class="media-body">
                                                        <h5 class="mb-0">Stand up</h5>
                                                        <small class="text-muted">29 July 2020 - 02:26 PM</small>
                                                    </div>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn btn-warning light sharp" data-toggle="dropdown">
                                                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M4.58333 13.5205C3.19 13.5205 2.0625 12.393 2.0625 10.9997C2.0625 9.60629 3.19 8.47879 4.58333 8.47879C5.97667 8.47879 7.10417 9.60629 7.10417 10.9997C7.10417 12.393 5.97667 13.5205 4.58333 13.5205ZM4.58333 9.85379C3.95083 9.85379 3.4375 10.3672 3.4375 10.9997C3.4375 11.6322 3.95083 12.1455 4.58333 12.1455C5.21583 12.1455 5.72917 11.6322 5.72917 10.9997C5.72917 10.3672 5.21583 9.85379 4.58333 9.85379Z" fill="#FFAB2D"/>
                                                                <path d="M17.4163 13.5205C16.023 13.5205 14.8955 12.393 14.8955 10.9997C14.8955 9.60629 16.023 8.47879 17.4163 8.47879C18.8097 8.47879 19.9372 9.60629 19.9372 10.9997C19.9372 12.393 18.8097 13.5205 17.4163 13.5205ZM17.4163 9.85379C16.7838 9.85379 16.2705 10.3672 16.2705 10.9997C16.2705 11.6322 16.7838 12.1455 17.4163 12.1455C18.0488 12.1455 18.5622 11.6322 18.5622 10.9997C18.5622 10.3672 18.0488 9.85379 17.4163 9.85379Z" fill="#FFAB2D"/>
                                                                <path d="M11.0003 13.5205C9.60699 13.5205 8.47949 12.393 8.47949 10.9997C8.47949 9.60629 9.60699 8.47879 11.0003 8.47879C12.3937 8.47879 13.5212 9.60629 13.5212 10.9997C13.5212 12.393 12.3937 13.5205 11.0003 13.5205ZM11.0003 9.85379C10.3678 9.85379 9.85449 10.3672 9.85449 10.9997C9.85449 11.6322 10.3678 12.1455 11.0003 12.1455C11.6328 12.1455 12.1462 11.6322 12.1462 10.9997C12.1462 10.3672 11.6328 9.85379 11.0003 9.85379Z" fill="#FFAB2D"/>
                                                            </svg>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item" href="#">Edit</a>
                                                            <a class="dropdown-item" href="#">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li> --}}
                                        </ul>
                                    </div>
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
            </div>
        </div>
    </div>

    {{-- Modal --}}
    {{-- @if($createModal) --}}
    <div wire:ignore class="modal fade" id="exampleModalLong">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create User Role</h5>
                    <button type="button" class="btn-close" data-dismiss="modal">
                    </button>
                </div>
                
                <form method="POST" wire:submit.prevent="store()">
                    <div class="modal-body">
                        <div class="col-xl-12 col-lg-12">
                            <div class="card">
                                <div class="basic-form">
                                    @csrf
                                    <div class="mb-3">
                                        <input class="form-control" wire:model.defer="name" value="{{ old('name') }}" type="text" placeholder="Title">
                                    </div>
                                    <div class="mb-2">
                                        @foreach($permissions as $key => $perm)
                                        
                                        <div class="col-sm-9">
                                            <div class="form-check">
                                                <input
                                                wire:model.defer="permission.{{ $key }}"
                                                value="{{ $perm->name }}" 
                                                class="form-check-input permission" 
                                                type="checkbox">
                                                <label class="form-check-label">
                                                    {{ $perm->name }}
                                                </label>
                                            </div>
                                        </div>
                                            
                                        @endforeach
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
    {{-- End Modal --}}

    {{-- Edit User Role Modal --}}
    @if($show)
    <div class="modal fade show" style="display: block" id="">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit {{ $role_name }} Role</h5>
                    <button wire:click="closeModal()" type="button" class="btn-close" data-dismiss="modal"></button>
                </div>
                <form method="POST" action="{{ route('update-role') }}">
                    @csrf
                    <input type="hidden" name="role_id" value="{{$role_id}}">
                    <div class="modal-body">
                        <div class="col-xl-12 col-lg-12">
                            <div class="card">
                                <div class="basic-form">
                                    @csrf
                                    <div class="mb-3">
                                        <input class="form-control" name="name" value="{{ $role_name }}" type="text" placeholder="">
                                    </div>
                                    <div class="mb-2">
                                        @forelse($permissions as $key => $perm)
                                        <div class="col-sm-9">
                                            <div class="form-check">
                                                <input type="checkbox"
                                                class="form-check-input permission" 
                                                name="permission[]"
                                                @if(!empty($rolePermissions))
                                                value="{{ $perm->name }}" 
                                                {{ 
                                                    in_array($perm->name, $rolePermissions) ? 'checked' : '' 
                                                }} 
                                                @endif
                                                >
                                                <label class="form-check-label">
                                                    {{ $perm->name }}
                                                </label>
                                            </div>
                                        </div>
                                        @empty
                                        @endforelse
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
    {{-- End Modal --}}
</div>
