<x-dash-layout>

    <div class="content-body">
        <div class="container-fluid">
            <!-- row -->
            <div class="row">
                <div class="col-xl-3 col-lg-4">
                    <div class="clearfix h-100">
                        <div class="card card-bx profile-card author-profile m-b30">
                            <div class="card-body">
                                <div class="p-3">
                                    <div class="author-profile">
                                        {{-- <div class="author-media">
                                            <img src="images/user.jpg" alt="">
                                            <div class="upload-link" title="" data-toggle="tooltip" data-placement="right" data-original-title="update">
                                                <input type="file" class="update-flie">
                                                <i class="fa fa-camera"></i>
                                            </div>
                                        </div> --}}
                                        <div class="author-info">
                                            <h6 class="title">{{ auth()->user()->fname.' '.auth()->user()->lname }}</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="info-list">
                                    <ul>
                                        <li><a class="btn btn-sm" href="#" onclick="displayGeneral()">Basic Info</a></li>
                                        <li><a class="btn btn-sm" href="#" onclick="displayUploads()">Attachments</a></li>
                                        <li><a class="btn btn-sm" href="#" onclick="displaySecurity()">Security & Password</a></li>
                                        {{-- <li><a href="#" onclick="displayTwoFactor()">2 Factor Authentication</a></li> --}}
                                        <li><a class="btn btn-sm" href="#" onclick="displaySessions()">Sessions</a></li>
                                        {{-- <li><a href="#" onclick="displayCloseAccount()">Close Account</a></li> --}}
                                    </ul>
                                </div>
                            </div>
                            <div class="card-footer">
                                {{-- <div class="input-group mb-3">
                                    <div class="form-control rounded text-center bg-white">Portfolio</div>
                                </div>
                                <div class="input-group">
                                    <a href="https://www.dexignlab.com/" class="form-control text-primary rounded text-start bg-white">https://www.dexignzone.com/</a>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8">
                    <div id="generalProfileSection">
                        @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                            @livewire('profile.update-profile-information-form')
                        @endif

                    </div>

                    <div id="logoutDevices">       
                        <div class="mt-10 sm:mt-0">
                            @livewire('profile.logout-other-browser-sessions-form')
                        </div>
                    </div>

                    <div id="diactivateAccount">
                        @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                            <div class="mt-10 sm:mt-0">
                                @livewire('profile.delete-user-form')
                            </div>
                        @endif
                    </div>

                    <div id="updateSecurity">
                        @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                            <div class="mt-10 sm:mt-0">
                                @livewire('profile.update-password-form')
                            </div>
                        @endif
                        @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                            <div class="mt-10 sm:mt-0">
                                @livewire('profile.two-factor-authentication-form')
                            </div>
                        @endif
                    </div>

                    <div id="fileUploadSection" class="card profile-card card-bx m-b30 p-4">
                        <form action="{{ route("update-file-uploads") }}" method="POST" enctype="multipart/form-data">
                            @csrf   
                            <div>
                                <h3>
                                    {{ __('Upload Documents') }}
                                </h3>
                            
                                <p>
                                    {{ __('Upload neccessary documents as required.') }}
                                </p>
                            </div>
                            <div class="row pt-4">
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <div class="input-box">
                                            <div class="mb-3">
                                                <label for="formFile" class="form-label">Copy of NRC</label>
                                                <input class="form-control" name="nrc_file" type="file" id="formFile">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <div class="input-box">
                                            <div class="mb-3">
                                                <label for="formFile" class="form-label">Business Profile</label>
                                                <input class="form-control" name="business_file" type="file" id="formFile">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <div class="input-box">
                                            <div class="mb-3">
                                                <label for="payslip_file" class="form-label">Payslip</label>
                                                <input class="form-control" name="payslip_file" type="file" id="payslip_file">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <div class="input-box">
                                            <div class="mb-3">
                                                <label for="tpin_file" class="form-label">Tpin</label>
                                                <input class="form-control" name="tpin_file" type="file" id="tpin_file">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <button class="btn btn-primary">Upload</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>	
        </div>
    </div>
    <script>
        const general = document.getElementById("generalProfileSection");
        const uploads = document.getElementById("fileUploadSection");
        const browserSessions = document.getElementById("logoutDevices");
        const updateSecurity = document.getElementById("updateSecurity");
        const closeAccount = document.getElementById("diactivateAccount");
        const twoFactor = document.getElementById("twoFactorAuth");

        general.style.display = "block";
        uploads.style.display = "none";
        browserSessions.style.display = "none";
        updateSecurity.style.display = "none";
        closeAccount.style.display = "none";
        twoFactor.style.display = "none";

        function displayGeneral() {
            general.style.display = "block";
            uploads.style.display = "none";
            uploads.style.display = "none";
            browserSessions.style.display = "none";
            updateSecurity.style.display = "none";
            closeAccount.style.display = "none";
            twoFactor.style.display = "none";
        }
        function displayUploads() {
            uploads.style.display = "block";
            general.style.display = "none";
            browserSessions.style.display = "none";
            updateSecurity.style.display = "none";
            closeAccount.style.display = "none";
            twoFactor.style.display = "none";
        }
        function displaySessions() {
            uploads.style.display = "none";
            general.style.display = "none";
            browserSessions.style.display = "block";
            updateSecurity.style.display = "none";
            closeAccount.style.display = "none";
            twoFactor.style.display = "none";
        }
        function displaySecurity() {
            uploads.style.display = "none";
            general.style.display = "none";
            browserSessions.style.display = "none";
            updateSecurity.style.display = "block";
            closeAccount.style.display = "none";
            twoFactor.style.display = "none";
        }
        function displayCloseAccount() {
            uploads.style.display = "none";
            general.style.display = "none";
            browserSessions.style.display = "none";
            updateSecurity.style.display = "none";
            closeAccount.style.display = "block";
            twoFactor.style.display = "none";
        }
        function displayTwoFactor() {
            uploads.style.display = "none";
            general.style.display = "none";
            browserSessions.style.display = "none";
            updateSecurity.style.display = "none";
            closeAccount.style.display = "none";
            twoFactor.style.display = "block";
        }
        </script>
</x-dash-layout>
