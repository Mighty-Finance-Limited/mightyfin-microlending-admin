<div wire:ignore.self class="modal fade" id="kt_modal_decline_warning" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <form wire:submit.prevent="rejectOnly">
                @csrf
                <input type="hidden" wire:model="loan_id" name="application_id">
                <div class="modal-header bg-danger" id="kt_modal_add_customer_header">
                    <h2 class="fw-bold text-white">Decline Loan Request</h2>
                    <div wire:click="$emit('closeModal')" id="kt_modal_add_customer_close" class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal" aria-label="Close">
                        <i class="ki-duotone ki-cross fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                </div>
            
                <div class="modal-body py-2">
                    <div class="settings mb-2">
                        <div wire:loading.remove wire:target="rejectOnly" class="text-danger">
                            <div class="d-flex p-4" style="border-radius:2%; box-shadow: rgba(0, 0, 0, 0.05) 0px 1px 2px 0px;">
                                <span class="col-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-lightbulb-fill" viewBox="0 0 16 16">
                                        <path d="M2 6a6 6 0 1 1 10.174 4.31c-.203.196-.359.4-.453.619l-.762 1.769A.5.5 0 0 1 10.5 13h-5a.5.5 0 0 1-.46-.302l-.761-1.77a1.964 1.964 0 0 0-.453-.618A5.984 5.984 0 0 1 2 6m3 8.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1l-.224.447a1 1 0 0 1-.894.553H6.618a1 1 0 0 1-.894-.553L5.5 15a.5.5 0 0 1-.5-.5"/>
                                    </svg>
                                </span>
                                <p class="col-10">
                                    When the loan is declined it will not continue with being processed and will be set as a Denied Loan, Are you sure you want to decline this loan application? If you have any doubts or need further assistance, feel free to ask for help.
                                </p>
                            </div>
                            <div class="m-2">
                                <label class="text-primary fw-bold" for="reason">Denied Status</label>
                                <select  class="form-control" type="text" wire:model="picked_status">
                                    @foreach ($denied_status as $status)
                                        <option value="{{$status->id}}">{{$status->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="m-2">
                                <label class="text-primary fw-bold" for="reason">State your reason</label>
                                <textarea  class="form-control" type="text" wire:model="reason" id="reason" cols="10" rows="5"></textarea>
                            </div>
                            <div class="justify-content-between d-flex">
                                <button wire:click="$emit('closeModal')" class="btn btn-light btn-xs">Not now</button>
                                <button type="submit" class="btn btn-primary btn-xs">Continue</button>
                            </div>
                        </div>
                        
                        <div wire:loading wire:target="rejectOnly" class="text-center">
                            <div class="d-flex justify-content-center align-items-center gap-4 text-center items-center">
                                <span class="spinner-border text-primary" role="status"></span>
                                <p class="mt-2">Sending feedback to borrower, please wait...</p>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
