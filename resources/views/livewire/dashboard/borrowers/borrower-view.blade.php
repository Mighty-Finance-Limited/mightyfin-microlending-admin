<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    @include('livewire.dashboard.borrowers.breadcrums.index-borrowers-crum')

    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl">
            <div class="card">
                <div class="pt-6 border-0 card-header">
                    <div></div>
                    <div class="card-toolbar">
                        <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                            @can('create clientele')
                            <a href="" data-bs-toggle="modal" id="create-btn" data-bs-target="#kt_modal_add_customer" class="btn btn-sm btn-primary">
                                Add Customer
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                                    <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4"/>
                                  </svg>
                            </a>
                            @endcan
                        </div>
                        <div class="d-flex justify-content-end align-items-center d-none" data-kt-customer-table-toolbar="selected">
                            <div class="fw-bold me-5">
                            <span class="me-2" data-kt-customer-table-select="selected_count"></span>Selected</div>
                            <button type="button" class="btn btn-danger" data-kt-customer-table-select="delete_selected">Delete Selected</button>
                        </div>
                    </div>
                </div>

                <div class="pt-0 card-body">
                    @include('livewire.dashboard.__parts.dash-alerts')
                    @include('livewire.dashboard.borrowers.__parts.table')
                </div>
            </div>
            @include('livewire.dashboard.borrowers.__parts.create')
        </div>
    </div>

    @include('livewire.dashboard.borrowers.__parts.create')
    @include('livewire.dashboard.loans.__modals.export-borrowers')
    @include('livewire.dashboard.loans.__modals.import-borrowers')
    <script>
        $(document).ready(function () {
            $('#kt_customers_table').DataTable({
                responsive: true,
                pageLength: 10,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search users..."
                },
                columnDefs: [
                    { orderable: false, targets: [0, 5] } // Disable sort on checkbox and actions column
                ]
            });
        });
    </script>
</div>