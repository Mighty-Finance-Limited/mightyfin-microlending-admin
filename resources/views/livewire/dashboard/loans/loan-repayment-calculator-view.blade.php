<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-6 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Repayment Calculator</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                                <div class="row">
                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">Loan Amount</label>
                                        <div class="input-group mb-3 input-primary">
                                            <span class="input-group-text border-0">K</span>
                                            <input type="number" wire:model.defer="principal" wire:change="calculatePaybackAmount" class="form-control" placeholder="0">
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">Interest Rate</label>
                                        <div class="input-group mb-3 input-primary">
                                            <input disabled type="number" wire:model.defer="rate" wire:change="calculatePaybackAmount" class="form-control" placeholder="0">
                                            <span class="input-group-text border-0">%</span>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">Remaining Time</label>
                                        <div class="input-group mb-3 input-primary">
                                            <input type="number" wire:model.defer="duration" wire:change="calculatePaybackAmount" class="form-control" placeholder="1">
                                            <span class="input-group-text border-0">Months</span>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox">
                                        <label class="form-check-label">
                                            Save loan rate
                                        </label>
                                    </div>
                                </div>
                                <button wire:click="calculatePaybackAmount" class="btn btn-square btn-primary">Calculate Replayment</button>
                            --}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-xxl-6 col-lg-6 col-sm-6">
                <div class="widget-stat card">
                    <div class="card-body  p-4">
                        <div class="media ai-icon">
                            <span class="me-3 bgl-danger text-danger">
                                <svg id="icon-revenue" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign">
                                    <line x1="12" y1="1" x2="12" y2="23"></line>
                                    <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                                </svg>
                            </span>
                            <div class="media-body">
                                <p class="mb-1">Total amount to be repaid (with interest):</p>
                                <h4 class="mb-0">{{ $result }}K</h4>
                                <span class="badge badge-danger">+{{ $rate * $duration }}% Total Interest</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="flotLine1" class="flot-chart"></div>
            </div>
        </div>
    </div>
</div>
