<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl">
            @include('livewire.dashboard.loans.__parts.head-processing-wizard')
            @include('livewire.dashboard.loans.__parts.body-processing-wizard')
        </div>
    </div>
    
    @if(true)
    {{-- @dd(strtolower($current->status)) --}}
    @switch(strtolower($current->stage))
        @case('processing')
            @switch(strtolower($current->status))
                @case('reviewing')
                    @include('livewire.dashboard.loans.__stages.processing.reviewing')
                @break
                @case('verification')
                    @include('livewire.dashboard.loans.__stages.processing.verification')
                @break
                @case('approval')
                    @include('livewire.dashboard.loans.__stages.processing.approval')
                @break
                @case('disbursements')
                    @include('livewire.dashboard.loans.__stages.processing.disbursements')
                @break
                @default
                    @include('livewire.dashboard.loans.__stages.processing.reviewing')
                @break
            @endswitch
        @break

        @case('open')
            @switch(strtolower($current->status))
                @case('current loan')
                    @include('livewire.dashboard.loans.__stages.open.current-loan')
                @break
                @default
                    @include('livewire.dashboard.loans.__stages.open.current-due-today')
                @break
            @endswitch
        @break

        @case('denied')
            @switch(strtolower($current->status))
                @case('incomplet kyc')
                    @include('livewire.dashboard.loans.__stages.denied.incomplete-kyc')
                @break
                @case('incomplete crb')
                    @include('livewire.dashboard.loans.__stages.denied.incomplete-crb')
                @break
                @case('bad credit score')
                    @include('livewire.dashboard.loans.__stages.denied.bad-credit-score')
                @break
                @case('Financial Risk')
                    @include('livewire.dashboard.loans.__stages.denied.financial-risk')
                @break
                @default
                    @include('livewire.dashboard.loans.__stages.denied.fraud')
                @break
            @endswitch
        @break

        @default
        <div class="modal fade show" id="kt_modal_decline_warning" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <div class="modal-content">
                    <div class="py-2 modal-body">
                        <div class="mb-2 settings">
                            <div class="text-danger">
                                <h1 class="font-bold text-info fw-bold">No Loan Products or Loan Product has no statuses </h1>
                                <p>Note: This loan is current active and is pending for repayment has collection.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @break
    @endswitch
    @else
    @include('livewire.dashboard.loans.__stages.denied.incomplete-kyc')
    @endif

    @include('livewire.dashboard.loans.__modals.rollback-warning')
    @include('livewire.dashboard.loans.__modals.review-warning')
    @include('livewire.dashboard.loans.__modals.decline-loan')
</div>
