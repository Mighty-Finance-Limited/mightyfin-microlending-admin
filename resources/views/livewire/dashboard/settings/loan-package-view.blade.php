<div class="content-body">
    <div class="container-fluid">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Loan Packages</h4>                
                    <button data-toggle="modal" data-target="#newloanpackage" class="btn btn-square btn-primary">New Loan Package</button>
                </div>
                
                <div class="card-body pb-0">

                    @if($state === 'table')
                    <div class="table-responsive">
                        @include('livewire.dashboard.__parts.dash-alerts')
                        <table class="table table-bordered verticle-middle table-responsive-sm">
                            <thead>
                                <tr>
                                    <th scope="col">Loan Package</th>
                                    <th scope="col">Borrower Usage</th>
                                    <th scope="col">Interest</th>
                                    <th scope="col">Added By</th>
                                    <th scope="col">Loan Contact</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($packages as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        <div class="progress" style="background: rgba(127, 99, 244, .1)">
                                            <div class="progress-bar bg-primary" style="width: 70%;" role="progressbar"><span class="sr-only">70% Complete</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>20%</td>
                                    <td>
                                        {{ $item->user->fname.' '.$item->user->lname }}
                                    </td>
                                    <td>
                                        <span class="badge badge-primary light">70%</span>
                                    </td>
                                    <td>
                                        <div class="toggle">
                                            <input type="checkbox" id="toggle_wifi" checked>
                                            <label class="toggle__bar"
                                                    for="toggle_wifi">
                                                <span class="toggle__handle"></span>
                                            </label>
                                        </div>
                                    </td>
                                    <td class="text-end">
                                        <span class="d-flex justify-content-end">
                                            <a href="javascript:void(0);" class="me-2 btn btn-primary shadow btn-xs sharp" data-toggle="tooltip"
                                                data-placement="top" title="Edit"><i class="fas fa-pencil-alt"></i> </a>
                                            <a href="javascript:void(0);" wire:click="destroy({{$item->id}})" class="btn btn-danger shadow btn-xs sharp" data-toggle="tooltip"
                                                data-placement="top" title="btn-close"><i class="fas fa-times text-white"></i></a>
                                        </span>
                                    </td>
                                </tr>
                                @empty
                                    
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                    @endif

                    @if($state === 'form')

                    @endif
                </div>


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
