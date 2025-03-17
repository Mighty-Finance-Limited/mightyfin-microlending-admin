<div style="width: 109%; top:-5%; left: -5%;" class="card">
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
                /* Enhanced Wizard Navigation Styles */
                .nav-tabss.wizard {
                    background-color: transparent;
                    padding: 0;
                    width: 100%;
                    margin: 1.5em auto;
                    border-radius: .25em;
                    clear: both;
                    border-bottom: none;
                    display: flex;
                    flex-direction: column;
                }

                .nav-tabss.wizard li {
                    width: 100%;
                    float: none;
                    margin-bottom: 10px;
                    transition: all 0.3s ease;
                    position: relative;
                }

                .nav-tabss.wizard li > * {
                    position: relative;
                    padding: 1.2em 1em 1.2em 3em;
                    color: #606060;
                    background-color: #f7f7f7;
                    border-color: #f0f0f0;
                    font-weight: 500;
                    border-radius: 6px;
                    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
                    transition: all 0.3s ease;
                }

                .nav-tabss.wizard li.completed > * {
                    color: #fff !important;
                    background: linear-gradient(135deg, #5ba641 0%, #96c03d 100%) !important;
                    border-color: #96c03d !important;
                    box-shadow: 0 5px 12px rgba(150, 192, 61, 0.35) !important;
                }

                .nav-tabss.wizard li.active > * {
                    color: #fff !important;
                    background: linear-gradient(135deg, #1c2a36 0%, #2c3f4c 100%) !important;
                    border-color: #2c3f4c !important;
                    box-shadow: 0 5px 12px rgba(44, 63, 76, 0.35) !important;
                    transform: translateY(-2px);
                }

                .nav-tabss.wizard > li > a {
                    opacity: 1;
                    font-size: 14px;
                    display: flex;
                    align-items: center;
                    text-decoration: none;
                }

                .nav-tabss.wizard a:hover {
                    color: #fff;
                    background: linear-gradient(135deg, #2c3f4c 0%, #3d556b 100%);
                    border-color: #2c3f4c;
                    transform: translateY(-2px);
                }

                span.nmbr {
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    background: #ffffff;
                    width: 32px;
                    height: 32px;
                    border-radius: 50%;
                    font-weight: 600;
                    font-size: 16px;
                    color: #555;
                    margin-right: 15px;
                    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                    position: relative;
                    z-index: 2;
                }

                .nav-tabss.wizard li.completed span.nmbr {
                    background-color: #ffffff;
                    color: #96c03d;
                }

                .nav-tabss.wizard li.active span.nmbr {
                    background-color: #ffffff;
                    color: #2c3f4c;
                }

                /* Line connector between steps (mobile) */
                .nav-tabss.wizard li:not(:last-child)::before {
                    content: '';
                    position: absolute;
                    left: 16px;
                    top: 48px;
                    height: 20px;
                    width: 2px;
                    background-color: #e6e6e6;
                    z-index: 1;
                }

                .nav-tabss.wizard li.completed:not(:last-child)::before {
                    background-color: #96c03d;
                }

                @media(min-width:992px) {
                    .nav-tabss.wizard {
                        flex-direction: row;
                        padding: 0 15px;
                    }

                    .nav-tabss.wizard li {
                        position: relative;
                        padding: 0;
                        margin: 4px 8px 4px 0;
                        width: 24%;
                        float: left;
                    }

                    .nav-tabss.wizard li > * {
                        padding: 1.5em 1em;
                        text-align: center;
                        border-radius: 8px;
                    }

                    .nav-tabss.wizard li.active a {
                        padding-top: 1.5em;
                    }

                    .nav-tabss.wizard > li > a {
                        flex-direction: column;
                    }

                    /* Arrow connector */
                    .nav-tabss.wizard li:not(:last-child)::after {
                        content: '';
                        position: absolute;
                        top: 50%;
                        right: -12px;
                        width: 16px;
                        height: 16px;
                        border-top: 2px solid #e6e6e6;
                        border-right: 2px solid #e6e6e6;
                        transform: translateY(-50%) rotate(45deg);
                        z-index: 3;
                    }

                    .nav-tabss.wizard li.completed:not(:last-child)::after {
                        border-color: #96c03d;
                    }

                    /* Remove vertical line for desktop */
                    .nav-tabss.wizard li:not(:last-child)::before {
                        display: none;
                    }

                    .nav-tabss.wizard li:last-child {
                        margin-right: 0;
                    }

                    span.nmbr {
                        display: flex;
                        width: 48px;
                        height: 48px;
                        margin: 0 auto 12px;
                        font-size: 18px;
                    }
                }

                /* Animation effects */
                .nav-tabss.wizard li > * {
                    animation: fadeIn 0.5s ease-out;
                }

                @keyframes fadeIn {
                    from { opacity: 0; transform: translateY(10px); }
                    to { opacity: 1; transform: translateY(0); }
                }

                /* Enhanced Open Loan styling */
                .mx-6 .px-9.py-6 {
                    background: linear-gradient(135deg, #f0f9ff 0%, #e1f5fe 100%);
                    border-radius: 12px;
                    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
                }

                .mx-6 .px-9.py-6 h1.text-info {
                    background: linear-gradient(135deg, #0288d1 0%, #29b6f6 100%);
                    -webkit-background-clip: text;
                    -webkit-text-fill-color: transparent;
                    margin-bottom: 12px;
                }
            </style>
        </div>
    </div>
</div>