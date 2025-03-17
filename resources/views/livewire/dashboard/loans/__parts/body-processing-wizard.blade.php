<div class="loan-progress-container">
    <div class="max-w-5xl mx-auto bg-white rounded-xl shadow-xl overflow-hidden">
        <div class="p-6">
            @if(true)
            @if($loan_product->loan_status !== null || $loan_product !== null)
                @switch(strtolower($current->stage))
                    @case('processing')
                        <div class="loan-wizard">
                            <div class="wizard-track-container">
                                <div class="wizard-track">
                                    <div class="wizard-progress" style="width: calc(100% * ({{ $current->position - 1 }}) / {{ max(count($loan_product->loan_status->where('stage', 'processing')), 3) }});"></div>
                                </div>
                            </div>
                            <ul class="wizard-steps">
                                <li class="wizard-step active">
                                    <div class="step-indicator">
                                        <div class="step-bubble">1</div>
                                        <div class="step-label">Application Submitted</div>
                                    </div>
                                </li>
                                @php $count = 1; @endphp
                                @forelse ($loan_product->loan_status->where('stage', 'processing') as $key => $step)
                                    @php $count++; @endphp
                                    <li class="wizard-step {{ $current->position >= $count ? 'completed' : '' }}">
                                        <div class="step-indicator">
                                            <div class="step-bubble">{{ $count }}</div>
                                            <div class="step-label">{{ $step->status->name }}</div>
                                        </div>
                                    </li>
                                @empty
                                    <li class="wizard-step {{ $current->position >= 2 ? 'completed' : '' }}">
                                        <div class="step-indicator">
                                            <div class="step-bubble">2</div>
                                            <div class="step-label">Verification</div>
                                        </div>
                                    </li>
                                    <li class="wizard-step {{ $current->position >= 3 ? 'completed' : '' }}">
                                        <div class="step-indicator">
                                            <div class="step-bubble">3</div>
                                            <div class="step-label">Approval</div>
                                        </div>
                                    </li>
                                    <li class="wizard-step {{ $current->position >= 4 ? 'completed' : '' }}">
                                        <div class="step-indicator">
                                            <div class="step-bubble">4</div>
                                            <div class="step-label">Funds Disbursement</div>
                                        </div>
                                    </li>
                                @endforelse
                            </ul>
                        </div>
                    @break
                    @case('open')
                        <div class="loan-status-active">
                            <div class="status-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="48" height="48" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <polyline points="12 6 12 12 16 14"></polyline>
                                </svg>
                            </div>
                            <h2 class="status-title">Active Loan</h2>
                            <p class="status-description">This loan is currently active and pending scheduled repayments.</p>
                        </div>
                    @break
                    @default
                        <div class="loan-wizard">
                            <div class="wizard-track-container">
                                <div class="wizard-track">
                                    <div class="wizard-progress" style="width: 0%"></div>
                                </div>
                            </div>
                            <ul class="wizard-steps">
                                <li class="wizard-step active">
                                    <div class="step-indicator">
                                        <div class="step-bubble">1</div>
                                        <div class="step-label">Application Submitted</div>
                                    </div>
                                </li>
                                @php $count = 1; @endphp
                                @forelse ($loan_product->loan_status->where('stage', 'processing') as $key => $step)
                                    @php $count++; @endphp
                                    <li class="wizard-step">
                                        <div class="step-indicator">
                                            <div class="step-bubble">{{ $count }}</div>
                                            <div class="step-label">{{ $step->status->name }}</div>
                                        </div>
                                    </li>
                                @empty
                                    <li class="wizard-step">
                                        <div class="step-indicator">
                                            <div class="step-bubble">2</div>
                                            <div class="step-label">Verification</div>
                                        </div>
                                    </li>
                                    <li class="wizard-step">
                                        <div class="step-indicator">
                                            <div class="step-bubble">3</div>
                                            <div class="step-label">Approval</div>
                                        </div>
                                    </li>
                                    <li class="wizard-step">
                                        <div class="step-indicator">
                                            <div class="step-bubble">4</div>
                                            <div class="step-label">Funds Disbursement</div>
                                        </div>
                                    </li>
                                @endforelse
                            </ul>
                        </div>
                    @break
                @endswitch
            @endif
            @endif
        </div>
    </div>
</div>

<style>
/* Modern Loan Wizard Styling */
.loan-progress-container {
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
    background-color: #f8fafc;
}

.loan-wizard {
    position: relative;
    padding: 2rem 0 1rem;
}

.wizard-track-container {
    position: absolute;
    top: 3rem;
    left: 0;
    width: 100%;
    padding: 0 2.5rem;
    z-index: 1;
}

.wizard-track {
    height: 3px;
    background-color: #e2e8f0;
    border-radius: 999px;
    overflow: hidden;
    position: relative;
}

.wizard-progress {
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    background: linear-gradient(90deg, #3b82f6, #2563eb);
    transition: width 0.5s ease;
}

.wizard-steps {
    display: flex;
    list-style: none;
    padding: 0;
    margin: 0;
    justify-content: space-between;
    position: relative;
    z-index: 2;
}

.wizard-step {
    flex: 1;
    text-align: center;
    position: relative;
}

.step-indicator {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 0.5rem;
}

.step-bubble {
    width: 2.5rem;
    height: 2.5rem;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 9999px;
    background-color: #e2e8f0;
    color: #64748b;
    font-weight: 600;
    font-size: 0.875rem;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
    transition: all 0.3s ease;
}

.step-label {
    font-size: 0.875rem;
    font-weight: 500;
    color: #64748b;
    max-width: 120px;
    margin: 0 auto;
    transition: all 0.3s ease;
}

/* States */
.wizard-step.active .step-bubble {
    background-color: #3b82f6;
    color: white;
    box-shadow: 0 4px 6px rgba(59, 130, 246, 0.25);
}

.wizard-step.active .step-label {
    color: #3b82f6;
    font-weight: 600;
}

.wizard-step.completed .step-bubble {
    background-color: #10b981;
    color: white;
}

.wizard-step.completed .step-label {
    color: #10b981;
}

/* Active Loan Status */
.loan-status-active {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 2.5rem 1rem;
    text-align: center;
}

.status-icon {
    color: #3b82f6;
    margin-bottom: 1rem;
}

.status-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: #1e293b;
    margin-bottom: 0.5rem;
}

.status-description {
    color: #64748b;
    max-width: 500px;
    font-size: 1rem;
}

/* Responsive Design */
@media (max-width: 768px) {
    .wizard-steps {
        flex-direction: column;
        gap: 2rem;
        align-items: flex-start;
        padding-left: 3rem;
    }

    .wizard-track-container {
        top: 0;
        left: 1.125rem;
        width: 3px;
        height: 100%;
        padding: 0;
    }

    .wizard-track {
        width: 3px;
        height: 100%;
    }

    .wizard-progress {
        width: 100% !important;
        height: calc(100% * ({{ $current->position - 1 }}) / {{ max(count($loan_product->loan_status->where('stage', 'processing')), 3) }});
    }

    .step-indicator {
        flex-direction: row;
        justify-content: flex-start;
        gap: 1rem;
    }

    .step-label {
        text-align: left;
        margin: 0;
    }
}
</style>