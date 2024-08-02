<div class="content-body">
    <div class="container-fluid">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Withdraw Requests</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        @include('livewire.dashboard.__parts.dash-alerts')
                        <div wire:ignore.selfm class="col-xl-12">
                            <div class="alert alert-dark alert-dismissible fade show">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"><span><i class="fa-solid fa-xmark"></i></span>
                                </button>
                                <div class="media">
                                    <div class="media-body">
                                        <small class="mb-0">Withrawal requests submitted by customers, accept and withdraw requested funds from customer's wallet.</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table wire:ignore.self wire:poll id="example3" class="display">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Withdraw Code</th>
                                    <th>Payment Method</th>
                                    <th>Date Sent</th>
                                    <th>Amount</th>
                                    <th>Status</th>

                                    {{-- <th>Actions</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($requests as $req)
                                <tr style="cursor:pointer" data-bs-toggle="modal" wire:click="viewDetailModal({{$req->id}})" data-bs-target="#WithdrawrequestModal">
                                    <td>{{ $req->user->fname.' '.$req->user->lname }}</td>
                                    <td><span class="badge badge-primary">{{ $req->ref ?? 'invalid' }}</span></td>
                                    <td>{{ $req->card_number ?? $req->mobile_number ?? 'Cash'}}</td>
                                    <td>{{ $req->created_at->toFormattedDateString() }}</td>
                                    <td class="color-primary">K {{ $req->amount }}</td>
                                    <td class="color-primary">
                                        @if($req->status === 1)
                                        <span class="badge badge-success">Successfully Approved & Withdrawn</span>
                                        @else 
                                        <span class="badge badge-danger">Pending</span>
                                        @endif
                                    </td>

                                    {{-- <td class="d-flex">
                                        <button class="btn btn-primary btn-square" wire:click='acceptTransaction({{$req->id}})'>
                                            Accept
                                        </button>
                                    </td> --}}
                                </tr>
                                @empty
                                    
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@if(!empty($requests->toArray()))
    <div wire:ignore.self wire:poll class="modal fade bd-example-modal-lg" id="WithdrawrequestModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="container" style="color:black">
                    <div class="title-sm">
                        <h5>{{ $name ?? 'Customer' }}</h5>
                    </div>
                    <div class="product-detail-content">
                        <div class="new-arrival-content pr">
                            <p> 
                                {{ $message.' from '.$name.'. Reference#:'.$reference_no }}
                                
                            </p>
                            <p>Payment method: {{ $payment_method }}</p>
                        </div>
                    </div>
                    @can('accept and reject loan requests')
                        @if($status !== 1)
                            <button 
                            class="btn btn-primary btn-square mb-3" 
                            wire:click='acceptTransaction({{$req_id}})'
                            data-bs-dismiss="modal"
                            id="withdraw-approved-toastr-success-bottom-left"
                            >
                                Accept Withdraw
                            </button>
                        @endif
                    @endcan
                </div>
            </div>
        </div>
    </div>
@endif
</div>
