<div class="content-body">
    <div class="container-fluid">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Guarantors</h4>  
                    <div>
                        <button wire:click="exportGuarantors()" title="Export to Excel" class="btn btn-square btn-success">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-spreadsheet" viewBox="0 0 16 16">
                                <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V9H3V2a1 1 0 0 1 1-1h5.5v2zM3 12v-2h2v2H3zm0 1h2v2H4a1 1 0 0 1-1-1v-1zm3 2v-2h3v2H6zm4 0v-2h3v1a1 1 0 0 1-1 1h-2zm3-3h-3v-2h3v2zm-7 0v-2h3v2H6z"/>
                              </svg>
                        </button>
                        <button onclick="printGuarantorsTable()" title="Export all to PDF" class="btn btn-square btn-warning">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filetype-pdf" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5ZM1.6 11.85H0v3.999h.791v-1.342h.803c.287 0 .531-.057.732-.173.203-.117.358-.275.463-.474a1.42 1.42 0 0 0 .161-.677c0-.25-.053-.476-.158-.677a1.176 1.176 0 0 0-.46-.477c-.2-.12-.443-.179-.732-.179Zm.545 1.333a.795.795 0 0 1-.085.38.574.574 0 0 1-.238.241.794.794 0 0 1-.375.082H.788V12.48h.66c.218 0 .389.06.512.181.123.122.185.296.185.522Zm1.217-1.333v3.999h1.46c.401 0 .734-.08.998-.237a1.45 1.45 0 0 0 .595-.689c.13-.3.196-.662.196-1.084 0-.42-.065-.778-.196-1.075a1.426 1.426 0 0 0-.589-.68c-.264-.156-.599-.234-1.005-.234H3.362Zm.791.645h.563c.248 0 .45.05.609.152a.89.89 0 0 1 .354.454c.079.201.118.452.118.753a2.3 2.3 0 0 1-.068.592 1.14 1.14 0 0 1-.196.422.8.8 0 0 1-.334.252 1.298 1.298 0 0 1-.483.082h-.563v-2.707Zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638H7.896Z"/>
                              </svg>
                        </button>  
                    </div>
                </div>

                <div class="card-body pb-0">

                    <div id="guarantor_table_print_view" class="table-responsive">
                        <div wire:ignore class="actions-btns col-xl-12">
                            <div class="alert alert-dark alert-dismissible fade show">
                                <button type="button" class="btn-close" data-dismiss="alert" aria-label="btn-close"><span><i class="fa-solid fa-xmark"></i></span>
                                </button>
                                <div class="media">
                                    <div class="media-body">
                                        <small class="mb-0">List of all Guarantors with respective borrowers.</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table wire:ignore id="example3" class="display" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Gender</th>
                                    <th>Mobile</th>
                                    <th>Email</th>
                                    <th>Client</th>
                                    <th>Relation</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @forelse($guarantors as $user)
                                    @if ($user->gfname != null && $user->g2fname != null)
                                        <tr>
                                            <td>{{ $user->gfname.' '.$user->glname }} </td>
                                            <td>{{ $user->g_gender }}</td>
                                            <td>{{ $user->gphone ?? '--' }}</td>
                                            <td><a href="javascript:void(0);"><strong>{{ $user->gemail }}</strong></a></td>
                                            <td><a href="javascript:void(0);"><strong>{{ $user->fname.' '.$user->lname }}</strong></a></td>
                                            <td>{{ $user->g_relation }}</td>												 
                                        </tr>
                                        <tr>
                                            <td>{{ $user->g2fname.' '.$user->g2lname }} </td>
                                            <td>{{ $user->g2_gender }}</td>
                                            <td>{{ $user->g2phone ?? '--' }}</td>
                                            <td><a href="javascript:void(0);"><strong>{{ $user->g2email }}</strong></a></td>
                                            <td><a href="javascript:void(0);"><strong>{{ $user->fname.' '.$user->lname }}</strong></a></td>
                                            <td>{{ $user->g2_relation }}</td>											 
                                        </tr>
                                    @endif
                                @empty
                                <div class="intro-y col-span-12 md:col-span-6">
                                    <div class="box text-center">
                                        <p>No User Found</p>
                                    </div>
                                </div>
                                @endforelse
                            </tbody>
                        </table>
                        @if (Session::has('attention'))
                        <div class="actions-btns alert alert-info solid alert-end-icon alert-dismissible fade show">
                            <span><i class="mdi mdi-check"></i></span>
                            <button type="button" class="btn-close" data-dismiss="alert" aria-label="btn-close">
                            </button> {{ Session::get('attention') }}
                        </div>
                        @elseif (Session::has('error_msg'))
                        <div class="actions-btns alert alert-danger solid alert-end-icon alert-dismissible fade show">
                            <span><i class="mdi mdi-help"></i></span>
                            <button type="button" class="btn-close" data-dismiss="alert" aria-label="btn-close">
                            </button>
                            <strong>Error!</strong> {{ Session::get('error_msg') }}
                        </div
                        @endif
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

    function printGuarantorsTable(){
        $('.actions-btns').hide();
        // Get the HTML element that you want to convert to PDF
        const element = document.getElementById('guarantor_table_print_view');
        // Create a new jsPDF instance
        const doc = new jsPDF('potrait');
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
            doc.save('Guarantors.pdf');
            
            $('.actions-btns').show();
        });
    }
</script>