<div class="content d-flex flex-column flex-column-fluid">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold fs-3 mb-1">Past Maturity Date</span>
                            <span class="text-muted mt-1 fw-semibold fs-7">Over {{$loan_requests->count()}} Past Maturity Date</span>
                        </h3>
                        <div>
                            @can('view all loan requests')
                            <button wire:click="exportPMLoans()" title="Export to Excel" class="btn btn-square btn-success">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-spreadsheet" viewBox="0 0 16 16">
                                    <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V9H3V2a1 1 0 0 1 1-1h5.5v2zM3 12v-2h2v2H3zm0 1h2v2H4a1 1 0 0 1-1-1v-1zm3 2v-2h3v2H6zm4 0v-2h3v1a1 1 0 0 1-1 1h-2zm3-3h-3v-2h3v2zm-7 0v-2h3v2H6z"/>
                                  </svg>
                            </button>
                            <button onclick="printPMTable()" title="Export all to PDF" class="btn btn-square btn-warning">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filetype-pdf" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5ZM1.6 11.85H0v3.999h.791v-1.342h.803c.287 0 .531-.057.732-.173.203-.117.358-.275.463-.474a1.42 1.42 0 0 0 .161-.677c0-.25-.053-.476-.158-.677a1.176 1.176 0 0 0-.46-.477c-.2-.12-.443-.179-.732-.179Zm.545 1.333a.795.795 0 0 1-.085.38.574.574 0 0 1-.238.241.794.794 0 0 1-.375.082H.788V12.48h.66c.218 0 .389.06.512.181.123.122.185.296.185.522Zm1.217-1.333v3.999h1.46c.401 0 .734-.08.998-.237a1.45 1.45 0 0 0 .595-.689c.13-.3.196-.662.196-1.084 0-.42-.065-.778-.196-1.075a1.426 1.426 0 0 0-.589-.68c-.264-.156-.599-.234-1.005-.234H3.362Zm.791.645h.563c.248 0 .45.05.609.152a.89.89 0 0 1 .354.454c.079.201.118.452.118.753a2.3 2.3 0 0 1-.068.592 1.14 1.14 0 0 1-.196.422.8.8 0 0 1-.334.252 1.298 1.298 0 0 1-.483.082h-.563v-2.707Zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638H7.896Z"/>
                                  </svg>
                            </button>  
                            @endcan
                        </div>
                    </div>
                    <div class="card-body pb-0" style="padding-bottom: 30%">
                        <div id="pm_table_print_view" class="table-responsive patient">
                            <div wire:ignore class="actions-btns col-xl-12">
                                <div class="alert alert-dark alert-dismissible fade show">
                                    <button type="button" class="btn-close" data-dismiss="alert" aria-label="btn-close"><span><i class="fa-solid fa-xmark"></i></span>
                                    </button>
                                    <div class="media">
                                        <div class="media-body">
                                            <small class="mb-0">List of loan which have past their final due date.</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div wire:ignore  class="actions-btns row py-2">
                                @can('accept and reject loan requests')
                                {{-- <div class="col-xl-3 center">
                                    <select multiple wire:model.lazy="type" class="default-select form-control wide mt-3" aria-placeholder="Loan" placeholder="Loan Types">
                                        <option value="Personal">Personal</option>
                                        <option value="Education">Education</option>
                                        <option value="Asset Financing">Asset Financing</option>
                                        <option value="Home Improvement">Home Improvements</option>
                                        <option value="Agri Business">Agri Business</option>
                                        <option value="Women in Business (Femiprise) Soft">Women in Business</option>
                                    </select>
                                </div> --}}
                                @endcan
                            </div>
                            <table wire:ignore.self wire:poll.1000000ms id="example3" class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3">
                                <thead>
                                    <tr class="fw-bold text-muted">
                                        <th>Loan #.</th>
                                        <th>Borrower</th>
                                        <th>Loan Type</th>
                                        <th>Principal</th>
                                        <th>Due</th>
                                        <th>Paid</th>
                                        <th>Balance</th>
                                        <th>Last Payment</th>
                                        <th>Status</th>
                                        <th>Date Sent</th>
                                        
                                        <th class="actions-btns">Action</th>
                                    </tr>
                                </thead>
                                <tbody style="top:0; padding-bottom:20px">
                                    
                                    @forelse($loan_requests as $loan)
                                        @if($loan->application->type != null)
                                        <tr>
                                            <td style="">#{{ $loan->application->id }}</td>
                                            <td style="">{{ $loan->application->fname.' '. $loan->application->lname }}</td>
                                            <td style="">{{ $loan->application->type }}</td>
                                            <td style="">{{ $loan->application->amount }}</td>
                                            <td style="">{{ App\Models\Application::payback($loan->application->amount, $loan->application->repayment_plan) }}</td>
                                            <td style="">{{ App\Models\Loans::loan_settled($loan->application->id) }}</td>
                                            <td style="">
                                            {{ 
                                            App\Models\Loans::loan_balance($loan->application->id)
                                            }}
                                            </td>
                                            <td>{{ App\Models\Loans::last_payment($loan->application_id) ?? 'None' }}</td>
                                            <td>
                                                @if($loan->application->status == 0)
                                                <span class="badge badge-sm light badge-danger">
                                                    <i class="fa fa-circle text-danger me-1"></i>
                                                    Pending
                                                </span>
                                                @elseif($loan->application->status == 1)
                                                <span class="badge badge-sm light badge-success">
                                                    <i class="fa fa-circle text-success me-1"></i>
                                                    Not Paid
                                                </span>
                                                @elseif($loan->application->status == 2)
                                                <span class="badge badge-sm light badge-warning">
                                                    <i class="fa fa-circle text-warning me-1"></i>
                                                    Under Review
                                                </span>
                                                @else
                                                <span class="badge badge-sm light badge-default">
                                                    <i class="fa fa-circle text-warning me-1"></i>
                                                    Reversed
                                                </span>
                                                @endif
                                            </td>
                                            <td style="">{{ $loan->application->created_at->toFormattedDateString() }}</td>
                                            <td class="actions-btns d-flex">
                                                <div class="btn sharp btn-primary tp-btn ms-auto">
                                                    <a href="{{ route('loan-details',['id' => $loan->application->id]) }}">  
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                                        </svg>                                                
                                                    </a>
                                                </div>
                                            </td>	
                                        </tr>
                                        @endif
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
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script>
    <!-- html2canvas library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function (e) {
            $('#prof_image_create').change(function(){
                let reader = new FileReader();
                reader.onload = (e) => { 
                    $('#preview-image-before-upload_create').attr('src', e.target.result); 
                }
                reader.readAsDataURL(this.files[0]); 
            });
        });

        function printPMTable(){
            $('.actions-btns').hide();
            // Get the HTML element that you want to convert to PDF
            const element = document.getElementById('pm_table_print_view');
            // Create a new jsPDF instance
            const doc = new jsPDF('landscape');
            // Use the html2canvas library to render the element as a canvas
            html2canvas(element).then(canvas => {
                // Convert the canvas to an image data URL
                const imgData = canvas.toDataURL('image/png');
                // Add the image data URL to the PDF document
                doc.addImage(
                    imgData, 
                    'PNG', 
                    2, // x-coordinate
                    2, // y-coordinate
                );

                // Save the PDF document
                doc.save('Past Maturity Date.pdf');
                
                $('.actions-btns').show();
            });
        }
    </script>
</div>
