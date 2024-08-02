<div class="col-xl-3 col-xxl-6 col-lg-6 col-sm-6">
    <div class="card overflow-hidden">
        @role('user')
        <div class="card-header border-0 pb-2">
            <div class="mr-auto">
                <h2 class="text-black mb-2 font-w600">K {{  App\Models\Loans::customer_total_borrowed(auth()->user()->id) }}</h2>
                <p class="mb-1 fs-13 text-primary font-w600">TOTAL BORROWED LOAN</p>
                <small>(Got {{  App\Models\Loans::total_loans(auth()->user()->id) }} Loans)</small>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cash-stack" viewBox="0 0 16 16">
                <path d="M1 3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1H1zm7 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
                <path d="M0 5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V5zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V7a2 2 0 0 1-2-2H3z"/>
            </svg>
        </div>
        @else
        <div class="card-header border-0 pb-2">
            <div class="mr-auto">
                <h2 class="text-black mb-2 font-w600">K {{  App\Models\Application::totalAmountLoanedOut() }}</h2>
                <p class="mb-1 fs-13 text-primary font-w600">TOTAL LOAN</p>
                <small>(Total amount loaned to Customers)</small>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cash-stack" viewBox="0 0 16 16">
                <path d="M1 3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1H1zm7 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
                <path d="M0 5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V5zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V7a2 2 0 0 1-2-2H3z"/>
            </svg>
        </div>
        @endrole
    </div>
</div>
<div class="col-xl-3 col-xxl-6 col-lg-6 col-sm-6">
    <div class="card overflow-hidden">
        @role('user')
        <div class="card-header border-0 pb-2">
            <div class="mr-auto">
                <h2 class="text-black mb-2 font-w600">K {{  App\Models\Loans::customer_balance(auth()->user()->id) }}</h2>
                <p class="mb-1 fs-13 text-primary font-w600">CURRENT BALANCE OWING</p>
                {{-- <small>(Total amount borrowed)</small> --}}
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cash-stack" viewBox="0 0 16 16">
                <path d="M1 3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1H1zm7 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
                <path d="M0 5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V5zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V7a2 2 0 0 1-2-2H3z"/>
            </svg>
        </div>
        @else
        <div class="card-header border-0 pb-2">
            <div class="mr-auto">
                <h2 class="text-black mb-2 font-w600">K {{ App\Models\Application::totalAmountPending() }}</h2>
                <p class="mb-1 fs-13 text-primary font-w600">PENDING BORROWED AMOUNT</p>
                <small>(Total amount for pending loan requests)</small>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cash-stack" viewBox="0 0 16 16">
                <path d="M1 3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1H1zm7 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
                <path d="M0 5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V5zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V7a2 2 0 0 1-2-2H3z"/>
            </svg>	
        </div>        
        @endrole

    </div>
</div>
<div class="col-xl-3 col-xxl-6 col-lg-6 col-sm-6">
    <div class="card overflow-hidden">
        @role('user')
        @else
        <div class="card-header border-0 pb-2">
            <div class="mr-auto">
                <h2 class="text-black mb-2 font-w600">K 0</h2>
                <p class="mb-1 fs-13 text-primary">TOTAL REPAYMENTS</p>
                <small>(Total amount pending to be repaid + interest)</small>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cash-stack" viewBox="0 0 16 16">
                <path d="M1 3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1H1zm7 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
                <path d="M0 5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V5zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V7a2 2 0 0 1-2-2H3z"/>
            </svg>
        </div>       
        @endrole
    </div>
</div>
@role('user')
@else
<div class="col-xl-3 col-xxl-6 col-lg-6 col-sm-6">
    <div class="card overflow-hidden">
        <div class="card-header border-0 pb-2">
            <div class="mr-auto">
                <h2 class="text-black mb-2 font-w600">K {{ App\Models\Transaction::total_collected() }}</h2>
                <p class="mb-1 fs-13 text-primary">TOTAL COLLECTED AMOUNT</p>
                <small>(Total amount repaid by Customers (Profit))</small>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cash-stack" viewBox="0 0 16 16">
                <path d="M1 3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1H1zm7 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
                <path d="M0 5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V5zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V7a2 2 0 0 1-2-2H3z"/>
            </svg>	
        </div>
        {{-- <div class="card-body p-0">
            <canvas id="widgetChart4" height="75"></canvas>
        </div> --}}
    </div>
</div>
<div class="col-xl-3 col-xxl-6 col-lg-6 col-sm-6">
    <div class="card overflow-hidden">
        <div class="card-header border-0 pb-2">
            <div class="mr-auto">
                <h2 class="text-black mb-2 font-w600">{{ App\Models\User::totalBorrowers() }}</h2>
                <p class="mb-1 fs-13 text-primary">TOTAL CUSTOMERS</p>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
            </svg>
        </div>
        {{-- <div class="card-body p-0">
            <canvas id="widgetChart4" height="75"></canvas>
        </div> --}}
    </div>
</div>
<div class="col-xl-3 col-xxl-6 col-lg-6 col-sm-6">
    <div class="card overflow-hidden">
        <div class="card-header border-0 pb-2">
            <div class="mr-auto">
                <h2 class="text-black mb-2 font-w600">{{ App\Models\User::totalIncompleteKYCBorrowers() }}</h2>
                <p class="mb-1 fs-13 text-primary">TOTAL CUSTOMERS WITH INCOMPLETE KYC</p>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-slash" viewBox="0 0 16 16">
                <path d="M13.879 10.414a2.501 2.501 0 0 0-3.465 3.465l3.465-3.465Zm.707.707-3.465 3.465a2.501 2.501 0 0 0 3.465-3.465Zm-4.56-1.096a3.5 3.5 0 1 1 4.949 4.95 3.5 3.5 0 0 1-4.95-4.95ZM11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm.256 7a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z"/>
            </svg>	
        </div>
        {{-- <div class="card-body p-0">
            <canvas id="widgetChart4" height="75"></canvas>
        </div> --}}
    </div>
</div>
@endrole