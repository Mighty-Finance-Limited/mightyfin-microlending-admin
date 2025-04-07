<div class="content-body col-lg-12">
    <div class="container-fluid col-lg-12">
        <div class="row">
            <div class="col-lg-12">
                @if(!empty($loan_requests->toArray()))
                    <div class="card-body pb-0" style="padding-bottom: 30%">
                        @include('livewire.dashboard.loans.__parts.staff-loan-request-table')
                    </div>
                @else
                    <div class="container m-12 d-flex justify-content-center align-items-center">
                        <div class="col-12 text-center">
                            <img width="300" src="{{ asset('public/mfs/admin/assets/media/illustrations/sigma-1/loan.png')}}" alt="">
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
