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
                                     <h4 class="number">Loan Rates</h4>
                                     <div class="d-flex align-items-center justify-content-between">
                                        <div class="prim-info">
                                            <span>Active Rate</span>
                                            <h4>0%</h4>
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
                                     <h2 class="heading mb-0">Loan Rates</h2>
                                </div>
                                <div class="card-body p-0 pb-3">
                                    @forelse($rates as $rate)
                                        <div class="recent-info">
                                            <div class="recent-content">
                                                    <div class="user-name d-flex">
                                                        @if($rate->type == 'f')
                                                        <span>K</span>
                                                        @endif
                                                        <h6>{{ $rate->value }}</h6>
                                                        @if($rate->type == 'p')
                                                        <span>%</span>
                                                        @endif
                                                        
                                                    </div>
                                            </div>

                                            <div class="count">
                                                <div class="toggle">
                                                    <input type="checkbox" id="toggle_wifi" {{ $rate->status === 1 ? 'checked' : '' }} >
                                                    <label class="toggle__bar"
                                                            for="toggle_wifi">
                                                        <span class="toggle__handle"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                    <div class="recent-info">
                                        <h6>No recent transactions</h6>
                                    </div>
                                    @endempty
                                    <div class="p-4">
                                        <button class="btn btn-primary btn-square" data-bs-toggle="modal" data-bs-target="#loanWalletFundsModal" >Add Loan Rate</button>
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
                <div class="modal-header">
                    <h5 class="modal-title">Add Loan Rate </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                
                <form method="POST" wire:submit.prevent="store()">
                    <div class="modal-body">
                        <div class="col-xl-12 col-lg-12">
                            <div class="card">
                                <div class="basic-form">
                                    @csrf
                                    <div class="mb-3">
                                        <input class="form-control" wire:model.defer="value" value="{{ old('value') }}" type="text" placeholder="0">
                                    </div>
                                    <div class="mb-3">
                                        <select class="form-control" wire:model.defer="type">
                                            <option value="p">Percentage</option>
                                            <option value="f">Fixed</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" data-bs-dismiss="modal" class="btn btn-primary">Save changes</button>
                    </div>  
                </form>
            </div>
        </div>
    </div>
</div>
<style>
/* Toggle Style */

.toggle {
  --toggle-height: 32px;
  
  --toggle-bar-color: #707070;
  --toggle-active-color: #00bf23;
  --toggle-handle-color: #ffffff;
}

.toggle > input[type="checkbox"] {
  display:none;
}

.toggle__bar {
  display: flex;
  align-items: center;
  
  height: 12px; /* default */
  min-height: var(--toggle-height);
  aspect-ratio: 1.75 / 1;
  border-radius: 25% / 50%;
  
  background-color: var(--toggle-bar-color);
  
  transition: all 0.2s ease-in-out;
  cursor: pointer;
  -webkit-tap-highlight-color: transparent;
}

.toggle__handle {
  display:block;
  
  height: inherit;
  min-height: var(--toggle-height);
  aspect-ratio: 1 / 1;
  border-radius: 50%;
  transform: scale(0.8);
  
  background-color: var(--toggle-handle-color);
  box-shadow: 1px 1px 15px -2px rgba(0,0,0,0.75);
  
  transition: all 0.1s ease-in-out;
}

.toggle > input[type="checkbox"]:checked + .toggle__bar {
  background-color: 
    var(--toggle-active-color);
}

.toggle > input[type="checkbox"]:checked + .toggle__bar > .toggle__handle {
  box-shadow: 
    -1px 1px 15px -2px rgba(0,0,0,0.75);
  
  transform: translateX(74%) scale(0.8);
}

/* End Toggle Style */
</style>


