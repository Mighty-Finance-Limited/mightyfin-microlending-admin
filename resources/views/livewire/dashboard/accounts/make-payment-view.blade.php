<div class="content d-flex flex-column flex-column-fluid">
        <style>
            /* Hide the default checkbox */
            input[type="radio"] {
                display: none;
            }

            label.checkbox{
                display: inline-block;
                width: 50px;
                height: 50px;
                background-size: cover;
                background-repeat: no-repeat;
                cursor: pointer;
            }

            /* Set default background images for each checkbox */
            #checkbox1:not(:checked) + label.checkbox {
                background-image: url("data:image/png;base64,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");
            }

            #checkbox2:not(:checked) + label.checkbox {
                background-image: url("data:image/png;base64,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");
            }

            #checkbox3:not(:checked) + label.checkbox {
                background-image: url("data:image/png;base64,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");
            }
        
            /* Add different background images for each checkbox state */
            #checkbox1:checked + label.checkbox {
                border: 3px solid #5c1b99;
                background-image: url("data:image/png;base64,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");
            }
        
            #checkbox2:checked + label.checkbox {
                border: 3px solid #5c1b99;
                background-image: url("data:image/png;base64,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");
            }
        
            #checkbox3:checked + label.checkbox {
                border: 3px solid #5c1b99;
                background-image: url("data:image/png;base64,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");
            }
      </style>
        <div class="container-fluid">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold fs-3 mb-1">Recent Loan Requests</span>
                            <span class="text-muted mt-1 fw-semibold fs-7">Over {{$transactions->count()}} loans</span>
                        </h3><div class="card-toolbar">
                            <button type="button" class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                <i class="ki-duotone ki-category fs-6">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                    <span class="path4"></span>
                                </i>
                            </button>
                            
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true">
    
                                <div class="menu-item px-3">
                                    <div class="menu-content fs-6 text-dark fw-bold px-3 py-4">Quick Actions</div>
                                </div>
                                
                                <div class="separator mb-3 opacity-75"></div>
                                
                                <div class="menu-item px-3">
                                    <a href="#" title="Export to Excel" wire:click="exportTransanctions()" class="menu-link px-3">
                                        Export to Excel &nbsp;
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-spreadsheet" viewBox="0 0 16 16">
                                            <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V9H3V2a1 1 0 0 1 1-1h5.5v2zM3 12v-2h2v2H3zm0 1h2v2H4a1 1 0 0 1-1-1v-1zm3 2v-2h3v2H6zm4 0v-2h3v1a1 1 0 0 1-1 1h-2zm3-3h-3v-2h3v2zm-7 0v-2h3v2H6z"/>
                                        </svg>
                                    </a>
                                </div>
                                
                                <div class="menu-item px-3">
                                    <button data-bs-toggle="modal" data-bs-target="#makeLoanRepayment"  href="#" title="Make a loan repayment" class="btn btn-sm px-3">
                                        Make Loan Repayment &nbsp;
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-wallet2" viewBox="0 0 16 16">
                                            <path d="M12.136.326A1.5 1.5 0 0 1 14 1.78V3h.5A1.5 1.5 0 0 1 16 4.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 13.5v-9a1.5 1.5 0 0 1 1.432-1.499zM5.562 3H13V1.78a.5.5 0 0 0-.621-.484zM1.5 4a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5z"/>
                                        </svg>
                                    </button>
                                </div>
                                
                                <div class="separator mt-3 opacity-75"></div>
                                
                                <div class="menu-item px-3">
                                    <div class="menu-content px-3 py-3">
                                        <a class="btn btn-primary btn-sm px-4" href="#">Generate Reports</a>
                                    </div>
                                </div>
                                
                            </div>
                            
                        </div>
                    </div>

                    <div class="card-body pb-0">
                        <div class="table-responsive patient">
                            <div class="col-xl-12">
                                <div class="alert alert-dark alert-dismissible fade show">
                                    <button type="button" class="btn-close" data-dismiss="alert" aria-label="btn-close"><span><i class="fa-solid fa-xmark"></i></span>
                                    </button>
                                    <div class="media">
                                        <div class="media-body">
                                            <small class="mb-0">List of payment and repayment transactions. Record loan repayments</small>
                                        </div>
                                    </div>
                                </div>
                                @if (session()->has('amount_invalid'))
                                    <div class="alert alert-danger">
                                        {{ session('amount_invalid') }}
                                    </div>
                                @endif
                            </div>
                            <table wire:ignore.self id="example5" class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3">
                                <thead>
                                    <tr class="fw-bold text-muted">
                                        {{-- <th>ID.</th> --}}
                                        <th>Ref</th>
                                        <th>Loan</th>
                                        <th>Borrower</th>
                                        <th>Total Collectable</th>
                                        <th>Amount Paid</th>
                                        <th>Balance</th>
                                        <th>Processed By</th>
                                        <th>Created On</th>
                                        <th> </th>
                                    </tr>
                                </thead>
                                <tbody style="top:0; padding-bottom:20px">
                                    
                                    @forelse($transactions as $data)
                                    <tr>
                                        {{-- <td style="">{{ $data->id }}</td> --}}
                                        <td style="text-align:center;">{{ $data->ref_no ?? $data->application_id }}</td>
                                        <td style="text-align:center;">{{ $data->application->type }} Loan</td>
                                        <td style="text-align:center;">{{ $data->application->fname.' '.$data->application->lname }}</td>
                                        
                                        <td style="text-align:center;">K{{ App\Models\Application::payback($data->application->amount, $data->application->repayment_plan) }}</td>
                                        <td style="text-align:center;">K{{ $data->amount_settled }}</td>
                                        <td style="text-align:center;">K{{ App\Models\Loans::loan_balance( $data->application->id) }}</td>
                                        <td style="text-align:center;">{{ $data->proccess_by ?? '' }}</td>
                                        <td style="text-align:center;">{{ $data->created_at->toFormattedDateString() }}</td>
                                        <td class="d-flex">
                                            <div class="btn sharp tp-btn ms-auto" title="View More Details">
                                                <a target="_blank" href="{{ route('loan-details',['id' => $data->application_id]) }}">  
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                                    </svg>                                                
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <div class="intro-y col-span-12 md:col-span-6">
                                        <div class="box text-center">
                                            <p>Nothing Found.</p>
                                        </div>
                                    </div>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div wire:ignore class="modal fade" id="makeLoanRepayment" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <form wire:submit.prevent="makepayment()" class="modal-content">
                    <div class="modal-header ">
                        <h5 class="modal-title">Make Loan Repayment</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="fs-5 fw-bold">Payment Method</p>
                        <div class="form-group flex gap-3">
                            <input type="radio" wire:model.defer="payment_method" id="checkbox1">
                            <label for="checkbox1" class="checkbox"></label>
                            
                            <input type="radio" wire:model.defer="payment_method" id="checkbox2">
                            <label for="checkbox2" class="checkbox"></label>
                            
                            <input type="radio" wire:model.defer="payment_method" id="checkbox3">
                            <label for="checkbox3" class="checkbox"></label>
                        </div>
                        <br>
                        <p class="fs-5 fw-bold">Loan Application</p>
                        <div class="form-group">
                            <select wire:model.defer="loan_id" class="form-select uppercase form-control wide mb-3" id="exampleInputEmail7" placeholder="Find Customer" data-live-search="true">
                                @forelse ($loans as $item)
                                <option value="{{ $item->id }}">{{ $item->application->fname.' '.$item->application->lname.' | K'.App\Models\Loans::loan_balance($item->application->id).' - '.$item->application->type.' Loan'.' | Duration '.$item->application->repayment_plan}}</option>
                                @empty
                                <option>No Active Loans Found</option>
                                @endforelse
                            </select>
                        </div>
                        <br>
                        <p class="fs-5 fw-bold">Amount</p>
                        <div class="form-group">
                            <input wire:model.defer="amount" type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" data-dismiss="modal" class="btn btn-primary">Make Payment</button>
                    </div>
                </form>
            </div>
        </div>
</div>