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
        <form action="{{ route('update-loan-statuses') }}" method="POST" id="kt_content_container" class="container-xxl">
            <input type="hidden" name="loan_id" value="{{ $loan_product->id }}">
            @csrf
            <div class="card-header border-0 cursor-pointer">
                <div class="alert alert-primary mt-2">
                    <small>
                        Please note that some of the fields below are optional. You can leave the fields empty if you do not want to place any restriction.
                    </small>
                </div>
            </div>

            <div class="card mb-5 mb-xl-10">
                <!--begin::Card header-->
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                    <!--begin::Card title-->
                    <div class="card-title m-0">
                        <h3 class="fw-bold text-info m-0">Loan Description:</h3>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--begin::Card header-->
                <!--begin::Content-->
                <div id="kt_account_settings_profile_details" class="collapse show">
                    <div id="kt_account_profile_details_form" class="form">
                        <!--begin::Card body-->
                        <div class="card-body border-top p-9">
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Loan Name</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <input readonly type="text" wire:model.lazy="new_loan_name" value="{{ $loan_product->name}}" class="form-control form-control-lg form-control-solid" placeholder="E.g Business Loan" required/>
                                </div>
                                <!--end::Col-->
                            </div>
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Loan Description</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <textarea readonly type="text" wire:model.lazy="new_loan_desc" class="form-control form-control-lg form-control-solid" placeholder="E.g Civil Servant Loan" required></textarea>
                                </div>
                                <!--end::Col-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-5 mb-xl-10">
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                    <div class="card-title m-0 d-flex justify-content-between align-items-center">
                        <h3 class="fw-bold text-info m-0">Loan Processing Steps:</h3>
                    </div>  
                    <button type="button" class="btn btn-primary sm-btn" onclick="addSelect1Field()">+ Add Step</button>                     
                </div>
                
                <div id="kt_account_settings_profile_details" class="collapse show">
                    <div class="card-body border-top p-9">
                        <div class="row mb-6">
                            {{-- <label class="col-lg-4 col-form-label required fw-bold fs-6">Set Loan Release Date to Today's date</label> --}}
                            <div class="col-lg-12 fv-row">
                                <div class="col-lg-12 mb-4 mb-lg-0">
                                    @forelse ($current_statuses->where('stage', 'processing') as $item)
                                    <div class="dynamic-field-wrapper flex" style="display: flex;width: 50%;">
                                        <select name="current_processing_steps[]" class="form-select m-2 aos-init" data-aos="fade-right">
                                            <option value="{{ $item->status->id }}" selected>{{ $item->status->name }}</option>
                                        </select>
                                        <a href="{{ route('delete-loan-step', $item) }}" type="button" class="btn btn-danger sm-btn">Delete</a>
                                    </div>
                                    @empty
                                    @endforelse

                                    <div id="dynamicFieldsContainer1" style="width: 50%; display:block">
                                        {{-- Newly added select fields will be inserted here --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-5 mb-xl-10">
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                    <div class="card-title m-0">
                        <h3 class="fw-bold text-info m-0">Loan Open Steps:</h3>
                    </div>
                    <button type="button" class="btn btn-primary sm-btn" onclick="addSelect2Field()">+ Add Step</button>                     
                </div>
                
                <div id="kt_account_settings_profile_details" class="collapse show">
                    <div class="card-body border-top p-9">
                        <div class="row mb-6">
                            <div class="col-lg-12 fv-row">
                                <div class="col-lg-12 mb-4 mb-lg-0">
                                    @forelse ($current_statuses->where('stage', 'open') as $item)
                                    <div class="dynamic-field-wrapper flex" style="display: flex;width: 50%;">
                                        <select name="current_processing_steps[]" class="form-select m-2 aos-init" data-aos="fade-right">
                                            <option value="{{ $item->status->id }}" selected>{{ $item->status->name }}</option>
                                        </select>
                                        <a href="{{ route('delete-loan-step', $item) }}" type="button" class="btn btn-danger sm-btn">Delete</a>
                                    </div>
                                    @empty
                                    @endforelse
                                    <div id="dynamicFieldsContainer2" style="width: 50%; display:block">
                                        {{-- Newly added select fields will be inserted here --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-5 mb-xl-10">
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                    <div class="card-title m-0">
                        <h3 class="fw-bold text-info m-0">Loan Defualted Steps:</h3>
                    </div>
                    <button type="button" class="btn btn-primary sm-btn" onclick="addSelect3Field()">+ Add Step</button>                     
                </div>
                
                <div id="kt_account_settings_profile_details" class="collapse show">
                    <div class="card-body border-top p-9">
                        <div class="row mb-6">
                            <div class="col-lg-12 fv-row">
                                <div class="col-lg-12 mb-4 mb-lg-0">
                                    @forelse ($current_statuses->where('stage', 'defaulted') as $item)
                                    <div class="dynamic-field-wrapper flex" style="display: flex;width: 50%;">
                                        <select name="current_processing_steps[]" class="form-select m-2 aos-init" data-aos="fade-right">
                                            <option value="{{ $item->status->id }}" selected>{{ $item->status->name }}</option>
                                        </select>
                                        <a href="{{ route('delete-loan-step', $item) }}" type="button" class="btn btn-danger sm-btn">Delete</a>
                                    </div>
                                    @empty
                                    @endforelse
                                    <div id="dynamicFieldsContainer3" style="width: 50%; display:block">
                                        {{-- Newly added select fields will be inserted here --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-5 mb-xl-10">
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                    <div class="card-title m-0">
                        <h3 class="fw-bold text-info m-0">Loan Denied Steps:</h3>
                    </div>
                    <button type="button" class="btn btn-primary sm-btn" onclick="addSelect4Field()">+ Add Step</button>  
                </div>
                
                <div id="kt_account_settings_profile_details" class="collapse show">
                    <div class="card-body border-top p-9">
                        <div class="row mb-6">
                            <div class="col-lg-12 fv-row">
                                <div class="col-lg-12 mb-4 mb-lg-0">
                                    @forelse ($current_statuses->where('stage', 'denied') as $item)
                                    <div class="dynamic-field-wrapper flex" style="display: flex;width: 50%;">
                                        <select name="current_processing_steps[]" class="form-select m-2 aos-init" data-aos="fade-right">
                                            <option value="{{ $item->status->id }}" selected>{{ $item->status->name }}</option>
                                        </select>
                                        <a href="{{ route('delete-loan-step', $item) }}" type="button" class="btn btn-danger sm-btn">Delete</a>
                                    </div>
                                    @empty
                                    @endforelse
                                    <div id="dynamicFieldsContainer4" style="width: 50%; display:block">
                                        {{-- Newly added select fields will be inserted here --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-5 mb-xl-10">
                <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                    <div class="card-title m-0">
                        <h3 class="fw-bold text-info m-0">Loan Not Taken Up Steps:</h3>
                    </div>
                    <button type="button" class="btn btn-primary sm-btn" onclick="addSelect5Field()">+ Add Step</button>  
                </div>
                
                <div id="kt_account_settings_profile_details" class="collapse show">
                    <div class="card-body border-top p-9">
                        <div class="row mb-6">
                            <div class="col-lg-12 fv-row">
                                <div class="col-lg-12 mb-4 mb-lg-0">
                                    @forelse ($current_statuses->where('stage', 'Not Taken Up') as $item)
                                    <div class="dynamic-field-wrapper flex" style="display: flex;width: 50%;">
                                        <select name="current_processing_steps[]" class="form-select m-2 aos-init" data-aos="fade-right">
                                            <option value="{{ $item->status->id }}" selected>{{ $item->status->name }}</option>
                                        </select>
                                        <a href="{{ route('delete-loan-step', $item) }}" type="button" class="btn btn-danger sm-btn">Delete</a>
                                    </div>
                                    @empty
                                    @endforelse
                                    <div id="dynamicFieldsContainer5" style="width: 50%; display:block">
                                        {{-- Newly added select fields will be inserted here --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--begin::Deactivate Account-->
            <div id="kt_account_settings_deactivate" class="collapse show">
                <div class="card-footer d-flex justify-content-end py-6 px-9">
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
    function addSelect1Field() {
        // Fetch users from the Laravel controller
        $.ajax({
            url: "{{ url('api/get-loan-processing-statuses') }}", // Adjust the URL based on your Laravel route
            method: 'GET',
            success: function(status) {
                // Create a wrapper for each select input and its remove button
                var wrapper = document.createElement("div");
                wrapper.className = "dynamic-field-wrapper flex";

                // Create a new select element
                var select = document.createElement("select");
                select.name = 'processing[]';
                // Add options to the select element
                for (var i = 0; i < status.length; i++) {
                    var option = document.createElement("option");
                    option.value = status[i].id;
                    option.text = status[i].name;
                    select.add(option);
                }

                // Set attributes for the select element
                select.className = "form-select m-2"; // You can add your own classes here
                select.setAttribute("data-aos", "fade-right"); // AOS animation effect

                // Create a remove button
                var removeButton = document.createElement("button");
                removeButton.type = "button";
                removeButton.className = "btn btn-danger sm-btn";
                removeButton.textContent = "Delete";
                removeButton.onclick = function() {
                    // Remove the entire wrapper when the remove button is clicked
                    wrapper.parentNode.removeChild(wrapper);
                };

                // Set wrapper display to flex
                wrapper.style.display = "flex";

                // Append the select element and remove button to the wrapper
                wrapper.appendChild(select);
                wrapper.appendChild(removeButton);

                // Append the wrapper to the container
                document.getElementById("dynamicFieldsContainer1").appendChild(wrapper);

                // Trigger AOS refresh to apply the new animation
                AOS.refresh();
            },
            error: function(error) {
                console.error('Error fetching users:', error);
            }
        });
    }

    
    function addSelect2Field() {
     // Fetch users from the Laravel controller
        $.ajax({
            url: "{{ url('api/get-loan-open-statuses') }}", // Adjust the URL based on your Laravel route
            method: 'GET',
            success: function(status) {
                // Create a wrapper for each select input and its remove button
                var wrapper = document.createElement("div");
                wrapper.className = "dynamic-field-wrapper flex";

                // Create a new select element
                var select = document.createElement("select");
                select.name = 'open[]';
                // Add options to the select element
                for (var i = 0; i < status.length; i++) {
                    var option = document.createElement("option");
                    option.value = status[i].id;
                    option.text = status[i].name;
                    select.add(option);
                }

                // Set attributes for the select element
                select.className = "form-select m-2"; // You can add your own classes here
                select.setAttribute("data-aos", "fade-right"); // AOS animation effect

                // Create a remove button
                var removeButton = document.createElement("button");
                removeButton.type = "button";
                removeButton.className = "btn btn-danger sm-btn";
                removeButton.textContent = "Delete";
                removeButton.onclick = function() {
                    // Remove the entire wrapper when the remove button is clicked
                    wrapper.parentNode.removeChild(wrapper);
                };

                // Set wrapper display to flex
                wrapper.style.display = "flex";

                // Append the select element and remove button to the wrapper
                wrapper.appendChild(select);
                wrapper.appendChild(removeButton);

                // Append the wrapper to the container
                document.getElementById("dynamicFieldsContainer2").appendChild(wrapper);

                // Trigger AOS refresh to apply the new animation
                AOS.refresh();
            },
            error: function(error) {
                console.error('Error fetching users:', error);
            }
        });
    }

    
    function addSelect3Field() {
     // Fetch users from the Laravel controller
        $.ajax({
            url: "{{ url('api/get-loan-defaulted-statuses') }}", // Adjust the URL based on your Laravel route
            method: 'GET',
            success: function(status) {
                // Create a wrapper for each select input and its remove button
                var wrapper = document.createElement("div");
                wrapper.className = "dynamic-field-wrapper flex";

                // Create a new select element
                var select = document.createElement("select");
                select.name = 'defaulted[]';
                // Add options to the select element
                for (var i = 0; i < status.length; i++) {
                    var option = document.createElement("option");
                    option.value = status[i].id;
                    option.text = status[i].name;
                    select.add(option);
                }

                // Set attributes for the select element
                select.className = "form-select m-2"; // You can add your own classes here
                select.setAttribute("data-aos", "fade-right"); // AOS animation effect

                // Create a remove button
                var removeButton = document.createElement("button");
                removeButton.type = "button";
                removeButton.className = "btn btn-danger sm-btn";
                removeButton.textContent = "Delete";
                removeButton.onclick = function() {
                    // Remove the entire wrapper when the remove button is clicked
                    wrapper.parentNode.removeChild(wrapper);
                };

                // Set wrapper display to flex
                wrapper.style.display = "flex";

                // Append the select element and remove button to the wrapper
                wrapper.appendChild(select);
                wrapper.appendChild(removeButton);

                // Append the wrapper to the container
                document.getElementById("dynamicFieldsContainer3").appendChild(wrapper);

                // Trigger AOS refresh to apply the new animation
                AOS.refresh();
            },
            error: function(error) {
                console.error('Error fetching users:', error);
            }
        });
    }

    
    function addSelect4Field() {
     // Fetch users from the Laravel controller
        $.ajax({
            url: "{{ url('api/get-loan-denied-statuses') }}", // Adjust the URL based on your Laravel route
            method: 'GET',
            success: function(status) {
                // Create a wrapper for each select input and its remove button
                var wrapper = document.createElement("div");
                wrapper.className = "dynamic-field-wrapper flex";

                // Create a new select element
                var select = document.createElement("select");
                select.name = 'denied[]';
                // Add options to the select element
                for (var i = 0; i < status.length; i++) {
                    var option = document.createElement("option");
                    option.value = status[i].id;
                    option.text = status[i].name;
                    select.add(option);
                }

                // Set attributes for the select element
                select.className = "form-select m-2"; // You can add your own classes here
                select.setAttribute("data-aos", "fade-right"); // AOS animation effect

                // Create a remove button
                var removeButton = document.createElement("button");
                removeButton.type = "button";
                removeButton.className = "btn btn-danger sm-btn";
                removeButton.textContent = "Delete";
                removeButton.onclick = function() {
                    // Remove the entire wrapper when the remove button is clicked
                    wrapper.parentNode.removeChild(wrapper);
                };

                // Set wrapper display to flex
                wrapper.style.display = "flex";

                // Append the select element and remove button to the wrapper
                wrapper.appendChild(select);
                wrapper.appendChild(removeButton);

                // Append the wrapper to the container
                document.getElementById("dynamicFieldsContainer4").appendChild(wrapper);

                // Trigger AOS refresh to apply the new animation
                AOS.refresh();
            },
            error: function(error) {
                console.error('Error fetching users:', error);
            }
        });
    }

    
    function addSelect5Field() {
     // Fetch users from the Laravel controller
        $.ajax({
        url: "{{ url('api/get-loan-not-taken-up-statuses') }}", // Adjust the URL based on your Laravel route
            method: 'GET',
            success: function(status) {
                // Create a wrapper for each select input and its remove button
                var wrapper = document.createElement("div");
                wrapper.className = "dynamic-field-wrapper flex";

                // Create a new select element
                var select = document.createElement("select");
                select.name = 'not_taken_up[]';
                // Add options to the select element
                for (var i = 0; i < status.length; i++) {
                    var option = document.createElement("option");
                    option.value = status[i].id;
                    option.text = status[i].name;
                    select.add(option);
                }

                // Set attributes for the select element
                select.className = "form-select m-2"; // You can add your own classes here
                select.setAttribute("data-aos", "fade-right"); // AOS animation effect

                // Create a remove button
                var removeButton = document.createElement("button");
                removeButton.type = "button";
                removeButton.className = "btn btn-danger sm-btn";
                removeButton.textContent = "Delete";
                removeButton.onclick = function() {
                    // Remove the entire wrapper when the remove button is clicked
                    wrapper.parentNode.removeChild(wrapper);
                };

                // Set wrapper display to flex
                wrapper.style.display = "flex";

                // Append the select element and remove button to the wrapper
                wrapper.appendChild(select);
                wrapper.appendChild(removeButton);

                // Append the wrapper to the container
                document.getElementById("dynamicFieldsContainer5").appendChild(wrapper);

                // Trigger AOS refresh to apply the new animation
                AOS.refresh();
            },
            error: function(error) {
                console.error('Error fetching users:', error);
            }
        });
    }
</script>