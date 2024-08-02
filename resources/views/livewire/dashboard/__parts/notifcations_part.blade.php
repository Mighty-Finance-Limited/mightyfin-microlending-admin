<div class="notification dropdown">
    <div class="notify-bell" data-toggle="dropdown">
        <span><i style="font-size:1.8rem;"
                class=" text-white bi bi-bell"></i></span>
    </div>
    <div class="dropdown-menu dropdown-menu-right notification-list">
        <h4>Announcements</h4>
        <div class="lists">

            @forelse (auth()->user()->unreadNotifications as $item)
                <a href="#" class="">
                    <div class="d-flex align-items-center">
                        <span class="me-3 icon success"><i
                                class="bi bi-check"></i></span>
                        <div>
                            <p>{{ $item->data['name'] }}</p>
                            <span>{{ $item->data['msg'] }}</span>
                            {{-- <span>2020-11-04 12:00:23</span> --}}
                        </div>
                    </div>
                </a>
            @empty
            @endforelse
            <a href="{{ route('notifications') }}">More <i
                    class="icofont-simple-right"></i></a>
        </div>
    </div>
</div>