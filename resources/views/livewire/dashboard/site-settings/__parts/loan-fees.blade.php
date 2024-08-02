<style>
    #loading-spinner {
        display: none;
    }
</style>

<div class="card mb-5 mb-xl-8">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bold fs-3 mb-1">Loan Fees</span>
            <span class="text-muted mt-1 fw-semibold fs-7">Over {{ $loan_fees->count() }} loan fees</span>
        </h3>
        <div class="card-toolbar">
            <a href="{{ route('system-create', ['page' => 'loan-fees']) }}" class="btn btn-sm btn-light-primary">
            <i class="ki-duotone ki-plus fs-2"></i>New</a>
        </div>
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
                        <th class="ps-4 min-w-205px rounded-start">Name</th>
                        <th class="min-w-100px">Amount</th>
                        <th class="min-w-100px">Status</th>
                        <th class="min-w-100px">Created on</th>
                        <th class="min-w-100px text-end rounded-end"></th>
                    </tr>
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody>
                    @forelse ($loan_fees as $item)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-label bg-light-danger symbol-50px me-5">
                                </div>
                                <div class="d-flex justify-content-start flex-column">
                                    <a href="#" class="text-dark fw-bold text-hover-primary mb-1 fs-6">{{ $item->name }}</a>
                                    <span class="text-muted fw-semibold text-muted d-block fs-7">{{ $item->name }}</span>
                                </div>
                            </div>
                        </td>
                        <td>
                            @if ($item->status == 1)
                            <span class="badge badge-light-success fs-7 fw-bold">Active</span>
                            @else
                            <span class="badge badge-light-dark fs-7 fw-bold">Disabled</span>
                            @endif
                        </td>
                        <td>
                            
                            <div class="d-flex justify-content-start flex-column">
                                <span class="fw-bold text-primary d-block fs-7">K {{ $item->value }}</span>
                            </div>
                            
                        </td>
                        <td>
                            <div class="d-flex justify-content-start flex-column">
                                <span class="text-dark fw-bold text-hover-primary mb-1 fs-6">
                                    {{ $item->created_at->toFormattedDateString() }}
                                </span>
                            </div>
                        </td>
                        <td class="text-end">
                            <a title="Delete" wire:click="deleteLoanFee({{ $item->id }})" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                                </svg>
                            </a>
                            <a title="Edit" href="{{ route('system-edit', ['page' => 'loan-fees', 'item_id' => $item->id]) }}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
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