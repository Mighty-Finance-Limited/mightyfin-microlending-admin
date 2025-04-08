
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <a href="{{ route('item-settings', ['confg' => 'loan','settings' => 'loan-types']) }}" class="flex py-4 px-9">
        <span>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-90deg-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1.146 4.854a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H12.5A2.5 2.5 0 0 1 15 6.5v8a.5.5 0 0 1-1 0v-8A1.5 1.5 0 0 0 12.5 5H2.707l3.147 3.146a.5.5 0 1 1-.708.708z"/>
            </svg>
        </span>
        <span>
            Return Back to Loan Product List
        </span>
    </a>
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <form action="{{ route('update_loan_product') }}" method="POST" id="kt_content_container" class="container-xxl">
            @csrf
            <input type="hidden" name="loan_product_id" value="{{ $loan_product->id }}">
            <div class="border-0 cursor-pointer card-header">
                <div class="mt-2 alert alert-primary">
                    <small>
                        Please note that some of the fields below are optional. You can leave the fields empty if you do not want to place any restriction.
                    </small>
                </div>
            </div>

            <div class="mb-5 card mb-xl-10">
                <!--begin::Card header-->
                <div class="border-0 cursor-pointer card-header" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                    <!--begin::Card title-->
                    <div class="m-0 card-title">
                        <h3 class="m-0 fw-bold text-info">Loan Description:</h3>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--begin::Card header-->
                <!--begin::Content-->
                <div id="kt_account_settings_profile_details" class="collapse show">
                    <div id="kt_account_profile_details_form" class="form">
                        <!--begin::Card body-->
                        <div class="card-body border-top p-9">
                            <div class="mb-6 row">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Loan Name</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <input type="text" name="new_loan_name" value="{{ $loan_product->name}}" class="form-control form-control-lg form-control-solid" placeholder="E.g Business Loan" required/>
                                </div>
                                <!--end::Col-->
                            </div>
                            <div class="mb-6 row">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Loan Description</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <textarea type="text" name="new_loan_desc" class="form-control form-control-lg form-control-solid" required>{{ $loan_product->description}}</textarea>
                                </div>
                                <!--end::Col-->
                            </div>
                            <div class="mb-6 row">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Loan Icon (SVG)</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <textarea type="text" name="new_loan_icon" class="form-control form-control-lg form-control-solid" placeholder="SVG code" required>{{ $loan_product->icon}}</textarea>
                                </div>
                                <!--end::Col-->
                            </div>
                            <div class="mb-6 row">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Loan Icon Alternative (SVG)</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <textarea type="text" name="new_loan_icon_alt" value="{{ $loan_product->new_loan_icon_alt}}" class="form-control form-control-lg form-control-solid" placeholder="SVG code" required>{{ $loan_product->icon_alt}}</textarea>
                                </div>
                                <!--end::Col-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-5 card mb-xl-10">
                <!--begin::Card header-->
                <div class="border-0 cursor-pointer card-header" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                    <!--begin::Card title-->
                    <div class="m-0 card-title">
                        <h3 class="m-0 fw-bold text-info">Loan Release:</h3>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--begin::Card header-->
                <!--begin::Content-->
                <div id="kt_account_settings_profile_details" class="collapse show">
                    <div class="card-body border-top p-9">
                        <div class="mb-6 row">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label required fw-bold fs-6">Set Loan Release Date to Today's date</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <!--begin::Options-->
                                <div class="mt-3 d-flex align-items-center">
                                    <!--begin::Option-->
                                    <label for="no" class="form-check form-check-custom form-check-inline form-check-solid me-5">
                                        <input class="form-check-input" id="no" name="loan_release_date" type="radio" value="0"
                                        @if($loan_product->release_date == 0) checked @endif />
                                        <span class="fw-semibold ps-2 fs-6">No</span>
                                    </label>
                                    <!--end::Option-->
                                    <!--begin::Option-->
                                    <label for="yes" class="form-check form-check-custom form-check-inline form-check-solid">
                                        <input class="form-check-input" id="yes" name="loan_release_date" type="radio" value="1"
                                        @if($loan_product->release_date == 1) checked @endif />
                                        <span class="fw-semibold ps-2 fs-6">Yes</span>
                                    </label>
                                    <!--end::Option-->
                                </div>
                                <div class="p-2 py-3">
                                    <p>If you select Yes, the Loan Release Date on the Add Loan page will be <br>auto-filled with today's date</p>
                                </div>
                                <!--end::Options-->
                            </div>
                            <!--end::Col-->
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-5 card mb-xl-10">
                <!--begin::Card header-->
                <div class="border-0 cursor-pointer card-header" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                    <!--begin::Card title-->
                    <div class="m-0 card-title">
                        <h3 class="m-0 fw-bold text-info">Principal Amount:</h3>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--begin::Card header-->
                <!--begin::Content-->
                <div id="kt_account_settings_profile_details" class="collapse show">
                    <!--begin::Form-->
                    <div id="kt_account_profile_details_form" class="form">
                        <!--begin::Card body-->
                        <div class="card-body border-top p-9">

                            <div class="mb-6 row">
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Disbursed By</label>
                                <div class="col-lg-8 fv-row">
                                    <div class="mt-3 d-block">
                                        @forelse ($disbursements as $option)
                                            <label for="{{ $option->tag }}" class="mt-2 form-check form-check-custom form-check-inline form-check-solid me-5">
                                                <input id="{{ $option->tag }}"
                                                    class="form-check-input"
                                                    name="loan_disbursed_by[]"
                                                    type="checkbox"
                                                    value="{{ $option->id }}"
                                                    {{
                                                        in_array($option->id, $loan_product->disbursed_by->pluck('disbursed_by_id')->toArray()) ? 'checked' : ''
                                                    }} />
                                                <span class="fw-semibold ps-2 fs-6">{{ $option->name }}</span>
                                            </label>
                                            <br>
                                        @empty
                                            <p>No Sources</p>
                                        @endforelse

                                    </div>
                                </div>
                            </div>
                            <div class="mb-6 row">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Minimum Principal Amount</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <input type="number"  value="{{ $loan_product->min_principal_amount }}" name="minimum_loan_principal_amount" id="minimum_loan_principal_amount" class="form-control form-control-lg form-control-solid" placeholder="0.00" />
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="mb-6 row">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">
                                    <span class="required">Default Principal Amount</span>
                                    <span class="ms-1" data-bs-toggle="tooltip" title="Defualt amount the can be borrowed">
                                        <i class="text-gray-500 ki-duotone ki-information-5 fs-6">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </span>
                                </label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <input type="number"  value="{{ $loan_product->def_principal_amount }}" name="default_loan_principal_amount" class="form-control form-control-lg form-control-solid" placeholder="0.00" />
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="mb-6 row">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Maximum Principal Amount</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <input type="text"  value="{{ $loan_product->max_principal_amount }}" name="maximum_principal_amount" class="form-control form-control-lg form-control-solid" placeholder="0.00" />
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            {{-- <div class="mb-0 row">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-semibold fs-6">Allow Marketing</label>
                                <!--begin::Label-->
                                <!--begin::Label-->
                                <div class="col-lg-8 d-flex align-items-center">
                                    <div class="form-check form-check-solid form-switch form-check-custom fv-row">
                                        <input class="form-check-input w-45px h-30px" type="checkbox" id="allowmarketing" checked="checked" />
                                        <label class="form-check-label" for="allowmarketing"></label>
                                    </div>
                                </div>
                                <!--begin::Label-->
                            </div> --}}
                            <!--end::Input group-->
                        </div>

                    </div>
                    <!--end::Form-->
                </div>
                <!--end::Content-->
            </div>


            <div class="mb-5 card mb-xl-10">
                <!--begin::Card header-->
                <div class="border-0 cursor-pointer card-header" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                    <!--begin::Card title-->
                    <div class="m-0 card-title">
                        <h3 class="m-0 fw-bold text-info">Interest:</h3>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--begin::Card header-->
                <!--begin::Content-->
                <div id="kt_account_settings_profile_details" class="collapse show">
                    <!--begin::Form-->
                    <div id="kt_account_profile_details_form" class="form">
                        <!--begin::Card body-->
                        <div class="card-body border-top p-9">

                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="mb-6 row">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Interest Method</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                {{-- @dd($loan_interest_method) --}}
                                <div class="col-lg-8 fv-row">
                                    <select type="text" name="loan_interest_method[]" class="form-control form-control-lg form-control-solid" placeholder="Company name" value="Keenthemes">
                                        <option value=""></option>
                                        @forelse ($interest_methods as $option)
                                            <option value="{{ $option->id }}" {{ $loan_product->interest_methods->first()->interest_method_id == $option->id ? 'selected' : '' }}>
                                                {{ $option->name }}
                                            </option>
                                        @empty
                                            <option disabled>No Methods</option>
                                        @endforelse
                                    </select>

                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="mb-6 row">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">
                                    <span class="required">Interest Type</span>
                                    <span class="ms-1" data-bs-toggle="tooltip" title="Phone number must be active">
                                        <i class="text-gray-500 ki-duotone ki-information-5 fs-6">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </span>
                                </label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <div class="mt-3 d-block align-items-center">
                                        @forelse ($interest_types as $option)
                                            <label for="{{ $option->name }}" class="mt-2 form-check form-check-custom form-check-inline form-check-solid me-5">
                                                <input id="{{ $option->name }}" class="form-check-input" name="loan_interest_type" type="radio" value="{{ $option->id }}"
                                                    {{ $loan_product->interest_types->first()->interest_type_id == $option->id ? 'checked' : '' }} />
                                                <span class="fw-semibold ps-2 fs-6"> {{ $option->description }} </span>
                                            </label>
                                        @empty
                                            <p>No Interest Types Available</p>
                                        @endforelse
                                    </div>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="mb-6 row">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Loan Interest Period</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <select type="text" name="loan_interest_period" class="my-2 form-control">
                                        <option {{ $loan_product->loan_interest_period == 'per-day' ? 'selected' : ''  }} value="per-day">Per Day</option>
                                        <option {{ $loan_product->loan_interest_period == 'per-week' ? 'selected' : ''  }} value="per-week">Per Week</option>
                                        <option {{ $loan_product->loan_interest_period == 'per-month' ? 'selected' : ''  }} value="per-month">Per Month</option>
                                        <option {{ $loan_product->loan_interest_period == 'per-year' ? 'selected' : ''  }} value="per-year">Per Year</option>
                                        <option {{ $loan_product->loan_interest_period == 'per-loan' ? 'selected' : ''  }} value="per-loan">Per Loan</option>
                                    </select>
                                </div>
                                <!--end::Col-->
                            </div>
                            <div class="mb-6 row">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Minimum Loan Interest</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <input type="number" value="{{ $loan_product->min_loan_interest }}" name="minimum_loan_interest" class="form-control form-control-lg form-control-solid" placeholder="0.00" />
                                </div>
                                <!--end::Col-->
                            </div>
                            <div class="mb-6 row">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Default Loan Interest</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <input type="number" value="{{ $loan_product->def_loan_interest }}" name="default_loan_interest" class="form-control form-control-lg form-control-solid" placeholder="0.00" />
                                </div>
                                <!--end::Col-->
                            </div>
                            <div class="mb-6 row">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Maximum Loan Interest</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <input type="text" value="{{ $loan_product->max_loan_interest }}" name="maximum_loan_interest" class="form-control form-control-lg form-control-solid" placeholder="0.00" />
                                </div>
                                <!--end::Col-->
                            </div>

                        </div>
                    </div>
                    <!--end::Form-->
                </div>
                <!--end::Content-->
            </div>

            <div class="mb-5 card mb-xl-10">
                <!--begin::Card header-->
                <div class="border-0 cursor-pointer card-header" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                    <!--begin::Card title-->
                    <div class="m-0 card-title">
                        <h3 class="m-0 fw-bold text-info">Duration:</h3>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--begin::Card header-->
                <!--begin::Content-->
                <div id="kt_account_settings_profile_details" class="collapse show">
                    <!--begin::Form-->
                    <div id="kt_account_profile_details_form" class="form">
                        <!--begin::Card body-->
                        <div class="card-body border-top p-9">
                            <div class="mb-6 row">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Loan Duration Period</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <select type="text" name="loan_duration_period" class="my-2 form-control " placeholder="Company name" value="Keenthemes">
                                        <option {{ $loan_product->loan_duration_period == 'day' ? 'selected' : ''  }} value="day">Days</option>
                                        <option {{ $loan_product->loan_duration_period == 'week' ? 'selected' : ''  }}  value="week">Weeks</option>
                                        <option {{ $loan_product->loan_duration_period == 'month' ? 'selected' : ''  }}  value="month">Month</option>
                                        <option {{ $loan_product->loan_duration_period == 'year' ? 'selected' : ''  }}  value="year">Years</option>
                                    </select>
                                </div>
                                <!--end::Col-->
                            </div>
                            <div class="mb-6 row">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Minimum Loan Duration</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <select type="text" name="minimum_loan_duration" class="my-2 form-control ">
                                        <option {{ $loan_product->min_loan_duration == 1 ? 'selected' : '' }} value="1">1</option>
                                        <option {{ $loan_product->min_loan_duration == 2 ? 'selected' : '' }} value="2">2</option>
                                        <option {{ $loan_product->min_loan_duration == 3 ? 'selected' : '' }} value="3">3</option>
                                        <option {{ $loan_product->min_loan_duration == 4 ? 'selected' : '' }} value="4">4</option>
                                        <option {{ $loan_product->min_loan_duration == 5 ? 'selected' : '' }} value="5">5</option>
                                        <option {{ $loan_product->min_loan_duration == 6 ? 'selected' : '' }} value="6">6</option>
                                        <option {{ $loan_product->min_loan_duration == 7 ? 'selected' : '' }} value="7">7</option>
                                        <option {{ $loan_product->min_loan_duration == 8 ? 'selected' : '' }} value="8">8</option>
                                        <option {{ $loan_product->min_loan_duration == 9 ? 'selected' : '' }} value="9">9</option>
                                        <option {{ $loan_product->min_loan_duration == 10 ? 'selected' : '' }} value="10">10</option>
                                        <option {{ $loan_product->min_loan_duration == 11 ? 'selected' : '' }} value="11">11</option>
                                        <option {{ $loan_product->min_loan_duration == 12 ? 'selected' : '' }} value="12">12</option>
                                    </select>
                                </div>
                                <!--end::Col-->
                            </div>
                            <div class="mb-6 row">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Defualt Loan Duration</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <select type="text" name="default_loan_duration" class="my-2 form-control " placeholder="0.00">
                                        <option {{ $loan_product->def_loan_duration == 1 ? 'selected' : '' }} value="1">1</option>
                                        <option {{ $loan_product->def_loan_duration == 2 ? 'selected' : '' }} value="2">2</option>
                                        <option {{ $loan_product->def_loan_duration == 3 ? 'selected' : '' }} value="3">3</option>
                                        <option {{ $loan_product->def_loan_duration == 4 ? 'selected' : '' }} value="4">4</option>
                                        <option {{ $loan_product->def_loan_duration == 5 ? 'selected' : '' }} value="5">5</option>
                                        <option {{ $loan_product->def_loan_duration == 6 ? 'selected' : '' }} value="6">6</option>
                                        <option {{ $loan_product->def_loan_duration == 7 ? 'selected' : '' }} value="7">7</option>
                                        <option {{ $loan_product->def_loan_duration == 8 ? 'selected' : '' }} value="8">8</option>
                                        <option {{ $loan_product->def_loan_duration == 9 ? 'selected' : '' }} value="9">9</option>
                                        <option {{ $loan_product->def_loan_duration == 10 ? 'selected' : '' }} value="10">10</option>
                                        <option {{ $loan_product->def_loan_duration == 11 ? 'selected' : '' }} value="11">11</option>
                                        <option {{ $loan_product->def_loan_duration == 12 ? 'selected' : '' }} value="12">12</option>
                                    </select>
                                </div>
                                <!--end::Col-->
                            </div>
                            <div class="mb-6 row">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Maximum Loan Duration</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <select type="text" name="maximum_loan_duration" class="my-2 form-control " placeholder="0.00">
                                        <option {{ $loan_product->max_loan_duration == 1 ? 'selected' : '' }} value="1">1</option>
                                        <option {{ $loan_product->max_loan_duration == 2 ? 'selected' : '' }} value="2">2</option>
                                        <option {{ $loan_product->max_loan_duration == 3 ? 'selected' : '' }} value="3">3</option>
                                        <option {{ $loan_product->max_loan_duration == 4 ? 'selected' : '' }} value="4">4</option>
                                        <option {{ $loan_product->max_loan_duration == 5 ? 'selected' : '' }} value="5">5</option>
                                        <option {{ $loan_product->max_loan_duration == 6 ? 'selected' : '' }} value="6">6</option>
                                        <option {{ $loan_product->max_loan_duration == 7 ? 'selected' : '' }} value="7">7</option>
                                        <option {{ $loan_product->max_loan_duration == 8 ? 'selected' : '' }} value="8">8</option>
                                        <option {{ $loan_product->max_loan_duration == 9 ? 'selected' : '' }} value="9">9</option>
                                        <option {{ $loan_product->max_loan_duration == 10 ? 'selected' : '' }} value="10">10</option>
                                        <option {{ $loan_product->max_loan_duration == 11 ? 'selected' : '' }} value="11">11</option>
                                        <option {{ $loan_product->max_loan_duration == 12 ? 'selected' : '' }} value="12">12</option>
                                    </select>
                                </div>
                                <!--end::Col-->
                            </div>

                        </div>
                    </div>
                    <!--end::Form-->
                </div>
                <!--end::Content-->
            </div>


            <div class="mb-5 card mb-xl-10">
                <!--begin::Card header-->
                <div class="py-3 border-0 cursor-pointer card-header" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                    <!--begin::Card title-->
                    <div class="m-0 card-title">
                        <h3 class="m-0 fw-bold text-info">Repayments:</h3>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--begin::Card header-->
                <!--begin::Content-->
                <div id="kt_account_settings_profile_details" class="collapse show">
                    <!--begin::Form-->
                    <div id="kt_account_profile_details_form" class="form">
                        <!--begin::Card body-->
                        <div class="card-body border-top p-9">
                            <div class="mb-6 row">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Repayment Cycle</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <div class="mt-3 align-items-start" style="display: block">
                                        @forelse ($repayment_cycles as $option)
                                            <label for="{{ $option->name }}" class="mt-2 form-check form-check-custom form-check-inline form-check-solid me-5">
                                                <input id="{{ $option->name }}" class="form-check-input" name="loan_repayment_cycle[]" type="checkbox" value="{{ $option->id }}" {{ in_array($option->id, $loan_product->repayment_cycle->pluck('repayment_cycle_id')->toArray()) ? 'checked' : '' }} />
                                                <span class="fw-semibold ps-2 fs-6"> {{ $option->name }} </span>
                                            </label>
                                            <br>
                                        @empty
                                            <p>No Repayment Cycles Available</p>
                                        @endforelse
                                    </div>
                                </div>
                                <!--end::Col-->
                            </div>
                            <div class="mb-6 row">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Minimum Number of Repayments</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <input type="number" value="{{ $loan_product->min_num_of_repayments }}" name="minimum_num_of_repayments" class="form-control form-control-lg form-control-solid" placeholder="1" />
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="mb-6 row">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">
                                    <span class="required">Default Number of Repayments</span>
                                    <span class="ms-1" data-bs-toggle="tooltip" title="Defualt amount the can be borrowed">
                                        <i class="text-gray-500 ki-duotone ki-information-5 fs-6">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                    </span>
                                </label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <input value="{{ $loan_product->def_num_of_repayments }}" type="number" name="default_num_of_repayments" class="form-control form-control-lg form-control-solid" placeholder="1" />
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="mb-6 row">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Maximum Number of Repayments</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <input type="number" value="{{ $loan_product->max_num_of_repayments }}" name="maximum_num_of_repayments" class="form-control form-control-lg form-control-solid" placeholder="1" />
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                        </div>

                    </div>
                    <!--end::Form-->
                </div>
                <!--end::Content-->
            </div>
            <div class="mb-5 card mb-xl-10">
                <!--begin::Card header-->
                <div class="py-3 border-0 cursor-pointer card-header" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                    <!--begin::Card title-->
                    <div class="m-0 card-title">
                        <h3 class="m-0 fw-bold text-info">Loan Due and Loan Schedule Amount:</h3>
                    </div>
                    <div class="mt-2 alert alert-primary">
                        <small>
                            If loan Due amount and/or Schedule amounts are in decimals for example K100.3333, the system will convert it based on the below option.
                        </small>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--begin::Card header-->
                <!--begin::Content-->
                <div id="kt_account_settings_profile_details" class="collapse show">
                    <!--begin::Form-->
                    <div id="kt_account_profile_details_form" class="form">
                        <!--begin::Card body-->
                        <div class="card-body border-top p-9">
                            <div class="mb-6 row">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Decimal Places</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <select type="text" name="loan_decimal_place" class="my-2 form-control ">
                                        <option {{ $loan_product->loan_decimal_place == 'off-to-2' ? 'selected' : '' }} value="off-to-2">Round Off to 2 Decimal Places</option>
                                        <option {{ $loan_product->loan_decimal_place == 'off-to-int' ? 'selected' : '' }} value="off-to-int">Round Off to Integer</option>
                                        <option {{ $loan_product->loan_decimal_place == 'down-to-integer' ? 'selected' : '' }} value="down-to-integer">Round Down to Integer</option>
                                        <option {{ $loan_product->loan_decimal_place == 'off-to-1' ? 'selected' : '' }} value="off-to-1">Round Off to 1 Decimal Place</option>
                                        <option {{ $loan_product->loan_decimal_place == 'up-to-1' ? 'selected' : '' }} value="up-to-1">Round Up to 1 Decimal Place</option>
                                        <option {{ $loan_product->loan_decimal_place == 'off-to-nearest-5' ? 'selected' : '' }} value="off-to-nearest-5">Round Off to Nearest 5</option>
                                        <option {{ $loan_product->loan_decimal_place == 'up-to-nearest-10' ? 'selected' : '' }} value="up-to-nearest-10">Round Up to Nearest 10</option>
                                        <option {{ $loan_product->loan_decimal_place == 'off-to-nearest-100' ? 'selected' : '' }} value="off-to-nearest-100">Round Off to Nearest 100</option>
                                    </select>
                                </div>
                                <!--end::Col-->
                            </div>
                        </div>
                    </div>
                    <!--end::Form-->
                </div>
                <!--end::Content-->
            </div>

            <div class="mb-5 card mb-xl-10">
                <!--begin::Card header-->
                <div class="py-3 border-0 cursor-pointer card-header" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                    <!--begin::Card title-->
                    <div class="m-0 card-title">
                        <h3 class="m-0 fw-bold text-info">Application Wizard Steps:</h3>
                    </div>
                    <br>
                    <div class="w-full mt-2 alert alert-primary">
                        <small>
                            The website loan application wizard is designed to present a specific count of steps, indicating the progression and stages involved in the application process for a loan. Select the number of steps to display on the website loan application wizard.
                        </small>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--begin::Card header-->
                <!--begin::Content-->
                <div id="kt_account_settings_profile_details" class="collapse show">
                    <!--begin::Form-->
                    <div id="kt_account_profile_details_form" class="form">
                        <!--begin::Card body-->
                        <div class="card-body border-top p-9">
                            <div class="mb-6 row">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Number of Steps</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">

                                    <select value="{{ $loan_product->wiz_steps }}" name="num_of_steps" class="form-select form-control form-control-lg form-control-solid" id="loan_product_wiz_steps">
                                    </select>
                                </div>
                                <!--end::Col-->
                            </div>
                        </div>
                    </div>
                    <!--end::Form-->
                </div>
                <!--end::Content-->
            </div>
            {{-- <div class="mb-5 card mb-xl-10">
                <!--begin::Card header-->
                <div class="py-3 border-0 cursor-pointer card-header" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                    <!--begin::Card title-->
                    <div class="m-0 card-title">
                        <h3 class="m-0 fw-bold text-info">Repayment Order:</h3>
                    </div>
                    <div class="mt-2 alert alert-primary">
                        <small>
                            If loan Due amount and/or Schedule amounts are in decimals for example K100.3333, the system will convert it based on the below option.
                        </small>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--begin::Card header-->
                <!--begin::Content-->
                <div id="kt_account_settings_profile_details" class="collapse show">
                    <!--begin::Form-->
                    <div id="kt_account_profile_details_form" class="form">
                        <!--begin::Card body-->
                        <div class="card-body border-top p-9">
                            <div class="mb-6 row">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Repayment Order</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">

                                </div>
                                <!--end::Col-->
                            </div>
                        </div>
                    </div>
                    <!--end::Form-->
                </div>
                <!--end::Content-->
            </div> --}}
            <div class="mb-5 card mb-xl-10">
                <!--begin::Card header-->
                <div class="border-0 cursor-pointer card-header" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                    <!--begin::Card title-->
                    <div class="m-0 card-title">
                        <h3 class="m-0 fw-bold text-info">Institutions:</h3>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--begin::Card header-->
                <!--begin::Content-->
                <div id="kt_account_settings_profile_details" class="collapse show">
                    <!--begin::Form-->
                    <div id="kt_account_profile_details_form" class="form">
                        <!--begin::Card body-->
                        <div class="card-body border-top p-9">
                            {{-- <div class="mb-6 row">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Sector</label>
                                <div class="col-lg-8 fv-row">
                                    <select type="text" wire:model="sector" class="form-select form-control form-control-lg form-control-solid">
                                        <option value="">--select--</option>
                                        <option value="public">Public</option>
                                        <option value="private">Private</option>
                                        <option value="ngo">NGO</option>
                                    </select>
                                </div>
                            </div> --}}
                            <div class="mb-6 row">
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Institutions</label>
                                <div class="col-lg-8 fv-row">
                                    <div class="mt-3 d-block">
                                        <select id="loan_institution" class="my-2 form-select form-control" multiple name="loan_institution[]">
                                            @foreach ($institutions as $option)
                                                <option value="{{ $option->id }}"
                                                        {{ in_array($option->id, $loan_product->loan_institutes->pluck('institution_id')->toArray()) ? 'selected' : '' }}>
                                                    {{ $option->name }}
                                                </option>
                                            @endforeach
                                        </select>

                                        <script>
                                            $(document).ready(function() {
                                                $('#loan_institution').select2({
                                                    placeholder: 'Select institutions',
                                                    allowClear: true // Optional, enables the clear button
                                                });

                                                // Trigger Livewire name binding when a selection is made or removed
                                                $('#loan_institution').on('change', function (e) {
                                                    @this.set('loan_institution', $(this).val());
                                                });
                                            });
                                        </script>

                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <!--end::Form-->
                </div>
                <!--end::Content-->
            </div>

            <div class="mb-5 card mb-xl-10">
                <!--begin::Card header-->
                <div class="border-0 cursor-pointer card-header" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                    <!--begin::Card title-->
                    <div class="m-0 card-title">
                        <h3 class="m-0 fw-bold text-info">Loan CRB:</h3>
                    </div>
                    <div class="mt-2 alert alert-primary">
                        <small>
                            Please ensure to make a selection for the Credit Bureau (CRB) product to be linked with this specific loan product. This decision plays a critical role in shaping the credit assessment and reporting processes aligned with the loan.
                        </small>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--begin::Card header-->
                <!--begin::Content-->
                <div id="kt_account_settings_profile_details" class="collapse show">
                    <!--begin::Form-->
                    <div id="kt_account_profile_details_form" class="form">
                        <!--begin::Card body-->
                        <div class="card-body border-top p-9">
                            {{-- <div class="mb-6 row">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Sector</label>
                                <div class="col-lg-8 fv-row">
                                    <select type="text" wire:model="sector" class="form-select form-control form-control-lg form-control-solid">
                                        <option value="">--select--</option>
                                        <option value="public">Public</option>
                                        <option value="private">Private</option>
                                        <option value="ngo">NGO</option>
                                    </select>
                                </div>
                            </div> --}}
                            <div class="mb-6 row">
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">CRB Products</label>
                                <div class="col-lg-8 fv-row">
                                    <div class="mt-3 d-block">
                                        @forelse ($crb_products as $k => $crbp)
                                        <label for="{{ $k.''.$crbp->name }}" class="mt-2 form-check form-check-custom form-check-inline form-check-solid me-5">
                                            <input id="{{ $k.''.$crbp->name }}" class="form-check-input" name="crb_selected_products[]" type="checkbox" value="{{ $crbp->id }}" />
                                            <span class="fw-semibold ps-2 fs-6">{{ $crbp->name }} </span>
                                        </label>
                                        <br>
                                        @empty
                                            <p>No CRB Products</p>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-5 card mb-xl-10">
                <!--begin::Card header-->
                <div class="py-3 border-0 cursor-pointer card-header" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                    <!--begin::Card title-->
                    <div class="m-0 card-title">
                        <h3 class="m-0 fw-bold text-info">Automated Payments:</h3>
                    </div>
                    <div class="mt-2 alert alert-primary">
                        <small>
                            If you select YES below, the system will automatically add due payments on the schedule dates for loans added in this
                            loan product. This is useful if you expect to receive payments on time for the loans. For example, you may have direct deposit or payroll
                            system which automatically deducts payments form the borrower on the scheduled dates. This will save
                            you time from having to manually add payments on MightyFin on the scheduled dates.
                        </small>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--begin::Card header-->
                <!--begin::Content-->
                <div id="kt_account_settings_profile_details" class="collapse show">
                <!--begin::Form-->
                    <div id="kt_account_profile_details_form" class="form">
                    <!--begin::Card body-->
                        <div class="card-body border-top p-9">
                            <!--begin::Col-->
                            <div class="mb-6 row">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Add Automatic Payments</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <!--begin::Options-->
                                    <div class="mt-3 d-flex align-items-center">
                                        <label for="no" class="form-check form-check-custom form-check-inline form-check-solid me-5">
                                            <input class="form-check-input" id="no" value="0" name="add_automatic_payments" type="radio"
                                                {{ (int)$loan_product->auto_payment === 0 ? 'checked' : '' }} />
                                            <span class="fw-semibold ps-2 fs-6">No</span>
                                        </label>
                                        <label for="yes" class="form-check form-check-custom form-check-inline form-check-solid">
                                            <input class="form-check-input" id="yes" value="1" name="add_automatic_payments" type="radio"
                                                {{ (int)$loan_product->auto_payment === 1 ? 'checked' : '' }} />
                                            <span class="fw-semibold ps-2 fs-6">Yes</span>
                                        </label>
                                    </div>
                                    <div class="p-2 py-3">
                                        <p>
                                            If you select Yes, the system will automatically add the due payments on every repayment cycle based on the scheduled dates.
                                        </p>
                                    </div>
                                    <!--end::Options-->
                                </div>
                                <div class="mb-6 row">
                                    <label class="col-lg-4 col-form-label required fw-bold fs-6">Cash/Bank</label>
                                    <div class="col-lg-8 fv-row">
                                        <div class="mt-3 d-block">
                                            @forelse ($company_accounts as $option)
                                                <label for="{{ $option->id . $option->type }}" class="mt-2 form-check form-check-custom form-check-inline form-check-solid me-5">
                                                    <input id="{{ $option->id . $option->type }}" class="form-check-input" name="auto_payment_sources[]" type="checkbox" value="{{ $option->id }}"
                                                        {{ in_array($option->id, $loan_product->loan_accounts->pluck('account_payment_id')->toArray()) ? 'checked' : '' }} />
                                                    <span class="fw-semibold ps-2 fs-6">{{ $option->description }}</span>
                                                </label>
                                                <br>
                                            @empty
                                                <p>No company accounts available</p>
                                            @endforelse

                                        </div>
                                        <div class="p-2 py-3">
                                            <a href="#">Add or Edit Bank Accounts</a>
                                            <p>
                                                Select the bank account where the money will be received. This will allow the system to make
                                                the proper journal entry
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Col-->
                        </div>
                    </div>
                </div>
                <!--end::Content-->
            </div>

            <!--begin::Deactivate Account-->
            <div id="kt_account_settings_deactivate" class="collapse show">
                <div class="py-6 card-footer d-flex justify-content-end px-9">
                    <button id="kt_account_deactivate_account_submit" type="submit" class="btn btn-primary fw-semibold">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-floppy2" viewBox="0 0 16 16">
                                <path d="M1.5 0h11.586a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13A1.5 1.5 0 0 1 1.5 0M1 1.5v13a.5.5 0 0 0 .5.5H2v-4.5A1.5 1.5 0 0 1 3.5 9h9a1.5 1.5 0 0 1 1.5 1.5V15h.5a.5.5 0 0 0 .5-.5V2.914a.5.5 0 0 0-.146-.353l-1.415-1.415A.5.5 0 0 0 13.086 1H13v3.5A1.5 1.5 0 0 1 11.5 6h-7A1.5 1.5 0 0 1 3 4.5V1H1.5a.5.5 0 0 0-.5.5m9.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5z"/>
                            </svg>
                        </span>
                        Save
                    </button>
                </div>
            </div>
            <!--end::Deactivate Account-->
        </form>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>
<script>
    // Get the input and select elements
    const minAmountInput = document.getElementById('minimum_loan_principal_amount');
    const selectElement = document.getElementById('loan_product_wiz_steps');

    // Event listener to update select options when input changes
    minAmountInput.addEventListener('input', updateSelectOptions);

    // Initial update based on the current value
    updateSelectOptions();

    function updateSelectOptions() {
        // Get the minimum loan principal amount from the input
        const minAmount = parseFloat(minAmountInput.value);

        // Clear existing options
        selectElement.innerHTML = '';
        // Add options based on the minimum loan principal amount
        if (minAmount >= 1500) {
            addOption(10);
            addOption(50);
            addOption(100);
            addOption(500);
        } else {
            addOption(10);
            addOption(50);
            addOption(100);
            addOption(500);
            addOption(1000);
        }

        // Trigger the Livewire update if needed
        selectElement.dispatchEvent(new Event('change'));
    }

    function addOption(value) {
        const option = document.createElement('option');
        option.value = value;
        option.text = value;
        selectElement.add(option);
    }
</script>
