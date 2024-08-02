<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-xxl-12 col-lg-12">
                <div class="card border-0 pb-0">
                    <div class="card-header border-0 pb-0">
                        <h4 class="card-title">My Notifications</h4>
                    </div>
                    <div class="card-body p-0"> 
                        <div id="DZ_W_Todo2" class="widget-media dz-scroll height370 my-4 px-4">
                            <ul class="timeline">
                                @forelse (auth()->user()->unreadNotifications as $note)
                                <li>
                                    <div class="timeline-panel">
                                        <div class="media me-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16">
                                                <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
                                            </svg>
                                            {{-- <img alt="image" width="50" src="{{asset('public/images/avatar/1.jpg')}}"> --}}
                                        </div>
                                        <div class="media-body">
                                            <h5 class="mb-1">{{ $note->data['name'] }}</h5>
                                            <small class="d-block">{{ $note->data['msg'] }}</small>
                                            {{-- <small class="d-block">29 July 2020 - 02:26 PM</small> --}}
                                        </div>
                                        {{-- <div class="dropdown">
                                            <button type="button" class="btn btn-primary light sharp" data-toggle="dropdown">
                                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M4.58333 13.5205C3.19 13.5205 2.0625 12.393 2.0625 10.9997C2.0625 9.60629 3.19 8.47879 4.58333 8.47879C5.97667 8.47879 7.10417 9.60629 7.10417 10.9997C7.10417 12.393 5.97667 13.5205 4.58333 13.5205ZM4.58333 9.85379C3.95083 9.85379 3.4375 10.3672 3.4375 10.9997C3.4375 11.6322 3.95083 12.1455 4.58333 12.1455C5.21583 12.1455 5.72917 11.6322 5.72917 10.9997C5.72917 10.3672 5.21583 9.85379 4.58333 9.85379Z" fill="var(--primary)"/>
                                                    <path d="M17.4163 13.5205C16.023 13.5205 14.8955 12.393 14.8955 10.9997C14.8955 9.60629 16.023 8.47879 17.4163 8.47879C18.8097 8.47879 19.9372 9.60629 19.9372 10.9997C19.9372 12.393 18.8097 13.5205 17.4163 13.5205ZM17.4163 9.85379C16.7838 9.85379 16.2705 10.3672 16.2705 10.9997C16.2705 11.6322 16.7838 12.1455 17.4163 12.1455C18.0488 12.1455 18.5622 11.6322 18.5622 10.9997C18.5622 10.3672 18.0488 9.85379 17.4163 9.85379Z" fill="var(--primary)"/>
                                                    <path d="M11.0003 13.5205C9.60699 13.5205 8.47949 12.393 8.47949 10.9997C8.47949 9.60629 9.60699 8.47879 11.0003 8.47879C12.3937 8.47879 13.5212 9.60629 13.5212 10.9997C13.5212 12.393 12.3937 13.5205 11.0003 13.5205ZM11.0003 9.85379C10.3678 9.85379 9.85449 10.3672 9.85449 10.9997C9.85449 11.6322 10.3678 12.1455 11.0003 12.1455C11.6328 12.1455 12.1462 11.6322 12.1462 10.9997C12.1462 10.3672 11.6328 9.85379 11.0003 9.85379Z" fill="var(--primary)"/>
                                                </svg>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#">Edit</a>
                                                <a class="dropdown-item" href="#">Delete</a>
                                            </div>
                                        </div> --}}
                                    </div>
                                </li>
                                @empty
                                <li>
                                    <p>No notifications.</p>
                                </li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
