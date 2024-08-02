<style>
    @keyframes slide-fade-up {
    0% {
        transform: translateY(50px);
        opacity: 0;
    }
    100% {
        transform: translateY(0);
        opacity: 1;
    }
    }

    .animate-slide-fade {
        opacity: 0;
        animation: slide-fade-up 0.5s ease-out forwards;
    }

</style>
<div wire:ignore class="col-xl-12 col-md-12 col-sm-12">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-8 p-2">
        @forelse($loan_requests as $loan)
        <div class="animate-slide-fade bg-white rounded p-2" style="box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 2px 0px;">
            <div class="row flex-column flex-md-row justify-content-even">
                <div class="col-md-5 col-xs-12 row">
                    <div class="col-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-receipt-cutoff" viewBox="0 0 16 16">
                            <path d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5M11.5 4a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1z"/>
                            <path d="M2.354.646a.5.5 0 0 0-.801.13l-.5 1A.5.5 0 0 0 1 2v13H.5a.5.5 0 0 0 0 1h15a.5.5 0 0 0 0-1H15V2a.5.5 0 0 0-.053-.224l-.5-1a.5.5 0 0 0-.8-.13L13 1.293l-.646-.647a.5.5 0 0 0-.708 0L11 1.293l-.646-.647a.5.5 0 0 0-.708 0L9 1.293 8.354.646a.5.5 0 0 0-.708 0L7 1.293 6.354.646a.5.5 0 0 0-.708 0L5 1.293 4.354.646a.5.5 0 0 0-.708 0L3 1.293zm-.217 1.198.51.51a.5.5 0 0 0 .707 0L4 1.707l.646.647a.5.5 0 0 0 .708 0L6 1.707l.646.647a.5.5 0 0 0 .708 0L8 1.707l.646.647a.5.5 0 0 0 .708 0L10 1.707l.646.647a.5.5 0 0 0 .708 0L12 1.707l.646.647a.5.5 0 0 0 .708 0l.509-.51.137.274V15H2V2.118l.137-.274z"/>
                        </svg>
                    </div>
                    <div class="col-8">
                        <div class="flex items-center">
                            <span class="h-3 w-3 mr-2 rounded-full bg-green-500"></span>
                            <span class="font-bold"> <b>K{{ number_format($loan->amount, 2, '.', ',') }}</b> </span>
                            <span>
                                @if($loan->status == 0)
                                <span class="badge badge-sm text-danger light badge-danger">
                                    <i class="fa fa-circle text-danger me-1"></i>
                                    Pending
                                </span>
                                @elseif($loan->status == 1)
                                <span class="badge badge-sm text-success light badge-success">
                                    <i class="fa fa-circle text-success me-1"></i>
                                    Accepted
                                </span>
                                @elseif($loan->status == 2)
                                <span class="badge badge-sm  text-warning light badge-warning">
                                    <i class="fa fa-circle text-warning me-1"></i>
                                    Under Review
                                </span>
                                @else
                                <span class="badge badge-sm text-warning light badge-default">
                                    <i class="fa fa-circle text-warning me-1"></i>
                                    Rejected
                                </span>
                                @endif
                            </span>
                            <br>
                            <small class="text-gray-600 text-xs">Applied on {{ $loan->created_at->toFormattedDateString() }}</small>
                        </div>
                        <p class="text-gray-600">{{  $loan->loan_product->name }} Loan</p>
                    </div>
                </div>
                <div class="col-md-3 col-xs-12">
                    <small class="text-gray-600 text-xs">Payback in {{ $loan->repayment_plan }} Months</small>
                </div>
                <div class="col-md-4 col-xs-3">
                    <div class="btn-group">
                        <a href="{{ route('loan-details',['id' => $loan->id]) }}" class="btn btn-info sharp tp-btn">
                            <i style="color: rgb(241, 233, 233)" class="fa fa-eye"></i>
                        </a>
                        <a target="_blank" title="View Loan Statement" href="{{ route('loan-statement', ['id'=>$loan->id]) }}" class="btn btn-primary shadow btn-xs sharp">
                            <i class="bi bi-file-earmark-ruled"></i>
                        </a>
                    </div>
                </div>
            </div>
            
        </div>
        
        @empty
        @endforelse
    </div>
    <script>
        // Wait for the page to fully load
        document.addEventListener("DOMContentLoaded", function () {
            const cards = document.querySelectorAll(".card");
            // Apply animation to each card with a delay
            cards.forEach((card, index) => {
                card.style.animationDelay = `${index * 300}ms`; // Use backticks (`) for string interpolation
            });
        });
    </script>
</div>