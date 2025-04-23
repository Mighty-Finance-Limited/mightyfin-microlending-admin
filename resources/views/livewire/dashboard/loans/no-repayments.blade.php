<div class="content">
    @include('livewire.dashboard.loans.__parts.index-loan-crum')
    {{-- @dd($loan_requests?->toArray()) --}}
    <div class="col-12">
        @if(!empty($loan_requests?->toArray()))
            @include('livewire.dashboard.loans.__parts.staff-loan-request-table')
        @else
            <div class="container m-12 d-flex justify-content-center align-items-center">
                <div class="text-center col-12">
                    <img width="300" src="{{ asset('public/mfs/admin/assets/media/illustrations/sigma-1/loan.png')}}" alt="">
                    <p>Empty</p>
                </div>
            </div>
        @endif
    </div>
</div>
