<div class="content-body">
    <div class="container-fluid">
        <div class="col-xl-12">
            <div class="row">
                <!--column-->
                <div class="col-md-6 col-xl-6 col-xxl-12">
                    <div class="row">
                         <!--column-->
                        <div class="col-xl-12">
                             <div class="card prim-card">
                                 <div class="card-body py-3">
                                     <h4 class="number">Loan Wallet Balance</h4>
                                     <div class="d-flex align-items-center justify-content-between">
                                        <div class="prim-info">
                                            <span>Current</span>
                                            <h4>K {{ $current_funds ?? 0 }}</h4>
                                        </div>
                                        <div class="prim-info">
                                            <span>Inital Total</span>
                                            <h4>K {{ $gross_funds ?? 0 }}</h4>
                                        </div>
                                        <div class="prim-info">
                                        </div>
                                         <div class="master-card">
                                             <svg width="55" height="35" viewBox="0 0 55 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                 <circle opacity="0.5" cx="17.5" cy="17.5" r="17.5" fill="#FCFCFC"/>
                                                 <circle opacity="0.5" cx="37.5" cy="17.5" r="17.5" fill="#FCFCFC"/>
                                             </svg>	
                                             <span class="text-white d-block mt-1">Loan Wallet</span>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                        </div>
                     <!--/column-->
                      <!--column-->
                        <div class="col-xl-12">
                            @include('livewire.dashboard.__parts.dash-alerts')
                            <div class="card recent-activity">
                                <div class="card-header pb-0 border-0 pt-3">
                                     <h2 class="heading mb-0">Recent Updates</h2>
                                </div>
                                <div class="card-body p-0 pb-3">
                                    @forelse($history as $hist)
                                        <div class="recent-info">
                                            <div class="recent-content">
                                                <span class="recent_icon">
                                                    {{-- <svg width="24" height="20" viewBox="0 0 24 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M20.0038 0.857117H4.00377C3.09445 0.857117 2.22238 1.21834 1.5794 1.86132C0.936419 2.5043 0.575195 3.37637 0.575195 4.28569V15.7143C0.575195 16.6236 0.936419 17.4956 1.5794 18.1386C2.22238 18.7816 3.09445 19.1428 4.00377 19.1428H20.0038C20.9131 19.1428 21.7852 18.7816 22.4281 18.1386C23.0711 17.4956 23.4323 16.6236 23.4323 15.7143V4.28569C23.4323 3.37637 23.0711 2.5043 22.4281 1.86132C21.7852 1.21834 20.9131 0.857117 20.0038 0.857117ZM2.86091 4.28569C2.86091 3.98258 2.98132 3.69189 3.19565 3.47757C3.40997 3.26324 3.70066 3.14283 4.00377 3.14283H20.0038C20.3069 3.14283 20.5976 3.26324 20.8119 3.47757C21.0262 3.69189 21.1466 3.98258 21.1466 4.28569V5.42854H2.86091V4.28569ZM21.1466 15.7143C21.1466 16.0174 21.0262 16.3081 20.8119 16.5224C20.5976 16.7367 20.3069 16.8571 20.0038 16.8571H4.00377C3.70066 16.8571 3.40997 16.7367 3.19565 16.5224C2.98132 16.3081 2.86091 16.0174 2.86091 15.7143V7.71426H21.1466V15.7143Z" fill="#FCFCFC"/>
                                                        <path d="M5.14676 11.1429H7.43248C7.73558 11.1429 8.02627 11.0225 8.2406 10.8081C8.45493 10.5938 8.57533 10.3031 8.57533 10C8.57533 9.6969 8.45493 9.40621 8.2406 9.19188C8.02627 8.97756 7.73558 8.85715 7.43248 8.85715H5.14676C4.84366 8.85715 4.55297 8.97756 4.33864 9.19188C4.12431 9.40621 4.00391 9.6969 4.00391 10C4.00391 10.3031 4.12431 10.5938 4.33864 10.8081C4.55297 11.0225 4.84366 11.1429 5.14676 11.1429Z" fill="#FCFCFC"/>
                                                    </svg> --}}
                                                </span>
                                                <div class="user-name">
                                                    <h6>{{ $hist->desc }}</h6>
                                                    <span>{{ $hist->created_at->toFormattedDateString() }}</span>
                                                </div>
                                            </div>
                                            <div class="count">
                                                <span>+ K{{ $hist->amount }}</span>
                                            </div>
                                        </div>
                                    @empty
                                    <div class="recent-info">
                                        <h6>No recent transactions</h6>
                                    </div>
                                    @endempty
                                    <div class="p-4">
                                        <button class="btn btn-primary btn-square" data-toggle="modal" data-target="#loanWalletFundsModal" >
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-wallet2 text-white" viewBox="0 0 16 16">
                                                <path d="M12.136.326A1.5 1.5 0 0 1 14 1.78V3h.5A1.5 1.5 0 0 1 16 4.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 13.5v-9a1.5 1.5 0 0 1 1.432-1.499L12.136.326zM5.562 3H13V1.78a.5.5 0 0 0-.621-.484L5.562 3zM1.5 4a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"/>
                                            </svg>
                                            Update Loan Wallet Funds
                                        </button>
                                        @if($current_funds > 0)
                                        <button
                                            wire:click="reverseFunds()" onclick="confirm('The last updated amount will be deducted from wallet funds, Are you sure you want to continue?') || event.stopImmediatePropagation();"
                                            class="btn btn-info btn-square"
                                        >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-counterclockwise" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2v1z"/>
                                            <path d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466z"/>
                                        </svg>
                                        Reverse
                                        </button>
                                        <button
                                            wire:click="resetWallet()" onclick="confirm('The wallet will be set to ZMW 0, Are you sure you want continue with the action?') || event.stopImmediatePropagation();"
                                            class="btn btn-danger btn-square"
                                        >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-repeat" viewBox="0 0 16 16">
                                            <path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z"/>
                                            <path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z"/>
                                        </svg>
                                        Reset</button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                     <!--/column-->
                    </div>

                </div>
             <!--/column-->
            </div>
        </div>
    </div>


    <div wire:ignore class="modal fade" id="loanWalletFundsModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="bg-primary modal-header">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-wallet2 text-white" viewBox="0 0 16 16">
                        <path d="M12.136.326A1.5 1.5 0 0 1 14 1.78V3h.5A1.5 1.5 0 0 1 16 4.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 13.5v-9a1.5 1.5 0 0 1 1.432-1.499L12.136.326zM5.562 3H13V1.78a.5.5 0 0 0-.621-.484L5.562 3zM1.5 4a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"/>
                    </svg>
                    &nbsp;
                    <h5 style="color:#fff" class="modal-title">Update Wallet Funds </h5>
                    <button type="button" class="btn-close" data-dismiss="modal">
                    </button>
                </div>
                
                <form method="POST" wire:submit.prevent="store()">
                    <div class="modal-body">
                        <div class="col-xl-12 col-lg-12">
                            <div class="card">
                                <div class="basic-form">
                                    @csrf
                                    <div class="mb-3">
                                        <input class="form-control" wire:model.defer="amount" value="{{ old('amount') }}" type="text" placeholder="Amount">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-square light" data-dismiss="modal">Close</button>
                        <button id="update-loan-wallet-toastr-success-bottom-left" type="submit" class="btn btn-primary btn-square">Save changes</button>
                    </div>  
                </form>
            </div>
        </div>
    </div>
</div>

