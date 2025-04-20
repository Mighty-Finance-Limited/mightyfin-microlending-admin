<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Card-->
            <div class="card">
                <!--begin::Card header-->
                <div class="pt-6 border-0 card-header">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <!--begin::Search-->
                        <div class="my-1 d-flex align-items-center position-relative">
                            <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            <input type="text" data-kt-customer-table-filter="search" class="form-control form-control-solid w-250px ps-12" placeholder="Search Customers" />
                        </div>
                        <!--end::Search-->
                    </div>
                    <!--begin::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Toolbar-->
                        <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                            <!--begin::Filter-->
                            {{-- <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                            <i class="ki-duotone ki-filter fs-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>Filter</button> --}}
                            <!--begin::Menu 1-->
                            <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true" id="kt-toolbar-filter">
                                <!--begin::Header-->
                                <div class="py-5 px-7">
                                    <div class="fs-4 text-dark fw-bold">Filter Options</div>
                                </div>
                                <!--end::Header-->
                                <!--begin::Separator-->
                                <div class="border-gray-200 separator"></div>
                                <!--end::Separator-->
                                <!--begin::Content-->
                                <div class="py-5 px-7">
                                    <!--begin::Input group-->
                                    <div class="mb-10">
                                        <!--begin::Label-->
                                        <label class="mb-3 form-label fs-5 fw-semibold">Month:</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <select class="form-select form-select-solid fw-bold" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-kt-customer-table-filter="month" data-dropdown-parent="#kt-toolbar-filter">
                                            <option></option>
                                            <option value="aug">August</option>
                                            <option value="sep">September</option>
                                            <option value="oct">October</option>
                                            <option value="nov">November</option>
                                            <option value="dec">December</option>
                                        </select>
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="mb-10">
                                        <!--begin::Label-->
                                        <label class="mb-3 form-label fs-5 fw-semibold">Payment Type:</label>
                                        <!--end::Label-->
                                        <!--begin::Options-->
                                        <div class="flex-wrap d-flex flex-column fw-semibold" data-kt-customer-table-filter="payment_type">
                                            <!--begin::Option-->
                                            <label class="mb-3 form-check form-check-sm form-check-custom form-check-solid me-5">
                                                <input class="form-check-input" type="radio" name="payment_type" value="all" checked="checked" />
                                                <span class="text-gray-600 form-check-label">All</span>
                                            </label>
                                            <!--end::Option-->
                                            <!--begin::Option-->
                                            <label class="mb-3 form-check form-check-sm form-check-custom form-check-solid me-5">
                                                <input class="form-check-input" type="radio" name="payment_type" value="visa" />
                                                <span class="text-gray-600 form-check-label">Visa</span>
                                            </label>
                                            <!--end::Option-->
                                            <!--begin::Option-->
                                            <label class="mb-3 form-check form-check-sm form-check-custom form-check-solid">
                                                <input class="form-check-input" type="radio" name="payment_type" value="mastercard" />
                                                <span class="text-gray-600 form-check-label">Mastercard</span>
                                            </label>
                                            <!--end::Option-->
                                            <!--begin::Option-->
                                            <label class="form-check form-check-sm form-check-custom form-check-solid">
                                                <input class="form-check-input" type="radio" name="payment_type" value="american_express" />
                                                <span class="text-gray-600 form-check-label">American Express</span>
                                            </label>
                                            <!--end::Option-->
                                        </div>
                                        <!--end::Options-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Actions-->
                                    <div class="d-flex justify-content-end">
                                        <button type="reset" class="btn btn-light btn-active-light-primary me-2" data-kt-menu-dismiss="true" data-kt-customer-table-filter="reset">Reset</button>
                                        <button type="submit" class="btn btn-primary" data-kt-menu-dismiss="true" data-kt-customer-table-filter="filter">Apply</button>
                                    </div>
                                    <!--end::Actions-->
                                </div>
                                <!--end::Content-->
                            </div>
                            <!--end::Menu 1-->
                            <!--end::Filter-->
                            <!--begin::Export-->
                            {{-- <button type="button" class="btn btn-light-primary me-3" data-bs-toggle="modal" data-bs-target="#kt_customers_export_modal">
                            <i class="ki-duotone ki-exit-up fs-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>Export</button> --}}
                            <!--end::Export-->
                            <!--begin::Add customer-->
                            @can('create clientele')
                            <a href="" data-bs-toggle="modal" id="create-btn" data-bs-target="#kt_modal_add_customer" class="btn btn-sm btn-primary">
                                Add Customer
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                                    <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4"/>
                                  </svg>
                            </a>
                            @endcan
                            {{-- data-bs-toggle="modal" data-bs-target="#kt_modal_add_customer" --}}
                            <!--end::Add customer-->
                        </div>
                        <!--end::Toolbar-->
                        <!--begin::Group actions-->
                        <div class="d-flex justify-content-end align-items-center d-none" data-kt-customer-table-toolbar="selected">
                            <div class="fw-bold me-5">
                            <span class="me-2" data-kt-customer-table-select="selected_count"></span>Selected</div>
                            <button type="button" class="btn btn-danger" data-kt-customer-table-select="delete_selected">Delete Selected</button>
                        </div>
                        <!--end::Group actions-->
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="pt-0 card-body">
                    @include('livewire.dashboard.__parts.dash-alerts')
                    <!--begin::Table-->
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
                        <thead>
                            <tr class="text-gray-400 text-start fw-bold fs-7 text-uppercase gs-0">
                                <th class="w-10px pe-2">
                                    <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                        <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_customers_table .form-check-input" value="1" />
                                    </div>
                                </th>
                                <th class="min-w-125px">Customer Name</th>
                                <th class="min-w-125px">Email</th>
                                <th class="min-w-125px">Job Title</th>
                                <th class="min-w-125px">National ID</th>
                                <th class="min-w-125px">Created Date</th>
                                <th class="text-end min-w-70px">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 fw-semibold">

                            @forelse($users as $user)
                            <tr>
                                <td>
                                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="1" />
                                    </div>
                                </td>
                                <td>

                                    {{-- @if($user->profile_photo_path == null)
                                        @if($user->fname != null && $user->lname != null)
                                            <span>{{ $user->fname[0].' '.$user->lname[0] }}</span>
                                        @else
                                            <span>{{ $user->name[0] }}</span>
                                        @endif
                                    @else
                                        <img class="rounded-circle" width="35" src="{{ 'public/'.Storage::url($user->profile_photo_path) }}" />
                                    @endif --}}
                                    <a href="" class="mb-1 text-gray-800 text-hover-primary">{{ $user->fname.' '.$user->lname }}</a>
                                </td>
                                <td>
                                    <a href="#" class="mb-1 text-gray-600 text-hover-primary">{{ $user->email }}</a>
                                </td>
                                <td>{{ $user->jobTitle ?? 'No Data' }}</td>
                                <td data-filter="visa">
                                    {{-- <img src="{{ asset('public/mfs/admin/assets/media/svg/card-logos/visa.svg')}}" class="w-35px me-3" alt="" />
                                    **** 6561 --}}
                                    {{ $user->nrc_no ?? $user->nrc ?? 'No Data' }}
                                </td>
                                <td>{{ $user->created_at->diffForHumans() }}</td>
                                <td class="text-end">
                                    <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                    <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                    <!--begin::Menu-->
                                    <div class="py-4 menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px" data-kt-menu="true">
                                        <!--begin::Menu item-->
                                        <div class="px-3 menu-item">
                                            <a href="{{ route('client-account', ['key'=>$user->id]) }}" class="px-3 menu-link">View</a>
                                        </div>
                                        <div class="px-3 menu-item">
                                            <a href="{{ route('edit-user', ['id'=>$user->id]) }}" class="px-3 menu-link">Edit</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        @can('delete clientele')
                                        <div class="px-3 menu-item">
                                            <a wire:click="destroy({{ $user->id }})" onclick="confirm('Are you sure you want to permanently delete this account.') || event.stopImmediatePropagation();" title="Delete Account" href="#" class="px-3 menu-link" data-kt-customer-table-filter="delete_row">Delete</a>
                                        </div>
                                        @endcan
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu-->
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
                    <!--end::Table-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
            <!--begin::Modals-->
            <!--begin::Modal - Customers - Add-->
            @include('livewire.dashboard.borrowers.__parts.create')
            <!--end::Modal - Customers - Add-->
            <!--begin::Modal - Adjust Balance-->
            <div class="modal fade" id="kt_customers_export_modal" tabindex="-1" aria-hidden="true">
                <!--begin::Modal dialog-->
                <div class="modal-dialog modal-dialog-centered mw-650px">
                    <!--begin::Modal content-->
                    <div class="modal-content">
                        <!--begin::Modal header-->
                        <div class="modal-header">
                            <!--begin::Modal title-->
                            <h2 class="fw-bold">Export Customers</h2>
                            <!--end::Modal title-->
                            <!--begin::Close-->
                            <div id="kt_customers_export_close" class="btn btn-icon btn-sm btn-active-icon-primary">
                                <i class="ki-duotone ki-cross fs-1">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </div>
                            <!--end::Close-->
                        </div>
                        <!--end::Modal header-->
                        <!--begin::Modal body-->
                        <div class="mx-5 modal-body scroll-y mx-xl-15 my-7">
                            <!--begin::Form-->
                            <form id="kt_customers_export_form" class="form" action="#">
                                <!--begin::Input group-->
                                <div class="mb-10 fv-row">
                                    <!--begin::Label-->
                                    <label class="mb-5 fs-5 fw-semibold form-label">Select Export Format:</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <select data-control="select2" data-placeholder="Select a format" data-hide-search="true" name="format" class="form-select form-select-solid">
                                        <option value="excell">Excel</option>
                                        <option value="pdf">PDF</option>
                                        <option value="cvs">CVS</option>
                                        <option value="zip">ZIP</option>
                                    </select>
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="mb-10 fv-row">
                                    <!--begin::Label-->
                                    <label class="mb-5 fs-5 fw-semibold form-label">Select Date Range:</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input class="form-control form-control-solid" placeholder="Pick a date" name="date" />
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Row-->
                                <div class="row fv-row mb-15">
                                    <!--begin::Label-->
                                    <label class="mb-5 fs-5 fw-semibold form-label">Payment Type:</label>
                                    <!--end::Label-->
                                    <!--begin::Radio group-->
                                    <div class="d-flex flex-column">
                                        <!--begin::Radio button-->
                                        <label class="mb-3 form-check form-check-custom form-check-sm form-check-solid">
                                            <input class="form-check-input" type="checkbox" value="1" checked="checked" name="payment_type" />
                                            <span class="text-gray-600 form-check-label fw-semibold">All</span>
                                        </label>
                                        <!--end::Radio button-->
                                        <!--begin::Radio button-->
                                        <label class="mb-3 form-check form-check-custom form-check-sm form-check-solid">
                                            <input class="form-check-input" type="checkbox" value="2" checked="checked" name="payment_type" />
                                            <span class="text-gray-600 form-check-label fw-semibold">Visa</span>
                                        </label>
                                        <!--end::Radio button-->
                                        <!--begin::Radio button-->
                                        <label class="mb-3 form-check form-check-custom form-check-sm form-check-solid">
                                            <input class="form-check-input" type="checkbox" value="3" name="payment_type" />
                                            <span class="text-gray-600 form-check-label fw-semibold">Mastercard</span>
                                        </label>
                                        <!--end::Radio button-->
                                        <!--begin::Radio button-->
                                        <label class="form-check form-check-custom form-check-sm form-check-solid">
                                            <input class="form-check-input" type="checkbox" value="4" name="payment_type" />
                                            <span class="text-gray-600 form-check-label fw-semibold">American Express</span>
                                        </label>
                                        <!--end::Radio button-->
                                    </div>
                                    <!--end::Input group-->
                                </div>
                                <!--end::Row-->
                                <!--begin::Actions-->
                                <div class="text-center">
                                    <button type="reset" id="kt_customers_export_cancel" class="btn btn-light me-3">Discard</button>
                                    <button type="submit" id="kt_customers_export_submit" class="btn btn-primary">
                                        <span class="indicator-label">Submit</span>
                                        <span class="indicator-progress">Please wait...
                                        <span class="align-middle spinner-border spinner-border-sm ms-2"></span></span>
                                    </button>
                                </div>
                                <!--end::Actions-->
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Modal body-->
                    </div>
                    <!--end::Modal content-->
                </div>
                <!--end::Modal dialog-->
            </div>
            <!--end::Modal - New Card-->
            <!--end::Modals-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
    <!-- container-fluid -->
    @include('livewire.dashboard.borrowers.__parts.create')
    @include('livewire.dashboard.loans.__modals.export-borrowers')
    @include('livewire.dashboard.loans.__modals.import-borrowers')
</div>