<style>
    #loading-spinner {
        display: none;
    }
</style>

<div class="mb-5 card mb-xl-8">
    <!--begin::Header-->
    <div class="pt-5 border-0 card-header">
        <h3 class="card-title align-items-start flex-column">
            <span class="mb-1 card-label fw-bold fs-3">Loan Products</span>
            <span class="mt-1 text-muted fw-semibold fs-7">Over {{ $loan_products->count() }} loan products</span>
        </h3>
        <div class="card-toolbar">
            <a href="{{ route('system-create', ['page' => 'loan-product']) }}" class="btn btn-sm btn-light-primary">
            <i class="ki-duotone ki-plus fs-2"></i>New Loan Product</a>
        </div>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="py-3 card-body">
        @include('livewire.dashboard.__parts.dash-alerts')
        <!--begin::Table container-->
        <div class="table-responsive">
            <!--begin::Table-->
            <table class="table align-middle gs-0 gy-4">
                <!--begin::Table head-->
                <thead>
                    <tr class="fw-bold text-muted bg-light">
                        <th class="ps-4 min-w-205px rounded-start">Loan Description</th>
                        <th class="min-w-100px">Interest</th>
                        <th class="min-w-100px">Duration</th>
                        <th class="min-w-100px">Release Date</th>
                        <th class="min-w-100px">Status</th>
                        <th class="min-w-100px text-end rounded-end"></th>
                    </tr>
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody>
                    @forelse ($loan_products as $product)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-label bg-light-danger symbol-50px me-5">
                                </div>
                                <div class="d-flex justify-content-start flex-column">
                                    <a href="#" class="mb-1 text-dark fw-bold text-hover-primary fs-6">{{ $product->name }}</a>
                                    <span class="text-muted fw-semibold d-block fs-7">{{ $product->name }}</span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <a href="#" class="mb-1 text-dark fw-bold text-hover-primary d-block fs-6">{{ $product->def_loan_interest }}</a>
                            <span class="text-muted fw-semibold d-block fs-7">{{ $product->interest_types->first()->interest_type->name }}</span>
                        </td>
                        <td>
                            <a href="#" class="mb-1 text-dark fw-bold text-hover-primary d-block fs-6">{{ $product->default_loan_duration ?? '1' }} month</a>
                            {{-- <span class="text-muted fw-semibold d-block fs-7">Insurance</span> --}}
                        </td>
                        <td>
                            <a href="#" class="mb-1 text-dark fw-bold text-hover-primary d-block fs-6">{{ $product->auto_payment == 1 ? 'Automatic' : 'Manual' }}</a>
                            <span class="text-muted fw-semibold d-block fs-7">{{ $product->auto_payment == 1 ? 'Todate' : 'Set Date' }}</span>
                        </td>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="statusSwitch{{ $product->id }}" data-id="{{ $product->id }}" {{ $product->status == 1 ? 'checked' : '' }}>
                                <label class="form-check-label" for="statusSwitch{{ $product->id }}">
                                    <span id="statusLabel{{ $product->id }}" class="fw-bold {{ $product->status == 1 ? 'bg-success text-white' : 'bg-light' }} p-2 rounded">
                                        {{ $product->status == 1 ? 'Active' : 'Disabled' }}
                                    </span>
                                </label>
                            </div>
                        </td>
                        <script>
                            $(document).ready(function() {
                                $('.form-check-input').on('change', function() {
                                    var productId = $(this).data('id');
                                    var status = $(this).is(':checked') ? 1 : 0;
                        
                                    $.ajax({
                                        url: '{{ url("api/loan-products/update-status") }}', // Define the route for updating status
                                        method: 'POST',
                                        data: {
                                            _token: '{{ csrf_token() }}',
                                            id: productId,
                                            status: status
                                        },
                                        success: function(response) {
                                            console.log(response);
                                            if(response.success) {
                                                var statusLabel = $('#statusLabel' + productId);
                                                if(status == 1) {
                                                    statusLabel.text('Active').removeClass('bg-light').addClass('bg-success text-white');
                                                } else {
                                                    statusLabel.text('Disabled').removeClass('bg-success text-white').addClass('bg-light');
                                                }
                                                toastr.success(response.message);
                                            } else {
                                                toastr.error(response.message);
                                            }
                                        },
                                        error: function() {
                                            toastr.error('There was an error updating the status.');
                                        }
                                    });
                                });
                            });
                        </script>
                        <td>
                            @if ($product->status == 1)
                            <span class="badge badge-light-success fs-7 fw-bold">Active</span>
                            @else
                            <span class="badge badge-light-dark fs-7 fw-bold">Disabled</span>
                            @endif
                        </td>
                        <td class="text-end">
                            {{-- <a title="Manage loan statuses" href="{{ route('system-edit', ['page' => 'loan-statuses', 'item_id' => $product->id]) }}" class="btn btn-primary">
                                Manage Statuses
                            </a> --}}
                            <a title="Delete" wire:click="deleteLoanProduct({{ $product->id }})" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                                </svg>
                            </a>
                            <a title="Edit" href="{{ route('system-edit', ['page' => 'loan-product', 'item_id' => $product->id]) }}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                                    <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001"/>
                                </svg>
                            </a>
                        </td>
                    </tr>
                    @empty
                        
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>