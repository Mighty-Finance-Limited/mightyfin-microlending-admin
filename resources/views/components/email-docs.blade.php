<div class="modal" id="sendDocModal">
    <div class="modal-dialog modal-dialog-centered">
        <form action="{{route('share.docs')}}" method="POST" id="shareDocsForm" class="modal-content send-doc-modal">
            @csrf
            <!-- Modal Header -->
            <div style="background-color: rgb(79, 15, 95)" class="modal-header justify-content-center text-center">
                <h4 class="modal-title text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                      </svg>
                    Share Documents
                </h4>
                <span onclick="closeSendDocModal()" class="close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                        <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
                    </svg>
                </span>
            </div>

            <!-- Modal Body -->
            <div class="modal-body text-info">
                <!-- Add your form or content for sending the document here -->
                <p><b>
                    Kindly forward the attached <a href="#">Pre-approval form</a> to your employer or manager 
                    for signing, and submit it promptly. Thanks for your cooperation!
                </b></p>
                <div class="col-12">
                    <label class="form-label">Employer/Manager/Supervisor Email</label>
                    <div class="input-group">
                        <input
                            type="text"
                            name="email"
                            class="form-control"
                            placeholder="name@mail.com"
                        />
                    </div>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" id="cancelShareDoc" onclick="closeSendDocModal()" class="btn btn-sm btn-light text-dark">I already signed</button>
                <button type="button" class="btn btn-primary btn-sm" id="shareButton" onclick="shareDocuments()">
                    <span id="shareButtonText">Share now</span>
                    <div class="spinner-border spinner-border-sm d-none" role="status" id="shareButtonSpinner">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-share-fill" viewBox="0 0 16 16">
                        <path d="M11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5z"/>
                    </svg>
                </button>
            </div>

        </form>
    </div>
</div>