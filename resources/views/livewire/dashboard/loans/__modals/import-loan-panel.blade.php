<div class="modal fade" id="import_loans_panel" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <div class="modal-body py-2">
                <div class="settings mb-2">
                    <div class="text-md p-4">
                        <h5 class="text-secondary fw-bold font-bold mx-4">
                            Import | User Loans
                        </h5>
                        
                        <form action="{{ route('import-loans') }}" class="items-start w-3/4 md:w-auto mr-4 mb-2" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="flex">
                                <label for="file-input" class="flex items-center gap-2 btn-upload bg-blue-500 hover:bg-blue-700 text-primary font-bold py-1 px-2 rounded cursor-pointer">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-upload" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M4.406 1.342A5.53 5.53 0 0 1 8 0c2.69 0 4.923 2 5.166 4.579C14.758 4.804 16 6.137 16 7.773 16 9.569 14.502 11 12.687 11H10a.5.5 0 0 1 0-1h2.688C13.979 10 15 8.988 15 7.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 2.825 10.328 1 8 1a4.53 4.53 0 0 0-2.941 1.1c-.757.652-1.153 1.438-1.153 2.055v.448l-.445.049C2.064 4.805 1 5.952 1 7.318 1 8.785 2.23 10 3.781 10H6a.5.5 0 0 1 0 1H3.781C1.708 11 0 9.366 0 7.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383"/>
                                    <path fill-rule="evenodd" d="M7.646 4.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V14.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708z"/>
                                    </svg>
                                </span>
                                Choose Excel File
                                </label>
                                <input type="file" id="file-input" name="file" accept=".xlsx" required class="hidden">
                                <div class="file-label text-danger mt-1" id="file-label"></div>
                            </div>

                            <button type="submit" class="mt-8 flex items-center gap-2 rounded bg-success py-2 px-3 font-medium text-white hover:bg-opacity-80">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-excel" viewBox="0 0 16 16">
                                    <path d="M5.884 6.68a.5.5 0 1 0-.768.64L7.349 10l-2.233 2.68a.5.5 0 0 0 .768.64L8 10.781l2.116 2.54a.5.5 0 0 0 .768-.641L8.651 10l2.233-2.68a.5.5 0 0 0-.768-.64L8 9.219l-2.116-2.54z"/>
                                    <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z"/>
                                    </svg>
                                </span>Upload Excel
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>