<div class="content d-flex flex-column flex-column-fluid">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold fs-3 mb-1">Active Repayments</span>
                            <span class="text-muted mt-1 fw-semibold fs-7">Over {{$loan_requests->count()}} Missed Repayments</span>
                        </h3>
                        <div>
                            @can('view all loan requests')
                                <button wire:click="exportRepaymentLoans()" title="Export to Excel" class="btn btn-square btn-success">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-spreadsheet" viewBox="0 0 16 16">
                                        <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V9H3V2a1 1 0 0 1 1-1h5.5v2zM3 12v-2h2v2H3zm0 1h2v2H4a1 1 0 0 1-1-1v-1zm3 2v-2h3v2H6zm4 0v-2h3v1a1 1 0 0 1-1 1h-2zm3-3h-3v-2h3v2zm-7 0v-2h3v2H6z"/>
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
                                            <small class="mb-0">List of active loans pending to be paid back or collected.</small>
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
                                        <th>Outstanding Balance</th>
                                        <th>Status</th>
                                        <th>Due Date</th>
                                        <th class="actions-btns">Action</th>
                                    </tr>
                                </thead>
                                <tbody style="top:0; padding-bottom:20px">
                                    
                                    @forelse($loan_requests as $loan)
                                        @if($loan->application->type != null)
                                        <tr>
                                            <td style="text-align:center;">#{{ $loan->application->id }}</td>
                                            <td style="text-align:center;">{{ $loan->application->fname.' '. $loan->application->lname }}</td>
                                            <td style="text-align:center;">{{ $loan->application->type }} Loan</td>
                                            <td style="text-align:center;">K{{ $loan->application->amount }}</td>
                                            <td style="text-align:center;">K{{ App\Models\Application::payback($loan->application->amount, $loan->application->repayment_plan) }}</td>
                                            <td style="text-align:center;">
                                                <span class="badge badge-xl light badge-info">
                                                    K{{ App\Models\Loans::loan_balance($loan->application->id) }} 
                                                </span>
                                            </td>
                                            <td>
                                                <span class="badge badge-sm light badge-success">
                                                    <i class="fa fa-circle text-info me-1"></i>
                                                    Pending Payback
                                                </span>
                                            </td>
                                            <td style="">
                                                @php 
                                                    $date_str = $loan->final_due_date;
                                                    $date = DateTime::createFromFormat('Y-m-d H:i:s', $date_str);
                                                    echo $date->format('F j, Y, g:i a');
                                                @endphp
                                            </td>
                                            <td class="actions-btns d-flex">
                                                <div class="btn sharp btn-primary tp-btn ms-auto">
                                                    <a title="Track Loan Repayments" href="{{ route('track-repayments',['id' => $loan->id]) }}">  
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock-history" viewBox="0 0 16 16">
                                                            <path d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z"/>
                                                            <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z"/>
                                                            <path d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z"/>
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
                                    @if($loan_requests->count() < 2)
                                    <tr style="height: 15vh">
                                    
                                    </tr>
                                    @endif
                                    
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
