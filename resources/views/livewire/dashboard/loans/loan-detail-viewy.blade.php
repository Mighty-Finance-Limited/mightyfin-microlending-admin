<div class="content-body">
    <div class="container-fluid mh-auto">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>{{ $loan->type }} Loan | K{{ $loan->amount ?? 0 }}</h4>

                        @can('accept and reject loan requests')
                        <div class="d-flex align-items-end flex-wrap">
                            <div class="shopping-cart mb-2 me-3">
                                <button onclick="printLoanDetails()" class="btn btn-square btn-warning">Print PDF</button>
                            </div>
                            @if($loan->status !== 2 && $loan->status !== 1)
                            <div class="shopping-cart mb-2 me-3">
                                <button 
                                    class="btn btn-square btn-outline-primary" 
                                    wire:click.prevent="stall({{ $loan->id }})" 
                                    data-toggle="modal" data-target=".bd-example-modal-sm"
                                    onclick="confirm('Are you sure you want to hold this loan application for review?') || event.stopImmediatePropagation();"
                                >
                                <i class="fa fa-pause me-2"></i>Hold Loan
                                </button>
                            </div>
                            @endif

                            @if($loan->status !== 1)
                            <div class="shopping-cart mb-2 me-3">
                                <button 
                                    data-toggle="modal" data-target="#updateDueDateView"
                                    class="btn btn-square btn-primary" 
                                    onclick="confirm('Are you sure you want to approve and accept this loan application') || event.stopImmediatePropagation();"
                                >
                                <i class="fa fa-check me-2"></i>Accept Loan
                                </button>
                            </div>
                            @endif

                            @if($loan->status !== 3 && $loan->status !== 1)
                            <div class="shopping-cart mb-2 me-3">
                                <button 
                                    class="btn btn-square btn-outline-danger" 
                                    wire:click.prevent="reject({{ $loan->id }})" 
                                    onclick="confirm('Are you sure you want to disapprove and reject this loan application?') || event.stopImmediatePropagation();"
                                >
                                <i class="fa fa-cancel me-2"></i>Reject Loan
                                </button>
                            </div>
                            @endif
                        </div>
                        @endcan
                    </div>
                    <div id="loanDetailsToPrint" class="card-body">

                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-xxl-12 col-sm-12">
                                @include('livewire.dashboard.__parts.dash-alerts')
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-xxl-6 col-sm-12">
                                <div class="title-sm">
                                    <h5>Borrower Information</h5>
                                </div>
                                <div class="product-detail-content">
                                    <div class="new-arrival-content pr">
                                        <p> Borrower: 
                                            <a target="_blank" href="{{ route('client-account', ['key'=>$loan->user->id]) }}">
                                                <span class="item">{{  $loan->fname ?? $loan->user->fname  }} {{ $loan->lname ?? $loan->user->lname }}</span>
                                            </a> 
                                        </p>
                                        <p>Address: <span class="item">{{ $loan->user->address ?? 'None'}}</span></p>
                                        <p>Phone No.: <span class="item">{{ $loan->phone ?? '' }}</span></p>
                                        <p>Phone No 2.: <span class="item">{{ $loan->user->phone2 }}</span></p>
                                        <p>NRC No.: <span class="item">{{ $loan->user->nrc_no }}</span></p>
                                        <p>Basic Pay.: <span class="item">{{ $loan->user->basic_pay }}</span></p>
                                        <p>Net Pay.: <span class="item">{{ $loan->user->net_pay }}</span></p>
                                        <p>Sex: <span class="item">{{ $loan->gender ?? $loan->user->gender }}</span></p>
                                        <p>Age: <span class="item">{{ $loan->gender ?? $loan->user->gender }}</span></p>
                                    </div>
                                </div>
                            </div>
                            <!--Tab slider End-->
                            <div class="col-xl-6 col-lg-6 col-md-6 col-xxl-6 col-sm-12">
                                <div class="title-sm">
                                    <h5>Loans Details & Status</h5>
                                </div>
                                <div class="product-detail-content">
                                    <!--Product details-->
                                    <div class="new-arrival-content pr">
                                        {{-- <div class="d-table mb-2">
                                            <p class="price float-start d-block"></p>
                                        </div> --}}
                                        <p>
                                            Borrowed Amount: 
                                            <span class="item">
                                                K{{ $loan->amount ?? 0 }}
                                            </span>
                                        </p>
                                        <p>Duration: <span class="item">{{ $loan->repayment_plan }} Months</span> </p>
                                        <p>Interest: <span class="item">
                                            @if($loan->repayment_plan > 1)
                                            70%
                                            @else
                                            21%
                                            @endif
                                            {{-- per month --}}
                                        </span>
                                        </p>
                                        
                                        @if($loan->status == 1 || preg_replace('/[^A-Za-z0-9. -]/', '',  Auth::user()->roles->pluck('name')) == 'admin')
                                            <p>Last Payment: 
                                                <span class="item">  
                                                {{ App\Models\Loans::last_payment($loan->id)->created_at != null ? App\Models\Loans::last_payment($loan->id)->created_at->toFormattedDateString() : 'No record'  }}
                                                </span>
                                            </p>
                                            <p>Payback Amount: <span class="item"><b>K {{ App\Models\Application::payback($loan->amount, $loan->repayment_plan) }}</b></span></p>
                                            {{-- <p>Monthly Installments: <span class="item"><b>K {{ App\Models\Application::monthly_installment($loan->amount, preg_replace('/[^0-9]/','', $loan->repayment_plan)) }}</b></span></p> --}}
                                            {{-- <p>Total Interest Rate: <span class="item">
                                            @if($loan->repayment_plan > 1)
                                            {{ $loan->repayment_plan * 0.44 }}
                                            @else
                                            {{ $loan->repayment_plan * 0.2 }}
                                            @endif
                                            </span></p> --}}
                                        @endif
                                        
                                        {{-- <p>Credit Score: 
                                            <span class="item">
                                            @if(App\Models\Application::loan_assemenent_table($loan)['credit_score'])
                                            <a target="_blank" href="{{ route('score', ['id' => $loan->id]) }}">
                                                <span class="badge badge-success">Eligible</span>
                                            </a>
                                            @else 
                                            <a target="_blank" href="{{ route('score', ['id' => $loan->id]) }}">
                                                <span class="badge badge-danger">Not Eligible</span>
                                            </a>
                                            @endif
                                            </span>
                                        </p> --}}
                                        
                                        <p>Loan Progress:&nbsp;&nbsp;
                                            @if ($loan->status == 0)
                                                @if($loan->complete == 0)
                                                <span class="badge badge-dark">Incomplete KYC</span>
                                                @else
                                                <span class="badge badge-success">Pending</span>
                                                @endif
                                            @else
                                                @if($loan->complete == 0)
                                                <span class="badge badge-light">Incomplete KYC</span>
                                                @else
                                                <span class="badge badge-light">Pending</span>
                                                @endif
                                            @endif
                                            @if ($loan->status == 2)
                                            <span class="badge badge-success">Under Review</span>
                                            @else
                                            <span class="badge badge-light">Under Review</span>
                                            @endif
                                            @if ($loan->status == 1)
                                            <span class="badge badge-success">Accepted</span>
                                            @else
                                            <span class="badge badge-light">Accepted</span>
                                            @endif
                                            @if ($loan->status == 3)
                                            <span class="badge badge-success">Rejected</span>
                                            @else
                                            <span class="badge badge-light">Rejected</span>
                                            @endif
                                            
                                        </p>
                                        <p class="text-content">
                                            
                                        </p>
                                    </div>
                                </div>
                            </div>

                            {{-- @if($loan->type !== 'Asset Financing') --}}
                                @if(!empty($loan->user->nextKin->toArray()))
                                    <div class="col-lg-6 col-xl-6 col-xxl-6 col-sm-12">
                                        <div class="title-sm">
                                            <h5>Next Of Kin</h5>
                                        </div>
                                        <p>Firstname: <span class="item">{{ $loan->user->nextKin->first()->fname }}</span></p>
                                        <p>Surname: <span class="item">{{ $loan->user->nextKin->first()->lname }}</span></p>
                                        <p>Phone No.: <span class="item">{{ $loan->user->nextKin->first()->phone }}</span></p>
                                        {{-- <p>Email: <span class="item">{{ $loan->user->nextKin->first()->email }}</span></p> --}}
                                        <p>Relation: <span class="item">{{ $loan->user->nextKin->first()->address }}</span></p>
                                        {{-- <p>Occupation: <span class="item">{{ $loan->user->nextKin->first()->occupation }}</span></p> --}}
                                        {{-- <p>Sex: <span class="item">{{ $loan->user->nextKin->first()->gender }}</span></p> --}}
                                    </div>
                                @endif
                            {{-- @else --}}
                                <div class="col-lg-6 col-xl-6 col-xxl-6 col-sm-12">
                                    <div class="title-sm">
                                        <h5>First Guarantors</h5>
                                    </div>
                                    <p>1st Garantors Name: <span class="item">{{ $loan->gfname.' '.$loan->glname }}</span></p>
                                    <p>1st Garantors Phone No.: <span class="item">{{ $loan->gphone }}</span></p>
                                    {{-- <p>1st Garantors Email: <span class="item">{{ $loan->gemail }}</span></p> --}}
                                    {{-- <p>1st Garantors Sex: <span class="item">{{ $loan->g_gender }}</span></p> --}}
                                    <p>1st Garantors Relation: <span class="item">{{ $loan->g_relation }}</span></p>
                                </div>
                                {{-- <div class="col-lg-6 col-xl-6 col-xxl-6 col-sm-12">
                                    <div class="title-sm">
                                        <h5>Second Guarantors</h5>
                                    </div>
                                    <p>2nd Garantors Name: <span class="item">{{ $loan->g2fname.' '.$loan->g2lname }}</span></p>
                                    <p>2nd Garantors Phone No.: <span class="item">{{ $loan->g2phone }}</span></p>
                                    <p>2nd Garantors Email: <span class="item">{{ $loan->g2email }}</span></p>
                                    <p>2nd Garantors Sex: <span class="item">{{ $loan->g2_gender }}</span></p>
                                    <p>2nd Garantors Relation: <span class="item">{{ $loan->g_2relation }}</span></p>
                                </div> --}}
                            {{-- @endif --}}

                            <div class="col-xl-6 col-lg-6 col-md-6 col-xxl-6 col-sm-12">
                                <div class="title-sm">
                                    <h5>Staff Information</h5>
                                </div>
                                <div class="product-detail-content">
                                    <div class="new-arrival-content pr">
                                        <p>Processed By: <span class="item">{{  $loan->done_by->fname.' '.$loan->done_by->lname ?? 'No Record' }}</span> </p>
                                        @if($loan->done_by !== '')
                                        <p>Processed On: <span class="item">{{ $loan->updated_at->toFormattedDateString() }}</span></p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-12 col-lg-12 col-md-12 col-xxl-12 col-sm-12">
                                <div class="title-sm">
                                    <h5>Attched Documents</h5>
                                </div>
                                <div class="px-2 row">
                                    <div class="profile-email col-lg-3 px-2 pt-2">
                                        <a href="{{ 'public/'.Storage::url($loan->user->uploads[4]->path) }}"  class="open-modal" data-toggle="modal" data-target="#fileModal" data-file-url="{{ 'public/'.Storage::url($loan->user->uploads[4]->path) }}">
                                            <img width="90" src="https://img.freepik.com/free-vector/illustration-folder-with-document_53876-37005.jpg?w=740&t=st=1676996943~exp=1676997543~hmac=d03d65c77d403c5ed653a733705504e21b5b3fb42e7cfe3c4340f90aaf55f9d2">
                                        </a>
                                        <p class="text-xs text-muted mb-0">NRC ID</p>
                                    </div>
                                    <div class="profile-email col-lg-3 px-2 pt-2">
                                        <a href="{{ 'public/'.Storage::url($loan->user->uploads[0]->path) }}"  class="open-modal" data-toggle="modal" data-target="#fileModal" data-file-url="{{ 'public/'.Storage::url($loan->user->uploads[0]->path) }}">
                                            <img width="90" src="https://img.freepik.com/free-vector/illustration-folder-with-document_53876-37005.jpg?w=740&t=st=1676996943~exp=1676997543~hmac=d03d65c77d403c5ed653a733705504e21b5b3fb42e7cfe3c4340f90aaf55f9d2">
                                        </a>
                                        <p class="text-xs text-muted mb-0">Preapproval<br>Document</p>
                                    </div>
                                    <div class="profile-email col-lg-3 px-2 pt-2">
                                        <a href="{{ 'public/'.Storage::url($loan->user->uploads[1]->path) }}"  class="open-modal" data-toggle="modal" data-target="#fileModal" data-file-url="{{ 'public/'.Storage::url($loan->user->uploads[1]->path) }}">
                                            <img width="90" src="https://img.freepik.com/free-vector/illustration-folder-with-document_53876-37005.jpg?w=740&t=st=1676996943~exp=1676997543~hmac=d03d65c77d403c5ed653a733705504e21b5b3fb42e7cfe3c4340f90aaf55f9d2">
                                        </a>
                                        <p class="text-xs text-muted mb-0">Passport Photo</p>
                                    </div>
                                    <div class="profile-email col-lg-3 px-2 pt-2">
                                        <a href="{{ 'public/'.Storage::url($loan->user->uploads[2]->path) }}"  class="open-modal" data-toggle="modal" data-target="#fileModal" data-file-url="{{ 'public/'.Storage::url($loan->user->uploads[2]->path) }}">
                                            <img width="90" src="https://img.freepik.com/free-vector/illustration-folder-with-document_53876-37005.jpg?w=740&t=st=1676996943~exp=1676997543~hmac=d03d65c77d403c5ed653a733705504e21b5b3fb42e7cfe3c4340f90aaf55f9d2">
                                        </a>
                                        <p class="text-xs text-muted mb-0">Bank Statement</p>
                                    </div>
                                    <div class="profile-email col-lg-3 px-2 pt-2">
                                        <a href="{{ 'public/'.Storage::url($loan->user->uploads[3]->path) }}"  class="open-modal" data-toggle="modal" data-target="#fileModal" data-file-url="{{ 'public/'.Storage::url($loan->user->uploads[3]->path) }}">
                                            <img width="90" src="https://img.freepik.com/free-vector/illustration-folder-with-document_53876-37005.jpg?w=740&t=st=1676996943~exp=1676997543~hmac=d03d65c77d403c5ed653a733705504e21b5b3fb42e7cfe3c4340f90aaf55f9d2">
                                        </a>
                                        <p class="text-xs text-muted mb-0">Latest Payslip</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- review -->
            <div class="modal fade" id="reviewModal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Review</h5>
                            <button type="button" class="btn-close" data-dismiss="modal">
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="text-center mb-4">
                                    <img class="img-fluid rounded" width="78" src="images/avatar/1.jpg" alt="DexignZone">
                                </div>
                                <div class="mb-3">
                                    <div class="rating-widget mb-4 text-center">
                                        <!-- Rating Stars Box -->
                                        <div class="rating-stars">
                                            <ul id="stars">
                                                <li class="star" title="Poor" data-value="1">
                                                    <i class="fa fa-star fa-fw"></i>
                                                </li>
                                                <li class="star" title="Fair" data-value="2">
                                                    <i class="fa fa-star fa-fw"></i>
                                                </li>
                                                <li class="star" title="Good" data-value="3">
                                                    <i class="fa fa-star fa-fw"></i>
                                                </li>
                                                <li class="star" title="Excellent" data-value="4">
                                                    <i class="fa fa-star fa-fw"></i>
                                                </li>
                                                <li class="star" title="WOW!!!" data-value="5">
                                                    <i class="fa fa-star fa-fw"></i>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <textarea class="form-control" placeholder="Comment" rows="5"></textarea>
                                </div>
                                <button class="btn btn-success btn-block">RATE</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <div wire:ignore.self class="modal fade" id="updateDueDateView" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-header bg-primary text-white">
                <h3 style="color:#fff">{{ $loan->type }} Loan</h3>
                <h5 style="color:#fff">{{ $loan->fname.' '.$loan->lname }}</h5>
            </div>
            <div class="modal-content p-4">
                @if ($loan !== null)
                <div class="row mb-3">
                    <div class="col-xl-12">
                        <h5>Amount: {{ $loan->amount }}</h5>
                        <h5>Duration: {{ $loan->repayment_plan }} Months</h5>
                        <h6>Submitted on {{ $loan->created_at->toFormattedDateString() }}</h6>
                    </div>
                    
                </div>
                @endif
                <div class="col-xl-12">
                    <div class="mb-3">
                        <div>
                            <h5 class="text-label form-label text-warning">Change Due Date (Optional)</h5>
                            <input type="date" placeholder="Due Date" name="datepicker" wire:model.defer="due_date" class=" form-control" id="">
                        </div>
                        <br>
                        <button modal-bs-dismiss="close" wire:click="clear()" class="btn btn-light btn-square">Cancel</button>
                        @if($loan !== null)
                            <button wire:click="accept({{ $loan->id }})" data-dismiss="modal" class="btn btn-primary btn-square">Approve Loan</button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="fileModal" tabindex="-1" role="dialog" aria-labelledby="fileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="fileModalLabel">
                    <a id="downlink">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                            <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                            <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                        </svg>&nbsp;Download
                    </a>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <iframe id="filePreview" src="" frameborder="0" width="100%" height="500"></iframe>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script>
<!-- html2canvas library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.min.js"></script>
<script>
  function printLoanDetails(){
    // element.hide();
    // Get the HTML element that you want to convert to PDF
    const element = document.getElementById('loanDetailsToPrint');

    // Create a new jsPDF instance
    const doc = new jsPDF();
    var name = "{{ $loan->fname.' '.$loan->lname }}";
    // Use the html2canvas library to render the element as a canvas
    html2canvas(element).then(canvas => {
      // Convert the canvas to an image data URL
      const imgData = canvas.toDataURL('image/png');

      // Add the image data URL to the PDF document
      doc.addImage(imgData, 'PNG', 10, 10);

      // Save the PDF document
      doc.save(name+' Loan Details.pdf');
    });
  }
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function () {
    $('.open-modal').click(function () {
      var fileUrl = $(this).data('file-url');
      $('#filePreview').attr('src', fileUrl);
      $('#downlink').attr('download', fileUrl);
      $('#downlink').attr('href', fileUrl)
    });
  });
</script>
