<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl">
            @include('livewire.dashboard.__parts.current-admin-stats')
            <div class="row g-5 g-xl-8">
                <div class="col-xl-4">
                    <div class="card card-xl-stretch mb-xl-8">
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold text-dark">Projects Overview</span>
                                <span class="text-muted mt-1 fw-semibold fs-7">Pending 0 tasks</span>
                            </h3>
                            <div class="card-toolbar">
                                <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true" id="kt_menu_64b784c40707d">

                                    <div class="px-7 py-5">
                                        <div class="fs-5 text-dark fw-bold">Filter Options</div>
                                    </div>
                                    <div class="separator border-gray-200"></div>
                                    <div class="px-7 py-5">
                                        <div class="mb-10">
                                            <label class="form-label fw-semibold">Status:</label>
                                            <div>
                                                <select class="form-select form-select-solid" multiple="multiple" data-kt-select2="true" data-close-on-select="false" data-placeholder="Select option" data-dropdown-parent="#kt_menu_64b784c40707d" data-allow-clear="true">
                                                    <option></option>
                                                    <option value="1">Approved</option>
                                                    <option value="2">Pending</option>
                                                    <option value="2">In Process</option>
                                                    <option value="2">Rejected</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-10">
                                            <label class="form-label fw-semibold">Member Type:</label>
                                            <div class="d-flex">
                                                <label class="form-check form-check-sm form-check-custom form-check-solid me-5">
                                                    <input class="form-check-input" type="checkbox" value="1" />
                                                    <span class="form-check-label">Author</span>
                                                </label>
                                                <label class="form-check form-check-sm form-check-custom form-check-solid">
                                                    <input class="form-check-input" type="checkbox" value="2" checked="checked" />
                                                    <span class="form-check-label">Customer</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="mb-10">
                                            <label class="form-label fw-semibold">Notifications:</label>
                                            <div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox" value="" name="notifications" checked="checked" />
                                                <label class="form-check-label">Enabled</label>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <button type="reset" class="btn btn-sm btn-light btn-active-light-primary me-2" data-kt-menu-dismiss="true">Reset</button>
                                            <button type="submit" class="btn btn-sm btn-primary" data-kt-menu-dismiss="true">Apply</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-5">
                            <small>No Projects</small>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <div class="card card-xl-stretch mb-5 mb-xl-8">
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold fs-3 mb-1">Latest Loan Requests</span>
                                <span class="text-muted mt-1 fw-semibold fs-7">More than {{ $all_loan_requests->count() }} total loan requests</span>
                            </h3>
                            <div class="card-toolbar">
                            </div>
                        </div>

                        <div class="card-body py-3">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="kt_table_widget_5_tab_1">
                                    <div class="table-responsive">
                                        <table class="table table-row-dashed table-row-gray-200 align-middle gs-0 gy-4">
                                            <thead>
                                                <tr class="border-0">
                                                    <th class="p-0 w-50px"></th>
                                                    <th class="p-0 min-w-150px"></th>
                                                    <th class="p-0 min-w-140px"></th>
                                                    <th class="p-0 min-w-110px"></th>
                                                    <th class="p-0 min-w-50px"></th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @forelse($all_loan_requests as $loan)
                                                <tr>
                                                    <td>
                                                        <div class="symbol symbol-45px me-2">
                                                            <span class="symbol-label">
                                                                <img src="assets/media/svg/brand-logos/plurk.svg" class="h-50 align-self-center" alt="" />
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="text-dark fw-bold text-hover-primary mb-1 fs-6">
                                                            {{ $loan->fname.' '.$loan->lname }}
                                                        </a>
                                                        <span class="text-muted fw-semibold d-block">
                                                            <a href="tel:{{ $loan->user->phone }}">{{ $loan->user->phone }}</a> <br> {{ $loan->email }} </span>
                                                    </td>
                                                    <td class="text-end text-muted fw-bold"><small>Requested on</small><br>{{ $loan->created_at->toFormattedDateString() }}</td>
                                                    <td class="text-end">
                                                        <span class="badge badge-light-primary">K {{ number_format($loan->amount,2,'.','.') }}</span>

                                                    </td>
                                                    <td class="text-end">
                                                        <a href="{{ route('loan-details',['id' => $loan->id]) }}" class="btn btn-sm btn-icon btn-bg-primary btn-active-color-primary">
                                                            <i class="ki-duotone ki-arrow-right fs-2">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                            </i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                @empty
                                                <tr>
                                                    <div>
                                                        No Loans have been requested.
                                                    </div>
                                                </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                        <div class="col-xl-12 justify-center justify-content-center items-center p-4">
                                            <a class="btn btn-sm justify-center justify-content-center items-center"  href="{{ route('view-loan-requests') }}">View More</a>
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