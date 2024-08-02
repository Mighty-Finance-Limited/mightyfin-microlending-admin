<div wire:ignore class="col-xl-12">
    <!-- Row -->
   <div class="row">
       <!--column-->
    @forelse($loan_requests as $loan)
       <div class="col-xl-4 col-md-6">
           <div class="card contact_list ">
               <div class="card-body">
                   <div class="user-content">
                       <div class="user-info">
                           {{-- <div class="user-img">
                               <img src="images/contacts/1.jpg" class="avtar avtar-xxl me-3" alt="">
                           </div> --}}
                           <div class="user-details">
                               <h4 class="user-name" style="text-transform: camelcase;">{{ $loan->fname.' '. $loan->lname }}</h4>
                               <span class="number" style="text-transform: camelcase;">{{ $loan->type }} Loan</span>
                               <span class="mail">K{{ $loan->amount }}</span> 
                           </div>
                       </div>
                       <div class="dropdown">
                           <a href="javascript:void(0);" class="btn-link btn sharp tp-btn btn-primary pill" data-bs-toggle="dropdown" aria-expanded="false">
                           <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                   <path d="M8.47908 4.58333C8.47908 3.19 9.60659 2.0625 10.9999 2.0625C12.3933 2.0625 13.5208 3.19 13.5208 4.58333C13.5208 5.97667 12.3933 7.10417 10.9999 7.10417C9.60658 7.10417 8.47908 5.97667 8.47908 4.58333ZM12.1458 4.58333C12.1458 3.95083 11.6324 3.4375 10.9999 3.4375C10.3674 3.4375 9.85408 3.95083 9.85408 4.58333C9.85408 5.21583 10.3674 5.72917 10.9999 5.72917C11.6324 5.72917 12.1458 5.21583 12.1458 4.58333Z" fill="#252289"/>
                                   <path d="M8.47908 17.4163C8.47908 16.023 9.60659 14.8955 10.9999 14.8955C12.3933 14.8955 13.5208 16.023 13.5208 17.4163C13.5208 18.8097 12.3933 19.9372 10.9999 19.9372C9.60658 19.9372 8.47908 18.8097 8.47908 17.4163ZM12.1458 17.4163C12.1458 16.7838 11.6324 16.2705 10.9999 16.2705C10.3674 16.2705 9.85408 16.7838 9.85408 17.4163C9.85408 18.0488 10.3674 18.5622 10.9999 18.5622C11.6324 18.5622 12.1458 18.0488 12.1458 17.4163Z" fill="#252289"/>
                                   <path d="M8.47908 11.0003C8.47908 9.60699 9.60659 8.47949 10.9999 8.47949C12.3933 8.47949 13.5208 9.60699 13.5208 11.0003C13.5208 12.3937 12.3933 13.5212 10.9999 13.5212C9.60658 13.5212 8.47908 12.3937 8.47908 11.0003ZM12.1458 11.0003C12.1458 10.3678 11.6324 9.85449 10.9999 9.85449C10.3674 9.85449 9.85408 10.3678 9.85408 11.0003C9.85408 11.6328 10.3674 12.1462 10.9999 12.1462C11.6324 12.1462 12.1458 11.6328 12.1458 11.0003Z" fill="#252289"/>
                               </svg>

                           </a>
                           <div wire:ignore.self class="dropdown-menu dropdown-menu-end">
                                @if($loan->status !== 1)
                                <a wire:click="accept({{ $loan->id }})" onclick="confirm('Are you sure you want to approve and accept this loan application') || event.stopImmediatePropagation();" class="dropdown-item" href="#">
                                    Accept Request
                                </a>
                                @endif
                                @if($loan->status !== 2 || $loan->status !== 1)
                                <a wire:click="stall({{ $loan->id }})"onclick="confirm('Are you sure you want to set this loan request on hold') || event.stopImmediatePropagation();" class="dropdown-item" href="#">
                                    Stall
                                </a>
                                @endif
                                @if($loan->status !== 3 || $loan->status !== 1)
                                <a wire:click="reject({{ $loan->id }})"onclick="confirm('Are you sure you want to reject this loan') || event.stopImmediatePropagation();" class="dropdown-item" href="#">
                                    Reject Loan Request
                                </a>
                                @endif
                           </div>
                       </div>
                   </div>
                  <div  class="actions-btns contact-icon">
                       <div target="_blank" class="icon-box bg-primary-light me-3">
                            <a target="_blank" title="View Loan Statement" href="{{ route('loan-statement', ['id'=>$loan->id]) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-ruled" viewBox="0 0 16 16">
                                    <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V9H3V2a1 1 0 0 1 1-1h5.5v2zM3 12v-2h2v2H3zm0 1h2v2H4a1 1 0 0 1-1-1v-1zm3 2v-2h7v1a1 1 0 0 1-1 1H6zm7-3H6v-2h7v2z"/>
                                </svg>
                            </a>
                       </div>
                       <div class="icon-box bg-primary-light me-3">
                        <a target="_blank" title="View Eligibility Score" href="{{ route('score', ['id'=>$loan->id]) }}">
                            <svg class="text-warning" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shield-check" viewBox="0 0 16 16">
                                <path d="M5.338 1.59a61.44 61.44 0 0 0-2.837.856.481.481 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.725 10.725 0 0 0 2.287 2.233c.346.244.652.42.893.533.12.057.218.095.293.118a.55.55 0 0 0 .101.025.615.615 0 0 0 .1-.025c.076-.023.174-.061.294-.118.24-.113.547-.29.893-.533a10.726 10.726 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.775 11.775 0 0 1-2.517 2.453 7.159 7.159 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7.158 7.158 0 0 1-1.048-.625 11.777 11.777 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 62.456 62.456 0 0 1 5.072.56z"/>
                                <path d="M10.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                            </svg>
                        </a>
                       </div>
                       <div  class="icon-box bg-primary-light me-3">
                            <a target="_blank" title="View Details" href="{{ route('loan-details',['id' => $loan->id]) }}">  
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                </svg>                                                
                            </a>   
                       </div>
                       {{-- <div class="icon-box  bg-primary-light">
                           <svg width="16" height="16" viewBox="0 0 24 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                               <path d="M23.1547 2.20068C22.9967 2.09387 22.8151 2.02739 22.6255 2.00705C22.436 1.98671 22.2443 2.01314 22.0673 2.08401L17.7798 3.79901C17.6526 2.97529 17.2356 2.22402 16.6038 1.68036C15.972 1.13671 15.167 0.836354 14.3335 0.833344H3.8335C2.90524 0.833344 2.015 1.20209 1.35862 1.85847C0.702245 2.51485 0.333496 3.40509 0.333496 4.33334V13.6667C0.333496 14.5949 0.702245 15.4852 1.35862 16.1416C2.015 16.7979 2.90524 17.1667 3.8335 17.1667H14.3335C15.1668 17.1637 15.9717 16.8635 16.6035 16.3201C17.2352 15.7767 17.6523 15.0257 17.7798 14.2023L22.0673 15.9172C22.2444 15.9879 22.4361 16.0142 22.6256 15.9937C22.8151 15.9732 22.9968 15.9065 23.1546 15.7996C23.3124 15.6926 23.4417 15.5486 23.5309 15.3802C23.6202 15.2118 23.6669 15.024 23.6668 14.8333V3.16668C23.6669 2.97607 23.6202 2.78836 23.5309 2.61996C23.4416 2.45156 23.3124 2.30761 23.1547 2.20068ZM14.3335 14.8333H3.8335C3.52408 14.8333 3.22733 14.7104 3.00854 14.4916C2.78975 14.2728 2.66683 13.9761 2.66683 13.6667V4.33334C2.66683 4.02392 2.78975 3.72718 3.00854 3.50839C3.22733 3.28959 3.52408 3.16668 3.8335 3.16668H14.3335C14.6429 3.16668 14.9397 3.28959 15.1585 3.50839C15.3772 3.72718 15.5002 4.02392 15.5002 4.33334V13.6667C15.5002 13.9761 15.3772 14.2728 15.1585 14.4916C14.9397 14.7104 14.6429 14.8333 14.3335 14.8333ZM21.3335 13.1102L17.8335 11.7102V6.28984L21.3335 4.88984V13.1102Z" fill="var(--primary)"/>
                           </svg>
                       </div> --}}
                   </div>
               </div>
           </div>
       </div>
       @empty
       <div class="intro-y col-span-12 md:col-span-6">
           <div class="box text-center">
               <p>Nothing Found.</p>
           </div>
       </div>
       @endforelse
        <!--/column-->
   </div>
</div>