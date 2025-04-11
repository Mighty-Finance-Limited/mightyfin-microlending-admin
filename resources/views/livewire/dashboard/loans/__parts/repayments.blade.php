<div class="tabs-content card" id="schedule_tab">

    <div class="card-body">
        <div class="text-muted">
            <h3 class="mb-3 fw-semibold text-uppercase">Loan Repayment Schedule</h3>
            <br>
            <div class="table-responsive">
                <table class="table align-middle table-bordered table-hover">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Payment Date</th>
                            <th scope="col">Installment Amount</th>
                            <th scope="col">Principal</th>
                            <th scope="col">Interest</th>
                            <th scope="col">Remaining Balance</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($repayment_schedule as $key => $installment)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ \Carbon\Carbon::parse($installment->due_date)->format('d M, Y') }}</td>
                                <td class="fw-bold text-primary">{{ number_format($installment->amount, 2, '.', ',') }}</td>
                                <td>{{ number_format($loan->amount, 2, '.', ',') }}</td>
                                <td>{{ number_format($installment->interest, 2, '.', ',') }}</td>
                                <td class="text-danger fw-semibold">{{ number_format($installment->remaining_balance, 2, '.', ',') }}</td>
                                <td>
                                    @if ($installment->status == 'Paid')
                                        <span class="badge bg-success">Paid</span>
                                    @elseif ($installment->status == 'Pending')
                                        <span class="badge bg-warning text-dark">Pending</span>
                                    @elseif ($installment->status == 'Overdue')
                                        <span class="badge bg-danger">Overdue</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="pt-3 mt-4 border-top border-top-dashed">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <p class="mb-2 text-uppercase fw-medium">Total Paid:</p>
                        <h5 class="mb-0 text-success">{{ number_format(App\Models\Application::loanPaidSofar($loan->id),2,'.',',') }}</h5>
                    </div>
                    <div>
                        <p class="mb-2 text-uppercase fw-medium">Remaining Balance:</p>
                        <h5 class="mb-0 text-danger">{{ number_format(App\Models\Application::loan_balance($loan->id),2,'.',',') }}</h5>
                    </div>
                    {{-- <div>
                        <a href="{{ route('loans.download-schedule', $loan->id) }}" class="btn btn-primary">
                            Download Schedule
                        </a>
                    </div> --}}
                </div>
            </div>

        </div>
    </div>
</div>