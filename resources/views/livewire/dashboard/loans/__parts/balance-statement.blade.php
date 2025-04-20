<div  class="tabs-content card" id="loan_balance_statement">
    <div class="card-body">
        <div class="text-muted">
            <h3 class="mb-3 fw-semibold text-uppercase">Loan Balance Statement</h3>
            <br>
            <!-- Add New Entry Button -->
            <button class="mb-3 btn btn-primary btnclicky" data-bs-toggle="modal" data-bs-target="#addBalanceStatementModal">
                Add New Entry
            </button>

            <div class="table-responsive">
                <table class="table align-middle table-bordered table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Description</th>
                            <th class="text-danger">Debit (Loan, Charges)</th>
                            <th class="text-success">Credit (Payments, Adjustments)</th>
                            <th>Balance</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($balance_statement as $key => $entry)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ date('d M, Y', strtotime($entry->payment_date)) }}</td>
                                <td>{{ $entry->description }}</td>
                                <td class="text-danger fw-semibold">
                                    {{ $entry->debit > 0 ? number_format($entry->debit, 2, '.', ',') : '-' }}
                                </td>
                                <td class="text-success fw-semibold">
                                    {{ $entry->credit > 0 ? number_format($entry->credit, 2, '.', ',') : '-' }}
                                </td>
                                <td class="fw-bold text-primary">
                                    {{ number_format($entry->balance_after_payment, 2, '.', ',') }}
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editBalanceStatementModal-{{ $entry->id }}">
                                        Edit
                                    </button>

                                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteBalanceStatementModal-{{ $entry->id }}">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="pt-3 mt-4 border-top border-top-dashed">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <p class="mb-2 text-uppercase fw-medium">Total Loan Amount:</p>
                        <h5 class="mb-0 text-danger">
                            {{ number_format(App\Models\Application::payback($loan), 2, '.', ',') }}
                        </h5>
                    </div>
                    <div>
                        <p class="mb-2 text-uppercase fw-medium">Total Paid:</p>
                        <h5 class="mb-0 text-success">
                            {{ number_format(collect($loan->balance_statement)->sum('credit'), 2, '.', ',') }}
                        </h5>
                    </div>
                    <div>
                        <p class="mb-2 text-uppercase fw-medium">Outstanding Balance:</p>
                        <h5 class="mb-0 text-danger">
                            {{ number_format(App\Models\Application::loan_balance($loan->id), 2, '.', ',') }}
                        </h5>
                    </div>
                    <div>
                        <a href="{{ route('loans.download-balance-statement', $loan->id) }}" class="btn btn-primary btnclicky">
                            Download Loan Statement
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Add Balance Statement Modal -->
    <div class="modal fade" id="addBalanceStatementModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Balance Statement</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('balance-statement.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="loan_id" value="{{ $loan->id }}">
                    <input type="hidden" name="user_id" value="{{ $loan->user->id }}">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="payment_date" class="form-label">Payment Date</label>
                            <input type="date" class="form-control" name="payment_date" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <input type="text" class="form-control" name="description" value="Loan repayment installment" required>
                        </div>
                        <div class="mb-3">
                            <label for="debit" class="form-label">Debit</label>
                            <input type="number" step="0.01" class="form-control" name="debit">
                        </div>
                        <div class="mb-3">
                            <label for="credit" class="form-label">Credit</label>
                            <input type="number" step="0.01" class="form-control" name="credit">
                        </div>
                        <div class="mb-3">
                            <label for="payment_method" class="form-label">Payment Method</label>
                            <input type="text" class="form-control" name="payment_method" value="Wire Transfer">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Edit modal --}}
    @foreach ($balance_statement as $entry)
        <div class="modal fade" id="editBalanceStatementModal-{{ $entry->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Balance Statement</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" method="POST">
                    {{-- <form action="{{ route('balance-statement.update', $entry->id) }}" method="POST"> --}}
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="loan_id" value="{{ $loan->id }}">
                        <input type="hidden" name="user_id" value="{{ $loan->user->id }}">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="payment_date" class="form-label">Payment Date</label>
                                <input type="date" class="form-control" name="payment_date" value="{{ $entry->created_at }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <input type="text" class="form-control" name="description" value="{{ $entry->description }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="debit" class="form-label">Debit</label>
                                <input type="number" step="0.01" class="form-control" name="debit" value="{{ $entry->debit }}">
                            </div>
                            <div class="mb-3">
                                <label for="credit" class="form-label">Credit</label>
                                <input type="number" step="0.01" class="form-control" name="credit" value="{{ $entry->credit }}">
                            </div>
                            {{-- <div class="mb-3">
                                <label for="balance_after_payment" class="form-label">Balance After Payment</label>
                                <input type="number" step="0.01" class="form-control" name="balance_after_payment" value="{{ $entry->balance_after_payment }}" required>
                            </div> --}}
                            <div class="mb-3">
                                <label for="payment_method" class="form-label">Payment Method</label>
                                <input type="text" class="form-control" name="payment_method" value="{{ $entry->payment_method }}">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary btnclicky">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach


    @foreach ($balance_statement as $entry)
        <div class="modal fade" id="deleteBalanceStatementModal-{{ $entry->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete Confirmation</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" method="POST">
                    {{-- <form action="{{ route('balance-statement.destroy', $entry->id) }}" method="POST"> --}}
                        @csrf
                        @method('DELETE')
                        <div class="modal-body">
                            <p>Are you sure you want to delete this entry?{{ $entry->id }}</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-danger btnclicky">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
</div>
