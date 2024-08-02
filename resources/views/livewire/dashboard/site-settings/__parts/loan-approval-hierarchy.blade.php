
<!--begin::Card header-->
<!--begin::Content-->
<style>
    #loading-spinner {
        display: none;
    }
</style>
<div id="kt_account_settings_profile_details" class="collapse show">
    <!--begin::Form-->

    <form id="loan_approver_form" id="kt_account_profile_details_form" class="form">
        <div class="card-body border-top p-9">
            <div class="row mb-6">
                <label class="col-lg-4 col-form-label required fw-bold fs-6">Loan Assigning</label>
                <input type="hidden" name="setting" value="{{$settings}}">
                <div class="col-lg-8 fv-row">
                    <div class="d-flex align-items-center mt-3">
                        <label class="form-check form-check-custom form-check-inline form-check-solid me-5">
                            <input class="form-check-input" name="process_type" type="radio" value="spooling" onchange="toggleSettings('spooling')" />
                            <span class="fw-semibold ps-2 fs-6">Spooling</span>
                        </label>
                        <label class="form-check form-check-custom form-check-inline form-check-solid">
                            <input class="form-check-input" name="process_type" type="radio" value="manual" onchange="toggleSettings('manual')" />
                            <span class="fw-semibold ps-2 fs-6">Manual</span>
                        </label>
                        <label class="form-check form-check-custom form-check-inline form-check-solid">
                            <input class="form-check-input" name="process_type" type="radio" value="auto" onchange="toggleSettings('auto')" />
                            <span class="fw-semibold ps-2 fs-6">Auto</span>
                        </label>
                    </div>
                </div>
            </div>
    
            <div class="separator separator-dashed my-3"></div>
    
            <div id="spooling" class="settings mb-0">
                <label class="col-lg-4 col-form-label fw-bold fw-semibold fs-6">Spooling Settings</label>

                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="fv-row mb-0">
                        <label for="approvers" class="form-label fs-6 mb-3">Number of Approvers</label>
                        <input disabled type="text" class="form-control form-control-lg form-control-solid" id="approvers" placeholder="Spooling" name="num_of_approvers"/>
                    </div>
                </div>
            </div>
            <div id="manual" class="settings mb-0">
                <label class="col-lg-4 col-form-label fw-bold fs-6">Manual Settings</label>
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="fv-row mb-0">
                        <label for="approvers1" class="form-label fs-6 mb-3">Number of Approvers</label>
                        <input disabled type="number" class="form-control form-control-lg form-control-solid" id="approvers1" placeholder="Manual" name="num_of_approvers" />
                    </div>
                </div>
            </div>
            <div id="auto" class="settings mb-0">
                <label class="col-lg-4 col-form-label fw-bold fs-6">Auto Settings</label>
                <div class="col-lg-12 mb-4 mb-lg-0">
                    <button type="button" class="btn btn-primary btn-xs" onclick="addSelectField()">+ Add Approver</button>
                    <div class="dynamic-field-wrapper flex" style="display: flex;width: 50%;">
                        <select name="approver[]" class="form-select m-2 aos-init" data-aos="fade-right">
                            <option value="">--Choose-</option>
                        </select>
                        <button type="button" class="btn btn-danger sm-btn">Delete</button>
                    </div>
                    <div id="dynamicFieldsContainer" style="width: 50%; display:block">
                        {{-- Newly added select fields will be inserted here --}}
                    </div>
                </div>
            </div>
        </div>
    
        <div class="card-footer d-flex justify-content-end py-6 px-9">
            <div id="loading-spinner" class="mx-auto"> 
                <div class="flex justify-content-center justify-items-center items-center">
                    <img width="100" src="{{ asset('public/loader/1.gif') }}" alt="">
                    <span>Setting...</span>
                </div>
            </div>
            <div class="d-flex justify-content-end py-6 px-9">
                <button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
                <button type="button" class="btn btn-primary" id="loan_approver_submit" onclick="submitForm()">Save Changes</button>
            </div>
        </div>
</form>
    
</div>  

<script>
    // Initialize AOS
    AOS.init();
    function addSelectField() {
        // Fetch users from the Laravel controller
        $.ajax({
            url: "{{ url('api/get-approvers-users') }}", // Adjust the URL based on your Laravel route
            method: 'GET',
            success: function(users) {
                // Create a wrapper for each select input and its remove button
                var wrapper = document.createElement("div");
                wrapper.className = "dynamic-field-wrapper flex";

                // Create a new select element
                var select = document.createElement("select");
                select.name = 'approver[]';
                // Add options to the select element
                for (var i = 0; i < users.length; i++) {
                    var option = document.createElement("option");
                    option.value = users[i].id;
                    option.text = users[i].fname + " " + users[i].lname;
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
                document.getElementById("dynamicFieldsContainer").appendChild(wrapper);

                // Trigger AOS refresh to apply the new animation
                AOS.refresh();
            },
            error: function(error) {
                console.error('Error fetching users:', error);
            }
        });
    }

    function submitForm() {
        // Disable the submit button
            // Prevent the default form submission
            event.preventDefault();

            // Disable the submit button
            $("#loan_approver_submit").prop("disabled", true);

            // Show the loading spinner
            document.getElementById("loading-spinner").style.display = 'block';
            // Get form data
            var formData = $("#loan_approver_form").serialize();
            // Simulate form submission using AJAX (replace this with your actual form submission logic)
            $.ajax({
                type: "POST",
                url: "api/set-auto-approvers", // Replace with your API endpoint
                data: formData,
                success: function(response) {
                    // Enable the submit button
                    $("#loan_approver_submit").prop("disabled", false);

                    // Hide the loading spinner
                    document.getElementById("loading-spinner").style.display = 'none';
                    
                    jSuites.notification({
                        name: 'Setting Successful',
                        message: 'Loan approval process update',
                    });
                },
                error: function(error) {
                    console.error("Error:", error);

                    // Enable the submit button
                    $("#loan_approver_submit").prop("disabled", false);

                    // Hide the loading spinner
                    document.getElementById("loading-spinner").style.display = 'none';

                    // Handle errors as needed
                    jSuites.notification({
                        error: 1,
                        name: 'Setting Error',
                        message: 'Failed to update loan approver process',
                    });
                }
            });
    }


</script>


