<div class="modal fade" id="kt_modal_update_role" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-750px">
        <div class="shadow-lg modal-content rounded-3">
            <!-- Modal Header with Improved Styling -->
            <div class="py-6 border-0 modal-header px-9 position-relative bg-light-primary rounded-top-3">
                <h2 class="mb-0 text-white fw-bolder fs-3">Edit Role</h2>
                <button type="button" class="top-0 mt-3 btn-close position-absolute end-0 me-3 btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Body with Enhanced Styling -->
            <div class="py-10 modal-body px-9">
                <form id="kt_modal_edit_role_form" class="form" method="POST" action="{{ route('update-role') }}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" id="edit_role_id" />

                    <!-- Role Name Field with Floating Label -->
                    <div class="mb-8 position-relative">
                        <div class="mb-3 form-floating">
                            <input type="text" class="border-0 shadow-sm form-control form-control-lg bg-light rounded-3"
                                id="edit_role_name" name="name" placeholder="Role Name" />
                            <label for="edit_role_name">Role Name<span class="text-danger ms-1">*</span></label>
                        </div>
                    </div>

                    <!-- Permissions Section with Enhanced Visual Hierarchy -->
                    <div class="p-6 mb-8 rounded-3 bg-light">
                        <h3 class="mb-6 fs-4 fw-bold d-flex align-items-center">
                            <span class="svg-icon svg-icon-primary svg-icon-2x me-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path opacity="0.3" d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z" fill="currentColor"/>
                                    <path d="M10.5606 11.3042L9.57283 10.3018C9.28174 10.0065 8.80522 10.0065 8.51412 10.3018C8.22897 10.5912 8.22897 11.0559 8.51412 11.3452L10.4182 13.2773C10.8099 13.6747 11.451 13.6747 11.8427 13.2773L15.4859 9.58051C15.771 9.29117 15.771 8.82648 15.4859 8.53714C15.1948 8.24176 14.7183 8.24176 14.4272 8.53714L11.7002 11.3042C11.3869 11.6221 10.874 11.6221 10.5606 11.3042Z" fill="currentColor"/>
                                </svg>
                            </span>
                            Role Permissions
                        </h3>

                        <!-- Permission Tree with Modern Toggle Styling -->
                        <div class="permission-tree">
                            @foreach($permissions as $g => $p)
                                <div class="mb-6 permission-group">
                                    <div class="pb-2 mb-3 permission-group-header d-flex align-items-center border-bottom">
                                        <button type="button" class="btn btn-sm btn-icon btn-light-primary me-3 toggle-group">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1"/>
                                              </svg>
                                        </button>
                                        <h4 class="mb-0 fs-5 fw-bolder text-dark">{{ ucwords($g) }} Management</h4>
                                    </div>

                                    <div class="permission-items ps-8">
                                        <div class="row g-5">
                                            @foreach($p as $key => $perm)
                                                <div class="col-lg-4 col-md-6">
                                                    <label class="p-3 border border-gray-300 border-dashed d-flex align-items-center permission-item rounded-2 hover-bg-light">
                                                        <div class="form-check form-switch form-check-custom form-check-solid me-3">
                                                            <input class="form-check-input permission-checkbox h-20px w-30px"
                                                                type="checkbox" name="permission[]" value="{{ $perm->name }}" />
                                                        </div>
                                                        <span class="text-gray-800 fw-semibold fs-6">{{ ucwords($perm->permission) }}</span>
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Action Buttons with Enhanced Styling -->
                    <div class="pt-4 d-flex justify-content-between">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                            <span class="svg-icon svg-icon-2 me-2">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.60001 11H21C21.6 11 22 11.4 22 12C22 12.6 21.6 13 21 13H9.60001V11Z" fill="currentColor"/>
                                    <path opacity="0.3" d="M9.6 20V4L2.3 11.3C1.9 11.7 1.9 12.3 2.3 12.7L9.6 20Z" fill="currentColor"/>
                                </svg>
                            </span>
                            Cancel
                        </button>
                        <button type="submit" class="px-6 btn btn-primary btn-lg">
                            <span class="indicator-label">
                                <span class="svg-icon svg-icon-white svg-icon-2 me-2">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.3" d="M10 18C9.7 18 9.5 17.9 9.3 17.7L2.3 10.7C1.9 10.3 1.9 9.7 2.3 9.3C2.7 8.9 3.29999 8.9 3.69999 9.3L10.7 16.3C11.1 16.7 11.1 17.3 10.7 17.7C10.5 17.9 10.3 18 10 18Z" fill="currentColor"/>
                                        <path d="M10 18C9.7 18 9.5 17.9 9.3 17.7C8.9 17.3 8.9 16.7 9.3 16.3L20.3 5.3C20.7 4.9 21.3 4.9 21.7 5.3C22.1 5.7 22.1 6.30002 21.7 6.70002L10.7 17.7C10.5 17.9 10.3 18 10 18Z" fill="currentColor"/>
                                    </svg>
                                </span>
                                Update Role
                            </span>
                            <span class="indicator-progress">
                                <span class="align-middle spinner-border spinner-border-sm ms-2"></span>
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    /* Custom styling for permission items */
    .permission-item {
        transition: all 0.3s ease;
    }

    .permission-item:hover {
        background-color: #f8f9fa;
        transform: translateY(-2px);
    }

    /* Custom styling for toggle buttons */
    .toggle-group {
        transition: transform 0.3s ease;
    }

    .toggle-group.collapsed {
        transform: rotate(-90deg);
    }

    /* Enhanced form control styling */
    .form-control:focus {
        box-shadow: 0 0 0 0.25rem rgba(0, 123, 255, 0.1);
        border-color: #0d6efd;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const editModal = document.getElementById('kt_modal_update_role');

        // Modal open handler with animations
        editModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            const roleId = button.getAttribute('data-role-id');
            const roleName = button.getAttribute('data-role-name');
            const rolePermissions = JSON.parse(button.getAttribute('data-role-permissions'));

            // Set form inputs with smooth animation
            const roleIdInput = document.getElementById('edit_role_id');
            const roleNameInput = document.getElementById('edit_role_name');

            roleIdInput.value = roleId;
            roleNameInput.value = roleName;

            // Add highlight effect to the input
            roleNameInput.classList.add('highlight-input');
            setTimeout(() => roleNameInput.classList.remove('highlight-input'), 1000);

            // Reset all checkboxes with animation
            document.querySelectorAll('#kt_modal_update_role .permission-checkbox').forEach(cb => {
                cb.checked = false;
                cb.parentElement.classList.remove('checked-animation');
            });

            // Check role permissions with animation delay
            rolePermissions.forEach((permission, index) => {
                setTimeout(() => {
                    const checkbox = document.querySelector(`#kt_modal_update_role .permission-checkbox[value="${permission}"]`);
                    if (checkbox) {
                        checkbox.checked = true;
                        checkbox.parentElement.classList.add('checked-animation');
                    }
                }, index * 50); // Staggered animation
            });
        });

        // Toggle group sections
        document.querySelectorAll('.toggle-group').forEach(toggle => {
            toggle.addEventListener('click', function() {
                const items = this.closest('.permission-group').querySelector('.permission-items');
                const isVisible = items.style.display !== 'none';

                if (isVisible) {
                    items.style.display = 'none';
                    this.classList.add('collapsed');
                } else {
                    items.style.display = 'block';
                    this.classList.remove('collapsed');
                }
            });
        });

        // Form submission with loading state
        const form = document.getElementById('kt_modal_edit_role_form');
        form.addEventListener('submit', function(e) {
            const submitBtn = form.querySelector('[type="submit"]');
            submitBtn.setAttribute('data-kt-indicator', 'on');
            submitBtn.disabled = true;

            // This would normally be removed after the form submission completes
            // but we're adding it here for demonstration purposes
            setTimeout(() => {
                submitBtn.removeAttribute('data-kt-indicator');
                submitBtn.disabled = false;
            }, 2000);
        });
    });
</script>
