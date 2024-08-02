
<script src="https://jsuites.net/v4/jsuites.js"></script>
<table id="default_loan_list" wire:ignore.self class="table table-striped responsive-table">
  <thead>
    <tr>
      {{-- <th>Loan #.</th>
      <th>Borrower</th> --}}
      <th>Loan Type</th>
      <th>Principal</th>
      <th>Duration</th>
      <th>Interest</th>
      <th>Due</th>
      <th>Paid</th>
      <th>Balance</th>
      {{-- <th>Due Date</th> --}}
      <th>Status</th>
      {{-- <th>DOA</th> --}}
      <th class="actions-btns">Action</th>
    </tr>
  </thead>
  <tbody>
    @forelse($requests as $loan)
    <tr>
      <td>{{ $loan->type }}</td>
      <td class="money-format">
        {{ number_format($loan->amount, 2, '.', ',') }}
      </td>
      <td>
        {{ $loan->repayment_plan }} Months
      </td>
      <td class="coin-name">
        K {{ 
            number_format(App\Models\Application::interest_amount($loan->amount, $loan->repayment_plan), 2, '.', ',')
        }}
      </td>
      <td class="text-danger">
        K {{ 
            number_format(App\Models\Application::payback($loan->amount, $loan->repayment_plan), 2, '.', ',')
        }}
      </td>
      <td>{{ App\Models\Loans::loan_settled($loan->id) ?? 0 }}</td>
      <td>
        <strong>K {{ 
            number_format(App\Models\Loans::loan_balance($loan->id), 2, '.', ',')
        }}</strong>
      </td>
      {{-- <th>
        @if($loan->status == 1)
            @php 
                $date_str = $loan->loan->final_due_date;
                $date = DateTime::createFromFormat('Y-m-d H:i:s', $date_str);
                echo $date->format('F j, Y, g:i a') ;
            @endphp
        @endif
      </th> --}}
      <td>
        @if($loan->status == 0)
        <span class="badge badge-sm text-white light badge-danger">
            <i class="fa fa-circle text-white me-1"></i>
            Pending
        </span>
        @elseif($loan->status == 1)
        <span class="badge badge-sm text-white light badge-success">
            <i class="fa fa-circle text-success me-1"></i>
            Accepted
        </span>
        @elseif($loan->status == 2)
        <span class="badge badge-sm  text-white light badge-warning">
            <i class="fa fa-circle text-warning me-1"></i>
            Under Review
        </span>
        @else
        <span class="badge badge-sm text-warning light badge-default">
            <i class="fa fa-circle text-warning me-1"></i>
            Rejected
        </span>
        @endif
      </td>

      <td class="d-flex gap-1">
        {{-- @can('view loan details') --}}
          <div>
              <a href="{{ route('loan-details',['id' => $loan->id]) }}"  class="btn btn-primary shadow btn-xs">  
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                      <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                      <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                  </svg>                                                
              </a>
          </div>
          <div>
              <a target="_blank" title="View Loan Statement" href="{{ route('loan-statement', ['id'=>$loan->id]) }}" class="btn btn-primary shadow btn-xs">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-ruled" viewBox="0 0 16 16">
                      <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V9H3V2a1 1 0 0 1 1-1h5.5v2zM3 12v-2h2v2H3zm0 1h2v2H4a1 1 0 0 1-1-1v-1zm3 2v-2h7v1a1 1 0 0 1-1 1H6zm7-3H6v-2h7v2z"/>
                  </svg>
              </a>
          </div>
          @can('accept and reject loan requests')
          <div class="btn sharp tp-btn ms-auto">
              <a disabled target="_blank" title="Edit Loan" href="{{ route('edit-loan', ['id'=>$loan->id]) }}">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                      <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                      <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                  </svg>
              </a>
          </div>
          <div class="dropdown ms-auto text-end">
              <div wire:ignore.self class="dropdown-menu dropdown-menu-start">
                  @if($loan->status !== 1)
                  <button data-bs-toggle="modal" data-bs-target="#updateDueDate" wire:click="openAcceptModal({{ $loan->id }})" onclick="confirm('Are you sure you want to approve and accept this loan application') || event.stopImmediatePropagation();" class="dropdown-item" href="#">
                      Accept Request
                  </button>
                  @endif
                  @if($loan->status !== 2 || $loan->status !== 1 )
                  <a wire:click="stall({{ $loan->id }})"onclick="confirm('Are you sure you want to set this loan request on hold') || event.stopImmediatePropagation();" class="dropdown-item" href="#">
                      Stall
                  </a>
                  @endif
                  @if($loan->status !== 1)
                  <a wire:click="rejectOnly({{ $loan->id }})"onclick="confirm('Are you sure you want to reject this loan') || event.stopImmediatePropagation();" class="dropdown-item" href="#">
                      Reject Loan Request
                  </a>
                  @endif
                  @if($loan->status !== 1)
                  <a wire:click="destroy({{ $loan->id }})"onclick="confirm('Are you sure you want to permanently delete this loan') || event.stopImmediatePropagation();" class="dropdown-item" href="#">
                      Delete
                  </a>
                  @endif
                  {{-- @if($loan->status !== 1)
                  <a wire:click="reverse({{ $loan->id }})"onclick="confirm('Are you sure you want to reject this loan') || event.stopImmediatePropagation();" class="dropdown-item" href="#">
                      Reverse
                  </a>
                  @endif --}}
                  {{-- <a @disabled(true) disabled class="dropdown-item" href="#">View More Details</a> --}}
              </div>
              @if($loan->status !== 1)
              <div class="btn sharp btn-primary tp-btn ms-auto" data-bs-toggle="dropdown">
                  <svg width="16" height="16" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M13.5202 17.4167C13.5202 18.81 12.3927 19.9375 10.9994 19.9375C9.60601 19.9375 8.47852 18.81 8.47852 17.4167C8.47852 16.0233 9.60601 14.8958 10.9994 14.8958C12.3927 14.8958 13.5202 16.0233 13.5202 17.4167ZM9.85352 17.4167C9.85352 18.0492 10.3669 18.5625 10.9994 18.5625C11.6319 18.5625 12.1452 18.0492 12.1452 17.4167C12.1452 16.7842 11.6319 16.2708 10.9994 16.2708C10.3669 16.2708 9.85352 16.7842 9.85352 17.4167Z" fill="#2696FD"/>
                  <path d="M13.5202 4.58369C13.5202 5.97699 12.3927 7.10449 10.9994 7.10449C9.60601 7.10449 8.47852 5.97699 8.47852 4.58369C8.47852 3.19029 9.60601 2.06279 10.9994 2.06279C12.3927 2.06279 13.5202 3.19029 13.5202 4.58369ZM9.85352 4.58369C9.85352 5.21619 10.3669 5.72949 10.9994 5.72949C11.6319 5.72949 12.1452 5.21619 12.1452 4.58369C12.1452 3.95119 11.6319 3.43779 10.9994 3.43779C10.3669 3.43779 9.85352 3.95119 9.85352 4.58369Z" fill="#2696FD"/>
                  <path d="M13.5202 10.9997C13.5202 12.393 12.3927 13.5205 10.9994 13.5205C9.60601 13.5205 8.47852 12.393 8.47852 10.9997C8.47852 9.6063 9.60601 8.4788 10.9994 8.4788C12.3927 8.4788 13.5202 9.6063 13.5202 10.9997ZM9.85352 10.9997C9.85352 11.6322 10.3669 12.1455 10.9994 12.1455C11.6319 12.1455 12.1452 11.6322 12.1452 10.9997C12.1452 10.3672 11.6319 9.8538 10.9994 9.8538C10.3669 9.8538 9.85352 10.3672 9.85352 10.9997Z" fill="#2696FD"/>
                  </svg>
              </div>
              @else 
              <span class="px-3"></span>
              @endif
          </div>
          @endcan	  
      </td>
    </tr>
    @empty
    
    @endforelse
  </tbody>
</table>
