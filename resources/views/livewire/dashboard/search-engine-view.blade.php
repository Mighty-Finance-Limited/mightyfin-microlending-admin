<div class="content-body">
    <div class="container-fluid">
        <h5>{{ $results->count()}} Result {{$results->count() > 1 ? 's':''}} Found</h5>
        @forelse ($results as $result)
        <div id="transactionExists" class="mx-auto">
            <div class="col-xl-12">
                <a href="{{ route('client-account', ['key'=>$user->id]) }}">
                    <div class="alert alert-primary left-icon-big alert-dismissible fade show">
                        <div class="media">
                            <div class="alert-left-icon-big">
                                <span>
                                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>	
                                </span>
                            </div>
                            <div class="media-body">
                                <h4 class="mt-1 mb-2">{{ $result->fname.' '.$result->lname}}</h4>
                                <p class="mb-0">
                                    {{ $result->address.' '.$result->phone.' '.$result->gender }}
                                </p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        @empty
            <div class="media">
                <div class="media-body">
                    <h4 class="mt-1 mb-2">Nothing Found</h4>
                </div>
            </div>  
        @endforelse
    </div>
</div>
