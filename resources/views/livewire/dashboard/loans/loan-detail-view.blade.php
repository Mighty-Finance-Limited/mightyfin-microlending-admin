<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl">
            <div style="margin-top: -4%; z-index: 5; background-image: url( {{ asset('public/mfs/admin/assets/media/product/loan_header.webp') }}); width: 109%;
            left: -5%;"
                class="card mb-6">
                <div class="card-body pt-9 pb-0">
                    <div class="d-flex flex-wrap flex-sm-nowrap">
                        <div style="margin-left: 2%;" class="flex-grow-1">
                            <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                <div class="d-flex flex-column">
                                    <div class="d-flex align-items-center mb-2">
                                        <p class="text-white fs-2 fw-bold mb-1 me-1">ZMW {{ $loan->amount ?? 0 }}</p>
                                        <a href="#">
                                            <i class="text-white ki-duotone ki-verify fs-1 ">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                        </a>
                                    </div>

                                    <div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
                                        <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                            <i class="ki-duotone ki-profile-circle fs-4 me-1">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                            </i>{{ $loan_product->name }}
                                        </a>
                                    </div>
                                </div>

                                <div class="d-flex">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="m-2 d-flex flex-column">
                                                <div class="d-flex fw-semibold align-items-center mb-">
                                                    <p class="text-white fs-2 me-1">#{{ $loan->id }}</p>

                                                </div>
                                                <div class="d-flex align-items-center fw-semibold">
                                                    <p class=" align-items-center text-gray-400">Loan ID</p>

                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="m-2 d-flex flex-column">
                                                <div class="d-flex fw-semibold align-items-center mb-">
                                                    <p class="align-items-center text-white fs-2 me-1">{{ $loan->created_at->toFormattedDateString()}}</p>
                                                </div>
                                                <div class="d-flex align-items-center fw-semibold">
                                                    <p class="align-items-center fs- text-gray-400">Application date</p>

                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="m-2 d-flex flex-column">
                                                <div class="d-flex fw-semibold align-items-center mb-">
                                                    <p class="align-items-center text-white fs-2 me-1">{{ $loan->repayment_plan ?? 1 }}</p>
                                                </div>
                                                <div class="d-flex align-items-center fw-semibold">
                                                    <p class=" fs- text-gray-400">Loan term (months)</p>
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
            <div style=" width: 109%; top:-5%; left: -5%;" class="card">
                <div style="margin-top: -4%; padding: 0px;" class="card-body pt-5 pb-0">
                    <div class="col-12">
                        @if(true)
                        @if($loan_product->loan_status !== null || $loan_product !== null)
                            @switch(strtolower($current->stage))
                                @case('processing')
                                    <div class="tabbable">
                                        <ul class="nav nav-tabss wizard">
                                            <li class="active"><a href="#i9" data-toggle="tab" aria-expanded="false"><span class="nmbr">1</span>Application Submitted</a></li>
                                            @php
                                                $count = 1;
                                            @endphp
                                            @forelse ($loan_product->loan_status->where('stage', 'processing') as $key => $step)
                                                @php
                                                    $count ++;
                                                @endphp
                                                <li class="{{ $current->position >= $count ? 'completed' : '' }}" id="{{$step->stage}}"><a href="#w{{ $step->id }}" data-toggle="tab" aria-expanded="false"><span class="nmbr">{{ $count }}</span>{{ $step->status->name }}</a></li>
                                            @empty
                                                <li class="{{ $current->position >= 2 ? 'completed' : '' }}"><a href="#i9" data-toggle="tab" aria-expanded="false"><span class="nmbr">2</span>Verify</a></li>
                                                <li class="{{ $current->position >= 3 ? 'completed' : '' }}"><a href="#i9" data-toggle="tab" aria-expanded="false"><span class="nmbr">3</span>Approval</a></li>
                                                <li class="{{ $current->position >= 4 ? 'completed' : '' }}"><a href="#i9" data-toggle="tab" aria-expanded="false"><span class="nmbr">4</span>Disburse Funds</a></li>
                                            @endforelse

                                        </ul>
                                    </div>
                                @break
                                @case('open')
                                    <div class="mx-6">
                                        <div class="px-9 py-6 mt-2">
                                            <h1 class="text-info fw-bold font-bold">Open Loan</h1>
                                            <p>Note: This loan is current active and is pending for repayment collection.</p>
                                        </div>
                                    </div>
                                @break
                                @default
                                <div class="tabbable">
                                    <ul class="nav nav-tabss wizard">
                                        <li class="active"><a href="#i9" data-toggle="tab" aria-expanded="false"><span class="nmbr">1</span>Application Submitted</a></li>
                                        {{-- <li class="active"><a href="#i9" data-toggle="tab" aria-expanded="false"><span class="nmbr">2</span>Verify</a></li> --}}
                                        @php
                                            $count = 1;
                                        @endphp
                                        @forelse ($loan_product->loan_status->where('stage', 'processing') as $key => $step)
                                            @php
                                                $count ++;
                                            @endphp
                                            <li class="" id="{{$step->stage}}"><a href="#w{{ $step->id }}" data-toggle="tab" aria-expanded="false"><span class="nmbr">{{ $count }}</span>{{ $step->status->name }}</a></li>
                                        @empty
                                            <li class="{{ $current->position >= 2 ? 'completed' : '' }}"><a href="#i9" data-toggle="tab" aria-expanded="false"><span class="nmbr">2</span>Verify</a></li>
                                            <li class="{{ $current->position >= 3 ? 'completed' : '' }}"><a href="#i9" data-toggle="tab" aria-expanded="false"><span class="nmbr">3</span>Approval</a></li>
                                            <li class="{{ $current->position >= 4 ? 'completed' : '' }}"><a href="#i9" data-toggle="tab" aria-expanded="false"><span class="nmbr">4</span>Disburse Funds</a></li>
                                        @endforelse
                                    </ul>
                                </div>
                                @break
                            @endswitch
                        @else
                        @endif
                        @endif

                        <style>
                            .nav-tabss.wizard {
                                background-color: transparent;
                                padding: 0;
                                width: 100%;
                                margin: 1em auto;
                                border-radius: .25em;
                                clear: both;
                                border-bottom: none;
                            }

                            .nav-tabss.wizard li {
                                width: 100%;
                                float: none;
                                margin-bottom: 3px;
                            }

                            .nav-tabss.wizard li>* {
                                position: relative;
                                padding: 1em .8em .8em 2.5em;
                                color: #999999;
                                background-color: #dedede;
                                border-color: #dedede;
                            }

                            .nav-tabss.wizard li.completed>* {
                                color: #fff !important;
                                background-color: #96c03d !important;
                                border-color: #96c03d !important;
                                border-bottom: none !important;
                            }

                            .nav-tabss.wizard li.active>* {
                                color: #fff !important;
                                background-color: #2c3f4c !important;
                                border-color: #2c3f4c !important;
                                border-bottom: none !important;
                            }

                            .nav-tabss.wizard li::after:last-child {
                                border: none;
                            }

                            .nav-tabss.wizard>li>a {
                                opacity: 1;
                                font-size: 14px;
                            }

                            .nav-tabss.wizard a:hover {
                                color: #fff;
                                background-color: #2c3f4c;
                                border-color: #2c3f4c
                            }

                            span.nmbr {
                                display: inline-block;
                                padding: 10px 0 0 0;
                                background: #ffffff;
                                width: 35px;
                                line-height: 100%;
                                height: 35px;
                                margin: auto;
                                border-radius: 50%;
                                font-weight: bold;
                                font-size: 16px;
                                color: #555;
                                margin-bottom: 10px;
                                text-align: center;
                            }

                            @media(min-width:992px) {
                                .nav-tabss.wizard li {
                                    position: relative;
                                    padding: 0;
                                    margin: 4px 4px 4px 0;
                                    width: 24.6%;
                                    float: left;
                                    text-align: center;
                                }

                                .nav-tabss.wizard li.active a {
                                    padding-top: 15px;
                                }

                                .nav-tabss.wizard li::after,
                                .nav-tabss.wizard li>*::after {
                                    content: '';
                                    position: absolute;
                                    top: 1px;
                                    left: 100%;
                                    height: 0;
                                    width: 0;
                                    border: 45px solid transparent;
                                    border-right-width: 0;
                                    /*border-left-width: 20px*/
                                }

                                .nav-tabss.wizard li::after {
                                    z-index: 1;
                                    -webkit-transform: translateX(4px);
                                    -moz-transform: translateX(4px);
                                    -ms-transform: translateX(4px);
                                    -o-transform: translateX(4px);
                                    transform: translateX(4px);
                                    border-left-color: #fff;
                                    margin: 0
                                }

                                .nav-tabss.wizard li>*::after {
                                    z-index: 2;
                                    border-left-color: inherit
                                }

                                .nav-tabss.wizard>li:nth-of-type(1)>a {
                                    border-top-left-radius: 10px;
                                    border-bottom-left-radius: 10px;
                                }

                                .nav-tabss.wizard li:last-child a {
                                    border-top-right-radius: 10px;
                                    border-bottom-right-radius: 10px;
                                }

                                .nav-tabss.wizard li:last-child {
                                    margin-right: 0;
                                }

                                .nav-tabss.wizard li:last-child a:after,
                                .nav-tabss.wizard li:last-child:after {
                                    content: "";
                                    border: none;
                                }

                                span.nmbr {
                                    display: block;
                                }
                            }
                        </style>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="mx-4">
        @include('livewire.dashboard.__parts.dash-alerts')
    </div>

    @if(true)
    {{-- @if($loan->complete == 1) --}}
    @switch(strtolower($current->stage))
        @case('processing')
            @switch(strtolower($current->status))
                @case('reviewing')
                    @include('livewire.dashboard.loans.__stages.processing.reviewing')
                @break
                @case('verification')
                    @include('livewire.dashboard.loans.__stages.processing.verification')
                @break
                @case('approval')
                    @include('livewire.dashboard.loans.__stages.processing.approval')
                @break
                @case('disbursements')
                    @include('livewire.dashboard.loans.__stages.processing.disbursements')
                @break
                @default
                    @include('livewire.dashboard.loans.__stages.processing.reviewing')
                @break
            @endswitch
        @break

        @case('open')
            @switch(strtolower($current->status))
                @case('current loan')
                    @include('livewire.dashboard.loans.__stages.open.current-loan')
                @break
                @default
                    @include('livewire.dashboard.loans.__stages.open.current-due-today')
                @break
            @endswitch
        @break

        @case('denied')
            @switch(strtolower($current->status))
                @case('incomplet kyc')
                    @include('livewire.dashboard.loans.__stages.denied.incomplete-kyc')
                @break
                @case('incomplete crb')
                    @include('livewire.dashboard.loans.__stages.denied.incomplete-crb')
                @break
                @case('bad credit score')
                    @include('livewire.dashboard.loans.__stages.denied.bad-credit-score')
                @break
                @case('Financial Risk')
                    @include('livewire.dashboard.loans.__stages.denied.financial-risk')
                @break
                @default
                    @include('livewire.dashboard.loans.__stages.denied.fraud')
                @break
            @endswitch
        @break

        @default
        <div class="modal fade show" id="kt_modal_decline_warning" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <div class="modal-content">
                    <div class="modal-body py-2">
                        <div class="settings mb-2">
                            <div class="text-danger">
                                <h1 class="text-info fw-bold font-bold">No Loan Products or Loan Product has no statuses </h1>
                                <p>Note: This loan is current active and is pending for repayment has collection.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endswitch
    @else
    @include('livewire.dashboard.loans.__stages.denied.incomplete-kyc')
    @endif

    @include('livewire.dashboard.loans.__modals.rollback-warning')
    @include('livewire.dashboard.loans.__modals.review-warning')
    @include('livewire.dashboard.loans.__modals.decline-loan')
</div>
