<div class="row g-5 g-xl-8">
    <div class="col-xl-4">
        <!--begin::Statistics Widget 5-->
        <a href="{{ route('borrowers') }}" class="card bg-body-white hoverable card-xl-stretch mb-xl-8">
            <!--begin::Body-->
            <div class="card-body">
                <i class="ki-duotone ki-basket text-primary fs-2x ms-n1">
                    <span class="path1"></span>
                    <span class="path2"></span>
                    <span class="path3"></span>
                    <span class="path4"></span>
                </i>
                <div class="text-gray-900 fw-bold fs-2 mb-2 mt-5">K {{  App\Models\Application::totalAmountLoanedOut() }}</div>
                <div class="fw-semibold text-gray-400">TOTAL LOAN TO BORROWERS</div>
            </div>
            <!--end::Body-->
        </a>
        <!--end::Statistics Widget 5-->
    </div>
    <div class="col-xl-4">
        <!--begin::Statistics Widget 5-->
        <a href="{{ route('view-loan-requests') }}" class="card bg-primary hoverable card-xl-stretch mb-xl-8">
            <!--begin::Body-->
            <div class="card-body">
                <i class="ki-duotone ki-element-11 text-white fs-2x ms-n1">
                    <span class="path1"></span>
                    <span class="path2"></span>
                    <span class="path3"></span>
                    <span class="path4"></span>
                </i>
                <div class="text-white fw-bold fs-2 mb-2 mt-5">K {{ App\Models\Application::totalAmountPending() }}</div>
                <div class="fw-semibold text-white">PENDING BORROWED AMOUNT</div>
            </div>
            <!--end::Body-->
        </a>
        <!--end::Statistics Widget 5-->
    </div>
    <div class="col-xl-4">
        <!--begin::Statistics Widget 5-->
        <a href="{{ route('closed-loans') }}" class="card bg-dark hoverable card-xl-stretch mb-5 mb-xl-8">
            <!--begin::Body-->
            <div class="card-body">
                <i class="ki-duotone ki-chart-simple text-gray-100 fs-2x ms-n1">
                    <span class="path1"></span>
                    <span class="path2"></span>
                    <span class="path3"></span>
                    <span class="path4"></span>
                </i>
                <div class="text-gray-100 fw-bold fs-2 mb-2 mt-5">K {{ App\Models\Transaction::total_collected() }}</div>
                <div class="fw-semibold text-gray-100">TOTAL COLLECTED AMOUNT</div>
            </div>
            <!--end::Body-->
        </a>
        <!--end::Statistics Widget 5-->
    </div>
</div>