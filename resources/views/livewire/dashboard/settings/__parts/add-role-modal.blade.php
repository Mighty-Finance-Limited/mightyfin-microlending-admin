<div wire:ignore class="modal fade" id="kt_modal_add_role" tabindex="-1" aria-hidden="true">
    <div style="padding-bottom:10px" class=" modal-dialog modal-dialog-centered modal-xl">
        <div class="shadow-lg modal-content rounded-3">
            <!-- Modern Header with Improved Design -->
            <div class="py-6 border-0 modal-header px-9 position-relative bg-primary rounded-top-3">
                <h2 class="mb-0 text-white fw-bolder fs-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-person-fill-gear" viewBox="0 0 16 16">
                        <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0m-9 8c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4m9.886-3.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382zM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0"/>
                    </svg>
                    Add a Role
                </h2>
                <button type="button" class="top-0 mt-3 btn-close position-absolute end-0 me-3 btn-close-white" data-kt-roles-modal-action="close" aria-label="Close"></button>
            </div>
            <div class="py-10 modal-body px-9" style="max-height: 72vh;">
                <form id="kt_modal_add_role_form" class="form" method="POST" action="{{ route('create-role') }}">
                    @csrf
                    <div class="p-2 d-flex flex-column scroll-y" id="kt_modal_add_role_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_role_header" data-kt-scroll-wrappers="#kt_modal_add_role_scroll" data-kt-scroll-offset="300px">
                        <!-- Role Name Field with Floating Label -->
                        <div class="mb-8 position-relative">
                            <div class="mb-3 form-floating">
                                <input type="text" class="border-0 form-control form-control-lg bg-light rounded-3"
                                    placeholder="Enter a role name" name="name" id="add_role_name" />
                                <label for="add_role_name">Role Name<span class="text-danger ms-1">*</span></label>
                            </div>
                        </div>

                        <!-- Role Description Field -->
                        <div class="mb-8 position-relative">
                            <div class="mb-3 form-floating">
                                <textarea class="border-0 form-control form-control-lg bg-light rounded-3"
                                    placeholder="Enter role description" name="description" id="add_role_description"
                                    style="height: 100px;"></textarea>
                                <label for="add_role_description">Role Description</label>
                            </div>
                        </div>

                        <!-- Permissions Section with Modern Styling -->
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

                            <!-- Quick Selection Buttons -->
                            <div class="flex-wrap gap-3 mb-5 d-flex">
                                <button type="button" class="px-4 py-2 btn btn-sm btn-light-primary" id="select-all-permissions">
                                    <i class="ki-duotone ki-check-circle fs-6 me-1"></i>
                                    Select All
                                </button>
                                <button type="button" class="px-4 py-2 btn btn-sm btn-light-danger" id="deselect-all-permissions">
                                    <i class="ki-duotone ki-cross-circle fs-6 me-1"></i>
                                    Deselect All
                                </button>
                                <button type="button" class="px-4 py-2 btn btn-sm btn-light-info" id="expand-all-sections">
                                    <i class="ki-duotone ki-arrows-circle fs-6 me-1"></i>
                                    Expand All
                                </button>
                                <button type="button" class="px-4 py-2 btn btn-sm btn-light-info" id="collapse-all-sections">
                                    <i class="ki-duotone ki-arrows-circle fs-6 me-1"></i>
                                    Collapse All
                                </button>
                            </div>

                            <!-- Search Permissions -->
                            <div class="mb-5 position-relative">
                                <div class="input-group input-group-solid">
                                    <span class="input-group-text bg-light">
                                        <i class="ki-duotone ki-magnifier fs-4"></i>
                                    </span>
                                    <input type="text" class="form-control form-control-solid" placeholder="Search permissions" id="permission-search">
                                </div>
                            </div>

                            <!-- Modern Permission Tree with Better Spacing -->
                            <div class="permission-tree">
                                @foreach($permissions as $g => $p)
                                    <div class="mb-8 permission-group">
                                        <div class="pb-3 mb-4 border-gray-300 permission-group-header d-flex align-items-center border-bottom">
                                            <button type="button" class="btn btn-sm btn-icon btn-light-primary me-3 toggle-group">
                                                <i class="ki-duotone ki-arrow-down fs-2"></i>
                                            </button>
                                            <h4 class="mb-0 fs-5 fw-bolder text-dark">{{ ucwords($g) }} Management</h4>
                                            <button type="button" class="ms-3 btn btn-sm btn-icon btn-light-success select-group">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1"/>
                                                </svg>
                                            </button>
                                        </div>

                                        <div class="permission-items ps-8">
                                            <div class="row g-6">
                                                @foreach($p as $key => $perm)
                                                    <div class="col-lg-3 col-md-4 col-sm-6 permission-item-container">
                                                        <label class="p-4 border border-gray-300 border-dashed d-flex align-items-center permission-item rounded-3 hover-bg-light h-100">
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
                    </div>

                    <!-- Enhanced Action Buttons -->
                    <div class="pt-4 modal-footer d-flex justify-content-between">
                        <button type="reset" class="btn btn-light" data-kt-roles-modal-action="cancel">
                            <span class="svg-icon svg-icon-2 me-2">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor"/>
                                    <rect x="7" y="15.3137" width="12" height="2" rx="1" transform="rotate(-45 7 15.3137)" fill="currentColor"/>
                                    <rect x="8.41422" y="7" width="12" height="2" rx="1" transform="rotate(45 8.41422 7)" fill="currentColor"/>
                                </svg>
                            </span>
                            Discard
                        </button>
                        <button type="submit" class="px-6 btn btn-primary btn-lg" data-kt-roles-modal-action="submit">
                            <span class="indicator-label">
                                <span class="svg-icon svg-icon-white svg-icon-2 me-2">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.3" d="M10 18C9.7 18 9.5 17.9 9.3 17.7L2.3 10.7C1.9 10.3 1.9 9.7 2.3 9.3C2.7 8.9 3.29999 8.9 3.69999 9.3L10.7 16.3C11.1 16.7 11.1 17.3 10.7 17.7C10.5 17.9 10.3 18 10 18Z" fill="currentColor"/>
                                        <path d="M10 18C9.7 18 9.5 17.9 9.3 17.7C8.9 17.3 8.9 16.7 9.3 16.3L20.3 5.3C20.7 4.9 21.3 4.9 21.7 5.3C22.1 5.7 22.1 6.30002 21.7 6.70002L10.7 17.7C10.5 17.9 10.3 18 10 18Z" fill="currentColor"/>
                                    </svg>
                                </span>
                                Create Role
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    /* Enable smooth scrolling */
    .modal-body.scroll-y {
        overflow-y: auto;
        scrollbar-width: thin;
        scrollbar-color: #d1d5db transparent;
    }

    .modal-body.scroll-y::-webkit-scrollbar {
        width: 6px;
    }

    .modal-body.scroll-y::-webkit-scrollbar-track {
        background: transparent;
    }

    .modal-body.scroll-y::-webkit-scrollbar-thumb {
        background-color: #d1d5db;
        border-radius: 6px;
    }

    /* Custom styling for permission items */
    .permission-item {
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .permission-item:hover {
        background-color: #f8f9fa;
        transform: translateY(-2px);
        box-shadow: 0 0.25rem 0.75rem rgba(0, 0, 0, 0.05);
    }

    /* Highlight selected items */
    .permission-item.selected {
        background-color: rgba(13, 110, 253, 0.08);
        border-color: #0d6efd !important;
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

    /* Add animation for checkbox selection */
    .permission-checkbox:checked {
        animation: pulse 0.5s;
    }

    .fade-in {
        animation: fadeIn 0.5s ease forwards;
        opacity: 0;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.2); }
        100% { transform: scale(1); }
    }

    /* Smooth transitions for collapsible sections */
    .permission-items {
        transition: all 0.3s ease;
    }

    /* Style the form floating labels */
    .form-floating label {
        opacity: 0.7;
    }

    .form-floating input:focus ~ label,
    .form-floating textarea:focus ~ label {
        opacity: 1;
        color: #0d6efd;
    }

    /* Highlighted search results */
    .highlight-match {
        background-color: rgba(255, 193, 7, 0.2);
        border-radius: 2px;
        padding: 0 2px;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Initialize toggle functionality for permission groups
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

        // Select all permissions in a group
        document.querySelectorAll('.select-group').forEach(button => {
            button.addEventListener('click', function() {
                const group = this.closest('.permission-group');
                const checkboxes = group.querySelectorAll('.permission-checkbox');
                const allChecked = Array.from(checkboxes).every(cb => cb.checked);

                checkboxes.forEach((checkbox, index) => {
                    setTimeout(() => {
                        checkbox.checked = !allChecked;
                        const item = checkbox.closest('.permission-item');
                        if (!allChecked) {
                            item.classList.add('selected');
                        } else {
                            item.classList.remove('selected');
                        }
                    }, index * 20); // Staggered effect
                });
            });
        });

        // Handle form submission with loading states
        const form = document.getElementById('kt_modal_add_role_form');
        form.addEventListener('submit', function(e) {
            const submitBtn = this.querySelector('[data-kt-roles-modal-action="submit"]');
            submitBtn.setAttribute('data-kt-indicator', 'on');
            submitBtn.disabled = true;

            // For demo, simulate submission
            setTimeout(() => {
                submitBtn.removeAttribute('data-kt-indicator');
                submitBtn.disabled = false;
            }, 2000);
        });

        // Select/deselect all permissions
        document.getElementById('select-all-permissions').addEventListener('click', function() {
            document.querySelectorAll('.permission-checkbox').forEach((checkbox, index) => {
                setTimeout(() => {
                    checkbox.checked = true;
                    checkbox.closest('.permission-item').classList.add('selected');
                }, index * 5);
            });
        });

        document.getElementById('deselect-all-permissions').addEventListener('click', function() {
            document.querySelectorAll('.permission-checkbox').forEach((checkbox, index) => {
                setTimeout(() => {
                    checkbox.checked = false;
                    checkbox.closest('.permission-item').classList.remove('selected');
                }, index * 5);
            });
        });

        // Expand/collapse all sections
        document.getElementById('expand-all-sections').addEventListener('click', function() {
            document.querySelectorAll('.permission-items').forEach(section => {
                section.style.display = 'block';
            });
            document.querySelectorAll('.toggle-group').forEach(toggle => {
                toggle.classList.remove('collapsed');
            });
        });

        document.getElementById('collapse-all-sections').addEventListener('click', function() {
            document.querySelectorAll('.permission-items').forEach(section => {
                section.style.display = 'none';
            });
            document.querySelectorAll('.toggle-group').forEach(toggle => {
                toggle.classList.add('collapsed');
            });
        });

        // Permission search functionality
        document.getElementById('permission-search').addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();

            if (searchTerm.length > 0) {
                // Expand all sections when searching
                document.querySelectorAll('.permission-items').forEach(section => {
                    section.style.display = 'block';
                });
                document.querySelectorAll('.toggle-group').forEach(toggle => {
                    toggle.classList.remove('collapsed');
                });

                // Hide/show permissions based on search
                document.querySelectorAll('.permission-item-container').forEach(container => {
                    const permText = container.querySelector('.fw-semibold').textContent.toLowerCase();
                    if (permText.includes(searchTerm)) {
                        container.style.display = 'block';

                        // Highlight matching text
                        const regex = new RegExp(`(${searchTerm})`, 'gi');
                        const textElement = container.querySelector('.fw-semibold');
                        const originalText = textElement.textContent;
                        textElement.innerHTML = originalText.replace(regex, '<span class="highlight-match">$1</span>');
                    } else {
                        container.style.display = 'none';
                    }
                });
            } else {
                // Reset display when search is cleared
                document.querySelectorAll('.permission-item-container').forEach(container => {
                    container.style.display = 'block';
                    const textElement = container.querySelector('.fw-semibold');
                    textElement.innerHTML = textElement.textContent; // Remove highlights
                });
            }
        });

        // Handle cancel button click
        const cancelBtn = document.querySelector('[data-kt-roles-modal-action="cancel"]');
        cancelBtn.addEventListener('click', function() {
            // Reset form
            form.reset();

            // Reset all permission checkboxes
            document.querySelectorAll('.permission-checkbox').forEach(checkbox => {
                checkbox.checked = false;
                checkbox.closest('.permission-item').classList.remove('selected');
            });
        });

        // Update visual state when checkboxes are clicked
        document.querySelectorAll('.permission-checkbox').forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                const item = this.closest('.permission-item');
                if (this.checked) {
                    item.classList.add('selected');
                } else {
                    item.classList.remove('selected');
                }
            });
        });

        // Add subtle animation when modal opens
        const modal = document.getElementById('kt_modal_add_role');
        modal.addEventListener('shown.bs.modal', function() {
            // Add a subtle entrance animation for form elements
            const formElements = this.querySelectorAll('.form-control, .permission-group');
            formElements.forEach((element, index) => {
                setTimeout(() => {
                    element.classList.add('fade-in');
                }, index * 100);
            });
        });
    });
</script>
