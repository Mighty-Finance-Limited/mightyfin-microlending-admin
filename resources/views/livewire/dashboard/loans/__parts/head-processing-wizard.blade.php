<div style="margin-top: -4%; z-index: 5; background-image: linear-gradient(to right, rgba(0, 0, 32, 0.85), rgba(44, 3, 76, 0.9)), url({{ asset('public/mfs/admin/assets/media/product/loan_header.webp') }}); width: 109%; left: -5%; background-size: cover; background-position: center; border-radius: 12px; box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);"
                class="card mb-6">
                <div class="card-body pt-9 pb-4">
                    <div class="d-flex flex-wrap flex-sm-nowrap">
                        <div style="margin-left: 2%;" class="flex-grow-1">
                            <div class="d-flex justify-content-between align-items-start flex-wrap mb-4">
                                <div class="d-flex flex-column">
                                    <div class="d-flex align-items-center mb-3">
                                        <p class="text-white fs-1 fw-bolder mb-0 me-2">ZMW {{ $loan->amount ?? 0 }}</p>
                                        <a href="#">
                                            <i class="text-success ki-duotone ki-verify fs-1">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </a>
                                    </div>

                                    <div class="d-flex fw-semibold fs-6 mb-2 pe-2">
                                        <a href="#" class="d-flex align-items-center text-gray-200 text-hover-primary me-5 mb-2">
                                            <i class="ki-duotone ki-profile-circle fs-4 me-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                            </i>
                                            <span class="fw-bold">{{ $loan_product->name }}</span>
                                        </a>
                                    </div>
                                </div>

                                <div class="d-flex">
                                    <div class="row g-5">
                                        <div class="col-4">
                                            <div class="m-2 d-flex flex-column">
                                                <div class="d-flex fw-semibold align-items-center">
                                                    <p class="text-white fs-2 fw-bold mb-1 me-1">#{{ $loan->id }}</p>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <p class="text-gray-300 fs-7 text-uppercase fw-semibold mb-0">Loan ID</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="m-2 d-flex flex-column">
                                                <div class="d-flex fw-semibold align-items-center">
                                                    <p class="text-white fs-2 fw-bold mb-1 me-1">{{ $loan->created_at->toFormattedDateString()}}</p>
                                                        </div>
                                                <div class="d-flex align-items-center">
                                                    <p class="text-gray-300 fs-7 text-uppercase fw-semibold mb-0">Application date</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="m-2 d-flex flex-column">
                                                <div class="d-flex fw-semibold align-items-center">
                                                    <p class="text-white fs-2 fw-bold mb-1 me-1">{{ $loan->repayment_plan ?? 1 }}</p>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <p class="text-gray-300 fs-7 text-uppercase fw-semibold mb-0">Loan term (months)</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>