<div class="modal fade" id="export_loans_panel" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <div class="modal-body py-2">
                <div class="settings mb-2">
                    <div class="text-md p-4">
                        <h5 class="text-secondary fw-bold font-bold mx-4">
                            Export | User Loans
                        </h5>
                        
                        <form action="{{ route('export-loans') }}" method="POST"  class="flex flex-col gap-y-4 rounded-sm mb-2 bg-white p-3  dark:bg-boxdark sm:flex-row sm:items-center sm:justify-between">
                            @csrf
                            <div class="flex row">
                                <span class="col-xl-6">
                                    <label class="mb-3 block text-xs font-medium text-black dark:text-white">
                                        From
                                    </label>
                                    <input name="from_date" type="date" class="custom-input-date form-control custom-input-date-1 w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                                </span>
                                <span class="col-xl-6">
                                    <label class="mb-3 block text-xs font-medium text-black dark:text-white">
                                        To 
                                    </label>
                                    <input name="to_date" type="date" class="custom-input-date form-control custom-input-date-1 w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                                </span>
                            </div>
                        
                            <div class="">
                                <div class="pt-6">
                                    <button type="submit" class="mt-1 flex items-center gap-2 rounded bg-primary py-4 px-4.5 font-medium text-white hover:bg-opacity-80">
                                        Export Now
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>