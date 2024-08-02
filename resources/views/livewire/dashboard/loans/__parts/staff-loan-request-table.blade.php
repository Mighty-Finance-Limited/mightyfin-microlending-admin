<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container">
            <div class="card mb-5 mb-xl-8">

                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold fs-3 mb-1">{{ $this->title }}</span>
                        <span class="text-muted mt-1 fw-semibold fs-7">Over {{$requests->count()}} loans</span>
                    </h3>

                    <div class="card-toolbar">
                        <!--begin::Filter-->
                        <button onclick="resetBulk()" type="button" id="resetBtn" class="btn btn-sm btn-flex btn-light"
                            data-bs-toggle="modal" data-bs-target="#kt_modal_add_payment">
                            <i class="ki-duotone ki-plus-cross fs-3">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                            </i>Reset
                        </button>
                        <button onclick="deleteBulk()" type="button" id="deleteBtn" class="btn mx-2 btn-sm btn-flex btn-light-danger"
                            data-bs-toggle="modal" data-bs-target="#kt_modal_add_payment">
                            <i class="ki-duotone ki-plus-cross fs-3">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                            </i>Delete
                        </button>
                        <button type="button" class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                            <i class="ki-duotone ki-category fs-6">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                                <span class="path4"></span>
                            </i>
                        </button>

                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true">

                            <div class="menu-item px-3">
                                <div class="menu-content fs-6 text-dark fw-bold px-3 py-4">Quick Actions</div>
                            </div>

                            <div class="separator mb-3 opacity-75"></div>

                            <div class="menu-item px-3">
                                <a href="{{ route('proxy-loan-create') }}" class="menu-link px-3">New Loan</a>
                            </div>

                            {{-- <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3">New Customer</a>
                            </div> --}}

                            <div class="menu-item px-3">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#export_loans_panel" class="menu-link px-3">Export</a>
                            </div>

                            <div class="menu-item px-3">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#import_loans_panel" class="menu-link px-3">Import</a>
                            </div>

                            <div class="separator mt-3 opacity-75"></div>
                        </div>

                    </div>
                </div>

                <div class="card-body py-3">

                    <div class="table-responsive">
                        <table class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3">

                            <thead>
                                <tr class="fw-bold text-muted">
                                    <th class="w-20px">
                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input onclick="showBulkOps()" class="form-check-input" type="checkbox" value="1" data-kt-check="true" data-kt-check-target=".widget-13-check" />
                                        </div>
                                    </th>
                                    <th class="min-w-100px">Loan Type</th>
                                    <th class="min-w-140px">Principal</th>
                                    <th class="w-120px">Date</th>
                                    <th class="w-100px">Borrower</th>
                                    <th class="min-w-120px">Payback</th>
                                    <th class="min-w-90">Status</th>

                                    @if($this->current_configs('loan-approval')->value == 'spooling')
                                    <th class="min-w-60px"></th>
                                    @endif
                                    @if($this->current_configs('loan-approval')->value == 'manual')
                                    <th class="min-w-60px"></th>
                                    @endif
                                    <th class="min-w-140px text-end">Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($requests as $loan)
                                    <tr>
                                        <td>
                                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                <input onclick="showBulkOps()" class="form-check-input widget-13-check" type="checkbox" name="items[]" value="{{ $loan->id }}" />
                                            </div>
                                        </td>
                                        <td>
                                            <a href="#" class="text-dark fw-bold text-hover-primary ">
                                                {{ $loan->loan_product->name }}
                                            </a>
                                        </td>
                                        <td>
                                            <a href="#" class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6">
                                                {{ number_format($loan->amount, 2, '.', ',') }}
                                            </a>
                                            <span class="text-muted fw-semibold text-muted d-block fs-7">
                                                Upto {{ $loan->repayment_plan }} Months
                                            </span>
                                        </td>
                                        <td>
                                            <a href="#" class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6">{{ $loan->created_at->toFormattedDateString() }}</a>
                                            <span class="text-muted fw-semibold text-muted d-block fs-7">last update: {{ $loan->updated_at->toFormattedDateString() }}</span>
                                        </td>
                                        <td>
                                            <a target="_blank" href="{{ route('client-account', ['key'=>$loan->user->id])}}" class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6">
                                                {{ $loan->user->fname.' '. $loan->user->lname }}
                                            </a>
                                            <span class="text-muted fw-semibold text-muted d-block fs-7">{{ $loan->phone??' '. $loan->user->phone.', '.$loan->user->gender }}</span>
                                        </td>
                                        <td class="text-dark fw-bold text-hover-primary fs-6">
                                            {{
                                                number_format(App\Models\Application::payback($loan->amount, $loan->repayment_plan), 2, '.', ',')
                                            }}
                                        </td>
                                        <td>
                                            @if($loan->status == 0)
                                                <span class="badge badge-light-warning">Pending</span>
                                            @elseif($loan->status == 1)
                                                <span class="badge badge-light-success">Open</span>
                                            @elseif($loan->status == 2)
                                                <span class="badge badge-light-primary">Processing</span>
                                            @else
                                                <span class="badge badge-light-danger">Denied</span>
                                            @endif
                                        </td>
                                        @if($this->current_configs('loan-approval')->value == 'spooling')
                                        <td class="text-success">
                                            @role('admin')

                                            @else
                                                @can('review loan')
                                                    @if($loan->status == 0 || $loan->status == 3)
                                                        <button wire:click="setLoanID({{ $loan->id }})" data-bs-toggle="modal" data-bs-target="#kt_modal_review_warning" class="btn btn-sm btn-success">Review</button>
                                                    @endif
                                                @endcan
                                            @endrole
                                        </td>
                                        @endif
                                        @if($this->current_configs('loan-approval')->value == 'manual')
                                        <td>
                                            @role('admin')
                                                @if ($loan->is_assigned == 0)
                                                    <button wire:click="setLoanID({{$loan->id}})" class="btn btn-sm btn-success"  data-bs-toggle="modal" data-bs-target="#kt_modal_assign">
                                                        Assign
                                                    </button>
                                                @else
                                                    @if($loan->status == 1)
                                                    <button title="Cancel loan before disbursing funds" wire:click="setLoanID({{$loan->id}})" class="btn btn-sm btn-light"  data-bs-toggle="modal" data-bs-target="#kt_modal_assign">
                                                        Cancel
                                                    </button>
                                                    @else
                                                    <button wire:click="setLoanID({{$loan->id}})" class="btn btn-xs btn-warning"  data-bs-toggle="modal" data-bs-target="#kt_modal_assign">
                                                        Re-assign
                                                    </button>
                                                    @endif
                                                @endif
                                            @else
                                                @can('review loan')
                                                    @if($loan->status == 0 || $loan->status == 3)
                                                        <button wire:click="setLoanID({{ $loan->id }})" data-bs-toggle="modal" data-bs-target="#kt_modal_review_warning" class="btn btn-sm btn-success">Review</button>
                                                    @endif
                                                @endcan
                                            @endrole
                                        </td>
                                        @endif
                                        <td class="text-center">
                                            @can('processes loans')
                                                @if(Route::currentRouteName() === 'view-loan-requests')
                                                <a href="{{ route('loan-details',['id' => $loan->id]) }}" class="btn btn-icon btn-bg-light btn-light btn-sm me-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-shield-check" viewBox="0 0 16 16">
                                                        <path d="M5.338 1.59a61 61 0 0 0-2.837.856.48.48 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.7 10.7 0 0 0 2.287 2.233c.346.244.652.42.893.533q.18.085.293.118a1 1 0 0 0 .101.025 1 1 0 0 0 .1-.025q.114-.034.294-.118c.24-.113.547-.29.893-.533a10.7 10.7 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.8 11.8 0 0 1-2.517 2.453 7 7 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7 7 0 0 1-1.048-.625 11.8 11.8 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 63 63 0 0 1 5.072.56"/>
                                                        <path d="M10.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0"/>
                                                      </svg>
                                                </a>
                                                @endif
                                            @else
                                                <a title="Can not process loan due to limited user privileges" href="#" class="btn btn-icon btn-bg-gray btn-secondary btn-sm me-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
                                                        <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
                                                    </svg>
                                                </a>
                                            @endcan
                                            {{-- @can('view loan statements')
                                                <a  title="View Loan Statement" href="{{ route('loan-statement', ['id'=>$loan->id]) }}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-file-ruled-fill" viewBox="0 0 16 16">
                                                        <path d="M12 0H4a2 2 0 0 0-2 2v4h12V2a2 2 0 0 0-2-2m2 7H6v2h8zm0 3H6v2h8zm0 3H6v3h6a2 2 0 0 0 2-2zm-9 3v-3H2v1a2 2 0 0 0 2 2zm-3-4h3v-2H2zm0-3h3V7H2z"/>
                                                    </svg>
                                                </a>
                                            @endcan --}}
                                            <a href="{{ route('detailed',['id' => $loan->id]) }}" class="btn btn-icon btn-bg-light btn-primary btn-sm me-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
                                                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
                                                </svg>
                                            </a>
                                            @can('update loans')
                                                <a title="Edit Loan" href="{{ route('edit-loan', ['id'=>$loan->id]) }}" class="btn btn-icon btn-bg-info text-white btn-active-color-white btn-sm">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                                    </svg>
                                                </a>
                                            @endcan
                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div>

    @include('livewire.dashboard.loans.__modals.assign-loan')
    @include('livewire.dashboard.loans.__modals.review-warning')
    @include('livewire.dashboard.loans.__modals.export-loan-panel')
    @include('livewire.dashboard.loans.__modals.import-loan-panel')

    <script>
        const delBtn = document.getElementById('deleteBtn');
        const resetBtn = document.getElementById('resetBtn');

        delBtn.style.display = 'none';
        resetBtn.style.display = 'none';
        function showBulkOps(){
            delBtn.style.display = 'block';
            resetBtn.style.display = 'block';
        }

        function resetBulk() {
            // Fetch all selected checkboxes
            const checkboxes = document.querySelectorAll('input[name="items[]"]:checked');
            const selectedIds = Array.from(checkboxes).map(checkbox => checkbox.value);

            if (selectedIds.length > 0) {
                // Confirm deletion
                const confirmDelete = confirm("Are you sure you want to reset to processing on the selected loan applications?");

                if (confirmDelete) {
                    // Send an AJAX request to the Laravel route with the selected IDs
                    fetch('reset-loans', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        },
                        body: JSON.stringify({ ids: selectedIds }),
                    })
                    .then(response => {
                        if (response.ok) {
                            console.log('Items deleted successfully.');
                            window.location.reload(true);
                        } else {
                            console.error('Failed to delete items.');
                        }
                    })
                    .catch(error => console.error('Error:', error));
                }
            } else {
                alert("No items selected for deletion.");
            }
        }
        function deleteBulk() {
            // Fetch all selected checkboxes
            const checkboxes = document.querySelectorAll('input[name="items[]"]:checked');
            const selectedIds = Array.from(checkboxes).map(checkbox => checkbox.value);

            if (selectedIds.length > 0) {
                // Confirm deletion
                const confirmDelete = confirm("Are you sure you want to delete the selected loan applications?");

                if (confirmDelete) {
                    // Send an AJAX request to the Laravel route with the selected IDs
                    fetch('delete-loans', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        },
                        body: JSON.stringify({ ids: selectedIds }),
                    })
                    .then(response => {
                        if (response.ok) {
                            console.log('Items deleted successfully.');
                            window.location.reload(true);
                        } else {
                            console.error('Failed to delete items.');
                        }
                    })
                    .catch(error => console.error('Error:', error));
                }
            } else {
                alert("No items selected for deletion.");
            }
        }

    </script>
</div>
