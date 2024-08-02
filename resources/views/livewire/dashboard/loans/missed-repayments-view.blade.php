<div class="content d-flex flex-column flex-column-fluid">
    <div class="container-fluid">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold fs-3 mb-1">Recent Missed Repayments</span>
                        <span class="text-muted mt-1 fw-semibold fs-7">Over {{$mssd_repays->count()}} Missed Repayments</span>
                    </h3>
                    <div>
                        @can('view all loan requests')
                            <button wire:click="exportMRLoans()" title="Export to Excel" class="btn btn-square btn-success">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-spreadsheet" viewBox="0 0 16 16">
                                    <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V9H3V2a1 1 0 0 1 1-1h5.5v2zM3 12v-2h2v2H3zm0 1h2v2H4a1 1 0 0 1-1-1v-1zm3 2v-2h3v2H6zm4 0v-2h3v1a1 1 0 0 1-1 1h-2zm3-3h-3v-2h3v2zm-7 0v-2h3v2H6z"/>
                                </svg>
                            </button>
                            <button onclick="printMRTable()" title="Export all to PDF" class="btn btn-square btn-warning">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filetype-pdf" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5ZM1.6 11.85H0v3.999h.791v-1.342h.803c.287 0 .531-.057.732-.173.203-.117.358-.275.463-.474a1.42 1.42 0 0 0 .161-.677c0-.25-.053-.476-.158-.677a1.176 1.176 0 0 0-.46-.477c-.2-.12-.443-.179-.732-.179Zm.545 1.333a.795.795 0 0 1-.085.38.574.574 0 0 1-.238.241.794.794 0 0 1-.375.082H.788V12.48h.66c.218 0 .389.06.512.181.123.122.185.296.185.522Zm1.217-1.333v3.999h1.46c.401 0 .734-.08.998-.237a1.45 1.45 0 0 0 .595-.689c.13-.3.196-.662.196-1.084 0-.42-.065-.778-.196-1.075a1.426 1.426 0 0 0-.589-.68c-.264-.156-.599-.234-1.005-.234H3.362Zm.791.645h.563c.248 0 .45.05.609.152a.89.89 0 0 1 .354.454c.079.201.118.452.118.753a2.3 2.3 0 0 1-.068.592 1.14 1.14 0 0 1-.196.422.8.8 0 0 1-.334.252 1.298 1.298 0 0 1-.483.082h-.563v-2.707Zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638H7.896Z"/>
                                </svg>
                            </button> 
                        @endcan
                    </div>
                </div>

                <div class="card-body pb-0">

                    <div id="mr_table_print_view" class="table-responsive">
                        <div wire:ignore  class="actions-btns col-xl-12">
                            <div class="alert alert-dark alert-dismissible fade show">
                                <button type="button" class="btn-close" data-dismiss="alert" aria-label="btn-close"><span><i class="fa-solid fa-xmark"></i></span>
                                </button>
                                <div class="media">
                                    <div class="media-body">
                                        <small class="mb-0">List of loans which have missed their installments.</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table wire:ignore id="example3" class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3">
                            <thead>
                                <tr class="fw-bold text-muted">
                                    <th class="actions-btns"></th>
                                    <th>Borrower</th>
                                    <th>Loan Purpose</th>
                                    <th>Principal</th>
                                    <th>Total Collectable</th>
                                    <th>Installment<br>Amount</th>
                                    <th>Missed Date</th>
                                    <th class="actions-btns">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @forelse($mssd_repays as $user)
                                {{-- @dd($user) --}}
                                <tr>
                                    <td class="actions-btns" style="text-align: center">
                                        @if($user->user->profile_photo_path == null)
                                            @if($user->fname != null && $user->lname != null)
                                                <span class="text-primary">{{ $user->fname[0].' '.$user->lname[0] }}</span>
                                            @else
                                                <span>{{ $user->name[0] }}</span>
                                            @endif
                                        @else
                                            <img class="rounded-circle" width="35" src="{{ 'public/'.Storage::url($user->profile_photo_path) }}" />
                                        @endif
                                    </td>

                                    <td style="text-align: center;">
                                        <a target="_blank" href="{{ route('client-account', ['key'=>$user->id]) }}">
                                            {{ $user->fname.' '.$user->lname }} 
                                        </a>
                                    </td>

                                    <td style="text-align: center;">{{ $user->type }} Loan</td>
                                    <td style="text-align: center;">K{{ $user->amount }}</td>
                                    <td style="text-align: center;">K{{ App\Models\Loans::loan_balance($user->id) }}</td>
                                    <td style="text-align: center;"><a href="javascript:void(0);"><strong>K{{ App\Models\Application::monthly_installment($user->amount, $user->repayment_plan) }}</strong></a></td>
                                    <td style="text-align: center; color:#f70000" class="text-danger">
                                        @php 
                                        $date_str = $user->next_dates;
                                            $date = DateTime::createFromFormat('Y-m-d H:i:s', $date_str);
                                            echo $date->format('F j, Y, g:i a');
                                        @endphp
                                    </td>
                                    <td class="actions-btns">
                                        <div class="d-flex">
                                            <a target="_blank" href="{{ route('client-account', ['key'=>$user->user_id]) }}" class="btn btn-primary shadow btn-xs sharp me-1">
                                                <i class="fas fa-user-alt"></i>
                                            </a>
                                            <a target="_blank" href="{{ route('loan-details', ['id'=>$user->id]) }}" class="btn btn-light shadow btn-xs sharp me-1">
                                                <i class="fas fa-file"></i>
                                            </a>
                                            <a title="Track Loan Repayments" href="track-repayments/{{$user->id}}">  
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock-history" viewBox="0 0 16 16">
                                                    <path d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z"/>
                                                    <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z"/>
                                                    <path d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z"/>
                                                </svg>                                              
                                            </a>                                      
                                        </div>												
                                    </td>												
                                </tr>
                                @empty
                                <div class="intro-y col-span-12 md:col-span-6">
                                    <div class="box text-center">
                                        <p>No User Found</p>
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

    function printMRTable(){
        $('.actions-btns').hide();
        // Get the HTML element that you want to convert to PDF
        const element = document.getElementById('mr_table_print_view');
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
            doc.save('Missed Repayments.pdf');
            
            $('.actions-btns').show();
        });
    }
</script>