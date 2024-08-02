<div wire:ignore.self class="content-body">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header border-0 pb-0">
                <h4 class="card-title">Loan Reports</h4>
                <div>
                    <button wire:click="exportReportExcel()" title="Export Report to Excel" class="btn btn-square btn-success">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-spreadsheet" viewBox="0 0 16 16">
                            <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V9H3V2a1 1 0 0 1 1-1h5.5v2zM3 12v-2h2v2H3zm0 1h2v2H4a1 1 0 0 1-1-1v-1zm3 2v-2h3v2H6zm4 0v-2h3v1a1 1 0 0 1-1 1h-2zm3-3h-3v-2h3v2zm-7 0v-2h3v2H6z"/>
                          </svg>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="col-xl-12">
                    <div class="filter cm-content-box box-primary"> 
                        <div class="cm-content-body form excerpt">
                            <div class="card-body">
                                <div class="row">
                                    {{-- <div class="col-xl-3">
                                        <input type="text" class="form-control mb-xl-0 mb-3" id="exampleFormControlInput1" placeholder="Title">
                                    </div> --}}
                                    <div wire:ignore class="col-xl-3">
                                        <label>Report Type</label>
                                        <select wire:model="type" class="from-select w-100 mb-xl-0 mb-3" aria-label="Default select example">
                                            <option selected>Select Report Type</option>
                                            <option value="1">Early Settlements Report (Closed)</option>
                                            <option value="2">Late Settlements Report (Closed)</option>
                                        </select> 
                                    </div>
                                    <div class="col-xl-3">
                                        <label>Start Date</label>
                                        <input type="date" wire:model="start_date" name="datepicker" class=" form-control mb-xl-0 mb-3">
                                    </div>
                                    <div class="col-xl-3">
                                        <label>End Date</label>
                                        <input type="date" wire:model="end_date" name="datepicker" class=" form-control mb-xl-0 mb-3">
                                    </div>
                                    <div class="col-xl-3">
                                        <button class="btn btn-info mt-4" wire:click="reportReport()" title="Click here to Search" type="button"><i class="fa fa-search me-1"></i>Filter</button>
                                        {{-- <button class="btn btn-light" title="Click here to remove filter" type="button">Remove Filter</button> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                {{-- Results --}}
                <div wire:ignore.self class="table-responsive">
                    
                    <table wire:ignore.self id="example5" class="display" style="min-width: 845px; position:relative;">
                        <thead>
                            <tr>
                                {{-- <th>
                                    <div class="form-check custom-checkbox ms-2">
                                        <input type="checkbox" class="form-check-input" id="checkAll" required="">
                                        <label class="form-check-label" for="checkAll"></label>
                                    </div>
                                </th> --}}
                                <th>Loan #.</th>
                                <th>Borrower</th>
                                <th>Loan Type</th>
                                <th>Principal</th>
                                <th>Interest(%)</th>
                                <th>Due</th>
                                <th>Paid</th>
                                <th>Last Payment</th>
                                <th>Status</th>
                                <th>Due Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody style="top:0; padding-bottom:20px">
                            
                            @forelse($results as $loan)
                            <tr>
                                {{-- <td>
                                    <div class="form-check custom-checkbox ms-2">
                                        <input type="checkbox" class="form-check-input" id="customCheckBox2" required="">
                                        <label class="form-check-label" for="customCheckBox2"></label>
                                    </div>
                                </td> --}}
                                <td style="text-align:center;">L{{ $loan->application->id }}</td>
                                <td style="text-align:center;">{{ $loan->application->fname.' '. $loan->application->lname }}</td>
                                <td style="text-align:center;">{{ $loan->application->type }} Loan</td>
                                <td style="text-align:center;">{{ $loan->application->amount }}</td>
                                <td style="text:align:center;">
                                    @if($loan->repayment_plan > 1)
                                    44%
                                    @else
                                    20%
                                    @endif
                                </td>
                                <td style="text:align:center;">
                                    @if($loan->application->status == 1)
                                    {{ App\Models\Loans::loan_balance($loan->application->id)}}
                                    @else
                                    0
                                    @endif
                                </td>
                                <td style="">{{ App\Models\Loans::loan_settled($loan->application->id)}}</td>
                                <td>
                                    @php 
                                        $date_str = $loan->final_due_date;
                                        $date = DateTime::createFromFormat('Y-m-d H:i:s', $date_str);
                                        echo $date->format('F j, Y, g:i a');
                                    @endphp  
                                </td>
                                <td>
                                    <span class="badge badge-sm light badge-success">
                                        <i class="fa fa-circle text-success me-1"></i>
                                        Closed
                                    </span>
                                </td>
                                <td style="">{{ $loan->created_at->toFormattedDateString() }}</td>
                                <td class="d-flex">
                                    {{-- @can('view loan details') --}}
                                    <div class="btn sharp btn-light tp-btn ms-auto">
                                        <a href="{{ route('loan-details',['id' => $loan->id]) }}">  
                                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                            </svg>                                                
                                        </a>
                                    </div>
                                    {{-- @endcan	 --}}

                                    &nbsp;
                                </td>	
                            </tr>
                            
                            @empty
                            <div class="intro-y col-span-12 md:col-span-6">
                                <div class="box text-center">
                                    <p>Nothing Found.</p>
                                </div>
                            </div>
                            @endforelse
                            <tr style="height: 15vh">
                            
                            </tr>
                            
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
