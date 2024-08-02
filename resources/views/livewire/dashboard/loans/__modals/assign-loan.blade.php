
<div wire:ignore class="modal fade" id="kt_modal_assign" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <form class="form" method="POST" action="{{ route('assign-manual-approval') }}" id="kt_modal_assign_form" validate enctype="multipart/form-data">
                @csrf
                <input type="hidden" wire:model="loan_id" name="application_id">
                <div class="modal-header" id="kt_modal_add_customer_header">
                    <h2 class="fw-bold">Assign Staff</h2>
                    <div id="kt_modal_add_customer_close" class="btn btn-icon btn-sm btn-active-icon-primary">
                        <i class="ki-duotone ki-cross fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                </div>
                
                <div class="modal-body py-2">
                    <div class="settings mb-2">
                        <p class="col-lg-12 px-3 col-form-label">Assign specific loan officers or staff to review and approve loan request </p>
                        <div class="col-lg-12 mb-4 py-2">
                            <button title="Add approver" style="border-radius:100%;box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;" type="button" class="btn btn-primary btn-xs rounded-6 mx-3" onclick="addSelectField()">+</button>

                            <div class="dynamic-field-wrapper flex" style="display: flex; width: 50%;">
                                {{-- <select name="approver[]" class="form-select m-2 aos-init" data-aos="fade-right">
                                        <option value="">-- Choose --</option>
                                    </select>
                                    <button type="button" class="btn btn-danger sm-btn">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                        <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
                                    </svg>
                                </button> --}}
                            </div>
                            <div id="dynamicFieldsContainer" style="width: 50%; display: block"></div>
                            <button title="Add approver" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;" type="submit" class="btn btn-primary btn-xs float-end rounded-6" >Submit</button>
                            <br><br>
                        </div>
                    </div>
                </div>
                
            </form>
        </div>
    </div>
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
                removeButton.innerHTML = `
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                        <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
                    </svg>
                `;

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