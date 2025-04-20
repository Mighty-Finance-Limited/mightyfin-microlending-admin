<div class="flex-column-auto" id="kt_aside_toolbar">
    <div class="aside-user d-flex align-items-sm-center justify-content-center">
        <div class="symbol symbol-50px">
            <img
                src="{{ Storage::url(auth()->user()->profile_photo_path) }}"
                alt="Profile Picture"
                onerror="this.onerror=null; this.src='https://thumbs.dreamstime.com/b/default-avatar-profile-image-vector-social-media-user-icon-potrait-182347582.jpg';"
            />
        </div>

        <div class="flex-wrap aside-user-info flex-row-fluid ms-5">
            <div class="d-flex">
                <div class="flex-grow-1 me-2">
                    <a href="#" class="text-white text-hover-primary fs-6 fw-bold">
                        {{ auth()->user()->fname.' '.auth()->user()->lname }}
                    </a>
                    <span class="mb-1 text-warning fw-semibold d-block fs-8">
                        {{ preg_replace('/[^A-Za-z0-9. -]/', '',  Auth::user()->roles                                                                                                                   ->pluck('name')) ?? 'Guest' }}
                    </span>
                    <div class="d-flex align-items-center text-success fs-9">
                        <span class="capitalize bullet bullet-dot bg-success me-1"></span>online
                    </div>
                </div>
                
                <div class="me-n2">
                    <a href="#" class="btn btn-icon btn-sm btn-active-color-primary mt-n2"
                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start"
                        data-kt-menu-overflow="true">
                        <i class="ki-duotone ki-setting-2 text-muted fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </a>
                    
                    <div class="py-4 menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold fs-6 w-275px"
                        data-kt-menu="true">
                        <div class="px-3 menu-item">
                            <div class="px-3 menu-content d-flex align-items-center">
                                <div class="symbol symbol-50px me-5">
                                    <img alt="Logo" src="{{ asset('public/mfs/admin/assets/media/avatars/blank.png')}}" />
                                </div>
                                
                                <div class="d-flex flex-column">
                                    <div class="fw-bold d-flex align-items-center fs-5">
                                        {{ auth()->user()->fname.' '.auth()->user()->lname }}
                                        <span class="px-2 py-1 badge badge-light-success fw-bold fs-8 ms-2">
                                            {{ preg_replace('/[^A-Za-z0-9. -]/', '',  Auth::user()->roles->pluck('name')) ?? 'Staff' }}
                                        </span>
                                    </div>
                                    <a href="#" class="fw-semibold text-muted text-hover-primary fs-7">{{ auth()->user()->email }}</a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="px-5 menu-item">
                            <a href="{{ route('my-profile', ['view' => 'profile']) }}" class="px-5 menu-link">My Profile</a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="px-5 menu-item">
                            <a href="{{ route('sys-settings') }}" class="px-5 menu-link">
                                <span class="menu-text">System Settings</span>
                            </a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="px-5 menu-item" data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                            data-kt-menu-placement="right-start" data-kt-menu-offset="-15px, 0">
                            <a href="#" class="px-5 menu-link">
                                <span class="menu-title">Security</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <!--begin::Menu sub-->
                            <div class="py-4 menu-sub menu-sub-dropdown w-175px">
                                <!--begin::Menu item-->
                                <div class="px-3 menu-item">
                                    <a href="{{ route('profile.show', ['view'=>'privacy-security']) }}" class="px-5 menu-link">Change Password</a>
                                </div>
                                <!--end::Menu item-->
                                <div class="my-2 separator"></div>
                                <!--end::Menu separator-->
                            </div>
                            <!--end::Menu sub-->
                        </div>
                        <div class="my-2 separator"></div>

                        <form method="POST" action="{{ route('logout') }}" class="px-5 menu-item">
                            @csrf
                            <button type="submit" class="px-5 menu-link btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-left" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0z"/>
                                    <path fill-rule="evenodd" d="M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708z"/>
                                </svg>
                                <span class="ms-2">Sign Out </span>
                            </button>
                        </form>
                        <!--end::Menu item-->
                    </div>
                    <!--end::User account menu-->
                    <!--end::Action-->
                </div>
                <!--end::User menu-->
            </div>
            <!--end::Section-->
        </div>
        <!--end::Wrapper-->
    </div>
</div>