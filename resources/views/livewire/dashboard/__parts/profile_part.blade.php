<div style="margin-top: -2svh;" class="profile_log dropdown">
    <div class="user" data-toggle="dropdown">
        <span style="">
            @if (auth()->user()->profile_photo_path)
                @if ($route == 'profile.show' || $route == 'loan-details' || $route == 'loan-statement')
                    <img width="50" height="50" style="border-radius:50%;"
                        src="{{ '../public/' . Storage::url(auth()->user()->profile_photo_path) }}"
                        alt="">
                @else
                    <img width="50" height="50" style="border-radius:50%"
                        src="{{ 'public/' . Storage::url(auth()->user()->profile_photo_path) }}"
                        alt="">
                @endif
            @else
                <img width="45" style="border-radius:50%"
                    src="https://thumbs.dreamstime.com/b/default-avatar-profile-image-vector-social-media-user-icon-potrait-182347582.jpg"
                    alt="" />
            @endif
        </span>
        <span class="arrow"><i class="icofont-angle-down"></i></span>
    </div>
    <div class="dropdown-menu dropdown-menu-right">
        <div class="user-email">
            <div class="user">
                <span class="thumb">

                    @if (auth()->user()->profile_photo_path)
                        @if ($route == 'profile.show' || $route == 'loan-details' || $route == 'loan-statement')
                            <img width="40" height="40"
                                style="border-radius:50%;"src="{{ '../public/' . Storage::url(auth()->user()->profile_photo_path) }}"
                                alt="" />
                        @else
                            <img width="40" height="40"
                                style="border-radius:50%;"
                                src="{{ 'public/' . Storage::url(auth()->user()->profile_photo_path) }}"
                                alt="" />
                        @endif
                    @else
                        <img src="https://thumbs.dreamstime.com/b/default-avatar-profile-image-vector-social-media-user-icon-potrait-182347582.jpg"
                            alt="" />
                    @endif

                </span>
                <div class="user-info">
                    <h5>{{ auth()->user()->fname . ' ' . auth()->user()->lname }}
                    </h5>
                    <span>{{ auth()->user()->email }}</span>
                </div>
            </div>
        </div>

        <div class="user-balance">
            <div class="available">
                <p>Loan</p>
                <span>0.00 ZMW</span>
            </div>
            <div class="total">
                <p>Status</p>
                <span>No Loan</span>
            </div>
        </div>
        <a href="{{ route('my-profile', ['view' => 'profile']) }}"
            class="dropdown-item">
            <i class="bi bi-person"></i>Profile
        </a>
        <a href="{{ route('payments') }}" class="dropdown-item">
            <i class="bi bi-wallet"></i>Repayments
        </a>
        <a href="{{ route('settings') }}" class="dropdown-item">
            <i class="bi bi-gear"></i> Settings
        </a>
        

        <a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="dropdown-item ">
                    <span><i class="bi bi-power"></i></span> Sign Out
                </button>
            </form>
        </a>
    </div>
</div>