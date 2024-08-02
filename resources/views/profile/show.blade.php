<x-dash-layout>
<div>
  @php
  $meta = App\Models\User::meta();
  if (isset($_GET['view'])) {
      // Retrieve the value of the 'view' parameter
      $param = $_GET['view'];

      // Use the $view variable as needed
      $view = htmlspecialchars($param);
  } 
  @endphp
    <div class="content-body">
        <div class="container">
          <div class="row">
            <div class="col-xxl-12 col-xl-12">
              <div class="page-title" style="display: flex; gap:3%">
                <span>
                  <a href="{{ route('settings') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="27" height="26" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
                    </svg>
                  </a>
                </span>
                @switch($view)
                    @case('profile')
                        <h4>Profile</h4>
                        @break
                    @case('kyc')
                        <h4>Kyc Information</h4>
                        @break
                    @case('privacy-security')
                        <h4>Privacy & Security</h4>
                        @break
                    @case('issue')
                        <h4>Support (Report Issue)</h4>
                        @break
                    @default
                      <h4>Profile</h4>
                      @break
                        
                @endswitch
              </div>
              <div class="">
     
                <div class="col-xxl-12 col-xl-12 col-lg-12 px-4">
                  @if (session('success'))
                      <div class="alert alert-success">
                          {{ session('success') }}
                      </div>
                  @endif

                  @if (session('error'))
                      <div class="alert alert-danger">
                          {{ session('error') }}
                      </div>
                  @endif
                </div>
                <div id="updateProfile" class="">
                  <div class="row">
                    <div class="col-xxl-12 col-xl-12 col-lg-12">
                        @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                            @include('profile.update-profile-information-form')
                        @endif
                    </div>
                  </div>
                </div>
                <div id="twoFactor" class="">
                  <div class="row">
                    <div class="col-xxl-12 col-xl-12 col-lg-12">
                      @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                          @livewire('profile.update-password-form')
                      @endif
                    </div>
                    <div class="col-xxl-12 col-xl-12 col-lg-12">
                        @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                            @livewire('profile.logout-other-browser-sessions-form')
                        @endif
                    </div>
                  </div>
                </div>
                <div id="browserSession" class="">
                  <div class="row">
                    <div class="col-xxl-12 col-xl-12 col-lg-12">
                        @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                            @livewire('profile.update-password-form')
                        @endif
                    </div>
                    <div class="col-xxl-12 col-xl-12 col-lg-12">
                        @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                            @livewire('profile.logout-other-browser-sessions-form')
                        @endif
                    </div>
                  </div>
                </div>

                <div id="docUploads" class="">
                  <div class="row">
                    @include('profile.kyc-update')
                    </div>
                  </div>
                </div>


              </div>
            </div>
          </div>
        </div>
      </div>
      <script>
        
          document.getElementById('twoFactor').style.display = "none";
          document.getElementById('browserSession').style.display = "none";
          var view = '{{$view}}';
          switch (view) {
            case 'profile':
              profileTab();
              break;
            case 'kyc':
              docUplaodsTab()
              break;
            case 'privacy-security':
              
              securityTab();
              break;
            case 'issue':
              activityTab();
              break;
          
            default:
              profileTab();
              break;
          }

          function profileTab() {
            document.getElementById('updateProfile').style.display = "block";
            document.getElementById('twoFactor').style.display = "none";
            document.getElementById('browserSession').style.display = "none";
            document.getElementById('docUploads').style.display = "none";
          }
          function activityTab() {
            document.getElementById('updateProfile').style.display = "none";
            document.getElementById('twoFactor').style.display = "none";
            document.getElementById('browserSession').style.display = "block";
            document.getElementById('docUploads').style.display = "none";
          }
          function securityTab() {
            document.getElementById('updateProfile').style.display = "none";
            document.getElementById('twoFactor').style.display = "block";
            document.getElementById('browserSession').style.display = "none";
            document.getElementById('docUploads').style.display = "none";
          }
          function docUplaodsTab() {
            document.getElementById('updateProfile').style.display = "none";
            document.getElementById('twoFactor').style.display = "none";
            document.getElementById('browserSession').style.display = "none";
            document.getElementById('docUploads').style.display = "block";
          }
      </script>
      <script src="{{ asset('public/mfs/vendor/jquery/jquery.min.js')}}"></script>
      <script src="{{ asset('public/mfs/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
</div>
</x-dash-layout>
