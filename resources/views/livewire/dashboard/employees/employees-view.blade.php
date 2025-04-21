<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    @include('livewire.dashboard.employees.breadcrums.index-employees-crum')
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl">
            <div class="card">
                <div class="pt-6 border-0 card-header">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="mb-1 card-label fw-bold fs-3">Employee Accounts</span>
                        <span class="mt-1 text-muted fw-semibold fs-7">Over {{$users->count()}} {{ Str::plural('User', $users->count()) }} records of every user account account on the platform</span>
                    </h3>

                    <div class="card-toolbar">
                        <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                            <button type="button" class="text-sm btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_customer">
                                Add Employee
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-add" viewBox="0 0 16 16">
                                    <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0m-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4"/>
                                    <path d="M8.256 14a4.5 4.5 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10q.39 0 .74.025c.226-.341.496-.65.804-.918Q8.844 9.002 8 9c-5 0-6 3-6 4s1 1 1 1z"/>
                                  </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="pt-0 card-body">
                    @include('livewire.dashboard.__parts.dash-alerts')

                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
                        <thead>
                            <tr class="text-gray-400 text-start fw-bold fs-7 text-uppercase gs-0">
                                <th class="w-10px pe-2">
                                    <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                        <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_customers_table .form-check-input" value="1" />
                                    </div>
                                </th>
                                <th class="min-w-125px">Fullnames</th>
                                <th class="min-w-125px">Email</th>
                                <th class="min-w-125px">Status</th>
                                <th class="min-w-125px">Phone</th>
                                <th class="min-w-125px">Created Date</th>
                                <th class="text-end min-w-70px">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 fw-semibold">
                            @forelse($users as $user)
                                @if(!$user->hasRole('user'))
                                    <tr>
                                        <td>
                                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox" value="1" />
                                            </div>
                                        </td>
                                        <td>
                                            <a href="{{ route('client-account', ['key'=>$user->id]) }}" class="mb-1 text-gray-800 text-hover-primary">
                                                {{ $user->fname.' '.$user->name.' '.$user->lname }}
                                            </a>
                                        </td>
                                        <td>
                                            <a href="mailto:{{$user->email}}" class="mb-1 text-gray-600 text-hover-primary">{{ $user->email }}</a>
                                        </td>
                                        <td>
                                            <!--begin::Badges-->
                                            <div class="badge badge-light-success">
                                                @forelse($user->roles as $role)
                                                    <span class="capitalize">{{ ucwords($role->name) }}</span>
                                                @empty
                                                    <span>Unknown</span>
                                                @endforelse
                                            </div>
                                            <!--end::Badges-->
                                        </td>
                                        <td>{{ $user->phone ?? 'Not Set' }}</td>
                                        <td>{{ $user->created_at->toFormattedDateString() }}</td>
                                        <td class="text-end">
                                            <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                            <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                            <!--begin::Menu-->
                                            <div class="py-4 menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px" data-kt-menu="true">
                                                <!--begin::Menu item-->
                                                <div class="px-3 menu-item">
                                                    <a href="{{ route('client-account', ['key'=>$user->id]) }}" class="px-3 menu-link">View</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="px-3 menu-item">
                                                    <a href="#" wire:click="destory({{$user->id}})" onclick="confirm('Are you sure you want to permanently delete this account.') || event.stopImmediatePropagation();" class="px-3 menu-link" data-kt-customer-table-filter="delete_row">Delete</a>
                                                </div>
                                                <!--end::Menu item-->
                                            </div>
                                            <!--end::Menu-->
                                        </td>
                                    </tr>
                                @endif
                            @empty
                            <div class="col-span-12 intro-y md:col-span-6">
                                <div class="text-center box">
                                    <p>No User Found</p>
                                </div>
                            </div>
                            @endforelse
                        </tbody>
                        <!--end::Table body-->
                    </table>
                    <!--end::Table-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
            <!--begin::Modals-->
            <!--begin::Modal - Customers - Add-->
            @if($createModal)
            <div wire:ignore class="modal fade" id="kt_modal_add_customer" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="shadow-lg modal-content rounded-3">
                        <form class="form" method="POST" action="{{ route('create-user') }}" id="kt_modal_add_customer_form" data-kt-redirect="../apps/customers/list.html">
                            <div class="px-4 py-3 modal-header bg-light" id="kt_modal_add_customer_header">
                                @csrf
                                <h2 class="fw-bold text-primary">
                                    <i class="fas fa-user-plus me-2"></i>
                                    Add New Employee
                                </h2>
                                <div id="kt_modal_add_customer_close" class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                                    <i class="fas fa-times fs-5"></i>
                                </div>
                            </div>

                            <div class="px-4 py-4 modal-body">
                                <div class="scroll-y me-n4 pe-4" id="kt_modal_add_customer_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_customer_header" data-kt-scroll-wrappers="#kt_modal_add_customer_scroll" data-kt-scroll-offset="300px">

                                    <!-- Basic Information Card -->
                                    <div class="mb-4 shadow-sm card">
                                        <div class="py-3 card-header bg-light">
                                            <h4 class="m-0 card-title">
                                                <i class="fas fa-id-card me-2"></i>
                                                Basic Information
                                            </h4>
                                        </div>
                                        <div class="p-4 card-body">
                                            <div class="row g-4">
                                                <div class="col-md-6 fv-row">
                                                    <label class="form-label fw-semibold">
                                                        Firstname <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="input-group">
                                                        <span class="input-group-text">
                                                            <i class="fas fa-user"></i>
                                                        </span>
                                                        <input class="form-control" placeholder="Enter firstname" name="fname" required />
                                                    </div>
                                                </div>

                                                <div class="col-md-6 fv-row">
                                                    <label class="form-label fw-semibold">
                                                        Lastname <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="input-group">
                                                        <span class="input-group-text">
                                                            <i class="fas fa-user"></i>
                                                        </span>
                                                        <input class="form-control" placeholder="Enter surname" name="lname" required />
                                                    </div>
                                                </div>

                                                <div class="col-md-12 fv-row">
                                                    <label class="form-label fw-semibold">
                                                        Email <span class="text-danger">*</span>
                                                        <span class="ms-1" data-bs-toggle="tooltip" title="Email address must be active">
                                                            <i class="text-gray-500 fas fa-question-circle"></i>
                                                        </span>
                                                    </label>
                                                    <div class="input-group">
                                                        <span class="input-group-text">
                                                            <i class="fas fa-envelope"></i>
                                                        </span>
                                                        <input type="email" class="form-control" placeholder="employee@example.com" name="email" required />
                                                    </div>
                                                </div>

                                                <div class="col-md-12 fv-row">
                                                    <label class="form-label fw-semibold">
                                                        Default Password
                                                    </label>
                                                    <div class="input-group">
                                                        <span class="input-group-text">
                                                            <i class="fas fa-lock"></i>
                                                        </span>
                                                        <input type="text" disabled class="form-control bg-light" placeholder="mighty.@2023@" />
                                                        <span class="input-group-text bg-light">
                                                            <i class="fas fa-info-circle text-muted" data-bs-toggle="tooltip" title="Default password will be applied automatically"></i>
                                                        </span>
                                                    </div>
                                                    <small class="mt-1 text-muted">Default system password will be applied automatically</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- General Information Card -->
                                    <div class="mb-4 shadow-sm card">
                                        <div class="py-3 card-header bg-light">
                                            <h4 class="m-0 card-title d-flex align-items-center" data-bs-toggle="collapse" href="#kt_modal_add_customer_billing_info" role="button" aria-expanded="true">
                                                <i class="fas fa-info-circle me-2"></i>
                                                General Information
                                                <i class="fas fa-chevron-down ms-2 fs-6"></i>
                                            </h4>
                                        </div>

                                        <div id="kt_modal_add_customer_billing_info" class="collapse show">
                                            <div class="p-4 card-body">
                                                <div class="row g-4">
                                                    <div class="col-md-6 fv-row">
                                                        <label class="form-label fw-semibold">
                                                            Address Line 1 <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="input-group">
                                                            <span class="input-group-text">
                                                                <i class="fas fa-map-marker-alt"></i>
                                                            </span>
                                                            <input class="form-control" placeholder="Enter address" name="address1" value="101, Collins Street" required />
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 fv-row">
                                                        <label class="form-label fw-semibold">
                                                            Town <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="input-group">
                                                            <span class="input-group-text">
                                                                <i class="fas fa-city"></i>
                                                            </span>
                                                            <input class="form-control" placeholder="Enter town or city" name="city" required />
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12 fv-row">
                                                        <label class="form-label fw-semibold">
                                                            Active Phone Number
                                                        </label>
                                                        <div class="input-group">
                                                            <span class="input-group-text">
                                                                <i class="fas fa-phone"></i>
                                                            </span>
                                                            <input class="form-control" placeholder="Enter phone number" name="phone" />
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 fv-row">
                                                        <label class="form-label fw-semibold">
                                                            National ID Type <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="input-group">
                                                            <span class="input-group-text">
                                                                <i class="fas fa-id-card"></i>
                                                            </span>
                                                            <select name="id_type" class="form-select">
                                                                <option value="">Select ID type...</option>
                                                                <option value="NRC">National Registration Card (NRC)</option>
                                                                <option value="Passport">Passport</option>
                                                                <option value="Drivers License">Driver's License</option>
                                                                <option value="Other">Other</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 fv-row">
                                                        <label class="form-label fw-semibold">
                                                            National ID <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="input-group">
                                                            <span class="input-group-text">
                                                                <i class="fas fa-fingerprint"></i>
                                                            </span>
                                                            <input class="form-control" placeholder="Enter ID number" name="nrc_no" required />
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 fv-row">
                                                        <label class="form-label fw-semibold">
                                                            Gender <span class="text-danger">*</span>
                                                            <span class="ms-1" data-bs-toggle="tooltip" title="Sex of the employee">
                                                                <i class="text-gray-500 fas fa-question-circle"></i>
                                                            </span>
                                                        </label>
                                                        <div class="input-group">
                                                            <span class="input-group-text">
                                                                <i class="fas fa-venus-mars"></i>
                                                            </span>
                                                            <select name="gender" aria-label="Select a gender" data-control="select2" data-placeholder="Select a gender..." data-dropdown-parent="#kt_modal_add_customer" class="form-select fw-bold">
                                                                <option value="">Select a gender...</option>
                                                                <option value="Male">Male</option>
                                                                <option value="Female">Female</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 fv-row">
                                                        <label class="form-label fw-semibold">
                                                            Role <span class="text-danger">*</span>
                                                            <span class="ms-1" data-bs-toggle="tooltip" title="User role & permissions">
                                                                <i class="text-gray-500 fas fa-question-circle"></i>
                                                            </span>
                                                        </label>
                                                        <div class="input-group">
                                                            <span class="input-group-text">
                                                                <i class="fas fa-user-tag"></i>
                                                            </span>
                                                            <select name="assigned_role" aria-label="Select a role" data-control="select2" data-placeholder="Select a role..." data-dropdown-parent="#kt_modal_add_customer" class="form-select fw-bold">
                                                                <option value="">Select a user role...</option>
                                                                @foreach($roles as $role)
                                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="mt-2 col-12">
                                                        <div class="border card bg-light">
                                                            <div class="py-3 card-body">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="me-3">
                                                                        <i class="fas fa-cog fs-3 text-primary"></i>
                                                                    </div>
                                                                    <div class="flex-grow-1">
                                                                        <label class="mb-0 fs-6 fw-semibold">Allow spooling?</label>
                                                                        <div class="text-muted fs-7">If enabled, user can pick and review loan requests in spooling mode</div>
                                                                    </div>
                                                                    <div class="form-check form-switch form-check-custom form-check-solid">
                                                                        <input class="form-check-input" name="billing" type="checkbox" value="1" id="kt_modal_add_customer_billing" checked="checked" />
                                                                        <label class="form-check-label fw-semibold text-muted" for="kt_modal_add_customer_billing">Yes</label>
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
                            </div>

                            <div class="py-3 modal-footer bg-light">
                                <button type="reset" id="kt_modal_add_customer_cancel" class="btn btn-light btn-active-light-primary me-3">
                                    <i class="fas fa-times-circle me-1"></i> Discard
                                </button>

                                <button type="submit" id="kt_modal_add_customer_submit" class="btn btn-primary btnclicky">
                                    <span class="indicator-label">
                                        <i class="fas fa-check-circle me-1"></i> Submit
                                    </span>
                                    <span class="indicator-progress">
                                        Please wait... <span class="align-middle spinner-border spinner-border-sm ms-2"></span>
                                    </span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endif

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
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.min.js"></script>

<script type="text/javascript">
    $(document).ready(function (e) {
        $('#prof_image_create').change(function(){
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#preview-image-before-upload_create').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
    });

    function printEmpTable(){
        $('.actions-btns').hide();
        // Get the HTML element that you want to convert to PDF
        const element = document.getElementById('emp_table_print_view');
        // Create a new jsPDF instance
        const doc = new jsPDF('landscape');
        // Use the html2canvas library to render the element as a canvas
        html2canvas(element).then(canvas => {
            // Convert the canvas to an image data URL
            const imgData = canvas.toDataURL('image/png');
            // Add the image data URL to the PDF document
            doc.addImage(
                imgData,
                'PNG',
                2, // x-coordinate
                2, // y-coordinate
            );

            // Save the PDF document
            doc.save('Employees.pdf');
            $('.actions-btns').show();
        });
    }
</script>
