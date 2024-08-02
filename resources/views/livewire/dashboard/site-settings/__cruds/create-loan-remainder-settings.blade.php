<style>
    #loading-spinner {
        display: none;
    }
</style>

<div class="card mb-5 mb-xl-8">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bold fs-3 mb-1">Loan Products</span>
            <span class="text-muted mt-1 fw-semibold fs-7">Over {{ $loan_products->count() }} loan products</span>
        </h3>
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body py-3">
        @include('livewire.dashboard.__parts.dash-alerts')
        <!--begin::Table container-->
        <div class="table-responsive">
            <!--begin::Table-->
            <table class="table align-middle gs-0 gy-4">
                <!--begin::Table head-->
                <thead>
                    <tr class="fw-bold text-muted bg-light">
                        <th class="ps-4 min-w-205px rounded-start">Loan Description</th>
                        <th class="min-w-100px">Status</th>
                        <th class="min-w-200px text-end rounded-end px-3">Action</th>
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
                                    <a href="#" class="text-dark fw-bold text-hover-primary mb-1 fs-6">{{ $product->name }}</a>
                                    <span class="text-muted fw-semibold text-muted d-block fs-7">{{ $product->name }}</span>
                                </div>
                            </div>
                        </td>
                        <td>
                            @if ($product->status == 1)
                            <span class="badge badge-light-success fs-7 fw-bold">Active</span>
                            @else
                            <span class="badge badge-light-dark fs-7 fw-bold">Disabled</span>
                            @endif
                        </td>
                        <td class="text-end">
                            <button class="btn btn-primary" href="{{ route('system-edit', ['page' => 'loan-product', 'item_id' => $product->id]) }}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-alarm-fill" viewBox="0 0 16 16">
                                    <path d="M6 .5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H9v1.07a7.001 7.001 0 0 1 3.274 12.474l.601.602a.5.5 0 0 1-.707.708l-.746-.746A6.97 6.97 0 0 1 8 16a6.97 6.97 0 0 1-3.422-.892l-.746.746a.5.5 0 0 1-.707-.708l.602-.602A7.001 7.001 0 0 1 7 2.07V1h-.5A.5.5 0 0 1 6 .5m2.5 5a.5.5 0 0 0-1 0v3.362l-1.429 2.38a.5.5 0 1 0 .858.515l1.5-2.5A.5.5 0 0 0 8.5 9zM.86 5.387A2.5 2.5 0 1 1 4.387 1.86 8.04 8.04 0 0 0 .86 5.387M11.613 1.86a2.5 2.5 0 1 1 3.527 3.527 8.04 8.04 0 0 0-3.527-3.527"/>
                                </svg>
                                <span>
                                    Remainder Settings
                                </span>
                            </button>
                        </td>
                    </tr>
                    @empty
                        
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>