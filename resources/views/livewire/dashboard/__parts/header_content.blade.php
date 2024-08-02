@unless (request()->routeIs('dashboard'))
    <div  class="header">
        <div style="margin-top:2svh" class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="header-content">

                        <div class="header-left">
                            <div class="page-title-content">
                                <h1 style="font-size:3svh; color:#792db8 !important " class="text-white card-title">@if (\Route::current())
                                    <!-- Display the formatted and capitalized name of the active route -->
                                    @php
                                        $routeName = \Route::currentRouteName();
                                        $formattedRouteName = str_replace('-', ' ', $routeName);
                                        $capitalizedRouteName = ucwords($formattedRouteName);
                                    @endphp
                            
                                    <p>{{ $capitalizedRouteName }}</p>
                                @endif</h1>
                            </div>




                        </div>

                        {{-- <div id="hideInMobile" class="header-right">
      <div class="notify-bell">
        <span class="btn" style="background: #662d91"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-repeat" viewBox="0 0 16 16">
          <path d="M11 5.466V4H5a4 4 0 0 0-3.584 5.777.5.5 0 1 1-.896.446A5 5 0 0 1 5 3h6V1.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384l-2.36 1.966a.25.25 0 0 1-.41-.192Zm3.81.086a.5.5 0 0 1 .67.225A5 5 0 0 1 11 13H5v1.466a.25.25 0 0 1-.41.192l-2.36-1.966a.25.25 0 0 1 0-.384l2.36-1.966a.25.25 0 0 1 .41.192V12h6a4 4 0 0 0 3.585-5.777.5.5 0 0 1 .225-.67Z"/>
        </svg> Transfer</span>
      </div>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <div class="notify-bell">
        <span class="btn text-primary" style="background: #662d912f"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-safe" viewBox="0 0 16 16">
          <path d="M1 1.5A1.5 1.5 0 0 1 2.5 0h12A1.5 1.5 0 0 1 16 1.5v13a1.5 1.5 0 0 1-1.5 1.5h-12A1.5 1.5 0 0 1 1 14.5V13H.5a.5.5 0 0 1 0-1H1V8.5H.5a.5.5 0 0 1 0-1H1V4H.5a.5.5 0 0 1 0-1H1zM2.5 1a.5.5 0 0 0-.5.5v13a.5.5 0 0 0 .5.5h12a.5.5 0 0 0 .5-.5v-13a.5.5 0 0 0-.5-.5z"/>
          <path d="M13.5 6a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5M4.828 4.464a.5.5 0 0 1 .708 0l1.09 1.09a3.003 3.003 0 0 1 3.476 0l1.09-1.09a.5.5 0 1 1 .707.708l-1.09 1.09c.74 1.037.74 2.44 0 3.476l1.09 1.09a.5.5 0 1 1-.707.708l-1.09-1.09a3.002 3.002 0 0 1-3.476 0l-1.09 1.09a.5.5 0 1 1-.708-.708l1.09-1.09a3.003 3.003 0 0 1 0-3.476l-1.09-1.09a.5.5 0 0 1 0-.708zM6.95 6.586a2 2 0 1 0 2.828 2.828A2 2 0 0 0 6.95 6.586"/>
        </svg> Fund Account</span>
      </div>
    </div> --}}
                        <div class="header-right">
                            <div class="dark-light-toggle" onclick="themeToggle()">
                                <span class="dark"><i class="bi bi-moon"></i></span>
                                <span class="light"><i class="bi bi-brightness-high"></i></span>
                            </div>
                            

                            @include('livewire.dashboard.__parts.notifcations_part')
                            @include('livewire.dashboard.__parts.profile_part')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endunless
