<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    @include('livewire.dashboard.borrowers.breadcrums.index-borrowers-crum')
    @if(!empty($loan_requests->toArray()))
        <div class="pb-0 card-body">
            @include('livewire.dashboard.loans.__parts.staff-loan-request-table')
        </div>
    @else
        <div class="container m-12 d-flex justify-content-center align-items-center">
            <div class="text-center col-12">
                <img width="300" src="{{ asset('public/mfs/admin/assets/media/illustrations/sigma-1/loan.png')}}" alt="">
            </div>
        </div>
    @endif
</div>
